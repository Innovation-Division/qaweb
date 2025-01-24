<?php

use Illuminate\Http\Request;
use App\Http\Controllers\apiCocogen;
use App\Http\Controllers\logs;
use App\Http\Controllers\locateabranch;
use App\Http\Controllers\survey;
use App\Http\Controllers\protech;
use App\Http\Controllers\APImonitoring;
use App\Http\Controllers\eparthubClaimAPI;
use App\Http\Controllers\domestic;
use App\Http\Controllers\APIctpl;
use App\Http\Controllers\onlinepaymentAPI;
use App\Http\Controllers\itp;
use App\Http\Controllers\inquirynologin;
use App\Http\Controllers\BatchUploadingAPI;
use App\Http\Controllers\QuotationResponseAPI;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('logs/update/policies_no', [logs::class, 'update_policies']);
Route::get('logs/update/online_payment_no', [logs::class, 'update_online_payment_no']);
Route::get('logs/update/partner_training_no', [logs::class, 'update_partner_training_no']);
Route::get('logs/update/reports_training_no', [logs::class, 'update_reports_training_no']);
Route::get('logs/update/requesst_hardcopy_training_no', [logs::class, 'update_requesst_hardcopy_training_no']);

Route::get('branch/filter/get', [locateabranch::class, 'get_province']);
Route::get('/province/get', [apiCocogen::class, 'get_province']);

Route::get('covid/province/get', [apiCocogen::class, 'get_province']);
Route::get('covid/city/get', [apiCocogen::class, 'get_city']);
Route::get('covid/barangay/get', [apiCocogen::class,'get_barangay']);
Route::get('covid/getdatacovid', [apiCocogen::class,'getdatacovid']);
Route::get('covid/occupation/other/check', [apiCocogen::class,'getotheroccupation']);
Route::get('covid/getoccupation', [apiCocogen::class,'get_occupation']);
Route::get('covid/occupation/getdata', [apiCocogen::class,'get_occupation_data']);
Route::get('covid/insert/data', [apiCocogen::class,'savecovid']);
Route::get('covid/insert/datablocked', [apiCocogen::class,'savecovidblocked']);
Route::get('covid/insert/data/renewal', [apiCocogen::class,'savecovidrenewal']);
Route::get('covid/insert/data/renewalblocked', [apiCocogen::class,'savecovidrenewalblocked']);
Route::get('survey/insert/data', [survey::class,'savesurvey']);
Route::get('survey/get/set', [survey::class,'getset']);
Route::get('get-quote/pro-tech-insurance/promo', [protech::class,'get_promo']);

// // Manual Monitoring API
Route::post('monitoring/insert/set', [APImonitoring::class, 'getAgent']);
Route::post('monitoring/filteragent/update', [APImonitoring::class, 'filterAgent']);
Route::post('monitoring/fetch/intermediary', [APImonitoring::class, 'monitoringResponce']);
Route::post('monitoring/fetch/intermediary/insert', [APImonitoring::class, 'monitoringInsert']);

// //Claims Automation
// Route::post('epartnerhub/insert/remarks', [eparthubClaimAPI::class, 'apiInsertRemark']);
// Route::post('epartnerhub/update/status', [eparthubClaimAPI::class, 'apiUpdateStatus']);
// Route::post('epartnerhub/insert/generic/file', [eparthubClaimAPI::class, 'apiInsertFiles']);
// Route::post('epartnerhub/delete/generic/file', [eparthubClaimAPI::class, 'apiDeleteFiles']);
// Route::post('epartnerhub/update/file/status', [eparthubClaimAPI::class, 'apiUpdateFilesStatus']);
// Route::post('epartnerhub/get/15/days/pending', [eparthubClaimAPI::class, 'apiGEt15DaysPending']);
// Route::post('epartnerhub/get/30/days/pending', [eparthubClaimAPI::class, 'apiGEt30DaysPending']);
// Route::post('epartnerhub/get/45/days/pending', [eparthubClaimAPI::class, 'apiGEt45DaysPending']);
// Route::post('epartnerhub/get/60/days/pending', [eparthubClaimAPI::class, 'apiGEt60DaysPending']);
// Route::post('epartnerhub/get/61/days/pending', [eparthubClaimAPI::class, 'apiGEt61aboveDaysPending']);
// Route::post('epartnerhub/get/unpaid/policy', [eparthubClaimAPI::class, 'apiGEtgetUnpaid']);
// //End Claims Automation


// //domestic
Route::get('get-quote/domestic-insurance/get-prem', [domestic::class, 'get_prem']);
Route::get('get-quote/domestic-insurance/get-prem-covid', [domestic::class, 'get_prem_covid']);
Route::get('get-quote/domestic-insurance/promo', [domestic::class, 'get_promo']);

Route::post('ctrl/report/data', [APIctpl::class, 'reportCTPL']); //external
Route::post('online/payment/report/daily', [onlinepaymentAPI::class,'getPaymentData']); //external

// //international
Route::get('/get-quote/itp-insurance/get-prem', [itp::class ,'get_prem']);
Route::get('/get-quote/itp-insurance/promo', [itp::class ,'get_promo']);
Route::get('/get-quote/itp-insurance/get-prem-covid', [itp::class ,'get_prem_covid']);
Route::get('/get-quote/itp-insurance/package', [itp::class ,'get_package']);
Route::get('/get-quote/itp-insurance/package_delete', [itp::class ,'get_package_delete']);


// //epocy enhancement 
Route::post('epartnerhub/user/insert', [apiCocogen::class,'saveUser']); //external
Route::post('epartnerhub/user/check', [apiCocogen::class,'checkUser']);//external
Route::get('epolicy/get/branch', [inquirynologin::class, 'checkbranch']);
Route::post('ctrl/insert/set', [APIctpl::class, 'createCTPL']); //external

Route::post('epartnerhub/quotation/batch/update', [BatchUploadingAPI::class, 'updateResponse']); //external
Route::post('epartnerhub/quotation/individual/update', [QuotationResponseAPI::class, 'updateResponse']); //external



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
