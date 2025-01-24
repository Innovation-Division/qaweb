@extends('layouts.app')

@section('content')
<?php if(empty(session('authNo'))){
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
                                <li class="cms_page"><strong>Registration Successful</strong> </li>
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
                            <span class="fa fa-fw" title="Success"></span>
                            <h1 class="cocaf-title">
                                Your payment has been accepted. You will receive an email with a link to view your Motor Excel Plus ePolicy within the next 3 working days</h1>
                            
                            <button class="btn btn-default current" style="font-family: muli" onclick="window.location='{{ url('/') }}'"
                                title="Continue Shopping" type="button">
                                CONTINUE SHOPPING</button></div>
                    </div>
                </div>
            </div>
        </div>

@endsection
