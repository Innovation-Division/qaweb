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
                    <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Motor</h1>
                </div>
            </div>
        </section>

            <div class="col-md-12_ break-two"> <br> </div>
            <div class="container">

                <a href="{{ url('get-policy-quote/get-quote') }}" target="_blank" class="btn btn-primary" style="color:white">Create A Quote</a>

                <table class="table table-bordered data-table display" id='example'>
                    <thead>
                        <tr>
                            {{-- <td><input id="chckClientPol"  name="chckClientPol[]" type="checkbox" value=""></td> --}}
                            <th id='header'>Quotation No</th>
                            <th id='header'>Policy No</th>
                            <th id='header'>Policy Holder Name</th>
                            <th id='header'>Created Date</th>
                            <th id='header'>Update Date</th>
                            <th id='header'>Status</th>
                        </tr>
                    </thead>
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
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register') }}/" + row.encrypted_id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '2':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register') }}/" + row.encrypted_id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '3':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register/detail') }}/" + row.encrypted_id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '4':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register/detail') }}/" + row.encrypted_id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
                        break;
                    case '5':
                        quotationLink = "<a href='{{ url('/get-policy-quote/edit/register/payment') }}/" + row.encrypted_id + "' style='text-decoration: underline; color: #008080;' target='_blank'>" + row.quotationNo + "</a>";
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


</script>
</html>
@endsection
