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
                        <li class="breadcrumb-item" aria-current="page">Blogs</li>
                    </ol>
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
                <section class="newsArticles mb-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-xl-10">
                                <div id="articleList" class="articleList">
                                    <div class="d-flex justify-content-end article-search mb-3 mb-lg-5">
                                        <form class="form-default">
                                            <label for="article-search">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20.341" height="20.341" viewBox="0 0 20.341 20.341">
                                                    <path id="Path_1687" data-name="Path 1687" d="M17.537,15.793h-.919l-.326-.314a7.571,7.571,0,1,0-.814.814l.314.326v.919l5.815,5.8,1.733-1.733Zm-6.978,0a5.233,5.233,0,1,1,5.233-5.233A5.226,5.226,0,0,1,10.559,15.793Z" transform="translate(-3 -3)"
                                                        fill="teal" />
                                                </svg>
                                            </label>
                                            <input type="search" class="form-control search" autocomplete="false" placeholder="Search..." id="article-search" />
                                        </form>
                                    </div>
                                    <div class="listContainer">
                                        <div class="list row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4 firstItemFull"></div>
                                    </div>
                                <div class="no-result" style="display:none;">
                                    <p>No result found</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                        <ul class="pagination"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="newsLink">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-md-5 text-center">
                                <a href="{{ url('/news') }}" class="newsSelectionItem d-block news-bg">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div>
                                            <span> News and Events </span>
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

@section('before_body_end_scripts')
    <script src="{{ asset('/assets/dist/listjs/listjs.js') }}"></script>
    <script>
        var values = [
            @foreach ($cocogen_admin_pages_blogs as $cocogen_admin_pages_blog)
                @php
                    $summary = str_replace(["\n", "\r"], ["\\n", "\\r"], Str::limit($cocogen_admin_pages_blog->summary, 100, ' ...'));
                    $summaryLong = str_replace(["\n", "\r"], ["\\n", "\\r"], Str::limit($cocogen_admin_pages_blog->summary, 200, ' ...'));
                @endphp
                {
                    image: "@if($cocogen_admin_pages_blog->thumbImage) {{ $cocogen_admin_pages_blog->thumbImage }} @else {{ asset('/assets/img/526x370.jpg') }} @endif",
                    date: "{!! date('F j, Y', strtotime($cocogen_admin_pages_blog->created_at)) !!}",
                    title: "{{ \Illuminate\Support\Str::limit($cocogen_admin_pages_blog->name, 50, $end = '...') }}",
                    link: "{{ url('/') }}/{{ $cocogen_admin_pages_blog->link }}",
                    linkTitle: "{{ url('/') }}/{{ $cocogen_admin_pages_blog->link }}",
                    descriptionShort: "{{ $summary }}",
                    descriptionLong: "{{ $summaryLong }}",
                    readButton: "{{ url('/') }}/{{ $cocogen_admin_pages_blog->link }}",
                    readButton2: "{{ url('/') }}/{{ $cocogen_admin_pages_blog->link }}"
                }
                @if (!$loop->last),@endif
            @endforeach
        ];

        var options = {
            valueNames: [
                {
                    name: 'image',
                    attr: 'src'
                },
                "date",
                {
                    name: 'link',
                    attr: 'href'
                },
                {
                    name: 'linkTitle',
                    attr: 'href'
                },
                "title",
                "descriptionShort",
                "descriptionLong",
                {
                    name: 'readButton',
                    attr: 'href'
                },
                {
                    name: 'readButton2',
                    attr: 'href'
                },
            ],
            item:
            '<div class="col">\
                <div class="card h-100">\
                    <div class="d-flex flex-row flex-lg-column">\
                        <a href="#" class="link img mb-0 mb-md-2"><img src="" class="image card-img-top" alt="Article"></a>\
                        <div class="mb-0 mb-md-2 d-flex flex-column">\
                            <div class="date"></div>\
                            <a href="#" class="linkTitle text-color-primary item-title"><div class="title ff-bold"></div></a>\
                            <p class="descriptionLong description mb-2 mb-lg-5 flex-grow-1"></p>\
                            <div class="linkbtn"><a href="#" class="readButton btn btn-secondary-light">Read Article</a></div>\
                        </div>\
                    </div>\
                    <div class="card-body">\
                        <p class="description descriptionShort mb-0"></p>\
                    </div>\
                    <div class="card-footer">\
                        <a href="#" class="readButton readButton2 btn btn-secondary-light">Read Article</a>\
                    </div>\
                </div>\
            </div>',
            page: 7,
            pagination: {
                item: '<li class="paginationItem"><a class="page"></a></li>',
                name: "page"
            },
        };

        var articleList = new List('articleList', options, values);

        $(document).ready(function($) {
            articleList.on('updated', function (listObj) {
                if (listObj.searched) {
                    $(listObj.list).removeClass('firstItemFull');
                } else {
                    $(listObj.list).addClass('firstItemFull');
                }
                if (listObj.matchingItems.length > 0) {
                    $('.no-result').hide();
                } else {
                    $('.no-result').show();
                }
                if (listObj.matchingItems.length <= listObj.page) {
                    $('.pagination').hide();
                } else {
                    $('.pagination').show();
                }
            });
        });
    </script>
@endsection
