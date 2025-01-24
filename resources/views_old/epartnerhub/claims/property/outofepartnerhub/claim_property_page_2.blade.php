<div class="col-md-12 break-two"><br></div>
    <div class="col-md-6">
        <div class="col-md-12" >
            <label id="lbl_claim_property_same_insured">Is the claimnant the same as the insured in the policy? </label> 
        </div> 
        <div  class="col-md-12">
            <button type="button" id="claim_property_same_insured_yes" name="claim_property_same_insured_yes" class="btn btnradiobutton" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_property_same_insured_no" name="claim_property_same_insured_no" class="btn btnradiobutton" >No &nbsp;&nbsp;</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12" >
            <label id="lbl_claim_property_prem_paid">Is the premium paid? </label> 
        </div> 
        <div  class="col-md-12">
            <button type="button" id="claim_property_prem_paid_yes" name="claim_property_prem_paid_yes" class="btn btnradiobutton" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_property_prem_paid_no" name="claim_property_prem_paid_no" class="btn btnradiobutton" >No &nbsp;&nbsp;</button>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-6">
        <div class="col-md-12" >
            <label id="lbl_claim_property_within_inception">Is the date of loss within the inception / term of the policy?</label> 
        </div> 
        <div  class="col-md-12">
            <button type="button" id="claim_property_within_inception_yes" name="claim_property_within_inception_yes" class="btn btnradiobutton" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_property_within_inception_no" name="claim_property_within_inception_no" class="btn btnradiobutton" >No &nbsp;&nbsp;</button>
        </div>
        <div class="col-md-12 break-two"><br></div>
        <div class="col-md-12" >
            <label  id="lbl_claim_property_risk_insured">Is the affected risk the same as the risk insured in the policy? </label> 
        </div> 
        <div  class="col-md-12">
            <button type="button" id="claim_property_risk_insured_yes" name="claim_property_risk_insured_yes" class="btn btnradiobutton" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_property_risk_insured_no" name="claim_property_risk_insured_no" class="btn btnradiobutton" >No &nbsp;&nbsp;</button>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12 form-group">
            <label>Is the damage directly related to the accident?</label>
            <textarea class="form-control" rows="5" id="relate_accident_property" name="relate_accident_property"></textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-6">
        <div  class="col-md-12 form-group">
            <label>The account has been mortgaged to </label>
            <input id="morgaged_to_property" name="morgaged_to_property" type="text" class="form-control input-lg"  value="{{ old('morgaged_to_property') }}" >
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12 " >
            <label id="lbl_claim_property_morgagee">Are the required documents complete? </label> 
        </div> 
        <div  class="col-md-12">
            <button type="button" id="claim_property_morgagee_yes" name="claim_property_morgagee_yes" class="btn btnradiobutton" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_property_morgagee_no" name="claim_property_morgagee_no" class="btn btnradiobutton" >No &nbsp;&nbsp;</button>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>