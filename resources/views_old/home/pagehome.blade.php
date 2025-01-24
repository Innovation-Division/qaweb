@extends('layouts.cgen')

@section('stylesheet')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/home.less') }}" />
@endsection

@section('content')
    <div class="homepage content-wrapper">
    
        @include('partials.slider')

        @include('partials.inquiry')

        @include('partials.featured')

        <section class="hpFacilities bg-layout3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11">
                        <div class="text-center">
                            <h2>Payment Facilities</h2>
                        </div>
                        <div class="card-group mt-5">
                            <div class="card facilityItem">
                                <div class="card-body">
                                    <div class="itemIcon">
                                        <img src="{{ asset('/assets/img/website.svg') }}" alt="Website Icon" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h4 class="itemName ff-regular">Cocogen Website</h4>
                                </div>
                            </div>
                            <div class="card facilityItem">
                                <div class="card-body">
                                    <div class="itemIcon">
                                        <img src="{{ asset('/assets/img/offices.svg') }}" alt="Offices Icon" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h4 class="itemName ff-regular">Cocogen Offices</h4>
                                </div>
                            </div>
                            <div class="clearfix d-lg-none"></div>
                            <div class="card facilityItem">
                                <div class="card-body">
                                    <div class="itemIcon">
                                        <img src="{{ asset('/assets/img/onlineBanking.svg') }}" alt="Online Banking Icon" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h4 class="itemName ff-regular">Online Banking</h4>
                                </div>
                            </div>
                            <div class="card facilityItem">
                                <div class="card-body">
                                    <div class="itemIcon">
                                        <img src="{{ asset('/assets/img/mobileBanking.svg') }}" alt="Mobile Banking Icon" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h4 class="itemName ff-regular">Mobile Banking</h4>
                                </div>
                            </div>
                            <div class="card facilityItem">
                                <div class="card-body">
                                    <div class="itemIcon">
                                        <img src="{{ asset('/assets/img/counter.svg') }}" alt="Overthecounter Icon" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h4 class="itemName ff-regular">Over-the-counter</h4>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center my-3 mt-5">
                            <a href="{{ url('/payment-facilities') }}" class="btn btn-secondary buttonView px-4">Find out how</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="divider">
            <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
        </section>

        <section class="hpRoadpal bg-layout4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 position-relative">
                        <div class="roadpalContent">
                            <div class="roadpalText text-center text-lg-start">
                                <div class="mb-4">
                                    <h2>Coming soon!</h2>
                                </div>
                                <p class="mrfs-1-3 mrfs-md-2-5 mrfs-lg-2-12">Cocogen BiyaHelp is your sidekick on the road when you need assistance or get into an accident.</p>
                            </div>
                            <div class="roadpalImage text-center">
                                <img src="{{ asset('/assets/img/Mask Group 18@2x.png') }}" alt="Roadpal" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('before_body_end_scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('/assets/js/video-modal.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".styled-select").each(function() {
                var _this = $(this);
                var select2Conf = {
                    minimumResultsForSearch: Infinity
                };
                if (_this.attr('data-selectionCssClass')) {
                    select2Conf.selectionCssClass = _this.attr('data-selectionCssClass');
                }
                if (_this.attr('data-dropdownCssClass')) {
                    select2Conf.dropdownCssClass = _this.attr('data-dropdownCssClass');
                }
                _this.select2(select2Conf);
            });
        });
    </script>
@endsection
