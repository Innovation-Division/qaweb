@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/search-results.less') }}" />
@endsection

@section('content')
    <div class="content-wrapper bg-layout5">
        <div class="main-content">
            <div class="inner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="d-flex flex-column align-items-start mrfs-1 mrfs-lg-1-10">
                                    <h3 class="mrfs-1-13 mrfs-lg-2-5 mb-3">Transaction Successful</h3>
                                    <p class="text-color-verydarkgray">Thank you for completing your online transaction, you shall receive a confirmation message once your payment has been processed.</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ app('router')->has('home') ? route('home') : url('/') }}" class="btn btn-secondary mrfs-1 mrfs-lg-1-5 me-3">Continue Browsing</a>
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
