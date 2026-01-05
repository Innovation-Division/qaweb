import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";

const MobileNavbar = ({ visible, setVisible }) => {
    const [aboutVisible, setAboutVisible] = useState(false);
    const [productsVisible, setProductsVisible] = useState(false);
    const [servicesVisible, setServicesVisible] = useState(false);
    const [inquiriesVisible, setInquiriesVisible] = useState(false);
    const [contactVisible, setContactVisible] = useState(false);
    const [searchVisible, setSearchVisible] = useState(false);
    const [searchText, setSearchText] = useState("");

    const handleInputChange = (event) => {
        setSearchText(event.target.value);
    };

    const handleClearInput = () => {
        setSearchText("");
    };

    const handleSearch = () => {
        window.location.href = `/customsearch?srchterm=${searchText}`;
    };

    useEffect(() => {
        if (!visible) {
            setAboutVisible(false);
            setProductsVisible(false);
            setServicesVisible(false);
            setInquiriesVisible(false);
            setContactVisible(false);
            setSearchVisible(false);
        }
    }, [visible]);
    return (
        <>
            <div
                className={`fixed top-[77px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    visible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        onClick={() => setAboutVisible(true)}
                        href="javascript:void(0)"
                    >
                        <span>About</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-right"
                                viewBox="0 0 16 16"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    fill-rule="evenodd"
                                    stroke="#008080"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        onClick={() => setProductsVisible(true)}
                        href="javascript:void(0)"
                    >
                        <span>Products</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-right"
                                viewBox="0 0 16 16"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    fill-rule="evenodd"
                                    stroke="#008080"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        onClick={() => setServicesVisible(true)}
                        href="javascript:void(0)"
                    >
                        <span>Services</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-right"
                                viewBox="0 0 16 16"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    fill-rule="evenodd"
                                    stroke="#008080"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        onClick={() => setInquiriesVisible(true)}
                        href="javascript:void(0)"
                    >
                        <span>Inquiries</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-right"
                                viewBox="0 0 16 16"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    fill-rule="evenodd"
                                    stroke="#008080"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        onClick={() => setContactVisible(true)}
                        href="javascript:void(0)"
                    >
                        <span>Contact</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-right"
                                viewBox="0 0 16 16"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    fill-rule="evenodd"
                                    stroke="#008080"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        onClick={() => setSearchVisible(true)}
                        href="javascript:void(0)"
                    >
                        <span>Search</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-search"
                                viewBox="0 0 16 16"
                                stroke="currentColor"
                                stroke-width="1.5"
                            >
                                <path
                                    fill="#008080"
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                                />
                            </svg>
                        </span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-4 border-b border-[#008080] text-[#008080] font-semibold text-[17px] pt-5"
                        href="/login"
                    >
                        <span>Sign In</span>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 25.317 22.153"
                            >
                                <path
                                    fill="#008080"
                                    id="Icon_open-account-login"
                                    data-name="Icon open-account-login"
                                    d="M9.494,0V3.165H22.153V18.988H9.494v3.165H25.317V0Zm3.165,6.329V9.494H0v3.165H12.659v3.165l6.329-4.747Z"
                                />
                            </svg>
                        </span>
                    </a>
                    <div className="flex justify-center gap-5 pt-5">
                        <button
                            className="text-white bg-[#008080] text-lg p-[8px_20px_11px] rounded-full"
                            onClick={() =>
                                (window.location.href = "/file-a-claim")
                            }
                        >
                            File a Claim
                        </button>
                        <button
                            className="text-white bg-[#db3e8d] text-lg p-[8px_20px_11px] rounded-full"
                            onClick={() =>
                                (window.location.href = "/get-quote")
                            }
                        >
                            Get a Quote
                        </button>
                    </div>
                </div>
            </div>
            <div
                className={`fixed top-[75px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    aboutVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex items-center gap-2 py-2 px-5  text-[#008080] text-[17px] pt-5"
                        onClick={() => setAboutVisible(false)}
                        href="javascript:void(0)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-chevron-left"
                            viewBox="0 0 16 16"
                            stroke="currentColor"
                            stroke-width="1.2"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            />
                        </svg>
                        <span>Back</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 bg-[#008080]  text-white font-bold text-[17px] pt-6"
                        href="javascript:void(0)"
                    >
                        <span>About</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/our-company"
                    >
                        <span>Our Company</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/our-milestone"
                    >
                        <span>Our Milestones</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/our-financial-performance"
                    >
                        <span>Our Financial Performance</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/our-team"
                    >
                        <span>Our team</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/corporate-governance"
                    >
                        <span>Corporate Governance</span>
                    </a>
                    <Link
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        to="/presidents-corner"
                    >
                        <span>President's Corner</span>
                    </Link>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/updates"
                    >
                        <span>News and Updates</span>
                    </a>
                </div>
            </div>
            <div
                className={`fixed top-[75px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    productsVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex items-center gap-2 py-2 px-5  text-[#008080] text-[17px] pt-5"
                        onClick={() => setProductsVisible(false)}
                        href="javascript:void(0)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-chevron-left"
                            viewBox="0 0 16 16"
                            stroke="currentColor"
                            stroke-width="1.2"
                        >
                            <path
                                strokeWidth="2"
                                fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            />
                        </svg>
                        <span>Back</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 bg-[#008080]  text-white font-bold text-[17px] pt-6"
                        href="javascript:void(0)"
                    >
                        <span>Products</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/product-lines"
                    >
                        <span>Product Lines</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/excel-plus-packages"
                    >
                        <span>Excel Plus Packages</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/auto-excel-plus-insurance"
                    >
                        <span>Auto Excel Plus</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/home-excel-plus-insurance"
                    >
                        <span>Home Excel Plus</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/condo-excel-plus-insurance"
                    >
                        <span>Condo Excel Plus</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/travel-excel-plus-insurance"
                    >
                        <span>Travel Excel Plus</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/microinsurance"
                    >
                        <span>Microinsurance</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="javascript:void(0)"
                    >
                        <span>Miscellaneous Packages</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/hackguard-personal-cyber-insurance"
                    >
                        <span>Hackguard</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/pet-furtect-pet-insurance"
                    >
                        <span>Pet Furtech</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/pro-tech-computer-insurance"
                    >
                        <span>Pro-Tech</span>
                    </a>
                </div>
            </div>
            <div
                className={`fixed top-[75px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    servicesVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex items-center gap-2 py-2 px-5  text-[#008080] text-[17px] pt-5"
                        onClick={() => setServicesVisible(false)}
                        href="javascript:void(0)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-chevron-left"
                            viewBox="0 0 16 16"
                            stroke="currentColor"
                            stroke-width="1.2"
                        >
                            <path
                                strokeWidth="2"
                                fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            />
                        </svg>
                        <span>Back</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 bg-[#008080]  text-white font-bold text-[17px] pt-6"
                        href="javascript:void(0)"
                    >
                        <span>Services</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="javascript:void(0)"
                    >
                        <span>Motor Car Services</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10  text-[#008080] text-[17px] pt-2"
                        href="/trip-sagip"
                    >
                        <span>Trip Sagip</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-10 text-[#008080] text-[17px] pt-2"
                        href="/gawa-agad"
                    >
                        <span>Gawa Agad</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/payment-facilities"
                    >
                        <span>Payment Facilities</span>
                    </a>
                </div>
            </div>
            <div
                className={`fixed top-[75px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    inquiriesVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex items-center gap-2 py-2 px-5  text-[#008080] text-[17px] pt-5"
                        onClick={() => setInquiriesVisible(false)}
                        href="javascript:void(0)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-chevron-left"
                            viewBox="0 0 16 16"
                            stroke="currentColor"
                            stroke-width="1.2"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            />
                        </svg>
                        <span>Back</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 bg-[#008080]  text-white font-bold text-[17px] pt-6"
                        href="javascript:void(0)"
                    >
                        <span>Inquiries</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/be-a-partner"
                    >
                        <span>Become a Partner</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/faqs"
                    >
                        <span>FAQs</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/send-inquiry"
                    >
                        <span>Send Inquiry</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/property"
                    >
                        <span>Properties for Sale</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 text-[#008080] text-[17px] pt-2"
                        href="/careers"
                    >
                        <span>Careers</span>
                    </a>
                </div>
            </div>
            <div
                className={`fixed top-[75px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    contactVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex items-center gap-2 py-2 px-5  text-[#008080] text-[17px] pt-5"
                        onClick={() => setContactVisible(false)}
                        href="javascript:void(0)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-chevron-left"
                            viewBox="0 0 16 16"
                            stroke="currentColor"
                            stroke-width="1.2"
                        >
                            <path
                                strokeWidth="2"
                                fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            />
                        </svg>
                        <span>Back</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 bg-[#008080]  text-white font-bold text-[17px] pt-6"
                        href="javascript:void(0)"
                    >
                        <span>Contact</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/client-services"
                    >
                        <span>Client Services</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5  text-[#008080] text-[17px] pt-2"
                        href="/locate-a-branch"
                    >
                        <span>Locate a Branch</span>
                    </a>
                </div>
            </div>
            <div
                className={`fixed top-[75px] right-0 bottom-0 overflow-y-auto bg-white transition-all z-[999] ${
                    searchVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                <div className="flex flex-col text-gray-600">
                    <a
                        className="flex items-center gap-2 py-2 px-5  text-[#008080] text-[17px] pt-5"
                        onClick={() => setSearchVisible(false)}
                        href="javascript:void(0)"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-chevron-left"
                            viewBox="0 0 16 16"
                            stroke="currentColor"
                            stroke-width="1.2"
                        >
                            <path
                                strokeWidth="2"
                                fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            />
                        </svg>
                        <span>Back</span>
                    </a>
                    <a
                        className="flex justify-between py-2 px-5 bg-[#008080]  text-white font-bold text-[17px] pt-6"
                        href="javascript:void(0)"
                    >
                        <span>Search</span>
                    </a>
                    <div className="px-5">
                        <div className="flex items-center border-b border-gray-300 py-3">
                            <input
                                type="text"
                                placeholder="What are you looking for?"
                                className="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:ring-0 focus:outline-none"
                                value={searchText}
                                onChange={handleInputChange}
                            />
                            {searchText && (
                                <button
                                    type="button"
                                    className="mr-2 focus:outline-none cursor-pointer"
                                    onClick={handleClearInput}
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        class="bi bi-x"
                                        viewBox="0 0 16 16"
                                    >
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </button>
                            )}
                            <button
                                onClick={handleSearch}
                                className="bg-[#db3e8d] text-white font-semibold py-2 px-4 rounded-full focus:outline-none"
                                type="button"
                            >
                                Go
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default MobileNavbar;
