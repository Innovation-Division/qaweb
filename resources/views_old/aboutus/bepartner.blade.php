@extends('layouts.cgen')

@php $recaptcha_site_key = config('app.recaptchaKey'); @endphp

@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />
@endsection

@section('javascripts')
    <!-- DEV MODE -->
    <script data-env="development" src="{{ asset('/assets/dist/lessjs/less.min.js') }}"></script>
     <script>
        less.watch();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@show

@section('content')

<div class="about content-wrapper bg-layout6">
                <section class="banner @if(!empty($bannerClass)){{ $bannerClass }}@else{{ 'banner-about' }}@endif">
                    <div class="container-fluid breadcrumb-container">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb rfs-1-5">
                                        <li class="breadcrumb-item" aria-current="page" > <a href="">Home </a> </li>
                                        <li class="breadcrumb-item" aria-current="page" > <a href="">Be a Partner</a> </li>
                                </ol>
                        </nav>
                    </div>
                    <div class="container">
                        <div class="content">
                            <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">
                                Be a Partner
                            </h1>
                        </div>
                    </div>
                </section>
</div>

<br>
<br>

<div class="container-fluid">     
    <div class="row justify-content-center">        
        <div class="col-10">        
            <div class="row">      
                <div class="col-xs-12 col-lg-6">       
                    <div class="be-a-partner-text mb-4">        
                        <p class="fs-4 pb-4">                                                                                                                                                                     With the economy slowly opening up and getting back into its groove, finding and a place that will partner up with you and put your professional development at the top of its list of priorities could be a challenge. A place where you are more than just another cog in the machine. If you want to work with a company that has passion for both its clients and agents, look no further than Cocogen Insurance.                                                                                                                                                    
                            <br>                                                                                                                                                                                      <br>                                                                                                                                                                                      Becoming a Cocogen partner means working with a company that puts your career development before anything else. We want you to have as much freedom and control as you want while making sure that we give you the proper support to help you maximize your profits. Working with us means you&#39;ll make money and develop your skills and knowledge as an insurance agent.        
                        </p>                                                                                                                                                                                      <div class="mt-5">
                             <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#partnerModal" >Be a partner now </button>                                                                                                               
                        </div>                                                                                                                                                                                                                                                      
                    </div>                                                                                                                                                                                                                                                
                </div>                                                                                                                                                                                                                                                  
                <div class="col-xs-12 col-lg-6">                                                                                                                                                                                                                                                      
                    <div class="imageContainer text-center">                                                                                                                                                                                                                                                          
                        <img src="assets/img/partner.png" alt="company">                                                                                                                                                                                                                                                      
                    </div>                                                                                                                                                                                                                                                  
                </div>                                                                                                                                                                                                                                              
            </div>                                                                                                                                                                                                                                          
        </div>                                                                                                                                                                                                                                      
    </div>                                                                                                                                                                                                                                  
</div>   
 <div class="modal fade partnerModal" tabindex="-1" role="dialog" id="partnerModal" style="margin-top:4%">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-12" style="margin-top:-20px;">
                       <div class="row" >
                        <div class="col-md-6" >
                        
                            @if(count($errors) > 0)
                            @if($errors->has('fName') || $errors->first('lName') || $errors->has('email') || $errors->has('mobileNumber') || $errors->has('positionApplied') || $errors->has('message') || $errors->has('filename'))
                                @php $hasError = true; @endphp
                            @endif
                            @endif
                            <form onsubmit="return validateRecaptcha();"   class="form-default careerForm" id="careerForm" method="post" action="{{route('epartnersave')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            @if(session('messagefailed'))
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="alert alert-success" role="alert">{{session('messagefailed')}}</div>
                                </div>
                            </div>
                            @endif
                            <div class="row" style="margin-top:20%">
                                @if(session('message'))
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="alert alert-success" role="alert"><i class="fa fa-check" aria-hidden="true" style="color:green"></i>
                                                {{session('message')}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <div class="row">
                                        <h1>Be a Partner</h1>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div >
                                                        <label for="fName" class="form-label inout-lg">First Name *</label>
                                                        <input type="text" class="form-control required-entry validate-alpha-only" name="fName" id="fName" value="{{old('fName')}}" maxlength="200"/>
                                                        @if(count($errors) && $errors->has('fName'))
                                                            <span class="feedback">{{ $errors->first('fName') }}</span>
                                                            <style type="text/css">
                                                                #fName{
                                                                    border: 2px solid #ff0000;
                                                                }
                                                                .feedback{
                                                                    color: #ff0000;
                                                                }
                                                            </style>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div>
                                                        <label for="lName" class="form-label">Last Name *</label>
                                                        <input type="text" class="form-control required-entry validate-alpha-only" name="lName" id="lName" value="{{old('lName')}}" maxlength="200"/>
                                                        @if(count($errors) && $errors->has('lName'))
                                                            <span class="feedback">{{ $errors->first('lName') }}</span>
                                                             <style type="text/css">
                                                                #lName{
                                                                    border: 2px solid #ff0000;
                                                                }
                                                                .feedback{
                                                                    color: #ff0000;
                                                                }
                                                            </style>

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div>
                                                        <label for="email" class="form-label">Email Address *</label>
                                                        <input type="email" class="form-control required-entry validate-email" name="email" id="email" value="{{old('email')}}" smaxlength="100"/>
                                                        @if(count($errors) && $errors->has('email'))
                                                            <span class="feedback">{{ $errors->first('email') }}</span>
                                                             <style type="text/css">
                                                                #email{
                                                                    border: 2px solid #ff0000;
                                                                }
                                                                .feedback{
                                                                    color: #ff0000;
                                                                }
                                                            </style>
                                                        @endif

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div>
                                                        <label for="mobileNumber" class="form-label">Contact Number *</label>
                                                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="{{old('mobileNumber')}}" maxlength="100" />
                                                        @if(count($errors) && $errors->has('mobileNumber'))
                                                            <span class="feedback">{{ $errors->first('mobileNumber') }}</span>
                                                            <style type="text/css">
                                                                #mobileNumber{
                                                                    border: 2px solid #ff0000;
                                                                }
                                                                .feedback{
                                                                    color: #ff0000;
                                                                }
                                                            </style>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div class="mb-3">
                                                        <label for="message" class="form-label">Are you licensed agent?</label><br>
                                                        <input type="radio" id="Yes" name="licensed" value="Yes" >
                                                        <label for="Yes">Yes</label>
                                                        <input type="radio" id="No" name="licensed" value="No" style="margin-left: 5%;">
                                                        <label for="No">No</label><br>    
                                                        @if(count($errors) && $errors->has('message'))
                                                            <span class="feedback">{{ $errors->first('message') }}</span>
                                                            <style type="text/css">
                                                                #licensed{
                                                                    border: 2px solid #ff0000;
                                                                }
                                                                .feedback{
                                                                    color: #ff0000;
                                                                }
                                                            </style>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div >
                                                        <label class="form-label">Resume *</label>
                                                        <div class="customFileInput">
                                                            <input class="form-control" type="file" id="formFile" name="filename" placeholder="" accept="application/msword, application/pdf"/>
                                                        </div>
                                                        @if(count($errors) && $errors->has('filename'))
                                                            <span class="feedback">{{ $errors->first('filename') }}</span>
                                                             <style type="text/css">
                                                                #filename{
                                                                    border: 2px solid #ff0000;
                                                                }
                                                                .feedback{
                                                                    color: #ff0000;
                                                                }
                                                            </style>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                <div class="mb-2 mb-lg-0">
                                    <label class="form-label">&nbsp;</label>
                                    <div class="g-recaptcha" data-sitekey="{{ $recaptcha_site_key }}"></div>
                                </div>

                                <div class="col-12">
                                    <div class="submitButton mt-4">
                                        <input name="executed" type="hidden" value="0" class="executed">
                                        <input name="form_key" type="hidden" value="5WS4MkVQbtqFyYQ5">
                                        <button type="submit" class="btn btn-secondary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-md-6" style="background-color: #ffffff;">
                            <div  style=" float: right !important;margin-top: 13px;">
                             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background-color:#ffffff;border: 0;">
                                <svg id="close" data-name="close" xmlns="http://www.w3.org/2000/svg" width="57.891" height="57.891" viewBox="0 0 67.891 67.891">
                                    <path id="Path_1686" data-name="Path 1686" d="M37.741,34.059l-8.6-8.6,8.6-8.6a2.608,2.608,0,0,0-3.688-3.688l-8.6,8.6-8.6-8.6a2.5,2.5,0,0,0-3.688,0,2.52,2.52,0,0,0,0,3.688l8.6,8.6-8.6,8.6a2.522,2.522,0,0,0,0,3.688,2.591,2.591,0,0,0,3.688,0l8.6-8.6,8.6,8.6a2.62,2.62,0,0,0,3.688,0A2.591,2.591,0,0,0,37.741,34.059Z" transform="translate(8.494 8.487)" fill="#db3e8d" />
                                    <path id="Path_1687" data-name="Path 1687" d="M37.321,7.945A29.381,29.381,0,0,1,58.1,58.1,29.381,29.381,0,0,1,16.545,16.545a29.182,29.182,0,0,1,20.775-8.6m0-4.57A33.946,33.946,0,1,0,71.266,37.321,33.94,33.94,0,0,0,37.321,3.375Z" transform="translate(-3.375 -3.375)" fill="#db3e8d" />
                                </svg>
                            </button>
                            </div>
                            <img src="{{ asset('/images/Partner.png') }}" class="img-fluid form-control" alt="divider" style="border:0" />
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                                                                                                                                                                                    
</section>
<section class="divider pt-0">
    <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
