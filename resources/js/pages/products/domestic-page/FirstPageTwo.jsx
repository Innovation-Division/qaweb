// import Swiper core and required modules
import { Navigation, Pagination, Scrollbar, A11y } from "swiper/modules";

import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";
import { useEffect, useState } from "react";
import PacketPlanCard from "../../../components/Domestic/PacketPlanCard";
import ProPlanCard from "../../../components/Domestic/ProPlanCard";
import { format } from "date-fns";

const FirstPageTwo = ({
    formData,
    setFormData,
    prevStep,
    nextStep,
    handlePlanPage,
    plan = null,
    setPlan,
    promoData,
    setPromoData,
    planPremiums,
    setPlanPremiums,
}) => {
    const fetchPremiums = async () => {
        let noOfDays = Math.floor(
            (new Date(formData.request_info.date_to) -
                new Date(formData.request_info.date_from)) /
                (1000 * 60 * 60 * 24)
        );

        const { data } = await axios.get(
            "/api/get-quote/domestic-insurance/premiums-final",
            {
                params: {
                    noOfDays: noOfDays + 1,
                    travelType: formData.request_info.travel_type,
                    promoCode: formData.request_info.promo_code,
                    promoCodeType: formData.request_info.promo_code_type,
                    covidCoverage: formData.request_info.covid_coverage,
                },
            },
            {
                headers: {
                    "Content-Type": "application/json",
                },
            }
        );
        setProPremium(data["Pro"]);
        setPacketPremium(data["Packet"]);
        setPlanPremiums(data);
    };

    useEffect(() => {
        fetchPremiums();
    }, []);

    const [errors, setErrors] = useState({});
    const [proPremium, setProPremium] = useState(planPremiums["Pro"] || {});
    const [packetPremium, setPacketPremium] = useState(
        planPremiums["Packet"] || {}
    );

    const validate = () => {
        let isValid = true;
        const newErrors = {};

        if (!formData.quotation?.package?.package) {
            newErrors.plan = "Please select a plan.";
            isValid = false;
        }

        setErrors(newErrors);
        return isValid;
    };

    const handleNext = () => {
        if (validate()) {
            setFormData({
                ...formData,
                request_info: {
                    ...formData.request_info,
                    plan: formData.quotation.package.package,
                },
            });

            nextStep();
        }
    };

    const DisplayDate = ({ date_from, date_to }) => {
        try {
            const fromDate = new Date(date_from);
            const toDate = new Date(date_to);

            const formattedFromDay = format(fromDate, "d");
            const formattedToDay = format(toDate, "d");
            const formattedMonthFrom = format(fromDate, "MMM");
            const formattedMonthTo = format(toDate, "MMM");
            const formattedYear = format(fromDate, "yyyy");

            return (
                <>
                    {formattedMonthFrom === formattedMonthTo ? (
                        <span>
                            {formattedMonthFrom} {formattedFromDay}-
                            {formattedToDay}, {formattedYear}
                        </span>
                    ) : (
                        <span>
                            {formattedMonthFrom} {formattedFromDay} -{" "}
                            {formattedMonthTo} {formattedToDay}, {formattedYear}
                        </span>
                    )}
                </>
            );
        } catch (error) {
            console.error("Error formatting dates:", error);
            return <span>Invalid date format</span>;
        }
    };

    return (
        <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full px-8 md:px-0">
            <div className="hidden md:flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Your Travel insurance Quote
                </h2>
            </div>
            <div className="hidden md:flex items-center justify-center gap-16 lg:gap-20 w-full py-6 md:py-10 bg-[#EFF2F4]">
                <div className="flex flex-col items-center ">
                    <p className="text-[#2D2727] font-semibold text-[25px]">
                        {formData.request_info.destination.length}
                    </p>
                    <p className="text-[#6A6F74] text-sm leading-6 font-medium">
                        Destination
                    </p>
                </div>
                <div className="border-r-2 h-10 border-[#D7DEE3]"></div>
                <div className="flex flex-col items-center gap-3">
                    <p>
                        {formData.request_info.travel_type === "Air Plan" ? (
                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M1.49699 14.5392L5.47287 16.5271L7.46081 20.503L9.44875 18.5151V15.5332L12.9276 12.0543L15.9096 21L18.8915 18.0181L16.4065 8.57537L20.3824 4.59949C21.2059 3.77605 21.2059 2.44101 20.3824 1.61757C19.559 0.794142 18.2239 0.794142 17.4005 1.61757L13.4246 5.59346L3.98191 3.10853L1 6.09044L9.94573 9.07235L6.46684 12.5513H3.48493L1.49699 14.5392Z"
                                    fill="#2D2727"
                                    stroke="#2D2727"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        ) : (
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9 0.875C7.39303 0.875 5.82214 1.35152 4.486 2.24431C3.14985 3.1371 2.10844 4.40605 1.49348 5.8907C0.87852 7.37535 0.717618 9.00901 1.03112 10.5851C1.34463 12.1612 2.11846 13.6089 3.25476 14.7452C4.39106 15.8815 5.8388 16.6554 7.4149 16.9689C8.99099 17.2824 10.6247 17.1215 12.1093 16.5065C13.594 15.8916 14.8629 14.8502 15.7557 13.514C16.6485 12.1779 17.125 10.607 17.125 9C17.1227 6.84581 16.266 4.78051 14.7427 3.25727C13.2195 1.73403 11.1542 0.877275 9 0.875ZM13.0297 5.38984L10.5297 10.3898C10.4991 10.4501 10.4501 10.4991 10.3898 10.5297L5.38985 13.0297C5.33115 13.0592 5.26465 13.0694 5.19979 13.059C5.13494 13.0485 5.07503 13.0179 5.02858 12.9714C4.98213 12.925 4.9515 12.8651 4.94104 12.8002C4.93058 12.7354 4.94082 12.6689 4.97032 12.6102L7.47032 7.61016C7.50092 7.54989 7.5499 7.50092 7.61016 7.47031L12.6102 4.97031C12.6689 4.94082 12.7354 4.93058 12.8002 4.94104C12.8651 4.9515 12.925 4.98213 12.9714 5.02858C13.0179 5.07503 13.0485 5.13494 13.059 5.19979C13.0694 5.26464 13.0592 5.33114 13.0297 5.38984Z"
                                    fill="#2D2727"
                                />
                            </svg>
                        )}
                    </p>
                    <p className="text-[#6A6F74] text-sm leading-6 font-medium">
                        {formData.request_info.travel_type === "Air Plan"
                            ? "Air Travel"
                            : "Non-Air Travel"}
                    </p>
                </div>
                <div className="border-r-2 h-10 border-[#D7DEE3]"></div>
                <div className="flex flex-col items-center gap-3">
                    <p>
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M2.76753 5.33333L18.7681 20.9542M2.76753 5.33333C3.36285 4.65369 4.25202 4.22222 5.24544 4.22222H10.6545M2.76753 5.33333C2.28872 5.87996 2 6.58712 2 7.35948V18.8627C2 20.5954 3.45303 22 5.24544 22H17.1454C18.9378 22 20.3908 20.5954 20.3908 18.8627V14.1569M10.6545 14.1569L3.62272 20.9542M18.3218 5.55556V5.48872M22 5.47826C22 7.7971 18.3218 10.8889 18.3218 10.8889C18.3218 10.8889 14.6437 7.7971 14.6437 5.47826C14.6437 3.55727 16.2904 2 18.3218 2C20.3532 2 22 3.55727 22 5.47826Z"
                                stroke="#2D2727"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </p>
                    <p className="text-[#6A6F74] text-sm leading-6 font-medium">
                        {formData.request_info.destination
                            .map((location) => location.name)
                            .join(", ")}
                    </p>
                </div>
                <div className="border-r-2 h-10 border-[#D7DEE3]"></div>
                <div className="flex flex-col items-center gap-3">
                    <p>
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7 17.8002V17.7143M12.625 17.8002V17.7143M12.625 13.1429V13.0569M17.625 13.1429V13.0569M3.25 8.57139H20.75M5.51191 2V3.71449M18.25 2V3.71428M18.25 3.71428H5.75C3.67893 3.71428 2 5.24929 2 7.14283V18.5714C2 20.465 3.67893 22 5.75 22H18.25C20.3211 22 22 20.465 22 18.5714L22 7.14283C22 5.24929 20.3211 3.71428 18.25 3.71428Z"
                                stroke="#2D2727"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </p>
                    <p className="text-[#6A6F74] text-sm leading-6 font-medium">
                        <DisplayDate
                            date_from={formData.request_info.date_from}
                            date_to={formData.request_info.date_to}
                        />
                    </p>
                </div>
            </div>
            <div className="flex flex-col items-center justify-center w-full py-6 md:py-8">
                <p className="hidden md:flex text-[#2D2727] font-medium text-[23px] mb-5">
                    Select one insurance plan
                </p>
                <p className="hidden md:flex text-[#585858] font-medium text-base leading-6">
                    Insurance plans available for you
                </p>
                <div className="hidden md:flex items-start justify-center w-full gap-6 mb-8 text-wrap overflow-hidden py-5 px-5">
                    <div className="flex flex-col hover:scale-105 transition-all duration-300 ease-in-out w-full max-w-[400px]">
                        <p className="flex items-center justify-center bg-[#006666] text-white w-20 h-10 rounded-tl-lg rounded-tr-lg text-sm leading-6 font-medium">
                            Popular
                        </p>
                        <ProPlanCard
                            formData={formData}
                            setFormData={setFormData}
                            handlePlanPage={handlePlanPage}
                            promoData={promoData}
                            setPromoData={setPromoData}
                            proPremium={proPremium}
                        />
                    </div>
                    <div className="flex flex-col hover:scale-105 transition-all duration-300 ease-in-out w-full max-w-[400px]">
                        <PacketPlanCard
                            formData={formData}
                            setFormData={setFormData}
                            handlePlanPage={handlePlanPage}
                            promoData={promoData}
                            setPromoData={setPromoData}
                            packetPremium={packetPremium}
                        />
                    </div>
                </div>
                <p className="flex md:hidden text-[#2D2727] text-base font-medium mb-3">
                    Packages
                </p>
                <p className="flex md:hidden text-[#585858] text-xs leading-6">
                    Select one insurance package
                </p>
                <div className="flex items-center w-full md:hidden py-8">
                    <Swiper
                        // install Swiper modules
                        modules={[Navigation, Pagination, Scrollbar, A11y]}
                        spaceBetween={50}
                        slidesPerView={1}
                        navigation
                    >
                        <SwiperSlide>
                            <div className="flex flex-col items-center">
                                <div className="flex flex-col">
                                    <p className="flex items-center justify-center bg-[#006666] text-white w-40 h-8 rounded-tl-lg rounded-tr-lg text-xs">
                                        Recommended
                                    </p>
                                    <ProPlanCard
                                        formData={formData}
                                        setFormData={setFormData}
                                        handlePlanPage={handlePlanPage}
                                        promoData={promoData}
                                        setPromoData={setPromoData}
                                        proPremium={proPremium}
                                    />
                                </div>
                            </div>
                        </SwiperSlide>
                        <SwiperSlide>
                            <div className="flex flex-col items-center">
                                <PacketPlanCard
                                    formData={formData}
                                    setFormData={setFormData}
                                    handlePlanPage={handlePlanPage}
                                    promoData={promoData}
                                    setPromoData={setPromoData}
                                    packetPremium={packetPremium}
                                />
                            </div>
                        </SwiperSlide>
                    </Swiper>
                </div>
                {formData.quotation?.package && (
                    <div className="flex items-center bg-[#E1F4E5] gap-4 py-5 px-8 max-w-[825px] w-full">
                        <div>
                            <svg
                                width="18"
                                height="22"
                                viewBox="0 0 18 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M13.5 20.75C13.5 20.9489 13.421 21.1396 13.2803 21.2803C13.1397 21.4209 12.9489 21.5 12.75 21.5H5.25C5.05109 21.5 4.86032 21.4209 4.71967 21.2803C4.57902 21.1396 4.5 20.9489 4.5 20.75C4.5 20.551 4.57902 20.3603 4.71967 20.2196C4.86032 20.079 5.05109 20 5.25 20H12.75C12.9489 20 13.1397 20.079 13.2803 20.2196C13.421 20.3603 13.5 20.551 13.5 20.75ZM17.25 8.74995C17.2532 10.0002 16.9708 11.2347 16.4242 12.3592C15.8776 13.4837 15.0814 14.4685 14.0963 15.2384C13.912 15.3796 13.7626 15.561 13.6592 15.7688C13.5559 15.9767 13.5014 16.2054 13.5 16.4375V17C13.5 17.3978 13.342 17.7793 13.0607 18.0606C12.7794 18.3419 12.3978 18.5 12 18.5H6C5.60218 18.5 5.22065 18.3419 4.93934 18.0606C4.65804 17.7793 4.5 17.3978 4.5 17V16.4375C4.49985 16.2081 4.44712 15.9819 4.34587 15.7762C4.24462 15.5704 4.09754 15.3906 3.91594 15.2506C2.93325 14.4852 2.13754 13.5064 1.58904 12.3881C1.04054 11.2698 0.753622 10.0414 0.750001 8.79589C0.725626 4.32777 4.33688 0.606828 8.80125 0.499953C9.90127 0.473445 10.9955 0.667253 12.0195 1.06997C13.0434 1.47269 13.9765 2.07617 14.7638 2.84491C15.5511 3.61365 16.1766 4.53211 16.6035 5.54622C17.0305 6.56034 17.2503 7.64962 17.25 8.74995ZM14.2397 7.87433C14.0452 6.78804 13.5226 5.78742 12.7422 5.00717C11.9618 4.22692 10.961 3.70451 9.87469 3.51027C9.77755 3.49389 9.67814 3.49681 9.58213 3.51886C9.48612 3.5409 9.39539 3.58164 9.31513 3.63875C9.23487 3.69586 9.16664 3.76821 9.11433 3.85169C9.06203 3.93517 9.02669 4.02813 9.01031 4.12527C8.99394 4.2224 8.99686 4.32181 9.0189 4.41782C9.04095 4.51383 9.08169 4.60456 9.13879 4.68482C9.1959 4.76509 9.26826 4.83332 9.35174 4.88562C9.43521 4.93792 9.52818 4.97327 9.62531 4.98964C11.1788 5.2512 12.4969 6.56933 12.7603 8.12558C12.79 8.30026 12.8806 8.45879 13.0159 8.57307C13.1513 8.68736 13.3228 8.75002 13.5 8.74995C13.5424 8.7497 13.5847 8.74625 13.6266 8.73964C13.8226 8.70617 13.9973 8.59621 14.1123 8.43394C14.2273 8.27167 14.2731 8.07038 14.2397 7.87433Z"
                                    fill="#54B947"
                                />
                            </svg>
                        </div>
                        <div>
                            You have selected{" "}
                            <b className="capitalize">
                                {formData.quotation.package.package} Plan
                            </b>{" "}
                            with total amount of{" "}
                            <b>₱{formData.quotation.package.due}</b>.
                        </div>
                    </div>
                )}
            </div>
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-16 gap-5">
                <button
                    className="text-[#008080] px-5 py-[10px] w-full md:w-auto flex group gap-2 justify-center hover:border-[#008080] hover:border"
                    onClick={prevStep}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        class="bi bi-arrow-left-short hidden group-hover:block"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"
                        />
                    </svg>
                    <span>Back</span>
                </button>
                <button
                    disabled={!formData.quotation?.package?.package}
                    className="text-white bg-[#008080] px-5 py-[10px] rounded w-full md:w-auto disabled:opacity-50 flex justify-center gap-2 group peer"
                    onClick={() => handleNext()}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        className={`bi bi-arrow-right-short hidden  ${
                            !formData.quotation?.package?.package
                                ? ""
                                : "group-hover:block"
                        }`}
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                        />
                    </svg>
                    <span>Continue</span>
                </button>
            </div>
        </div>
    );
};

export default FirstPageTwo;
