    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Name of Assured </label>
            <input id="fname_motor" name="fname_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('fname_motor') }}" placeholder="First Name">
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="mname_motor" name="mname_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('mname_motor') }}" placeholder="Middle Name">
        </div>
        <div class="col-md-4 form-group">
            <label>&nbsp;</label>
            <input id="lname_motor" name="lname_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('lname_motor') }}" placeholder="Last Name">
        </div>
    </div>
    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 form-group">
        <div class="col-md-12 form-group" style="margin-bottom:-15px;">
            <label id="lbl_third_party_motor_not">Is there a third party involved?</label> 
        </div> 
        <div class="col-md-12 break-two"><br></div> 
        <div  class="col-md-12 form-group" id="pwd_div_1">
            <button type="button" id="claim_motor_aget_yes_not" name="claim_motor_aget_yes_not" class="btn" >Yes &nbsp;&nbsp;</button>
            <button type="button" id="claim_motor_aget_no_not" name="claim_motor_aget_no_not" class="btn" >No &nbsp;&nbsp;</button>
        </div>
    </div>

    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label>How did the accident happen?</label>
            <textarea class="form-control" rows="5" id="acc_happen_motor" name="acc_happen_motor"></textarea>
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Extend of Damage </label>
            <input id="edamage_motor" name="edamage_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('edamage_motor') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>What is the purpose of the trip?</label>
            <input id="purpose_vec_motor" name="purpose_vec_motor" type="text" class="form-control input-lg" maxlength="100" value="{{ old('purpose_vec_motor') }}" >
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>Tel. No </label>
            <input id="tel_no_motor_not" name="tel_no_motor_not" type="text" class="form-control input-lg" maxlength="100" value="{{ old('tel_no_motor_not') }}"   >
        </div>
        <div class="col-md-4 form-group">
            <label>Mobile No</label>
            <input id="mobile_no_motor_not" name="mobile_no_motor_not" type="text" class="form-control input-lg" maxlength="15" value="{{ old('mobile_no_motor_not') }}" onkeydown="phoneMaskPHno()" maxlength="15" placeholder="(09XX) XXX-XXXX">
        </div>
        <div class="col-md-4 form-group">
            <label>Email Address</label>
            <input id="email_address_motor_not" name="email_address_motor_not" type="text" class="form-control input-lg" maxlength="100" value="{{ old('email_address_motor_not') }}">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-8 form-group">
            <label>No./Who were the passenger?</label>
            <input id="no_passenger_motor_not" name="no_passenger_motor_not" type="text" class="form-control input-lg" maxlength="100" value="{{ old('no_passenger_motor_not') }}" >
        </div>
        <div class="col-md-4 form-group">
            <label>Name of Reportee</label>
            <input id="name_reportee_motor_not" name="name_reportee_motor_not" type="text" class="form-control input-lg" maxlength="100" value="{{ old('name_reportee_motor_not') }}">
        </div>
    </div>
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label>The account has been mortgaged to</label>
            <input id="mortgaged" name="mortgaged" type="text" class="form-control input-lg" maxlength="100" value="{{ old('mortgaged') }}">
        </div>
    </div>

    
    <div class="col-md-12 break-two"><br></div>
    <div class="col-md-12 break-two"><br></div>
