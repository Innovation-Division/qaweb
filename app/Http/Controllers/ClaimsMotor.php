<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Models\cocogen_claims_motor;
use App\Models\cocogen_claims_motor_file;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ClaimsMotor extends Controller
{
     public function verifyPolicy(Request $request)
{
    $policy = $request->input('policyNumber');
 
     $parts = explode('-', $policy);
 
    $line = $parts[0];      // e.g., "MC"
    $subline = $parts[1];   // e.g., "MNP"
    $branch = $parts[2];    // e.g., "HO"
    $year = $parts[3];      // e.g., "25"
    $polno = $parts[4];     // e.g., "0000527"
    $renew_no = $parts[5];  // e.g., "00"
 
    $username = "cocogenAPI";
    $password = "cocogenAPI";
    $nameInput = $request->input('fullname');

$name = strtoupper(trim(preg_replace('/\s+/', ' ', $nameInput)));
// \Log::info(' to API:', ['name' => $name]);

    $bdate = $request->input('bday');
    $date = Carbon::parse($bdate);
 
    $client = new Client([
        'base_uri' => 'http://webapi.cocogen.ph/',
        'timeout'  => 5.0,
    ]);
 
    try {
        $securityCode = sha1("$username:$password:$name:$polno");
        $response = $client->post('http://webapi.cocogen.ph/api/claim/get/vehicle/data', [
            'form_params' => [
                "Username" => $username,
                "SecurityCode" => $securityCode,
                "name" => $name,
                "b_date" => $date->day,
                "b_month" => $date->format('F'),
                "b_year" => $date->year,
                "line" => $line,
                "subline" => $subline,
                "branch" => $branch,
                "year" => $year,
                "polno" => $polno,
                "renew_no" => $renew_no
            ]
        ]);

      $responseData = json_decode($response->getBody(), true);

    // \Log::info('Policy API Response:', $responseData);

    $isValid = !empty($responseData) && is_array($responseData) && count($responseData) > 0;
    $isAlreadyUsed = cocogen_claims_motor::where('policy_no', $policy)->exists();

     if ($isValid && !$isAlreadyUsed) {
    session([
        'claims_step' => 'verified',
        'fullname' => $name,
        'bday' => $bdate
    ]);
}

    return response()->json([
    'isValid' => $isValid,
    'data' => $isValid ? [
        'policy_number' => $responseData[0]["get_policy_no(a.policy_id)"] ?? null,
        'plate_no' => $responseData[0]["plate_no"] ?? null,
        'model' => $responseData[0]["car_company"] ?? null,
        'vehicle_type' => $responseData[0]["make"] ?? null,
        'year' => $responseData[0]["model_year"] ?? null,
        'full_name' => $name,
        'bday' => $bdate,
        'policy_taken' => $isAlreadyUsed,
    ] : null
]);


    } catch (\Exception $e) {
        \Log::error('Guzzle error: ' . $e->getMessage());
        return response()->json(['isValid' => false]);
    }
}

public function saveFileAClaimMotor(Request $request)
{
    $validated = $request->validate([
        'policy_no' => 'required|string|unique:cocogen_claims_motor,policy_no',
        'fullname' => 'required|string',
        'uploads' => 'nullable|array',
    ]);

    $birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
    $expiry_date = Carbon::parse($request->expiry_date)->format('Y-m-d');
    $date_of_accident = Carbon::parse($request->date_of_accident)->format('Y-m-d');

        $relationshipMap = [
            1 => 'I am Insured',
            2 => 'Sibling',
            3 => 'Parent',
        ];

        $relationshipId = (int) $request->rel_to_insured;
        $relationshipText = $relationshipMap[$relationshipId] ?? 'I am the Insured';
        
        if (strtolower($request->product) === 'motor') {
            $product_line = 'Auto Excel Plus';
        } elseif (strtolower($request->product) === 'personal accident') {
            $product_line = 'Fire Insurance';
        } else {
            $product_line = 'Unknown Product Line'; 
        }
    
    $data = [
        'status' => "Received",
        'policy_no' => $request->policy_no,
        'product' => $request->product,
        'product_line' => $product_line,
        'damage_type' => $request->damage_type,
        'fullname' => $request->fullname,
        'address' => $request->address,
        'birthdate' => $birthdate,
        'email_address' => $request->email_address,
        'mobile' => $request->mobile,
        'plate_no' => $request->plate_no,
        'model' => $request->model,
        'vehicle_type' => $request->vehicle_type,
        'year' => $request->year,
        'place_of_accident' => $request->place_of_accident,
        'date_of_accident' => $date_of_accident,
        'fullname_driver' => $request->fullname_driver,
        'license_no' => $request->license_no,
        'rel_to_insured'  => $relationshipText,
        'expiry_date' => $expiry_date,
        'classification' => $request->classification,
        'restriction_code' => $request->restriction_code,
        'agent_name' => $request->agent_name,
        'agent_mobile' => $request->agent_mobile,
        'created_at' => now(),
        'updated_at' => now(),
    ];
    $transaction = cocogen_claims_motor::create($data);

    $prefix = ($product_line === 'Auto Excel Plus') ? 'MOT' :
              (($product_line === 'Fire Insurance') ? 'PA' : 'UNK');

    $paddedId = str_pad($transaction->id, 4, '0', STR_PAD_LEFT);

    $transaction->claim_reference_id = "OC-HO-{$prefix}-{$paddedId}";
    $transaction->save();

    $validTypes = [
    'motor_claims_uploads',
    'vehicle_photos',
    'identification',
    'police_report_or_affidavit',
    'additional_documents',
];

foreach ($validTypes as $type) {
    $group = $request->file("uploads.$type");

    if (!$group) continue;

    foreach ($group as $subKey => $subFiles) {
        if (!is_array($subFiles)) {
            $subFiles = [$subFiles];
            $subKey = $type; 
        }

        foreach ($subFiles as $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                $originalName = $file->getClientOriginalName();
                $path = $file->storeAs("claims_motor_uploads/$type", $originalName, 'public');

                cocogen_claims_motor_file::create([
                    'policy_no'    => $request->policy_no,
                    'file_type'    => $subKey, 
                    'fileLocation' => $path,
                    'filename'     => $originalName,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }
    }
}

    return response()->json(['message' => 'Claim and uploads saved successfully.']);
}

    public function sendEmail(Request $request){
            
        $claim = \DB::table('cocogen_claims_motor')
            ->where('policy_no', $request->policy_no)
            ->orderBy('id', 'desc')
            ->first();


            $this->emailsendClaimsMotorExternal(
            $claim->claim_reference_id,
            $claim->policy_no,
            $claim->fullname,
            ['roxanne_yambao@cocogen.com',
            // 'val_mangoba@cocogen.com',
            // 'john_lopez@cocogen.com',
            // 'rene_paciente@cocogen.com',
            // 'bruce_lim@cocogen.com',
            ],
            true
        );

        $this->emailsendClaimsMotorInternal(
            $claim->id,
            $claim->policy_no,
            $claim->fullname,
            $claim->damage_type,
            $claim->created_at,
            $claim->date_of_accident,
            // 'claims_admin@cocogen.com',
            // 'claimsbroker_admin@cocogen.com',
            // 'lea_ramos@cocogen.com',
            // 'claims_motorsp_admin@cocogen.com',
            // 'john_lopez@cocogen.com',
            ['roxanne_yambao@cocogen.com',
            // 'val_mangoba@cocogen.com',
            // 'john_lopez@cocogen.com',
            // 'rene_paciente@cocogen.com',
            // 'bruce_lim@cocogen.com',
            ],
            true
        );
    }

    public function emailsendClaimsMotorExternal($claim_reference_id, $policy_no, $fullname, array $email_addresses, $external)
    {

        Mail::send('emailtemplate.motor_claim_email_external', [
            'fullname'   => $fullname,
            'external'   => $external,
            'claim_reference_id'         => $claim_reference_id,         
            'policy_no'  => $policy_no   
        ], function ($message) use ($fullname,$claim_reference_id, $email_addresses, $policy_no) {
            $message->to($email_addresses, 'COCOGEN')
                    ->subject('Online Claim Submission - Claim Reference ID:' . $claim_reference_id)
                    ->from('no_reply@cocogen.com', 'COCOGEN');

        });
        // \Log::info("Claim email sent to external");
    }

    public function emailsendClaimsMotorInternal($id, $policy_no, $fullname, $damage_type, $created_at, $date_of_accident, array $email_addresses, $internal)
    {
        $fullname     = strtoupper($fullname);
        $policy_no    = strtoupper($policy_no);
        $created_at   = strtoupper(Carbon::parse($created_at)->format('F d, Y H:i:s'));
        $date_of_accident   = strtoupper(Carbon::parse($date_of_accident)->format('F d, Y'));
        $damage_type  = strtoupper($damage_type);

        $files = cocogen_claims_motor_file::where('policy_no', $policy_no)->get();

        $zipFileName = 'claims_attachments_' . $policy_no . '.zip';
        $zipPath = storage_path("app/temp/{$zipFileName}");

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive();
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            foreach ($files as $file) {
                $absolutePath = storage_path('app/public/' . $file->fileLocation);

                if (file_exists($absolutePath)) {
                    $ext = pathinfo($file->filename, PATHINFO_EXTENSION);
                    $name = pathinfo($file->filename, PATHINFO_FILENAME);

                    $sanitizedName = preg_replace('/[^A-Za-z0-9_\-]/', '_', substr($name, 0, 50));
                    $uniqueFilename = $sanitizedName . '_' . $file->id . '.' . $ext;

                    if (strlen($uniqueFilename) > 200) {
                        $uniqueFilename = substr($uniqueFilename, 0, 195) . '.' . $ext;
                    }

                    if (strlen(basename($absolutePath)) > 100) {
                        $newPhysicalPath = dirname($absolutePath) . '/' . uniqid('short_') . '.' . $ext;
                        rename($absolutePath, $newPhysicalPath);
                        $absolutePath = $newPhysicalPath;
                    }

                    $zip->addFile($absolutePath, $uniqueFilename);
                }
            }
            $zip->close();
        } else {
            $zipPath = null;
        }

        Mail::send('emailtemplate.motor_claim_email_internal', [
            'fullname'    => $fullname,
            'internal'    => $internal,
            'id'          => $id,
            'policy_no'   => $policy_no,
            'damage_type' => $damage_type,
            'created_at'  => $created_at,
            'date_of_accident' => $date_of_accident
        ], function ($message) use ($id, $policy_no, $fullname, $damage_type, $date_of_accident, $created_at, $email_addresses, $zipPath, $zipFileName) {
            $message->to($email_addresses, 'COCOGEN')
                    ->subject("NEW ONLINE CLAIM: {$fullname} | {$policy_no} | {$date_of_accident}")
                    ->from('no_reply@cocogen.com', 'COCOGEN');

            if ($zipPath && file_exists($zipPath)) {
                $message->attach($zipPath, [
                    'as' => $zipFileName,
                    'mime' => 'application/zip',
                ]);
            }
        });
    }
    public function getClaims(Request $request)
{
    $user = Auth::user();

    $perPage = (int) $request->query('per_page', 10);
    $page = (int) $request->query('page', 1);

    $claims = DB::table('cocogen_claims_motor')
        ->select(
            'claim_reference_id',
            'status',
            'id',
            'product_line',
            'policy_no',
            DB::raw('DATE_FORMAT(created_at, "%m/%d/%Y") as created_at')
        )
        ->where('email_address', $user->email)
        ->orderBy('created_at', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);

    return response()->json($claims);
}
    
    public function getClaimDetails($id){

    $user = Auth::user();

    $claim = DB::table('cocogen_claims_motor')
        ->where('id', $id)
        ->where('email_address', $user->email)
        ->first();

    $files = DB::table('cocogen_claims_motor_file')
            ->where('policy_no', $claim->policy_no)
            ->get()
            ->groupBy('file_type');

        return response()->json([
            'claim' => $claim,
            'files' => $files
        ]);
}

}
