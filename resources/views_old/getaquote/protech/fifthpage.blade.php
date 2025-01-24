<div class="col-md-12_">	
  <div class='wrapper'>
    <input  type="hidden" id="url" name="url" value="{{url('/')}}">
    <input  type="hidden" id="promotag" name="promotag" value="">
    <div id="warning_minimum_part_zero" name="warning_minimum_laptop_device" class="error-msg" style="display: none">
      Amount should not be 0.
    </div> 
    <h4 class="rfs-2-5 rfs-md-1-3">Please list part and specifications for modified or custom devices</h4>
    <br />
    <br />
    <div id="customFieldsfifth" class="parts-ins">
      <div class="row d-none d-lg-flex row-labels">
        <div class="col-md-2"><label>Parts</label></div>
        <div class="col-md-1 make-col"><label>Make</label></div>
        <div class="col-md-2"><label>Model</label></div>
        <div class="col-md-2"><label>Serial No</label></div>
        <div class="col-md-2"><label>Year Purchased</label></div>
        <div class="col-md-2 last"><label>Value</label></div>
        <div class="col-md-1 delete-row-part-col"></div>
      </div>
      <div id="part-body">
        <div class="row">	
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Parts</label>
              <input name="psrt_access_hardware[]" id="psrt_access_hardware" type="text" class="form-control input-lg personal_ifno_mobile " maxlength="100" value="Case">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="psrt_access_make[]" id="psrt_access_make" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. hp">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="psrt_access_model[]" id="psrt_access_model" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. v-197">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="psrt_access_serial[]" id="psrt_access_serial" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. ab12Ef34">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="psrt_access_value[]" id="psrt_access_value_case" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_case');vf_commafy('psrt_access_value_case', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-part-col justify-content-end">
            <button type="button" class="action_ delete-row_part btn btn-danger form-control_">
              <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 30 L30 2 M30 30 L2 2" />
              </svg>
              <span class="d-inline d-lg-none">Remove</span>
            </button>	
          </div>
        </div>

        <div class="row">	
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Parts</label>
              <input name="psrt_access_hardware[]" id="psrt_access_hardware_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Motherboard">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="psrt_access_make[]" id="psrt_access_make_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="psrt_access_model[]" id="psrt_access_model_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="psrt_access_serial[]" id="psrt_access_serial_motherboard" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="psrt_access_value[]" id="psrt_access_value_mb" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_mb');vf_commafy('psrt_access_value_mb', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-part-col justify-content-end">
            <button type="button" class="action_ delete-row_part btn btn-danger form-control_">
              <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 30 L30 2 M30 30 L2 2" />
              </svg>
              <span class="d-inline d-lg-none">Remove</span>
            </button>	
          </div>
        </div>


        <div class="row">	
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Parts</label>
              <input name="psrt_access_hardware[]" id="psrt_access_hardware_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Central Processing Unit (CPU)">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="psrt_access_make[]" id="psrt_access_make_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="psrt_access_model[]" id="psrt_access_model_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="psrt_access_serial[]" id="psrt_access_serial_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="psrt_access_value[]" id="psrt_access_value_cpu" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_cpu');vf_commafy('psrt_access_value_cpu', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-part-col justify-content-end">
            <button type="button" class="action_ delete-row_part btn btn-danger form-control_">
              <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 30 L30 2 M30 30 L2 2" />
              </svg>
              <span class="d-inline d-lg-none">Remove</span>
            </button>	
          </div>
        </div>

        <div class="row">	
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Parts</label>
              <input name="psrt_access_hardware[]" id="psrt_access_hardware_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Hard Disk Drive (HDD)">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="psrt_access_make[]" id="psrt_access_make_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="psrt_access_model[]" id="psrt_access_model_hdd"_hdd type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="psrt_access_serial[]" id="psrt_access_serial_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="psrt_access_value[]" id="psrt_access_value_hdd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_hdd');vf_commafy('psrt_access_value_hdd', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-part-col justify-content-end">
            <button type="button" class="action_ delete-row_part btn btn-danger form-control_">
              <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 30 L30 2 M30 30 L2 2" />
              </svg>
              <span class="d-inline d-lg-none">Remove</span>
            </button>	
          </div>
        </div>

        <div class="row">	
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Parts</label>
              <input name="psrt_access_hardware[]" id="psrt_access_hardware_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Solid State Drive (SSD)">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="psrt_access_make[]" id="psrt_access_make_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="psrt_access_model[]" id="psrt_access_model_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="psrt_access_serial[]" id="psrt_access_serial_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="psrt_access_value[]" id="psrt_access_value_ssd" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_ssd');vf_commafy('psrt_access_value_ssd', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-part-col justify-content-end">
            <button type="button" class="action_ delete-row_part btn btn-danger form-control_">
              <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 30 L30 2 M30 30 L2 2" />
              </svg>
              <span class="d-inline d-lg-none">Remove</span>
            </button>	
          </div>
        </div>


        <div class="row">	
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Parts</label>
              <input name="psrt_access_hardware[]" id="psrt_access_hardware_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" value="Cooling/Fans">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="psrt_access_make[]" id="psrt_access_make_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="psrt_access_model[]" id="psrt_access_model_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="psrt_access_serial[]" id="psrt_access_serial_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <select id="psrt_access_year" name="psrt_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year psrt_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="psrt_access_value[]" id="psrt_access_value_cf" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('psrt_access_value_cf');vf_commafy('psrt_access_value_cf', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-part-col justify-content-end">
            <button type="button" class="action_ delete-row_part btn btn-danger form-control_">
              <svg id="i-close" class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M2 30 L30 2 M30 30 L2 2" />
              </svg>
              <span class="d-inline d-lg-none">Remove</span>
            </button>	
          </div>
        </div>

      </div>
    </div>
  </div>
</div>	

<div class="text-end mb-5 mt-3">
  <button  id="5thpage_add" name="5thpage_add" type="button"  class="action 5thpage_add btn btn-secondary form-control_">
    Add More
  </button>    
</div>

<div class="text-center">
  <button  id="next_5thpage" name="next_5thpage" type="button"  class="action next_5thpage btn btn-secondary form-control_">View Quote</button>                   
</div>

<script type="text/javascript">
    // Remove criterion
  jQuery(document).on("click", ".delete-row_part", function () {
    $(this).closest('.row').remove();
    var colCount = $("#customFieldsfifth #part-body .row").length;
    if(colCount > 1){
      jQuery('.delete-row-part-col').css('display', 'flex');
    }else{
      jQuery('.delete-row-part-col').hide();
    }
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
</script>

 
