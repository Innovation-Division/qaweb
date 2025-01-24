@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/search-results.less') }}" />
@endsection

@section('content')
    <script>
    gtag('event', 'page_view', {
        'send_to': 'AW-936227039',
        'value': 'replace with value',
        'items': [{
        'id': '6488316053',
        'google_business_vertical': 'retail'
        }]
    });
    </script>
    "<!-- Event snippet for Purchase-CTPL_Again conversion page -->
    <script>
    gtag('event', 'conversion', {
        'send_to': 'AW-936227039/c42uCN7LpOEBEN_htr4D',
        'value': 1.0,
        'currency': 'PHP',
        'transaction_id': ''
    });
    </script>
    <script>
    gtag('event', 'conversion', {
        'send_to': 'AW-936227039/c42uCN7LpOEBEN_htr4D',
        'value': 1.0,
        'currency': 'PHP',
        'transaction_id': '<?php echo session('con_no') ?>'
    });
    </script>
    <div class="content-wrapper bg-layout5">
        <div class="main-content">
            <div class="inner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="d-flex flex-column align-items-start mrfs-1 mrfs-lg-1-10">
                                    <h3 class="mrfs-1-13 mrfs-lg-2-5 mb-3">COCAF REGISTRATION SUCCESSFUL</h3>
                                    <p class="text-color-verydarkgray">We have received your inquiry. Please keep your lines open for updates.</p>
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
