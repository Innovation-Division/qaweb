
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

    <div class="pricing__table">
        <div class="pt__title">
            <div class="pt__title__wrap">
                <div class="pt__row pt__row_header"><strong>Standard Coverages</strong></div>
                <div class="pt__row">Accident Death Disablement</div>
                <div class="pt__row">Accidental Burial Assistance</div>
                <div class="pt__row">Personal Liability</div>
                <div class="pt__row">Medical expenses and hospitalization abroad</div>
                <div class="pt__row"></div>
                <div class="pt__row"><strong>Travel Assistance</strong></div>
                <div class="pt__row">Transport or repatriation in case of illness or accident</div>
                <div class="pt__row">Emergency dental care </div>
                <div class="pt__row">Hospital Cash Income </div>
                <div class="pt__row">Repatriation of a family member travelling with the insured </div>
                <div class="pt__row">Repatriation of mortal remains    </div>
                <div class="pt__row">Escort of dependent child </div>
                <div class="pt__row">Travel of one immediate family member</div>
                <div class="pt__row">Emergency return home following death of a close family member  </div>
                <div class="pt__row">Delivery of medicines  </div>
                <div class="pt__row">Relay of urgent messages </div>
                <div class="pt__row">Long distance medical information service</div>
                <div class="pt__row">Medical referral/appointment of local medical specialist </div>
                <div class="pt__row">Connection services  </div>
                <div class="pt__row">Advance of bail bond </div>
                <div class="pt__row">Trip Cancellation  </div>
                <div class="pt__row">Trip Curtailment  </div>
                <div class="pt__row table-row-adjusted">Delayed Departure </div>
                <div class="pt__row">Flight Misconnection </div>
                <div class="pt__row">Flight Diversion </div>
                <div class="pt__row">Baggage Delay  </div>
                <div class="pt__row">Compensation for in-flight loss of checked-in baggage </div>
                <div class="pt__row">Lost Or Stolen Baggage/Personal Belongings Not Checked-In  </div>
                <div class="pt__row">Location and forwarding of baggage and personal effects </div>
                <div class="pt__row">Loss of Personal Money </div>
                <div class="pt__row">Loss of Passport, Driving License, National Identity Card Abroad </div>
                <div class="pt__row"></div>
                <div class="pt__row"><strong>Indicative Peso Equivalent</strong></div>
                <div class="pt__row"><strong>USD Amount</strong></div>
            </div>
        </div>
        <div class="pt__option">
            <div class="pt__option__mobile__nav">
                <a id="navBtnLeft" href="#" class="mobile__nav__btn">
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
                <div class="swiper-wrapper">
                    <div id="div-more-package-economy" class="swiper-slide pt__option__item more-package-option more-package-option-economy" data-id="Economy">
                        <div class="pt__item">
                            <div class="pt__item__wrap">
                                <div class="pt__row">
                                    <p>
                                        <label>Economy</label>
                                        <label style="position: fixed; margin-left: 20px; margin-top: -6px;display:none;" class="svg_check_more_package">
                                            <svg width="30" height="30" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_icon_check_more_package">
                                                <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                                            </svg>
                                        </label>
                                    </p>
                                </div>
                                <div class="pt__row">$10,000</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row"> $1,000 <br />  (Deducted $100)</div>
                                <div class="pt__row">$20,000</div>
                                <div class="pt__row"></div>
                                <div class="pt__row"></div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$20 per day max of 10 days</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Travel cost plus up $100/day maximum $1,000</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$1,000</div>
                                <div class="pt__row">$3,000</div>
                                <div class="pt__row">$3,000</div>
                                <div class="pt__row">$200 (Lump Sum cash benefit per occurrence/Non-Receipted up to $100)</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$40 (Lump Sum cash benefit per occurrence/Non-Receipted up to $40)</div>
                                <div class="pt__row">Up to $1,200 subject to limit $150 for any item</div>
                                <div class="pt__row">Up to $1,200 subject to limit $150 for any item</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row"></div>
                                <div class="pt__row more-package-column"><strong><p class="piso-economy-premium"></p></strong></div>
                                <div class="pt__row more-package-column"><strong><p class="dollar-economy-premium"></p></strong></div>
                                <div class="pt__row">
                                    <a class="more-package-select" href="javascript:void(0)" onclick="return false;">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div-more-package-esteem"  class="swiper-slide pt__option__item more-package-option more-package-option-esteem" data-id="Esteem">
                        <div class="pt__item">
                            <div class="pt__item__wrap">
                                <div class="pt__row pt__row_header">
                                    <p>
                                        <label>Esteem</label>
                                        <label style="position: fixed; margin-left: 20px; margin-top: -6px;display:none;" class="svg_check_more_package" >
                                            <svg width="30" height="30" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"  class="svg_icon_check_more_package">
                                                <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                                            </svg>
                                        </label>
                                    </p>
                                </div>
                                <div class="pt__row">$25,000</div>
                                <div class="pt__row">$500</div>
                                <div class="pt__row"> $10,000 <br />  (Deducted $1,000)</div>
                                <div class="pt__row">$45,000</div>
                                <div class="pt__row"></div>
                                <div class="pt__row"></div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$20 per day max of 10 days</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Travel cost plus up $100/day maximum $1,000</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$1,000</div>
                                <div class="pt__row">$3,000</div>
                                <div class="pt__row">$3,000</div>
                                <div class="pt__row">$200 (Lump Sum cash benefit per occurrence/Non-Receipted up to $100)</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$90 (Lump Sum cash benefit per occurrence/Non-Receipted up to $90)</div>
                                <div class="pt__row">Up to $1,200 subject to limit $150 for any item</div>
                                <div class="pt__row">Up to $1,200 subject to limit $150 for any item</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row"></div>
                                <div class="pt__row more-package-column"><strong><p class="piso-esteem-premium"></p></strong></div>
                                <div class="pt__row more-package-column"><strong><p class="dollar-esteem-premium"></p></strong></div>
                                <div class="pt__row">
                                    <a class="more-package-select" href="javascript:void(0)" onclick="return false;">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="swiper-slide pt__option__item more-package-option more-package-option-executive" data-id="Executive">
                        <div class="pt__item recommend"><span style="background-color: #008080;
                                color: #fff;
                                padding: 5px 0px 5px 0px;
                                position: absolute;
                                text-align: center;
                                width: 100%;">Popular</span>
                            <div class="pt__item__wrap">
                                <div class="pt__row pt__row_header_exective">
                                    <p>
                                        <label>Executive</label>
                                        <label style="position: fixed; margin-left: 20px; margin-top: 0px;display:none;" class="svg_check_more_package">
                                            <svg width="30" height="30" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_icon_check_more_package_executive">
                                                <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                                            </svg>
                                        </label>
                                    </p>
                                </div>
                                <div class="pt__row">$50,000</div>
                                <div class="pt__row">$1,000</div>
                                <div class="pt__row"> $20,000 <br />  (Deducted $2,000)</div>
                                <div class="pt__row">$50,000</div>
                                <div class="pt__row"></div>
                                <div class="pt__row"></div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$20 per day max of 10 days</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Travel cost plus up $100/day maximum $1,000</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$1,000</div>
                                <div class="pt__row">$3,000</div>
                                <div class="pt__row">$3,000</div>
                                <div class="pt__row">$200 (Lump Sum cash benefit per occurrence/Non-Receipted up to $100)</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$200</div>
                                <div class="pt__row">$100 (Lump Sum cash benefit per occurrence/Non-Receipted up to $100)</div>
                                <div class="pt__row">Up to $1,200 subject to limit $150 for any item</div>
                                <div class="pt__row">Up to $1,200 subject to limit $150 for any item</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row"></div>
                                <div class="pt__row more-package-column"><strong><p class="piso-executive-premium"></p></strong></div>
                                <div class="pt__row more-package-column"><strong><p class="dollar-executive-premium"></p></strong></div>
                                <div class="pt__row">
                                    <a class="more-package-select" href="javascript:void(0)" onclick="return false;">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide pt__option__item more-package-option more-package-option-elite" data-id="Elite">
                        <div class="pt__item">
                            <div class="pt__item__wrap">
                                <div class="pt__row pt__row_header">
                                    <p>
                                        <label>Elite</label>
                                        <label style="position: fixed; smargin-left: 20px; margin-top: -6px;display:none;" class="svg_check_more_package">
                                            <svg width="30" height="30" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_icon_check_more_package">
                                                <path d="M11 0 C8.82441 7.51535e-16 6.69767 0.645139 4.88873 1.85383 C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048 C0.00476613 8.80047 -0.213071 11.0122 0.211367 13.146 C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782 C4.76021 20.3165 6.72022 21.3642 8.85401 21.7886 C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627 C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113 C21.3549 15.3023 22 13.1756 22 11 C21.9969 8.08356 20.837 5.28746 18.7748 3.22523 C16.7125 1.16299 13.9164 0.00307981 11 0 Z M15.8294 9.06019 L9.90635 14.9833 C9.82776 15.0619 9.73444 15.1244 9.63172 15.1669 C9.529 15.2095 9.41889 15.2314 9.3077 15.2314 C9.1965 15.2314 9.08639 15.2095 8.98367 15.1669 C8.88095 15.1244 8.78763 15.0619 8.70904 14.9833 L6.17058 12.4448 C6.01181 12.286 5.92261 12.0707 5.92261 11.8462 C5.92261 11.6216 6.01181 11.4063 6.17058 11.2475 C6.32935 11.0887 6.5447 10.9995 6.76923 10.9995 C6.99377 10.9995 7.20912 11.0887 7.36789 11.2475 L9.3077 13.1884 L14.6321 7.86288 C14.7107 7.78427 14.8041 7.7219 14.9068 7.67936 C15.0095 7.63681 15.1196 7.61491 15.2308 7.61491 C15.342 7.61491 15.452 7.63681 15.5548 7.67936 C15.6575 7.7219 15.7508 7.78427 15.8294 7.86288 C15.908 7.9415 15.9704 8.03483 16.0129 8.13755 C16.0555 8.24026 16.0774 8.35036 16.0774 8.46154 C16.0774 8.57272 16.0555 8.68281 16.0129 8.78553 C15.9704 8.88824 15.908 8.98158 15.8294 9.06019 Z"
                                                    fill-rule="nonzero" clip-rule="nonzero" fill="rgba(3, 152, 85, 1)"></path>
                                            </svg>
                                        </label>
                                    </p>
                                </div>
                                <div class="pt__row">$100,000</div>
                                <div class="pt__row">$2,000</div>
                                <div class="pt__row"> $25,000 <br />  (Deducted $2,000)</div>
                                <div class="pt__row">$100,000</div>
                                <div class="pt__row"></div>
                                <div class="pt__row"></div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$400</div>
                                <div class="pt__row">$20 per day max of 10 days</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Travel cost plus up $200/day maximum $2,000</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$2,000</div>
                                <div class="pt__row">$5,000</div>
                                <div class="pt__row">$5,000</div>
                                <div class="pt__row">$500 (Lump Sum cash benefit per occurrence/Non-Receipted up to $100)</div>
                                <div class="pt__row">$400</div>
                                <div class="pt__row">$400</div>
                                <div class="pt__row">$250 (Lump Sum cash benefit per occurrence/Non-Receipted up to $100)</div>
                                <div class="pt__row">Up to $2,400 subject to limit $300 for any item</div>
                                <div class="pt__row">Up to $2,400 subject to limit $300 for any item</div>
                                <div class="pt__row">Actual Expense</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row">$250</div>
                                <div class="pt__row"></div>
                                <div class="pt__row more-package-column"><strong><p class="piso-elite-premium"></p></strong></div>
                                <div class="pt__row more-package-column"><strong><p class="dollar-elite-premium"></p></strong></div>
                                <div class="pt__row">
                                    <a class="more-package-select" href="javascript:void(0)" onclick="return false;">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.min.js'></script>
   

