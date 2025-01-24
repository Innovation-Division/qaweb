@extends('layouts.cgen')

@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
@endsection

@section('content')
    <div class="about content-wrapper bg-layout5">
        <section class="banner banner-about">
            <div class="container-fluid breadcrumb-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    @if ($cocogen_admin_breadcrumbs)
                        <ol class="breadcrumb rfs-1-5">
                            <?php for ($i = 0; $i < count($cocogen_admin_breadcrumbs); $i++) {?>
                            @if ($i + 1 === count($cocogen_admin_breadcrumbs))
                                <li class="breadcrumb-item" aria-current="page">{{ $cocogen_admin_breadcrumbs[$i]['name'] }}</li>
                            @else
                                @if ($cocogen_admin_breadcrumbs[$i]['links'])
                                    <li class="breadcrumb-item"><a href="{{ url('') }}{{ $cocogen_admin_breadcrumbs[$i]['links'] }}"> {{ $cocogen_admin_breadcrumbs[$i]['name'] }}</a></li>
                                @else
                                    <li class="breadcrumb-item">{{ $cocogen_admin_breadcrumbs[$i]['name'] }}</li>
                                @endif
                            @endif
                            <?php } ?>
                        </ol>
                    @endif
                </nav>
            </div>
            <div class="container">
                <div class="content">
                    <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Blogs</h1>
                </div>
            </div>
        </section>
        <div class="main-content">
            <div class="inner">
                <section class="newsArticle">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-9 colleft">
                                        <div class="card articleItem articleItemFull">
                                            <div class="imageContainer m-0 my-auto">
                                                @if($cocogen_admin_pages_blogs[0]['location'])
                                                    <img src="{{ asset($cocogen_admin_pages_blogs[0]['location']) }}" class="card-img-top" alt="{{ $cocogen_admin_pages_blogs[0]['name'] }}">
                                                @else
                                                    <img src="{{ asset('/assets/img/1221x508.jpg') }}" class="card-img-top" alt="{{ $cocogen_admin_pages_blogs[0]['name'] }}">
                                                @endif
                                            </div>
                                            <div class="card-body articleItemBody">
                                                <p class="date mb-0">{!! date('F j, Y', strtotime($cocogen_admin_pages_blogs[0]['created_at'])) !!}</p>
                                                <p class="title">
                                                    <a href="{{ url('/') }}/{{ $cocogen_admin_pages_blogs[0]['link'] }}" class="ff-bold text-color-primary">{{ $cocogen_admin_pages_blogs[0]['name'] }}</a>
                                                </p>
                                                <div class="description">{!! html_entity_decode($cocogen_admin_pages_blogs[0]['content']) !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 d-flex flex-column-reverse flex-lg-column">
                                        <a href="{{ url('/news') }}" class="d-block newsSelectionItem news-bg mb-0 mb-lg-4">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div>
                                                    <span> News and Events </span>
                                                </div>
                                            </div>
                                        </a>
                                        @MoreArticles(['source' => $cocogen_admin_pages_blogs[0], 'title' => 'Other Blog Posts', 'limit' => 3, 'truncateLength' => 100])@endMoreArticles
                                    </div>
                                </div>
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
