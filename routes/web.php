<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home;
use App\Http\Controllers\epolicy;
use App\Http\Controllers\ecommerceITP;
use App\Http\Controllers\domestic;
use App\Http\Controllers\motorController;
use App\Http\Controllers\corpgovernance;
use App\Http\Controllers\bepartner;
use App\Http\Controllers\protechExpand;
use App\Http\Controllers\ProducerOnBoardingController;
use App\Http\Controllers\annualCSSurvey;
use App\Http\Controllers\onlinepayment;
use App\Http\Controllers\locateabranch;
use App\Http\Controllers\inquiry;
use App\Http\Controllers\inquiryepartnerhub;
use App\Http\Controllers\inquirynologin;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ctpl;
use App\Http\Controllers\compre;
use App\Http\Controllers\covid;
use App\Http\Controllers\protech;
use App\Http\Controllers\epartnerhubClaimNoLogin;
use App\Http\Controllers\itp;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\bonds;
use App\Http\Controllers\marine;
use App\Http\Controllers\pa_quote;
use App\Http\Controllers\manualmonitoring;
use App\Http\Controllers\policyQuotation;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\searchcontroller;

Route::get('/testpackage', [home::class, 'downloadPDFCTPL']);
Route::get('/', [home::class, 'pageHome']);
Route::get('/customsearch', [searchcontroller::class, 'customsearch'])->name('customsearch');

Route::get('/get-quote', [home::class, 'getquote']);
Route::get('/get-quote/ecommerce/{product}', [ecommerceITP::class, 'getquote']);
Route::get('/get-quote/ecommerce/{product}/{package}', [home::class, 'getquote_notif']);

Route::get('/get-quote/itp-insurance/promo', [ecommerceITP::class, 'get_promo']);
Route::get('/get-quote/itp-insurance/get-premium-all', [ecommerceITP::class, 'get_premium']);
Route::get('/province/get', [ecommerceITP::class, 'get_province']);
Route::get('/city/get', [ecommerceITP::class, 'get_city']);
Route::get('/barangay/get', [ecommerceITP::class, 'get_barangay']);
Route::get('/region/get', [ecommerceITP::class, 'get_region']);
Route::get('/get-quote/international-travel-protect', [ecommerceITP::class, 'get_ITP_Open'])->name('get_ITP_Open');
Route::post('/get-quote/international-travel-excel-plus/save', [ecommerceITP::class, 'ITPinsurancesave'])->name('internationalinsurancesave');
Route::get('/get-quote/international-travel-excel-plus/success', [ecommerceITP::class, 'success']);

// Domestic
Route::get('/get-quote/domestic-travel-plus', [domestic::class, 'newdomestic'])->name('newdomestic');
Route::post('/get-quote/domestic-travel-plus/save', [domestic::class, 'domesticinsurancesave'])->name('domesticinsurancesave');
Route::get('/get-quote/domestic-travel-plus/success', [domestic::class, 'success']);
Route::get('/get-quote/domestic-travel-plus/pending', [domestic::class, 'pending']);
Route::get('/get-quote/domestic-travel-plus/failed', [domestic::class, 'failed']);

// Motor Net Rating
Route::post('/get-policy-quote/vehicle/postpolicy/{id}', [motorController::class, 'postpolicy'])->name('motorController.summaryPost');
Route::get('/get-policy-quote/edit/register/other/new/{id}', [motorController::class, 'update_record_other_record'])->name('record_motor_other_new');
Route::post('/get-policy-quote/vehicle/additionalInfo', [motorController::class, 'saveOtherPersonalInfo'])->name('motorController.saveOtherPersonalInfo');
Route::get('/get-policy-quote/edit/register/payment/{id}', [motorController::class, 'update_record_payment'])->name('record_motor_payment');

