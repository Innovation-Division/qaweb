@extends('layouts.epartner')
@section('main-content')
<form  method="post"  id="search-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12 mb-3">
                            <strong style="font-size: 20px;">Sales Monitoring</strong>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                            <label for="start">Start Date</label>
                                            <input id="start" name="start" class="form-control" type="date" value=" " />
                                        <div class="invalid-feedback">Start Date is required</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                            <label for="end">End Date</label>
                                            <input id="end" name="end" class="form-control" type="date" value=" " />
                                        <div class="invalid-feedback">End Date is required</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                    <label for="end">Intermediary</label>
                                        <select  id="intermediary_2" name="intermediary_2" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                                            <option value="">- Select -</option>
                                        </select> 
                                        <div class="invalid-feedback">Start Date is required</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                    <label for="end">Status</label>
                                            <select  id="status" name="status" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                                                <option value="">All</option>
                                                <option value="PENDING" <?php if(old('status') === "PENDING"){ echo 'selected="selected"'; } ?>>PENDING</option>
                                                <option value="ENDORSE" <?php if(old('status') === "ENDORSED"){ echo 'selected="selected"'; } ?>>ENDORSED</option>
                                                <option value="APPROVED" <?php if(old('status') === "APPROVED"){ echo 'selected="selected"'; } ?>>APPROVED</option>
                                                <option value="DISAPPROVED" <?php if(old('status') === "DISAPPROVED"){ echo 'selected="selected"'; } ?>>DISAPPROVED</option>
                                            </select>
                                        <div class="invalid-feedback">End Date is required</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="refresh" id="refresh" class="btn btn-teal" value="Generate" style="background-color:#008080;height:45px;">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="form-group">
                                        <table id="myTableMonitor" class="table table-striped table-bordered nowrap" style="width:100% !important;margin-top: 10px !important"  id="parentTable">
                                            <thead>
                                                <tr>
                                                    <th>Pad No. Range</th>
                                                    <th>Pad Type</th>
                                                    <th>Intermediary No.</th>
                                                    <th>Date Uploaded</th>
                                                    <th>Used Count</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</form>

<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
<style type="text/css">
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        padding-right: 0px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0px;
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
<style type="text/css">
        .pull-left {
            float: left !important;
        }
        .page-item:last-child .page-link {
            border-top-right-radius: var(--tblr-pagination-border-radius);
            border-bottom-right-radius: var(--tblr-pagination-border-radius);
            color: #008080;
        }
        .active > .page-link, .page-link.active {
            z-index: 3;
            color: var(--tblr-pagination-active-color);
            background-color: #008080;
            color: #fff !important;
        }
        table.dataTable.no-footer {
        border-bottom: 0px solid rgba(0, 0, 0, 0.075);
        }
        .table {
        --tblr-table-color: inherit;
        --tblr-table-bg: transparent;
        --tblr-table-border-color: var(--tblr-border-color-translucent);
        --tblr-table-accent-bg: transparent;
        --tblr-table-striped-color: inherit;
        --tblr-table-striped-bg: var(--tblr-bg-surface-tertiary);
        --tblr-table-active-color: inherit;
        --tblr-table-active-bg: rgba(0, 0, 0, 0.1);
        --tblr-table-hover-color: inherit;
        --tblr-table-hover-bg: rgba(0, 0, 0, 0.075);
        color: var(--tblr-table-color);
        }

        .table thead th {
        color: var(--tblr-muted);
        background: var(--tblr-bg-surface-tertiary);
        font-size: .625rem;
        font-weight: var(--tblr-font-weight-bold);
        text-transform: uppercase;
        letter-spacing: .04em;
        line-height: 1rem;
        color: var(--tblr-muted);
        padding-top: .5rem;
        padding-bottom: .5rem;
        white-space: 
        nowrap;
        }

        table.dataTable thead th, table.dataTable thead td {
        padding: 10px 18px;
            padding-right: 18px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.075);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button .active{
        padding: 0px;
        margin-left: 0px;
        display: inline;
        border: none !important;
        color:red;
        }
        a {
        color: #008080;
        text-decoration: none;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled a {
        color: #008080;
        }
        table.dataTable thead .sorting_asc {
            background-image: url("https://localhost/cgen/cocogen2024/public/assets/img/epartner/chevron-down.svg");
            size:10px;
        }
        table.dataTable thead .sorting_desc {
            background-image: url("https://localhost/cgen/cocogen2024/public/assets/img/epartner/chevron-up.svg");

        }
        table.dataTable thead .sorting_asc::after,
        table.dataTable thead .sorting_desc::after {
        content: "" !important;
        font-family: "";
        }
        .form-check-input:checked {
        background-color: #008080;
        border-color: var(--tblr-border-color-translucent);
        }
</style>
<style type="text/css">
    .title {
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }

    .epolicy-button {
        padding: 8px 15px;
        border-radius: 5px;
        border: none;
    }

    .epolicy-btn-secondary {
        background: grey;
        color: #ffffff;
    }

    #mypolicy_filter,
    #mypolicy_length {
        display: none;
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
    }

    .epolicy-nav>li a:hover {
        border-radius: 18px;
        color: black;
        background: none;
    }

    .epolicy-nav>li:current {
        color: black;
    }

    .epolicy-button-success {
        background: #008080 !important;
        color: white;
    }

    .epolicy-button-success:hover {
        background: #60B3B3 !important;
    }
