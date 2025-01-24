<div class="modal fade bs-example-modal-lg modal-light" id="claimsPropertyModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
        <div class="modal-content">
            <form method="post" action="{{ route('editpropertynewsave') }}"  enctype="multipart/form-data" style="background-color:#ffffff">
            {{ csrf_field() }}		
                <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="claimsPropertyModalView" style="color: white; font-size: 27px !important; font-weight: 700;">Property Claims Information</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hd_claim_motor_property_line" name="hd_claim_motor_property_line" value="FI">
                    <input type="hidden" id="hd_claim_motor_property_id" name="hd_claim_motor_property_id" value="">
                  
                    <input type="hidden" id="hd_claim_property_same_insured_view_" name="hd_claim_property_same_insured_view_" value="no">
                    <input type="hidden" id="hd_claim_property_view_same_insured" name="hd_claim_property_view_same_insured" value="no">
				    <input type="hidden" id="hd_claim_property_view_prem_paid" name="hd_claim_property_view_prem_paid" value="no">
				    <input type="hidden" id="hd_claim_property_view_within_inception" name="hd_claim_property_view_within_inception" value="no">
				    <input type="hidden" id="hd_claim_property_view_risk_insured" name="hd_claim_property_view_risk_insured" value="no">
				    <input type="hidden" id="hd_claim_property_view_morgagee" name="hd_claim_property_view_morgagee" value="no">
				    <input type="hidden" id="hd_claim_motor_property_view_recovery" name="hd_claim_motor_property_view_recovery" value="no">


                    @include('epartnerhub.claims.property.view.view_claim_property_page_1')
                    @include('epartnerhub.claims.property.view.view_claim_property_page_3')

                    <div class="container">
                        <div class="form-group">
                            <textarea id="status-box_property_view" name="status-box_property_view" class="form-control status-box_property" rows="3" placeholder="Enter your comment here..."></textarea>
                        </div>
                        <div class="button-group pull-right">
                            <p class="counter_property">250</p>
                            <a href="#" class="btn btn-property-comment-add btn-primary">Post</a>
                        </div>
                        <div class="col-md-12"> <br>
                            <ul id="props_id" name="props_name" class="posts_property" style="max-width 800px;">
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button id="clm_property_view_upload" name="clm_property_view_upload" type="submit"  class="btn btn-secondary">Submit</button>
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
                </div>
            </form>
        </div>
    </div>
</div>

<script>
   
</script>
<style>


.counter_property {
  display: inline;
  margin-top: 0;
  margin-bottom: 0;
  margin-right: 10px;
}
.posts_property {
  clear: both;
  list-style: none;
  padding-left: 0;
  width: 100%;
  text-align: left;
}
.posts_property li {
  background-color: #fff;
  border: 1.5px solid #d8d8d8;
  border-radius: 10px;
  padding-top: 10px;
  padding-left: 20px;
  padding-right: 20px;
  padding-bottom: 10px;
  margin-bottom: 10px;
  word-wrap: break-word;
  min-height: 130px;
  box-shadow:1px 1px 4px #888888;
}


</style>
<script src="{{ asset('/js/claim_policy_property_view_modal.js') }}"></script>


