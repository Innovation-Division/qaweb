
<div class="col-md-12 form-group" >
    <div class="col-md-8 col-md-offset-4">
        <h6 style="font-size:75px !important;">File New Claims</h6>
    </div>
</div>
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
            <input id="Loss_date" name="Loss_date" type="text" class="form-control input-lg readonly" readonly maxlength="100" value="{{ old('Loss_date') }}">
        </div>
        <div class="col-md-4 form-group">
            <label>Estimate Loss Time </label>
            <input id="Loss_time" name="Loss_time" type="text" class="form-control input-lg time-pickable readonly" readonly maxlength="100" value="{{ old('Loss_time') }}">
            
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
            <select  id="claim_motor_permanent_province_not" name="claim_motor_permanent_province_not" class="form-control selectpicker claim_motor_permanent_province_not selectb5 input-lg" data-style="input-lg  claim_motor_permanent_province_not" data-size="10"  data-live-search="true" >
                    <option value="">- Select Province -</option> 
                    @foreach($locations as $location)
                        <option value="{{$location->province}}">{{$location->province}}</option> 
                    @endforeach           
            </select>
        </div>
        <div class="col-md-4 form-group"> 
            <select  id="permanent_municipality_motor_not" name="permanent_municipality_motor_not"  class="form-control selectpicker permanent_municipality_motor_not selectb5 input-lg" data-style="input-lg permanent_municipality_motor_not" data-size="10"  data-live-search="true">
                    <option value="">- Select City/Municipality -</option>            
            </select>
        </div>
        <div class="col-md-4 form-group">
            <select  id="permanent_barangay_motor_not" name="permanent_barangay_motor_not"  class="form-control selectpicker permanent_barangay_motor_not selectb5  input-lginput-lg" data-style="input-lg permanent_barangay_motor_not" data-size="10"  data-live-search="true">
                    <option value="">- Select Barangay-</option>           
            </select>
        </div> 
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>