</style>
@include('monitoring.monitoring_modal_display')

<script>
    $(document).ready(function(){
        var _token = jQuery('input[name="_token"]').val();
        
        jQuery.ajax({
            url: "{{ url('/get-quote/agent') }}",
            method: 'POST',
            data: {
                _token: _token
            },
            success: function (data) {
                // process the data and add it to the dropdown
                data.forEach(function (agent) {
                    // construct the option HTML with the agent name and number
                    var optionHtml = '<option value="' + agent.agent_no + '">' + ' ' + agent.agent_no +
                        '-' + agent.agent_name + '</option>';

                    // append the option to the intermediary dropdown
                    $('#intermediary_2').append(optionHtml);
                    // alert(optionHtml);
                });
            }
        });

        
    
 
        var table = jQuery('#myTableMonitor').DataTable({
            bFilter: false, bInfo: false,
            responsive: true,
            dom: '<"pull-left col1"f><"pull-right col2"l>tip',
            ajax: {
                url: "{{ url('/get-quote/monitor_display') }}",
                error: function(xhr, error, thrown) {
                    
                }
            },
            columns: [
                { data: 'padrange', name: 'padrange' },
                { data: 'padtype', name: 'padtype',
                    render: function(data) {
                        if (data == 'PC') {
                            return 'Private Car';
                        } else if (data == 'CV') {
                            return 'Commercial Vehicle';
                        } else if (data == 'MCY') {
                            return 'Motorcycle';
                        } else if (data == 'ENDT') {
                            return 'Endorsement';
                        } else {
                            return 'CTPL';
                        }
                    }
                },
                { data: 'intermediary', name: 'intermediary' },
                { data: 'created_at', name: 'created_at', render: function(data){return data.replace(/(\d{4})-(\d{2})-(\d{2})\s.*/,'$1-$2-$3');} },
                { data: 'used_doc', name: 'used_doc' },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        return '<a href="#" data-toggle="modal" data-target="#showTableDetails" class="motorClaim" data-id="' + data.intermediarycount + '" data-id2="' + data.intermediary + '" style="text-decoration: underline;color:#008080">View</a>';
                    }
                }
            ],
            language: {
                
            'paginate': {
            'previous': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>',
            'next': '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>'
            }
        }
        });

        jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
            'width': '93px',
            'background-color': 'white'
        });

        jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
            'width': '93px',
            'background-color': 'white'
        });

        var _token = jQuery('input[name="_token"]').val();
        jQuery.ajax({
            url: "{{ url('/get-quote/agent') }}",
            method: 'POST',
            data: {
                _token: _token
            },
            success: function (data) {
                // process the data and add it to the dropdown
                data.forEach(function (agent) {
                    // construct the option HTML with the agent name and number
                    var optionHtml = '<option value="' + agent.agent_no + '">' + ' ' + agent.agent_no +
                        '-' + agent.agent_name + '</option>';

                    // append the option to the intermediary dropdown
                    // alert(optionHtml);
                    $('#intermediary_2').append(optionHtml);
                });
            }
        });
    });

    // var table = jQuery('#myTableMonitor').DataTable({
    //         searching: true,
    //         paging: true,
    //         info: false,
    //         responsive: true,
    //         processing: true,
    //         serverSide: true,
    //         ajax: {
    //             url: "{{ url('/get-quote/monitor_display') }}",
    //             error: function(xhr, error, thrown) {
    //                 console.log('cocogen.com');
    //             }
    //         },
    //         columns: [
    //             { data: 'padrange', name: 'padrange' },
    //             { data: 'padtype', name: 'padtype',
    //                 render: function(data) {
    //                     if (data == 'PC') {
    //                         return 'Private Car';
    //                     } else if (data == 'CV') {
    //                         return 'Commercial Vehicle';
    //                     } else if (data == 'MCY') {
    //                         return 'Motorcycle';
    //                     } else if (data == 'ENDT') {
    //                         return 'Endorsement';
    //                     } else {
    //                         return 'CTPL';
    //                     }
    //                 }
    //             },
    //             { data: 'intermediary', name: 'intermediary' },
    //             { data: 'created_at', name: 'created_at', render: function(data){return data.replace(/(\d{4})-(\d{2})-(\d{2})\s.*/,'$1-$2-$3');} },
    //             { data: 'used_doc', name: 'used_doc' },
    //             {
    //                 data: null,
    //                 orderable: false,
    //                 searchable: false,
    //                 render: function(data) {
    //                     return '<a href="#" data-toggle="modal" data-target="#showTableDetails" class="motorClaim" data-id="' + data.intermediarycount + '" data-id2="' + data.intermediary + '" style="text-decoration: underline;color:#008080">View</a>';
    //                 }
    //             }
    //         ],

    //         columnDefs: [{ "width": "40px", "targets": [2] }],
    //         dom: "<'row'<'col-sm-6 col-offset-sm-6'f>>" +
    //             "<'row'<'col-sm-12'tr>>" +
    //             "<'row'<'col-sm-3'i><'col-sm-2'l><'col-sm-7'p>>",
    //     });



</script>
@endsection