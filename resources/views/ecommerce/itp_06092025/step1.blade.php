 <div class="col-md-12 col-md-12_space"> <br> </div>
 <div class="col-md-12 col-md-12_space"> <br> </div>

 <div id="part1-personnal-info">
    <div class="col-md-12">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <p class="quote-request-personal-info-title">
                    Personal Information
                    <svg id="part1-personal-info-svg" style="display:none" width="22" height="22" viewBox="0 0 22 22"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                    </svg>
                    <svg id="part1-personal-info-svg-error" xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none" viewBox="0 0 22 23" style="display:none">
                        <path fill="#DD0707" d="M11 .5a11 11 0 1 0 11 11 11.012 11.012 0 0 0-11-11Zm-.846 5.923a.846.846 0 0 1 1.692 0v5.923a.846.846 0 0 1-1.692 0V6.423Zm.846 11a1.27 1.27 0 1 1 0-2.54 1.27 1.27 0 0 1 0 2.54Z"/>
                    </svg>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <!-- <div class="timer" id="timer1"></div> -->
    

    <div class="col-md-12">
        <div class="col-md-2 offset-md-3">
            <div class="form-group">
                <p id="first_name_label" class="text-start text-label-default" > First Name<span
                        class="text-danger">*</span></p>
                <input id="first_name" name="first_name" type="text" placeholder="First Name" autocomplete="off" class="cp-spacing-input section-1-validation" onkeydown="return /[a-z -]/i.test(event.key)" maxlength="50">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <p class="text-start text-label-default"> Surname<span class="text-danger">*</span></p>
                <input id="last_name" name="last_name" type="text" placeholder="Last Name" autocomplete="off" class="cp-spacing-input section-1-validation" onkeydown="return /[a-z -]/i.test(event.key)" maxlength="50">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <p class="text-start text-label-default"  > Suffix<span class="text-danger">*</span></p>
                <select id="suffix" name="suffix" class="form-select cp-spacing-input selectpicker selectbox-1-validation" placeholder="Last Name" data-style="btn-select" data-size="10"  data-live-search="false" autocomplete="off">
                    <option id="default" selected value="">Select</option>
                    <option value="N/A">N/A</option>
                    <option value="Jr">Jr</option>
                    <option value="Sr">Sr</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                </select>

            </div>
        </div>
    </div>
     <div class="col-md-12_ break-two"> <br> </div>
    <div class="col-md-12">
        <div class="col-md-2 offset-md-3">
            <div class="form-group">
                <p class="text-start text-label-default"> Mobile<span class="text-danger">*</span></p>
                <input id="mobile" name="mobile" type="text" autocomplete="off" placeholder="(09XX) XXX-XXXX" class="cp-spacing-input section-1-validation" oninput="phoneMaskPHno()" maxlength="15" >
            </div>
        </div>
        <script>
      $("#mobile").mask("(999) 999-9999");
          function phoneMaskPHno() {
            var key = window.event.key;
            var element = window.event.target;
            var isAllowed = /\d|Backspace|Tab/;
            if(!isAllowed.test(key)) window.event.preventDefault();
            if(element.value.length < 15){
                var inputValue = element.value;
                inputValue = inputValue.replace(/\D/g,'');
                inputValue = inputValue.replace(/(^\d{4})(\d)/,'($1) $2');
                inputValue = inputValue.replace(/(\d{1,5})(\d{3}$)/,'$1-$2');
              
                element.value = inputValue;
            }
          }
          
</script>
        <div class="col-md-2">
            <div class="form-group">
                <p class="text-start text-label-default"> Email Address<span class="text-danger">*</span></p>
                <input id="email" name="email" type="text" autocomplete="off" placeholder="Email Address" class="cp-spacing-input section-1-validation" onkeydown="return /[0-9a-z-@._]/i.test(event.key) || event.key === 'Backspace'"
                maxlength="50">
            </div>
        </div>
        <div class="tooltip-container">
            <div class="col-md-2">
                <div class="form-group">
                    <p class="text-start text-label-default-disabled" style="line-height: 0.8rem;height: 12px;"> Present Location<span class="text-danger">*</span>
                    </p>
                    <input id="location" name="location" type="text" placeholder="Present Location" value="Philippines"
                        style="background-color: #F5F5F5" disabled class="cp-spacing-input">
                            <svg xmlns="http://www.w3.org/2000/svg" style="position: absolute;left:15rem;top: 1.1rem;"  class="mobile-present-location"
                                data-bs-toggle="tooltip" data-bs-html="true" 
                                width="25" height="25" fill="none" viewBox="0 0 17 18">
                                <path fill="teal"
                                    d="M8.125.875A8.125 8.125 0 1 0 16.25 9 8.133 8.133 0 0 0 8.125.875Zm0 15A6.875 6.875 0 1 1 15 9a6.883 6.883 0 0 1-6.875 6.875Zm1.25-3.125a.625.625 0 0 1-.625.625 1.25 1.25 0 0 1-1.25-1.25V9a.625.625 0 0 1 0-1.25A1.25 1.25 0 0 1 8.75 9v3.125a.625.625 0 0 1 .625.625Zm-2.5-7.188a.938.938 0 1 1 1.875 0 .938.938 0 0 1-1.875 0Z" />
                            </svg>
                </div>
            </div>
        <div class="tooltip">This insurance only applies to clients who are based in the Philippines</div>
        </div>
    </div>
    <div class="col-md-12_ break-two"> <br> </div>
    <div class="col-md-12">
        <div class="col-md-2 offset-md-3">
            <div class="form-group">
                <p class="text-start text-label-default-disabled"> Citizenship<span class="text-danger">*</span></p>
                <select id="citizenship" name="citizenship" class="form-select cp-spacing-input"
                    aria-label="Default select example" placeholder="Citizenship" disabled
                    style="background-color:#F5F5F5 !important;">
                    <option selected value="">Select *</option>
                    <option value="Filipino Citizen">Filipino Citizen</option>
                    <option
                        value="Foreign Permanent Resident in the Philippines with Alien Certificate of Registration">
                        Foreign Permanent Resident in the Philippines with Alien Certificate of Registration</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
    </div> 
    
</div> 

<div class="col-md-12_space"> <br> </div>
 <div id="part1-travel-details">
    <div class="col-md-12">
        <div class="col-md-2 offset-md-5">
            <div class="form-group">
                <p class="quote-request-travel-info-title">
                    Travel Details
                    <svg id="part1-travel-details-svg" style="display:none" width="22" height="22" viewBox="0 0 22 22"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                    </svg>
                    <svg id="part1-travel-details-svg-error" xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none" viewBox="0 0 22 23" style="display:none">
                        <path fill="#DD0707" d="M11 .5a11 11 0 1 0 11 11 11.012 11.012 0 0 0-11-11Zm-.846 5.923a.846.846 0 0 1 1.692 0v5.923a.846.846 0 0 1-1.692 0V6.423Zm.846 11a1.27 1.27 0 1 1 0-2.54 1.27 1.27 0 0 1 0 2.54Z"/>
                    </svg>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <p class="quote-request-choose-destination-sub">
                    Choose one type of destination
                </p>
            </div>
        </div>
    </div>
                @if (Agent::isMobile())
                    <?php $device = "mobile";?>
                @else
                    <?php $device = "web"; ?>
                @endif
    <div class="col-md-12">
        <div class="col-md-2 offset-md-4 d-inline-block option-adjusted">
            <div class="d-flex justify-content-end">
                <button type="button" id="single-destination" class="destination-option-yes option-tab-a option-tab-a-hover a option_tab form-control form-control-disabled"  data-id="single" style="width: 255px;height:74px;background-color:transparent" onclick="this.blur();">
                        <svg id="single_check_svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="vector_I391_13156_259_4099">
                            <path
                                d="M12 0 C9.62663 8.19857e-16 7.30655 0.703788 5.33316 2.02236 C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078 C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411 C0.693605 16.6689 1.83649 18.807 3.51472 20.4853 C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694 C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865 C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668 C23.2962 16.6934 24 14.3734 24 12 C23.9966 8.81843 22.7313 5.76814 20.4816 3.51843 C18.2319 1.26872 15.1816 0.00335979 12 0 Z M17.2685 9.88384 L10.8069 16.3454 C10.7212 16.4312 10.6194 16.4993 10.5073 16.5457 C10.3953 16.5922 10.2752 16.6161 10.1538 16.6161 C10.0325 16.6161 9.91243 16.5922 9.80037 16.5457 C9.68831 16.4993 9.5865 16.4312 9.50077 16.3454 L6.73154 13.5762 C6.55834 13.4029 6.46103 13.168 6.46103 12.9231 C6.46103 12.6781 6.55834 12.4432 6.73154 12.27 C6.90475 12.0968 7.13967 11.9995 7.38462 11.9995 C7.62957 11.9995 7.86449 12.0968 8.0377 12.27 L10.1538 14.3873 L15.9623 8.57769 C16.0481 8.49193 16.1499 8.4239 16.2619 8.37748 C16.374 8.33107 16.4941 8.30718 16.6154 8.30718 C16.7367 8.30718 16.8568 8.33107 16.9688 8.37748 C17.0809 8.4239 17.1827 8.49193 17.2685 8.57769 C17.3542 8.66345 17.4223 8.76527 17.4687 8.87733 C17.5151 8.98938 17.539 9.10948 17.539 9.23077 C17.539 9.35205 17.5151 9.47216 17.4687 9.58421 C17.4223 9.69627 17.3542 9.79808 17.2685 9.88384 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                        </svg>
                        <p id="single-destination_text" class="selection_title_I391_13156_257_3424">
                            @if (Agent::isMobile())
                                Single
                            @else
                                Single Destination
                            @endif
                        </p>
                </button>
            </div>
        </div>
               
        <div class="col-md-2 d-inline-block">
            <div class="text-start">
                <button type="button"id="multiple-destination" class="destination-option-no form-control form-control-disabled option-tab-a option-tab-a-hover b option_tab" data-id="multiple"  data-device="{{$device}}" style="width: 255px;height:74px;background-color:transparent" onclick="this.blur();">
                    <svg id="multiple_check_svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="vector_I391_13156_259_4099">
                        <path
                            d="M12 0 C9.62663 8.19857e-16 7.30655 0.703788 5.33316 2.02236 C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078 C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411 C0.693605 16.6689 1.83649 18.807 3.51472 20.4853 C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694 C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865 C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668 C23.2962 16.6934 24 14.3734 24 12 C23.9966 8.81843 22.7313 5.76814 20.4816 3.51843 C18.2319 1.26872 15.1816 0.00335979 12 0 Z M17.2685 9.88384 L10.8069 16.3454 C10.7212 16.4312 10.6194 16.4993 10.5073 16.5457 C10.3953 16.5922 10.2752 16.6161 10.1538 16.6161 C10.0325 16.6161 9.91243 16.5922 9.80037 16.5457 C9.68831 16.4993 9.5865 16.4312 9.50077 16.3454 L6.73154 13.5762 C6.55834 13.4029 6.46103 13.168 6.46103 12.9231 C6.46103 12.6781 6.55834 12.4432 6.73154 12.27 C6.90475 12.0968 7.13967 11.9995 7.38462 11.9995 C7.62957 11.9995 7.86449 12.0968 8.0377 12.27 L10.1538 14.3873 L15.9623 8.57769 C16.0481 8.49193 16.1499 8.4239 16.2619 8.37748 C16.374 8.33107 16.4941 8.30718 16.6154 8.30718 C16.7367 8.30718 16.8568 8.33107 16.9688 8.37748 C17.0809 8.4239 17.1827 8.49193 17.2685 8.57769 C17.3542 8.66345 17.4223 8.76527 17.4687 8.87733 C17.5151 8.98938 17.539 9.10948 17.539 9.23077 C17.539 9.35205 17.5151 9.47216 17.4687 9.58421 C17.4223 9.69627 17.3542 9.79808 17.2685 9.88384 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                    </svg>
                    <p id="multiple-destination_text" class="selection_title_I391_13156_257_3426">
                        @if (Agent::isMobile())
                            Multi
                        @else
                            Multi-Destinations
                        @endif
                    </p>
                </button>
            </div>
        </div>
    </div>

