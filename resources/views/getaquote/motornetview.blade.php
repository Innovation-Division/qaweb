@extends('layouts.layout1')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>

<style type="text/css">
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding : 0px;
        margin-left: 0px;
        display: inline;
        border: 0px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        border: 0px;
    }
    .v-error-msg {
        color: #CF3C4B;
        font-size: 15px;
    }
    .bonds_label{
        font-size:20px !important;
    }

    a:hover {
    text-decoration: none;
  }
</style>

<body>
    <div class="product content-wrapper bg-layout5">
        <section class="banner banner-product">
            <div class="container-fluid breadcrumb-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb rfs-1-5">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Services</a></li>
                        <li class="breadcrumb-item" aria-current="page">Motor</li>
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Motor Net Rating Report</h1>
                </div>
            </div>
        </section>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="{{ route('exportMotorNetRating') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <label for="start">Start Date</label>
                        <input name="start_date" id="startDate" type="text" class="form-control input-lg NoPaste startDate personal_ifno_mobile" maxlength="100" placeholder="MM/DD/YYYY" autocomplete="off" value="{{ old('start') }}"><br />
                    </div>
                    <div class="col-md-3">
                        <label for="end">End Date</label>
                        <input name="end_date" id="endDate" type="text" class="form-control input-lg NoPaste endDate personal_ifno_mobile" maxlength="100" placeholder="MM/DD/YYYY" autocomplete="off" value="{{ old('end') }}"><br />
                    </div>
                    <div class="col-md-3">
                        <label for="end">Status</label>
                        <select id="status" name="status" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg btn-white-status_4thpage" data-size="10" data-live-search="true">
                            <option value="">- Select -</option>
                            <option value="">All</option>
                            <option value="Save" <?php if(old('status') === "Save"){ echo 'selected="selected"'; } ?>>Save</option>
                            <option value="Pending" <?php if(old('status') === "Pending"){ echo 'selected="selected"'; } ?>>Pending</option>
                            <option value="Issued" <?php if(old('status') === "Issued"){ echo 'selected="selected"'; } ?>>Issued</option>
                            <option value="Fulfilled" <?php if(old('status') === "Fulfilled"){ echo 'selected="selected"'; } ?>>Fulfilled</option>
                            <option value="Quote Save" <?php if(old('status') === "Quote Save"){ echo 'selected="selected"'; } ?>>Quote Save</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-2">
                        <input type="submit" id='generatemotor' name="refresh" id="refresh" class="btn btn-success" value="Generate">
                        <input type="submit" name="xls" id="xls" class="btn btn-success" value="Export ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
            <div class="col-md-12_ break-two"> <br> </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                jQuery("#tblmotor").dataTable( {
                  "searching": true,
                  "order": [[0, 'desc']]
                } );
                table.destroy();
              });
       </script>
            <div class="container">

            <table class="table table-bordered data-table display" id='tblmotor'>
                    <thead>
                        <tr>
                            {{-- <td><input id="chckClientPol"  name="chckClientPol[]" type="checkbox" value=""></td> --}}
                            <th>ID</th>
                            <th>Policy No.</th>
                            <!-- <th>Invoice No.</th> -->
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created by</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cocogen_estimate_motor_personal_info as $cocogen_estimate_motor_personal_infos)
                        <tr>
                          <td>{{ $cocogen_estimate_motor_personal_infos->id }}</td>
                          <!-- <td>{{ $cocogen_estimate_motor_personal_infos->policyNo }}</td> -->
                          <td>{{ $cocogen_estimate_motor_personal_infos->quotationNo }}</td>
                          <td>{{ $cocogen_estimate_motor_personal_infos->firstName }} {{ $cocogen_estimate_motor_personal_infos->middleName }} {{ $cocogen_estimate_motor_personal_infos->lastName }}</td>
                          <td>{{ $cocogen_estimate_motor_personal_infos->status }}</td>
                          <td>{{ $cocogen_estimate_motor_personal_infos->name }}</td>
                          <td>{{ $cocogen_estimate_motor_personal_infos->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </body>
    </div>
 
    <script type="text/javascript">
 jQuery(document).ready(function($) {

    var table = $('.data-table').DataTable({
    dom: '<"bottom"fl>rt<"top text-center"ip><"clear">',
    processing: true,
    serverSide: true,
    bLengthChange: false,
    ajax: {
        url: "{{ route('policyquote') }}",
    },
    columns: [
        {
            data: 'quotationNo',
            name: 'quotationNo',
            render: function(data, type, row) {
                var quotationLink = '';

                switch (row.saveCondition) {
                    case '1':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register') }}/" + row.id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '2':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register') }}/" + row.id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '3':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register/detail') }}/" + row.id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '4':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register/detail') }}/" + row.id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '5':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register/payment') }}/" + row.id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    default:
                        quotationLink = row.quotationNo;
                }

                return quotationLink;
            }
        },
        { data: 'policyNo', name: 'policyNo' },
        { data: 'firstlast', name: 'firstlast' },
        {
            data: 'formatted_created_at',
        },
        {
            data: 'formatted_updated_at',
        },
        { data: 'status', name: 'status' },
    ],
    order: [[3, 'desc']]
});



   // setInterval( function () {
   //    table.ajax.reload();
   //  }, 10000 );




  });
  jQuery('#startDate').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        // minDate: '1d',
        // maxDate:'20y',
        yearRange: '1910:9999'
    })

    jQuery('#endDate').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'mm/dd/yy',
        // minDate: '1d',
        // maxDate:'20y',
        yearRange: '1910:9999'
    })

</script>
</html>
@endsection
