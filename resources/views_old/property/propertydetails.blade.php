@extends('layouts.cgen')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/css/splide.min.css" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />
@endsection

@section('content')
<div class="inquiries property-details-page content-wrapper bg-layout5">
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
            <section>
                <div class="heading">
                    <p class="mrfs-1-3 mrfs-lg-1-17 text-center mb-4 mb-lg-5 fw-bold">Build up your net worth with Cocogen's selection of real estate properties for sale.</p>
                </div>
            </section>

            <section class="properties">
                <div class="container">
                    <div class="property">
                        <div class="property-details mb-4">
                            <div class="mb-3 d-flex flex-column flex-md-row mb-2">
                                <h1 class="name flex-grow-1 mb-0 ff-bold">{{ $cocogen_property_id[0]->name }}</h1>
                                <div class="price d-flex d-lg-none justify-content-start justify-content-lg-end">
                                    <div class="d-flex">
                                        <strong class="mb-0">Php {{ $cocogen_property_id[0]->price }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">
                                <div class="details flex-grow-1">
                                    <div class="mb-3 d-flex align-items-start">
                                        <label class="me-2">Location</label>
                                        <span class="img me-2"><img src="{{ asset('/assets/img/mini-icons/location.svg') }}" alt="location" /></span>
                                        <span>{{ $cocogen_property_id[0]->location }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="me-2">Type</label>
                                        <span class="img me-2"><img src="{{ asset('/assets/img/mini-icons/marker.svg') }}" alt="marker" /></span>
                                        <span>{{ $cocogen_property_id[0]->description }}</span>
                                    </div>
                                    <div>
                                        <label class="me-2">Area</label>
                                        <span class="img me-2"><img src="{{ asset('/assets/img/mini-icons/size.svg') }}" alt="size" /></span>
                                        <span>{{ $cocogen_property_id[0]->lot_size }} sqm.</span>
                                    </div>
                                </div>
                                <div class="price d-none d-lg-flex">
                                    <div class="d-flex">
                                        <strong>Php {{ $cocogen_property_id[0]->price }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="property-contact">
                            <div class="row">
                                <div class="col-12 col-lg-7 col-xl-8 mb-4 mb-lg-0 lightbox">
                                    <div id="main-splider" class="splider main-splider splide main-splider">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @foreach($cocogen_property_images as $cocogen_property_image)
                                                <li class="splide__slide">
                                                    <img src="{{ url('') }}/{{$cocogen_property_image->imagelink}}"/>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="thumbnail-splider" class="splider thumbnail-splider splide">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @foreach($cocogen_property_images as $cocogen_property_image)
                                                <li class="splide__slide thumbnail">
                                                    <img src="{{ url('') }}/{{$cocogen_property_image->imagelink}}" />
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5 col-xl-4 inquiry">
                                    <div class="ps-0 ps-xl-3">
                                        <div class="contact-person">
                                            <div class="person-image">
                                                @if($cocogen_property_contact[0]["contact_photo"])
                                                    <img src="{{ url('') }}/{{ $cocogen_property_contact[0]["contact_photo"] }}" />
                                                @else
                                                    <img src="{{ asset('assets/img/avatar.png') }}" />
                                                @endif
                                            </div>
                                            <div class="person-details">
                                                <div>
                                                    <label>Contact Person</label>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.208" height="25.209" viewBox="0 0 25.208 25.209">
                                                        <path id="Icon_ionic-ios-person" data-name="Icon ionic-ios-person" d="M29.7,29.072c-.473-2.088-3.171-3.105-4.1-3.433a30.591,30.591,0,0,0-3.42-.656,3.475,3.475,0,0,1-1.582-.729c-.263-.315-.105-3.236-.105-3.236a9.737,9.737,0,0,0,.748-1.425,18.375,18.375,0,0,0,.551-2.488s.538,0,.729-.945A9.3,9.3,0,0,0,23,13.96c-.039-.755-.453-.735-.453-.735a11.51,11.51,0,0,0,.446-3.368c.059-2.7-2.055-5.357-5.882-5.357-3.88,0-5.948,2.659-5.889,5.357a12.006,12.006,0,0,0,.44,3.368s-.414-.02-.453.735a9.3,9.3,0,0,0,.486,2.2c.184.945.729.945.729.945a18.375,18.375,0,0,0,.551,2.488,9.737,9.737,0,0,0,.748,1.425s.158,2.921-.105,3.236a3.475,3.475,0,0,1-1.582.729,30.591,30.591,0,0,0-3.42.656c-.932.328-3.63,1.346-4.1,3.433a.525.525,0,0,0,.519.637H29.184A.524.524,0,0,0,29.7,29.072Z" transform="translate(-4.501 -4.5)" fill="teal" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="fw-bold person-name mb-0 ff-bold">{{ $cocogen_property_contact[0]["contact_name"] }}</p>
                                                    <p class="person-contact-num mb-0">{{ $cocogen_property_contact[0]["contact_no"] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="inquiry-form">
                                            <div class="mt-4 mb-2">
                                                <h2>Inquire Now</h2>
                                            </div>
                                            @if(session('message'))
                                            <div class="alert alert-success" role="alert">{{session('message')}}</div>
                                            @endif
                                            @if(session('messagefailed'))
                                            <div class="alert alert-success" role="alert">{{session('messagefailed')}}</div>
                                            @endif
                                            <form onsubmit="return validateRecaptcha();" class="form-default" id="inquireForm" method="post" action="{{route('propertyinquire')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="formRow">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 mb-2">
                                                            <div @if(count($errors) && $errors->has('fName'))class="invalid invalid-required"@endif>
                                                                <label for="fName" class="form-label">First Name *</label>
                                                                <input type="text" class="form-control" id="fName" name="fName" value="{{old('fName')}}" maxlength="200" />
                                                                @if(count($errors) && $errors->has('fName'))
                                                                    <span class="feedback">{{ $errors->first('fName') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-2">
                                                            <div @if(count($errors) && $errors->has('lName'))class="invalid invalid-required"@endif>
                                                                <label for="lName" class="form-label">Last Name *</label>
                                                                <input type="text" class="form-control" id="lName" name="lName" value="{{old('lName')}}" maxlength="200" />
                                                                @if(count($errors) && $errors->has('lName'))
                                                                    <span class="feedback">{{ $errors->first('lName') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="formRow">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 mb-2">
                                                            <div @if(count($errors) && $errors->has('email'))class="invalid invalid-required"@endif>
                                                                <label for="email" class="form-label">Email Address *</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"maxlength="100" />
                                                                @if(count($errors) && $errors->has('email'))
                                                                    <span class="feedback">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-2">
                                                            <div @if(count($errors) && $errors->has('mobileNumber'))class="invalid invalid-required"@endif>
                                                                <label for="mobileNumber" class="form-label">Contact Number *</label>
                                                                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="{{old('mobileNumber')}}" maxlength="100" />
                                                                @if(count($errors) && $errors->has('mobileNumber'))
                                                                    <span class="feedback">{{ $errors->first('mobileNumber') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <div @if(count($errors) && $errors->has('message'))class="invalid invalid-required"@endif>
                                                        <label for="message" class="form-label">Message *</label>
                                                        <textarea class="form-control" rows="3" id="message" name="message">{{old('message')}}</textarea>
                                                        @if(count($errors) && $errors->has('message'))
                                                            <span class="feedback">{{ $errors->first('message') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center align-items-xl-start flex-column flex-xl-row">
                                                    <div class="captcha-container mt-0 mb-2 mb-xl-0 pe-0 pe-xl-2">
                                                        <div class="g-recaptcha" data-sitekey="{{ config('app.recaptchaKey') }}"></div>
                                                    </div>
                                                    <div class="button-container submitButton text-end">
                                                        <input name="executed" type="hidden" value="0" class="executed">
                                                        <input name="form_key" type="hidden" value="5WS4MkVQbtqFyYQ5">
                                                        <button type="submit" class="btn btn-secondary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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

    <section class="location-map">
        <div id="map" class="google-map" style="border-top:1px solid #008080;"></div>
    </section>

</div>
@endsection

@section('before_body_end_scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/js/splide.min.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-JGJZ5de-LjdH57moTRnax1R2KVHhMwg&callback=initMap" async></script>

    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                'sitekey': '{{ config('app.recaptchaKey') }}'
            });
        };
        function validateRecaptcha() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert("Please confirm if you're not a robot.");
                return false;
            } else {
                //alert("validated");
                return true;
            }
        }

        $(document).ready(function () {
            var mainSplide = new Splide("#main-splider", {
                type: "fade",
                rewind: true,
                pagination: false,
                arrows: false,
                fixedHeight: 515,
                fixedWidth: "100%",

                breakpoints: {
                    992: {
                        fixedHeight: 440,
                    },
                    601: {
                        fixedHeight: 360,
                    },
                },
            });

            var thumbnailSplide = new Splide("#thumbnail-splider", {
                fixedWidth: 115,
                fixedHeight: 85,
                gap: 25,
                arrows: false,
                rewind: true,
                pagination: false,
                cover: true,
            });

            mainSplide.sync(thumbnailSplide);
            mainSplide.mount();
            thumbnailSplide.mount();

            var thumbnails = document.getElementsByClassName("thumbnail");
            var current;

            for (var i = 0; i < thumbnails.length; i++) {
                initThumbnail(thumbnails[i], i);
            }

            function initThumbnail(thumbnail, index) {
                thumbnail.addEventListener("click", function () {
                    thumbnailSplide.go(index);
                });
            }

            thumbnailSplide.on("move", function () {
                if (current) {
                    current.classList.remove("is-active");
                }

                var thumbnail = thumbnails[thumbnailSplide.index];

                if (thumbnail) {
                    thumbnail.classList.add("is-active");
                    current = thumbnail;
                }
            });
        });
    </script>

    @if($cocogen_property_id[0]->lat && $cocogen_property_id[0]->lng)
    <script>
        let map;

        const cluster = [{ lat: {{ $cocogen_property_id[0]->lat }}, lng: {{ $cocogen_property_id[0]->lng}} }];

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: {{ $cocogen_property_id[0]->lat }}, lng: {{ $cocogen_property_id[0]->lng }} },
                zoom: 18,
            });

            if (map) {
                for (x = 0; x <= cluster.length; x++) {
                    var marker = new google.maps.Marker({
                        position: cluster[x],
                        icon: "{{ asset('/assets/img/pin.svg') }}",
                        map,
                    });

                    var infowindow = new google.maps.InfoWindow();
                    var content = '<div><b>{{ $cocogen_property_id[0]->name }}</b><br/>{{ $cocogen_property_id[0]->location }}</div>';

                    google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
                        return function() {
                            infowindow.setContent(content);
                            infowindow.open(map,marker);
                        };
                    })(marker,content,infowindow));
                }
            }
        }
    </script>
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"   async defer>

@endsection