</section>
<style type="text/css">
    input {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;

  border-radius: 50%;
  width: 28px;
  height: 28px;

  border: 2px solid #ffffff;
  transition: 0.2s all linear;
  margin-right: 5px;

  position: relative;
  top: 4px;
}

input:checked {
  border: 14px solid #db3e8d;;
  outline: unset !important /* I added this one for Edge (chromium) support */
}
</style>
@endsection

@section('before_body_end_scripts')
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                'sitekey': '{{ $recaptcha_site_key }}'
            });
        };
        function validateRecaptcha() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please confirm if you're not a robot.");
                return false;
            } else {
                //alert("validated");
                return true;
            }
        }

        function resetForm() {
            let modalForm = $('#partnerModal .modal-body .modal-form');
            modalForm.find('.invalid').removeClass('invalid').removeClass('invalid-required');
            modalForm.find('.feedback').remove();
            modalForm.find("input[type=text], input[type=email], textarea").val("");
        }

        $(document).ready(function() {
            $(document).on('show.bs.modal', '#partnerModal', function(e){
                let target  = $(e.relatedTarget);
                let modalContent = $(e.currentTarget).find('.modal-body');
                let _job = target.data('job');
                let _department = target.data('department');
                let _type = target.data('type');
                let _jobDescription = target.parent().siblings('.jobDescHidden').html();
                let _jobQualification = target.parent().siblings('.jobQualiHidden').html();

                modalContent.find('.modal-heading div > h2').html(_job);
                modalContent.find('.modal-text .content:eq(0) > .text p').html(_department);
                modalContent.find('.modal-text .content:eq(1) > .text p').html(_type);
                modalContent.find('.modal-text .content:eq(2) > .text').html(_jobDescription);
                modalContent.find('.modal-text .content:eq(3) > .text').html(_jobQualification);

                modalContent.find('select[name="positionApplied"] option[data-value="' + _job + '"]')
                    .prop('selected', true)
                    .attr('selected', 'selected');

                modalContent.find('select[name="positionApplied"] option:not([data-value="' + _job + '"])')
                    .prop('selected', false)
                    .removeAttr('selected');

            });

            $('#partnerModal .modal-body .modal-heading .btn').click(function(){
                $(this).parents('.modal-heading').siblings('.modal-form').find('button[type="submit"]:first').focus();
            });

            $(document).on('hidden.bs.modal', '#partnerModal', function (e) {
                let target  = $(e.relatedTarget);
                let modalContent = $(e.currentTarget).find('.modal-body');
                modalContent.find('.alert').remove();
                resetForm();
            });

            @if(!empty($hasError) || session('message') || session('messagefailed'))
                $('#partnerModal').removeClass('fade');
                $('#partnerModal').modal('show', function(){
                    $('#partnerModal .modal-form button[type="submit"]:first').focus();
                });
                $('#partnerModal').addClass('fade');
                @if(session('message') || session('messagefailed'))
                    resetForm();
                @endif
            @endif
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"   async defer>
@endsection
