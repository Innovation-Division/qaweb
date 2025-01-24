@section('stylesheet')
<link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
@endsection

@section('content')
<div class="about-milestones content-wrapper bg-layout5">
    @include('partials.breadcrumbs')
    <div class="main-content">
        <div class="inner">
            {!!html_entity_decode($cocogen_admin_pages[0]['content'])!!}
            {{-- {!!$cocogen_admin_pages[0]['jvScripts']!!}  --}}
        </div>
    </div>
    <section class="divider pt-0">
        <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
</div>
@endsection