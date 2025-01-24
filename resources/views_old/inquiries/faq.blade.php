@extends('layouts.cgen')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/inquiries.less') }}" />
@endsection

@section('content')
    <div class="inquiries content-wrapper bg-layout5">
        <section class="banner banner-inquiry">
            <div class="container-fluid breadcrumb-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb rfs-1-5">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Inquiries</a></li>
                        <li class="breadcrumb-item" aria-current="page">FAQs
                    </ol>
                </nav>
            </div>
            <div class="container">
                <div class="content">
                    <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">FAQs</h1>
                </div>
            </div>
        </section>
        <div class="main-content">
            <div class="inner">
                <section class="faqAccordion">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @if ($cocogen_admin_faq_category)
                                    <div class="filter mb-4 mb-lg-5">
                                        <p class="mrfs-1-3 mrfs-lg-1-18 ff-bold text-center mb-4">Your most commonly asked questions answered</p>

                                        <form class="d-flex justify-content-center align-items-center">
                                            <div class="mb-2 mb-sm-0">
                                                <h2 class="d-flex pb-2 mb-0 me-3 mrfs-0-18 mrfs-lg-1-7">Filter by:</h2>
                                            </div>
                                            <div class="select mb-2 mb-sm-0">
                                                <select class="styled-select" name="position" id="faq-list">
                                                    <option value="">All</option>
                                                    @foreach ($cocogen_admin_faq_category as $filterItem)
                                                        <option value="faqs-{{ $filterItem->id }}" data-id="{{ $filterItem->id }}">{{ $filterItem->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="accordion cacc" id="corporateAccordion">
                                        @foreach ($cocogen_admin_faq_category as $cocogen_admin_faq_categorys)
                                            @include('inquiries.faq.item', ['item' => $cocogen_admin_faq_categorys, 'faqs' => $cocogen_admin_faq])
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <section class="divider">
        <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
    </section>
@endsection

@section('before_body_end_scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            @if ($cocogen_admin_faq_category)
                $("#faq-list").select2({
                    minimumResultsForSearch: Infinity,
                });

                $('#faq-list').on('select2:select', function(e) {
                    let sel = $(this);
                    let selId = sel.find(':selected').data('id');

                    if (sel.val() != '') {
                        $('.accordionItem').hide();
                        $('#'+sel.val()).collapse('show');
                        $('#parent_'+selId).parent().show();
                    } else {
                        $('.accordionItem').show();
                        $('.collapse').collapse('hide');
                    }
                });
            @endif
        });
    </script>
@endsection
