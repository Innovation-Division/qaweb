@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')
<div class="product content-wrapper bg-layout5">
    <section class="banner banner-service">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Get a Quote</h1>
            </div>
        </div>
    </section>
    <div class="main-content">
        <div class="inner productSelection">
            <div class="container">
                <section>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">
                            <div class="product-selection">
                                <div class="row justify-content-center">
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem">
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('/') }}/images/parentproduct/sib8ZfH1KImlndh5WHPq7gyAV1GHhl1L2APibuud.png" alt="Auto Excel Plus">
                                            </div>
                                            <div class="card-body productContent">
                                                <h5 class="card-title productName ff-regular">Auto Excel Plus</h5>
                                                <p class="card-text productDescription">Shift to a broader protection</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/get-policy-quote/register') }}" class="btn btn-secondary-light productButton">{{ __('Get a Quote') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="divider">
        <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection
