@extends('layouts.epartner')
@section('main-content')
 <!-- @include('monitoring.monitoring')  -->
 <form id="upload-form2" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
<div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 mb-3">
                        <strong style="font-size: 20px;">Manual Forms Issuance Uploading</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <input type="hidden" id="totalvalhid" name="totalvalhid">
                                    <input type="hidden" value="second" id="page"
                                                    name="page">
                                    <label for="status" class="mb-2">Agent <span class="text-danger">*</span></label>
                                            <select type="text" class="form-select brand" value="" id="intermediary" name="intermediary">
                                                <option value="">- Select -</option>
                                            </select>
                                            <input type="hidden" name="intermediaryname" id='intermediaryname' class='intermediaryname' value="">
                                            <input type="hidden" name="intermediarynum" id='intermediarynum' class='intermediarynum' value="">
                                    <div class="invalid-feedback">Status is required</div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <input type="hidden" id="totalvalhid" name="totalvalhid">
                                    <input type="hidden" value="second" id="page"
                                                    name="page">
                                    <label for="status" class="mb-2">Status <span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  name="status" id="status">
                                    <div class="invalid-feedback">Status is required</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                  
                                    <label for="status" class="mb-2">Upload File <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control">
                                    <div class="invalid-feedback">Status is required</div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <input type="hidden" value="second" id="page"
                                                    name="page">
                                    <label for="pad_type" class="mb-2">Pad Type <span
                                            class="text-danger">*</span></label>
                                            <select type="text" class="form-select brand" value="" id="pad_type" name="pad_type">
                                                <option value="">- Select -</option>
                                                @foreach ($cocogen_monitoring_pad_type as $monitoring_type)
                                                    <option value="{{ $monitoring_type->padacronym }}">
                                                        {{ $monitoring_type->padname }}</option>
                                                @endforeach
                                            </select>
                                    <div class="invalid-feedback">Pad Type is required</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2 mb-3">
                                <div class="form-group">
                                    <button class="btn btn-teal col-12 saveDraft" style="background-color:#008080;height:45px;"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 25 20">
                                        <path d="M11 2H9v3h2z"></path>
                                        <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z">                                        </path>
                                    </svg>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
    @include('monitoring.monitoring_js')
    
    @endsection