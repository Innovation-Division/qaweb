@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
	        <div class="col-md-12">
	    	   <br>
		        <div class="top-container">
			        <div class="category-name container" style="background-color: #f5f5f500 !important;">
			            <div class="row text-center">
			             
			                <h1 id="h111" name="h111" style="font-size: 35px !important;opacity: 0.8;font-weight: bold;">
			                    <span style="color: #008080;">Pro-Tech Expand 	</span></h1>
			            </div>
			        </div>
			       <br>             
			       {{ csrf_field() }}
				    <div id="newapps" >@include('getaquote.protechexpand.new')</div>
			    </div>	           
	        </div>           
        </div>
	</div>
<link rel="stylesheet" href="{{ asset('css/protect_expand.css') }}">
<script src="{{ asset('js/protect_expand.js') }}"></script>
<script src="{{ asset('js/masking.js') }}"></script>
<script src="{{ asset('js/address_protech.js') }}"></script>

<style type="text/css">
	.input-lg{
		height: 55px !important;
	}
</style>


@endsection
