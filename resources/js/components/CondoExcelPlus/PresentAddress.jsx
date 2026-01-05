import React, { useRef, useImperativeHandle, forwardRef } from "react";
import DropdownSingle from "../CondoExcelPlus/DropdownSingle";

const PresentAddress = forwardRef(
  (
    {
      formData,
      setFormData,
      errors,
      setErrors,
      regions,
      provincesAddress,
      cities,
      barangays,
      handleRegionChange,
      handleProvinceChange,
      handleCityChange,
    },
    ref
  ) => {
    const wrapperRef = useRef(null);
    const regionRef = useRef(null);
    const provinceRef = useRef(null);
    const cityRef = useRef(null);
    const barangayRef = useRef(null);
    const houseNoRef = useRef(null);
    const streetRef = useRef(null);
    const zipRef = useRef(null);

    // Destructure all address fields from formData.personal_data for clarity
    const {
      region,
      province,
      city,
      barangay,
      houseNo,
      street,
      zip,
    } = formData.personal_data;

    useImperativeHandle(ref, () => ({
      validateAndScroll: (shouldScroll = true) => {
        const newErrors = {};

        if (!region || region === "Select Region")
          newErrors.region = "Region is required";
        if (!province || province === "Select Province")
          newErrors.province = "Province is required";
        if (!city || city === "Select City") newErrors.city = "City is required";
        if (!barangay || barangay === "Select Barangay")
          newErrors.barangay = "Barangay is required";
        if (!houseNo?.trim()) newErrors.houseNo = "House No is required";
        if (!street?.trim()) newErrors.street = "Street is required";
        if (!zip?.trim()) newErrors.zip = "ZIP is required";
        else if (zip.length < 4) newErrors.zip = "ZIP code must be 4 digits";

        setErrors((prev) => ({ ...prev, ...newErrors }));

        const hasErrors = Object.keys(newErrors).length > 0;

        if (hasErrors && shouldScroll) {
          const refs = {
            region: regionRef,
            province: provinceRef,
            city: cityRef,
            barangay: barangayRef,
            houseNo: houseNoRef,
            street: streetRef,
            zip: zipRef,
          };

          const firstErrorKey = Object.keys(newErrors).find((key) => refs[key]);
          setTimeout(() => {
            if (firstErrorKey && refs[firstErrorKey]?.current) {
              refs[firstErrorKey].current.scrollIntoView({
                behavior: "smooth",
                block: "center",
              });
            } else {
              wrapperRef.current?.scrollIntoView({
                behavior: "smooth",
                block: "center",
              });
            }
          }, 100);
        }

        return !hasErrors;
      },

      scrollToFirstError: () => {
        const refs = {
          region: regionRef,
          province: provinceRef,
          city: cityRef,
          barangay: barangayRef,
          houseNo: houseNoRef,
          street: streetRef,
          zip: zipRef,
        };

        const firstErrorKey = Object.keys(refs).find((key) => errors[key]);
        if (firstErrorKey && refs[firstErrorKey]?.current) {
          refs[firstErrorKey].current.scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
          refs[firstErrorKey].current.focus?.();
        }
      },
    }));

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
                  className="bi bi-check-circle-fill"
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

        <div
          ref={wrapperRef}
          className="flex flex-col items-center justify-center py-6 md:py-6 md:max-w-[780px] w-full"
        >
          {/* REGION */}
          <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
            <div className="flex flex-col w-full md:min-w-[205px]">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.region ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                Region
              </span>
              <DropdownSingle
                ref={regionRef}
                data={regions}
                defaultValue={[
                  region
                    ? regions.find((item) => item.name === region) || {
                        id: 0,
                        name: "Select Region",
                        default: true,
                      }
                    : { id: 0, name: "Select Region", default: true },
                ]}
                handleDropdownChange={(value) => {
                setFormData((prev) => ({
                    ...prev,
                    personal_data: { ...prev.personal_data, region: value },
                }));
                setErrors((prev) => ({ ...prev, region: "" }));
                handleRegionChange(value.name); 
                }}

                error={!!errors.region}
              />
            </div>

            {/* PROVINCE */}
            <div className="flex flex-col w-full md:min-w-[205px]">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.province ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                Province
              </span>
              <DropdownSingle
                ref={provinceRef}
                data={provincesAddress || []}
                defaultValue={[
                  province
                    ? provincesAddress.find((item) => item.name === province)
                    : { id: 0, name: "Select Province", default: true },
                ]}
                handleDropdownChange={(value) => {
                  setFormData((prev) => ({
                    ...prev,
                    personal_data: { ...prev.personal_data, province: value },
                  }));
                  setErrors((prev) => ({ ...prev, province: "" }));
                  handleProvinceChange(value.name);
                }}
                error={!!errors.province}
              />
            </div>

            {/* CITY */}
            <div className="flex flex-col w-full md:min-w-[205px]">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.city ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                City
              </span>
              <DropdownSingle
                ref={cityRef}
                data={cities}
                defaultValue={[
                  city
                    ? cities.find((item) => item.name === city)
                    : { id: 0, name: "Select City", default: true },
                ]}
                handleDropdownChange={(value) => {
                  setFormData((prev) => ({
                    ...prev,
                    personal_data: { ...prev.personal_data, city: value },
                  }));
                  setErrors((prev) => ({ ...prev, city: "" }));
                  handleCityChange(value.name);
                }}
                error={!!errors.city}
              />
            </div>
          </div>

          <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
            <div className="flex flex-col w-full">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.barangay ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                Barangay
              </span>
              <DropdownSingle
                ref={barangayRef}
                data={barangays || []}
                defaultValue={[
                  barangay
                    ? barangays.find((item) => item.name === barangay)
                    : { id: 0, name: "Select Barangay", default: true },
                ]}
                handleDropdownChange={(value) => {
                  setFormData((prev) => ({
                    ...prev,
                    personal_data: { ...prev.personal_data, barangay: value },
                  }));
                  setErrors((prev) => ({ ...prev, barangay: "" }));
                }}
                error={!!errors.barangay}
              />
            </div>

            {/* House No */}
            <label className="flex flex-col w-full">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.houseNo ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                House/Unit No.
              </span>
              <input
                ref={houseNoRef}
                value={houseNo || ""}
                onChange={(e) => {
                  setFormData((prev) => ({
                    ...prev,
                    personal_data: {
                      ...prev.personal_data,
                      houseNo: e.target.value.slice(0, 100),
                    },
                  }));
                  setErrors((prev) => ({ ...prev, houseNo: "" }));
                }}
                type="text"
                placeholder="Enter House No"
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0 
                  ${
                    errors.houseNo
                      ? "border-[#DD0707] placeholder-[#DD0707]"
                      : "border-[#006666] placeholder-[#848A90]"
                  } focus:border-[#006666]`}
              />
            </label>

            {/* Street */}
            <label className="flex flex-col w-full">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.street ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                Street
              </span>
              <input
                ref={streetRef}
                value={street || ""}
                maxLength={100}
                onBeforeInput={(e) => {
                  const regex = /^[a-zA-Z0-9\s#,.-]*$/;
                  if (!regex.test(e.data)) e.preventDefault();
                }}
                onChange={(e) => {
                  const cleaned = e.target.value
                    .replace(/[^a-zA-Z0-9\s#,.-]/g, "")
                    .replace(/\s+/g, " ")
                    .trimStart()
                    .slice(0, 100);

                  setFormData((prev) => ({
                    ...prev,
                    personal_data: {
                      ...prev.personal_data,
                      street: cleaned,
                    },
                  }));
                  setErrors((prev) => ({ ...prev, street: "" }));
                }}
                type="text"
                placeholder="Enter Street"
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0 
                  ${
                    errors.street
                      ? "border-[#DD0707] placeholder-[#DD0707]"
                      : "border-[#006666] placeholder-[#848A90]"
                  } focus:border-[#006666]`}
              />
            </label>
          </div>

          {/* ZIP */}
          <div className="flex flex-col items-start gap-10 md:max-w-[240px] w-full">
            <label className="flex flex-col w-full">
              <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                  errors.zip ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
              >
                ZIP
              </span>
              <input
                type="text"
                ref={zipRef}
                value={zip || ""}
                inputMode="numeric"
                maxLength={4}
                onBeforeInput={(e) => {
                  if (!/^[0-9]$/.test(e.data)) e.preventDefault();
                }}
                onChange={(e) => {
                  const cleaned = e.target.value.replace(/\D/g, "").slice(0, 4);
                  setFormData((prev) => ({
                    ...prev,
                    personal_data: {
                      ...prev.personal_data,
                      zip: cleaned,
                    },
                  }));
                  setErrors((prev) => ({ ...prev, zip: "" }));
                }}
                autoComplete="off"
                placeholder="Enter ZIP"
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0 
                  ${
                    errors.zip
                      ? "border-[#DD0707] placeholder-[#DD0707]"
                      : "border-[#006666] placeholder-[#848A90]"
                  } focus:border-[#006666]`}
              />
            </label>
          </div>
        </div>
      </>
    );
  }
);

export default PresentAddress;
