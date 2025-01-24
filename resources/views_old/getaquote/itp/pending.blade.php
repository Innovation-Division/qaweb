@extends('layouts.layout1')

@section('content')
<section class="banner banner-inquiry">
    <div class="container-fluid breadcrumb-container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb rfs-1-5">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
                <li class="breadcrumb-item active" aria-current="page">Domestic Travel Excel Plus Quote</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="content">
          <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Domestic Travel Excel Plus Quote</h1>
        </div>
    </div>
</section>
  
<div class="main-content container">
    <div class="inner">
        <div class="container">
            {{ csrf_field() }}  
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="d-flex justify-content-center mb-4">
                        <div class="d-flex flex-column align-items-start mrfs-1 mrfs-lg-1-10">
                            <h3 class="mrfs-1-13 mrfs-lg-2-5 mb-3">Thank you for purchasing Domestic Travel Excel Plus</h3>
                            <p class="text-color-verydarkgray">Your payment is being processed. Please monitor your registered email address for further update on your policy.</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ app('router')->has('home') ? route('home') : url('/') }}" class="btn btn-secondary mrfs-1 mrfs-lg-1-5 me-3">Continue Browsing</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="divider">
    <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
