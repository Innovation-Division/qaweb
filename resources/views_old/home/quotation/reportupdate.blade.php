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


        .page-item {
            display: inline-block;
            margin: 0 2px;
        }

        .page-link {
            display: block;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .page-item.active .page-link {
            background: #E0F5F5 !important;
            color: black;
        }

        .page-item .page-link svg {
            vertical-align: middle;
        }

        .page-item .page-link {
            background: #f8f8f8;
            border-radius: 12px;
        }

        .page-item a.page-link:focus {
            box-shadow: none;
        }
        .btn-success{
            background-color:#008080;
        }
        @media (max-width:800px) {
            .div-generate-mobile {
                margin-top:-35px;

            }
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
                            <div class="col-lg-3 div-generate-mobile text-end">
                                <a href="#" class="btn btn-success d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-report">
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
                            <form method="POST" action="{{ url('/report-page/') }}" id="filterPolicy">
                                @csrf
                                {{ method_field('GET') }}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p style="font-size: 18px; font-weight: bold;">All policies</p>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" name="searchPolicy" id='epolicy-search-input'
                                            placeholder="Search quotations..." class="epolicy-search-input">
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
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <!-- <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                aria-label="Select all invoices"></th> -->
                                    <th>Policy Number</th>
                                    <th>Assured Details</th>
                                    <th>Product Line</th>
                                    <th>Created At</th>
                                    <!-- <th>Status</th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            @forelse ($collection as $item)
                                    <tr>
                                        <?php $id = base64_encode($item->policy_no); ?>
                                        <td>{{ $item->policy_no }}</td>
                                        <td>{{ $item->assured_name }} <br><span
                                                style="color: #A9A9A9">{{ $item->assured_id }}</span></td>
                                        <td>{{ $item->line_name }}<br><span
                                                style="color: #A9A9A9">{{ date('M/d/Y', strtotime($item->start_date)) }} -
                                                {{ date('M/d/Y', strtotime($item->end_date)) }}</span></td>
                                        <td>{{ date('F d Y', strtotime($item->issue_date)) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No data found</td>
                                    </tr>
                                @endforelse
                        </table>
                    </div>
                    <nav class="d-flex justify-content-between align-items-center p-3">
                        <div class="text-muted">
                            Show
                            <div class="mx-2 d-inline-block">
                                <select id="entriesCount" class="form-control form-control-sm" aria-label="Entries count">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            entries
                        </div>
                        <ul class="pagination">
                            <!-- Pagination links will be dynamically inserted here -->
                        </ul>
                    </nav>
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
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Role:</label>
                                <select id="producttype" name="producttype"
                                    class="form-control selectpicker address_mobile input-lg selectb5"
                                    data-style="input-lg  btn-white-status_4thpage" data-size="10" data-live-search="true"
                                    required>
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
                                            <input type="date" class="form-control" id="from-date" name='from-date'>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="to-date" class="control-label">To:</label>
                                            <input type="date" class="form-control" id="to-date" name='to-date'>
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
                                    <a href="{{ url('/report-page/showReport') }}" target="_blank" class="pull-left"><i
                                            class="fa fa-external-link" aria-hidden="true"></i> View in
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


        <script>
            $(document).ready(function() {
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
        <script>
            function formatDate(dateString, format) {
                const date = new Date(dateString);
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                const fullMonthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"
                ];

                const day = date.getDate();
                const month = date.getMonth();
                const year = date.getFullYear();
                const dayStr = day.toString().padStart(2, '0');
                const monthStr = format.includes('F') ? fullMonthNames[month] : monthNames[month];

                if (format === 'M/d/Y') {
                    return `${monthNames[month]}/${dayStr}/${year}`;
                } else if (format === 'F/d/Y') {
                    return `${fullMonthNames[month]}/${dayStr}/${year}`;
                } else {
                    return `${monthStr}/${dayStr}/${year}`; // Default to M/d/Y if format is unknown
                }
            }

            $(document).ready(function() {
                function fetchPolicies(page = 1, itemsPerPage = 10) {
                    $.ajax({
                        url: '{{ url('report-page') }}',
                        method: 'GET',
                        data: {
                            page: page,
                            itemsPerPage: itemsPerPage,
                            searchPolicy: '{{ $searchTerm ?? '' }}'
                        },
                        success: function(response) {
                            let tableBodyHtml = '';
                            response.data.forEach(item => {
                                tableBodyHtml += `
                        <tr>
                             <td>${item.policy_no}</td>
                            <td>${item.assured_name}<br><span
                                                style="color: #A9A9A9">${item.assured_id}</span></td>
                            <td>${item.line_name}<br><span
                                                style="color: #A9A9A9">${formatDate(item.start_date, 'M/d/Y')} - ${formatDate(item.end_date, 'M/d/Y')}</span></td>
                             <td>${formatDate(item.issue_date, 'F/d/Y')}</td>
                        </tr>
                    `;
                            });
                            $('#tableBody').html(tableBodyHtml);

                            let paginationHtml = '';
                            const currentPage = response.pagination.current_page;
                            const lastPage = response.pagination.last_page;

                            // Previous button
                            if (currentPage > 1) {
                                paginationHtml += `
                            <li class="page-item">
                                <a class="page-link" href="#" data-page="${currentPage - 1}">&laquo;</a>
                            </li>
                        `;
                            }

                            // Page number links
                            for (let i = 1; i <= lastPage; i++) {
                                paginationHtml += `
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `;
                            }

                            // Next button
                            if (currentPage < lastPage) {
                                paginationHtml += `
                        <li class="page-item">
                            <a class="page-link" href="#" data-page="${currentPage + 1}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path stroke="#000000" d="M9 6c0 -.852 .986 -1.297 1.623 -.783l.084 .076l6 6a1 1 0 0 1 .083 1.32l-.083 .094l-6 6l-.094 .083l-.077 .054l-.096 .054l-.036 .017l-.067 .027l-.108 .032l-.053 .01l-.06 .01l-.057 .004l-.059 .002l-.059 -.002l-.058 -.005l-.06 -.009l-.052 -.01l-.108 -.032l-.067 -.027l-.132 -.07l-.09 -.065l-.081 -.073l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057l-.002 -12.059z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </a>
                        </li>
                    `;
                            }

                            $('.pagination').html(paginationHtml);

                            // Show entries based on selected count
                            showEntries($('#entriesCount').val());
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }

                function showEntries(count) {
                    $('#tableBody tr').show(); // Show all rows initially
                    if (count > 0) {
                        $('#tableBody tr:gt(' + (count - 1) + ')').hide(); // Hide rows beyond the selected count
                    }
                }

                // Initial entries count setup
                let initialCount = parseInt($('#entriesCount').val()) || 10;
                showEntries(initialCount);

                // Event listener for entries count change
                $('#entriesCount').on('change', function() {
                    var count = parseInt($(this).val());
                    showEntries(count);
                    fetchPolicies(1, count); // Fetch policies with new items per page
                });

                // Handle page change
                $(document).on('click', '.pagination a', function(event) {
                    event.preventDefault();
                    var page = $(this).data('page');
                    var itemsPerPage = $('#entriesCount').val();
                    fetchPolicies(page, itemsPerPage);
                });

                // Fetch initial data
                fetchPolicies();
            });
        </script>
    @endsection
