@extends('layouts.epartner')
@section('main-content')
<style>
    .batch-title {
        font-size: 25px;
        font-weight: 700;
    }

    .batch-button {
        border: none;
        padding: 10px 20px;
        border-radius: 12px;
        color: white;
    }

    .batch-secondary {
        background: grey;
        color: #ffffff;
    }

    .button-light {
        border: 1px solid black;
        padding: 7px 9px !important;
        font-size: 17px;
    }

    .batch-button>svg {
        fill: #ffffff;
    }

    .batch-button>svg>path {
        stroke: #ffffff;
        stroke-width: 1px;
    }

    .batch-button-success {
        background: #008080 !important;
    }

    .batch-button-secondary {
        background: #60B3B3 !important;
    }

    .card {
        border-radius: 10px !important;
    }

    body {
        background-color: #f3f3f3;
    }

    @media (min-width: 992px) {

        aside {
            display: none !important;
        }

        .navbar-expand-lg.navbar-vertical~.navbar,
        .navbar-expand-lg.navbar-vertical~.page-wrapper {
            margin-left: 0 !important;
        }

        .batch-container {
            padding-left: 100px;
            padding-right: 100px;
            max-width: 1300px;
        }
    }


    .product-radio {
        border: 1px solid #D7DEE3 !important;
        padding: 12px 24px !important;
        border-radius: 100px !important;
        margin-right: 10px !important;
    }


    .btn-check:checked+.btn,
    .btn.active,
    .btn.show,
    .btn:first-child:active,
    :not(.btn-check)+.btn:active {
        color: #000000 !important;
        background-color: #FFEEF7 !important;
        border: 1px solid #E4509A !important;
    }

    .product-radio-invalid {
        border: 1px solid #d63939 !important;
    }

    select { 
        color: #929dab !important; 
    }

    select option {
        color: black !important;
    }
</style>

