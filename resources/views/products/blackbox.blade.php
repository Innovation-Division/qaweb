@extends('layouts.app')

@section('content')
    
        <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/blackbox">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                               <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category6"><a href="{{ url('/products') }}" title="">
                                    Products</a> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                                    </i></span></li>
                                <li class="category6"><a href="{{ url('/product-lines') }}" title="">
                                    Product Lines</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                  <li class="category6"><a href="{{ url('/motor') }}" title="">
                                    Motor</a> <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right">
                                    </i></span></li>
                                <li class="product"><strong>Blackbox Insurance</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="product-view">
                        <div class="product-essential">
                            <form 
                            method="post" id="product_addtocart_form">
                            <input name="form_key" type="hidden" value="WWsuluBEDpqcURQk">
                            <div class="no-display">
                                <input type="hidden" name="product" value="23">
                                <input type="hidden" name="related_product" id="related-products-field" value="">
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="short-description col-md-12">
                                    <div class="product-name col-md-12">
                                        <h1>
                                            Blackbox Insurance</h1>
                                    </div>
                                    <div class="std col-md-12 prod-desc">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <img alt="Blackbox Insurance" class="img-responsive" src="{{ url('/images/blackbox-webpage-image4-1.jpg') }}"></div>
                                            <div class="col-md-6 col-xs-12">
                                                <p style="line-height: inherit;">
                                                    <br>
                                                    <strong>UCPB GEN Blackbox</strong> is the latest innovative offering from the UCPB
                                                    General Insurance Company, Inc. It is a comprehensive motor insurance that lets
                                                    you drive without worries and save on premium of up to 20%!<br>
                                                    <br>
                                                    The Blackbox features a car sensor, alerting your loved ones of the car’s location
                                                    should you meet an accident on the road. Thanks to quick links to roadside assistance,
                                                    it reduces your time, effort and expenses on repairs or theft damage. This is made
                                                    possible by a device that monitors your driving behavior including your location
                                                    via global positioning system (GPS) powered by VTel. The safer you drive, the higher
                                                    your driving score which means you can get as much as 20% off on your premium the
                                                    following year.</p>
                                            </div>
                                        </div>
                                        <p>
                                            <br>
                                            <br>
                                            <br>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12 col-md-push-6">
                                                <iframe src="https://www.youtube.com/embed/WV7MQdLHths" width="480" height="300"
                                                    frameborder="0"></iframe>
                                            </div>
                                            <div class="col-md-6 col-xs-12 col-md-pull-6">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <h4 style="font-family: muli">
                                                    <strong>MOTOR INSURANCE THAT HELPS YOU SAVE</strong></h4>
                                                <p style="line-height: inherit;">
                                                    The UCPB GEN Blackbox Insurance doesn’t just protect your car. It also helps you
                                                    save in the long run. It helps reduce your time, effort, and expenses when processing
                                                    repairs or theft damage, thanks to its quick link to roadside assistance.
                                                    <br>
                                                    <br>
                                                    UCPB GEN Blackbox is the only insurance policy that can reward you with up to 20%
                                                    off on next year’s premium, depending on your driving behavior.</p>
                                            </div>
                                        </div>
                                        <p>
                                            <br>
                                            <br>
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <h4 style="font-family: muli">
                                                    <strong>THE BLACKBOX DEVICE</strong></h4>
                                                <p style="line-height: inherit;">
                                                    The UCPB GEN Blackbox is powered by VTEL, the most advanced GPS/Telematics device
                                                    in the market that detects your car’s vital signs – distance traveled, speed, acceleration,
                                                    and even its location via free GPS. It also has a crash sensor to alert you real-time,
                                                    should your car meet with an accident.
                                                    <br>
                                                    Installing the device is easy. Simply attach it to the battery’s positive and negative
                                                    anodes for power. The device does not drain the battery. It doesn’t alter any other
                                                    system in your car. It also doesn’t void your car’s warranty. It’s waterproof and
                                                    doesn’t need an antenna. Just plug it and let it do the job.
                                                    <br>
                                                    UCPB GEN Blackbox Insurance is an innovative package that enables every car owner
                                                    to drive safely and efficiently with peace of mind. This package includes a comprehensive
                                                    Motorcar Insurance paired with a state-of-the-art GPS device (powered by VTEL) that,
                                                    once installed, will provide the following vehicle information you need for a smooth
                                                    ride:</p>
                                                <ul id="fire_coverage">
                                                    <li><em class="fa fa-check-square-o text-success"></em> Driving Score</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Acceleration</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Location</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Distance traveled</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Time of day</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Speed</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Rapid acceleration or heavy braking</li>
                                                    <li><em class="fa fa-check-square-o text-success"></em> Vehicle movements like swerving
                                                        or curving</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <h4 style="font-family: muli">
                                                    <strong>VIEWING DATA AND STATISTICS VIA THE APP</strong></h4>
                                                <p style="line-height: inherit;">
                                                    Download UCPB GEN Blackbox app on your mobile device, sign-in and you’re good to
                                                    go.
                                                    <br>
                                                    Use the UCPB GEN Blackbox app to get real-time data on your vehicle’s location,
                                                    your driving behavior, and driving score. Through the app, you can alert family
                                                    members about accidents and get immediate emergency assistance. In the same way,
                                                    if someone else is driving your car, you will be notified should major car accidents
                                                    happen.
                                                    <br>
                                                    <br>
                                                    <a href="https://itunes.apple.com/ph/app/blackbox-insurance/id1337669879" target="_blank">
                                                        <img alt="Blackbox Insurance Appstore" src="https://cdn.ucpbgen.com/media/wysiwyg/products/appstore.png"
                                                            style="height: 62px; width: 200px;"></a> <a href="https://play.google.com/store/apps/details?id=com.appcraft.sciencejet.black_box"
                                                                target="_blank">
                                                                <img alt="Blackbox Insurance Playstore" src="https://cdn.ucpbgen.com/media/wysiwyg/products/googlepay3.png"
                                                                    style="height: 62px; width: 200px;"></a>
                                                </p>
                                                <h4 style="font-family: muli">
                                                    <strong>UP TO 20% OFF ON YOUR NEXT YEAR</strong></h4>
                                                <p style="line-height: inherit;">
                                                    The UCPB GEN Blackbox Insurance doesn’t just protect your ride – it also helps you
                                                    save money!
                                                    <br>
                                                    How? By analyzing your driving behavior. The Blackbox app computes your driving
                                                    score through its recorded data. Basically, the safer you drive, the higher your
                                                    driving score. Your driving score can be viewed on mobile through the UCPB GEN Blackbox
                                                    app, or on your desktop computer through the UCPB GEN Blackbox official website.
                                                    <br>
                                                    A higher driving score gives you a higher discount on next year’s policy – up to
                                                    20% off! So it doesn’t only condition you to be a better and safer driver on the
                                                    road, it also helps you save more in the long run!</p>
                                            </div>
                                            <div class="col-xs-12">
                                                <br>
                                                <br>
                                                <div class="text-center">
                                                    <a href="https://cloudsg.sciencejet.net/users/sign_in" style="background-color: #6ac162;
                                                        color: #ffffff; padding: 10px 33px; border-radius: 40px; text-transform: uppercase;font-family:  muli"
                                                        target="_blank">Login to my Blackbox Account</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row product_details_info">
                                <div class="col-md-12">
                                    <p style="text-align: center;">
                                        For Product Related Inquiries</p>
                                    <p style="text-align: center;">
                                        Want to know more? Allow us to help you find the best insurance cover for you based from your needs. <br> <br>  </p>
                                </div>
                               
                                <div class="add-to-box col-md-12">
                                    <div class="click_here_pdp">
                                        <a href="{{ url('/product-inquiry/blackbox-insurance') }}" dataid="23"
                                            class="produt_click_here">INQUIRE NOW</a>
                                    </div>
                                </div>
                                <!-- End Modified -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="block block-related product-related-products like-category-grid-block">
                                        <div class="block-title">
                                            <strong><span>Related Products</span></strong>
                                        </div>
                                        <hr>
                                        <div class="category-products like-category-grid-block">
                                            <ul class="products-grid columns3">
                                                <!-- motor -->
                                                <li class="item">
                                                        <div class="item-area box-shadow">
                                                            <div class="product-image-area">
                                                                <div class="loader-container">
                                                                    <div class="loader">
                                                                        <i class="ajax-loader medium animate-spin"></i>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ url('/motor') }}" class="quickview-icon"><i class="icon-export">
                                                                </i><span>Quick View </span></a><a href="{{ url('/motor') }}" title="Motor"
                                                                    class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-20" class="landscape" src="{{ url('/images/product_lines/motor.jpg') }}"
                                                                        alt="Motor" width="300" style="height: 105%">
                                                                </a>
                                                            </div>
                                                            <div class="details-area" style="height: 95px;">
                                                                <div class="product-name-wrapper abs">
                                                                    <div class="product-icon box-shadow">
                                                                        <img class="product-icon-image" src="https://cdn.ucpbgen.com/media/catalog/product/cache/1/icon/9df78eab33525d08d6e5fb8d27136e95/i/c/icon_copy_4.jpg"
                                                                            alt="test product">
                                                                    </div>
                                                                    <h2 class="product-name" style="margin-top: -20px;">
                                                                        <a href="{{ url('/motor') }}"
                                                                            title="Motor" style="font-size: 18px;color: #00539e;opacity: 0.9">Motor </a>
                                                                    </h2>
                                                                    <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                        Shift to a broader protection
                                                                    </div>
                                                                </div>
                                                                <div class="actions abs" style="text-align: center;">
                                                                    <!-- Inquiry removed -->
                                                                    <!-- Coming soon -->
                                                                    <a href="{{ url('/get-quote') }}" class="addtocart form-control"
                                                                        title="Get A Quote" style="width: 100%;">
                                                                        <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                                        <span>&nbsp;Get A Quote </span></a>
                                                                    <!-- Coming soon -->
                                                                    <div class="clearer">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <!-- autoPA -->
                                                <li class="item">
                                                    <div class="item-area box-shadow">
                                                        <div class="product-image-area">
                                                            <div class="loader-container">
                                                                <div class="loader">
                                                                    <i class="ajax-loader medium animate-spin"></i>
                                                                </div>
                                                            </div>
                                                            <a href="{{ url('/auto-passenger-personal-accident-protect') }}" class="quickview-icon">
                                                                <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/auto-passenger-personal-accident-protect') }}"
                                                                    title="Condo Excel Protect" class="product-image" style="height: 180px;">
                                                                    <img id="product-collection-image-52" class="landscape" src="{{ url('/images/Product Images/autopa.jpg') }}"
                                                                        alt="Condo Excel Protect" width="300">
                                                                </a>
                                                        </div>
                                                        <div class="details-area" style="height: 100px;">
                                                            <div class="product-name-wrapper abs">
                                                                <div class="product-icon box-shadow">
                                                                    <img class="product-icon-image" src="{{ url('/images/Product Images/autopa.jpg') }}"
                                                                        alt="test product">
                                                                </div>
                                                                <h2 class="product-name">
                                                                    <a href="{{ url('/images/protectionhome/hep.jpg') }}" title="Condo Excel Plus" style="font-size: 15px;color: #00539e;opacity: 0.9;">
                                                                        Auto PA</a>
                                                                </h2>
                                                                <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                                    <!-- Make your urban living more comfortable -->
                                                                </div>
                                                            </div>
                                                            <div class="actions abs" style="text-align: center;">
                                                                <a href="{{ url('/product-inquiry/auto-passenger-personal-accident-protect') }}" dataid="52"
                                                                    class="click-here inquiry form-control" title="INQUIRY">
                                                                    <!-- <i class="icon-cart"></i> -->
                                                                    <span>&nbsp;INQUIRY </span></a>
                                                                <div class="clearer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearer">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
