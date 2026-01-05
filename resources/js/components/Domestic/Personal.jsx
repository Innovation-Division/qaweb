import React, { useState } from "react";
import DropdownSingle from "../DropdownSingle";
import MobileNumber from "../MobileNumber";
import DatePicker from "../DatePicker";

const suffixes = [
    { id: 1, name: "Select Suffix", default: true },
    { id: 2, name: "N/A" },
    { id: 3, name: "Jr" },
    { id: 4, name: "Sr" },
    { id: 5, name: "I" },
    { id: 6, name: "II" },
    { id: 7, name: "III" },
    { id: 8, name: "IV" },
    { id: 9, name: "V" },
];

const Personal = ({
    firstName,
    lastName,
    suffix,
    mobile,
    isMobileValid,
    setIsMobileValid,
    email,
    isEmailValid,
    birthDate,
    errors,
    setErrors,
    formData,
    setFormData,
    handlePersonalMobileChange,
    handleEmailChange,
}) => {
    const [minDate, setMinDate] = useState(
        new Date(new Date().setFullYear(new Date().getFullYear() - 60))
    );
    const [maxDate, setMaxDate] = useState(
        new Date(new Date().setFullYear(new Date().getFullYear() - 18))
    );

    const handleSelectDate = (date) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                birth_date: new Date(date).toLocaleDateString("en-PH", {
                    minimumIntegerDigits: 2,
                    useGrouping: false,
                }),
            },
        });
        setErrors((prevErrors) => ({
            ...prevErrors,
            birthDate: "",
        }));
    };

    return (
        <>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Personal Information
                    <span>
                        {firstName &&
                        lastName &&
                        suffix &&
                        mobile &&
                        birthDate &&
                        isMobileValid === true &&
                        email &&
                        isEmailValid === true ? (
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
                        {errors.firstName ||
                        errors.dateFrom ||
                        errors.suffix ||
                        errors.mobile ||
                        errors.birthDate ||
                        errors.email ? (
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
            <div className="flex flex-col items-center justify-center py-6 md:py-6 md:max-w-[900px] w-full">
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.firstName
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            First Name
                        </span>
                        <input
                            value={firstName}
                            onChange={(e) => {
                                let value = e.target.value.slice(0, 50);
                                value = value.replace(/^[^a-zA-Z]+/, "");
                                value = value.replace(/[^a-zA-Z\s]/g, "");
                                setErrors((prevErrors) => ({
                                    ...prevErrors,
                                    firstName: "",
                                }));
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        first_name: value,
                                    },
                                });
                            }}
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.firstName
                                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                            }  block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.lastName
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Surname
                        </span>
                        <input
                            value={lastName}
                            onChange={(e) => {
                                let value = e.target.value.slice(0, 50);
                                value = value.replace(/^[^a-zA-Z]+/, "");
                                value = value.replace(/[^a-zA-Z\s]/g, "");
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        last_name: value,
                                    },
                                });
                                setErrors((prevErrors) => ({
                                    ...prevErrors,
                                    lastName: "",
                                }));
                            }}
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.lastName
                                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                            }  block w-full sm:text-sm focus:ring-0`}
                            placeholder="Doe"
                        />
                    </label>
                    <div class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Suffix
                        </span>
                        <DropdownSingle
                            data={suffixes}
                            defaultValue={[
                                suffix
                                    ? suffixes.find(
                                          (item) => item.name === suffix
                                      )
                                    : suffixes[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        suffix: value,
                                    },
                                });
                                setErrors({ ...errors, suffix: "" });
                            }}
                            hideSearch={true}
                            error={errors.suffix ? true : false}
                        />
                    </div>
                </div>
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
                    <MobileNumber
                        defaultValue={mobile}
                        setMobile={handlePersonalMobileChange}
                        setIsMobileValid={setIsMobileValid}
                        isError={errors.mobile ? true : false}
                    />
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.email
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Email Address
                        </span>
                        <input
                            value={email}
                            onChange={(e) => {
                                let value = e.target.value.slice(0, 50);
                                value = value.replace(/^[^a-zA-Z]+/, "");
                                handleEmailChange(value);
                            }}
                            type="email"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.email
                                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                            }  block w-full sm:text-sm focus:ring-0`}
                            placeholder="you@example.com"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                                errors.birthDate
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            } `}
                        >
                            Birth Date
                        </span>
                        <DatePicker
                            onDateSelect={handleSelectDate}
                            minDate={minDate}
                            maxDate={maxDate}
                            defaultValue={birthDate}
                            resetValue={false}
                            errors={errors.birthDate}
                        />
                    </label>
                </div>
            </div>
        </>
    );
};

export default Personal;
