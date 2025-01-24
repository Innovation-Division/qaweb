@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/search-results.less') }}" />
@endsection

@section('content')
   <script>
      gtag('event', 'conversion', {'send_to': '<?php echo session('con_no') ?>'});
    </script>

    <div class="content-wrapper bg-layout5">
        <div class="main-content">
            <div class="inner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="d-flex flex-column align-items-start mrfs-1 mrfs-lg-1-10">
                                    <h3 class="mrfs-1-13 mrfs-lg-2-5 mb-3">Thank you for your interest in {{ session('product') }}</h3>
                                    <p class="text-color-verydarkgray">Your inquiry is on it’s way to our Client Services team. Please expect a representative to reach out to you through the contact details provided. </p>
                                    <p class="text-color-verydarkgray">For urgent inquiries, you may contact us through our 24/7 Client Services hotline at (02) 8830-6000.</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ app('router')->has('home') ? route('home') : url('/') }}" class="btn btn-secondary mrfs-1 mrfs-lg-1-5 me-3">Go Home</a>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary-light mrfs-1 mrfs-lg-1-5">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="divider content-bottom-divider">
                <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
            </section>
        </div>
    </div>
@endsection
