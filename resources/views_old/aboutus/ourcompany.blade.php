@extends('layouts.cgen')

@php $template = 'partials.pages.templates.' . $cocogen_admin_pages[0]['template']; @endphp

@if(View::exists($template))
    @include($template)
@else
    @php $path = 'partials.pages.' . Request::segment(1); @endphp
    @if(View::exists($path))
        @include($path)
    @else
        @section('stylesheet')
            <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
        @endsection

        @section('content')
            <div class="about content-wrapper bg-layout6">
                @include('partials.breadcrumbs', ['bannerClass' => 'banner-about'])
                <div class="main-content">
                    <div class="inner">
                        {!!html_entity_decode($cocogen_admin_pages[0]['content'])!!}
                        {{--  {!!$cocogen_admin_pages[0]['jvScripts']!!}  --}}
                    </div>
                </div>
                <section class="divider pt-0">
                    <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
                </section>
            </div>
        @endsection

        @section('before_body_end_scripts')
        {!!$cocogen_admin_pages[0]['jvScripts']!!}
        @endsection
    @endif
@endif

{{-- @section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
@endsection --}}

{{-- @section('content') --}}
{{--  <script>
    gtag('event', 'page_view', {
        'send_to': 'AW-936227039',
        'value': 'replace with value',
        'items': [{
        'id': '6488316056',
        'google_business_vertical': 'retail'
        }]
    });
</script>  --}}
{{-- @php
    // for conditional container class since all cms pages default to this layout.
    // see controller home::defaultPages (line: 265)
    $containerClass = 'about';
    if (strpos(Request::url(),'our-milestone') !== false) {
        $containerClass = 'about-milestones';
    } elseif (strpos(Request::url(), 'sitemap') !== false) {
        $containerClass = 'content-wrapper';
    }
@endphp --}}
