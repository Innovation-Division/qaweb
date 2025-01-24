<div class="col-md-12" style="margin-bottom:-15px;">
    <h1>Additional Car Information</h1>   
</div> 
<div class="col-md-4">
    <label>MV File No.</label>
    <input id="mvfileno" name="mvfileno" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('mvfileno') }}" >
</div> 
<div class="col-md-4">
    <label>Plate No.</label>
    <input id="plateno" name="plateno" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('plateno') }}" >
</div> 
<div class="col-md-4">
    <label>Engine No.</label>
    <input id="engineno" name="engineno" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('engineno') }}" >
</div> 
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-4">
    <label>Color</label>
    <input id="color" name="color" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('color') }}" >
</div> 
<div class="col-md-4">
    <label>Conduction sticker</label>
    <input id="conduction" name="conduction" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('conduction') }}" >
</div> 
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12" style="margin-bottom:-15px;">
    <h1>Period of Insurance</h1>   
</div> 
<div class="col-md-4">
    <label>Policy Incept Date</label>
    <input id="policyincept" name="policyincept" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('policyincept') }}" >
</div> 
<div class="col-md-4">
    <label>Mortgagee</label>
    <input id="morgagee" name="morgagee" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('morgagee') }}" >
</div> 

<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12" style="margin-bottom:-15px;">
    <h3>Do you have agent?</h3>   
</div> 
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-12 break-two"><br></div>  
 <div  class="col-md-12" id="pwd_div_1">
    <button type="button" id="btn_pwd_yes" name="btn_pwd_yes" class="btn" >Yes &nbsp;&nbsp;</button>
    <button type="button" id="btn_pwd_no" name="btn_pwd_no" class="btn" >No &nbsp;&nbsp;</button>
</div>
<div class="col-md-12 break-two"><br></div> 
<div id="divagent" >
  <div class="col-md-4">
      <label>Agent No</label>
      <input id="agentno" name="agentno" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('agentno') }}" >
  </div> 
  <div class="col-md-4">
      <label>Agent Name</label>
      <input id="agentname" name="agentname" type="text" class="form-control input-lg" maxlength="100"  value="{{ old('agentname') }}" >
  </div> 
</div>
<div class="col-md-12">
    <label for="address"> Present Address</label> 
    <input name="residence_address" id="residence_address" type="text" class="form-control input-lg" maxlength="100" placeholder="House No./Unit No./Floor No./Building/Street">
</div>     
<div class="col-md-12 break-two"><br></div>  
<div class="col-md-4 ">
    <select  id="residence_province" name="residence_province" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-residence_province" data-size="10"  data-live-search="true" >
            <option value="">- Select Province -</option>            
    </select>
</div>
<div class="col-md-4 "> 
    <select  id="residence_municipality" name="residence_municipality"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-residence_municipality" data-size="10"  data-live-search="true">
            <option value="">- Select City/Municipality -</option>            
    </select>
 </div>
<div class="col-md-4 ">
    <select  id="residence_barangay" name="residence_barangay"  class="form-control selectpicker address_mobile input-lg" data-style="input-lg btn-white-residence_barangay" data-size="10"  data-live-search="true">
            <option value="">- Select Barangay-</option>           
    </select>
</div> 
<style type="text/css">
  #btn_pwd_no,
  #btn_pwd_yes{
    min-width: 120px;
    min-height: 60px;
    background-color: #C0C0C0;
    color: #000000;
    margin-right: 15px;
  }
</style>
 <script type="text/javascript">
   $(document).ready(function(){
    var _token = jQuery('input[name="_token"]').val();
    var url = jQuery('input[name="url"]').val();
    jQuery.ajax({
        url:url + '/api/covid/province/get',
        method:"GET",
        data:{ _token:_token}, 
        success:function(result)
        {         
          console.log('asdf');
            jQuery.each(result, function(key, value){
              console.log('test');
                $('#residence_province').append($('<option>', { 
                    value: value.province,
                    text : value.province 
                }));

                $('#mailing_province').append($('<option>', { 
                    value: value.province,
                    text : value.province 
                }));

                $('#device_province').append($('<option>', { 
                    value: value.province,
                    text : value.province 
                }));

            })       
          }
        })

  jQuery('#residence_province').change(function(){
    alert('sdf');
      if(jQuery(this).val() != '')
      {         
          var province = jQuery(this).val();   
      var _token = jQuery('input[name="_token"]').val();
        jQuery.ajax({
          url:'{{url('/')}}' + '/api/covid/city/get',
            method:"GET",
            data:{ _token:_token,province:province}, 
            success:function(result)
            {        
              jQuery('#residence_municipality').empty();
              $('#residence_municipality').append($('<option>', { 
                value: "",
                text : "- Select City/Municipality -"
            }));
              jQuery.each(result, function(key, value){
                $('#residence_municipality').append($('<option>', { 
                value: value.city,
                text : value.city 
            }));            
              })  
              jQuery('#residence_municipality').selectpicker("refresh"); 
            }
        })
      }
    }); 
 jQuery('#residence_municipality').change(function(){
      if(jQuery(this).val() != '')
      {         
          var city = jQuery(this).val();   
      var _token = jQuery('input[name="_token"]').val();
        jQuery.ajax({
          url:'{{url('/')}}' + '/api/covid/barangay/get',
            method:"GET",
            data:{ _token:_token,city:city}, 
            success:function(result)
            {        
              jQuery('#residence_barangay').empty();
              $('#residence_barangay').append($('<option>', { 
                value: "",
                text : "- Select Barangay -"
            }));
              jQuery.each(result, function(key, value){
                $('#residence_barangay').append($('<option>', { 
                value: value.barangay,
                text : value.barangay 
            }));            
              })  
              jQuery('#residence_barangay').selectpicker("refresh"); 
            }
        })
      }
    });


 </script>