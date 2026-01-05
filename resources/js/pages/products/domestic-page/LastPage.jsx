import { useState } from "react";
import { format } from "date-fns";
import paymentLogo from "../../../assets/images/payment.png";

const LastPage = ({ formData, setFormData, prevStep, onSave, promoData }) => {
    const [showDetails, setShowDetails] = useState(false);
    const [showCoverage, setShowCoverage] = useState(false);
    const [showAssist, setShowAssist] = useState(false);
    const [showSubjectivities, setShowSubjectivities] = useState(false);
    const [showPersonal, setShowPersonal] = useState(false);
    const [isAgreed, setIsAgreed] = useState(false);
    const [showPayNow, setShowPayNow] = useState(false);
    const [showTerms, setShowTerms] = useState(false);
    const [showPrivacy, setShowPrivacy] = useState(false);
    const [showExclusions, setShowExclusions] = useState(false);
    const [isLoading, setIsLoading] = useState(false);

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

    const handleSubmit = () => {
        setIsLoading(true);
        onSave();
    };

    return (
        <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full md:px-8">
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    You are about to get Domestic Travel{" "}
                    {formData.request_info.plan} Plan
                </h2>
            </div>
            <div className="flex items-center justify-center w-full md:mb-5">
                <div className="flex flex-col max-w-[800px] w-full py-6 md:py-12 md:bg-white md:border border-[#E0F5F5] rounded px-8 md:px-24">
                    <div className="flex justify-between items-center">
                        <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium md:font-bold">
                            Domestic Travel {formData.request_info.plan} Plan
                        </h3>
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                fill="currentColor"
                                viewBox="0 0 16 16"
                                className="w-5 h-5 md:h-7 md:w-7"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        </span>
                    </div>
                    <div className="flex items-center justify-center bg-[#373A3D] md:px-4 py-2 rounded-tl-lg rounded-tr-lg mt-5">
                        <p className="text-white font-medium text-sm leading-6">
                            Price Breakdown
                        </p>
                    </div>
                    <div className="flex flex-col w-full bg-[#FCFCFC] py-5 gap-2 px-6 md:px-4">
                        <div className="flex justify-between ">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Net Premium
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.net_premium}
                            </p>
                        </div>
                        <div className="flex justify-between ">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Documentary Stamp
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.doc_stamp}
                            </p>
                        </div>
                        <div className="flex justify-between ">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Premium Tax
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.premium_tax}
                            </p>
                        </div>
                        <div className="flex justify-between ">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Local Government Tax
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.lgt}
                            </p>
                        </div>
                        {formData.request_info.promo_code_type === "yes" && (
                            <div className="flex justify-between">
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    Promo
                                </p>
                                <p className="text-[#DD0707] text-sm leading-6 md:text-base md:font-bold">
                                    -
                                    {promoData.type === "A"
                                        ? `₱${promoData.amount}`
                                        : `${promoData.rate}%`}
                                </p>
                            </div>
                        )}
                    </div>
                    <div className="flex justify-between bg-[#F5F5F5] py-6 px-2 md:px-4 pr-6 mb-5">
                        <p className="text-[#585858] font-medium text-sm leading-6">
                            Total Premium
                        </p>
                        <p className="text-[#2D2727] text-sm md:text-[23px] font-medium md:font-bold leading-6">
                            ₱{formData.quotation.package.due}
                        </p>
                    </div>
                    <div className="my-3 md:my-6 space-y-5 w-full">
                        <div className="transition-all duration-200 bg-white border border-[#C0E6E6] cursor-pointer">
                            <button
                                onClick={() => setShowDetails(!showDetails)}
                                type="button"
                                className={`${
                                    showDetails && "md:bg-[#F7FFFF] mb-2"
                                } flex items-center justify-between w-full px-4 py-3 sm:p-4`}
                            >
                                <span className="flex text-sm font-medium text-[#2D2727] leading-6">
                                    Trip Details
                                </span>
                                <svg
                                    id="arrow1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    className={`w-7 h-7 text-gray-400 ${
                                        showDetails &&
                                        "bg-[#E0F5F5] rounded-full rotate-180"
                                    }`}
                                >
                                    <path
                                        stroke="#008080"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M19 9l-7 7-7-7"
                                    ></path>
                                </svg>
                            </button>
                            <div
                                className={`${
                                    !showDetails && "hidden"
                                } flex flex-col px-5 md:px-0 mb-4 md:mb-0`}
                            >
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Single or Multi-Destinations
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold">
                                        {formData.request_info
                                            .destination_type === "single"
                                            ? "Single"
                                            : "Multiple"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Destination/s
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold">
                                        {formData.request_info.destination
                                            .map((location) => location.name)
                                            .join(", ")}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Travel Date
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold">
                                        <DisplayDate
                                            date_from={
                                                formData.request_info.date_from
                                            }
                                            date_to={
                                                formData.request_info.date_to
                                            }
                                        />
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Air or Non-Air
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold">
                                        {formData.request_info.travel_type}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className="transition-all duration-200 bg-white border border-[#C0E6E6] cursor-pointer">
                            <button
                                onClick={() => setShowCoverage(!showCoverage)}
                                type="button"
                                className={`${
                                    showCoverage && "md:bg-[#F7FFFF] mb-2"
                                } flex items-center justify-between w-full px-4 py-3 sm:p-4`}
                            >
                                <span className="flex text-sm font-medium text-[#2D2727] leading-6">
                                    {formData.request_info.plan} Plan Coverage
                                </span>
                                <svg
                                    id="arrow1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    className={`w-7 h-7 text-gray-400 ${
                                        showCoverage &&
                                        "bg-[#E0F5F5] rounded-full rotate-180"
                                    }`}
                                >
                                    <path
                                        stroke="#008080"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M19 9l-7 7-7-7"
                                    ></path>
                                </svg>
                            </button>
                            <div
                                className={`${
                                    !showCoverage && "hidden"
                                } flex flex-col px-5 md:px-0 mb-4 md:mb-0`}
                            >
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Accidental Death and Disablement
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.request_info.plan === "Pro"
                                            ? "₱500,000.00"
                                            : "₱250,000.00"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Accidental Medical Reimbursement
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.request_info.plan === "Pro"
                                            ? "₱50,000.00"
                                            : "₱25,000.00"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Accidental Burial Benefit
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.request_info.plan === "Pro"
                                            ? "₱50,000.00"
                                            : "₱25,000.00"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Unprovoked Murder and Assault
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.request_info.plan === "Pro"
                                            ? "₱500,000.00"
                                            : "₱250,000.00"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Medical Assistance (With Sabotage and
                                        Terrorism) and hospitalization
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.request_info.plan === "Pro"
                                            ? "₱500,000.00"
                                            : "₱250,000.00"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Transport or Repatriation In Case of
                                        Illness or Accident
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        Actual Expense
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Repatriation of Mortal Remains
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        Actual Expense
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Pre-Existing Condition within Look Back
                                        Period
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.request_info.plan === "Pro"
                                            ? "₱25,000.00"
                                            : "₱12,500.00"}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Trip Cancellation
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        ₱25,000.00
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Trip Curtailment
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        ₱25,000.00
                                    </p>
                                </div>

                                {formData.request_info.travel_type ===
                                    "Air Plan" && (
                                    <>
                                        <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                            <p className="text-[#585858] text-xs basis-1/2">
                                                Delayed Departure
                                            </p>
                                            <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                                Up to ₱10,000.00
                                            </p>
                                        </div>
                                        <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                            <p className="text-[#585858] text-xs basis-1/2">
                                                Baggage Delay
                                            </p>
                                            <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                                Up to ₱5,000.00
                                            </p>
                                        </div>
                                        <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                            <p className="text-[#585858] text-xs basis-1/2">
                                                Compensation for In-Flight Loss
                                                and Damage (Checked-In Baggage)
                                            </p>
                                            <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                                Up to ₱10,000.00 (Subject to
                                                1,000.00 per item)
                                            </p>
                                        </div>
                                    </>
                                )}
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Long Distance Medical Information
                                        Services
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        Actual Expense
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Medical Referral / Appointment of Local
                                        Medical Specialists
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        Actual Expense
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4 gap-5">
                                    <p className="text-[#585858] text-xs basis-1/2">
                                        Connection Services
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        Actual Expense
                                    </p>
                                </div>
                            </div>
                        </div>
                        {formData.request_info.covid_coverage === "Yes" && (
                            <div className="transition-all duration-200 bg-white border border-[#C0E6E6] cursor-pointer">
                                <button
                                    onClick={() => setShowAssist(!showAssist)}
                                    type="button"
                                    className={`${
                                        showAssist && "md:bg-[#F7FFFF] mb-2"
                                    } flex items-center justify-between w-full px-4 py-3 sm:p-4`}
                                >
                                    <span className="flex text-sm font-medium text-[#2D2727] leading-6">
                                        COVID-19 Assist+{" "}
                                        {formData.request_info.plan}
                                    </span>
                                    <svg
                                        id="arrow1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        className={`w-7 h-7 text-gray-400 ${
                                            showAssist &&
                                            "bg-[#E0F5F5] rounded-full rotate-180"
                                        }`}
                                    >
                                        <path
                                            stroke="#008080"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </button>
                                <div
                                    className={`${
                                        !showAssist && "hidden"
                                    } flex flex-col px-5 md:px-0 mb-4 md:mb-0`}
                                >
                                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                        <p className="text-[#585858] text-xs  basis-1/2">
                                            Trip Cancellation Due to COVID-19
                                        </p>
                                        <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                            ₱25,000.00
                                        </p>
                                    </div>
                                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                        <p className="text-[#585858] text-xs  basis-1/2">
                                            Daily Hospital Benefits Due to
                                            COVID-19 (Maximum of 15 Days)
                                        </p>
                                        <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                            {formData.request_info.plan ===
                                            "Pro"
                                                ? "₱500.00 per day"
                                                : "₱250.00 per day"}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        )}
                        <div className="transition-all duration-200 bg-white border border-[#C0E6E6] cursor-pointer">
                            <button
                                onClick={() =>
                                    setShowSubjectivities(!showSubjectivities)
                                }
                                type="button"
                                className={`${
                                    showSubjectivities && "md:bg-[#F7FFFF] mb-2"
                                } flex items-center justify-between w-full px-4 py-3 sm:p-4`}
                            >
                                <span className="flex text-sm font-medium text-[#2D2727] leading-6">
                                    Subjectivities
                                </span>
                                <svg
                                    id="arrow1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    className={`w-7 h-7 text-gray-400 ${
                                        showSubjectivities &&
                                        "bg-[#E0F5F5] rounded-full rotate-180"
                                    }`}
                                >
                                    <path
                                        stroke="#008080"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M19 9l-7 7-7-7"
                                    ></path>
                                </svg>
                            </button>
                            <div
                                className={`${
                                    !showSubjectivities && "hidden"
                                } flex flex-col px-5 md:px-0 mb-4 md:mb-0`}
                            >
                                {formData.request_info.covid_coverage ===
                                    "Yes" && (
                                    <>
                                        <div className="flex items-center  border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                            <p className="text-[#585858] text-xs">
                                                Warranted that the covered
                                                person should have at least two
                                                (2) shots of COVID-19 vaccine
                                                (0ne for J&J shots) at inception
                                                policy
                                            </p>
                                        </div>
                                        <div className="flex items-center  border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                            <p className="text-[#585858] text-xs">
                                                Insured is not confirmed
                                                positive (asymptomatic or
                                                symptomatic), suspected, or
                                                probable cases of COVID-19 at
                                                the time of the application
                                            </p>
                                        </div>
                                    </>
                                )}
                                <div className="flex items-center  border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Infectious Disease Exclusion Clause
                                    </p>
                                </div>
                                <div className="flex items-center border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Sabotage and Terrorrism Inclusion
                                    </p>
                                </div>
                                <div className="flex items-center  border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Beneficiary Endorsement
                                    </p>
                                </div>
                                <div className="flex items-center  border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs">
                                        Standard Cocogen Domestic Travel Policy
                                        Wordings
                                    </p>
                                </div>
                                {formData.request_info.covid_coverage ===
                                    "Yes" && (
                                    <div className="flex items-center  border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                        <p className="text-[#585858] text-xs">
                                            Domestic COVID-19 Coverage
                                            Endorsement Wordings
                                        </p>
                                    </div>
                                )}
                            </div>
                        </div>
                        <div className="transition-all duration-200 bg-white border border-[#C0E6E6] cursor-pointer">
                            <button
                                onClick={() => setShowPersonal(!showPersonal)}
                                type="button"
                                className={`${
                                    showPersonal && "md:bg-[#F7FFFF] mb-2"
                                } flex items-center justify-between w-full px-4 py-3 sm:p-4`}
                            >
                                <span className="flex text-sm font-medium text-[#2D2727] leading-6">
                                    Personal Information
                                </span>
                                <svg
                                    id="arrow1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    className={`w-7 h-7 text-gray-400 ${
                                        showPersonal &&
                                        "bg-[#E0F5F5] rounded-full rotate-180"
                                    }`}
                                >
                                    <path
                                        stroke="#008080"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M19 9l-7 7-7-7"
                                    ></path>
                                </svg>
                            </button>
                            <div
                                className={`${
                                    !showPersonal && "hidden"
                                } flex flex-col px-5 md:px-0 mb-4 md:mb-0`}
                            >
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        First Name
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.first_name}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Last Name
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.last_name}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Suffix
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.suffix}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Mobile
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.mobile}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Email Address
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.email}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Birth Date
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.birth_date}
                                    </p>
                                </div>
                                <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Citizenship
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.citizenship}
                                    </p>
                                </div>
                                <div className="flex items-start justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Present Address
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.house_no}{" "}
                                        {formData.personal_data.street}{" "}
                                        {formData.personal_data.barangay}{" "}
                                        {formData.personal_data.city}{" "}
                                        {formData.personal_data.province}{" "}
                                        {formData.personal_data.region}{" "}
                                        {formData.personal_data.zip}
                                    </p>
                                </div>
                                <div className="flex items-start justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        ID
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {formData.personal_data.id_type}
                                    </p>
                                </div>
                                <div className="flex items-start justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Beneficiaries
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {
                                            formData.personal_data.beneficiaries
                                                .length
                                        }
                                    </p>
                                </div>
                                {formData.personal_data.beneficiaries.map(
                                    (beneficiary, index) => (
                                        <div
                                            key={index}
                                            className="flex items-start justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4"
                                        >
                                            <p className="text-[#585858] text-xs  basis-1/2">
                                                {beneficiary.relationship}
                                            </p>
                                            <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                                {beneficiary.fullName}{" "}
                                                {beneficiary.mobile}
                                            </p>
                                        </div>
                                    )
                                )}
                                <div className="flex items-start justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                    <p className="text-[#585858] text-xs  basis-1/2">
                                        Emergency Contact
                                    </p>
                                    <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                        {
                                            formData.personal_data
                                                .emergency_full_name
                                        }{" "}
                                        {
                                            formData.personal_data
                                                .emergency_relationship
                                        }{" "}
                                        {
                                            formData.personal_data
                                                .emergency_mobile
                                        }
                                    </p>
                                </div>
                                {formData.personal_data.is_have_agent ===
                                    "yes" && (
                                    <div className="flex items-start justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-4">
                                        <p className="text-[#585858] text-xs  basis-1/2">
                                            Agent Name
                                        </p>
                                        <p className="text-[#2D2727] text-xs font-bold basis-1/2 text-right">
                                            {formData.personal_data.agent_name}
                                        </p>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                    {formData.request_info.promo_code_type === "yes" && (
                        <div className="hidden md:flex bg-[#FFF9EC] py-6 px-6 md:px-4 gap-5 mb-5">
                            <span>
                                <svg
                                    width="17"
                                    height="22"
                                    viewBox="0 0 17 22"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M13 20.75C13 20.9489 12.921 21.1397 12.7803 21.2803C12.6397 21.421 12.4489 21.5 12.25 21.5H4.75C4.55109 21.5 4.36032 21.421 4.21967 21.2803C4.07902 21.1397 4 20.9489 4 20.75C4 20.5511 4.07902 20.3603 4.21967 20.2197C4.36032 20.079 4.55109 20 4.75 20H12.25C12.4489 20 12.6397 20.079 12.7803 20.2197C12.921 20.3603 13 20.5511 13 20.75ZM16.75 8.75002C16.7532 10.0003 16.4708 11.2348 15.9242 12.3593C15.3776 13.4838 14.5814 14.4686 13.5963 15.2385C13.412 15.3797 13.2626 15.5611 13.1592 15.7689C13.0559 15.9767 13.0014 16.2054 13 16.4375V17C13 17.3978 12.842 17.7794 12.5607 18.0607C12.2794 18.342 11.8978 18.5 11.5 18.5H5.5C5.10218 18.5 4.72065 18.342 4.43934 18.0607C4.15804 17.7794 4 17.3978 4 17V16.4375C3.99985 16.2082 3.94712 15.982 3.84587 15.7762C3.74462 15.5705 3.59754 15.3907 3.41594 15.2506C2.43325 14.4853 1.63754 13.5065 1.08904 12.3882C0.540542 11.2699 0.253622 10.0415 0.250001 8.79595C0.225626 4.32783 3.83688 0.606889 8.30125 0.500014C9.40127 0.473506 10.4955 0.667314 11.5195 1.07003C12.5434 1.47275 13.4765 2.07624 14.2638 2.84497C15.0511 3.61371 15.6766 4.53217 16.1035 5.54628C16.5305 6.5604 16.7503 7.64968 16.75 8.75002ZM13.7397 7.87439C13.5452 6.7881 13.0226 5.78748 12.2422 5.00723C11.4618 4.22698 10.461 3.70457 9.37469 3.51033C9.27755 3.49395 9.17814 3.49687 9.08213 3.51892C8.98612 3.54096 8.89539 3.5817 8.81513 3.63881C8.73487 3.69592 8.66664 3.76828 8.61433 3.85175C8.56203 3.93523 8.52669 4.02819 8.51031 4.12533C8.49394 4.22246 8.49686 4.32188 8.5189 4.41788C8.54095 4.51389 8.58169 4.60462 8.63879 4.68489C8.6959 4.76515 8.76826 4.83338 8.85174 4.88568C8.93521 4.93798 9.02818 4.97333 9.12531 4.9897C10.6788 5.25126 11.9969 6.56939 12.2603 8.12564C12.29 8.30032 12.3806 8.45885 12.5159 8.57313C12.6513 8.68742 12.8228 8.75008 13 8.75002C13.0424 8.74976 13.0847 8.74631 13.1266 8.7397C13.3226 8.70623 13.4973 8.59627 13.6123 8.434C13.7273 8.27173 13.7731 8.07044 13.7397 7.87439Z"
                                        fill="#F5BC16"
                                    />
                                </svg>
                            </span>
                            <div className="flex flex-col">
                                <p className="text-[#303030] font-bold text-sm leading-6">
                                    Promo
                                </p>
                                <p className="text-[#303030] font-normal text-xs md:text-base leading-6">
                                    Please note the percent discount from the
                                    promo code is applied against the Net
                                    Premium Philippine peso amount. Only one
                                    promo code is allowed per transaction.
                                </p>
                            </div>
                        </div>
                    )}
                    <div className="hidden md:flex bg-[#FFF9EC] py-6 px-6 md:px-4 gap-5">
                        <span>
                            <svg
                                width="17"
                                height="22"
                                viewBox="0 0 17 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M13 20.75C13 20.9489 12.921 21.1397 12.7803 21.2803C12.6397 21.421 12.4489 21.5 12.25 21.5H4.75C4.55109 21.5 4.36032 21.421 4.21967 21.2803C4.07902 21.1397 4 20.9489 4 20.75C4 20.5511 4.07902 20.3603 4.21967 20.2197C4.36032 20.079 4.55109 20 4.75 20H12.25C12.4489 20 12.6397 20.079 12.7803 20.2197C12.921 20.3603 13 20.5511 13 20.75ZM16.75 8.75002C16.7532 10.0003 16.4708 11.2348 15.9242 12.3593C15.3776 13.4838 14.5814 14.4686 13.5963 15.2385C13.412 15.3797 13.2626 15.5611 13.1592 15.7689C13.0559 15.9767 13.0014 16.2054 13 16.4375V17C13 17.3978 12.842 17.7794 12.5607 18.0607C12.2794 18.342 11.8978 18.5 11.5 18.5H5.5C5.10218 18.5 4.72065 18.342 4.43934 18.0607C4.15804 17.7794 4 17.3978 4 17V16.4375C3.99985 16.2082 3.94712 15.982 3.84587 15.7762C3.74462 15.5705 3.59754 15.3907 3.41594 15.2506C2.43325 14.4853 1.63754 13.5065 1.08904 12.3882C0.540542 11.2699 0.253622 10.0415 0.250001 8.79595C0.225626 4.32783 3.83688 0.606889 8.30125 0.500014C9.40127 0.473506 10.4955 0.667314 11.5195 1.07003C12.5434 1.47275 13.4765 2.07624 14.2638 2.84497C15.0511 3.61371 15.6766 4.53217 16.1035 5.54628C16.5305 6.5604 16.7503 7.64968 16.75 8.75002ZM13.7397 7.87439C13.5452 6.7881 13.0226 5.78748 12.2422 5.00723C11.4618 4.22698 10.461 3.70457 9.37469 3.51033C9.27755 3.49395 9.17814 3.49687 9.08213 3.51892C8.98612 3.54096 8.89539 3.5817 8.81513 3.63881C8.73487 3.69592 8.66664 3.76828 8.61433 3.85175C8.56203 3.93523 8.52669 4.02819 8.51031 4.12533C8.49394 4.22246 8.49686 4.32188 8.5189 4.41788C8.54095 4.51389 8.58169 4.60462 8.63879 4.68489C8.6959 4.76515 8.76826 4.83338 8.85174 4.88568C8.93521 4.93798 9.02818 4.97333 9.12531 4.9897C10.6788 5.25126 11.9969 6.56939 12.2603 8.12564C12.29 8.30032 12.3806 8.45885 12.5159 8.57313C12.6513 8.68742 12.8228 8.75008 13 8.75002C13.0424 8.74976 13.0847 8.74631 13.1266 8.7397C13.3226 8.70623 13.4973 8.59627 13.6123 8.434C13.7273 8.27173 13.7731 8.07044 13.7397 7.87439Z"
                                    fill="#F5BC16"
                                />
                            </svg>
                        </span>
                        <div className="flex flex-col">
                            <p className="text-[#303030] font-bold text-sm leading-6">
                                Documentary Stamps
                            </p>
                            <p className="text-[#303030] font-normal text-xs md:text-base leading-6">
                                Due to BIR implementation of EDST (Electronic
                                Documentary Stamp Tax) system effective July 1,
                                2010, policyholders are mandated to pay the DST
                                portion of the premium once the policy is
                                issued.{" "}
                                <b>
                                    Refund on DST for cancelled policies is not
                                    allowed.
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div className="flex md:hidden bg-[#FFF9EC] gap-4 py-5 px-8 max-w-[800px] w-full mb-5">
                <span>
                    <svg
                        width="17"
                        height="22"
                        viewBox="0 0 17 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M13 20.75C13 20.9489 12.921 21.1397 12.7803 21.2803C12.6397 21.421 12.4489 21.5 12.25 21.5H4.75C4.55109 21.5 4.36032 21.421 4.21967 21.2803C4.07902 21.1397 4 20.9489 4 20.75C4 20.5511 4.07902 20.3603 4.21967 20.2197C4.36032 20.079 4.55109 20 4.75 20H12.25C12.4489 20 12.6397 20.079 12.7803 20.2197C12.921 20.3603 13 20.5511 13 20.75ZM16.75 8.75002C16.7532 10.0003 16.4708 11.2348 15.9242 12.3593C15.3776 13.4838 14.5814 14.4686 13.5963 15.2385C13.412 15.3797 13.2626 15.5611 13.1592 15.7689C13.0559 15.9767 13.0014 16.2054 13 16.4375V17C13 17.3978 12.842 17.7794 12.5607 18.0607C12.2794 18.342 11.8978 18.5 11.5 18.5H5.5C5.10218 18.5 4.72065 18.342 4.43934 18.0607C4.15804 17.7794 4 17.3978 4 17V16.4375C3.99985 16.2082 3.94712 15.982 3.84587 15.7762C3.74462 15.5705 3.59754 15.3907 3.41594 15.2506C2.43325 14.4853 1.63754 13.5065 1.08904 12.3882C0.540542 11.2699 0.253622 10.0415 0.250001 8.79595C0.225626 4.32783 3.83688 0.606889 8.30125 0.500014C9.40127 0.473506 10.4955 0.667314 11.5195 1.07003C12.5434 1.47275 13.4765 2.07624 14.2638 2.84497C15.0511 3.61371 15.6766 4.53217 16.1035 5.54628C16.5305 6.5604 16.7503 7.64968 16.75 8.75002ZM13.7397 7.87439C13.5452 6.7881 13.0226 5.78748 12.2422 5.00723C11.4618 4.22698 10.461 3.70457 9.37469 3.51033C9.27755 3.49395 9.17814 3.49687 9.08213 3.51892C8.98612 3.54096 8.89539 3.5817 8.81513 3.63881C8.73487 3.69592 8.66664 3.76828 8.61433 3.85175C8.56203 3.93523 8.52669 4.02819 8.51031 4.12533C8.49394 4.22246 8.49686 4.32188 8.5189 4.41788C8.54095 4.51389 8.58169 4.60462 8.63879 4.68489C8.6959 4.76515 8.76826 4.83338 8.85174 4.88568C8.93521 4.93798 9.02818 4.97333 9.12531 4.9897C10.6788 5.25126 11.9969 6.56939 12.2603 8.12564C12.29 8.30032 12.3806 8.45885 12.5159 8.57313C12.6513 8.68742 12.8228 8.75008 13 8.75002C13.0424 8.74976 13.0847 8.74631 13.1266 8.7397C13.3226 8.70623 13.4973 8.59627 13.6123 8.434C13.7273 8.27173 13.7731 8.07044 13.7397 7.87439Z"
                            fill="#F5BC16"
                        />
                    </svg>
                </span>
                <div className="flex flex-col">
                    <p className="text-[#303030] font-bold text-sm leading-6">
                        Documentary Stamps
                    </p>
                    <p className="text-[#303030] font-normal text-xs md:text-base leading-6">
                        Due to BIR implementation of EDST (Electronic
                        Documentary Stamp Tax) system effective July 1, 2010,
                        policyholders are mandated to pay the DST portion of the
                        premium once the policy is issued.{" "}
                        <b>
                            Refund on DST for cancelled policies is not allowed.
                        </b>
                    </p>
                </div>
            </div>
            <div className="flex items-center bg-[#E1F4E5] gap-4 py-5 px-8 max-w-[800px] w-full mb-5">
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
                    You have selected <b> {formData.request_info.plan} Plan</b>{" "}
                    with total amount of{" "}
                    <b>₱{formData.quotation.package.due}</b>
                </div>
            </div>
            <div className="flex items-center bg-[#FFF4DA] gap-4 py-5 px-8 max-w-[800px] w-full">
                <div>
                    <input
                        onChange={(e) => setIsAgreed(e.target.checked)}
                        checked={isAgreed}
                        className="appearance-none checked:!bg-black focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        type="checkbox"
                    />
                </div>
                <div className="text-sm leading-6 text-[#2D2727]">
                    By continuing this payment, you hereby confirm that you are
                    aware and have fully read Cocogen Insurance’s{" "}
                    <button
                        onClick={() => setShowTerms(true)}
                        href="javascript:void(0)"
                        className="font-bold hover:underline hover:underline-offset-4"
                    >
                        Terms and Conditions
                    </button>
                    ,{" "}
                    <button
                        onClick={() => setShowExclusions(true)}
                        href="javascript:void(0)"
                        className="font-bold hover:underline"
                    >
                        Exclusions and Limitations
                    </button>
                    , and{" "}
                    <button
                        onClick={() => setShowPrivacy(true)}
                        href="javascript:void(0)"
                        className="font-bold hover:underline"
                    >
                        Data Privacy
                    </button>
                </div>
            </div>
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-20 gap-8 px-8">
                <button
                    className="text-[#008080] px-5 py-[10px] w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded"
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
                    disabled={!isAgreed}
                    className="text-white bg-[#008080] px-5 py-[10px] rounded w-full md:w-auto flex justify-center gap-2 group disabled:opacity-50"
                    onClick={() => setShowPayNow(true)}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        className={`bi bi-arrow-right-short hidden  ${
                            !isAgreed ? "" : "group-hover:block"
                        }`}
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                        />
                    </svg>
                    <span>Pay Now</span>
                </button>
            </div>
            <div
                class={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                    !showPayNow && "hidden"
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
                        class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="flex flex-col md:flex-row items-center md:items-start justify-center">
                            <img src={paymentLogo} alt="" className="w-44" />
                            <div class="bg-white flex flex-col items-center md:items-start justify-between px-2 md:px-6 gap-5 my-3">
                                <p className="text-[27px] leading-6 text-[#2D2727] font-bold">
                                    Proceed to payment
                                </p>
                                <p className="font-medium text-base leading-6 text-[#3B3939] text-center md:text-start">
                                    You are about to pay{" "}
                                    <span className="font-bold">
                                        ₱{formData.quotation.package.due}
                                    </span>{" "}
                                    to Cocogen Insurance Inc., for{" "}
                                    <span className="font-bold">
                                        {formData.request_info.plan} Plan
                                    </span>
                                    .
                                </p>
                                <p className="font-medium text-base leading-6 text-[#3B3939] mb-5 text-center md:text-start">
                                    Do you want to proceed to payment?
                                </p>
                                <div className="flex flex-col-reverse md:flex-row items-start justify-center gap-4 w-full">
                                    <button
                                        className="text-[#008080] font-medium text-base leading-6 py-3 px-4 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                        onClick={() => {
                                            setShowPayNow(false);
                                        }}
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
                                        <span>No, review quote</span>
                                    </button>
                                    {!isLoading ? (
                                        <button
                                            onClick={handleSubmit}
                                            type="button"
                                            className="bg-[#008080] text-white font-medium text-base leading-6 py-3 px-4 rounded w-full md:w-auto disabled:opacity-40 md:flex gap-2 group"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                fill="currentColor"
                                                className="bi bi-arrow-right-short hidden md:group-hover:block"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                                                />
                                            </svg>
                                            <span>Yes, proceed to payment</span>
                                        </button>
                                    ) : (
                                        <button
                                            type="button"
                                            disabled
                                            class="bg-[#008080] flex items-center justify-center text-white font-medium text-xs leading-5 py-3 px-6 rounded w-full md:w-auto disabled:opacity-70 gap-2 group"
                                        >
                                            <div
                                                className="w-5 h-5 rounded-full border-2 border-white border-t-purple-200 animate-spin mr-2"
                                                role="status"
                                                aria-label="Loading"
                                            >
                                                <span className="sr-only">
                                                    Loading...
                                                </span>
                                            </div>
                                            Loading...
                                        </button>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class={`fixed z-50 overflow-y-auto top-20 w-full left-0 h-full ${
                    !showTerms && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-2 pb-20 text-center sm:p-0 overflow-hidden">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full border-t-4 border-[#E4509A]"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white flex flex-col justify-between px-2 gap-5 mt-5 mb-10 overflow-auto text-sm">
                            <p className="font-bold text-[23px] leading-6 text-black text-center">
                                Terms & Conditions
                            </p>
                            <p>
                                The Cocogen Insurance, Inc. website, e-mail
                                newsletters, and mobile services, and any and
                                all materials contained therein, are information
                                services provided by Cocogen, the use of which
                                shall be subject to the following terms and
                                conditions.
                            </p>
                            <p>
                                By accessing the Cocogen information services
                                and their content, you acknowledge and agree
                                that you have read and understood the following
                                terms and conditions and agree to be bound by
                                them.
                            </p>
                            <p>
                                As used below, the terms “we”, “us”, and “our”
                                refer to Cocogen.
                            </p>
                            <ol className="list-decimal flex flex-col px-4 gap-3">
                                <li>
                                    <p className="font-bold">Content</p>
                                    <p>
                                        Cocogen information services are
                                        available for information purposes only.
                                        The publication and posting of any
                                        content and access to any of the Cocogen
                                        information services do not constitute,
                                        either explicitly or implicitly, any
                                        provision of services or products by us.
                                        Information concerning Cocogen products
                                        or services is only available from the
                                        relevant Cocogen companies
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">NO OFFER</p>
                                    <p>
                                        No information contained in this website
                                        or in any of Cocogen information
                                        services should be construed as an offer
                                        or a solicitation for an offer, as a
                                        statement of law, or as counsel on
                                        investment, legal, tax, or other
                                        matters. In case of any ambiguity or
                                        doubts in the information in Cocogen’s
                                        website, you are advised to verify or
                                        check with us or seek appropriate
                                        professional or legal advice.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        NO DUTY TO UPDATE
                                    </p>
                                    <p>
                                        We reserve the right to update, modify,
                                        revise and change all the contents of
                                        our website and other Cocogen
                                        information services. We are not obliged
                                        to notify you of any changes made on our
                                        Terms and Conditions. However, we will
                                        endeavor to regularly update the
                                        contents of the website and other
                                        Cocogen information services.
                                        <br />
                                        <br />
                                        Your continuous access to website
                                        following any change in the website
                                        signifies that you agree to be bound by
                                        the Terms and Conditions, as revised.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        COPYRIGHT AND TRADEMARKS
                                    </p>
                                    <p>
                                        All information, photographs, service
                                        marks, logos, artworks and all other
                                        contents of the website and other
                                        Cocogen information services are owned,
                                        controlled or licensed by or to Cocogen
                                        or its third party licensors, and are
                                        protected by intellectual property laws.
                                        <br />
                                        <br />
                                        The limited use, copying and
                                        distribution without alteration of any
                                        of the materials and information
                                        contained in the Cocogen website and
                                        other Cocogen information services and
                                        the use of said materials and
                                        information shall be allowed for
                                        non-commercial purposes only: provided
                                        that all copyright and other proprietary
                                        notices shall appear in all copies of
                                        the materials and the information in the
                                        same manner as the original. The use of
                                        the materials for all other purposes is
                                        prohibited.
                                        <br />
                                        <br />
                                        You shall not use any portion of this
                                        website, or any other intellectual
                                        property of Cocogen, including but not
                                        limited to its service marks, on any
                                        other website, in the source code of any
                                        other website, or in any other printed
                                        or electronic materials without the
                                        prior written consent of Cocogen. You
                                        shall not modify, publish, reproduce,
                                        republish, create derivative works,
                                        copy, upload, post, transmit,
                                        distribute, or otherwise use any of the
                                        Cocogen information services’ contents
                                        or frame the Cocogen website within any
                                        other website without prior written
                                        consent of Cocogen. Systematic retrieval
                                        of data from this website to create or
                                        compile, directly or indirectly, a
                                        collection, compilation, database or
                                        directory, without prior written consent
                                        from Cocogen, is prohibited. Linking
                                        from another website to any page in this
                                        website is strictly prohibited without
                                        prior written consent of Cocogen.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">NO WARRANTY</p>
                                    <p>
                                        All contents on any and all Cocogen
                                        information services, including, but not
                                        limited to, graphics, text, and
                                        hyperlinks or references to other sites,
                                        are subject to change without prior
                                        notice and without warranty of any kind,
                                        express or implied, including, but not
                                        limited to, sustainability for a
                                        particular purpose, non-infringement and
                                        freedom of rights of third parties.
                                        <br />
                                        <br />
                                        We do not guarantee the adequacy,
                                        accuracy, reliability or completeness of
                                        any information provided by the Cocogen
                                        information services and expressly
                                        disavow any liability for errors or
                                        omissions therein. The user is
                                        responsible for the assessment of the
                                        information’s adequacy, accuracy,
                                        reliability, and completeness.
                                        <br />
                                        <br />
                                        We do not guarantee that the functions
                                        of the Cocogen information services will
                                        be uninterrupted and/or error-free, and
                                        that the defects and errors will be
                                        corrected or that the Cocogen
                                        information services or the servers that
                                        make them available are free from
                                        computer viruses or other harmful
                                        components.
                                        <br />
                                        <br />
                                        Should your machine which includes but
                                        is not limited to your desktop, laptop,
                                        or smartphone, be infected by such
                                        viruses while using Cocogen information
                                        services, you shall assume the entire
                                        cost of all necessary servicing,
                                        repairs, or corrections.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        HYPERLINKED AND REFERENCED WEBSITES
                                    </p>
                                    <p>
                                        Certain hyperlinks or referenced
                                        websites in the Cocogen information
                                        services may take you to third-party
                                        websites and we do not guarantee the
                                        adequacy, accuracy, reliability, or
                                        completeness of any information on
                                        hyperlinked or referenced websites. We
                                        disclaim any liability for any and all
                                        of the contents of said hyperlinked or
                                        reference websites.
                                        <br />
                                        <br />
                                        The hyperlinks to other websites are
                                        offered for your convenience only. Their
                                        presence in our website does not imply
                                        that we endorse such websites or that
                                        products or services that are described
                                        therein are our own. We likewise do not
                                        guarantee the correctness and accuracy
                                        of the information in said hyperlinked
                                        websites.
                                        <br />
                                        <br />
                                        We remind you that different terms and
                                        conditions will apply for your use of
                                        such websites and that your access to
                                        third-party websites is entirely at your
                                        risk.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        CONFIDENTIALITY OF INFORMATION
                                    </p>
                                    <p>
                                        By using the Cocogen information
                                        services, you agree, understand, and
                                        confirm that the any and all
                                        information, including your credit or
                                        debit card details, you provide to
                                        access Cocogen information services or
                                        to availing of our any of the services
                                        in said services are owned by you or
                                        that you have lawful authority to use
                                        said information.
                                        <br />
                                        <br />
                                        We commit that we will not disclose,
                                        utilize, and share the said information
                                        to any third parties unless required by
                                        law, regulation or court order.
                                        <br />
                                        <br />
                                        We, as a merchant, shall be under no
                                        liability whatsoever in respect of any
                                        loss or damage resulting directly or
                                        indirectly from the decline of
                                        authorization by the card issuer for any
                                        transaction on account of the cardholder
                                        having exceeded the limit mutuallyagreed
                                        by us with our acquiring bank from time
                                        to time.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        REFUND AND CANCELLATIONS
                                    </p>
                                    <p>
                                        For concerns regarding refunds and
                                        cancellation of policies, please free to
                                        contact our Client Services Center via
                                        phone at 8830-6000 or via email at
                                        client_services@cocogen.com. Please be
                                        informed that cancellations will be
                                        subject to the specific terms and
                                        conditions of the policy sought to be
                                        canceled.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        LOCAL LEGAL RESTRICTIONS
                                    </p>
                                    <p>
                                        Any information appearing on this
                                        website is provided in accordance with
                                        and subject to the laws of the Republic
                                        of the Philippines.
                                        <br />
                                        <br />
                                        Cocogen information services are not
                                        intended for any person in any
                                        jurisdiction where (by virtue of that
                                        person’s nationality, residence or
                                        otherwise) the publication or
                                        availability of Cocogen information
                                        services is prohibited. Persons to whom
                                        such prohibition applies may not access
                                        the Cocogen information services.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        RESERVATION OF RIGHTS
                                    </p>
                                    <p>
                                        We reserve the right to change, modify,
                                        add to, or remove sections of these
                                        terms of use at any time.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        GOVERNING LAW AND DISPUTE RESOLUTION
                                    </p>
                                    <p>
                                        You agree that all matters relating to
                                        your use and access of all Cocogen
                                        information services shall be governed
                                        by the laws of the Republic of the
                                        Philippines. Any dispute, controversy or
                                        claim arising out of or relating to this
                                        Terms and Conditions, or the breach,
                                        termination or invalidity thereof shall
                                        be settled by arbitration in accordance
                                        with the PDRCI Arbitration Rules as at
                                        present in force.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        ENTIRE AGREEMENT
                                    </p>
                                    <p>
                                        This Agreement constitutes the entire
                                        agreement between you and Cocogen with
                                        respect to your access and/or use of
                                        this website.
                                    </p>
                                </li>
                            </ol>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => setShowTerms(false)}
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
                                    <span>Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class={`fixed z-50 overflow-y-auto top-20 md:top-10 w-full left-0 h-full ${
                    !showExclusions && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-2 pb-20 text-center sm:p-0 overflow-hidden">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full border-t-4 border-[#E4509A]"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white flex flex-col justify-between px-2 gap-5 overflow-auto text-sm">
                            <p className="font-bold text-[23px] leading-6 text-black text-center">
                                Exclusions and limitations
                            </p>
                            <ul className="flex flex-col px-4 gap-3 list-disc">
                                <li>
                                    War, invasion act of foreign enemy,
                                    hostilities (whether war be declared or
                                    not), civil war, rebellion, revolution,
                                    insurrection, mutiny, military or usurped
                                    power, or malicious persons acting on behalf
                                    of, or in connection with, any political
                                    organization, confiscation, commandeering,
                                    requisition, or destruction of or damage to
                                    property by order of the government de jure
                                    or defacto or by any public authority;
                                </li>
                                <li>
                                    Strike, lock-out, riot, civil commotion, or
                                    terrorist attacks;
                                </li>
                                <li>
                                    Nuclear reaction, nuclear radiation or
                                    radioactive contamination.
                                </li>
                                <li>
                                    Willful acts or gross negligence on the part
                                    of the insured or one of his
                                    representatives.
                                </li>
                                <li>
                                    Material defects, manufacturing
                                    discrepancies.
                                </li>
                                <li>
                                    Consequential loss of any kind or
                                    description, whatsoever.
                                </li>
                                <li>
                                    Damages or loss where a third party
                                    supplier, manufacturer or retailers,
                                    carrier, forwarding agents or contractor is
                                    liable for.
                                </li>
                                <li>
                                    Wear and tear, abrasion and ageing of any
                                    part of the insured item naturally resulting
                                    from ordinary use, or working, or gradual
                                    deterioration.
                                </li>
                                <li>
                                    Aesthetic defects such as scratches on
                                    surfaces and screens.
                                </li>
                                <li>
                                    Any loss caused by: malware, ransomware,
                                    spyware, or any other malicious code or
                                    software intentionally designed to damage
                                    the device.
                                </li>
                                <li>
                                    Devices set for rental use, such as
                                    computers in computer shops.
                                </li>
                                <li>
                                    If the device is still under warranty and
                                    the loss is recoverable under its terms, the
                                    insured must file a claim under the warranty
                                    first.
                                </li>
                            </ul>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => setShowExclusions(false)}
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
                                    <span>Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class={`fixed z-50 overflow-y-auto top-20 w-full left-0 h-full ${
                    !showPrivacy && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-2 pb-20 text-center sm:p-0 overflow-hidden">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full border-t-4 border-[#E4509A]"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white flex flex-col justify-between px-2 gap-4 mt-5 mb-12 overflow-auto text-sm">
                            <p className="font-bold text-[23px] leading-6 text-black text-center">
                                Privacy Policy
                            </p>
                            <p className="text-xl text-[#008080] font-bold">
                                Declaration and Consent
                            </p>
                            <p>
                                I hereby apply for insurance as set out in the
                                above application form and declare, to the best
                                of my knowledge and belief, that the foregoing
                                statements and particulars are true and
                                complete. I hereby agree to notify Cocogen of
                                any material change in the information as stated
                                above.
                            </p>
                            <p>
                                I hereby certify that I voluntarily and
                                expressly consent to the collection, processing,
                                sharing, storing of my personal and/or sensitive
                                information by Cocogen for the purpose/s
                                necessary in processing my insurance policy and
                                in any related transactions and/or in other
                                purposes as stated in the Data Privacy Statement
                                of Cocogen or in www.cocogen.com/data-privacy. I
                                hereby certify that I carefully understood the
                                terms above before giving my consent.
                            </p>
                            <p className="text-xl text-[#008080] font-bold">
                                Privacy Policy
                            </p>
                            <p>
                                We, Cocogen, upholds an individual’s data
                                privacy rights and assures that all your
                                personal data, sensitive personal data and
                                privileged information (collectively, “Personal
                                Data”), collected and to be collected, are
                                processed in compliance to the Data Privacy Act
                                of 2012 (RA No. 10173 and its Implementing Rules
                                and Regulations (IRR)).
                            </p>
                            <p>
                                This Privacy Policy provides information on how
                                we collect, use, manage and secure your personal
                                data necessary to serve you better. Any
                                information you provide to us indicates your
                                express consent to the content of our Privacy
                                Policy.
                            </p>
                            <p>
                                Collection of Personal Data: We collect the
                                following personal data from you when you apply
                                for our insurance products and services such as
                                your:
                            </p>
                            <ul className="flex flex-col px-6 gap-2 list-disc">
                                <li>
                                    Name, birth date, place of birth, sex,
                                    nationality;
                                </li>
                                <li>
                                    Address (permanent and present addresses);
                                </li>
                                <li>
                                    Contract number or information (email
                                    address, telephone number and mobile
                                    number);
                                </li>
                                <li>
                                    PhilID or Government ID information
                                    (Passport, SSS or GSIS ID, driver’s license,
                                    postal ID); and
                                </li>
                                <li>
                                    Source of funds or property and occupation.
                                </li>
                            </ul>
                            <p>
                                When you provide information other than yours,
                                you undertake that you properly obtained their
                                consent. You also certify that all personal data
                                you submit is accurate, complete and up-to-date.
                            </p>
                            <p>
                                We may collect this information when you submit
                                your application personally or through our
                                distribution partners, insurance agents and
                                brokers or when you call us, visit our websites
                                and social media advertisements, submit to us as
                                part your application and claims requirements;
                                and, information that we gather from
                                third-parties such as but not limited to
                                subsidiaries, reinsurers, business partners.
                            </p>
                            <p>
                                <span className="font-semibold">Use:</span> The
                                collected personal data shall be used to process
                                your transactions (e.g. insurance quotations and
                                applications, policy issuance, claims servicing,
                                premium payments); communicate and respond to
                                your request; send your statements billings and
                                notices for your insurance coverage; serve as a
                                reference for promotional information regarding
                                our products; conduct surveys and inform through
                                phone, mail, email, SMS or other communication
                                facility in order to help us take better care of
                                your insurance needs and allow us improve our
                                products and services for you; comply with the
                                directives issued by regulatory bodies; assist
                                the Company in risk management, identity and
                                claim verification and prevent and detect fraud;
                                and, perform any other actions as may be
                                necessary to implement the terms and conditions
                                of our contract.
                            </p>
                            <p>
                                We may disclose and share your personal data to
                                the following:
                            </p>
                            <ul className="flex flex-col px-6 gap-2 list-disc">
                                <li>
                                    Our employee handling your account and
                                    requests;
                                </li>
                                <li>
                                    Our subsidiaries, affiliates and third-party
                                    service providers performing
                                    financial,administrative technical and other
                                    ancillary services;
                                </li>
                                <li>
                                    Banks for bancassurance transactions,
                                    reinsurance partners and professional
                                    advisers performing due diligence checks;
                                </li>
                                <li>
                                    Marketing intermediaries, agents, brokers
                                    and distributors;
                                </li>
                                <li>
                                    Government institution and other competent
                                    authorities which by law, rules or
                                    regulations requires us to disclose.
                                </li>
                                <li>
                                    Claim investigation companies, loss
                                    adjusters, assessors/claims investigators,
                                    suppliers, repairers;
                                </li>
                                <li>
                                    Person or entity that we contractually
                                    entered with that ensures the
                                    confidentiality standard we implement and
                                    adhere to the DPA.
                                </li>
                                <li>
                                    Any person that fall within matters of
                                    public concern, in order to carry out
                                    functions of public authority only to the
                                    extent of collection andfurther processing
                                    consistent with a constitutionally or
                                    statutorily mandated function pertaining to
                                    law enforcement, taxation and other
                                    regulatory function.
                                </li>
                            </ul>
                            <p>
                                Thus, as a rule, Cocogen is not allowed to share
                                your personal data to third party. However, by
                                giving your consent, you authorize Cocogen to
                                disclose your personal data to the
                                aforementioned individuals and entities that is
                                necessary for the proper execution of processes
                                related to the declared purposes in this Privacy
                                Policy and Consent and may not use it for any
                                other purpose.
                            </p>
                            <p>
                                <span className="font-semibold">
                                    Protection Measures:
                                </span>{" "}
                                To maintain the integrity and confidentiality of
                                your personal data, we have implemented measures
                                to secure and protect it from theft, loss,
                                penetration or breach. We put in place
                                organizational, physical and technical security
                                measures necessary to protect your personal
                                data. We will retain your personal data for as
                                long as necessary to fulfill the purposes of
                                your transactions with the Company, unless a
                                longer period is allowed or required by law.
                                After which physical records shall be disposed
                                of through shredding while digital files shall
                                be anonymized.
                            </p>
                            <p>
                                <span className="font-semibold">
                                    Contact Us:
                                </span>{" "}
                                To exercise your rights under the DPA which
                                include right to erase, block, modify and object
                                to processing your personal data or should you
                                have any inquiries or concerns on this Privacy
                                Policy and Consent and/or complaints, you may
                                contact our Data Protection Officer at:
                            </p>
                            <p className="font-semibold">
                                Cocogen Data Protection Officer
                            </p>
                            <p>
                                <span className="font-semibold">Address:</span>{" "}
                                22F One Corporate Center, Doña Julia <br />
                                Vargas Avenue corner Meralco Avenue, Ortigas{" "}
                                <br />
                                Center, Pasig City
                            </p>
                            <p>
                                <span className="font-semibold">Email:</span>{" "}
                                dpo@cocogen.com
                            </p>
                            <p>
                                Kindly browse through our Privacy Policy at{" "}
                                <a
                                    href="/"
                                    className="text-[#008080] hover:underline"
                                >
                                    www.cocogen.com
                                </a>{" "}
                                to know more on how we protect your personal
                                data.
                            </p>
                            <p className="text-xl text-[#008080] font-bold">
                                Data Privacy Consent
                            </p>
                            <p>
                                I hereby certify that I explicitly and
                                unambiguously consent to the collection,
                                processing, sharing, storing of my/our personal
                                data by Cocogen for the purposes/s described in
                                this Privacy Policy. I hereby certify that I
                                carefully understood and comprehend the terms
                                above before giving our consent. I further
                                acknowledge that I have acquired the consent
                                from all parties relevant to this consent and
                                hold free and harmless Cocogen from any
                                complaint, suit or damages which any party may
                                file or claim in relation to my consent.
                            </p>
                            <p className="text-semibold">
                                Important: Section 251 of the Insurance Code, as
                                amended, imposes a fine not exceeding twice the
                                amount claimed and/or imprisonment of 2 years,
                                or both, at the discretion of the court, to any
                                person who presents or causes to be presented
                                any fraudulent claim for the payment of a loss
                                under a contract of insurance, and who
                                fraudulently prepares, makes or subscribes any
                                writing with intent to present or use the same,
                                or to allow it to be presented in support of any
                                claim.
                            </p>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => setShowPrivacy(false)}
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
                                    <span>Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default LastPage;
