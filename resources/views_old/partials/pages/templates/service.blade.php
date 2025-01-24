@section('stylesheet')
<link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')
<div class="product services content-wrapper bg-layout5">
    @include('partials.breadcrumbs', ['bannerClass' => 'banner-service'])
    <div class="main-content">
        <div class="inner productSelection">
            <div class="container">
                {!! html_entity_decode($cocogen_admin_pages[0]['content']) !!}
            </div>
        </div>
    </div>
    <section class="divider">
        <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection

@section('before_body_end_scripts')
 {!!$cocogen_admin_pages[0]['jvScripts']!!}
@endsection
