<div class="tab-pane " id="monitoringadmin-v">

    <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>

    <style type="text/css">

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            padding-right: 0px !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding : 0px;
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
        }                          margin-left: 600px !important;   */
        #myTableMonitor_filter{
            margin-left: 500px !important;
            }
    </style>

    <style type="text/css">
    @media all and (min-width:0px) and (max-width: 800px) {
        /* .pull-left{float:left!important;}
        .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;} */
        /*.pull-paget{float:left!important;}*/
        /*.pull-infot{float:left!important;}*/
    }
    </style>
    <style type="text/css">
    @media all and (min-width:0px) and (max-width: 800px) {
        .pull-left{float:left!important;}
        .pull-right{float:left!important;margin-top: 10px;margin-bottom: 10px;}
        /*.pull-paget{float:left!important;}*/
        /*.pull-infot{float:left!important;}*/
    }
    </style>
    <style>
            div.scroll {
                width: 100%;
                overflow: auto;
                white-space: nowrap;
            }
        </style>

        <h2 style="text-align: left;">Sales Monitoring</h2>
        <br>
        <br>
        <form  method="post"  id="search-form" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <label for="start">Start Date</label>
                <input id="start" name="start" class="form-control" type="date" value=" " /><br />
              </div>
              <div class="col-md-3">
                <label for="end">End Date</label>
                <input id="end" name="end" class="form-control" type="date" value=" " /><br />
              </div>
              <br>
              <div class="col-md-12">
              </div>
              <div class="col-md-3">
                <label for="end">Intermediary</label>
                            <select  id="intermediary_2" name="intermediary" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                                <option value="">- Select -</option>


                        </select>   <br />
                  </div>
                  <div class="col-md-3">
                    <label for="end">Status</label>
                    <select  id="status" name="status" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-status_4thpage" data-size="10"  data-live-search="true" >
                      <option value="">All</option>
                      <option value="PENDING" <?php if(old('status') === "PENDING"){ echo 'selected="selected"'; } ?>>PENDING</option>
                       <option value="ENDORSE" <?php if(old('status') === "ENDORSE"){ echo 'selected="selected"'; } ?>>ENDORSED</option>
                       <option value="APPROVE" <?php if(old('status') === "APPROVE"){ echo 'selected="selected"'; } ?>>APPROVED</option>
                       <option value="DISAPPROVE" <?php if(old('status') === "DISAPPROVE"){ echo 'selected="selected"'; } ?>>DISAPPROVED</option>
                        <option value="RELEASE" <?php if(old('status') === "RELEASE"){ echo 'selected="selected"'; } ?>>RELEASED</option>
                     </select><br />
                  </div>

                      </div>
                </div><br>
                <div class="col-md-12" style="padding-top:10px">
                    <div class="row">
                      <div class="col-md-12">
                            <input type="submit" name="refresh" id="refresh" class="btn btn-success" value="Generate">

                      </div>
                    </div>
              </div>
            <span style="font-family: muli;">

                <div class="scroll">
                    <table id="myTableMonitor" class="table table-striped table-bordered nowrap" style="width:100% !important;margin-top: 10px !important"  id="parentTable">
                            <thead>
                                <tr>
                                    <th>Pad No. Range</th>
                                    <th>Pad Type</th>
                                    <th>Intermediary Name.</th>
                                    <th>Date Uploaded</th>
                                    <th>Used Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                    </table>

                    <br>
                </div>
            </form>

            </span>
        <br>

        <hr>
        <style type="text/css">
           .pull-left{
            float: left !important;
            }
        </style>

</div>
<script>
    var table = jQuery('#myTableMonitor').DataTable({
    searching: true,
    paging: true,
    info: false,
    responsive: true,
    processing: true,
    serverSide: false,
    ajax: {
        url: "{{ url('/get-quote/monitor_display') }}",
        error: function(xhr, error, thrown) {
            console.log('Error:', error);
        }
    },
    columns: [
        { data: 'padrange', name: 'padrange' },
        { 
            data: 'padtype', 
            name: 'padtype',
            render: function(data) {
                // Use a switch statement for readability
                switch(data) {
                    case 'PC':
                        return 'Private Car';
                    case 'CV':
                        return 'Commercial Vehicle';
                    case 'MCY':
                        return 'Motorcycle';
                    case 'ENDT':
                        return 'Endorsement';
                    default:
                        return 'CTPL';
                }
            }
        },
        { 
        data: 'intermediaryname', 
        name: 'intermediaryname',
        render: function(data) {
            // Check if data is null or undefined
            if (data === null || data === undefined) {
                return 'N/A'; // Provide a default value for null/undefined
            } else {
                return data; // Return the actual value if it's not null/undefined
            }
        }
    },
        { 
            data: 'created_at', 
            name: 'created_at', 
            render: function(data) {
                // Format the date using JavaScript Date object
                var date = new Date(data);
                return date.toLocaleDateString(); // Adjust date format as needed
            } 
        },
        { data: 'used_doc', name: 'used_doc' },
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function(data) {
                // Use template literals for string interpolation
                return `<a href="#" data-toggle="modal" data-target="#showTableDetails" class="motorClaim" data-id="${data.intermediarycount}" data-id2="${data.intermediary}" style="text-decoration: underline;color:#008080">View</a>`;
            }
        }
    ],

    // Define column widths
    columnDefs: [{ "width": "40px", "targets": [2] }],
    
    // Specify DOM structure
    dom: "<'row'<'col-sm-6 col-offset-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-3'i><'col-sm-2'l><'col-sm-7'p>>"
});

 </script>
@include('monitoring.monitoring_modal_display')
