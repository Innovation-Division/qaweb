@extends('layouts.layout1')

@section('content')

<section class="banner banner-inquiry">
	<div class="container-fluid breadcrumb-container">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb rfs-1-5">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item" aria-current="page">Get a Quote</li>
					<li class="breadcrumb-item active" aria-current="page">International Travel Excel Plus</li>
			</ol>
		</nav>
	</div>
	<div class="container">
		<div class="content">
			<h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">International Travel Excel Plus</h1>
		</div>
	</div>
</section>

<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">
					{{ csrf_field() }}
					<div id="newapps" >@include('getaquote.itp.new')</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
</style>
<script type="text/javascript">
	$(document).ready(function() {
    $("input[name$='include_cruise']").click(function() {
        var val = $(this).val();
        if(val == "Yes"){
        	$("#div_cruise").show();
        }else{
        	$("#div_cruise").hide();
        }
    });
});
</script>

<script type="text/javascript">
// Remove criterion
jQuery('.delete-row-col').hide();
jQuery('.delete-row-col-cruise').hide();

jQuery(document).on("click", ".delete-row-cruise", function () {
  $(this).closest('.row').remove();
  var colCount = $("#customFieldscruise #hardware-body .row").length;
  if (colCount > 1) {
    jQuery('.delete-row-col-cruise').css('display', 'flex');
  } else {
    jQuery('.delete-row-col-cruise').hide();
  }
  return false;
});

jQuery(document).on("click", ".delete-row", function () {
  $(this).closest('.row').remove();
  var colCount = $("#customFields #hardware-body .row").length;
  if (colCount > 1) {
    jQuery('.delete-row-col').css('display', 'flex');
  } else {
    jQuery('.delete-row-col').hide();
  }
  return false;
});
</script>
<style type="text/css">
	.delete-row, .delete-row_part {
		margin-top: 32px;
	  height: 52px;
	  width: 52px;
	  min-width: 52px !important;
	  border-radius: 5px;
	  background: #ffffff !important;
	  border: 2px solid #707070 !important;
	  color: #707070 !important;
	  padding: 4px;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}
    .delete-row-destiney, .delete-row_part {
		margin-top: 32px;
	  height: 52px;
	  width: 52px;
	  min-width: 52px !important;
	  border-radius: 5px;
	  background: #ffffff !important;
	  border: 2px solid #707070 !important;
	  color: #707070 !important;
	  padding: 4px;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}

	.delete-row-cruise, .delete-row_part {
		margin-top: 32px;
	  height: 52px;
	  width: 52px;
	  min-width: 52px !important;
	  border-radius: 5px;
	  background: #ffffff !important;
	  border: 2px solid #707070 !important;
	  color: #707070 !important;
	  padding: 4px;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}
</style>
<section class="divider">
	<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
