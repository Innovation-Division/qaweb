@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')
<div class="product content-wrapper bg-layout5">
    <section class="banner banner-product">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item" aria-current="page">Product Lines</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Product Lines</h1>
            </div>
        </div>
    </section>
    <div class="main-content">
        <div class="inner productSelection products-list-wrapper">
            <div class="container">
                <section>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">
                            <div class="product-selection">
                                <div class="row justify-content-center">
                                    @foreach($cocogen_admin_parentproduct as $item)
                                    @php
                                        $last3 = $loop->iteration > (ceil(count($cocogen_admin_parentproduct) / 3) * 3) - 3;
                                        $last2 = $loop->iteration > (ceil(count($cocogen_admin_parentproduct) / 2) * 2) - 2;
                                    @endphp
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-4 justify-content-center">
                                        <div class="card productSelectionItem @if ($last3){{ 'mb-md-0' }}@endif @if ($last2){{ 'mb-0' }}@endif">
                                            <div class="cardIconLabel d-flex text-center justify-content-center align-items-center">
                                                @if($item->smallIcon)
                                                    <img src="{{ url($item->smallIcon) }}" alt="{{ $item->name }}" />
                                                @else
                                                    <img src="{{ asset('/assets/img/logo2.svg') }}" alt="{{ $item->name }}" />
                                                @endif
                                            </div>
                                            <div class="productImage">
                                                <img class="card-img-top" src="{{ url('') }}/{{$item->imagelink}}" alt="{{$item->name}}">
                                            </div>
                                            <div class="card-body productContent">
                                                <!-- TODO: Add link to product page -->
                                                <h5 class="card-title productName rfs-1-12 rfs-md-1"><a href="{{ url('/') }}/{{$item->link}}">{{$item->name}}</a></h5>
                                                <p class="card-text productDescription rfs-1-5 rfs-md-0-15">{{$item->description}}</p>
                                            </div>
                                            <div class="card-footer productFooter">
                                                <a href="{{ url('/send-inquiry')}}/{{$item->link}}" class="btn btn-secondary-light productButton rfs-1-5 rfs-md-0-15" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-name="{{ $item->name }}" data-isnew="true">{{ __('Inquire Now') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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

@section('before_body_end_templates')
    @include('partials.modal.product-inquiry')
@endsection

@section('before_body_end_scripts')
    @include('partials.modal.product-inquiry-js')
@endsection
