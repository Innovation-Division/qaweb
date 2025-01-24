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
        border-radius: 5px;
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

    #quotationRange {
        accent-color: #db3e8d;
    }

    #quotationRange::-webkit-slider-thumb {
        -webkit-appearance: none;
        background-color: rgb(250%, 250%, 250%);
    }

    .card {
        border-radius: 10px !important;
    }

    body {
        background-color: #f3f3f3;
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

        .product-radio {
            padding: 12px 24px !important;
        }
    }

    .product-radio {
        border: 1px solid #D7DEE3 !important;
        padding: 11px 5px !important;
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
            <a href="{{url('/quotation')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#008080"
                    class="bi bi-arrow-left-short" viewBox="0 0 18 18">
                    <path fill-rule="evenodd"
                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
                </svg> <strong style="color: #008080 !important;">Back to quotations</strong></a>
        </div>
    </div>
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
                    <div class="col-lg-12 mb-3">
                        <strong style="font-size: 20px;">Add car information</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <input type="hidden" value="{{$quotation->trans_no}}" id="trans_no">
                                    <input type="hidden" id="totalvalhid" name="totalvalhid">
                                    <label for="exampleInputEmail1" class="mb-2">Vehicle classification <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="vehicle_class" id="vehicle_class">
                                        <option value="">Select vehicle classification</option>
                                        <option value="Private Car"
                                            {{$quotation->vehicle_class == 'Private Car' ? 'selected' : ''}}>Private
                                            Car</option>
                                    </select>
                                    <div class="invalid-feedback">Vehicle classification is required</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Brand <span
                                                    class="text-danger">*</span></label>
                                            <select type="text" class="form-select brand" value="" name="brand"
                                                id="brand">
                                                <option value="">Select brand</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->brand}}"
                                                    {{$quotation->brand == $brand->brand ? 'selected' : ''}}>
                                                    {{$brand->brand}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Brand is required</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Year <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="year" id="year">
                                                <option>Select year</option>
                                            </select>
                                            <div class="invalid-feedback">Year is required</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="mb-2">Model <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="model" id="model">
                                    <option value="">Select car model</option>
                                    </select>
                                    <div class="invalid-feedback">Model is required</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">MV File No. <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="mv_file" name="mv_file" value="{{$quotation->mv_file}}" placeholder="Enter mv file no.">
                                            <div class="invalid-feedback">MV File is required</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Plate No. <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="plate_no" name="plate_no" value="{{$quotation->plate_no}}" placeholder="Enter plate no.">
                                            <div class="invalid-feedback">Plate No. is required</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Engine No. <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="engine_no" name="engine_no" value="{{$quotation->engine_no}}" placeholder="Enter engine no.">
                                            <div class="invalid-feedback">Engine No. is required</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Body Type <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="body_type" name="body_type" value="{{$quotation->body_type}}" placeholder="Enter body type">
                                            <div class="invalid-feedback">Body Type is required</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Color <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="color" name="color" value="{{$quotation->color}}" placeholder="Enter color">
                                            <div class="invalid-feedback">Color is required</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="mb-2">Chasis No. <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="chasis_no" name="chasis_no" value="{{$quotation->chasis_no}}" placeholder="Enter chasis no.">
                                            <div class="invalid-feedback">Chasis No. is required</div>
                                        </div>
                                    </div>
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
                        <strong style="font-size: 20px;">Add car value</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="mb-2">Total value <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">
                                            ₱
                                        </span>
                                        <input type="text" class="form-control" autocomplete="off" name="total_value"
                                            id="total_value" placeholder="Enter value of the car">
                                    </div>
                                    <div class="invalid-feedback">Total value is required</div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="row">
                                    <input type="range" class="form-control-range col-lg-12" id="quotationRange">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6">
                                        <p style="color: #4D4D4D; font-weight: 500; font-size: 16px; line-height: 16px;"
                                            id="minValue"></p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p style="color: #1D1E21; font-weight: 500; font-size: 16px; line-height: 16px;"
                                            id="maxValue"></p>
                                    </div>
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
                        <strong style="font-size: 20px;">Select insurance coverage</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="mb-2">Bodily injury <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="bodily_injury" id="bodily_injury">
                                    <option value="">Select bodily injury</option>
                                        @foreach($bi_amounts as $amount)
                                        <option value="{{$amount->amount}}" {{$quotation->bodily_injury == $amount->amount ? 'selected' : ''}}>₱{{number_format($amount->amount, 2)}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Bodily injury is required</div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="mb-2">Property damage <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="property_damage" id="property_damage">
                                    <option value="">Select property damage</option>
                                        @foreach($bi_amounts as $amount)
                                        <option value="{{$amount->amount}}" {{$quotation->property_damage == $amount->amount ? 'selected' : ''}}>
                                        ₱{{number_format($amount->amount, 2)}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Property damage is required</div>
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
                        <strong style="font-size: 20px;">Select insurance plan</strong>
                        <p style="color: grey; font-size: 13px;">You can select up to two plans</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <input type="radio" class="btn-check" name="aon" id="btn-radio-basic-1"
                                    autocomplete="off" value="With Acts of Nature" {{$quotation->aon === 'With Acts of Nature' || $quotation->aon == '' ? 'checked' : ''}}>
                                <label for="btn-radio-basic-1" type="button" class="btn product-radio">With Acts of
                                    Nature</label>
                                <input type="radio" class="btn-check" name="aon" id="btn-radio-basic-2"
                                    autocomplete="off" value="Without Acts of Nature" {{$quotation->aon === 'Without Acts of Nature' ? 'checked' : ''}}>
                                <label for="btn-radio-basic-2" type="button" class="btn product-radio">Without Acts
                                    of
                                    Nature</label>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <input type="radio" class="btn-check" name="rscc" id="btn-radio-basic-3"
                                    autocomplete="off" value="With RSCC"  {{$quotation->rscc === 'With RSCC' ? 'checked' : ''}}>
                                <label for="btn-radio-basic-3" type="button" class="btn product-radio">With
                                    RSCC</label>
                                <input type="radio" class="btn-check" name="rscc" id="btn-radio-basic-4"
                                    autocomplete="off" value="Without RSCC" {{$quotation->rscc === 'Without RSCC' || $quotation->rscc == '' ? 'checked' : ''}}>
                                <label for="btn-radio-basic-4" type="button" class="btn product-radio">Without
                                    RSCC</label>
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
                        <strong style="font-size: 20px;">Standard accessories</strong>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <ul>
                                    <li>Stereo (Built-in)</li>
                                    <li>Aircon (Built-in) </li>
                                </ul>
                            </div>
                            <div class="col-lg-9" style="padding: 0;">
                                <ul>
                                    <li>Five (5) pcs. Magwheels</li>
                                    <li>Speakers (2) pcs. (Built-in)</li>
                                </ul>
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
                    <div class="col-lg-12">
                        <strong style="font-size: 20px;">Non-standard accessories <span
                                style="color: grey;">(optional)</span></strong>
                        <p style="color: grey; font-size: 13px;">*All non-standard or non-factory fitted accessories
                            must be declared to be covered</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div id="newinput">
                                <div class="col-lg-12 accessory mt-3" id="row">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Select
                                                    accessory</label>
                                                <select class="form-select" name="accessory[]" id="accessory">
                                                <option value="">Select accessory</option>
                                                    @foreach($accessories as $accessory)
                                                    <option value="{{$accessory->name}}">{{$accessory->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">Accessory is required</div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="mb-2">Value</label>
                                                <input type="number" class="form-control accessory_value" name="accessory_value[]"
                                                    id="accessory_value" placeholder="Enter value">
                                                <div class="invalid-feedback">Value is required</div>
                                            </div>
                                        </div>
                                        <div class="col-1 mt-5 text-center ">
                                            <a href="javascript:void(0)" title="Delete Item" class="deleteItem d-none"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="40" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" stroke="#008080" />
                                                    <path d="M10 11l0 6" stroke="#008080" />
                                                    <path d="M14 11l0 6" stroke="#008080" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"
                                                        stroke="#008080" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"
                                                        stroke="#008080" /></svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <p style="width: 100%; margin-top: .25rem; font-size: 85.714285%; color: #d63939;"
                                    class="d-none" id="addNewItemInvalid">Select accessory and insert value first
                                    before
                                    adding a new item</p>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <a href="javascript:void(0)" id="addItem"
                                    style="font-weight: bold; color: black;"><strong><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="20"
                                            fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 20">
                                            <path fill-rule="evenodd"
                                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                        </svg> Add item</strong></a>
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
            <button class="batch-button batch-button-secondary col-12 saveDraft"><svg xmlns="http://www.w3.org/2000/svg"
                    width="25" height="20" fill="currentColor" class="bi bi-floppy" viewBox="0 0 25 20">
                    <path d="M11 2H9v3h2z"></path>
                    <path
                        d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z">
                    </path>
                </svg>Save as draft</button>
        </div>
    @endif
        <div class="col-lg-6">
            <button class="batch-button batch-button-success col-12" id="generateQuote">Generate Quote <svg
                    xmlns="http://www.w3.org/2000/svg" width="30" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg></button>
        </div>
    </div>
</div>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var el;
        window.TomSelect && (new TomSelect(el = document.getElementById('brand'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return '<div><span class="dropdown-item-indicator">' + data
                            .customProperties + '</span>' + escape(data.text) + '</div>';
                    }
                    return '<div>' + escape(data.text) + '</div>';
                },
            },
        }));
    });

    // @formatter:on
