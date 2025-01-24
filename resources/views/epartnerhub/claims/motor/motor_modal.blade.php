
<div class="modal fade bs-example-modal-lg modal-light" id="claimsMotorModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1250px; width: 100%;">
        <div class="modal-content">
            <form method="post" action="{{ route('editmotornewsave') }}"  enctype="multipart/form-data" style="background: #ffffff !important;">
            {{ csrf_field() }}		
                <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title heading-border rfs-2-5 rfs-md-1-3" id="claimsMotorModalView" style="color: white; font-size: 27px !important; font-weight: 700;">Motor Claims Information</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="hd_third_party_view" name="hd_third_party_view" value="1">
                    <input type="hidden" id="hd_recovery_claim_view" name="hd_recovery_claim_view" value="1">
                    <input type="hidden" id="hd_claim_motor_line" name="hd_claim_motor_line" value="FI">
                    <input type="hidden" id="hd_claim_motor_id" name="hd_claim_motor_id" value="">
                    @include('epartnerhub.claims.motor.view.view_claim_motor_page_1')
                    @include('epartnerhub.claims.motor.view.view_claim_motor_page_2')
                    @include('epartnerhub.claims.motor.view.view_claim_motor_page_3')

                    <div class="container">
                        <div class="form-group">
                            <textarea id="status-box_motor_view" name="status-box_motor_view" class="form-control status-box_motor" rows="3" placeholder="Enter your comment here..."></textarea>
                        </div>
                        <div class="button-group pull-right">
                            <p class="counter_motor">250</p>
                            <a href="#" class="btn btn-motor-comment-add btn-primary">Post</a>
                        </div>
                        <div class="col-md-12"> <br>
                            <ul id="props_id" name="props_name" class="posts_motor" style="max-width 800px;">
                               
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="modal-footer text-center">
                    <button type="submit" id="clm_motor_submit_view" name="clm_motor_submit_view"   class="btn btn-secondary clm_motor_submit_view">Submit</button>
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('/js/claim_policy_motor_view.js') }}"></script>

<style>
    .counter_motor {
    display: inline;
    margin-top: 0;
    margin-bottom: 0;
    margin-right: 10px;
    }
    .posts_motor {
    clear: both;
    list-style: none;
    padding-left: 0;
    width: 100%;
    text-align: left;
    }
    .posts_motor li {
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