<!-- 
    <div class="col-md-12">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <p class="quote-request-travel-type-sub">
                    Are you travelling via air or non-air?
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-2 offset-md-4 d-inline-block option-adjusted">
            <div class="d-flex justify-content-end">
                <button id="air-destination" type="button" class="option-tab-a a option-tab-a-hover option_tab air-destination form-control form-control-disabled" data-id="air" style="background-color:transparent" onclick="this.blur();">
                        <svg id="air_check_svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="vector_I391_13219_260_4227">
                                <path
                                    d="M12 0 C9.62663 8.19857e-16 7.30655 0.703788 5.33316 2.02236 C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078 C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411 C0.693605 16.6689 1.83649 18.807 3.51472 20.4853 C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694 C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865 C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668 C23.2962 16.6934 24 14.3734 24 12 C23.9966 8.81843 22.7313 5.76814 20.4816 3.51843 C18.2319 1.26872 15.1816 0.00335979 12 0 Z M17.2685 9.88384 L10.8069 16.3454 C10.7212 16.4312 10.6194 16.4993 10.5073 16.5457 C10.3953 16.5922 10.2752 16.6161 10.1538 16.6161 C10.0325 16.6161 9.91243 16.5922 9.80037 16.5457 C9.68831 16.4993 9.5865 16.4312 9.50077 16.3454 L6.73154 13.5762 C6.55834 13.4029 6.46103 13.168 6.46103 12.9231 C6.46103 12.6781 6.55834 12.4432 6.73154 12.27 C6.90475 12.0968 7.13967 11.9995 7.38462 11.9995 C7.62957 11.9995 7.86449 12.0968 8.0377 12.27 L10.1538 14.3873 L15.9623 8.57769 C16.0481 8.49193 16.1499 8.4239 16.2619 8.37748 C16.374 8.33107 16.4941 8.30718 16.6154 8.30718 C16.7367 8.30718 16.8568 8.33107 16.9688 8.37748 C17.0809 8.4239 17.1827 8.49193 17.2685 8.57769 C17.3542 8.66345 17.4223 8.76527 17.4687 8.87733 C17.5151 8.98938 17.539 9.10948 17.539 9.23077 C17.539 9.35205 17.5151 9.47216 17.4687 9.58421 C17.4223 9.69627 17.3542 9.79808 17.2685 9.88384 Z"
                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                            </svg>
                            <p class="air_I391_13219_260_4228">Air</p>
                </button>
            </div>
        </div>
        <div class="col-md-2 d-inline-block">
            <div class="text-start">
                <button id="non-air-destination" type="button"  class="non-air-destination form-control form-control-disabled option-tab-a b option-tab-a-hover option_tab" data-id="non-air" style="background-color:transparent" onclick="this.blur();">
                    <svg id="non_air_check_svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="vector_I391_13219_260_4227">
                        <path
                            d="M12 0 C9.62663 8.19857e-16 7.30655 0.703788 5.33316 2.02236 C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078 C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411 C0.693605 16.6689 1.83649 18.807 3.51472 20.4853 C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694 C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865 C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668 C23.2962 16.6934 24 14.3734 24 12 C23.9966 8.81843 22.7313 5.76814 20.4816 3.51843 C18.2319 1.26872 15.1816 0.00335979 12 0 Z M17.2685 9.88384 L10.8069 16.3454 C10.7212 16.4312 10.6194 16.4993 10.5073 16.5457 C10.3953 16.5922 10.2752 16.6161 10.1538 16.6161 C10.0325 16.6161 9.91243 16.5922 9.80037 16.5457 C9.68831 16.4993 9.5865 16.4312 9.50077 16.3454 L6.73154 13.5762 C6.55834 13.4029 6.46103 13.168 6.46103 12.9231 C6.46103 12.6781 6.55834 12.4432 6.73154 12.27 C6.90475 12.0968 7.13967 11.9995 7.38462 11.9995 C7.62957 11.9995 7.86449 12.0968 8.0377 12.27 L10.1538 14.3873 L15.9623 8.57769 C16.0481 8.49193 16.1499 8.4239 16.2619 8.37748 C16.374 8.33107 16.4941 8.30718 16.6154 8.30718 C16.7367 8.30718 16.8568 8.33107 16.9688 8.37748 C17.0809 8.4239 17.1827 8.49193 17.2685 8.57769 C17.3542 8.66345 17.4223 8.76527 17.4687 8.87733 C17.5151 8.98938 17.539 9.10948 17.539 9.23077 C17.539 9.35205 17.5151 9.47216 17.4687 9.58421 C17.4223 9.69627 17.3542 9.79808 17.2685 9.88384 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                    </svg>
                    <p class="non-air_I391_13219_260_4230">Non-Air</p>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-12_space"> <br> </div>
    <div class="col-md-12_space"> <br> </div>
        @if (Agent::isMobile())
            <div class="col-md-12">
                <div class="col-md-4 offset-md-4">
                    <div class="form-group">
                        <p class="air-label-tag mobile-air-label-tag">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 18 18">
                                <rect width="17.9" height="17.9" x=".05" fill="#848A90" rx="8.95"/>
                                <path fill="#fff" d="M9 3a5.95 5.95 0 1 0 5.95 5.95A5.956 5.956 0 0 0 9 3Zm0 10.985a5.035 5.035 0 1 1 0-10.07 5.035 5.035 0 0 1 0 10.07Zm.915-2.289a.458.458 0 0 1-.457.458.915.915 0 0 1-.916-.915V8.95a.458.458 0 1 1 0-.915.915.915 0 0 1 .916.915v2.289a.458.458 0 0 1 .457.457Zm-1.83-5.263a.687.687 0 1 1 1.373 0 .687.687 0 0 1-1.373 0Z"/>
                            </svg>
                            Air and non-air information
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12"> <br> </div>
            <div class="col-md-12">
                <div class="col-md-4 offset-md-4">
                        <p class="air-label-tag">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-airplane_I391_13219_582_16242">
                                <path
                                    d="M14 7.5 L14 9.5 C14 9.63261 13.9473 9.75979 13.8536 9.85355 C13.7598 9.94732 13.6326 10 13.5 10 C13.467 10.0001 13.4341 9.99673 13.4019 9.99 L8.75 9.0625 L8.75 10.5456 L9.85375 11.6488 C9.94688 11.742 9.99944 11.8682 10 12 L10 13.5 C10.0001 13.5819 9.98014 13.6627 9.94175 13.7351 C9.90337 13.8075 9.84777 13.8693 9.77987 13.9152 C9.71196 13.9611 9.63382 13.9895 9.55232 13.9981 C9.47082 14.0067 9.38847 13.9951 9.3125 13.9644 L7 13.0388 L4.6875 13.9644 C4.61153 13.9951 4.52918 14.0067 4.44768 13.9981 C4.36618 13.9895 4.28804 13.9611 4.22013 13.9152 C4.15223 13.8693 4.09663 13.8075 4.05825 13.7351 C4.01986 13.6627 3.99986 13.5819 4 13.5 L4 12 C3.99995 11.9343 4.01284 11.8693 4.03793 11.8086 C4.06303 11.7479 4.09983 11.6927 4.14625 11.6463 L5.25 10.5431 L5.25 9.0625 L0.598125 9.99 C0.565852 9.99673 0.532967 10.0001 0.5 10 C0.367392 10 0.240215 9.94732 0.146447 9.85355 C0.0526785 9.75979 1.28189e-07 9.63261 1.28189e-07 9.5 L1.28189e-07 7.5 C-6.63752e-05 7.40711 0.0257445 7.31604 0.0745385 7.237 C0.123333 7.15796 0.19318 7.09407 0.27625 7.0525 L5.25 4.56625 L5.25 1.75 C5.25 1.28587 5.43437 0.840752 5.76256 0.512563 C6.09075 0.184374 6.53587 2.22045e-16 7 0 C7.46413 2.22045e-16 7.90925 0.184374 8.23744 0.512563 C8.56563 0.840752 8.75 1.28587 8.75 1.75 L8.75 4.56625 L13.7238 7.0525 C13.8068 7.09407 13.8767 7.15796 13.9255 7.237 C13.9743 7.31604 14.0001 7.40711 14 7.5 Z"
                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(132, 138, 144, 1)" id="igius"></path>
                            </svg>

                            AIR: Travel via plane
                        </p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-4 offset-md-4">
                    <div class="form-group">
                        <p class="air-label-tag">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class="icon-compass_I391_13219_582_16246">
                                <path
                                    d="M6.5 0 C5.21442 4.44089e-16 3.95772 0.381218 2.8888 1.09545 C1.81988 1.80968 0.986756 2.82484 0.494786 4.01256 C0.00281635 5.20028 -0.125905 6.50721 0.124899 7.76809 C0.375703 9.02896 0.994767 10.1872 1.90381 11.0962 C2.81285 12.0052 3.97104 12.6243 5.23192 12.8751 C6.49279 13.1259 7.79973 12.9972 8.98744 12.5052 C10.1752 12.0132 11.1903 11.1801 11.9046 10.1112 C12.6188 9.04229 13 7.78558 13 6.5 C12.9982 4.77665 12.3128 3.12441 11.0942 1.90582 C9.8756 0.687224 8.22335 0.00181989 6.5 0 Z M9.72375 3.61188 L7.72375 7.61187 C7.69927 7.66008 7.66009 7.69926 7.61188 7.72375 L3.61188 9.72375 C3.56492 9.74734 3.51172 9.75554 3.45984 9.74717 C3.40795 9.7388 3.36003 9.7143 3.32287 9.67714 C3.28571 9.63997 3.2612 9.59205 3.25283 9.54017 C3.24447 9.48828 3.25266 9.43508 3.27625 9.38813 L5.27625 5.38812 C5.30074 5.33991 5.33992 5.30074 5.38813 5.27625 L9.38813 3.27625 C9.43509 3.25266 9.48829 3.24446 9.54017 3.25283 C9.59205 3.2612 9.63998 3.2857 9.67714 3.32286 C9.7143 3.36002 9.7388 3.40795 9.74717 3.45983 C9.75554 3.51172 9.74735 3.56492 9.72375 3.61188 Z"
                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(132, 138, 144, 1)" id="i43pl"></path>
                            </svg>

                            NON-AIR: Travel via land or sea. Minimum of 125 km. away from
                            usual place of residence. Verify distance via Google Maps
                        </p>
                    </div>
                </div>
            </div>
        @endif -->
</div> 
 
