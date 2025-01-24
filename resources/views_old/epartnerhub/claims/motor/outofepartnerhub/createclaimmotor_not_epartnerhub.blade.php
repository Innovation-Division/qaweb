@extends('layouts.layoutclaims')

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
		 	<form method="post" action="{{ route('motorExternalnewsave') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}		 
			
				<div><button type="button" class="mb-5 actionclmmotor clmmotorbacks linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button></div>
				<input type="hidden" id="hidURL" name="hidURL" value="{{url('/')}}">
				<input type="hidden" id="url" name="url" value="{{url('/')}}">
				<input type="hidden" id="hd_third_party_not" name="hd_third_party_not" value="1">
				<input type="hidden" id="hd_recovery_claim" name="hd_recovery_claim" value="1">

				<div class="clmmotorstep">
                    @include('epartnerhub.claims.motor.outofepartnerhub.claim_motor_page_1')
				</div>

				<div class="clmmotorstep">
                    @include('epartnerhub.claims.motor.outofepartnerhub.claim_motor_page_2')
				</div>

	    		<div class="clmmotorstep">
                    @include('epartnerhub.claims.motor.outofepartnerhub.claim_motor_page_3')
	        	</div>

			</form>
			
	
			<div class="col-md-12_  mt-5">
				<div class="col-sm-4">
					<div class="col-sm-4">
						<button  id="clmmotornext" name="clmmotornext" type="submit"  class="actionclmmotor clmmotornext btn btn-secondary a-btn-slide-text_">Next</button>
					</div>      
				</div>      
			</div>

			<div class="col-md-12 break-two"><br></div>

			<div class="col-md-12">
				<div class="progress mt-5 p-0">
							<div class="progress-bar progress-bar-clmmotor"></div>
				</div>
			</div>
			<div class="col-md-12 break-two"><br></div>
			<div class="col-md-12 break-two"><br></div>
			<div class="col-md-12 break-two"><br></div>
			<div class="col-md-12 break-two"><br></div>
		</div>
			
	</div>

<script src="{{ asset('/js/claim_motor_step_not_epartner_motoronly.js') }}"></script>
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

