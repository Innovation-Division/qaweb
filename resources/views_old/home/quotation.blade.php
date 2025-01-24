@extends('layouts.epartner')
@section('main-content')
@if(session('success'))
    <script>
         $(document).ready(function () {
                toastr.success('{{session("success")}}','Success');
            });
    </script>
@endif
<style type="text/css">
    .title {
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }

    .epolicy-card-border {
        border-radius: 7px !important;
    }

    .epolicy-button {
        padding: 14px 24px;
        border-radius: 12px;
        border: none;
        color: white;
    }

    @media (min-width: 992px) {
        .epolicy-button {
            padding: 14px 16px;
        }
    }

    .epolicy-btn-secondary {
        background: grey;
        color: #ffffff;
    }

    .epolicy-search {
        padding: 10px 30px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        width: 100%;
    }

    .epolicy-search-input {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #EEEEEE;
        border-radius: 12px;
        font-size: 16px;
        background-color: white;
        background-position: 24px 11px;
        background-repeat: no-repeat;
        background-size: 18px;
        padding: 7px 20px 7px 55px;
        background-image: url(https://uxwing.com/wp-content/themes/uxwing/download/user-interface/search-icon.png);
    }

    .epolicy-nav {
        color: black !important;

    }

    .epolicy-nav li {

        margin: 10px 25px !important;
        font-weight: bold;
    }

    .epolicy-nav li a {
        color: grey !important;
    }

    .epolicy-nav li:first-child {
        color: black;
        margin: 10px 0px !important;
    }

    .epolicy-nav>li.active>a {
        font-weight: 700 !important;
        background: #E0F5F5 !important;
        color: black !important;
        border-radius: 18px;
        padding: 9px 55px;
    }

    .epolicy-col {
        border-top: 1px solid #d3d3d3;
        border-bottom: 1px solid #d3d3d3;
    }

    .epolicy-nav>li a:hover {
        border-radius: 18px;
        color: black;
        background: none;
    }

    .epolicy-button-success {
        background: #008080 !important;
    }

    .epolicy-button-secondary {
        background: #60B3B3 !important;
    }

    .epolicy-button-secondary:hover {
        background: #008080 !important;
    }

    .epolicy-button>svg {
        fill: #ffffff !important;
    }

    .epolicy-button-success:hover {
        background: #60B3B3 !important;
    }

    .pagination-active {
        background: #E0F5F5 !important;
        color: black !important;
        font-weight: 700;
    }
    @media (max-width:800px) {
            .epolicy-button
            {
                width: 49%;
                padding: 5px 11px;
                height: 49px;;
            }
        }
</style>

<div>
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card epolicy-card-border">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                <p class="title">Quotations</p>
                            </div>
                            <div class="col-lg-4 text-end">
                                <button class="epolicy-button epolicy-button-secondary" id="batchUpload"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-upload" viewBox="0 0 18 20">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                    </svg> Batch Upload</button>
                                <button class="epolicy-button epolicy-button-success getAQuote"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor"
                                        class="bi bi-plus-lg" viewBox="0 0 18 20">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>Get a
                                    quote</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding-bottom: 0px !important;">
                        <div class="row">
                            <form id="filterQuotation" >
                                @csrf
                                {{method_field('GET')}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p style="font-size: 18px; font-weight: bold;">All quotations</p>
                                    </div>
                                    <div class="col-lg-10 mb-3">
                                        <input type="text" name="q" id="q" placeholder="Search quotations..."
                                            class="epolicy-search-input" value="{{$searchText}}">
                                    </div>
                                    <div class="col-lg-2 mb-3">
                                        <button id="search_btn"  name="search_btn" class="epolicy-search" type="button">Filter</button>
                                    </div>
                                    <div class="col-lg-12 epolicy-col p-2">
                                        <ul class="nav nav-pills epolicy-nav">
                                            <li role="presentation" class="{{$selectQuotation === '' ? 'active' : ''}}">
                                                <a href="javascript:void(0)" class="btnSelectQuotation"
                                                    data-value="">All</a></li>
                                            <li role="presentation"
                                                class="{{$selectQuotation === 'Quoted' ? 'active' : ''}}">
                                                <a href="javascript:void(0)" class="btnSelectQuotation"
                                                    data-value="Quoted">Quoted({{$quoted}})</a></li>
                                            <li role="presentation"
                                                class="{{$selectQuotation === 'Processing' ? 'active' : ''}}"><a
                                                    href="javascript:void(0)" class="btnSelectQuotation"
                                                    data-value="Processing">Processing({{$proccessing}})</a></li>
                                            <li role="presentation"
                                                class="{{$selectQuotation === 'Drafts' ? 'active' : ''}}">
                                                <a href="javascript:void(0)" class="btnSelectQuotation"
                                                    data-value="Drafts">Drafts({{$drafts}})</a></li>
                                            <li role="presentation"
                                                class="{{$selectQuotation === 'Issued' ? 'active' : ''}}">
                                                <a href="javascript:void(0)" class="btnSelectQuotation"
                                                    data-value="Issued">Issued({{$issued}})</a></li>
                                            <li role="presentation"
                                                class="{{$selectQuotation === 'Incomplete' ? 'active' : ''}}">
                                                <a href="javascript:void(0)" class="btnSelectQuotation"
                                                    data-value="Incomplete">Incomplete({{$incomplete}})</a></li>
                                            <input type="hidden" class="selectQuotation" id="selectQuotation"
                                                name="selectQuotation">
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {{ csrf_field() }}
                <div class="card">
                    <div class="table-responsive">
                        <table id="mypolicy" class="table card-table table-vcenter text-nowrap datatable"
                            style="width: 100%;">
                            @if(count($quotations)>0)

                            <thead>
                                <tr>
                                    <th>Quotation No.</th>
                                    <th>Policy No.</th>
                                    <th>Assured name</th>
                                    <th>Created date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quotations as $quotation)
                  
                                <tr>
                                    <td>
                                        @if($quotation->reqtype === 'B')
                                            @if($quotation->status === 'Drafts' || $quotation->status === 'Quoted')
                                                <a href="{{ url('/quotation/get-a-quote/quote/batch')}}/{{$quotation->trans_no}}" style="font-weight: 700; color: black;">{{$quotation->trans_no }}</a>
                                            @else
                                                <a href="{{ url('/quotation/view/batch')}}/{{$quotation->trans_no}}"  style="font-weight: 700; color: black;">{{$quotation->trans_no }}</a>
                                            @endif
                                        @else
                                            @if($quotation->status === 'Drafts')
                                            <a href="{{ url('/quotation/get-a-quote/edit-first-page')}}/{{$quotation->trans_no}}" style="font-weight: 700; color: black;">{{$quotation->trans_no }}</a>
                                            @elseif($quotation->status === 'Quoted')
                                                <a href="{{ url('/quotation/get-a-quote/quote')}}/{{$quotation->trans_no}}" style="font-weight: 700; color: black;">{{$quotation->trans_no }}</a>
                                            @elseif($quotation->status === 'Processing' || $quotation->status === 'Issued')
                                            <a href="{{ url('/quotation/view')}}/{{$quotation->trans_no}}"
                                            style="font-weight: 700; color: black;">{{$quotation->trans_no }}</a>
                                            @else
                                                <a href="{{ url('/quotation/get-a-quote/quote')}}/{{$quotation->trans_no}}" style="font-weight: 700; color: black;">{{$quotation->trans_no }}</a>
                                            @endif
                                        @endif

                                    </td>
                                    @if($quotation->response_policyNo)
                                    <td>{{$quotation->response_policyNo }}</td>
                                    @else
                                    <td>--</td>
                                    @endif
                                    <td>{{$quotation->first_name}} {{$quotation->middle_name}}
                                        {{$quotation->last_name}}<br><span
                                            style="color: #A9A9A9">{{$quotation->trans_no}}</span></td>
                                    <td>{{ date("M d, Y", strtotime($quotation->created_at))}} <br><span
                                            style="color: #A9A9A9">{{ date("H:i: A", strtotime($quotation->created_at))}}</span>
                                    </td>
                                    <td>{{$quotation->status }}
                                        @if($quotation->status === 'Drafts')
                                        <span class="badge bg-secondary ml-1"></span>
                                        @elseif($quotation->status === 'Quoted')
                                        <span class="badge bg-success ml-1"></span>
                                        @elseif($quotation->status === 'Issued')
                                        <span class="badge bg-teal ml-1"></span>
                                        @elseif($quotation->status === 'Incomplete')
                                        <span class="badge bg-red ml-1"></span>
                                        @elseif($quotation->status === 'Processing')
                                        <span class="badge bg-yellow  ml-1"></span>
                                        @else
                                        <span class="badge bg-primary ml-1"></span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            @else

                            <tbody>
                                <tr class="text-center">
                                    <th rowspan="5" colspan="5">
                                        <div style="padding: 130px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="40"
                                                fill="#d4d4d4" class="bi bi-file-earmark-text mb-2" viewBox="0 0 16 16">
                                                <path fill="#d4d4d4"
                                                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                                                <path fill="#d4d4d4"
                                                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                            </svg>
                                            <p style="font-weight: 700; font-size: 18px; margin-bottom: 0px;">You have
                                                no quotations yet</p>
                                            <p style="font-weight: 400; color: #666666; font-size: 14px;">Create
                                                quotations for your clients</p>
                                            <button class="epolicy-button epolicy-button-success getAQuote"
                                                style="padding: 6px 12px;"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="30" height="20" fill="currentColor" class="bi bi-plus-lg"
                                                    viewBox="0 0 16 22">
                                                    <path fill-rule="evenodd"
                                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                                </svg>Add a
                                                quote</button>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-secondary">Showing <span>@if($data['pagination']['from'])
                                {{$data['pagination']['from']}} @else 0 @endif</span> to
                            <span>@if($data['pagination']['to']) {{$data['pagination']['to']}} @else 0 @endif</span> of
                            <span>{{$data['pagination']['total']}}</span>
                            entries
                        </p>
                        <ul class="pagination m-0 ms-auto">
                            <li class="page-item {{$data['pagination']['current_page'] > 1 ? '' : 'disabled'}}"
                                style="background: #f8f8f8; border-radius: 12px;">
                                <a class="page-link"
                                    href="{{url('/quotation?status='.$selectQuotation.'&search='.$searchText.'&page='.($data['pagination']['current_page'] - 1))}}"
                                    tabindex="-1" aria-disabled="true">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path stroke="#000000"
                                            d="M13.883 5.007l.058 -.005h.118l.058 .005l.06 .009l.052 .01l.108 .032l.067 .027l.132 .07l.09 .065l.081 .073l.083 .094l.054 .077l.054 .096l.017 .036l.027 .067l.032 .108l.01 .053l.01 .06l.004 .057l.002 .059v12c0 .852 -.986 1.297 -1.623 .783l-.084 -.076l-6 -6a1 1 0 0 1 -.083 -1.32l.083 -.094l6 -6l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01z"
                                            stroke-width="0" fill="currentColor"></path>
                                    </svg>
                                </a>
                            </li>
                            @for ($i = 0; $i < $data['pagination']['last_page']; $i++) <li
                                class="page-item {{$data['pagination']['current_page'] == ($i + 1) ? 'active' : ''}}"><a
                                    class="page-link {{$data['pagination']['current_page'] == ($i + 1) ? 'pagination-active' : ''}}"
                                    href="{{url('/quotation?status='.$selectQuotation.'&search='.$searchText.'&page='.($i+1))}}">{{$i + 1}}</a></li>
                                @endfor
                                <li class="page-item {{$data['pagination']['current_page'] < $data['pagination']['last_page']? '' : 'disabled'}}"
                                    style="background: #f8f8f8; border-radius: 12px;">
                                    <a class="page-link"
                                        href="{{url('/quotation?status='.$selectQuotation.'&search='.$searchText.'&page='.($data['pagination']['current_page'] + 1))}}">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path stroke="#000000"
                                                d="M9 6c0 -.852 .986 -1.297 1.623 -.783l.084 .076l6 6a1 1 0 0 1 .083 1.32l-.083 .094l-6 6l-.094 .083l-.077 .054l-.096 .054l-.036 .017l-.067 .027l-.108 .032l-.053 .01l-.06 .01l-.057 .004l-.059 .002l-.059 -.002l-.058 -.005l-.06 -.009l-.052 -.01l-.108 -.032l-.067 -.027l-.132 -.07l-.09 -.065l-.081 -.073l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057l-.002 -12.059z"
                                                stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#batchUpload').click(function (e) {
            window.location.href = "{{url('/quotation/batch/insert')}}";
        });
        $('.getAQuote').click(function (e) {
            window.location.href = "{{url('/quotation/get-a-quote/first-page')}}";
        });
        $('.btnSelectQuotation').click(function (e) {   
            $('#selectQuotation').val("");
            if ($(this).attr("data-value") !== 'All') {
                $('#selectQuotation').val($(this).attr("data-value"));
            }
            window.location.href = "{{route('quotationlist')}}" +"?status="+$(this).attr("data-value") +"&search="+"{{$searchText}}";
        });

        $('#search_btn').click(function (e) {   
            window.location.href = "{{route('quotationlist')}}" +"?status="+ "{{$selectQuotation}}" +"&search="+$('#q').val();
        });
    });
</script>
@endsection