<div id="part1-destination" class="align-middle">
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
 
    <div class="col-md-12">
        <div class="col-md-2 offset-md-5">
            <div class="form-group">
                <p class="quote-request-destination-details-sub">
                Destination
                </p>
            </div>
        </div>
    </div>
    <div id="Destination" class="Destination">
            <div id="div-destination" class="col-md-12 wrapper" >
                <div id="single-option-field" class="single-option-field col-md-4 offset-md-4 ">
                    <div class="form-group">
                        <p class="text-start text-label-default" > Select Destination<span class="text-danger">*</span></p>
                        <select id="destinations"  name="destinations[]" class="form-select cp-spacing-input selectpicker selectpicker-destinations selectbox-3-validation" autocomplete="off" placeholder="Destination" data-style="btn-select" data-size="10"  data-live-search="true">
                            <option selected value="">Select *</option>
                            @foreach($cocogen_itp_countries as $cocogen_itp_country)
                                <option value="{{$cocogen_itp_country->country}}">{{$cocogen_itp_country->country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div  id="multiple-option-field" class="multiple-option-field col-md-4 delete-row-col-destiney justify-content-left" style="margin-left:-32px;margin-top:5px;" >
                    <svg id="removeDestination"  class="removeDestination delete-destination" display="none"  xmlns="http://www.w3.org/2000/svg" width="39" height="40" fill="none" viewBox="0 0 39 40">
                        <path fill="#DD0707" d="M31.688 5.375H7.313a2.437 2.437 0 0 0-2.438 2.438v24.375a2.437 2.437 0 0 0 2.438 2.437h24.375a2.438 2.438 0 0 0 2.437-2.438V7.814a2.438 2.438 0 0 0-2.438-2.438Zm0 26.813H7.313V7.811h24.375v24.375Zm-6.45-16.2L21.222 20l4.014 4.013a1.221 1.221 0 0 1-.395 1.989 1.22 1.22 0 0 1-1.33-.265L19.5 21.723l-4.013 4.014a1.221 1.221 0 0 1-1.989-.395 1.22 1.22 0 0 1 .265-1.33L17.777 20l-4.014-4.013a1.22 1.22 0 0 1 1.724-1.724l4.013 4.014 4.013-4.014a1.221 1.221 0 0 1 1.989.395 1.22 1.22 0 0 1-.265 1.33Z"/>
                    </svg>
                    <svg id="addDestination" class="destination-action-add add-destination"  xmlns="http://www.w3.org/2000/svg" width="39" height="40" fill="none" viewBox="0 0 39 40">
                        <path fill="teal" d="M31.688 5.375H7.313a2.437 2.437 0 0 0-2.438 2.438v24.375a2.437 2.437 0 0 0 2.438 2.437h24.375a2.438 2.438 0 0 0 2.437-2.438V7.814a2.438 2.438 0 0 0-2.438-2.438Zm0 26.813H7.313V7.811h24.375v24.375ZM26.813 20a1.219 1.219 0 0 1-1.22 1.219H20.72v4.875a1.219 1.219 0 0 1-2.438 0v-4.875h-4.875a1.219 1.219 0 0 1 0-2.438h4.875v-4.875a1.219 1.219 0 0 1 2.438 0v4.875h4.875A1.219 1.219 0 0 1 26.812 20Z"/>
                    </svg>
                </div>
            </div>
    </div>
    <div id="DestinationTo"></div>
    <div id="div-destination-to" class="col-md-12" > </div>

    @include('ecommerce.itp.calendar')
    
</div> 

<div id="part1-covid-cruise" class="align-middle" >



    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>

    
    <div class="col-md-12">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <p class="quote-request-cruise-coverage-title">
                    Add Cruise Coverage?
                <svg id="part1-cruise-svg" style="display:none"  width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                        fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                </svg>
                <svg id="part1-cruise-svg-error" xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none" viewBox="0 0 22 23" style="display:none">
                    <path fill="#DD0707" d="M11 .5a11 11 0 1 0 11 11 11.012 11.012 0 0 0-11-11Zm-.846 5.923a.846.846 0 0 1 1.692 0v5.923a.846.846 0 0 1-1.692 0V6.423Zm.846 11a1.27 1.27 0 1 1 0-2.54 1.27 1.27 0 0 1 0 2.54Z"/>
                </svg>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12">
        <div class="col-md-2 offset-md-4 d-inline-block option-adjusted">
            <div class="d-flex justify-content-end">
                <button type="button" id="cruise-div-no" class="cruise-div-no option-tab-a a option-tab-a-hover option_tab form-control form-control-disabled"  data-id="cruise_no" style="background-color:transparent" onclick="this.blur();">
                    <svg id="cruise_no_check_svg"   width="19" height="19" viewBox="0 0 19 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="vector_543_19046">
                        <path
                            d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                    </svg>
                    <p class="no_543_19047">No</p>
                </button>
            </div>
        </div>
        <div class="col-md-2 d-inline-block">
            <div class="text-start">
                <button type="button" id="cruise-div-yes" class="cruise-div-yes option-tab-a b option-tab-a-hover option_tab form-control form-control-disabled"  data-id="cruise_yes" style="background-color:transparent" onclick="this.blur();">
                    <svg  id="cruise_yes_check_svg" width="19" height="19" viewBox="0 0 19 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="vector_543_19046">
                        <path
                            d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                    </svg>
                    <p class="yes_543_19049">Yes</p>
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-md-12_space"> <br> </div>

    <div id="destination-cruise-div" style="display:none">
        <div id="Destination_Cruise" class="Destination_Cruise" >
                <div id="div-destination" class="col-md-12 wrapper" >
                    <div id="single-option-field" class="single-option-field col-md-4 offset-md-4 ">
                        <div class="form-group">
                            <p class="text-start text-label-default" > Select Destination<span class="text-danger">*</span></p>
                            <select id="cruise_destinations"  name="cruise_destinations[]" class="form-select cp-spacing-input selectpicker selectpicker-cruise_destinations selectbox-3-validation-cruise" autocomplete="off" placeholder="Destination" data-style="btn-select" data-size="10"  data-live-search="true">
                                <option selected value="">Select *</option>
                                @foreach($cocogen_itp_countries as $cocogen_itp_country)
                                    <option value="{{$cocogen_itp_country->country}}">{{$cocogen_itp_country->country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div  id="multiple-option-field" class="multiple-option-field col-md-4 delete-row-col-destiney justify-content-left" style="margin-left:-32px;margin-top:5px;display:block" >
                        <svg id="removeDestination_cruise"  class="removeDestination_cruise delete-destination" display="none"  xmlns="http://www.w3.org/2000/svg" width="39" height="40" fill="none" viewBox="0 0 39 40">
                            <path fill="#DD0707" d="M31.688 5.375H7.313a2.437 2.437 0 0 0-2.438 2.438v24.375a2.437 2.437 0 0 0 2.438 2.437h24.375a2.438 2.438 0 0 0 2.437-2.438V7.814a2.438 2.438 0 0 0-2.438-2.438Zm0 26.813H7.313V7.811h24.375v24.375Zm-6.45-16.2L21.222 20l4.014 4.013a1.221 1.221 0 0 1-.395 1.989 1.22 1.22 0 0 1-1.33-.265L19.5 21.723l-4.013 4.014a1.221 1.221 0 0 1-1.989-.395 1.22 1.22 0 0 1 .265-1.33L17.777 20l-4.014-4.013a1.22 1.22 0 0 1 1.724-1.724l4.013 4.014 4.013-4.014a1.221 1.221 0 0 1 1.989.395 1.22 1.22 0 0 1-.265 1.33Z"/>
                        </svg>
                        <svg id="addDestination_cruise" class="destination-action-add_cruise add-destination"  xmlns="http://www.w3.org/2000/svg" width="39" height="40" fill="none" viewBox="0 0 39 40">
                            <path fill="teal" d="M31.688 5.375H7.313a2.437 2.437 0 0 0-2.438 2.438v24.375a2.437 2.437 0 0 0 2.438 2.437h24.375a2.438 2.438 0 0 0 2.437-2.438V7.814a2.438 2.438 0 0 0-2.438-2.438Zm0 26.813H7.313V7.811h24.375v24.375ZM26.813 20a1.219 1.219 0 0 1-1.22 1.219H20.72v4.875a1.219 1.219 0 0 1-2.438 0v-4.875h-4.875a1.219 1.219 0 0 1 0-2.438h4.875v-4.875a1.219 1.219 0 0 1 2.438 0v4.875h4.875A1.219 1.219 0 0 1 26.812 20Z"/>
                        </svg>
                    </div>
                </div>
        </div>
        <div id="DestinationTo_Cruise"></div>
        <div id="div-destination-to_Cruise" class="col-md-12" > </div>
        @include('ecommerce.itp.calendar_cruise')
    </div>

        <div class="col-md-12 col-md-12_space"> <br> </div>
        <div class="col-md-12">
            <div class="col-md-1 offset-md-3 d-inline-block" style="width: 20px;">
                <div class="form-group">
                    <p class="covid-19_assist_provides_coverage_for_me_543_19034" style="margin-top: 10px;">
                            <svg width="19.500003814697266" height="19.500003814697266"
                                viewBox="0 0 19.500003814697266 19.500003814697266" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="vector_543_19033" style="margin-bottom: 4px;">
                                <path
                                    d="M9.75 0 C7.82164 6.66134e-16 5.93657 0.571828 4.33319 1.64317 C2.72982 2.71451 1.48013 4.23726 0.742179 6.01884 C0.00422452 7.80042 -0.188858 9.76082 0.187348 11.6521 C0.563554 13.5434 1.49215 15.2807 2.85571 16.6443 C4.21928 18.0079 5.95656 18.9365 7.84787 19.3127 C9.73919 19.6889 11.6996 19.4958 13.4812 18.7578 C15.2627 18.0199 16.7855 16.7702 17.8568 15.1668 C18.9282 13.5634 19.5 11.6784 19.5 9.75 C19.4973 7.16498 18.4692 4.68661 16.6413 2.85872 C14.8134 1.03084 12.335 0.00272983 9.75 0 Z M9.75 18 C8.11831 18 6.52326 17.5161 5.16655 16.6096 C3.80984 15.7031 2.75242 14.4146 2.128 12.9071 C1.50358 11.3996 1.3402 9.74085 1.65853 8.1405 C1.97685 6.54016 2.76259 5.07015 3.91637 3.91637 C5.07016 2.76259 6.54017 1.97685 8.14051 1.65852 C9.74085 1.34019 11.3997 1.50357 12.9071 2.12799 C14.4146 2.75242 15.7031 3.80984 16.6096 5.16655 C17.5161 6.52325 18 8.1183 18 9.75 C17.9975 11.9373 17.1275 14.0343 15.5809 15.5809 C14.0343 17.1275 11.9373 17.9975 9.75 18 Z M11.25 14.25 C11.25 14.4489 11.171 14.6397 11.0303 14.7803 C10.8897 14.921 10.6989 15 10.5 15 C10.1022 15 9.72065 14.842 9.43934 14.5607 C9.15804 14.2794 9 13.8978 9 13.5 L9 9.75 C8.80109 9.75 8.61033 9.67098 8.46967 9.53033 C8.32902 9.38968 8.25 9.19891 8.25 9 C8.25 8.80109 8.32902 8.61032 8.46967 8.46967 C8.61033 8.32902 8.80109 8.25 9 8.25 C9.39783 8.25 9.77936 8.40804 10.0607 8.68934 C10.342 8.97064 10.5 9.35218 10.5 9.75 L10.5 13.5 C10.6989 13.5 10.8897 13.579 11.0303 13.7197 C11.171 13.8603 11.25 14.0511 11.25 14.25 Z M8.25 5.625 C8.25 5.4025 8.31598 5.18499 8.4396 4.99998 C8.56322 4.81498 8.73892 4.67078 8.94449 4.58564 C9.15005 4.50049 9.37625 4.47821 9.59448 4.52162 C9.81271 4.56502 10.0132 4.67217 10.1705 4.8295 C10.3278 4.98684 10.435 5.18729 10.4784 5.40552 C10.5218 5.62375 10.4995 5.84995 10.4144 6.05552 C10.3292 6.26109 10.185 6.43679 10 6.5604 C9.81501 6.68402 9.59751 6.75 9.375 6.75 C9.07664 6.75 8.79049 6.63147 8.57951 6.4205 C8.36853 6.20952 8.25 5.92337 8.25 5.625 Z"
                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(132, 138, 144, 1)"></path>
                            </svg>
                    </p>
                </div>
            </div>
            <div class="text-covid-cruise-details col-md-6 d-inline-block">
                <div class="form-group">
                    <p class="covid-19_assist_provides_coverage_for_me_543_19034">
                                <!-- <a href="#" class="cruise-details"> -->
                                        <span id="cruise-details" class=" covid-19_assistance_coverage_label " style="color:#008080">
                                            Cruise Surcharge
                                        </span>
                                <!-- </a> -->
                                <span class="covid-19_assistance_coverage_label">
                                    is an optional coverage for international travel with benefits
                                    such as cruise cancellation, cruise curtailment, cruise delay,
                                    and more.
                                </span>
                    </p>
                </div>
            </div>
        </div>


    <div class="col-md-12">
        <div class="col-md-4 offset-md-4">
            <div class="form-group">
                <p class="quote-request-covid-coverage-title">
                    Add COVID-19 Coverage?
                <svg id="part1-covid-svg" style="display:none"   width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                        fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                </svg>
                <svg id="part1-covid-svg-error" xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none" viewBox="0 0 22 23" style="display:none">
                    <path fill="#DD0707" d="M11 .5a11 11 0 1 0 11 11 11.012 11.012 0 0 0-11-11Zm-.846 5.923a.846.846 0 0 1 1.692 0v5.923a.846.846 0 0 1-1.692 0V6.423Zm.846 11a1.27 1.27 0 1 1 0-2.54 1.27 1.27 0 0 1 0 2.54Z"/>
                </svg>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12">
        <div class="col-md-2 offset-md-4 d-inline-block option-adjusted">
            <div class="d-flex justify-content-end">
                <button type="button" id="covid-div-no" class="covid-div-no option-tab-a option-tab-a-hover a option_tab form-control form-control-disabled"  data-id="covid_no" style="background-color:transparent" onclick="this.blur();">
                    <svg id="covid_no_check_svg" width="19" height="19" viewBox="0 0 19 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="vector_543_19028">
                        <path
                            d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                    </svg>
                    <p class="no_543_19029">No</p>
                </button>
            </div>
        </div>
        <div class="col-md-2 d-inline-block">
            <div class="text-start">
                <button type="button" id="covid-div-yes" class="covid-div-yes option-tab-a option-tab-a-hover b option_tab form-control form-control-disabled" data-id="covid_yes" style="background-color:transparent" onclick="this.blur();">
                    <svg  id="covid_yes_check_svg"  width="19" height="19" viewBox="0 0 19 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="vector_543_19028">
                        <path
                            d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                            fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                    </svg>
                    <p class="yes_543_19031">Yes</p>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-md-12_space"> <br> </div>
    
    <div class="col-md-12 col-md-12_space"> <br> </div>
    <div class="col-md-12">
        <div class=" col-md-1 offset-md-3 d-inline-block" style="width: 20px;">
            <div class="form-group">
                <p class="covid-19_assist_provides_coverage_for_me_543_19034" style="margin-top: 10px;">
                        <svg width="19.500003814697266" height="19.500003814697266"
                            viewBox="0 0 19.500003814697266 19.500003814697266" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="vector_543_19033" style="margin-bottom: 4px;">
                            <path
                                d="M9.75 0 C7.82164 6.66134e-16 5.93657 0.571828 4.33319 1.64317 C2.72982 2.71451 1.48013 4.23726 0.742179 6.01884 C0.00422452 7.80042 -0.188858 9.76082 0.187348 11.6521 C0.563554 13.5434 1.49215 15.2807 2.85571 16.6443 C4.21928 18.0079 5.95656 18.9365 7.84787 19.3127 C9.73919 19.6889 11.6996 19.4958 13.4812 18.7578 C15.2627 18.0199 16.7855 16.7702 17.8568 15.1668 C18.9282 13.5634 19.5 11.6784 19.5 9.75 C19.4973 7.16498 18.4692 4.68661 16.6413 2.85872 C14.8134 1.03084 12.335 0.00272983 9.75 0 Z M9.75 18 C8.11831 18 6.52326 17.5161 5.16655 16.6096 C3.80984 15.7031 2.75242 14.4146 2.128 12.9071 C1.50358 11.3996 1.3402 9.74085 1.65853 8.1405 C1.97685 6.54016 2.76259 5.07015 3.91637 3.91637 C5.07016 2.76259 6.54017 1.97685 8.14051 1.65852 C9.74085 1.34019 11.3997 1.50357 12.9071 2.12799 C14.4146 2.75242 15.7031 3.80984 16.6096 5.16655 C17.5161 6.52325 18 8.1183 18 9.75 C17.9975 11.9373 17.1275 14.0343 15.5809 15.5809 C14.0343 17.1275 11.9373 17.9975 9.75 18 Z M11.25 14.25 C11.25 14.4489 11.171 14.6397 11.0303 14.7803 C10.8897 14.921 10.6989 15 10.5 15 C10.1022 15 9.72065 14.842 9.43934 14.5607 C9.15804 14.2794 9 13.8978 9 13.5 L9 9.75 C8.80109 9.75 8.61033 9.67098 8.46967 9.53033 C8.32902 9.38968 8.25 9.19891 8.25 9 C8.25 8.80109 8.32902 8.61032 8.46967 8.46967 C8.61033 8.32902 8.80109 8.25 9 8.25 C9.39783 8.25 9.77936 8.40804 10.0607 8.68934 C10.342 8.97064 10.5 9.35218 10.5 9.75 L10.5 13.5 C10.6989 13.5 10.8897 13.579 11.0303 13.7197 C11.171 13.8603 11.25 14.0511 11.25 14.25 Z M8.25 5.625 C8.25 5.4025 8.31598 5.18499 8.4396 4.99998 C8.56322 4.81498 8.73892 4.67078 8.94449 4.58564 C9.15005 4.50049 9.37625 4.47821 9.59448 4.52162 C9.81271 4.56502 10.0132 4.67217 10.1705 4.8295 C10.3278 4.98684 10.435 5.18729 10.4784 5.40552 C10.5218 5.62375 10.4995 5.84995 10.4144 6.05552 C10.3292 6.26109 10.185 6.43679 10 6.5604 C9.81501 6.68402 9.59751 6.75 9.375 6.75 C9.07664 6.75 8.79049 6.63147 8.57951 6.4205 C8.36853 6.20952 8.25 5.92337 8.25 5.625 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(132, 138, 144, 1)"></path>
                        </svg>
                </p>
            </div>
        </div>
        <div class="text-covid-cruise-details col-md-6 d-inline-block">
            <div class="form-group">
                <p class="covid-19_assist_provides_coverage_for_me_543_19034">
                            <span id="covid-details" class="covid-19_assistance_coverage_label" style="color:#008080">
                                        COVID-19 Assist+
                                    </span>
                            <span class="covid-19_assistance_coverage_label">
                                provides coverage for medical expense and hospitalization, and
                                transport and repatriation in case of illness for
                                international trips.
                            </span>
                </p>
            </div>
        </div>
    </div>
    <div id="confirmation-covid-div" style="display:none">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="col-md-12 col-md-12_space"> <br> </div>
                    <div class="col-md-12 div-dollar-content div-dollar-content-package" style="background-color:  rgb(255, 250, 220) !important;">
                        <div class="d-flex bd-highlight">
                            <div class="me-auto p-2 bd-highlight align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path fill="#F5BC16" d="M16.5 21.75a.75.75 0 0 1-.75.75h-7.5a.75.75 0 1 1 0-1.5h7.5a.75.75 0 0 1 .75.75Zm3.75-12a8.208 8.208 0 0 1-3.154 6.489 1.522 1.522 0 0 0-.596 1.199V18a1.5 1.5 0 0 1-1.5 1.5H9A1.5 1.5 0 0 1 7.5 18v-.562a1.5 1.5 0 0 0-.584-1.187A8.212 8.212 0 0 1 3.75 9.796C3.725 5.328 7.337 1.607 11.8 1.5a8.25 8.25 0 0 1 8.449 8.25Zm-3.01-.875a5.4 5.4 0 0 0-4.365-4.364.75.75 0 0 0-.25 1.48c1.554.26 2.872 1.579 3.135 3.135a.75.75 0 0 0 1.48-.251Z"/>
                            </svg>
                            </div>
                            <div class="p-2 bd-highlight" style="width: 95%;">
                                <p class="you_have_selected_auto_excel_plus_compre_I627_14853_577_17400 dollar-conten-more-package-p">
                                    <span class="you_have_selected_auto_excel_plus_compre_I627_14853_577_17400 dollar-conten-more-package-p">
                                        You have selected COVID-19 Coverage <strong> <label class="covid-plan"></label> Plan</strong> 
                                    </span>
                                </p> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="covid_yes_option" style="display:none">
        <div class="col-md-12">
            <div class="col-md-2 offset-md-5">
                <div class="form-group">
                    <p class="quote-request-destination-details-sub">
                            Select coverage period
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-md-12_space"> <br> </div>
        <div class="col-md-12">
            <div class="col-md-2 offset-md-4 d-inline-block option-adjusted">
                <div class="d-flex justify-content-end">
                    <button type="button" id="covid-btn-15days" class="covid-btn-15days option-tab-a option-tab-a-hover a option_tab form-control form-control-disabled"  data-id="covid_15" style="background-color:transparent" onclick="this.blur();">
                        <svg id="covid_15_days_svg" width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="vector_543_19028">
                            <path
                                d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                        </svg>
                        <p class="covid_15_days">15 Days</p>
                    </button>
                </div>
            </div>
            <div class="col-md-2 d-inline-block">
                <div class="text-start">
                    <button type="button" id="covid-btn-entire_trip" class="covid-btn-entire_trip option-tab-a option-tab-a-hover b option_tab form-control form-control-disabled" data-id="covid_entire" style="background-color:transparent" onclick="this.blur();">
                        <svg  id="covid_entire_duration_svg"  width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="vector_543_19028">
                            <path
                                d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                        </svg>
                        <p class="entire_duration_covid">
                            @if (Agent::isMobile()) 
                                Entire Duration
                            @else
                                Entire Duration of the Trip
                            @endif
                        </p>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-md-12_space"> <br> </div>
        <div class="col-md-12 col-md-12_space"> <br> </div>
    </div>
</div>
<div class="col-md-12 col-md-12_space"> <br> </div>

    <div class="align-middle">
        <div class="col-md-12">
            <div class="col-md-4 offset-md-4">
                <div class="form-group">
                    <p class="quote-request-promo-title">
                    Do you have promo code?
                        <svg id="part1-promo-svg-success" style="display:none"  width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                        </svg>
                    <svg  id="part1-promo-svg-error"  xmlns="http://www.w3.org/2000/svg" width="22" height="23" fill="none" viewBox="0 0 22 23" style="display:none">
                        <path fill="#DD0707" d="M11 .5a11 11 0 1 0 11 11 11.012 11.012 0 0 0-11-11Zm-.846 5.923a.846.846 0 0 1 1.692 0v5.923a.846.846 0 0 1-1.692 0V6.423Zm.846 11a1.27 1.27 0 1 1 0-2.54 1.27 1.27 0 0 1 0 2.54Z"/>
                    </svg>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-md-12_space"> <br> </div>
        <div class="col-md-12">
            <div class="col-md-2 offset-md-4 d-inline-block option-adjusted">
                <div class="d-flex justify-content-end">
                    <button type="button" id="promo-div-no" class="promo-div-no option-tab-a a option-tab-a-hover option_tab form-control form-control-disabled"  data-id="promo_no" onclick="this.blur();">
                        <svg id="promo_no_check_svg"   width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="vector_543_19046">
                            <path
                                d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                        </svg>
                        <p class="no_promo_text">No</p>
                    </button>
                </div>
            </div>
            <div class="col-md-2 d-inline-block">
                <div class="text-start">
                    <button type="button" id="promo-div-yes" class="promo-div-yes option-tab-a b option-tab-a-hover option_tab form-control form-control-disabled"  data-id="promo_yes" onclick="this.blur();">
                        <svg  id="promo_yes_check_svg" width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="vector_543_19046">
                            <path
                                d="M9.5 0 C7.62108 6.49053e-16 5.78435 0.557165 4.22209 1.60104 C2.65982 2.64491 1.44218 4.12861 0.723149 5.86451 C0.0041162 7.6004 -0.184015 9.51054 0.182544 11.3534 C0.549104 13.1962 1.45389 14.8889 2.78249 16.2175 C4.11109 17.5461 5.80383 18.4509 7.64665 18.8175 C9.48946 19.184 11.3996 18.9959 13.1355 18.2769 C14.8714 17.5578 16.3551 16.3402 17.399 14.7779 C18.4428 13.2156 19 11.3789 19 9.5 C18.9973 6.98126 17.9956 4.56644 16.2146 2.78542 C14.4336 1.0044 12.0187 0.00265983 9.5 0 Z M13.6709 7.82471 L8.55548 12.9401 C8.48761 13.008 8.40702 13.0619 8.31831 13.0987 C8.22959 13.1355 8.1345 13.1544 8.03846 13.1544 C7.94243 13.1544 7.84734 13.1355 7.75862 13.0987 C7.66991 13.0619 7.58931 13.008 7.52144 12.9401 L5.32914 10.7478 C5.19202 10.6107 5.11498 10.4247 5.11498 10.2308 C5.11498 10.0368 5.19202 9.85087 5.32914 9.71375 C5.46626 9.57663 5.65224 9.49959 5.84616 9.49959 C6.04008 9.49959 6.22605 9.57663 6.36318 9.71375 L8.03846 11.3899 L12.6368 6.79067 C12.7047 6.72278 12.7853 6.66892 12.874 6.63217 C12.9627 6.59543 13.0578 6.57652 13.1538 6.57652 C13.2499 6.57652 13.3449 6.59543 13.4337 6.63217 C13.5224 6.66892 13.603 6.72278 13.6709 6.79067 C13.7388 6.85857 13.7926 6.93917 13.8294 7.02788 C13.8661 7.11659 13.885 7.21167 13.885 7.30769 C13.885 7.40371 13.8661 7.49879 13.8294 7.5875 C13.7926 7.67621 13.7388 7.75681 13.6709 7.82471 Z"
                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(255, 255, 255, 1)"></path>
                        </svg>
                        <p class="yes_promo_text">Yes</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-md-12_space"> <br> </div>
        <div class="col-md-12_ break-two"> <br> </div>

        <div id="part1-promo" style="display:none">
            <div class="col-md-12">
                <div class="col-md-4  offset-md-4">
                    <div class="form-group">
                        <p class="text-start text-label-default"> Enter Promo Code<span class="text-danger">*</span></p>
                        <input id="promo" name="promo"  type="text" autocomplete="off" placeholder="Enter Promo Code">
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="error-promo-code" style="display:none; ">
                <div class="col-md-5 offset-md-4"  style="background-color:#eff2f4 !important;padding: 15px 0px 0px 15px;">
                    <div class="form-group">
                                    <span class="promo_error_tag">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class=" warning-prokmo-icon icon-warningcircle_I576_17317_538_18230">
                                            <path
                                                d="M8.125 0 C6.51803 5.55112e-16 4.94714 0.476523 3.611 1.36931 C2.27485 2.2621 1.23344 3.53105 0.618482 5.0157 C0.00352044 6.50035 -0.157382 8.13401 0.156123 9.71011 C0.469628 11.2862 1.24346 12.7339 2.37976 13.8702 C3.51606 15.0065 4.9638 15.7804 6.5399 16.0939 C8.11599 16.4074 9.74966 16.2465 11.2343 15.6315 C12.719 15.0166 13.9879 13.9752 14.8807 12.639 C15.7735 11.3029 16.25 9.73197 16.25 8.125 C16.2477 5.97081 15.391 3.90551 13.8677 2.38227 C12.3445 0.85903 10.2792 0.00227486 8.125 0 Z M8.125 15 C6.76526 15 5.43605 14.5968 4.30546 13.8414 C3.17487 13.0859 2.29368 12.0122 1.77333 10.7559 C1.25298 9.49971 1.11683 8.11737 1.3821 6.78375 C1.64738 5.45013 2.30216 4.22513 3.26364 3.26364 C4.22513 2.30216 5.45014 1.64737 6.78376 1.3821 C8.11738 1.11683 9.49971 1.25298 10.756 1.77333 C12.0122 2.29368 13.0859 3.17487 13.8414 4.30545 C14.5968 5.43604 15 6.76525 15 8.125 C14.9979 9.94773 14.2729 11.6952 12.9841 12.9841 C11.6952 14.2729 9.94773 14.9979 8.125 15 Z M7.5 8.75 L7.5 4.375 C7.5 4.20924 7.56585 4.05027 7.68306 3.93306 C7.80027 3.81585 7.95924 3.75 8.125 3.75 C8.29076 3.75 8.44974 3.81585 8.56695 3.93306 C8.68416 4.05027 8.75 4.20924 8.75 4.375 L8.75 8.75 C8.75 8.91576 8.68416 9.07473 8.56695 9.19194 C8.44974 9.30915 8.29076 9.375 8.125 9.375 C7.95924 9.375 7.80027 9.30915 7.68306 9.19194 C7.56585 9.07473 7.5 8.91576 7.5 8.75 Z M9.0625 11.5625 C9.0625 11.7479 9.00752 11.9292 8.90451 12.0833 C8.80149 12.2375 8.65507 12.3577 8.48377 12.4286 C8.31246 12.4996 8.12396 12.5182 7.94211 12.482 C7.76025 12.4458 7.5932 12.3565 7.46209 12.2254 C7.33098 12.0943 7.24169 11.9273 7.20552 11.7454 C7.16934 11.5635 7.18791 11.375 7.25887 11.2037 C7.32982 11.0324 7.44999 10.886 7.60416 10.783 C7.75833 10.68 7.93958 10.625 8.125 10.625 C8.37364 10.625 8.6121 10.7238 8.78792 10.8996 C8.96373 11.0754 9.0625 11.3139 9.0625 11.5625 Z"
                                                fill-rule="nonzero" clip-rule="nonzero" fill="rgba(239, 242, 244, 1)" id="ij66ui">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="invalid_promo_code_kindly_check_if_enter_I576_17317_538_17979" style="color:#dd0707">
                                    Invalid promo code. Kindly check if entered promo code is incorrect or it has been used.
                                </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="success-promo-code" style="display:none" >
                <div class="div-success-promo col-md-4 offset-md-4">
                    <div class="form-group">
                            <span class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none" viewBox="0 0 25 24">
                                    <path fill="#54B947" d="M18.5 17.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM8 8a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm16.5-6v20a2 2 0 0 1-2 2h-20a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2Zm-20 4.5a3.5 3.5 0 1 0 7 0 3.5 3.5 0 0 0-7 0Zm16 11a3.5 3.5 0 1 0-7 0 3.5 3.5 0 0 0 7 0Zm-.293-13.207a1 1 0 0 0-1.415 0l-14 14a1 1 0 1 0 1.415 1.415l14-14a1 1 0 0 0 0-1.415Z"/>
                                </svg>
                            </span>
                            <span class="invalid_promo_code_kindly_check_if_enter_I576_17317_538_17979" >
                                Promo code applied. <label class="promo-text"></label> off of original premium price of <strong>Amount</strong> 
                            </span>       
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-md-12_space"> <br> </div>
        <div class="col-md-12" style="display:none">
            <div class="col-md-6 offset-md-3 consent-box-style-head" style="background-color: rgb(255, 244, 218, 1) ! important;padding:30px 40px 20px 50px;">
                <p class="consent-box-style">
                    <span class="">
                        By proceeding to next steps, you hereby confirm that you have read
                        and agree to the product's
                    </span>
                    <span class="">
                    <a class="exclusion-and-limitation" href="#" onclick="return false;" style="text-decoration: underline;"><b>Exclusions and Limitations</b></a> 
                    </span>
                    <span class="">
                        , as well as Cocogen Insurance Inc.'s
                    </span>
                    <span class="">
                        <a class="privacy-policy" href="#" onclick="return false;" style="text-decoration: underline;"><b> Privacy Policy</b></a> 
                    </span>
                    <span class="">
                        .
                    </span>
                </p>
            </div>
        </div>
     
        <div class="col-md-12 col-md-12_space"> <br> </div>
        <!-- <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto">
                        <div class="col-md-2 offset-md-5">
                            <div class="form-group">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->
    </div>

        <div class="col-md-12" style="background-color:transparent">
            <div class="row">
                <div class="col-md-1 order-2 order-md-1 offset-md-5">
                    <div class="form-group button-text-align-center">
                        <button id="page1-back" name="page1-back" type="button"  class="btn-arrow-icon-secondary btn-arrow-icon-secondary-back button-secondary-default-des form-control">Back</button>
                    </div>
                </div>
                <div class="col-md-1 order-1 order-md-2">
                    <div class="form-group button-text-align-center">
                        <button id="first_next" name="first_next" type="button"  class="btn-arrow-icon button-next action next btn a-btn-slide-text_ form-control">Continue</button>
                    </div>
                </div>
            </div>
        </div>

<div class="div-bottom-page"> 
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
</div>
<!-- <div class="col-md-12 col-md-12_space"> <br> </div> -->
<div class="col-md-12 col-md-12_space"> <br> </div>
<div class="col-md-12 col-md-12_space"> <br> </div>
@if (Agent::isMobile()) 
 <style>
    .selection_title_I391_13156_257_3426,
    .selection_title_I391_13156_257_3424 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_white);
        /* font-size: calc(var(--web_medium_body_font-size) * 1px); */
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        /* line-height: calc(var(--web_medium_body_line-height) * 1px); */
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        padding-top: 15px;
        font-size: 16px;
        line-height:  24px;
        font-weight: 500;
    }
 </style>
@else
<style>
    .selection_title_I391_13156_257_3426,
    .selection_title_I391_13156_257_3424 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_white);
        /* font-size: calc(var(--web_medium_body_font-size) * 1px); */
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        /* line-height: calc(var(--web_medium_body_line-height) * 1px); */
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        padding-top: 15px;
        font-size: 16px;
        line-height:  24px;
        font-weight: 500;
        width: 110%;
    }
 </style>
