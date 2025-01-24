@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')
<div class="product content-wrapper bg-layout5">
    @php
        $productName = $cocogen_admin_breadcrumbs[count($cocogen_admin_breadcrumbs)-1]['name'];
    @endphp
    <section class="sticky d-flex align-items-center justify-content-center" id="know-more-sticky">
        <div>
            <p class="mb-0 mrfs-1 mrfs-lg-1-5 d-block d-xl-inline-block align-middle text-center text-xl-center"><em>Want to know more? We can help you find the best insurance for you based on your needs.</em></p>
            <div class="d-block d-xl-inline-block ms-3 mt-3 mt-xl-0 align-middle text-center">
                @if($product_type[0]['WithEcom'] === "Y")
                    <button class="btn btn-secondary-inverted mrfs-1 mrfs-lg-1-5" href="{{ url($product_type[0]['EcomLink']) }}" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-link="{{ $product_type[0]['link'] }}" data-prodict-id="{{ $product_type[0]['id'] }}" data-isnew="true" data-product-name="{{ $productName }}">Inquire Now</button>
                @else
                    <button class="btn btn-secondary-inverted mrfs-1 mrfs-lg-1-5" href="{{ url('/send-inquiry') }}/{{$link}}" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-link="{{ $product_type[0]['link'] }}" data-prodict-id="{{ $product_type[0]['id'] }}" data-isnew="true" data-product-name="{{ $productName }}">Inquire Now</button>
                @endif

            </div>
        </div>
    </section>

    <section class="banner banner-product">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                <?php for ($i = 0; $i < count($cocogen_admin_breadcrumbs); $i++) {?>
                    @if($i+1 === count($cocogen_admin_breadcrumbs))
                        <li class="breadcrumb-item" aria-current="page">{{$cocogen_admin_breadcrumbs[$i]['name']}}</li>
                    @else
                        @if($cocogen_admin_breadcrumbs[$i]['links'])
                            <li class="breadcrumb-item"><a href="{{ url('') }}{{$cocogen_admin_breadcrumbs[$i]['links']}}" > {{$cocogen_admin_breadcrumbs[$i]['name']}}</a></li>
                        @else
                            <li class="breadcrumb-item">{{$cocogen_admin_breadcrumbs[$i]['name']}}</li>
                        @endif
                    @endif
                    <?php $productName = $cocogen_admin_breadcrumbs[$i]['name'] ?>
                <?php } ?>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">
                    @if($productName)
                        {{ $productName }}
                    @endif
                </h1>
            </div>
        </div>
    </section>

    <div class="main-content">
        <div class="inner">
            <section class="know-more" id="know-more">
                <div class="container">
                    <div class="know-more-content">
                        <div class="card flex-column flex-lg-row">
                            <div class="card-icon d-flex justify-content-center align-items-center mb-2 mb-lg-0">
                                <div class="image-container text-center mb-3 mb-md-0">
                                    @if($product_type[0]['mainIcon'])
                                        <img src="{{ url($product_type[0]['mainIcon']) }}" alt="{{ $product_type[0]['product'] }}" />
                                    @else
                                        <img src="{{ asset('assets/img/protech.svg') }}" alt="{{ $product_type[0]['product'] }}" />
                                    @endif
                                </div>
                            </div>
                            <div class="card-body d-flex p-0 ps-0 ps-lg-3 flex-grow-1">
                                <div class="card-text mb-0 mrfs-1 mrfs-lg-1-5">
                                    {!!html_entity_decode($product_type[0]['summary'])!!}
                                </div>
                            </div>
                        </div>
                        <div class="card-attachment justify-content-center align-items-center">
                            <div class="text-center">
                                <div>
                                    <h6 class="mrfs-0-18 mrfs-lg-1-12">Want to know more?</h6>
                                </div>
                                <p class="mrfs-0-18 mrfs-lg-1-5">We can help you find the best insurance cover for you based on your needs.</p>
                                <div>
                                    @if($product_type[0]['WithEcom'] === "Y")
                                        <a href="{{ url($product_type[0]['EcomLink']) }}" class="btn btn-secondary buttonInquire mrfs-1 mrfs-lg-1-5" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-link="{{ $product_type[0]['link'] }}" data-prodict-id="{{ $product_type[0]['id'] }}" data-product-name="@if($productName){{ $productName }}@endif">Inquire Now</a>
                                    @else
                                        <a href="{{ url('/send-inquiry') }}/{{$link}}" class="btn btn-secondary buttonInquire mrfs-1 mrfs-lg-1-5" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-link="{{ $product_type[0]['link'] }}" data-prodict-id="{{ $product_type[0]['id'] }}" data-product-name="@if($productName){{ $productName }}@endif" data-isnew="true">Inquire Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="productInfo">
                <div class="container">
                    <!-- TODO: Finalize Wysiwyg structure -->
                    {!!html_entity_decode($cocogen_admin_pages[0]['content'])!!}
                    {!!$cocogen_admin_pages[0]['jvScripts']!!}
                </div>
            </section>
        </div>
    </div>

    <section class="divider">
        <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
    </section>

    @if($results)
        <section class="productSelection relatedProducts">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-xs-12 justify-content-center align-items-center">
                        <div class="text-center">
                            <h2> Related Products </h2>
                        </div>
                        <div class="row justify-content-center">
                            @foreach($results as $item)
                            @php
                                $last4 = $loop->iteration > (ceil(count($results) / 4) * 4) - 4;
                                $last3 = $loop->iteration > (ceil(count($results) / 3) * 3) - 3;
                                $last2 = $loop->iteration > (ceil(count($results) / 2) * 2) - 2;
                            @endphp
                            <div class="col-6 col-md-4 col-lg-3 col-xl-3 justify-content-center">
                                <div class="card productSelectionItem @if ($last4){{ 'mb-lg-0' }}@endif @if ($last3){{ 'mb-md-0' }}@endif @if ($last2){{ 'mb-0' }}@endif">
                                    <div class="cardIconLabel d-flex text-center justify-content-center align-items-center">
                                        @if($item->smallIcon)
                                            <img src="{{ url($item->smallIcon) }}" alt="{{ $item->name }}" />
                                        @else
                                            <img src="{{ asset('/assets/img/logo2.svg') }}" alt="{{ $product_type[0]['product'] }}" />
                                        @endif
                                    </div>
                                    <div class="productImage">
                                        <img class="card-img-top" src="{{ url('') }}/{{$item->imagelink}}" alt="{{$item->name}}">
                                    </div>
                                    <div class="card-body productContent">
                                        <h5 class="card-title productName rfs-1-12 rfs-md-1"><a href="{{ url('/') }}/{{$item->link}}">{{$item->name}}</a></h5>
                                        <p class="card-text productDescription rfs-1-5 rfs-md-0-15">{{$item->description}}</p>
                                    </div>
                                    <div class="card-footer productFooter">
                                        <a href="{{ url('/send-inquiry')}}/{{$item->link}}" class="btn btn-secondary-light productButton rfs-1-5 rfs-md-0-15" data-bs-toggle="modal" data-bs-target="#inquiry-modal" data-product-name="{{ $item->name }}" data-isnew="true">Inquire Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
</div>
@endsection

@section('before_body_end_templates')
    @include('partials.modal.product-inquiry')
@endsection

@section('before_body_end_scripts')
    <script src="{{ asset('assets/js/products.js') }}"></script>
    @include('partials.modal.product-inquiry-js')
@endsection