<div class="container batch-container">
    <div class="alert alert-success d-none" role="alert" id="alertSuccess">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div>
                <h4 class="alert-title">Saved as draft!</h4>
                <div class="text-secondary">Quotation has been saved as draft!</div>
            </div>
        </div>
    </div>
    <div class="row mb-4 mt-4">
        <div class="col-lg-12">
            <a href="{{url('/quotation')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                    fill="#008080" class="bi bi-arrow-left-short" viewBox="0 0 18 18">
                    <path fill-rule="evenodd"
                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                </svg> <strong style="color: #008080 !important;">Back to quotations</strong></a>
        </div>
    </div>
    <form method="post" action="{{ url('/quotation/get-a-quote/edit-second-page/'.$quotation->trans_no) }}"
        enctype="multipart/form-data" id="quotationForm">
        @csrf
        {{method_field('GET')}}
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-9">
                        <p class="batch-title">Get a quote</p>
                    </div>
                    @if($quotation->status !== 'Quoted')
                    <div class="col-lg-3 text-end">
                        <button class="batch-button batch-button-secondary saveDraft"><svg
                                xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                                class="bi bi-floppy" viewBox="0 0 25 20">
                                <path d="M11 2H9v3h2z"></path>
                                <path
                                    d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z">
                                </path>
                            </svg>Save as draft</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <strong style="font-size: 20px;">Which product would you like a quote for?</strong>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <input type="radio" class="btn-check" name="product" id="btn-radio-basic-1"
                                        autocomplete="off" value="Auto Excel Plus Insurance"
                                        {{$quotation->product === 'Auto Excel Plus Insurance' ? 'checked' : ''}}>
                                    <label for="btn-radio-basic-1" type="button" class="btn product-radio">Auto Excel
                                        Plus</label>
                                    <input type="radio" class="btn-check" name="product" id="btn-radio-basic-2"
                                        autocomplete="off" value="CTPL" disabled
                                        {{$quotation->product === 'CTPL' ? 'checked' : ''}}>
                                    <label for="btn-radio-basic-2" type="button" class="btn product-radio">CTPL</label>
                                    <input type="radio" class="btn-check" name="product" id="btn-radio-basic-3"
                                        autocomplete="off" value="COVID-19 Assist+" disabled
                                        {{$quotation->product === 'COVID-19 Assist+' ? 'checked' : ''}}>
                                    <label for="btn-radio-basic-3" type="button" class="btn product-radio">COVID-19
                                        Assist+</label>
                                    <input type="radio" class="btn-check" name="product" id="btn-radio-basic-4"
                                        autocomplete="off" value="Pro-Tech" disabled
                                        {{$quotation->product === 'Pro-Tech' ? 'checked' : ''}}>
                                    <label for="btn-radio-basic-4" type="button"
                                        class="btn product-radio">Pro-Tech</label>
                                    <input type="radio" class="btn-check" name="product" id="btn-radio-basic-5"
                                        autocomplete="off" value="Domestic Travel Plus" disabled
                                        {{$quotation->product === 'Domestic Travel Plus' ? 'checked' : ''}}>
                                    <label for="btn-radio-basic-5" type="button" class="btn product-radio">Domestic
                                        Travel
                                        Plus</label>
                                    <input type="radio" class="btn-check" name="product" id="btn-radio-basic-6"
                                        autocomplete="off" value="International Travel Excel Plus" disabled
                                        {{$quotation->product === 'International Travel Excel Plus' ? 'checked' : ''}}>
                                    <label for="btn-radio-basic-6" type="button" class="btn product-radio">International
                                        Travel Excel
                                        Plus</label>
                                </div>
                                <div class="col-lg-12 d-none" id="product-invalid">
                                    <span class="text-danger ml-2" style="font-size: 85.714285%;">Product is
                                        required</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Tell us about client</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="first_name" class="mb-2">First name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                placeholder="Enter your first name" name="first_name"
                                                    id="first_name" value="{{$quotation->first_name}}">
                                                <input type="hidden" value="{{$quotation->trans_no}}" id="trans_no"
                                                    name="trans_no">
                                                <input type="hidden" value="first" id="page" name="page">
                                                <div class="invalid-feedback">First name is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="middle_name" class="mb-2">Middle name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                placeholder="Enter your middle name" name="middle_name"
                                                    id="middle_name" value="{{$quotation->middle_name}}">
                                                <div class="invalid-feedback">Middle name is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="last_name" class="mb-2">Last name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                placeholder="Enter your last name" name="last_name" id="last_name"
                                                    value="{{$quotation->last_name}}">
                                                <div class="invalid-feedback">Last name is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="phone_number" class="mb-2">Mobile number <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control"
                                                placeholder="Enter your mobile number" name="phone_number"
                                                    id="phone_number" value="{{$quotation->phone_number}}">
                                                <div class="invalid-feedback">Mobile number is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email_address" class="mb-2">Email address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control"
                                                placeholder="Enter your email address" name="email_address"
                                                    id="email_address" value="{{$quotation->email_address}}">
                                                <div class="invalid-feedback">Email address is required </div>
                                                <span
                                                    style="width: 100%; margin-top: .25rem; font-size: 85.714285%; color: #d63939;"
                                                    class="d-none" id="emailAddressInvalid">Email address is
                                                    invalid</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="gender" class="mb-2">Gender <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="gender" id="gender">
                                                    <option value="">Select your gender</option>
                                                    <option value="M" {{$quotation->gender === 'M' ? 'selected' : ''}}>
                                                        Male</option>
                                                    <option value="F" {{$quotation->gender === 'F' ? 'selected' : ''}}>
                                                        Female</option>
                                                    <option value="O" {{$quotation->gender === 'O' ? 'selected' : ''}}>
                                                        Others</option>
                                                </select>
                                                <div class="invalid-feedback">Gender is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="civil_status" class="mb-2">Civil status <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="civil_status" id="civil_status">
                                                    <option value="">Select your civil status</option>
                                                    <option value="Single"
                                                        {{$quotation->civil_status === 'Single' ? 'selected' : ''}}>
                                                        Single</option>
                                                    <option value="Married"
                                                        {{$quotation->civil_status === 'Married' ? 'selected' : ''}}>
                                                        Married</option>
                                                    <option value="Separated"
                                                        {{$quotation->civil_status === 'Separated' ? 'selected' : ''}}>
                                                        Separated</option>
                                                    <option value="Widowed"
                                                        {{$quotation->civil_status === 'Widowed' ? 'selected' : ''}}>
                                                        Widowed</option>
                                                </select>
                                                <div class="invalid-feedback">Civil status is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="date_of_birth" class="mb-2">Date of birth <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date_of_birth"
                                                    id="date_of_birth" value="{{$quotation->date_of_birth}}" style="color:#929dab;">
                                                <div class="invalid-feedback">Date of birth is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="place_of_birth" class="mb-2">Place of birth <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="place_of_birth"
                                                    id="place_of_birth" value="{{$quotation->place_of_birth}}" placeholder="Enter your place of birth">
                                                <div class="invalid-feedback">Place of birth is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12 mb-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Nationality</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Add your work details</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="occupation" class="mb-2">Occupation <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="occupation" id="occupation"
                                            value="{{$quotation->occupation}}" placeholder="Enter your occupation">
                                        <div class="invalid-feedback">Occupation is required</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="source_of_income" class="mb-2">Source of income <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="source_of_income"
                                            id="source_of_income" value="{{$quotation->source_of_income}}" placeholder="Enter your source of income">
                                        <div class="invalid-feedback">Source of income is required</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Add your ID details</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-2">Type of ID <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="id_type" id="id_type">
                                            <option value="">Select your type of id</option>
                                            <option value="Passport"
                                                {{$quotation->id_type === 'Passport' ? 'selected' : ''}}>Passport
                                            </option>
                                            <option value="Driver's License"
                                                {{$quotation->id_type === "Driver's License" ? 'selected' : ''}}>
                                                Driver's License</option>
                                            <option value="National ID"
                                                {{$quotation->id_type === 'National ID' ? 'selected' : ''}}>National ID
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">Type of ID is required</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-2">ID number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="id_number" id="id_number"
                                            value="{{$quotation->id_number}}" placeholder="Enter your ID number">
                                        <div class="invalid-feedback">ID Number is required</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Add your address</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-2">House no., Bldg name,
                                            Street <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{$quotation->address}}" placeholder="Enter your house no., bldg name, street">
                                        <div class="invalid-feedback">House no., Bldg name, Street is required</div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Province <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="province" id="province">
                                                <option value="">Select your province</option>
                                                </select>
                                                <div class="invalid-feedback">Province is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">City <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="city" id="city">
                                                <option value="">Select your city</option>
                                                </select>
                                                <div class="invalid-feedback">City is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Barangay <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="barangay" id="barangay">
                                                <option value="">Select your barangay</option>
                                                </select>
                                                <div class="invalid-feedback">Barangay is required</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Zip code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="zip_code" id="zip_code"
                                                    value="{{$quotation->zip_code}}" placeholder="Enter your zip code">
                                                <div class="invalid-feedback">Zip Code is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3" id="permanentAddressCheckboxDiv">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="permanentAddressCheckbox"
                                            name="permanentAddressCheckbox">
                                        <label class="form-check-label" for="exampleCheck1">I have different permanent
                                            address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 d-none" id="permanentAddress">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Add your permanent address</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-2">House no., Bldg name,
                                            Street <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="perm_address" id="perm_address" value="{{$quotation->perm_address}}" placeholder="Enter your house no., bldg name, street">
                                        <div class="invalid-feedback">House no., Bldg name, Street is required</div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Province <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="perm_province" id="perm_province">
                                                <option>Select your province</option>
                                                </select>
                                                <div class="invalid-feedback">Province is required</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">City <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="perm_city" id="perm_city">
                                                <option value="">Select your city</option>
                                                </select>
                                                <div class="invalid-feedback">City is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Barangay <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="perm_barangay" id="perm_barangay">
                                                <option value="">Select your barangay</option>
                                                </select>
                                                <div class="invalid-feedback">Barangay is required</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Zip code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="perm_zip_code"
                                                    id="perm_zip_code" value="{{$quotation->perm_zip_code}}" placeholder="Enter your zip code">
                                                <div class="invalid-feedback">Zip Code is required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="sameAddress">
                                        <label class="form-check-label" for="exampleCheck1">Permanent address is the
                                            same as address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        @if($quotation->status !== 'Quoted')
            <div class="col-lg-6 mb-3">
                <button class="batch-button batch-button-secondary col-12 saveDraft"><svg
                        xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor"
                        class="bi bi-floppy" viewBox="0 0 25 20">
                        <path d="M11 2H9v3h2z"></path>
                        <path
                            d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z">
                        </path>
                    </svg>Save as draft</button>
            </div>
            @endif
            <div class="col-lg-6">
                <button class="batch-button batch-button-success col-12" id="continueQuote">Continue <svg
                        xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg></button>
            </div>
        </div>
    </form>
