import { useState } from "react";

const ReviewQuotation = ({ dispatch }) => {
    const [openCarDetails, setOpenCarDetails] = useState(false);

    const handleNext = () => {
        dispatch({ type: "NEXT_STEP" });
    };
    const handlePrev = () => {
        dispatch({ type: "PREVIOUS_STEP" });
    };

    return (
        <div className="flex flex-col w-full max-w-4xl gap-8 md:px-8">
            <div className="flex flex-col w-full gap-4">
                <div className="flex items-center justify-center bg-[#373A3D] md:px-4 py-2 rounded-tl-lg rounded-tr-lg">
                    <p className="text-white font-medium text-sm leading-6">
                        Auto Excel Plus Plan Price Breakdown
                    </p>
                </div>
                <div className="flex flex-col gap-1">
                    <div className="flex justify-between px-4">
                        <p className="text-[#585858] font-medium">
                            Net Premium
                        </p>
                        <p className="text-[#2D2727] font-medium">₱500.00</p>
                    </div>
                    <div className="flex justify-between px-4">
                        <p className="text-[#585858] font-medium">
                            Documentary Stamp
                        </p>
                        <p className="text-[#2D2727] font-medium">20.00</p>
                    </div>
                    <div className="flex justify-between px-4">
                        <p className="text-[#585858] font-medium">VAT</p>
                        <p className="text-[#2D2727] font-medium">20.00</p>
                    </div>
                    <div className="flex justify-between px-4">
                        <p className="text-[#585858] font-medium">
                            Local Government Tax
                        </p>
                        <p className="text-[#2D2727] font-medium">20.00</p>
                    </div>
                </div>
                <div className="flex justify-between bg-[#F5F5F5] p-4">
                    <p className="text-[#585858] font-medium">
                        Total Amount Due
                    </p>
                    <p className="text-[#2D2727] font-medium">₱530.00</p>
                </div>
            </div>
            <div className="border border-[#008080] rounded-sm">
                <button
                    className="flex justify-between w-full p-4 "
                    onClick={() => setOpenCarDetails(!openCarDetails)}
                >
                    <span className="flex text-base font-medium text-[#2D2727] leading-6">
                        Car Details
                    </span>
                    <svg
                        id="arrow1"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        className={`w-7 h-7 text-gray-400 ${
                            openCarDetails &&
                            "bg-[#F0FFFF] md:bg-transparent rotate-180"
                        }`}
                    >
                        <path
                            stroke="#008080"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width={`${openCarDetails ? "1" : "2"}`}
                            d="M19 9l-7 7-7-7"
                        ></path>
                    </svg>
                </button>
                <div
                    className={`${
                        !openCarDetails && "hidden"
                    } flex flex-col px-5 md:px-0 mb-4 md:mb-0`}
                >
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Brand
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            Honda
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Model
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            Civic
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Year
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            2022
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Value of Car
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            ₱800,000
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            MV File Name
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            MV-1038-100
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Engine Number
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            10373-3621
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Body Type
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            Sedan
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Color
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            Red
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Chassis Number
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            10-2992382
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Authorized Seating Capacity
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            5
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Mortagagee
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            No
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Policy Inception Date
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            MM/DD/YYYY
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Bodily Injury
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            ₱200,000
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Property Damage
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            ₱200,000
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Standard Accessories
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            Built-in Stereo, Built-in Aircon,{" "}
                            <br className="hidden md:block" /> 5 Magwheels,
                            Built-in Speaker
                        </p>
                    </div>
                    <div className="flex items-center justify-between border md:border-t-0 md:border-b border-[#F2F2F2] py-3 px-2 md:px-4">
                        <p className="text-[#2D2727] text-xs font-medium basis-1/2">
                            Non-Standard Accessories
                        </p>
                        <p className="text-[#2D2727] text-xs font-medium text-end basis-1/2">
                            Antenna ₱1,000
                        </p>
                    </div>
                </div>
            </div>
            <div className="flex flex-col w-full gap-4">
                <button
                    className="bg-[#013353] text-white rounded-md px-4 py-2 w-full"
                    onClick={handleNext}
                >
                    Continue
                </button>
                <button
                    className="text-[#013353] border border-[#013353] rounded-md px-4 py-2 w-full"
                    onClick={handlePrev}
                >
                    Download Quotation
                </button>
                <button
                    className="text-[#013353] border border-[#013353] rounded-md px-4 py-2 w-full"
                    onClick={handlePrev}
                >
                    Back
                </button>
            </div>
        </div>
    );
};

export default ReviewQuotation;