// Account Activation and Password
Route::get('/accountAlreadyActivated', [home::class, 'accountAlreadyActivated'])->name('accountAlreadyActivated');
Route::get('/forgotpassword', [home::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpasswordsave', [home::class, 'forgotpasswordsave'])->name('forgotpasswordsave');
Route::get('/resetpassword', [home::class, 'resetpassword'])->name('resetpassword');
Route::get('/ActivateAccount', [home::class, 'ActivateAccount'])->name('ActivateAccount');

// Corporate Governance Downloads
Route::get('/2015/Download-Corporate-Governance', [corpgovernance::class, 'downloadGovernance2015'])->name('downloadGovernance2015');
Route::get('/2016/Download-Corporate-Governance', [corpgovernance::class, 'downloadGovernance2016'])->name('downloadGovernance2016');
Route::get('/2017/Download-Corporate-Governance', [corpgovernance::class, 'downloadGovernance2017'])->name('downloadGovernance2017');
Route::get('/2018/Download-Corporate-Governance', [corpgovernance::class, 'downloadGovernance2018'])->name('downloadGovernance2018');
Route::get('/2019/Download-Corporate-Governance', [corpgovernance::class, 'downloadGovernance2019'])->name('downloadGovernance2019');

// Be a Partner
Route::get('/be-a-partner', [bepartner::class, 'bepartner']);
Route::post('/epartnersave', [bepartner::class, 'epartnersave'])->name('epartnersave');

// Pro-Tech Expand
Route::get('/pro-tech-expand', [protechExpand::class, 'index'])->name('protechExpand.index');
Route::post('/pro-tech-expand/save', [protechExpand::class, 'protechSendMail'])->name('protechExpand.protechSendMail');
Route::get('/get-quote/pro-tech-expand/{id}/{eid}', [protechExpand::class, 'openProtect'])->name('protechExpand.openProtect');
Route::post('/saveprotech', [protechExpand::class, 'saveprotech'])->name('protechExpand.saveprotech');
Route::get('/get-quote/pro-tech-expand/success', [protechExpand::class, 'success']);
Route::get('/get-quote/pro-tech-expand/pending', [protechExpand::class, 'pending']);
Route::get('/get-quote/pro-tech-expand/failed', [protechExpand::class, 'failed'])->name('protechExpand.failed');

// ADD AGENT on HOME PAGE
Route::post('/saveAgent', [protechExpand::class, 'setAgentCode'])->name('saveAgent');

// Protech Expand Report
Route::get('/ecommerce-report', [protechExpand::class, 'protechReport'])->name('protechExpand.protechReport');
Route::get('/protechexpand-report', [protechExpand::class, 'transaction'])->name('protechExpand.protechReportAjax');
Route::get('/protechexpand-report-client', [protechExpand::class, 'clientreport'])->name('protechExpand.clientreport');
Route::get('/protechexpand-report/protechDetails/{id}', [protechExpand::class, 'protechExpandDetail'])->name('protechExpand.protechExpandDetail');
Route::post('/protechexpand-report/cancelItem', [protechExpand::class, 'cancelItem'])->name('protechExpand.cancelItem');
Route::post('/protechexpand-report/resendEmail', [protechExpand::class, 'resendEmail'])->name('protechExpand.resendEmail');

// Reset Password and Resend Email
// Route::get('/reset_password', [home::class, 'reset_password'])->name('resetpassword');
Route::post('/resetpasswordsave', [home::class, 'resetpasswordsave'])->name('resetpasswordsave');
Route::post('/reset_passwordsave', [home::class, 'reset_passwordsave'])->name('reset_passwordsave');
Route::get('/downloadPDF', [home::class, 'downloadPDF'])->name('downloadPDF');

// Account Activation
Route::get('/activate_account', [home::class, 'activate_account'])->name('activate_account');
Route::get('/resendpassword', [home::class, 'resendpassword'])->name('resendpassword');
Route::post('/resendpasswordsave', [home::class, 'resendpasswordsave'])->name('resendpasswordsave');
Route::get('/activateYourAccount', [home::class, 'activateYourAccount'])->name('activateYourAccount');
Route::get('/activateYourAccountFailed', [home::class, 'resendpasswordfailed'])->name('resendpasswordfailed');
Route::get('/request_time_out', [home::class, 'reserfailedpass'])->name('request_time_out');
Route::post('/resend_passwordsave', [home::class, 'resend_passwordsave'])->name('resend_passwordsave');



Route::get('storage/{id}/{filename}', function ($id,$filename)
    {
        $path = storage_path('app/userimage/'.$id .'/'. $filename);
        //dd($path);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });

// Producer Onboarding
Route::get('/get-producer-presentation', [ProducerOnBoardingController::class, 'index'])->name('get-producer-presentation');
Route::get('/get-producer-circular', [ProducerOnBoardingController::class, 'circular'])->name('get-producer-circular');
Route::get('/get-producer-files/{id}', [ProducerOnBoardingController::class, 'files'])->name('get-producer-files');

// Annual CS Survey
Route::post('/annualcssurveysave', [annualCSSurvey::class, 'annualcssurveysave'])->name('annualcssurveysave');
Route::get('/annual-cs-survey/failed', [annualCSSurvey::class, 'failedlink']);
Route::get('/annual-cs-survey/success', [annualCSSurvey::class, 'successlink']);
Route::get('/annual-cs-survey/{id}', [annualCSSurvey::class, 'viewSurvey']);

// About Us
Route::get('/careers', [home::class, 'careers']);
Route::post('/careerssave', [home::class, 'careerssave'])->name('careerssave');

// Services
Route::get('/online-payments', [onlinepayment::class, 'onlinepayments']);
Route::post('/online-payments/pay', [onlinepayment::class, 'onlinepaymentspay'])->name('onlinepaymentspays');
Route::get('/onlinepayments/{id}', [onlinepayment::class, 'onlinepaymentsWithParameters']);

// Inquiries
Route::get('/locate-a-shop', [locateabranch::class, 'locateashop']);
Route::get('/locate-a-shop/{id}', [locateabranch::class, 'locateashop']);
Route::get('/locate-a-branch', [locateabranch::class, 'branchlocator']);
Route::get('/locate-a-branch/{id}', [locateabranch::class, 'branchlocator']);
Route::get('/faqs', [home::class, 'faqs']);
Route::get('/feedback', [home::class, 'feedback']);
Route::post('/feedbacksave', [home::class, 'feedbacksave'])->name('feedbacksave');

Route::get('/send-inquiry', [inquiry::class, 'generalinquiry']);
Route::get('/send-inquiry/success', [inquiry::class, 'success']);
Route::get('/send-inquiry/product/success', [inquiry::class, 'successproduct']);
Route::get('/send-inquiry/product/success/{product}', [inquiry::class, 'successproduct']);
Route::get('/send-inquiry/{product}', [inquiry::class, 'productinquiryproducts']);
Route::post('/product-inquirysave', [inquiry::class, 'productinquirysave'])->name('generalinquirysave');
Route::post('/product-inquirysavewithvar', [inquiry::class, 'productinquirysavewithviar'])->name('productinquirysavewithviar');
Route::post('/send-inquirysave', [inquiryepartnerhub::class, 'epartnergeneralinquirysave'])->name('epartnerhubsaveinquiry');
Route::get('/epolicy-inquiry/success', [inquirynologin::class, 'success']);

Route::get('/product-inquiry', [inquiry::class, 'redirectToSendInquiry']);
Route::get('/product-inquiry/{product}', [inquiry::class, 'sendToSendInquirywParam']);

// Updates
Route::get('/updates', [home::class, 'updates']);
Route::get('/news', [home::class, 'newsandevents']);
Route::get('/blogs', [home::class, 'blogs']);

// Our Products
Route::get('/products', [home::class, 'products']);
Route::get('/product-lines', [home::class, 'productlines']);
Route::get('/microinsurance', [home::class, 'microinsurance']);
Route::get('/excel-plus-packages', [home::class, 'excelpackages']);

// Updates
Route::get('/properties', [home::class, 'properties']);

// Property
Route::get('/property', [PropertyController::class, 'propertysale']);
Route::get('/propertydetails/{id}', [PropertyController::class, 'propertydetails']);
Route::post('/propertyinquire', [PropertyController::class, 'propertyinquire'])->name('propertyinquire');

// Get A Quote
Route::get('/get-quote/ctpl-insurance', [ctpl::class, 'getquotemotor'])->name('quotemotor');
Route::post('/get-quote/motor-insurance/save', [ctpl::class, 'getquotemotorsave'])->name('saveequotemotor');
Route::get('/get-quote/motor-insurance/postback', [home::class, 'dragonpaypostback'])->name('dragonpaypostback');
Route::post('/get-quote/motor-insurance/postbacksave', [home::class, 'dragonpaypostbacksave'])->name('dragonpaypostbacksave');
Route::get('/get-quote/ctpl-insurance/reauthctplcon', [ctpl::class, 'reauthctplcon'])->name('reauthctpl');
Route::post('/get-quote/ctpl-insurance/reauthctplcon/save', [ctpl::class, 'reauthctplconsave'])->name('reauthctplconsave');
Route::get('/get-quote/online-payments/success', [home::class, 'onlinepaymentonsuccess'])->name('onlinepaymentonsuccess');
Route::get('/get-quote/online-payments/failed', [home::class, 'onlinepaymentonfailed'])->name('onlinepaymentonfailed');
Route::get('/get-quote/online-payments/pending', [home::class, 'onlinepaymentonpending'])->name('onlinepaymentonpending');
Route::get('/get-quote/ctpl-insurance/ctpl/success', [ctpl::class, 'ctplonsuccess'])->name('ctplonsuccess');
Route::get('/get-quote/ctpl-insurance/ctpl/failed', [ctpl::class, 'ctplonfailed'])->name('ctplonfailed');
Route::get('/get-quote/view_coc/{filename}/{txnid}', [home::class, 'downloadcoc']);
Route::get('/get-quote/view_coc_ctpl/{filename}/{txnid}', [home::class, 'downloadcocctpl']);

Route::get('/get-quote/motor-insurance/compre', [compre::class, 'getquotecompre'])->name('quotemotorcompre');
Route::post('/get-quote/motor-insurance/compre/save', [compre::class, 'compreonsave'])->name('compreonsave');
Route::get('/get-quote/motor-insurance/compre/success', [compre::class, 'compreonsuccess'])->name('compreonsuccess');
Route::get('/get-quote/motor-insurance/compre/failed', [compre::class, 'compreonfailed'])->name('compreonfailed');
Route::get('/get-quote/motor-insurance/compre/pending', [home::class, 'onlinepaymentonpending'])->name('compreonpending');

// E-commerce
Route::get('/getprovince', [home::class, 'getProvince']);
Route::get('/getcity/{id}', [home::class, 'getCity']);
Route::get('/getbarangay/{id}', [home::class, 'getBarangay']);
Route::get('/brand/get/{id}/', [home::class, 'fetch'])->name('dynamicdependent.fe1tch');
Route::get('/model/get/{id}/', [home::class, 'modelfetch'])->name('dynamicdependent.modelfetch');
Route::post('/prem/get', [home::class, 'premfetch'])->name('dynamicdependent.premfetch');
Route::post('dynamic_dependent/fetch', [home::class, 'fetchtest'])->name('dynamicdependent.fetchtest');
Route::post('dynamic_dependent/fetch/model', [home::class, 'fetchmodel'])->name('dynamicdependent.fetchmodel');
Route::post('dynamic_dependent/fetch/brand', [home::class, 'fetchbrand'])->name('dynamicdependent.fetchbrand');
Route::post('dynamic_dependent/fetch/city', [home::class, 'fetchcity'])->name('dynamicdependent.fetchcity');
Route::post('dynamic_dependent/fetch/compre/city', [home::class, 'fetchcomprecity'])->name('dynamicdependent.fetchcomprecity');
Route::post('dynamic_dependent/fetch/mvtype', [home::class, 'fetchmvtype'])->name('dynamicdependent.fetchmvtype');
Route::post('dynamic_dependent/fetch/getprem', [home::class, 'getprem'])->name('dynamicdependent.getprem');
Route::post('dynamic_dependent/fetch/getpremCd', [home::class, 'getpremCd'])->name('dynamicdependent.getpremCd');
Route::post('dynamic_dependent/fetch/getbarangay', [home::class, 'fetchbarangay'])->name('dynamicdependent.fetchbarangay');
Route::get('/register', [home::class, 'register']);

// COVID-19
Route::post('/get-quote/covid19-insurance/save', [covid::class, 'covidinsurancesave'])->name('covidinsurancesave');
Route::post('/get-quote/covid19-insurance/renewal/save', [covid::class, 'covidinsurancerenewalsave'])->name('covidinsurancerenewalsave');
Route::get('/get-quote/covid-19-assist-plus/success', [covid::class, 'covidsuccess'])->name('covidsuccess');
Route::get('/get-quote/covid-19-assist-plus/pending', [covid::class, 'covidpending'])->name('covidpending');
Route::get('/get-quote/covid-19-assist-plus/failed', [covid::class, 'covidfailed'])->name('covidfailed');
Route::get('/get-quote/covid19-insurance/testpdf', [home::class, 'testpdf'])->name('testpdf');
Route::get('/get-quote/covid-19-assist-plus', [covid::class, 'newcovid'])->name('newcovid');
Route::get('/get-quote/covid-19-assist-plus/renewal', [covid::class, 'renewalcovid'])->name('renewalcovid');

// Pro-Tech Insurance
Route::get('/get-quote/pro-tech-insurance', [protech::class, 'openProtect']);
Route::get('/get-quote/pro-tech-insurance/{sec}/{id}', [protech::class, 'openProtectPURL']);
Route::post('/get-quote/pro-tech-insurance/save', [protech::class, 'protechsave'])->name('protechsave');
Route::get('/get-quote/pro-tech-insurance/success', [protech::class, 'success']);
Route::get('/get-quote/pro-tech-insurance/pending', [protech::class, 'pending']);
Route::get('/get-quote/pro-tech-insurance/failed', [protech::class, 'failed']);

// E-Policy Login Enhancement
Route::get('/createaccount', [home::class, 'createaccount'])->name('createaccount');
Route::post('/signup', [home::class, 'signup'])->name('signup');
Route::get('/print-policy-docs/{id}', [epolicy::class, 'printPolicyDocs'])->name('print-policy-docs');
Route::get('/print-policy-jacket/{id}', [epolicy::class, 'printPolicyJacket'])->name('print-policy-jacket');
Route::get('/print-invoice', [epolicy::class, 'printInvoice'])->name('print-invoice');

// Claims Automation
Route::get('/view/external/file/motor/claim/{sec}/{id}', [epartnerhubClaimNoLogin::class, 'downloadfilemotorstandalone']);
Route::get('/view/external/file/pa/claim/{sec}/{id}', [epartnerhubClaimNoLogin::class, 'downloadfilepastandalone']);
Route::get('/view/external/file/property/claim/{sec}/{id}', [epartnerhubClaimNoLogin::class, 'downloadfilepropertystandalone']);
Route::get('/claims/pa/view/stand/files/{sec}/{idcode}/{id}', [epartnerhubClaimNoLogin::class, 'downloadfilepastandalone']);

Route::get('/file-claims/motor/new', [epartnerhubClaimNoLogin::class, 'motorClaimsOpen']);
Route::get('/file-claims/pa/new', [epartnerhubClaimNoLogin::class, 'paClaimsOpen']);
Route::get('/file-claims/property/new', [epartnerhubClaimNoLogin::class, 'propertyClaimsOpen']);

Route::post('/claims/motor/external/save', [epartnerhubClaimNoLogin::class, 'motorClaimsSave'])->name('motorExternalnewsave');
Route::post('/claims/pa/external/save', [epartnerhubClaimNoLogin::class, 'paClaimsSave'])->name('paExternalnewsave');
Route::post('/claims/property/external/save', [epartnerhubClaimNoLogin::class, 'propertyClaimsSave'])->name('propertyExternalnewsave');

// International Travel
Route::get('/get-quote/international-travel-excel-plus/pending', [itp::class, 'pending']);
Route::get('/get-quote/international-travel-excel-plus/failed', [itp::class, 'failed']);


// Auth Routes
Auth::routes();

Route::get('/epolicy', [epolicy::class, 'login']);
Route::get('/epolicy/home', [epolicy::class, 'login']);
Route::get('/home', [epolicy::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to the login page or another desired page
})->name('logout');

// Epolicy Routes
Route::prefix('myaccount')->group(function () {
    Route::post('/personal-info-save', [epolicy::class, 'myaccountPersonalInfoSave'])->name('myaccountPersonalInfoSave');
    Route::post('/mailing-save', [epolicy::class, 'myaccountMailingSave'])->name('myaccountMailingSave');
    Route::post('/contact-save', [epolicy::class, 'myaccountContactSave'])->name('myaccountContactSave');
    Route::post('/reset-save', [epolicy::class, 'myaccountResetSave'])->name('myaccountResetSave');
    Route::post('/type-save', [epolicy::class, 'myaccounttypeSave'])->name('myaccounttypeSave');
    Route::post('/type-save-2', [epolicy::class, 'myaccounttypeSave2'])->name('myaccounttypeSave2');
    Route::post('/profile-pic-save', [epolicy::class, 'profilepicsave'])->name('profilepicsave');
});

// Inquiry Routes
Route::prefix('send-for-hard-copy')->group(function () {
    Route::post('/client', [inquiryepartnerhub::class, 'sendForHardCopyClient'])->name('sendForHardCopyClient');
    Route::post('/agent', [inquiryepartnerhub::class, 'sendForHardCopyAgent'])->name('sendForHardCopyAgent');
});

// Bonds Routes
Route::prefix('get-quote')->group(function () {
    Route::post('/accountbroker', [bonds::class, 'getquoteaccountbroker'])->name('bondsaccountbroker');
    
    Route::middleware('auth')->group(function () {
        Route::get('/financial', [bonds::class, 'financial'])->name('financial');
        Route::post('/update', [bonds::class, 'financial_update'])->name('financial_update');
        Route::get('/get_principal_api', [bonds::class, 'get_principal_api'])->name('get_principal_api');
        Route::post('/adddistribution', [bonds::class, 'addbonds_distribution'])->name('addbondsdistribution');
        Route::post('/get_obligee_api', [bonds::class, 'get_obligee_api'])->name('get_obligee_api');
        Route::post('/get_obligee2_api', [bonds::class, 'get_obligee2_api'])->name('get_obligee2_api');
        Route::get('/getbonds_historical/{id}', [bonds::class, 'getbonds_historical'])->name('getbonds_historical');
        Route::get('/bondsgetquoterequirement/{id}/{transno}', [bonds::class, 'getbonds_requirement']);
        Route::post('/bondsgetquoterequirementupdate', [bonds::class, 'getbonds_requirement_update']);
        Route::post('/get_tsi', [bonds::class, 'checktsi'])->name('checktsi');
        Route::post('/get_issued', [bonds::class, 'generate_issueonce'])->name('generate_issueonce');
        Route::post('/bonds-quotereturnsave', [bonds::class, 'getquotebondsreturnsave'])->name('getquotebondsreturnsave');
    });
});

Route::post('/get-quote/bonds-checklogin', [bonds::class, 'getcheckbondslogin'])->name('checkbondslogin');
Route::get('/get-quote/bonds-logout', ['middleware' => 'auth', 'uses' => [bonds::class, 'getcheckbondslogout']])->name('checkbondslogout');
Route::get('/get-quote/bonds-home',  ['middleware' => 'auth', 'uses' => [bonds::class, 'getbondsquote']])->name('bondsquote');
Route::get('/get-quote/bonds-quote', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebonds']])->name('quotebonds');
Route::get('/get-quote/bonds-quoteview/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsview']])->name('quotebondsview');
Route::get('/get-quote/bonds-quoteapproval/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsapproval']])->name('quotebondsapproval');
Route::post('/get-quote/bonds-quotesave', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondssave']])->name('savequotebonds');
Route::post('/get-quote/bonds-quoteupdate', ['middleware' => 'auth', 'uses' => [bonds::class, 'updatequotebond']])->name('updatequotebonds');
Route::post('/get-quote/bonds-quotesubmit', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondssubmit']])->name('submitquotebonds');
Route::post('/get-quote/bonds-quotereview', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsreview']])->name('reviewquotebonds');
Route::post('/get-quote/bonds-quotemanager', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsmanager']])->name('managerquotebonds');
Route::post('/get-quote/bonds-quoteapprove', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsapprove']])->name('approvequotebonds');
Route::post('/get-quote/bonds-quotesales', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondssales']])->name('salesquotebonds');
Route::post('/get-quote/bonds-quotecancel', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondscancel']])->name('cancelquotebonds');
Route::post('/get-quote/bonds-quoteissue', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsissue']])->name('issuequotebonds');
Route::post('/get-quote/bonds-quotednm', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsdnm']])->name('dnmquotebonds');
Route::post('/get-quote/bonds-quoterefresh', ['middleware' => 'auth', 'uses' => [bonds::class, 'getquotebondsrefresh']])->name('refreshquotebonds');
Route::get('/get-quote/bonds-annualrate', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbond_annualrate']])->name('annualratebonds');
Route::get('/get-quote/getbondslossxp/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_lossxp']])->name('getbondslossxp');
Route::post('/get-quote/addbondslossxp', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_lossxp']])->name('bondsaddlossxp');
Route::get('/get-quote/bondsdeletelossxp/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_lossxp']]);
Route::get('/get-quote/getbondsowner/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_owner']])->name('getbondsowner');
Route::post('/get-quote/addbondsowner', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_owner']])->name('bondsaddowner');
Route::get('/get-quote/bondsdeleteowner/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_owner']]);
Route::get('/get-quote/getbondsOfficer/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_officer']])->name('getbondsofficer');
Route::post('/get-quote/addbondsofficer', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_officer']])->name('bondsaddofficer');
Route::get('/get-quote/bondsdeleteofficer/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_officer']]);

Route::get('/get-quote/getbondscollateral/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_collateral']])->name('getbondscollateral');
Route::post('/get-quote/addbondscollateral', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_collateral']])->name('bondsaddcollateral');
Route::get('/get-quote/bondsdeletecollateral/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_collateral']]);

