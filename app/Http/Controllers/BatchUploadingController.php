<?php

namespace App\Http\Controllers;


use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_set_agent_code;
use App\Models\cocogen_meta;
use App\Models\cocogen_quotation_batch_note_uploads_updates;
use App\Models\cocogen_quotation_batch_trans;
use App\Models\cocogen_quotation_cocno;
use App\Models\cocogen_fmv;
use App\Models\cocogen_users_agent_code;
use App\Models\tbl_giis_mc_make;
use App\Models\cocogen_epartnerhub_notificatons;
use App\Models\Imports\quotationImport;
use App\Models\Imports\quotationImportDraft;
use App\Models\cocogen_compre_bipd;
use App\Models\Rules\ValidateExcelHeaders;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use Session;
use PDF;

class BatchUploadingController extends Controller
{
    public function saveInsert(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:10240', // Allowing .xlsx and .xls files, adjust max size as needed
        ]);

        $file = $request->file('file');

        if ($file) {

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
            $maxFileSize = 250 * 1024 * 1024;

            if ($fileSize < $maxFileSize) {

                $this->saveNotes($request);
                if ($extension == 'xls' || $extension == 'xlsx') {

                    $rules = [
                        'file' => 'required|max:200000',
                    ];
                    $niceNames = [
                        'file' => 'Required',
                    ];

                    $this->validate($request, $rules, [], $niceNames);
                    $file = $request->file('file');
                    $extension = $file->getClientOriginalExtension();

                    if (in_array($extension, ['xlsx', 'xls'])) {
                        info($request->get('draft'));
                        if ($request->get('draft') === 1 || $request->get('draft') === "1") {
                            info('draft');
                            Excel::import(new quotationImportDraft, $request->file('file'));
                        } else {
                            info('quoted');

                            Excel::import(new quotationImport, $request->file('file'));
                        }
                        if ($request->validate(['file' => ['required', 'file', new ValidateExcelHeaders]])) {
                            return response()->json(['format' => 'File imported successfully.']);
                        } else {
                            return response()->json(['format' => 'File validation failed.']);
                        }
                    } else {
                        return redirect()->back()->with('error', 'Invalid file type.');
                    }
                } else {
                    $rules = [
                        'file' => 'required|mimes:xlsx,xls',

                    ];
                    $niceNames = [
                        'file' => 'Required',
                    ];

                    $this->validate($request, $rules, [], $niceNames);
                    return Redirect::back()->withErrors(['message' => 'Please Upload Excel File']);
                }

            } else {
                return response()->json(['error' => 'The file size is too large.'], 400);
            }

        }
    }

    public function viewQuotation($id) 
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $quotation = cocogen_quotation_batch_trans::where('trans_no', $id)->first();

        return view('home.quotation.view_batch', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'quotation' => $quotation]);
    }

    public function batchreview()
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $transID4 = "";

        $cocogen_meta = cocogen_meta::where('page', '=', "E-POLICY")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        if (\Auth::user()->type === "C") {
            $pageTitle = "POLICYHOLDER | ";
        } elseif (\Auth::user()->type === "A") {
            $pageTitle = "ePartner | ";
        } else {
            $pageTitle = "E-POLICY | ";
        }
        $title = $pageTitle . "COCOGEN INSURANCE";

        $agentSelectedCode = cocogen_set_agent_code::where('ownerId', \Auth::user()->id)->get();
        $userid = \Auth::user()->id;
        $batchId = request()->query('batchId');
        $paginator = cocogen_quotation_batch_trans::where('batchId', $batchId)->paginate(10);
        $paginator->appends(['batchId' => $batchId])->links();
        $recordCount = cocogen_quotation_batch_trans::where('batchId', $batchId)->count();

        return view('home.quotation.batchreview', [
            'title' => $title,
            'transID4' => $transID4,
            'metadescription' => $metadescription,
            'keyword' => $keyword,
            'motors' => $paginator,
            'recordcount' => $recordCount,
            'cocogen_admin_footer' => $cocogen_admin_footer,
            'cocogen_admin_main' => $cocogen_admin_main,
            'cocogen_admin_submain' => $cocogen_admin_submain,
            'cocogen_admin_productlink' => $cocogen_admin_productlink,
            'cocogen_admin_subchild' => $cocogen_admin_subchild,
        ]);
    }

    public function updateAll(Request $request)
    {
        $data = $request->input('data');
        if (!empty($request->input('pushAction'))) {
            info($request->input('pushAction'));
            if ($request->input('pushAction') === "Y") {

                $cocogen_quotation_batch_trans = cocogen_quotation_batch_trans::where('batchId', '=', $request->input('batchCode'))->get();
                if (count($cocogen_quotation_batch_trans) > 0) {
                    foreach ($cocogen_quotation_batch_trans as $cocogen_quotation_batch_tran) {

                        //get COC No
                        $cocogen_quotation_cocno = cocogen_quotation_cocno::where('id', '=', "1")->get();
                        $lastc0c = $cocogen_quotation_cocno[0]['cocNo'];
                        $lastc0c = $lastc0c + 1;

                        $cocogen_quotation_cocno = cocogen_quotation_cocno::findorFail(1);
                        $cocogen_quotation_cocno->cocNo = $lastc0c;
                        $cocogen_quotation_cocno->save();


                        $motor = cocogen_quotation_batch_trans::find($cocogen_quotation_batch_tran['id']);
                        $motor->status = "Processing";
                        $motor->save();

                        if (count($cocogen_quotation_batch_trans) > 0) {
                            $assured = 0;
                            $name = $cocogen_quotation_batch_tran['last_name'] . ", " . $cocogen_quotation_batch_tran['first_name'];
                            $name = strtoupper($name);
                            $fname = strtoupper($cocogen_quotation_batch_tran['first_name']);
                            $lname = strtoupper($cocogen_quotation_batch_tran['last_name']);
                            $email = $cocogen_quotation_batch_tran['email'];
                            $contact = $cocogen_quotation_batch_tran['contactno'];
                            $palceofbirth = $cocogen_quotation_batch_tran['placeofbirth'];
                            $address = $cocogen_quotation_batch_tran['assdAddress'];
                            $brand = $cocogen_quotation_batch_tran['carCompany'];
                            $model = $cocogen_quotation_batch_tran['carVariant'];
                            $year = $cocogen_quotation_batch_tran['modelYear'];


                            $origdate = strtotime($cocogen_quotation_batch_tran['birthday']);
                            $date_month = date("F", $origdate);
                            $date_year = date("Y", $origdate);
                            $date_day = date("d", $origdate);

                            $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $name);
                            $client = new Client();
                            $res = $client->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/check/assured', [
                                'form_params' => [
                                    'Username' => 'cocogenAPI',
                                    'SecurityCode' => $SecurityCode,
                                    'name' => $name,
                                    'fname' => $fname,
                                    'lname' => $lname,
                                    'email' => $email,
                                    'address' => $address,
                                    'date_month' => $date_month,
                                    'date_year' => $date_year,
                                    'date_day' => $date_day,
                                ]
                            ]);
                            $contentsproduction = $res->getBody()->getContents();
                            $data = json_decode($contentsproduction, true);

                            if (!empty($data['TErrorMsg'])) {
                                $client = new Client();
                                $resInsert = $client->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/insert/assured', [
                                    'form_params' => [
                                        'Username' => 'cocogenAPI',
                                        'SecurityCode' => $SecurityCode,
                                        'name' => $name,
                                        'email' => $email,
                                        'address' => $address,
                                        'date_month' => $date_month,
                                        'date_year' => $date_year,
                                        'date_day' => $date_day,
                                        'fname' => $fname,
                                        'lname' => $lname,
                                        'contact' => $contact,
                                        'palceofbirth' => $palceofbirth,
                                    ]
                                ]);

                                $contentsproductionInsert = $resInsert->getBody()->getContents();
                                $data_insert = json_decode($contentsproductionInsert, true);
                                $assured = $data_insert;
                            } else {
                                $assured = $data[0]['assd_no'];
                            }

                            //check or insert brand
                            $SecurityCodeCar = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . strtoupper($brand));
                            $clientcar = new Client();
                            $rescar = $clientcar->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/checkAndInsert/car_company', [
                                'form_params' => [
                                    'Username' => 'cocogenAPI',
                                    'SecurityCode' => $SecurityCodeCar,
                                    'car' => strtoupper($brand),
                                ]
                            ]);
                            $contentscar = $rescar->getBody()->getContents();
                            $datacarCode = json_decode($contentscar, true);

                            $makename = "-";
                            $makecode = 0;
                            $cocogen_fmv = cocogen_fmv::where(strtoupper('brand'), '=', strtoupper($brand))
                                ->where('year', '=', $year)
                                ->where(str_replace("  ", " ", strtoupper('model')), '=', str_replace("  ", " ", strtoupper($model)))
                                ->get();
                            if (count($cocogen_fmv) > 0) {
                                $tbl_giis_mc_make = tbl_giis_mc_make::where('make_cd', '=', (int) $cocogen_fmv[0]['make_cd'])->get();
                                if (count($tbl_giis_mc_make) > 0) {
                                    $makename = $tbl_giis_mc_make[0]["make"];
                                }

                            }
                            $makename = trim($makename);
                            $SecurityCodeMake = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . strtoupper($makename));
                            $clientMake = new Client();
                            $resMake = $clientMake->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/checkAndInsert/make', [
                                'form_params' => [
                                    'Username' => 'cocogenAPI',
                                    'SecurityCode' => $SecurityCodeMake,
                                    'carCode' => $datacarCode,
                                    'make' => strtoupper($makename),
                                ]
                            ]);
                            $brand = strtoupper($brand);
                            $itemTitle = $year . ' ' . $brand;
                            // $itemTitle  = $itemTitle ." ".strtoupper($makename);
                            $contentsMake = $resMake->getBody()->getContents();
                            $dataMakeCode = json_decode($contentsMake, true);

                            $myotehraccountagentcode = "";
                            if ($getmyotheraccountcode) {
                                foreach ($getmyotheraccountcode as $val) {
                                    if (!$myotehraccountagentcode) {
                                        $myotehraccountagentcode = $val->code;
                                    } else {
                                        $myotehraccountagentcode = $myotehraccountagentcode . "," . $val->code;
                                    }
                                }
                            }
                         
                            if ($myotehraccountagentcode) {
                                $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode;
                            }
                            if ($myotehraccountagentcode2) {
                                $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode2;
                            }
                            $agent = $myaccountagentcode;
                            $BIpercentate = ($cocogen_quotation_batch_tran['bi_prem'] / $cocogen_quotation_batch_tran['vtplbi']) * 100;
                            $PDpercentate = ($cocogen_quotation_batch_tran['pd_prem'] / $cocogen_quotation_batch_tran['vtplpd']) * 100;


                            $cocogen_users_agent_code = cocogen_users_agent_code::where('email', \Auth::user()->email)->orderBy('id', 'ASC')->first();
                            if (count($cocogen_users_agent_code) > 0) {
                                $agent = $cocogen_users_agent_code['code'];
                            }

                            $incept = date("m/d/Y");
                            $expiry = date('m/d/Y', strtotime('+1 year'));


                            $AON = "";
                            if ($cocogen_quotation_batch_tran['withAON'] === "Yes") {
                                $AONpercentate = ($cocogen_quotation_batch_tran['aon_prem'] / $cocogen_quotation_batch_tran['aon']) * 100;
                                $AON = '{
                                            "perilCd": 10,
                                            "perilRate": ' . $AONpercentate . ',
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['aon'] . ',
                                            "perilPrem": ' . $cocogen_quotation_batch_tran['aon_prem'] . '
                                        },';
                            }

                            $RSCC = "";
                            if ($cocogen_quotation_batch_tran['withRSCC'] === "Yes") {
                                $RSCC = '{
                                            "perilCd": 13,
                                            "perilRate": 0,
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['rscc'] . ',
                                            "perilPrem": 0
                                        },';
                            }



                            $dta = '{
                                    "APIuserId": "CPI",
                                    "prio": "low",
                                    "system": "quotation-batch-MC",
                                    "requestType": "batch",
                                    "transid":' . $cocogen_quotation_batch_tran['id'] . ',
                                    "userId": "CPI",
                                    "sublineCd": "MNP",
                                    "lineCd": "MC",
                                    "issCd": "HO",
                                    "intmNo": ' . $agent . ',
                                    "inceptDate": "' . $incept . '",
                                    "expiryDate": "' . $expiry . '",
                                    "assdNo": ' . $assured . ',
                                    "assdAddress": "' . $address . '",
                                    "refPolNo": "' . $cocogen_quotation_batch_tran['id'] . '-Ecommerce",
                                    "itemTitle": "' . $cocogen_quotation_batch_tran['itemTitle'] . '",
                                    "currency": "PHP",
                                    "currencyRt": 1.0,
                                    "paytTerm": "COD",
                                    "dueDate": "05/28/2023",
                                    "refInvNo": "140000045308088",
                                    "itemDesc": "' . $cocogen_quotation_batch_tran['itemTitle'] . '",
                                    "itemDesc2": "' . strtoupper($makename) . '",
                                    "motorNo": "' . $cocogen_quotation_batch_tran['motorNo'] . '",
                                    "color": "-",
                                    "modelYear": "' . $year . '",
                                    "makeCd": ' . $dataMakeCode . ',
                                    "serialNo": "' . $cocogen_quotation_batch_tran['engineno'] . '",
                                    "plateNo":  "' . $cocogen_quotation_batch_tran['plateNo'] . '",
                                    "sublineType": "CAR",
                                    "noPass": 4,
                                    "cocIssueDate": "06/01/2024",
                                    "mvFileNo": "' . $cocogen_quotation_batch_tran['mvFileNo'] . '",
                                    "carCompany": "' . $brand . '",
                                    "carVariant": "-",
                                    "cocAtcnNo": "12Q341231",
                                    "mvPremType": "CARDESC1",
                                    "mvType": "c",
                                    "regType": "r",
                                    "cocSerialNo": ' . $lastc0c . ',
                                    "coverageCd": 4,
                                    "regionCd": 15,
                                    "peril": [
                                        {
                                            "perilCd": 3,
                                            "perilRate": 0.75,
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['od'] . ',
                                            "perilPrem": ' . $cocogen_quotation_batch_tran['od_prem'] . ',
                                            "deductible": [
                                                {
                                                    "deductibleCd": "ECOM",
                                                    "deductibleAmt": ' . $cocogen_quotation_batch_tran['deductible'] . '
                                                }
                                            ]
                                        },
                                        {
                                            "perilCd": 4,
                                            "perilRate": 0.5,
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['th'] . ',
                                            "perilPrem": ' . $cocogen_quotation_batch_tran['deductible'] . '
                                        },' . $AON . '
                                       
                                        {
                                            "perilCd": 5,
                                            "perilRate": ' . $BIpercentate . ',
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['vtplbi'] . ',
                                            "perilPrem": ' . $cocogen_quotation_batch_tran['bi_prem'] . '
                                        },
                                        {
                                            "perilCd": 6,
                                            "perilRate": ' . $PDpercentate . ',
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['vtplpd'] . ',
                                            "perilPrem": ' . $cocogen_quotation_batch_tran['pd_prem'] . '
                                        },' . $RSCC . '
                                        {
                                            "perilCd": 8,
                                            "perilRate": 0,
                                            "perilTsi": ' . $cocogen_quotation_batch_tran['aupa'] . ',
                                            "perilPrem": 0
                                        }
                                    ],
                                    "invTax": [
                                        {
                                            "taxCd": 3,
                                            "taxAmt": ' . $cocogen_quotation_batch_tran['dst'] . '
                                        },
                                        {
                                            "taxCd": 5,
                                            "taxAmt": ' . $cocogen_quotation_batch_tran['lgt'] . '
                                        },
                                        {
                                            "taxCd": 8,
                                            "taxAmt": ' . $cocogen_quotation_batch_tran['vat'] . '
                                        }
                                        
                                    
                                    ]
                                }';
                            $hashKEY = 'test';
                            $client = new Client([
                                'headers' => ['Content-Type' => 'application/json', 'hashKey' => $hashKEY]
                            ]);
                            $responsepayment = $client->post(
                               'http://136.239.248.124/queueingAPI/public/test',
                                ['body' => $dta]
                            );

                            $entrydate = date('Y-m-d', strtotime('+8 hours'));
                            $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
                            $cocogen_epartnerhub_notificatons->name = "Processing - " . $cocogen_quotation_batch_tran['trans_no'];
                            $cocogen_epartnerhub_notificatons->description = $cocogen_quotation_batch_tran['trans_no'] . ' is now processing for issuance.';
                            $cocogen_epartnerhub_notificatons->link = 'quotation/view/batch/' . $cocogen_quotation_batch_tran['trans_no'];
                            $cocogen_epartnerhub_notificatons->status = "Unread";
                            $cocogen_epartnerhub_notificatons->email = $cocogen_quotation_batch_tran['created_by'];
                            $cocogen_epartnerhub_notificatons->created_at = $entrydate;
                            $cocogen_epartnerhub_notificatons->updated_at = $entrydate;
                            $cocogen_epartnerhub_notificatons->save();
                        }


                    }
                    Session::flash('success', 'Policy is now proceessing for issuance!');
                    // return redirect()->route('quotationlist')->with('success', 'Request for issuance is now processing.');
                }
            }
            // return response()->json(['success' => 'Processing request'], 200);
        }

        foreach ($data as $key => $item) {
            $motor = cocogen_quotation_batch_trans::find($item['id']);
            if ($motor) {
                $motor->first_name = $item['first_name'];
                $motor->middle_name = $item['middle_name'];
                $motor->last_name = $item['last_name'];
                $motor->plateno = $item['plateno'];
                $motor->save();
            }
            return response()->json(['success' => 'Update Successful'], 200);

        }


    }

    public function quote($id)
    {
        $cocogen_admin_footer = cocogen_admin_footer::all();
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get();
        $title = "Quotation | COCOGEN";

        $metadescription = "";
        $keyword = "";

        $quotation = cocogen_quotation_batch_trans::where('trans_no', $id)->first();
        return view('home.quotation.quotation_batch', ['title' => $title, 'metadescription' => $metadescription, 'keyword' => $keyword, 'cocogen_admin_main' => $cocogen_admin_main, 'cocogen_admin_submain' => $cocogen_admin_submain, 'cocogen_admin_subchild' => $cocogen_admin_subchild, 'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer' => $cocogen_admin_footer, 'quotation' => $quotation]);
    }

    public function saveNotes(Request $request)
    {
        $uploadUpdate = new cocogen_quotation_batch_note_uploads_updates();
        $uploadUpdate->batchId = $request->batchId;
        $uploadUpdate->saveDraft = $request->draft;
        $uploadUpdate->uploadNotes = $request->notes;

        // If saveDraft is 1, set draft_created_at to the current date and time
        if ($request->draft == 1) {
            $uploadUpdate->draft_created_at = now();
        } else {
            $uploadUpdate->draft_updated_at = now();
        }
        $uploadUpdate->save();
    }

    public function issuePolicy($id)
    {
        $cocogen_quotation_batch_tran = cocogen_quotation_batch_trans::where('trans_no', $id)->first();
        $cocogen_quotation_cocno = cocogen_quotation_cocno::where('id', '=', "1")->get();
        $lastc0c = $cocogen_quotation_cocno[0]['cocNo'];
        $lastc0c = $lastc0c + 1;

        $cocogen_quotation_cocno = cocogen_quotation_cocno::findorFail(1);
        $cocogen_quotation_cocno->cocNo = $lastc0c;
        $cocogen_quotation_cocno->save();


        $motor = cocogen_quotation_batch_trans::find($cocogen_quotation_batch_tran['id']);
        $motor->status = "Processing";
        $motor->save();

        if (count($cocogen_quotation_batch_tran) > 0) {
            $assured = 0;
            $name = $cocogen_quotation_batch_tran['last_name'] . ", " . $cocogen_quotation_batch_tran['first_name'];
            $name = strtoupper($name);
            $fname = strtoupper($cocogen_quotation_batch_tran['first_name']);
            $lname = strtoupper($cocogen_quotation_batch_tran['last_name']);
            $email = $cocogen_quotation_batch_tran['email'];
            $contact = $cocogen_quotation_batch_tran['contactno'];
            $palceofbirth = $cocogen_quotation_batch_tran['placeofbirth'];
            $address = $cocogen_quotation_batch_tran['assdAddress'];
            $brand = $cocogen_quotation_batch_tran['carCompany'];
            $model = $cocogen_quotation_batch_tran['carVariant'];
            $year = $cocogen_quotation_batch_tran['modelYear'];


            $origdate = strtotime($cocogen_quotation_batch_tran['birthday']);
            $date_month = date("F", $origdate);
            $date_year = date("Y", $origdate);
            $date_day = date("d", $origdate);

            $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $name);
            $client = new Client();
            $res = $client->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/check/assured', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCode,
                    'name' => $name,
                    'fname' => $fname,
                    'lname' => $lname,
                    'email' => $email,
                    'address' => $address,
                    'date_month' => $date_month,
                    'date_year' => $date_year,
                    'date_day' => $date_day,
                ]
            ]);
            $contentsproduction = $res->getBody()->getContents();
            $data = json_decode($contentsproduction, true);

            if (!empty($data['TErrorMsg'])) {
                $client = new Client();
                $resInsert = $client->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/insert/assured', [
                    'form_params' => [
                        'Username' => 'cocogenAPI',
                        'SecurityCode' => $SecurityCode,
                        'name' => $name,
                        'email' => $email,
                        'address' => $address,
                        'date_month' => $date_month,
                        'date_year' => $date_year,
                        'date_day' => $date_day,
                        'fname' => $fname,
                        'lname' => $lname,
                        'contact' => $contact,
                        'palceofbirth' => $palceofbirth,
                    ]
                ]);

                $contentsproductionInsert = $resInsert->getBody()->getContents();
                $data_insert = json_decode($contentsproductionInsert, true);
                $assured = $data_insert;
            } else {
                $assured = $data[0]['assd_no'];
            }

            //check or insert brand
            $SecurityCodeCar = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . strtoupper($brand));
            $clientcar = new Client();
            $rescar = $clientcar->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/checkAndInsert/car_company', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCodeCar,
                    'car' => strtoupper($brand),
                ]
            ]);
            $contentscar = $rescar->getBody()->getContents();
            $datacarCode = json_decode($contentscar, true);

            $makename = "-";
            $makecode = 0;
            $cocogen_fmv = cocogen_fmv::where(strtoupper('brand'), '=', strtoupper($brand))
                ->where('year', '=', $year)
                ->where(str_replace("  ", " ", strtoupper('model')), '=', str_replace("  ", " ", strtoupper($model)))
                ->get();
            if (count($cocogen_fmv) > 0) {
                $tbl_giis_mc_make = tbl_giis_mc_make::where('make_cd', '=', (int) $cocogen_fmv[0]['make_cd'])->get();
                if (count($tbl_giis_mc_make) > 0) {
                    $makename = $tbl_giis_mc_make[0]["make"];
                }

            }
            $makename = trim($makename);
            $SecurityCodeMake = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . strtoupper($makename));
            $clientMake = new Client();
            $resMake = $clientMake->request('POST', 'http://webapi2.cocogen.ph/api/ecommerce/checkAndInsert/make', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCodeMake,
                    'carCode' => $datacarCode,
                    'make' => strtoupper($makename),
                ]
            ]);
            $brand = strtoupper($brand);
            $itemTitle = $year . ' ' . $brand;
            // $itemTitle  = $itemTitle ." ".strtoupper($makename);
            $contentsMake = $resMake->getBody()->getContents();
            $dataMakeCode = json_decode($contentsMake, true);

            $agent = 3546;

            $BIpercentate = ($cocogen_quotation_batch_tran['bi_prem'] / $cocogen_quotation_batch_tran['vtplbi']) * 100;
            $PDpercentate = ($cocogen_quotation_batch_tran['pd_prem'] / $cocogen_quotation_batch_tran['vtplpd']) * 100;


            $cocogen_users_agent_code = cocogen_users_agent_code::where('email', \Auth::user()->email)->orderBy('id', 'ASC')->first();
            if (count($cocogen_users_agent_code) > 0) {
                $agent = $cocogen_users_agent_code['code'];
            }

            $incept = date("m/d/Y");
            $expiry = date('m/d/Y', strtotime('+1 year'));


            $AON = "";
            if ($cocogen_quotation_batch_tran['withAON'] === "Yes") {
                $AONpercentate = ($cocogen_quotation_batch_tran['aon_prem'] / $cocogen_quotation_batch_tran['aon']) * 100;
                $AON = '{
                        "perilCd": 10,
                        "perilRate": ' . $AONpercentate . ',
                        "perilTsi": ' . $cocogen_quotation_batch_tran['aon'] . ',
                        "perilPrem": ' . $cocogen_quotation_batch_tran['aon_prem'] . '
                    },';
            }

            $RSCC = "";
            if ($cocogen_quotation_batch_tran['withRSCC'] === "Yes") {
                $RSCC = '{
                        "perilCd": 13,
                        "perilRate": 0,
                        "perilTsi": ' . $cocogen_quotation_batch_tran['rscc'] . ',
                        "perilPrem": 0
                    },';
            }



            $dta = '{
                "APIuserId": "CPI",
                "prio": "low",
                "system": "quotation-batch-MC",
                "requestType": "batch",
                "transid":' . $cocogen_quotation_batch_tran['id'] . ',
                "userId": "CPI",
                "sublineCd": "MNP",
                "lineCd": "MC",
                "issCd": "HO",
                "intmNo": ' . $agent . ',
                "inceptDate": "' . $incept . '",
                "expiryDate": "' . $expiry . '",
                "assdNo": ' . $assured . ',
                "assdAddress": "' . $address . '",
                "refPolNo": "' . $cocogen_quotation_batch_tran['id'] . '-Ecommerce",
                "itemTitle": "' . $cocogen_quotation_batch_tran['itemTitle'] . '",
                "currency": "PHP",
                "currencyRt": 1.0,
                "paytTerm": "COD",
                "dueDate": "05/28/2023",
                "refInvNo": "140000045308088",
                "itemDesc": "' . $cocogen_quotation_batch_tran['itemTitle'] . '",
                "itemDesc2": "' . strtoupper($makename) . '",
                "motorNo": "' . $cocogen_quotation_batch_tran['motorNo'] . '",
                "color": "-",
                "modelYear": "' . $year . '",
                "makeCd": ' . $dataMakeCode . ',
                "serialNo": "' . $cocogen_quotation_batch_tran['engineno'] . '",
                "plateNo":  "' . $cocogen_quotation_batch_tran['plateNo'] . '",
                "sublineType": "CAR",
                "noPass": 4,
                "cocIssueDate": "06/01/2024",
                "mvFileNo": "' . $cocogen_quotation_batch_tran['mvFileNo'] . '",
                "carCompany": "' . $brand . '",
                "carVariant": "-",
                "cocAtcnNo": "12Q341231",
                "mvPremType": "CARDESC1",
                "mvType": "c",
                "regType": "r",
                "cocSerialNo": ' . $lastc0c . ',
                "coverageCd": 4,
                "regionCd": 15,
                "peril": [
                    {
                        "perilCd": 3,
                        "perilRate": 0.75,
                        "perilTsi": ' . $cocogen_quotation_batch_tran['od'] . ',
                        "perilPrem": ' . $cocogen_quotation_batch_tran['od_prem'] . ',
                        "deductible": [
                            {
                                "deductibleCd": "ECOM",
                                "deductibleAmt": ' . $cocogen_quotation_batch_tran['deductible'] . '
                            }
                        ]
                    },
                    {
                        "perilCd": 4,
                        "perilRate": 0.5,
                        "perilTsi": ' . $cocogen_quotation_batch_tran['th'] . ',
                        "perilPrem": ' . $cocogen_quotation_batch_tran['deductible'] . '
                    },' . $AON . '
                    {
                        "perilCd": 5,
                        "perilRate": ' . $BIpercentate . ',
                        "perilTsi": ' . $cocogen_quotation_batch_tran['vtplbi'] . ',
                        "perilPrem": ' . $cocogen_quotation_batch_tran['bi_prem'] . '
                    },
                    {
                        "perilCd": 6,
                        "perilRate": ' . $PDpercentate . ',
                        "perilTsi": ' . $cocogen_quotation_batch_tran['vtplpd'] . ',
                        "perilPrem": ' . $cocogen_quotation_batch_tran['pd_prem'] . '
                    },' . $RSCC . '
                    {
                        "perilCd": 8,
                        "perilRate": 0,
                        "perilTsi": ' . $cocogen_quotation_batch_tran['aupa'] . ',
                        "perilPrem": 0
                    }
                ],
                "invTax": [
                    {
                        "taxCd": 3,
                        "taxAmt": ' . $cocogen_quotation_batch_tran['dst'] . '
                    },
                    {
                        "taxCd": 5,
                        "taxAmt": ' . $cocogen_quotation_batch_tran['lgt'] . '
                    },
                    {
                        "taxCd": 8,
                        "taxAmt": ' . $cocogen_quotation_batch_tran['vat'] . '
                    }
                    
                
                ]
            }';
        
            $hashKEY = 'test';
            $client = new Client([
                'headers' => ['Content-Type' => 'application/json', 'hashKey' => $hashKEY]
            ]);
            $responsepayment = $client->post(
                'http://136.239.248.124/queueingAPI/public/test',
                ['body' => $dta]
            );


            return redirect()->route('quotationlist')->with('success', 'Request for issuance is now processing.');
        }

    }

    public function saveNotesUpdate(Request $request)
    {

        $batchId = $request->batchId;
        // Update records where batchId matches
        DB::table('cocogen_quotation_batch_note_uploads_updates')
            ->where('batchId', $batchId)
            ->update([
                'dratfUpdate' => $request->draft,
                'updateNotes' => $request->notes,
                'upload_created_at' => now(),
                'upload_updated_at' => now(),
                'draft_upload_created_at' => $request->draft == 1 ? now() : null,
                'draft_upload_updated_at' => $request->draft != 1 ? now() : null
            ]);
    }
    public function destroy($id)
    {
        $motor = cocogen_quotation_batch_trans::find($id);

        if ($motor) {
            $motor->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 404);
        }
    }

    public function downloadQuotation($id)
    {

        $quotation = cocogen_quotation_batch_trans::where('trans_no', $id)->first();
      
        $data = array(
            'address' => $quotation["assdAddress"],
            'first_name' => $quotation["first_name"],
            'middle_name' => $quotation["middle_name"],
            'last_name' => $quotation["last_name"],
            'occupation' => $quotation["occupation"],
            'phone_number' => $quotation["contactno"],
            'contactno' => $quotation["contactno"],
            'email_address' => $quotation["email"],
            'year' => $quotation["modelYear"],
            'brand' => $quotation["carCompany"],
            'model' => $quotation["carVariant"],
            'market_value' => $quotation["fmv"],
            'created_at' => $quotation["created_at"],
            'net_premium' => $quotation["net"],
            'doc_stamps' => $quotation["dst"],
            'vat' => $quotation["vat"],
            'lgt' => $quotation["lgt"],
            'gross_premium' => $quotation["gross_amount"],
            'total_amount_due' => $quotation["totalamount"],
            'od' => $quotation["od"],
            'bodily_injury' => $quotation["vtplbi"],
            'property_damage' => $quotation["vtplpd"],
            'pa' => $quotation["aupa"],
            'aon_amount' => $quotation["aon"],
            'aon' => $quotation["aon"]
        );

        $pdf = PDF::loadView('pdf.download_quotation_batch', $data);
        return $pdf->download('Quotation.pdf');
    }

    public function sharePolicy($id)
    {
        $quotation = cocogen_quotation_trans::where('trans_no', $id)->first();
        $email = $request->email;

        $messageData = [
            'quotation' => $quotation,
            'data' => $request,
        ];

        Mail::send('home.quotation.email', $messageData, function($message) use($email){
            $message->to($email)->subject('Policy');
        });

        return back()->with('success', 'Success'); 
    }

}
