@extends('layouts.epartner')
@section('main-content')
    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}', 'Success');
            });
        </script>
    @endif
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

        table.dataTable thead .sorting::after {
            content: "";
        }

        div.dataTables_wrapper div.dataTables_info {
            padding-top: 8px;
            white-space: nowrap;
            padding-left: 25px;
        }

        /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                                                                                                        .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                                                                                                            backgroun
                                                                                                            d-color: #008080 !important;
                                                                                                            color: #ffffff !important;
                                                                                                        }                         */
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function() {


            $("#requestHardcopy").click(function() {
                // alert('alert');
                jQuery('#myclient_form').submit();

            });


            var table = jQuery('#mypolicy').DataTable({
                responsive: true,
                dom: '<"pull-left col1"f><"pull-right col2"l>tip',
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



            // $("#requestHardcopy").click(function () {
            //      alert('hey')
            // });

        });
    </script>
    <style type="text/css">
        @media all and (min-width:0px) and (max-width: 800px) {
            /* .pull-left{float:left!important;}
                                                                                                        .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;} */
            /*.pull-paget{float:left!important;}*/
            /*.pull-infot{float:left!important;}*/
        }
    </style>
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <p class="title">Reports</p>
                            </div>


                            <div class="col-lg-3 div-generate-mobile text-end">
                                <a href="#" class="epolicy-button epolicy-button-success d-sm-inline-block"
                                    style='text-decoration:none' data-bs-toggle="modal" data-bs-target="#modal-report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Generate
                                </a>
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
                            <form method="POST" action="{{ url('/report-page') }}" id="filterPolicy">
                                @csrf
                                {{ method_field('GET') }}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p style="font-size: 18px; font-weight: bold;">All policies</p>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="searchPolicy" id="searchPolicy"
                                            placeholder="Search report..." class="epolicy-search-input"
                                            value="{{ $searchText }}">
                                    </div>
                                    <div class="col-lg-2 mb-3">
                                        <button class="epolicy-search" type="submit">Filter</button>
                                    </div>
                                    {{-- <div class="col-lg-12 epolicy-col p-2">
                                        <ul class="nav nav-pills epolicy-nav">

                                            <li role="presentation" class="{{ $selectPolicy === '' ? 'active' : '' }}"><a
                                                    href="javascript:void(0)" class="btnSelectPolicy"
                                                    data-value="all">All({{ $all }})</a></li>
                                            <li role="presentation" class="{{ $selectPolicy === 'PAID' ? 'active' : '' }}">
                                                <a href="javascript:void(0)" class="btnSelectPolicy"
                                                    data-value="paid">Paid({{ $paid }})</a>
                                            </li>
                                            <li role="presentation"
                                                class="{{ $selectPolicy === 'NO PAYMENT' ? 'active' : '' }}"><a
                                                    href="javascript:void(0)" class="btnSelectPolicy"
                                                    data-value="pending">Pending({{ $pending }})</a></li>
                                            <li role="presentation"
                                                class="{{ $selectPolicy === 'CANCELLED' ? 'active' : '' }}"><a
                                                    href="javascript:void(0)" class="btnSelectPolicy"
                                                    data-value="cancelled">Cancelled({{ $cancelled }})</a></li>
                                            <input type="hidden" class="selectPolicy" id="selectPolicy"
                                                name="selectPolicy">
                                        </ul>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <form method="POST" class="form-default" action="{{ url('/sendForHardCopyAgent') }}"
                            id="myclient_form">
                            {{ csrf_field() }}
                            <table id= "mypolicy" class="table card-table table-vcenter text-nowrap ">
                                <thead>
                                    <tr>

                                        <th>Policy Number</th>
                                        <th>Assured Details</th>
                                        <th>Product Line</th>
                                        <th>Created At</th>
                                        {{-- <th>Status</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($datas)
                                        @if (empty($datas->TErrorMsg))
                                            @foreach ($datas as $cocogen_epolicy_dtl)
                                                <?php $id = base64_encode($cocogen_epolicy_dtl->policy_no); ?>
                                                <tr>
                                                    <td><strong>{{ $cocogen_epolicy_dtl->policy_no }}</strong> </td>
                                                    <td>{{ $cocogen_epolicy_dtl->assured_name }} <br><span
                                                            style="color: #A9A9A9">{{ $cocogen_epolicy_dtl->assured_id }}</span>
                                                    </td>
                                                    <td>{{ $cocogen_epolicy_dtl->line_name }}<br><span
                                                            style="color: #A9A9A9">{{ date('M/d/Y', strtotime($cocogen_epolicy_dtl->start_date)) }}
                                                            -
                                                            {{ date('M/d/Y', strtotime($cocogen_epolicy_dtl->end_date)) }}</span>
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($cocogen_epolicy_dtl->issue_date)) }}
                                                    </td>
                                                    <td></td>




                                                </tr>
                                            @endforeach
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </form>

                        <br />
                        <br />
                    </div>
                </div>
            </div>

            <br>
            <!-- MODAL -->
            <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Generate Report</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ url('/report-page/paginate/') }}" id="filterPolicy2">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Role:</label>
                                    <select id="producttype" name="producttype"
                                        class="form-control selectpicker address_mobile input-lg selectb5"
                                        data-style="input-lg  btn-white-status_4thpage" data-size="10"
                                        data-live-search="true" required>
                                        <option value="">- Select -</option>
                                        <option value="production"> Production</option>
                                        {{-- <option value="renewal" > Renewal List</option>
                                    <option value="soa" > SOA</option> --}}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Policy line:</label>
                                    <select id="policyline" name="policyline"
                                        class="form-control selectpicker address_mobile input-lg selectb5"
                                        data-style="input-lg  btn-white-status_4thpage" data-size="10"
                                        data-live-search="true" required>
                                        <option value="">- Select -</option>
                                        <option value="FIRE AND LIGHTNING"> FIRE AND LIGHTNING</option>
                                        <option value="MOTOR CAR"> MOTOR CAR</option>
                                        <option value="LIABILITY"> LIABILITY</option>
                                        <option value="CASUALTY"> CASUALTY</option>
                                        <option value="MARINE HULL"> MARINE HULL</option>
                                        <option value="MARINE CARGO"> MARINE CARGO</option>
                                        <option value="ENGINEERING"> ENGINEERING</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Date Range</div>
                                    <select id="drpdowndate" name="dateRange"
                                        class="form-control selectpicker address_mobile input-lg selectb5"
                                        data-style="input-lg  btn-white-status_4thpage" data-size="10"
                                        data-live-search="true" required>
                                        <option value="">- Select -</option>
                                        <option value="past_7_months">Past 7 days</option>
                                        <option value="last_month"> Last Month</option>
                                        <option value="1st_quarter"> 1st Quarter - 2024</option>
                                        <option value="custom" id='customdate'>Custom date range</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group" id="custom-date-range" style="display: none;">
                                        <label for="recipient-name" class="control-label"> </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="from-date" class="control-label">From:</label>
                                                <input type="date" class="form-control" id="from-date"
                                                    name='from-date'>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="to-date" class="control-label">To:</label>
                                                <input type="date" class="form-control" id="to-date"
                                                    name='to-date'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">File Format</div>
                                    <select id="fileformat" name="fileformat"
                                        class="form-control selectpicker address_mobile input-lg selectb5"
                                        data-style="input-lg  btn-white-status_4thpage" data-size="10"
                                        data-live-search="true" required>
                                        <option value="">- Select -</option>
                                        <option value="pdf"> PDF (.pdf)</option>
                                        <option value="csv"> CSV (.csv)</option>
                                        <option value="xls"> Excel (.xlsx)</option>
                                    </select>


                                    <div class="modal-footer">
                                        <a href="{{ url('/report-page/showReport') }}" target="_blank"
                                            class="pull-left"><i class="fa fa-external-link" aria-hidden="true"></i> View
                                            in
                                            browser</a>
                                        <!-- <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">  </a> -->
                                        <input class="btn btn-primary ms-auto" id="submitmodal" type="button"
                                            value='Generate'>
                                        </input>


                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <style type="text/css">
                .pull-left {
                    float: left !important;
                }

                .page-item:last-child .page-link {
                    border-top-right-radius: var(--tblr-pagination-border-radius);
                    border-bottom-right-radius: var(--tblr-pagination-border-radius);
                    color: #008080;
                }

                .active>.page-link,
                .page-link.active {
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

                table.dataTable thead th,
                table.dataTable thead td {
                    padding: 10px 18px;
                    padding-right: 18px;
                    border-bottom: 1px solid rgba(0, 0, 0, 0.075);
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button .active {
                    padding: 0px;
                    margin-left: 0px;
                    display: inline;
                    border: none !important;
                    color: red;
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
                    size: 10px;
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

        </div>
        <script>
            $(document).ready(function() {
                $('.btnSelectPolicy').click(function(e) {
                    $('#selectPolicy').val("");
                    if ($(this).attr("data-value") !== 'all') {
                        $('#selectPolicy').val($(this).attr("data-value"));
                    }
                    $("#filterPolicy").submit();
                });

                $('#submitmodal').click(function(e) {
                    e.preventDefault();

                    // Gather form data
                    var formData = new FormData($('#filterPolicy2')[0]);
                    $.ajax({
                        url: "{{ route('pdf.reportdisplay') }}",
                        type: 'POST',
                        headers: {
                            'Accept': 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function(response) {
                            alert('Generating file...');
                            var mimeType = response.type;

                            // Check if the MIME type is for Excel files
                            if (mimeType ===
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            ) {
                                var blob = new Blob([response], {
                                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                                });
                                var link = document.createElement('a');
                                var url = URL.createObjectURL(blob);
                                link.href = url;
                                link.download = 'report.xlsx';
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);
                                URL.revokeObjectURL(url);
                            } else {
                                // Handle other file types
                                var blob = new Blob([response], {
                                    type: mimeType
                                });
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = 'report.' + mimeType.split('/')[1];
                                link.click();
                            }

                            $('#filterPolicy2')[0].reset();
                            $('#modal-report').modal('hide');
                        },
                        error: function(xhr) {
                            alert('All field is required');
                            console.log(xhr.responseText);
                        }
                    });
                });

                // Show custom date range fields if "custom" is selected
                $('#drpdowndate').change(function() {
                    if ($(this).val() === 'custom') {
                        $('#custom-date-range').show();
                    } else {
                        $('#custom-date-range').hide();
                    }
                });
            });
        </script>
    @endsection
