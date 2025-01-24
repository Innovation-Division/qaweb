<div class="col-md-12_">	
  <div class='wrapper'>
    <div id="warning_no_device" name="warning_no_device" class="error-msg" style="display: none">
      Please enter 1 or more device/s.
    </div>  
    <div id="warning_max_laptop" name="warning_no_device" class="error-msg" style="display: none">
      Max Amount for Laptop is 150,000.00
    </div>  
    <div id="warning_minimum_device_zero" name="warning_minimum_laptop_device" class="error-msg" style="display: none">
      Amount should not be 0.
    </div> 
    <h4 class="rfs-2-5 rfs-md-1-3">Please fill out the details of the device/s and accessories you would like to insure.</h4>
    <br />
    <br />
    <div id="customFields" class="devices-ins">
      <div class="row d-none d-lg-flex row-labels">
        <div class="col-md-2"><label>Hardware</label></div>
        <div class="col-md-1 make-col"><label>Make</label></div>
        <div class="col-md-2"><label>Model</label></div>
        <div class="col-md-2"><label>Serial No</label></div>
        <div class="col-md-2"><label>Year Purchased</label></div>
        <div class="col-md-2 last"><label>Value</label></div>
        <div class="col-md-1 delete-row-col" style="display: none;"></div>
      </div>
      <div id="hardware-body">
        <div class="row">
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Hardware</label>
              <input name="device_access_hardware[]" id="device_access_hardware" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. monitor">
            </div>
          </div>
          <div class="col-12 col-lg-1 make-col">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Make</label>
              <input name="device_access_make[]" id="device_access_make" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. hp">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Model</label>
              <input name="device_access_model[]" id="device_access_model" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. v-197">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Serial No</label>
              <input name="device_access_serial[]" id="device_access_serial" type="text" class="form-control input-lg personal_ifno_mobile palceholdermod" maxlength="100" placeholder="ex. ab12Ef34">
            </div>
          </div>
          <div class="col-12 col-lg-2">
            <div class="form-group">
              <label class="d-block d-lg-none">Year Purchased</label>
              <div id="divvv_year">
                <select id="device_access_year" name="device_access_year[]" class="form-control selectpicker address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year device_access_year" data-size="10"  data-live-search="true" >
                  @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>            
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-2 last">
            <div class="form-group layout1">
              <label class="d-block d-lg-none">Value</label>
              <input name="device_access_value[]" id="device_access_value" type="text" class="form-control input-lg personal_ifno_mobile device_access_value" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onchange="vf_clean_number('device_access_value');vf_commafy('device_access_value', 2)" value="0.00">
            </div>
          </div>
          <div class="col-12 col-lg-1 delete-row-col justify-content-end" style="display: none;">
            <button type="button" class="action_ delete-row btn btn-danger form-control_">
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

<div id="divvv" style="display: none;">
  <select  id="copy_select" name="copy_select" class="form-control  address_mobile input-lg selectb5" data-style="input-lg  btn-white-device_access_year" data-size="10"  data-live-search="true" >
    @foreach($years as $year)
      <option value="{{$year}}">{{$year}}</option>            
    @endforeach
  </select>
</div>

<div>
	<div class="text-end mb-5 mt-3">
		<button id="4thpage_add" name="4thpage_add" type="button" class="action 4thpage_add btn btn-secondary form-control_">
      Add More
    </button>	
	</div>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="agent_id">Agent ID</label>
        <input name="agent_id" id="agent_id" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="promo">Promo Code</label>
        <input name="promo" id="promo" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100">
      </div>
    </div>
    <div class="col-md-4 text-end d-grid gap-2">
      <label class="d-none d-lg-block invisible">View Quote</label>
      <div id="div_view_4thpage">
        <button id="view_4thpage" name="view_4thpage" type="button"  class="action view_4thpage btn btn-secondary form-control_">View Quote</button>		
      </div>      	     
    </div>
  </div>
</div>
<div id="div_next_4thpage" class="text-center mt-5">
  <button id="next_4thpage" name="next_4thpage" type="button"  class="action next_4thpage btn btn-secondary form-control_">Next</button>	
</div>

<script type="text/javascript">
// Remove criterion
jQuery(document).on("click", ".delete-row", function () {
  $(this).closest('.row').remove();
  var colCount = $("#customFields #hardware-body .row").length;
  if (colCount > 1) {
    jQuery('.delete-row-col').css('display', 'flex');
  } else {
    jQuery('.delete-row-col').hide();
  }    
  return false;
});
</script>

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




