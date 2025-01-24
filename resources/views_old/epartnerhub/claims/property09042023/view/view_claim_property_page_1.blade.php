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
            <input id="location_loss_property_view" name="location_loss_property_view" type="text" class="form-control input-lg" maxlength="100" value="{{ old('location_loss_property_view') }}" placeholder="House No./Unit No./Floor No./Building/Street">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 ">
        <div class="col-md-4 form-group">
            <select  id="permanent_province_property_view" name="permanent_province_property_view" class="form-control selectpicker permanent_province_property_view selectb5 input-lg" data-style="input-lg  permanent_province_property_view" data-size="10"  data-live-search="true" >
                    <option value="">- Select Province -</option>   
                    @foreach($locations as $location)
                        <option value="{{$location->province}}">{{$location->province}}</option> 
                    @endforeach                    
            </select>
        </div>
        <div class="col-md-4 form-group"> 
            <select  id="permanent_municipality_property_view" name="permanent_municipality_property_view"  class="form-control selectpicker permanent_municipality_property_view selectb5 input-lg" data-style="input-lg permanent_municipality_property_view" data-size="10"  data-live-search="true">
                    <option value="">- Select City/Municipality -</option>            
            </select>
        </div>
        <div class="col-md-4 form-group">
            <select  id="permanent_barangay_property_view" name="permanent_barangay_property_view"  class="form-control selectpicker permanent_barangay_property_view selectb5  input-lginput-lg" data-style="input-lg permanent_barangay_property_view" data-size="10"  data-live-search="true">
                    <option value="">- Select Barangay-</option>           
            </select>
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

    