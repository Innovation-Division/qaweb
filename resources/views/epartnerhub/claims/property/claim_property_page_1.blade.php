    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_property" name="policyNo_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_property') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
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
            <input id="Loss_date_property" name="Loss_date_property" type="text" class="form-control input-lg readonly" maxlength="100" value="{{ old('Loss_date_property') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_property" name="Loss_time_property" type="text" class="form-control input-lg time-pickable readonly" maxlength="100" value="{{ old('Loss_time_property') }}" >
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>Location of Loss</label>
            <textarea  id="location_loss_property" name="location_loss_property" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_property') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Contact No.</label>
            <input id="contact_no_property" name="contact_no_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('contact_no_property') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_property" name="email_address_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_property') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
    <script src="{{ asset('/js/claim_policy_property.js') }}"></script>