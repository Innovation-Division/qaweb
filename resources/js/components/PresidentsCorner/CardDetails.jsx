import React, { useEffect, useState } from "react";
import cover from "../../assets/images/cover.jpg";
import pres from "../../assets/images/pres.png";
import tree from "../../assets/images/tree-left.svg";
import dots from "../../assets/images/2dots.svg";
import { Link, useNavigate, useParams } from "react-router-dom";
import axios from "axios";
import Article from "./Article";

const CardDetails = () => {
    const { id } = useParams();
    const { navigate } = useNavigate();
    const [blog, setBlog] = useState({});
    const [articles, setArticles] = useState([]);
    const [showButton, setShowButton] = useState(false);
    const [showModal, setShowModal] = useState(false);
    const [url, setUrl] = useState(window.location.href);
    const [copyUrl, setCopyUrl] = useState(false);

    const handleAddView = async () => {
        await axios.post(`/api/add-view/${id}`);
    };

    const handleFetchData = async () => {
        const res = await axios.get(`/api/get-blog/${id}`);

        setBlog(res.data);
    };

    const handleFetchArticles = async () => {
        const res = await axios.get(`/api/get-articles/${id}`);

        setArticles(res.data);
    };

    const formatDate = (date) => {
        const options = { year: "numeric", month: "long", day: "numeric" };
        return new Date(date).toLocaleDateString("en-US", options);
    };

    const handleScrollToTop = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    };

    useEffect(() => {
        handleFetchData();
        handleFetchArticles();
        window.scrollTo(0, 0);
        const timeoutId = setTimeout(() => {
            handleAddView();
        }, 20000);

        return () => clearTimeout(timeoutId);
    }, [id]);

    useEffect(() => {
        const handleScroll = () => {
            window.pageYOffset > 400
                ? setShowButton(true)
                : setShowButton(false);
        };

        window.addEventListener("scroll", handleScroll);

        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    });

    function copyText() {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard
                .writeText(url)
                .then(() => {
                    console.log("Text copied to clipboard successfully!");
                    // You might want to show a success message to the user here
                })
                .catch((err) => {
                    console.error("Failed to copy text: ", err);
                    // Handle error, maybe show an alternative copy method or an error message
                });
        } else {
            // Fallback for older browsers or insecure contexts
            fallbackCopyToClipboard(url);
        }
    }

    function fallbackCopyToClipboard(textToCopy) {
        const scrollX = window.scrollX || window.pageXOffset;
        const scrollY = window.scrollY || window.pageYOffset;

        const textArea = document.createElement("textarea");
        textArea.value = textToCopy;
        textArea.style.position = "absolute";
        textArea.style.left = "-999999px"; // Off-screen
        textArea.style.top = "-999999px"; // Also off-screen
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            const successful = document.execCommand("copy");
            const msg = successful ? "successful" : "unsuccessful";
            console.log("Fallback: Copying text command was " + msg);
            // You might want to show a success/failure message here
        } catch (err) {
            console.error("Fallback: Oops, unable to copy", err);
            // Handle error
        }
        document.body.removeChild(textArea);
    }

    return (
        <div className="flex flex-col justify-center items-center max-w-[2000px] mx-auto">
            <ul className="flex flex-wrap bg-[#EFF2F4] p-[15px_35px] mb-5 md:mb-16 gap-3 w-full">
                <li>
                    <Link to="/ceos-viewpoint" className="hover:underline">
                        Ceo's Viewpoint
                    </Link>
                </li>
                <li>{">"}</li>
                <li>
                    <Link
                        to="/ceos-viewpoint"
                        state={{ tab: "updates" }}
                        className="hover:underline"
                    >
                        Updates
                    </Link>
                </li>
                <li>{">"}</li>
                <li className="font-bold text-[#2D2727] leading-6">
                    {blog.breadcrumbsName}
                </li>
            </ul>
            <div className="flex flex-col w-full px-6 md:px-20 lg:px-25 xl:px-40 gap-3">
                <div
                    className="hidden sm:block"
                    style={{
                        backgroundImage: "url(" + tree + ")",
                        width: "200px",
                        height: "200px",
                        backgroundSize: "contain",
                        backgroundRepeat: "no-repeat",
                        backgroundPosition: "left",
                        position: "absolute",
                        top: "250px",
                        left: "-35px",
                    }}
                ></div>
                <div
                    className="hidden sm:block"
                    style={{
                        backgroundImage: "url(" + dots + ")",
                        width: "100px",
                        height: "100px",
                        backgroundSize: "contain",
                        backgroundRepeat: "no-repeat",
                        backgroundPosition: "left",
                        position: "absolute",
                        top: "200px",
                        right: "0",
                    }}
                ></div>

                <div className="flex justify-between items-center">
                    <div className="flex block md:hidden gap-4">
                        <p className="text-sm text-[#6A6F74]">
                            Share this article
                        </p>
                        <button
                            onClick={() => {
                                setShowModal(true);
                                setCopyUrl(false);
                            }}
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                fill="currentColor"
                                className="scale-x-[-1] bi bi-reply"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#008080"
                                    d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z"
                                />
                            </svg>
                        </button>
                        {/* <button>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                fill="currentColor"
                                class="bi bi-envelope"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#008080"
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"
                                />
                            </svg>
                        </button> */}
                    </div>
                </div>

                <div className="flex flex-col lg:flex-row md:gap-20">
                    <div className="flex flex-col md:basis-2/3 w-full gap-5">
                        <div className="flex flex-col gap-2">
                            <p className="font-bold text-lg md:text-[27px] text-[#3A3939]">
                                {blog.blogName}
                            </p>
                            <div className="flex justify-between items-center">
                                <div className="flex gap-3 items-center">
                                    <div
                                        class="bg-top bg-cover h-8 w-8 scale-x-[-1] rounded-full"
                                        style={{
                                            backgroundImage:
                                                "url(" + pres + ")",
                                        }}
                                        title="Woman holding a mug"
                                    ></div>
                                    <p className="text-[#2D2727] font-medium leading-6">
                                        David Roy Padin
                                    </p>
                                    <p className="text-[#848A90] font-medium leading-6">
                                        {formatDate(blog.created_at)}
                                    </p>
                                </div>
                                <div className="items-center hidden md:flex gap-4">
                                    <button
                                        onClick={() => {
                                            setShowModal(true);
                                            setCopyUrl(false);
                                        }}
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="32"
                                            height="32"
                                            fill="currentColor"
                                            className="scale-x-[-1] bi bi-reply"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill="#008080"
                                                d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z"
                                            />
                                        </svg>
                                    </button>
                                    {/* <Link
                                        to="#"
                                        onClick={(e) => {
                                            e.preventDefault();
                                            window.location =
                                                "mailto:yourmail@domain.com";
                                        }}
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="32"
                                            height="32"
                                            fill="currentColor"
                                            class="bi bi-envelope"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill="#008080"
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"
                                            />
                                        </svg>
                                    </Link> */}
                                </div>
                            </div>
                        </div>
                        <img src={blog.mainImage} className="" alt="" />
                        <div className="flex flex-col  gap-8 text-[#2D2727] md:mb-10">
                            <div
                                className="text-[14px] md:text-base leading-6"
                                dangerouslySetInnerHTML={{
                                    __html: blog.content,
                                }}
                            />
                            <div className="flex flex-col md:flex-row bg-[#F0FAFF] justify-center items-center py-8 md:px-5 md:py-5 space-y-4 md:space-y-0 md:space-x-5 mb-8">
                                <p className="font-bold text-[18px] md:text-base text-[#2D2727]">
                                    Ready to protect your digital life?
                                </p>
                                <a
                                    href={
                                        window.location.origin +
                                        "/client-services"
                                    }
                                    className="bg-[#008080] p-[10px_20px] rounded text-white font-medium leading-6"
                                >
                                    Contact us today
                                </a>
                            </div>
                            <Link
                                to={"/ceos-viewpoint"}
                                state={{ tab: "updates" }}
                                className="items-center space-x-4 hidden md:flex hover:underline"
                            >
                                <div className="flex items-center justify-center w-5 h-5 bg-[#E0F5F5] rounded-full">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-chevron-left"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill="#008080"
                                            fill-rule="evenodd"
                                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                                        />
                                    </svg>
                                </div>
                                <p>Back to Updates</p>
                            </Link>
                        </div>
                    </div>
                    <div className="flex flex-col w-full top-40 md:basis-1/3">
                        <div className="sticky top-20 md:mb-52 w-full">
                            <div className="text-[18px] md:text-[23px] text-[#2D2727] font-bold mb-7">
                                Trending Articles
                            </div>
                            {articles.map((article, index) => (
                                <Article key={index} article={article} />
                            ))}
                            {showButton && (
                                <button
                                    onClick={handleScrollToTop}
                                    className="text-[#008080] text-[8px] md:text-base font-bold hidden md:flex float-right flex-col-reverse md:flex-row items-center gap-3 p-2 md:p-5 border border-[#008080] rounded-xl bg-white mb-2"
                                >
                                    <span>Return to top</span>
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-chevron-up"
                                            viewBox="0 0 16 16"
                                            className="w-8 h-8 md:w-6 md:h-6"
                                        >
                                            <path
                                                fill="#008080"
                                                fill-rule="evenodd"
                                                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"
                                            />
                                        </svg>
                                    </span>
                                </button>
                            )}
                            <div className="flex justify-center items-center">
                                <Link
                                    to={"/ceos-viewpoint"}
                                    state={{ tab: "updates" }}
                                    className="flex justify-center w-full md:hidden hover:underline mb-10 gap-2 ml-12"
                                >
                                    <div className="flex items-center justify-center w-5 h-5 bg-[#E0F5F5] rounded-full">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-chevron-left"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill="#008080"
                                                fill-rule="evenodd"
                                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                                            />
                                        </svg>
                                    </div>
                                    <p>Back to Updates</p>
                                </Link>
                                <button
                                    onClick={handleScrollToTop}
                                    className="text-[#008080] text-[8px] md:text-base font-bold flex md:hidden flex-col-reverse md:flex-row items-center gap-3 p-2 w-24 h-20 border border-[#008080] rounded-xl bg-white mb-2"
                                >
                                    <span>Return to top</span>
                                    <span>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-chevron-up"
                                            viewBox="0 0 16 16"
                                            className="w-8 h-8 md:w-6 md:h-6"
                                        >
                                            <path
                                                fill="#008080"
                                                fill-rule="evenodd"
                                                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"
                                            />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class={`fixed z-10 overflow-hidden top-0 w-full left-0 h-full ${
                    !showModal && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
                        &#8203;
                    </span>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-2xl sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="flex items-center justify-between px-4 pt-3">
                            <p className="pt-5 text-[#2D2727] font-bold leading-6">
                                SHARE THIS ARTICLE
                            </p>
                            <button
                                className="absolute top-7 right-5"
                                onClick={() => {
                                    setShowModal(false);
                                }}
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="30"
                                    height="30"
                                    fill="currentColor"
                                    class="bi bi-x"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#1D1D1D"
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="bg-white flex flex-col sm:flex-row items-center justify-between px-4 gap-3 my-5">
                            {/* <input
                                type="text"
                                class="w-full border-none rounded bg-gray-100  basis-4/5"
                            /> */}
                            <div className="relative w-full">
                                <div className="py-3 border-none pl-12 bg-gray-100 w-full text-[#3B3939] font-medium rounded text-wrap break-words">
                                    {url}
                                </div>
                                <div
                                    className="absolute inset-y-0 left-0 pl-5
                        flex items-center
                        pointer-events-none"
                                >
                                    {copyUrl ? (
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-check-circle"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill="#008080"
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                            />
                                            <path
                                                fill="#008080"
                                                d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"
                                            />
                                        </svg>
                                    ) : (
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="20"
                                            height="20"
                                            fill="currentColor"
                                            class="bi bi-link-45deg"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill="#808080"
                                                d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"
                                            />
                                            <path
                                                fill="#808080"
                                                d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"
                                            />
                                        </svg>
                                    )}
                                </div>
                            </div>

                            {copyUrl ? (
                                <p class="bg-white text-[#008080] w-full py-2 basis-1/5 font-medium text-center flex items-center justify-center">
                                    Link Copied!
                                </p>
                            ) : (
                                <button
                                    type="button"
                                    class="bg-[#008080] text-white rounded w-full py-3 basis-1/5 text-sm"
                                    onClick={() => {
                                        setCopyUrl(true);
                                        copyText();
                                    }}
                                >
                                    Copy Link
                                </button>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default CardDetails;