@endif
<style>
    .btn-arrow-icon:hover{
        background-color:#008080 !important;
        color:#fff !important;
        width: 120%;
    }
    .btn-arrow-icon:hover:before {
        background-color:#008080 !important;
        color:#fff !important;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' viewBox='0 0 24 32'%3E%3Cpath fill='%23fff' d='m27.707 16.707-9 9a1 1 0 0 1-1.415-1.415L24.587 17H5a1 1 0 0 1 0-2h19.586l-7.293-7.293a1 1 0 0 1 1.415-1.415l9 9a1.001 1.001 0 0 1 0 1.415Z'/%3E%3C/svg%3E%0A");
        display: absolute;
        width: 24px !important;
        height: 24px !important;
    }

    .btn-arrow-icon{
        height: 57px;
        /* width:auto; */
        border-radius: 4px !important;
        background: #008080;
        padding: 10px 20px 10px 20px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        position: relative;
        color: #ffffff;
        text-align: left;
        font-family: "Inter-Medium", sans-serif;
        font-size: 16px !important;
        line-height: 20px;
        font-weight: 500;
        position: relative;
    }
</style>

<style>

    .add-destination,
    .delete-destination{
        cursor:pointer;
    }
    .delete-row-destiney, .delete-row_part {
    margin-top: 32px;
    height: 52px;
    width: 52px;
    min-width: 52px !important;
    border-radius: 5px;
    background: #ffffff !important;
    border: 2px solid #707070 !important;
    color: #707070 !important;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    /* .form-select:disabled {
        background-color: #F5F5F5;
    } */
    .div-success-promo{
        background: #f8f4f4;
        padding: 25px 20px 25px 20px;
        display: flex;
        flex-direction: row;
        gap: 20px;
        align-items: flex-start;
        justify-content: flex-start;
        align-self: stretch;
        flex-shrink: 0;
        margin-bottom: 20px;
        height: 79px;
    }
    
     .col-md-12_{
            display:none;
        }
    @media screen and (min-width: 799px) {
        .col-md-12_{
            display:block;
            line-height: 5;
        }
    }
  
   
    .arrow-left-destination{
        margin-top: 20px;
    }
    
  * {
    box-sizing: border-box;
    }

    body {
        margin:
            0;
    }
    div.col-md-12 {
    background-color:#f7fcff  !important;
    }
    .vector_I543_18990_228_3012{
    margin-bottom: 15px;
    }
    [data-gjs-type^="cj"]:empty {
        background-color: #D4D4D8;
        height: 50px;
        width: 100%;
        padding: 5px;
    }

    [data-gjs-type^="cj"]:empty::before {
        content: "Add
    content";background-color:#FFB26D;color:#000;font-size:16px;font-weight:bold;font-family:-apple-system,
    system-ui, BlinkMacSystemFont, "Segoe UI", "Open Sans", Roboto, "Helvetica
    Neue", Helvetica, Arial,
    sans-serif;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 30px;
        padding: 0 10px;
        opacity: 0.3;
        border-radius: 3px;
        white-space: nowrap;
        overflow: visible;
        text-overflow: ellipsis;
    }
    .vector_I543_18994_256_3253{
        margin-bottom:15px;
    }
    #iysk {
        transform: matrix(1,
                0, 0, 1, 15, 25.25);
    }

    #i2f1 {
        transform: matrix(1, 0, 0, 1, 15,
                25.25);
    }

    #i4jx3 {
        transform: matrix(1, 0, 0, 1, 20,
                26.875);
    }

    #itxkf {
        transform: matrix(1, 0, 0, 1, 2.0624961853027344,
                2.0625);
    }

    #ilptp {
        transform: matrix(1, 0, 0, 1, 2.343489408493042,
                5.155989646911621);
    }

    #idbeq {
        transform: matrix(1, 0, 0, 1, 2.343489408493042,
                5.155989646911621);
    }

    #igius {
        transform: matrix(1, 0, 0, 1, 0.9999998211860657,
                1);
    }

    #i43pl {
        transform: matrix(1, 0, 0, 1, 1.4999971389770508,
                1.5);
    }

    #ibdjk {
        transform: matrix(1, 0, 0, 1, 3.12465238571167, 6.874652862548828);
    }

    #i68hj {
        transform: matrix(1, 0, 0, 1, 10, 10);
    }

    #imab85 {
        transform: matrix(1, 0,
                0, 1, 2, 1);
    }

    #irn08a {
        transform: matrix(1, 0, 0, 1, 2,
                1);
    }

    #irfo3j {
        transform: matrix(1, 0, 0, 1, 3, 6);
    }

    #ipr8yg {
        transform: matrix(1, 0,
                0, 1, 3, 6);
    }

    #iztmif {
        transform: matrix(1, 0, 0, 1, 3,
                6);
    }

    #ifde7z {
        transform: matrix(1, 0, 0, 1, 3, 6);
    }

    #i95oz9 {
        transform: matrix(1, 0,
                0, 1, 0, 0);
    }

    #iqlnoc {
        transform: matrix(1, 0, 0, 1, 3.12465238571167,
                6.874652862548828);
    }

    #if3zue {
        transform: matrix(1, 0, 0, 1, 3.12465238571167,
                6.874652862548828);
    }

    #ij66ui {
        transform: matrix(1, 0, 0, 1, 1.8749964237213135,
                1.875);
    }

    .local-styles-variables {
        --primary_teal: rgba(0, 128, 128,
                1);
        --primary_bright-teal: rgba(12, 200, 200, 1);
        --primary_black: rgba(45, 39, 39,
                1);
        --primary_black-text: rgba(48, 48, 48, 1);
        --primary_light-black-text: rgba(59,
                57, 57, 1);
        --primary_caption-black-text: rgba(88, 88, 88,
                1);
        --primary_white: rgba(255, 255, 255, 1);
        --primary_pink: rgba(228, 80, 154,
                1);
        --primary_light-pink: rgba(251, 159, 205, 1);
        --primary_pink-disabled: rgba(237,
                202, 220, 1);
        --secondary_green: rgba(84, 185, 71,
                1);
        --secondary_light-green: rgba(208, 252, 203,
                1);
        --secondary_deep-green: rgba(169, 211, 164, 1);
        --secondary_aqua-blue: rgba(27,
                150, 219, 1);
        --secondary_light-aqua: rgba(155, 212, 244,
                1);
        --secondary_deep-light-aqua: rgba(141, 187, 212, 1);
        --secondary_blue: rgba(0,
                53, 146, 1);
        --secondary_baby-blue: rgba(141, 180, 249,
                1);
        --secondary_light-baby-blue: rgba(206, 224, 255, 1);
        --status_danger: rgba(221,
                7, 7, 1);
        --status_salmon: rgba(255, 175, 175, 1);
        --status_light-red: rgba(255,
                226, 226, 1);
        --status_highlight-red: rgba(255, 247, 247,
                1);
        --status_yellow: rgba(245, 188, 22, 1);
        --status_mellow-yellow: rgba(245, 211,
                115, 1);
        --status_light-yellow: rgba(255, 244, 218,
                1);
        --status_subdued-yellow: rgba(255, 249, 236, 1);
        --status_successful: rgba(9,
                161, 42, 1);
        --status_success-light: rgba(225, 244, 229,
                1);
        --surfaces_lvl-0: rgba(247, 252, 255, 1);
        --surfaces_lvl-1: rgba(242, 242, 242,
                1);
        --surfaces_lvl-2: rgba(239, 242, 244, 1);
        --surfaces_lvl-3: rgba(215, 222, 227,
                1);
        --surfaces_lvl-4: rgba(187, 193, 199, 1);
        --surfaces_lvl-5: rgba(132, 138, 144,
                1);
        --surfaces_lvl-6: rgba(106, 111, 116, 1);
        --surfaces_lvl-7: rgba(80, 85, 88,
                1);
        --surfaces_lvl-8: rgba(55, 58, 61, 1);
        --surfaces_lvl-9: rgba(30, 31, 33,
                1);
        --surfaces_lvl-10: rgba(5, 5, 5, 1);
        --surfaces_disabled: rgba(245, 245, 245,
                1);
        --surfaces_card-selected: rgba(251, 250, 250, 1);
        --surfaces_notes: rgba(219,
                238, 248, 1);
        --teal_lvl-0: rgba(247, 255, 255, 1);
        --teal_lvl-1: rgba(240, 255,
                255, 1);
        --teal_lvl-2: rgba(224, 245, 245, 1);
        --teal_lvl-3: rgba(192, 230, 230,
                1);
        --teal_lvl-4: rgba(168, 217, 217, 1);
        --teal_lvl-5: rgba(144, 204, 204,
                1);
        --teal_lvl-6: rgba(96, 179, 179, 1);
        --teal_lvl-7: rgba(48, 153, 153,
                1);
        --teal_lvl-8: rgba(0, 128, 128, 1);
        --teal_lvl-9: rgba(0, 102, 102,
                1);
        --teal_lvl-10: rgba(0, 77, 77, 1);
        --teal_lvl-11: rgba(0, 62, 62,
                1);
        --teal_lvl-12: rgba(0, 51, 51,
                1);
    }
    .first-page{
        margin-left: 14.2%;
    }
    .local-text-styles-variables {
    
        --web_black_header-1_font-family: Inter;
        --web_black_header-1_font-size: 80;
        --web_black_header-1_font-weight: 400;
        --web_black_header-1_letter-spacing: 0;
        --web_black_header-1_text-indent: 0;
        --web_black_header-1_text-decoration-line: none;
        --web_black_header-1_text-transform: none;
        --web_black_header-2_font-family: Inter;
        --web_black_header-2_font-size: 60;
        --web_black_header-2_font-weight: 400;
        --web_black_header-2_letter-spacing: 0;
        --web_black_header-2_text-indent: 0;
        --web_black_header-2_text-decoration-line: none;
        --web_black_header-2_text-transform: none;
        --web_black_header-3_font-family: Inter;
        --web_black_header-3_font-size: 40;
        --web_black_header-3_font-weight: 400;
        --web_black_header-3_letter-spacing: 0;
        --web_black_header-3_text-indent: 0;
        --web_black_header-3_text-decoration-line: none;
        --web_black_header-3_text-transform: none;
        --web_black_header-4_font-family: Inter;
        --web_black_header-4_font-size: 30;
        --web_black_header-4_font-weight: 400;
        --web_black_header-4_letter-spacing: 0;
        --web_black_header-4_text-indent: 0;
        --web_black_header-4_text-decoration-line: none;
        --web_black_header-4_text-transform: none;
        --web_black_header-6_font-family: Inter;
        --web_black_header-6_font-size: 27;
        --web_black_header-6_font-weight: 400;
        --web_black_header-6_letter-spacing: 0;
        --web_black_header-6_text-indent: 0;
        --web_black_header-6_text-decoration-line: none;
        --web_black_header-6_text-transform: none;
        --web_black_header-5_font-family: Inter;
        --web_black_header-5_font-size: 23;
        --web_black_header-5_font-weight: 400;
        --web_black_header-5_letter-spacing: 0;
        --web_black_header-5_text-indent: 0;
        --web_black_header-5_text-decoration-line: none;
        --web_black_header-5_text-transform: none;
        --web_black_body_font-family: Inter;
        --web_black_body_font-size: 16;
        --web_black_body_font-weight: 400;
        --web_black_body_letter-spacing: 0;
        --web_black_body_line-height: 24;
        --web_black_body_text-indent: 0;
        --web_black_body_text-decoration-line: none;
        --web_black_body_text-transform: none;
        --web_black_caption_font-family: Inter;
        --web_black_caption_font-size: 14;
        --web_black_caption_font-weight: 400;
        --web_black_caption_letter-spacing: 0;
        --web_black_caption_line-height: 24;
        --web_black_caption_text-indent: 0;
        --web_black_caption_text-decoration-line: none;
        --web_black_caption_text-transform: none;
        --web_black_tiny_font-family: Inter;
        --web_black_tiny_font-size: 12;
        --web_black_tiny_font-weight: 400;
        --web_black_tiny_letter-spacing: 0;
        --web_black_tiny_text-indent: 0;
        --web_black_tiny_text-decoration-line: none;
        --web_black_tiny_text-transform: none;
        --web_black_footnote_font-family: Inter;
        --web_black_footnote_font-size: 10;
        --web_black_footnote_font-weight: 400;
        --web_black_footnote_letter-spacing: 0;
        --web_black_footnote_text-indent: 0;
        --web_black_footnote_text-decoration-line: none;
        --web_black_footnote_text-transform: none;
        --web_black_micro_font-family: Inter;
        --web_black_micro_font-size: 8;
        --web_black_micro_font-weight: 400;
        --web_black_micro_letter-spacing: 0;
        --web_black_micro_text-indent: 0;
        --web_black_micro_text-decoration-line: none;
        --web_black_micro_text-transform: none;
        --web_regular_header-1_font-family: Inter;
        --web_regular_header-1_font-size: 80;
        --web_regular_header-1_font-weight: 400;
        --web_regular_header-1_letter-spacing: 0;
        --web_regular_header-1_text-indent: 0;
        --web_regular_header-1_text-decoration-line: none;
        --web_regular_header-1_text-transform: none;
        --web_regular_header-2_font-family: Inter;
        --web_regular_header-2_font-size: 60;
        --web_regular_header-2_font-weight: 400;
        --web_regular_header-2_letter-spacing: 0;
        --web_regular_header-2_text-indent: 0;
        --web_regular_header-2_text-decoration-line: none;
        --web_regular_header-2_text-transform: none;
        --web_regular_header-3_font-family: Inter;
        --web_regular_header-3_font-size: 60;
        --web_regular_header-3_font-weight: 400;
        --web_regular_header-3_letter-spacing: 0;
        --web_regular_header-3_text-indent: 0;
        --web_regular_header-3_text-decoration-line: none;
        --web_regular_header-3_text-transform: none;
        --web_regular_header-4_font-family: Inter;
        --web_regular_header-4_font-size: 30;
        --web_regular_header-4_font-weight: 400;
        --web_regular_header-4_letter-spacing: 0;
        --web_regular_header-4_text-indent: 0;
        --web_regular_header-4_text-decoration-line: none;
        --web_regular_header-4_text-transform: none;
        --web_regular_header-6_font-family: Inter;
        --web_regular_header-6_font-size: 27;
        --web_regular_header-6_font-weight: 400;
        --web_regular_header-6_letter-spacing: 0;
        --web_regular_header-6_text-indent: 0;
        --web_regular_header-6_text-decoration-line: none;
        --web_regular_header-6_text-transform: none;
        --web_regular_header-5_font-family: Inter;
        --web_regular_header-5_font-size: 23;
        --web_regular_header-5_font-weight: 400;
        --web_regular_header-5_letter-spacing: 0;
        --web_regular_header-5_text-indent: 0;
        --web_regular_header-5_text-decoration-line: none;
        --web_regular_header-5_text-transform: none;
        --web_regular_body_font-family: Inter;
        --web_regular_body_font-size: 16;
        --web_regular_body_font-weight: 400;
        --web_regular_body_letter-spacing: 0;
        --web_regular_body_line-height: 24;
        --web_regular_body_text-indent: 0;
        --web_regular_body_text-decoration-line: none;
        --web_regular_body_text-transform: none;
        --web_regular_caption_font-family: Inter;
        --web_regular_caption_font-size: 14;
        --web_regular_caption_font-weight: 400;
        --web_regular_caption_letter-spacing: 0;
        --web_regular_caption_line-height: 24;
        --web_regular_caption_text-indent: 0;
        --web_regular_caption_text-decoration-line: none;
        --web_regular_caption_text-transform: none;
        --web_regular_tiny_font-family: Inter;
        --web_regular_tiny_font-size: 12;
        --web_regular_tiny_font-weight: 400;
        --web_regular_tiny_letter-spacing: 0;
        --web_regular_tiny_line-height: 20;
        --web_regular_tiny_text-indent: 0;
        --web_regular_tiny_text-decoration-line: none;
        --web_regular_tiny_text-transform: none;
        --web_regular_footnote_font-family: Inter;
        --web_regular_footnote_font-size: 10;
        --web_regular_footnote_font-weight: 400;
        --web_regular_footnote_letter-spacing: 0;
        --web_regular_footnote_text-indent: 0;
        --web_regular_footnote_text-decoration-line: none;
        --web_regular_footnote_text-transform: none;
        --web_bold_header-1_font-family: Inter;
        --web_bold_header-1_font-size: 80;
        --web_bold_header-1_font-weight: 700;
        --web_bold_header-1_letter-spacing: 0;
        --web_bold_header-1_text-indent: 0;
        --web_bold_header-1_text-decoration-line: none;
        --web_bold_header-1_text-transform: none;
        --web_bold_header-2_font-family: Inter;
        --web_bold_header-2_font-size: 60;
        --web_bold_header-2_font-weight: 700;
        --web_bold_header-2_letter-spacing: 0;
        --web_bold_header-2_text-indent: 0;
        --web_bold_header-2_text-decoration-line: none;
        --web_bold_header-2_text-transform: none;
        --web_bold_header-3_font-family: Inter;
        --web_bold_header-3_font-size: 40;
        --web_bold_header-3_font-weight: 700;
        --web_bold_header-3_letter-spacing: 0;
        --web_bold_header-3_text-indent: 0;
        --web_bold_header-3_text-decoration-line: none;
        --web_bold_header-3_text-transform: none;
        --web_bold_header-4_font-family: Inter;
        --web_bold_header-4_font-size: 30;
        --web_bold_header-4_font-weight: 700;
        --web_bold_header-4_letter-spacing: 0;
        --web_bold_header-4_text-indent: 0;
        --web_bold_header-4_text-decoration-line: none;
        --web_bold_header-4_text-transform: none;
        --web_bold_header-6_font-family: Inter;
        --web_bold_header-6_font-size: 27;
        --web_bold_header-6_font-weight: 700;
        --web_bold_header-6_letter-spacing: 0;
        --web_bold_header-6_text-indent: 0;
        --web_bold_header-6_text-decoration-line: none;
        --web_bold_header-6_text-transform: none;
        --web_bold_header-5_font-family: Inter;
        --web_bold_header-5_font-size: 23;
        --web_bold_header-5_font-weight: 700;
        --web_bold_header-5_letter-spacing: 0;
        --web_bold_header-5_text-indent: 0;
        --web_bold_header-5_text-decoration-line: none;
        --web_bold_header-5_text-transform: none;
        --web_bold_body_font-family: Inter;
        --web_bold_body_font-size: 16;
        --web_bold_body_font-weight: 700;
        --web_bold_body_letter-spacing: 0;
        --web_bold_body_line-height: 24;
        --web_bold_body_text-indent: 0;
        --web_bold_body_text-decoration-line: none;
        --web_bold_body_text-transform: none;
        --web_bold_caption_font-family: Inter;
        --web_bold_caption_font-size: 14;
        --web_bold_caption_font-weight: 700;
        --web_bold_caption_letter-spacing: 0;
        --web_bold_caption_line-height: 24;
        --web_bold_caption_text-indent: 0;
        --web_bold_caption_text-decoration-line: none;
        --web_bold_caption_text-transform: none;
        --web_bold_tiny_font-family: Inter;
        --web_bold_tiny_font-size: 12;
        --web_bold_tiny_font-weight: 700;
        --web_bold_tiny_letter-spacing: 0;
        --web_bold_tiny_text-indent: 0;
        --web_bold_tiny_text-decoration-line: none;
        --web_bold_tiny_text-transform: none;
        --web_bold_footnote_font-family: Inter;
        --web_bold_footnote_font-size: 10;
        --web_bold_footnote_font-weight: 700;
        --web_bold_footnote_letter-spacing: 0;
        --web_bold_footnote_text-indent: 0;
        --web_bold_footnote_text-decoration-line: none;
        --web_bold_footnote_text-transform: none;
        --web_medium_header-1_font-family: Inter;
        --web_medium_header-1_font-size: 80;
        --web_medium_header-1_font-weight: 400;
        --web_medium_header-1_letter-spacing: 0;
        --web_medium_header-1_text-indent: 0;
        --web_medium_header-1_text-decoration-line: none;
        --web_medium_header-1_text-transform: none;
        --web_medium_header-2_font-family: Inter;
        --web_medium_header-2_font-size: 60;
        --web_medium_header-2_font-weight: 400;
        --web_medium_header-2_letter-spacing: 0;
        --web_medium_header-2_text-indent: 0;
        --web_medium_header-2_text-decoration-line: none;
        --web_medium_header-2_text-transform: none;
        --web_medium_header-3_font-family: Inter;
        --web_medium_header-3_font-size: 40;
        --web_medium_header-3_font-weight: 400;
        --web_medium_header-3_letter-spacing: 0;
        --web_medium_header-3_text-indent: 0;
        --web_medium_header-3_text-decoration-line: none;
        --web_medium_header-3_text-transform: none;
        --web_medium_header-4_font-family: Inter;
        --web_medium_header-4_font-size: 30;
        --web_medium_header-4_font-weight: 400;
        --web_medium_header-4_letter-spacing: 0;
        --web_medium_header-4_text-indent: 0;
        --web_medium_header-4_text-decoration-line: none;
        --web_medium_header-4_text-transform: none;
        --web_medium_header-6_font-family: Inter;
        --web_medium_header-6_font-size: 27;
        --web_medium_header-6_font-weight: 400;
        --web_medium_header-6_letter-spacing: 0;
        --web_medium_header-6_text-indent: 0;
        --web_medium_header-6_text-decoration-line: none;
        --web_medium_header-6_text-transform: none;
        --web_medium_header-5_font-family: Inter;
        --web_medium_header-5_font-size: 23;
        --web_medium_header-5_font-weight: 400;
        --web_medium_header-5_letter-spacing: 0;
        --web_medium_header-5_text-indent: 0;
        --web_medium_header-5_text-decoration-line: none;
        --web_medium_header-5_text-transform: none;
        --web_medium_body_font-family: Inter;
        --web_medium_body_font-size: 16;
        --web_medium_body_font-weight: 400;
        --web_medium_body_letter-spacing: 0;
        --web_medium_body_line-height: 24;
        --web_medium_body_text-indent: 0;
        --web_medium_body_text-decoration-line: none;
        --web_medium_body_text-transform: none;
        --web_medium_caption_font-family: Inter;
        --web_medium_caption_font-size: 14;
        --web_medium_caption_font-weight: 400;
        --web_medium_caption_letter-spacing: 0;
        --web_medium_caption_line-height: 24;
        --web_medium_caption_text-indent: 0;
        --web_medium_caption_text-decoration-line: none;
        --web_medium_caption_text-transform: none;
        --web_medium_tiny_font-family: Inter;
        --web_medium_tiny_font-size: 12;
        --web_medium_tiny_font-weight: 400;
        --web_medium_tiny_letter-spacing: 0;
        --web_medium_tiny_line-height: 20;
        --web_medium_tiny_text-indent: 0;
        --web_medium_tiny_text-decoration-line: none;
        --web_medium_tiny_text-transform: none;
        --web_medium_footnote_font-family: Inter;
        --web_medium_footnote_font-size: 10;
        --web_medium_footnote_font-weight: 400;
        --web_medium_footnote_letter-spacing: 0;
        --web_medium_footnote_text-indent: 0;
        --web_medium_footnote_text-decoration-line: none;
        --web_medium_footnote_text-transform: none;
        --web_light_header-1_font-family: Inter;
        --web_light_header-1_font-size: 80;
        --web_light_header-1_font-weight: 400;
        --web_light_header-1_letter-spacing: 0;
        --web_light_header-1_text-indent: 0;
        --web_light_header-1_text-decoration-line: none;
        --web_light_header-1_text-transform: none;
        --web_light_header-2_font-family: Inter;
        --web_light_header-2_font-size: 60;
        --web_light_header-2_font-weight: 400;
        --web_light_header-2_letter-spacing: 0;
        --web_light_header-2_text-indent: 0;
        --web_light_header-2_text-decoration-line: none;
        --web_light_header-2_text-transform: none;
        --web_light_header-3_font-family: Inter;
        --web_light_header-3_font-size: 40;
        --web_light_header-3_font-weight: 400;
        --web_light_header-3_letter-spacing: 0;
        --web_light_header-3_text-indent: 0;
        --web_light_header-3_text-decoration-line: none;
        --web_light_header-3_text-transform: none;
        --web_light_header-4_font-family: Inter;
        --web_light_header-4_font-size: 30;
        --web_light_header-4_font-weight: 400;
        --web_light_header-4_letter-spacing: 0;
        --web_light_header-4_text-indent: 0;
        --web_light_header-4_text-decoration-line: none;
        --web_light_header-4_text-transform: none;
        --web_light_header-6_font-family: Inter;
        --web_light_header-6_font-size: 27;
        --web_light_header-6_font-weight: 400;
        --web_light_header-6_letter-spacing: 0;
        --web_light_header-6_text-indent: 0;
        --web_light_header-6_text-decoration-line: none;
        --web_light_header-6_text-transform: none;
        --web_light_header-5_font-family: Inter;
        --web_light_header-5_font-size: 23;
        --web_light_header-5_font-weight: 400;
        --web_light_header-5_letter-spacing: 0;
        --web_light_header-5_text-indent: 0;
        --web_light_header-5_text-decoration-line: none;
        --web_light_header-5_text-transform: none;
        --web_light_body_font-family: Inter;
        --web_light_body_font-size: 16;
        --web_light_body_font-weight: 400;
        --web_light_body_letter-spacing: 0;
        --web_light_body_line-height: 24;
        --web_light_body_text-indent: 0;
        --web_light_body_text-decoration-line: none;
        --web_light_body_text-transform: none;
        --web_light_caption_font-family: Inter;
        --web_light_caption_font-size: 14;
        --web_light_caption_font-weight: 400;
        --web_light_caption_letter-spacing: 0;
        --web_light_caption_line-height: 24;
        --web_light_caption_text-indent: 0;
        --web_light_caption_text-decoration-line: none;
        --web_light_caption_text-transform: none;
        --web_light_tiny_font-family: Inter;
        --web_light_tiny_font-size: 12;
        --web_light_tiny_font-weight: 400;
        --web_light_tiny_letter-spacing: 0;
        --web_light_tiny_line-height: 20;
        --web_light_tiny_text-indent: 0;
        --web_light_tiny_text-decoration-line: none;
        --web_light_tiny_text-transform: none;
        --web_light_footnote_font-family: Inter;
        --web_light_footnote_font-size: 10;
        --web_light_footnote_font-weight: 400;
        --web_light_footnote_letter-spacing: 0;
        --web_light_footnote_text-indent: 0;
        --web_light_footnote_text-decoration-line: none;
        --web_light_footnote_text-transform: none;
        --mobile_bold_large-header-1_font-family: Inter;
        --mobile_bold_large-header-1_font-size: 92;
        --mobile_bold_large-header-1_font-weight: 700;
        --mobile_bold_large-header-1_letter-spacing: 0;
        --mobile_bold_large-header-1_text-indent: 0;
        --mobile_bold_large-header-1_text-decoration-line: none;
        --mobile_bold_large-header-1_text-transform: none;
        --mobile_bold_large-header-2_font-family: Inter;
        --mobile_bold_large-header-2_font-size: 70;
        --mobile_bold_large-header-2_font-weight: 700;
        --mobile_bold_large-header-2_letter-spacing: 0;
        --mobile_bold_large-header-2_text-indent: 0;
        --mobile_bold_large-header-2_text-decoration-line: none;
        --mobile_bold_large-header-2_text-transform: none;
        --mobile_bold_large-header-3_font-family: Inter;
        --mobile_bold_large-header-3_font-size: 54;
        --mobile_bold_large-header-3_font-weight: 700;
        --mobile_bold_large-header-3_letter-spacing: 0;
        --mobile_bold_large-header-3_text-indent: 0;
        --mobile_bold_large-header-3_text-decoration-line: none;
        --mobile_bold_large-header-3_text-transform: none;
        --mobile_bold_large-header-4_font-family: Inter;
        --mobile_bold_large-header-4_font-size: 41;
        --mobile_bold_large-header-4_font-weight: 700;
        --mobile_bold_large-header-4_letter-spacing: 0;
        --mobile_bold_large-header-4_text-indent: 0;
        --mobile_bold_large-header-4_text-decoration-line: none;
        --mobile_bold_large-header-4_text-transform: none;
        --mobile_bold_large-header-5_font-family: Inter;
        --mobile_bold_large-header-5_font-size: 31;
        --mobile_bold_large-header-5_font-weight: 700;
        --mobile_bold_large-header-5_letter-spacing: 0;
        --mobile_bold_large-header-5_text-indent: 0;
        --mobile_bold_large-header-5_text-decoration-line: none;
        --mobile_bold_large-header-5_text-transform: none;
        --mobile_bold_large-header-6_font-family: Inter;
        --mobile_bold_large-header-6_font-size: 24;
        --mobile_bold_large-header-6_font-weight: 700;
        --mobile_bold_large-header-6_letter-spacing: 0;
        --mobile_bold_large-header-6_text-indent: 0;
        --mobile_bold_large-header-6_text-decoration-line: none;
        --mobile_bold_large-header-6_text-transform: none;
        --mobile_medium_medium-1_font-family: Inter;
        --mobile_medium_medium-1_font-size: 31;
        --mobile_medium_medium-1_font-weight: 400;
        --mobile_medium_medium-1_letter-spacing: 0;
        --mobile_medium_medium-1_text-indent: 0;
        --mobile_medium_medium-1_text-decoration-line: none;
        --mobile_medium_medium-1_text-transform: none;
        --mobile_medium_medium-2_font-family: Inter;
        --mobile_medium_medium-2_font-size: 24;
        --mobile_medium_medium-2_font-weight: 400;
        --mobile_medium_medium-2_letter-spacing: 0;
        --mobile_medium_medium-2_text-indent: 0;
        --mobile_medium_medium-2_text-decoration-line: none;
        --mobile_medium_medium-2_text-transform: none;
        --mobile_medium_medium-3_font-family: Inter;
        --mobile_medium_medium-3_font-size: 18;
        --mobile_medium_medium-3_font-weight: 400;
        --mobile_medium_medium-3_letter-spacing: 0;
        --mobile_medium_medium-3_text-indent: 0;
        --mobile_medium_medium-3_text-decoration-line: none;
        --mobile_medium_medium-3_text-transform: none;
        --mobile_medium_body_font-family: Inter;
        --mobile_medium_body_font-size: 16;
        --mobile_medium_body_font-weight: 400;
        --mobile_medium_body_letter-spacing: 0;
        --mobile_medium_body_text-indent: 0;
        --mobile_medium_body_text-decoration-line: none;
        --mobile_medium_body_text-transform: none;
        --mobile_medium_caption_font-family: Inter;
        --mobile_medium_caption_font-size: 14;
        --mobile_medium_caption_font-weight: 400;
        --mobile_medium_caption_letter-spacing: 0;
        --mobile_medium_caption_text-indent: 0;
        --mobile_medium_caption_text-decoration-line: none;
        --mobile_medium_caption_text-transform: none;
        --mobile_medium_footnote_font-family: Inter;
        --mobile_medium_footnote_font-size: 12;
        --mobile_medium_footnote_font-weight: 400;
        --mobile_medium_footnote_letter-spacing: 0;
        --mobile_medium_footnote_text-indent: 0;
        --mobile_medium_footnote_text-decoration-line: none;
        --mobile_medium_footnote_text-transform: none;
        --mobile_regular_header-1_font-family: Inter;
        --mobile_regular_header-1_font-size: 27;
        --mobile_regular_header-1_font-weight: 400;
        --mobile_regular_header-1_letter-spacing: 0;
        --mobile_regular_header-1_text-indent: 0;
        --mobile_regular_header-1_text-decoration-line: none;
        --mobile_regular_header-1_text-transform: none;
        --mobile_regular_header-2_font-family: Inter;
        --mobile_regular_header-2_font-size: 21;
        --mobile_regular_header-2_font-weight: 400;
        --mobile_regular_header-2_letter-spacing: 0;
        --mobile_regular_header-2_text-indent: 0;
        --mobile_regular_header-2_text-decoration-line: none;
        --mobile_regular_header-2_text-transform: none;
        --mobile_regular_body_font-family: Inter;
        --mobile_regular_body_font-size: 16;
        --mobile_regular_body_font-weight: 400;
        --mobile_regular_body_letter-spacing: 0;
        --mobile_regular_body_text-indent: 0;
        --mobile_regular_body_text-decoration-line: none;
        --mobile_regular_body_text-transform: none;
        --mobile_regular_caption_font-family: Inter;
        --mobile_regular_caption_font-size: 14;
        --mobile_regular_caption_font-weight: 400;
        --mobile_regular_caption_letter-spacing: 0;
        --mobile_regular_caption_text-indent: 0;
        --mobile_regular_caption_text-decoration-line: none;
        --mobile_regular_caption_text-transform: none;
        --mobile_regular_footnote_font-family: Inter;
        --mobile_regular_footnote_font-size: 12;
        --mobile_regular_footnote_font-weight: 400;
        --mobile_regular_footnote_letter-spacing: 0;
        --mobile_regular_footnote_text-indent: 0;
        --mobile_regular_footnote_text-decoration-line: none;
        --mobile_regular_footnote_text-transform: none;
    }

    .itp_step_11_one_desti_391_13131 {
        position: relative;
        width: min(1280px,
                100%);
        height: 3787px;
        background-color: #f7fcff  !important;
                
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        overflow-x: visible;
        overflow-y: visible;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
    }

    .with_account_391_13132 {
        transform: translate(0px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1278px;
        padding-top: 0px;
        padding-right: 38px;
        padding-bottom: 0px;
        padding-left: 38px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108591_391_13133 {
        z-index: 1;
        width: 239px;
        padding-top: 5px;
        padding-right: 10px;
        padding-bottom: 5px;
        padding-left: 0px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .cocogen_corporate_signature_black71_1_391_13134 {
        z-index: 1;
        width: 100%;
        height: 60px;
        object-fit: cover;
        object-position: center center;
    }

    .frame_108594_391_13135 {
        z-index: 2;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108579_391_13140 {
        z-index: 3;
        height: 70px;
        padding-top: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
        background-color: var(--surfaces_lvl-1);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 8px;
        column-gap: 8px;
    }

    .frame_108578_391_13143 {
        z-index: 2;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .juan_391_13144 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_medium_caption_font-size) * 1px);
        font-family: var(--web_medium_caption_font-family);
        font-weight: var(--web_medium_caption_font-weight);
        text-transform: var(--web_medium_caption_text-transform);
        letter-spacing: calc(var(--web_medium_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_caption_line-height) * 1px);
        text-decoration-line: var(--web_medium_caption_text-decoration-line);
    }

    .banner_391_13147 {
        transform: translate(0.5px,
                70px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1280px;
        height: 146px;
        padding-top: 27px;
        padding-right: 486px;
        padding-bottom: 27px;
        padding-left: 486px;
        background-color: var(--primary_teal);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .frame_108576_391_13148 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108576_391_13149 {
        z-index: 1;
        padding-top: 10px;
        padding-right: 0px;
        padding-bottom: 10px;
        padding-left: 0px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 14px;
        column-gap: 14px;
    }

    .get_a_quote_391_13150 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--teal_lvl-3);
        font-size: calc(var(--web_medium_caption_font-size) * 1px);
        font-family: var(--web_medium_caption_font-family);
        font-weight: var(--web_medium_caption_font-weight);
        text-transform: var(--web_medium_caption_text-transform);
        letter-spacing: calc(var(--web_medium_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_caption_line-height) * 1px);
        text-decoration-line: var(--web_medium_caption_text-decoration-line);
    }

    .international_travel_plus_391_13153 {
        z-index: 3;
        text-align: center;
        vertical-align: top;
        color: var(--primary_white);
        font-size: calc(var(--web_medium_caption_font-size) * 1px);
        font-family: var(--web_medium_caption_font-family);
        font-weight: var(--web_medium_caption_font-weight);
        text-transform: var(--web_medium_caption_text-transform);
        letter-spacing: calc(var(--web_medium_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_caption_line-height) * 1px);
        text-decoration-line: var(--web_medium_caption_text-decoration-line);
    }

    .international_travel_plus_391_13154 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--primary_white);
        font-size: calc(var(--web_medium_header-3_font-size) * 1px);
        font-family: var(--web_medium_header-3_font-family);
        font-weight: var(--web_medium_header-3_font-weight);
        text-transform: var(--web_medium_header-3_text-transform);
        letter-spacing: calc(var(--web_medium_header-3_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_header-3_text-decoration-line);
    }

    .default_391_13156 {
        transform: translate(1px,
                959px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1278px;
        padding-top: 50px;
        padding-right: 0px;
        padding-bottom: 50px;
        padding-left: 0px;
        background-color: var(--teal_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108503_I391_13156_257_3419 {
        z-index: 1;
        width: 100%;
        padding-top: 20px;
        padding-right: 250px;
        padding-bottom: 20px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_section_I391_13156_257_3420 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_medium_header-5_font-size) * 1px);
        font-family: var(--web_medium_header-5_font-family);
        font-weight: var(--web_medium_header-5_font-weight);
        text-transform: var(--web_medium_header-5_text-transform);
        letter-spacing: calc(var(--web_medium_header-5_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_header-5_text-decoration-line);
    }

    .frame_108504_I391_13156_257_3421 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108502_I391_13156_257_3422 {
        z-index: 1;
        width: 100%;
        padding-top: 15px;
        padding-right: 250px;
        padding-bottom: 15px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 50px;
        column-gap: 50px;
    }

    .a_I391_13156_257_3423 {
        border: 1px solid rgb(228, 80, 154);
        z-index: 1;
        padding-top: 25px;
        padding-right: 35px;
        padding-bottom: 25px;
        padding-left: 35px;
        background-color: var(--primary_pink);
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    

    .b_I391_13156_257_3425 {
        width: 234.967px;
        z-index: 2;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 35px;
        padding-bottom: 25px;
        padding-left: 35px;
        background-color: transparent;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
        color:rgb(228, 80, 154);
    }

    .b_I391_13156_257_3425::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        /* border-image-width: 1;
        border-left-color: var(--primary_pink-disabled);
        border-top-color: var(--primary_pink-disabled);
        border-bottom-color: var(--primary_pink-disabled);
        border-right-color: var(--primary_pink-disabled); */
        border:1px solid rgb(228, 80, 154);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .selection_title_I391_13156_257_3426 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        /* color: var(--primary_pink-disabled); */
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        padding-top:15px;
    }

    .green_tooltip_391_13219 {
        transform: translate(1px,
                1231px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1280px;
        padding-top: 50px;
        padding-right: 0px;
        padding-bottom: 50px;
        padding-left: 0px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108510_I391_13219_260_4221 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108503_I391_13219_260_4222 {
        z-index: 1;
        width: 100%;
        padding-top: 20px;
        padding-right: 250px;
        padding-bottom: 20px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_section_I391_13219_260_4223 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_medium_header-5_font-size) * 1px);
        font-family: var(--web_medium_header-5_font-family);
        font-weight: var(--web_medium_header-5_font-weight);
        text-transform: var(--web_medium_header-5_text-transform);
        letter-spacing: calc(var(--web_medium_header-5_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_header-5_text-decoration-line);
    }

    .frame_108509_I391_13219_260_4224 {
        z-index: 2;
        width: 100%;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 10px;
        padding-left: 0px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108508_I391_13219_260_4225 {
        z-index: 1;
        width: 100%;
        padding-top: 15px;
        padding-right: 250px;
        padding-bottom: 15px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 50px;
        column-gap: 50px;
    }

    .a_I391_13219_260_4226 {
        z-index: 1;
        width: 234.967px;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 35px;
        padding-bottom: 25px;
        padding-left: 35px;
        background-color: var(--primary_pink);
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
        position: relative;
    }

    .a_I391_13219_260_4226::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_pink);
        border-top-color: var(--primary_pink);
        border-bottom-color: var(--primary_pink);
        border-right-color: var(--primary_pink);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .air_I391_13219_260_4228 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_white);
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        padding-top:15px;
    }

    .b_I391_13219_260_4229 {
        z-index: 2;
        width: 234.967px;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 35px;
        padding-bottom: 25px;
        padding-left: 35px;
        background-color: transparent;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .b_I391_13219_260_4229::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border:1px solid rgb(228, 80, 154);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .non-air_I391_13219_260_4230 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(228, 80, 154);
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        padding-top:15px;
    }

    .frame_108773_I391_13219_582_16240 {
        z-index: 3;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .frame_108772_I391_13219_582_16241 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .air_travel_via_plane_I391_13219_582_16244 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_medium_tiny_font-size) * 1px);
        font-family: var(--web_medium_tiny_font-family);
        font-weight: var(--web_medium_tiny_font-weight);
        text-transform: var(--web_medium_tiny_text-transform);
        letter-spacing: calc(var(--web_medium_tiny_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_tiny_line-height) * 1px);
        text-decoration-line: var(--web_medium_tiny_text-decoration-line);
    }

    .frame_108771_I391_13219_582_16245 {
        z-index: 2;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .non-air_travel_via_land_or_sea_minimum_o_I391_13219_582_16248 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_medium_tiny_font-size) * 1px);
        font-family: var(--web_medium_tiny_font-family);
        font-weight: var(--web_medium_tiny_font-weight);
        text-transform: var(--web_medium_tiny_text-transform);
        letter-spacing: calc(var(--web_medium_tiny_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_tiny_line-height) * 1px);
        text-decoration-line: var(--web_medium_tiny_text-decoration-line);
    }

    .frame_108674_391_13305 {
        transform: translate(1px,
                1563px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1280px;
        padding-top: 50px;
        padding-right: 0px;
        padding-bottom: 50px;
        padding-left: 0px;
        background-color: var(--teal_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108672_391_13303 {
        z-index: 1;
        width: 100%;
        padding-top: 20px;
        padding-right: 250px;
        padding-bottom: 20px;
        padding-left: 250px;
        background-color: var(--teal_lvl-0);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .destination_391_13298 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: rgb(0, 0, 0);
        font-size: calc(var(--web_medium_header-5_font-size) * 1px);
        font-family: var(--web_medium_header-5_font-family);
        font-weight: var(--web_medium_header-5_font-weight);
        text-transform: var(--web_medium_header-5_text-transform);
        letter-spacing: calc(var(--web_medium_header-5_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_header-5_text-decoration-line);
        padding-left: 160px;
    }

    .frame_108452_582_17089 {
        z-index: 2;
        width: 1280px;
        padding-top: 0px;
        padding-right: 250px;
        padding-bottom: 0px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 30px;
        column-gap: 30px;
    }

    .frame_108673_582_16528 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .dropdown_582_16529 {
        z-index: 1;
        width: 490px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I582_16529_211_871 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I582_16529_211_872 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I582_16529_211_872_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--status_danger);
    }

    .frame_108435_I582_16529_211_873 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 383px;
        column-gap: 383px;
        position: relative;
    }

    .frame_108435_I582_16529_211_873::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I582_16529_211_874 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .group_108451_582_17088 {
        z-index: 2;
        width: 490px;
        height: 350px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .group_108450_582_17087 {
        z-index: 1;
        width: 490px;
        height: 350px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .date_582_16535 {
        z-index: 2;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108445_I582_16535_213_1297 {
        z-index: 1;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I582_16535_213_1262 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--teal_lvl-12);
    }

    .field_label_I582_16535_213_1262_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: rgb(224,
                65,
                65);
    }

    .frame_16_I582_16535_213_1271 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 8px;
        padding-right: 10px;
        padding-bottom: 8px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .frame_16_I582_16535_213_1271::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .frame_472_I582_16535_213_1272 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 97px;
        column-gap: 97px;
    }

    .select_date_I582_16535_213_1273 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .date-selected_582_16736 {
        z-index: 3;
        width: 276px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 5px;
        column-gap: 5px;
    }

    .date_I582_16736_582_16558 {
        z-index: 1;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108445_I582_16736_582_16559 {
        z-index: 1;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I582_16736_582_16560 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--teal_lvl-12);
    }

    .field_label_I582_16736_582_16560_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: rgb(224,
                65,
                65);
    }

    .frame_16_I582_16736_582_16561 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 8px;
        padding-right: 10px;
        padding-bottom: 8px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .frame_16_I582_16736_582_16561::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .frame_472_I582_16736_582_16562 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 95px;
        column-gap: 95px;
    }

    .select_date_I582_16736_582_16563 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .calendar_-_single_I582_16736_582_16566 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 12px;
        padding-right: 12px;
        padding-bottom: 12px;
        padding-left: 12px;
        background-color: var(--primary_white);
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
        box-shadow: rgba(230,
                230, 230, 0.5) 4px 2px 10px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 4px;
        column-gap: 4px;
        position: relative;
    }

    .calendar_-_single_I582_16736_582_16566::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--surfaces_lvl-1);
        border-top-color: var(--surfaces_lvl-1);
        border-bottom-color: var(--surfaces_lvl-1);
        border-right-color: var(--surfaces_lvl-1);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .month__yearmasternone_I582_16736_582_16567 {
        z-index: 1;
        width: 100%;
        padding-top: 4px;
        padding-right: 0px;
        padding-bottom: 4px;
        padding-left: 0px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 8px;
        column-gap: 8px;
    }

    .month_I582_16736_582_16568 {
        z-index: 1;
        width: 100px;
        height: 32px;
        box-sizing: border-box;
        padding-top: 4px;
        padding-right: 0px;
        padding-bottom: 4px;
        padding-left: 0px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
        overflow-x: visible;
        overflow-y: visible;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        position: relative;
    }

    .month_I582_16736_582_16568::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--surfaces_lvl-2);
        border-top-color: var(--surfaces_lvl-2);
        border-bottom-color: var(--surfaces_lvl-2);
        border-right-color: var(--surfaces_lvl-2);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .dropdown_I582_16736_582_16569 {
        z-index: 1;
        width: 100%;
        height: 100%;
        padding-top: 0px;
        padding-right: 8px;
        padding-bottom: 0px;
        padding-left: 16px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 8px;
        column-gap: 8px;
    }

    .input_text_I582_16736_582_16572 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        overflow-x: visible;
        overflow-y: visible;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16573 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .right_icon_I582_16736_582_16574 {
        z-index: 2;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 4px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .input_iconmaster_I582_16736_582_16575 {
        z-index: 1;
        width: 16px;
        height: 16px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .year_I582_16736_582_16576 {
        z-index: 2;
        width: 100px;
        height: 32px;
        box-sizing: border-box;
        padding-top: 4px;
        padding-right: 0px;
        padding-bottom: 4px;
        padding-left: 0px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
        overflow-x: visible;
        overflow-y: visible;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        position: relative;
    }

    .year_I582_16736_582_16576::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--surfaces_lvl-2);
        border-top-color: var(--surfaces_lvl-2);
        border-bottom-color: var(--surfaces_lvl-2);
        border-right-color: var(--surfaces_lvl-2);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .dropdown_I582_16736_582_16577 {
        z-index: 1;
        width: 100%;
        height: 100%;
        padding-top: 0px;
        padding-right: 8px;
        padding-bottom: 0px;
        padding-left: 16px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 8px;
        column-gap: 8px;
    }

    .input_text_I582_16736_582_16580 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        overflow-x: visible;
        overflow-y: visible;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16581 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .right_icon_I582_16736_582_16582 {
        z-index: 2;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 4px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .input_iconmaster_I582_16736_582_16583 {
        z-index: 1;
        width: 16px;
        height: 16px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_date_gridmaster_I582_16736_582_16584 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .days_of_the_weekmaster_I582_16736_582_16585 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_daymaster_I582_16736_582_16586 {
        z-index: 1;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 6px;
        padding-bottom: 6px;
        padding-left: 7px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16587 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .calendar_daymaster_I582_16736_582_16588 {
        z-index: 2;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 5px;
        padding-bottom: 6px;
        padding-left: 5px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16589 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .calendar_daymaster_I582_16736_582_16590 {
        z-index: 3;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 7px;
        padding-bottom: 6px;
        padding-left: 7px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16591 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .calendar_daymaster_I582_16736_582_16592 {
        z-index: 4;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 5px;
        padding-bottom: 6px;
        padding-left: 5px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16593 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .calendar_daymaster_I582_16736_582_16594 {
        z-index: 5;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 6px;
        padding-bottom: 6px;
        padding-left: 7px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16595 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .calendar_daymaster_I582_16736_582_16596 {
        z-index: 6;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 10px;
        padding-bottom: 6px;
        padding-left: 11px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16597 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .calendar_daymaster_I582_16736_582_16598 {
        z-index: 7;
        width: 36px;
        height: 28px;
        padding-top: 6px;
        padding-right: 8px;
        padding-bottom: 6px;
        padding-left: 8px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16599 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: rgb(122,
                127,
                137);
        font-size: 12px;
        font-family: Inter;
        font-weight: 500;
        line-height: 16px;
    }

    .weekmaster_I582_16736_582_16600 {
        z-index: 2;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_datemaster_I582_16736_582_16601 {
        z-index: 1;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16602 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16603 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16604 {
        z-index: 2;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16605 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16606 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16607 {
        z-index: 3;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16608 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 0px;
        padding-bottom: 4px;
        padding-left: 0px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16609 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16610 {
        z-index: 4;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16611 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16612 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16613 {
        z-index: 5;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16614 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16615 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16616 {
        z-index: 6;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16617 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16618 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16619 {
        z-index: 7;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16620 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16621 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .weekmaster_I582_16736_582_16622 {
        z-index: 3;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_datemaster_I582_16736_582_16623 {
        z-index: 1;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16624 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16625 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16626 {
        z-index: 2;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16627 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 9px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16628 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16629 {
        z-index: 3;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16630 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16631 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16632 {
        z-index: 4;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16633 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16634 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16635 {
        z-index: 5;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16636 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16637 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16638 {
        z-index: 6;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16639 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 6px;
        padding-bottom: 4px;
        padding-left: 6px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16640 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16641 {
        z-index: 7;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16642 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 6px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16643 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .weekmaster_I582_16736_582_16644 {
        z-index: 4;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_datemaster_I582_16736_582_16645 {
        z-index: 1;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16646 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16647 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16648 {
        z-index: 2;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16649 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16650 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16651 {
        z-index: 3;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16652 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 6px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16653 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: rgb(132,
                138,
                144);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16654 {
        z-index: 4;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16655 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: transparent;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16656 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: rgb(132,
                138,
                144);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16657 {
        z-index: 5;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16658 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 6px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16659 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16660 {
        z-index: 6;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16661 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 5px;
        padding-right: 6px;
        padding-bottom: 5px;
        padding-left: 5px;
        background-color: transparent;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16662 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16663 {
        z-index: 7;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16664 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16665 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .weekmaster_I582_16736_582_16666 {
        z-index: 5;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_datemaster_I582_16736_582_16667 {
        z-index: 1;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16668 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16669 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16670 {
        z-index: 2;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16671 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 6px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16672 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16673 {
        z-index: 3;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16674 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16675 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16676 {
        z-index: 4;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16677 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16678 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16679 {
        z-index: 5;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16680 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16681 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16682 {
        z-index: 6;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: var(--primary_white);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16683 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: var(--primary_white);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16684 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--surfaces_lvl-5);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16685 {
        position: relative;
        z-index: 7;
        width: 36px;
        height: 28px;
        padding-top: 8px;
        padding-right: 8px;
        padding-bottom: 8px;
        padding-left: 8px;
        background-color: transparent;
    }

    .date_I582_16736_582_16686 {
        transform: translate(6px,
                2px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16687 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: rgb(29,
                31,
                35);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .date_I582_16736_582_16728 {
        transform: translate(6px,
                2px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 24px;
        height: 24px;
        padding-top: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        padding-left: 4px;
        background-color: var(--primary_pink);
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16729 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: rgb(255,
                255,
                255);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .weekmaster_I582_16736_582_16688 {
        z-index: 6;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .calendar_datemaster_I582_16736_582_16689 {
        z-index: 1;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16690 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16691 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16692 {
        z-index: 2;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16693 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16694 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16695 {
        z-index: 3;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16696 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16697 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16698 {
        z-index: 4;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16699 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 4px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16700 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16701 {
        z-index: 5;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16702 {
        z-index: 1;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 5px;
        padding-bottom: 4px;
        padding-left: 5px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16703 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16704 {
        z-index: 6;
        width: 36px;
        height: 28px;
        padding-top: 2px;
        padding-right: 6px;
        padding-bottom: 2px;
        padding-left: 6px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .date_I582_16736_582_16705 {
        z-index: 1;
        width: 24px;
        height: 24px;
        background-color: transparent;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16706 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .date_I582_16736_582_16730 {
        z-index: 2;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 0px;
        padding-bottom: 4px;
        padding-left: 0px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16731 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .calendar_datemaster_I582_16736_582_16707 {
        position: relative;
        z-index: 7;
        width: 36px;
        height: 28px;
        padding-top: 8px;
        padding-right: 8px;
        padding-bottom: 8px;
        padding-left: 8px;
        background-color: transparent;
    }

    .date_I582_16736_582_16708 {
        transform: translate(6px,
                2px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: rgb(252,
                252,
                253);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16709 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: rgb(29,
                31,
                35);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .date_I582_16736_582_16732 {
        transform: translate(6px,
                2px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 4px;
        padding-bottom: 4px;
        padding-left: 4px;
        background-color: transparent;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
    }

    .text_I582_16736_582_16733 {
        transform: translate(9px,
                4px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .date_I582_16736_582_16734 {
        transform: translate(-3px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 24px;
        height: 24px;
        padding-top: 4px;
        padding-right: 8px;
        padding-bottom: 4px;
        padding-left: 8px;
        background-color: rgb(255,
                255,
                255);
        background-position-x: 0%;
        background-position-y: 0%;
        background-repeat: repeat;
        background-attachment: scroll;
        background-image: none;
        background-size: auto;
        background-origin: padding-box;
        background-clip: border-box;
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
        border-bottom-right-radius: 100px;
        border-bottom-left-radius: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .text_I582_16736_582_16735 {
        z-index: 1;
        text-align: center;
        vertical-align: middle;
        color: var(--primary_black);
        font-size: 12px;
        font-family: Inter;
        font-weight: 400;
        line-height: 16px;
    }

    .footer_I582_16736_582_16710 {
        z-index: 3;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 4px;
        column-gap: 4px;
    }

    .calendar_bordermaster_I582_16736_582_16711 {
        z-index: 1;
        width: 252px;
        padding-top: 4px;
        padding-right: 0px;
        padding-bottom: 4px;
        padding-left: 0px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .divider_I582_16736_582_16712 {
        z-index: 1;
        width: 100%;
        height: 1px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .actions_I582_16736_582_16713 {
        z-index: 2;
        width: 252px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .secondary_I582_16736_582_16714 {
        z-index: 1;
        width: 120px;
        padding-top: 10px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-left: 20px;
        background-color: transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .button_I582_16736_582_16714_215_3070 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_teal);
        font-size: calc(var(--web_medium_tiny_font-size) * 1px);
        font-family: var(--web_medium_tiny_font-family);
        font-weight: var(--web_medium_tiny_font-weight);
        text-transform: var(--web_medium_tiny_text-transform);
        letter-spacing: calc(var(--web_medium_tiny_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_tiny_line-height) * 1px);
        text-decoration-line: var(--web_medium_tiny_text-decoration-line);
    }

    .disabled_I582_16736_582_16715 {
        z-index: 2;
        width: 120px;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-left: 20px;
        background-color: transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .disabled_I582_16736_582_16715::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-top-color: rgb(168,
                217,
                217);
        border-right-width: 1px;
        border-right-style: solid;
        border-right-color: rgb(168,
                217,
                217);
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: rgb(168,
                217,
                217);
        border-left-width: 1px;
        border-left-style: solid;
        border-left-color: rgb(168,
                217,
                217);
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .button_I582_16736_582_16715_215_3133 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--teal_lvl-3);
        font-size: calc(var(--web_medium_tiny_font-size) * 1px);
        font-family: var(--web_medium_tiny_font-family);
        font-weight: var(--web_medium_tiny_font-weight);
        text-transform: var(--web_medium_tiny_text-transform);
        letter-spacing: calc(var(--web_medium_tiny_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_tiny_line-height) * 1px);
        text-decoration-line: var(--web_medium_tiny_text-decoration-line);
    }

    .domestic_internatioal_392_13592 {
        transform: translate(1476px,
                153px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 532px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .group_108428_I392_13592_391_13070 {
        z-index: 1;
        width: 532px;
        height: 80px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .frame_108568_I392_13592_391_13074 {
        z-index: 4;
        width: 88px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108563_I392_13592_391_13097 {
        z-index: 1;
        width: 35px;
        height: 34px;
        box-sizing: border-box;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--teal_lvl-0);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .frame_108563_I392_13592_391_13097::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_teal);
        border-top-color: var(--primary_teal);
        border-bottom-color: var(--primary_teal);
        border-right-color: var(--primary_teal);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    ._I392_13592_391_13098 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_teal);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108567_I392_13592_391_13076 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .trip_details_I392_13592_391_13077 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_light-black-text);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .in_progress_I392_13592_391_13078 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--primary_teal);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .frame_108570_I392_13592_391_13079 {
        z-index: 5;
        width: 92px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108564_I392_13592_391_13080 {
        z-index: 1;
        width: 35px;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--surfaces_lvl-2);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    ._I392_13592_391_13081 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108569_I392_13592_391_13082 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .quotation_I392_13592_391_13083 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .pending_I392_13592_391_13084 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-4);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .frame_108572_I392_13592_391_13085 {
        z-index: 6;
        width: 82px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108565_I392_13592_391_13086 {
        z-index: 1;
        width: 35px;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--surfaces_lvl-2);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    ._I392_13592_391_13087 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108571_I392_13592_391_13088 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .personal_data_I392_13592_391_13089 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .pending_I392_13592_391_13090 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-4);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .frame_108574_I392_13592_391_13091 {
        z-index: 7;
        width: 162px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108566_I392_13592_391_13092 {
        z-index: 1;
        width: 35px;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--surfaces_lvl-2);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    ._I392_13592_391_13093 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108573_I392_13592_391_13094 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .payment_I392_13592_391_13095 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .pending_I392_13592_391_13096 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-4);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .sht_543_18990 {
        transform: translate(1px,
                856px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1280px;
        padding-top: 35px;
        padding-right: 0px;
        padding-bottom: 35px;
        padding-left: 0px;
        background-color: var(--teal_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108455_I543_18990_228_3021 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108456_I543_18990_228_3022 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .section_header_title_I543_18990_228_3010 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_bold_header-6_font-size) * 1px);
        font-family: var(--web_bold_header-6_font-family);
        font-weight: var(--web_bold_header-6_font-weight);
        text-transform: var(--web_bold_header-6_text-transform);
        letter-spacing: calc(var(--web_bold_header-6_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_header-6_text-decoration-line);
        padding-left: 100px;
    }

    .info_543_18993 {
        transform: translate(1px,
                415px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1280px;
        height: 441px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .sht_543_18994 {
        z-index: 1;
        width: 1280px;
        padding-top: 35px;
        padding-right: 0px;
        padding-bottom: 35px;
        padding-left: 120px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108455_I543_18994_256_3250 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108456_I543_18994_256_3251 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .section_header_title_I543_18994_256_3252 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_bold_header-6_font-size) * 1px);
        font-family: var(--web_bold_header-6_font-family);
        font-weight: var(--web_bold_header-6_font-weight);
        text-transform: var(--web_bold_header-6_text-transform);
        letter-spacing: calc(var(--web_bold_header-6_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_header-6_text-decoration-line);
    }

    .frame_108587_543_18995 {
        z-index: 2;
        width: 1280px;
        padding-top: 50px;
        padding-right: 250px;
        padding-bottom: 50px;
        padding-left: 250px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 35px;
        column-gap: 35px;
    }

    .frame_108585_543_18996 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 23px;
        column-gap: 23px;
    }

    .input_text_543_18997 {
        z-index: 1;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I543_18997_211_789 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I543_18997_211_790 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I543_18997_211_790_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--status_danger);
    }

    .frame_108435_I543_18997_211_791 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 132px;
        column-gap: 132px;
        position: relative;
    }

    .frame_108435_I543_18997_211_791::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I543_18997_211_792 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .input_text_543_18998 {
        z-index: 2;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I543_18998_211_789 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I543_18998_211_790 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I543_18998_211_790_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--status_danger);
    }

    .frame_108435_I543_18998_211_791 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 119px;
        column-gap: 119px;
        position: relative;
    }

    .frame_108435_I543_18998_211_791::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I543_18998_211_792 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .dropdown_543_18999 {
        z-index: 3;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I543_18999_211_871 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I543_18999_211_872 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I543_18999_211_872_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--status_danger);
    }

    .frame_108435_I543_18999_211_873 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 146px;
        column-gap: 146px;
        position: relative;
    }

    .frame_108435_I543_18999_211_873::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I543_18999_211_874 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .frame_108586_543_19160 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 23px;
        column-gap: 23px;
    }

    .input_text_543_19161 {
        z-index: 1;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I543_19161_211_789 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I543_19161_211_790 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I543_19161_211_790_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--status_danger);
    }

    .frame_108435_I543_19161_211_791 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 132px;
        column-gap: 132px;
        position: relative;
    }

    .frame_108435_I543_19161_211_791::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I543_19161_211_792 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .input_text_543_19162 {
        z-index: 2;
        width: 214px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I543_19162_211_789 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I543_19162_211_790 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I543_19162_211_790_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--status_danger);
    }

    .frame_108435_I543_19162_211_791 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 119px;
        column-gap: 119px;
        position: relative;
    }

    .frame_108435_I543_19162_211_791::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I543_19162_211_792 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .input_text_969_15638 {
        z-index: 3;
        width: 216px;
        background-color: var(--surfaces_disabled);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I969_15638_969_15165 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I969_15638_969_15166 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
    }

    .frame_108435_I969_15638_969_15167 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 102px;
        column-gap: 102px;
        position: relative;
    }

    .frame_108435_I969_15638_969_15167::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I969_15638_969_15168 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .frame_108587_969_15724 {
        z-index: 3;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 23px;
        column-gap: 23px;
    }

    .dropdown_969_15725 {
        z-index: 1;
        width: 216px;
        background-color: var(--surfaces_disabled);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I969_15725_382_8501 {
        z-index: 1;
        width: 100%;
        padding-top: 0px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I969_15725_382_8502 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .field_label_I969_15725_382_8502_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
        color: rgb(224,
                65,
                65);
    }

    .frame_108435_I969_15725_382_8503 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: transparent;
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 120px;
        column-gap: 120px;
        position: relative;
    }

    .frame_108435_I969_15725_382_8503::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I969_15725_382_8504 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-9);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .covid_543_19023 {
        transform: translate(0px,
                2167px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1279px;
        height: 335px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .default_543_19024 {
        z-index: 1;
        width: 1278px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 50px;
        padding-left: 8%;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108504_543_19025 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108502_543_19026 {
        z-index: 1;
        width: 100%;
        padding-top: 15px;
        padding-right: 250px;
        padding-bottom: 15px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 30px;
        column-gap: 30px;
    }

    .a_543_19027 {
        z-index: 1;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 50px;
        padding-bottom: 25px;
        padding-left: 50px;
        background-color: var(--primary_pink);
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
        min-width:200px;
    }

    .a_543_19027::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_pink);
        border-top-color: var(--primary_pink);
        border-bottom-color: var(--primary_pink);
        border-right-color: var(--primary_pink);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .no_543_19029 {
        z-index: 1;
        text-align: center;
        vertical-align: center;
        color: var(--primary_white);
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        margin-top:15px;
    }

    .covid_15_days {
        z-index: 1;
        text-align: center;
        vertical-align: center;
        margin-top:15px;
    }

    .entire_duration_covid {
        z-index: 1;
        text-align: center;
        vertical-align: center;
        margin-top:15px;
        width:13rem;
    }

    .b_543_19030 {
        z-index: 1;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 55px;
        padding-bottom: 25px;
        padding-left: 55px;
        background-color: transparent;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
        min-width:200px;
    }

    .b_543_19030::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_pink);
        border-top-color: var(--primary_pink);
        border-bottom-color: var(--primary_pink);
        border-right-color: var(--primary_pink);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .yes_543_19031 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_pink);
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        margin-top:15px;
    }

    .frame_108501_543_19032 {
        z-index: 2;
        width: 100%;
        padding-top: 15px;
        padding-right: 100px;
        padding-bottom: 15px;
        padding-left: 100px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .frame_108857_1031_20139 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .covid-19_assist_provides_coverage_for_me_543_19034 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        color: var(--primary_teal);
    }

    .covid-19_assist_provides_coverage_for_me_543_19034_1 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .sht_543_19035 {
        z-index: 2;
        width: 1277px;
        padding-top: 35px;
        padding-right: 0px;
        padding-bottom: 35px;
        padding-left: 0px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108455_I543_19035_228_3021 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108456_I543_19035_228_3022 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .section_header_title_I543_19035_228_3010 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_bold_header-6_font-size) * 1px);
        font-family: var(--web_bold_header-6_font-family);
        font-weight: var(--web_bold_header-6_font-weight);
        text-transform: var(--web_bold_header-6_text-transform);
        letter-spacing: calc(var(--web_bold_header-6_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_header-6_text-decoration-line);
        margin-left: 12%;
    }

    .covid_543_19041 {
        transform: translate(0px,
                2502px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1279px;
        height: 335px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .default_543_19042 {
        z-index: 1;
        width: 1278px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 50px;
        padding-left: 0px;
        background-color: var(--teal_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108504_543_19043 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        margin-left:4%;
    }

    .frame_108502_543_19044 {
        z-index: 1;
        width: 100%;
        padding-top: 15px;
        padding-right: 250px;
        padding-bottom: 15px;
        padding-left: 250px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 30px;
        column-gap: 30px;
    }

    .a_543_19045 {
        z-index: 1;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 50px;
        padding-bottom: 25px;
        padding-left: 50px;
        background-color: var(--primary_pink);
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
        min-width:200px;
    }

    .a_543_19045::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_pink);
        border-top-color: var(--primary_pink);
        border-bottom-color: var(--primary_pink);
        border-right-color: var(--primary_pink);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .no_543_19047 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_white);
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        margin-top: 15px;
    }

    .b_543_19048 {
        z-index: 1;
        box-sizing: border-box;
        padding-top: 25px;
        padding-right: 55px;
        padding-bottom: 25px;
        padding-left: 55px;
        background-color: transparent;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
        min-width:200px;
    }

    .b_543_19048::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_pink);
        border-top-color: var(--primary_pink);
        border-bottom-color: var(--primary_pink);
        border-right-color: var(--primary_pink);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    .yes_543_19049 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_pink);
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        margin-top:15px;
    }

    .frame_108501_543_19050 {
        z-index: 2;
        width: 100%;
        padding-top: 15px;
        padding-right: 100px;
        padding-bottom: 15px;
        padding-left: 100px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .frame_108858_1031_20140 {
        z-index: 1;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 12px;
        column-gap: 12px;
    }

    .cruise_surcharge_is_an_optional_coverage_543_19052 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        color: var(--primary_teal);
    }

    .cruise_surcharge_is_an_optional_coverage_543_19052_1 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        font-size: calc(var(--web_medium_body_font-size) * 1px);
        font-family: var(--web_medium_body_font-family);
        font-weight: var(--web_medium_body_font-weight);
        text-transform: var(--web_medium_body_text-transform);
        letter-spacing: calc(var(--web_medium_body_letter-spacing) * 1%);
        line-height: calc(var(--web_medium_body_line-height) * 1px);
        text-decoration-line: var(--web_medium_body_text-decoration-line);
        color: var(--surfaces_lvl-5);
    }

    .sht_543_19053 {
        z-index: 2;
        width: 1277px;
        padding-top: 35px;
        padding-right: 0px;
        padding-bottom: 35px;
        padding-left: 0px;
        background-color: var(--teal_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108455_I543_19053_228_3021 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .frame_108456_I543_19053_228_3022 {
        z-index: 1;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .section_header_title_I543_19053_228_3010 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_bold_header-6_font-size) * 1px);
        font-family: var(--web_bold_header-6_font-family);
        font-weight: var(--web_bold_header-6_font-weight);
        text-transform: var(--web_bold_header-6_text-transform);
        letter-spacing: calc(var(--web_bold_header-6_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_header-6_text-decoration-line);
        margin-left:12%;
    }

    .promo_543_19077 {
        transform: translate(0px,
                2837px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1279px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .sht_421_9681 {
        z-index: 1;
        width: 100%;
        padding-top: 35px;
        padding-right: 0px;
        padding-bottom: 35px;
        padding-left: 0px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .section_header_title_I421_9681_256_3247 {
        margin-left: 48%;
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_bold_header-6_font-size) * 1px);
        font-family: var(--web_bold_header-6_font-family);
        font-weight: var(--web_bold_header-6_font-weight);
        text-transform: var(--web_bold_header-6_text-transform);
        letter-spacing: calc(var(--web_bold_header-6_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_header-6_text-decoration-line);
    }

    .frame_108612_421_9675 {
        transform: translate(0px,
                2940px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 1281px;
        padding-top: 35px;
        padding-right: 250px;
        padding-bottom: 50px;
        padding-left: 250px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .input_text_421_9676 {
        z-index: 1;
        width: 416px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .frame_108436_I421_9676_211_794 {
        z-index: 1;
        width: 100%;
        padding-top: 2px;
        padding-right: 10px;
        padding-bottom: 2px;
        padding-left: 10px;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .field_label_I421_9676_211_795 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_regular_footnote_font-size) * 1px);
        font-family: var(--web_regular_footnote_font-family);
        font-weight: var(--web_regular_footnote_font-weight);
        text-transform: var(--web_regular_footnote_text-transform);
        letter-spacing: calc(var(--web_regular_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_regular_footnote_text-decoration-line);
    }

    .frame_108435_I421_9676_211_796 {
        z-index: 2;
        width: 100%;
        box-sizing: border-box;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        background-color: var(--status_highlight-red);
        border-top-left-radius: 1px;
        border-top-right-radius: 1px;
        border-bottom-right-radius: 1px;
        border-bottom-left-radius: 1px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .frame_108435_I421_9676_211_796::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-bottom-color: currentcolor;
    }

    .field_label_I421_9676_211_797 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--status_danger);
        font-size: calc(var(--web_regular_caption_font-size) * 1px);
        font-family: var(--web_regular_caption_font-family);
        font-weight: var(--web_regular_caption_font-weight);
        text-transform: var(--web_regular_caption_text-transform);
        letter-spacing: calc(var(--web_regular_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_caption_line-height) * 1px);
        text-decoration-line: var(--web_regular_caption_text-decoration-line);
    }

    .reminder_576_17317 {
        z-index: 2;
        width: 705px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 8px;
        column-gap: 8px;
    }

    .frame_108457_I576_17317_538_17976 {
        z-index: 1;
        width: 67%;
        padding-top: 10px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-left: 20px;
        background-color: var(--surfaces_lvl-2);
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
        margin-left: 18%;
    }

    .featured_icon_I576_17317_538_18227 {
        z-index: 1;
        width: 26px;
        height: 26px;
        padding-top: 3px;
        padding-right: 3px;
        padding-bottom: 3px;
        padding-left: 3px;
        background-color: var(--status_danger);
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        border-bottom-right-radius: 16px;
        border-bottom-left-radius: 16px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
    }

    .invalid_promo_code_kindly_check_if_enter_I576_17317_538_17979 {
        z-index: 2;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: calc(var(--web_regular_body_font-size) * 1px);
        font-family: var(--web_regular_body_font-family);
        font-weight: var(--web_regular_body_font-weight);
        text-transform: var(--web_regular_body_text-transform);
        letter-spacing: calc(var(--web_regular_body_letter-spacing) * 1%);
        line-height: calc(var(--web_regular_body_line-height) * 1px);
        text-decoration-line: var(--web_regular_body_text-decoration-line);
    }

    .frame_108614_421_9677 {
        transform: translate(0px,
                3151px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 50px;
        width: 1281px;
        padding-top: 50px;
        padding-right: 201px;
        padding-bottom: 50px;
        padding-left: 201px;
        background-color: var(--surfaces_lvl-0);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 25px;
        column-gap: 25px;
    }

    .consent_626_13097 {
        z-index: 1;
        width: 870px;
        padding-top: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        padding-left: 65px;
        background-color: var(--status_light-yellow);
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .by_proceeding_to_next_steps_you_hereby_c_626_13098 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: 16px;
        line-height: 24px;
        font-family: Inter;
        font-weight: 400;
    }

    .by_proceeding_to_next_steps_you_hereby_c_626_13098_1 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: 16px;
        line-height: 24px;
        font-family: Inter;
        font-weight: 700;
        text-decoration-line: underline;
        text-decoration-style: solid;
        text-decoration-color: currentcolor;
        text-decoration-thickness: auto;
    }

    .by_proceeding_to_next_steps_you_hereby_c_626_13098_2 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: 16px;
        line-height: 24px;
        font-family: Inter;
        font-weight: 400;
    }

    .by_proceeding_to_next_steps_you_hereby_c_626_13098_3 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: 16px;
        line-height: 24px;
        font-family: Inter;
        font-weight: 700;
        text-decoration-line: underline;
        text-decoration-style: solid;
        text-decoration-color: currentcolor;
        text-decoration-thickness: auto;
    }

    .by_proceeding_to_next_steps_you_hereby_c_626_13098_4 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_black);
        font-size: 16px;
        line-height: 24px;
        font-family: Inter;
        font-weight: 400;
    }

    .frame_108613_421_9678 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 20px;
        column-gap: 20px;
    }

    .secondary_421_9679 {
        z-index: 1;
        padding-top: 10px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-left: 20px;
        background-color: transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .button_I421_9679_215_3043 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_teal);
        font-size: calc(var(--web_medium_header-5_font-size) * 1px);
        font-family: var(--web_medium_header-5_font-family);
        font-weight: var(--web_medium_header-5_font-weight);
        text-transform: var(--web_medium_header-5_text-transform);
        letter-spacing: calc(var(--web_medium_header-5_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_header-5_text-decoration-line);
    }

    .primary_421_9680 {
        z-index: 2;
        padding-top: 10px;
        padding-right: 20px;
        padding-bottom: 10px;
        padding-left: 20px;
        background-color: var(--primary_teal);
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .button_I421_9680_214_2275 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_white);
        font-size: calc(var(--web_medium_header-5_font-size) * 1px);
        font-family: var(--web_medium_header-5_font-family);
        font-weight: var(--web_medium_header-5_font-weight);
        text-transform: var(--web_medium_header-5_text-transform);
        letter-spacing: calc(var(--web_medium_header-5_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_header-5_text-decoration-line);
    }

    .domestic_internatioal_391_13155 {
        transform: translate(374px,
                275px) rotate(0deg) scale(1);
        transform-origin: left top 0px;
        position: absolute;
        top: 0px;
        left: 0px;
        width: 532px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    .group_108428_I391_13155_391_13070 {
        z-index: 1;
        width: 532px;
        height: 80px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: wrap;
    }

    .frame_108568_I391_13155_391_13074 {
        z-index: 4;
        width: 88px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108563_I391_13155_391_13097 {
        z-index: 1;
        width: 35px;
        height: 34px;
        box-sizing: border-box;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--teal_lvl-0);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
        position: relative;
    }

    .frame_108563_I391_13155_391_13097::before {
        content: "";
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        border-top-width: 1px;
        border-top-style: solid;
        border-right-width: 1px;
        border-right-style: solid;
        border-bottom-width: 1px;
        border-bottom-style: solid;
        border-left-width: 1px;
        border-left-style: solid;
        border-image-outset: 0;
        border-image-repeat: stretch;
        border-image-slice: 100%;
        border-image-source: none;
        border-image-width: 1;
        border-left-color: var(--primary_teal);
        border-top-color: var(--primary_teal);
        border-bottom-color: var(--primary_teal);
        border-right-color: var(--primary_teal);
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
        border-bottom-right-radius: inherit;
        border-bottom-left-radius: inherit;
    }

    ._I391_13155_391_13098 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--primary_teal);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108567_I391_13155_391_13076 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .trip_details_I391_13155_391_13077 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--primary_light-black-text);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .in_progress_I391_13155_391_13078 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--primary_teal);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .frame_108570_I391_13155_391_13079 {
        z-index: 5;
        width: 92px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108564_I391_13155_391_13080 {
        z-index: 1;
        width: 35px;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--surfaces_lvl-2);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    ._I391_13155_391_13081 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108569_I391_13155_391_13082 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .quotation_I391_13155_391_13083 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .pending_I391_13155_391_13084 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-4);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .frame_108572_I391_13155_391_13085 {
        z-index: 6;
        width: 82px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108565_I391_13155_391_13086 {
        z-index: 1;
        width: 35px;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--surfaces_lvl-2);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    ._I391_13155_391_13087 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108571_I391_13155_391_13088 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .personal_data_I391_13155_391_13089 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .pending_I391_13155_391_13090 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-4);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }

    .frame_108574_I391_13155_391_13091 {
        z-index: 7;
        width: 162px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 13px;
        column-gap: 13px;
    }

    .frame_108566_I391_13155_391_13092 {
        z-index: 1;
        width: 35px;
        padding-top: 5px;
        padding-right: 15px;
        padding-bottom: 5px;
        padding-left: 15px;
        background-color: var(--surfaces_lvl-2);
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 10px;
        column-gap: 10px;
    }

    ._I391_13155_391_13093 {
        z-index: 1;
        text-align: left;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_caption_font-size) * 1px);
        font-family: var(--web_bold_caption_font-family);
        font-weight: var(--web_bold_caption_font-weight);
        text-transform: var(--web_bold_caption_text-transform);
        letter-spacing: calc(var(--web_bold_caption_letter-spacing) * 1%);
        line-height: calc(var(--web_bold_caption_line-height) * 1px);
        text-decoration-line: var(--web_bold_caption_text-decoration-line);
    }

    .frame_108573_I391_13155_391_13094 {
        z-index: 2;
        width: 100%;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        box-sizing: border-box;
        flex-wrap: nowrap;
        row-gap: 6px;
        column-gap: 6px;
    }

    .payment_I391_13155_391_13095 {
        z-index: 1;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-5);
        font-size: calc(var(--web_bold_tiny_font-size) * 1px);
        font-family: var(--web_bold_tiny_font-family);
        font-weight: var(--web_bold_tiny_font-weight);
        text-transform: var(--web_bold_tiny_text-transform);
        letter-spacing: calc(var(--web_bold_tiny_letter-spacing) * 1%);
        text-decoration-line: var(--web_bold_tiny_text-decoration-line);
    }

    .pending_I391_13155_391_13096 {
        z-index: 2;
        text-align: center;
        vertical-align: top;
        color: var(--surfaces_lvl-4);
        font-size: calc(var(--web_medium_footnote_font-size) * 1px);
        font-family: var(--web_medium_footnote_font-family);
        font-weight: var(--web_medium_footnote_font-weight);
        text-transform: var(--web_medium_footnote_text-transform);
        letter-spacing: calc(var(--web_medium_footnote_letter-spacing) * 1%);
        text-decoration-line: var(--web_medium_footnote_text-decoration-line);
    }
</style>