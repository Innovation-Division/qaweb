<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_mortgagee;
use App\Models\cocogen_cep_trans;
use App\Models\cocogen_cep_trans_upload;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use carbon\Carbon;
use PDF;

class cep extends Controller 
{
    public function get_bank(Request $request)
{
    $category = $request->input('category'); 

    $mortgagee = cocogen_mortgagee::select('name')
        ->where('category', $category)
        ->distinct()
        ->orderBy('name', 'asc')
        ->get();

    return response()->json($mortgagee);
}
public function saveCEP(Request $request)
    {
        $mortgageeName = $request->mortgagee['name'] ?? null;
        if ($mortgageeName === 'Select Mortgagee Type') $mortgageeName = null;

        $bank = is_array($request->bank) ? ($request->bank['name'] ?? null) : $request->bank;
        if ($bank === 'Select Bank') $bank = null;
        try {
            $data = [
                'region'   => is_array($request->region) ? ($request->region['name'] ?? null) : $request->region,
                'province' => is_array($request->province) ? ($request->province['name'] ?? null) : $request->province,
                'city'     => is_array($request->city) ? ($request->city['name'] ?? null) : $request->city,
                'barangay' => is_array($request->barangay) ? ($request->barangay['name'] ?? null) : $request->barangay,
                'street' => $request->street,
                'zip' => $request->zip,
                'building_name' => $request->building['name'] ?? null,
                'unit_type_name' => $request->unitType['name'] ?? null,
                'unit_number' => $request->unitNumber,
                'front' => $request->front,
                'left_side' => $request->left,
                'right_side' => $request->right,
                'rear' => $request->rear,
                'add_specs' => $request->addSpecs,
                'roof_name' => $request->roof['name'] ?? null,
                'wall_name' => $request->wall['name'] ?? null,
                'storey' => $request->storey,
                'has_mortgage' => $request->hasMortgage,
                'mortgagee_name' => $mortgageeName,
                'bank' => $bank,
                'branch' => $request->branch,
                'covered_amount' => $request->coveredAmount ?: 0,
                'declared_value' => $request->declaredValue ?: 0,
                'condo_unit' => $request->condoUnit ?: 0,
                'perils_amount' => $request->perils_amount ?: 0,
                'optional_benefits' => is_string($request->optionalBenefits)
                ? json_decode($request->optionalBenefits, true)
                : $request->optionalBenefits,

            'extension_covers' => is_string($request->extensionCovers)
                ? json_decode($request->extensionCovers, true)
                : $request->extensionCovers,
                'gross_premium' => $request->gross_premium ?: 0,
                'total_premium_amount' => $request->total_premium_amount ?: 0,
                'vat' => $request->vat ?: 0,
                'dst' => $request->dst ?: 0,
                'lgt' => $request->lgt ?: 0,
                'fire_tax' => $request->fire_tax ?: 0,
                'has_Agent' => $request->hasAgent,
                'agent_name' => $request->agent_name ?? null,
                'first_name' => $request->personal_data['first_name'] ?? null,
                'last_name' => $request->personal_data['last_name'] ?? null,
                'suffix' => $request->personal_data['suffix'] ?? null,
                'mobile' => $request->personal_data['mobile'] ?? null,
                'email' => $request->personal_data['email'] ?? null,
                'birth_date' => $request->personal_data['birth_date'] ?? null,
                'place_of_birth' => $request->personal_data['place_of_birth'] ?? null,
                'country_of_birth' => $request->personal_data['country_of_birth']['name'] ?? null,
                'citizenship' => $request->personal_data['citizenship']['name'] ?? null,
                'id_type' => is_array($request->personal_data['idType'] ?? null)
                ? ($request->personal_data['idType']['name'] ?? null)
                : ($request->personal_data['idType'] ?? null),
                'id_number' => $request->personal_data['idNumber'] ?? null,

                'emergency_full_name' => $request->personal_data['emergency_full_name'] ?? null,
                'emergency_mobile' => $request->personal_data['emergencyMobile'] ?? null,
                'emergency_relationship' => $request->personal_data['emergency_relationship'] ?? null,

                'has_incurred_losses' => $request->hasIncurredLosses,
                'declared_incurred_losses' => $request->declaredIncurredLosses,
                'description_losses' => $request->descriptionLosses,

            ];
            if (!empty($request->personal_data['birth_date'])) {
                try {
                    $data['birth_date'] = \Carbon\Carbon::createFromFormat('m/d/Y', $request->personal_data['birth_date'])->format('Y-m-d');
                } catch (\Exception $e) {
                    \Log::warning('Invalid: ' . $request->personal_data['birth_date']);
                    $data['birth_date'] = null;
                }
            } else {
                $data['birth_date'] = null;
            }

            $transaction = cocogen_cep_trans::create($data);
            $paddedId = str_pad($transaction->id, 7, '0', STR_PAD_LEFT);
            $transaction->trans_id = "CA-CEP-" . date("Y") . "-" . $paddedId . "-00";
            $transaction->save();

            if ($request->hasFile('file-upload-id') && $request->file('file-upload-id')->isValid()) {
                $file = $request->file('file-upload-id');
                $path = $file->store('cepIDs', 'public');

                cocogen_cep_trans_upload::create([
                    'trans_ID' => $transaction->id,
                    'name' => basename($path),
                    'path' => $path,
                ]);
            }

            // $pdf = PDF::loadView('pdf.condo_excel_plus', [
            //     'formData' => $transaction
            // ]);

            // $hash = md5($transaction->trans_id . '-CEP');
            // $filename = $hash . '-CEP.pdf';
            // $relativePath = 'private/public/pdf/condo_excel_plus/' . $filename;
            // Storage::put($relativePath, $pdf->output());
            // $absolutePath = Storage::path($relativePath);
// \Log::info('Files received:', [
//     'unit_photos' => $request->file('unit_photos'),
//     'id_file' => $request->file('file-upload-id')
// ]);

            if ($request->hasFile('unit_photos')) {
            foreach ($request->file('unit_photos') as $photo) {
                if ($photo->isValid()) {
                    $path = $photo->store('cepUnitPhotos', 'public');
                    cocogen_cep_trans_upload::create([
                        'trans_ID' => $transaction->id,
                        'name' => basename($path),
                        'path' => $path,
                    ]);
                }
            }
        }
        if ($request->hasFile('id_image')) {
        $idFile = $request->file('id_image');

        if ($idFile->isValid()) {
            $path = $idFile->store('cepIDPhotos', 'public');
            cocogen_cep_trans_upload::create([
                'trans_ID' => $transaction->id,
                'name' => basename($path),
                'path' => $path,
            ]);
        }
    }

            // $this->sendEmailToExternal($transaction);
            // $this->sendEmailToInternal($transaction, $absolutePath);

            return response()->json([
                'success' => true,
                'message' => 'Quotation submitted successfully.',
                'trans_id' => $transaction->trans_id,
            ]);

        } catch (\Exception $e) {
            \Log::error(" CEP Save Failed: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

public function sendEmail(Request $request)
{
        $transId = $request->trans_id;
        $transaction =cocogen_cep_trans::where('trans_id', $transId)->first();

        $hash = md5($transaction->trans_id . '-CEP');
        $filename = $hash . '-CEP.pdf';
        $relativePath = 'private/public/pdf/condo_excel_plus/' . $filename;
        $absolutePath = Storage::path($relativePath);

        if (!Storage::exists($relativePath)) {
                $pdf = \PDF::loadView('pdf.condo_excel_plus', [
                    'formData' => $transaction->toArray(),
                ]);

                Storage::put($relativePath, $pdf->output());
                // \Log::info('CEP PDF generated ', [
                //     'path' => $absolutePath,
                //     'trans_id' => $transaction->trans_id,
                // ]);

        $this->sendEmailToExternal($transaction);
        $this->sendEmailToInternal($transaction, $absolutePath);

        return response()->json(['success' => true, 'message' => 'Emails sent successfully']);
}
}

    protected function sendEmailToExternal($transaction)
    {
        $fullname = strtoupper($transaction->first_name . ' ' . $transaction->last_name);

        Mail::send('emailtemplate.condo_excel_email_external', [
            'fullname' => $fullname,
        ], function ($message) use ($fullname) {
        $message->to([
            'roxanne_yambao@cocogen.com',
            'bruce_lim@cocogen.com',
            'john_lopez@cocogen.com',
        ]) 
                ->subject("Your Condo Excel Plus Quotation Request is Confirmed")
                ->from('no_reply@cocogen.com', 'COCOGEN Insurance');

            
          });
}

    protected function sendEmailToInternal($transaction, $pdfPath)
    {
        $fullname = strtoupper($transaction->first_name . ' ' . $transaction->last_name);
        $created_at = strtoupper(Carbon::parse($transaction->created_at)->format('F d, Y H:i:s'));

        $internalRecipients = [
            'roxanne_yambao@cocogen.com',
            'bruce_lim@cocogen.com',
            'john_lopez@cocogen.com',
        ];

        Mail::send('emailtemplate.condo_excel_email_internal', [
            'fullname' => $fullname,
            'mobile' => $transaction->mobile,
            'email' => $transaction->email,
            'created_at'=>$created_at,
            'has_incurred_losses' => $transaction->has_incurred_losses,
            'declared_incurred_losses' => $transaction->declared_incurred_losses,
            'description_losses' => $transaction->description_losses,
        ], function ($message) use ($internalRecipients, $fullname, $transaction, $pdfPath) {
            $message->to($internalRecipients, 'COCOGEN')
            ->subject("Online Quotation Request - Condo Excel Plus ")
            ->from('no_reply@cocogen.com', 'COCOGEN Insurance');

                if (file_exists($pdfPath)) {
                $message->attach($pdfPath, [
                    'as' => 'Condo_Excel_Plus_Quotation.pdf',
                    'mime' => 'application/pdf',
                ]);
            }
        });
    }
}
