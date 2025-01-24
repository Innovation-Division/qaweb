

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
            <label>Relationship to the driver </label>
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
            <input id="location_loss" name="location_loss" type="text" class="form-control input-lg" maxlength="100" value="{{ old('location_loss') }}" placeholder="House No./Unit No./Floor No./Building/Street">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group" >
        <div class="col-md-4 form-group">
            <select  id="claim_motor_permanent_province" name="claim_motor_permanent_province" class="form-control selectpicker claim_motor_permanent_province selectb5 input-lg" data-style="input-lg  claim_motor_permanent_province" data-size="10"  data-live-search="true" >
                    <option value="">- SELECT PROVINCE -</option> 
                    @foreach($locations as $location)
                        <option value="{{$location->province}}">{{$location->province}}</option> 
                    @endforeach           
            </select>
        </div>
        <div class="col-md-4 form-group"> 
            <select  id="permanent_municipality_motor" name="permanent_municipality_motor"  class="form-control selectpicker permanent_municipality_motor selectb5 input-lg" data-style="input-lg permanent_municipality_motor" data-size="10"  data-live-search="true">
            </select>
        </div>
        <div class="col-md-4 form-group">
            <select  id="permanent_barangay_motor" name="permanent_barangay_motor"  class="form-control selectpicker permanent_barangay_motor selectb5  input-lginput-lg" data-style="input-lg permanent_barangay_motor" data-size="10"  data-live-search="true">
            </select>
        </div> 
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>

