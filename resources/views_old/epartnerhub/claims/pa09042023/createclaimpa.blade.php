  
	<div class="container_ b5form">
		<div class="row_">
		 	<form method="post" action="{{ route('paClaimnewsave') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}		  	
				<div><button type="button" class="mb-5 actioncmlpa cmlpabacks linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button></div>
				<input type="hidden" id="hidURL" name="hidURL" value="{{url('/')}}">
				<input type="hidden" id="hd_claim_pa_same_insured" name="hd_claim_pa_same_insured" value="1">
				<input type="hidden" id="hd_claim_pa_within_inception" name="hd_claim_pa_within_inception" value="1">
				<input type="hidden" id="hd_claim_pa_prem_paid" name="hd_claim_pa_prem_paid" value="1">
				<input type="hidden" id="hd_claim_pa_required_doc" name="hd_claim_pa_required_doc" value="1">
				<input type="hidden" id="hd_claim_pa_not_submitted" name="hd_claim_pa_not_submitted" value="1">
				<input type="hidden" id="hd_claim_pa_checklist_accomplished" name="hd_claim_pa_checklist_accomplished" value="1">
				<input type="hidden" id="hd_claim_motor_pa_recovery" name="hd_claim_motor_pa_recovery" value="1">

				


				<div class="cmlpastep">@include('epartnerhub.claims.pa.claim_pa_page_1')</div>
				<div class="cmlpastep">@include('epartnerhub.claims.pa.claim_pa_page_2')</div>
				<div class="cmlpastep">@include('epartnerhub.claims.pa.claim_pa_page_3')</div>


			</form>
		
		<div class="col-md-12_  mt-5">
			<div class="col-sm-4">
				<div class="col-sm-4">
					<button  id="cmlpanext" name="cmlpanext" type="submit"  class="actionclmmotor cmlpanext btn btn-secondary a-btn-slide-text_">Next</button>
				</div>      
			</div>      
		</div>

		<div class="col-md-12 break-two"><br></div>

		<div class="col-md-12">
			<div class="progress mt-5 p-0">
						<div class="progress-bar progress-bar-clmmpa"></div>
			</div>
		</div>

	</div>
</div>

<style>
	.btnradiobutton{
		background-color: #C0C0C0;
		color : #000000;
		border-radius:5px;
		line-height:2;
		padding-left:33px;
	}
