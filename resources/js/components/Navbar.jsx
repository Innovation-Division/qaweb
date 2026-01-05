import { useEffect, useState } from "react";
import logo from "../assets/images/logo.png";
import { Link, useNavigate } from "react-router-dom";
import MobileNavbar from "./MobileNavbar";

const Navbar = () => {
    const { navigate } = useNavigate();
    const [visible, setVisible] = useState(false);
    const [isSearchOpen, setIsSearchOpen] = useState(false);
    const [searchText, setSearchText] = useState("");

    const handleInputChange = (event) => {
        setSearchText(event.target.value);
    };

    const handleClearInput = () => {
        setSearchText("");
    };

    const toggleSearch = () => {
        setIsSearchOpen(!isSearchOpen);
    };

    const handleSearch = () => {
        window.location.href = `/customsearch?srchterm=${searchText}`;
    };

    // useEffect(() => {
    //     if (visible) {
    //         document.body.style.overflow = "hidden";
    //     } else {
    //         document.body.style.overflow = "auto";
    //     }
    // }, [visible]);

    return (
        <div className="sticky top-0 flex w-full z-[100]">
            <div className="flex items-center justify-center shadow-xl bg-white w-full">
                <div className="flex sm:h-[65px] lg:h-[100px] md:justify-between container max-w-[1800px] mx-auto">
                    <button
                        type="button"
                        className={`flex items-center justify-start xl:hidden basis-1/4 ${
                            visible &&
                            "bg-[#008080] max-w-[67px] h-[75px] ml-0 mr-10"
                        }`}
                        onClick={() => setVisible(!visible)}
                    >
                        {visible ? (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="26"
                                height="26"
                                fill="currentColor"
                                className="bi bi-x-lg m-auto h-full"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#ffffff"
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"
                                />
                            </svg>
                        ) : (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                fill="currentColor"
                                className="bi bi-list ml-4"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
                                />
                            </svg>
                        )}
                    </button>
                    <div className="flex items-center justify-center">
                        <img
                            onClick={() => (window.location.href = "/")}
                            className="cursor-pointer w-[225px] md:w-[300px]"
                            src={logo}
                            alt="logo"
                        />
                    </div>
                    <div className="md:flex hidden xl:hidden basis-1/4 justify-end">
                        <li className="bg-[#db3e8d] h-full flex items-center text-white overflow-hidden px-6">
                            <button className="pt-4 relative group h-full font-semibold text-sm 2xl:text-[20px] text-center  before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-0 before:bg-white before:transition-all before:duration-300 hover:before:h-[93%]">
                                <span className="relative z-20 transition-colors duration-300 group-hover:text-[#db3e8d]">
                                    File a claim
                                </span>
                            </button>
                        </li>
                        <li className="bg-[#008080] h-full flex items-center !ml-0 text-white overflow-hidden px-6">
                            <button className="pt-4 relative group h-full font-semibold text-sm 2xl:text-[20px] text-center  before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-0 before:bg-white before:transition-all before:duration-300 hover:before:h-[93%]">
                                <span className="relative z-20 transition-colors duration-300 group-hover:text-[#008080]">
                                    Get a Quote
                                </span>
                            </button>
                        </li>
                    </div>

                    <div className="hidden xl:flex flex-row-reverse h-full mr-10">
                        <ul className="flex justify-between items-center md:gap-2 lg:gap-3 2xl:gap-4">
                            <li class="group relative dropdown md:px-2 xl:px-4 mt-4">
                                <a
                                    href="javascript:void(0)"
                                    className="font-semibold md:text-base 2xl:text-[20px] pb-1 group-hover:border-b-4 hover:border-b-4 border-[#008080]"
                                >
                                    About
                                </a>
                                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-[100]">
                                    <ul class="top-0 w-60 bg-white shadow mt-3">
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/our-company"
                                                class="block cursor-pointer"
                                            >
                                                Our Company
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/our-milestone"
                                                class="block cursor-pointer"
                                            >
                                                Our Milestones
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/our-financial-performance"
                                                class="block cursor-pointer"
                                            >
                                                Our Financial Performance
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/our-team"
                                                class="block cursor-pointer"
                                            >
                                                Our Team
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/corporate-governance"
                                                class="block cursor-pointer"
                                            >
                                                Corporate Governance
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <Link
                                                to="/presidents-corner"
                                                class="block cursor-pointer"
                                            >
                                                Ceo's Viewpoint
                                            </Link>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/updates"
                                                class="block cursor-pointer"
                                            >
                                                News and Updates
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="group relative dropdown md:px-2 xl:px-4 mt-4">
                                <a
                                    href="javascript:void(0)"
                                    className="font-semibold md:text-base 2xl:text-[20px] pb-1 group-hover:border-b-4 hover:border-b-4 border-[#008080]"
                                >
                                    Products
                                </a>
                                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-[100]">
                                    <ul class="top-0 w-60 bg-white shadow mt-3">
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/product-lines"
                                                class="block cursor-pointer"
                                            >
                                                Product Lines
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/excel-plus-packages"
                                                class="block cursor-pointer"
                                            >
                                                Excel Plus Packages
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/auto-excel-plus-insurance"
                                                class="block cursor-pointer "
                                            >
                                                Auto Excel Plus
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/home-excel-plus-insurance"
                                                class="block  cursor-pointer "
                                            >
                                                Home Excel Plus
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/condo-excel-plus-insurance"
                                                class="block  cursor-pointer "
                                            >
                                                Condo Excel Plus
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/travel-excel-plus-insurance"
                                                class="block  cursor-pointer "
                                            >
                                                Travel Excel Plus
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/microinsurance"
                                                class="block cursor-pointer"
                                            >
                                                Microinsurance
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 text-[#008080]">
                                            <a class="block cursor-default">
                                                Miscellaneous Packages
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/hackguard-personal-cyber-insurance"
                                                class="block  cursor-pointer "
                                            >
                                                Hack Guard
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/pet-furtect-pet-insurance"
                                                class="block  cursor-pointer "
                                            >
                                                Pet Furtect
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/pro-tech-computer-insurance"
                                                class="block  cursor-pointer "
                                            >
                                                Pro-Tech
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="group relative dropdown md:px-2 xl:px-4 mt-4">
                                <a
                                    href="javascript:void(0)"
                                    className="font-semibold md:text-base 2xl:text-[20px] pb-1 group-hover:border-b-4 hover:border-b-4 border-[#008080]"
                                >
                                    Services
                                </a>
                                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-[100]">
                                    <ul class="top-0 w-60 bg-white shadow mt-3">
                                        <li class="py-2 px-3">
                                            <a class="block text-[#008080] cursor-default">
                                                Motor Car Services
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/trip-sagip"
                                                class="block cursor-pointer "
                                            >
                                                Trip Sagip
                                            </a>
                                        </li>
                                        <li class="py-2 hover:bg-[#008080] px-5 text-[#008080] hover:text-white">
                                            <a
                                                href="/gawa-agad"
                                                class="block cursor-pointer "
                                            >
                                                Gawa Agad
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/payment-facilities"
                                                class="block cursor-pointer"
                                            >
                                                Payment Facilities
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="group relative dropdown md:px-2 xl:px-4 mt-4">
                                <a
                                    href="javascript:void(0)"
                                    className="font-semibold md:text-base 2xl:text-[20px] pb-1 group-hover:border-b-4 hover:border-b-4 border-[#008080]"
                                >
                                    Inquiries
                                </a>
                                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-[100]">
                                    <ul class="top-0 w-60 bg-white shadow mt-3">
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/be-a-partner"
                                                class="block cursor-pointer"
                                            >
                                                Become A Partner
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/faqs"
                                                class="block cursor-pointer"
                                            >
                                                FAQs
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/send-inquiry"
                                                class="block cursor-pointer"
                                            >
                                                Send Inquiry
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/property"
                                                class="block cursor-pointer"
                                            >
                                                Properties for Sale
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/careers"
                                                class="block cursor-pointer"
                                            >
                                                Careers
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="group relative dropdown md:px-2 xl:px-4 mt-4">
                                <a
                                    href="javascript:void(0)"
                                    className="font-semibold md:text-base 2xl:text-[20px] pb-1 group-hover:border-b-4 hover:border-b-4 border-[#008080]"
                                >
                                    Contact
                                </a>
                                <div class="group-hover:block dropdown-menu absolute hidden h-auto z-[100]">
                                    <ul class="top-0 w-60 bg-white shadow mt-3">
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/client-services"
                                                class="block cursor-pointer"
                                            >
                                                Client Services
                                            </a>
                                        </li>
                                        <li class="py-2 px-3 hover:bg-[#008080] text-[#008080] hover:text-white">
                                            <a
                                                href="/locate-a-branch"
                                                class="block cursor-pointer"
                                            >
                                                Locate a Branch
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <div className="flex h-full">
                                <li className="bg-[#db3e8d] h-full flex items-center text-white overflow-hidden">
                                    <button
                                        onClick={() =>
                                            (window.location.href =
                                                "/file-a-claim")
                                        }
                                        className="pt-4 relative group h-full font-semibold text-sm 2xl:text-[20px] text-center px-4 before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-0 before:bg-white before:transition-all before:duration-300 hover:before:h-[93%]"
                                    >
                                        <span className="relative z-20 transition-colors duration-300 group-hover:text-[#db3e8d]">
                                            File a claim
                                        </span>
                                    </button>
                                </li>
                                <li className="bg-[#008080] h-full flex items-center text-white overflow-hidden">
                                    <button
                                        onClick={() =>
                                            (window.location.href =
                                                "/get-quote")
                                        }
                                        className="pt-4 relative group h-full font-semibold text-sm 2xl:text-[20px] text-center px-4 before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-0 before:bg-white before:transition-all before:duration-300 hover:before:h-[93%]"
                                    >
                                        <span className="relative z-20 transition-colors duration-300 group-hover:text-[#008080]">
                                            Get a Quote
                                        </span>
                                    </button>
                                </li>
                            </div>

                            <li className="flex items-center mt-4 relative">
                                <button
                                    className={`px-4 ${
                                        isSearchOpen && "py-8  border shadow "
                                    }  bg-white`}
                                    onClick={toggleSearch}
                                >
                                    <svg
                                        id="search_icon"
                                        data-name="search icon"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="32"
                                        height="32"
                                        viewBox="0 0 32.5 32.5"
                                    >
                                        <path
                                            id="Path_2"
                                            data-name="Path 2"
                                            d="M19.927,17.9h-1.07l-.379-.366a8.815,8.815,0,1,0-.948.948l.366.379v1.07l6.771,6.757,2.018-2.018Zm-8.125,0A6.094,6.094,0,1,1,17.9,11.8,6.086,6.086,0,0,1,11.8,17.9Z"
                                            transform="translate(1.063 1.063)"
                                        />
                                    </svg>
                                </button>
                                {isSearchOpen && (
                                    <div className="absolute top-[88px] right-0 mt-2  bg-white rounded-md shadow-md z-10 w-[calc(100vw-4px)] md:w-[400px] py-4 px-4">
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
                                )}
                            </li>
                            <li className="m-0 mt-4">
                                <a
                                    href="/login"
                                    className="flex items-center gap-2 "
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="26"
                                        height="26"
                                        viewBox="0 0 25.317 22.153"
                                    >
                                        <path
                                            id="Icon_open-account-login"
                                            data-name="Icon open-account-login"
                                            d="M9.494,0V3.165H22.153V18.988H9.494v3.165H25.317V0Zm3.165,6.329V9.494H0v3.165H12.659v3.165l6.329-4.747Z"
                                        />
                                    </svg>
                                    <span className="font-semibold text-sm 2xl:text-[20px]">
                                        Sign In
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <MobileNavbar visible={visible} setVisible={setVisible} />
                </div>
            </div>
        </div>
    );
};

export default Navbar;
