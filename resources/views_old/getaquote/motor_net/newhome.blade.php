@extends('layouts.layout1')
@section('content')

<section class="banner banner-inquiry">
	<div class="container-fluid breadcrumb-container">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb rfs-1-5">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Motor Quotation</li>
			</ol>
		</nav>
	</div>
	<div class="container">
		<div class="content">
			<h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Motor Quotation</h1>
		</div>
	</div>
</section>

<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">
					{{ csrf_field() }}
					<div id="newapps" >@include('getaquote.motor_net.new')</div>
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
    .hide {
  display: none;
}
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

<section class="divider">
	<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
