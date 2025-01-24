<?php

namespace App\Http\Controllers;
use App\Models\cocogen_quotation_batch_trans;
use App\Models\cocogen_api_users;
use Illuminate\Http\Request;
use Session;
use App\Models\cocogen_epartnerhub_notificatons;

class BatchUploadingAPI extends Controller
{
    public function updateResponse(Request $request)
    {
        $userID = $request->get('Username');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
    	//generate security code
        $SecurityCode = sha1($userID.":". $cocogen_api_users[0]['password'] .":". $request->get('transID'));
        info($SecurityCode);

        if($SecurityCode === $request->get('SecurityCode')){
            $motor = cocogen_quotation_batch_trans::find($request->get('transID'));

            $incept = date("Y-m-d");
            $expiry=date('Y-m-d', strtotime('+1 year'));
            
            if ($motor) {
                if($request->get('type') === "created"){
                    $motor->response_issCd = $request->get('issCd');
                    $motor->response_policyNo = $request->get('policyNo');
                    $motor->response_policyId = $request->get('policyId');
                    $motor->response_premSeqNo = $request->get('premSeqNo');
                    $motor->inceptDate = $incept;
                    $motor->expiryDate = $expiry;
                    $motor->status = "Issued";

                    $cocogen_quotation_batch_trans = cocogen_quotation_batch_trans::where('id', '=',$request->get('transID'))->get();
                    if(count($cocogen_quotation_batch_trans)>0){
                        $entrydate=date('Y-m-d', strtotime('+8 hours'));
                        $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
                        $cocogen_epartnerhub_notificatons->name = "Issued - ".$cocogen_quotation_batch_trans[0]['trans_no'];
                        $cocogen_epartnerhub_notificatons->description = $cocogen_quotation_batch_trans[0]['trans_no'] .' is issued with the policies '. $request->get('policyNo').'.';
                        $cocogen_epartnerhub_notificatons->link = 'quotation/view/batch/' . $cocogen_quotation_batch_trans[0]['trans_no'];
                        $cocogen_epartnerhub_notificatons->status = "Unread";
                        $cocogen_epartnerhub_notificatons->email = $cocogen_quotation_batch_trans[0]['created_by'];
                        $cocogen_epartnerhub_notificatons->created_at = $entrydate;
                        $cocogen_epartnerhub_notificatons->updated_at = $entrydate;
                        $cocogen_epartnerhub_notificatons->save();
                    }


                }else{
                    $motor->webResponce = $request->get('APIFailedresponse');
                    $motor->status = "Incomplete";

                    $cocogen_quotation_batch_trans = cocogen_quotation_batch_trans::where('id', '=',$request->get('transID'))->get();
                    if(count($cocogen_quotation_batch_trans)>0){
                        $entrydate=date('Y-m-d', strtotime('+8 hours'));
                        $cocogen_epartnerhub_notificatons = new cocogen_epartnerhub_notificatons;
                        $cocogen_epartnerhub_notificatons->name = "Issued - ".$cocogen_quotation_batch_trans[0]['trans_no'];
                        $cocogen_epartnerhub_notificatons->description = $cocogen_quotation_batch_trans[0]['trans_no'] .' incomplete processing in issuance.';
                        $cocogen_epartnerhub_notificatons->link = 'quotation/view/batch/' . $cocogen_quotation_batch_trans[0]['trans_no'];
                        $cocogen_epartnerhub_notificatons->status = "Unread";
                        $cocogen_epartnerhub_notificatons->email = $cocogen_quotation_batch_trans[0]['created_by'];
                        $cocogen_epartnerhub_notificatons->created_at = $entrydate;
                        $cocogen_epartnerhub_notificatons->updated_at = $entrydate;
                        $cocogen_epartnerhub_notificatons->save();
                    }
                }
             
              $motor->save();
            }
        }else{
            $response['TErrorMsg'] = "Invalid Security Code!";
            return response()->json($response, 201);
        }
    }
}
