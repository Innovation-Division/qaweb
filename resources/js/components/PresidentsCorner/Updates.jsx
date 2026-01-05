import { useEffect, useState } from "react";
import card from "../../assets/images/cover.jpg";
import CardGrid from "./CardGrid";
import axios from "axios";
import { Link } from "react-router-dom";
import nosearch from "../../assets/images/nosearch.png";

const Updates = ({
    search,
    setSearch,
    isVisibleSuggested,
    setIsVisibleSuggested,
    blogs,
    handleNextPage,
    handlePreviousPage,
    currentPage,
    lastPage,
}) => {
    const formatDate = (date) => {
        const options = { year: "numeric", month: "long", day: "numeric" };
        return new Date(date).toLocaleDateString("en-US", options);
    };

    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <div className="flex flex-col items-center w-full px-4 md:px-20 lg:px-20 xl:px-28 2xl:px-52">
            <div className="flex flex-col md:flex-row justify-between md:items-center w-full mb-8">
                <div className="flex mb-5 md:mb-0">
                    <p className="font-bold text-lg md:text-2xl lg:text-3xl">
                        Updates
                    </p>
                </div>
                <div className="flex">
                    <div className="group relative dropdown">
                        <input
                            type="text"
                            value={search}
                            onChange={(e) => setSearch(e.target.value)}
                            className="group pl-16 pr-20 md:pl-12 md:pr-4 md:py-3 border border-[#C0E6E6] rounded-full md:rounded-2xl placeholder:text-[#BBBBBB] focus:bg-[#F0FFFF] focus:border-none focus:ring-0 w-full"
                            placeholder="Search by date, article, title"
                        />
                        <div
                            className="absolute inset-y-0 left-0 pl-5
                        flex items-center
                        pointer-events-none"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-search"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#008080"
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                                />
                            </svg>
                        </div>
                        {isVisibleSuggested && (
                            <div class="dropdown-menu absolute h-auto z-30">
                                <ul class="top-0 w-[360px] md:w-72 bg-white shadow">
                                    {blogs.length > 0 ? (
                                        <li class="py-3 px-3  text-[#808080]">
                                            Suggested articles
                                        </li>
                                    ) : (
                                        <li class="py-3 px-5  text-[#808080] flex items-center gap-4">
                                            <span>
                                                <svg
                                                    width="14"
                                                    height="14"
                                                    viewBox="0 0 14 14"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M9.68871 5.35375L8.04184 7L9.68871 8.64625C9.73517 8.69271 9.77202 8.74786 9.79716 8.80855C9.8223 8.86925 9.83524 8.9343 9.83524 9C9.83524 9.0657 9.8223 9.13075 9.79716 9.19145C9.77202 9.25214 9.73517 9.30729 9.68871 9.35375C9.64226 9.40021 9.58711 9.43705 9.52641 9.4622C9.46572 9.48734 9.40066 9.50028 9.33496 9.50028C9.26927 9.50028 9.20421 9.48734 9.14352 9.4622C9.08282 9.43705 9.02767 9.40021 8.98121 9.35375L7.33496 7.70687L5.68871 9.35375C5.64226 9.40021 5.58711 9.43705 5.52641 9.4622C5.46572 9.48734 5.40066 9.50028 5.33496 9.50028C5.26927 9.50028 5.20421 9.48734 5.14352 9.4622C5.08282 9.43705 5.02767 9.40021 4.98121 9.35375C4.93476 9.30729 4.89791 9.25214 4.87277 9.19145C4.84763 9.13075 4.83469 9.0657 4.83469 9C4.83469 8.9343 4.84763 8.86925 4.87277 8.80855C4.89791 8.74786 4.93476 8.69271 4.98121 8.64625L6.62809 7L4.98121 5.35375C4.88739 5.25993 4.83469 5.13268 4.83469 5C4.83469 4.86732 4.88739 4.74007 4.98121 4.64625C5.07503 4.55243 5.20228 4.49972 5.33496 4.49972C5.46765 4.49972 5.59489 4.55243 5.68871 4.64625L7.33496 6.29313L8.98121 4.64625C9.02767 4.59979 9.08282 4.56294 9.14352 4.5378C9.20421 4.51266 9.26927 4.49972 9.33496 4.49972C9.40066 4.49972 9.46572 4.51266 9.52641 4.5378C9.58711 4.56294 9.64226 4.59979 9.68871 4.64625C9.73517 4.6927 9.77202 4.74786 9.79716 4.80855C9.8223 4.86925 9.83524 4.9343 9.83524 5C9.83524 5.0657 9.8223 5.13075 9.79716 5.19145C9.77202 5.25214 9.73517 5.3073 9.68871 5.35375ZM13.835 7C13.835 8.28558 13.4537 9.54229 12.7395 10.6112C12.0253 11.6801 11.0101 12.5132 9.82241 13.0052C8.63469 13.4972 7.32775 13.6259 6.06688 13.3751C4.806 13.1243 3.64781 12.5052 2.73877 11.5962C1.82973 10.6872 1.21066 9.52896 0.95986 8.26809C0.709056 7.00721 0.837777 5.70028 1.32975 4.51256C1.82172 3.32484 2.65484 2.30968 3.72376 1.59545C4.79268 0.881218 6.04939 0.5 7.33496 0.5C9.05831 0.50182 10.7106 1.18722 11.9291 2.40582C13.1477 3.62441 13.8331 5.27665 13.835 7ZM12.835 7C12.835 5.9122 12.5124 4.84883 11.908 3.94436C11.3037 3.03989 10.4447 2.33494 9.43972 1.91866C8.43473 1.50238 7.32886 1.39346 6.26197 1.60568C5.19507 1.8179 4.21507 2.34172 3.44588 3.11091C2.67669 3.8801 2.15286 4.86011 1.94064 5.927C1.72843 6.9939 1.83734 8.09977 2.25363 9.10476C2.66991 10.1098 3.37486 10.9687 4.27933 11.5731C5.1838 12.1774 6.24717 12.5 7.33496 12.5C8.79315 12.4983 10.1911 11.9184 11.2222 10.8873C12.2533 9.85617 12.8333 8.45818 12.835 7Z"
                                                        fill="#808080"
                                                    />
                                                </svg>
                                            </span>
                                            <span> Article not found</span>
                                        </li>
                                    )}

                                    {blogs.map((blog, index) => {
                                        if (index < 3) {
                                            return (
                                                <li
                                                    key={index}
                                                    class="flex gap-4 items-center py-3 px-3 hover:bg-[#F0FFFF] text-[#3B3B3B]"
                                                >
                                                    <span>
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="14"
                                                            height="14"
                                                            fill="currentColor"
                                                            class="bi bi-search"
                                                            viewBox="0 0 16 16"
                                                        >
                                                            <path
                                                                fill="#008080"
                                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"
                                                            />
                                                        </svg>
                                                    </span>
                                                    <p
                                                        class=" cursor-pointer"
                                                        onClick={async () => {
                                                            await setSearch(
                                                                blog.blogName
                                                            );

                                                            await setIsVisibleSuggested(
                                                                false
                                                            );
                                                        }}
                                                    >
                                                        {blog.blogName}
                                                    </p>
                                                </li>
                                            );
                                        }
                                    })}
                                </ul>
                            </div>
                        )}
                    </div>
                </div>
            </div>
            {blogs[0] && (
                <>
                    <div className="hidden md:block w-full mb-10">
                        <div class="flex flex-col md:flex-row w-full bg-white shadow-sm border border-[#C0E6E6]">
                            <div class="relative md:w-1/3 shrink-0 overflow-hidden">
                                <img
                                    src={blogs[0]?.thumbnailImage}
                                    alt="card-image"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                            <div class="p-4">
                                <h4 class="mb-2 text-[#2D2727] text-[25px] lg:text-[32px] font-bold">
                                    {blogs[0]?.blogName}
                                </h4>
                                <p class="mb-2 text-[#4F5053] text-[18px] lg:text-[23px]">
                                    {blogs[0]?.summary?.substring(0, 150)}
                                </p>
                                <p class="mb-8 text-[#585858] text-base lg:text-[18px] font-medium">
                                    {formatDate(blogs[0]?.created_at)}
                                </p>
                                <div className="ml-5">
                                    <Link
                                        to={`/ceos-viewpoint/${blogs[0]?.blogLink}`}
                                        onClick={() => {
                                            console.log(blogs[0]?.blogLink);
                                        }}
                                        class="text-[#217B7E] text-[18px] font-medium"
                                    >
                                        Read
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="w-full block md:hidden mb-10">
                        <div class="relative flex flex-col md:flex-row w-full bg-white shadow-sm border border-[#C0E6E6] h-[465px]">
                            <div class="relative md:w-1/3 shrink-0 overflow-hidden">
                                <img
                                    src={blogs[0]?.thumbnailImage}
                                    alt="card-image"
                                    class="w-full h-[200px] object-cover"
                                />
                            </div>
                            <div class="flex flex-col p-4 h-full flex-grow">
                                <h4 class="mb-2 text-[#2D2727] text-lg md:text-[32px] font-bold">
                                    {blogs[0]?.blogName}
                                </h4>
                                <p class="mb-2 text-[#4F5053] text-sm md:text-[23px]">
                                    {blogs[0]?.summary?.substring(0, 150)}
                                </p>
                                <p class="mb-8 text-[#585858] text-xs md:text-[18px] font-medium">
                                    {formatDate(blogs[0]?.created_at)}
                                </p>
                                <div className="text-center mt-auto">
                                    <Link
                                        to={`/ceos-viewpoint/${blogs[0]?.blogLink}`}
                                        class="text-[#217B7E] text-[16px] font-medium"
                                    >
                                        Read
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </>
            )}
            {blogs.length > 0 ? (
                <>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 w-full mb-20">
                        {blogs.map((blog, index) => {
                            if (index !== 0) {
                                return <CardGrid key={index} blog={blog} />;
                            }
                        })}
                    </div>
                    <div className="flex justify-center items-center w-full space-x-8 mb-20">
                        <div>
                            <button onClick={handlePreviousPage}>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-arrow-left-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill={`${
                                            currentPage === 1
                                                ? "#C0E6E6"
                                                : "#008080"
                                        }`}
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <p className="font-medium text-[#585858]">
                                <span>{currentPage}</span> of{" "}
                                <span>{lastPage}</span>
                            </p>
                        </div>
                        <div>
                            <button onClick={handleNextPage}>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-arrow-right-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill={`${
                                            currentPage === lastPage
                                                ? "#C0E6E6"
                                                : "#008080"
                                        }`}
                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </>
            ) : (
                <div className="flex flex-col mb-20">
                    <img src={nosearch} className="mb-5" alt="" />
                    <button
                        className="text-[#217B7E] font-medium mb-10"
                        onClick={() => setSearch("")}
                    >
                        Show all updates
                    </button>
                </div>
            )}
        </div>
    );
};

export default Updates;
