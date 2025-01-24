<div class="card h-100">
    <div class="d-flex flex-row flex-lg-column">
        <a href="{{ url($item->link) }}" class="link img mb-0 mb-md-2">
        @if ($item->location && file_exists (public_path ($item->location)))
            <img src="{{ asset($item->location) }}" class="image card-img-top" alt="Article" />
        @else
            <img src="{{ asset('/assets/img/article_large.png') }}" class="card-img-top" alt="Article">
        @endif
        </a>
        <div class="mb-0 mb-md-2">
            <div class="date">{{ $item->created_at->format('M d, Y') }}</div>
            <a href="{{ url($item->link) }}" class="linkTitle text-color-primary item-title"><div class="title ff-bold">{{ $item->name }}</div></a>
        </div>
    </div>
    <div class="card-body">
        <p class="description mb-0">{!! Str::limit($item->summary, $truncateLength, ' ...') !!}</p>
    </div>
    <div class="card-footer">
        <a href="{{ url($item->link) }}" class="readButton btn btn-secondary-light">Read Article</a>
    </div>
</div>
