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
<div class="inquiries content-wrapper bg-layout5">
    <section class="banner banner-inquiry">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/send-inquiry') }}">Inquiries</a></li>
                    <li class="breadcrumb-item" aria-current="page">Careers</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Careers</h1>
            </div>
        </div>
    </section>

    <div class="main-content">
        <div class="inner">
            <section class="careers">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <p class="mrfs-1-2 mrfs-lg-1-17 ff-bold text-center mb-4 mb-lg-5">
                                Join our roster of exceptional people! <br />
                                See our career opportunities below, shoot us a message, and upload your resume!
                            </p>
                            <div class="jobsList d-flex">
                                @foreach($cocogen_careers as $cocogen_career)
                                    @if(old('positionApplied') && old('positionApplied') == $cocogen_career->job)
                                        @php
                                            $_currentJobName = $cocogen_career->job;
                                            $_currentJobDepartment = $cocogen_career->department;
                                            $_currentJobType = $cocogen_career->type;
                                        @endphp
                                    @endif
                                <div class="jobItem d-flex mb-4 mb-lg-5">
                                    <div class="jobDescHidden" style="display:none;">
                                    <ul>
                                    @foreach($cocogen_careers_job_descriptions as $cocogen_careers_job_description)
                                        @if((int)$cocogen_careers_job_description->careerID === $cocogen_career->id )
                                        <li>{{ $cocogen_careers_job_description->jobDescription }}</li>
                                            @if(old('positionApplied') && old('positionApplied') == $cocogen_career->job)
                                                @php $_currentJobDescription[] = $cocogen_careers_job_description->jobDescription @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    </ul>
                                    </div>
                                    <div class="jobQualiHidden" style="display:none;">
                                    <ul>
                                    @foreach($cocogen_careers_qualifications as $cocogen_careers_qualification)
                                        @if((int)$cocogen_careers_qualification->careerID === $cocogen_career->id )
                                        <li>{{ $cocogen_careers_qualification->qualification }}</li>
                                            @if(old('positionApplied') && old('positionApplied') == $cocogen_career->job)
                                                @php $_currentJobQualification[] = $cocogen_careers_qualification->qualification @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                    </ul>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div><h2 class="mb-2 mb-sm-0">{{ $cocogen_career->job }}</h2></div>
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-secondary-light mrfs-0-15 mrfs-lg-1-5" data-bs-toggle="modal" data-bs-target="#careerModal" data-id="{{ $cocogen_career->id }}" data-job="{{ $cocogen_career->job }}" data-department="{{ $cocogen_career->department }}" data-type="{{ $cocogen_career->type }}" data-active="{{ $cocogen_career->active }}">View job description</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="divider">
        <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
    </section>

    <div class="modal fade careerModal" tabindex="-1" role="dialog" id="careerModal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <div class="logo mx-auto mx-lg-0">
                        <div class="imageContainer">
                            <img class="logo" src="assets/img/logo_white.png" alt="cocogen logo" />
                        </div>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg id="close" data-name="close" xmlns="http://www.w3.org/2000/svg" width="67.891" height="67.891" viewBox="0 0 67.891 67.891">
                            <path id="Path_1686" data-name="Path 1686" d="M37.741,34.059l-8.6-8.6,8.6-8.6a2.608,2.608,0,0,0-3.688-3.688l-8.6,8.6-8.6-8.6a2.5,2.5,0,0,0-3.688,0,2.52,2.52,0,0,0,0,3.688l8.6,8.6-8.6,8.6a2.522,2.522,0,0,0,0,3.688,2.591,2.591,0,0,0,3.688,0l8.6-8.6,8.6,8.6a2.62,2.62,0,0,0,3.688,0A2.591,2.591,0,0,0,37.741,34.059Z" transform="translate(8.494 8.487)" fill="#fff" />
                            <path id="Path_1687" data-name="Path 1687" d="M37.321,7.945A29.381,29.381,0,0,1,58.1,58.1,29.381,29.381,0,0,1,16.545,16.545a29.182,29.182,0,0,1,20.775-8.6m0-4.57A33.946,33.946,0,1,0,71.266,37.321,33.94,33.94,0,0,0,37.321,3.375Z" transform="translate(-3.375 -3.375)" fill="#fff" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-heading">
                        <div class="text-center">
                            <h2 class="modal-title text-color-light">@isset($_currentJobName){{ $_currentJobName }}@endisset</h2>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-secondary">Apply now</button>
                        </div>
                    </div>
                    <div class="modal-text">
                        <div class="content">
                            <label>Department</label>
                            <div class="text">
                                <p>@isset($_currentJobDepartment){{ $_currentJobDepartment }}@endisset</p>
                            </div>
                        </div>
                        <div class="content">
                            <label>Type</label>
                            <div class="text">
                                <p>@isset($_currentJobType){{ $_currentJobType }}@endisset</p>
                            </div>
                        </div>
                        <div class="content">
                            <label>Job Description</label>
                            <div class="text">
                            @isset($_currentJobDescription)
                            <ul>
                                @foreach($_currentJobDescription as $_currentJobDescriptionItem)
                                    <li>{{ $_currentJobDescriptionItem }}</li>
                                @endforeach
                            </ul>
                            @endisset
                            </div>
                        </div>
                        <div class="content">
                            <label>Qualifications</label>
                            <div class="text">
                            @isset($_currentJobQualification)
                            <ul>
                                @foreach($_currentJobQualification as $_currentJobQualification)
                                    <li>{{ $_currentJobQualification }}</li>
                                @endforeach
                            </ul>
                            @endisset
                            </div>
                        </div>
                    </div>
                    <div class="modal-form">
                        <div class="text-center mb-4">
                            <h2>Apply now</h2>
                        </div>
                        @if(count($errors) > 0)
                            @if($errors->has('fName') || $errors->first('lName') || $errors->has('email') || $errors->has('mobileNumber') || $errors->has('positionApplied') || $errors->has('message') || $errors->has('filename'))
                                @php $hasError = true; @endphp
                            @endif
                        @endif
                        <form onsubmit="return validateRecaptcha();" class="form-default careerForm" id="careerForm" method="post" action="{{route('careerssave')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(session('message'))
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="alert alert-success" role="alert">{{session('message')}}</div>
                                </div>
                            </div>
                            @endif
                            @if(session('messagefailed'))
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="alert alert-success" role="alert">{{session('messagefailed')}}</div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-12 col-lg-7">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div @if(count($errors) && $errors->has('fName'))class="invalid invalid-required"@endif>
                                                        <label for="fName" class="form-label">First Name *</label>
                                                        <input type="text" class="form-control required-entry validate-alpha-only" name="fName" id="fName" value="{{old('fName')}}" maxlength="200"/>
                                                        @if(count($errors) && $errors->has('fName'))
                                                            <span class="feedback">{{ $errors->first('fName') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div @if(count($errors) && $errors->has('lName'))class="invalid invalid-required"@endif>
                                                        <label for="lName" class="form-label">Last Name *</label>
                                                        <input type="text" class="form-control required-entry validate-alpha-only" name="lName" id="lName" value="{{old('lName')}}" maxlength="200"/>
                                                        @if(count($errors) && $errors->has('lName'))
                                                            <span class="feedback">{{ $errors->first('lName') }}</span>
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
                                                    <div @if(count($errors) && $errors->has('email'))class="invalid invalid-required"@endif>
                                                        <label for="email" class="form-label">Email Address *</label>
                                                        <input type="email" class="form-control required-entry validate-email" name="email" id="email" value="{{old('email')}}" smaxlength="100"/>
                                                        @if(count($errors) && $errors->has('email'))
                                                            <span class="feedback">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div @if(count($errors) && $errors->has('mobileNumber'))class="invalid invalid-required"@endif>
                                                        <label for="mobileNumber" class="form-label">Contact Number *</label>
                                                        <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="{{old('mobileNumber')}}" maxlength="100" />
                                                        @if(count($errors) && $errors->has('mobileNumber'))
                                                            <span class="feedback">{{ $errors->first('mobileNumber') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="formRow mb-3">
                                                <div class="d-block">
                                                    <div @if(count($errors) && $errors->has('positionApplied'))class="invalid invalid-required"@endif>
                                                        <label for="address" class="form-label">Position *</label>
                                                        <select class="form-control validate-select styled-select" name="positionApplied" id="positionApplied">
                                                            @if(old('positionApplied'))
                                                                <option value="{{old('positionApplied')}}">{{old('positionApplied')}}</option>
                                                            @else
                                                                <option value="">Position Applied *</option>
                                                            @endif
                                                            @foreach($cocogen_careers as $cocogen_career)
                                                            <option value="{{$cocogen_career->job}}" data-value="{{$cocogen_career->job}}">{{$cocogen_career->job}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if(count($errors) && $errors->has('positionApplied'))
                                                            <span class="feedback">{{ $errors->first('positionApplied') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="mb-3 @if(count($errors) && $errors->has('message'))invalid invalid-required @endif">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control" rows="3" id="message" name="message">{{old('message')}}</textarea>
                                        @if(count($errors) && $errors->has('message'))
                                            <span class="feedback">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 @if(count($errors) && $errors->has('filename'))invalid invalid-required @endif">
                                        <label class="form-label">Resume *</label>
                                        <div class="customFileInput">
                                            <input class="form-control" type="file" id="formFile" name="filename" placeholder="" accept="application/msword, application/pdf"/>
                                            <label for="formFile" class="btn btn-secondary-light">Select file</label>
                                        </div>
                                        @if(count($errors) && $errors->has('filename'))
                                            <span class="feedback">{{ $errors->first('filename') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-2 mb-lg-0">
                                    <label class="form-label">&nbsp;</label>
                                    <div class="g-recaptcha" data-sitekey="{{ $recaptcha_site_key }}"></div>
                                </div>

                                <div class="col-12">
                                    <div class="submitButton text-center mt-4">
                                        <input name="executed" type="hidden" value="0" class="executed">
						                <input name="form_key" type="hidden" value="5WS4MkVQbtqFyYQ5">
                                        <button type="submit" class="btn btn-secondary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
            let modalForm = $('#careerModal .modal-body .modal-form');
            modalForm.find('.invalid').removeClass('invalid').removeClass('invalid-required');
            modalForm.find('.feedback').remove();
            modalForm.find("input[type=text], input[type=email], textarea").val("");
        }

        $(document).ready(function() {
            $(document).on('show.bs.modal', '#careerModal', function(e){
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

            $('#careerModal .modal-body .modal-heading .btn').click(function(){
                $(this).parents('.modal-heading').siblings('.modal-form').find('button[type="submit"]:first').focus();
            });

            $(document).on('hidden.bs.modal', '#careerModal', function (e) {
                let target  = $(e.relatedTarget);
                let modalContent = $(e.currentTarget).find('.modal-body');
                modalContent.find('.alert').remove();
                resetForm();
            });

            @if(!empty($hasError) || session('message') || session('messagefailed'))
                $('#careerModal').removeClass('fade');
                $('#careerModal').modal('show', function(){
                    $('#careerModal .modal-form button[type="submit"]:first').focus();
                });
                $('#careerModal').addClass('fade');
                @if(session('message') || session('messagefailed'))
                    resetForm();
                @endif
            @endif
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"   async defer>
@endsection
