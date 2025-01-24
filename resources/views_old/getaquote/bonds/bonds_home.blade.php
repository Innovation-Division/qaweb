@extends('layouts.layout1')

@section('content')

<style type="text/css">
	/* .modal {
	  text-align: center;
	  top:30%;
	} */

	#homepagediv{
		margin-top: 150px;
		margin-bottom: 220px;
	}


	@media screen and (min-width: 768px) {
	  /* .modal:before {
	    display: inline-block;
	    vertical-align: middle;
	    content: " ";
	    height: 100%;
	  } */
	}

	/* .modal-dialog {
	  display: inline-block;
	  text-align: left;
	  vertical-align: middle;
	} */

	#btnnewApplication,
	#btnRenewal{
		min-width: 267px;
		margin-left: 20px;
		min-height: 60px;
		background-color: #C0C0C0;
		color: #000000;
		margin-top: 20px;
	}


	#btnnewApplication:hover {
	  background-color: #4CAF50; /* Green */
	  color: white;
	}

	#btnRenewal:hover {
	  background-color: #4CAF50; /* Green */
	  color: white;
	}


	@media only screen and (max-width: 800px) {
		#homepagediv{
			margin-top: 10px;
			margin-bottom: 30px;
		}

}
.datatable-header {
  border: 1px solid black;
}


.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
    background-color: #db3e8d; /* Replace with desired color */
    color: #fff; /* Replace with desired text color */
}



</style>

<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">


<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<section class="banner banner-inquiry">
	<div class="container-fluid breadcrumb-container">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb rfs-1-5">
					<li class="breadcrumb-item"><a href="{{ route('bondsquote') }}" onclick="event.preventDefault();">Home</a></li>
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

<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">

<div style="margin-top: 40px; margin-bottom: 20px">
<div class="container" style="text-align: left;margin-top: 20px">


<input id="strtype" name="strtype" type="hidden" value="{{\Auth::user()->accountType}}">
@if(\Auth::user()->accountType == 'Sales' || \Auth::user()->accountType == 'Agent')
<a href="{{route('quotebonds')}}" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span> Add New</a>
@endif



<div style='margin-top:10px !important'>
    <ul class="nav nav-tabs" role="tablist">
        @foreach($cocogen_bonds_quote_sum as $cocogen_sum)
        <li class="active">
            <a href="#tab-table1" id='tab-table1' data-toggle="tab"><span class="fa fa-file" aria-hidden="true"></span> All ({{$cocogen_sum->quote_cnt}})</a>
        </li>
        <li>
            <a href="#tab-table0" id='tab-table0' data-toggle="tab"><span class="fa fa-file-text-o" aria-hidden="true"></span> Quotation ({{$cocogen_sum->quote_quotation}})</a>
        </li>
        <li>
            <a href="#tab-table2" id='tab-table2' data-toggle="tab"><span class="fa fa-floppy-o" aria-hidden="true"></span> Save ({{$cocogen_sum->quote_save}})</a>
        </li>
        <li>
            <a href="#tab-table3" id='tab-table3' data-toggle="tab"><span class="fa fa-check" aria-hidden="true"></span> For BM Review ({{$cocogen_sum->quote_bmreview}})</a>
        </li>
        <li>
            <a href="#tab-table4" id='tab-table4' data-toggle="tab"><span class="fa fa-files-o" aria-hidden="true"></span> Submitted ({{$cocogen_sum->quote_submitted}})</a>
        </li>
        <li>
            <a href="#tab-table5" id='tab-table5' data-toggle="tab"><span class="fa fa-search-plus" aria-hidden="true"></span> For Sales Review ({{$cocogen_sum->quote_salesreview}})</a>
        </li>
        <li>
            <a href="#tab-table6" id='tab-table6' data-toggle="tab"><span class="fa fa-check-square-o" aria-hidden="true"></span> UW Review ({{$cocogen_sum->quote_uwreviewed}})</a>
        </li>
        <li>
            <a href="#tab-table7" id='tab-table7' data-toggle="tab"><span class="fa fa-check-circle-o" aria-hidden="true"></span> Approved ({{$cocogen_sum->quote_approved}})</a>
        </li>
        <li>
            <a href="#tab-table8" id='tab-table8' data-toggle="tab"><span class="fa fa-external-link-square" aria-hidden="true"></span> Issued ({{$cocogen_sum->quote_issued}})</a>
        </li>
        <li>
            <a href="#tab-table9" id='tab-table9' data-toggle="tab"><span class="fa fa-ban" aria-hidden="true"></span> DNM ({{$cocogen_sum->quote_dmn}})</a>
        </li>
        <li>
            <a href="#tab-table10" id='tab-table10' data-toggle="tab"><span class="fa fa-times-circle-o" aria-hidden="true"></span> Cancelled ({{$cocogen_sum->quote_cancelled}})</a>
        </li>

        @endforeach
    </ul>

                                      <div class="container">

                                    <table id="quote_table" class="table  table-striped table-bordered" style="width:100% !important">
                                        <thead>
                                            <tr>
                                                <th>Transaction No.</th>
                                                <th>Principal</th>
                                                <th>Agent</th>
                                                <th>Status</th>
                                                <th>Request Type</th>
                                                <th>Date Created</th>
                                                <th>Date Submitted</th>
                                                <th>View</th>
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
</div>
<script type="text/javascript">
    $(document).ready(function() {


  // Add click event listener to tabs
  $('.nav-tabs li').click(function() {
    // Remove active class from all tabs
    $('.nav-tabs li').removeClass('active');

    // Add active class to clicked tab
    $(this).addClass('active');
  });
});

