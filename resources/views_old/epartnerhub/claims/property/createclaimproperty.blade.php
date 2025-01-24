
<link rel="stylesheet" type="text/css" href="{{  asset('/css/epartner_internal_claims.css') }}" media="all">
	<div class="container_ b5form">
		<div class="row_">
		 	<form method="post" action="{{ route('propertynewsave') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}		  	
				<div><button type="button" class="mb-5 action clmspropertybacks linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button></div>
				<input type="hidden" id="hidURL" name="hidURL" value="{{url('/')}}">
				<input type="hidden" id="hd_claim_property_same_insured" name="hd_claim_property_same_insured" value="1">
				<input type="hidden" id="hd_claim_property_prem_paid" name="hd_claim_property_prem_paid" value="1">
				<input type="hidden" id="hd_claim_property_within_inception" name="hd_claim_property_within_inception" value="1">
				<input type="hidden" id="hd_claim_property_risk_insured" name="hd_claim_property_risk_insured" value="1">
				<input type="hidden" id="hd_claim_property_morgagee" name="hd_claim_property_morgagee" value="1">
				<input type="hidden" id="hd_claim_motor_property_recovery" name="hd_claim_motor_property_recovery" value="1">

				


				<div class="clmspropertystep">@include('epartnerhub.claims.property.claim_property_page_1')</div>
				<div class="clmspropertystep">@include('epartnerhub.claims.property.claim_property_page_3')</div>

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


<script>
	 	$("#claim_property_same_insured_yes").click(function() { 
			document.getElementById("claim_property_same_insured_yes").style.background='#008080';
			document.getElementById("claim_property_same_insured_yes").style.color ='#ffffff';
			document.getElementById("claim_property_same_insured_no").style.background='#C0C0C0';
			document.getElementById("claim_property_same_insured_no").style.color ='#000000';  
			$('input[name=hd_claim_property_same_insured]').val("yes"); 
		});
		$("#claim_property_same_insured_no").click(function() { 
			document.getElementById("claim_property_same_insured_no").style.background='#008080';
			document.getElementById("claim_property_same_insured_no").style.color ='#ffffff';
			document.getElementById("claim_property_same_insured_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_same_insured_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_same_insured]').val("no");
		});


		$("#claim_property_prem_paid_yes").click(function() { 
			document.getElementById("claim_property_prem_paid_yes").style.background='#008080';
			document.getElementById("claim_property_prem_paid_yes").style.color ='#ffffff';
			document.getElementById("claim_property_prem_paid_no").style.background='#C0C0C0';
			document.getElementById("claim_property_prem_paid_no").style.color ='#000000';  
			$('input[name=hd_claim_property_prem_paid]').val("yes"); 
		});
		$("#claim_property_prem_paid_no").click(function() { 
			document.getElementById("claim_property_prem_paid_no").style.background='#008080';
			document.getElementById("claim_property_prem_paid_no").style.color ='#ffffff';
			document.getElementById("claim_property_prem_paid_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_prem_paid_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_prem_paid]').val("no");
		});

		$("#claim_property_within_inception_yes").click(function() { 
			document.getElementById("claim_property_within_inception_yes").style.background='#008080';
			document.getElementById("claim_property_within_inception_yes").style.color ='#ffffff';
			document.getElementById("claim_property_within_inception_no").style.background='#C0C0C0';
			document.getElementById("claim_property_within_inception_no").style.color ='#000000';  
			$('input[name=hd_claim_property_within_inception]').val("yes"); 
		});
		$("#claim_property_within_inception_no").click(function() { 
			document.getElementById("claim_property_within_inception_no").style.background='#008080';
			document.getElementById("claim_property_within_inception_no").style.color ='#ffffff';
			document.getElementById("claim_property_within_inception_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_within_inception_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_within_inception]').val("no");
		});

		$("#claim_property_risk_insured_yes").click(function() { 
			document.getElementById("claim_property_risk_insured_yes").style.background='#008080';
			document.getElementById("claim_property_risk_insured_yes").style.color ='#ffffff';
			document.getElementById("claim_property_risk_insured_no").style.background='#C0C0C0';
			document.getElementById("claim_property_risk_insured_no").style.color ='#000000';  
			$('input[name=hd_claim_property_risk_insured]').val("yes"); 
		});
		$("#claim_property_risk_insured_no").click(function() { 
			document.getElementById("claim_property_risk_insured_no").style.background='#008080';
			document.getElementById("claim_property_risk_insured_no").style.color ='#ffffff';
			document.getElementById("claim_property_risk_insured_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_risk_insured_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_risk_insured]').val("no");
		});

		$("#claim_property_morgagee_yes").click(function() { 
			document.getElementById("claim_property_morgagee_yes").style.background='#008080';
			document.getElementById("claim_property_morgagee_yes").style.color ='#ffffff';
			document.getElementById("claim_property_morgagee_no").style.background='#C0C0C0';
			document.getElementById("claim_property_morgagee_no").style.color ='#000000';  
			$('input[name=hd_claim_property_morgagee]').val("yes"); 
		});
		$("#claim_property_morgagee_no").click(function() { 
			document.getElementById("claim_property_morgagee_no").style.background='#008080';
			document.getElementById("claim_property_morgagee_no").style.color ='#ffffff';
			document.getElementById("claim_property_morgagee_yes").style.background='#C0C0C0';
			document.getElementById("claim_property_morgagee_yes").style.color ='#000000'; 
			$('input[name=hd_claim_property_morgagee]').val("no");
		});

		$("#claim_motor_property_recovery_yes").click(function() { 
			document.getElementById("claim_motor_property_recovery_yes").style.background='#008080';
			document.getElementById("claim_motor_property_recovery_yes").style.color ='#ffffff';
			document.getElementById("claim_motor_property_recovery_no").style.background='#C0C0C0';
			document.getElementById("claim_motor_property_recovery_no").style.color ='#000000';  
			$('input[name=hd_claim_motor_property_recovery]').val("yes"); 
		});
		$("#claim_motor_property_recovery_no").click(function() { 
			document.getElementById("claim_motor_property_recovery_no").style.background='#008080';
			document.getElementById("claim_motor_property_recovery_no").style.color ='#ffffff';
			document.getElementById("claim_motor_property_recovery_yes").style.background='#C0C0C0';
			document.getElementById("claim_motor_property_recovery_yes").style.color ='#000000'; 
			$('input[name=hd_claim_motor_property_recovery]').val("no");
		});


		
  
</script>


