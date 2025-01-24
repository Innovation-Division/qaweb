<section class="banner @if(!empty($bannerClass)){{ $bannerClass }}@else{{ 'banner-about' }}@endif">
    <div class="container-fluid breadcrumb-container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            @if ($cocogen_admin_breadcrumbs)
                <ol class="breadcrumb rfs-1-5">
                    @foreach ($cocogen_admin_breadcrumbs as $item)
                        <li class="breadcrumb-item" @if ($loop->last) aria-current="page" @endif>@if ($loop->last) {{ $item->name }} @else <a href="{{ $item->links }}">{{ $item->name }}</a> @endif </li>
                    @endforeach
                </ol>
            @endif
        </nav>
    </div>
    <div class="container">
        <div class="content">
            <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">
                @if ($cocogen_admin_breadcrumbs[count($cocogen_admin_breadcrumbs)-1]['name'])
                    {{ $cocogen_admin_breadcrumbs[count($cocogen_admin_breadcrumbs)-1]['name'] }}
                @endif
            </h1>
        </div>
    </div>
</section>
