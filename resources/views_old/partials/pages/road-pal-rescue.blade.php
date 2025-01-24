@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/products.less') }}" />
@endsection

@section('content')
<div class="product services content-wrapper bg-layout5">
    @include('partials.breadcrumbs', ['bannerClass' => 'banner-service'])
    {!!html_entity_decode($cocogen_admin_pages[0]['content'])!!}
    {{--  {!!$cocogen_admin_pages[0]['jvScripts']!!}  --}}
    <section class="divider pt-0">
        <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection
