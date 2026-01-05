import React from "react";

const Agent = ({
    isHaveAgent,
    agentName,
    errors,
    setFormData,
    formData,
    setErrors,
}) => {
    return (
        <>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Do you have an agent from Cocogen?
                    <span>
                        {isHaveAgent === "no" && (
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
                        )}
                        {isHaveAgent === "yes" && agentName ? (
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
                        ) : (
                            ""
                        )}
                        {errors.isHaveAgent ? (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                className="mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#DD0707"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                />
                            </svg>
                        ) : (
                            ""
                        )}
                    </span>
                </h2>
            </div>
            <div className="flex flex-col items-center justify-center w-full gap-10 mb-5">
                <div className="flex justify-center items-center w-full gap-5">
                    <button
                        onClick={() => {
                            if (isHaveAgent !== "no") {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        is_have_agent: "no",
                                        agent_name: "",
                                    },
                                });
                                setErrors({
                                    ...errors,
                                    isHaveAgent: "",
                                    agentName: "",
                                });
                            }
                        }}
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            isHaveAgent === "no"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                    >
                        {isHaveAgent === "no" && (
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
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex items-center justify-center gap-1">
                            No
                        </span>
                    </button>
                    <button
                        onClick={() => {
                            if (isHaveAgent !== "yes") {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        is_have_agent: "yes",
                                        agent_name: "",
                                    },
                                });
                                setErrors({
                                    ...errors,
                                    isHaveAgent: "",
                                    agentName: "",
                                });
                            }
                        }}
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            isHaveAgent === "yes"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                    >
                        {isHaveAgent === "yes" && (
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
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex">Yes</span>
                    </button>
                </div>
                {isHaveAgent === "yes" && (
                    <div className="flex flex-col justify-center items-center w-full gap-3">
                        <label class="flex flex-col w-full max-w-[325px] md:max-w-[400px]">
                            <span
                                class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                    errors.agentName
                                        ? "text-[#DD0707]"
                                        : "text-[#848A90]"
                                }`}
                            >
                                Agent Name
                            </span>
                            <input
                                value={agentName}
                                onChange={(e) => {
                                    let value = e.target.value.slice(0, 50);
                                    value = value.replace(/^[^a-zA-Z]+/, "");
                                    value = value.replace(/[^a-zA-Z\s]/g, "");
                                    setFormData({
                                        ...formData,
                                        personal_data: {
                                            ...formData.personal_data,
                                            agent_name: value,
                                        },
                                    });
                                    setErrors({
                                        ...errors,
                                        agentName: "",
                                        isHaveAgent: "",
                                    });
                                }}
                                type="text"
                                class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                    errors.agentName
                                        ? "border-[#DD0707] placeholder-[#DD0707]"
                                        : "border-[#006666] placeholder-slate-400"
                                }  block w-full sm:text-sm focus:ring-0 focus:border-[#006666]`}
                            />
                        </label>
                    </div>
                )}
            </div>
        </>
    );
};

export default Agent;
