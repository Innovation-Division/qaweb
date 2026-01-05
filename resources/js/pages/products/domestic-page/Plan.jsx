import { Navigation, Pagination, Scrollbar, A11y } from "swiper/modules";

import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";
import { useState } from "react";
import { showProPlanConfirmation } from "../../../components/PlanSelectedToast";

const Plan = ({
    formData,
    setFormData,
    handleBacktoFirstPageTwo,
    plan = null,
    setPlan,
    handleContinuetoSecondPage,
    planPremiums,
}) => {
    const [tempPlan, setTempPlan] = useState(
        formData.quotation?.package?.package
    );
    const [proPremium, setProPremium] = useState(planPremiums["Pro"] || {});
    const [packetPremium, setPacketPremium] = useState(
        planPremiums["Packet"] || {}
    );
    const [preSelectedPlan, setPreSelectedPlan] = useState(
        { package: formData.quotation.package } || {}
    );
    const handleApply = async () => {
        await setPlan(tempPlan);

        await setFormData({
            ...formData,
            request_info: {
                ...formData.request_info,
                plan: plan,
            },
            quotation: {
                package: preSelectedPlan["package"],
            },
        });

        handleContinuetoSecondPage();
    };

    const handlePlanSelection = (plan, price) => {
        showProPlanConfirmation(plan, price);
    };

    return (
        <>
            <style
                dangerouslySetInnerHTML={{
                    __html: `
                .swiper-button-next:after,
.swiper-rtl .swiper-button-prev:after {
    content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' viewBox='0 0 16 16'%3E%3Cpath fill='%232E2E2ECC' d='M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/%3E%3C/svg%3E") !important;
}

.swiper-button-prev:after,
.swiper-rtl .swiper-button-next:after {
    content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' viewBox='0 0 16 16'%3E%3Cpath fill='%232E2E2ECC' d='M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z'/%3E%3C/svg%3E") !important;
    transform: rotate(180deg) !important;
}

.swiper-button-prev,
.swiper-rtl {
    left: var(--swiper-navigation-sides-offset, 250px) !important;
}

.swiper-button-prev,
.swiper-button-next {
    top: var(--swiper-navigation-top-offset, 34%) !important;
}
          `,
                }}
            />
            <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full">
                <div className="flex items-center justify-center w-full py-6 md:py-12">
                    <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                        Comparison of Benefits
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        </span>
                    </h2>
                </div>
                <div className="flex justify-between sm:hidden w-full bg-white mb-5 px-4">
                    <div className="flex flex-col gap-3 basis-2/3 pt-5 px-0 pb-0">
                        <p className="text-[#2D2727] font-medium text-lg">
                            Standard Coverages
                        </p>
                        <p className="text-[#2D2727] font-bold text-sm">
                            Pa Coverages
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Accidental Death and <br /> Disablement
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Accidental Medical <br /> Reimbursement
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Accidental Burial Benefit
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Unprovoked Murder and <br /> Assault
                        </p>
                        <p className="text-[#2D2727] font-bold text-sm leading-6">
                            Travel Assistance
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Medical expenses (With <br /> Sabotage and
                            Terrorism) and <br />
                            hospitalization
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Transport or repatriation in <br /> case of illness
                            or accident
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Repatriation of Mortal <br /> Remains
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Pre-existing Condition within the Look <br />
                            Back Period
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Trip Cancellation
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Trip Curtailment
                        </p>
                        {formData.request_info.travel_type === "Air Plan" && (
                            <>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    Delayed Departure
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    Baggage Delay
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    Compensation for In-Flight Loss and <br />{" "}
                                    Damage (Checked-In Baggage)
                                </p>
                            </>
                        )}

                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Long Distance Medical <br /> Information Services
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Medical Referral/ <br /> Appointment of Local <br />{" "}
                            Medical Specialists
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                            Connection Services
                        </p>
                        <p className="text-[#2D2727] font-medium text-sm text-center leading-6 py-2 bg-[#E0F5F5] -mt-3">
                            Amount
                        </p>
                    </div>
                    <Swiper
                        // install Swiper modules
                        modules={[Navigation, Pagination, Scrollbar, A11y]}
                        spaceBetween={50}
                        slidesPerView={1}
                        navigation
                        className="basis-1/3 text-center swiper-no-swiping"
                    >
                        <SwiperSlide>
                            <div className="bg-[#008080] text-white text-xs font-medium py-2 px-4 rounded-tl-lg rounded-tr-lg">
                                Recommended
                            </div>
                            <div
                                className={`flex flex-col gap-3 p-5 pb-0 px-0  ${
                                    tempPlan === "Pro" &&
                                    "border-x border-[#008080]"
                                } `}
                            >
                                <p className="text-[#2D2727] font-medium text-base mb-1">
                                    Pro
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    ₱500,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    ₱50,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    ₱50,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    ₱500,000.00
                                </p>
                                <p className="text-[#2D2727] font-bold text-sm leading-6 mb-16"></p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-8">
                                    ₱500,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    ₱25,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    ₱25,000.00
                                </p>
                                <p
                                    className={`text-[#2D2727] font-medium text-sm leading-6 ${
                                        formData.request_info.travel_type ===
                                        "Air Plan"
                                            ? ""
                                            : "mb-5"
                                    }`}
                                >
                                    ₱25,000.00
                                </p>
                                {formData.request_info.travel_type ===
                                    "Air Plan" && (
                                    <>
                                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                                            Up to ₱10,000.00
                                        </p>
                                        <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                            Up to ₱5,000.00
                                        </p>
                                        <p className="text-[#2D2727] font-medium text-sm leading-6 mb-5">
                                            Up to ₱10,000.00
                                        </p>
                                    </>
                                )}

                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-5">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-8">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    Actual Expense
                                </p>
                            </div>
                            <p className="text-[#2D2727] font-medium text-sm text-center leading-6 py-2 bg-[#E0F5F5] w-full border-[#E0F5F5]">
                                ₱{proPremium.due}
                            </p>
                            {tempPlan === "Pro" ? (
                                <p className="font-medium text-sm text-center leading-6 py-2 bg-[#E4509A] rounded text-white w-full">
                                    Selected
                                </p>
                            ) : (
                                <button
                                    className="font-medium text-sm text-center leading-6 py-2 rounded text-[#008080] w-full"
                                    onClick={() => {
                                        setTempPlan("Pro");
                                        handlePlanSelection(
                                            "Pro",
                                            proPremium.due
                                        );
                                        setPreSelectedPlan({
                                            package: proPremium,
                                        });
                                    }}
                                >
                                    Select
                                </button>
                            )}
                        </SwiperSlide>
                        <SwiperSlide>
                            <div
                                className={`flex flex-col gap-3 p-5 pb-0 px-0 mt-8 ${
                                    tempPlan === "Packet" &&
                                    "border border-[#008080] border-b-0"
                                }`}
                            >
                                <p className="text-[#2D2727] font-medium text-base mb-1">
                                    Packet
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    ₱250,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    ₱25,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    ₱25,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    ₱250,000.00
                                </p>
                                <p className="text-[#2D2727] font-bold text-sm leading-6 mb-16"></p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-8">
                                    ₱250,000.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                    ₱12,500.00
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    ₱25,000.00
                                </p>
                                <p
                                    className={`text-[#2D2727] font-medium text-sm leading-6 ${
                                        formData.request_info.travel_type ===
                                        "Air Plan"
                                            ? ""
                                            : "mb-5"
                                    }`}
                                >
                                    ₱25,000.00
                                </p>
                                {formData.request_info.travel_type ===
                                    "Air Plan" && (
                                    <>
                                        <p className="text-[#2D2727] font-medium text-sm leading-6">
                                            Up to ₱10,000.00
                                        </p>
                                        <p className="text-[#2D2727] font-medium text-sm leading-6 mb-6">
                                            Up to ₱5,000.00
                                        </p>
                                        <p className="text-[#2D2727] font-medium text-sm leading-6 mb-5">
                                            Up to ₱10,000.00
                                        </p>
                                    </>
                                )}

                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-5">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6 mb-8">
                                    Actual Expense
                                </p>
                                <p className="text-[#2D2727] font-medium text-sm leading-6">
                                    Actual Expense
                                </p>
                            </div>
                            <p className="text-[#2D2727] font-medium text-sm text-center leading-6 py-2 bg-[#E0F5F5] w-full">
                                ₱{packetPremium.due}
                            </p>
                            {tempPlan === "Packet" ? (
                                <p className="font-medium text-sm text-center leading-6 py-2 bg-[#E4509A] rounded text-white w-full">
                                    Selected
                                </p>
                            ) : (
                                <button
                                    onClick={() => {
                                        setTempPlan("Packet");
                                        handlePlanSelection(
                                            "Packet",
                                            packetPremium.due
                                        );
                                        setPreSelectedPlan({
                                            package: packetPremium,
                                        });
                                    }}
                                    className="font-medium text-sm text-center leading-6 py-2 rounded text-[#008080] w-full"
                                >
                                    Select
                                </button>
                            )}
                        </SwiperSlide>
                    </Swiper>
                </div>
                <div className="hidden sm:flex justify-center items-center max-w-[800px] w-full mb-10">
                    <table className="w-full nth-last-of-type-6:underline">
                        <thead>
                            <tr>
                                <th className="text-[#2D2727] text-[23px] font-medium text-start"></th>
                                <th className="text-[#2D2727] text-[23px] font-bold text-center"></th>
                                <th className="text-sm leading-6 font-medium text-center bg-[#006666] py-2 text-white rounded-tr-lg rounded-tl-lg">
                                    Popular
                                </th>
                            </tr>
                            <tr className="bg-white">
                                <th className="text-[#2D2727] text-[23px] font-medium text-start p-5 md:pb-8">
                                    Coverages
                                </th>
                                <th
                                    className={`text-[#2D2727] text-[23px] font-bold text-center p-5 md:pb-8 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080] border-t"
                                    }`}
                                >
                                    Packet
                                </th>
                                <th
                                    className={`text-[#2D2727] text-[23px] font-bold text-center p-5 md:pb-8 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    } `}
                                >
                                    Pro
                                </th>
                            </tr>
                        </thead>
                        <tbody className="bg-white ">
                            <tr className="mb-10">
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Accidental Death and Disablement
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱250,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱500,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Accidental Medical Reimbursement
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱50,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Accidental Burial Benefit
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱50,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Unprovoked Murder and Assault
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱250,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱500,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-bold text-sm leading-6 p-5 pb-2">
                                    Travel Assistance
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 pb-2 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                ></td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 pb-2 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    } `}
                                ></td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Medical Expenses (with Sabotage and <br />{" "}
                                    Terrorism) and hospitalization
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱250,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱500,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Transport or repatriation in case <br /> of
                                    illness or accident
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Repatriation of mortal remains
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Pre-existing Condition within the Look{" "}
                                    <br /> Back Period
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱12,500.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Trip Cancellation
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Trip Curtailment
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    ₱25,000.00
                                </td>
                            </tr>
                            {formData.request_info.travel_type ===
                                "Air Plan" && (
                                <>
                                    <tr>
                                        <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                            Delayed Departure
                                        </td>
                                        <td
                                            className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                                tempPlan === "Packet" &&
                                                "border-x border-[#008080]"
                                            }`}
                                        >
                                            Up to ₱10,000.00
                                        </td>
                                        <td
                                            className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                                tempPlan === "Pro" &&
                                                "border-x border-[#008080]"
                                            }`}
                                        >
                                            Up to ₱10,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                            Baggage Delay
                                        </td>
                                        <td
                                            className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                                tempPlan === "Packet" &&
                                                "border-x border-[#008080]"
                                            }`}
                                        >
                                            Up to ₱5,000.00
                                        </td>
                                        <td
                                            className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                                tempPlan === "Pro" &&
                                                "border-x border-[#008080]"
                                            }`}
                                        >
                                            Up to ₱5,000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                            Compensation for In-Flight Loss and{" "}
                                            <br /> Damage (Checked-In Baggage)
                                        </td>
                                        <td
                                            className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                                tempPlan === "Packet" &&
                                                "border-x border-[#008080]"
                                            }`}
                                        >
                                            Up to ₱10,000.00 (Subject to
                                            ₱1,000.00 per item)
                                        </td>
                                        <td
                                            className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                                tempPlan === "Pro" &&
                                                "border-x border-[#008080]"
                                            }`}
                                        >
                                            Up to ₱10,000.00 (Subject to
                                            ₱1,000.00 per item)
                                        </td>
                                    </tr>
                                </>
                            )}

                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Long Distance Medical Information <br />{" "}
                                    Services
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Medical Referral / Appointment of <br />{" "}
                                    Local Medical Specialists
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6 p-5 md:pb-6">
                                    Connection Services
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                                <td
                                    className={`text-[#2D2727] font-medium text-sm leading-6 text-center p-5 md:pb-6 px-5 ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    }`}
                                >
                                    Actual Expense
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6"></td>
                                <td
                                    className={`text-[#2D2727] font-bold text-base leading-6 text-center px-5 py-2 bg-[#C0E6E6] ${
                                        tempPlan === "Packet" &&
                                        "border-x border-[#008080]"
                                    } `}
                                >
                                    ₱{packetPremium.due}
                                </td>
                                <td
                                    className={`text-[#2D2727] font-bold text-base leading-6 text-center px-5 py-2 bg-[#C0E6E6] ${
                                        tempPlan === "Pro" &&
                                        "border-x border-[#008080]"
                                    } `}
                                >
                                    ₱{proPremium.due}
                                </td>
                            </tr>
                            <tr>
                                <td className="text-[#2D2727] font-medium text-sm leading-6"></td>
                                {tempPlan === "Packet" ? (
                                    <td className="text-[#2D2727] font-medium text-sm leading-6 text-center bg-[#E4509A] py-3 rounded-[3px]">
                                        <button className="text-white">
                                            Selected
                                        </button>
                                    </td>
                                ) : (
                                    <td className="text-[#2D2727] font-medium text-sm leading-6 text-center py-3">
                                        <button
                                            className="text-[#008080]"
                                            onClick={() => {
                                                setTempPlan("Packet");
                                                handlePlanSelection(
                                                    "Packet",
                                                    packetPremium.due
                                                );
                                                setPreSelectedPlan({
                                                    package: packetPremium,
                                                });
                                            }}
                                        >
                                            Select
                                        </button>
                                    </td>
                                )}
                                {tempPlan === "Pro" ? (
                                    <td className="text-[#2D2727] font-medium text-sm leading-6 text-center bg-[#E4509A] py-3 rounded-[3px]">
                                        <button className="text-white">
                                            Selected
                                        </button>
                                    </td>
                                ) : (
                                    <td className="text-[#2D2727] font-medium text-sm leading-6 text-center  py-3">
                                        <button
                                            className="text-[#008080]"
                                            onClick={() => {
                                                setTempPlan("Pro");
                                                handlePlanSelection(
                                                    "Pro",
                                                    proPremium.due
                                                );
                                                setPreSelectedPlan({
                                                    package: proPremium,
                                                });
                                            }}
                                        >
                                            Select
                                        </button>
                                    </td>
                                )}
                            </tr>
                        </tbody>
                    </table>
                </div>
                {preSelectedPlan.package && (
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
                                {preSelectedPlan.package.package} Plan
                            </b>{" "}
                            with total amount of{" "}
                            <b>₱{preSelectedPlan.package.due}</b>.
                        </div>
                    </div>
                )}
                <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-20 gap-5 px-8">
                    <button
                        className="text-[#008080] px-14 py-[10px] w-full md:w-auto flex group gap-2 justify-center hover:border-[#008080] hover:border"
                        onClick={handleBacktoFirstPageTwo}
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
                        className="px-14 py-2 bg-[#008080] text-white rounded flex justify-center items-center group gap-2 w-full md:w-auto"
                        onClick={handleApply}
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
                        <span>Apply Plan</span>
                    </button>
                </div>
            </div>
        </>
    );
};

export default Plan;
