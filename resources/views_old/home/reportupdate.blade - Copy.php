@extends('layouts.epartner')
@section('main-content')
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

    /* .dataTables_wrapper .dataTables_paginate .paginate_button:hover a,
                    .dataTables_wrapper .dataTables_paginate .paginate_button:focus a {
                        background-color: #008080 !important;
                        color: #ffffff !important;
                    }                         */
</style>
<script type="text/javascript">
    jQuery(document).ready(function () {
        var table = jQuery('#mypolicy').DataTable({
            responsive: true,
            dom: '<"pull-left col1"f><"pull-right col2"l>tip'

        });
        jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
            'width': '93px',
            'background-color': 'white'
        });

        var table2 = jQuery('#mypolicyasagent').DataTable({
            responsive: true,
            dom: '<"pull-left col1"f><"pull-right col2"l><"pull-paget">tip'
        });
        jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
            'width': '93px',
            'background-color': 'white'
        });

        jQuery("#requestHardcopy").click(function () {
            alert('hey')
            // jQuery('#myclient_form').submit();
        });
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
<style>
        .card-custom {
            border-radius: 10px;
            background-color: #f8f9fa;
            /* padding: 20px; */
        }
        .percentage-change {
            display: inline-block;
            background-color: #e9ecef;
            border-radius: 5px;
            padding: 2px 5px;
            font-size: 12px;
            font-weight: bold;
            color: #000;
        }
        .comparison-text {
            font-size: 12px;
            color: #6c757d;
            text-align: right;
        }
        .dropdown-position {
            margin-left: auto;
        }
        .text-muted{
            font-size:14px;
        }
    </style>
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <p class="title">Policies</p>
                        </div>
                        <div class="col-lg-3 text-end">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                Generate
                            </a>
                                <!-- <button type="button" class="epolicy-button epolicy-button-success" data-toggle="modal" data-target="#exampleModal" >Generate</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-deck row-cards" style="margin-bottom: 10px !important;">
        <div class="col-sm-6 col-lg-3">
                <div class="card card-custom">
                        <div class="card-body">
                            <div class="card-title text-muted ">Total leads</div>
                            <div class="h1">123</div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="percentage-change d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 15l-6-6-6 6"/>
                                    </svg>
                                    25%
                                </div>
                                
                                <div class="comparison-text ms-auto">vs last week</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                <div class="card card-custom">
                <div class="card-body">
                    <div class="card-title text-muted mb-3">Total issue policies</div>
                    <div class="h1">123</div>
                    <div class="d-flex align-items-center">
                        <div class="percentage-change d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 15l-6-6-6 6"/>
                            </svg>
                            25%
                        </div>
                        <div class="comparison-text ms-auto">vs last week</div>
                        
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-custom">
                <div class="card-body">
                    <div class="card-title text-muted mb-3">Total claims</div>
                    <div class="h1">123</div>
                    <div class="d-flex align-items-center">
                        <div class="percentage-change d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 15l-6-6-6 6"/>
                            </svg>
                            25%
                        </div>
                        <div class="comparison-text ms-auto">vs last week</div>
                        
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-custom">
                <div class="card-body">
                    <div class="card-title text-muted mb-3">Total unclosed quotation</div>
                    <div class="h1">123</div>
                    <div class="d-flex align-items-center">
                        <div class="percentage-change d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 15l-6-6-6 6"/>
                            </svg>
                            25%
                        </div>
                        <div class="comparison-text ms-auto">vs last week</div>
                        
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
                    <form method="POST" action="{{ url('/report-page/') }}" id="filterPolicy">
                            @csrf
                            {{method_field('GET')}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style="font-size: 18px; font-weight: bold;">All policies</p>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text" name="searchPolicy" placeholder="Search quotations..."
                                        class="epolicy-search-input">
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <button class="epolicy-search filter" id='filter' type="submit">Filter</button>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                    <th>Policy Number</th>
                    <th>Assured Details</th>
                    <th>Product Line</th>
                    <th>Created At</th>
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
            </table>

                   
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries
                    </p>
                    <ul class="pagination m-0 ms-auto">
                        <li class="page-item " style="background: #f8f8f8; border-radius: 12px;">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
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
                        
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#" style="background: #E0F5F5 !important; color:black">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item" style="background: #f8f8f8; border-radius: 12px;" >

                             <!-- <div id="pagination"></div>  -->

                            <a class="page-link" href="#">
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
    
    <!-- MODAL -->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Generate Report</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="{{ url('/report-page/paginate/') }}" id="filterPolicy2">
          <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Role:</label>
                    <select id="fileformat" name="fileformat" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10" data-live-search="true">
                                    <option value="">- Select -</option>
                                    <option value="pdf"> PDF (.pdf)</option>
                                    <option value="csv"> CSV (.csv)</option>
                                    <option value="xls"> Excel (.xlsx)</option>
                                </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Policy line:</label>
                    <input type="text" class="form-control" id='policyLine' name="policyLine" placeholder="Policy line">
                </div>
               <div class="mb-3" >
                              <div class="form-label">Date Range</div>
                              <select id="drpdowndate" name="dateRange" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10" data-live-search="true">
                                <option value="">- Select -</option>
                                <option value="pdf">Past 7 days</option>
                                <option value="csv"> Last Month</option>
                                <option value="xls"> 1st Quarter - 2024</option>
                                <option value="xls"> 1st Quarter - 2024</option>
                                <option value="custom" id='customdate'>Custom date range</option>
                            </select>
                </div>
                <div class="mb-3" >
                <div class="form-group" id="custom-date-range" style="display: none;">
                        <label for="recipient-name" class="control-label" > </label>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="from-date" class="control-label" >From:</label>
                                <input type="date" class="form-control" id="from-date" name='from-date'>
                            </div>
                            <div class="col-md-6">
                                <label for="to-date" class="control-label">To:</label>
                                <input type="date" class="form-control" id="to-date" name='to-date'>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="mb-3" >
                              <div class="form-label">File Format</div>
                              <select id="fileformat" name="fileformat" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10" data-live-search="true">
                                    <option value="">- Select -</option>
                                    <option value="pdf"> PDF (.pdf)</option>
                                    <option value="csv"> CSV (.csv)</option>
                                    <option value="xls"> Excel (.xlsx)</option>
                                </select>
          <div class="modal-footer">
          <a href="www.cocogen.com" target="_blank" class="pull-left"><i class="fa fa-external-link" aria-hidden="true"></i> View in browser</a>
            <!-- <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">  </a> -->
            <button class="btn btn-primary ms-auto" id="submitmodal" type="submit"> Generate</button>
              
          
          </div>
        </div>
      </div>
    </form>    

    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                search:true,
                ajax: {
                    url: '{{ url("/report-page/paginate") }}', // Replace with your endpoint
                    data: function (d) {
                        d.searchPolicy = $('#searchPolicy').val(); // Add your search term input ID
                    }
                },
                columns: [
                    { data: 'policy_no' },
                    { data: 'class' },
                    { data: 'line_cd' },
                    { data: 'issue_date' },
                    { data: 'start_date' },
                    { data: 'end_date' },
                    { data: 'assured_name' },
                    // Add other columns as needed
                ]
            });
        });
    </script>