jQuery(".dataTables_length select").addClass('selectb5').selectpicker({
   'width': '93px',
   'background-color' : 'white'
 });

</script>

<script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery.noConflict();

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
            });


          // jQuery('#quote_table').DataTable({
          //           pageLength: 25,
          //           searching: true,
          //           paging: false,
          //           scrollY: 500,
          //           scrollCollapse: true,
          //           info: false,
          //           responsive: true,
          //           processing: true,
          //           serverSide: true,
          //           sDom:  '<lf<t>ip>',

            var table = jQuery('#quote_table').DataTable({
                dom: '<"bottom"fl>rt<"top text-center"ip><"clear">',
                processing: true,
                serverSide: true,
                bLengthChange: false,

                ajax: "{{ url('/get-quote/getallbondsquote') }}",
                type: "post",
                columns: [
                            { data: 'transno',
                             name: 'transno',
                             orderable: true,
                            order: 'desc'},
                            { data: 'principal', name: 'principal' },
                            { data: 'agent', name: 'agent' },
                            { data: 'status', name: 'status' },
                            { data: 'request_type', name: 'request_type' },
                            { data: 'created_at', name: 'created_at' },
                            { data: 'dt_submitted', name: 'dt_submitted' },
                            {data: 'action', name: 'action', orderable: false},
                        ],
                columnDefs: [{ "width": "40px", "targets": [6] }],
                error: function(xhr, error, thrown) {
                    // Handle the AJAX error
                    console.log(error);

                    // Hide the error alert during loading
                    $('.dataTables_error').hide();
                    }

                });

                $('#tab-table10').click(function() {
                    var searchValue = 'Cancelled';
                    jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table0').click(function() {
                    var searchValue = 'Quotation';
                    jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table1').click(function() {
                    var searchValue = '';
                    jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table2').click(function() {
                    var searchValue = 'Save';
                    jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table3').click(function() {
                    var searchValue = 'For BM Review';
                    jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table4').click(function() {
                var searchValue = 'Submitted';
                jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table5').click(function() {
                var searchValue = 'For Sales Review';
                jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table6').click(function() {
                var searchValue = 'UW Review';
                jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table7').click(function() {
                var searchValue = 'Approved';
                jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table8').click(function() {
                var searchValue = 'Issued';
                jQuery('#quote_table_filter input').val(searchValue).keyup();
                });
                $('#tab-table9').click(function() {
                var searchValue = 'DNM';
                jQuery('#quote_table_filter input').val(searchValue).keyup();
                });



        });

        $(document).on('click', '.view_quote', function(){

        //var SITEURL = '{{URL::to('')}}';
        var trans_id =  $(this).attr('id');

        window.location.href = "{{ url('/get-quote/bonds-quoteview')}}"+"/"+trans_id;



        });

</script>

<section class="divider">
	<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
