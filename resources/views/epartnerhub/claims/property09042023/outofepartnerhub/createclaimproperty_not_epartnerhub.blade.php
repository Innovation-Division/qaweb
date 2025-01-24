@extends('layouts.layout1')
	
@section('content')
				<link rel="stylesheet" type="text/css" href="{{  asset('/css/epartner_external_claims.css') }}" media="all">
              	@if(session('message'))
					<div class="col-md-12">
						<div class='alert alert-success'>
							{{session('message')}}
						</div>
					</div>
				@endif 	
	<div class="container_ b5form">
		<div class="row_">
		 	<form method="post" action="{{ route('propertyExternalnewsave') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}		  	
				<div><button type="button" class="mb-5 action clmspropertybacks linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button></div>
				<input type="hidden" id="hidURL" name="hidURL" value="{{url('/')}}">
				<input type="hidden" id="url" name="url" value="{{url('/')}}">
				<input type="hidden" id="hd_claim_property_same_insured" name="hd_claim_property_same_insured" value="1">
				<input type="hidden" id="hd_claim_property_prem_paid" name="hd_claim_property_prem_paid" value="1">
				<input type="hidden" id="hd_claim_property_within_inception" name="hd_claim_property_within_inception" value="1">
				<input type="hidden" id="hd_claim_property_risk_insured" name="hd_claim_property_risk_insured" value="1">
				<input type="hidden" id="hd_claim_property_morgagee" name="hd_claim_property_morgagee" value="1">
				<input type="hidden" id="hd_claim_motor_property_recovery" name="hd_claim_motor_property_recovery" value="1">

				


				<div class="clmspropertystep">@include('epartnerhub.claims.property.outofepartnerhub.claim_property_page_1')</div>
				<div class="clmspropertystep">@include('epartnerhub.claims.property.outofepartnerhub.claim_property_page_2')</div>
				<div class="clmspropertystep">@include('epartnerhub.claims.property.outofepartnerhub.claim_property_page_3')</div>

			</form>

		<div class="col-md-12_  mt-5">
				<div class="col-sm-4">
					<div class="col-sm-4">
						<button  id="clmspropertynext" name="clmspropertynext" type="submit"  class="actionclmmotor clmspropertynext btn btn-secondary a-btn-slide-text_">Next</button>
					</div>      
				</div>      
			</div>

			<div class="col-md-12 break-two"><br></div>

			<div class="col-md-12">
				<div class="progress mt-5 p-0">
							<div class="progress-bar progress-bar-clmmproperty"></div>
				</div>
			</div>
		</div>
	</div>


<script src="{{ asset('/js/claim_motor_step_not_epartner_propertyonly.js') }}"></script>
<script src="{{ asset('/js/address_epartnerhub.js') }}"></script>
<script src="{{ asset('/js/timepicker.js') }}"></script>
<script src="{{ asset('/js/currency.js') }}"></script>
<script src="{{ asset('/js/domestic.js') }}"></script>
<script src="{{ asset('/js/claim_motor_step_not_epartner.js') }}"></script>
<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
@endsection


