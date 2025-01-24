<?php

namespace App\Http\Controllers;


use App\Models\cocogen_users_client_code;
use App\Models\cocogen_users_agent_code;
use App\Models\cocogen_users_agent_email;
use App\Models\cocogen_admin_event_reports;
use App\Models\Exports\ReportExport;
use Carbon\Carbon;
use DateTime;
use DateInterval;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportUploadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function reportdisplay(Request $request)
    {

        $myaccountagentcode = '';
        $getmyotheraccountemail = cocogen_users_agent_email::select('email2')->where('email', '=', \Auth::user()->email)->get();
        $getmyotheraccountcode = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail)->get();
        //get my other email
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
        $getmyotheraccountemail2 = cocogen_users_agent_email::select('email')->where('email2', '=', \Auth::user()->email)->get();
        $getmyotheraccountcode2 = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail2)->get();
        //get my other email
        $myotehraccountagentcode2 = "";
        if ($getmyotheraccountcode2) {
            foreach ($getmyotheraccountcode2 as $val) {
                if (!$myotehraccountagentcode2) {
                    $myotehraccountagentcode2 = $val->code;
                } else {
                    $myotehraccountagentcode2 = $myotehraccountagentcode2 . "," . $val->code;
                }
            }
        }
        $myotehraccountagentcode = "";
        if ($myotehraccountagentcode) {
            $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode;
        }
        if ($myotehraccountagentcode2) {
            $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode2;
        }

        $myaccountagentcodeoldformat = $myaccountagentcode;
        $agent = $myaccountagentcode;
        $agent = ltrim($agent, ',');

        $start = Carbon::now()->subYears(3)->toDateString();
        $end = Carbon::now()->toDateString();
          if (\Auth::user()->type != "C") {
            $myaccountagent = cocogen_users_agent_code::select('code')->where('email', \Auth::user()->email)->get();
            $myaccountagentcode = "";

            if ($myaccountagent) {
                foreach ($myaccountagent as $val) {
                    if (!$myaccountagentcode) {
                        $myaccountagentcode = $val->code;
                    } else {
                        $myaccountagentcode = $myaccountagentcode . "," . $val->code;
                    }
                }
            }

            $agent = $myaccountagentcode;
            $start = Carbon::now()->subYears(3)->toDateString();
            $end = Carbon::now()->toDateString();

            $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $agent);
            $client = new Client();
            $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/get/policy/per/agent', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCode,
                    'agent' => $agent,
                    'start' => $start,
                    'end' => $end,
                ]
            ]);

        }

        if (\Auth::user()->type != "A") {
            $myaccountclient = cocogen_users_client_code::select('code')->where('email', \Auth::user()->email)->get();
            $myaccountclientcode = "";
            if ($myaccountclient) {
                foreach ($myaccountclient as $val) {
                    if (!$myaccountclientcode) {
                        $myaccountclientcode = $val->code;
                    } else {
                        $myaccountclientcode = $myaccountclientcode . "," . $val->code;
                    }
                }
            }
            $assd_no = $myaccountclientcode;
            $start = Carbon::now()->subYears(3)->toDateString();
            $end = Carbon::now()->toDateString();
            $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $assd_no);
            $client = new Client();
            $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/get/policy/per/client', [
                'form_params' => [
                    'Username' => 'cocogenAPI',
                    'SecurityCode' => $SecurityCode,
                    'assd_no' => $assd_no,
                    'start' => $start,
                    'end' => $end,
                ]
            ]);

        }
        $contentsproduction = $res->getBody()->getContents();
        $data = json_decode($contentsproduction, true);

        // Filter by policy line
        $searchTerm = $request->input('policyline');
        if ($searchTerm) {
            $data = array_filter($data, function ($item) use ($searchTerm) {
                return stripos($item['line_name'], $searchTerm) !== false;
            });
        }

        // Determine the date range
        $dateRange = $request->input('dateRange');
        $fromDate = $request->input('from-date');
        $toDate = $request->input('to-date');


        if ($dateRange || ($fromDate && $toDate)) {
            $startDate = null;
            $endDate = null;

            $fromDate = date("m/d/Y", strtotime($fromDate));
            $toDate = date("m/d/Y", strtotime($toDate));


            $currentDate = new DateTime();
            switch ($dateRange) {
                case 'past_7_months':
                    $startDate = (clone $currentDate)->sub(new DateInterval('P7M'))->format('m/d/Y');
                    $endDate = $currentDate->format('m/d/Y');
                    break;
                case 'last_month':
                    $startDate = (clone $currentDate)->modify('first day of last month')->format('m/d/Y');
                    $endDate = (clone $currentDate)->modify('last day of last month')->format('m/d/Y');
                    break;
                case '1st_quarter':
                    $startDate = $currentDate->format('Y') . '-01-01';
                    $endDate = (clone $currentDate)->setDate($currentDate->format('Y'), 3, 31)->format('m/d/Y');
                    break;
                default:
                    if ($fromDate && $toDate) {

                        $startDate = DateTime::createFromFormat('m/d/Y', $fromDate)->format('m/d/Y');
                        $endDate = DateTime::createFromFormat('m/d/Y', $toDate)->format('m/d/Y');

                    }
                    break;
            }

            if ($startDate && $endDate) {


                $data = array_filter($data, function ($item) use ($startDate, $endDate) {
                    $issue = date("m/d/Y", strtotime($item['issue_date']));
                    $itemDate = isset($issue) ? DateTime::createFromFormat('m/d/Y', $issue) : null;
                    return $itemDate && $itemDate >= DateTime::createFromFormat('m/d/Y', $startDate) && $itemDate <= DateTime::createFromFormat('m/d/Y', $endDate);
                });
            }
        }
        $itemsPerPage = 10;
        $page = $request->input('page', 1);
        $totalItems = count($data);
        $data2 = $data;
        $data = array_slice($data, ($page - 1) * $itemsPerPage, $itemsPerPage);

        $fileFormat = $request->input('fileformat');
        switch ($fileFormat) {
            case 'csv':
                return $this->generateCsv($data2);
            case 'xls':
                return $this->generateExcels($data2);
            case 'pdf':
            default:
                return $this->generatePdf($data2);
        }
    }


    private function generatePdf(array $data)
    {
        // Load the view with the data
        $pdf = PDF::loadView('pdf.policy_report', ['policies' => $data])->setPaper('a4', 'landscape');

        // Return the PDF download response
        return $pdf->download('policy_report.pdf');
    }


    private function generateCsv(array $data)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="policy_report.csv"',
        ];

        if (empty($data)) {
            $csvData = "No data available\n";
        } else {
            $columns = array_keys($data[0]);

            $csvData = implode(',', $columns) . "\n";

            // Add data rows
            foreach ($data as $row) {
                $csvData .= implode(',', array_map(function ($value) {
                    return '"' . str_replace('"', '""', $value) . '"';
                }, $row)) . "\n";
            }
        }
        return response($csvData, 200, $headers);
    }

    private function generateExcels($data)
    {

        return Excel::download(new ReportExport($data), '.xlsx');

    }

    public function ArrayToexcel($data = '', $delimiter = ',')
    {

        $filename = 'Report_as_of_' . Carbon::now()->toDateString() . '.xlsx';
        $filePath = 'exports/' . $filename;

        $reportSave = new cocogen_admin_event_reports;
        $reportSave->filename = $filename;
        $reportSave->uid = auth()->user()->id;
        $reportSave->path = $filePath;
        $reportSave->save();
        Excel::store(new ReportExport($data), $filePath, 'local');

        return $filePath;
    }

    public function showReport(Request $request)
    {
        $collection = new Collection();
        if (\Auth::user()->type === "C") {
            $pageTitle = "POLICYHOLDER | ";
        } elseif (\Auth::user()->type === "A") {
            $pageTitle = "ePartner | ";
        } else {
            $pageTitle = "E-POLICY | ";
        }
        $title = $pageTitle . "COCOGEN INSURANCE";

        $cocogen_epolicy_dtl_agent = "";
        $cocogen_epolicy_dtl_client = "";
        $cocogen_admin_paidpolicies = "";
        $cocogen_admin_cancelledpolicies = "";
        // dd(\Auth::user()->type);
        if (\Auth::user()->type === "A" || \Auth::user()->type === "B" || \Auth::user()->type === "C") {
            if (\Auth::user()->type != "C") {
                $myaccountagent = cocogen_users_agent_code::select('code')->where('email', \Auth::user()->email)->get();
                $myaccountagentcode = "";
                $myaccountagentcodecoodefirst = "";

                if ($myaccountagent) {

                    foreach ($myaccountagent as $val) {
                        if (!$myaccountagentcode) {
                            $myaccountagentcodecoodefirst = $val->code;
                            $myaccountagentcode = $val->code;
                        } else {
                            $myaccountagentcode = $myaccountagentcode . "," . $val->code;
                        }
                    }
                }
                $date = date_create();
                $datehash = date_timestamp_get($date);
                $transID = $myaccountagentcodecoodefirst . ":" . $datehash . ":" . \Auth::user()->email;
                $transID2 = sha1($transID);
                $transID3 = $transID . ":" . $transID2;
                $transID4 = base64_encode($transID3);
                $getmyotheraccountemail = cocogen_users_agent_email::select('email2')->where('email', '=', \Auth::user()->email)->get();
                $getmyotheraccountcode = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail)->get();
                //get my other email
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
                $getmyotheraccountemail2 = cocogen_users_agent_email::select('email')->where('email2', '=', \Auth::user()->email)->get();
                $getmyotheraccountcode2 = cocogen_users_agent_code::select('code')->whereIn('email', $getmyotheraccountemail2)->get();
                //get my other email
                $myotehraccountagentcode2 = "";
                if ($getmyotheraccountcode2) {
                    foreach ($getmyotheraccountcode2 as $val) {
                        if (!$myotehraccountagentcode2) {
                            $myotehraccountagentcode2 = $val->code;
                        } else {
                            $myotehraccountagentcode2 = $myotehraccountagentcode2 . "," . $val->code;
                        }
                    }
                }
                if ($myotehraccountagentcode) {
                    $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode;
                }
                if ($myotehraccountagentcode2) {
                    $myaccountagentcode = $myaccountagentcode . ',' . $myotehraccountagentcode2;
                }
                // $myaccountagentcode = explode(',', $myaccountagentcode);
                // $cocogen_epolicy_dtl_agent = cocogen_epolicy_dtl::whereIn('agentId', $myaccountagentcode)->get();
                $myaccountagentcodeoldformat = $myaccountagentcode;
                $agent = $myaccountagentcode;
                // dd($agent);
                $start = Carbon::now()->subYears(3)->toDateString();
                $end = Carbon::now()->toDateString();
                $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $agent);
                $client = new Client();
                $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/get/policy/per/agent', [
                    'form_params' => [
                        'Username' => 'cocogenAPI',
                        'SecurityCode' => $SecurityCode,
                        'agent' => $agent,
                        'start' => $start,
                        'end' => $end,
                    ]
                ]);

                $contentsproduction = $res->getBody()->getContents();
                $data = json_decode($contentsproduction, true);

                if (empty($data["TErrorMsg"])) {
                    foreach ($data as $item) {
                        // dd($item['policy_no']);
                        $status_payment = $item['payment_status'];
                        if (strpos($item['payment_status'], "NOT FULLY PAID") !== FALSE) {
                            $status_payment = "NO PAYMENT";
                        }

                        $collection->push((object) [
                            'policy_no' => (string) $item['policy_no'],
                            'class' => $item['class'],
                            'line_cd' => $item['line_cd'],
                            'issue_date' => $item['issue_date'],
                            'start_date' => $item['start_date'],
                            'end_date' => $item['end_date'],
                            'assured_id' => $item['assured_id'],
                            'assured_name' => $item['assured_name'],
                            'email_address' => $item['email_address'],
                            'contact_no' => $item['contact_no'],
                            'address1' => $item['address1'],
                            'address2' => $item['address2'],
                            'address3' => $item['address3'],
                            "assd_tin" => $item['assd_tin'],
                            "agent_id" => $item['agent_id'],
                            "agent_name" => $item['agent_name'],
                            "temp_pol_no" => $item['temp_pol_no'],
                            "line_name" => $item['line_name'],
                            "last_name" => $item['last_name'],
                            "first_name" => $item['first_name'],
                            "middle_initial" => $item['middle_initial'],
                            "bill_no" => $item['bill_no'],
                            "gross_premium" => $item['gross_premium'],
                            "pd_amt" => $item['pd_amt'],
                            "unpaid" => $item['unpaid'],
                            "payment_status" => $status_payment,
                            "tsi_amt" => $item['tsi_amt'],
                            "prem_amt" => $item['prem_amt'],
                            "currency_type" => $item['currency_type'],
                            "dst" => $item['dst'],
                            "lgt" => $item['lgt'],
                            "fst" => $item['fst'],
                            "vat" => $item['vat'],
                            "prem_tax" => $item['prem_tax'],
                            "other_taxes" => $item['other_taxes'],
                        ]);
                    }
                }

                $myclientpolicy = "";
                if ($collection) {
                    if (!empty($collection["TErrorMsg"])) {

                    } else {
                        foreach ($collection as $val) {

                            if (!$myclientpolicy) {
                                $myclientpolicy = $val->policy_no;
                            } else {
                                $myclientpolicy = $myclientpolicy . "," . $val->policy_no;
                            }

                        }
                        $myclientpolicy = explode(',', $myclientpolicy);
                    }
                }


                // $quotations = $collection->paginate(10);
                // $searchTex
                if ($request->searchPolicy) {

                    // $collection = $collection->where('assured_name', 'LIKE',DB::raw("CONCAT('%', $request->searchPolicy, '%')"));
                    $collection = $collection->filter(function ($item) use ($request) {
                        // replace stristr with your choice of matching function

                        return false !== stristr($item->policy_no, $request->searchPolicy) ||
                            false !== stristr($item->class, $request->searchPolicy) ||
                            false !== stristr($item->assured_id, $request->searchPolicy) ||
                            false !== stristr($item->issue_date, $request->searchPolicy) ||
                            false !== stristr($item->start_date, $request->searchPolicy) ||
                            false !== stristr($item->start_date, $request->searchPolicy) ||
                            false !== stristr($item->assured_name, $request->searchPolicy);
                    });
                }
                $selectPolicy = '';


            } else {
                $collection = "";
            }

            if (\Auth::user()->type != "A") {

                //mycode
                $myaccountclient = cocogen_users_client_code::select('code')->where('email', \Auth::user()->email)->get();
                $myaccountclientcode = "";
                if ($myaccountclient) {
                    foreach ($myaccountclient as $val) {
                        if (!$myaccountclientcode) {
                            $myaccountclientcode = $val->code;
                        } else {
                            $myaccountclientcode = $myaccountclientcode . "," . $val->code;
                        }
                    }
                }
                $getmyotheraccountemailclient = cocogen_users_client_email::select('email2')->where('email', '=', \Auth::user()->email)->get();
                $getmyotheraccountcodeclient = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient)->get();
                //get my other email
                $myotehraccountclientcode = "";
                if ($getmyotheraccountcodeclient) {
                    foreach ($getmyotheraccountcodeclient as $val) {
                        if (!$myotehraccountclientcode) {
                            $myotehraccountclientcode = $val->code;
                        } else {
                            $myotehraccountclientcode = $myotehraccountclientcode . "," . $val->code;
                        }
                    }
                }

                $getmyotheraccountemailclient2 = cocogen_users_client_email::select('email')->where('email2', '=', \Auth::user()->email)->get();
                $getmyotheraccountcodeclient2 = cocogen_users_client_code::select('code')->whereIn('email', $getmyotheraccountemailclient2)->get();
                //get my other email
                $myotehraccountclientcode2 = "";
                if ($getmyotheraccountcodeclient2) {
                    foreach ($getmyotheraccountcodeclient2 as $val) {
                        if (!$myotehraccountclientcode2) {
                            $myotehraccountclientcode2 = $val->code;
                        } else {
                            $myotehraccountclientcode2 = $myotehraccountclientcode2 . "," . $val->code;
                        }
                    }
                }
                if ($myotehraccountclientcode) {
                    $myaccountclientcode = $myaccountclientcode . ',' . $myotehraccountclientcode;
                }
                if ($myotehraccountclientcode2) {
                    $myaccountclientcode = $myaccountclientcode . ',' . $myotehraccountclientcode2;
                }

                $assd_no = $myaccountclientcode;
                $start = Carbon::now()->subYears(3)->toDateString();
                $end = Carbon::now()->toDateString();
                $SecurityCode = sha1("cocogenAPI" . ":" . "cocogenAPI" . ":" . $assd_no);
                $client = new Client();
                $res = $client->request('POST', 'http://webapi.cocogen.ph/api/epolicy/get/policy/per/client', [
                    'form_params' => [
                        'Username' => 'cocogenAPI',
                        'SecurityCode' => $SecurityCode,
                        'assd_no' => $assd_no,
                        'start' => $start,
                        'end' => $end,
                    ]
                ]);

                $contentsproduction = $res->getBody()->getContents();
                $dataclient = json_decode($contentsproduction, true);

                if (empty($dataclient["TErrorMsg"])) {
                    foreach ($dataclient as $item) {

                        $status_payment = $item['payment_status'];
                        if (strpos($item['payment_status'], "NOT FULLY PAID") !== FALSE) {
                            $status_payment = "NO PAYMENT";
                        }
                        $collection->push((object) [
                            'policy_no' => (string) $item['policy_no'],
                            'class' => $item['class'],
                            'line_cd' => $item['line_cd'],
                            'issue_date' => $item['issue_date'],
                            'start_date' => $item['start_date'],
                            'end_date' => $item['end_date'],
                            'assured_id' => $item['assured_id'],
                            'assured_name' => $item['assured_name'],
                            'email_address' => $item['email_address'],
                            'contact_no' => $item['contact_no'],
                            'address1' => $item['address1'],
                            'address2' => $item['address2'],
                            'address3' => $item['address3'],
                            "assd_tin" => $item['assd_tin'],
                            "agent_id" => $item['agent_id'],
                            "agent_name" => $item['agent_name'],
                            "temp_pol_no" => $item['temp_pol_no'],
                            "line_name" => $item['line_name'],
                            "last_name" => $item['last_name'],
                            "first_name" => $item['first_name'],
                            "middle_initial" => $item['middle_initial'],
                            "bill_no" => $item['bill_no'],
                            "gross_premium" => $item['gross_premium'],
                            "pd_amt" => $item['pd_amt'],
                            "unpaid" => $item['unpaid'],
                            "payment_status" => $status_payment,
                            "tsi_amt" => $item['tsi_amt'],
                            "prem_amt" => $item['prem_amt'],
                            "currency_type" => $item['currency_type'],
                            "dst" => $item['dst'],
                            "lgt" => $item['lgt'],
                            "fst" => $item['fst'],
                            "vat" => $item['vat'],
                            "prem_tax" => $item['prem_tax'],
                            "other_taxes" => $item['other_taxes'],
                        ]);
                    }
                }


                if ($request->searchPolicy) {
                    $collection = $collection->filter(function ($item) use ($request) {
                        return false !== stristr($item->policy_no, $request->searchPolicy) ||
                            false !== stristr($item->class, $request->searchPolicy) ||
                            false !== stristr($item->assured_id, $request->searchPolicy) ||
                            false !== stristr($item->issue_date, $request->searchPolicy) ||
                            false !== stristr($item->start_date, $request->searchPolicy) ||
                            false !== stristr($item->start_date, $request->searchPolicy) ||
                            false !== stristr($item->assured_name, $request->searchPolicy);
                    });
                }

                $selectPolicy = '';
                $all = "";
                $paid = "";
                $cancelled = "";
                $pending = "";
                if ($collection) {
                    $all = $collection->count();
                    $paid = $collection->where('payment_status', 'PAID')->count();
                    $cancelled = $collection->where('payment_status', 'CANCELLED')->count();
                    $pending = $collection->where('payment_status', 'NO PAYMENT')->count();
                }

                if ($request->selectPolicy) {
                    if ($request->selectPolicy === 'paid') {
                        $selectPolicy = 'PAID';
                    } else if ($request->selectPolicy === 'pending') {
                        $selectPolicy = 'NO PAYMENT';
                    } else {
                        $selectPolicy = 'CANCELLED';
                    }

                    $collection = $collection->where('payment_status', $selectPolicy);
                }


            } else {
                $cocogen_epolicy_dtl_client = "";
            }
        }

        $date = date("F d, Y", strtotime("+8 hours"));
        $datas = "";
        if ($collection) {
            $datas = $collection->toArray();
        }
        $searchText = "";
        if ($request->searchPolicy) {
            $searchText = $request->searchPolicy;
        }
        return view('home.showBrowser', [
            'title' => $title,
            'cocogen_epolicy_dtl_clients' => $cocogen_epolicy_dtl_client,
            'transID4' => $transID4,
            'datas' => $datas,
            'searchText' => $searchText,
            'date' => $date,
            'selectPolicy' => $selectPolicy,
        ]);
    }
}
