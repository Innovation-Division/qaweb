import React from "react";
import MobileNumber from "../MobileNumber";
import DropdownSingle from "../DropdownSingle";

const EmergencyContact = ({
    formData,
    setFormData,
    errors,
    setErrors,
    handleSelectEmergencyRelationship,
    handleEmergencyMobileChange,
    emergencyFullName,
    emergencyMobile,
    emergencyRelationship,
    setIsEmergencyMobileValid,
    isEmergencyMobileValid,
    relationships,
}) => {
    return (
        <>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Emergency Contact
                    <span>
                        {emergencyFullName &&
                        emergencyMobile &&
                        emergencyRelationship &&
                        isEmergencyMobileValid === true ? (
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
                        {errors.emergencyFullName ||
                        errors.emergencyMobile ||
                        errors.emergencyRelationship ? (
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
                <div className="flex flex-col md:flex-row gap-10 mb-5 w-full">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.emergencyFullName
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Full Name
                        </span>
                        <input
                            value={emergencyFullName}
                            onChange={(e) => {
                                const value = e.target.value.slice(0, 50);
                                const sanitizedValue = value.replace(
                                    /[^a-zA-Z\s]/g,
                                    ""
                                );
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        emergency_full_name: sanitizedValue,
                                    },
                                });
                                setErrors({
                                    ...errors,
                                    emergencyFullName: "",
                                });
                            }}
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.emergencyFullName
                                    ? "border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] placeholder-slate-400"
                            }  block w-full sm:text-sm focus:ring-0 focus:border-[#006666]`}
                            placeholder="Full Name"
                        />
                    </label>
                    <div class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.emergencyRelationship
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Relationship
                        </span>
                        <DropdownSingle
                            data={relationships}
                            defaultValue={[
                                emergencyRelationship
                                    ? relationships.find(
                                          (relationship) =>
                                              relationship.name ===
                                              emergencyRelationship
                                      )
                                    : relationships[0],
                            ]}
                            handleDropdownChange={(value) => {
                                handleSelectEmergencyRelationship(value);
                                setErrors({
                                    ...errors,
                                    emergencyRelationship: "",
                                });
                            }}
                            error={errors.emergencyRelationship ? true : false}
                            hideSearch={true}
                        />
                    </div>
                    <MobileNumber
                        labelName="Contact Number"
                        setMobile={(value) => {
                            handleEmergencyMobileChange(value);
                            setErrors({
                                ...errors,
                                emergencyMobile: "",
                            });
                        }}
                        setIsMobileValid={setIsEmergencyMobileValid}
                        defaultValue={emergencyMobile}
                        isError={errors.emergencyMobile ? true : false}
                    />
                </div>
            </div>
        </>
    );
};

export default EmergencyContact;
