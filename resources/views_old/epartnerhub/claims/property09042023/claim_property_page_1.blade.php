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
            <input id="location_loss_property" name="location_loss_property" type="text" class="form-control input-lg" maxlength="100" value="{{ old('location_loss_property') }}" placeholder="House No./Unit No./Floor No./Building/Street">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 ">
        <div class="col-md-4 form-group">
            <select  id="permanent_province_property" name="permanent_province_property" class="form-control selectpicker permanent_province_property selectb5 input-lg" data-style="input-lg  permanent_province_property" data-size="10"  data-live-search="true" >
                    <option value="">- Select Province -</option> 
                    @foreach($locations as $location)
                        <option value="{{$location->province}}">{{$location->province}}</option> 
                    @endforeach               
            </select>
        </div>
        <div class="col-md-4 form-group"> 
            <select  id="permanent_municipality_property" name="permanent_municipality_property"  class="form-control selectpicker permanent_municipality_property selectb5 input-lg" data-style="input-lg permanent_municipality_property" data-size="10"  data-live-search="true">
                    <option value="">- Select City/Municipality -</option>            
            </select>
        </div>
        <div class="col-md-4 form-group">
            <select  id="permanent_barangay_property" name="permanent_barangay_property"  class="form-control selectpicker permanent_barangay_property selectb5  input-lginput-lg" data-style="input-lg permanent_barangay_property" data-size="10"  data-live-search="true">
                    <option value="">- Select Barangay-</option>           
            </select>
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