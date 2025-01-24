<div class="card productItem">
    <div class="card-body">
        <div class="productIcon">
            @if ($data->featuredIcon)
                <img src="{{ url($data->featuredIcon) }}" alt="{{ $data->product }}" />
            @else
                <img src="assets/img/protech.svg" alt="{{ $data->product }}" />
            @endif
        </div>
        <h4 class="productName mb-4">
            <a href="/{{ $data->link }}">{{ $data->product }}</a>
        </h4>
        @if ($data->description)
            <p class="card-text productText mb-3">{{ $data->description }}</p>
        @endif
    </div>
    <div class="card-footer productFooter">
        <a href="/{{ $data->link }}" class="btn btn-secondary-light productButton">Learn more</a>
    </div>
</div>
