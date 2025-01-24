

<div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4">
            <label>Enter Your Policy No. </label>
            <input id="policyNo_view" name="policyNo_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo_view') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
        </div>
        <div class="col-md-4">
            <label>Status</label>
            <input id="status_motor_view" name="status_motor_view" type="text" readonly class="form-control input-lg" maxlength="100" value="{{ old('status_motor_view') }}"    >
        </div>
        <div class="col-md-4">
            <label>Created By</label>
            <input id="created_by_view" name="created_by_view" type="text" readonly class="form-control input-lg" maxlength="100" value="{{ old('created_by_view') }}"  >
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4">
            <h6>Claim Information</h6>
        </div>
    </div>
    <div class="col-md-12 form-group">
        <div class="col-md-4 form-group">
            <label>Driver </label>
            <input id="driver_view" name="driver_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('driver_view') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Relationship to the insured </label>
            <input id="relationship_motor_view" name="relationship_motor_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('relationship_motor_view') }}">
        </div>
        <div class="col-md-4"></div>        
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4 form-group">
            <label>Date of Loss  </label>
            <input id="Loss_date_view" name="Loss_date_view" type="text" class="form-control input-lg readonly" maxlength="100" value="{{ old('Loss_date_view') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time_view" name="Loss_time_view" type="text" class="form-control input-lg time-pickable readonly" maxlength="100" value="{{ old('Loss_time_view') }}">
            
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-12">
            <label>Location of Loss</label>
            <textarea  id="location_loss_view" name="location_loss_view" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss_view') }}</textarea>
        </div>
    </div>

