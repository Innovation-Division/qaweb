@extends('layouts.epartner')
@section('main-content')
<style>
    .title {
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }
</style>
<style type="text/css">
    .title {
        font-size: 25px;
        font-weight: 700;
        margin: 0;
    }

    .epolicy-card-border {
        border-radius: 7px !important;
    }

    .epolicy-button {
        padding: 14px 16px;
        border-radius: 12px;
        border: none;
        color: white;
    }



    .epolicy-btn-secondary {
        background: grey;
        color: #ffffff;
    }

    .epolicy-search {
        padding: 10px 30px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        width: 100%;
    }

    .epolicy-search-input {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #EEEEEE;
        border-radius: 12px;
        font-size: 16px;
        background-color: white;
        background-position: 24px 11px;
        background-repeat: no-repeat;
        background-size: 18px;
        padding: 7px 20px 7px 55px;
        background-image: url(https://uxwing.com/wp-content/themes/uxwing/download/user-interface/search-icon.png);
    }

    .epolicy-nav {
        color: black !important;

    }

    .epolicy-nav li {

        margin: 10px 25px !important;
        font-weight: bold;
    }

    .epolicy-nav li a {
        color: grey !important;
    }

    .epolicy-nav li:first-child {
        color: black;
        margin: 10px 0px !important;
    }

    .epolicy-nav>li.active>a {
        font-weight: 700 !important;
        background: #E0F5F5 !important;
        color: black !important;
        border-radius: 18px;
        padding: 9px 55px;
    }

    .epolicy-col {
        border-top: 1px solid #d3d3d3;
        border-bottom: 1px solid #d3d3d3;
    }

    .epolicy-nav>li a:hover {
        border-radius: 18px;
        color: black;
        background: none;
    }

    .epolicy-button-success {
        background: #008080 !important;
    }

    .epolicy-button-secondary {
        background: #60B3B3 !important;
    }

    .epolicy-button-secondary:hover {
        background: #008080 !important;
    }

    .epolicy-button>svg {
        fill: #ffffff !important;
    }

    .epolicy-button-success:hover {
        background: #60B3B3 !important;
    }

    .pagination-active {
        background: #E0F5F5 !important;
        color: black !important;
        font-weight: 700;
    }
    @media (max-width:800px) {
            .epolicy-button {
                margin-left:25%;

            }
        }
</style>
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <p class="title">Partner Training    </p>
                        </div>
                        <div class="col-lg-3 text-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 mb-3">
                        <div class="row">
                            <div class="col-md-3 offset-md-2">
                                <div class="card">
                                    <div class="card-status-bottom bg-teal"></div>
                                    <div class="card-body">
                                        <div class="thumbnail">
                                            <img src="{{ url('/images/presentation.png') }}" alt="Presentation image">
                                            <div class="col-md-3 offset-md-4">
                                                <button class="epolicy-button epolicy-button-success" onclick="window.location.href='{{route('presentations')}}'" id="presentation" style="background: #DB3E8D !important">Presentations</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3  offset-md-1">
                                <div class="card">
                                    <div class="card-status-bottom bg-teal"></div>
                                        <div class="card-body">
                                            <div class="thumbnail">
                                                <img src="{{ url('/images/circular.png') }}" alt="Circular image">
                                                <div class="col-md-3 offset-md-4">
                                                    <button class="epolicy-button epolicy-button-success" onclick="window.location.href='{{route('circulars')}}'"  id="presentation"  style="background: #DB3E8D !important">Circulars</button>
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
        </div>
    </div>
</div>



               

@endsection