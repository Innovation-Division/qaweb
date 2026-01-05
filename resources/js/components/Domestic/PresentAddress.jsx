import React from "react";
import DropdownSingle from "../DropdownSingle";

const PresentAddress = ({
    formData,
    setFormData,
    regions,
    provinces,
    cities,
    barangays,
    region,
    province,
    city,
    barangay,
    houseNo,
    street,
    zip,
    errors,
    setErrors,
}) => {
    return (
        <>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Present Address
                    <span>
                        {region &&
                        province &&
                        city &&
                        barangay &&
                        houseNo &&
                        street &&
                        zip ? (
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
                        {errors.region ||
                        errors.province ||
                        errors.city ||
                        errors.barangay ||
                        errors.houseNo ||
                        errors.street ||
                        errors.zip ? (
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
                    <div class="flex flex-col w-full md:min-w-[205px]">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.region
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Region
                        </span>
                        <DropdownSingle
                            data={regions}
                            defaultValue={[
                                region
                                    ? regions.find(
                                          (item) => item.name === region
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Region",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        region: value,
                                    },
                                });
                                setErrors({ ...errors, region: "" });
                            }}
                            error={errors.region ? true : false}
                        />
                    </div>
                    <div class="flex flex-col w-full md:min-w-[205px]">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.province
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Province
                        </span>
                        <DropdownSingle
                            data={provinces}
                            defaultValue={[
                                province === ""
                                    ? {
                                          id: 0,
                                          name: "Select Province",
                                          default: true,
                                      }
                                    : provinces.find(
                                          (item) => item.name === province
                                      ),
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        province: value,
                                    },
                                });
                                setErrors({ ...errors, province: "" });
                            }}
                            isDisable={provinces.length === 0 ? true : false}
                            error={errors.province ? true : false}
                            isReset={province === "" ? true : false}
                        />
                    </div>
                    <div class="flex flex-col w-full md:min-w-[205px]">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.city
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            City
                        </span>
                        <DropdownSingle
                            data={cities}
                            defaultValue={
                                city === ""
                                    ? [
                                          {
                                              id: 0,
                                              name: "Select City",
                                              default: true,
                                          },
                                      ]
                                    : [
                                          cities.find(
                                              (item) => item.name === city
                                          ),
                                      ]
                            }
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        city: value,
                                    },
                                });
                                setErrors({ ...errors, city: "" });
                            }}
                            isDisable={cities.length === 0 ? true : false}
                            error={errors.city ? true : false}
                            isReset={city === "" ? true : false}
                        />
                    </div>
                </div>
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
                    <div class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.barangay
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Barangay
                        </span>
                        <DropdownSingle
                            data={barangays}
                            defaultValue={
                                barangay === ""
                                    ? [
                                          {
                                              id: 0,
                                              name: "Select Barangay",
                                              default: true,
                                          },
                                      ]
                                    : [
                                          barangays.find(
                                              (item) => item.name === barangay
                                          ),
                                      ]
                            }
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        barangay: value,
                                    },
                                });
                                setErrors({ ...errors, barangay: "" });
                            }}
                            isDisable={barangays.length === 0 ? true : false}
                            error={errors.barangay ? true : false}
                            isReset={barangay === "" ? true : false}
                        />
                    </div>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.houseNo
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            House/Unit No.
                        </span>
                        <input
                            value={houseNo}
                            onChange={(e) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        house_no: e.target.value.slice(0, 100),
                                    },
                                });
                                setErrors({ ...errors, houseNo: "" });
                            }}
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.houseNo
                                    ? "border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] placeholder-slate-400"
                            }  block w-full sm:text-sm focus:ring-0 focus:border-[#006666]`}
                            placeholder="Enter House/Unit No."
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.street
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Street
                        </span>
                        <input
                            value={street}
                            onChange={(e) => {
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        street: e.target.value.slice(0, 50),
                                    },
                                });
                                setErrors({ ...errors, street: "" });
                            }}
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.street
                                    ? "border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] placeholder-slate-400"
                            }  block w-full sm:text-sm focus:ring-0 focus:border-[#006666]`}
                            placeholder="Enter Street"
                        />
                    </label>
                </div>

                <div className="flex flex-col md:flex-row gap-10 w-full">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.zip ? "text-[#DD0707]" : "text-[#848A90]"
                            }`}
                        >
                            ZIP
                        </span>
                        <input
                            value={zip}
                            onChange={(e) => {
                                // Ensure ZIP is numeric and up to 4 characters
                                const zipValue = e.target.value.replace(
                                    /[^0-9]/g,
                                    ""
                                );
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        zip: zipValue.slice(0, 4),
                                    },
                                });
                                setErrors({ ...errors, zip: "" });
                            }}
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                errors.zip
                                    ? "border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] placeholder-slate-400"
                            }  block w-full sm:text-sm focus:ring-0 focus:border-[#006666]`}
                            placeholder="Enter ZIP"
                            autoComplete="off"
                        />
                    </label>
                    <label class="hidden md:flex flex-col w-full"></label>
                    <label class="hidden md:flex flex-col w-full"></label>
                </div>
            </div>
        </>
    );
};

export default PresentAddress;
