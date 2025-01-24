

<h3 class="rfs-2-5 rfs-md-1-3">Quote Summary</h3>
<br />
<br />
<input  type="hidden" id="hidden_netPremium" name="hidden_netPremium" value="">
<input  type="hidden" id="hidden_dst" name="hidden_dst" value="">
<input  type="hidden" id="hidden_lgt" name="hidden_lgt" value="">
<input  type="hidden" id="hidden_vat" name="hidden_vat" value="">
<input  type="hidden" id="hidden_totalPremium" name="hidden_totalPremium" value="">
<input  type="hidden" id="hidden_deductible" name="hidden_deductible" value="">
<input  type="hidden" id="hidden_acc_drop" name="hidden_acc_drop" value="">
<input  type="hidden" id="hidden_rbt" name="hidden_rbt" value="">
<input  type="hidden" id="hidden_si" name="hidden_si" value="">

<div class="table-data1">
	<div class="table-responsive">
		<table id="summaryfinalpage" class="table">
			<thead>
				<th class="bgcolor-primary"> 
					<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Device/Part</span> 
				</th>
				<th class="bgcolor-primary"> 
					<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Make and Model</span> 
				</th>
				<th class="bgcolor-primary"> 
					<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Type/Area</span> 
				</th>
				<th class="bgcolor-primary"> 
					<span class="heading-border text-color-light rfs-1-13 rfs-md-1-3">Value</span> 
				</th>
			</thead>
			<tbody></tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="col1"><strong>Net Premium</strong></td>
					<td><strong id="netPremium" name="netPremium"></strong></td>
				</tr>
				<tr>
					<td colspan="3" class="col1"><strong>Documentary Stamps Tax</strong></td>
					<td><strong id="dst" name="dst"></strong></td>
				</tr>
				<tr>
					<td colspan="3" class="col1"><strong>Local Government Tax</strong></td>
					<td><strong id="lgt" name="lgt"></strong></td>
				</tr>
				<tr>
					<td colspan="3" class="col1"><strong>VAT</strong></td>
					<td><strong id="vat" name="vat"></strong></td>
				</tr>
				<tr class="promo_div">
					<td colspan="3" class="col1"><strong><em>Promo</em></strong></td>
					<td>- <strong id="summary_promo" name="summary_promo"></strong></td>
				</tr>
				<tr>
					<td colspan="3" class="bgcolor-secondary text-color-light"><strong>TOTAL PREMIUM</strong></th>
					<td class="bgcolor-secondary text-color-light"><strong id="totalPremium" name="totalPremium"></strong></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<br>

<div class="col-md-4_">
	<p class="mb-3"><strong>Deductible/Participation Fee</strong></p>
</div>
<div class="col-md-11_" style="margin-left: 60px;">
	<p class="mb-0"><strong>Deductible</strong> - <strong id="deductible"></strong></p>
	<p class="mb-0"><span id="lblmindeduc" >Minimum : 5,000</span></p>
</div>

<br>

<div id="div_other_deduc" style="margin-left: 60px;">
	<div class="col-md-11_">
		<p class="mb-0"><strong>Accidental Dropping</strong> - <strong id="acc_drop" ></strong></p>
		<p class="mb-0"><span id="lblmindad" >Minimum : 5,000</span></p>
	</div>
	<br>
	<div class="col-md-11_">
		<p class="mb-0"><strong>Robber/Burglary/Theft</strong> - <strong id="rbt" ></strong></p>
		<p class="mb-0"><span id="lblmindad" >Minimum : 10,000</span></p>
	</div>
</div>

<br />

<p class="mb-3"><strong>Subjectives</strong></p>

<div class="col-md-12_">
	<p>Equipment to be covered must have a clean loss record for the past 3 years.
Equipment with a history of losses are subject to rate surcharges or higher
deductibles and will be treated as a separate EEI account outside the Computer
Insurance program</p>
</div>

<br />

<div class="col-md-12_">
	<div id="warning_summary" name="warning_summary" class="error-msg" style="display: none">
	  Please check Privacy Policy, Terms & Conditions and Exclusion & Limitations
	</div>
</div>

<div class="form-check"> 
		<input class="form-check-input" type="checkbox" id="CBPrivacy" name="CBPrivacy" value="1"  <?php if(old('CBPrivacy')){ echo "checked";} ?> >
		<label class="form-check-label" for="CBPrivacy"> I AGREE with the <a href="#" data-toggle="modal" data-target="#privacyPolicy" class="text-color-secondary text-decoration-underline">Privacy Policy</a></label>
</div>

<div class="form-check"> 
		<input class="form-check-input" type="checkbox" id="CBTerms" name="CBTerms" value="1"  <?php if(old('CBTerms')){ echo "checked";} ?> >
		<label class="form-check-label" for="CBTerms"> I AGREE to the  <a href="#" data-toggle="modal" data-target="#termsConditions" class="text-color-secondary text-decoration-underline">Terms & Conditions</a></label>
</div>

<div class="form-check"> 
		<input class="form-check-input" type="checkbox" id="CBExclusion" name="CBExclusion" value="1"  <?php if(old('CBExclusion')){ echo "checked";} ?> >
		<label class="form-check-label" for="CBExclusion"> I AGREE with the <a href="#" data-toggle="modal" data-target="#exclusionslimitations" class="text-color-secondary text-decoration-underline">Exclusion & Limitations</a></label>
</div>
	
<div class="col-md-4_ text-center mt-5">
	<button  id="buy_insurance" name="buy_insurance" type="submit"  class="action buy_insurance btn btn-secondary form-control_">Buy Insurance</button>		         	     
</div>