Route::get('/get-quote/getbondssigner/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_signer']])->name('getbondssigner');
Route::post('/get-quote/addbondssigner', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_signer']])->name('bondsaddsigner');
Route::get('/get-quote/bondsdeletesigner/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_signer']]);

Route::get('/get-quote/getbondsprojects1/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_projects1']])->name('getbondsprojects1');
Route::post('/get-quote/addbondsproject1', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_projects1']])->name('bondsaddprojects1');
Route::get('/get-quote/bondsdeleteproject1/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_projects1']]);

Route::get('/get-quote/getbondsprojects2/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_projects2']])->name('getbondsprojects2');
Route::post('/get-quote/addbondsproject2', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_projects2']])->name('bondsaddprojects2');
Route::get('/get-quote/bondsdeleteproject2/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_projects2']]);

Route::get('/get-quote/getbondsattachment/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_attachment']])->name('getbondsattachment');
Route::post('/get-quote/addbondsattachment', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_attachment']])->name('bondsaddattachment');
Route::get('/get-quote/bondsdeleteattachment/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_attachment']]);

Route::get('/get-quote/getbondsfinancial/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_financial']])->name('getbondsfinancial');
Route::post('/get-quote/addbondsfinancial', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_financial']])->name('bondsaddfinancial');
Route::get('/get-quote/bondsdeletefinancial/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_financial']]);

