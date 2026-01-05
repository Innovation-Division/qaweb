<!-- resources/views/components/sign-in-form.blade.php -->

<div class="col-12 col-md-6 col-lg-6 col-xl-5">
    <div class="sign-in-board">
        <div class="sign-in-type">
            <a href="#" data-container="sign-in-policyholder" class="active">Sign in as Policyholder</a>
            <a href="#" data-container="sign-in-partner" class="">Sign in as Partner</a>
        </div>
        <div class="sign-in-form">
            <div class="mt-0 mt-lg-3">
                <h2 class="mb-5 mrfs-1-2 mrfs-lg-1-12">Welcome</h2>
                <form class="mb-3 form-default" method="POST" action="{{ $action }}">
                    @csrf
                    <input type="hidden" id="source" name="source" value="sign-in-policyholder">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email*" value="{{ old('email') }}">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password*">
                    </div>
                    <div class="submitButton text-center my-4">
                        <button type="submit" class="btn btn-secondary">{{ $buttonText }}</button>
                    </div>
                </form>
                <div class="links mt-0 mt-lg-5 text-center text-lg-start">
                    <a href="{{ $createAccountUrl }}">Create Account</a>
                    <a href="{{ $forgotPasswordUrl }}">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
