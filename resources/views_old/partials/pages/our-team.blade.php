@section('stylesheet')
    <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/about.less') }}" />
@endsection

@section('content')
    <div class="about content-wrapper bg-layout5">
        @include('partials.breadcrumbs')
        <div class="main-content">
            <div class="inner">
                {!! html_entity_decode($cocogen_admin_pages[0]['content']) !!}
            </div>
        </div>
        <section class="divider pt-0">
            <img src="{{ asset('/assets/img/wave-lines.svg') }}" alt="divider" />
        </section>
    </div>
    {{-- Our Team Modal --}}
    <div class="modal fade modal-team" tabindex="-1" role="dialog" id="modal-team">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-end">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <img class="logo d-flex d-lg-none" src="assets/img/logo_white.png" alt="cocogen logo" />
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <svg id="close" data-name="close" xmlns="http://www.w3.org/2000/svg" width="67.891" height="67.891" viewBox="0 0 67.891 67.891">
                                    <path id="Path_1686" data-name="Path 1686"
                                        d="M37.741,34.059l-8.6-8.6,8.6-8.6a2.608,2.608,0,0,0-3.688-3.688l-8.6,8.6-8.6-8.6a2.5,2.5,0,0,0-3.688,0,2.52,2.52,0,0,0,0,3.688l8.6,8.6-8.6,8.6a2.522,2.522,0,0,0,0,3.688,2.591,2.591,0,0,0,3.688,0l8.6-8.6,8.6,8.6a2.62,2.62,0,0,0,3.688,0A2.591,2.591,0,0,0,37.741,34.059Z"
                                        transform="translate(8.494 8.487)" fill="#fff" />
                                    <path id="Path_1687" data-name="Path 1687" d="M37.321,7.945A29.381,29.381,0,0,1,58.1,58.1,29.381,29.381,0,0,1,16.545,16.545a29.182,29.182,0,0,1,20.775-8.6m0-4.57A33.946,33.946,0,1,0,71.266,37.321,33.94,33.94,0,0,0,37.321,3.375Z" transform="translate(-3.375 -3.375)"
                                        fill="#fff" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-5 align-items-center">
                                <div class="image-container text-center">
                                    <img src="" alt="board member" />
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 d-flex align-items-center">
                                <div class="modal-text">
                                    <div class="name text-center text-lg-start">
                                        <p class="mb-0"></p>
                                        <label class="mb-0"></label>
                                    </div>
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center d-none d-lg-flex">
                    <div class="imageContainer">
                        <img class="logo" src="assets/img/logo_white.png" alt="cocogen logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before_body_end_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("show.bs.modal", "#modal-team", function(e) {
                let target = $(e.relatedTarget);
                let name = target.parent().find(".name").html();
                let title = target.parent().find(".title").html();
                let photo = target.parent().parent().find("img").attr("src");
                let description = target.data("description");
                let modalContent = $(e.currentTarget).find(".modal-body");

                if (typeof photo == "undefined") {
                    photo = "";
                }

                if (typeof name == "undefined") {
                    name = "";
                }

                if (typeof title == "undefined") {
                    title = "";
                }

                if (typeof description == "undefined") {
                    description = "";
                }

                modalContent.find("img").attr("src", photo);
                modalContent.find("p").first().html(name);
                modalContent.find("label").html(title);
                modalContent.find(".description").html(description);
            });
        });
    </script>
@endsection
