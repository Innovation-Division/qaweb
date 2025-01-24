<script type="text/javascript" src="https://d3a39i8rhcsf8w.cloudfront.net/js/jquery.mask.min.js"></script>



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
</style>

	<input type="hidden" name="url" name="url" value="{{url('/')}}">
	<div class="container_ b5form">
		<div class="row_">

			<div>
                <button type='button' class="mb-5 action back linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button>
            </div>
            <form method="post"  enctype="multipart/form-data" id='submitForm' novalidate>
                {{ csrf_field() }}
			<div class="step">
				@include('getaquote.bonds.step1')
			</div>
            </form>
            <form  id="form_requirement" name="form_requirement" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
				@include('getaquote.bonds.step2')
			</div>
            </form>
            <form  id="financial_higlight" name="financial_higlight" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
				@include('getaquote.bonds.step3')
			</div>
            </form>
            <form id="form_lossxp" name="form_lossxp" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
                @include('getaquote.bonds.step4')
            </div>
            </form>
            <form id="form_tsi" name="form_tsi" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
                @include('getaquote.bonds.step4a')
            </div>
            </form>
            <form id="form_owner" name="form_owner" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
                @include('getaquote.bonds.step5')
            </div>
            </form>
            <form id="form_officer" name="form_officer" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
                @include('getaquote.bonds.step6')
            </div>
            </form>
            <form id="form_collateral" name="form_collateral" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
            @include('getaquote.bonds.step7')
            </div>
            </form>
            <form id="form_principal" name="form_principal" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
                @include('getaquote.bonds.step8')
            </div>
            </form>

            <form id="form_cosigner" name="form_cosigner" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
            @include('getaquote.bonds.step9')
            </div>
            </form>

            <form id="form_guarantee" name="form_guarantee" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
            @include('getaquote.bonds.step10')
            </div>
            </form>

            <form id="form_project1" name="form_project1" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
            @include('getaquote.bonds.step11')
            </div>
            </form>

            <form id="form_project2" name="form_project2" method="post" enctype="multipart/form-data" action="javascript:void(0)">
                <div class="step">
                @include('getaquote.bonds.step11a')
                </div>
                </form>

            <form id="form_attachment" name="form_attachment" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
            @include('getaquote.bonds.step12')
            </div>
            </form>

            <form id="form_comment" name="form_comment" method="post" enctype="multipart/form-data" action="javascript:void(0)">
            <div class="step">
            @include('getaquote.bonds.step13')
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
    @include('getaquote.bonds.otherline')

