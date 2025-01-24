@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	    	   <br>
		        <div class="top-container">
			        <div class="category-name container">
			            <div class="row text-center">
			             
			                <h1 id="h111" name="h111" style="font-size: 50px !important;opacity: 0.8;">
			                    COVID-19 Assist+ </h1>
			            </div>
			        </div>
			       <br>             
			       {{ csrf_field() }}
				    <div id="newapps" >@include('getaquote.covid19.renewal')</div>
			    </div>	           
	        </div>           
        </div>
	</div>
<style type="text/css">
	.modal {
	  text-align: center;
	  top:30%;
	}

	#homepagediv{
		margin-top: 150px;
		margin-bottom: 220px;
	}


	@media screen and (min-width: 768px) { 
	  .modal:before {
	    display: inline-block;
	    vertical-align: middle;
	    content: " ";
	    height: 100%;
	  }
	}

	.modal-dialog {
	  display: inline-block;
	  text-align: left;
	  vertical-align: middle;
	}

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


@endsection
