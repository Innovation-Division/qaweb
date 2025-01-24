@extends('layouts.cgen')

@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
@endsection

@section('content')
<div class="about content-wrapper bg-layout5">
    <section class="banner banner-about">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item">About</li>
                    <li class="breadcrumb-item" aria-current="page">News and Updates</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">News and Updates</h1>
            </div>
        </div>
    </section>
    <div class="main-content">
        <div class="inner">
            <section class="news news-and-blogs">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-md-6 mb-4 mb-md-0 text-center text-md-end">
                            <a href="{{ url('/news') }}" class="newsSelectionItem d-block news-bg float-none float-md-end">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <span> News and Events </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-start">
                            <a href="{{ url('/blogs') }}" class="newsSelectionItem d-block blog-bg float-none float-md-start">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <span> Blogs </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="divider">
        <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection
