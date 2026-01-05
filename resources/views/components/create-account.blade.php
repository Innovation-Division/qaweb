<!-- Create Account Component -->
<div class="container p-3" style="width: 756px; height: 692px; background-color: #F7FCFF; border-radius: 8px; display: inline-flex; flex-direction: column; align-items: flex-start; gap: 25px;">
    <!-- Back Icon -->
    <div class="d-flex align-items-center">
    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>

            <img src="{{ asset('path-to-back-icon') }}" alt="Back" />
        </a>
    </div>

    <!-- Create Account Title -->
    <h2 class="mb-3" style="font-family: Inter; font-size: 23px; font-weight: 700; color: #2D2727;">Create Account</h2>

    <!-- Image Frame -->
    <div class="d-flex gap-4" style="width: 100%; justify-content: space-between;">
        <!-- Column 1 -->
        <div class="frame" style="width: 332px; height: 564px;">
            <div class="image-frame" style="width: 100%; height: 300px; border-radius: 5px; background: url(<path-to-image>) lightgray 50% / cover no-repeat;"></div>
        </div>

        <!-- Column 2 -->
        <div class="d-flex flex-column" style="gap: 20px;">
            <!-- Policyholder Title -->
            <h3 style="font-family: Inter; font-size: 23px; font-weight: 700; color: #2D2727;">Policyholder:</h3>

            <!-- Description Text -->
            <p style="font-family: Inter; font-size: 14px; font-weight: 500; color: #3B3939; line-height: 24px;">Some description or information about the policyholder goes here.</p>
        </div>
    </div>

    <!-- Primary Button -->
    <div class="d-flex justify-content-center">
        <a href="{{ route('nextStep') }}" class="btn btn-primary" style="width: 100%;">Create Account</a>
    </div>
</div>
