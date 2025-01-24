<div class="policy-group row mb">
    <div class="col-12 col-md-5">
        <div class="formRow">
            <div class="mb-2 mb-lg-0 d-block">
                <div @if ($errors->has('policy_no.'.$index)) class="invalid invalid-required" @endif>
                    <label for="policy_no" class="form-label">Policy Number *</label>
                    <input type="text" class="form-control" name="policy_no[]" id="policy_no" placeholder="LL-SSS-BB-YY-NNNNNNN-RR" value="{{ $policy }}"/>
                    @if ($errors->has('policy_no.'.$index))
                        <span class="feedback">{{ $errors->first('policy_no.'.$index) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-5">
        <div class="formRow">
            <div class="mb-2 mb-lg-0 d-block">
                <div @if ($errors->has('amount.'.$index)) class="invalid invalid-required" @endif>
                    <label for="amount" class="form-label">Amount *</label>
                    <input type="text" class="form-control" placeholder="0.00" name="amount[]" id="amount" value="{{ $amount }}"/>
                    @if ($errors->has('amount.'.$index))
                        <span class="feedback">{{ $errors->first('amount.'.$index) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <div class="mb-2">
            <label class="form-label invisible d-none d-md-block">Controls</label>
            <div class="control-buttons">
                <a href="#" class="button add-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.715" height="24.715" viewBox="0 0 24.715 24.715">
                        <g id="Component_133_1" data-name="Component 133 – 1" transform="translate(1.5 1.5)">
                            <path id="Path_1740" data-name="Path 1740" d="M18,12V33.715" transform="translate(-7.143 -12)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            <path id="Path_1741" data-name="Path 1741" d="M12,18H33.715" transform="translate(-12 -7.143)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        </g>
                    </svg>
                </a>
                <a href="#" class="button delete-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.715" height="24.715" viewBox="0 0 24.715 24.715">
                        <g id="Component_133_1" data-name="Component 133 – 1" transform="translate(1.5 1.5)">
                            <path id="Path_1740" data-name="Path 1740" d="M18,12V33.715" transform="translate(-7.143 -12)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            <path id="Path_1741" data-name="Path 1741" d="M12,18H33.715" transform="translate(-12 -7.143)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
