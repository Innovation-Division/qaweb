<div class="modal modal-light fade @if ($modalVersion === 3){{ 'modalv3' }}@endif" id="survey_form">
    <div class="modal-backdrop fade {{ $modalVersion === 3 ? 'in' : 'show' }}"></div>
    <div class="modal-dialog @if ($modalVersion !== 3){{ 'modal-dialog-centered' }}@endif">
        <div class="modal-content">
            <div class="bg-effect"></div>
            <div class="modal-header">
                <button id="survey_close_" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div id="class-with-parameter" class="position-relative">
                    <div id="warning_no_rating" name="warning_no_rating" class="alert alert-danger text-start" style="display: none;">
                        <strong>*Please select rating!</strong>
                    </div>  
                    {{ csrf_field() }}

                    <div class="text-center">
                    @if (!Auth::guest())
                        <h4 id="question_login" class="mrfs-1-2 mrfs-lg-1-5" name="question_login"> How satiesfied are you with COCOGEN's service?</h4>
                    @else
                        <h4 id="question" class="mrfs-1-2 mrfs-lg-1-5" name="question"></h4>  
                    @endif
                    </div>

                    <div class="text-center">
                      <h4 id="question_exp" class="mrfs-1 mrfs-lg-1-2" name="question_exp">Rate your experience</h4>
                    </div>
                    <div class="mt-3">
                        <input type="hidden" id="rating" name="rating" value="">
                        <div class="d-flex justify-content-center">
                            <figure class="swap-on-hover_happy">
                                <img id="happy_face_gray" name="happy_face_gray" class="swap-on-hover__front-image" src="{{url('/images/survey/Happy_Gray.png')}}" title="Happy" />
                                <img d="happy_face" name="happy_face" class="swap-on-hover__back-image" src="{{url('/images/survey/Happy.png')}}" title="Happy"/>
                            </figure>
                            <figure class="swap-on-hover_neutral">
                                <img id="neutral_face_gray" name="neutral_face_gray" class="swap-on-hover__front-image" src="{{url('/images/survey/Neutral_Gray.png')}}" title="Neutral" />
                                <img id="neutral_face" name="neutral_face" class="swap-on-hover__back-image" src="{{url('/images/survey/Neutral.png')}}" title="Neutral"/>
                            </figure>
                            <figure class="swap-on-hover_sad">
                                <img id="sad_face_gray" name="sad_face_gray"  class="swap-on-hover__front-image" src="{{url('/images/survey/Sad_Gray.png')}}"  title="Sad"/>
                                <img id="sad_face" name="sad_face" class="swap-on-hover__back-image" src="{{url('/images/survey/Sad.png')}}" title="Sad"/>
                            </figure>
                        </div>
                    </div>                                 
                    <div class="mt-3">
                        <textarea style="height: 150px;" id="survey_text" name="survey_text" class="form-control" rows="5"  placeholder="Your Comments..."></textarea>
                    </div>
                    <div class="text-center mt-3">                                        
                        <a class="button_survey_submit btn btn-secondary" id="btnSubmit_survey">Submit </a>                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
