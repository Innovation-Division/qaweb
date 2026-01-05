<div class="sticky-stepper-wrapper">
    <div class="stepper-logo-container-mobile">
        <div class="hamburger-menu-container">
            <div class="hamburger-icon-container">
                <img src="{{ asset('assets/icons/Icon-Hamburger.svg') }}" alt="Hamburger Menu" class="hamburger-icon">
            </div>
        </div>
        <img src="{{ asset('assets/icons/Icon-Cocogen-Black.png') }}" alt="Logo" class="stepper-logo">
    </div>

    <div class="stepper-container">
        <div class="stepper-logo-container hidden-on-mobile">
            <img src="{{ asset('assets/icons/Icon-Cocogen.png') }}" alt="Logo">
        </div>
        <div class="steps-wrapper">
            @php
                $steps = [
                    1 => 'Select Account',
                    2 => 'Your Identity',
                    3 => 'Account Created',
                ];
            @endphp

            @foreach ($steps as $step => $text)
                <div class="step {{ $currentStep >= $step ? 'completed' : '' }}">
                    <div class="step-left">
                        <div class="circle">
                            @if ($currentStep >= $step)
                                <img src="{{ asset('assets/icons/Icon-CheckWhiteCircleGreen.svg') }}"
                                    alt="Step {{ $step }}" class="check-icon">
                            @else
                                <span class="step-number">{{ $step }}</span>
                            @endif
                        </div>
                        @if ($step < 3)
                            <div class="line {{ $currentStep >= $step ? 'active' : '' }}"></div>
                        @endif
                    </div>

                    <div class="step-right {{ $currentStep < $step ? 'inactive' : '' }}">
                        {{ $text }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
