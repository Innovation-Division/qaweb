import React, { useRef, useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
const Confirmation = ({
    formData,
    setFormData,
    prevStep,
    nextStep,
}) => {
  const [isAgreed, setIsAgreed] = useState(false);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [errors, setErrors] = useState({});
  const navigate = useNavigate();
  const incurredLossesRef = useRef(null);
  const descriptionLossesRef = useRef(null);

  const handleOpenModal = () => setIsModalOpen(true);
  const handleCloseModal = () => setIsModalOpen(false);

const isSendEnabled =
  isAgreed && (
    formData.hasIncurredLosses === "No" ||
    (formData.hasIncurredLosses === "Yes" &&
      formData.declaredIncurredLosses.trim() !== "" &&
      formData.descriptionLosses.trim() !== "")
  );

  const handleNext = () => {
    const newErrors = {};

    if (!formData.hasIncurredLosses) {
      newErrors.hasIncurredLosses = "Please select Yes or No";
    }

    if (formData.hasIncurredLosses === "Yes") {
      if (!formData.declaredIncurredLosses.trim()) {
        newErrors.incurredLosses = "Incurred Losses is required";
      }
      if (!formData.descriptionLosses.trim()) {
        newErrors.descriptionLosses = "Description of losses is required";
      }
    }

    setErrors(newErrors);

    if (Object.keys(newErrors).length === 0) {
      setIsModalOpen(true);
    } else {
      if (newErrors.incurredLosses && incurredLossesRef.current) {
        incurredLossesRef.current.scrollIntoView({
          behavior: "smooth",
          block: "center",
        });
      } else if (newErrors.descriptionLosses && descriptionLossesRef.current) {
        descriptionLossesRef.current.scrollIntoView({
          behavior: "smooth",
          block: "center",
        });
      }
    }
  };

  const formatNumber = (value) => {
    if (!value) return "";
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };

  const unformatNumber = (value) => value.replace(/,/g, "");

const handleSendQuotation = async () => {
  try {

    const getSum = (arr) => 
  Array.isArray(arr)
    ? arr.reduce((sum, item) => {
        const baseValue = parseFloat(item.value) || 0;
        const propertyVal = parseFloat(item.propertyValue) || 0;
        const accidentVal = parseFloat(item.accidentValue) || 0;
        return sum + baseValue + propertyVal + accidentVal;
      }, 0)
    : 0;

    const totalOptional = getSum(formData.optionalBenefits || []);
    const totalExtension = getSum(formData.extensionCovers || []);
    const declaredVal = parseFloat(formData.declaredValue || 0);
    const perilsAmt = parseFloat(formData.perilsAmount || 0);
    const condoUnit = declaredVal > 0 ? 0 : 1750.0;
    const coveredAmt = parseFloat(formData.coveredAmount || 0);

    const totalPremium = totalOptional + totalExtension + perilsAmt + condoUnit + coveredAmt;

    const vat = totalPremium * 0.12;
    const lgt = totalPremium * 0.002; // 0.20%
    const dst = totalPremium * 0.125; // 12.50%
    const fireTax = totalPremium * 0.02; // 2.00%

    const grossPremium =
      totalPremium + vat + lgt + dst + fireTax;

    const formDataToSend = new FormData();

    formDataToSend.append("region", formData.region?.name || "");
    formDataToSend.append("province", formData.province?.name || "");
    formDataToSend.append("city", formData.city?.name || "");
    formDataToSend.append("barangay", formData.barangay?.name || "");
    formDataToSend.append("street", formData.street || "");
    formDataToSend.append("zip", formData.zip || "");
    formDataToSend.append("building[name]", formData.building?.name || "");
    formDataToSend.append("unitType[name]", formData.unitType?.name || "");
    formDataToSend.append("unitNumber", formData.unitNumber || "");
    formDataToSend.append("front", formData.front || "");
    formDataToSend.append("left", formData.left || "");
    formDataToSend.append("right", formData.right || "");
    formDataToSend.append("rear", formData.rear || "");
    formDataToSend.append("addSpecs", formData.addSpecs || "");
    formDataToSend.append("roof[name]", formData.roof?.name || "");
    formDataToSend.append("wall[name]", formData.wall?.name || "");
    formDataToSend.append("storey", formData.storey || "");
    formDataToSend.append("hasMortgage", formData.hasMortgage || "");
    formDataToSend.append("mortgagee[name]", formData.mortgagee?.name || "");
    formDataToSend.append("bank", formData.bank?.name || "");
    formDataToSend.append("branch", formData.branch || "");

    formDataToSend.append("coveredAmount", formData.coveredAmount || "");
    formDataToSend.append("declaredValue", formData.declaredValue || "");
    formDataToSend.append("condoUnit", condoUnit);

    formDataToSend.append("vat", vat.toFixed(2));
    formDataToSend.append("lgt", lgt.toFixed(2));
    formDataToSend.append("dst", dst.toFixed(2));
    formDataToSend.append("fire_tax", fireTax.toFixed(2));
    formDataToSend.append("total_premium_amount", totalPremium.toFixed(2));
    formDataToSend.append("gross_premium", grossPremium.toFixed(2));
    formDataToSend.append("optionalBenefits", JSON.stringify(formData.optionalBenefits || []));
    formDataToSend.append("extensionCovers", JSON.stringify(formData.extensionCovers || []));
    formDataToSend.append("hasAgent", formData.hasAgent || "");
    formDataToSend.append("agent_name", formData.agentName || "");
    formDataToSend.append("perils_amount", formData.perilsAmount || "");
    formDataToSend.append("personal_data[first_name]", formData.personal_data.first_name || "");
    formDataToSend.append("personal_data[last_name]", formData.personal_data.last_name || "");
    formDataToSend.append("personal_data[suffix]", formData.personal_data.suffix || "");
    formDataToSend.append("personal_data[mobile]", formData.personal_data.mobile || "");
    formDataToSend.append("personal_data[email]", formData.personal_data.email || "");
    formDataToSend.append("personal_data[birth_date]", formData.personal_data.birth_date || "");
    formDataToSend.append("personal_data[place_of_birth]", formData.personal_data.place_of_birth || "");
    formDataToSend.append(
      "personal_data[country_of_birth][name]",
      formData.personal_data.country_of_birth?.name || ""
    );
    formDataToSend.append(
    "personal_data[citizenship][name]",
    formData.personal_data?.citizenship?.name || "Filipino"
  );
    formDataToSend.append("personal_data[idType]", formData.personal_data?.idType?.name || "");
    formDataToSend.append("personal_data[idNumber]", formData.personal_data?.idNumber || "");
    formDataToSend.append("personal_data[emergency_full_name]", formData.personal_data.emergency_full_name || "");
    formDataToSend.append("personal_data[emergencyMobile]", formData.personal_data.emergencyMobile || "");
    formDataToSend.append("personal_data[emergency_relationship]", formData.personal_data.emergency_relationship || "");

    formDataToSend.append("hasIncurredLosses", formData.hasIncurredLosses || "");
    formDataToSend.append("declaredIncurredLosses", formData.declaredIncurredLosses || "");
    formDataToSend.append("descriptionLosses", formData.descriptionLosses || "");

    if (formData.unitFiles && Array.isArray(formData.unitFiles)) {
    formData.unitFiles.forEach((file) => {
      if (file instanceof File) {
        formDataToSend.append("unit_photos[]", file);
      }
    });
  }
    if (formData.personal_data.id_image instanceof File) {
    formDataToSend.append("id_image", formData.personal_data.id_image);
  }
    // console.log(":", formData);

   const response = await axios.post("/api/condo-excel-plus-save", formDataToSend, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });
  localStorage.setItem("cep_trans_id", response.data.trans_id);
  sessionStorage.removeItem("cepEmailSent");
    //console.log("✅ Saved successfully:", response.data);
nextStep();
  //  navigate("/get-quote/condo-excel-plus/quotation-submitted");
  
  } catch (error) {
    console.error(":", error);
    // alert("Error.");
  }
};
  return (
      <div className="bg-[#F7FCFF] flex flex-col items-center justify-center w-full px-8">
     <div className="flex items-center justify-center w-full py-4 md:py-9 ">
        <div className="flex items-start">
                <h2 className="flex items-center justify-center md:mb-5 mb-3 gap-5 text-[#2D2727] text-lg md:text-[27px] font-medium md:font-bold">
                    Condition of the Unit
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                </h2>
                </div>
                 </div>
            <div className="flex flex-col items-center justify-center w-full gap-8 mb-6">
                <h3 className="text-[#2D2727] text-sm md:text-[23px] font-medium">
                    Does the Unit have incurred losses? 
                </h3>
                </div>
        <div className="flex flex-col items-center justify-center w-full gap-7 md:mb-5 mb-4">
                <div className="flex justify-center items-center w-full md:gap-9 gap-4">
                   {/* Yes Button */}
                    <button
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                       formData.hasIncurredLosses === "Yes"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => setFormData({ ...formData, hasIncurredLosses: "Yes" })}
                    >
                    { formData.hasIncurredLosses === "Yes" && (
                        <span>
                         <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className="md:w-[24px] md:h-[24px] w-[14px] h-[14px]"
                        >
                            <path
                            fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                            />
                        </svg>

                        </span>
                    )}
                    <span className="md:text-base text-sm md:font-medium font-normal">Yes</span>
                    </button>
                {/* No Button */}
                    <button
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.hasIncurredLosses === "No"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => setFormData({ ...formData, hasIncurredLosses: "No", declaredIncurredLosses:"", descriptionLosses:"",  })}
                    >
                    {formData.hasIncurredLosses === "No" && (
                        <span>
                         <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className="md:w-[24px] md:h-[24px] w-[14px] h-[14px]"
                        >
                            <path
                            fill="#ffffff"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                            />
                        </svg>
                        </span>
                    )}
                    <span className="md:text-base text-sm md:font-medium font-normal">No</span>
                    </button>
                   
                </div>
                </div>
            <div className="text-center items-center mt-5 mb-5"> 
            <div className="flex items-center text-left md:gap-3 gap-1 md:w-[600px] w-[350px] mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none" className="md:w-[21px] md:h-[20px] w-[12px] h-[12px] flex shrink-0 mb-2">
                <path d="M10.5 0.25C8.57164 0.25 6.68657 0.821828 5.08319 1.89317C3.47982 2.96451 2.23013 4.48726 1.49218 6.26884C0.754225 8.05042 0.561142 10.0108 0.937348 11.9021C1.31355 13.7934 2.24215 15.5307 3.60571 16.8943C4.96928 18.2579 6.70656 19.1865 8.59787 19.5627C10.4892 19.9389 12.4496 19.7458 14.2312 19.0078C16.0127 18.2699 17.5355 17.0202 18.6068 15.4168C19.6782 13.8134 20.25 11.9284 20.25 10C20.2473 7.41498 19.2192 4.93661 17.3913 3.10872C15.5634 1.28084 13.085 0.25273 10.5 0.25ZM10.5 18.25C8.86831 18.25 7.27326 17.7661 5.91655 16.8596C4.55984 15.9531 3.50242 14.6646 2.878 13.1571C2.25358 11.6496 2.0902 9.99085 2.40853 8.3905C2.72685 6.79016 3.51259 5.32015 4.66637 4.16637C5.82016 3.01259 7.29017 2.22685 8.89051 1.90852C10.4909 1.59019 12.1497 1.75357 13.6571 2.37799C15.1646 3.00242 16.4531 4.05984 17.3596 5.41655C18.2661 6.77325 18.75 8.3683 18.75 10C18.7475 12.1873 17.8775 14.2843 16.3309 15.8309C14.7843 17.3775 12.6873 18.2475 10.5 18.25ZM12 14.5C12 14.6989 11.921 14.8897 11.7803 15.0303C11.6397 15.171 11.4489 15.25 11.25 15.25C10.8522 15.25 10.4706 15.092 10.1893 14.8107C9.90804 14.5294 9.75 14.1478 9.75 13.75V10C9.55109 10 9.36033 9.92098 9.21967 9.78033C9.07902 9.63968 9 9.44891 9 9.25C9 9.05109 9.07902 8.86032 9.21967 8.71967C9.36033 8.57902 9.55109 8.5 9.75 8.5C10.1478 8.5 10.5294 8.65804 10.8107 8.93934C11.092 9.22064 11.25 9.60218 11.25 10V13.75C11.4489 13.75 11.6397 13.829 11.7803 13.9697C11.921 14.1103 12 14.3011 12 14.5ZM9 5.875C9 5.6525 9.06598 5.43499 9.1896 5.24998C9.31322 5.06498 9.48892 4.92078 9.69449 4.83564C9.90005 4.75049 10.1263 4.72821 10.3445 4.77162C10.5627 4.81502 10.7632 4.92217 10.9205 5.0795C11.0778 5.23684 11.185 5.43729 11.2284 5.65552C11.2718 5.87375 11.2495 6.09995 11.1644 6.30552C11.0792 6.51109 10.935 6.68679 10.75 6.8104C10.565 6.93402 10.3475 7 10.125 7C9.82664 7 9.54049 6.88147 9.32951 6.6705C9.11853 6.45952 9 6.17337 9 5.875Z" fill="#848A90"/>
                </svg>
                <p className="text-[#848A90] md:text-sm text-xs md:font-medium font-normal md:mb-4 mb-0 md:ml-2">LOSSES: Unit has been modified and/or has history of: renovation, customisation and others related to changes made to the original design of the unit.</p>
                </div>
                {formData.hasIncurredLosses === "Yes" && (
                    <label className="flex flex-col w-full items-start md:items-center" ref={incurredLossesRef}>
                        <p className="md:text-base text-sm md:font-medium font-normal text-[#2D2727] text-left mb-4 w-[280px] md:w-[600px]">Covered Amount</p>
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] w-[280px] md:w-[600px] px-3 text-left ${
                                errors.incurredLosses
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                           Enter Amount in PHP
                        </span>
                                <input
                            value={formatNumber(formData.declaredIncurredLosses)}
                            onChange={(e) => {
                            const rawValue = unformatNumber(e.target.value);
                              if (!/^\d*$/.test(rawValue)) return;

                              const numericValue = Number(rawValue);

                              if (numericValue > 1000000000) return;

                            setFormData((prev) => ({
                                ...prev,
                                declaredIncurredLosses: rawValue,
                            }));
                            if (rawValue.trim() !== "") {
                                setErrors((prev) => {
                                const updated = { ...prev };
                                delete updated.incurredLosses;
                                return updated;
                                });
                            }
                            }}
                            placeholder="Enter declared value"
                            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                            placeholder:text-sm placeholder:font-normal
                            ${
                                errors.incurredLosses
                                ? "border-b-[#DD0707] placeholder-[#DD0707]"
                                : "border-[#006666] placeholder-[#848A90]"
                            }
                            focus:border-[#006666]`}
                        />

                       <input type="hidden" value={formData.declaredIncurredLosses || ""} />

                    <span className="block text-[10px] text-[#848A90] w-[280px] md:w-[600px] px-3 text-left mt-8">
                       Description of the losses incurred<span className="text-red-500">*</span>
                    </span>
                      <input
                        value={formData.descriptionLosses || ""}
                        ref={descriptionLossesRef}
                        maxLength={100}
                        onChange={(e) => {
                        let cleaned = e.target.value
                            .replace(/[^a-zA-Z\s#,.-]/g, "")
                            .replace(/\s+/g, " ")
                            .trimStart()
                            .slice(0, 100);
                            setFormData((prev) => ({
                          ...prev,
                          descriptionLosses: cleaned,
                        }));
                        if (cleaned.trim() !== "") {
                            setErrors((prev) => {
                            const updated = { ...prev };
                            delete updated.descriptionLosses;
                            return updated;
                            });
                        }
                        }}
                        placeholder="Example: Upgraded the kitchen cabinet."
                        className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                        placeholder:text-sm placeholder:font-normal
                        ${
                            errors.descriptionLosses
                            ? "border-b-[#DD0707] placeholder-[#DD0707]"
                            : "border-[#006666] placeholder-[#848A90]"
                        }
                        focus:border-[#006666]`}
                    />
        </label>
      )}
                </div>
                <div className="bg-[#FFF4DA] text-[#303030] flex text-sm font-medium rounded-md py-5 items-center gap-3 md:mx-2 mx-2 md:w-[580px] w-[300px] md:mb-0 mb-4">
                <div className="flex items-center gap-4 flex-wrap w-full px-3">
                    <input
                    checked={isAgreed}
                    onChange={(e) => {
                        const checked = e.target.checked;
                        setIsAgreed(checked);

                        if (!checked) {
                        setErrors((prev) => ({
                            ...prev,
                            isAgreed: "You must agree to the terms and conditions",
                        }));
                        } else {
                        setErrors((prev) => ({ ...prev, isAgreed: null }));
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#1E1F21] border border-[#1E1F21] focus:outline-none focus:ring-0 focus:ring-offset-0 rounded shrink-0"
                    type="checkbox"
                    />
                    <p className="md:text-sm text-xs font-normal leading-snug flex-1">
                    By continuing this process, you hereby confirm all the details are true and accurate.
                    </p>
                </div>
                </div>
                 <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full md:py-20 gap-5 md:mb-0 mb-6">
                <button type="button" className="text-[#008080] md:px-5 px-3 py-3 md:text-[23px] text-base font-medium w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded" onClick={prevStep}
                >
                    <span>Back</span>
                </button>
                <button
                disabled={!isSendEnabled}
                className="text-white bg-[#008080] md:text-[23px] text-base font-medium md:px-5 px-3 py-3 rounded w-full md:w-auto flex justify-center gap-2 group disabled:opacity-50"
                onClick={handleNext}
                >
                <span>Send quotation request</span>
                </button>

            </div>
                    {isModalOpen && (
                        <div className="fixed inset-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden  max-h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <div className="relative w-full max-w-md max-h-full">
                            <div className="relative bg-white rounded-lg shadow-md text-center m-7 md:m-0 p-8 md:p-9">

                            <div className="flex justify-center mb-4">
                            <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg" className='md:w-[66px] w-[35px] md:h-[65px] h-[35px]'>
                            <path d="M36.0469 45.7031C36.0469 46.3057 35.8682 46.8948 35.5334 47.3959C35.1986 47.8969 34.7227 48.2875 34.166 48.5181C33.6093 48.7487 32.9966 48.809 32.4056 48.6915C31.8146 48.5739 31.2717 48.2837 30.8455 47.8576C30.4194 47.4315 30.1292 46.8886 30.0117 46.2975C29.8941 45.7065 29.9545 45.0939 30.1851 44.5371C30.4157 43.9804 30.8062 43.5045 31.3073 43.1697C31.8083 42.8349 32.3974 42.6562 33 42.6562C33.8081 42.6562 34.5831 42.9773 35.1545 43.5487C35.7259 44.1201 36.0469 44.895 36.0469 45.7031ZM33 18.2812C27.3988 18.2812 22.8438 22.3818 22.8438 27.4219V28.4375C22.8438 28.9762 23.0578 29.4929 23.4387 29.8738C23.8196 30.2547 24.3363 30.4688 24.875 30.4688C25.4137 30.4688 25.9304 30.2547 26.3113 29.8738C26.6923 29.4929 26.9063 28.9762 26.9063 28.4375V27.4219C26.9063 24.6289 29.6408 22.3438 33 22.3438C36.3592 22.3438 39.0938 24.6289 39.0938 27.4219C39.0938 30.2148 36.3592 32.5 33 32.5C32.4613 32.5 31.9446 32.714 31.5637 33.0949C31.1828 33.4759 30.9688 33.9925 30.9688 34.5312V36.5625C30.9688 37.1012 31.1828 37.6179 31.5637 37.9988C31.9446 38.3797 32.4613 38.5938 33 38.5938C33.5387 38.5938 34.0554 38.3797 34.4363 37.9988C34.8173 37.6179 35.0313 37.1012 35.0313 36.5625V36.3797C39.6625 35.5291 43.1563 31.8348 43.1563 27.4219C43.1563 22.3818 38.6012 18.2812 33 18.2812ZM59.4063 32.5C59.4063 37.7227 57.8576 42.828 54.956 47.1705C52.0545 51.513 47.9304 54.8976 43.1052 56.8962C38.2801 58.8948 32.9707 59.4178 27.8484 58.3989C22.7261 57.38 18.021 54.865 14.328 51.172C10.635 47.4791 8.12004 42.7739 7.10115 37.6516C6.08226 32.5293 6.60519 27.2199 8.60382 22.3948C10.6024 17.5697 13.987 13.4456 18.3295 10.544C22.672 7.64245 27.7773 6.09375 33 6.09375C40.0011 6.10114 46.7134 8.8856 51.6639 13.8361C56.6144 18.7867 59.3989 25.4989 59.4063 32.5ZM55.3438 32.5C55.3438 28.0808 54.0333 23.7609 51.5782 20.0865C49.123 16.4121 45.6334 13.5482 41.5506 11.8571C37.4678 10.1659 32.9752 9.72344 28.641 10.5856C24.3067 11.4477 20.3254 13.5758 17.2006 16.7006C14.0758 19.8254 11.9477 23.8067 11.0856 28.141C10.2235 32.4752 10.6659 36.9678 12.3571 41.0506C14.0482 45.1334 16.9121 48.623 20.5865 51.0781C24.2609 53.5333 28.5808 54.8438 33 54.8438C38.9239 54.837 44.6032 52.4808 48.792 48.292C52.9808 44.1032 55.337 38.4239 55.3438 32.5Z" fill="#F5BC16"/>
                            </svg>
                            </div>

                            <p className="md:text-[27px] text-lg font-bold text-[#2D2727] m-2 mb-4 md:m-5">Send Quotation Request</p>
                            <p className="md:text-base text-sm md:font-medium font-normal text-[#585858] md:block hidden">
                                <span className="block md:inline">Do you want to send the quotation<br className='md:hidden block'/> request now?</span>
                                <span className="block md:inline"> Once sent, the request will be<br className='md:hidden block'/> processed by </span>
                                <span className="block md:inline"> Cocogen Insurance.</span>
                            </p>
                        <p className="md:text-base text-sm md:font-medium font-normal text-[#585858] leading-snug text-center md:hidden block">
                            Do you want to send the quotation
                            <br className="md:hidden block" /> request now?
                            <br />
                            Once sent, the request will be 
                            <br />
                            <span className="inline-block">processed by Cocogen Insurance.</span>
                            </p>

                            <div className="mt-8 flex flex-col gap-4 justify-center text-center">
                                <button
                                type="button"
                               onClick={handleSendQuotation}
                                // console.log("🧾 Final Form Data:", formData);
                           
                                className="w-full bg-[#008080] text-white py-3 rounded-md font-bold md:text-base text-sm"
                                >
                               Yes, send quotation request
                                </button>
                                <button
                                type="button"
                                onClick={handleCloseModal}
                                className="w-full text-[#008080] border-[#008080] py-3 rounded-md font-bold md:text-base text-sm hover:border-[#008080] border-2 border-transparent transition"
                                >
                                Close
                                </button>
                            </div>
                            </div>
                        </div>
                        </div>

      )}
                </div>
  )
}

export default Confirmation