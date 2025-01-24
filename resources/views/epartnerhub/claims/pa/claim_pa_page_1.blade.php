<div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_pa" name="policyNo_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_pa') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4">
            <h6>Claim Information</h6>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Date of Loss  </label>
            <input id="Loss_date_pa" name="Loss_date_pa" type="text" class="form-control input-lg readonly" maxlength="100" value="{{ old('Loss_date_pa') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_pa" name="Loss_time_pa" type="text" class="form-control input-lg time-pickable readonly" maxlength="100" value="{{ old('Loss_time_pa') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>Where the accident happened?</label>
            <textarea  id="location_loss_pa" name="location_loss_pa" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_pa') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Contact No.</label>
            <input id="contact_no_pa" name="contact_no_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('contact_no_pa') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_pa" name="email_address_pa" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_pa') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
    <script src="{{ asset('/js/claim_policy_pa.js') }}"></script>