</style>
<script>
		$("#claim_pa_same_insured_yes").click(function() { 
			document.getElementById("claim_pa_same_insured_yes").style.background='#008080';
			document.getElementById("claim_pa_same_insured_yes").style.color ='#ffffff';
			document.getElementById("claim_pa_same_insured_no").style.background='#C0C0C0';
			document.getElementById("claim_pa_same_insured_no").style.color ='#000000';  
			$('input[name=hd_claim_pa_same_insured]').val("yes"); 
		});
		$("#claim_pa_same_insured_no").click(function() { 
			document.getElementById("claim_pa_same_insured_no").style.background='#008080';
			document.getElementById("claim_pa_same_insured_no").style.color ='#ffffff';
			document.getElementById("claim_pa_same_insured_yes").style.background='#C0C0C0';
			document.getElementById("claim_pa_same_insured_yes").style.color ='#000000'; 
			$('input[name=hd_claim_pa_same_insured]').val("no");
		});
		$("#claim_pa_within_inception_yes").click(function() { 
			document.getElementById("claim_pa_within_inception_yes").style.background='#008080';
			document.getElementById("claim_pa_within_inception_yes").style.color ='#ffffff';
			document.getElementById("claim_pa_within_inception_no").style.background='#C0C0C0';
			document.getElementById("claim_pa_within_inception_no").style.color ='#000000';  
			$('input[name=hd_claim_pa_within_inception]').val("yes"); 
		});
		$("#claim_pa_within_inception_no").click(function() { 
			document.getElementById("claim_pa_within_inception_no").style.background='#008080';
			document.getElementById("claim_pa_within_inception_no").style.color ='#ffffff';
			document.getElementById("claim_pa_within_inception_yes").style.background='#C0C0C0';
			document.getElementById("claim_pa_within_inception_yes").style.color ='#000000'; 
			$('input[name=hd_claim_pa_within_inception]').val("no");
		});
		$("#claim_pa_prem_paid_yes").click(function() { 
			document.getElementById("claim_pa_prem_paid_yes").style.background='#008080';
			document.getElementById("claim_pa_prem_paid_yes").style.color ='#ffffff';
			document.getElementById("claim_pa_prem_paid_no").style.background='#C0C0C0';
			document.getElementById("claim_pa_prem_paid_no").style.color ='#000000';  
			$('input[name=hd_claim_pa_prem_paid]').val("yes"); 
		});
		$("#claim_pa_prem_paid_no").click(function() { 
			document.getElementById("claim_pa_prem_paid_no").style.background='#008080';
			document.getElementById("claim_pa_prem_paid_no").style.color ='#ffffff';
			document.getElementById("claim_pa_prem_paid_yes").style.background='#C0C0C0';
			document.getElementById("claim_pa_prem_paid_yes").style.color ='#000000'; 
			$('input[name=hd_claim_pa_prem_paid]').val("no");
		});
		$("#claim_pa_required_doc_yes").click(function() { 
			document.getElementById("claim_pa_required_doc_yes").style.background='#008080';
			document.getElementById("claim_pa_required_doc_yes").style.color ='#ffffff';
			document.getElementById("claim_pa_required_doc_no").style.background='#C0C0C0';
			document.getElementById("claim_pa_required_doc_no").style.color ='#000000';  
			$('input[name=hd_claim_pa_required_doc]').val("yes"); 
		});
		$("#claim_pa_required_doc_no").click(function() { 
			document.getElementById("claim_pa_required_doc_no").style.background='#008080';
			document.getElementById("claim_pa_required_doc_no").style.color ='#ffffff';
			document.getElementById("claim_pa_required_doc_yes").style.background='#C0C0C0';
			document.getElementById("claim_pa_required_doc_yes").style.color ='#000000'; 
			$('input[name=hd_claim_pa_required_doc]').val("no");
		});
		$("#claim_pa_not_submitted_yes").click(function() { 
			document.getElementById("claim_pa_not_submitted_yes").style.background='#008080';
			document.getElementById("claim_pa_not_submitted_yes").style.color ='#ffffff';
			document.getElementById("claim_pa_not_submitted_no").style.background='#C0C0C0';
			document.getElementById("claim_pa_not_submitted_no").style.color ='#000000';  
			$('input[name=hd_claim_pa_not_submitted]').val("yes"); 
		});
		$("#claim_pa_not_submitted_no").click(function() { 
			document.getElementById("claim_pa_not_submitted_no").style.background='#008080';
			document.getElementById("claim_pa_not_submitted_no").style.color ='#ffffff';
			document.getElementById("claim_pa_not_submitted_yes").style.background='#C0C0C0';
			document.getElementById("claim_pa_not_submitted_yes").style.color ='#000000'; 
			$('input[name=hd_claim_pa_not_submitted]').val("no");
		});
		$("#claim_pa_checklist_accomplished_yes").click(function() { 
			document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#008080';
			document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#ffffff';
			document.getElementById("claim_pa_checklist_accomplished_no").style.background='#C0C0C0';
			document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#000000';  
			$('input[name=hd_claim_pa_checklist_accomplished]').val("yes"); 
		});
		$("#claim_pa_checklist_accomplished_no").click(function() { 
			document.getElementById("claim_pa_checklist_accomplished_no").style.background='#008080';
			document.getElementById("claim_pa_checklist_accomplished_no").style.color ='#ffffff';
			document.getElementById("claim_pa_checklist_accomplished_yes").style.background='#C0C0C0';
			document.getElementById("claim_pa_checklist_accomplished_yes").style.color ='#000000'; 
			$('input[name=hd_claim_pa_checklist_accomplished]').val("no");
		});
		$("#claim_motor_pa_recovery_yes").click(function() { 
			document.getElementById("claim_motor_pa_recovery_yes").style.background='#008080';
			document.getElementById("claim_motor_pa_recovery_yes").style.color ='#ffffff';
			document.getElementById("claim_motor_pa_recovery_no").style.background='#C0C0C0';
			document.getElementById("claim_motor_pa_recovery_no").style.color ='#000000';  
			$('input[name=hd_claim_motor_pa_recovery]').val("yes"); 
		});
		$("#claim_motor_pa_recovery_no").click(function() { 
			document.getElementById("claim_motor_pa_recovery_no").style.background='#008080';
			document.getElementById("claim_motor_pa_recovery_no").style.color ='#ffffff';
			document.getElementById("claim_motor_pa_recovery_yes").style.background='#C0C0C0';
			document.getElementById("claim_motor_pa_recovery_yes").style.color ='#000000'; 
			$('input[name=hd_claim_motor_pa_recovery]').val("no");
		});


		
</script>




