@extends('layouts.app')

@section('content')
<?php if(empty($authNo)){
	$authNo = "";
} ?>
<script>
  gtag('event', 'page_view', {
    'send_to': 'AW-936227039',
    'value': 'replace with value',
    'items': [{
      'id': '6488316047',
      'google_business_vertical': 'retail'
    }]
  });
</script>

<div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/cocaf-registration-successful/">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                     <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>

                                </li>
                                <li class="cms_page"><strong>Transaction Failed</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="main-container col1-layout " style="background-color: white;">
            <div class="main container">
                <div class="col-main">
                    <div class="std">
                        <div class="text-center " style="background-color: white;">
                         <img src="{{url('/images/protechexpand/protechexpand.png')}}" class="img-fluid" alt="Responsive image">
                                <!-- Authentication No : <strong>{{$authNo}}</strong> -->
                            </p>
                           <!--  <button class="btn btn-default current" style="font-family: muli" onclick="window.location='{{ url('/') }}'"
                                title="Continue Browsing" type="button">
                                CONTINUE BROWSING</button></div>
                    </div> -->
                </div>
            </div>
        </div>

@endsection
