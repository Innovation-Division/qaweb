<div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_pa_view" name="policyNo_pa_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_pa_view') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
        </div>
        <div class="col-md-4">
            <label>Status</label>
            <input id="status_pa_view" name="status_pa_view" type="text" readonly class="form-control input-lg" maxlength="100" value="{{ old('status_pa_view') }}">
        </div>
        <div class="col-md-4">
            <label>Created By</label>
            <input id="created_by_pa_view" name="created_by_pa_view" type="text" readonly class="form-control input-lg" maxlength="100" value="{{ old('created_by_pa_view') }}">
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
            <input id="Loss_date_pa_view" name="Loss_date_pa_view" type="text" class="form-control input-lg readonly" maxlength="100" value="{{ old('Loss_date_pa_view') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_pa_view" name="Loss_time_pa_view" type="text" class="form-control input-lg time-pickable readonly" maxlength="100" value="{{ old('Loss_time_pa_view') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>Where the accident happened?</label>
            <textarea  id="location_loss_pa_view" name="location_loss_pa_view" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_pa_view') }}</textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Contact No.</label>
            <input id="contact_no_pa_view" name="contact_no_pa_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('contact_no_pa_view') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_pa_view" name="email_address_pa_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_pa_view') }}">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
  