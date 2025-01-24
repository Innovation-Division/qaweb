<section class="hpInquiry bg-layout1">
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-11">
                <div class="text-center mb-4">
                    <h2 class="mrfs-1-3 mrfs-md-1-10 mrfs-lg-1-13">Tell us what you need</h2>
                </div>
                <div class="inquiryBox d-flex justify-content-center align-items-center">
                    <div class="col1 d-flex flex-column flex-sm-row justify-content-center align-items-center">
                        <p class="d-flex me-0 me-sm-3">I need protection for</p>
                        <form class="d-flex align-items-center me-0 me-lg-2" method="get" action="{{ url('/home-redirect') }}">
                            <div class="flex-grow-1 me-2 me-sm-3 me-md-2">
                                <div class="styledSelect">
                                    <select class="styled-select" id="assignedRole" name="assignedRole" data-selectionCssClass="select2-layout1" data-dropdownCssClass="select2-layout1">
                                    @foreach($cocogen_admin_ineedprotection as $cocogen_admin_ineedprotections)
                                        <option @if ($loop->first)selected @endif value="{{$cocogen_admin_ineedprotections->link}}">{{$cocogen_admin_ineedprotections->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary buttonGo">Go</button>
                        </form>
                    </div>
                    <div class="buttonInquire">
                        <a href="{{ url('/client-services') }}" class="btn btn-primary-light">
                            <svg id="contact_support_black_48dp" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                                <path id="Path_24" data-name="Path 24" d="M15.5,34.885v-5.4a14.252,14.252,0,1,1,15-14.235c0,7.425-5.16,14.9-12.855,18.6ZM16.25,4a11.25,11.25,0,0,0,0,22.5H18.5v3.45c5.46-3.45,9-9.12,9-14.7A11.254,11.254,0,0,0,16.25,4Zm-1.5,17.25h3v3h-3Zm3-2.25h-3c0-4.875,4.5-4.5,4.5-7.5a3,3,0,0,0-6,0h-3a6,6,0,0,1,12,0C22.25,15.25,17.75,15.625,17.75,19Z" transform="translate(1 0.5)" />
                            </svg>
                            Not sure? Talk to our representative.
                        </a>
                    </div>
                </div>
                @if($cocogen_admin_homepage_video)
                <div class="featureBox">
                    <div class="mb-3">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-12 text-center">
                                <div class="d-flex justify-content-center videoContainer mt-3 mb-3">
                                    {{-- https://www.cocogen.com/images/videos/CocoGen AVP.mp4 --}}
                                    @isset($cocogen_admin_homepage_video[0]['videoLink'])
                                        <video width="100%" height="auto" src="{{ url($cocogen_admin_homepage_video[0]['videoLink']) }}" frameborder="1" autobuffer="" autoloop="" loop="" controls="" allowfullscreen="" controlslist="nodownload" poster="{{ url($cocogen_admin_homepage_video[0]['posterlink']) }}"></video>
                                    @endisset
                                    {{-- <div class="video-thumbmail" data-bs-toggle="modal" data-bs-target="#videModal">
                                        @if (file_exists (public_path ($cocogen_admin_homepage_video[0]['videoLink'])))
                                            <img src="{{ url($cocogen_admin_homepage_video[0]['posterlink']) }}" class="img-fluid rounded-start" alt="Video" />
                                        @else
                                            <img src="{{ asset('/assets/img/poster.png') }}" class="img-fluid rounded-start" alt="Video">
                                        @endif
                                    </div>
                                    <div class="modal modal-light fade video-modal" tabindex="-1" role="dialog" id="videModal" data-videosrc="{{ url($cocogen_admin_homepage_video[0]['videoLink']) }}">
                                        <div class="modal-dialog modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex justify-content-between">
                                                    <div class="logo">
                                                        <div class="imageContainer">
                                                            <img class="logo" src="{{ asset('/assets/img/logo.png') }}" alt="Cocogen Logo" />
                                                        </div>
                                                    </div>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <svg id="close" data-name="close" xmlns="http://www.w3.org/2000/svg" width="67.891" height="67.891" viewBox="0 0 67.891 67.891">
                                                            <path id="Path_1686" data-name="Path 1686" d="M37.741,34.059l-8.6-8.6,8.6-8.6a2.608,2.608,0,0,0-3.688-3.688l-8.6,8.6-8.6-8.6a2.5,2.5,0,0,0-3.688,0,2.52,2.52,0,0,0,0,3.688l8.6,8.6-8.6,8.6a2.522,2.522,0,0,0,0,3.688,2.591,2.591,0,0,0,3.688,0l8.6-8.6,8.6,8.6a2.62,2.62,0,0,0,3.688,0A2.591,2.591,0,0,0,37.741,34.059Z" transform="translate(8.494 8.487)" fill="#fff" />
                                                            <path id="Path_1687" data-name="Path 1687" d="M37.321,7.945A29.381,29.381,0,0,1,58.1,58.1,29.381,29.381,0,0,1,16.545,16.545a29.182,29.182,0,0,1,20.775-8.6m0-4.57A33.946,33.946,0,1,0,71.266,37.321,33.94,33.94,0,0,0,37.321,3.375Z" transform="translate(-3.375 -3.375)" fill="#fff" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="modal-heading">
                                                            <div class="text-center">
                                                                <h2 class="modal-title">Resiliency is in our roots</h2>
                                                            </div>
                                                        </div>
                                                        <div class="pb-3">
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 col-md-12 col-lg-8">
                                                                    <div class="embed-responsive">
                                                                        <video width="100%" height="auto" src="{{ url($cocogen_admin_homepage_video[0]['videoLink']) }}" frameborder="1" autobuffer="" autoloop="" loop="" controls="" allowfullscreen="" controlslist="nodownload" poster="{{ url($cocogen_admin_homepage_video[0]['posterlink']) }}"></video>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-12">
                                <h3 class="card-title text-start ff-regular">{{ $cocogen_admin_homepage_video[0]['name'] }}</h3>
                                <p class="card-text">{{ $cocogen_admin_homepage_video[0]['description'] }}</p>
                                <p class="card-text cocogenText ff-hk-nova-medium">
                                    <span class="ff-hk-nova-medium">CO</span>MITTED.<br />
                                    <span class="ff-hk-nova-medium">CO</span>MPASSIONATE.<br />
                                    <span class="ff-hk-nova-medium">GEN</span>UINE.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
