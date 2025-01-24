@extends('layouts.cgen')

@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="assets/css/search-results.less" />
@endsection

@section('content')
<div class="content-wrapper bg-layout5">
    <section class="banner banner-about">
        <div class="container-fluid breadcrumb-container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb rfs-1-5">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Search Results</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="content">
                <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Search Results</h1>
            </div>
        </div>
    </section>

    <div class="main-content">
        <div class="inner">
            <div id="searchResult" class="container">
                <section class="rfs-1-5 rfs-md-1">
                    <div class="d-flex mb-4 mb-lg-5 align-items-center">
                        <h4 class="flex-grow-1 text-color-default text-start rfs-1-10 rfs-md-1-3">Results for "<span class="search-result-keyword text-color-secondary ff-bold"><?php echo htmlentities($search); ?></span>"</h4>
                        <div class="d-none d-lg-flex justify-content-end">
                            <div class="search-form">
                                <form class="d-flex align-items-center pb-2" action="{{ url('/customsearch') }}">
                                    <div class="flex-grow-1">
                                        <input type="search" name="srchterm" class="search form-control" autocomplete="false" value="{{ htmlentities($search) }}" placeholder="Search again?" />
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Go</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="results rfs-1-5">
                        <div class="list inner"></div>
                        <div class="no-result" style="display:none;">
                            <p>No result found</p>
                        </div>
                        <div class="mt-3 mt-lg-5">
                            <ul class="pagination justify-content-center"></ul>
                        </div>
                    </div>
                </section>
            </div>
            <section class="divider content-bottom-divider">
                <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
            </section>
        </div>
    </div>
</div>
@endsection

@section('before_body_end_scripts')
    <script src="{{asset('/assets/dist/listjs/listjs.js')}}"></script>

    <script>
        var values = [
			@foreach($cocogen_searchs as $cocogen_search)
			@php
				$content = strip_tags(html_entity_decode(html_entity_decode($cocogen_search->content), ENT_QUOTES | ENT_XML1, 'UTF-8'));
                $content = preg_replace('/\s+/', ' ', $content);
                $content = mb_strimwidth($content, 0, 500, "...");
			@endphp
            {
                link: "{{ url('/') }}/{{ $cocogen_search->link }}", linkTitle: "{{ url('/') }}/{{ $cocogen_search->link }}", title: "{{ $cocogen_search->name }}", content: "{{ $content }}"
            }@if(!$loop->last),@endif
			@endforeach
        ];

        var options = {
            valueNames: [{ name: 'link', attr: 'href' }, "linkTitle", "title", "content"],
            item:   '<div class="item">' +
                        '<div class="mb-1 mb-md-2">' +
                            '<span class="title heading-border ff-bold rfs-1-13 rfs-md-0-18 d-inline-block pb-1"></span>' +
                        '</div>' +
                        '<div class="mb-2 mb-md-3">' +
                            '<a href="#" href="" class="link">' +
                                '<em class="url text-color-primary rfs-1 rfs-md-0-15 ff-light linkTitle"></em>' +
                            '</a>' +
                        '</div>' +
                        '<p class="content lh-lg mb-1 mb-md-2"></p>' +
                    '</div>',
            page: 6,
            pagination: {
                item: '<li class="paginationItem"><a class="page"></a></li>',
                name: "page"
            },
        };

        var searchResult = new List('searchResult', options, values);

        $(document).ready(function($) {
            $('#searchResult input.search').keyup(function(){
                $('.search-result-keyword').html($(this).val());
            });
            searchResult.on('updated', function (list) {
                if (list.matchingItems.length > 0) {
                    $('.no-result').hide();
                } else {
                    $('.no-result').show();
                }
                if (list.matchingItems.length <= list.page) {
                    $('.pagination').hide();
                } else {
                    $('.pagination').show();
                }
            });
            var searchKeyword = $('#searchResult input.search').val();
            if (searchKeyword) {
                searchResult.search(searchKeyword);
            }
        });
    </script>
@endsection
