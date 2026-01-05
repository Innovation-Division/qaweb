
<link rel='stylesheet' href="{{ asset('/asset/ecommerce/itp/seemoreITP.css') }}">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }



    .pricing__table {
        display: flex;
        /* margin: 30px 30px 90px 30px; */
    }

    @media (max-width: 640px) {
        .pricing__table {
            margin: 60px 15px;
        }
    }

    .pricing__table .pt__title {
        max-width: 35%;
        flex: 1;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__title {
            max-width: 50%;
        }
    }

    .pricing__table .pt__title .pt__title__wrap {
        position: relative;
        flex: 1;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 24px 0;
        font-size: 1.375rem;
        line-height: 1.4;
        text-align: center;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__title .pt__title__wrap {
            font-size: 1.3rem;
        }
    }

    .pricing__table .pt__title .pt__title__wrap .pt__row {
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-size: 18px;
        font-weight: 500;
        min-height: 70px;
        padding-left: 16px;
        padding-right: 16px;
        border-bottom: 1px solid rgba(73, 72, 74, 0.1);
        text-align: left;
        align-items: flex-start;
    }

    .pricing__table .pt__title .pt__title__wrap .pt__row:first-child {
        border-bottom: 0;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__title .pt__title__wrap .pt__row {
            padding-left: 32px;
            padding-right: 32px;
        }
    }

    @media (max-width: 640px) {
        .pricing__table .pt__title .pt__title__wrap .pt__row {
            padding-left: 0;
            padding-right: 15px;
            font-size: 14px;
        }
    }

    .pricing__table .pt__option {
        position: relative;
        flex: 1;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__option {
            max-width: 50%;
        }
    }

    .pricing__table .pt__option .pt__option__mobile__nav {
        position: absolute;
        z-index: 1;
        top: 0%;
        bottom: auto;
        left: 0%;
        right: auto;
        display: none;
        justify-content: space-between;
        width: 100%;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__option .pt__option__mobile__nav {
            z-index: 1;
            top: 40px;
            display: flex;
            grid-column-gap: 8px;
            grid-row-gap: 8px;
            justify-content: space-between;
            width: 110%;
            margin-left: -5%;
        }
    }

    .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        color: #fff;
        border-radius: 50%;
        background-color: #008080;
        transition: 0.25s;
    }

    .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn:hover {
        background-color: #0057E6;
    }

    .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn.swiper-button-disabled {
        background-color: #c0beb6;
        pointer-events: none;
    }

    .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn svg {
        width: 16px;
        color: #faf7f2 !important;
        fill:#fff;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__option .pt__option__slider {
            overflow: hidden;
            z-index: 0;
        }
    }

    .pricing__table .pt__option .pt__option__item {
        flex: 1;
        z-index: 0;
        width: auto;
        max-width: 33.3333%;
        margin-right: 0;
        transition: transform 0.5s;
    }

    .pricing__table .pt__option .pt__option__item .pt__item:hover {
        background-color: #dbedea;
        border: 1px solid #008080;
        color:#008080;
        border-radius: 24px;
    }


    /* .pricing__table .pt__option .pt__option__item:hover {
         background-color: #dbedea;
        border: 1px solid #008080;
        color:#008080;
        border-radius: 24px; 
        
    } */
    @media (max-width: 991px) {
        .pricing__table .pt__option .pt__option__item {
            width: 100%;
            max-width: none;
            flex: none;
        }
    }

    .pricing__table .pt__option .pt__option__item .pt__item {
        position: relative;
        display: flex;
        flex: 1;
        flex-direction: column;
        justify-content: flex-start;
        margin-bottom: 1em;
        overflow: hidden;
        border-radius: 24px;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__option .pt__option__item .pt__item {
            border: 1px solid #ddd;
            background-color: #fafafa;
        }
    }

    .pricing__table .pt__option .pt__option__item .pt__item.recommend {
        /* background-color: rgba(0, 97, 255, 0.15); */
        /* background-color: #dbedea;*/
        border: 1px solid #008080; 
    }

    .pricing__table .pt__option .pt__option__item .pt__item .pt__item__wrap {
        flex: 1;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        text-align: center;
        padding: 24px 0 0 0;
        font-size: 1.375rem;
        line-height: 1.4;
        position: relative;
    }

    @media (max-width: 991px) {
        .pricing__table .pt__option .pt__option__item .pt__item .pt__item__wrap {
            font-size: 1.3rem;
        }
    }

    .pricing__table .pt__option .pt__option__item .pt__item .pt__row {
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 70px;
        padding-left: 16px;
        padding-right: 16px;
        font-size: 16px;
        font-weight: 300;
        border-bottom: 1px solid rgba(73, 72, 74, 0.1);
    }

    .pricing__table .pt__option .pt__option__item .pt__item .pt__row:first-child {
        border-bottom: 0;
        font-size: 20px;
        font-weight: 600;
    }

    .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child {
        display: inline-flex;
        padding: 20px 15px;
        align-items: center;
        border-bottom: 0;
    }

    .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child a {
        padding: 15px 30px;
        font-weight: 500;
        text-transform: uppercase;
        text-decoration: none;
        color: #008080;
        border-radius: 10px;
        background-color: transparent;
        transition: 0.25s;
    }

    .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child a:hover {
        background-color: #008080;
        color: #fff;

    }

    @media (max-width: 576px) {
        .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child a {
            padding: 12px 20px;
        }
    }

    @media (max-width: 640px) {
        .pricing__table .pt__option .pt__option__item .pt__item .pt__row {
            font-size: 14px;
            font-weight: 400;
        }
    }

    h1 {
        text-align: center;
        margin-top: 60px;
        padding: 0 30px;
        font-size: 30px;
        font-weight: 500;
        line-height: 1.4;
    }
</style>

    <script>
        window.console = window.console || function (t) { };
    </script>

    <div class="pricing__table" style="width: 110%;margin-left: -24px;">
        <div class="pt__option" style="max-width: 100%;">
            <div class="pt__option__mobile__nav" style="top: 40%;">
                <a id="navBtnLeft" href="#" class="mobile__nav__btn" >
                    <svg viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.1538 11.9819H1.81972" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11.9863 22.1535L1.82043 11.9865L11.9863 1.81946"
                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
                <a id="navBtnRight" href="#" class="mobile__nav__btn">
                    <svg viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.81934 11.9819H22.1534" stroke="currentColor"
                            stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11.9863 22.1535L22.1522 11.9865L11.9863 1.81946"
                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="pt__option__slider swiper" id="pricingTableSlider">
                <div class="swiper-wrapper" style="margin-top: -20px;">
                    <div id="" class="swiper-slide pt__option__item">
                        <div class="pt__item" style="background-color: transparent;border: 0px;">
                            <div class="pt__item__wrap">
                                @include('ecommerce.itp.package_executive') 
                            </div>
                        </div>
                    </div>
                    <div id="" class="swiper-slide pt__option__item">
                        <div class="pt__item" style="background-color: transparent;border: 0px;">
                            <div class="pt__item__wrap">
                                @include('ecommerce.itp.package_elite') 
                            </div>
                        </div>
                    </div>
                    <div id="" class="swiper-slide pt__option__item">
                        <div class="pt__item" style="background-color: transparent;border: 0px;">
                            <div class="pt__item__wrap">
                                @include('ecommerce.itp.package_esteem') 
                            </div>
                        </div>
                    </div>
                    <div id="" class="swiper-slide pt__option__item">
                        <div class="pt__item" style="background-color: transparent;border: 0px;">
                            <div class="pt__item__wrap">
                                @include('ecommerce.itp.package_economy') 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.min.js'></script>
   