<script>
    $(document).ready(function () {

        $('.submitmodal').click(function(e) {

            $('#policyLine').val("");
                
                // if($(this).attr("data-value") !== 'all') {
                //     $('#policyLine').val($(this).attr("data-value"));
                // }

            $("#filterPolicy2").submit();
        });
            $('.btnSelectPolicy').click(function(e) {
                alert('xx');
                $('#selectPolicy').val("");
                
                if($(this).attr("data-value") !== 'all') {
                    $('#selectPolicy').val($(this).attr("data-value"));
                }

                $("#filterPolicy").submit();
                fetchResults(1);
            });
            $('#drpdowndate').change(function() {
            if ($(this).val() === 'custom') {
                $('#custom-date-range').show();
            } else {
                $('#custom-date-range').hide();
            }
        });
        

            function fetchResults(page) {
            const searchTerm = $('#searchPolicy').val();
            $.ajax({
                url: "{{url('/report-page')}} ",
                method: 'GET',
                data: {
                    page: page,
                    search: searchTerm
                },
                success: function(data) {
                    displayResults(data.data);
                    displayPagination(data.totalItems, data.itemsPerPage, data.currentPage);
                }
            });
        }

        function displayResults(items) {
            $('#results').empty();
            items.forEach(function(item) {
                $('#results').append(`<div>${item.policy_no} - ${item.assured_name}</div>`);
            });
        }

        function displayPagination(totalItems, itemsPerPage, currentPage) {
            $('#pagination').empty();
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const button = $('<button></button>')
                    .text(i)
                    .prop('disabled', i === currentPage)
                    .click(function() {
                        fetchResults(i);
                    });
                $('#pagination').append(button);
            }
        }
    });
    </script>
 
@endsection