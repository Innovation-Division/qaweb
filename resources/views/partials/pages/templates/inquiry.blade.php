@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />
@endsection

@section('content')
    <div class="inquiries content-wrapper bg-layout5">
        @include('partials.breadcrumbs', ['bannerClass' => 'banner-inquiry'])
        {!! html_entity_decode($cocogen_admin_pages[0]['content']) !!}
        <section class="divider">
            <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
        </section>
    </div>
@endsection

@section('before_body_end_scripts')
 {!!$cocogen_admin_pages[0]['jvScripts']!!}
@endsection
