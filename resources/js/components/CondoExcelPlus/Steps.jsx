import React from "react";

export default function Steps({ step, scrolled }) {
    const getStatus = (current) => {
        if (step === current) return "in-progress";
        if (step > current) return "completed";
        return "pending";
    };

    return (
        <div className="flex justify-center items-center w-full px-2 md:px-0">
            {/* STEP 1 */}
            <div className="flex flex-col items-center justify-center w-full md:w-auto z-50">
                {getStatus(1) === "in-progress" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center md:mb-3 mb-0 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">1</div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Condominium Information
                        </p>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#008080]"} font-medium text-[10px] hidden md:block`}>
                            In Progress
                        </p>
                    </>
                ) : getStatus(1) === "completed" ? (
                    <>
                         <div className="bg-[#EFF2F4] w-6 h-6 md:w-8 md:h-8 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="w-full h-auto" viewBox="0 0 16 16">
                                <path fill="#09A12A" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mt-1`}>
                            Condominium Information
                        </p>
                        <p className="text-center text-[#09A12A] font-medium text-[10px] hidden md:block">Completed</p>
                    </>
                ) : (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm text-[#848A90] font-bold">1</div>
                        <p className="text-center text-[#848A90] font-bold text-[10px] md:text-xs mb-1">Condominium Information</p>
                        <p className="text-center text-[#BBC1C7] font-medium text-[10px] hidden md:block">Pending</p>
                    </>
                )}
            </div>

            <div className={`-mt-8 md:-mt-10 -mx-10 md:-mx-14 w-80 md:w-48 h-0 outline outline-1 outline-offset-[-0.50px] ${step > 1 ? "outline-[#09A12A]" : "outline-gray-100"}`}></div>

            {/* STEP 2 */}
            <div className="flex flex-col items-center justify-center w-full md:w-auto z-50">
                {getStatus(2) === "in-progress" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">2</div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Optional Benefits
                        </p>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#008080]"} font-medium text-[10px] hidden md:block`}>
                            In Progress
                        </p>
                    </>
                ) : getStatus(2) === "completed" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-8 md:h-8 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="w-full h-auto" viewBox="0 0 16 16">
                                <path fill="#09A12A" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Optional Benefits
                        </p>
                        <p className="text-center text-[#09A12A] font-medium text-[10px] hidden md:block">Completed</p>
                    </>
                ) : (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm text-[#848A90] font-bold">2</div>
                        <p className="text-center text-[#848A90] font-bold text-[10px] md:text-xs mb-1">Optional Benefits</p>
                        <p className="text-center text-[#BBC1C7] font-medium text-[10px] hidden md:block">Pending</p>
                    </>
                )}
            </div>

            <div className={`-mt-8 md:-mt-10 -mx-10 md:-mx-8 w-80 md:w-48 h-0 outline outline-1 outline-offset-[-0.50px] ${step > 2 ? "outline-[#09A12A]" : "outline-gray-100"}`}></div>

            {/* STEP 3 */}
            <div className="flex flex-col items-center justify-center w-full md:w-auto z-50">
                {getStatus(3) === "in-progress" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">3</div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Personal Data
                        </p>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#008080]"} font-medium text-[10px] hidden md:block`}>
                            In Progress
                        </p>
                    </>
                ) : getStatus(3) === "completed" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-8 md:h-8 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold z-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="w-full h-auto" viewBox="0 0 16 16">
                                <path fill="#09A12A" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Personal Data
                        </p>
                        <p className="text-center text-[#09A12A] font-medium text-[10px] hidden md:block">Completed</p>
                    </>
                ) : (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm text-[#848A90] font-bold">3</div>
                        <p className="text-center text-[#848A90] font-bold text-[10px] md:text-xs mb-1">Personal Data</p>
                        <p className="text-center text-[#BBC1C7] font-medium text-[10px] hidden md:block">Pending</p>
                    </>
                )}
            </div>

            <div className={`-mt-8 md:-mt-10 -mx-10 md:-mx-9 w-80 md:w-48 h-0 outline outline-1 outline-offset-[-0.50px] ${step > 3 ? "outline-[#09A12A]" : "outline-gray-100"}`}></div>

            {/* STEP 4 */}
            <div className="flex flex-col items-center justify-center w-full md:w-auto">
                {getStatus(4) === "in-progress" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">4</div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Confirmation
                        </p>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#008080]"} font-medium text-[10px] hidden md:block`}>
                            In Progress
                        </p>
                    </>
                ) : getStatus(4) === "completed" ? (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-8 md:h-8 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm border border-[#008080] text-[#008080] font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" className="w-full h-auto" viewBox="0 0 16 16">
                                <path fill="#09A12A" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <p className={`text-center ${scrolled ? "text-white" : "text-[#3B3939]"} font-bold text-[10px] md:text-xs mb-1`}>
                            Confirmation
                        </p>
                        <p className="text-center text-[#09A12A] font-medium text-[10px] hidden md:block">Completed</p>
                    </>
                ) : (
                    <>
                        <div className="bg-[#EFF2F4] w-6 h-6 md:w-9 md:h-9 rounded-full flex items-center justify-center mb-3 text-[10px] md:text-sm text-[#848A90] font-bold">4</div>
                        <p className="text-center text-[#848A90] font-bold text-[10px] md:text-xs mb-1">Confirmation</p>
                        <p className="text-center text-[#BBC1C7] font-medium text-[10px] hidden md:block">Pending</p>
                    </>
                )}
            </div>
        </div>
    );
}
