<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_api_users;
use App\Models\cocogen_onlinepayments_dtl;

class onlinepaymentAPI extends Controller
{
    public function getPaymentData(Request $request){
        $userID = $request->get('userID');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
        $digest = sha1($userID.":".$cocogen_api_users[0]['password'] .":".$request->get('from').":".$request->get('to'));

        $messageError = "";
        if($request->get('SecurityCode') === $digest){
            //Check New/Renewal if null
            if(empty($request->get('from'))){                
                $messageError = "From is required!";  
            }
            //Check New/Renewal format if valid
            if(empty($request->get('to'))){
                    if($messageError){
                        $messageError = $messageError.":"."To is required!";  
                    }else{
                        $messageError = "To is required!";                        
                    }
                               
            }


            if($messageError){
                $message =  explode( ':', $messageError ) ;
                $response['TErrorMsg'] = $message;
                $response['TStatus'] = "Data Error";
                return response()->json($response, 201);
            }
            $data =  cocogen_onlinepayments_dtl::select('cocogen_onlinepayments_dtl.id','cocogen_onlinepayments.tnxid'
                                                                  ,'cocogen_onlinepayments.name'
                                                                  ,'cocogen_onlinepayments_dtl.policyNo'
                                                                  ,'cocogen_onlinepayments_dtl.invoiceNo'
                                                                  ,'cocogen_onlinepayments_dtl.amount'
                                                                  ,'cocogen_onlinepayments.contactNo'
                                                                  ,'cocogen_onlinepayments.emailAddress'
                                                                  ,'cocogen_onlinepayments.status'
                                                                  ,'cocogen_onlinepayments.created_at')
                                                                ->leftJoin('cocogen_onlinepayments', 'cocogen_onlinepayments.id', '=', 'cocogen_onlinepayments_dtl.pay_id')
                                                                ->where('cocogen_onlinepayments.created_at', '>',$request->get('from'))
                                                                ->where('cocogen_onlinepayments.created_at', '<',$request->get('to'))
                                                                ->get();
            //$data = cocogen_onlinepayments_dtl::select('id','policyNo', 'invoiceNo', 'amount', 'created_at')->where('created_at', '>',$request->get('from'))->where('created_at', '<',$request->get('to'))->get();     
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($data, 201);  


        }else{
            $response['TErrorMsg'] = $digest;
            //$response['TErrorMsg'] = "Incorrect  Security Code!";
            $response['TStatus'] = "Data Error";
            return response()->json($response, 201);  
        }
        
  
    }
}
