<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/itp.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/itpradio.css') }}" media="all">
<script src="{{ asset('asset/js/itp.js') }}"></script>
	@include('getaquote.itp.modal')
	<input type="hidden" name="url" name="url" value="{{url('/')}}">
	<div class="container_ b5form">
		<div class="row_">
            <form method="post" action="{{ route('internationalinsurancesave') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}
			<input type="hidden" name="coverage_complete" name="coverage_complete" value="">
			<input type="hidden" name="check_agent" name="check_agent" value="">
			<input type="hidden" name="personal_info_complete" name="personal_info_complete" value="">
			<input type="hidden" name="pwd_stat" name="pwd_stat" value="">
			<input type="hidden" name="pwd_stat_save" name="pwd_stat_save" value="">
			<input type="hidden" name="covid_amount" id="covid_amount" value="">
			<input type="hidden" name="covid_return" id='covid_return' value="">
			<input type="hidden" name="utm_source" id="utm_source" value="{{$utm_source}}">
			<input type="hidden" name="utm_medium" id='utm_medium' value="{{$utm_medium}}">

			<div><button type='button' class="mb-5 action back linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button></div>

			<div class="step">
				@include('getaquote.itp.step1')
			</div>

			<div class="step">
				@include('getaquote.itp.step2')
			</div>

    		<div class="step">
				@include('getaquote.itp.step3')
        	</div>

	        <div class="step">
				@include('getaquote.itp.step4')
	        </div>

	        <div class="step">
	        	@include('getaquote.itp.step5')
	        </div>


		      	<div class="step">
		        	@include('getaquote.itp.step6')
		      	</div>
		</form>
        <div class="col-md-12_ text-center mt-5">
        	<div id="nextbutton" name="nextbutton">
        		<button  id="next" name="next" type="submit"  class="action next btn btn-secondary a-btn-slide-text_">Next</button>
         	</div>
        </div>
        <div class="progress mt-5 p-0">
					<div class="progress-bar"></div>
				</div>
		</div>
	</div>
@include('getaquote.itp.otherline')


