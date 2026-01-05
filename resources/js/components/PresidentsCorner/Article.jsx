import { Link } from "react-router-dom";
import card from "../../assets/images/card.png";
import cover from "../../assets/images/cover.jpg";

const Article = ({ article }) => {
    return (
        <Link
            to={`/ceos-viewpoint/${article.blogLink}`}
            className="cursor-pointer"
        >
            <div className="flex justify-between border-b border-[#D7DEE3] pb-5 md:px-5 mb-5 gap-3">
                <div className="flex flex-col space-y-2 md:space-y-4 basis-2/3 order-1 md:order-0">
                    <p className="font-bold text-[#1D1D1D]">
                        {article.blogName}
                    </p>
                    <p className="flex space-x-1 md:space-x-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            className="hidden md:block"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill="#848A90"
                                d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"
                            />
                            <path
                                fill="#848A90"
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"
                            />
                        </svg>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="14"
                            height="14"
                            fill="currentColor"
                            className="block md:hidden"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill="#848A90"
                                d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"
                            />
                            <path
                                fill="#848A90"
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"
                            />
                        </svg>
                        <span className="text-[#848A90] font-bold text-xs md:text-base">
                            {article.views} views
                        </span>
                    </p>
                    <button className="block md:hidden text-start underline text-[#217B7E] font-medium underline-offset-2">
                        Read
                    </button>
                </div>
                <div className="flex basis-1/3 order-0 md:order-1">
                    <img
                        src={article.thumbnailImage}
                        className="w-[200px] h-auto md:h-[100px]"
                        alt=""
                    />
                </div>
            </div>
        </Link>
    );
};

export default Article;
