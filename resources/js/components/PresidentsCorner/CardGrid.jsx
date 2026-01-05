import { Link, useNavigate } from "react-router-dom";
import card from "../../assets/images/cover.jpg";

const CardGrid = ({ blog }) => {
    const formatDate = (date) => {
        const options = { year: "numeric", month: "long", day: "numeric" };
        return new Date(date).toLocaleDateString("en-US", options);
    };
    const createdAtDate = formatDate(blog.created_at);
    const navigate = useNavigate();

    return (
        <Link
            to={`/ceos-viewpoint/${blog.blogLink}`}
            className="cursor-pointer hover:text-white transition-colors duration-300 hover:after:content-['Read'] hover:after:absolute hover:after:top-0 hover:after:left-0 hover:after:w-full hover:after:h-full hover:after:bg-[#217B7EB2] hover:after:text-white hover:after:flex hover:after:items-center hover:after:justify-center relative"
        >
            <div class="max-w-sm h-[465px] hidden md:block rounded overflow-hidden border border-[#C0E6E6]">
                <img
                    class="w-full h-[200px] object-cover"
                    src={blog.thumbnailImage}
                    alt="Sunset in the mountains"
                />
                <div class="px-6 py-4">
                    <div class="font-bold text-lg xl:text-[23px] text-[#2D2727] mb-2">
                        {blog.blogName}
                    </div>
                    <p class="text-[#2D2727] text-sm xl:text-base">
                        {blog.summary?.substring(0, 150)}
                    </p>
                </div>
                <div class="px-6 pb-8">
                    <p className="text-xs font-medium text-[#585858]">
                        {createdAtDate}
                    </p>
                </div>
            </div>
            <div className="w-full block md:hidden mb-10">
                <div class="relative flex flex-col md:flex-row w-full bg-white shadow-sm border border-[#C0E6E6] h-[465px]">
                    <div class="relative md:w-1/3 shrink-0 overflow-hidden">
                        <img
                            src={blog.thumbnailImage}
                            alt="card-image"
                            class="w-full h-[200px] object-cover"
                        />
                    </div>
                    <div class="flex flex-col p-4 h-full flex-grow">
                        <h4 class="mb-2 text-[#2D2727] text-lg md:text-[32px] font-bold">
                            {blog.blogName}
                        </h4>
                        <p class="mb-2 text-[#4F5053] text-sm md:text-[23px]">
                            {blog.summary?.substring(0, 150)}
                        </p>
                        <p class="mb-8 text-[#585858] text-xs md:text-[18px] font-medium">
                            {createdAtDate}
                        </p>
                        <div className="text-center mt-auto">
                            <button
                                onClick={() =>
                                    navigate(`/ceos-viewpoint/${blog.blogLink}`)
                                }
                                class="text-[#217B7E] text-[16px]"
                            >
                                Read
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </Link>
    );
};

export default CardGrid;
