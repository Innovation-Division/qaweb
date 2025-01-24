

<div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4">
            <label>Enter Your Policy No. </label>
            <input id="policyNo" name="policyNo" type="text" class="form-control input-lg" maxlength="100" value="{{ old('policyNo') }}" placeholder="XX-XXX-XX-XXXXXXX-XX">
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
            <input id="driver" name="driver" type="text" class="form-control input-lg" maxlength="100" value="{{ old('driver') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Relationship to the insured </label>
            <input id="relationship_motor" name="relationship_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('relationship_motor') }}">
        </div>
        <div class="col-md-4"></div>        
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-4 form-group">
            <label>Date of Loss  </label>
            <input id="Loss_date" name="Loss_date" type="text" class="form-control input-lg readonly" maxlength="100" value="{{ old('Loss_date') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time" name="Loss_time" type="text" class="form-control input-lg time-pickable readonly" maxlength="100" value="{{ old('Loss_time') }}">
            
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-12">
            <label>Location of Loss</label>
            <textarea  id="location_loss" name="location_loss" class="form-control input-lg" cols="40" rows="4" >{{ old('location_loss') }}</textarea>
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
    <script src="{{ asset('/js/claim_policy_motor.js') }}"></script>

