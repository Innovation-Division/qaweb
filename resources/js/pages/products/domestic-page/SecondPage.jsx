import React, { useState } from "react";
import { format } from "date-fns";

const SecondPage = ({
    formData,
    setFormData,
    prevStep,
    nextStep,
    promoData,
}) => {
    const [showDetails, setShowDetails] = useState(false);
    const [showCoverage, setShowCoverage] = useState(false);
    const [showAssist, setShowAssist] = useState(false);
    const [showSubjectivities, setShowSubjectivities] = useState(false);

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
        <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full md:px-8">
            <div className="flex items-center justify-center w-full py-6 md:py-12 px-5">
                <h2 className="text-[#2D2727] text-base md:text-[27px] text-center font-medium md:font-bold">
                    You are about to get Domestic Travel{" "}
                    {formData.request_info.plan} Plan
                </h2>
            </div>
            <div className="flex items-center justify-center w-full md:mb-5">
                <div className="flex flex-col max-w-[800px] w-full py-6 md:py-12 md:bg-white md:border border-[#E0F5F5] rounded md:px-24">
                    <div className="flex justify-between items-center px-8 md:px-0">
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
                                className="w-5 h-5 md:h-8 md:w-8"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        </span>
                    </div>

                    <div className="my-3 md:my-6 space-y-5 w-full px-8 md:px-0">
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
                    </div>
                    <div className="flex flex-col w-full bg-[#FCFCFC] py-5 gap-2">
                        <div className="flex justify-between px-12 md:px-4">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Net Premium
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.net_premium}
                            </p>
                        </div>
                        <div className="flex justify-between px-12 md:px-4">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Documentary Stamp
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.doc_stamp}
                            </p>
                        </div>
                        <div className="flex justify-between px-12 md:px-4">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Premium Tax
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.premium_tax}
                            </p>
                        </div>
                        <div className="flex justify-between px-12 md:px-4">
                            <p className="text-[#2D2727] font-medium text-sm leading-6">
                                Local Government Tax
                            </p>
                            <p className="text-[#2D2727] text-sm md:text-base md:font-bold leading-6">
                                ₱{formData.quotation.package.lgt}
                            </p>
                        </div>

                        {formData.request_info.promo_code_type === "yes" && (
                            <div className="flex justify-between px-12 md:px-4">
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
                    <div className="flex justify-between bg-[#F5F5F5] py-6 px-12 md:px-4 mb-5">
                        <p className="text-[#585858] font-medium text-sm leading-6">
                            Total Premium
                        </p>
                        <p className="text-[#2D2727] text-sm md:text-[23px] font-medium md:font-bold leading-6">
                            ₱{formData.quotation.package.due}
                        </p>
                    </div>
                    {formData.request_info.promo_code_type === "yes" && (
                        <div className="flex bg-[#FFF9EC] py-6 px-6 md:px-4 gap-5 mb-5">
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
                    <div className="flex bg-[#FFF9EC] py-6 px-6 md:px-4 gap-5">
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
            {formData.quotation.package && (
                <div className="flex items-center bg-[#E1F4E5] gap-4 py-5 px-8 max-w-[800px] w-full">
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
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-20 gap-5 px-8">
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
                    className="text-white bg-[#008080] px-5 py-[10px] rounded w-full md:w-auto flex justify-center gap-2 group"
                    onClick={nextStep}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        className="bi bi-arrow-right-short hidden group-hover:block"
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

export default SecondPage;
