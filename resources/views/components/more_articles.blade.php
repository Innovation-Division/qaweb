@php
    // My own implementation since our current version of laravel does not support component class
    $title = isset($title) ? $title : 'Other News';
    $truncateLength = isset($truncateLength) ? $truncateLength : 150;

    $moreArticles = new \App\Components\MoreArticles($source, $limit);
    $lists = $moreArticles->getData();
@endphp

@if ($lists)
<div class="articleList">
    <div class="listContainer">
        <div class="text-center text-lg-start"><h2 class="mrfs-0-17 mrfs-lg-1-7">{{ $title }}</h2></div>
        <div class="list row row-cols-1 row-cols-md-2 row-cols-lg-1 g-4 mb-4">
        @foreach ($lists as $item)
            <div class="col">@include('components.more_articles.item')</div>
        @endforeach
        </div>
    </div>
</div>
@endif
