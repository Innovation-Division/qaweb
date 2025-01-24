
	  
	<div class="container_ b5form">
		<div class="row_">
		 	<form method="post" action="{{ route('motornewsave') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}		  	
				<div><button type="button" class="mb-5 actionclmmotor clmmotorbacks linkbutton btn btn-secondary-light" style="min-width: auto;">< Back</button></div>
				<input type="hidden" id="hidURL" name="hidURL" value="{{url('/')}}">
				<input type="hidden" id="hd_third_party" name="hd_third_party" value="1">
				<input type="hidden" id="hd_recovery_claim" name="hd_recovery_claim" value="1">

			

				<div class="clmmotorstep">
                    @include('epartnerhub.claims.motor.claim_motor_page_1')
				</div>

				<div class="clmmotorstep">
                    @include('epartnerhub.claims.motor.claim_motor_page_2')
				</div>

	    		<div class="clmmotorstep">
                    @include('epartnerhub.claims.motor.claim_motor_page_3')
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
<script>
	    $("#claim_motor_aget_yes").click(function() { 
			document.getElementById("claim_motor_aget_yes").style.background='#008080';
			document.getElementById("claim_motor_aget_yes").style.color ='#ffffff';
			document.getElementById("claim_motor_aget_no").style.background='#C0C0C0';
			document.getElementById("claim_motor_aget_no").style.color ='#000000';  
			$('input[name=hd_third_party]').val("yes"); 
		});
		$("#claim_motor_aget_no").click(function() { 
			document.getElementById("claim_motor_aget_no").style.background='#008080';
			document.getElementById("claim_motor_aget_no").style.color ='#ffffff';
			document.getElementById("claim_motor_aget_yes").style.background='#C0C0C0';
			document.getElementById("claim_motor_aget_yes").style.color ='#000000'; 
			$('input[name=hd_third_party]').val("no");
		});

		$("#claim_motor_recovery_yes").click(function() { 
			document.getElementById("claim_motor_recovery_yes").style.background='#008080';
			document.getElementById("claim_motor_recovery_yes").style.color ='#ffffff';
			document.getElementById("claim_motor_recovery_no").style.background='#C0C0C0';
			document.getElementById("claim_motor_recovery_no").style.color ='#000000';  
			$('input[name=hd_recovery_claim]').val("yes"); 
		});

		$("#claim_motor_recovery_no").click(function() { 
			document.getElementById("claim_motor_recovery_no").style.background='#008080';
			document.getElementById("claim_motor_recovery_no").style.color ='#ffffff';
			document.getElementById("claim_motor_recovery_yes").style.background='#C0C0C0';
			document.getElementById("claim_motor_recovery_yes").style.color ='#000000'; 
			$('input[name=hd_recovery_claim]').val("no");
		});

		$("#claim_motor_aget_yes_view").click(function() { 
			document.getElementById("claim_motor_aget_yes_view").style.background='#008080';
			document.getElementById("claim_motor_aget_yes_view").style.color ='#ffffff';
			document.getElementById("claim_motor_aget_no_view").style.background='#C0C0C0';
			document.getElementById("claim_motor_aget_no_view").style.color ='#000000';  
			$('input[name=hd_third_party_view]').val("yes"); 
		});
		$("#claim_motor_aget_no_view").click(function() { 
			document.getElementById("claim_motor_aget_no_view").style.background='#008080';
			document.getElementById("claim_motor_aget_no_view").style.color ='#ffffff';
			document.getElementById("claim_motor_aget_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_motor_aget_yes_view").style.color ='#000000'; 
			$('input[name=hd_third_party_view]').val("no");
		});

		$("#claim_motor_recovery_yes_view").click(function() { 
			document.getElementById("claim_motor_recovery_yes_view").style.background='#008080';
			document.getElementById("claim_motor_recovery_yes_view").style.color ='#ffffff';
			document.getElementById("claim_motor_recovery_no_view").style.background='#C0C0C0';
			document.getElementById("claim_motor_recovery_no_view").style.color ='#000000';  
			$('input[name=hd_recovery_claim_view]').val("yes"); 
		});

		$("#claim_motor_recovery_no_view").click(function() { 
			document.getElementById("claim_motor_recovery_no_view").style.background='#008080';
			document.getElementById("claim_motor_recovery_no_view").style.color ='#ffffff';
			document.getElementById("claim_motor_recovery_yes_view").style.background='#C0C0C0';
			document.getElementById("claim_motor_recovery_yes_view").style.color ='#000000'; 
			$('input[name=hd_recovery_claim_view]').val("no");
		});

</script>
<style>
	#claim_motor_recovery_yes_view,
	#claim_motor_recovery_no_view,
	#claim_motor_aget_no_view,
	#claim_motor_aget_yes_view,
	#claim_motor_recovery_yes,
	#claim_motor_recovery_no,
	#claim_motor_aget_no,
	#claim_motor_aget_yes{
		background-color: #C0C0C0;
		color : #000000;
		border-radius:5px;
		line-height:2;
		padding-left:33px;
	}
</style>