</div>

<script>
     $(function(){
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
        var day = dtToday.getDate();
        var year = dtToday.getFullYear() - 18;
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
    	var minDate = year + '-' + month + '-' + day;
        var maxDate = year + '-' + month + '-' + day;
    	$('#date_of_birth').attr('max', maxDate);
    });
</script>
<script>
    $(document).ready(function () {

        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test($email);
        }

        $('select').on('change', function() {
            var str1 = $(this).val();
            var str2 = 'Select';

            if (str1.indexOf(str2) != -1) {
                return $(this).css('color', '#929dab');
            } else {
                return $(this).attr('style', 'color: black !important');
            }
        });

        $('#date_of_birth').on('change', function() {

            if ($(this).val()) {
                return $(this).attr('style', 'color: black !important');
            } else {
                return $(this).attr('style', 'color: #929dab !important');
            }
        });

        $('#phone_number').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
            e.which <= 0 || // arrow keys
            e.which == 8 || // delete key
            /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        })

        $('#zip_code').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
            e.which <= 0 || // arrow keys
            e.which == 8 || // delete key
            /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        })

        $('#perm_zip_code').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
            e.which <= 0 || // arrow keys
            e.which == 8 || // delete key
            /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        })

        $("#first_name").on("input",function(event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g,"")
        });
        
        $("#middle_name").on("input",function(event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g,"")
        });

        $("#last_name").on("input",function(event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g,"")
        });

        $("#occupation").on("input",function(event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g,"")
        });

        $("#source_of_income").on("input",function(event) {
            var inputValue = this.value;
            this.value = this.value.replace(/[0-9]/g,"")
        });

        $.ajax({
            url: "{{url('/api/covid/province/get')}}",
            method: "GET",
            data: {
                '_token': '{{csrf_token()}}',
            },
            success: function (result) {
                jQuery.each(result, function (key, value) {
                    $('#province').append($('<option>', {
                        value: value.province,
                        text: value.province
                    }));

                    $('#perm_province').append($('<option>', {
                        value: value.province,
                        text: value.province
                    }));


                })

                $("#province option[value='{{$quotation->province}}']").attr("selected",
                    "selected");

                $("#perm_province option[value='{{$quotation->perm_province}}']").attr("selected",
                    "selected");

                $.ajax({
                    url: "{{url('/api/covid/city/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        province: $('#province').val(),
                    },
                    success: function (result) {
                        jQuery('#city').empty();
                        $('#city').append($('<option>', {
                            value: "",
                            text: "- Select City/Municipality -"
                        }));

                        jQuery.each(result, function (key, value) {
                            $('#city').append($('<option>', {
                                value: value.city,
                                text: value.city
                            }));


                        })

                        $("#city option[value='{{$quotation->city}}']").attr("selected",
                            "selected");

                        jQuery.ajax({
                            url: "{{url('/api/covid/barangay/get')}}",
                            method: "GET",
                            data: {
                                '_token': '{{csrf_token()}}',
                                city: $("#city").val(),
                            },
                            success: function (result) {
                                jQuery('#barangay').empty();
                                $('#barangay').append($('<option>', {
                                    value: "",
                                    text: "- Select Barangay -"
                                }));
                                jQuery.each(result, function (key, value) {
                                    $('#barangay').append($(
                                        '<option>', {
                                            value: value
                                                .barangay,
                                            text: value
                                                .barangay
                                        }));
                                })

                                $("#barangay option[value='{{$quotation->barangay}}']")
                                    .attr("selected", "selected");

                                var edit_address = '{{$quotation->address}}';
                                var edit_perm_address = '{{$quotation->perm_address}}';

                                if (edit_address !== edit_perm_address) {
                                    $("#permanentAddress").removeClass('d-none')
                                    $("#permanentAddressCheckboxDiv").addClass('d-none')

                                    jQuery.ajax({
                                        url: "{{url('/api/covid/city/get')}}",
                                        method: "GET",
                                        data: {
                                            '_token': '{{csrf_token()}}',
                                            province: '{{$quotation->perm_province}}'
                                        },
                                        success: function (result) {
                                            jQuery('#perm_city').empty();
                                            $('#perm_city').append($('<option>', {
                                                value: "",
                                                text: "- Select City/Municipality -"
                                            }));
                                            jQuery.each(result, function (key, value) {
                                                $('#perm_city').append($('<option>', {
                                                    value: value.city,
                                                    text: value.city
                                                }));
                                            })

                                            $("#perm_city option[value='{{$quotation->perm_city}}']")
                                            .attr("selected", "selected");

                                            jQuery.ajax({
                                                url: "{{url('/api/covid/barangay/get')}}",
                                                method: "GET",
                                                data: {
                                                    '_token': '{{csrf_token()}}',
                                                    city: '{{$quotation->perm_city}}'
                                                },
                                                success: function (result) {
                                                    jQuery('#perm_barangay').empty();
                                                    $('#perm_barangay').append($('<option>', {
                                                        value: "",
                                                        text: "- Select Barangay -"
                                                    }));
                                                    jQuery.each(result, function (key, value) {
                                                        $('#perm_barangay').append($('<option>', {
                                                            value: value.barangay,
                                                            text: value.barangay
                                                        }));
                                                    })

                                                    $("#perm_barangay option[value='{{$quotation->perm_barangay}}']")
                                                    .attr("selected", "selected");
                                                }
                                            })
                                        }
                                    })
                                } else {
                                    $("#permanentAddress").addClass('d-none')
                                }
                            }
                        })

                    }
                })
            }
        })

        $('#province').change(function () {
            if (jQuery(this).val() != '') {
                var province = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/api/covid/city/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        province: province
                    },
                    success: function (result) {
                        jQuery('#city').empty();
                        $('#city').append($('<option>', {
                            value: "",
                            text: "- Select City/Municipality -"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#city').append($('<option>', {
                                value: value.city,
                                text: value.city
                            }));
                        })

                        $('#city option[value={{$quotation->city}}]').attr("selected",
                            "selected");
                    }
                })
            }
        });


        $('#perm_province').change(function () {
            if (jQuery(this).val() != '') {
                var province = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/api/covid/city/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        province: province
                    },
                    success: function (result) {
                        jQuery('#perm_city').empty();
                        $('#perm_city').append($('<option>', {
                            value: "",
                            text: "- Select City/Municipality -"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#perm_city').append($('<option>', {
                                value: value.city,
                                text: value.city
                            }));
                        })
                    }
                })
            }
        });

        $('#city').change(function () {
            if (jQuery(this).val() != '') {
                var city = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/api/covid/barangay/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        city: city
                    },
                    success: function (result) {
                        jQuery('#barangay').empty();
                        $('#barangay').append($('<option>', {
                            value: "",
                            text: "- Select Barangay -"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#barangay').append($('<option>', {
                                value: value.barangay,
                                text: value.barangay
                            }));
                        })
                    }
                })
            }
        });

        $('#perm_city').change(function () {
            if (jQuery(this).val() != '') {
                var city = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/api/covid/barangay/get')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        city: city
                    },
                    success: function (result) {
                        jQuery('#perm_barangay').empty();
                        $('#perm_barangay').append($('<option>', {
                            value: "",
                            text: "- Select Barangay -"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#perm_barangay').append($('<option>', {
                                value: value.barangay,
                                text: value.barangay
                            }));
                        })
                    }
                })
            }
        });

        $("#permanentAddressCheckbox").change(function () {
            if ($("#permanentAddressCheckbox").prop('checked') == true) {
                $("#permanentAddress").removeClass('d-none')
                $("#permanentAddressCheckboxDiv").addClass('d-none')
            } else {
                $("#permanentAddress").addClass('d-none')
            }
        });

        $("#sameAddress").change(function () {
            if ($("#sameAddress").prop('checked') == true) {
                $("#permanentAddress").addClass('d-none')
                $('#sameAddress').prop('checked', false);
                $('#permanentAddressCheckbox').prop('checked', false);
                $("#permanentAddressCheckboxDiv").removeClass('d-none')
            }
        });

        $('.saveDraft').click(function (e) {
            e.preventDefault();
            var trans_no = $("#trans_no").val();
            var product = $("input[name='product']:checked").val();
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var middle_name = $("#middle_name").val();
            var phone_number = $("#phone_number").val();
            var email_address = $("#email_address").val();
            var gender = $("#gender").val();
            var civil_status = $("#civil_status").val();
            var date_of_birth = $("#date_of_birth").val();
            var place_of_birth = $("#place_of_birth").val();
            var occupation = $("#occupation").val();
            var source_of_income = $("#source_of_income").val();
            var id_type = $("#id_type").val();
            var id_number = $("#id_number").val();

            if ($("#permanentAddressCheckbox").prop('checked') == true) {
                var address = $("#address").val();
                var province = $("#province").val();
                var city = $("#city").val();
                var barangay = $("#barangay").val();
                var zip_code = $("#zip_code").val();
                var perm_address = $("#perm_address").val();
                var perm_province = $("#perm_province").val();
                var perm_city = $("#perm_city").val();
                var perm_barangay = $("#perm_barangay").val();
                var perm_zip_code = $("#perm_zip_code").val();
            } else {
                var address = $("#address").val();
                var province = $("#province").val();
                var city = $("#city").val();
                var barangay = $("#barangay").val();
                var zip_code = $("#zip_code").val();
                var perm_address = $("#address").val();
                var perm_province = $("#province").val();
                var perm_city = $("#city").val();
                var perm_barangay = $("#barangay").val();
                var perm_zip_code = $("#zip_code").val();
            }


            jQuery.ajax({
                url: "{{url('/quotation/save-as-draft')}}",
                method: "POST",
                data: {
                    '_token': '{{csrf_token()}}',
                    'trans_no': trans_no,
                    'product': product,
                    'first_name': first_name,
                    'last_name': last_name,
                    'middle_name': middle_name,
                    'phone_number': phone_number,
                    'email_address': email_address,
                    'gender': gender,
                    'civil_status': civil_status,
                    'date_of_birth': date_of_birth,
                    'place_of_birth': place_of_birth,
                    'occupation': occupation,
                    'source_of_income': source_of_income,
                    'id_type': id_type,
                    'id_number': id_number,
                    'address': address,
                    'province': province,
                    'city': city,
                    'barangay': barangay,
                    'zip_code': zip_code,
                    'perm_address': perm_address,
                    'perm_province': perm_province,
                    'perm_city': perm_city,
                    'perm_barangay': perm_barangay,
                    'perm_zip_code': perm_zip_code,
                },
                success: function (response) {
                    if (response.message === 'success') {
                        $("#alertSuccess").removeClass('d-none');
                    }
                }
            })
        });

        $("#first_name").change(function () {
            $("#first_name").removeClass('is-invalid');
        });

        $("#last_name").change(function () {
            $("#last_name").removeClass('is-invalid');
        });

        $("#middle_name").change(function () {
            $("#middle_name").removeClass('is-invalid');
        });

        $("#phone_number").change(function () {
            $("#phone_number").removeClass('is-invalid');
        });

        $("#email_address").change(function () {
            $("#email_address").removeClass('is-invalid');

            var email = $("#email_address").val();

            if (!validateEmail(email)) {
                $("#emailAddressInvalid").removeClass('d-none');
                jQuery("#email_address").css({
                    'border-color': '#d63939'
                });
            } else {
                $("#emailAddressInvalid").addClass('d-none');
                jQuery("#email_address").css({
                    'border-color': ''
                });
            }
        });

        $("#gender").change(function () {
            $("#gender").removeClass('is-invalid');
        });

        $("#civil_status").change(function () {
            $("#civil_status").removeClass('is-invalid');
        });

        $("#date_of_birth").change(function () {
            $("#date_of_birth").removeClass('is-invalid');
        });

        $("#place_of_birth").change(function () {
            $("#place_of_birth").removeClass('is-invalid');
        });

        $("#occupation").change(function () {
            $("#occupation").removeClass('is-invalid');
        });

        $("#source_of_income").change(function () {
            $("#source_of_income").removeClass('is-invalid');
        });

        $("#id_type").change(function () {
            $("#id_type").removeClass('is-invalid');
        });

        $("#id_number").change(function () {
            $("#id_number").removeClass('is-invalid');
        });

        $("#address").change(function () {
            $("#address").removeClass('is-invalid');
        });

        $("#province").change(function () {
            $("#province").removeClass('is-invalid');
        });

        $("#city").change(function () {
            $("#city").removeClass('is-invalid');
        });

        $("#barangay").change(function () {
            $("#barangay").removeClass('is-invalid');
        });

        $("#zip_code").change(function () {
            $("#zip_code").removeClass('is-invalid');
        });


        $("#perm_address").change(function () {
            $("#perm_address").removeClass('is-invalid');
        });

        $("#perm_province").change(function () {
            $("#perm_province").removeClass('is-invalid');
        });

        $("#perm_city").change(function () {
            $("#perm_city").removeClass('is-invalid');
        });

        $("#perm_barangay").change(function () {
            $("#perm_barangay").removeClass('is-invalid');
        });

        $("#perm_zip_code").change(function () {
            $("#perm_zip_code").removeClass('is-invalid');
        });

        $("input[name='product']").change(function () {
            $(".product-radio").removeClass("product-radio-invalid");
            $("#product-invalid").addClass("d-none");
        });

        $('#continueQuote').click(function (e) {
            e.preventDefault();
            var trans_no = $("#trans_no").val();
            var product = $("input[name='product']:checked").val();
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var middle_name = $("#middle_name").val();
            var phone_number = $("#phone_number").val();
            var email_address = $("#email_address").val();
            var gender = $("#gender").val();
            var civil_status = $("#civil_status").val();
            var date_of_birth = $("#date_of_birth").val();
            var place_of_birth = $("#place_of_birth").val();
            var occupation = $("#occupation").val();
            var source_of_income = $("#source_of_income").val();
            var id_type = $("#id_type").val();
            var id_number = $("#id_number").val();
            var address = $("#address").val();
            var province = $("#province").val();
            var city = $("#city").val();
            var barangay = $("#barangay").val();
            var zip_code = $("#zip_code").val();
            var perm_address = $("#perm_address").val();
            var perm_province = $("#perm_province").val();
            var perm_city = $("#perm_city").val();
            var perm_barangay = $("#perm_barangay").val();
            var perm_zip_code = $("#perm_zip_code").val();

            if ($("input[name='product']:checked").val() == undefined) {
                $(".product-radio").addClass("product-radio-invalid");
                $("#product-invalid").removeClass("d-none");
            } else {
                $(".product-radio").removeClass("product-radio-invalid");
                $("#product-invalid").addClass("d-none");
            }

            if (first_name === '') {
                $("#first_name").addClass('is-invalid');
            } else {
                $("#first_name").removeClass('is-invalid');
            }

            if (last_name === '') {
                $("#last_name").addClass('is-invalid');
            } else {
                $("#last_name").removeClass('is-invalid');
            }

            if (middle_name === '') {
                $("#middle_name").addClass('is-invalid');
            } else {
                $("#middle_name").removeClass('is-invalid');
            }

            if (phone_number === '') {
                $("#phone_number").addClass('is-invalid');
            } else {
                $("#phone_number").removeClass('is-invalid');
            }

            if (email_address === '') {
                $("#email_address").addClass('is-invalid');
            } else {
                $("#email_address").removeClass('is-invalid');
            }

            if (gender === '') {
                $("#gender").addClass('is-invalid');
            } else {
                $("#gender").removeClass('is-invalid');
            }

            if (civil_status === '') {
                $("#civil_status").addClass('is-invalid');
            } else {
                $("#civil_status").removeClass('is-invalid');
            }

            if (date_of_birth === '') {
                $("#date_of_birth").addClass('is-invalid');
            } else {
                $("#date_of_birth").removeClass('is-invalid');
            }

            if (place_of_birth === '') {
                $("#place_of_birth").addClass('is-invalid');
            } else {
                $("#place_of_birth").removeClass('is-invalid');
            }

            if (occupation === '') {
                $("#occupation").addClass('is-invalid');
            } else {
                $("#occupation").removeClass('is-invalid');
            }

            if (source_of_income === '') {
                $("#source_of_income").addClass('is-invalid');
            } else {
                $("#source_of_income").removeClass('is-invalid');
            }

            if (id_type === '') {
                $("#id_type").addClass('is-invalid');
            } else {
                $("#id_type").removeClass('is-invalid');
            }

            if (id_number === '') {
                $("#id_number").addClass('is-invalid');
            } else {
                $("#id_number").removeClass('is-invalid');
            }

            if (address === '') {
                $("#address").addClass('is-invalid');
            } else {
                $("#address").removeClass('is-invalid');
            }

            if (province === '') {
                $("#province").addClass('is-invalid');
            } else {
                $("#province").removeClass('is-invalid');
            }

            if (city === '') {
                $("#city").addClass('is-invalid');
            } else {
                $("#city").removeClass('is-invalid');
            }

            if (barangay === '') {
                $("#barangay").addClass('is-invalid');
            } else {
                $("#barangay").removeClass('is-invalid');
            }

            if (zip_code === '') {
                $("#zip_code").addClass('is-invalid');
            } else {
                $("#zip_code").removeClass('is-invalid');
            }

            if ($("#permanentAddressCheckbox").prop('checked') == true) {
                if (perm_address === '') {
                    $("#perm_address").addClass('is-invalid');
                } else {
                    $("#perm_address").removeClass('is-invalid');
                }

                if (perm_province === '') {
                    $("#perm_province").addClass('is-invalid');
                } else {
                    $("#perm_province").removeClass('is-invalid');
                }

                if (perm_city === '') {
                    $("#perm_city").addClass('is-invalid');
                } else {
                    $("#perm_city").removeClass('is-invalid');
                }

                if (perm_barangay === '') {
                    $("#perm_barangay").addClass('is-invalid');
                } else {
                    $("#perm_barangay").removeClass('is-invalid');
                }

                if (perm_zip_code === '') {
                    $("#perm_zip_code").addClass('is-invalid');
                } else {
                    $("#perm_zip_code").removeClass('is-invalid');
                }
            }

            if (product !== undefined &&
                product !== '' &&
                first_name !== '' &&
                last_name !== '' &&
                middle_name !== '' &&
                phone_number !== '' &&
                email_address !== '' &&
                gender !== '' &&
                civil_status !== '' &&
                date_of_birth !== '' &&
                place_of_birth !== '' &&
                occupation !== '' &&
                source_of_income !== '' &&
                id_type !== '' &&
                id_number !== '' &&
                address !== '' &&
                province !== '' &&
                city !== '' &&
                barangay !== '' &&
                zip_code !== ''
            ) {

                if ($("#permanentAddressCheckbox").prop('checked') == true) {
                    if (perm_address !== '' &&
                        perm_province !== '' &&
                        perm_city !== '' &&
                        perm_barangay !== '' &&
                        perm_zip_code !== '') {
                        $("#quotationForm").submit();
                    }
                } else {
                    $("#quotationForm").submit();
                }

                // jQuery.ajax({
                //     url: "{{url('/quotation/get-a-quote/second-page')}}",
                //     method: "GET",
                //     data: {
                //         '_token': '{{csrf_token()}}',
                //         'trans_no': trans_no,
                //         'first_name': first_name,
                //         'last_name': last_name,
                //         'middle_name': middle_name,
                //         'phone_number': phone_number,
                //         'email_address': email_address,
                //         'gender': gender,
                //         'civil_status': civil_status,
                //         'date_of_birth': date_of_birth,
                //         'place_of_birth': place_of_birth,
                //         'occupation': occupation,
                //         'source_of_income': source_of_income,
                //         'id_type': id_type,
                //         'id_number': id_number,
                //         'address': address,
                //         'province': province,
                //         'city': city,
                //         'barangay': barangay,
                //         'zip_code': zip_code,
                //     },
                //     success: function (result) {
                //         window.location.replace(result);
                //     }
                // })
            }

        });

        $('[name=product]').click(function () {
            var valueis = $(this).attr('value');
        });


    });
</script>
@endsection