Route::post('/get-quote/addbondsfinancialremarks', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_financialremarks']])->name('bondsaddfinancialremarks');
Route::get('/get-quote/bondsfinancialremraks/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_financial_remarks']])->name('getbondsfinancialremraks');
Route::get('/get-quote/bondsdeletefinancialremarks/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_financial_remarks']]);

Route::post('/get-quote/addbondscomments', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_comments']])->name('bondsaddcomments');
Route::get('/get-quote/bondscomments/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_comments']])->name('getbondscomments');
Route::get('/get-quote/bondsdeletecomments/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_comments']]);

Route::get('/get-quote/getbondsquoterequirement/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_quoterequirement']])->name('getbondsquoterequirement');
Route::post('/get-quote/addbondsquoterequirement', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_quoterequirement']])->name('bondsaddquoterequirement');
Route::get('/get-quote/bondsdeletequoterequirement/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_quoterequirement']]);

Route::get('/get-quote/getbondsquotehistorylogs/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_historylogs']])->name('getbondsquotehistorylogs');
Route::get('/get-quote/getallbondsquote', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_allquote']])->name('getallbondsquote');

Route::get('/get-quote/getbondsprincipal/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_principal']])->name('getbondsprincipal');
Route::post('/get-quote/addbondsprincipal', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_principal']])->name('bondsaddprincipal');
Route::get('/get-quote/bondsdeleteprincipal/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_principal']]);

