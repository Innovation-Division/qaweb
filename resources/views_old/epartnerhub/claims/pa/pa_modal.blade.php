<div class="modal fade bs-example-modal-lg modal-light" id="claimsPAModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
        <div class="modal-content">
        <form method="post" action="{{ route('editpaClaimnewsave') }}"  enctype="multipart/form-data" style="background-color:#ffffff">
        {{ csrf_field() }}		
                <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="claimsPAModalView" style="color: white; font-size: 27px !important; font-weight: 700;">Personal Accident Claims Information</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hd_claim_motor_pa_line" name="hd_claim_motor_pa_line" value="FI">
                    <input type="hidden" id="hd_claim_motor_pa_id" name="hd_claim_motor_pa_id" value="">
                    <input type="hidden" id="hd_claim_pa_same_insured_view" name="hd_claim_pa_same_insured_view" value="no">
                    <input type="hidden" id="hd_claim_pa_within_inception_view" name="hd_claim_pa_within_inception_view" value="no">
                    <input type="hidden" id="hd_claim_pa_prem_paid_view" name="hd_claim_pa_prem_paid_view" value="no">
                    <input type="hidden" id="hd_claim_pa_required_doc_view" name="hd_claim_pa_required_doc_view" value="no">
                    <input type="hidden" id="hd_claim_pa_not_submitted_view" name="hd_claim_pa_not_submitted_view" value="no">
                    <input type="hidden" id="hd_claim_pa_checklist_accomplished_view" name="hd_claim_pa_checklist_accomplished_view" value="no">
                    <input type="hidden" id="hd_claim_motor_pa_recovery" name="hd_claim_motor_pa_recovery" value="no">
                        @include('epartnerhub.claims.pa.view.view_claim_pa_page_1')
                        @include('epartnerhub.claims.pa.view.view_claim_pa_page_3')
                    <div class="container">
                        <div class="form-group">
                            <textarea id="status-box_pa_view" name="status-box_pa_view" class="form-control status-box_pa" rows="3" placeholder="Enter your comment here..."></textarea>
                        </div>
                        <div class="button-group pull-right">
                            <p class="counter_pa">250</p>
                            <a href="#" class="btn btn-pa-comment-add btn-primary">Post</a>
                        </div>
                        <div class="col-md-12"> <br>
                            <ul class="posts_pa" style="max-width 800px;">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                <button id="clm_pa_upload_view" name="clm_pa_upload_view" type="submit"  class="btn btn-secondary">Submit</button>
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .counter_pa {
    display: inline;
    margin-top: 0;
    margin-bottom: 0;
    margin-right: 10px;
    }
    .posts_pa {
    clear: both;
    list-style: none;
    padding-left: 0;
    width: 100%;
    text-align: left;
    }
    .posts_pa li {
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
<script src="{{ asset('/js/claim_policy_pa_view.js') }}"></script>
<script src="{{ asset('/js/claim_policy_pa_view_modal.js') }}"></script>