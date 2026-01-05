import { useEffect, useState } from "react";
import pres from "../../assets/images/pres.png";
import { Link } from "react-router-dom";

const Home = () => {
    const [blogs, setBlogs] = useState([]);

    const fetchBlogs = async () => {
        try {
            const res = await axios.get("/api/get-data");

            setBlogs(res.data.data);
        } catch (error) {
            console.error("Error fetching blogs:", error);
        }
    };

    useEffect(() => {
        fetchBlogs();
    }, []);
    return (
        <div className="flex flex-col">
            <div className="flex flex-col px-1 md:px-20 lg:px-20 xl:px-28 2xl:px-52 my-7">
                <div className="flex w-full justify-center items-center">
                    <div className="flex flex-col space-y-7 md:basis-2/3 px-10 md:px-0">
                        <div className="flex md:hidden gap-4 justify-center items-center">
                            <div>
                                <img
                                    src={pres}
                                    alt=""
                                    className="w-[100px] rounded-full scale-x-[-1]"
                                />
                            </div>
                            <div className="flex flex-col justify-center">
                                <p className="text-[#2D2727] font-bold text-sm mb-2">
                                    Atty. David Roy Padin
                                </p>
                                <p className="text-[#585858] text-[10px] font-medium">
                                    CEO and President of Cocogen Insurance
                                </p>
                            </div>
                        </div>

                        <p className="text-[14px] md:text-base font-bold">
                            Dear Clients, Shareholders and the Public,
                        </p>
                        <p className="text-[14px] md:text-base">
                            Established in January 1963 as Allied Guarantee
                            Insurance Company, Inc., the company built a solid
                            reputation in the general insurance landscape in the
                            country. By 1989, it has been wholly owned by United
                            Coconut Planters Life Assurance Corporation
                            (Cocolife), and became the non-life insurance
                            company arm of the UCPB Financial Services Group. In
                            2019, the company took another step forward and
                            rebranded itself as Cocogen Insurance, with the goal
                            of synergizing more with Cocolife.
                        </p>
                        <p className="text-[14px] md:text-base">
                            Cocogen offers a wide array of quality and
                            innovative insurance solutions designed to protect
                            everything a Filipino values, from tangible,
                            hard-earned assets such as your home, business, and
                            your car, to something as priceless as your loved
                            ones and yourself.
                        </p>
                        <p className="text-[14px] md:text-base">
                            Our five decades of distinctive leadership and
                            commitment to the industry has earned the trust and
                            loyalty of our clients, which range from prominent
                            multinational companies, to business leaders in
                            manufacturing, service, wholesale, and retail
                            merchandising.
                        </p>
                        <p className="text-[14px] md:text-base">
                            Currently, Cocogen has 34 fully-operated branches
                            located in key cities and localities nationwide, all
                            with the shared goal to be your trustworthy partner
                            by providing simple and innovative products, and
                            excellent services with a heart.
                        </p>
                        <p className="text-[14px] md:text-base">
                            General message from the President.
                        </p>
                        {/* <svg
                            width="54"
                            height="54"
                            viewBox="0 0 54 54"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M48.9371 35.4375H13.4701C14.0312 34.3322 14.5944 33.1952 15.1576 32.0393C18.3069 32.3873 22.0384 30.183 26.2824 25.4538C26.409 25.804 26.5503 26.1647 26.7043 26.5296C28.0775 29.7464 29.8494 31.5795 31.9777 31.9823C34.1588 32.4042 36.3188 31.301 38.5337 28.6453C39.9723 30.3476 42.9254 32.0625 48.9371 32.0625C49.3847 32.0625 49.8139 31.8847 50.1304 31.5682C50.4468 31.2518 50.6246 30.8226 50.6246 30.375C50.6246 29.9274 50.4468 29.4982 50.1304 29.1818C49.8139 28.8653 49.3847 28.6875 48.9371 28.6875C42.4761 28.6875 40.5945 26.4537 40.4996 25.2661C40.4893 24.8735 40.3425 24.4969 40.0843 24.2009C39.8262 23.905 39.4729 23.7084 39.0854 23.6449C38.6979 23.5815 38.3004 23.6551 37.9613 23.8533C37.6223 24.0514 37.3629 24.3615 37.228 24.7303C34.6609 28.5799 33.14 28.7677 32.5874 28.6664C30.8302 28.3352 29.1955 24.2515 28.6449 21.5979C28.5729 21.2628 28.4005 20.9575 28.1507 20.7228C27.9009 20.488 27.5855 20.3349 27.2465 20.2839C26.9076 20.2328 26.5611 20.2862 26.2532 20.4369C25.9453 20.5876 25.6907 20.8285 25.5231 21.1275C21.3465 26.3208 18.5452 28.0884 16.7881 28.5398C18.579 24.5573 19.9163 21.0621 20.7727 18.1195C22.2113 13.1752 22.3168 9.71789 21.0913 7.55156C20.4584 6.42094 19.1317 5.07305 16.4696 5.0625H16.4169C13.0419 5.0857 10.3841 8.28984 9.11423 13.8586C8.35696 17.1724 8.23251 20.8596 8.7704 23.9836C9.30829 27.1076 10.4284 29.3646 12.0505 30.7104C11.2658 32.3409 10.4621 33.9335 9.68165 35.4417H5.06212C4.61457 35.4417 4.18534 35.6195 3.86888 35.936C3.55241 36.2524 3.37462 36.6817 3.37462 37.1292C3.37462 37.5768 3.55241 38.006 3.86888 38.3225C4.18534 38.6389 4.61457 38.8167 5.06212 38.8167H7.89079C5.50298 43.2464 3.64673 46.3345 3.6172 46.3852C3.49689 46.5752 3.41578 46.7873 3.37864 47.0092C3.3415 47.231 3.34907 47.458 3.40091 47.6768C3.45276 47.8957 3.54783 48.102 3.68053 48.2835C3.81324 48.4651 3.9809 48.6183 4.17367 48.7342C4.36644 48.8501 4.58042 48.9262 4.80305 48.9582C5.02567 48.9902 5.25244 48.9773 5.47002 48.9204C5.68761 48.8635 5.89162 48.7637 6.07007 48.6268C6.24852 48.4899 6.3978 48.3187 6.50915 48.1233C6.54079 48.0684 8.88642 44.1598 11.7193 38.8167H48.9371C49.3847 38.8167 49.8139 38.6389 50.1304 38.3225C50.4468 38.006 50.6246 37.5768 50.6246 37.1292C50.6246 36.6817 50.4468 36.2524 50.1304 35.936C49.8139 35.6195 49.3847 35.4417 48.9371 35.4417V35.4375ZM40.4996 25.3125V25.2682C40.501 25.2829 40.501 25.2978 40.4996 25.3125ZM12.4006 14.6095C13.2423 10.9223 14.8665 8.4375 16.4527 8.4375C17.5602 8.4375 17.9293 8.82984 18.1402 9.21164C18.7731 10.3359 19.5156 14.3142 13.5734 27.4303C11.8459 25.0488 11.2574 19.6172 12.4006 14.6095Z"
                                fill="#012942"
                            />
                        </svg> */}
                    </div>
                    <div className="hidden md:flex basis-1/3 justify-center items-center">
                        <img src={pres} alt="" className="w-[300px]" />
                    </div>
                </div>
            </div>
            <div className="flex px-8 md:px-20 lg:px-20 xl:px-28 2xl:px-52 mb-10 md:mb-28">
                <div className="flex flex-col border-l-[5px] border-[#008080] mt-5 space-y-5 p-5 py-0 md:py-5">
                    <div className="text-lg md:text-2xl font-bold text-[#003E3E]">
                        Related
                    </div>
                    <div className="flex flex-col md:flex-row gap-10">
                        {blogs.map((blog, index) => {
                            if (index < 3) {
                                return (
                                    <Link
                                        to={`/presidents-corner/${blog.blogLink}`}
                                        key={index}
                                    >
                                        <div className="md:p-[10px_20px]">
                                            <p className="font-semibold text-sm md:text-lg text-[#008080]">
                                                {blog.blogName}
                                            </p>
                                        </div>
                                    </Link>
                                );
                            }
                        })}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Home;
