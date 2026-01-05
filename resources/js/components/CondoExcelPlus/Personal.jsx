import React, { forwardRef, useImperativeHandle, useRef, useState } from "react";
import DropdownSingle from "../CondoExcelPlus/DropdownSingle";
import MobileNumber from "../CondoExcelPlus/MobileNumber";
import DatePicker from "../DatePicker4";

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

const Personal = forwardRef(({
    firstName,
    lastName,
    suffix,
    mobile,
    isMobileValid,
    setIsMobileValid,
    email,
    isEmailValid,
    birth_date,
    place_of_birth,
     errors = {},
    setErrors,
    formData,
    setFormData,
    handlePersonalMobileChange,
    handleEmailChange,
    hasSubmitted,
}, ref) => {
 const wrapperRef = useRef(null);
  const firstNameRef = useRef(null);
  const lastNameRef = useRef(null);
  const suffixRef = useRef(null);
  const mobileRef = useRef(null);
  const emailRef = useRef(null);
  const birthDateRef = useRef(null);

  const [minDate] = useState(
    new Date(new Date().setFullYear(new Date().getFullYear() - 60))
  );
  const [maxDate] = useState(
    new Date(new Date().setFullYear(new Date().getFullYear() - 18))
  );

  const handleSelectDate = (date) => {
      const safeFormData = formData || {};
      setFormData({
        ...safeFormData,
        personal_data: {
          ...(safeFormData.personal_data || {}),
          birth_date: new Date(date).toLocaleDateString("en-PH"),
        },
      });
  
      setErrors((prevErrors) => {
        const updated = { ...prevErrors };
        delete updated.birth_date;
        return updated;
      });
    };
    
  useImperativeHandle(ref, () => ({
    validateAndScroll: () => {
      const newErrors = {};

      if (!firstName?.trim()) newErrors.firstName = "First name is required";
      if (!lastName?.trim()) newErrors.lastName = "Last name is required";
      if (!suffix || suffix === "Select Suffix") newErrors.suffix = "Suffix is required";
      if (!mobile?.trim()) newErrors.mobile = "Mobile number is required";
      if (!email?.trim()) newErrors.email = "Email is required";
      if (!birth_date) newErrors.birth_date = "Birth date is required";
    //   if (!place_of_birth?.trim()) newErrors.place_of_birth = "Place of Birth is required";
      setErrors((prev) => ({ ...prev, ...newErrors }));

      const hasErrors = Object.keys(newErrors).length > 0;

      if (hasErrors) {
        const refs = {
          firstName: firstNameRef,
          lastName: lastNameRef,
          suffix: suffixRef,
          mobile: mobileRef,
          email: emailRef,
          birth_date: birthDateRef,
        };

        const firstErrorKey = Object.keys(newErrors).find((key) => refs[key]);

        setTimeout(() => {
          if (firstErrorKey && refs[firstErrorKey]?.current) {
            refs[firstErrorKey].current.scrollIntoView({
              behavior: "smooth",
              block: "center",
            });
            //refs[firstErrorKey].current.focus?.();
          } else {
            wrapperRef.current?.scrollIntoView({
              behavior: "smooth",
              block: "center",
            });
          }
        }, 100);

        return false;
      }

      return true;
    },

    scrollToFirstError: () => {
      const refs = {
        firstName: firstNameRef,
        lastName: lastNameRef,
        suffix: suffixRef,
        mobile: mobileRef,
        email: emailRef,
        birth_date: birthDateRef,
      };

      const keys = Object.keys(refs);
      for (const key of keys) {
        if (errors[key] && refs[key]?.current) {
          refs[key].current.scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
          refs[key].current.focus?.();
          break;
        }
      }
    }
  }));
  // console.log("emergencyMobile", emergencyRelationship);
// console.log(
//   "Emergency Contact Errors:",
//   errors.firstName,
//   errors.suffix,
//   errors.birth_date,
//   errors.email,
//   errors.mobile
// );
// console.log(" Check Icon Conditions", {
//     emergencyFullName,
//     emergencyMobile,
//     emergencyRelationship,
//     isEmergencyMobileValid,
// });
    return (
        <>
            <div ref={wrapperRef} className="bg-[#F7FCFF] flex flex-col items-center justify-center w-full px-8">
            <div className="flex items-center justify-center w-full py-6 md:py-9">
                <div className="flex items-start">
                        <h2 className="flex items-center justify-center mb-5 gap-5 text-[#2D2727] text-[18px] md:text-[27px] font-medium md:font-bold">
                            Personal Information
                    <span>
                        {formData?.personal_data?.first_name &&
                        formData?.personal_data?.last_name &&
                        formData?.personal_data?.suffix &&
                        formData?.personal_data?.birth_date &&
                        formData?.personal_data?.place_of_birth &&
                        formData?.personal_data?.country_of_birth &&
                        isMobileValid === true &&
                        email &&
                        isEmailValid === true &&
                        !(
                        errors.firstName ||
                        errors.lastName ||
                        errors.suffix ||
                        errors.mobile ||
                        errors.place_of_birth ||
                        errors.birth_date ||
                        errors.email
                        ) ? (
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
                        {errors.firstName ||
                        errors.lastName ||
                        errors.suffix ||
                        errors.mobile ||
                        errors.birth_date ||
                        errors.place_of_birth ||
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
                </div>
            </div>
            <div className="flex flex-col items-center justify-center md:max-w-[780px] w-full">
                <div className="grid grid-cols-1 md:grid-cols-3 gap-7 md:gap-10 mb-5 w-full">
                    <label className="flex flex-col w-full">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs text-[#848A90] px-3 ${
                                errors.firstName
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            First Name
                        </span>
                        <input
                            ref={firstNameRef}
                            value={firstName}
                            onChange={(e) => {
                                let value = e.target.value.slice(0, 50);
                                value = value.replace(/^[^a-zA-Z]+/, "");
                                value = value.replace(/[^a-zA-Z\s]/g, "");
                                setErrors((prevErrors) => {
                                const updated = { ...prevErrors };
                                delete updated.firstName;
                                return updated;
                            });
                                setFormData({
                                    ...formData,
                                    personal_data: {
                                        ...formData.personal_data,
                                        first_name: value,
                                    },
                                });
                            }}
                            type="text"
                            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b text-sm ${
                                errors.firstName
                                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                            }  block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label className="flex flex-col w-full">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs text-[#848A90] px-3 ${
                                errors.lastName
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Surname
                        </span>
                        <input
                            ref={lastNameRef}
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
                                 setErrors((prevErrors) => {
                                    const updated = { ...prevErrors };
                                    delete updated.lastName;
                                    return updated;
                                });
                            }}
                            type="text"
                            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b text-sm ${
                                errors.lastName
                                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                            }  block w-full sm:text-sm focus:ring-0`}
                            placeholder="Doe"
                        />
                    </label>
                    <div className="flex flex-col w-full">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Suffix
                        </span>
                        <div ref={suffixRef}>
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
                                        suffix: value.name,
                                    },
                                });
                                setErrors((prevErrors) => {
                                    const updated = { ...prevErrors };
                                    delete updated.suffix;
                                    return updated;
                                });

                            }}
                            hideSearch={true}
                            error={errors.suffix ? true : false}
                        />
                        </div>
                    </div>
                </div>
               <div className="grid grid-cols-1 md:grid-cols-3 gap-7 md:gap-10 mb-5 w-full">
                    <div ref={mobileRef} className="flex flex-col w-full">
                    <MobileNumber
                        setMobile={(value) => {
                            handlePersonalMobileChange(value);
                            setErrors({
                                ...errors,
                                mobile: "",
                            });
                        }}
                        setIsMobileValid={setIsMobileValid}
                        defaultValue={mobile}
                        isError={errors.mobile ? true : false}
                    />
                    </div>
                    <div className="flex flex-col w-full">
                        <label className="flex flex-col w-full">
                        <span
                            className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs text-[#848A90] px-3 ${
                                errors.email
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Email Address
                        </span>
                        <input
                            ref={emailRef}
                            value={email}
                            onChange={(e) => {
                                let value = e.target.value.slice(0, 50);
                                value = value.replace(/^[^a-zA-Z]+/, "");
                                handleEmailChange(value);
                            }}
                            type="email"
                            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b text-sm ${
                                errors.email
                                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                            }  block w-full sm:text-sm focus:ring-0`}
                            placeholder="you@example.com"
                        />
                    </label>
                    </div>
                    <div>
                         <label className="flex flex-col w-full">
                                  <span
                                    className={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs px-3 ${
                                      errors.birth_date ? "text-[#DD0707]" : "text-[#848A90]"
                                    } `}
                                  >
                                    Date of Birth
                                  </span>
                                  <div ref={birthDateRef} className="w-full">
                                    <DatePicker
                                      onDateSelect={handleSelectDate}
                                      minDate={minDate}
                                      maxDate={maxDate}
                                      value={formData.personal_data.birth_date || ""}
                                      resetValue={false}
                                      errors={errors.birth_date}
                                    />
                                  </div>
                                </label>
                    </div>
                </div>
            </div>
        </>
   );
});


export default Personal;
