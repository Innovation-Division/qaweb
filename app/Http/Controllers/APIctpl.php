<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cocogen_api_ctpl_trans;
use App\Models\cocogen_api_users;
use App\Models\cocogen_admin_footer;
use App\Models\cocogen_admin_productlink;
use App\Models\cocogen_admin_main;
use App\Models\cocogen_admin_submain;
use App\Models\cocogen_admin_subchild;
use App\Models\cocogen_meta;
use DateTime;
use SoapClient;
use App\Models\cocogen_api_policy_no;
use App\Models\cocogen_api_test;
use App\Models\cocogen_api_ctpl_plate_format;
use App\Models\cocogen_api_ctpl_mvtype_format;

class APIctpl extends Controller
{



    
    public function createCTPL(Request $request){
    	//get userdata
    	$userID = $request->get('userID');
        $cocogen_api_users = cocogen_api_users::where('name', '=',$userID)->get();
        
        if(count($cocogen_api_users) > 0 ){
        }else{
            $response['TErrorMsg'] = "Invalid userid!";
            return response()->json($response, 201);
        }
    	//generate security code
    	$digest = sha1($userID.":".$cocogen_api_users[0]['password'] .":".$request->get('CEmail').":".$request->get('TTransNum'));
        // dd($digest);
	     //dd($request->get('SecurityCode'),$digest,$userID.":".$cocogen_api_users[0]['password'] .":".$request->get('CEmail').":".$request->get('TTransNum'));
         //dd($request,$digest,$request->get('SecurityCode'));
        $messageError = "";
    	//check if digest is correct

       

    	if($request->get('SecurityCode') === $digest){
    		//Check New/Renewal if null
 
    		if(empty($request->get('NewRenewal'))){                
	        	$messageError = "NewRenewal is required!";  
    		}
    		//Check New/Renewal format if valid
    		if(!empty($request->get('NewRenewal'))){
    			if($request->get('NewRenewal') === "R" || $request->get('NewRenewal') === "N"){
    			}else{                    
                    if($messageError){
                        $messageError = $messageError.":"."NewRenewal is required!";  
                    }else{
                        $messageError = "New/Renewal is invalid!";                        
                    }
    			}	        	
    		}

			//Check Incept Date if null
    		if(empty($request->get('InceptionDate'))){
                if($messageError){
                    $messageError = $messageError.":"."Incept date is required!";  
                }else{
                    $messageError = "Incept date is required!";                        
                }
    		}

    		//Incept Date validation format: Y-m-d sampple -2012-02-29
    		if(!empty($request->get('InceptionDate'))){
    			$result_incept = $this->validateDate($request->get('InceptionDate'));
    			if($result_incept === false){
                    if($messageError){
                        $messageError = $messageError.":"."Incept date format is invalid!";  
                    }else{
                        $messageError = "Incept date format is invalid!";                        
                    }
				}	        	
    		}

    		//Check expiry Date if null
    		if(empty($request->get('ExpiryDate'))){
                if($messageError){
                    $messageError = $messageError.":"."Expiry date is required!";  
                }else{
                    $messageError = "Expiry date is required!";                        
                }
    		}

    		//Expiry Date validation format: Y-m-d sampple -2012-02-29
    		if(!empty($request->get('ExpiryDate'))){
    			$result_expiry = $this->validateDate($request->get('ExpiryDate'));
    			if($result_expiry === false){
                    if($messageError){
                        $messageError = $messageError.":"."Expiry date format is invalid!";  
                    }else{
                        $messageError = "Expiry date format is invalid!";                        
                    }
				}	        	
    		}

    		
            //check if client type is null
            if(empty($request->get('ClientType'))){
                 if($messageError){
                        $messageError = $messageError.":"."ClientType is required!";  
                    }else{
                        $messageError = "ClientType is required!";                        
                    }
            }

            if(!empty($request->get('ClientType'))){
                if(strlen($request->get('ClientType')) > 1){
                    if($messageError){
                        $messageError = $messageError.":"."Client Type should not exceed 1 characters!";  
                    }else{
                        $messageError = "Client Type should not exceed 1 characters!";                        
                    }
                }else{
                    if(($request->get('ClientType') == "I") || ($request->get('ClientType') == "i") ){
                        //Check First name if exceed 100 char
                        if(!empty($request->get('CFName'))){
                            if(strlen($request->get('CFName')) > 100){
                                if($messageError){
                                    $messageError = $messageError.":"."First name should not exceed 100 characters!";  
                                }else{
                                    $messageError = "First name should not exceed 100 characters!";                        
                                }
                            }               
                        }

                        //Check First Name if null
                        if(empty($request->get('CFName'))){
                                if($messageError){
                                    $messageError = $messageError.":"."First name is required!";  
                                }else{
                                    $messageError = "First name is required!";                        
                                }
                        }


                        //Check Last Name if null
                        if(empty($request->get('CLName'))){
                                if($messageError){
                                    $messageError = $messageError.":"."Last Name is required!";  
                                }else{
                                    $messageError = "Last Name is required!";                        
                                }
                        }

                        //Check Last name if exceed 100 char
                        if(!empty($request->get('CLName'))){
                            if(strlen($request->get('CLName')) > 100){
                                if($messageError){
                                    $messageError = $messageError.":"."Last Name Should not exceed 100 characters!";  
                                }else{
                                    $messageError = "Last Name Should not exceed 100 characters!";                        
                                }
                            }               
                        }

                        //Check Middle Name if null
                        if(empty($request->get('CMName'))){
                            if($messageError){
                                $messageError = $messageError.":"."Middle name is required!";  
                            }else{
                                $messageError = "Middle name is required!";                        
                            }
                        }

                        //Check Middle name if exceed 100 char
                        if(!empty($request->get('CMName'))){
                            if(strlen($request->get('CMName')) > 100){
                                if($messageError){
                                    $messageError = $messageError.":"."Middle name should not exceed 100 characters!";  
                                }else{
                                    $messageError = "Middle name should not exceed 100 characters!";                        
                                }
                            }               
                        }
                    }elseif(($request->get('ClientType') == "C") || ($request->get('ClientType') == "c") ){
                        //Check First Name if null
                        if(empty($request->get('CorporateName'))){
                            if($messageError){
                                $messageError = $messageError.":"."Corporate name is required!";  
                            }else{
                                $messageError = "Corporate name is required!";                        
                            }
                        }
                    }else{
                        if($messageError){
                            $messageError = $messageError.":"."Incorrect format for client type!";  
                        }else{
                            $messageError = "Incorrect format for client type!";                        
                        }
                    }
                }     
            }


    		

                     
    		//Check Contact No if null
    		if(empty($request->get('CContactNumber'))){
                if($messageError){
                    $messageError = $messageError.":"."Contact no. is required!";  
                }else{
                    $messageError = "Contact no. is required!";                        
                }
    		}

    		//Check Contact No if exceed 100 char
    		if(!empty($request->get('CContactNumber'))){
                if(strlen($request->get('CContactNumber')) > 100){
                    if($messageError){
                        $messageError = $messageError.":"."Contact no. should not exceed 100 characters!";  
                    }else{
                        $messageError = "Contact no. should not exceed 100 characters!";                        
                    }
    			}	        	
    		}

    		//Check Contact No if null
    		if(empty($request->get('CEmail'))){
                if($messageError){
                    $messageError = $messageError.":"."Email is required!";  
                }else{
                    $messageError = "Email is required!";                        
                }
    		}

    		//Check email if valid
    		if(!empty($request->get('CEmail'))){
    			$result_email = filter_var( $request->get('CEmail'), FILTER_VALIDATE_EMAIL );					
    			if($result_email === false){
                    if($messageError){
                        $messageError = $messageError.":"."Email format is invalid!";  
                    }else{
                        $messageError = "Email format is invalid!";                        
                    }
    			}    	
    			if(strlen($request->get('CEmail')) > 100){
                    if($messageError){
                        $messageError = $messageError.":"."Email should not exceed 100 characters!";  
                    }else{
                        $messageError = "Email should not exceed 100 characters!";                        
                    }
    			}	  
    		}

    		//Check CBDate if null
    		if(empty($request->get('CBDate'))){
                if($messageError){
                    $messageError = $messageError.":"."Birthdate is required!";  
                }else{
                    $messageError = "Birthdate is required!";                        
                }
    		}

    		//Expiry Date validation format: Y-m-d sampple -2012-02-29
    		if(!empty($request->get('CBDate'))){
    			$result_expiry = $this->validateDate($request->get('CBDate'));
    			if($result_expiry === false){
                    if($messageError){
                        $messageError = $messageError.":"."Birthdate format is invalid!";  
                    }else{
                        $messageError = "Birthdate format is invalid!";                        
                    }
				}	        	
    		}

    		//Check CTIN No if null
    		if(empty($request->get('CTIN'))){
                if($messageError){
                    $messageError = $messageError.":"."TIN No is required!";  
                }else{
                    $messageError = "TIN No is required!";                        
                }
    		}

    		//Check CTIN No if exceed 100 char
    		if(!empty($request->get('CTIN'))){
    			if(strlen($request->get('CTIN')) > 100){
                    if($messageError){
                        $messageError = $messageError.":"."TIN No should not exceed 100 characters!";  
                    }else{
                        $messageError = "TIN No should not exceed 100 characters!";                        
                    }
    			}	        	
    		}

    		//Check CMaddress No if null
    		if(empty($request->get('CMaddress'))){
                if($messageError){
                    $messageError = $messageError.":"."Address is required!";  
                }else{
                    $messageError = "Address is required!";                        
                }
    		}

    		//Check CMaddress if exceed 100 char
            //Check CMaddress if exceed 100 char
    		if(!empty($request->get('CMaddress'))){
                if(strlen($request->get('CMaddress')) > 10000){
                    if($messageError){
                        $messageError = $messageError.":"."Address should not exceed 10,000 characters!";  
                    }else{
                        $messageError = "Address should not exceed 10,000 characters!";                        
                    }
                }                   				        	
    		}    		

   		//Check VMVtype No if null
    		if(empty($request->get('VMVtype'))){
                if($messageError){
                    $messageError = $messageError.":"."MV Type is required!";  
                }else{
                    $messageError = "MV Type is required!";                        
                } 
    		}

    		//Check VMVtype if exceed 100 char
    		if(!empty($request->get('VMVtype'))){
    			if(strlen($request->get('VMVtype')) > 3){
                    if($messageError){
                        $messageError = $messageError.":"."MV Type should not exceed 3 characters!";  
                    }else{
                        $messageError = "MV Type should not exceed 3 characters!";                        
                    } 
    			}	        	
    		}

    		//Check VPremType No if null
    		if(empty($request->get('VPremType'))){
                if($messageError){
                    $messageError = $messageError.":"."Premium Type is required!";  
                }else{
                    $messageError = "Premium Type is required!";                        
                } 
    		}

    		//Check VPremType if exceed 100 char
    		if(!empty($request->get('VPremType'))){
    			if(strlen($request->get('VPremType')) > 3){
                    if($messageError){
                        $messageError = $messageError.":"."Premium Type should not exceed 3 characters!";  
                    }else{
                        $messageError = "Premium Type should not exceed 3 characters!";                        
                    } 
    			}

    			if(!is_numeric($request->get('VPremType'))){
                    if($messageError){
                        $messageError = $messageError.":"."Premium Type should not exceed 3 characters!";  
                    }else{
                        $messageError = "Premium Type should not exceed 3 characters!";                        
                    } 
    			}	
    		}

    		//Check VPremium No if null
    		if(empty($request->get('VPremium'))){
                if($messageError){
                    $messageError = $messageError.":"."Premium is required!";  
                }else{
                    $messageError = "Premium is required!";                        
                } 
    		}

    		//Check VPremium if exceed 100 char
    		if(!empty($request->get('VPremium'))){
        		$premiumnocomma = str_replace( ",", "",$request->get('VPremium'));
    			if(!is_numeric($premiumnocomma)){
                    if($messageError){
                        $messageError = $messageError.":"."Premium format is invalid!";  
                    }else{
                        $messageError = "Premium format is invalid!";                        
                    } 
    			}	        	
    		}

    		//Check VNYear No if null
    		if(empty($request->get('VNYear'))){
                if($messageError){
                    $messageError = $messageError.":"."Year is required!";  
                }else{
                    $messageError = "Year is required!";                        
                } 
    		}
    		//Check VNYear if exceed 4 char
    		if(!empty($request->get('VNYear'))){
    			if(!is_numeric($request->get('VNYear'))){
                    if($messageError){
                        $messageError = $messageError.":"."Year format is invalid!";  
                    }else{
                        $messageError = "Year format is invalid!";                        
                    } 
    			}
    			if(strlen($request->get('VNYear')) === 4){    				
    			}else{
                    if($messageError){
                        $messageError = $messageError.":"."Year Should be 4 characters!";  
                    }else{
                        $messageError = "Year Should be 4 characters!";                        
                    } 
    			}		    	
    		}

    		//Check Vmake No if null
    		if(empty($request->get('Vmake'))){
                if($messageError){
                    $messageError = $messageError.":"."Make is required!";  
                }else{
                    $messageError = "Make is required!";                        
                } 
    		}

    		//Check Vmake if exceed 500 char
    		if(!empty($request->get('Vmake'))){
    			if(strlen($request->get('Vmake')) > 500){
                    if($messageError){
                        $messageError = $messageError.":"."Make should not exceed 500 characters!";  
                    }else{
                        $messageError = "Make should not exceed 500 characters!";                        
                    } 
    			}	
    		}

    		if($request->get('NewRenewal') === "R"){
				//Check VMVNumber No if null
	    		if(empty($request->get('VMVNumber'))){
                    if($messageError){
                        $messageError = $messageError.":"."MV File No is required!";  
                    }else{
                        $messageError = "MV File No is required!";                        
                    } 
	    		}

	    		//Check VMVNumber if exceed 4 char
	    		if(!empty($request->get('VMVNumber'))){
	    			if(!is_numeric($request->get('VMVNumber'))){
                        if($messageError){
                            $messageError = $messageError.":"."MV File No format is invalid!";  
                        }else{
                            $messageError = "MV File No format is invalid!";                        
                        } 
	    			}
	    			if(strlen($request->get('VMVNumber')) === 15){    				
	    			}else{
                        if($messageError){
                            $messageError = $messageError.":"."MV File No should be 15 characters!";  
                        }else{
                            $messageError = "MV File No should be 15 characters!";                        
                        } 
	    			}		    	
    			}
			}    		

    		//Check VChassis No if null
    		if(empty($request->get('VChassis'))){
                if($messageError){
                    $messageError = $messageError.":"."Chassis No is required!";  
                }else{
                    $messageError = "Chassis No is required!";                        
                }
    		}

    		//Check VChassis if exceed 500 char
    		if(!empty($request->get('VChassis'))){
    			if(strlen($request->get('VChassis')) > 100){
                    if($messageError){
                        $messageError = $messageError.":"."Chassis No should not exceed 100 characters!";  
                    }else{
                        $messageError = "Chassis No should not exceed 100 characters!";                        
                    }
    			}	        	
    		}

			if($request->get('NewRenewal') === "R"){
				//Check VPlate No if null
	    		if(empty($request->get('VPlate'))){
                    if($messageError){
                        $messageError = $messageError.":"."Plate No is required!";  
                    }else{
                        $messageError = "Plate No is required!";                        
                    }
	    		}

	    		//Check VPlate if exceed 500 char
	    		if(!empty($request->get('VPlate'))){
	    			if(strlen($request->get('VPlate')) > 100){
                        if($messageError){
                            $messageError = $messageError.":"."Plate No should not exceed 100 characters!";  
                        }else{
                            $messageError = "Plate No should not exceed 100 characters!";                        
                        }
	    			}	        	
	    		}
			}
    		

    		//Check VPlate No if null
    		if(empty($request->get('VEngine'))){
                if($messageError){
                    $messageError = $messageError.":"."Engine No is required!";  
                }else{
                    $messageError = "Engine No is required!";                        
                }
    		}

    		//Check VEngine if exceed 500 char
    		if(!empty($request->get('VEngine'))){
    			if(strlen($request->get('VEngine')) > 100){
                    if($messageError){
                        $messageError = $messageError.":"."Engine No should not exceed 100 characters!";  
                    }else{
                        $messageError = "Engine No should not exceed 100 characters!";                        
                    }
    			}	        	
    		}

    		//Check TTransNum No if null
    		if(empty($request->get('TTransNum'))){
                if($messageError){
                    $messageError = $messageError.":"."Transaction no. is required!";  
                }else{
                    $messageError = "Transaction no. is required!";                        
                }
    		}

    		//Check TTransNum if exceed 100 char
    		if(!empty($request->get('TTransNum'))){
    			if(strlen($request->get('TTransNum')) > 100){  
                    if($messageError){
                        $messageError = $messageError.":"."Transaction no should not be exceed 100 characters!";  
                    }else{
                        $messageError = "Transaction no should not be exceed 100 characters!";                        
                    }
    			}		    	
    		}


            // if(!empty($request->get('plateTag'))){
            //     if($request->get('plateTag') === "N"){

            //     }else{
            //         if($request->get('NewRenewal') === "R"){
            //             if(count($request->get('VPlate')) > 0){
            //                 $cocogen_api_ctpl_mvtype_format = cocogen_api_ctpl_mvtype_format::get();  
            //                 $dateINEX = "";
            //                 foreach ($cocogen_api_ctpl_mvtype_format as $cocogen_api_ctpl_mvtype_formatkey) {
            //                     if($request->get('VMVtype') === $cocogen_api_ctpl_mvtype_formatkey->mvtype){

            //                         $first = substr($request->get('VPlate'), 0, 1);
            //                         $second = substr($request->get('VPlate'), 1, 1);
            //                         $third = substr($request->get('VPlate'), 2, 1);
            //                         $fourth = substr($request->get('VPlate'), 3, 1);
            //                         $fifith = substr($request->get('VPlate'), 4, 1);
            //                         $six = substr($request->get('VPlate'), 5, 1);

            //                         $barfirst = "";
            //                         $barsecond = "";
            //                         $barthird = "";
            //                         $barfourth = "";
            //                         $barfifth = "";
            //                         $barsix = "";
                                    
            //                         if(is_numeric($first)){
            //                              $barfirst = "N";
            //                         }else{
            //                              $barfirst = "X";
            //                         }

            //                         if(is_numeric($second)){
            //                              $barsecond = "N";
            //                         }else{
            //                              $barsecond = "X";
            //                         }

            //                         if(is_numeric($third)){
            //                              $barthird = "N";
            //                         }else{
            //                              $barthird = "X";
            //                         }

            //                         if(is_numeric($fourth)){
            //                              $barfourth = "N";
            //                         }else{
            //                              $barfourth = "X";
            //                         }

            //                         if(is_numeric($fifith)){
            //                              $barfifth = "N";
            //                         }else{
            //                              $barfifth = "X";
            //                         }

            //                         if(is_numeric($six)){
            //                              $barsix = "N";
            //                         }else{
            //                              $barsix = "X";
            //                         }

            //                        $cocogen_api_ctpl_plate_format = cocogen_api_ctpl_plate_format::where('mvtype', '=',$request->get('VMVtype'))->get();  
            //                         $finalformat = $barfirst . $barsecond . $barthird . $barfourth . $barfifth . $barsix;

            //                         $numberformat = "";
            //                         if(count($cocogen_api_ctpl_plate_format) > 0){
            //                             foreach ($cocogen_api_ctpl_plate_format as $key) {
            //                                if($key->format === $finalformat){
            //                                     $numberformat = $key->index_no;
            //                                }
            //                             }
            //                         }
            //                         if ((int)$numberformat === 1) {
            //                             $dateINEX = substr($request->get('VPlate'), 0, 1);
            //                         }elseif ((int)$numberformat === 2) {
            //                             $dateINEX = substr($request->get('VPlate'), 1, 1); 
            //                         }elseif ((int)$numberformat === 3) {
            //                             $dateINEX = substr($request->get('VPlate'), 2, 1); 
            //                         }elseif ((int)$numberformat === 4) {
            //                             $dateINEX = substr($request->get('VPlate'), 3, 1); 
            //                         }elseif ((int)$numberformat === 5) {
            //                             $dateINEX = substr($request->get('VPlate'), 4, 1); 
            //                         }else{
            //                             $dateINEX = substr($request->get('VPlate'), 5, 1); 
            //                         }

            //                        // dd($finalformat,$numberformat,$dateINEX,$barfirst,$barsecond,$barthird,$barfourth,$barfifth,$barsix,$first,$second,$third,$fourth ,$fifith,$six );
            //                        //dd($finalformat,$numberformat,$dateINEX);
            //                     }
            //                 }
            //                 if(empty($dateINEX)){
            //                     $dateINEX = substr($request->get('VPlate'), -1); 
            //                 }

            //                 if($dateINEX == 1){
            //                     $inceptionDate = "02/01/" . date('Y');
            //                     $expiryDate = "02/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 2) {
            //                     $inceptionDate = "03/01/" . date('Y');
            //                     $expiryDate = "03/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 3) {
            //                     $inceptionDate = "04/01/" . date('Y');
            //                     $expiryDate = "04/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 4) {
            //                     $inceptionDate = "05/01/" . date('Y');
            //                     $expiryDate = "05/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 5) {
            //                     $inceptionDate = "06/01/" . date('Y');
            //                     $expiryDate = "06/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 6) {
            //                     $inceptionDate = "07/01/" . date('Y');
            //                     $expiryDate = "07/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 7) {
            //                     $inceptionDate = "08/01/" . date('Y');
            //                     $expiryDate = "08/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 8) {
            //                     $inceptionDate = "09/01/" . date('Y');
            //                     $expiryDate = "09/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 9) {
            //                     $inceptionDate = "10/01/" . date('Y');
            //                     $expiryDate = "10/01/" . date('Y',strtotime('+1 years'));
            //                 }elseif ($dateINEX == 0) {
            //                     $inceptionDate = "11/01/" . date('Y');
            //                     $expiryDate = "11/01/" . date('Y',strtotime('+1 years'));
            //                 }else{
            //                     $inceptionDate = "01/01/" . date('Y');
            //                     $expiryDate = "01/01/" . date('Y',strtotime('+1 years'));
            //                 }

            //                 $ERAinceptionDate = date("m/d/Y", strtotime($request->get('InceptionDate')));
            //                 $ERAExpiryDate = date("m/d/Y", strtotime($request->get('ExpiryDate')));

            //                 if($ERAinceptionDate === $inceptionDate){
            //                 }else{
            //                     if($messageError){
            //                         $messageError = $messageError.":"."Incept date should be ".$inceptionDate;
            //                     }else{
            //                         $messageError = "Incept date should be ".$inceptionDate;                      
            //                     }
            //                 }

            //                 if($ERAExpiryDate === $expiryDate){
            //                 }else{
            //                     if($messageError){
            //                         $messageError = $messageError.":"."Expiry date should be " .$expiryDate;
            //                     }else{
            //                         $messageError = "Expiry date should be " .$expiryDate;                      
            //                     }
            //                 }
                                
            //             }    
            //         }
            //     }
            // }else{


            //     if($request->get('NewRenewal') === "R"){
            //         if(count($request->get('VPlate')) > 0){

            //             $cocogen_api_ctpl_mvtype_format = cocogen_api_ctpl_mvtype_format::get();  
            //             $dateINEX = "";
            //             foreach ($cocogen_api_ctpl_mvtype_format as $cocogen_api_ctpl_mvtype_formatkey) {
            //                 if($request->get('VMVtype') === $cocogen_api_ctpl_mvtype_formatkey->mvtype){

            //                     $first = substr($request->get('VPlate'), 0, 1);
            //                     $second = substr($request->get('VPlate'), 1, 1);
            //                     $third = substr($request->get('VPlate'), 2, 1);
            //                     $fourth = substr($request->get('VPlate'), 3, 1);
            //                     $fifith = substr($request->get('VPlate'), 4, 1);
            //                     $six = substr($request->get('VPlate'), 5, 1);

            //                     $barfirst = "";
            //                     $barsecond = "";
            //                     $barthird = "";
            //                     $barfourth = "";
            //                     $barfifth = "";
            //                     $barsix = "";
                                
            //                     if(is_numeric($first)){
            //                          $barfirst = "N";
            //                     }else{
            //                          $barfirst = "X";
            //                     }

            //                     if(is_numeric($second)){
            //                          $barsecond = "N";
            //                     }else{
            //                          $barsecond = "X";
            //                     }

            //                     if(is_numeric($third)){
            //                          $barthird = "N";
            //                     }else{
            //                          $barthird = "X";
            //                     }

            //                     if(is_numeric($fourth)){
            //                          $barfourth = "N";
            //                     }else{
            //                          $barfourth = "X";
            //                     }

            //                     if(is_numeric($fifith)){
            //                          $barfifth = "N";
            //                     }else{
            //                          $barfifth = "X";
            //                     }

            //                     if(is_numeric($six)){
            //                          $barsix = "N";
            //                     }else{
            //                          $barsix = "X";
            //                     }

            //                     $cocogen_api_ctpl_plate_format = cocogen_api_ctpl_plate_format::where('mvtype', '=',$request->get('VMVtype'))->get();  
            //                     $finalformat = $barfirst . $barsecond . $barthird . $barfourth . $barfifth . $barsix;

            //                     $numberformat = "";
            //                     if(count($cocogen_api_ctpl_plate_format) > 0){
            //                         foreach ($cocogen_api_ctpl_plate_format as $key) {
            //                            if($key->format === $finalformat){
            //                                 $numberformat = $key->index_no;
            //                            }
            //                         }
            //                     }
                               
            //                     if ((int)$numberformat === 1) {
            //                         $dateINEX = substr($request->get('VPlate'), 0, 1);
            //                     }elseif ((int)$numberformat === 2) {
            //                         $dateINEX = substr($request->get('VPlate'), 1, 1); 
            //                     }elseif ((int)$numberformat === 3) {
            //                         $dateINEX = substr($request->get('VPlate'), 2, 1); 
            //                     }elseif ((int)$numberformat === 4) {
            //                         $dateINEX = substr($request->get('VPlate'), 3, 1); 
            //                     }elseif ((int)$numberformat === 5) {
            //                         $dateINEX = substr($request->get('VPlate'), 4, 1); 
            //                     }else{
            //                         $dateINEX = substr($request->get('VPlate'), 5, 1); 
            //                     }

            //                    // dd($finalformat,$numberformat,$dateINEX,$barfirst,$barsecond,$barthird,$barfourth,$barfifth,$barsix,$first,$second,$third,$fourth ,$fifith,$six );
            //                    //dd($finalformat,$numberformat,$dateINEX);
            //                 }
            //             }
            //             if(empty($dateINEX)){
            //                 $dateINEX = substr($request->get('VPlate'), -1); 
            //             }

            //             if($dateINEX == 1){
            //                 $inceptionDate = "02/01/" . date('Y');
            //                 $expiryDate = "02/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 2) {
            //                 $inceptionDate = "03/01/" . date('Y');
            //                 $expiryDate = "03/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 3) {
            //                 $inceptionDate = "04/01/" . date('Y');
            //                 $expiryDate = "04/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 4) {
            //                 $inceptionDate = "05/01/" . date('Y');
            //                 $expiryDate = "05/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 5) {
            //                 $inceptionDate = "06/01/" . date('Y');
            //                 $expiryDate = "06/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 6) {
            //                 $inceptionDate = "07/01/" . date('Y');
            //                 $expiryDate = "07/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 7) {
            //                 $inceptionDate = "08/01/" . date('Y');
            //                 $expiryDate = "08/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 8) {
            //                 $inceptionDate = "09/01/" . date('Y');
            //                 $expiryDate = "09/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 9) {
            //                 $inceptionDate = "10/01/" . date('Y');
            //                 $expiryDate = "10/01/" . date('Y',strtotime('+1 years'));
            //             }elseif ($dateINEX == 0) {
            //                 $inceptionDate = "11/01/" . date('Y');
            //                 $expiryDate = "11/01/" . date('Y',strtotime('+1 years'));
            //             }else{
            //                 $inceptionDate = "01/01/" . date('Y');
            //                 $expiryDate = "01/01/" . date('Y',strtotime('+1 years'));
            //             }

            //             $ERAinceptionDate = date("m/d/Y", strtotime($request->get('InceptionDate')));
            //             $ERAExpiryDate = date("m/d/Y", strtotime($request->get('ExpiryDate')));

            //             if($ERAinceptionDate === $inceptionDate){
            //             }else{
            //                 if($messageError){
            //                     $messageError = $messageError.":"."Incept date should be ".$inceptionDate;
            //                 }else{
            //                     $messageError = "Incept date should be ".$inceptionDate;                      
            //                 }
            //             }

            //             if($ERAExpiryDate === $expiryDate){
            //             }else{
            //                 if($messageError){
            //                     $messageError = $messageError.":"."Expiry date should be " .$expiryDate;
            //                 }else{
            //                     $messageError = "Expiry date should be " .$expiryDate;                      
            //                 }
            //             }
                            
            //         }    
            //     } 
            // }           

 
            if($messageError){
                $message =  explode( ':', $messageError ) ;
                $response['TErrorMsg'] = $message;
                $response['TStatus'] = "Data Error";
                return response()->json($response, 201);
            }

        if($request->get('NewRenewal') === "R"){
            $cocogen_api_ctpl_trans = cocogen_api_ctpl_trans::
                where('mvType', '=',$request->get('VMVtype')) 
                ->where('premType', '=',$request->get('VPremType')) 
                ->where('mvFileNo', '=',$request->get('VMVNumber')) 
                ->where('chassisNo', '=',$request->get('VChassis')) 
                ->where('plateNo', '=',$request->get('VPlate')) 
                ->where('engineNo', '=',$request->get('VEngine')) 
                ->whereYear('InceptDate', '=',date("Y", strtotime($request->get('InceptionDate')))) 
                ->where('status', '=',"Authenticated")->get();  
        }else{
            $cocogen_api_ctpl_trans = cocogen_api_ctpl_trans::
                where('mvType', '=',$request->get('VMVtype'))
                ->where('premType', '=',$request->get('VPremType'))
                ->where('chassisNo', '=',$request->get('VChassis'))
                ->where('engineNo', '=',$request->get('VEngine'))
                ->whereYear('InceptDate', '=',date("Y", strtotime($request->get('InceptionDate')))) 
                ->where('status', '=',"Authenticated")->get();  
        }
        
        if(count($cocogen_api_ctpl_trans) > 0){

            $response['TStatus'] = "Already authenticated!";              
            $response['TAFNumm'] = $cocogen_api_ctpl_trans[0]["afNo"];              
            $response['TTStamp'] = $cocogen_api_ctpl_trans[0]["timestamps_ctpl"];              
            $response['TCOCNum'] = $cocogen_api_ctpl_trans[0]["cocNo"];  
            $response['TPolicyNum'] = $cocogen_api_ctpl_trans[0]["policy_no"];                 
          
            return response()->json($response, 201);
        }
	    $cocogen_api_policy_no = cocogen_api_policy_no::where('userID', '=', $request->get('userID'))->get();
            if(count($cocogen_api_policy_no) > 0){
                $policy = $cocogen_api_policy_no[0]["policy_no"];
                $coc_no = $cocogen_api_policy_no[0]["cocno"];
                $cocid = $cocogen_api_policy_no[0]["id"];
                $username = $cocogen_api_policy_no[0]["isap_username"];
                $password = $cocogen_api_policy_no[0]["isap_password"];
            }else{
                $policy = "";
                $coc_no = "";
                $cocid = "";
                $username = "";
                $password = "";
            }


    		//save to DB
    		$cocogen_api_ctpl_trans = new cocogen_api_ctpl_trans;
    		$cocogen_api_ctpl_trans->type = $request->get('NewRenewal');
    		$cocogen_api_ctpl_trans->cocNo = $coc_no;
    		$cocogen_api_ctpl_trans->transactionNo = $request->get('TTransNum');
    		$cocogen_api_ctpl_trans->status = "Data Verified";
    		$cocogen_api_ctpl_trans->InceptDate = $request->get('InceptionDate');
    		$cocogen_api_ctpl_trans->ExpiryDate = $request->get('ExpiryDate');
    		$cocogen_api_ctpl_trans->firstName = $request->get('CFName');
    		$cocogen_api_ctpl_trans->middleName = $request->get('CMName');
            $cocogen_api_ctpl_trans->lastName = $request->get('CLName');
            $cocogen_api_ctpl_trans->corporateName = $request->get('CorporateName');
    		$cocogen_api_ctpl_trans->clientType = $request->get('ClientType');
    		$cocogen_api_ctpl_trans->address = $request->get('CMaddress');
    		$cocogen_api_ctpl_trans->email = $request->get('CEmail');
    		$cocogen_api_ctpl_trans->tin = $request->get('CTIN');
    		$cocogen_api_ctpl_trans->birthDate = $request->get('CBDate');
    		$cocogen_api_ctpl_trans->contactNo = $request->get('CContactNumber');
    		$cocogen_api_ctpl_trans->mvType = $request->get('VMVtype');
    		$cocogen_api_ctpl_trans->premType = $request->get('VPremType');
    		$cocogen_api_ctpl_trans->premium = $request->get('VPremium');
    		$cocogen_api_ctpl_trans->year = $request->get('VNYear');
    		$cocogen_api_ctpl_trans->make = $request->get('Vmake');
    		$cocogen_api_ctpl_trans->chassisNo = $request->get('VChassis');
    		if($request->get('NewRenewal') === "R"){    			
	    		$cocogen_api_ctpl_trans->mvFileNo = $request->get('VMVNumber');
	    		$cocogen_api_ctpl_trans->plateNo = $request->get('VPlate');
    		}
    		$cocogen_api_ctpl_trans->engineNo = $request->get('VEngine');
    		$cocogen_api_ctpl_trans->userID = $request->get('userID');
    		$cocogen_api_ctpl_trans->save();

    		$latest_id = $cocogen_api_ctpl_trans->id;

            if(($request->get('ClientType') == "I") || ($request->get('ClientType') == "i") ){
                $fullname = $request->get('CFName') ." ".$request->get('CMName')." ".$request->get('CLName');
            }elseif(($request->get('ClientType') == "C") || ($request->get('ClientType') == "c") ){
                $fullname = $request->get('CorporateName');
            }else{
                $fullname = $request->get('CFName') ." ".$request->get('CMName')." ".$request->get('CLName');
            }
                      

    		//Authenticate to ISAP
 			$InceptionDate = date("m/d/Y", strtotime($request->get('InceptionDate')));
 			$ExpiryDate = date("m/d/Y", strtotime($request->get('ExpiryDate')));
    		if($request->get('NewRenewal') == "N"){
                $params = array(
                    "arg0" => array(
                        "username" => $username,
                        "password" => $password,
                        "regType" => "N",
                        "cocNo" => $coc_no,
                        "engineNo" => $request->get('VEngine'),
                        "chassisNo" => $request->get('VChassis'),
                        "inceptionDate" => $InceptionDate,
                        "expiryDate" => $ExpiryDate,
                        "mvType" =>$request->get('VMVtype'),
                        "mvPremType" => $request->get('VPremType'),
                        "taxType" => "1",
                        "assuredName" => $fullname,
                        "assuredTin" => '999-999-999-99999'
                    )
                ); 
            }else{
                $params = array(
                    "arg0" => array(
                        "username" => $username,
                        "password" => $password,
                        "regType" => "R",
                        "cocNo" => $coc_no,
                        "plateNo" => $request->get('VPlate'),
                        "mvFileNo" => $request->get('VMVNumber'),
                        "engineNo" => $request->get('VEngine'),
                        "chassisNo" => $request->get('VChassis'),
                        "inceptionDate" => $InceptionDate,
                        "expiryDate" => $ExpiryDate,
                        "mvType" =>$request->get('VMVtype'),
                        "mvPremType" => $request->get('VPremType'),
                        "taxType" => "1",
                        "assuredName" => $fullname,
                        "assuredTin" => '999-999-999-99999'
                        )
                    );
            }

            $opts = array(
            "ssl" => array(
                // 'ciphers'=>'RC4-SHA',
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
                )               
            );
            $context = stream_context_create($opts);
            // *** END ***
            $client = new SoapClient(env('COC_API_LINK'), array("trace" => true, "stream_context" => $context));  

            $response = $client->__soapCall("register", array($params));
            
        	$datenow = date("Y-m-d H:i:s", strtotime("+8 hours"));

        	//response
            foreach ($response as $responses) {                        
                if(!empty($responses->authNo)){  

                    $authNo = $responses->authNo; 
                    $cocNo = $responses->cocNo; 
                    $premiumType = $responses->premiumType; 
                    $successMessage = $responses->successMessage; 
                    $policyno = "MC-CTPL-". strtoupper($userID)  ."-". date('y') . "-". $latest_id . "-00";

                    $cocogen_api_ctpl_trans = cocogen_api_ctpl_trans::findorFail($latest_id);
                    $cocogen_api_ctpl_trans->status = "Authenticated";
                    $cocogen_api_ctpl_trans->timestamps_ctpl = $datenow;
                    $cocogen_api_ctpl_trans->policy_no = $policyno;
                    $cocogen_api_ctpl_trans->afNo = $authNo;
                    $cocogen_api_ctpl_trans->save();

                    $Response['TStatus'] = "Authenticated";              
                    $Response['TAFNumm'] = $authNo;              
                    $Response['TTStamp'] = $datenow;              
                    $Response['TCOCNum'] = $cocNo;
                    $Response['TPolicyNum'] = $policyno;               
                    $Response['TSuccessMsg'] = $successMessage;
		   
		   if($cocid){
                        $cocfinal = 1 + (int)$coc_no; 
                        $cocfinal = "0". $cocfinal;
                        $cocogen_api_policy_no = cocogen_api_policy_no::findorFail($cocid);
                        $cocogen_api_policy_no->cocno = $cocfinal;                        
                        $cocogen_api_policy_no->save();
                    }	
 
		    return response()->json($Response, 201);
                    
                }else{                        	

                    $errorMessage = $responses->errorMessage; 
                    $Response['TErrorMsg'] = $errorMessage;
                    $Response['TTStamp'] = $datenow;    
		        	$Response['TStatus'] = "Authentication failed";

					$cocogen_api_ctpl_trans = cocogen_api_ctpl_trans::findorFail($latest_id);
                    $cocogen_api_ctpl_trans->timestamps_ctpl = $datenow;
                    $cocogen_api_ctpl_trans->status = "Authentication failed";
                    $cocogen_api_ctpl_trans->errorMessage = $errorMessage;
                    $cocogen_api_ctpl_trans->save();

		        	return response()->json($Response, 201);
                    
                }
            }

    	}else{
        	$response['TErrorMsg'] = "Incorrect Security Code!";
        	$response['TStatus'] = "Data Error";
        	return response()->json($response, 201);  
    	}
        
  
    }

