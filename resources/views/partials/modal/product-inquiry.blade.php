<div class="modal fade inquiry-modal" tabindex="-1" role="dialog" id="inquiry-modal">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <div class="logo">
                    <div class="imageContainer">
                        <img class="logo" src="assets/img/logo_white.png" alt="cocogen logo" />
                    </div>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg id="close" data-name="close" xmlns="http://www.w3.org/2000/svg" width="67.891" height="67.891" viewBox="0 0 67.891 67.891">
                        <path id="Path_1686" data-name="Path 1686"
                            d="M37.741,34.059l-8.6-8.6,8.6-8.6a2.608,2.608,0,0,0-3.688-3.688l-8.6,8.6-8.6-8.6a2.5,2.5,0,0,0-3.688,0,2.52,2.52,0,0,0,0,3.688l8.6,8.6-8.6,8.6a2.522,2.522,0,0,0,0,3.688,2.591,2.591,0,0,0,3.688,0l8.6-8.6,8.6,8.6a2.62,2.62,0,0,0,3.688,0A2.591,2.591,0,0,0,37.741,34.059Z"
                            transform="translate(8.494 8.487)" fill="#fff" />
                        <path id="Path_1687" data-name="Path 1687" d="M37.321,7.945A29.381,29.381,0,0,1,58.1,58.1,29.381,29.381,0,0,1,16.545,16.545a29.182,29.182,0,0,1,20.775-8.6m0-4.57A33.946,33.946,0,1,0,71.266,37.321,33.94,33.94,0,0,0,37.321,3.375Z" transform="translate(-3.375 -3.375)"
                            fill="#fff" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-heading">
                    <div class="text-center">
                        <h2 class="modal-title text-color-light">Send Inquiry</h2>
                    </div>
                </div>
                <div class="modal-form">
                    <form class="inquiryForm mt-4" id="product-inquiry-form" method="post" action="{{ route('productinquirysavewithviar') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="executed" type="hidden" value="0" class="executed">
                        <input name="form_key" type="hidden" value="OUCpy2ti6oV0afZw">
                        <div class="formRow">
                            <div class="mb-2">
                                <div>
                                    <label for="topic" class="form-label">Topic *</label>
                                    <div>
                                        <div class="select">
                                            <select class="styled-select" name="topic" id="topic">
                                                <option value="Product Inquiry" selected="selected">Product Inquiry</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('topic'))
                                        <span class="feedback">
                                            <strong>{{ $errors->first('topic') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2">
                                <div>
                                    <label for="product" class="form-label">Product</label>
                                    <div>
                                        <div class="select">
                                            <select class="styled-select" id="product" name="product">
                                                {{--  <option value="{{ $productName }}" selected="selected">{{ $productName }}</option>  --}}
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('product'))
                                        <span class="help-block" style="margin-top: -12px;">
                                            <strong>{{ $errors->first('product') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="formRow">
                            <div class="mb-2 mb-lg-0">
                                <div @if ($errors->has('first_name')) class="invalid invalid-required"@endif>
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="fname" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    @if ($errors->has('first_name'))
                                        <span class="feedback">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-2 mb-lg-0">
                                <div @if ($errors->has('last_name')) class="invalid invalid-required"@endif>
                                    <label for="last_name" class="form-label">Last Name *</label>
                                    <input type="lname" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                        <span class="feedback">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-2 mb-lg-0">
                            <div @if ($errors->has('email_address')) class="invalid invalid-required"@endif>
                                <label for="email_address" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" name="email_address" id="email_address" value="{{ old('email_address') }}">
                                @if ($errors->has('email_address'))
                                    <span class="feedback">
                                        <strong>{{ $errors->first('email_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-2 mb-lg-0">
                            <div @if ($errors->has('message')) class="invalid invalid-required"@endif>
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" rows="3" name="message" id="message">{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="feedback">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="captcha-container">
                            <div id="recaptcha" class="g-recaptcha"></div>
                        </div>

                        <div class="submitButton text-center">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
