
<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">Financial Highlights </h4> <br>
            <div class="card-body">

                    <div id='bond_financial_highlight'>
                        <div class="alert alert-success" id="bonds_financial_highlight01">
                            <span id="req_finance"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bonds_financial_highlight02">
                            <span id="req_finance_failed"></span>
                    </div>
                </div>

                <div class="form-group" style="text-align: center;">
                    <div class="col-md-2">
                       <!-- Empty cell to align with the first column in the table -->
                    </div>
                    <div class="col-md-3"  style="padding-left:0px !important;width: 24%">
                        <label for="year">Current FS</label><br>
                        <input name="financial_label" id="financial_label" type="text" class="financial_label form-control input-lg NoPaste personal_ifno_mobile">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3" style="margin-left: 10px !important;;padding-left: 0px !important;">
                        <label for="fin_amt">Previous FS</label><br>
                        <input name="financial_label2" id="financial_label2" type="text" class="form-control input-lg NoPaste personal_ifno_mobile financial_label2">
                    </div>
                </div>

                <table id="financial_table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th><span  id='fist_label'></span></th>
                            <th><span id='second_label'></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add the rows with your dynamic content here -->
                        @foreach($cocogen_bonds_financial_type as $item)
                        <tr>
                            <td>{{ $item->fin_type }}</td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class='form-control' id="{{ $item->fin_name }}" name="{{  $item->fin_name }}" value="" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                                </div>
                            </td>
                            <td> <div class="form-group">
                                <input type="text" class='form-control' id="{{  $item->fin_name.'_previous' }}" name="{{  $item->fin_name.'_previous' }}" value="" onkeyup="javascript:this.value=Comma(this.value);" onkeypress="return isNumber(event)">
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

    <input type="hidden" name='addnewfinance' id='addnewfinance' class='addnewfinance'>
    <div class='col-md-4' style='padding-left:50px !important'>
        <button type="submit" id="sendform_financial" name="sendform_financial" class="btn btn-primary"><span class='fa fa-plus'></span></button>
    </div>
    <div class="col-md-12_ break-two"> <br> </div>
    <div class="col-md-12_ break-two"> <br> </div>
    <form id="form_financial3" name="form_financial3" method="post" enctype="multipart/form-data" action="javascript:void(0)">
        {{csrf_field()}}
        <div class="col-md-12_ break-two"> <br> </div>
    <div class="form-group col-md-12" style="padding-left: 25px;">
        <label for="remarks" id='bonds_label'>Remarks</label>
        <div id="financial_remarks" class="financial_remarks"></div>
        <textarea class="form-control fin_remarks"  name='fin_remarks' id="fin_remarks" rows="3"></textarea>
    </div>
    <div class='col-md-4' style='padding-left:50px !important'>
    <button type="submit" id="sendform_financial3" name="sendform_financial3" class="btn btn-primary">Post Remarks</button>
    </div>
    <div class="col-md-12_ break-two"> <br> </div>
</form>
</div>
</div>
</div>


<script type="text/javascript">


$('#financial_label').keyup(function() {
      $('#fist_label').text($('#financial_label').val());
    });
    $('#financial_label2').keyup(function() {
      $('#second_label').text($('#financial_label2').val());
    });


$(document).ready(function () {
    var table = jQuery('#financial_table').DataTable({
        searching: false,
        paging: false,
        info: false,
        responsive: false,
        processing: false,
        serverSide: false,
        ordering: false,

    });


    $('#add_button').click(function () {
        var data = table.$('input, select').serialize();
        alert('The following data would have been submitted to the server: \n\n' + data.substr(0, 120) + '...');
        return false;
    });
});


</script>



    <!-- END OF BOND-->

