@extends('layouts.app')

@section('content')
	

<div class="top-container">
    <!-- config enabled always -->
    <div class="custom-banner custom-page-banner" data-uri-path="/services/motor-services/gawa-agad-program">
        <div class="page-banner-wrapper">
            <div class="image-banner-wrapper" style="background-image: url('{{ url('/images/inner-ucpb-gen-non-life-motor-insuranceclaims.jpg') }}');"> 
            </div>
            <div class="text-banner-wrapper">
                <h3 class="short-description">
                    Motor Insurance Claims
                    <br>
                    Made Simple
                </h3>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 a-left">
                    <ul>
                        <li class="home"><a href="{{ url('/') }}" title="Go to Home Page" >Home</a>
                            <span class="breadcrumbs-split"><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category16"><span >Services</span> <span class="breadcrumbs-split"><i class="fa fa-angle-right">
                        </i></span></li>
                        <li class="category66"><span >Motor Services</span> <span class="breadcrumbs-split"><i
                            class="fa fa-angle-right"></i></span></li>
                        <li class="category38" ><strong>Gawa Agad Program</strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="category-name container">
        <h1>
            Gawa Agad Program
        </h1>
    </div>
</div>


    <div class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
            <div class="page-title category-title">
                <h1>
                    Gawa Agad Program</h1>
            </div>
            <div class="gawa-agad-motor-claims-wrap">
                <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <div class="gawa-agad-motor-claims-head">
                            <img alt="" src="{{ URL::to('/') }}/images/kalabaygawa/Gawa Agad Text.png">
                            <h2 style="font-family: arial">
                                Easy motor claims processing for your convenience</h2>
                            <p>
                                Gawa Agad is COCOGEN’s innovative concept in motor car insurance claims. It was designed to improve claims processing time by authorizing selected repair shops to perform claims administration. Through Gawa Agad, COCOGEN realizes its ultimate goal in recognizing and meeting the needs and expectations of the market for convenience and quality service.</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading" id="headingOne">
                                    <h3 class="panel-title">
                                        <a href="#collapseOne" data-toggle="collapse" data-parent="#accordion">For a hassle
                                            free motor repair</a></h3>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseOne">
                                    <div class="panel-body">
                                        <ol>
                                            <li>Bring your damaged vehicle to any of our GAWA AGAD PROGRAM (GAP) SHOPS</li>
                                            <li>Submit the following documents and GAP shop will do the rest:<ol style="margin-left: 30px;">
                                                <li>Insurance Policy and its Official Receipt</li>
                                                <li>Current Driver’s License and its Official Receipt</li>
                                                <li>Vehicle’s Certificate of Registration and its Official Receipt</li>
                                                <li>Original Police Report and/or Driver’s Affidavit of the accident</li>
                                            </ol>
                                            </li>
                                            <li>You can also arrange for the FREE pickup/delivery of your vehicle to/from any of
                                                these GAP shops during office hours.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" id="headingTwo">
                                    <h3 class="panel-title">
                                        <a class="collapsed" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion">
                                            For vehicle collision involving third party</a></h3>
                                </div>
                                <div class="panel-collapse collapse" id="collapseTwo">
                                    <div class="panel-body">
                                        <ol>
                                            <li>Attend to persons requiring immediate medical attention.</li>
                                            <li>Secure a Police Report even for minor damages. Be sure to fully describe the damage
                                                to the involved vehicle passenger in order to prevent a larger claim. If possible,
                                                take pictures of the damages.</li>
                                            <li>Count the passengers of other vehicle. Get their names, telephone numbers and the
                                                driver’s license number. This is to protect you in case more people will claim for
                                                more than the actual number of passengers.</li>
                                            <li>Move vehicles to the roadside in order not to obstruct traffic flow. Both drivers
                                                must sign the sketch that describes the vehicle’s position at the time of accident.</li>
                                            <li>Never leave your vehicle unattended to prevent it from further damage.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" id="headingThree">
                                    <h3 class="panel-title">
                                        <a class="collapsed" href="#collapseThree" data-toggle="collapse" data-parent="#accordion">
                                            For carnapped vehicle</a></h3>
                                </div>
                                <div class="panel-collapse collapse" id="collapseThree">
                                    <div class="panel-body">
                                        <ol>
                                            <li>Report immediately the carnapping incident to the nearest police station. Bring
                                                your vehicle’s original Certificates of Registration and Official Receipt (CR and
                                                OR) the soonest time possible.</li>
                                            <li>Submit a copy of the Alarm Sheet prepared by the police station to the Traffic Management
                                                Center, Camp Crame, Quezon City.</li>
                                            <li>Inform COCOGEN and submit the original and photocopy of the documents mentioned under hassle free motor repair together with the Alarm and Complaint Sheets from the Traffic Management Center (Camp Crame).</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="gawa-agad-motor-claims-body">

                            <h2 style="font-family: arial">
                                important reminder:</h2>
                            <p >
                                The Own Damage claim against your insurance policy will be denied should you or
                                your authorized representative enter into any form of settlement with the person
                                at fault.</p>
                            <p>
                                To ensure speedy recovery against the person at fault, secure the following from
                                the third party:</p>
                             
                            <ul clsss="gawaul" style="font-size: 15px;line-height: 20px;display: block;list-style-type: disc;margin-top: 1em;margin-bottom: 1 em; margin-left: 0; margin-right: 0;padding-left: 40px;">
                                <li> All the documents mentioned under hassle free motor repair</li>
                                <li>Conforme by way of signature to the Driver’s Affidavit of the accident</li>
                                <li>Contact numbers (landline, mobile phone, e-mail address)</li>
                            </ul>
                            <p><br> 
                                Your strict compliance with this reminder will ensure that your participation in
                                the repairs will be borne or at least be minimized.</p>
                        </div>
                    </div>
                </div>
                <div class="product-essential">
                    <div class="row product_details_info">
                        <div class="col-md-12 col-sm-12">
                            <p>
                                For more information regarding claims requirements, Kalakbay Road Assitance,<br>     and our Gawa Agad repair shops, click on the links below</p>
                            <br>
                            <div class="product_details_info_btns">
                                <a href="{{ url('/file-a-claim') }} " style="font-family: arial">view checklist</a> 
                                 <a href="{{ url('/locate-a-shop') }}" style="font-family: arial">view branches</a>  
                                <a href="{{ url('/kalakbay-road-assistance') }}" style="font-family: arial">
                                        kalakbay 24-hr roadside assistance</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="gawa-agad-motor-claims-body">
                            <h2 style="font-family: arial">
                                In case of an accident, you can also call:</h2>
                            <div class="gawa-agad-contact"  style="font-family: arial">
                                <strong>COCOGEN Claims Department</strong>
                                <p>
                                    Tel.no. (02)8811-1788 Loc. 6442 to 45 or 6413,6414,6418,6419</p>
                                <p>
                                    Fax No.: 403-7091</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="gawa-agad-motor-claims-body">
                            <h2  style="font-family: arial">
                                For service after office hours or during weekends</h2>
                            <p>
                                Towing Service:</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="gawa-agad-contact" style="font-family: arial">
                                        <strong>VIRAY TOWING SERVICES</strong>
                                        <p>
                                            Tel. No.: (02)8531-3468 / 59</p>
                                        <p>
                                            Mobile Phone Nos.: (0917) 852-1311 / (0916) 714-1892</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="gawa-agad-contact" style="font-family: arial">
                                        <strong>Manila Adjusters &amp; Surveyors Co.</strong>
                                        <p>
                                            Tel. Nos.: (02)8817-7665 or (02)881-4158 / (02)8819-5007</p>
                                        <p>
                                            Mobile Phone Nos.: (0918)910-0681 / (0918)905-6560 / (0917)439-9367 or 852-2750</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>





@endsection