Route::get('/get-quote/getbondsguarantee/{id}', ['middleware' => 'auth', 'uses' => [bonds::class, 'getbonds_guarantee']])->name('getbondsguarantee');
Route::post('/get-quote/addbondsguarantee', ['middleware' => 'auth', 'uses' => [bonds::class, 'addbonds_guarantee']])->name('bondsaddguarantee');
Route::get('/get-quote/bondsdeleteguarantee/{id}/{transno}', ['middleware' => 'auth', 'uses' => [bonds::class, 'deletebonds_guarantee']]);
Route::get('/get-quote/view/bonds/{filename}/{txnid}', [bonds::class, 'downloadBond']);



// Bonds - 08/10/2020
Route::post('/get-quote/bonds-calcpremium', [bonds::class, 'getquotebondspremium'])->name('premiumquotebonds');

// getAquote>Marine
Route::get('/get-quote/marine-home', [marine::class, 'getmarinequote'])->name('marinequote');
Route::get('/get-quote/marine-quote/{id}', [marine::class, 'getquotemarine'])->name('quotemarine');
Route::get('/get-quote/getallmarinequote', [marine::class, 'getmarine_allquote'])->name('getallmarinequote');
Route::post('/get-quote/marine-quotesave', [marine::class, 'getquotemarinesave'])->name('savequotemarine');
Route::post('/get-quote/marine-quoterefresh', [marine::class, 'getquotemarinerefresh'])->name('refreshquotemarine');
Route::get('/get-quote/getmarine-truck/{id}', [marine::class, 'getmarine_truck'])->name('getmarinetruck');
Route::post('/get-quote/addmarine-truck', [marine::class, 'addmarine_truck'])->name('marineaddtruck');
Route::get('/get-quote/marinedeletetruck/{id}/{transno}', [marine::class, 'deletemarine_truck']);
Route::post('/get-quote/marine-quoteupdate', [marine::class, 'updatequotemarine'])->name('updatequotemarine');
Route::post('/get-quote/marine-quotesubmit', [marine::class, 'getquotemarinesubmit'])->name('submitquotemarine');
Route::get('/get-quote/marine-quoteview/{id}', [marine::class, 'getquotemarineview'])->name('quotemarineview');
Route::post('/get-quote/marine-quotemanager', [marine::class, 'getquotemarinemanager'])->name('managerquotemarine');
Route::post('/get-quote/marine-quotesales', [marine::class, 'getquotemarinesales'])->name('salesquotemarine');
Route::post('/get-quote/marine-quotereview', [marine::class, 'getquotemarinereview'])->name('reviewquotemarine');
Route::post('/get-quote/marine-quoteapprove', [marine::class, 'getquotemarineapprove'])->name('approvequotemarine');
Route::post('/get-quote/marine-quotecancel', [marine::class, 'getquotemarinecancel'])->name('cancelquotemarine');
Route::post('/get-quote/marine-quoteissue', [marine::class, 'getquotemarineissue'])->name('issuequotemarine');
Route::post('/get-quote/marine-quotednm', [marine::class, 'getquotemarinednm'])->name('dnmquotemarine');
Route::post('/get-quote/addmarinecomments', [marine::class, 'addmarine_comments'])->name('marinesaddcomments');
Route::get('/get-quote/marinecomments/{id}', [marine::class, 'getmarine_comments'])->name('getmarinecomments');
Route::get('/get-quote/getmarineattachment/{id}', [marine::class, 'getmarine_attachment'])->name('getmarineattachment');
Route::post('/get-quote/addmarineattachment', [marine::class, 'addmarine_attachment'])->name('marineaddattachment');
Route::get('/get-quote/marinedeleteattachment/{id}/{transno}', [marine::class, 'deletemarine_attachment']);
Route::get('/get-quote/marinedeletecomments/{id}', [marine::class, 'deletemarine_comments']);
Route::post('/get-quote/marine-calcpremium', [marine::class, 'getquotemarinepremium'])->name('premiumquotemarine');
Route::get('/get-quote/getmarinequotehistorylogs/{id}', [marine::class, 'getmarine_historylogs'])->name('getmarinequotehistorylogs');
Route::get('/get-quote/marine-quoteapproval/{id}', [marine::class, 'getquotemarineapproval'])->name('quotemarineapproval');
Route::get('/get-quote/view/marine/{filename}/{txnid}', [marine::class, 'downloadMarine']);

