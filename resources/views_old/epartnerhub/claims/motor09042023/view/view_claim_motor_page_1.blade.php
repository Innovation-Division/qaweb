

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
            <label>Relationship to the driver </label>
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
            <input id="location_loss_view" name="location_loss_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('location_loss_view') }}" placeholder="House No./Unit No./Floor No./Building/Street">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group" >
        <div class="col-md-4 form-group">
            <select  id="claim_motor_permanent_province_view" name="claim_motor_permanent_province_view" class="form-control selectpicker btn-claim_motor_permanent_province_view selectb5 input-lg" data-style="input-lg  btn-claim_motor_permanent_province_view" data-size="10"  data-live-search="true" >
                    <option value="">- Select Province -</option>   
                    @foreach($locations as $location)
                        <option value="{{$location->province}}">{{$location->province}}</option> 
                    @endforeach                    
            </select>
        </div>
        <div class="col-md-4 form-group"> 
            <select  id="permanent_municipality_motor_view" name="permanent_municipality_motor_view"  class="form-control selectpicker permanent_municipality_motor_view selectb5 input-lg" data-style="input-lg permanent_municipality_motor_view" data-size="10"  data-live-search="true">
                    <option value="">- Select City/Municipality -</option>            
            </select>
        </div>
        <div class="col-md-4 form-group">
            <select  id="permanent_barangay_motor_view" name="permanent_barangay_motor_view"  class="form-control selectpicker permanent_barangay_motor_view selectb5  input-lginput-lg" data-style="input-lg permanent_barangay_motor_view" data-size="10"  data-live-search="true">
                    <option value="">- Select Barangay-</option>           
            </select>
        </div> 
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>

