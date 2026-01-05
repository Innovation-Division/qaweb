import React from "react";

const QuotationStep = ({ steps, step }) => {
    if (step === 6) {
        step = 2;
    }
    return (
        <div className="hidden md:flex items-start justify-between w-full max-w-4xl mx-auto p-6 gap-6">
            {steps.map((stepPage, index) => (
                <React.Fragment key={stepPage.id}>
                    <div className="flex flex-col items-center relative w-8">
                        <div
                            className={`relative flex h-7 w-7 items-center justify-center rounded-full font-bold
        transition-all duration-300 ${
            step >= stepPage.id ? "text-green-500" : "bg-gray-200 text-gray-500"
        }
        `}
                        >
                            {step >= stepPage.id ? (
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="28"
                                    height="28"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#09A12A"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            ) : (
                                <span>{stepPage.id}</span>
                            )}
                        </div>
                        <div
                            className={`mt-2 text-sm whitespace-nowrap transition-colors duration-300 font-bold${
                                step >= stepPage.id
                                    ? " text-black"
                                    : " text-[#848A90]"
                            }
        `}
                        >
                            {stepPage.name}
                        </div>
                    </div>
                    {index < steps.length - 1 && (
                        <div
                            className={`flex-1 h-0.5 mt-4 transition-colors duration-300
    transform -translate-y-1/2 ${
        step >= stepPage.id ? "bg-green-500" : "bg-[#EFF2F4]"
    }
    `}
                        />
                    )}
                </React.Fragment>
            ))}
        </div>
    );
};

export default QuotationStep;
