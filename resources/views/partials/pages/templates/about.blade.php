@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
    <style>
    @media screen and (max-width:767px) {
        .data-privacy {
            flex-direction: column-reverse;
        }

        .npc-img {
            width: 150px !important;
        }
    }
</style>
@endsection

@section('content')
    <div class="about content-wrapper bg-layout5">
        @include('partials.breadcrumbs', ['bannerClass' => 'banner-about'])
        <div class="main-content">
            <div class="inner">
                {!! html_entity_decode($cocogen_admin_pages[0]['content']) !!}
            </div>
        </div>
        <section class="divider">
            <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
        </section>
    </div>
@endsection

@section('before_body_end_scripts')
 {!!$cocogen_admin_pages[0]['jvScripts']!!}
@endsection
