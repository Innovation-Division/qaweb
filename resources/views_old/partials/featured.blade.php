<section class="hpFeatured bg-layout2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-11">
                <div class="text-center mb-2 mb-md-0">
                    <h2>Featured Products</h2>
                </div>
                <div class="text-center mb-4 mt-3">
                    <h3 class="ff-regular">Leave it to us, not to chance</h3>
                </div>

                <div id="productCarousel" class="productCarousel carousel layout1 slide d-none d-lg-block" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @php
                            $firstItem = $results[0]->link
                        @endphp
                        @foreach(array_chunk($results, 3) as $chunks)
                            <div class="carousel-item @if ($chunks[0]->link == $firstItem)active @endif">
                                <div class="card-group">
                                    @foreach($chunks as $item)
                                        @include('partials.featured.item', ['data' => $item])
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carouselControl carouselControlLeft carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <div class="carouselControlButton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.317" height="41" viewBox="0 0 25.317 41">
                                <path id="Icon_material-keyboard-arrow-right" data-name="Icon material-keyboard-arrow-right" d="M38.2,44.807,22.554,29.125,38.2,13.442,33.385,8.625l-20.5,20.5,20.5,20.5Z" transform="translate(-12.885 -8.625)" />
                            </svg>
                        </div>
                    </button>
                    <button class="carouselControl carouselControlRight carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <div class="carouselControlButton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.317" height="41" viewBox="0 0 25.317 41">
                                <path id="Icon_material-keyboard-arrow-right" data-name="Icon material-keyboard-arrow-right" d="M38.2,44.807,22.554,29.125,38.2,13.442,33.385,8.625l-20.5,20.5,20.5,20.5Z" transform="translate(-12.885 -8.625)" />
                            </svg>
                        </div>
                    </button>
                    <div class="carousel-indicators carouselIndicators">
                        @foreach(array_chunk($results, 3) as $chunks)
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $loop->index }}" class="@if ($loop->first)active @endif carouselIndicator" @if ($loop->first)aria-current="true" @endif aria-label="Slide {{ $loop->index }}"></button>
                        @endforeach
                    </div>
                </div>

                <div class="productList d-lg-none d-xl-none">
                    <div class="row row-cols-2 g-2 g-sm-3 g-md-5">
                        @foreach($results as $item)
                        <div class="col">
                            <div class="card h-100 productItem">
                                <div class="card-body">
                                    <div class="productIcon">
                                        @if ($item->featuredIcon)
                                            <img src="{{ url($item->featuredIcon) }}" alt="{{ $item->product }}" class="img-fluid" />
                                        @else
                                            <img src="assets/img/protech.svg" alt="{{ $item->product }}" class="img-fluid" />
                                        @endif
                                    </div>
                                    <h4 class="productName mb-4">{{ $item->product }}</h4>
                                    @if ($item->description)
                                        <p class="card-text productText">{{ $item->description }}</p>
                                    @endif
                                </div>
                                <div class="card-footer productFooter">
                                    <a href="/{{ $item->link }}" class="btn btn-secondary-light productButton">Learn more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-center mt-5 mt-lg-3">
                    <a href="{{ url('/product-lines') }}" class="btn btn-secondary buttonView">View all products</a>
                </div>
            </div>
        </div>
    </div>
</section>
