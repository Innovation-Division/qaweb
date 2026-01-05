import { useState } from "react";
import claimsBanner from "../../assets/images/claims-banner.png";
import mobileBanner from "../../assets/images/Banner2.png";
import taglineImage from "../../assets/images/tagline.png";
import motorBanner from "../../assets/images/motor.jpg";
import paBanner from "../../assets/images/pa.png";
import PaperSubmission from "./PaperSubmission";
import { useNavigate, useLocation } from "react-router-dom";

function ProductType() {
    const [selectedProduct, setSelectedProduct] = useState("Motor");
    const isPersonalAccidentEnabled = false;
    const [isModalOpen, setIsModalOpen] = useState(false);
    const handleOpen = () => setIsModalOpen(true);
    const handleClose = () => setIsModalOpen(false);
    const handleConfirm = () => {
        setIsModalOpen(false);
    };
    const navigate = useNavigate();
    const location = useLocation();
    const policyData = location.state?.policyData;

    const handleNext = () => {
        navigate("/motor-claims-form", {
            state: {
                product: selectedProduct,
                policyData: policyData,
            },
        });
    };
    return (
        <div className="flex flex-col items-center justify-center gap-6 w-full">
            <div className="-mt-5 w-full">
                <div className="block sm:hidden relative w-full ">
                    <img
                        src={mobileBanner}
                        className="w-full h-full object-cover"
                        alt="Online Claims Banner"
                    />

                    <div className="absolute top-6 text-center w-full h-full px-4">
                        <div className="relative size-32">
                            <div className="absolute inset-y-1 left-[-15px] w-auto whitespace-nowrap text-xl font-bold text-white ml-4 flex gap-4 font-mono leading-[1.5]">
                                Online Claims
                            </div>
                        </div>
                    </div>

                    <div className="absolute top-4 right-1 text-left font-medium text-[#2D2727] text-[9px] font-mono leading-[1] mr-2 mt-3">
                        <div>COMMITTED.</div>
                        <div>COMPASSIONATE.</div>
                        <div>GENUINE.</div>
                    </div>
                </div>

                <div className="relative w-full hidden sm:block h-[170px] md:h-[180px]">
                    <img
                        src={claimsBanner}
                        className="w-full h-full object-cover"
                        alt="Online Claims Banner"
                    />

                    <div className="absolute top-[47%] left-9 text-white font-mono font-bold text-2xl md:text-4xl lg:text-5xl leading-tight">
                        Online Claims
                    </div>

                    <div className="absolute top-[-2rem] md:top-[-2rem] lg:top-[-5rem] right-6 md:right-12 lg:right-2">
                        <img
                            src={taglineImage}
                            alt="Committed Compassionate Genuine"
                            className="w-[160px] sm:w-[220px] md:w-[260px] lg:w-[375px] object-contain"
                        />
                    </div>
                </div>
                <div className="bg-[#EFF2F4] flex justify-center px-12 py-6 mb-10 w-full z-50 relative">
                    <div className="flex flex-col gap-2 text-center">
                        <p className="text-sm text-[#2D2727] font-medium mt-5 md:mt-0">
                            Sorry, this service is not available for now.
                            Contact our{" "}
                            <a
                                href="https://www.cocogen.com/client-services"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="text-sm text-[#008080] font-medium cursor-pointer z-50 relative"
                            >
                                Customer Service
                            </a>{" "}
                            to file Personal Accident claim.
                        </p>
                    </div>
                </div>
            </div>
            <p className="font-bold text-[25px] md:text-[35px] text-[#2D2727]">
                Product Type
            </p>
            <p className="font-semibold text-sm md:text-xl text-[#585858]">
                Select one product line
            </p>
            <div className="flex flex-col md:flex-row gap-6">
                <div
                    className={`flex flex-col items-center md:w-[400px] w-[330px] bg-white rounded-lg shadow-[-1px_3px_10px_-1px_rgba(221,221,221,0.5)] ${
                        selectedProduct === "Motor"
                            ? "ring-2 ring-[#60B3B3]"
                            : ""
                    }`}
                    onClick={() => setSelectedProduct("Motor")}
                >
                    <img
                        src={motorBanner}
                        alt="Motor Claim"
                        className="w-[400px] h-[280px] object-cover rounded-t-lg"
                    />
                    <p className="font-bold md:text-3xl text-lg text-[#2D2727] mt-4">
                        Motor
                    </p>
                    <button
                        className={`mt-4 mb-6 ${
                            selectedProduct === "Motor"
                                ? "bg-[#60B3B3] cursor-default"
                                : "bg-[#C0E6E6] cursor-pointer"
                        } px-28 py-2 bg-[#60B3B3] text-[#FFF]  md:text-base text-xs font-medium rounded-sm cursor-default `}
                    >
                        {selectedProduct === "Motor"
                            ? "Selected"
                            : "Select Claim"}
                    </button>
                </div>

                <div
                    className={`relative flex flex-col items-center md:w-[400px] w-[330px] bg-white rounded-lg shadow-[-1px_3px_10px_-1px_rgba(221,221,221,0.5)] ${
                        isPersonalAccidentEnabled &&
                        selectedProduct === "Personal Accident"
                            ? "ring-2 ring-[#60B3B3]"
                            : ""
                    } ${
                        isPersonalAccidentEnabled
                            ? "cursor-pointer"
                            : "cursor-not-allowed"
                    }`}
                    onClick={() => {
                        if (isPersonalAccidentEnabled)
                            setSelectedProduct("Personal Accident");
                    }}
                >
                    {!isPersonalAccidentEnabled && (
                        <div className="absolute top-0.2 right-[-1px] bg-[#003592] text-white text-[16px] font-medium px-6 py-3 z-10 rounded-tr-[8px] rounded-bl-[8px] rounded-tl-none rounded-br-none">
                            Launching Soon
                        </div>
                    )}

                    <img
                        src={paBanner}
                        alt="Personal Accident"
                        className="w-[400px] h-[280px] object-cover rounded-t-lg"
                    />
                    <p className="font-bold md:text-3xl text-lg text-[#2D2727] mt-4">
                        Personal Accident
                    </p>
                    <button
                        className={`mt-4 mb-6 px-28 py-2 ${
                            isPersonalAccidentEnabled
                                ? selectedProduct === "Personal Accident"
                                    ? "bg-[#60B3B3]"
                                    : "bg-[#C0E6E6]"
                                : "bg-[#C0E6E6]"
                        } text-white md:text-base text-xs font-medium rounded-sm`}
                        disabled={!isPersonalAccidentEnabled}
                    >
                        {isPersonalAccidentEnabled
                            ? selectedProduct === "Personal Accident"
                                ? "Selected"
                                : "Select Claim"
                            : "Select Claim"}
                    </button>
                </div>
            </div>

            <div className="md:w-[820px] w-[360px]">
                <div className="flex flex-col bg-[#F5F5F5] border-l-4 border-[#003592] py-4 px-3 md:px-6 rounded-md">
                    <p className="text-[#2D2727] text-sm font-bold mb-1">
                        Do you prefer paper submission?
                    </p>
                    <p className="text-[#2D2727] text-xs">
                        Find necessary information and&nbsp;
                        <span className="whitespace-nowrap">
                            proper claim form related&nbsp;
                            <br className="block md:hidden" />
                            to your claim
                        </span>{" "}
                        <button
                            className="text-[#008080] underline font-bold"
                            onClick={handleOpen}
                        >
                            here.
                        </button>
                        <PaperSubmission
                            isOpen={isModalOpen}
                            onConfirm={handleConfirm}
                            onClose={handleClose}
                        />
                    </p>
                </div>
            </div>
            <button
                className="bg-[#E4509A] text-white text-base md:text-xl font-semibold rounded-full w-full md:p-5 max-w-[200px] md:max-w-[260px] p-4 hover:bg-[#d14087] transition mb-28"
                onClick={handleNext}
            >
                Next
            </button>
        </div>
    );
}

export default ProductType;