</script>
<script>
    $(document).ready(function () {

        function addCommas(num) {
            var str = num.toString().split('.');
            if (str[0].length >= 4) {
                //add comma every 3 digits befor decimal
                str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
            }
            /* Optional formating for decimal places
            if (str[1] && str[1].length >= 4) {
                //add space every 3 digits after decimal
                str[1] = str[1].replace(/(\d{3})/g, '$1 ');
            }*/
            return str.join('.');
        }

        $('#total_value').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
            e.which <= 0 || // arrow keys
            e.which == 8 || // delete key
            /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        })

        $('.accessory_value').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
            e.which <= 0 || // arrow keys
            e.which == 8 || // delete key
            /[0-9]/.test(String.fromCharCode(e.which)); // numbers
        })

        $('select').on('change', function() {
            var str1 = $(this).val();
            var str2 = 'Select';

            if (str1.indexOf(str2) != -1) {
                return $(this).css('color', '#929dab');
            } else {
                return $(this).attr('style', 'color: black !important');
            }
        });

        $.ajax({
            url: "{{url('/quotation/year')}}",
            method: "GET",
            data: {
                '_token': '{{csrf_token()}}',
                brand: $("#brand").val()
            },
            success: function (result) {
                jQuery('#year').empty();
                $('#year').append($('<option>', {
                    value: "",
                    text: "- Select Year -"
                }));
                jQuery.each(result, function (key, value) {
                    $('#year').append($('<option>', {
                        value: value.year,
                        text: value.year
                    }));
                })

                $('#year option[value={{$quotation->year}}]').attr("selected", "selected");

                jQuery.ajax({

                    url: "{{url('/quotation/model')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        year: $("#year").val(),
                        brand: $("#brand").val(),
                    },
                    success: function (result) {
                        jQuery('#model').empty();
                        $('#model').append($('<option>', {
                            value: "",
                            text: "- Select Model-"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#model').append($('<option>', {
                                value: value.model,
                                text: value.model
                            }));
                        })

                        $("#model option[value='{{$quotation->model}}']").attr(
                            "selected", "selected");

                        jQuery.ajax({
                            url: "{{url('/quotation/car-value')}}",
                            method: "GET",
                            data: {
                                '_token': '{{csrf_token()}}',
                                year: $("#year").val(),
                                brand: $("#brand").val(),
                                model: $("#model").val(),
                            },
                            success: function (result) {
                                var minval = (result * 0.9);
                                var maxval = (result * 1.1);

                                minval = minval.toFixed(2);
                                maxval = maxval.toFixed(2);
                                jQuery('#fader').val(result);
                                $('#minValue').html("Php " + addCommas(
                                    minval));
                                $('#maxValue').html("Php " + addCommas(
                                    maxval));

                                $('#quotationRange').attr({
                                    'min': minval,
                                    'max': maxval
                                });
                                $('#total_value').attr({
                                    'min': minval,
                                    'max': maxval
                                });

                                jQuery('input[name=totalvalhid]').val(result);

                                $("#total_value").change(function () {
                                    var total = $("#total_value")
                                        .val();
                                    var min_val = (result * 0.9);
                                    var max_val = (result * 1.1);

                                    if (parseFloat(total) >
                                        parseFloat(max_val)) {
                                        $("#total_value").val(
                                            max_val.toFixed(2));
                                    } else if (parseFloat(total) <
                                        parseFloat(min_val)) {
                                        $("#total_value").val(
                                            min_val.toFixed(2));
                                    } else {

                                    }
                                });

                                $('#total_value').val('{{$quotation->total_value}}');
                                $("#quotationRange").val('{{$quotation->total_value}}');

                                var colCount = ("{{$accessories_trans->count()}}");

                                if (colCount > 0) {
                                    jQuery('.deleteItem').removeClass('d-none');

                                    var accessories = {!! $accessories_trans->toJson() !!};

                                    $('#row').last().find("#accessory").val(accessories[0].accessory);

                                    $('#row').last().find("#accessory_value").val(accessories[0].value);
                                    

                                    for(var i = 1; i < colCount; i++) {
                                        var $div = $('#row').last()
                                        .clone()
                                        .appendTo('#newinput')
                                        .find("select, input").attr("id", function (i, oldVal) {
                                            return oldVal + 1;
                                        }).val("");

                                        
                                     
                                        $("#accessory" + i).val(accessories[i].accessory);
                                        $("#accessory_value" + i).val(accessories[i].value);
                                    }
                                } else {
                                    jQuery('.deleteItem').addClass('d-none');
                                }

                            }
                        })
                    }
                })
            }
        });

        $("#brand").change(function () {
            if (jQuery(this).val() != '') {
                var brand = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/quotation/year')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        brand: brand
                    },
                    success: function (result) {
                        jQuery('#year').empty();
                        $('#year').append($('<option>', {
                            value: "",
                            text: "- Select Year -"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#year').append($('<option>', {
                                value: value.year,
                                text: value.year
                            }));
                        })
                    }
                })
            }
        });


        $('#year').change(function () {
            if (jQuery(this).val() != '') {
                var brand = $('#brand').val();
                var year = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/quotation/model')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        year: year,
                        brand: brand,
                    },
                    success: function (result) {
                        jQuery('#model').empty();
                        $('#model').append($('<option>', {
                            value: "",
                            text: "- Select Model-"
                        }));
                        jQuery.each(result, function (key, value) {
                            $('#model').append($('<option>', {
                                value: value.model,
                                text: value.model
                            }));
                        })
                    }
                })
            }
        });

        $('#model').change(function () {
            if (jQuery(this).val() != '') {
                var brand = $('#brand').val();
                var year = $('#year').val();
                var model = jQuery(this).val();
                jQuery.ajax({
                    url: "{{url('/quotation/car-value')}}",
                    method: "GET",
                    data: {
                        '_token': '{{csrf_token()}}',
                        year: year,
                        brand: brand,
                        model: model,
                    },
                    success: function (result) {
                        var minval = (result * 0.9);
                        var maxval = (result * 1.1);

                        minval = minval.toFixed(2);
                        maxval = maxval.toFixed(2);
                        jQuery('#fader').val(result);
                        $('#minValue').html("₱" + addCommas(minval));
                        $('#maxValue').html("₱" + addCommas(maxval));
                        $('input[name=totalvalhid]').val(result);
                        $("#total_value").val(addCommas(result));
                        $('#quotationRange').attr({
                            'min': minval,
                            'max': maxval,
                            'value': result
                        });
                        $('#total_value').attr({
                            'min': minval,
                            'max': maxval
                        });
                    }
                })
            }
        });

        $('.saveDraft').click(function (e) {
            e.preventDefault();
            var product = '{{$quotation->product}}';
            var first_name = '{{$quotation->first_name}}';
            var last_name = '{{$quotation->last_name}}';
            var middle_name = '{{$quotation->middle_name}}';
            var phone_number = '{{$quotation->phone_number}}';
            var email_address = '{{$quotation->email_address}}';
            var gender = '{{$quotation->gender}}';
            var civil_status = '{{$quotation->civil_status}}';
            var date_of_birth = '{{$quotation->date_of_birth}}';
            var place_of_birth = '{{$quotation->place_of_birth}}';
            var occupation = '{{$quotation->occupation}}';
            var source_of_income = '{{$quotation->source_of_income}}';
            var id_type = '{{$quotation->id_type}}';
            var id_number = '{{$quotation->id_number}}';
            var trans_no = '{{$quotation->trans_no}}';
            var address = '{{$quotation->address}}';
            var province = '{{$quotation->province}}';
            var city = '{{$quotation->city}}';
            var barangay = '{{$quotation->barangay}}';
            var zip_code = '{{$quotation->zip_code}}';
            var perm_address = '{{$quotation->perm_address}}';
            var perm_province = '{{$quotation->perm_province}}';
            var perm_city = '{{$quotation->perm_city}}';
            var perm_barangay = '{{$quotation->perm_barangay}}';
            var perm_zip_code = '{{$quotation->perm_zip_code}}';
            var vehicle_class = $('#vehicle_class').val();
            var brand = $('#brand').val();
            var year = $('#year').val();
            var model = $('#model').val();
            var total_value = $('#total_value').val();
            var bodily_injury = $('#bodily_injury').val();
            var property_damage = $('#property_damage').val();
            var aon = $("input[name='aon']:checked").val();
            var rscc = $("input[name='rscc']:checked").val();
            var market_value = $("input[name='totalvalhid']").val();

            var accessory = [];
            $('select[name="accessory[]"]').each(function () {
                accessory.push(this.value);
            });

            var accessory_value = [];
            $('input[name="accessory_value[]"]').each(function () {
                accessory_value.push(this.value);
            });

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
                    'vehicle_class': vehicle_class,
                    'brand': brand,
                    'year': year,
                    'model': model,
                    'total_value': total_value,
                    'bodily_injury': bodily_injury,
                    'property_damage': property_damage,
                    'aon': aon,
                    'rscc': rscc,
                    'accessory': accessory,
                    'accessory_value': accessory_value,
                    'market_value': market_value
                },
                success: function (response) {
                    if (response.message === 'success') {
                        $("#alertSuccess").removeClass('d-none');
                    }
                }
            })
        });

        $('#addItem').click(function () {

            var colCount = $("#newinput .accessory").length;

            for (let i = 0; i < colCount; i++) {

                if (i !== 0) {
                    var accessory = $("#accessory" + i).val();
                    var accessory_value = $("#accessory_value" + i).val();

                    if (accessory === '' && accessory_value === '') {
                        $("#addNewItemInvalid").removeClass('d-none');

                        jQuery("#accessory" + i).css({
                            'border-color': '#d63939'
                        });

                        jQuery("#accessory_value" + i).css({
                            'border-color': '#d63939'
                        });

                        return;
                    } else {

                        if (accessory === '') {
                            $("#accessory" + i).addClass('is-invalid');
                            return;
                        } else if (accessory_value === '') {
                            $("#accessory_value" + i).addClass('is-invalid');
                            return;
                        } else {

                        }
                    }

                    $("#accessory" + i).change(function () {
                        $("#accessory" + i).removeClass('is-invalid');
                        $("#accessory_value" + i).removeClass('is-invalid');

                        $("#addNewItemInvalid").addClass('d-none');

                        jQuery("#accessory" + i).css({
                            'border-color': ''
                        });

                        jQuery("#accessory_value" + i).css({
                            'border-color': ''
                        });
                    });

                    $("#accessory_value" + i).change(function () {
                        $("#accessory" + i).removeClass('is-invalid');
                        $("#accessory_value" + i).removeClass('is-invalid');

                        $("#addNewItemInvalid").addClass('d-none');

                        jQuery("#accessory" + i).css({
                            'border-color': ''
                        });

                        jQuery("#accessory_value" + i).css({
                            'border-color': ''
                        });
                    });

                } else {
                    var accessory = $("#accessory").val();
                    var accessory_value = $("#accessory_value").val();

                    if(accessory === 'Select accessory') {
                        accessory = '';
                    }

                    if (accessory === '' && accessory_value === '') {
                        $("#addNewItemInvalid").removeClass('d-none');

                        jQuery("#accessory").css({
                            'border-color': '#d63939'
                        });

                        jQuery("#accessory_value").css({
                            'border-color': '#d63939'
                        });

                        return;
                    } else {
                        if (accessory === '') {
                            $("#accessory").addClass('is-invalid');
                            return;
                        } else if (accessory_value === '') {
                            $("#accessory_value").addClass('is-invalid');
                            return;
                        } else {

                        }
                    }
                }
            }

            if (colCount > 0) {
                jQuery('.deleteItem').removeClass('d-none');
            } else {
                jQuery('.deleteItem').addClass('d-none');
            }

            var $div = $('#row').last()
                .clone()
                .appendTo('#newinput')
                .find("select, input").attr("id", function (i, oldVal) {
                    return oldVal + 1;
                }).val('');
        });

        $("body").on("click", ".deleteItem", function () {
            $(this).parents("#row").remove();

            var colCount = $("#newinput .accessory").length;

            if (colCount > 1) {
                jQuery('.deleteItem').removeClass('d-none');
            } else {
                jQuery('.deleteItem').addClass('d-none');
            }
        });

        $("#vehicle_class").change(function () {
            $("#vehicle_class").removeClass('is-invalid');
        });

        $("#brand").change(function () {
            $("#brand").removeClass('is-invalid');

            jQuery(".ts-wrapper.form-select.brand.single").css({
                'border-color': ''
            });
        });

        $("#year").change(function () {
            $("#year").removeClass('is-invalid');
        });

        $("#model").change(function () {
            $("#model").removeClass('is-invalid');
        });

        $("#mv_file").change(function () {
            $("#mv_file").removeClass('is-invalid');
        });

        $("#plate_no").change(function () {
            $("#plate_no").removeClass('is-invalid');
        });

        $("#engine_no").change(function () {
            $("#engine_no").removeClass('is-invalid');
        });

        $("#body_type").change(function () {
            $("#body_type").removeClass('is-invalid');
        });

        $("#color").change(function () {
            $("#color").removeClass('is-invalid');
        });

        $("#chasis_no").change(function () {
            $("#chasis_no").removeClass('is-invalid');
        });

        $("#quotationRange").change(function () {
            var total = $("#quotationRange").val();
            var withdec = parseFloat(total).toFixed(2);
            $("#total_value").val(addCommas(withdec));
            $("#total_value").removeClass('is-invalid');
        });

        $("#total_value").change(function () {
            var total = $("#total_value").val();
            total = total.replace(",", "");
            var defaulttotal = $("input[name=totalvalhid]").val();
            var minval = (defaulttotal * 0.9);
            var maxval = (defaulttotal * 1.1);

            minval = minval.toFixed(2);
            maxval = maxval.toFixed(2);
           
            $("#total_value").removeClass('is-invalid');
            var withdec = parseFloat(total).toFixed(2);

            var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
            var str = total;
            if(!numberRegex.test(str)) {
                    toastr.error('Invalid Amount.','Error');
                    withdec = defaulttotal;
                    withdec = parseFloat(withdec).toFixed(2);
            }else{
                if (parseFloat(total) > parseFloat(maxval)) {
                    toastr.error('Exceed the maximum allowed amount.','Error');
                    withdec = maxval;
                    withdec = parseFloat(withdec).toFixed(2);
                } else if (parseFloat(total) < parseFloat(minval)) {
                    toastr.error('Exceed the minimum allowed amount.','Error');
                    withdec = minval;
                    withdec = parseFloat(withdec).toFixed(2);
                }
            }  
            $('#quotationRange').attr({
                'min': minval,
                'max': maxval,
                'value': withdec
            });
            
            $("#total_value").val(addCommas(withdec));

        });

        $("#bodily_injury").change(function () {
            $("#bodily_injury").removeClass('is-invalid');
        });

        $("#property_damage").change(function () {
            $("#property_damage").removeClass('is-invalid');
        });

        $("#accessory").change(function () {
            $("#accessory").removeClass('is-invalid');
            $("#accessory_value").removeClass('is-invalid');

            $("#addNewItemInvalid").addClass('d-none');

            jQuery("#accessory").css({
                'border-color': ''
            });

            jQuery("#accessory_value").css({
                'border-color': ''
            });
        });

        $("#accessory_value").change(function () {
            $("#accessory").removeClass('is-invalid');
            $("#accessory_value").removeClass('is-invalid');

            $("#addNewItemInvalid").addClass('d-none');

            jQuery("#accessory").css({
                'border-color': ''
            });

            jQuery("#accessory_value").css({
                'border-color': ''
            });
        });

        $('#generateQuote').click(function (e) {
            e.preventDefault();
            var product = '{{$quotation->product}}';
            var first_name = '{{$quotation->first_name}}';
            var last_name = '{{$quotation->last_name}}';
            var middle_name = '{{$quotation->middle_name}}';
            var phone_number = '{{$quotation->phone_number}}';
            var email_address = '{{$quotation->email_address}}';
            var gender = '{{$quotation->gender}}';
            var civil_status = '{{$quotation->civil_status}}';
            var date_of_birth = '{{$quotation->date_of_birth}}';
            var place_of_birth = '{{$quotation->place_of_birth}}';
            var occupation = '{{$quotation->occupation}}';
            var source_of_income = '{{$quotation->source_of_income}}';
            var id_type = '{{$quotation->id_type}}';
            var id_number = '{{$quotation->id_number}}';
            var trans_no = '{{$quotation->trans_no}}';
            var address = '{{$quotation->address}}';
            var province = '{{$quotation->province}}';
            var city = '{{$quotation->city}}';
            var barangay = '{{$quotation->barangay}}';
            var zip_code = '{{$quotation->zip_code}}';
            var perm_address = '{{$quotation->perm_address}}';
            var perm_province = '{{$quotation->perm_province}}';
            var perm_city = '{{$quotation->perm_city}}';
            var perm_barangay = '{{$quotation->perm_barangay}}';
            var perm_zip_code = '{{$quotation->perm_zip_code}}';
            var vehicle_class = $("#vehicle_class").val();
            var brand = $("#brand").val();
            var year = $("#year").val();
            var model = $("#model").val();
            var mv_file = $('#mv_file').val();
            var plate_no = $('#plate_no').val();
            var engine_no = $('#engine_no').val();
            var body_type = $('#body_type').val();
            var color = $('#color').val();
            var chasis_no = $('#chasis_no').val();
            var total_value = $("#total_value").val();
            var bodily_injury = $("#bodily_injury").val();
            var property_damage = $("#property_damage").val();
            var aon = $("input[name='aon']:checked").val();
            var rscc = $("input[name='rscc']:checked").val();
            var market_value = $("input[name='totalvalhid']").val();

            if ($("input[name='aon']:checked").val() == undefined) {
                $(".product-radio").addClass("product-radio-invalid");
                $("#product-invalid").removeClass("d-none");
            } else {
                $(".product-radio").removeClass("product-radio-invalid");
                $("#product-invalid").addClass("d-none");
            }

            if ($("input[name='rscc']:checked").val() == undefined) {
                $(".product-radio").addClass("product-radio-invalid");
                $("#product-invalid").removeClass("d-none");
            } else {
                $(".product-radio").removeClass("product-radio-invalid");
                $("#product-invalid").addClass("d-none");
            }

            if (vehicle_class === '') {
                $("#vehicle_class").addClass('is-invalid');
            } else {
                $("#vehicle_class").removeClass('is-invalid');
            }

            if (brand === '') {
                $("#brand").addClass('is-invalid');

                jQuery(".ts-wrapper.form-select.brand.single").css({
                    'border-color': '#d63939'
                });
            } else {
                $("#brand").removeClass('is-invalid');
                jQuery(".ts-wrapper.form-select.brand.single").css({
                    'border-color': ''
                });
            }

            if (year === '') {
                $("#year").addClass('is-invalid');
            } else {
                $("#year").removeClass('is-invalid');
            }

            if (model === '') {
                $("#model").addClass('is-invalid');
            } else {
                $("#model").removeClass('is-invalid');
            }

            if (mv_file === '') {
                $("#mv_file").addClass('is-invalid');
            } else {
                $("#mv_file").removeClass('is-invalid');
            }

            if (plate_no === '') {
                $("#plate_no").addClass('is-invalid');
            } else {
                $("#plate_no").removeClass('is-invalid');
            }

            if (engine_no === '') {
                $("#engine_no").addClass('is-invalid');
            } else {
                $("#engine_no").removeClass('is-invalid');
            }

            if (body_type === '') {
                $("#body_type").addClass('is-invalid');
            } else {
                $("#body_type").removeClass('is-invalid');
            }

            if (color === '') {
                $("#color").addClass('is-invalid');
            } else {
                $("#color").removeClass('is-invalid');
            }

            if (chasis_no === '') {
                $("#chasis_no").addClass('is-invalid');
            } else {
                $("#chasis_no").removeClass('is-invalid');
            }

            if (total_value === '') {
                $("#total_value").addClass('is-invalid');
            } else {
                $("#total_value").removeClass('is-invalid');
            }

            if (bodily_injury === '') {
                $("#bodily_injury").addClass('is-invalid');
            } else {
                $("#bodily_injury").removeClass('is-invalid');
            }

            if (property_damage === '') {
                $("#property_damage").addClass('is-invalid');
            } else {
                $("#property_damage").removeClass('is-invalid');
            }

            var colCount = $("#newinput .accessory").length;

            $("#addNewItemInvalid").addClass('d-none');

            for (let i = 0; i < colCount; i++) {

                if (i !== 0) {
                    var accessory = $("#accessory" + i).val();
                    var accessory_value = $("#accessory_value" + i).val();

                    if (accessory) {
                        if (accessory_value === '') {
                            $("#accessory_value" + i).addClass('is-invalid');
                            return;
                        } else {
                            $("#accessory" + i).removeClass('is-invalid');
                            $("#accessory_value" + i).removeClass('is-invalid');
                        }
                    } else if (accessory_value) {
                        if (accessory === '') {
                            $("#accessory" + i).addClass('is-invalid');
                            return;
                        } else {
                            $("#accessory" + i).removeClass('is-invalid');
                            $("#accessory_value" + i).removeClass('is-invalid');
                        }
                    } else {}

                } else {
                    var accessory = $("#accessory").val();
                    var accessory_value = $("#accessory_value").val();

                    if (accessory) {
                        if (accessory_value === '') {
                            $("#accessory_value").addClass('is-invalid');
                            return;
                        } else {
                            $("#accessory").removeClass('is-invalid');
                            $("#accessory_value").removeClass('is-invalid');
                        }
                    } else if (accessory_value) {
                        if (accessory === '') {
                            $("#accessory").addClass('is-invalid');
                            return;
                        } else {
                            $("#accessory").removeClass('is-invalid');
                            $("#accessory_value").removeClass('is-invalid');
                        }
                    } else {

                    }
                }
            }

            if (trans_no != '' &&
                vehicle_class != '' &&
                brand != '' &&
                year != '' &&
                model != '' &&
                mv_file != '' &&
                plate_no != '' &&
                engine_no != '' &&
                body_type != '' &&
                color != '' &&
                chasis_no != '' &&
                total_value != '' &&
                bodily_injury != '' &&
                property_damage != '') {

                var accessory = [];
                $('select[name="accessory[]"]').each(function () {
                    accessory.push(this.value);
                });

                var accessory_value = [];
                $('input[name="accessory_value[]"]').each(function () {
                    accessory_value.push(this.value);
                });

                jQuery.ajax({
                    url: "{{url('/quotation/get-a-quote/quotation')}}",
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
                        'vehicle_class': vehicle_class,
                        'brand': brand,
                        'year': year,
                        'model': model,
                        'mv_file': mv_file,
                        'plate_no' : plate_no,
                        'engine_no' : engine_no,
                        'body_type' : body_type,
                        'color' : color,
                        'chasis_no' : chasis_no,
                        'total_value': total_value,
                        'bodily_injury': bodily_injury,
                        'property_damage': property_damage,
                        'aon': aon,
                        'rscc': rscc,
                        'accessory': accessory,
                        'accessory_value': accessory_value,
                        'market_value': market_value,
                    },
                    success: function (response) {
                        if (response.message === 'success') {
                            window.location.href = "{{ url('/quotation/get-a-quote/quote/')}}" + '/{{$quotation->trans_no}}';
                        }
                    }
                })
            }
        });


    });
</script>
@endsection