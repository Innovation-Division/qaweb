import React, { useRef, useImperativeHandle, forwardRef } from "react";
import DropdownSingle from "../../components/CondoExcelPlus/DropdownSingle";

const buildingOptions = [
  { id: 1, name: "Select Building Type", default: true },
  { id: 2, name: "Low-Rise Condominiums" },
  { id: 3, name: "Mid-Rise Condominiums" },
  { id: 4, name: "High-Rise Condominiums" },
  { id: 5, name: "Detached Condominiums" },
];


const CondoAddress = forwardRef(
  (
    {
        formData,
        setFormData,
        regions,
        provinces,
        cities,
        barangays,
        provincesAddress,
        errors,
        setErrors,
        handleRegionChange,
        handleProvinceChange,
        handleCityChange,
        hasSubmitted,
    },
    ref
  ) => {
    const wrapperRef = useRef(null);
    const regionRef = useRef(null);
    const provinceRef = useRef(null);
    const cityRef = useRef(null);
    const barangayRef = useRef(null);
    const streetRef = useRef(null);
    const zipRef = useRef(null);
    const buildingRef = useRef(null);

    useImperativeHandle(ref, () => ({
    validateAndScroll: () => {
        const newErrors = {};

        if (!formData.region || formData.region === "Select Region" || formData.region === "")
        newErrors.region = "Region is required";
        if (!formData.province || formData.province === "Select Province")
        newErrors.province = "Province is required";
        if (!formData.city || formData.city === "Select City")
        newErrors.city = "City/Municipality is required";
        if (!formData.barangay || formData.barangay === "Select Barangay")
        newErrors.barangay = "Barangay is required";
        if (!formData.street?.trim())
        newErrors.street = " ";
        if (!formData.zip?.trim())
        newErrors.zip = " ";
        else if (formData.zip.length < 4)
        newErrors.zip = "ZIP code must be 4 digits";
        if (!formData.building || formData.building?.id === 1)
        newErrors.building = " ";

        setErrors((prev) => ({ ...prev, ...newErrors }));

        const hasErrors = Object.keys(newErrors).length > 0;
        if (hasErrors) {
        const refs = {
            region: regionRef,
            province: provinceRef,
            city: cityRef,
            barangay: barangayRef,
            street: streetRef,
            zip: zipRef,
            building: buildingRef,
        };

        const firstErrorKey = Object.keys(newErrors).find((key) => refs[key]);
        setTimeout(() => {
            const targetRef = firstErrorKey ? refs[firstErrorKey] : wrapperRef;

            if (targetRef && targetRef.current) {
                try {
                targetRef.current.scrollIntoView({
                    behavior: "smooth",
                    block: "center",
                });
                targetRef.current.focus?.();
                } catch (err) {
                console.warn("Scroll failed:", err);
                }
            }
            }, 100);

          return false;
        }

        return true;
      },
    }));

    return (
        <>
    <div className="flex items-center gap-5 md:mb-8 mb-0">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium">
                    Condominium Address
                    </h3>
                     <span>
                                           { formData.region?.name?.trim() &&
                                            formData.province?.name?.trim() &&
                                            formData.city?.name?.trim() &&
                                            formData.barangay?.name?.trim() &&
                                            formData.building && formData.building.id !== 1 &&
                                            formData.street?.trim() &&
                                            formData.zip?.trim() ? (

                                               <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && (errors.region || 
                                            errors.province ||
                                            errors.city || 
                                            errors.barangay ||
                                            errors.building ||
                                            errors.street || 
                                            errors.zip) ? (
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
                    
                    </div>
            <div className="flex flex-col items-center justify-center py-6 md:py-0 md:max-w-[780px] w-full" ref={wrapperRef}>                 
                <div className="flex flex-col md:flex-row gap-7  mb-5 w-full">
                    <div className="flex flex-col w-full md:min-w-[205px]">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.region
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Region
                        </span>
                         <DropdownSingle
                        ref={regionRef}
                        data={regions}
                        defaultValue={[
                            formData.region && formData.region.name
                            ? formData.region
                            : { id: 0, name: "Select Region", default: true },
                        ]}
                        handleDropdownChange={(value) => {
                            setFormData((prev) => ({ ...prev, region: value }));
                            setErrors((prev) => ({ ...prev, region: "" }));
                            handleRegionChange(value);
                        }}
                        error={!!errors.region}
                        />

                   </div>

                   <div className="flex flex-col w-full md:min-w-[205px]">
                       <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.province
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Province
                        </span>
                          <DropdownSingle
                        data={provincesAddress || []}
                        ref={provinceRef}
                        defaultValue={[
                            formData.province && formData.province.name
                                ? formData.province
                                : { id: 0, name: "Select Province", default: true },
                        ]}
                        handleDropdownChange={(value) => {
                            setFormData((prev) => ({
                            ...prev,
                            province: value,
                            }));
                            setErrors((prev) => ({ ...prev, province: "" }));
                            handleProvinceChange(value);
                        }}
                        
                        error={!!errors.province}
                        />
                    </div>

                    <div className="flex flex-col w-full md:min-w-[205px]">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.city
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                             City/Municipality
                        </span>
                        <DropdownSingle
                            ref={cityRef}
                            data={cities}
                            defaultValue={[
                            formData.city && formData.city.name
                                ? formData.city
                                : { id: 0, name: "Select City", default: true },
                            ]}

                            handleDropdownChange={(value) => {
                                setFormData((prev) => ({
                            ...prev,
                            city: value,
                            }));
                            setErrors((prev) => ({ ...prev, city: "" }));
                                handleCityChange(value); 
                            }}
                            
                            error={!!errors.city}
/>

                    </div>
                </div>

                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-9 w-full">
                   <div className="flex flex-col w-full">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.barangay
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                             Barangay
                        </span>
                        <DropdownSingle
                        ref={barangayRef}
                        data={barangays}
                        defaultValue={[
                        formData.barangay && formData.barangay.name
                            ? formData.barangay
                            : { id: 0, name: "Select Barangay", default: true },
                        ]}

                        handleDropdownChange={(value) => {
                            setFormData((prev) => ({
                            ...prev,
                            barangay: value,
                            }));
                            setErrors((prev) => ({ ...prev, barangay: "" }));
                        }}
                        error={!!errors.barangay}
                        />

                    </div>

                    <label className="flex flex-col w-full">
                        <span
                        className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal px-3 ${
                        errors.street ? "text-[#DD0707]" : "text-[#848A90]"
                        }`}
                    >
                            Street Name
                        </span>
                        <input
                            ref={streetRef}
                            value={formData.street || ""}
                            maxLength={100}
                            onBeforeInput={(e) => {
                            const regex = /^[a-zA-Z0-9\s#,.-]*$/;
                            if (!regex.test(e.data)) {
                                e.preventDefault(); 
                            }
                            }}
                        onChange={(e) => {
                            let cleaned = e.target.value
                                .replace(/[^a-zA-Z0-9\s#,.-]/g, "")
                                .replace(/\s+/g, " ")
                                .trimStart()
                                .slice(0, 100);

                            setFormData((prev) => ({
                                ...prev,
                                street: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, street: "" }));
                            }}
                            type="text"
                            placeholder={errors.street ? "Enter Street" : "Enter Street"}
                            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                            placeholder:text-sm placeholder:font-normal
                            ${
                            errors.street
                                ? "border-b-[#DD0707] placeholder-[#DD0707]"
                                : "border-[#006666] placeholder-[#848A90]"
                            }
                            focus:border-[#006666]`}
                        />
                        {errors.street && (
                                <span className="text-xs text-[#DD0707] px-3 mt-1">{errors.street}</span>
                            )}
                    </label>
                    <label className="flex flex-col w-full">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal px-3 ${
                            errors.zip ? "text-[#DD0707]" : "text-[#848A90]"
                            }`}
                        >
                            ZIP
                        </span>
                        <input
                            type="text"
                            ref={zipRef}
                             value={formData.zip || ""}
                            inputMode="numeric"
                            maxLength={4}
                            onBeforeInput={(e) => {
                            const allowed = /^[0-9]$/;
                            if (!allowed.test(e.data)) {
                                e.preventDefault();
                            }
                            }}
                            onChange={(e) => {
                                const cleaned = e.target.value.replace(/\D/g, "").slice(0, 4);

                                setFormData((prev) => ({
                                    ...prev,
                                    zip: cleaned,
                                }));

                                // setErrors((prev) => ({
                                //     ...prev,
                                //     zip:
                                //     !cleaned
                                //         ? "ZIP code is required"
                                //         : cleaned.length < 4
                                //         ? "ZIP code must be 4 digits"
                                //         : "",
                                // }));
                                setErrors((prev) => ({ ...prev, zip: "" }));
                            }}
                                autoComplete="off"
                                placeholder={errors.zip ? "Enter ZIP" : "Enter ZIP"}
                                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                                    placeholder:text-sm placeholder:font-normal
                                    ${errors.zip ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                                    focus:border-[#006666]`}
                                />
                            {errors.zip && (
                                <span className="text-xs text-[#DD0707] px-3 mt-1">{errors.zip}</span>
                            )}
                            
                    </label>
                </div>
                  <div className="flex flex-col md:flex-row gap-7 md:gap-10 w-full mb-9">
                    <label className="flex flex-col w-full md:w-[233px]">
                       <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal px-3 ${
                            hasSubmitted && errors.building ? "text-[#DD0707]" : "text-[#848A90]"
                            }`}
                        >
                            Building / Condominium
                        </span>
                       <DropdownSingle
                        ref={buildingRef}
                        data={buildingOptions}
                        defaultValue={[
                        formData.building && formData.building.name
                            ? formData.building
                            : buildingOptions[0],
                        ]}
                        handleDropdownChange={(selectedOption) => {
                        const selectedBuilding =
                            buildingOptions.find((item) => item.id === selectedOption.id) ||
                            buildingOptions[0];

                        setFormData((prev) => ({
                            ...prev,
                            building: selectedBuilding,
                        }));

                        if (selectedBuilding.id === 1) {
                            setErrors((prev) => ({ ...prev, building: "Building type is required" }));
                        } else {
                            setErrors((prev) => ({ ...prev, building: "" }));
                        }
                        }}
                        error={hasSubmitted && !!errors.building}
                        />
                    </label>
                </div>
            </div>
        </>
   );
  }
);

export default CondoAddress;
