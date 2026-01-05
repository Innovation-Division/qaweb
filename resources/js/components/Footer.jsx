import { useState } from "react";
import logo from "../assets/images/logo_white.png";
import { Link } from "react-router-dom";

const Footer = () => {
    const [svgColor, setSvgColor] = useState({
        facebook: "#007a70",
        twitter: "#007a70",
        instagram: "#007a70",
        viber: "#007a70",
        tiktok: "#007a70",
    });

    const [isAboutOpen, setIsAboutOpen] = useState(false);
    const [isProductOpen, setIsProductOpen] = useState(false);
    const [isServicesOpen, setIsServicesOpen] = useState(false);
    const [isInquiriesOpen, setIsInquiriesOpen] = useState(false);

    const toggleAbout = () => {
        setIsAboutOpen(!isAboutOpen);
        setIsProductOpen(false);
        setIsServicesOpen(false);
        setIsInquiriesOpen(false);
    };

    const toggleProduct = () => {
        setIsProductOpen(!isProductOpen);
        setIsAboutOpen(false);
        setIsServicesOpen(false);
        setIsInquiriesOpen(false);
    };

    const toggleServices = () => {
        setIsServicesOpen(!isServicesOpen);
        setIsAboutOpen(false);
        setIsProductOpen(false);
        setIsInquiriesOpen(false);
    };

    const toggleInquiries = () => {
        setIsInquiriesOpen(!isInquiriesOpen);
        setIsAboutOpen(false);
        setIsProductOpen(false);
        setIsServicesOpen(false);
    };

    return (
        <footer className="text-left w-full">
            <div className="flex items-start justify-center bg-[#2a2a2a] w-full">
                <div className="flex flex-col md:flex-row gap-5 max-w-[1380px] md:px-10">
                    <div className="flex md:hidden w-full">
                        <ul className="flex flex-col gap-5 w-full text-[#008080] text-lg font-semibold">
                            <li className="border-b border-[#008080] p-5 pr-2">
                                <button
                                    href="javascript:void(0)"
                                    className="flex justify-between w-full"
                                    onClick={toggleAbout}
                                >
                                    <span>About</span>
                                    <span>
                                        {isAboutOpen ? (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                class="bi bi-chevron-down"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        ) : (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                className="bi bi-chevron-right"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        )}
                                    </span>
                                </button>
                                {isAboutOpen && (
                                    <ul className=" text-white flex flex-col gap-3 mt-4">
                                        <li className="font-normal text-sm">
                                            <a href="/our-company">
                                                Our Company
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/our-milestone">
                                                Our Milestones
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/our-financial-performance">
                                                Our Financial Performance
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/our-team">Our Team</a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/corporate-governance">
                                                Corporate Governance
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <Link to="/president-corner">
                                                President's Corner
                                            </Link>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/updates">
                                                News and Updates
                                            </a>
                                        </li>
                                    </ul>
                                )}
                            </li>
                            <li className="border-b border-[#008080] p-5 pt-0 pr-2">
                                <button
                                    href="javascript:void(0)"
                                    className="flex justify-between w-full"
                                    onClick={toggleProduct}
                                >
                                    <span>Products</span>
                                    <span>
                                        {isProductOpen ? (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                class="bi bi-chevron-down"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        ) : (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                className="bi bi-chevron-right"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        )}
                                    </span>
                                </button>
                                {isProductOpen && (
                                    <ul className=" text-white flex flex-col gap-3 mt-4">
                                        <li className="font-normal text-sm">
                                            <a href="/pet-furtect-pet-insurance">
                                                Pet Furtect
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/covid-19-assist-plus">
                                                COVID-19 Assist+
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/auto-excel-plus-insurance">
                                                Auto Excel Plus
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/pro-tech-computer-insurance">
                                                Pro-Tech
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/home-excel-plus-insurance">
                                                Home Excel Plus
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/condo-excel-plus-insurance">
                                                Condo Excel Plus
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/probiz-excel-plus-insurance">
                                                ProBiz Excel Plus
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/travel-excel-plus-insurance">
                                                Travel Excel Plus
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/product-lines">
                                                Product Lines
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/excel-plus-packages">
                                                Excel Plus Packages
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/microinsurance">
                                                Microinsurance
                                            </a>
                                        </li>
                                    </ul>
                                )}
                            </li>
                            <li className="border-b border-[#008080] p-5 pt-0 pr-2">
                                <button
                                    href="javascript:void(0)"
                                    className="flex justify-between w-full"
                                    onClick={toggleServices}
                                >
                                    <span>Services</span>
                                    <span>
                                        {isServicesOpen ? (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                class="bi bi-chevron-down"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        ) : (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                className="bi bi-chevron-right"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        )}
                                    </span>
                                </button>
                                {isServicesOpen && (
                                    <ul className=" text-white flex flex-col gap-3 mt-4">
                                        <li className="font-normal text-sm">
                                            <a href="/file-a-claim">
                                                File a Claim
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/road-pal-rescue">
                                                BiyaHelp Mobile App
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/gawa-agad">Gawa Agad</a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/trip-sagip">Trip Sagip</a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/payment-facilities">
                                                Payment Facilities
                                            </a>
                                        </li>
                                    </ul>
                                )}
                            </li>
                            <li className="border-b border-[#008080] p-5 pt-0 pr-2">
                                <button
                                    href="javascript:void(0)"
                                    className="flex justify-between w-full"
                                    onClick={toggleInquiries}
                                >
                                    <span>Inquiries</span>
                                    <span>
                                        {isInquiriesOpen ? (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                class="bi bi-chevron-down"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        ) : (
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="32"
                                                height="32"
                                                fill="currentColor"
                                                className="bi bi-chevron-right"
                                                viewBox="0 0 16 16"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    fillRule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                                />
                                            </svg>
                                        )}
                                    </span>
                                </button>
                                {isInquiriesOpen && (
                                    <ul className=" text-white flex flex-col gap-3 mt-4">
                                        <li className="font-normal text-sm">
                                            <a href="/be-a-partner">
                                                Become A Partner
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/faqs">FAQs</a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/send-inquiry">
                                                Send Inquiry
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/property">
                                                Properties for Sale
                                            </a>
                                        </li>
                                        <li className="font-normal text-sm">
                                            <a href="/careers">Careers</a>
                                        </li>
                                    </ul>
                                )}
                            </li>
                            <li className="self-center">
                                <ul className="flex gap-4">
                                    <li>
                                        <a
                                            href="https://www.facebook.com/cocogenofficial"
                                            onMouseEnter={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    facebook: "#db3e8d",
                                                }))
                                            }
                                            onMouseLeave={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    facebook: "#007a70",
                                                }))
                                            }
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="33.957"
                                                height="33.751"
                                                viewBox="0 0 33.957 33.751"
                                            >
                                                <g
                                                    id="Icon_awesome-facebook"
                                                    data-name="Icon awesome-facebook"
                                                    transform="translate(-0.563 -0.563)"
                                                    fill="none"
                                                    stroke-linejoin="round"
                                                >
                                                    <path
                                                        d="M34.519,17.541A16.978,16.978,0,1,0,14.888,34.314V22.449H10.575V17.541h4.313V13.8c0-4.255,2.533-6.605,6.413-6.605a26.129,26.129,0,0,1,3.8.331V11.7H22.96a2.454,2.454,0,0,0-2.767,2.652v3.187H24.9l-.753,4.908H20.194V34.314A16.985,16.985,0,0,0,34.519,17.541Z"
                                                        stroke="none"
                                                    />
                                                    <path
                                                        d="M 22.69379615783691 31.07497024536133 C 24.92071723937988 30.22525596618652 26.92523574829102 28.82779884338379 28.50761604309082 26.99398231506348 C 30.77219581604004 24.36956214904785 32.01935577392578 21.01240158081055 32.01935577392578 17.54092216491699 C 32.01935577392578 13.67249202728271 30.51363563537598 10.03633213043213 27.77957534790039 7.302272319793701 C 27.70832061767578 7.231017112731934 27.63627815246582 7.160430431365967 27.56381034851074 7.090848922729492 C 27.58880805969238 7.232637405395508 27.6017951965332 7.378165245056152 27.6017951965332 7.526392459869385 L 27.6017951965332 11.70253276824951 C 27.6017951965332 13.08324241638184 26.48250579833984 14.20253276824951 25.1017951965332 14.20253276824951 L 22.96032524108887 14.20253276824951 C 22.84712982177734 14.20253276824951 22.76189994812012 14.20986366271973 22.70030784606934 14.21868705749512 C 22.69645690917969 14.25613784790039 22.69379615783691 14.30129146575928 22.69379615783691 14.35404205322266 L 22.69379615783691 15.04092216491699 L 24.9025764465332 15.04092216491699 C 25.63182640075684 15.04092216491699 26.32471656799316 15.35934257507324 26.7996654510498 15.91272258758545 C 27.27461624145508 16.46610260009766 27.48425674438477 17.19927215576172 27.37365531921387 17.92008209228516 L 26.62057685852051 22.82808303833008 C 26.43337631225586 24.0481128692627 25.38379669189453 24.94892311096191 24.14949607849121 24.94892311096191 L 22.69379615783691 24.94892311096191 L 22.69379615783691 31.07497024536133 M 12.38804626464844 31.07497024536133 L 12.38804626464844 24.94892311096191 L 10.57497596740723 24.94892311096191 C 9.194266319274902 24.94892311096191 8.074975967407227 23.82963180541992 8.074975967407227 22.44892311096191 L 8.074975967407227 17.54092216491699 C 8.074975967407227 16.16021156311035 9.194266319274902 15.04092216491699 10.57497596740723 15.04092216491699 L 12.38804626464844 15.04092216491699 L 12.38804626464844 13.80019283294678 C 12.38804626464844 8.269021987915039 15.88651561737061 4.695042610168457 21.30082511901855 4.695042610168457 C 22.57792663574219 4.695042610168457 23.87100791931152 4.832144260406494 24.68399620056152 4.938848972320557 C 22.53062438964844 3.71417760848999 20.08619499206543 3.062502384185791 17.54092597961426 3.062502384185791 C 13.67249584197998 3.062502384185791 10.03633594512939 4.568212509155273 7.302276134490967 7.302272319793701 C 4.568215847015381 10.03633213043213 3.062495946884155 13.67249202728271 3.062495946884155 17.54092216491699 C 3.062495946884155 21.01240158081055 4.309656143188477 24.36956214904785 6.574235916137695 26.99398231506348 C 8.156615257263184 28.82779884338379 10.1611270904541 30.22525405883789 12.38804626464844 31.07497024536133 M 20.19379615783691 34.31396102905273 L 20.19379615783691 22.44892311096191 L 24.14949607849121 22.44892311096191 L 24.9025764465332 17.54092216491699 L 20.19379615783691 17.54092216491699 L 20.19379615783691 14.35404205322266 C 20.19379615783691 13.01151275634766 20.85171508789062 11.70253276824951 22.96032524108887 11.70253276824951 L 25.1017951965332 11.70253276824951 L 25.1017951965332 7.526392459869385 C 25.1017951965332 7.526392459869385 23.15886688232422 7.195042610168457 21.30082511901855 7.195042610168457 C 17.42111587524414 7.195042610168457 14.88804626464844 9.545312881469727 14.88804626464844 13.80019283294678 L 14.88804626464844 17.54092216491699 L 10.57497596740723 17.54092216491699 L 10.57497596740723 22.44892311096191 L 14.88804626464844 22.44892311096191 L 14.88804626464844 34.31396102905273 C 6.771265983581543 33.03921127319336 0.5624960064888 26.01507186889648 0.5624960064888 17.54092216491699 C 0.5624960064888 8.161712646484375 8.161715507507324 0.5625024437904358 17.54092597961426 0.5625024437904358 C 26.92013549804688 0.5625024437904358 34.51935577392578 8.161712646484375 34.51935577392578 17.54092216491699 C 34.51935577392578 26.01507186889648 28.31058692932129 33.03921127319336 20.19379615783691 34.31396102905273 Z"
                                                        stroke="none"
                                                        fill={svgColor.facebook}
                                                    />
                                                </g>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://twitter.com/cocogenofficial"
                                            onMouseEnter={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    twitter: "#db3e8d",
                                                }))
                                            }
                                            onMouseLeave={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    twitter: "#007a70",
                                                }))
                                            }
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="38.812"
                                                height="32.528"
                                                viewBox="0 0 38.812 32.528"
                                            >
                                                <path
                                                    id="Icon_feather-twitter"
                                                    data-name="Icon feather-twitter"
                                                    d="M37.312,4.5A17.743,17.743,0,0,1,32.2,6.992a7.293,7.293,0,0,0-12.794,4.883V13.5A17.352,17.352,0,0,1,4.756,6.129s-6.511,14.65,8.139,21.161A18.948,18.948,0,0,1,1.5,30.546c14.65,8.139,32.556,0,32.556-18.72a7.325,7.325,0,0,0-.13-1.351A12.567,12.567,0,0,0,37.312,4.5Z"
                                                    transform="translate(0 -2.86)"
                                                    fill="none"
                                                    stroke={svgColor.twitter}
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="3"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.instagram.com/cocogenofficial/"
                                            onMouseEnter={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    instagram: "#db3e8d",
                                                }))
                                            }
                                            onMouseLeave={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    instagram: "#007a70",
                                                }))
                                            }
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="35.01"
                                                height="35.002"
                                                viewBox="0 0 35.01 35.002"
                                            >
                                                <path
                                                    id="Icon_awesome-instagram"
                                                    data-name="Icon awesome-instagram"
                                                    d="M17.5,10.765a8.974,8.974,0,1,0,8.974,8.974A8.96,8.96,0,0,0,17.5,10.765Zm0,14.809a5.834,5.834,0,1,1,5.834-5.834A5.845,5.845,0,0,1,17.5,25.573ZM28.938,10.4A2.093,2.093,0,1,1,26.845,8.3,2.088,2.088,0,0,1,28.938,10.4Zm5.944,2.124c-.133-2.8-.773-5.288-2.827-7.334S27.525,2.5,24.721,2.361c-2.89-.164-11.552-.164-14.442,0-2.8.133-5.28.773-7.334,2.82S.258,9.71.118,12.514c-.164,2.89-.164,11.552,0,14.442.133,2.8.773,5.288,2.827,7.334s4.53,2.687,7.334,2.827c2.89.164,11.552.164,14.442,0,2.8-.133,5.288-.773,7.334-2.827s2.687-4.53,2.827-7.334c.164-2.89.164-11.544,0-14.434ZM31.149,30.057a5.907,5.907,0,0,1-3.327,3.327c-2.3.914-7.771.7-10.318.7s-8.021.2-10.318-.7a5.907,5.907,0,0,1-3.327-3.327c-.914-2.3-.7-7.771-.7-10.318s-.2-8.021.7-10.318A5.907,5.907,0,0,1,7.186,6.094c2.3-.914,7.771-.7,10.318-.7s8.021-.2,10.318.7a5.907,5.907,0,0,1,3.327,3.327c.914,2.3.7,7.771.7,10.318S32.062,27.76,31.149,30.057Z"
                                                    transform="translate(0.005 -2.238)"
                                                    fill={svgColor.instagram}
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://invite.viber.com/?g2=AQBOkTEQZAOpkUvvgcnfGVcbiFpw7zfAts3GvB7LSZnW3p0tPKz%2BcXPCugT8WbDC&lang=en"
                                            onMouseEnter={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    viber: "#db3e8d",
                                                }))
                                            }
                                            onMouseLeave={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    viber: "#007a70",
                                                }))
                                            }
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="34.142"
                                                height="36.004"
                                                viewBox="0 0 34.142 36.004"
                                            >
                                                <path
                                                    id="Icon_awesome-viber"
                                                    data-name="Icon awesome-viber"
                                                    d="M31.219,3.509C30.326,2.686,26.712.063,18.654.028c0,0-9.5-.57-14.126,3.677C1.955,6.279,1.048,10.055.949,14.73S.731,28.167,9.176,30.544h.007l-.007,3.628s-.056,1.47.914,1.765c1.167.366,1.856-.752,2.974-1.955.612-.661,1.455-1.631,2.1-2.37a32.673,32.673,0,0,0,10.723-.788c1.167-.38,7.77-1.223,8.838-9.984,1.111-9.042-.534-14.752-3.5-17.332ZM32.2,20.18c-.907,7.313-6.258,7.777-7.242,8.093a30.229,30.229,0,0,1-9.225.788s-3.656,4.409-4.8,5.555c-.373.373-.78.338-.773-.4,0-.485.028-6.026.028-6.026h0C3.03,26.205,3.452,18.745,3.53,14.843s.816-7.1,3-9.253c3.916-3.551,11.981-3.023,11.981-3.023,6.813.028,10.076,2.081,10.835,2.77,2.51,2.152,3.79,7.3,2.855,14.843ZM22.423,14.5a.454.454,0,0,1-.907.042,2.174,2.174,0,0,0-2.292-2.384.454.454,0,0,1,.049-.907A3.057,3.057,0,0,1,22.423,14.5Zm1.427.795c.07-2.981-1.793-5.316-5.33-5.576a.455.455,0,0,1,.063-.907c4.078.3,6.251,3.1,6.173,6.5a.454.454,0,0,1-.907-.021Zm3.3.942a.454.454,0,0,1-.907.007c-.042-5.73-3.86-8.852-8.494-8.887a.454.454,0,0,1,0-.907C22.936,6.483,27.105,10.062,27.155,16.235Zm-.795,6.9v.014c-.759,1.336-2.18,2.813-3.642,2.341l-.014-.021a27.027,27.027,0,0,1-7.186-3.973,18.382,18.382,0,0,1-2.981-2.981,22.817,22.817,0,0,1-2.166-3.277A21.01,21.01,0,0,1,8.543,11.32c-.471-1.462,1-2.883,2.341-3.642H10.9a1.28,1.28,0,0,1,1.68.274s.872,1.041,1.245,1.554c.352.478.823,1.245,1.069,1.673a1.468,1.468,0,0,1-.26,1.87l-.844.675a1.237,1.237,0,0,0-.373.984s1.252,4.732,5.927,5.927a1.237,1.237,0,0,0,.984-.373L21,19.42a1.468,1.468,0,0,1,1.87-.26,18.218,18.218,0,0,1,3.22,2.313,1.256,1.256,0,0,1,.267,1.659Z"
                                                    transform="translate(-0.927 -0.003)"
                                                    fill={svgColor.viber}
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.tiktok.com/@cocogenofficial"
                                            onMouseEnter={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    tiktok: "#db3e8d",
                                                }))
                                            }
                                            onMouseLeave={() =>
                                                setSvgColor((prev) => ({
                                                    ...prev,
                                                    tiktok: "#007a70",
                                                }))
                                            }
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="30.239"
                                                height="34.506"
                                                viewBox="0 0 30.239 34.506"
                                            >
                                                <path
                                                    id="Icon_simple-tiktok"
                                                    data-name="Icon simple-tiktok"
                                                    d="M17.2.027C18.974,0,20.735.014,22.5,0a8.436,8.436,0,0,0,2.37,5.648,9.551,9.551,0,0,0,5.742,2.424V13.53a14.5,14.5,0,0,1-5.688-1.314,16.733,16.733,0,0,1-2.194-1.26c-.014,3.955.014,7.909-.027,11.851a10.345,10.345,0,0,1-1.828,5.336,10.09,10.09,0,0,1-8,4.347A9.875,9.875,0,0,1,7.34,31.1,10.213,10.213,0,0,1,2.4,23.363c-.027-.677-.041-1.354-.014-2.018A10.2,10.2,0,0,1,14.207,12.3c.027,2-.054,4.009-.054,6.013a4.647,4.647,0,0,0-5.932,2.871,5.373,5.373,0,0,0-.19,2.181,4.609,4.609,0,0,0,4.74,3.887,4.55,4.55,0,0,0,3.752-2.181,3.125,3.125,0,0,0,.555-1.436c.135-2.424.081-4.835.095-7.259.014-5.458-.014-10.9.027-16.347Z"
                                                    transform="translate(-1.369 1)"
                                                    fill="none"
                                                    stroke={svgColor.tiktok}
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div className="flex md:basis-2/5 w-full">
                        <div className="flex flex-col items-center bg-[#008080] space-y-5 md:space-y-8 p-8">
                            <img
                                onClick={() => (window.location.href = "/")}
                                src={logo}
                                alt="logo"
                                className="w-[300px] mb-7"
                            />
                            <ul className="flex flex-col text-white gap-5">
                                <li className="flex space-x-3">
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                        >
                                            <g
                                                id="Group_174"
                                                data-name="Group 174"
                                                transform="translate(-5 -2)"
                                            >
                                                <path
                                                    fill="#fff"
                                                    id="Path_14"
                                                    data-name="Path 14"
                                                    d="M12,2A7,7,0,0,0,5,9c0,5.25,7,13,7,13s7-7.75,7-13A7,7,0,0,0,12,2ZM7,9A5,5,0,0,1,17,9c0,2.88-2.88,7.19-5,9.88C9.92,16.21,7,11.85,7,9Z"
                                                />
                                                <circle
                                                    fill="#fff"
                                                    id="Ellipse_1"
                                                    data-name="Ellipse 1"
                                                    cx="2.5"
                                                    cy="2.5"
                                                    r="2.5"
                                                    transform="translate(9.5 6.5)"
                                                />
                                            </g>
                                        </svg>
                                    </span>
                                    <span className="text-xs lg:text-sm">
                                        <a href="https://maps.app.goo.gl/bqTmPjU84MAwkCbH8">
                                            Address: 22F One Corporate Center,
                                            Doña Julia Vargas Ave., cor. Meralco
                                            Ave. Ortigas Center, Pasig City 1600
                                        </a>
                                    </span>
                                </li>
                                <li className="flex space-x-3">
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill="#fff"
                                                id="Path_20"
                                                data-name="Path 20"
                                                d="M11.99,2A10,10,0,1,0,22,12,10,10,0,0,0,11.99,2ZM12,20A8,8,0,0,1,12,4a8.126,8.126,0,0,1,6.65,3.55A7.725,7.725,0,0,1,20,12,8,8,0,0,1,12,20Zm.5-13H11v6l5.25,3.15L17,14.92l-4.5-2.67Z"
                                                transform="translate(-2 -2)"
                                            />
                                        </svg>
                                    </span>
                                    <span className="text-xs lg:text-sm">
                                        Office hours: Mon-Fri: 8:00 AM - 5:00 PM{" "}
                                        <br />
                                        Chat hours: Mon-Sun: 6:00 AM - 12:00 MN{" "}
                                        <br />
                                        *with exception on holidays
                                    </span>
                                </li>
                                <li className="flex space-x-3">
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill="#fff"
                                                id="Path_12"
                                                data-name="Path 12"
                                                d="M8,16h8v2H8Zm0-4h8v2H8ZM14,2H6A2.006,2.006,0,0,0,4,4V20a2,2,0,0,0,1.99,2H18a2.006,2.006,0,0,0,2-2V8Zm4,18H6V4h7V9h5Z"
                                                transform="translate(-4 -2)"
                                            />
                                        </svg>
                                    </span>
                                    <span className="text-xs lg:text-sm">
                                        License number: 2022/26-R
                                    </span>
                                </li>
                                <li className="flex space-x-3">
                                    <span>
                                        <svg
                                            id="Group_23"
                                            data-name="Group 23"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20.3"
                                            height="17.4"
                                            viewBox="0 0 20.3 17.4"
                                        >
                                            <g
                                                id="Group_22"
                                                data-name="Group 22"
                                            >
                                                <path
                                                    fill="#fff"
                                                    id="Path_21"
                                                    data-name="Path 21"
                                                    d="M11.8,6c-.986,0-5.626.74-5.785,5.626a6.523,6.523,0,0,0,4.93-5.09,6.424,6.424,0,0,0,6.424,3.77A5.756,5.756,0,0,0,11.8,6Z"
                                                    transform="translate(-1.645 -3.1)"
                                                />
                                                <circle
                                                    fill="#fff"
                                                    id="Ellipse_2"
                                                    data-name="Ellipse 2"
                                                    cx="1.087"
                                                    cy="1.087"
                                                    r="1.087"
                                                    transform="translate(5.438 8.7)"
                                                />
                                                <circle
                                                    fill="#fff"
                                                    id="Ellipse_3"
                                                    data-name="Ellipse 3"
                                                    cx="1.087"
                                                    cy="1.087"
                                                    r="1.087"
                                                    transform="translate(12.688 8.7)"
                                                />
                                                <path
                                                    fill="#fff"
                                                    id="Path_22"
                                                    data-name="Path 22"
                                                    d="M21.85,12.7a8.7,8.7,0,0,0-17.4,0A1.454,1.454,0,0,0,3,14.15v2.9A1.454,1.454,0,0,0,4.45,18.5H5.9V12.7a7.25,7.25,0,1,1,14.5,0v7.25H11.7V21.4h8.7a1.454,1.454,0,0,0,1.45-1.45V18.5a1.454,1.454,0,0,0,1.45-1.45v-2.9A1.454,1.454,0,0,0,21.85,12.7Z"
                                                    transform="translate(-3 -4)"
                                                />
                                            </g>
                                        </svg>
                                    </span>
                                    <span className="text-xs lg:text-sm">
                                        Hotline:
                                        &#40;&#48;&#50;&#41;&#32;&#56;&#56;&#51;&#48;&#45;&#54;&#48;&#48;&#48;
                                    </span>
                                </li>
                                <li className="flex space-x-3">
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 18 18"
                                        >
                                            <path
                                                fill="#fff"
                                                id="Path_18"
                                                data-name="Path 18"
                                                class="cls-1"
                                                d="M6.54,5a12.312,12.312,0,0,0,.45,2.59l-1.2,1.2A14.826,14.826,0,0,1,5.03,5H6.54M16.4,17.02a12.753,12.753,0,0,0,2.6.45v1.49a15.426,15.426,0,0,1-3.8-.75l1.2-1.19M7.5,3H4A1,1,0,0,0,3,4,17,17,0,0,0,20,21a1,1,0,0,0,1-1V16.51a1,1,0,0,0-1-1,11.407,11.407,0,0,1-3.57-.57.839.839,0,0,0-.31-.05,1.024,1.024,0,0,0-.71.29l-2.2,2.2a15.149,15.149,0,0,1-6.59-6.59l2.2-2.2a1,1,0,0,0,.25-1.02A11.36,11.36,0,0,1,8.5,4,1,1,0,0,0,7.5,3Z"
                                                transform="translate(-3 -3)"
                                            />
                                        </svg>
                                    </span>
                                    <span className="text-xs lg:text-sm">
                                        Trunkline:
                                        &#40;&#48;&#50;&#41;&#32;&#56;&#56;&#49;&#49;&#45;&#49;&#55;&#56;&#56;
                                    </span>
                                </li>
                                <li className="flex space-x-3 mb-8">
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="16"
                                            viewBox="0 0 20 16"
                                        >
                                            <path
                                                fill="#fff"
                                                id="Path_16"
                                                data-name="Path 16"
                                                class="cls-1"
                                                d="M22,6a2.006,2.006,0,0,0-2-2H4A2.006,2.006,0,0,0,2,6V18a2.006,2.006,0,0,0,2,2H20a2.006,2.006,0,0,0,2-2ZM20,6l-8,4.99L4,6Zm0,12H4V8l8,5,8-5Z"
                                                transform="translate(-2 -4)"
                                            />
                                        </svg>
                                    </span>
                                    <span className="text-xs lg:text-sm">
                                        Email:
                                        &#099;&#108;&#105;&#101;&#110;&#116;&#095;&#115;&#101;&#114;&#118;&#105;&#099;&#101;&#115;&#064;&#099;&#111;&#099;&#111;&#103;&#101;&#110;&#046;&#099;&#111;&#109;
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div className="hidden md:flex flex-col basis-3/5 w-full">
                        <div className="flex flex-col md:flex-row items-start w-full md:gap-5 lg:gap-20 mb-5">
                            <div className="flex flex-col md:items-start items-center w-full pt-12">
                                <h2 className="font-semibold text-white mb-4 text-base lg:text-lg">
                                    ABOUT
                                </h2>
                                <ul className="flex md:flex-col w-full justify-between text-xs lg:text-sm text-white md:space-y-3">
                                    <li>
                                        <a
                                            href="/our-company"
                                            className="hover:underline"
                                        >
                                            Our Company
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/our-milestone"
                                            className="hover:underline"
                                        >
                                            Our Milestones
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/our-financial-performance"
                                            className="hover:underline"
                                        >
                                            Our Financial Performance
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/our-team"
                                            className="hover:underline"
                                        >
                                            Our Team
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/corporate-governance"
                                            className="hover:underline"
                                        >
                                            Corporate Governance
                                        </a>
                                    </li>
                                    <li>
                                        <Link
                                            to="/presidents-corner"
                                            className="hover:underline"
                                        >
                                            President's Corner
                                        </Link>
                                    </li>
                                    <li>
                                        <a
                                            href="/updates"
                                            className="hover:underline"
                                        >
                                            News and Updates
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div className="flex flex-col md:items-start items-center w-full pt-12">
                                <h2 className="font-semibold text-white mb-4 text-base lg:text-lg">
                                    PRODUCTS
                                </h2>
                                <ul className="flex md:flex-col w-full justify-between text-xs lg:text-sm text-white md:space-y-3">
                                    <li>
                                        <a
                                            href="/pet-furtect-pet-insurance"
                                            className="hover:underline"
                                        >
                                            Pet Furtect
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/covid-19-assist-plus"
                                            className="hover:underline"
                                        >
                                            COVID-19 Assist+
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/auto-excel-plus-insurance"
                                            className="hover:underline"
                                        >
                                            Auto Excel Plus
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/pro-tech-computer-insurance"
                                            className="hover:underline"
                                        >
                                            Pro-Tech
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/home-excel-plus-insurance"
                                            className="hover:underline"
                                        >
                                            Home Excel Plus
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/condo-excel-plus-insurance"
                                            className="hover:underline"
                                        >
                                            Condo Excel Plus
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/probiz-excel-plus-insurance"
                                            className="hover:underline"
                                        >
                                            ProBiz Excel Plus
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/travel-excel-plus-insurance"
                                            className="hover:underline"
                                        >
                                            Travel Excel Plus
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/product-lines"
                                            className="hover:underline"
                                        >
                                            Product Lines
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/excel-plus-packages"
                                            className="hover:underline"
                                        >
                                            Excel Plus Packages
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/microinsurance"
                                            className="hover:underline"
                                        >
                                            Microinsurance
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div className="flex flex-col md:items-start items-center w-full pt-12">
                                <h2 className="font-semibold text-white mb-4 text-base lg:text-lg">
                                    SERVICES
                                </h2>
                                <ul className="flex md:flex-col w-full justify-between text-xs lg:text-sm text-white md:space-y-3">
                                    <li>
                                        <a
                                            href="/file-a-claim"
                                            className="hover:underline"
                                        >
                                            File a Claim
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/road-pal"
                                            className="hover:underline"
                                        >
                                            BiyaHelp Mobile App
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/gawa-agad"
                                            className="hover:underline"
                                        >
                                            Gawa Agad
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/trip-sagip"
                                            className="hover:underline"
                                        >
                                            Trip Sagip
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/payment-facilities"
                                            className="hover:underline"
                                        >
                                            Payment Facilities
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div className="flex flex-col md:items-start items-center w-full pt-12">
                                <h2 className="font-semibold text-white mb-4 text-base lg:text-lg">
                                    INQUIRIES
                                </h2>
                                <ul className="flex md:flex-col w-full justify-between text-xs lg:text-sm text-white md:space-y-3">
                                    <li>
                                        <a
                                            href="/be-a-partner"
                                            className="hover:underline"
                                        >
                                            Become A Partner
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/faqs"
                                            className="hover:underline"
                                        >
                                            FAQs
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/send-inquiry"
                                            className="hover:underline"
                                        >
                                            Send Inquiry
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/property"
                                            className="hover:underline"
                                        >
                                            Properties for Sale
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="/careers"
                                            className="hover:underline"
                                        >
                                            Careers
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="flex items-end justify-end mb-5">
                            <ul className="flex gap-4">
                                <li>
                                    <a
                                        href="https://www.facebook.com/cocogenofficial"
                                        onMouseEnter={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                facebook: "#db3e8d",
                                            }))
                                        }
                                        onMouseLeave={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                facebook: "#007a70",
                                            }))
                                        }
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="33.957"
                                            height="33.751"
                                            viewBox="0 0 33.957 33.751"
                                        >
                                            <g
                                                id="Icon_awesome-facebook"
                                                data-name="Icon awesome-facebook"
                                                transform="translate(-0.563 -0.563)"
                                                fill="none"
                                                stroke-linejoin="round"
                                            >
                                                <path
                                                    d="M34.519,17.541A16.978,16.978,0,1,0,14.888,34.314V22.449H10.575V17.541h4.313V13.8c0-4.255,2.533-6.605,6.413-6.605a26.129,26.129,0,0,1,3.8.331V11.7H22.96a2.454,2.454,0,0,0-2.767,2.652v3.187H24.9l-.753,4.908H20.194V34.314A16.985,16.985,0,0,0,34.519,17.541Z"
                                                    stroke="none"
                                                />
                                                <path
                                                    d="M 22.69379615783691 31.07497024536133 C 24.92071723937988 30.22525596618652 26.92523574829102 28.82779884338379 28.50761604309082 26.99398231506348 C 30.77219581604004 24.36956214904785 32.01935577392578 21.01240158081055 32.01935577392578 17.54092216491699 C 32.01935577392578 13.67249202728271 30.51363563537598 10.03633213043213 27.77957534790039 7.302272319793701 C 27.70832061767578 7.231017112731934 27.63627815246582 7.160430431365967 27.56381034851074 7.090848922729492 C 27.58880805969238 7.232637405395508 27.6017951965332 7.378165245056152 27.6017951965332 7.526392459869385 L 27.6017951965332 11.70253276824951 C 27.6017951965332 13.08324241638184 26.48250579833984 14.20253276824951 25.1017951965332 14.20253276824951 L 22.96032524108887 14.20253276824951 C 22.84712982177734 14.20253276824951 22.76189994812012 14.20986366271973 22.70030784606934 14.21868705749512 C 22.69645690917969 14.25613784790039 22.69379615783691 14.30129146575928 22.69379615783691 14.35404205322266 L 22.69379615783691 15.04092216491699 L 24.9025764465332 15.04092216491699 C 25.63182640075684 15.04092216491699 26.32471656799316 15.35934257507324 26.7996654510498 15.91272258758545 C 27.27461624145508 16.46610260009766 27.48425674438477 17.19927215576172 27.37365531921387 17.92008209228516 L 26.62057685852051 22.82808303833008 C 26.43337631225586 24.0481128692627 25.38379669189453 24.94892311096191 24.14949607849121 24.94892311096191 L 22.69379615783691 24.94892311096191 L 22.69379615783691 31.07497024536133 M 12.38804626464844 31.07497024536133 L 12.38804626464844 24.94892311096191 L 10.57497596740723 24.94892311096191 C 9.194266319274902 24.94892311096191 8.074975967407227 23.82963180541992 8.074975967407227 22.44892311096191 L 8.074975967407227 17.54092216491699 C 8.074975967407227 16.16021156311035 9.194266319274902 15.04092216491699 10.57497596740723 15.04092216491699 L 12.38804626464844 15.04092216491699 L 12.38804626464844 13.80019283294678 C 12.38804626464844 8.269021987915039 15.88651561737061 4.695042610168457 21.30082511901855 4.695042610168457 C 22.57792663574219 4.695042610168457 23.87100791931152 4.832144260406494 24.68399620056152 4.938848972320557 C 22.53062438964844 3.71417760848999 20.08619499206543 3.062502384185791 17.54092597961426 3.062502384185791 C 13.67249584197998 3.062502384185791 10.03633594512939 4.568212509155273 7.302276134490967 7.302272319793701 C 4.568215847015381 10.03633213043213 3.062495946884155 13.67249202728271 3.062495946884155 17.54092216491699 C 3.062495946884155 21.01240158081055 4.309656143188477 24.36956214904785 6.574235916137695 26.99398231506348 C 8.156615257263184 28.82779884338379 10.1611270904541 30.22525405883789 12.38804626464844 31.07497024536133 M 20.19379615783691 34.31396102905273 L 20.19379615783691 22.44892311096191 L 24.14949607849121 22.44892311096191 L 24.9025764465332 17.54092216491699 L 20.19379615783691 17.54092216491699 L 20.19379615783691 14.35404205322266 C 20.19379615783691 13.01151275634766 20.85171508789062 11.70253276824951 22.96032524108887 11.70253276824951 L 25.1017951965332 11.70253276824951 L 25.1017951965332 7.526392459869385 C 25.1017951965332 7.526392459869385 23.15886688232422 7.195042610168457 21.30082511901855 7.195042610168457 C 17.42111587524414 7.195042610168457 14.88804626464844 9.545312881469727 14.88804626464844 13.80019283294678 L 14.88804626464844 17.54092216491699 L 10.57497596740723 17.54092216491699 L 10.57497596740723 22.44892311096191 L 14.88804626464844 22.44892311096191 L 14.88804626464844 34.31396102905273 C 6.771265983581543 33.03921127319336 0.5624960064888 26.01507186889648 0.5624960064888 17.54092216491699 C 0.5624960064888 8.161712646484375 8.161715507507324 0.5625024437904358 17.54092597961426 0.5625024437904358 C 26.92013549804688 0.5625024437904358 34.51935577392578 8.161712646484375 34.51935577392578 17.54092216491699 C 34.51935577392578 26.01507186889648 28.31058692932129 33.03921127319336 20.19379615783691 34.31396102905273 Z"
                                                    stroke="none"
                                                    fill={svgColor.facebook}
                                                />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://twitter.com/cocogenofficial"
                                        onMouseEnter={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                twitter: "#db3e8d",
                                            }))
                                        }
                                        onMouseLeave={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                twitter: "#007a70",
                                            }))
                                        }
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="38.812"
                                            height="32.528"
                                            viewBox="0 0 38.812 32.528"
                                        >
                                            <path
                                                id="Icon_feather-twitter"
                                                data-name="Icon feather-twitter"
                                                d="M37.312,4.5A17.743,17.743,0,0,1,32.2,6.992a7.293,7.293,0,0,0-12.794,4.883V13.5A17.352,17.352,0,0,1,4.756,6.129s-6.511,14.65,8.139,21.161A18.948,18.948,0,0,1,1.5,30.546c14.65,8.139,32.556,0,32.556-18.72a7.325,7.325,0,0,0-.13-1.351A12.567,12.567,0,0,0,37.312,4.5Z"
                                                transform="translate(0 -2.86)"
                                                fill="none"
                                                stroke={svgColor.twitter}
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="3"
                                            />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/cocogenofficial/"
                                        onMouseEnter={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                instagram: "#db3e8d",
                                            }))
                                        }
                                        onMouseLeave={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                instagram: "#007a70",
                                            }))
                                        }
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="35.01"
                                            height="35.002"
                                            viewBox="0 0 35.01 35.002"
                                        >
                                            <path
                                                id="Icon_awesome-instagram"
                                                data-name="Icon awesome-instagram"
                                                d="M17.5,10.765a8.974,8.974,0,1,0,8.974,8.974A8.96,8.96,0,0,0,17.5,10.765Zm0,14.809a5.834,5.834,0,1,1,5.834-5.834A5.845,5.845,0,0,1,17.5,25.573ZM28.938,10.4A2.093,2.093,0,1,1,26.845,8.3,2.088,2.088,0,0,1,28.938,10.4Zm5.944,2.124c-.133-2.8-.773-5.288-2.827-7.334S27.525,2.5,24.721,2.361c-2.89-.164-11.552-.164-14.442,0-2.8.133-5.28.773-7.334,2.82S.258,9.71.118,12.514c-.164,2.89-.164,11.552,0,14.442.133,2.8.773,5.288,2.827,7.334s4.53,2.687,7.334,2.827c2.89.164,11.552.164,14.442,0,2.8-.133,5.288-.773,7.334-2.827s2.687-4.53,2.827-7.334c.164-2.89.164-11.544,0-14.434ZM31.149,30.057a5.907,5.907,0,0,1-3.327,3.327c-2.3.914-7.771.7-10.318.7s-8.021.2-10.318-.7a5.907,5.907,0,0,1-3.327-3.327c-.914-2.3-.7-7.771-.7-10.318s-.2-8.021.7-10.318A5.907,5.907,0,0,1,7.186,6.094c2.3-.914,7.771-.7,10.318-.7s8.021-.2,10.318.7a5.907,5.907,0,0,1,3.327,3.327c.914,2.3.7,7.771.7,10.318S32.062,27.76,31.149,30.057Z"
                                                transform="translate(0.005 -2.238)"
                                                fill={svgColor.instagram}
                                            />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://invite.viber.com/?g2=AQBOkTEQZAOpkUvvgcnfGVcbiFpw7zfAts3GvB7LSZnW3p0tPKz%2BcXPCugT8WbDC&lang=en"
                                        onMouseEnter={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                viber: "#db3e8d",
                                            }))
                                        }
                                        onMouseLeave={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                viber: "#007a70",
                                            }))
                                        }
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="34.142"
                                            height="36.004"
                                            viewBox="0 0 34.142 36.004"
                                        >
                                            <path
                                                id="Icon_awesome-viber"
                                                data-name="Icon awesome-viber"
                                                d="M31.219,3.509C30.326,2.686,26.712.063,18.654.028c0,0-9.5-.57-14.126,3.677C1.955,6.279,1.048,10.055.949,14.73S.731,28.167,9.176,30.544h.007l-.007,3.628s-.056,1.47.914,1.765c1.167.366,1.856-.752,2.974-1.955.612-.661,1.455-1.631,2.1-2.37a32.673,32.673,0,0,0,10.723-.788c1.167-.38,7.77-1.223,8.838-9.984,1.111-9.042-.534-14.752-3.5-17.332ZM32.2,20.18c-.907,7.313-6.258,7.777-7.242,8.093a30.229,30.229,0,0,1-9.225.788s-3.656,4.409-4.8,5.555c-.373.373-.78.338-.773-.4,0-.485.028-6.026.028-6.026h0C3.03,26.205,3.452,18.745,3.53,14.843s.816-7.1,3-9.253c3.916-3.551,11.981-3.023,11.981-3.023,6.813.028,10.076,2.081,10.835,2.77,2.51,2.152,3.79,7.3,2.855,14.843ZM22.423,14.5a.454.454,0,0,1-.907.042,2.174,2.174,0,0,0-2.292-2.384.454.454,0,0,1,.049-.907A3.057,3.057,0,0,1,22.423,14.5Zm1.427.795c.07-2.981-1.793-5.316-5.33-5.576a.455.455,0,0,1,.063-.907c4.078.3,6.251,3.1,6.173,6.5a.454.454,0,0,1-.907-.021Zm3.3.942a.454.454,0,0,1-.907.007c-.042-5.73-3.86-8.852-8.494-8.887a.454.454,0,0,1,0-.907C22.936,6.483,27.105,10.062,27.155,16.235Zm-.795,6.9v.014c-.759,1.336-2.18,2.813-3.642,2.341l-.014-.021a27.027,27.027,0,0,1-7.186-3.973,18.382,18.382,0,0,1-2.981-2.981,22.817,22.817,0,0,1-2.166-3.277A21.01,21.01,0,0,1,8.543,11.32c-.471-1.462,1-2.883,2.341-3.642H10.9a1.28,1.28,0,0,1,1.68.274s.872,1.041,1.245,1.554c.352.478.823,1.245,1.069,1.673a1.468,1.468,0,0,1-.26,1.87l-.844.675a1.237,1.237,0,0,0-.373.984s1.252,4.732,5.927,5.927a1.237,1.237,0,0,0,.984-.373L21,19.42a1.468,1.468,0,0,1,1.87-.26,18.218,18.218,0,0,1,3.22,2.313,1.256,1.256,0,0,1,.267,1.659Z"
                                                transform="translate(-0.927 -0.003)"
                                                fill={svgColor.viber}
                                            />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.tiktok.com/@cocogenofficial"
                                        onMouseEnter={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                tiktok: "#db3e8d",
                                            }))
                                        }
                                        onMouseLeave={() =>
                                            setSvgColor((prev) => ({
                                                ...prev,
                                                tiktok: "#007a70",
                                            }))
                                        }
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="30.239"
                                            height="34.506"
                                            viewBox="0 0 30.239 34.506"
                                        >
                                            <path
                                                id="Icon_simple-tiktok"
                                                data-name="Icon simple-tiktok"
                                                d="M17.2.027C18.974,0,20.735.014,22.5,0a8.436,8.436,0,0,0,2.37,5.648,9.551,9.551,0,0,0,5.742,2.424V13.53a14.5,14.5,0,0,1-5.688-1.314,16.733,16.733,0,0,1-2.194-1.26c-.014,3.955.014,7.909-.027,11.851a10.345,10.345,0,0,1-1.828,5.336,10.09,10.09,0,0,1-8,4.347A9.875,9.875,0,0,1,7.34,31.1,10.213,10.213,0,0,1,2.4,23.363c-.027-.677-.041-1.354-.014-2.018A10.2,10.2,0,0,1,14.207,12.3c.027,2-.054,4.009-.054,6.013a4.647,4.647,0,0,0-5.932,2.871,5.373,5.373,0,0,0-.19,2.181,4.609,4.609,0,0,0,4.74,3.887,4.55,4.55,0,0,0,3.752-2.181,3.125,3.125,0,0,0,.555-1.436c.135-2.424.081-4.835.095-7.259.014-5.458-.014-10.9.027-16.347Z"
                                                transform="translate(-1.369 1)"
                                                fill="none"
                                                stroke={svgColor.tiktok}
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                            />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div className="flex items-center justify-center mt-5 mb-1">
                <ul className="flex flex-wrap items-center justify-center gap-1 md:gap-2 text-[#008080] text-[11px] md:text-base px-3">
                    <li className="pr-1 md:pr-2 border-r border-[#008080] hover:text-[#db3e8d]">
                        <a href="/terms-and-conditions">Terms and Conditions</a>
                    </li>

                    <li className="pr-1 md:pr-2 border-r border-[#008080] hover:text-[#db3e8d]">
                        <a href="/customer-charter">Customer Charter</a>
                    </li>

                    <li className="pr-1 md:pr-2 border-r border-[#008080] hover:text-[#db3e8d]">
                        <a href="/internet-security">Internet Security</a>
                    </li>

                    <li className="pr-1 md:pr-2 border-r border-[#008080] hover:text-[#db3e8d]">
                        <a href="/data-privacy">Data Privacy</a>
                    </li>

                    <li className="hover:text-[#db3e8d]">
                        <a href="/sitemap">Sitemap</a>
                    </li>
                </ul>
            </div>
            <p className="text-center mb-7 text-[11px] md:text-base">
                Copyright &copy; {new Date().getFullYear()} Cocogen Insurance,
                Inc
            </p>
        </footer>
    );
};

export default Footer;