// PA-Quote
Route::get('/get-quote/assured-home', [pa_quote::class, 'getpaassured'])->name('assuredmaintenance');
Route::get('/get-quote/getassured', [pa_quote::class, 'getpa_assured'])->name('getassured');
Route::get('/get-quote/assured-new', [pa_quote::class, 'getnewassured'])->name('newassured');
Route::post('/get-quote/assured-save', [pa_quote::class, 'getquoteassuredsave'])->name('saveassured');
Route::get('/get-quote/assured-view/{id}', [pa_quote::class, 'getassuredview'])->name('viewassured');
Route::post('/get-quote/assured-update', [pa_quote::class, 'updateassured'])->name('assuredupdate');
Route::get('/get-quote/pa-new/{id}', [pa_quote::class, 'getquotepanew'])->name('newpaquote');
Route::post('/get-quote/pa-quotesave', [pa_quote::class, 'getquotepasave'])->name('savequotepa');
Route::get('/get-quote/getpa-enrollee/{id}', [pa_quote::class, 'getpa_enrollee'])->name('getpaenrollee');
Route::post('/get-quote/addpa-enrollee', [pa_quote::class, 'addpa_enrollee'])->name('paaddenrollee');
Route::get('/get-quote/padeleteenrollee/{id}', [pa_quote::class, 'deletepa_enrollee']);
Route::get('/get-quote/getpa-coverage/{id}', [pa_quote::class, 'getpa_coverage'])->name('getpacoverage');
Route::post('/get-quote/addpa-coverage', [pa_quote::class, 'addpa_coverage'])->name('paaddcoverage');
Route::get('/get-quote/padeletecoverage/{id}', [pa_quote::class, 'deletepa_coverage']);
Route::get('/get-quote/getpaattachment/{id}', [pa_quote::class, 'getpa_attachment'])->name('getpaattachment');
Route::post('/get-quote/addpaattachment', [pa_quote::class, 'addpa_attachment'])->name('paaddattachment');
Route::get('/get-quote/padeleteattachment/{id}', [pa_quote::class, 'deletepa_attachment']);
Route::post('/get-quote/addpacomments', [pa_quote::class, 'addpa_comments'])->name('paaddcomments');
Route::get('/get-quote/pacomments/{id}', [pa_quote::class, 'getpa_comments'])->name('getpacomments');
Route::get('/get-quote/padeletecomments/{id}', [pa_quote::class, 'deletepa_comments']);
Route::post('/get-quote/pa-quoteupdate', [pa_quote::class, 'updatequotepa'])->name('updatequotepa');
Route::post('/get-quote/pa-quotesubmit', [pa_quote::class, 'getquotepasubmit'])->name('submitquotepa');
Route::get('/get-quote/pa-home', [pa_quote::class, 'getpaquote'])->name('paquote');
Route::get('/get-quote/getallpaquote', [pa_quote::class, 'getpa_allquote'])->name('getallpaquote');
Route::get('/get-quote/pa-quoteview/{id}', [pa_quote::class, 'getquotepaview'])->name('quotepaview');
Route::post('/get-quote/pa-quotecancel', [pa_quote::class, 'getquotepacancel'])->name('cancelquotepa');
Route::post('/get-quote/pa-quotesales', [pa_quote::class, 'getquotepasales'])->name('salesquotepa');
Route::post('/get-quote/pa-quotereview', [pa_quote::class, 'getquotepareview'])->name('reviewquotepa');
Route::post('/get-quote/pa-quoteapprove', [pa_quote::class, 'getquotepaapprove'])->name('approvequotepa');
Route::post('/get-quote/pa-quotemanager', [pa_quote::class, 'getquotepamanager'])->name('managerquotepa');
Route::get('/get-quote/view/pa/{filename}/{txnid}', [pa_quote::class, 'downloadPA']);

