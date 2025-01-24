
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

      <div class="modal fade" id="occupation_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
          <h1 style="color: #0275d8;font-weight: bold;margin-bottom: -10px;">Notice</h1>
              <button type="button" class="close" data-dismiss="modal" style="color: green;margin-top: -5px;">&times;</button>
             
          </div>
         
          <div class="modal-body">
            <!--  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right">&times;</button> -->
            <div class="form-group">
              <div class="input-group">
                <label for="chckcovid" style="margin-left:20px;margin-top:10px;margin-right:35px;line-height: 20px;font-weight: bold;">COCOGEN COVID-19 Assist+ only covers certain occupations. For more information, you may reach us at (02) 8830-6000 or client_services@cocogen.com.</label>
              </div>
            </div>
          </div>
           <div class="modal-footer" style="text-align: center">  
            <div id="pop_warning1">&nbsp;&nbsp;
              <button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/covid-19-assist-plus") }}'" class="btn" >Back to Home &nbsp;&nbsp;</button>
            </div>
            <div id="pop_warning2">
                &nbsp;&nbsp;                   
              <button type="button" id="btn_back_to_applicant_occupation" name="btn_back_to_applicant_occupation"  class="btn"  >Check Coverage &nbsp;&nbsp;</button>
            <button type="button" id="btn_back_to_home" name="btn_back_to_home" onclick="window.location='{{ url("get-quote/covid-19-assist-plus") }}'" class="btn" >Back to Home &nbsp;&nbsp;</button>
            </div>

           
            </div>
          
         </div>
        </div>
      </div> 