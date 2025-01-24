<div class="col-md-12">
   <div class='wrapper'>
      <br/>
      <input  type="hidden" id="url" name="url" value="{{url('/')}}">
      <input  type="hidden" id="promotag" name="promotag" value="">
      <div id="warning_minimum_part_zero" name="warning_minimum_laptop_device" class="alert alert-danger" style="display: none">
         Amount should not be 0.
      </div>
      <h3><strong>Please list part and specifications for modified or custom devices</strong></h3>
      <table id="customFieldsfifth">
         <thead>
            <th style="width: 20%;text-align: center;">Parts</th>
            <th style="width: 15%;text-align: center;">Make</th>
            <th style="width: 15%;text-align: center;">Model</th>
            <th style="width: 20%;text-align: center;">Serial No</th>
            <th style="width: 15%;text-align: center;">Year Purchased</th>
            <th style="width: 15%;text-align: center;">Value</th>
         </thead>
         <tbody id="part-body">
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware" type="text" class="form-control input-lg personal_ifno_mobile " maxlength="100" value="Case"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. hp"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. v-197"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. ab12Ef34"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>
                  <div><input name="psrt_access_value[]" id="psrt_access_value_case" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_case');vf_commafy('psrt_access_value_case', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
            </tr>
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Motherboard"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>
                  <div><input name="psrt_access_value[]" id="psrt_access_value_mb" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_mb');vf_commafy('psrt_access_value_mb', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
            </tr>
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Central Processing Unit (CPU)"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>
                  <div><input name="psrt_access_value[]" id="psrt_access_value_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_cpu');vf_commafy('psrt_access_value_cpu', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
            </tr>
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Hard Disk Drive (HDD)"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model_hdd"_hdd type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>
                  <div><input name="psrt_access_value[]" id="psrt_access_value_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_hdd');vf_commafy('psrt_access_value_hdd', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
            </tr>
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Solid State Drive (SSD)"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>
                  <div><input name="psrt_access_value[]" id="psrt_access_value_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_ssd');vf_commafy('psrt_access_value_ssd', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
            </tr>
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Cooling/Fans"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>
                  <div><input name="psrt_access_value[]" id="psrt_access_value_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_cf');vf_commafy('psrt_access_value_cf', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
            </tr>
            <tr>
               <td>
                  <div><input name="psrt_access_hardware[]" id="psrt_access_hardware_ps" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Power Supply"></div>
               </td>
               <td>
                  <div><input name="psrt_access_make[]" id="psrt_access_make_ps" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_model[]" id="psrt_access_model_ps" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div><input name="psrt_access_serial[]" id="psrt_access_serial_ps" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"></div>
               </td>
               <td>
                  <div>
                     <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                     </select>
                  </div>
               </td>
               <td>

                  <div><input name="psrt_access_value[]" id="psrt_access_value_ps" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_ps');vf_commafy('psrt_access_value_cf', 2)" value="0.00"></div>
               </td>
               <td>
                  <div><i class="fa fa-times delete-row_part btn btn-danger" aria-hidden="true" ></i></div>
               </td>
               <input type="hidden" name="totalPartsAmount" id='totalPartsAmount'>
            </tr>
         </tbody>
      </table>
   </div>
</div>
<div class="col-md-12">
   <br>
</div>
<div class="col-md-12">
   <div class="col-md-2">
      <button id="5thpage_add" name="5thpage_add" type="button" class="action 5thpage_add btn btn-default form-control" style="min-width: 150px;min-height: 60px;color: #ffffff;display: block;background-color: #e4509a;margin-top: 3px;margin-left: -8px;">&nbsp;&nbsp; <i class="fa fa-plus"></i>
      </button>
   </div>
   <div class="col-md-2 col-md-offset-8">
      <button id="next_5thpage" name="next" type="button" class="next_5thpage btn btn-default device_loc_type_modified device_modified_no" style="min-width: 150px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;margin-left: 8px;">Next &nbsp;&nbsp;
      </button>
   </div>
   <!--   <div class="col-md-2 col-md-offset-8">
      <button id="next_5thpage" name="next_5thpage" type="button" class="action next_5thpage btn btn-default form-control" style="min-width: 150px;min-height: 60px;color: #ffffff;display: block;background-color: #008080;margin-top: 3px;margin-left: 8px;">View Quote &nbsp;&nbsp; <i class="fa fa-angle-right"></i>
      </button>
      </div> -->
</div>

<script type="text/javascript">
    // Remove criterion
  jQuery(document).on("click", ".delete-row_part", function () {

    var colCount = $("#customFieldsfifth tr").length;
    if(colCount >= 4){
      jQuery('.delete-row_part').show();
     }else{
      jQuery('.delete-row_part').hide();
     }    

      $(this).closest('tr').remove();
      return false;
  });
</script>
<script type="text/javascript">
   $('#psrt_access_value_case').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_case').val("0.00");
     }
   });
   $('#psrt_access_value_mb').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_mb').val("0.00");;
     }
   });
   $('#psrt_access_value_cpu').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_cpu').val("0.00");;
     }
   });
   $('#psrt_access_value_hdd').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_hdd').val("0.00");;
     }
   });
   $('#psrt_access_value_ssd').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_ssd').val("0.00");;
     }
   });
   $('#psrt_access_value_cf').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_cf').val("0.00");;
     }
   });
      $('#psrt_access_value_ps').change(function() {
     var tal = $(this).val();
     if(tal== "NaN.00"){
       $('#psrt_access_value_ps').val("0.00");;
     }
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