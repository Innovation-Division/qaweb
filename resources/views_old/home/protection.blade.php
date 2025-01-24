@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')
<div class="product services content-wrapper bg-layout">
<section class="banner banner-product">
    <div class="container-fluid breadcrumb-container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb rfs-1-5">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">{{ $cocogen_admin_ineedprotection[0]['title'] }}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="content">
            <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">{{ $cocogen_admin_ineedprotection[0]['title'] }}</h1>
        </div>
    </div>
</section>
    <div class="main-content">
        <div class="inner productSelection">
            <section>
                <div class="container">
                    <div class="product-description pb-4 pb-lg-5">
                        <p class="text-center fw-bold rfs-1-3 mrfs-lg-1-17 mb-4 mb-lg-5">{{$cocogen_admin_ineedprotection[0]['description']}}</p>
                    </div>
                    <div class="product-selection">
                        <div class="row justify-content-center align-items-center">
                            @foreach($results as $cocogen_admin_parentproducts)
                            @php
                                $last3 = $loop->iteration > (ceil(count($results) / 3) * 3) - 3;
                                $last2 = $loop->iteration > (ceil(count($results) / 2) * 2) - 2;
                            @endphp
                            <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                <div class="card productSelectionItem @if ($last3){{ 'mb-md-0' }}@endif @if ($last2){{ 'mb-0' }}@endif">
                                    <div class="cardIconLabel d-flex text-center justify-content-center align-items-center">
                                        @if($cocogen_admin_parentproducts->smallIcon)
                                            <img src="{{ url($cocogen_admin_parentproducts->smallIcon) }}" alt="{{ $cocogen_admin_parentproducts->name }}" />
                                        @else
                                            <img src="{{ asset('/assets/img/logo2.svg') }}" alt="{{ $cocogen_admin_parentproducts->name }}" />
                                        @endif
                                    </div>
                                    <div class="productImage">
                                        <img class="card-img-top" src="{{ url('') }}/{{ $cocogen_admin_parentproducts->imagelink }}" alt="{{ $cocogen_admin_parentproducts->name }}">
                                    </div>
                                    <div class="card-body productContent">
                                        <h5 class="card-title productName"><a href="{{ url('/') }}/{{ $cocogen_admin_parentproducts->link }}">{{ $cocogen_admin_parentproducts->name }}</a></h5>
                                        <p class="card-text productDescription">{{ $cocogen_admin_parentproducts->description }}</p>
                                    </div>
                                    <div class="card-footer productFooter">
                                        <a href="{{ url('/send-inquiry')}}/{{$cocogen_admin_parentproducts->link}}" class="btn btn-secondary-light productButton" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-name="{{ $cocogen_admin_parentproducts->name }}" data-isnew="true">{{ __('Inquire Now') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="divider">
        <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection

@section('before_body_end_templates')
    @include('partials.modal.product-inquiry')
@endsection

@section('before_body_end_scripts')
    @include('partials.modal.product-inquiry-js')
@endsection
