@extends('layouts.cgen')

@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />
@endsection

@section('content')
<div class="inquiries content-wrapper bg-layout5">
    <section class="banner banner-inquiry">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/send-inquiry') }}">Inquiries</a></li>
                    <li class="breadcrumb-item" aria-current="page">Properties for Sale</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Properties for Sale</h1>
            </div>
        </div>
    </section>

    <div class="main-content">
        <div class="inner">
            <section class="properties">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xs-12">
                            <div class="propertiesList">
                                <p class="mrfs-1-3 mrfs-lg-1-17 text-center mb-4 fw-bold">Build up your net worth with Cocogen's selection of real estate properties for sale.</p>
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
                                @foreach($cocogen_property as $cocogen_properties)
                                    <div class="col">
                                        <a class="card h-100" href="{{URL('/propertydetails')}}/{{base64_encode($cocogen_properties->id)}}">
                                            <div class="imageContainer">
                                                <img src="{{ url('') }}/{{$cocogen_properties->imagelink}}" class="card-img-top" alt="{{$cocogen_properties->name}}" />
                                            </div>
                                            <div class="card-body">
                                                <p class="name mrfs-1 mrfs-lg-1-12 text-color-primary">{{$cocogen_properties->name}}</p>
                                                <p class="address mrfs-1 mrfs-lg-1-5">{{$cocogen_properties->location}}</p>
                                                <p class="type mrfs-1 mrfs-lg-1-5">
                                                    @if(Str::contains(strtolower($cocogen_properties->description), 'lot'))
                                                        <img src="{{ asset('/assets/img/propLot.svg') }}" alt="lot" />
                                                    @elseif(Str::contains(strtolower($cocogen_properties->description), 'condo'))
                                                        <img src="{{ asset('/assets/img/propCondo.svg') }}" alt="condo" />
                                                    @elseif(Str::contains(strtolower($cocogen_properties->description), 'memorial'))
                                                        <img src="{{ asset('/assets/img/propMemorial.svg') }}" alt="memorial" />
                                                    @elseif(Str::contains(strtolower($cocogen_properties->description), 'building'))
                                                        <img src="{{ asset('/assets/img/propBuilding.svg') }}" alt="memorial" />
                                                    @else
                                                        <img src="{{ asset('/assets/img/propLot.svg') }}" alt="lot" />
                                                    @endif
                                                    <span>{{$cocogen_properties->description}}</span>
                                                </p>
                                                <p class="size mrfs-1 mrfs-lg-1-5">{{ $cocogen_properties->lot_size }} sqm.</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="price fw-bold text-color-light mrfs-1 mrfs-lg-1-10 text-center mb-0">Php {{ $cocogen_properties->price }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="divider pt-0">
        <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection
