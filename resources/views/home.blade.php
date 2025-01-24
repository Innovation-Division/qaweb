@extends('layouts.layout1')

@section('content')
<?php 
if(\Auth::user()->location){
    $path = './'.\Auth::user()->location;
}else{
    $path = './images/defaultepolicy.png'; 
}
$inquiry = "";
$claims ="";
if(session('reqhard_success')){
    $account = "";
    $policies ="active";
}elseif($errors->has('chckClientPol')){
   $account = "";
    $policies ="active";
}elseif(session('inquiry')){
    $account = "";
    $policies ="";
    $inquiry = "active";
}else{
    $account = "active";
    $policies = "";
}

?>
<link href="{{ asset('/js/datepicket/datepicker.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('/js/datepicket/bootstrap-datepicker.js') }}"></script>
<div class="container epolicycontainer pt-4 pb-4">
    @if(!\Auth::user()->loginAttemptNo)
    <script type='text/javascript'>
    jQuery(window).load(function(){
        jQuery(document).ready(function(){
            jQuery('#sample')[0].click();
        });
    });
    </script>
    <a href="#" id="sample" href="!#" data-toggle="modal" data-target="#accounttype_editload" aria-hidden="true"></a>
    <div class="modal modal-light fade edit-modals" id="accounttype_editload" name="accounttype_editload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <div class="modal-content">
                <div class="modal-header">
                    <div class="box-title">
                        <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                        <p>
                            change account type</p>
                    </div>
                </div>
                <div class="modal-body mega-form-builds">
                    <form name="account_type" id="account_type" class="form-default account_type_1" action="{{ route('myaccounttypeSave2') }}"
                    method="post">
                        {{ csrf_field() }}
                        <input type="hidden" id="emailhidlogintype2" name="emailhidlogintype2" value="{{\Auth::user()->email}}">
                        <table class="personal-info-wrap">
                            <tbody>
                                <tr>
                                    <td>
                                        account type
                                    </td>
                                    <td>
                                        <select class="form-control selectpickerb5 selectb5" name="accountType2"  id="accountType2">
                                            <option value="Individual">Individual</option>
                                            <option value="Group">Group</option>                           
                                        </select>
                                    </td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal">Close</a> <a id="save-account-type1" href="javascript:$('.account_type_1').submit();">Save changes</a>
                </div>
            </div>
        </div>
    </div>                  
    @endif
    @if ($errors->has('current_password'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('current_password')}}
            </div>
        </div> 
    @elseif($errors->has('password'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('password')}}
            </div>
        </div> 
    @elseif ($errors->has('confirmation'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('confirmation')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('birth_date'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('birth_date')}}
            </div>
        </div> 
    @elseif($errors->has('gender'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('gender')}}
            </div>
        </div> 
    @elseif ($errors->has('nationality'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('nationality')}}
            </div>
        </div> 
    @elseif ($errors->has('occupation'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('occupation')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('birthdate'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('birthdate')}}
            </div>
        </div> 
    @endif  

    @if ($errors->has('province'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('province')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('city'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('city')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('barangay'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('barangay')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('officeContactNo'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('officeContactNo')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('phone_num'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('phone_num')}}
            </div>
        </div> 
    @endif

    @if ($errors->has('mobile_num'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{$errors->first('mobile_num')}}
            </div>
        </div> 
    @endif

    @if(session('message'))
        <div>
            <div class='alert alert-success'>
                {{session('message')}}
            </div>
        </div>
    @endif

     @if(session('errmessage'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              {{session('errmessage')}}
            </div>
        </div> 
    @endif

    @if(session('reqhard_success'))
        <div>
            <div class='alert alert-success'>
                {{session('reqhard_success')}}
            </div>
        </div>
    @endif

    @if ($errors->has('chckClientPol'))
        <div>
            <div class="error-msg">
              <i class="fa fa-times-circle"></i>
              Please select one or more record
            </div>
        </div> 
    @endif

    <div class="row">
      <!--   <h3>Left Tabs</h3> -->
        <div class="col-12 col-md-3 col-lg-3 col-xl-2"> <!-- required for floating -->
            <!-- Nav tabs -->
            <a href="#upload-v" data-toggle="tab">
            <div class="profile-pic1" style="background-image: url('{{$path}}');float: center;" >
                <span class="fa fa-camera"></span>
                <span>Change Image</span>
            </div>
            </a><br>
            <div class="navcontainer">
                <div class="inner">
                    <ul class="mainnav nav nav-tabs tabs-left sideways">
                        <li class="{{$account}}"><a href="#home-v" data-toggle="tab">My Account</a></li>
                        @if(\Auth::user()->type != 'Q')
                        <li class="{{$policies}}"><a id="policytab" name="policytab" href="#profile-v" data-toggle="tab">Policies</a></li>
                        @endif
                        @if(\Auth::user()->type == 'Q')
                            <li><a href="{{route('bondsquote')}}">Bonds Quote</a></li> 
                            <li><a href="{{route('marinequote')}}">Marine Quote</a></li>              
                        @endif            
                        @if(\Auth::user()->type != 'C' && \Auth::user()->type != 'Q')
                            <li><a id="report_tab" href="#" onclick="openInNewTab('http://producersportal.cocogen.com.ph/Reports/home.aspx?strcode={{$transID4}}');">Reports</a></li>              
                        @endif
                        @if(\Auth::user()->type != 'Q')
                        <li><a id="onlinepayment_tab" href="#" onclick="openInNewTab('{{url('/online-payments')}}');">Online Payments</a></li>
                        @endif
                        @if(\Auth::user()->type === 'C' || \Auth::user()->type === 'A' || \Auth::user()->type === 'B')  
                            <li class=""><a href="#inquiry-v" data-toggle="tab">Inquiry</a></li>                           
                        @endif
                        <li class="{{$claims}}"><a href="#claims-v" data-toggle="tab">My Claims</a></li>

                        @if(\Auth::user()->type != 'C' && \Auth::user()->type != 'Q')   
                             <li><a id="training_tab" href="#partner-v" data-toggle="tab">Partner Training</a></li>
                        @endif

                        @if(\Auth::user()->type === 'A'  || \Auth::user()->type === 'D')
                            <li><a href="#" onclick="openInNewTab('{{url('/get-policy-quote/quotation')}}');">Policy Quotation</a></li>
                        @endif
                        @if( \Auth::user()->motor_net_rat_tag==='1' )
                          <li><a href="#" onclick="openInNewTab('{{url('/reports/motor-net-report')}}');">Report Motor Quotation </a></li>
                        @endif

                        @if($showProtech == 'True')  
                            <li class=""><a href="#protetech-v" data-toggle="tab">Protech Expand</a></li>                           
                        @endif
                        @if($showProtech == 'True')  
                            <li><a href="#reportprotetech-v" data-toggle="tab">Protech Expand Report</a></li>              
                        @endif
                        @if(\Auth::user()->type === 'S')
                            <li class=""><a href="#monitoring-v" data-toggle="tab">Manual Forms Monitoring</a></li>
                            <li class=""><a href="#monitoringadmin-v" data-toggle="tab">Manual Forms Sales</a></li> 
                        @endif
                        <li><a href="#settings-v" data-toggle="tab">Settings</a></li> 
                    </ul>
                    <a href="#" class="togglearrow"><i class="fa fa-angle-left"></i></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function openInNewTab(url) {
              var win = window.open(url, '_blank');
              win.focus();
            }
        </script>
        <div class="col-12 col-md-9 col-lg-9 col-xl-10">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane {{$account}}" id="home-v">
                <div class="my-account">
                            <div class="dashboard tab-content">
                                <div class="tab-pane fade in active" id="myaccount" role="tabpanel">
                                        
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                    <h2>
                                                        personal information</h2>
                                                    <a href="!#" data-toggle="modal" data-target="#personal_info_edit"><i class="fa fa-fw"
                                                        aria-hidden="true" title="Edit"></i> </a>
                                                </div>
                                                 <div class="box-content">
                                                @if(\Auth::user()->accountType === 'Group')                                               
                                                    <table class="petcapsonal-info-wrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    full name
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->name}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size: 12px;">
                                                                    Date of Incorporation
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->DateIncorporate}}
                                                                </td>
                                                            </tr>
                                                             @if(\Auth::user()->type === 'A')   
                                                            <tr>
                                                                <td>
                                                                    agent id
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->agentID}}
                                                                </td>
                                                            </tr>
                                                             @endif
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <table class="personal-info-wrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    full name
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->name}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    gender
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->gender}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Date of Birth
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->date_birth}}
                                                                    
                                                                </td>
                                                            </tr>
                                                            <!-- <tr>
                                                                <td>
                                                                    nationality
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->nationality}}
                                                                </td>
                                                            </tr> -->
                                                            <!-- <tr>
                                                                <td>
                                                                    occupation
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->occupation}}
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>  
                                                @endif
                                                </div>
                                            </div>
                                            <!-- Modal -->

                                            <div class="modal modal-light fade edit-modals" id="personal_info_edit" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel">
                                                <form name="personal_info" id="personal_info" class="form-default" action="{{ route('myaccountPersonalInfoSave') }}" 
                                                method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="emailhid" name="emailhid" value="{{\Auth::user()->email}}">
                                                <div class="modal-dialog" role="document">
                                                    <button type="button" class="close" id="btnpersonal" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="box-title">
                                                                <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                                <p>
                                                                    personal information</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body mega-form-builds">
                                                                                                   
                                                       @if(\Auth::user()->accountType === 'Group')
                                                            <table class="personal-info-wrap">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            full name
                                                                        </td>
                                                                        <td>
                                                                           {{\Auth::user()->name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-size: 12px;">
                                                                            Date of Incorporation
                                                                        </td>
                                                                        <td>

                                                                            <div class="date-form-wrapper">
                                                                                <input id="birthdate_hidden" value="" type="hidden">
                                                                                <input id="birthdate" name="birthdate" class="form-control hasDatepicker" placeholder="Date of Incorporation"
                                                                                    required autocomplete="off" type="text">
                                                                            </div>
                                                                               <script>
                                                                                      jQuery(document).ready(function(){
                                                                                        jQuery(function () {
                                                                                          jQuery("#birthdate").datepicker({ 
                                                                                                autoclose: true, 
                                                                                                todayHighlight: true,
                                                                                                format: 'mm/dd/yyyy'
                                                                                          }).datepicker('update', new Date());
                                                                                         });
                                                                                        });
                                                                                </script>
                                                                                <style type="text/css">
                                                                                    .datepicker{
                                                                                    z-index: 1100 !important;
                                                                                }
                                                                                </style>
                                                                            <small class="help-block" id="birthdateempty" data-bv-validator="notEmpty" data-bv-for="birthdate"
                                                                                data-bv-result="NOT_VALIDATED" style="display: none; color: red;">This is required
                                                                                and cannot be empty</small>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <table class="personal-info-wrap">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            full name
                                                                        </td>
                                                                        <td>
                                                                            {{\Auth::user()->name}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            gender
                                                                        </td>
                                                                        <td>
                                                                            <!-- Male -->
                                                                            <div class="select-form-wrapper">
                                                                                <select class="form-control selectpickerb5 selectb5" name="gender" required="">
                                                                                    <option value="" selected="" style="display: none;">Gender *</option>
                                                                                    <option value="Male" selected="">MALE</option>
                                                                                    <option value="Female">FEMALE</option>
                                                                                </select>
                                                                            </div>
                                                                           
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Date of Birth
                                                                        </td>
                                                                        <td>
                                                                            <div class="date-form-wrapper">
                                                                                
                                                                                <input id="birth_date" name="birth_date" class="form-control hasDatepicker" placeholder="Date of Incorporation"
                                                                                    required autocomplete="off" type="text">
                                                                            </div>
                                                                               <script>
                                                                                      jQuery(document).ready(function(){
                                                                                        jQuery(function () {
                                                                                          jQuery("#birth_date").datepicker({ 
                                                                                                autoclose: true, 
                                                                                                todayHighlight: true,
                                                                                                format: 'mm/dd/yyyy'
                                                                                          }).datepicker('update', new Date());
                                                                                         });
                                                                                        });
                                                                                </script>
                                                                                <style type="text/css">
                                                                                    .datepicker{
                                                                                    z-index: 1100 !important;
                                                                                }
                                                                                </style>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @endif                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                          <a id="personalaccountclose" data-dismiss="modal">Close</a><a href="javascript:$('#personal_info').submit();">
                                                                 Save changes</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                          <div class="col-12 col-lg-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                    <h2>
                                                        contact information</h2>
                                                    <a href="!#" data-toggle="modal" data-target="#contact_information_edit"><i class="fa fa-fw"
                                                        aria-hidden="true" title="Edit"></i> </a>
                                                </div>
                                                <div class="box-content">
                                                    <table class="contact-info-wrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    telephone
                                                                </td>
                                                                <td>
                                                                     {{\Auth::user()->telephone }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    mobile number
                                                                </td>
                                                                <td>
                                                                     {{\Auth::user()->mobileNo }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    email address
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->email}}
                                                                   
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal modal-light fade edit-modals" id="contact_information_edit" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel">
                                                <form name="contact_information1" id="contact_information1" class="form-default" action="{{ route('myaccountContactSave') }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <div class="modal-dialog" role="document">
                                                    <button type="button" id="closeaddress" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="box-title">
                                                                <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                                <p>
                                                                    contact information</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body mega-form-builds">
                                                            <table class="personal-info-wrap">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            telephone
                                                                        </td>
                                                                        <td>
                                                                            <input data-builder-default-value="" class="form-control required-entry validate-number"
                                                                                placeholder="Telephone " data-mask-config="99-9999999" data-mask-placeholder=""
                                                                                pattern="^^\(?([0-9]{2})\)?[-. ]?([0-9]{7})$" name="phone_num" value="" required=""
                                                                                data-bv-excluded="true" data-bv-notempty-message="This is required and cannot be empty"
                                                                                data-bv-field="mailing_address[address]" data-bv-regexp-message="Please enter a valid Input"
                                                                                type="text">
                                                                            <label class="field-item-note">
                                                                                Sample Format: 02-1234567</label>
                                                                            <small class="help-block" data-bv-validator="regexp" data-bv-for="contact_information[telephone_number]"
                                                                                data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid Input</small>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            mobile number
                                                                        </td>
                                                                        <td>
                                                                            <input data-builder-default-value="" class="form-control required-entry validate-number"
                                                                                placeholder="Mobile Number *" name="mobile_num" data-mask-config="99-999-9999999"
                                                                                pattern="^^\(?([0-9]{2})\)?[-. ]?([0-9]{3})?[-. ]?([0-9]{7})$" value="9107587304"
                                                                                required="" data-bv-excluded="true" data-fv-notempty-message="This is required and cannot be empty"
                                                                                data-bv-field="contact_information[mobile_number]" type="text">
                                                                            <label class="field-item-note">
                                                                                Sample Format: 63-900-1234567</label>
                                                                            <small class="help-block" id="mobilevalid" data-bv-validator="notEmpty" data-bv-for="contact_information[mobile_number]"
                                                                                data-bv-result="NOT_VALIDATED" style="display: none; color: red;">This is required
                                                                                and cannot be empty</small>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            email address
                                                                        </td>
                                                                        <td>
                                                                            <input data-builder-default-value="" class="form-control required-entry validate-email"
                                                                                placeholder="Email Address *" name="email" value=" {{\Auth::user()->email}}" data-bv-excluded="false"
                                                                                data-bv-notempty-message="This is required and cannot be empty" data-bv-field="mailing_address[address]"
                                                                                readonly="readonly" type="text">
                                                                            <small class="help-block" id="help-blockemail" data-bv-validator="notEmpty" data-bv-for="contact_information[email]"
                                                                                data-bv-result="VALID" style="display: none; color: red;">This is required and cannot
                                                                                be empty</small> <small class="help-block" id="help-blockemailnempty" data-bv-validator="regexp"
                                                                                    data-bv-for="contact_information[email]" data-bv-result="VALID" style="display: none;
                                                                                    color: red;">Please enter a valid email address</small>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                       
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a id="changeContactButtonClose" data-dismiss="modal">Close</a> <a href="javascript:$('#contact_information1').submit();">
                                                                Save changes</a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                    <h2>
                                                        mailing address</h2>
                                                    <a href="!#" data-toggle="modal" data-target="#mailing_address_edit"><i class="fa fa-fw"
                                                        aria-hidden="true" title="Edit"></i> </a>
                                                </div>
                                                <div class="box-content">
                                                    <table class="mailing-address-wrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    province
                                                                </td>
                                                                <td>
                                                                    {{ucwords(strtolower(\Auth::user()->province)) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    city
                                                                </td>
                                                                <td>
                                                                    {{ucwords(strtolower(\Auth::user()->city)) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    barangay
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->barangay }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Office Contact Number
                                                                </td>
                                                                <td>
                                                                    {{\Auth::user()->officeContactNo }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal modal-light fade edit-modals" id="mailing_address_edit" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel">
                                                <form name="mailing_address" id="mailing_address" class="form-default" action="{{ route('myaccountMailingSave') }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="hidURL" name="hidURL" value="{{url('/')}}">
                                                <input type="hidden" name="emailhide" name="emailhide" value="{{\Auth::user()->email}}">
                                                <div class="modal-dialog" role="document">
                                                    <button type="button" id="closemailadd" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="box-title">
                                                                <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                                <p>
                                                                    mailing address</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body mega-form-builds">
                                                            <table class="personal-info-wrap ">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            province
                                                                        </td>
                                                                        <td>
                                                                            <div class="select-form-wrapper">

                                                                                <select class="form-control dynamicprovince selectpicker selectb5" 
                                                                                    name="province" id="province" data-size="5" data-live-search="true">
                                                                                    @foreach($provinces as $province)
                                                                                        <option value="{{$province->name}}">{{$province->name}}</option>
                                                                                      @endforeach 
                                                                                      @if (old('province'))
                                                                                         <option value="{{ old('province') }}" style="display:none;opacity: 0.6;color: gray;" selected="selected" readonly>{{ old('province') }}</option>                                             
                                                                                      @else
                                                                                        <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>Province * </option>
                                                                                      @endif
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            city
                                                                        </td>
                                                                        <td>
                                                                            <div class="select-form-wrapper">

                                                                                <script>
                                                                                      jQuery(document).ready(function(){

                                                                                       jQuery('#province.selectpicker').selectpicker();
                                                                                       jQuery('#barangay.selectpicker').selectpicker();
                                                                                       jQuery('#city.selectpicker').selectpicker();
                                                                                       jQuery('#occupation.selectpicker').selectpicker();
                                                                                       jQuery('#nationality.selectpicker').selectpicker();


                                                                                       jQuery('.dynamicprovince').change(function(){
                                                                                        if(jQuery(this).val() != '')
                                                                                        {         
                                                                                              var province = jQuery(this).val();
                                                                                              $hidURL = jQuery('input[name=hidURL]').val();
                                                                                              var url = $hidURL+ '/dynamic_dependent/fetch/city';    
                                                                                              var _token = jQuery('input[name="_token"]').val();
                                                                                            
                                                                                         jQuery.ajax({
                                                                                          url: url,
                                                                                          method:"POST",
                                                                                          data:{ _token:_token,province:province},
                                                                                             error: function(data){
                                                                                                              var errors = data.responseJSON;
                                                                                                             //alert(errors);
                                                                                                               jQuery.each(data, function(key, value){
                                                                                                                // alert(value);
                                                                                                                });
                                                                                                                // Render the errors with js ...
                                                                                                              }, 
                                                                                          success:function(result)
                                                                                          {        
                                                                                            jQuery('#city').html(result);    
                                                                                            jQuery('#city').selectpicker("refresh");   
                                                                                          }

                                                                                         })
                                                                                        }
                                                                                       }); 
                                                                                      });
                                                                                    </script>
                                                                                    <script>
                                                                                      jQuery(document).ready(function(){

                                                                                       jQuery('.dynamiccity').change(function(){
                                                                                        if(jQuery(this).val() != '')
                                                                                        {         
                                                                                              var city = jQuery(this).val();
                                                                                              $hidURL = jQuery('input[name=hidURL]').val();
                                                                                              var url = $hidURL+ '/dynamic_dependent/fetch/getbarangay';    
                                                                                              var _token = jQuery('input[name="_token"]').val();
                                                                                            
                                                                                         jQuery.ajax({
                                                                                          url: url,
                                                                                          method:"POST",
                                                                                          data:{ _token:_token,city:city},
                                                                                             error: function(data){
                                                                                                              var errors = data.responseJSON;
                                                                                                             //alert(errors);
                                                                                                               jQuery.each(data, function(key, value){
                                                                                                                // alert(value);
                                                                                                                });
                                                                                                                // Render the errors with js ...
                                                                                                              }, 
                                                                                          success:function(result)
                                                                                          {        
                                                                                            jQuery('#barangay').html(result);    
                                                                                            jQuery('#barangay').selectpicker("refresh");   
                                                                                          }

                                                                                         })
                                                                                        }
                                                                                       }); 
                                                                                      });
                                                                                    </script>
                                                                                <select name="city" id="city"  class="form-control dynamiccity selectpicker selectb5" data-size="5" data-live-search="true">
                                                                                    <option value="">City*</option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            barangay
                                                                        </td>
                                                                        <td>
                                                                            <div class="select-form-wrapper">
                                                                                <select id="barangay" name="barangay" class="form-control selectpicker selectb5" data-size="5" data-live-search="true">
                                                                                    <option value="">Barangay*</option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-size: 12px;">
                                                                            Office Contact Number
                                                                        </td>
                                                                        <td>
                                                                            <input id="officeContactNo" name="officeContactNo" class="form-control">
                                                                          
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a id="changeMailButtonClose" data-dismiss="modal">Close</a> <a href="javascript:$('#mailing_address').submit();">
                                                                Save changes</a></button>


                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                      
                                    </div>
                                   
                                    <!-- <div class="tab-pane" id="policies" role="tabpanel">
                    </div> -->
                                    <div class="box-account box-info">
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="tab-pane {{$policies}}" id="profile-v">

                <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
                <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
                <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
                <style type="text/css">
                    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                        padding-right: 0px !important;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button {
                        padding : 0px;
                        margin-left: 0px;
                        display: inline;
                        border: none !important;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button a {
                        color: #008080;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled a {
                        color: #666;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
                        border: none !important;
                        background: none !important;
                    }
                    /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
                </style>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        var table = jQuery('#mypolicy').DataTable( {
                            responsive: true,      
                            dom: '<"pull-left col1"f><"pull-right col2"l>tip'
                                 
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });

                        var table2 = jQuery('#mypolicyasagent').DataTable( {
                            responsive: true,          
                            dom: '<"pull-left col1"f><"pull-right col2"l><"pull-paget">tip'
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });
                    } );
                </script>
                <style type="text/css">
                @media all and (min-width:0px) and (max-width: 800px) {
                    /* .pull-left{float:left!important;}
                    .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;} */
                    /*.pull-paget{float:left!important;}*/
                    /*.pull-infot{float:left!important;}*/
                }
                </style>
                @if(\Auth::user()->type != 'C')
                    <h2 class="mb-4">My Clients' Policies</h2>
                    <div> 
                        <form method="POST" class="form-default" action="{{ url('/sendForHardCopyAgent') }}">  
                            {{ csrf_field() }}  
                            <div class="overflow-auto">
                              <table>
                                <table id="mypolicy" class="table table-striped table-bordered nowrap" style="width:100%;">
                                                                <thead>
                                                                    <tr>
                                                                         <th></th>
                                                                        <th>ID</th>
                                                                        <th>Policy Number</th>
                                                                        <th>Assured ID</th>
                                                                        <th>Assured Name</th>
                                                                        <th>Product Line</th>
                                                                        <th>Policy Period</th>
                                                                        <th>Documents</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                   
                                                                @if($cocogen_epolicy_dtls)
                                                                    @if(empty($cocogen_epolicy_dtls["TErrorMsg"]))
                                                                        @foreach($cocogen_epolicy_dtls as $cocogen_epolicy_dtl)
                                                                        <?php $id = base64_encode($cocogen_epolicy_dtl['policy_no']) ?>
                                                                        <tr>
                                                                            <td><input id="chckClientPol" name="chckClientPol[]" type="checkbox"
                                                                                    value="{{$cocogen_epolicy_dtl['policy_no']}}"></td>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{$cocogen_epolicy_dtl['policy_no'] }}</td>
                                                                            <td>{{$cocogen_epolicy_dtl['assured_id']}}</td>
                                                                            <td>{{$cocogen_epolicy_dtl['assured_name']}}</td>
                                                                            <td>{{$cocogen_epolicy_dtl['line_name']}}</td>
                                                                            <td>{{date("m/d/Y", strtotime($cocogen_epolicy_dtl['start_date']))}} -
                                                                                {{date("m/d/Y", strtotime($cocogen_epolicy_dtl['end_date']))}}
                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                <?php $strrep = str_replace(" / ","_",$cocogen_epolicy_dtl['policy_no']);  ?>
                                                                                <a type="button" href="{{ route('print-policy-docs', $strrep)}}"
                                                                                    title="Download Policy Document" target="_blank"> <i class="fa fa-file-text-o" aria-hidden="true"></i></a> &nbsp
                                                                                <a href="{{ route('print-invoice', $cocogen_epolicy_dtl)}}"
                                                                                    title="Download Invoice" target="_blank"> <i class="fa fa-files-o"
                                                                                        aria-hidden="true"></i></a> &nbsp
                                                                                <a type="button" href="{{ route('print-policy-jacket', $strrep)}}"
                                                                                    title="Download Policy Jacket" target="_blank"> <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                                                                            </td>
                                                                            @if($cocogen_epolicy_dtl['payment_status'] == 'PAID') 
                                                                            <td>
                                                                                {{$cocogen_epolicy_dtl['payment_status']}}
                                                                            </td>
                                                                            @elseif($cocogen_epolicy_dtl['payment_status'] == 'CANCELLED') 
                                                                            <td>
                                                                                {{$cocogen_epolicy_dtl['payment_status']}}
                                                                            </td>
                                                                            @else
                                                                            <td>
                                                                            <a href="{{ url('/online-payments')}}" title="Pay Policy"
                                                                                target="_blank"> Pending Payment</a>
                                                                            </td>
                                                                            @endif
                                                                        </tr>
                                                                        @endforeach
                                                                    @endif
                                                                @endif
                                                                </tbody>
                                                        </table><br>
                              </table>
                            </div>

                                <br>
                                <button id="btnrequestForHardcopy" type="submit" class="btn btn-primary" style="float: left;">Request for hardcopy</button>                  
                                <div class="container col-md-12" style="text-align: left;">
                                        
                                </div>
                                <div class="container col-md-12" style="text-align: left;margin-top: 10px;">
                                    <p>
                                        <em>*Your records have been updated as of {{$date}}.</em>
                                    </p>                          
                                </div>
                        </form>
                    </div>
                    <br>
                    <style type="text/css">
                       .pull-left{
                        float: left !important;
                        }
                    </style>
                @endif
                @if(\Auth::user()->type != 'A')
                <h2 class="mb-4">My Policies</h2>
                <div> 
                    <form method="POST" class="form-default" action="{{ url('/sendForHardCopyClient') }}">  
                        {{ csrf_field() }}

                        <div class="overflow-auto">        
                        <table id="mypolicyasagent" class="table table-striped table-bordered nowrap" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Policy Number</th>
                                        <th>Assured ID</th>
                                        <th>Product Line</th>
                                        <th>Policy Period</th>
                                        <th>Documents</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($cocogen_epolicy_dtl_clients)
                                    @if(empty($cocogen_epolicy_dtl_clients["TErrorMsg"]))
                                            @foreach($cocogen_epolicy_dtl_clients as $cocogen_epolicy_dtl)
                                                <?php $id = base64_encode($cocogen_epolicy_dtl['policy_no']) ?>
                                                <tr>
                                                    <td><input id="chckClientPol" name="chckClientPol[]" type="checkbox"
                                                            value="{{$cocogen_epolicy_dtl['policy_no']}}"></td>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{$cocogen_epolicy_dtl['policy_no'] }}</td>
                                                    <td>{{$cocogen_epolicy_dtl['assured_id']}}</td>
                                                    <td>{{$cocogen_epolicy_dtl['line_name']}}</td>
                                                    <td>{{date("m/d/Y", strtotime($cocogen_epolicy_dtl['start_date']))}} -
                                                        {{date("m/d/Y", strtotime($cocogen_epolicy_dtl['end_date']))}}</td>
                                                    <td style="text-align: center">
                                                        <?php $strrep = str_replace(" / ","_",$cocogen_epolicy_dtl['policy_no']);  ?>
                                                        <a type="button" href="{{ route('print-policy-docs', $strrep)}}"
                                                            title="Download Policy Document"> <i class="fa fa-file-text-o" aria-hidden="true"></i></a> &nbsp
                                                            <a href="{{ route('print-invoice', $cocogen_epolicy_dtl)}}"
                                                                                title="Download Invoice" target="_blank"> <i class="fa fa-files-o"
                                                                                    aria-hidden="true"></i></a> &nbsp
                                                        <a type="button" href="{{ route('print-policy-jacket', $strrep)}}"
                                                            title="Download Policy Jacket" target="_blank"> <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                                                    </td>
                                                    @if($cocogen_epolicy_dtl['payment_status'] == 'PAID') 
                                                    <td>
                                                        {{$cocogen_epolicy_dtl['payment_status']}}
                                                    </td>
                                                    @elseif($cocogen_epolicy_dtl['payment_status'] == 'CANCELLED') 
                                                    <td>
                                                        {{$cocogen_epolicy_dtl['payment_status']}}
                                                    </td>
                                                    @else
                                                    <td>
                                                    <a href="{{ url('/online-payments')}}" title="Pay Policy"
                                                                            target="_blank"> Pending Payment</a>
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
                                @endif
                                </tbody>
                               
                        </table> 
                        </div> <br>
                        <button id="btnrequestForHardcopyclient"  type="submit" class="btn btn-primary" style="float: left;">Request for hardcopy</button>                     
                        <div class="container col-md-12" style="text-align: left;">
                                
                        </div>
                        <div class="container col-md-12" style="text-align: left;margin-top: 10px;">
                            <p>
                                <em>*Your records have been updated as of {{$date}}.</em>
                            </p>                          
                        </div>
                    </form>
                </div>
                @endif
            </div>
            <div class="tab-pane {{$inquiry}}" id="inquiry-v">
                @include('epartnerhubinquiry')
            </div>
            @if(\Auth::user()->type != 'C')
                <div class="tab-pane" id="messages-v">Report Tab.</div>
            @endif
            <div class="tab-pane" id="protetech-v">
              @include('protechexpand')
            </div>
     
            <div class="tab-pane" id="reportprotetech-v">
              @include('protechexpandreport')
            </div>
            <div class="tab-pane" id="settings-v">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="box">
                             <div class="box-title">
                                                    <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                    <h2>
                                                       account type</h2>
                                                    <a href="!#" data-toggle="modal" data-target="#accounttype_edit"><i class="fa fa-fw"
                                                        aria-hidden="true" title="Edit"></i> </a>
                                                </div>
                            <div class="box-content">
                                <table class="login-info-wrap">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Account Type
                                            </td>
                                            <td>
                                                {{\Auth::user()->accountType}}
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                 
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               <br>
                            </div>
                        </div>
                        <!-- Modal -->
                        
                        <script type="text/javascript">
                            $('#agentCode').select2();
                        </script>

                        <form name="agentSave" id="agentSave" action="{{ route('saveAgent') }}"
                            method="post">
                            {{ csrf_field() }}
                                 
                        <div class="box">
                            <div class="box-title">
                                                    <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                                    <h2>
                                                       Agent</h2>
                                                </div>
                            @if(count($cocogen_user_agent)> 0)
                            <div class="box-content">
                                <table class="login-info-wrap">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Agent Name                        
                                            </td>
                                            <td>
                                             {{$cocogen_user_agent[0]['name']}} 
                                              <input type="hidden" name="agentName" id='agentName' class='form-control  agentName' value="  {{$cocogen_user_agent[0]['name']}} ">
                                            </td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                Agent Code                        
                                            </td>
                                            <td>
                                              <!-- <input type="hidden" name="agentCodes" id='agentCodes' class='form-control  agentCods' value="{{$agentCode}}"> -->
                                              <select  id="agentCode" name="agentCode" value="" data-size="10"  class="btn-group form-control agentCode dynamic2 " data-live-search="true" style="font-family: muli" data-dependent="" }>
                                                @if( old('agentCode') =='' && $codeAgent=='')
                                                <option value="" selected="selected" style="display:none;" disabled="disabled" readonly>--Select Agent Name </option>
                                                @else
                                                <option value="{{!empty($codeAgent) ? $codeAgent :old('agentCode') }}" selected hidden>{{  !empty($codeAgent) ? $codeAgent: old('agentCode') }}</option>
                                                @endif
                                                @foreach ($agentCode as  $agentCode)
                                                <option value="{{ $agentCode->code}}">{{ $agentCode->code }}</option>
                                                @endforeach
                                            </select>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <input type='submit' id="saveAgent" class=" saveAgent btn btn-primary btn-md pull-right" style="margin-left: 100px;font-weight: bold;"value='Save'>
                                            </td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                               <br>
                            </div>
                            @endif
                        </div>
                        </form>
                        <div class="modal modal-light fade edit-modals" id="accounttype_edit" name="accounttype_edit" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="box-title">
                                            <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                            <p>
                                                change account type</p>
                                        </div>
                                    </div>
                                    <div class="modal-body mega-form-builds">
                                        <form name="account_type" id="account_type" class="form-default account_type_2" action="{{ route('myaccounttypeSave') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="emailhidlogintype" name="emailhidlogintype" value="{{\Auth::user()->email}}">
                                            <table class="personal-info-wrap">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            account type
                                                        </td>
                                                        <td>
                                                            <select class="form-control selectpickerb5 selectb5" name="accountType"  id="accountType">
                                                                <option value="Individual">Individual</option>
                                                                <option value="Group">Group</option>                           
                                                        </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a data-dismiss="modal">Close</a> <a id="save-account-type2" href="javascript:$('.account_type_2').submit();">Save changes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-12 col-lg-6">
                        <div class="box box h-100">
                            <div class="box-title">
                                <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                <h2>
                                    login information</h2>
                            </div>
                            <div class="box-content">
                                <table class="login-info-wrap">
                                    <tbody>
                                        <tr>
                                            <td>
                                                email address
                                            </td>
                                            <td>
                                                {{\Auth::user()->email}}
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                 <a href="!#" data-toggle="modal" data-target="#change_pw_modal" class="btn btn-primary">
                                    Change Password</a>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               <br>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal modal-light fade edit-modals" id="change_pw_modal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <form name="contact_information" id="contact_information" class="form-default" action="{{ route('myaccountResetSave') }}"
                            method="post">
                            {{ csrf_field() }}
                            <input type="hidden" id="emailhidlogin" name="emailhidlogin" value="{{\Auth::user()->email}}">
                            <div class="modal-dialog" role="document">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="box-title">
                                            <span class="box-title-icon"><i class="fa fa-fa-fw" aria-hidden="true"></i> </span>
                                            <p>
                                                change password</p>
                                        </div>
                                    </div>
                                    <div class="modal-body mega-form-builds">
                                        <table class="personal-info-wrap">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        current password
                                                    </td>
                                                    <td>
                                                        <input data-builder-default-value="" class="form-control required-entry validate-password"
                                                            placeholder="Enter your current password here *" name="current_password" value=""
                                                            required="" data-bv-excluded="false" data-bv-notempty-message="This is required and cannot be empty"
                                                            data-bv-field="mailing_address[address]" type="password">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        new password
                                                    </td>
                                                    <td>
                                                        <input data-builder-default-value="" class="form-control required-entry validate-password"
                                                            placeholder="Enter your new password here *" name="password" value="" required=""
                                                            data-bv-excluded="false" data-bv-notempty-message="This is required and cannot be empty"
                                                            data-bv-field="mailing_address[address]" type="password">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        confirm password
                                                    </td>
                                                    <td>
                                                        <input data-builder-default-value="" class="form-control required-entry validate-password"
                                                            placeholder="Confirm your new password here *" name="confirmation" value="" required=""
                                                            data-bv-excluded="false" data-bv-notempty-message="This is required and cannot be empty"
                                                            data-bv-field="mailing_address[address]" type="password">
                                                        <input data-builder-default-value="" name="change_password" value="1" type="hidden">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <a data-dismiss="modal">Close</a> <a id="save-contact-info" href="javascript:$('#contact_information').submit();">Save changes</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>                                       
                </div>
                <div class="row">
                                                        
                </div>
            </div>
            <div class="tab-pane {{$claims}}" id="claims-v">

                <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
                <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
                <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
                <style type="text/css">
                    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                        padding-right: 0px !important;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button {
                        padding : 0px;
                        margin-left: 0px;
                        display: inline;
                        border: none !important;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button a {
                        color: #008080;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled a {
                        color: #666;
                    }
                    .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
                        border: none !important;
                        background: none !important;
                    }
                    /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
                </style>
                <script type="text/javascript">
                    jQuery(document).ready(function() {
                        var table = jQuery('#mypolicy2').DataTable( {
                            responsive: true,      
                            dom: '<"pull-left col1"f><"pull-right col2"l>tip'
                                 
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });

                        var table2 = jQuery('#mypolicyasagent2').DataTable( {
                            responsive: true,          
                            dom: '<"pull-left col1"f><"pull-right col2"l><"pull-paget">tip'
                        } );
                         jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
                           'width': '93px',
                           'background-color' : 'white'
                         });
                    } );
                </script>
                <style type="text/css">
                @media all and (min-width:0px) and (max-width: 800px) {
                    /* .pull-left{float:left!important;}
                    .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;} */
                    /*.pull-paget{float:left!important;}*/
                    /*.pull-infot{float:left!important;}*/
                }
                </style>
                <style type="text/css">
                @media all and (min-width:0px) and (max-width: 800px) {
                    .pull-left{float:left!important;}
                    .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;}
                    /*.pull-paget{float:left!important;}*/
                    /*.pull-infot{float:left!important;}*/
                }
                </style>
                <style>
                        div.scroll { 
                            width: 100%; 
                            overflow: auto; 
                            white-space: nowrap; 
                        } 
                    </style>
                @if(\Auth::user()->type != 'C')
                    <h2 style="text-align: left;">Client’s claim status</h2> 
                    <br>    
                    <br>    
                        <span style="font-family: muli;"> 
                        <form method="POST" >  
                        {{ csrf_field() }}  
                            <div class="scroll">         
                                <table id="mypolicy2" class="table table-striped table-bordered nowrap" style="width:100%;width: 80px !important;margin-top: 10px !important">
                                        <thead>
                                            <tr>
                                                <th>Policy Number</th>
                                                <th>Claim Number</th>
                                                <th>Assured </th>
                                                <th>Date Updated</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($geniisysdata)
                                                @foreach($geniisysdata as $geniisysdatas)
                                                <tr>
                                                    <td>{{$geniisysdatas['policy_no']}}</td>
                                                    <td>{{$geniisysdatas['claim_no']}}</td>
                                                    <td>{{ substr($geniisysdatas['assured'],0,50) }}<?php if(strlen($geniisysdatas['assured']) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("m/d/Y", strtotime($geniisysdatas['claim_file_date']))}}</td>
                                                    <td>{{$geniisysdatas['mini_note']}}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                </table><br>
                            </div>
                        </form>
                        </span>
                    <br>
                    <hr>
                    <style type="text/css">
                       .pull-left{
                        float: left !important;
                        }
                    </style>
                @endif
                @if(\Auth::user()->type != 'A')
                 <h2 style="text-align: left;">My Claim Status</h2>
                    <span style="font-family: muli;"> 
                    <form method="POST" action="{{ url('/sendForHardCopyClient') }}">  
                    {{ csrf_field() }}  

                     <div class="scroll">         
                        <table id="mypolicyasagent2" class="table table-striped table-bordered nowrap" style="width:100%;">
                                <thead>
                                    <tr>
                                            <th>Policy Number</th>
                                            <th>Claim Number</th>
                                            <th>Assured </th>
                                            <th>Date Updated</th>
                                            <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($geniisysdataclient)
                                            @foreach($geniisysdataclient as $geniisysdataclientss)
                                            
                                            <tr>
                                                  <td>{{$geniisysdataclientss['policy_no']}}</td>
                                                    <td>{{$geniisysdataclientss['claim_no']}}</td>
                                                    <td>{{ substr($geniisysdataclientss['assured'],0,50) }}<?php if(strlen($geniisysdataclientss['assured']) > 49){ ?>... <?php } ?></td>
                                                    <td>{{date("m/d/Y", strtotime($geniisysdataclientss['claim_file_date']))}}</td>
                                                    <td>{{$geniisysdataclientss['mini_note']}}</td>
                                            </tr>
                                            @endforeach
                                    @endif
                                </tbody>
                               
                        </table>  
                       </div>
                    </form>
                    </span>
                @endif
            </div> 
            <div class="tab-pane" id="partner-v">
                @include('produceronboarding')
            </div> 
            <div class="tab-pane" id="monitoring-v">
                @include('monitoring.monitoring')
            </div>
            <div class="tab-pane" id="monitoringadmin-v">
                @include('monitoring.monitoringadmin')
            </div>

            <div class="tab-pane" id="presentation-v">
                @include('presentation')
            </div> 
            <div class="tab-pane" id="circular-v">
                @include('circular')
            </div> 
            <div class="tab-pane" id="upload-v">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                             <div class="box-title">
                                <span class="box-title-icon"><i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
                                Upload profile picture
                            </div>
                            <div class="box-content p-3">
                                <form class="form-horizontal form-default" method="post" action="{{route('profilepicsave')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                 <div class="avatar-wrapper">
                                    <img class="profile-pic" src="" />
                                    <div class="upload-button">
                                        <i class="upfa fa fa-cloud-upload" aria-hidden="true"></i>
                                    </div>
                                    <input id="filename" name="filename" class="file-upload" type="file" accept="image/*"/>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary">Upload Image</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal -->
              
                       
                    </div>                               
                </div>               
            </div>
              @include('epartnerhub_feedback') 
          </div>
        </div>        
    </div>
