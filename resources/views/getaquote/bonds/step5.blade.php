<div class="col-md-12_ break-two"> <br> </div>
    <div class="table-data_ table-data1 table-wrapper">
        <div class="card">
            <h4 class="rfs-2-5 rfs-md-1-3 card-header" style="text-align: left;">List of Owner(s) </h4> <br>
            <div class="card-body">

                <div id='bond_list_of_owner'>
                    <div class="alert alert-success" id="bonds_list_owner01">
                        <span id="req_listowner"></span>
                    </div>
                    <div class="alert alert-danger d-none" id="bonds_list_owner02">
                            <span id="req_listowner_failed"></span>
                    </div>
                </div>

        <div class="col-md-4
        " style='padding:0px !important'>
            <div class="form-group">
                <label for="owner_name">Name</label>
                <input name="owner_name" id="owner_name" type="text" class="form-control input-lg owner_name" placeholder="*Name"> <span class="text-danger"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="fin_year">Position</label>
                <input name="owner_post" id="owner_post" type="text" class="form-control input-lg NoPaste " maxlength="100" placeholder="*Position" autocomplete="off"> <span class="text-danger"></span>
            </div>
        </div>
        <input name="assured_no_owner" id="assured_no_owner" type="hidden" class="form-control input-lg " maxlength="100" autocomplete="off"> <span class="text-danger"></span>
        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" id="sendform_owner" name="sendform_owner" class="btn btn-primary btn-block"><span class='fa fa-plus'></span></button>
            </div>
        </div>
    </div>
<input type='hidden' name='list_owner' id='list_owner' class='list_owner'>
<table id="owner_table" class="table table-bordered" style="width:100%">
    <thead>
        <tr>
            {{-- <th>id</th> --}}
            <th>Name</th>
            <th>Position</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
        </div>
    </div>


    <!-- END OF BOND-->

