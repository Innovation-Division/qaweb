<div class="col-md-12_ break-two"> <br> </div>
<div class="table-data_ table-data1 table-wrapper">
    <div class="card">
        <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Historical Data of Issued Bonds </h4> <br>
        <span style='padding-left:20px !important'>(Figures for the TOTAL are formulated) / Figures to be inputted on this portion can be extracted from IT Reports </span>
        <div class="card-body">

            <div class="alert alert-success" id="response_result"role="alert">
                <span id='response'></span>
              </div>

    <table id="historicaldata" class="table" style="width:90%">
        <thead>
          <tr>
            <th>TSI Distribution</th>
            <th>In-force Policies</th>
            <th style="text-align:center">Bonds being applied now</th>
            <th>TOTAL</th>
            <th>Expired Policies</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label>TSI Retention Share</label></td>
            <td> <div class="form-group"><input type="text" name="in_force_policies" id="in_force_policies" class='form-control'  onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)"></div></td>
            <td> <div class="form-group"><input type="text" name="bonds_applied" id="bonds_applied" class='form-control'  onkeyup="javascript:this.value=Comma(this.value);"  readonly></div></td>
            <td> <div class="form-group"><input type="text" name="total" id="total" class='form-control'  onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" readonly></div></td>
            <td> <div class="form-group"><input type="text" name="expired_policies" id="expired_policies" class='form-control'   onkeyup="javascript:this.value=Comma(this.value);"  onkeypress="return isNumber(event)"></div></td>

          </tr>
          <tr>
            <td><label>TSI Treaty Share</label></td>
            <td> <div class="form-group"><input type="text" name="in_force_policies1" id="in_force_policies1" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
            <td> <div class="form-group"><input type="text" name="bonds_applied1" id="bonds_applied1" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
            <td> <div class="form-group"><input type="text" name="total1" id="total1" class='form-control'  onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" readonly></div></td>
            <td> <div class="form-group"><input type="text" name="expired_policies1" id="expired_policies1" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
          </tr>
          <tr>
            <td><label>Local Facultative</label></td>
            <td> <div class="form-group"><input type="text" name="in_force_policies2" id="in_force_policies2" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
            <td> <div class="form-group"><input type="text" name="bonds_applied2" id="bonds_applied2" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
            <td> <div class="form-group"><input type="text" name="total2" id="total2" class='form-control'  onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);"readonly></div></td>
            <td> <div class="form-group"><input type="text" name="expired_policies2" id="expired_policies2" class='form-control'  onkeypress="return isNumber(event)"  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
          </tr>
          <tr>
            <td><label>Total</label></td>
            <td> <div class="form-group"><input type="text" name="total_1" id="total_1" class='form-control' readonly  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
            <td> <div class="form-group"><input type="text" name="total_2" id="total_2" class='form-control' readonly  onkeyup="javascript:this.value=Comma(this.value);"</div></td>
            <td> <div class="form-group"><input type="text" name="total_3" id="total_3" class='form-control' onkeypress="return isNumber(event)" onkeyup="javascript:this.value=Comma(this.value);" readonly></div></td>
            <td> <div class="form-group"><input type="text" name="total_4" id="total_4" class='form-control' readonly  onkeyup="javascript:this.value=Comma(this.value);"></div></td>
          </tr>
        </tbody>
      </table>
      <input type='hidden' name='update_tsi' id='update_tsi'>
      <input type='hidden' name='total_2_extra' id='total_2_extra'>
    <div class='col-md-4' style='padding-left:50px !important'>
        <button type="submit" id="sendform_distribution" name="sendform_distribution" class="btn btn-primary"><span class='fa fa-plus'></span></button>
        </div>
        <div class="col-md-12_ break-two"> <br> </div>
    </form>
    </div>

    <script type="text/javascript">


      $(document).ready(function() {
            $('#sendform_distribution').click(function(e){
                e.preventDefault();
                jQuery.noConflict();

            var trans_id = $("input[name='transno']").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            // var compute = parseFloat(jQuery('#total').val()) + parseFloat(jQuery('#total1').val()) + parseFloat(jQuery('#total2').val());
            // var formattedValue = compute.toLocaleString('en-PH');
            // jQuery('#total_3').val(formattedValue);
            $('#sendform_officer').html('Update...');
            var errornumber = 0;


                if ($('#in_force_policies').val() == "") {
                    $('#in_force_policies').fieldErrorState();
                    errornumber = 1;
                } else {

                    $('#in_force_policies').fieldSuccessState();
                }
                if ($('#in_force_policies1').val() == "") {
                    $('#in_force_policies1').fieldErrorState();
                    errornumber = 1;
                } else {

                    $('#in_force_policies1').fieldSuccessState();
                }
                if ($('#in_force_policies2').val() == "") {
                    $('#in_force_policies2').fieldErrorState();
                    errornumber = 1;
                } else {

                    $('#in_force_policies2').fieldSuccessState();
                }

                if ($('#bonds_applied').val() == "") {
                    $('#bonds_applied').fieldErrorState();
                    errornumber = 1;
                } else {

                    $('#bonds_applied').fieldSuccessState();
                }

                if ($('#bonds_applied1').val() == "") {
                    $('#bonds_applied1').fieldErrorState();
                    errornumber = 1;
                } else {

                    $('#bonds_applied1').fieldSuccessState();
                }

                if ($('#bonds_applied2').val() == "") {
                    $('#bonds_applied2').fieldErrorState();
                    errornumber = 1;
                } else {

                    $('#bonds_applied2').fieldSuccessState();
                }

                    if (errornumber == 1) {
                        $('#total_3').val('');
                        return false;
                    }
                    $('#sendform_distribution').html('Saving...');
                    jQuery.ajax({
                        url: "{{ url('/get-quote/adddistribution')}}",
                        method: "POST",
                        data: $('#form_tsi').serialize()+ "&trans_id=" + trans_id + "&_token=" + csrf_token,
                        //   dataType: 'json',
                        success: function(response){
                            $('#response_result').show();
                            $('#sendform_distribution').html('Add');
                            $('response_result').show();
                            $('#response').text(response.message);
                            //------------------------
                            setTimeout(function(){
                            $('#response_result').hide();
                            },10000);
                        }

                    });
            })
        });
        </script>
    <script type="text/javascript">
        $(document).ready(function() {


        // GET THE TOTAL OF TSI RETENTION SHARE
        $('input[name="in_force_policies"], input[name="bonds_applied"]').keyup(function() {
            var inForcePolicies = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
            var bondsApplied = parseFloat($('input[name="totalanualprem"]').val().replace(/,/g, '')) || 0;
            var total = inForcePolicies + bondsApplied;
            $('input[name="total"]').val(total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        });


      $('input[name="in_force_policies1"], input[name="bonds_applied1"]').keyup(function() {

        var inForcePolicies = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
        var bondsApplied = parseFloat($('input[name="bonds_applied"]').val().replace(/,/g, '')) || 0;
        var total2 = inForcePolicies + bondsApplied;
        $('input[name="total"]').val(total2.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var inForcePolicies1 = parseFloat($('input[name="in_force_policies1"]').val().replace(/,/g, '')) || 0;
        var bondsApplied1 = parseFloat($('input[name="bonds_applied1"]').val().replace(/,/g, '')) || 0;
        var total1 = inForcePolicies1 + bondsApplied1;
        $('input[name="total1"]').val(total1.toFixed(2));
      });

      $('input[name="in_force_policies2"], input[name="bonds_applied2"]').keyup(function() {

        var inForcePolicies = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
        var bondsApplied = parseFloat($('input[name="bonds_applied"]').val().replace(/,/g, '')) || 0;
        var total3 = inForcePolicies + bondsApplied;
        $('input[name="total"]').val(total3.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));


            var inForcePolicies2 = parseFloat($('input[name="in_force_policies2"]').val().replace(/,/g, '')) || 0;
            var bondsApplied2 = parseFloat($('input[name="bonds_applied2"]').val().replace(/,/g, '')) || 0;
            var total2 = inForcePolicies2 + bondsApplied2;
            $('input[name="total2"]').val(total2.toFixed(2));
        });
    });

            $('input[name="in_force_policies"], input[name="in_force_policies1"], input[name="in_force_policies2"]').keyup(function() {
                var inForcePolicies1 = parseFloat($('input[name="in_force_policies"]').val().replace(/,/g, '')) || 0;
                var inForcePolicies2 = parseFloat($('input[name="in_force_policies1"]').val().replace(/,/g, '')) || 0;
                var inForcePolicies3 = parseFloat($('input[name="in_force_policies2"]').val().replace(/,/g, '')) || 0;
                var total_1 = inForcePolicies1 + inForcePolicies2 + inForcePolicies3;
                $('input[name="total_1"]').val(total_1.toFixed(2));
            });


            $('input[name="expired_policies"], input[name="expired_policies1"], input[name="expired_policies2"]').change(function() {
                var expired_policies1 = parseFloat($('input[name="expired_policies"]').val().replace(/,/g, '')) || 0;
                var expired_policies2 = parseFloat($('input[name="expired_policies1"]').val().replace(/,/g, '')) || 0;
                var expired_policies3 = parseFloat($('input[name="expired_policies2"]').val().replace(/,/g, '')) || 0;
                var total_4 = expired_policies1 + expired_policies2 + expired_policies3;
                $('input[name="total_4"]').val(total_4.toFixed(2));
            });

            $('input[name="bonds_applied1"], input[name="bonds_applied2"]').change(function() {
                var total1 = parseFloat($('input[name="total"]').val().replace(/,/g, '')) || 0;
                var total2 = parseFloat($('input[name="total1"]').val().replace(/,/g, '')) || 0;
                var total3 = parseFloat($('input[name="total2"]').val().replace(/,/g, '')) || 0;
                var total_all = total1 + total2 + total3;
                var formattedValue = total_all.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('input[name="total_3"]').val(formattedValue);

                var bondsApplied = parseFloat($('input[name="bonds_applied"]').val().replace(/,/g, '')) || 0;
                var bondsApplied1 = parseFloat($('input[name="bonds_applied1"]').val().replace(/,/g, '')) || 0;
                var bondsApplied2 = parseFloat($('input[name="bonds_applied2"]').val().replace(/,/g, '')) || 0;
                var total_bond_applied = bondsApplied + bondsApplied1 + bondsApplied2;
                var total_bond_app = total_bond_applied.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('input[name="total_2"]').val(total_bond_app);
            });

            $('input[name="in_force_policies1"], input[name="in_force_policies2"]').keyup(function() {
                var get_amount = $('#totalanualprem').val();
                var clean_amt =  get_amount.replace(',', '');
                var bond_amount_total = parseFloat(clean_amt) || 0;
                var in_force_policies1 = parseFloat($('input[name="in_force_policies1"]').val().replace(/,/g, '')) || 0;
                var in_force_policies2 = parseFloat($('input[name="in_force_policies2"]').val().replace(/,/g, '')) || 0;
                var total_compute = bond_amount_total - in_force_policies1 - in_force_policies2;

                $('input[name="bonds_applied"]').val(total_compute.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });




</script>