</div>

<div class="container">
    <div class="row">
      
    </div>
</div>
<input type="hidden" name="feedbackUserDate" id='feedbackUserDate' class='feedbackUserDate' value="{{ $feedbackUserDate }}">
<input type="hidden" name="feedbackUserNotif" id='feedbackUserNotif' class='feedbackUserNotif' value="{{ $feedbackUserNotif }}">
 @include('epolicymodal')
<script type="text/javascript">
    //add count policies
    jQuery('#policytab').click(function(){           
        var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('input[name="email"]').val();
        jQuery.ajax({
            url:'{{url('/')}}' + '/api/logs/update/policies_no',
            method:"GET",
            data:{ _token:_token,email:email}, 
            success:function(result)
            {        
            }
        })        
    }); 

    //add count onlinepayment
    jQuery('#onlinepayment_tab').click(function(){           
        var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('input[name="email"]').val();
        jQuery.ajax({
            url:'{{url('/')}}' + '/api/logs/update/online_payment_no',
            method:"GET",
            data:{ _token:_token,email:email}, 
            success:function(result)
            {        
            }
        })        
    }); 

    //add count training
    jQuery('#training_tab').click(function(){           
        var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('input[name="email"]').val();
        jQuery.ajax({
            url:'{{url('/')}}' + '/api/logs/update/partner_training_no',
            method:"GET",
            data:{ _token:_token,email:email}, 
            success:function(result)
            {        
            }
        })        
    }); 

    //add count report
    jQuery('#report_tab').click(function(){           
        var _token = jQuery('input[name="_token"]').val();
        var email = jQuery('input[name="email"]').val();
        jQuery.ajax({
            url:'{{url('/')}}' + '/api/logs/update/reports_training_no',
            method:"GET",
            data:{ _token:_token,email:email}, 
            success:function(result)
            {        
            }
        })        
    }); 

    //add count report agent
    jQuery('#btnrequestForHardcopy').click(function(){     
        if($('[name="chckClientPol[]"]:checked').length > 0){
            var _token = jQuery('input[name="_token"]').val();
            var email = jQuery('input[name="email"]').val();
            jQuery.ajax({
                url:'{{url('/')}}' + '/api/logs/update/requesst_hardcopy_training_no',
                method:"GET",
                data:{ _token:_token,email:email}, 
                success:function(result)
                {        
                }
            })     
        }    
           
    }); 

    //add count report client
    jQuery('#btnrequestForHardcopyclient').click(function(){ 
    
        if($('[name="chckClientPol[]"]:checked').length > 0){
            var _token = jQuery('input[name="_token"]').val();
            var email = jQuery('input[name="email"]').val();
        jQuery.ajax({
            url:'{{url('/')}}' + '/api/logs/update/requesst_hardcopy_training_no',
            method:"GET",
            data:{ _token:_token,email:email}, 
            success:function(result)
            {        
            }
        })      
        }
            
    }); 
    // Get the list of Agent 
   var _token = jQuery('input[name="_token"]').val();
    jQuery.ajax({
                 url: "{{ url('/get-quote/agent') }}",
                 method: 'POST',
                 data:{ _token:_token}, 
                 success: function(data) {
                     //console.log(data);
                     // process the data and add it to the dropdown
                     data.forEach(function(agent) {
                         // construct the option HTML with the agent name and number
                         var optionHtml = '<option value="' + agent.agent_no + '">' + ' ' + agent.agent_no + '-'  + agent.agent_name + '</option>';

                         // append the option to the intermediary dropdown
                         $('#intermediary').append(optionHtml);
                     });
                 }
             });

        jQuery.ajax({
                 url: "{{ url('/get-quote/agent') }}",
                 method: 'POST',
                 data:{ _token:_token}, 
                 success: function(data) {
                     console.log(data);
                     // process the data and add it to the dropdown
                     data.forEach(function(agent) {
                         // construct the option HTML with the agent name and number
                         var optionHtml = '<option value="' + agent.agent_no + '">' + ' ' + agent.agent_no + '-'  + agent.agent_name + '</option>';

                         // append the option to the intermediary dropdown
                         $('#intermediary_2').append(optionHtml);
                     });
                 }
             });
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                jQuery('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    jQuery(".file-upload").on('change', function(){
        readURL(this);
    });
    
    jQuery(".upload-button").on('click', function() {
       jQuery(".file-upload").click();
    });
});
</script>
<script type="text/javascript">
    jQuery(document).ready(function(){

    var $checkboxes = jQuery('#devel-generate-content-form td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        jQuery('#count-checked-checkboxes').text(countCheckedCheckboxes);
        
        jQuery('#edit-count-checked-checkboxes').val(countCheckedCheckboxes);
    });

});
</script>
<style type="text/css">
        .button-three {
            position: relative;
            background-color: #53b947;
            border: none;
            padding: 20px;
            width: 200px;
            text-align: center;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
            overflow: hidden;
            color:white;
            margin-bottom: 10px;
        }

        .button-three:hover{
           background:#fff;
           box-shadow:0px 2px 10px 5px #97B1BF;
           color:#000;
        }

        .button-three:after {
            content: "";
            background: #53b947;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .button-three:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }
    .avatar-wrapper{
    position: relative;
    height: 200px;
    width: 200px;
    margin: 50px auto;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 1px 1px 15px -5px black;
    transition: all .3s ease
    }
    .avatar-wrapper:hover{
        transform: scale(1.05);
        cursor: pointer;
    }
    .avatar-wrapper:hover .profile-pic{
        opacity: .5;
    }

    .profile-pic {
    height: 100%;
        width: 100%;
        transition: all .3s ease;
        
    }
    .profile-pic:after{
            font-family: FontAwesome;
            content: "";
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            font-size: 190px;
            background: #ecf0f1;
            color: #34495e;
            text-align: center;
        }

    .upload-button {
        position: absolute;
        top: 0; left: 0;
        height: 100%;
        width: 100%;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .upfa{
        position: absolute;
        font-size: 60px;
        opacity: 0;
        transition: all .3s ease;
       
    }
    .upload-button:hover .fa{
        opacity: .9;
    }

    .profile-pic1 {
        border-radius: 50%;
        height: 150px;
        width: 150px;
        background-size: cover;
        background-position: center;
        background-blend-mode: multiply;
        vertical-align: middle;
        text-align: center;
        color: transparent;
        transition: all .3s ease;
        text-decoration: none;
        text-align: center;
    }
        .profile-pic1:hover {
            background-color: rgba(0,0,0,.5);
            z-index: 10000;
            color: #fff;
            transition: all .3s ease;
            text-decoration: none;
        }

        .profile-pic1 span {
            display: inline-block;
            padding-top: 4.5em;
            padding-bottom: 4.5em;

        }

      .tabs-left, .tabs-right {
                  border-bottom: none;
                  padding-top: 2px;
                }
                .tabs-left {
                  border-right: 1px solid #ddd;
                }
                .tabs-right {
                  border-left: 1px solid #ddd;
                }
                .tabs-left>li, .tabs-right>li {
                  float: none;
                  margin-bottom: 2px;
                }
                .tabs-left>li {
                  margin-right: -1px;
                }
                .tabs-right>li {
                  margin-left: -1px;
                }
                .tabs-left>li.active>a,
                .tabs-left>li.active>a:hover,
                .tabs-left>li.active>a:focus {
                  border-bottom-color: #ddd;
                  border-right-color: transparent;
                }

                .tabs-right>li.active>a,
                .tabs-right>li.active>a:hover,
                .tabs-right>li.active>a:focus {
                  border-bottom: 1px solid #ddd;
                  border-left-color: transparent;
                }
                .tabs-left>li>a {
                  border-radius: 4px 0 0 4px;
                  margin-right: 0;
                  display:block;
                }
                .tabs-right>li>a {
                  border-radius: 0 4px 4px 0;
                  margin-right: 0;
                }
                /*  bhoechie tab */
                div.bhoechie-tab-container{
                  z-index: 10;
                  background-color: #ffffff;
                  padding: 0 !important;
                  border-radius: 4px;
                  -moz-border-radius: 4px;
                  border:1px solid #ddd;
                  margin-top: 20px;
                  margin-left: 50px;
                  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
                  box-shadow: 0 6px 12px rgba(0,0,0,.175);
                  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
                  background-clip: padding-box;
                  opacity: 0.97;
                  filter: alpha(opacity=97);
                }
                div.bhoechie-tab-menu{
                  padding-right: 0;
                  padding-left: 0;
                  padding-bottom: 0;
                }
                div.bhoechie-tab-menu div.list-group{
                  margin-bottom: 0;
                }
                div.bhoechie-tab-menu div.list-group>a{
                  margin-bottom: 0;
                }
                div.bhoechie-tab-menu div.list-group>a .glyphicon,
                div.bhoechie-tab-menu div.list-group>a .fa {
                  color: #5A55A3;
                }
                div.bhoechie-tab-menu div.list-group>a:first-child{
                  border-top-right-radius: 0;
                  -moz-border-top-right-radius: 0;
                }
                div.bhoechie-tab-menu div.list-group>a:last-child{
                  border-bottom-right-radius: 0;
                  -moz-border-bottom-right-radius: 0;
                }
                div.bhoechie-tab-menu div.list-group>a.active,
                div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
                div.bhoechie-tab-menu div.list-group>a.active .fa{
                  background-color: #5A55A3;
                  background-image: #5A55A3;
                  color: #ffffff;
                }
                div.bhoechie-tab-menu div.list-group>a.active:after{
                  content: '';
                  position: absolute;
                  left: 100%;
                  top: 50%;
                  margin-top: -13px;
                  border-left: 0;
                  border-bottom: 13px solid transparent;
                  border-top: 13px solid transparent;
                  border-left: 10px solid #5A55A3;
                }

                div.bhoechie-tab-content{
                  background-color: #ffffff;
                  /* border: 1px solid #eeeeee; */
                  padding-left: 20px;
                  padding-top: 10px;
                }

                div.bhoechie-tab div.bhoechie-tab-content:not(.active){
                  display: none;
                }
  </style>
@endsection