Route::post('/agentfeedback', [epolicy::class, 'savefeedback'])->name('agentfeedback');
Route::post('/userfeedback', [epolicy::class, 'userfeedback'])->name('userfeedback');

// Manual Monitoring
Route::get('/get-quote/manual-monitoring', [manualmonitoring::class, 'index']);
Route::post('/get-quote/manual-import', [manualmonitoring::class, 'import'])->name('import');
Route::get('/get-quote/manual-import-value/{id}', [manualmonitoring::class, 'getData'])->name('getData');
Route::get('/get-quote/manual-check-value-approve', [manualmonitoring::class, 'checkApprove'])->name('checkApprove');
Route::post('/get-quote/manual-import-search', [manualmonitoring::class, 'generateFilter'])->name('generateFilter');
Route::get('/get-quote/manual-generate-list-table/{id}/intermediaryid/{id2}', [manualmonitoring::class, 'getResult'])->name('monitoringgetresult');
Route::get('/get-quote/monitor_display', [manualmonitoring::class, 'monitor_display'])->name('monitor_display');
Route::post('/get-quote/agent', [manualmonitoring::class, 'agent_display'])->name('agent_display');

// Motor Net Rating
Route::get('/get-policy-quote/quotation', [policyQuotation::class, 'index'])->middleware('auth')->name('policyquote');
Route::get('/get-policy-quote/get-quote', [policyQuotation::class, 'getquote'])->middleware('auth')->name('policygetquote');
Route::get('/get-policy-quote/register', [motorController::class, 'index'])->middleware('auth')->name('registermotor');
Route::post('/get-policy-quote/save', [motorController::class, 'saveInfo'])->middleware('auth')->name('savemotor');
Route::post('/get-policy-quote/vehicle/save', [motorController::class, 'saveVehicleInfo'])->middleware('auth')->name('motorController.saveVehicleInfo');
Route::post('/get-policy-quote/vehicle/saveSummaryInfo', [motorController::class, 'saveSummaryInfo'])->middleware('auth')->name('motorController.saveSummaryInfo');
Route::post('/get-policy-quote/vehicle/saveSummaryMail', [motorController::class, 'sendSummaryMail'])->middleware('auth')->name('motorController.saveSummaryMail');
Route::post('/get-policy-quote/vehicle/procceedSummary', [motorController::class, 'summaryProceed'])->middleware('auth')->name('motorController.summaryProceed');
Route::post('/get-policy-quote/check-disable/{id}', [motorController::class, 'checkDisable'])->name('checkDisable');
Route::get('/get-policy-quote/edit/register/{id}', [motorController::class, 'update_record_personal'])->name('record_personal');
Route::get('/get-policy-quote/edit/register/motor/{id}', [motorController::class, 'update_record_motor'])->name('record_motor');
Route::get('/get-policy-quote/check_motor/{id}', [motorController::class, 'check_redirect_2nd_page'])->name('record_motor_new');
Route::get('/get-policy-quote/edit/register/detail/{id}', [motorController::class, 'update_record_summary'])->name('record_motor_detail');
Route::get('/get-policy-quote/edit/register/other/{id}', [motorController::class, 'update_record_other'])->name('record_motor_other');

// Motor Net Rating Reports
Route::get('/reports/motor-net-report', [policyQuotation::class, 'reportsMotorNetRating'])->name('reportMonitoringRate');
Route::post('/export/motor-net-report', [policyQuotation::class, 'exportMotorNetRating'])->name('exportMotorNetRating');

