@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />

    <style type="text/css">
        /* #map .gm-style-iw {
            width: 350px !important;
            top: 15px !important;
            left: 25px !important;
            background-color: #fff;
        }

        #map .gm-style-iw div {
            width: 100%;
            max-width: 100% !important;
        }

        #map #iw-container .iw-title {
            font-family: 'Muli';
            font-size: 18px;
            font-weight: 400;
            background-color: #db3e8d;
            color: white;
            display: block;
            padding: 10px;
        }

        #map #iw-container .iw-content {
            padding: 10px;
        }

        .iw-content span {
            color: black;
        } */

    </style>
@endsection

@section('content')
    <div class="content-wrapper locator">
        <div class="main-content">
            <section class="locator-map">
                {{-- <div id="map" class="google-map" style="position: relative;"></div> --}}
                <div id="map" class="google-map">
                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                        <div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%;
                                padding: 0px; border-width: 0px; margin: 0px;" class="gm-style">
                            <div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%;
                                    padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default;
                                    touch-action: pan-x pan-y;" tabindex="0">
                                <div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px);">
                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                            <div style="position: absolute; z-index: 995; transform: matrix(1, 0, 0, 1, -240, -239);">
                                                <div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 512px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 256px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -256px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 768px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 768px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 768px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 768px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -512px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 1024px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 1024px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 1024px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 1024px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -768px; top: 512px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -768px; top: 256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -768px; top: 0px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: -768px; top: -256px; width: 256px; height: 256px;">
                                                    <div style="width: 256px; height: 256px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;">
                                    </div>
                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;">
                                    </div>
                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -64px;
                                                top: -104px; z-index: -59;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -76px;
                                                top: -120px; z-index: -75;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -20px;
                                                top: -16px; z-index: 29;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -74px;
                                                top: -151px; z-index: -106;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -75px;
                                                top: -110px; z-index: -65;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -63px;
                                                top: -88px; z-index: -43;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -63px;
                                                top: -102px; z-index: -57;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -69px;
                                                top: -114px; z-index: -69;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 39px;
                                                top: 24px; z-index: 69;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -66px;
                                                top: -128px; z-index: -83;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 18px;
                                                top: 34px; z-index: 79;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 2px;
                                                top: -8px; z-index: 37;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -80px;
                                                top: -142px; z-index: -97;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 40px;
                                                top: 67px; z-index: 112;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 31px;
                                                top: 89px; z-index: 134;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -29px;
                                                top: -17px; z-index: 28;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -66px;
                                                top: -103px; z-index: -58;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -33px;
                                                top: -40px; z-index: 5;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -2px;
                                                top: -74px; z-index: -29;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -51px;
                                                top: -92px; z-index: -47;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -64px;
                                                top: -107px; z-index: -62;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -65px;
                                                top: -108px; z-index: -63;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -62px;
                                                top: -109px; z-index: -64;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -61px;
                                                top: -80px; z-index: -35;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -15px;
                                                top: -85px; z-index: -40;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -81px;
                                                top: -114px; z-index: -69;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -64px;
                                                top: -109px; z-index: -64;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -25px;
                                                top: -37px; z-index: 8;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -63px;
                                                top: -100px; z-index: -55;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 27px;
                                                top: -30px; z-index: 15;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: 45px;
                                                top: 58px; z-index: 103;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; left: -78px;
                                                top: -178px; z-index: -133;">
                                            <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                    border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                        </div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                            <div style="position: absolute; z-index: 995; transform: matrix(1, 0, 0, 1, -240, -239);">
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 512px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 768px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 768px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 768px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 768px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -512px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1024px;
                                                        top: -256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1024px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1024px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1024px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -768px;
                                                        top: 512px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -768px;
                                                        top: 256px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -768px;
                                                        top: 0px;">
                                                </div>
                                                <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -768px;
                                                        top: -256px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                        <div style="position: absolute; z-index: 995; transform: matrix(1, 0, 0, 1, -240, -239);">
                                            <div style="position: absolute; left: 256px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i27!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=101191">
                                            </div>
                                            <div style="position: absolute; left: 0px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i26!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=71068">
                                            </div>
                                            <div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i26!3i14!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=47611">
                                            </div>
                                            <div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i27!3i14!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=77734">
                                            </div>
                                            <div style="position: absolute; left: 512px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i28!3i14!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=107857">
                                            </div>
                                            <div style="position: absolute; left: 512px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i28!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=243">
                                            </div>
                                            <div style="position: absolute; left: -256px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i25!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=40945">
                                            </div>
                                            <div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i25!3i14!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=17488">
                                            </div>
                                            <div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i25!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=125102">
                                            </div>
                                            <div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i26!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=24154">
                                            </div>
                                            <div style="position: absolute; left: 512px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i28!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=23700">
                                            </div>
                                            <div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i27!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=54277">
                                            </div>
                                            <div style="position: absolute; left: 512px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i28!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=84400">
                                            </div>
                                            <div style="position: absolute; left: 768px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i29!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=114523">
                                            </div>
                                            <div style="position: absolute; left: 768px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i29!3i14!4i256!2m3!1e0!2sm!3i484193232!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=46267">
                                            </div>
                                            <div style="position: absolute; left: 768px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i29!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=30366">
                                            </div>
                                            <div style="position: absolute; left: 0px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i26!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=94525">
                                            </div>
                                            <div style="position: absolute; left: -512px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i24!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=10822">
                                            </div>
                                            <div style="position: absolute; left: 256px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i27!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=124648">
                                            </div>
                                            <div style="position: absolute; left: -256px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i25!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=64402">
                                            </div>
                                            <div style="position: absolute; left: -512px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i24!3i14!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=118436">
                                            </div>
                                            <div style="position: absolute; left: -512px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i24!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=94979">
                                            </div>
                                            <div style="position: absolute; left: 1024px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i30!3i13!4i256!2m3!1e0!2sm!3i484192572!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=18087">
                                            </div>
                                            <div style="position: absolute; left: 1024px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i30!3i14!4i256!2m3!1e0!2sm!3i484193208!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=11578">
                                            </div>
                                            <div style="position: absolute; left: 1024px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i30!3i15!4i256!2m3!1e0!2sm!3i484193232!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=108239">
                                            </div>
                                            <div style="position: absolute; left: -768px; top: 256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i23!3i15!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=111770">
                                            </div>
                                            <div style="position: absolute; left: -768px; top: 0px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i23!3i14!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=88313">
                                            </div>
                                            <div style="position: absolute; left: -768px; top: -256px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i23!3i13!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=64856">
                                            </div>
                                            <div style="position: absolute; left: -512px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i24!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=34279">
                                            </div>
                                            <div style="position: absolute; left: 768px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i29!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=53823">
                                            </div>
                                            <div style="position: absolute; left: -768px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i23!3i16!4i256!2m3!1e0!2sm!3i484193304!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=4156">
                                            </div>
                                            <div style="position: absolute; left: 1024px; top: 512px; width: 256px; height: 256px;
                                                    transition: opacity 200ms linear 0s;">
                                                <img style="width: 256px; height: 256px; -moz-user-select: none; border: 0px none;
                                                        padding: 0px; margin: 0px; max-width: none;" draggable="false" alt="" role="presentation"
                                                    src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i5!2i30!3i16!4i256!2m3!1e0!2sm!3i484193244!2m3!1e2!6m1!3e5!3m14!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyAAO79TRNBDCKoaunQqfY-MfO1aDC0GJSY&amp;token=128528">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px;
                                        border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;" class="gm-style-pbc">
                                    <p class="gm-style-pbt">
                                    </p>
                                </div>
                                <div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px;
                                        border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                                    <div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px);">
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;">
                                        </div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;">
                                        </div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -64px; top: -104px; z-index: -59;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -76px; top: -120px; z-index: -75;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -20px; top: -16px; z-index: 29;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -74px; top: -151px; z-index: -106;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -75px; top: -110px; z-index: -65;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -63px; top: -88px; z-index: -43;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -63px; top: -102px; z-index: -57;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -69px; top: -114px; z-index: -69;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 39px; top: 24px; z-index: 69;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -66px; top: -128px; z-index: -83;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 18px; top: 34px; z-index: 79;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 2px; top: -8px; z-index: 37;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -80px; top: -142px; z-index: -97;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 40px; top: 67px; z-index: 112;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 31px; top: 89px; z-index: 134;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -29px; top: -17px; z-index: 28;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -66px; top: -103px; z-index: -58;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -33px; top: -40px; z-index: 5;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -2px; top: -74px; z-index: -29;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -51px; top: -92px; z-index: -47;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -64px; top: -107px; z-index: -62;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -65px; top: -108px; z-index: -63;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -62px; top: -109px; z-index: -64;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -61px; top: -80px; z-index: -35;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -15px; top: -85px; z-index: -40;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -81px; top: -114px; z-index: -69;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -64px; top: -109px; z-index: -64;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -25px; top: -37px; z-index: 8;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -63px; top: -100px; z-index: -55;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 27px; top: -30px; z-index: 15;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: 45px; top: 58px; z-index: 103;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                            <div style="width: 35px; height: 45px; overflow: hidden; position: absolute; opacity: 0;
                                                    cursor: pointer; touch-action: none; left: -78px; top: -178px; z-index: -133;" title="">
                                                <img style="position: absolute; left: 0px; top: 0px; width: 35px; height: 45px; -moz-user-select: none;
                                                        border: 0px none; padding: 0px; margin: 0px; max-width: none;" alt="" src="{{ url('/images/map-pin.png') }}" draggable="false">
                                            </div>
                                        </div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <iframe aria-hidden="true" style="z-index: -1; position: absolute; width: 100%; height: 100%;
                                    top: 0px; left: 0px; border: medium none;" src="about:blank" frameborder="0">
                            </iframe>
                            <div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute;
                                    left: 0px; bottom: 0px;">
                                <a style="position: static; overflow: visible; float: none; display: inline;" target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=11.906784,123.044202&amp;z=5&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3"
                                    title="Open this area in Google Maps (opens a new window)">
                                    <div style="width: 66px; height: 26px; cursor: pointer;">
                                        <img style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -moz-user-select: none;
                                                border: 0px none; padding: 0px; margin: 0px;" alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false">
                                    </div>
                                </a>
                            </div>
                            <div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171);
                                    font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box;
                                    box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none;
                                    width: 300px; height: 180px; position: absolute; left: 693px; top: 190px;">
                                <div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">
                                    Map Data</div>
                                <div style="font-size: 13px;">
                                    Map data ©2019 GBRMPA, Google, SK telecom</div>
                                <button style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block;
                                        border: 0px none; margin: 0px; padding: 0px; position: absolute; cursor: pointer;
                                        -moz-user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;" draggable="false" title="Close" aria-label="Close" type="button" class="gm-ui-hover-effect">
                                    <img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                                        style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;">
                                </button>
                            </div>
                            <div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 71px;
                                    bottom: 0px; width: 221px;">
                                <div draggable="false" style="-moz-user-select: none; height: 14px; line-height: 14px;" class="gm-style-cc">
                                    <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                        <div style="width: 1px;">
                                        </div>
                                        <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                        </div>
                                    </div>
                                    <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box;
                                            font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68);
                                            white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle;
                                            display: inline-block;">
                                        <a style="text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map
                                            data ©2019 GBRMPA, Google, SK telecom</span>
                                    </div>
                                </div>
                            </div>
                            <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
                                <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68);
                                        direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                    Map data ©2019 GBRMPA, Google, SK telecom</div>
                            </div>
                            <div class="gmnoprint gm-style-cc" style="z-index: 1000001; -moz-user-select: none;
                                    height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;" draggable="false">
                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                    <div style="width: 1px;">
                                    </div>
                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                    </div>
                                </div>
                                <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box;
                                        font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68);
                                        white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle;
                                        display: inline-block;">
                                    <a style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);" href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener">Terms of Use</a>
                                </div>
                            </div>
                            <button style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none;
                                    margin: 10px; padding: 0px; position: absolute; cursor: pointer; -moz-user-select: none;
                                    border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                    overflow: hidden; top: 0px; right: 0px;" draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control">
                                <img style="height: 18px; width: 18px;"
                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                    style="height: 18px; width: 18px;"
                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                    style="height: 18px; width: 18px;"
                                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A">
                            </button>
                            <div draggable="false" style="-moz-user-select: none; height: 14px; line-height: 14px;
                                    display: none; position: absolute; right: 0px; bottom: 0px;" class="gm-style-cc">
                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                    <div style="width: 1px;">
                                    </div>
                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;">
                                    </div>
                                </div>
                                <div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box;
                                        font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68);
                                        white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle;
                                        display: inline-block;">
                                    <a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68);
                                            text-decoration: none; position: relative;" href="https://www.google.com/maps/@11.9067836,123.044202,5z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3">
                                        Report a map error</a>
                                </div>
                            </div>
                            <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" style="margin: 10px;
                                    -moz-user-select: none; position: absolute; bottom: 95px; right: 40px;" draggable="false" controlwidth="40" controlheight="81">
                                <div class="gmnoprint" style="position: absolute; left: 0px; top: 0px;" controlwidth="40" controlheight="81">
                                    <div draggable="false" style="-moz-user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                            border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px;
                                            height: 81px;">
                                        <button style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block;
                                                border: 0px none; margin: 0px; padding: 0px; position: relative; cursor: pointer;
                                                -moz-user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px;
                                                left: 0px;" draggable="false" title="Zoom in" aria-label="Zoom in" type="button" class="gm-control-active">
                                            <img style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A"></button>
                                        <div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px;
                                                            background-color: rgb(230, 230, 230); top: 0px;">
                                        </div>
                                        <button style="background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block;
                                                border: 0px none; margin: 0px; padding: 0px; position: relative; cursor: pointer;
                                                -moz-user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px;
                                                left: 0px;" draggable="false" title="Zoom out" aria-label="Zoom out" type="button" class="gm-control-active">
                                            <img style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A"></button>
                                    </div>
                                </div>
                                <div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none;
                                        position: absolute;">
                                    <div style="width: 40px; height: 40px;">
                                        <button style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; display: none;
                                                border: 0px none; margin: 0px 0px 32px; padding: 0px; position: relative; cursor: pointer;
                                                -moz-user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden;
                                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;" draggable="false" title="Rotate map 90 degrees" aria-label="Rotate map 90 degrees" type="button" class="gm-control-active">
                                            <img style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="height: 18px; width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A"></button>
                                        <button style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; display: block;
                                                border: 0px none; margin: 0px; padding: 0px; position: relative; cursor: pointer;
                                                -moz-user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden;
                                                box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;" draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active">
                                            <img style="width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A"><img
                                                style="width: 18px;"
                                                src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="location-list">
                    <div class="togglectrl">
                        <span><i class="fa fa-angle-down"></i></span>
                    </div>
                    <h2 class="mt-3 mt-xl-0">Location</h2>
                    <div>
                        <select class="styled-select" name="region" id="region">
                            <option value="0" <?php if(empty($id)){ ?>Selected="Selected" <?php } ?>>All</option>
                            <option value="1" <?php if($id ==="1"){ ?>Selected="Selected" <?php } ?>>Metro Manila</option>
                            <option value="2" <?php if($id ==="2"){ ?>Selected="Selected" <?php } ?>>Luzon</option>
                            <option value="3" <?php if($id ==="3"){ ?>Selected="Selected" <?php } ?>>Visayas</option>
                            <option value="4" <?php if($id ==="4"){ ?>Selected="Selected" <?php } ?>>Mindanao</option>
                        </select>
                    </div>
                    <ul class="list">
                        @foreach ($cocogen_admin_branch as $cocogen_admin_branchs)
                            <li class="branch-item">
                                <a href="#" data-lat="{{ $cocogen_admin_branchs->lat }}" data-lng="{{ $cocogen_admin_branchs->lng }}" data-id="{{ $cocogen_admin_branchs->id }}" data-value="{{ $cocogen_admin_branchs->id }}">
                                    <div class="mb-2">
                                        <p class="branch">{{ $cocogen_admin_branchs->name }}</p>
                                        <p class="address">{{ $cocogen_admin_branchs->address }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <label>Contact Person</label>
                                        <p class="name">{{ $cocogen_admin_branchs->contactPerson }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <label>Email</label>
                                        <p class="email">{{ $cocogen_admin_branchs->email }}</p>
                                    </div>
                                    <div class="mb-2">
                                        <label>Tel No.</label>
                                        <p class="tel">{{ $cocogen_admin_branchs->telNo }}</p>
                                    </div>
                                    @if (!empty($cocogen_admin_branchs->faxNo))
                                        <div>
                                            <label>Fax No.</label>
                                            <p class="fax">{{ $cocogen_admin_branchs->faxNo }}</p>
                                        </div>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('before_body_end_scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEyW3IqE_uFLWDaiZVlsNslwpRFzWkMmQ&callback=initMap&libraries=places" async></script>

    <script type="text/javascript">
        var Markers = '{!! $cocogen_admin_branch_json !!}';
        var Locations = '{!! $cocogen_admin_branch_json !!}';

        var map, locations, InfoWindow, storeMarkers = [];

        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        $(document).ready(function() {
            $('.togglectrl').click(function() {
                if ($(this).closest('.locator').hasClass('toggleup')) {
                    $(this).closest('.locator').removeClass('toggleup');
                } else {
                    $(this).closest('.locator').addClass('toggleup');
                }
            });

            $('#region').on('select2:select', function(e) {
                let selVal = $(this).val();
                if (selVal == 0) {
                    window.location.href = "{{ url('/locate-a-branch') }}"
                } else {
                    window.location.href = "{{ url('/locate-a-branch') }}/" + selVal;
                }
            });

            $('.branch-item a').on('click', function(e) {
                let selVal = $(this).val();
                var locId = $(this).data('value');

                $.each(locations, function(i, item) {
                    if (locId == item.id) {
                        map.setZoom(15);
                        map.setCenter(new google.maps.LatLng(locations[i].lat, locations[i].lng));
                        infoWindow.setContent("<div id='iw-container'><div class='iw-title'><b>" + locations[i].name + "</b></div><div class='iw-content'><span>" + toTitleCase(locations[i].address) + "</span></div><div>");
                        infoWindow.open(map, storeMarkers[i]);
                    }
                });
            });

            $(".styled-select").select2({
                minimumResultsForSearch: Infinity,
            });
        });

        function initMap() {

            locations = JSON.parse(Markers);

            let mapOptions = {
                zoom: 7,
                center: new google.maps.LatLng(14.8937, 121.0578773),
                scaleControl: false,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            let mapElement = document.getElementById('map');
            map = new google.maps.Map(mapElement, mapOptions);

            let bounds = new google.maps.LatLngBounds();
            infoWindow = new google.maps.InfoWindow();

            let ucpbIcon = {
                url: "{{ asset('assets/img/pin.svg') }}",
                scaledSize: new google.maps.Size(35, 45)
            };

            $.each(locations, function(i, item) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(locations[i].lat), parseFloat(locations[i].lng)),
                    map: map
                });
                locations[i].position = new google.maps.LatLng(parseFloat(locations[i].lat), parseFloat(locations[i].lng));
                storeMarkers[i] = marker;

                //extend the bounds to include each marker's position
                bounds.extend(marker.position);
                marker.setIcon(ucpbIcon);

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        map.setZoom(15);
                        map.setCenter(marker.getPosition());
                        infoWindow.setContent("<div id='iw-container'><div class='iw-title'><b>" + locations[i].name + "</b></div><div class='iw-content'><span>" + toTitleCase(locations[i].address) + "</span></div><div>");
                        infoWindow.open(map, marker);
                    }
                })(marker, i));

                google.maps.event.addListener(infoWindow, 'domready', function() {
                    var iwOuter = jQuery('.gm-style-iw');
                    var iwCloseBtn = iwOuter.next();
                    var iwBackground = iwOuter.prev();

                    iwBackground.children(':nth-child(3)').find('div').children().css({
                        'box-shadow': ' rgba(178, 178, 178, 0.6) 0px 1px'
                    });

                    iwBackground.children(':nth-child(2)').css({
                        'display': 'none'
                    });

                    iwBackground.children(':nth-child(4)').css({
                        'display': 'none'
                    });

                    iwCloseBtn.css({
                        opacity: '1',
                        right: '16px',
                        top: '3px',
                        border: '7px solid rgb(0, 67, 117)',
                        width: '27px',
                        height: '27px',
                        'border-radius': '13px',
                        'box-shadow': '0 0 5px rgb(0, 67, 117)'
                    });
                    iwCloseBtn.mouseout(function() {
                        jQuery(this).css({
                            opacity: '1'
                        });
                    });
                });
                map.fitBounds(bounds);
            });
        }
    </script>
@endsection
