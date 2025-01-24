@extends('layouts.epartner')
@section('main-content')
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
@endsection