@extends('layouts.app')

@section('content')
<?php if(empty($authNo)){
	$authNo = "";
} ?>
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
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="std">
                        <div class="text-center checkout-success-page">
                          <span class="fa fa-close" title="Success" style="color: red"></span>
                            <h1 class="cocaf-title">
                                Transaction Failed.</h1>
                            <p class="cocaf-auth-no">
                                <!-- Authentication No : <strong>{{$authNo}}</strong> -->
                            </p>
                            <button class="btn btn-default current" style="font-family: muli" onclick="window.location='{{ url('/') }}'"
                                title="Continue Shopping" type="button">
                                GO TO HOMEPAGE</button></div>
                    </div>
                </div>
            </div>
        </div>

@endsection
