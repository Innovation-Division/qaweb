import { useState, useEffect, useRef } from "react";
import claimsBanner from "../../assets/images/claims-banner.png";
import mobileBanner from "../../assets/images/Banner2.png";
import taglineImage from "../../assets/images/tagline.png";
import PaperSubmission from "./PaperSubmission";
import { useNavigate } from "react-router-dom";
import Datepicker from "../../components/DatePickerV3";
const PolicyDetails = () => {
    const navigate = useNavigate();
    const [fullname, setFullName] = useState("");
    const [bday, setBday] = useState("");
    const [policyData, setPolicyData] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [showFullText, setShowFullText] = useState(false);
    const handleOpen = () => setIsModalOpen(true);
    const handleClose = () => setIsModalOpen(false);
    const handleConfirm = () => {
        setIsModalOpen(false);
    };
    const handleNext = () => {
        navigate("/online-claims", {
            state: {
                policyData: policyData,
                fullname: fullname,
                bday: bday,
            },
        });
    };

    useEffect(() => {
        const html = document.querySelector("html");

        const shouldDisableScroll = isModalOpen;

        if (shouldDisableScroll) {
            html.classList.add("overflow-hidden");
        } else {
            html.classList.remove("overflow-hidden");
        }

        return () => {
            html.classList.remove("overflow-hidden");
        };
    }, [isModalOpen]);

    return (
        <div className="flex flex-col items-center justify-center gap-5 w-full">
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

                <div className="bg-[#FFF4DA] flex flex-row gap-4 px-6 md:px-12 py-6 mb-10 w-full">
                    <div className="flex-shrink-0 mt-1">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 18 22"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M13.5001 20.75C13.5001 20.9489 13.4211 21.1396 13.2805 21.2803C13.1398 21.4209 12.949 21.5 12.7501 21.5H5.25012C5.05121 21.5 4.86045 21.4209 4.71979 21.2803C4.57914 21.1396 4.50012 20.9489 4.50012 20.75C4.50012 20.551 4.57914 20.3603 4.71979 20.2196C4.86045 20.079 5.05121 20 5.25012 20H12.7501C12.949 20 13.1398 20.079 13.2805 20.2196C13.4211 20.3603 13.5001 20.551 13.5001 20.75ZM17.2501 8.74995C17.2534 10.0002 16.9709 11.2347 16.4243 12.3592C15.8778 13.4837 15.0815 14.4685 14.0964 15.2384C13.9122 15.3796 13.7627 15.561 13.6593 15.7688C13.556 15.9767 13.5015 16.2054 13.5001 16.4375V17C13.5001 17.3978 13.3421 17.7793 13.0608 18.0606C12.7795 18.3419 12.3979 18.5 12.0001 18.5H6.00012C5.6023 18.5 5.22077 18.3419 4.93946 18.0606C4.65816 17.7793 4.50012 17.3978 4.50012 17V16.4375C4.49997 16.2081 4.44724 15.9819 4.34599 15.7762C4.24474 15.5704 4.09766 15.3906 3.91606 15.2506C2.93337 14.4852 2.13767 13.5064 1.58916 12.3881C1.04066 11.2698 0.753744 10.0414 0.750123 8.79589C0.725748 4.32777 4.337 0.606828 8.80137 0.499953C9.90139 0.473445 10.9956 0.667253 12.0196 1.06997C13.0436 1.47269 13.9767 2.07617 14.7639 2.84491C15.5512 3.61365 16.1767 4.53211 16.6037 5.54622C17.0306 6.56034 17.2504 7.64962 17.2501 8.74995ZM14.2398 7.87433C14.0453 6.78804 13.5227 5.78742 12.7423 5.00717C11.9619 4.22692 10.9611 3.70451 9.87481 3.51027C9.77767 3.49389 9.67826 3.49681 9.58225 3.51886C9.48624 3.5409 9.39552 3.58164 9.31525 3.63875C9.23499 3.69586 9.16676 3.76821 9.11446 3.85169C9.06216 3.93517 9.02681 4.02813 9.01044 4.12527C8.99406 4.2224 8.99698 4.32181 9.01902 4.41782C9.04107 4.51383 9.08181 4.60456 9.13892 4.68482C9.19602 4.76509 9.26838 4.83332 9.35186 4.88562C9.43534 4.93792 9.5283 4.97327 9.62543 4.98964C11.1789 5.2512 12.497 6.56933 12.7604 8.12558C12.7901 8.30026 12.8807 8.45879 13.0161 8.57307C13.1515 8.68736 13.3229 8.75002 13.5001 8.74995C13.5425 8.7497 13.5848 8.74625 13.6267 8.73964C13.8227 8.70617 13.9974 8.59621 14.1124 8.43394C14.2274 8.27167 14.2732 8.07038 14.2398 7.87433Z"
                                fill="#F5BC16"
                            />
                        </svg>
                    </div>

                    <div className="flex flex-col gap-2">
                        <p className="font-bold text-[#2D2727] text-sm md:text-base">
                            CLAIMS PROCESS REMINDER
                        </p>

                        <div className="block md:hidden text-xs md:text-sm font-normal text-[#303030] leading-snug">
                            {showFullText ? (
                                <>
                                    To enable a smooth processing of your claim,
                                    please ensure that you have prepared all
                                    documents for the online claims process. If
                                    you do not have complete information and
                                    documents, it will likely cause delays in
                                    the processing of your claim. If you need
                                    help in filing your claim, send an email to
                                    <br />
                                    <span className="font-semibold">
                                        client_services@cocogen.com
                                    </span>
                                </>
                            ) : (
                                <>
                                    To enable a smooth processing of your claim,
                                    please ensure that you have prepared all
                                    documents for the online claims process.{" "}
                                    <button
                                        onClick={() => setShowFullText(true)}
                                        className="text-[#008080] font-semibold"
                                    >
                                        See more
                                    </button>
                                </>
                            )}
                        </div>

                        <p className="hidden md:block text-xs md:text-sm font-normal text-[#303030]">
                            To enable a smooth processing of your claim, please
                            ensure that you have prepared all documents for the
                            online claims process. If you do not have complete{" "}
                            <br /> information and documents, it will likely
                            cause delays in the processing of your claim. If you
                            need help in filing your claim, send an email to
                            <br />
                            <span className="font-semibold">
                                client_services@cocogen.com
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <p className="font-bold text-[25px] md:text-[35px] text-[#2D2727]">
                Enter Policy Details
            </p>
            <p className="font-semibold md:text-xl text-sm text-[#585858]">
                Enter full name policyholder and birthdate
            </p>

            <div className="w-full flex flex-col items-center justify-center">
                <div className="md:w-full md:max-w-lg max-sm mx-auto items-center justify-center flex flex-col">
                    <input
                        type="text"
                        className="border-[#A8D9D9] text-[#2D2727] bg-[#FFFEFE] border w-full md:py-4 py-3 md:px-5 px-5 text-center focus:outline-none focus:ring-0 rounded focus:border-[#008080] md:text-xl text-base font-bold"
                        value={fullname}
                        placeholder="Dela Cruz, Juan"
                        onChange={(e) => {
                            const rawValue = e.target.value;
                            const cleaned = rawValue.replace(
                                /[^a-zA-Z\s-.,]/g,
                                ""
                            );
                            const normalized = cleaned.replace(/\s+/g, " ");
                            setFullName(normalized);
                        }}
                    />
                    <div className="relative w-full mt-6">
                        <Datepicker
                            defaultValue={bday ? new Date(bday) : null}
                            onChange={(e) => setBday(e.target.value)}
                            onDateSelect={(date) => {
                                setBday(date);
                            }}
                        />
                    </div>

                    <button
                        className={`bg-[#E4509A] my-6 text-white text-base md:text-xl font-semibold rounded-full w-full md:p-5 max-w-[200px] md:max-w-[260px] p-4 hover:bg-[#d14087] transition ${
                            !(fullname && bday)
                                ? "opacity-50 cursor-not-allowed"
                                : ""
                        }`}
                        disabled={!(fullname && bday)}
                        onClick={handleNext}
                    >
                        Next
                    </button>
                </div>
                <div className="flex flex-col bg-[#F5F5F5] border-l-2 border-[#003592] py-4 md:px-9 px-6 rounded-md mb-28">
                    <p className="text-[#2D2727] md:text-sm text-xs leading-6 font-bold mb-1">
                        Do you prefer paper submission?
                    </p>
                    <p className="text-[#2D2727] text-xs">
                        Find necessary information and proper claim form related{" "}
                        <br className="block md:hidden" /> to your claim{" "}
                        <button
                            className="text-[#008080] underline font-bold"
                            onClick={handleOpen}
                        >
                            here.
                        </button>
                        <PaperSubmission
                            isOpen={isModalOpen}
                            onClose={handleClose}
                            onConfirm={handleConfirm}
                        />
                    </p>
                </div>
            </div>
        </div>
    );
};

export default PolicyDetails;
