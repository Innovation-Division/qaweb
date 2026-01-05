import React, { useRef, useImperativeHandle, forwardRef, useEffect, useState } from "react";
import DropdownSingle from "../CondoExcelPlus/DropdownSingle";
import axios from "axios";

const BirthInformation = forwardRef(({ formData, setFormData, errors, setErrors, birthDate }, ref) => {
  const wrapperRef = useRef(null);
  const birthDateRef = useRef(null);
  const placeRef = useRef(null);
  const countryRef = useRef(null);
  const [countries, setCountries] = useState([]);

  const [minDate] = useState(new Date(new Date().setFullYear(new Date().getFullYear() - 60)));
  const [maxDate] = useState(new Date(new Date().setFullYear(new Date().getFullYear() - 18)));

  useEffect(() => {
    const fetchCountries = async () => {
      try {
        const res = await axios.get("/api/countries");
        const modifiedData = res.data.map((item) => ({
          ...item,
          name: item.name,
        }));
        setCountries(modifiedData);
      } catch (err) {
        console.error("Failed to fetch countries:", err);
      }
    };
    fetchCountries();
  }, []);

  useImperativeHandle(ref, () => ({
    validateAndScroll: (shouldScroll = true) => {
      const newErrors = {};

      if (!formData.personal_data.birth_date)
        newErrors.birthDate = "Date of Birth is required";
      if (!formData.personal_data.place_of_birth?.trim())
        newErrors.place_of_birth = "Place of Birth is required";
      if (!formData.personal_data.country_of_birth?.name)
        newErrors.country_of_birth = "Country of Birth is required";

      setErrors((prev) => ({ ...prev, ...newErrors }));
      const hasErrors = Object.keys(newErrors).length > 0;

      if (hasErrors && shouldScroll) {
        const refs = {
          birthDate: birthDateRef,
          place_of_birth: placeRef,
          country_of_birth: countryRef,
        };

        const firstErrorKey = Object.keys(newErrors).find((key) => refs[key]);
        const targetRef = firstErrorKey ? refs[firstErrorKey] : wrapperRef;

        setTimeout(() => {
          if (targetRef?.current) {
            const yOffset = -100; 
            const y =
              targetRef.current.getBoundingClientRect().top + window.scrollY + yOffset;
            window.scrollTo({ top: y, behavior: "smooth" });
          }
        }, 150);
      }

      return !hasErrors;
    },
  }));

  return (
    <div
      ref={wrapperRef}
      className="flex flex-col items-center justify-center w-full md:max-w-[780px]"
    >
      <div className="grid grid-cols-1 md:grid-cols-3 gap-7 md:gap-10 mb-5 w-full">
        {/* PLACE OF BIRTH */}
        <label className="flex flex-col w-full">
          <span
            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
              errors.place_of_birth ? "text-[#DD0707]" : "text-[#848A90]"
            }`}
          >
            Place of Birth
          </span>
          <input
            ref={placeRef}
            type="text"
            value={formData.personal_data.place_of_birth || ""}
            placeholder="City, Region"
            onChange={(e) => {
              const value = e.target.value;
              setFormData((prev) => ({
                ...prev,
                personal_data: { ...prev.personal_data, place_of_birth: value },
              }));

              setErrors((prev) => {
                const updated = { ...prev };
                if (value.trim()) delete updated.place_of_birth;
                return updated;
              });
            }}
            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0 ${
              errors.place_of_birth
                ? "border-[#DD0707] placeholder-[#DD0707]"
                : "border-[#006666] placeholder-[#848A90]"
            } focus:border-[#006666]`}
          />
        </label>

        {/* COUNTRY OF BIRTH */}
        <div className="flex flex-col w-full">
          <span
            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
              errors.country_of_birth ? "text-[#DD0707]" : "text-[#848A90]"
            }`}
          >
            Country of Birth
          </span>
          <div ref={countryRef}>
            <input
            type="text"
            value="Philippines"
            readOnly
            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b 
                ${errors.country_of_birth ? "border-[#DD0707] text-[#DD0707]" : "border-[#006666] text-[#1E1F21]"} 
                w-full sm:text-sm focus:ring-0 focus:outline-none`}
            onFocus={(e) => e.target.blur()} 
            />
          </div>
        </div>
      </div>
    </div>
  );
});

export default BirthInformation;
