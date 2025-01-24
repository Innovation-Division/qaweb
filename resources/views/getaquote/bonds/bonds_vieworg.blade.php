@extends('layouts.layout1')
@section('content')
    <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
    <style>
        #headingOne {
            background-color: #db3e8d;
            color: #000000;
        }

        .card-header {
            background-color: #db3e8d;
            color: white;
        }

        .fileUpload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .fileUpload {
            position: relative;
            overflow: hidden;
            height: 46px;
            font-size: 20px;
        }
        .fileUpload input.uploadlogo {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
            width: 100%;
            height: 46px;
        }
        .dataTables_info {
            display: none;
        }
    </style>
        <section class="banner banner-inquiry">
            <div class="container-fluid breadcrumb-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb rfs-1-5">
                        <li class="breadcrumb-item"><a href="{{ route('bondsquote') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bonds Quotation</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="content">
                    <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Bonds Quotation</h1>
                </div>
            </div>
        </section>


        @foreach ($cocogen_bonds_quote as $cocogen_bonds)
        <input id="transno" name="transno" type="hidden" value="{{$cocogen_bonds->id}}">
        <input id="strstatus" name="strstatus" type="hidden" value="{{$cocogen_bonds->status}}">
        <input id="strtype" name="strtype" type="hidden" value="{{\Auth::user()->accountType}}">
        <div class="main-content container">
            <div class="inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top-container">
                            <div class="col-md-12_ break-two"> <br> </div>
                            <div class="text-left">
                                <div class="table-data_ table-data1 table-wrapper">
                                    <div class="card">
                                        <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Transaction
                                            Details </h4> <br>

                                     <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Transaction No:</label>
                                                        <input type="text" class="form-control" id="qtransno"
                                                            name="qtransno" value="{{ $cocogen_bonds->transno }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Department</label>
                                                        <input type="text" class="form-control" id="department"
                                                            name="department" value="{{ $cocogen_bonds->department }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Status</label>
                                                        <input type="text" class="form-control" id="qstatus"
                                                            name="qstatus" value="{{ $cocogen_bonds->status }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Created</label>
                                                        <input type="text" class="form-control" id="dtcreated"
                                                            name="created_at" <?php  if($cocogen_bonds->created_at != '') {?>
                                                            value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->created_at)) }}"
                                                            <?php }?> readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Created By</label>
                                                        <input type="text" class="form-control" id="createdby"
                                                            name="createdby" value="{{ $cocogen_bonds->createdby }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">BM Reviewed</label>
                                                        <input type="text" class="form-control" id="createdby"
                                                            name="createdby" value="{{ $cocogen_bonds->createdby }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">BM Reviewed By</label>
                                                        <input type="text" class="form-control" id="dtbmreview"
                                                            name="dtbmreview" <?php  if($cocogen_bonds->dt_bmreviewed != '') {?>
                                                            value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_bmreviewed)) }}"
                                                            <?php }?> readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">For Sales Review</label>
                                                        <input type="text" class="form-control" id="dtsubmitted"
                                                            name="dtsubmitted" <?php  if($cocogen_bonds->dt_forsalesreview != '') {?>
                                                            value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_forsalesreview)) }}"
                                                            <?php }?> readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Forwarded By</label>
                                                        <input type="text" class="form-control" id="forsalesreviewby"
                                                            name="forsalesreviewby"
                                                            value="{{ $cocogen_bonds->forsalesreviewby }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Underwriting Reviewed</label>
                                                        <input type="text" class="form-control" id="dtuwreviewed"
                                                            name="dtuwreviewed" <?php  if($cocogen_bonds->dt_uwreviewed != '') {?>
                                                            value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_uwreviewed)) }}"
                                                            <?php }?> readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Reviewed By</label>
                                                        <input type="text" class="form-control" id="reviewedby"
                                                            name="reviewedby" value="{{ $cocogen_bonds->reviewedby }}"
                                                            readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Approved</label>
                                                        <input type="text" class="form-control" id="dtapproved"
                                                            name="dtapproved" <?php  if($cocogen_bonds->dt_approved != '') {?>
                                                            value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_approved)) }}"
                                                            <?php }?> readonly="true">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastName">Approved By</label>
                                                        <input type="text" class="form-control" id="approvedby"
                                                            name="approvedby" value="{{ $cocogen_bonds->approvedby }}"
                                                            readonly="true">
                                                    </div>
                                                    @if ($cocogen_bonds->status == 'Issued')
                                                        <div class="col-md-6 mb-3">
                                                            <label for="firstName">Issued</label>
                                                            <input type="text" class="form-control" id="dtissued"
                                                                name="dtissued" <?php  if($cocogen_bonds->dt_issued != '') {?>
                                                                value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_issued)) }}"
                                                                <?php }?> readonly="true">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="lastName">Issued By</label>
                                                            <input type="text" class="form-control" id="issuedby"
                                                                name="issuedby" value="{{ $cocogen_bonds->issuedby }}"
                                                                readonly="true">
                                                        </div>
                                                    @endif
                                                    @if ($cocogen_bonds->status == 'DNM')
                                                        <div class="col-md-6 mb-3">
                                                            <label for="firstName">DNM</label>
                                                            <input type="text" class="form-control" id="dtdnm"
                                                                name="dtdnm" <?php  if($cocogen_bonds->dt_dnm != '') {?>
                                                                value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_dnm)) }}"
                                                                <?php }?> readonly="true">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="lastName">DNM By</label>
                                                            <input type="text" class="form-control" id="dnmby"
                                                                name="dnmby" value="{{ $cocogen_bonds->dnmby }}"
                                                                readonly="true">
                                                        </div>
                                                    @endif
                                                    @if ($cocogen_bonds->status == 'Cancelled')
                                                        <div class="col-md-6 mb-3">
                                                            <label for="firstName">Cancelled</label>
                                                            <input type="text" class="form-control" id="dtcancelled"
                                                                name="dtcancelled" <?php  if($cocogen_bonds->dt_cancelled != '') {?>
                                                                value="{{ date('Y-m-d h:i A', strtotime($cocogen_bonds->dt_cancelled)) }}"
                                                                <?php }?> readonly="true">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="lastName">Cancelled By</label>
                                                            <input type="text" class="form-control" id="dnmby"
                                                                name="dnmby" value="{{ $cocogen_bonds->dnmby }}"
                                                                readonly="true">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
         @endforeach
          <!-- END OF THE FIRST PAGE -->
         <div class="col-md-12_ break-two"> <br> </div>
          <!-- START OF NATURE REQUEST -->

        <input type='hidden' name='transno' value='{{ $cocogen_bonds->id }}' id='transno'class='transno'>
             <!-- START OF NATURE REQUEST -->
  <!-- START OF NATURE REQUEST -->
  <div class="card">
    <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Nature Request </h4> <br>
    <div class="card-body">

        <form id="form_nature" name="form_nature" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
            </div>
            <input type='hidden' name='transno' value='{{ $cocogen_bonds->id }}' id='transno'class='transno'>
            <div class="clearfix"></div>

            <div class="form-group" style="padding-left:10px !important">
                <input id="copytransno" name="copytransno" type="text"
                    value="{{ !empty($transno) ? $transno : '' }}" class="hide">
                <label for="radioGroup1">Client:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="client" id="newclient" value="New"
                        <?php  if($cocogen_bonds->client_type=="New")  {?> checked="checked" <?php }?>>
                    <label class="form-check-label" for="newclient">New</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="client" id="oldClient" value="Old"
                        <?php  if($cocogen_bonds->client_type=="Old")  {?> checked="checked" <?php }?>>
                    <label class="form-check-label" for="oldClient">Old</label>
                </div>
                <span id='display_old'>
                    <label for="radioGroup2" style="padding-left:100px !important">Update KYC:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="updateKYC" id="updateKYCyes"
                            value="Yes" <?php  if($cocogen_bonds->update_kyc=="Yes")  {?> checked="checked" <?php }?>>
                        <label class="form-check-label" for="option3">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="updateKYC" id="updateKYCno"
                            value="No" <?php  if($cocogen_bonds->update_kyc=="No")  {?> checked="checked" <?php }?>>
                        <label class="form-check-label" for="option4">No</label>
                    </div>
            </div>
            </span>

            <div class="col-md-12_ break-two"> <br> </div>
            <div class="form-group">

                <div class="row" style="padding-left:10px !important">
                    <div class="col-md-4">
                        <label for="qrequest">Request:</label>
                        <div class="d-flex flex-wrap">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="qrequest" id="quoteNew"
                                    value="Quotation" <?php  if($cocogen_bonds->request_type=="Quotation")  {?> checked="checked" <?php }?>>
                                <label class="form-check-label" for="option5">Quotation</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="qrequest" id="issueNew"
                                    value="Issue Policy" <?php  if($cocogen_bonds->request_type=="Issue Policy")  {?> checked="checked" <?php }?>>
                                <label class="form-check-label" for="option6">Issue New Policy</label>
                            </div>
                            <span id='endorsement_show'>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="qrequest" id="endorsement"
                                    value="Issue Policy" <?php  if($cocogen_bonds->request_type=="endorsement")  {?> checked="checked" <?php }?>>
                                <label class="form-check-label" for="option7">Endorsement</label>
                            </div>
                        </span>
                        </div>
                    </div>

                    <div class="col-md-4" id='endoresePolNomodule'>
                            <label for="endorse">Endorse Policy No</label>
                            <input type="text" class="form-control" id='endoresePolNo' name="endoresePolNo" placeholder="Endorse Policy No." value="{{ $cocogen_bonds->endorse_no }}">

                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="acode">Agent Code:</label>
                        {{-- <select  id="acode" name="acode" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                            @if(!empty($cocogen_bonds->acode))
                                @foreach ($agent_list as $item)
                                <option value="{{ $cocogen_bonds->acode }}"> {{ $item->code  }}-{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select> --}}


                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="agent">Agent/Broker</label>
                        <input type="text" class="form-control" id="agent" name="agent"
                            placeholder="Agent/Broker*" value="{{ $cocogen_bonds->agent }}" <?php  if(\Auth::user()->accountType == 'Agent')  {?>
                            readonly <?php } ?>>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group principal_text_group">
                             <label for="principal">Principal</label>
                                <input name="principal" id="principal" type="text"   pattern="[a-zA-Z/.]+" class="form-control input-lg NoPaste personal_ifno_mobile principal" maxlength="100" value="{{ $cocogen_bonds->principal }}">
                            </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group principal_dropdown_group">
                        <label for="principal">Principal</label>
                        <input type="text" id="principal_show_list" class="form-control"  name="principal"  placeholder="Search..." autocomplete="off" value="{{ $cocogen_bonds->principal }}">
                        <div id="dropdownMenu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <!-- Dropdown items will be dynamically added here -->
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Address*" value="{{ $cocogen_bonds->address }}">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_incorp">Date of Incorporation</label>
                                <input type="text" class="form-control" id="date_incorp" name="date_incorp"
                                    placeholder="Date of Incorporation*" value="{{ $cocogen_bonds->date_incorp }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="company_tin">Company TIN</label>
                                <input type="text" class="form-control" id="company_tin" name="company_tin"
                                    placeholder="Company TIN*" value="{{ $cocogen_bonds->company_tin }}"
                                    onkeypress="return isNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person"
                                    placeholder="Contact Person*" value="{{ $cocogen_bonds->contact_person }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_no">Contact No</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no"
                                    placeholder="Contact No.*" value="{{ $cocogen_bonds->contact_no }}"
                                    onkeypress="return isNumber(event)">
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addres_info">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Email Address*" value="{{ $cocogen_bonds->email }}">
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-5" style="padding-left:0px">
                            <label for="oblige">Obligee</label>
                            <select id="obligee" name="obligee" class="form-control selectpicker obligee  address_mobile input-lg selectb5 principal_dropdown" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                                <option value="">- Select -</option>
                            </select>
                        </div>
                        <input type='hidden' name='obligee_hidden'id='obligee_hidden' class='obligee_hidden' value='{{ $cocogen_bonds->obligee }}'>
                        <div class="form-group col-md-4">
                            <label for="oblige">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input name="obligee2" id="obligee2" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" maxlength="100">
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="project">Project</label>
                        <input type="text" class="form-control" id="project" name="project"
                            placeholder="Project*" value="{{ $cocogen_bonds->project }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contract_price">Contract Price</label>
                        <input type="text" class="form-control" id="contract_price" name="contract_price"
                            placeholder="Contract Price*"
                            value="Php {{ number_format($cocogen_bonds->contract_price, 2) }}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="agent_broker">Undertaking</label>
                        <textarea rows="5" name="undertaking" id="undertaking" class="form-control required-entry"
                            placeholder="Undertaking*">{{ $cocogen_bonds->undertaking }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="agent_broker">Company Background</label>
                        <textarea rows="5" name="company_bgd" id="company_bgd" class="form-control required-entry"
                            placeholder="COMPANY BACKGROUND Brief description about the company (e.g. business address, nature of business)*">{{ $cocogen_bonds->company_bgd }}</textarea>
                    </div>
                </div>
            </div>
    </div>
    {{-- <div id='nature_req'>
            <div class="alert alert-success" id="bonds_01">
                <span id="bonds_mesage01"></span>
        </div>
        <div class="alert alert-danger " id="bonds_02" >
                <span id="bonds_mesage02"></span>
        </div>
    </div> --}}



    <div class="form-group">
        <div class="row">
            <div class="col-sm-12"  style="text-align: center;">
                <input type="submit" value="Save and Continue" formaction="{{ route('savequotebonds') }}"class="hide" />
                @if (($cocogen_bonds->status === 'Save' ||$cocogen_bonds->status == 'Submitted' || $cocogen_bonds->status == 'For Sales Review') && \Auth::user()->accountType == 'Sales')
                    <input type="submit" value="Save Changes" class="btn btn-primary"formaction="javascript:void(0)" id="sendform_update" name="sendform_update" />
                @endif
            </div>
        </div>
    </div>
</div>
</form>
<!-- END  NATURAL REQUEST -->

          <!-- END  NATURAL REQUEST -->
        <div class="col-md-12_ break-two"> <br> </div>

        <style>
            #ui-datepicker-div {
                position: relative;
                z-index: 9999 !important;
            }
        </style>

        <div class="col-md-12_ break-two"> <br> </div>
                <div class="card">
                    <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Bond Requirements </h4> <br>
                    <div class="card-body">

                        <div class="clearfix"></div>
                        <div id='bonds_req_first'>
                                <div class="alert alert-success" id="bonds_req01">
                                    <span id="req_bond"></span>
                            </div>
                            <div class="alert alert-danger d-none" id="bonds_req02">
                                    <span id="req_bond_failed"></span>
                            </div>
                        </div>

                <form  id="form_requirement" class='form_requirement' name="form_requirement" method="post" enctype="multipart/form-data" >
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type='hidden' name='transno' value='{{ $cocogen_bonds->id }}' id='transno'class='transno'>
                    @foreach ($cocogen_bonds_list as $cocogen_policy_account )
                    <div class="col-md-8">
                        <div class="form-group">

                            <label for="policy_type">Policy</label>
                            <input name="policy_type" id="policy_type" type="text" class=" policy_type form-control input-lg NoPaste personal_ifno_mobile" value='{{ $cocogen_policy_account->policy_type }}' readonly>
                        </div>
                </div>
                <div class="col-md-8">

                    <div class="form-group">
                        <label for="account_type">Account/Broker:</label>
                        <input name="account_type" id="account_type" type="text" class=" account_type form-control input-lg NoPaste personal_ifno_mobile"   value='{{ $cocogen_policy_account->account_type }}' readonly>
                    </div>
                </div>
                @endforeach
                @php
                    $cocogen_bonds_count = count($cocogen_bonds_list);
                @endphp

            @if ($cocogen_bonds_count == 0)
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="policy_type">Policy</label>
                            <select id="policy_type" name="policy_type" class="form-control policy_type selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-status_4thpage" data-size="10" data-live-search="true">
                                <option value="">- Select -</option>
                                <option value="main">Main</option>
                                <option value="extension">Extension</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="account_type">Account/Broker:</label>
                            <select id="account_type" name="account_type" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-status_4thpage" data-size="10" data-live-search="true">
                                <option value="">- Select -</option>
                                <option value="regular">Regular</option>
                                <option value="anchor_nonsmc">Anchor Non-SMC</option>
                                <option value="anchor_smc">Anchor SMC</option>
                                <option value="bdoi">BDOI</option>
                                <option value="security_services">Security Services</option>
                                <option value="ra_9184">RA 9184</option>
                                <option value="marsh_cola">Marsh Coca Cola</option>
                                <option value="marsh_regular">Marsh Regular</option>
                                <option value="megaworld">Megaworld</option>
                            </select>
                        </div>
                    </div>
                @endif

                    <div class="clearfix"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inceptdate">Bond Type</label>
                            <select  id="bond_req" name="bond_req" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                                <option value="">Bond Type *</option>

                        </select>
                        <input name="bond_req2" id="bond_req2" type="hidden" class="form-control input-lg NoPaste personal_ifno_mobile">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inceptdate">Inception Date</label>
                                <input name="date_bterm1" id="date_bterm1" type="text" class="date_bterm1 form-control input-lg NoPaste personal_ifno_mobile" style="z-index: 0 !important" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="annual_rate">Expiry Date</label>
                                <input name="date_bterm2" id="date_bterm2" type="text" class="date_bterm2 form-control input-lg NoPaste personal_ifno_mobile" style="z-index: 0 !important" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="agent">Bound Amount:</label>

                                <div class="input-group">
                                    <input name="bond_amount" id="bond_amount" type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  placeholder="Bond Amount*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" >
                                    <input name="bonds_contract" id="bonds_contract" type="hidden" class="form-control input-lg NoPaste personal_ifno_mobile" value='{{ number_format($cocogen_bonds->contract_price, 2) }}'>
                                    <span class="input-group-btn">
                                        <button type="submit" id="sendform_calc" name="sendform_calc" class="btn btn-primary" ><span class="fa fa-calculator" aria-hidden="true"></span> Compute</button>
                                    </span>
                                </div>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_person">Bond Required</label>
                                    <input name="bonds_requirement" id="bonds_requirement" type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  onkeypress="return isNumber(event)" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="annual_rate">Proposed Retention (%)</label>
                                    <input name="proposed_retention" id="proposed_retention" placeholder="" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="" onkeypress="return isNumber(event)">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="multiplier">Multiplier</label>
                                <input name="multiplier" id="multiplier" type="multiplier" class="form-control input-lg NoPaste personal_ifno_mobile" readonly='true'>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="annual_rate">Annual Rate (%)</label>
                                <input name="annual_rate_update_tarif" id="annual_rate_update_tarif" placeholder="*Annual Rate" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="*Annual Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true">
                                <input name="annual_rate" id="annual_rate" placeholder="*Annual Rate" type="text" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="*Annual Rate" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true" hidden>
                                <br>

                                <span class="text-danger">{{ $errors->first('annual_rate') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact_person">Annual Premium</label>
                                        <input name="annual_premium" id="annual_premium" type="annual_premium" class="form-control input-lg NoPaste personal_ifno_mobile" placeholder="Annual Premium"  readonly="true">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-sm-8" for="term_premium">Premium for the Term:</label>
                                        <div class="input-group">
                                            <input name="term_premium" id="term_premium" placeholder="Premium for the Term" type="text" class="form-control input-lg NoPaste personal_ifno_mobile"  onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)" readonly="true">
                                            <span class="input-group-btn">
                                                <button type="button" id="sendform_requirement" name="sendform_requirement" class="btn btn-primary">Add</button>
                                            </span>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('term_premium') }}</span>
                                    </div>
                                </div>
                                 <input type="hidden" name='totalanualprem' id='totalanualprem' class='totalanualprem'>
                                <input type="hidden" name='addnew' class='addnew '>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </form>

                <table id="requirement_table" class="table table-bordered requirement_table" style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bond Type</th>
                            <th>Bond Required</th>
                            <th>Proposed retention</th>
                            <th>Bond Amount</th>
                            <th>Annual Rate </th>
                            <th>Annual Premium</th>
                            <th>Bond Term</th>
                            <th>Term Premium</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div><!-- END OF BOND REQUIREMENT-->
        <div class="col-md-12_ break-two"> <br> </div>
          <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Financial Highlights </h4> <br>
            <div class="card-body">
                <form  id="financial_higlight" name="financial_higlight" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                    <input type="hidden" name='addnewfinance' id='addnewfinance' class='addnewfinance'>
                    @foreach ($cocogen_bonds_financial_years as $cocogen_bonds_financial )
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="year">Current FS</label>
                            <input name="financial_label" id="financial_label" type="text" class=" financial_label form-control input-lg NoPaste personal_ifno_mobile" value='{{ $cocogen_bonds_financial->financial_label  }}'>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3" style='margin-left: 15px; !important'>
                        <div class="form-group">
                            <label for="fin_amt">Previous FS</label>
                            <input name="financial_label2" id="financial_label2" type="text" class="form-control input-lg NoPaste personal_ifno_mobile financial_label2"  value='{{ $cocogen_bonds_financial->financial_label2  }}'>
                        </div>
                    </div>

                    <table id="financial_table" class="display" style="width:90%">
                        <thead>
                            <tr>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th><span  id='fist_label'></span></th>
                                <th><span id='second_label'></span></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Assets</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="asset" name="asset" value="{{ $cocogen_bonds_financial->assets  }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="asset_previous" name="asset_previous" value="{{ $cocogen_bonds_financial->assets_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Gross Income</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="gross_income" name="gross_income" value="{{ $cocogen_bonds_financial->gross_income  }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="gross_income_previous" name="gross_income_previous" value="{{ $cocogen_bonds_financial->gross_income_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Liabilities</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="liabilities" name="liabilities" value="{{ $cocogen_bonds_financial->liabilities }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="liabilities_previous" name="liabilities_previous" value="{{ $cocogen_bonds_financial->liabilities_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Net Income</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="net_income" name="net_income" value="{{ $cocogen_bonds_financial->net_income }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="net_income_previous" name="net_income_previous" value="{{ $cocogen_bonds_financial->net_income_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Networth</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="networth" name="networth" value="{{ $cocogen_bonds_financial->networth }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="networth_previous" name="networth_previous" value="{{ $cocogen_bonds_financial->networth_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Paid-up Capital</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="paid_up_capital" name="paid_up_capital" value="{{ $cocogen_bonds_financial->paid_up_capital }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="paid_up_capital_previous" name="paid_up_capital_previous" value="{{ $cocogen_bonds_financial->paid_up_capital_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Retained</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="retained" name="retained" value="{{ $cocogen_bonds_financial->retained }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class='form-control' id="retained_previous" name="retained_previous" value="{{ $cocogen_bonds_financial->retained_previous }}" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class='col-md-4' style='padding-left:50px !important'>
                        <button type="submit" id="sendform_financial" name="sendform_financial" class="btn btn-primary">Update</button>
                    </div>
                </form>

             <div class="col-md-12_ break-two"> <br> </div>
                <form id="form_financial3" name="form_financial3" method="post" enctype="multipart/form-data"
                action="javascript:void(0)">
                {{ csrf_field() }}
                <div class="col-md-12_ break-two"> <br> </div>
                <div class="col-md-12_ break-two"> <br> </div>
                <div class="row">
                    <h4 class="rfs-2-5 rfs-md-1-3" style="text-align: left;">Remarks
                    </h4> <br>
                </div>
                <div id="remarks-container">
                    <div id="financial_remarks" class="financial_remarks">
                        @foreach ($bonds_financial_remarks as $remarks)

                                <p> {{ $remarks->remarks }}</p>
                                <p style="font-size:9px;">{{ $remarks->username }} - {{ $remarks->created_at }}</p>
                                <hr>

                        @endforeach
                    </div>
                        <textarea class="form-control fin_remarks" name='fin_remarks' id="fin_remarks" rows="3"></textarea>
                            <div class="col-md-12_ break-two"> <br> </div>
                            <div class="col-md-12_ break-two"> <br> </div>
                        <button type="submit" id="sendform_financial3" name="sendform_financial3" class="btn btn-primary">Post
                            Remarks</button>
                    </form>
                </div>

            </div>
        </div><!-- END OF FINANCIAL HIGH LIGHT -->

        <div class="col-md-12_ break-two"> <br> </div>
<div class="table-data_ table-data1 table-wrapper">
    <div class="card">
        <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Historical Data of Issued Bonds </h4> <br>
        <span style='padding-left:20px !important'>(Figures for the TOTAL are formulated) / Figures to be inputted on this portion can be extracted from IT Reports </span>
        <div class="card-body">
        <form id="form_tsi" name="form_tsi" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="alert alert-success" id="response_result"role="alert">
                <span id='response'></span>
              </div>

    <table id="historicaldata" class="table" style="width:90%">
        <thead>
          <tr>
            <th>TSI Distribution</th>
            <th>In-force Policies</th>
            <th style="text-align:center">Bonds being applied now</th>
            <th>TOTAL</th>
            <th>Expired Policies</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label>TSI Retention Share</label></td>
            <td> <div class="form-group"><input type="text" name="in_force_policies" id="in_force_policies" class='form-control' value='{{  !empty($cocogen_bonds_tsi[0]->in_force_policies) ? $cocogen_bonds_tsi[0]->in_force_policies : 0  }}' onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"></div></td>
            <td> <div class="form-group"><input type="text" name="bonds_applied" id="bonds_applied" class='form-control'  onkeyup="javascript:this.value=Comma(this.value);"  value='{{ !empty($cocogen_bonds_tsi[0]->bonds_applied) ? $cocogen_bonds_tsi[0]->bonds_applied : 0 }}' readonly></div></td>
            <td> <div class="form-group"><input type="text" name="total" id="total" class='form-control'  onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->total) ? $cocogen_bonds_tsi[0]->total : 0 }}' readonly></div></td>
            <td> <div class="form-group"><input type="text" name="expired_policies" id="expired_policies" class='form-control'   onkeyup="javascript:this.value=Comma(this.value);"  onkeypress="return isNumber(event)" value='{{ !empty($cocogen_bonds_tsi[0]->expired_policies) ? $cocogen_bonds_tsi[0]->expired_policies : 0 }}'></div></td>

          </tr>
          <tr>
            <td><label>TSI Treaty Share</label></td>
            <td> <div class="form-group"><input type="text" name="in_force_policies1" id="in_force_policies1" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->in_force_policies1) ? $cocogen_bonds_tsi[0]->in_force_policies1 : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="bonds_applied1" id="bonds_applied1" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->bonds_applied1) ? $cocogen_bonds_tsi[0]->bonds_applied1 : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="total1" id="total1" class='form-control'  onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" readonly value='{{ !empty($cocogen_bonds_tsi[0]->total1) ? $cocogen_bonds_tsi[0]->total1 : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="expired_policies1" id="expired_policies1" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->expired_policies1) ? $cocogen_bonds_tsi[0]->expired_policies1 : 0 }}'></div></td>
          </tr>
          <tr>
            <td><label>Local Facultative</label></td>
            <td> <div class="form-group"><input type="text" name="in_force_policies2" id="in_force_policies2" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->in_force_policies) ? $cocogen_bonds_tsi[0]->in_force_policies : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="bonds_applied2" id="bonds_applied2" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->bonds_applied) ? $cocogen_bonds_tsi[0]->bonds_applied : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="total2" id="total2" class='form-control'  onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);"readonly value='{{ !empty($cocogen_bonds_tsi[0]->total) ? $cocogen_bonds_tsi[0]->total : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="expired_policies2" id="expired_policies2" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->expired_policies) ? $cocogen_bonds_tsi[0]->expired_policies : 0 }}'></div></td>
          </tr>
          <tr>
            <td><label>Total</label></td>
            <td> <div class="form-group"><input type="text" name="total_1" id="total_1" class='form-control' readonly  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->total) ? $cocogen_bonds_tsi[0]->total : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="total_2" id="total_2" class='form-control' readonly  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->total1) ? $cocogen_bonds_tsi[0]->total1 : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="total_3" id="total_3" class='form-control' onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" readonly value='{{ !empty($cocogen_bonds_tsi[0]->total2) ? $cocogen_bonds_tsi[0]->total2 : 0 }}'></div></td>
            <td> <div class="form-group"><input type="text" name="total_4" id="total_4" class='form-control' readonly  onkeyup="javascript:this.value=Comma(this.value);" value='{{ !empty($cocogen_bonds_tsi[0]->total3) ? $cocogen_bonds_tsi[0]->total3 : 0 }}'></div></td>
          </tr>
        </tbody>
      </table>
      <input type='hidden' name='update_tsi' id='update_tsi'>
      <input type='hidden' name='total_2_extra' id='total_2_extra'>
    <div class='col-md-4' style='padding-left:50px !important'>
        <button type="submit" id="sendform_distribution" name="sendform_distribution" class="btn btn-primary">Update</span></button>
        </div>
        <div class="col-md-12_ break-two"> <br> </div>
    </form>
    </div>
</div>



        <div class="col-md-12_ break-two"> <br> </div>
        <div class="card"><!--  Experiencet -->
                <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Loss Experience</h4> <br>
                <form id="form_lossxp" name="form_lossxp" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                <div class="card-body">
                    <div id='bond_loss_exp'>
                        <div class="alert alert-success" id="bonds_loss_exp01">
                            <span id="req_lossexp"></span>
                        </div>
                        <div class="alert alert-danger d-none" id="bonds_loss_exp02">
                                <span id="req_lossexp_failed"></span>
                        </div>
                    </div>
            <div class="form-group" id="div_lossxp" name="div_lossxp">
                <div class="col-md-8" style='padding:0px !important'>
                    <div class="form-group"  >
                        <label for="losssexperience">Loss Experience</label>
                        <input type="text" name="loss_xp" class="form-control col-md-8" id="loss_xp" placeholder="*Loss Expercience">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="submit" id="sendform_lossxp" name="sendform_lossxp" class="btn btn-primary btn-block"><span class="fa fa-plus"></span></button>
                    </div>
                </div>
            </div>
            </form>
            <table id="lossxp_table" class="table table-bordered lossxp_table" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Loss Expercience</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
                </div>
            </div><!--  END Experiencet -->
            <div class="col-md-12_ break-two"> <br> </div>
                <div class="card">

                    <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">List of Owner(s)</h4> <br>

                    <div class="card-body">
                        <form id="form_owner" name="form_owner" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                            <div class="form-group" id="div_owner" name="div_owner">
                            <div class="col-md-4" style='padding:0px !important'>
                                <div class="form-group">
                                    <label for="owner_name">Name</label>
                                    <input name="owner_name" id="owner_name" type="text" class="form-control input-lg owner_name" placeholder="*Name"> <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fin_year">Position</label>
                                    <input name="owner_post" id="owner_post" type="text" class="form-control input-lg NoPaste " maxlength="100" placeholder="*Position" autocomplete="off"> <span class="text-danger"></span>
                                </div>
                            </div>
                            <input type='hidden' name='list_owner' id='list_owner' class='list_owner'>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <button type="submit" id="sendform_owner" name="sendform_owner" class="btn btn-primary btn-block"><span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <table id="owner_table" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div><!-- END -->
                <div class="col-md-12_ break-two"> <br> </div>
                <div class="card">
                    <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">COLLATERAL(S)</h4>
                    <br>
                    <div class="card-body">
                        <form id="form_collateral" name="form_collateral" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                        <div id='bond_collateral'>
                            <div class="alert alert-success" id="bond_collateral01">
                                <span id="req_collateral"></span>
                            </div>
                            <div class="alert alert-danger d-none" id="bond_collateral02">
                                    <span id="req_collateral_failed"></span>
                            </div>
                        </div>
            <div class="form-group" id="div_collateral" name="div_collateral">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fin_year">Type</label>
                        <input type="text" name="collateral_type" class="form-control collateral_type" id="collateral_type" placeholder="*Type">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fin_year">Item</label>
                        <input name="collateral_item" id="collateral_item" type="text" class="form-control input-lg collateral_item" maxlength="100" placeholder="*Item" autocomplete="off"> <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="collateral_values">Value</label>
                        <input type="text" class="form-control collateral_value" id="collateral_value" name="collateral_value" placeholder="*Value*" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button type="submit" id="sendform_collateral" name="sendform_collateral" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                    </div>
                </div>
            </div>
            </form>
                    <table id="collateral_table" class="table table-bordered collateral_table" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Type</th>
                                <th>Item</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div> <!--END COLATERAL -->

                <div class="col-md-12_ break-two"> <br> </div>
                    <div class="table-data_ table-data1 table-wrapper">
                        <div class="card">
                            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">PRINCIPAL SIGNATORY</h4> <br>
                            <div class="card-body">
                                <form id="form_principal" name="form_principal" method="post" enctype="multipart/form-data" action="javascript:void(0)">

                                <div id='bond_principal'>
                                    <div class="alert alert-success" id="bond_principal01">
                                        <span id="req_principal"></span>
                                    </div>
                                    <div class="alert alert-danger d-none" id="bond_principal02">
                                            <span id="req_principal_failed"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="div_principal" name="div_principal">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fin_year">ID Type</label>
                                        <input type="text" name="id_type" class="form-control id_type" id="id_type" placeholder="*ID Type">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fin_year">ID No</label>
                                        <input type="text" name="id_no" class="form-control id_no" id="id_no" placeholder="*ID No.">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="collateral_values">Name</label>
                                        <input type="text" name="principal_name" class="form-control principal_name" id="principal_name" placeholder="*Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="collateral_values">Position</label>
                                        <input type="text" name="principal_post" class="form-control principal_post" id="principal_post" placeholder="*Position">
                                    </div>
                                </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" id="sendform_principal" name="sendform_principal" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                        </div>
                    </div>
                </div>
                </form>
                    <input type='hidden' name='principal_sig' id='principal_sig' class='principal_sig' value='1'>
                    <table id="principal_table" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ID Type</th>
                                <th>ID No.</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
                    <div class="col-md-12_ break-two"> <br> </div>
                    <div class="card">
                        <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">CO-SIGNER(S)
                        </h4> <br>
                        <div class="card-body">
                            <form id="form_cosigner" name="form_cosigner" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                            <div id='bond_cosigner'>
                                <div class="alert alert-success" id="bond_cosigner01">
                                    <span id="req_cosigner"></span>
                                </div>
                                <div class="alert alert-danger d-none" id="bond_cosigner02">
                                        <span id="req_cosigner_failed"></span>
                                </div>
                            </div>
                    <div class="form-group" id="div_cosigner" name="div_cosigner">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">ID Type</label>
                            <input type="text" name="cosigner_id_type" class="form-control" id="cosigner_id_type" placeholder="*ID Type">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">ID No</label>
                            <input type="text" name="cosigner_id_no" class="form-control" id="cosigner_id_no" placeholder="*ID No.">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">Name</label>
                            <input type="text" name="cosigner_name" class="form-control" id="cosigner_name" placeholder="*Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="collateral_values">Position</label>
                            <input type="text" name="cosigner_position" class="form-control" id="cosigner_position" placeholder="*Position">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">Address</label>
                            <input type="text" name="cosigner_property" class="form-control" id="cosigner_property" placeholder="*Address">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">Property TCT No.</label>
                            <input type="text" name="cosigner_property_tct" class="form-control" id="cosigner_property_tct" placeholder="*Property TCT No.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">Property Location</label>
                            <input type="text" name="cosigner_property_location" class="form-control" id="cosigner_property_location" placeholder="*Property Location">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fin_year">Property Size</label>
                            <input type="text" name="cosigner_property_size" class="form-control" id="cosigner_property_size" placeholder="*Property Size" onkeypress="return isNumber(event)">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="collateral_values">Assessed Value/Market Value</label>
                            <input type="text" name="cosigner_amt" class="form-control" id="cosigner_amt" placeholder="*Amount" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"><span class="text-danger">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" id="sendform_signer" name="sendform_signer" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                        </div>
                    </div>
                </div>
                </form>
                            <table id="cosigner_table" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID Type</th>
                                        <th>ID No.</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Address</th>
                                        <th>Property TCT No.</th>
                                        <th>Property Location</th>
                                        <th>Property Size</th>
                                        <th>Assessed Value/Market Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            </table>
                            </div>
                        </div><!-- END COSIGNER -->
                        <div class="col-md-12_ break-two"> <br> </div>
                        <div class="card">
                                <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">CORPORATE GUARANTOR</h4> <br>
                                <div class="card-body">
                        <form id="form_guarantee" name="form_guarantee" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                                    <div id='bond_corporate'>
                                        <div class="alert alert-success" id="bond_corporate01">
                                            <span id="req_corporate"></span>
                                        </div>
                                        <div class="alert alert-danger d-none" id="bond_corporate02">
                                                <span id="req_corporate_failed"></span>
                                        </div>
                                    </div>
                        <div class="form-group" id="div_corporate" name="div_corporate">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fin_year">ID Type</label>
                                    <input type="text" name="id_type2" class="form-control" id="id_type2" placeholder="*ID Type">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fin_year">ID No.</label>
                                    <input type="text" name="id_no2" class="form-control" id="id_no2" placeholder="*ID No.">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="collateral_values">Name</label>
                                    <input type="text" name="guarantee_name" class="form-control" id="guarantee_name" placeholder="*Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="collateral_values">Designation</label>
                                    <input type="text" name="guarantee_post" class="form-control" id="guarantee_post" placeholder="*Designation">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                   <br>
                                    <button type="submit" id="sendform_guarantee" name="sendform_guarantee" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>

                        </form>
                                <table id="guarantee_table" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>ID Type</th>
                                            <th>ID No.</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div><!-- END GUARANTEE -->
                        <div class="col-md-12_ break-two"> <br> </div>
                        <div class="card">
                            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">LIST OF COMPLETED PROJECT(S)</h4> <br>
                            <div class="card-body">
                                <form id="form_project1" name="form_project1" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                                <div id='bond_completeproject'>
                                <div class="alert alert-success" id="bond_completeproject01">
                                    <span id="req_complete_proj"></span>
                                </div>
                                <div class="alert alert-danger d-none" id="bond_completeproject02">
                                        <span id="req_complete_proj_failed"></span>
                                </div>
                                </div>
                                <div class="form-group" id="div_complete_project" name="div_complete_project">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="fin_year">Project Name</label>
                                        <textarea class="form-control project_name" name="project_name" id="project_name" rows="3"  placeholder="*Project Name"></textarea>
                                    </div>
                                </div>
                                    <div class="col-md-12_ break-two"> <br> </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>&nbsp;</label>
                                         <button type="submit" id="sendform_project1" name="sendform_project1" class="btn btn-primary"><span class="fa fa-plus"></span></button>
                                    </div>
                                </div>
                                </div>
                            </form>
                                <table id="project1_table" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Project</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div><!-- END  COMPLETED PROJECt -->
                        <div class="col-md-12_ break-two"> <br> </div>
                        <div class="card">
                            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">LIST OF ON-GOING PROJECT(S)</h4> <br>
                            <div class="card-body">
                                <table id="project2_table" class="table table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Project</th>
                                        </tr>
                                    </thead>
                                    @foreach ($cocogen_bonds_projects2 as $projecta)
                                        <tr>
                                            <td>{{ $projecta->project_name2 }}</td>

                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                        </div><!-- END  ON-GOING PROJECT -->
                        <div class="col-md-12_ break-two"> <br> </div>
                        <div class="card">
                            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;"> ATTACHMENT(S)</h4> <br>
                            <div class="card-body">
                                <div class="card-body">
                                    <form id="form_attachment" name="form_attachment" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                                    <div id='bond_attachment'>
                                        <div class="alert alert-success" id="bond_attachment01">
                                            <span id="req_attach"></span>
                                        </div>
                                        <div class="alert alert-danger d-none" id="bond_attachment02">
                                                <span id="req_attach_failed"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="div_attachment" name="div_attachment">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="fileUpload btn btn-secondary-light" style="width:110px !important">
                                                <input type="file" class="required-entry" name="filename" id="filename" accept="application/msword, application/pdf"  onchange="showFileName()">Upload
                                            </div>
                                        </div>
                                        <div id="fileInfo"></div>
                                    </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" id="sendform_attachment" name="sendform_attachment" class="btn btn-primary"><span class="fa fa-plus"></span></button>

                                    </div>
                                </div>
                            </div>
                            </form>

                            <table id="attachment_table" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Filename</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                            </div>
                        </div><!-- END ATTACHEMNT -->
                        <div class="col-md-12_ break-two"> <br> </div>
                        <div class="card">
                            <h4 class="rfs-2-5 rfs-md-1-3 card-header"
                                style="text-align: left;">Change Log/s</h4> <br>
                            <div class="card-body">
                                <table id="change_table" class="table table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                            <th>User</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    @foreach ($cocogen_bonds_historylogs as $history)
                                        <tr>
                                            <td>{{ $history->category }}</td>
                                            <td>{{ $history->description }}</td>
                                            <td>{{ $history->action }}</td>
                                            <td>{{ $history->user }}</td>
                                            <td>{{ $history->created_at }}</td>

                                        </tr>
                                    @endforeach
                                </table>
                                <form id="form_comment" name="form_comment" method="post"  enctype="multipart/form-data"action="javascript:void(0)">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <h4 class="rfs-2-5 rfs-md-1-3"
                                                style="text-align: left;">Comments
                                            </h4> <br>
                                        </div>
                                        <div id="remarks-container">
                                            <div id="bond_comment" class="bond_comment">
                                            @foreach ($cocogen_bonds_comment as $comment)

                                                    <p> {{ $comment->remarks }}</p>
                                                    <p style="font-size:9px;">
                                                        {{ $comment->username }} -
                                                        {{ $comment->created_at }}</p>
                                                    <hr>

                                            @endforeach
                                            <textarea class="form-control txt_comment" name='txt_comment' id="txt_comment" rows="3"></textarea>
                                                <div class="col-md-12_ break-two"> <br> </div>
                                            <div class='col-md-4'>
                                                <button type="submit" id="sendform_comment" name="sendform_comment" class="btn btn-primary">Post Remarks</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-12_ break-two"> <br> </div>
                                </form>
                                <div class="col-md-12_ break-two"> <br> </div>
                            </div>
                        </div> <!-- END comment-->
                    </div>
                        <div class="col-md-12_ break-two"> <br> </div>
                        @foreach ($cocogen_bonds_quote as $cocogen_bonds)
                        <div class="form-group">
                            <div class="row">
                                <div>
                                    <div class="panel-body">
                                        <form id="form_sendbomd" name="form_sendbomd" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                                            {{ csrf_field() }}
                                            <div class="alert alert-success d-none"
                                                id="msg_div12" hidden>
                                                <span id="res_message12"></span>
                                            </div>
                                            <div class="alert alert-danger d-none"
                                                id="alert_msg12" hidden>
                                                <span id="res_error12"></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-12" align="center">
                                                        @if (($cocogen_bonds->status == 'Save' || $cocogen_bonds->status == 'For Sales Review') && \Auth::user()->accountType == 'Sales')
                                                            <input type="submit" value="Submit" id="sendform_bonds" name="sendform_bonds" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif
                                                        @if ($cocogen_bonds->status == 'For BM Review' && \Auth::user()->accountType == 'Manager' && $cocogen_bonds->sum_insured > \Auth::user()->limit_to)
                                                            <input type="submit" value="Verify" id="sendform_manager" name="sendform_manager" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif
                                                        @if ($cocogen_bonds->status != 'Approved' && $cocogen_bonds->status != 'Issued' && $cocogen_bonds->status != 'DNM' && \Auth::user()->accountType == 'Sales')
                                                            <input type="submit" value="Cancel" id="sendform_cancel" name="sendform_cancel" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif

                                                        @if (
                                                            ($cocogen_bonds->status == 'Submitted' || $cocogen_bonds->status == 'UW Reviewed' || $cocogen_bonds->status == 'Approved' || $cocogen_bonds->status == 'For BM Review') && (\Auth::user()->accountType == 'Underwriter' ||\Auth::user()->accountType == 'Manager' ||\Auth::user()->accountType == 'Approver'))
                                                            <input type="submit" value="For Sales Review" id="sendform_sales" name="sendform_sales" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif

                                                        @if ($cocogen_bonds->status == 'Submitted' && \Auth::user()->accountType == 'Underwriter')
                                                            <input type="submit" value="Underwriter Committee Review" id="sendform_review" name="sendform_review" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif

                                                        @if ($cocogen_bonds->status == 'Approved' && \Auth::user()->accountType == 'Sales')
                                                            <input type="submit" avalue="Issued" id="sendform_issue" name="sendform_issue" class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif

                                                        @if ($cocogen_bonds->status == 'Approved' && \Auth::user()->accountType == 'Sales')
                                                            <input type="submit" value="DNM" id="sendform_dnm" name="sendform_dnm"  class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif
                                                        @if($heirs == 1)
                                                        ($cocogen_bonds->status == 'UW Reviewed' && \Auth::user()->accountType == 'Approver' && $cocogen_bonds->sum_insured <= \Auth::user()->limit_heirs) || ($cocogen_bonds->status == 'For BM Review' &&\Auth::user()->accountType == 'Manager' && $cocogen_bonds->sum_insured <= \Auth::user()->limit_heirs) || \Auth::user()->accountType == 'Underwriter' && $cocogen_bonds->sum_insured <= \Auth::user()->limit_heirs)
                                                        <input type="submit"value="Approve" id="sendform_approve" name="sendform_approve"class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @else
                                                        @if (
                                                            ($cocogen_bonds->status == 'UW Reviewed' && \Auth::user()->accountType == 'Approver' && $cocogen_bonds->sum_insured <= \Auth::user()->limit_to) || ($cocogen_bonds->status == 'For BM Review' &&\Auth::user()->accountType == 'Manager' && $cocogen_bonds->sum_insured <= \Auth::user()->limit_to) || \Auth::user()->accountType == 'Underwriter' && $cocogen_bonds->sum_insured <= \Auth::user()->limit_to)
                                                            <input type="submit"value="Approve" id="sendform_approve" name="sendform_approve"class="btn btn-primary" style="min-width: 100px; margin-top:10px" formaction="javascript:void(0)" />
                                                        @endif
                                                        @endif

                                                        <a id="sendform_download" href="{{ url('/get-quote/bonds-quoteapproval') }}/{{ $cocogen_bonds->id }}" target="_blank" class="btn btn-primary" style="min-width: 100px; margin-top: 10px">Download</a>
                                                        <a href="{{ route('bondsquote') }}" class="btn btn-primary" style="min-width: 100px; margin-top: 10px">Back</a>

                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach




    </div><!-- Inner -->
</div><!-- LAST -->
<div class="modal fade in" id="updateranual" tabindex="-1" role="dialog" aria-labelledby="updateranual" aria-hidden="false" style="display: block;">
    <div class="modal-backdrop fade in"></div>
    <div class="modal-dialog modal-lg" role="document">
        <div style='background-color:white;color:black'>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="color:black">Update Rate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="passtocontroller" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field3">Bond Required</label>
                            <input type="hidden" id="field1" name='id' class="form-control" readonly>
                            <input type="text" id="field3" name='bond_req' class="form-control"readonly>
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field2">Bond Type</label>
                            <input type="text" id="field2" name='bond_type' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field5">Bond Amount</label>
                            <input type="text" id="field5" name='bond_amt_req' class="form-control" readonly>
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field4">Proposed Retention</label>
                            <input type="text" id="field4" name='prop_ret' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field7">Annual Premium</label>
                            <input type="text" id="field7" name='bonds_annual_prem_req' class="form-control" readonly>
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                            <label for="field6">Annual Rate</label>
                            <input type="text" id="field6" name='bond_annual_rate_req' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="input-rows" style="display: flex;">
                        <div class="input-column" style="width: 50%; padding: 10px;">
                        <label for="field8">Bond Term</label>
                            <input type="text" id="field8"  name='bonds_term_req' class="form-control" readonly>
                        </div>
                        <div class="input-column" style="width: 50%; padding: 10px;">
                        <label for="field9">Term Premium</label>
                            <input type="text" id="field9" name='bonds_prem_req' class="form-control field9"   onkeypress="return isNumber(event)">
                        </div>
                    </div>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  id='get_value_controller' class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>




<script>
 $(document).ready(function() {
    $('#get_value_controller').click(function() {
        // Get form data
        var formData = $('#passtocontroller').serialize();

        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        // Make an AJAX request to submit the form data
        $.ajax({
            type: 'POST',
            url: "{{ url('/get-quote/bondsgetquoterequirementupdate') }}", // Replace with your actual URL
            data: {
                value: formData,
                _token: csrf_token
            },
            success: function(response) {
                // Handle success response
                jQuery('#updateranual').hide();
                var table = jQuery('#requirement_table').DataTable();
                table.ajax.reload();
            },
            error: function(error) {
                // Handle error response
                console.error("Error submitting form:", error);
            }
        });
    });
});


$(document).ready(function() {
  jQuery.noConflict();
  $('#updateranual').hide();
  // Get the initial value of the account_type element
  var accountTypeValue = $('#account_type').val();
  var policy_type = $('#policy_type').val();

  // Convert the value to uppercase
  var modifiedValue = accountTypeValue.toUpperCase().replace(/[^a-zA-Z0-9]+/g, ' ');
  var policy_type = policy_type.toUpperCase().replace(/[^a-zA-Z0-9]+/g, ' ');

  // Set the modified value back to the account_type element
  $('#account_type').val(modifiedValue);
  $('#policy_type').val(policy_type);

  // Event listener for when the first dropdown menu selection changes
  $('#account_type').change(function() {
    var selectedValue = $(this).val();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
      url: "{{ url('/get-quote/accountbroker') }}",
      method: 'POST',
      data: {
        value: selectedValue,
        _token: csrf_token
      },
      success: function(data) {
        $("#bond_req").prop("disabled", false);
        $('#bond_req').empty();
        $('#bond_req').append($('<option>', {
          value: '',
          text: '*Bonds Type'
        }));

        $.each(data, function(key, value) {
          $('#bond_req').append($('<option>', {
            value: value.bond_req,
            text: value.bond_req
          }));
        });

        $('#bond_req').selectpicker('refresh');
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });

  // Trigger the initial AJAX request on page load
  $('#account_type').trigger('change');

  // Update the value of bond_req2 based on bond_req
  $("#bond_req").on("change", function() {
    $("#bond_req2").val($(this).val());
  });
});
    </script>
<script>


        jQuery(document).on('click', '#sendform_requirement', function() {
            jQuery.noConflict();
            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var errornumber = 0;

            if ($('#bonds_requirement').val() == "") {
                $('#bonds_requirement').fieldErrorState();
                errornumber = 1;
            } else {
                $('#bonds_requirement').fieldSuccessState();
            }

            if ($('#proposed_retention').val() == "") {

                $('#proposed_retention').fieldErrorState();
                errornumber = 1;
            } else {
                $('#proposed_retention').fieldSuccessState();
            }
            if (errornumber == 1) {
                return false;
            } else {
                $('#sendform_requirement').html('Saving...');

                /* Submit form data using ajax*/
                jQuery.ajax({
                    url: "{{ url('/get-quote/addbondsquoterequirement') }}",
                    method: "POST",
                    data: $('#form_requirement').serialize() + "&trans_id=" + trans_id +
                        "&_token=" + csrf_token,
                    dataType: 'json',
                    success: function(response) {
                            $('#contract_price').prop('readonly', true);
                            $("#policy_type").prop("disabled", true);
                            $("#account_type").prop("disabled", true);
                            // $("#bond_req").prop("disabled", true);

                            jQuery('#date_bterm1').val('');
                            jQuery('#date_bterm2').val('');
                            jQuery('#bond_amount').val('');
                            jQuery('#bonds_requirement').val('');
                            jQuery('#proposed_retention').val('');
                            jQuery('#multiplier').val('');
                            jQuery('#annual_rate').val('');
                            jQuery('#annual_rate_update_tarif').val('');

                            jQuery('#annual_premium').val('');
                            jQuery('#term_premium').val('');



                        var checkVal = $('.addnew').val(1);
                        var trans_id = $("input[name='transno']").val();

                        if ($.isEmptyObject(response.error)) {


                            $('#alert_msg11').hide();
                            $('#sendform_requirement').html('Add');

                            $('#bonds_req01').show();
                            $('#req_bond').text(response.success);
                            $('#msg_div11').removeClass('d-none');
                            // $('#form_requirement').trigger("reset");

                            if (checkVal === '') {
                                var table = jQuery('#requirement_table').DataTable({
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    responsive: true,
                                    processing: true,
                                    serverSide: true,
                                    ajax: {
                                        url: "{{ url('/get-quote/getbondsquoterequirement') }}" +
                                            "/" + trans_id,
                                        error: function(xhr, error, thrown) {
                                            console.log('cocogen.com');

                                        }
                                    },
                                    columns: [{
                                            data: 'id',
                                            name: 'id',
                                            visible: false
                                        },
                                        {
                                            data: 'bond_type',
                                            name: 'bond_type'
                                        },
                                        {
                                            data: 'bonds_requirement',
                                            name: 'bonds_requirement',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data) + '%';
                                            }
                                        },
                                        {
                                            data: 'proposed_retention',
                                            name: 'proposed_retention',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data) + '%';
                                            }
                                        },
                                        {
                                            data: 'bond_amt',
                                            name: 'bond_amt',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data)
                                                    .toFixed(2).replace(
                                                        /\d(?=(\d{3})+\.)/g,
                                                        '$&,');
                                            }
                                        },
                                        {
                                            data: 'annual_rate',
                                            name: 'annual_rate',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data) + '%';
                                            }
                                        },
                                        {
                                            data: 'annual_premium',
                                            name: 'annual_premium',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data)
                                                    .toFixed(2).replace(
                                                        /\d(?=(\d{3})+\.)/g,
                                                        '$&,');
                                            }
                                        },
                                        {
                                            data: 'bond_term',
                                            name: 'bond_term'
                                        },
                                        {
                                            data: 'term_premium',
                                            name: 'term_premium',
                                            render: function(data, type, row) {
                                                return '' + parseFloat(data)
                                                    .toFixed(2).replace(
                                                        /\d(?=(\d{3})+\.)/g,
                                                        '$&,');
                                            }
                                        },
                                        {
                                            data: 'action',
                                            name: 'action',
                                            orderable: false
                                        },
                                    ],
                                    fnInfoCallback: function(settings, start, end,
                                        max, total, pre) {
                                        if (total == 0) {
                                            return "No data available";
                                        }
                                        return "Showing " + start + " to " +
                                            end + " of " + total + " entries";
                                    }

                                });
                                var checkVal = $('.addnew').val('1');


                            } else {

                                var table = jQuery('#requirement_table').DataTable();
                                table.ajax.reload();
                                var checkVal = $('.addnew').val('1');

                            }

                            $("#sendform_requirement").prop("disabled", true);

                        } else {
                            $("#sendform_requirement").prop("disabled", true);
                            $('#msg_div11').hide();
                            $('#sendform_requirement').html('Add');
                            $('#bonds_req02').show();
                            $('#req_bond_failed').text(response.error);


                        }

                        setTimeout(function() {
                            $('#bonds_req_first').hide();

                        }, 10000);

                    }
                });
            }

        });


    </script>
@include('getaquote.bonds.bonds_view_js')
@endsection
