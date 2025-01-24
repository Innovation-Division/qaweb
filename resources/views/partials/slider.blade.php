<section class="hpCarousel">
    <div class="container-fluid px-0">
        <div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators carouselIndicators">
                @foreach ($cocogen_admin_homepage_slider as $cocogen_admin_homepage_sliders)
                    <button type="button" data-bs-target="#homepageCarousel" data-bs-slide-to="{{ $loop->index }}" class="@if ($loop->first)active @endif carouselIndicator" aria-current="true" aria-label="Slide {{ $loop->index }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">

                @foreach ($cocogen_admin_homepage_slider as $cocogen_admin_homepage_sliders)

                    @php
                        $mobileImg  = 'assets/img/banners/placeholder_mobile.png';
                        $tabletImg  = 'assets/img/banners/placeholder_mobile.png';
                        $desktopImg = 'assets/img/banners/placeholder.png';

                        if (file_exists (public_path ($cocogen_admin_homepage_sliders->mobileImage))) {
                            $mobileImg = $cocogen_admin_homepage_sliders->mobileImage;
                        }

                        if (file_exists (public_path ($cocogen_admin_homepage_sliders->tabletImage))) {
                            $tabletImg = $cocogen_admin_homepage_sliders->tabletImage;
                        }

                        if (file_exists (public_path ($cocogen_admin_homepage_sliders->imagelink))) {
                            $desktopImg = $cocogen_admin_homepage_sliders->imagelink;
                        }

                        $link = $cocogen_admin_homepage_sliders->desclink ? url($cocogen_admin_homepage_sliders->desclink) : '#';

                    @endphp

                    <a href="{{ $link }}" class="carousel-item responsive-img @if ($loop->first)active @endif">
                        <span data-src="{{ asset($mobileImg) }}" data-class="w-100"></span>
                        <span data-src="{{ asset($tabletImg) }}" data-class="w-100" data-min-width="768"></span>
                        <span data-src="{{ asset($desktopImg) }}" data-class="w-100" data-min-width="992"></span>
                    </a>

                @endforeach
            </div>
            <button class="carouselControl carouselControlLeft carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
                <div class="carouselControlButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.317" height="41" viewBox="0 0 25.317 41">
                        <path id="Icon_material-keyboard-arrow-right" data-name="Icon material-keyboard-arrow-right" d="M38.2,44.807,22.554,29.125,38.2,13.442,33.385,8.625l-20.5,20.5,20.5,20.5Z" transform="translate(-12.885 -8.625)" />
                    </svg>
                </div>
            </button>
            <button class="carouselControl carouselControlRight carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
                <div class="carouselControlButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25.317" height="41" viewBox="0 0 25.317 41">
                        <path id="Icon_material-keyboard-arrow-right" data-name="Icon material-keyboard-arrow-right" d="M38.2,44.807,22.554,29.125,38.2,13.442,33.385,8.625l-20.5,20.5,20.5,20.5Z" transform="translate(-12.885 -8.625)" />
                    </svg>
                </div>
            </button>
        </div>
    </div>
</section>