    function validateDate($date, $format = 'Y-m-d')
	{
	    $d = DateTime::createFromFormat($format, $date);
	    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
	    return $d && $d->format($format) === $date;
	}

	public function apitest(){
        $cocogen_admin_footer = cocogen_admin_footer::all(); 
        $cocogen_admin_productlink = cocogen_admin_productlink::where('active', '=', "Y")->orderBy('featuredOrder', 'DESC')->get();
        $cocogen_admin_main = cocogen_admin_main::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_submain = cocogen_admin_submain::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_admin_subchild = cocogen_admin_subchild::where('status', '=', "A")->orderBy('varOrder', 'DESC')->get(); 
        $cocogen_meta = cocogen_meta::where('page', '=', "Feedback")->get();
        $metadescription = $cocogen_meta[0]["description"];
        $keyword = $cocogen_meta[0]["keyword"];
        $title = $cocogen_meta[0]["title"];        
        return view('inquiries.ctplapi', ['title' => $title,'metadescription' => $metadescription,'keyword' => $keyword,'cocogen_admin_main' => $cocogen_admin_main,'cocogen_admin_submain' => $cocogen_admin_submain,'cocogen_admin_subchild' => $cocogen_admin_subchild,'cocogen_admin_productlink' => $cocogen_admin_productlink, 'cocogen_admin_footer'=>$cocogen_admin_footer]);
    }

    public function reportCTPL(Request $request){
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
            
            $data = cocogen_api_ctpl_trans::where('timestamps_ctpl', '>',$request->get('from'))
                                        ->where('timestamps_ctpl', '<',$request->get('to'))
                                        ->where('userID', '=',"petnet")
                                        ->get();    
            // $data = cocogen_api_ctpl_trans::select('province')->distinct('province')->orderBy('province', 'asc')->get();     
            return response()->json($data, 201);  


        }else{
            // $response['TErrorMsg'] = $digest;
            $response['TErrorMsg'] = "Incorrect  Security Code!";
            $response['TStatus'] = "Data Error";
            return response()->json($response, 201);  
        }
        
  
    }
}
