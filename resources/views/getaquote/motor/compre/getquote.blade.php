@extends('layouts.app')

@section('content')


	  <div class="top-container">
            <!-- config enabled always -->
            <div class="custom-banner custom-page-banner" data-uri-path="/get-insured-today">
            </div>
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 a-left">
                            <ul>
                                <li class="home"><a href="{{ url('/') }}" title="Go to Home Page">Home</a>
                                    <span class="breadcrumbs-split"><i class="icon-keyboard_arrow_right"></i></span>
                                </li>
                                <li class="category22"><strong>Get a quote</strong> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-name container">
                <h1>
                    Get a quote
                </h1>
            </div>
        </div>
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Get a quote</h1>
                    </div>
                    <div class="category-products like-category-grid-block">
                        <ul class="products-grid  columns3">
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/get-quote/travel-excel-plus') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/get-quote/travel-excel-plus') }}"
                                                title="International Travel Protect" class="product-image" style="height: 219px;">
                                                <img id="product-collection-image-18" class="landscape" src="{{ url('/images/getquote/international_travel_protect.jpg') }}"
                                                    alt="International Travel Protect" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 120px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/getquote/international_travel_protect.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/get-quote/travel-excel-plus') }}"
                                                    title="International Travel Protect">International Travel Protect </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Go global confidently
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/get-quote/travel-excel-plus') }}"
                                                class="addtocart col-md-6 col-sm-6 col-xs-6 itpmotor" title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;Get A Quote </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/get-quote/motor-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/get-quote/motor-insurance') }}"
                                                title="Motor" class="product-image" style="height: 219px;">
                                                <img id="product-collection-image-20" class="landscape" src="{{ url('/images/product_lines/motor.jpg') }}"
                                                    alt="Motor" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 120px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/motor.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/get-quote/motor-insurance') }}"
                                                    title="Motor">Motor - CTPL</a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Shift to a broader protection
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/get-quote/motor-insurance') }}" title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;Get A Quote </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="item">
                                <div class="item-area box-shadow">
                                    <div class="product-image-area">
                                        <div class="loader-container">
                                            <div class="loader">
                                                <i class="ajax-loader medium animate-spin"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('/get-quote/motor-insurance') }}" class="quickview-icon">
                                            <i class="icon-export"></i><span>Quick View </span></a><a href="{{ url('/get-quote/motor-insurance/compre') }}"
                                                title="Motor" class="product-image" style="height: 219px;">
                                                <img id="product-collection-image-20" class="landscape" src="{{ url('/images/product_lines/motor.jpg') }}"
                                                    alt="Motor" width="300">
                                            </a>
                                    </div>
                                    <div class="details-area" style="height: 120px;">
                                        <div class="product-name-wrapper abs">
                                            <div class="product-icon box-shadow">
                                                <img class="product-icon-image" src="{{ url('/images/product_lines/motor.jpg') }}"
                                                    alt="test product">
                                            </div>
                                            <h2 class="product-name">
                                                <a href="{{ url('/get-quote/motor-insurance') }}"
                                                    title="Motor">Motor - COMPRE </a>
                                            </h2>
                                            <div class="short-description-wrapper" style="overflow-wrap: break-word;">
                                                Shift to a broader protection
                                            </div>
                                        </div>
                                        <div class="actions abs">
                                            <!-- Inquiry removed -->
                                            <!-- Coming soon -->
                                            <a href="{{ url('/get-quote/motor-insurance') }}" title="Get A Quote" style="width: 100%;">
                                                <!--?php/* dating href="https://www.ucpbgen.com/comingsoon" */ ?-->
                                                <span>&nbsp;Get A Quote </span></a>
                                            <!-- Coming soon -->
                                            <div class="clearer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!--script type="text/javascript">
				jQuery('.col-main .products-grid li:nth-child(2n)').addClass('nth-child-2n');
				jQuery('.col-main .products-grid li:nth-child(2n+1)').addClass('nth-child-2np1');
				jQuery('.col-main .products-grid li:nth-child(3n)').addClass('nth-child-3n');
				jQuery('.col-main .products-grid li:nth-child(3n+1)').addClass('nth-child-3np1');
				jQuery('.col-main .products-grid li:nth-child(4n)').addClass('nth-child-4n');
				jQuery('.col-main .products-grid li:nth-child(4n+1)').addClass('nth-child-4np1');
				jQuery('.col-main .products-grid li:nth-child(5n)').addClass('nth-child-5n');
				jQuery('.col-main .products-grid li:nth-child(5n+1)').addClass('nth-child-5np1');
				jQuery('.col-main .products-grid li:nth-child(6n)').addClass('nth-child-6n');
				jQuery('.col-main .products-grid li:nth-child(6n+1)').addClass('nth-child-6np1');
				jQuery('.col-main .products-grid li:nth-child(7n)').addClass('nth-child-7n');
				jQuery('.col-main .products-grid li:nth-child(7n+1)').addClass('nth-child-7np1');
				jQuery('.col-main .products-grid li:nth-child(8n)').addClass('nth-child-8n');
				jQuery('.col-main .products-grid li:nth-child(8n+1)').addClass('nth-child-8np1');
			</script-->
                        <div class="toolbar-bottom">
                            <div class="toolbar">
                                <div class="sorter">
                                    <div class="sort-by">
                                        <label for="name">
                                            Sort By:</label>
                                        <select id="name">
                                            <option value="https://www.ucpbgen.com/get-insured-today?dir=asc&amp;order=position">
                                                Position </option>
                                            <option value="https://www.ucpbgen.com/get-insured-today?dir=asc&amp;order=name"
                                                selected="selected">Name </option>
                                            <option value="https://www.ucpbgen.com/get-insured-today?dir=asc&amp;order=featured">
                                                Is Featured </option>
                                            <option value="https://www.ucpbgen.com/get-insured-today?dir=asc&amp;order=viewproduct">
                                                Most Viewed </option>
                                            <option value="https://www.ucpbgen.com/get-insured-today?dir=asc&amp;order=sort_feature">
                                                Sort Number </option>
                                        </select>
                                        <a href="https://www.ucpbgen.com/get-insured-today?dir=desc&amp;order=name" title="Set Descending Direction">
                                            <img src="https://www.ucpbgen.com/skin/frontend/smartwave/porto/images/i_asc_arrow.gif"
                                                alt="Set Descending Direction" class="v-middle"></a>
                                    </div>
                                    <p class="view-mode">
                                    </p>
                                    <div class="pager">
                                        <p class="amount">
                                            <strong>2 Item(s)</strong>
                                        </p>
                                    </div>
                                    <div class="limiter">
                                        <label for="limit">
                                            Show:</label>
                                        <select id="limit">
                                            <option value="https://www.ucpbgen.com/get-insured-today?limit=100" selected="selected">
                                                100 </option>
                                            <option value="https://www.ucpbgen.com/get-insured-today?limit=all">All </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
