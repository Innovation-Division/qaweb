@extends('layouts.app')

@section('content')
<style type="text/css">
        .BlockUIConfirm {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 100vh;
          width: 100vw;
          z-index: 50;
        }

        .BlockUIConfirm2 {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 100vh;
          width: 100vw;
          z-index: 50;
        }

        .BlockCantFintCar {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          height: 100vh;
          width: 100vw;
          z-index: 50;
        }

        .blockui-mask {
          position: absolute;
          top: 0;
          width: 100%;
          height: 100%;
          background-color: #333;
          opacity: 0.8;
        }

        .RowDialogBody {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 100%;
          max-width: 600px;
          opacity: 1;
          background-color: white;
          border-radius: 4px;
        }

        .RowDialogBody > div:not(.confirm-body) {
          padding: 8px 10px;
        }

        .confirm-header {
          width: 100%;
          border-radius: 4px 4px 0 0;
          font-size: 13pt;
          font-weight: bold;
          margin: 0;
        }

        .row-dialog-hdr-success {
          border-top: 4px solid #5cb85c;
          border-bottom: 1px solid transparent;
        }

        .row-dialog-hdr-info {
          border-top: 4px solid #5bc0de;
          border-bottom: 1px solid transparent;
        }

        .confirm-body {
          border-top: 1px solid #ccc;
          padding:20px 10px;
          border-bottom: 1px solid #ccc;
        }

        .confirm-btn-panel {
          width: 100%;
        }
        .row-dialog-btn {
          cursor: pointer;
        }

        .btn-naked {
          background-color: transparent;
        }
    </style>
  <script type="text/javascript">  
        jQuery(document).ready(function($) {
           jQuery(function () {
            jQuery("#btnConfirm").click(function () {
                 jQuery('#BlockUIConfirm').hide();
          });
        });
        });
    </script>
    <script type="text/javascript">2
	$(document).ready(function() {
		if (jQuery(this).is(':checked') === true) {
	    	jQuery('#btnConfirm').prop('disabled', false);
	    }else{
	    	jQuery('#btnConfirm').prop('disabled', true);
	    }
    $("#chckcovid").on('change', function () { 
        if (jQuery(this).is(':checked') === true) {
	    	jQuery('#btnConfirm').prop('disabled', false);
	    }else{
	    	jQuery('#btnConfirm').prop('disabled', true);
	    }
    
    });
});
</script>
<div id="BlockUIConfirm" class="BlockUIConfirm" >
      <div class="blockui-mask"></div>
      <div class="RowDialogBody">
        <div class="confirm-header row-dialog-hdr-success">        
        </div>
        <div class="confirm-body row-dialog-hdr-success" style="text-align: left;">
            <table>
      		<tr >
	      		<td width="10%"><input type="checkbox" id="chckcovid" name="chckcovid" style="margin-left: 45px;margin-top: 10px;"></td>
      			<td width="90%">
      				<label for="chckcovid" style="margin-left:20px;margin-top:35px;margin-right:35px;line-height: 20px;">The person to be insured is in good health, free from any impairment or deformity and within the insurable age of 18-60 years old. </label>
      			</td>
      		</tr>
      		<tr>
      			<td></td>
      			<td>
      				<label style="margin-left:20px;margin-bottom:35px;margin-top:10px;margin-right:35px;line-height: 20px;">The person to be insured is neither a suspected nor a probable COVID-19 case. Further, the person to be insured has not been diagnosed with COVID-19 at the time of application </label>
      			</td>
      		</tr>
      	    </table>
        </div>
        <div class="confirm-btn-panel pull-right">
          <div class="btn-holder pull-right">
            
            <button type="button" id="btnConfirm" name="btnConfirm"  class="btn btn-primary"  >CONFIRM</button>
           
          </div>
          </div>
        </div>
      </div>

		       
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
				     <div id="homedibv" class="progress"  class="col-md-12" >
                        <div class="progress-bar progress-bar-success" aria-valuenow="70"  aria-valuemin="0" aria-valuemax="100"  style="max-height: 4px !important;width:17%;background-color:red  !important;color:red !important;"></div>
                    </div>
			      		<div class="col-md-12" id="homepagediv">
				        	<button  id="btnnewApplication" type="submit"  class="btn btn-default btnnewApplication" onclick="window.location='{{ url("/get-quote/covid-19-assist-plus-insurance/new-application") }}'" >New Applicant</button>
				        	<button  id="btnRenewal" type="submit"  class="btn btn-default btnRenewal" onclick="window.location='{{ url("/get-quote/covid-19-assist-plus-insurance/renewal") }}'">Renewal</button>
			        	</div>

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
