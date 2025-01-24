
<!--START -->
<div class="col-md-12" > 
  <button type='button' class=" back5 linkbutton"><< Back</button><br>
<div class='wrapper'>
<br/>
<div id="warning_no_device" name="warning_no_device" class="alert alert-danger" style="display: none">
  Please enter 1 or more device/s.
</div>  
<div id="warning_max_laptop" name="warning_no_device" class="alert alert-danger" style="display: none">
  Max Amount for Laptop is 150,000.00
</div>  
<div id="warning_minimum_device_zero" name="warning_minimum_laptop_device" class="alert alert-danger" style="display: none">
  Amount should not be 0.
</div> 
<h3><strong>Please fill out the details of the device/s and accessories you would like to insure. </strong></h3>
  <table id="customFields">
    <thead> 
      <th style="width: 20%;text-align: center;">Hardware</th>
      <th style="width: 15%;text-align: center;">Make</th>
      <th style="width: 15%;text-align: center;">Model</th>
      <th style="width: 20%;text-align: center;">Serial No</th>
      <th style="width: 15%;text-align: center;">Year Purchased</th>
      <th style="width: 15%;text-align: center;">Value</th>
    </thead>
    <tbody id="hardware-body">
     <tr>  
                  <td><div><input name="device_access_hardware[]" id="device_access_hardware" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. monitor"></div></td>
                  <td><div><input name="device_access_make[]" id="device_access_make" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. hp"></div></td>
                  <td><div><input name="device_access_model[]" id="device_access_model" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. v-197"></div></td>
                  <td><div><input name="device_access_serial[]" id="device_access_serial" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. ab12Ef34"></div></td>
                  <td><div id="divvv_year">
                    <select  id="device_access_year" name="device_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year device_access_year" data-size="10"  data-live-search="true" >
                      @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>            

                      @endforeach
                    </select>
                  </div></td>

                  <td><div><input name="device_access_value[]" id="device_access_value" type="text" class="form-control input-lg personal_ifno_mobile device_access_value" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('device_access_value');vf_commafy('device_access_value', 2)" value="0.00"></div></td>
                  <td><div><i class="fa fa-times delete-row btn btn-danger" aria-hidden="true"  style="display: none;"></i> </div></td>
                </tr>
    </tbody>
  </table>
</div>
</div>
      <div id="divvv" style="display: none;">
          <select  id="copy_select" name="copy_select" class="form-control  address_mobile input-lg" data-style="input-lg  btn-white-device_access_year" data-size="10"  data-live-search="true" >
            @foreach($years as $year)
              <option value="{{$year}}">{{$year}}</option>            

            @endforeach
          </select>
      </div>
<div class="col-md-12"><br></div>  

<input type="hidden" name="deviceTotalAmount" id='deviceTotalAmount' class='deviceTotalAmount'>
<div class="col-md-12">
  <div class="col-md-2">
    <label for="promo">&nbsp;</label>

    <button  id="4thpage_add" name="4thpage_add" type="button"  class=" 4thpage_add btn btn-default form-control" style="min-width: 150px;min-height: 60px;color: #ffffff;display: block;background-color: #e4509a;margin-top: 0px;margin-left: -8px;">&nbsp;&nbsp;<i class="fa fa-plus"></i></button>  
  </div>
  <div class="col-md-2">
</div>
  <div class="col-md-2">
    <label for="promo">&nbsp;</label>
<!--     <div id="div_view_4thpage">
      <button  id="view_4thpage" name="view_4thpage" type="button"  class="view_4thpage btn btn-default form-control" style="min-width: 150px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 0ssspx;margin-left: 8px;">View Quote &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button>   
    </div>
 -->
    <div id="div_next_4thpage">
        <button  id="next_4thpage" name="next_4thpage" type="button"  class="next_4thpage btn btn-default form-control" style="min-width: 150px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 0ssspx;margin-left: 8px;">Next &nbsp;&nbsp;<i class="fa fa-angle-right"></i></button> 
    </div>

    
                   
  </div>
</div>

<!-- ENDING-->

 

<script type="text/javascript">
function myFunction(value) {
  
  this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
}

  jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
</script>
<script type="text/javascript">
  const input = document.querySelector('.device_access_year');
  const min = '<?php echo $year3minus ?>';
  const max ='<?php echo $yeartoday ?>';

  input.addEventListener('keydown', e => {
    if (e.key.length <= 1) {
      if (e.key == +e.key && e.key !== ' ') {
        const inputValue = e.target.value;
        if (inputValue == '' && e.key == '0') e.preventDefault();
        const newVal = inputValue + +e.key;
        if (newVal < min) {
          e.target.value = min;
          triggerError(e.target);
          e.preventDefault();
        } else if (newVal > max) {
          e.target.value = max;
          triggerError(e.target);
          e.preventDefault();
        }
      } else {
        e.preventDefault();
      }
    }
  })


// input.addEventListener('onpaste', e => e.preventDefault()); 
input.onpaste = e => e.preventDefault();


const triggerError = input =>  {
  input.classList.add('input--error');
  setTimeout(() => input.classList.remove('input--error'), 100)
}
</script>
<script type="text/javascript">
    $('.device_access_value').change(function() {

    var tal = $(this).val();
    if(tal== "NaN.00"){
      $('#device_access_value').val("0.00");
    }
   
    });
</script>




