    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_property_view" name="policyNo_property_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_property_view') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
        </div>
        <div class="col-md-4">
            <label>Status</label>
            <input id="status_property_view" name="status_property_view" type="text" readonly class="form-control input-lg" maxlength="100" value="{{ old('status_property_view') }}">
        </div>
        <div class="col-md-4">
            <label>Created By</label>
            <input id="created_by_property_view" name="created_by_property_view" type="text" readonly class="form-control input-lg" maxlength="100" value="{{ old('created_by_property_view') }}">
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
            <input id="Loss_date_property_view" name="Loss_date_property_view" type="text" class="form-control input-lg readonly" maxlength="100" value="{{ old('Loss_date_property_view') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_property_view" name="Loss_time_property_view" type="text" class="form-control input-lg time-pickable readonly" maxlength="100" value="{{ old('Loss_time_property_view') }}" >
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>Location of Loss</label>
            <textarea  id="location_loss_property_view" name="location_loss_property_view" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_property_view') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Contact No.</label>
            <input id="contact_no_property_view" name="contact_no_property_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('contact_no_property_view') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_property_view" name="email_address_property_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_property_view') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>

    