Route::post('/get-policy-quote/vehicle/save/payment', [motorController::class, 'savepaymentonly'])->middleware('auth')->name('motorController.savepaymentonly');
Route::post('/get-policy-quote/vehicle/payment', [motorController::class, 'posttoDragonPay'])->middleware('auth')->name('motorController.posttoDragonPay');
Route::post('get-policy-quote/edit/register/payment/posttoDragonPay', [motorController::class, 'posttoDragonPay'])->name('motorController.posttoDragonPayUpdate');
Route::get('/get-policy-quote/viewpdf/{id}', [motorController::class, 'pdfview'])->name('generate-pdf');
Route::get('/get-policy-quote/viewpdf/bankcert/{id}', [motorController::class, 'bankcertPdf'])->name('bank-cert-generate-pdf');
Route::get('/get-policy-quote/viewpdf/sendmailwithattachement/{id}', [motorController::class, 'viewSendMail'])->name('getquote.sendmailwithattachement');
Route::get('/get-policy-quote/check_motor/others/{id}', [motorController::class, 'check_redirect_4nd_page'])->name('record_motor_other_next');
Route::post('/get-policy-quote/vehicle/compute', [motorController::class, 'fetchMotorValue'])->middleware('auth')->name('motorController.fetchMotorValue');
Route::post('/get-policy-quote/vehicle/fetchBodyInjury', [motorController::class, 'fetchBodyInjury'])->name('motorController.fetchBodyInjury');
Route::post('/get-policy-quote/dynamic_dependent/fetch', [motorController::class, 'fetchtest'])->name('get_dynamic.fetchtest');
Route::post('/get-policy-quote/dynamic_dependent/fetch/model', [motorController::class, 'fetchmodel'])->name('get_dynamic.fetchmodel');
Route::post('/get-policy-quote/dynamic_dependent/fetch/brand', [motorController::class, 'fetchbrand'])->name('get_dynamic.fetchbrand');
Route::post('/get-policy-quote/dynamic_dependent/fetch/city', [motorController::class, 'fetchcity'])->name('get_dynamic.fetchcity');
Route::post('/get-policy-quote/dynamic_dependent/fetch/compre/city', [motorController::class, 'fetchcomprecity'])->name('get_dynamic.fetchcomprecity');
Route::post('/get-policy-quote/dynamic_dependent/fetch/mvtype', [motorController::class, 'fetchmvtype'])->name('get_dynamic.fetchmvtype');
Route::post('/get-policy-quote/dynamic_dependent/fetch/getprem', [motorController::class, 'getprem'])->name('get_dynamic.getprem');
Route::post('/get-policy-quote/dynamic_dependent/fetch/getpremCd', [motorController::class, 'getpremCd'])->name('get_dynamic.getpremCd');
Route::get('/get-policy-quote/validate/check_disable/{id}', [motorController::class, 'check_disable'])->name('motorController.check_disable');

// Epolicy Routes
Route::get('/settings', [epolicy::class, 'settings']);
Route::get('/policies', [epolicy::class, 'policies']);
Route::get('/inquiry', [epolicy::class, 'inquiries']);
Route::get('/claims', [epolicy::class, 'claims']);
Route::get('/monitoring', [epolicy::class, 'monitoring']);
Route::get('/monitoring-admin', [epolicy::class, 'monitoringAdmin']);
Route::get('/partner-training', [epolicy::class, 'partnerTraining']);
Route::get('/circulars', [epolicy::class, 'circulars']);
Route::get('/presentations', [epolicy::class, 'presentations']);
Route::get('/protech', [epolicy::class, 'protech']);
Route::get('/protech-report', [epolicy::class, 'protechReport']);
Route::get('/upload', [epolicy::class, 'uploadProfilePic']);

// Quotation Routes
Route::get('/quotation', [QuotationController::class, 'quotations']);
Route::get('/quotation/batch/insert', [QuotationController::class, 'batchInsert']);
Route::get('/quotation/single/insert', [QuotationController::class, 'singleInsert']);
Route::get('/quotation/get-a-quote/first-page', [QuotationController::class, 'getAQuote']);
Route::get('/quotation/get-a-quote/second-page', [QuotationController::class, 'getAQuote2ndPage']);
Route::post('/quotation/get-a-quote/quotation', [QuotationController::class, 'quotation']);
Route::get('/quotation/get-a-quote/quote/{id}', [QuotationController::class, 'quote']);
Route::post('/quotation/save-as-draft', [QuotationController::class, 'saveAsDraft']);
Route::get('/quotation/year', [QuotationController::class, 'getYear']);
Route::get('/quotation/model', [QuotationController::class, 'getModel']);
Route::get('/quotation/car-value', [QuotationController::class, 'getCarValue']);
Route::get('/quotation/get-a-quote/edit-first-page/{id}', [QuotationController::class, 'getAQuoteEdit']);
Route::get('/quotation/get-a-quote/edit-second-page/{id}', [QuotationController::class, 'getAQuote2ndPageEdit']);
Route::get('/quotation/view/{id}', [QuotationController::class, 'viewQuotation']);
Route::get('/quotation/downloadPolicy/{id}', [QuotationController::class, 'downloadPolicy']);
Route::post('/quotation/sharePolicy/{id}', [QuotationController::class, 'sharePolicy']);

// New Auto Excel Routes
Route::get('/get-quote/auto-excel-plus/new/{id?}', [compre::class, 'getquotecomprenew'])->name('quotemotorcomprenew');
Route::get('/get-quote/auto-excel-plus/model', [compre::class, 'getModel'])->name('autoExcelGetModel');
Route::get('/get-quote/auto-excel-plus/year', [compre::class, 'getYear'])->name('autoExcelGetYear');
Route::get('/get-quote/auto-excel-plus/car-value', [compre::class, 'getCarValue'])->name('autoExcelGetCarValue');
Route::get('/get-quote/auto-excel-plus/car-information', [compre::class, 'carInformation']);
Route::get('/get-quote/auto-excel-plus/plans', [compre::class, 'plans']);
Route::get('/get-quote/auto-excel-plus/additional-car-information', [compre::class, 'additionalCarInformation'])->name('additionalCarInformation');
Route::get('/get-quote/auto-excel-plus/personal-data', [compre::class, 'personalData']);
Route::get('/get-quote/auto-excel-plus/summary-auto-excel', [compre::class, 'summaryCompre']);
Route::get('/get-quote/auto-excel-plus/checkPromo', [compre::class, 'checkPromo']);
Route::get('/get-quote/auto-excel-plus/payment', [compre::class, 'payment']);
Route::get('/get-quote/auto-excel-plus/get-region', [compre::class, 'getRegion']);
Route::get('/get-quote/auto-excel-plus/get-province', [compre::class, 'getProvince']);
Route::get('/get-quote/auto-excel-plus/cant-find', [compre::class, 'sendEmail']);

// New Domestic Routes
Route::get('/get-quote/domestic-travel-plus/new', [domestic::class, 'new'])->name('new');
Route::get('/get-quote/domestic-travel-plus/insurance-plan', [domestic::class, 'insurancePlan'])->name('insurancePlan');
Route::get('/get-quote/domestic-travel-plus/plans', [domestic::class, 'plans']);

// Default Routes
Route::get('/{id}', [home::class, 'defaultPages']);
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
