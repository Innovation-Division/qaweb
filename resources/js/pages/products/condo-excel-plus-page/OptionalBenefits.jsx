import {React, useRef, useEffect, useState} from 'react'
import DropdownSingle from "../../../components/DropdownSingle";

import { add } from 'date-fns';

const OptionalBenefits = ({
    formData,
    setFormData,
    prevStep,
    nextStep,
}) => {
    const [hasSubmitted, setHasSubmitted] = useState(false);
    const [errors, setErrors] = useState({});
    const [isNextDisabled, setIsNextDisabled] = useState(false);
    const perilsRef = useRef(null);
    const benefitsRef = useRef(null);
    const addbenefitsRef = useRef(null);
    const coverRef = useRef(null);
    const extcoverRef = useRef(null);
    const agentRef = useRef(null);
    const agentnameRef = useRef(null);
    const [agentName, setAgentName] = useState("");
    const [showFullText, setShowFullText] = useState(true);
    const [selectedTypes, setSelectedTypes] = useState({
        type1: "",
      });
    const [selectedCoverageHousehold, setSelectedCoverageHousehold] = useState("");
    const [isCheckedHousehold, setIsCheckedHousehold] = useState(false);
    const [selectedCoverageGroceries, setSelectedCoverageGroceries] = useState("");
    const [isCheckedGroceries, setIsCheckedGroceries] = useState(false);
    const [selectedCoverageParking, setSelectedCoverageParking] = useState("");
    const [isCheckedParking, setIsCheckedParking] = useState(false);
    const [selectedCoverageWorks, setSelectedCoverageWorks] = useState("");
    const [isCheckedWorks, setIsCheckedWorks] = useState(false);
    const [selectedCoverageFixed, setSelectedCoverageFixed] = useState("");
    const [isCheckedFixed, setIsCheckedFixed] = useState(false);
    const [selectedCoverageFamily, setSelectedCoverageFamily] = useState("");
    const [isCheckedFamily, setIsCheckedFamily] = useState(false);
    const [selectedCoverageEmergency, setSelectedCoverageEmergency] = useState("");
    const [isCheckedEmergency, setIsCheckedEmergency] = useState(false);
    const [selectedCoverageSpecial, setSelectedCoverageSpecial] = useState("");
    const [selectedCoverageAutomatic, setSelectedCoverageAutomatic] = useState("");
    const [isCheckedAutomatic, setIsCheckedAutomatic] = useState(false);
    const [isCheckedSpecial, setIsCheckedSpecial] = useState(false);
    const [selectedCoveragePersonalGeneral  , setSelectedCoveragePersonalGeneral] = useState("");
    const [isCheckedPersonalGeneral, setIsCheckedPersonalGeneral] = useState(false);
    const [selectedCoverageHomeAssistance, setSelectedCoverageHomeAssistance] = useState("");
    const [isCheckedHomeAssistance, setIsCheckedHomeAssistance] = useState(false);
    const [selectedCoverageDebris, setSelectedCoverageDebris] = useState("");
    const [isCheckedDebris, setIsCheckedDebris] = useState(false);
    const [selectedCoverageFire, setSelectedCoverageFire] = useState("");
    const [isCheckedFire, setIsCheckedFire] = useState(false);
    const [selectedCoverageFireBrigade, setSelectedCoverageFireBrigade] = useState("");
    const [isCheckedFireBrigade, setIsCheckedFireBrigade] = useState(false);
    const [selectedCoverageProfessional, setSelectedCoverageProfessional] = useState("");
    const [isCheckedProfessional, setIsCheckedProfessional] = useState(false);
    const [selectedCoverageTemporary, setSelectedCoverageTemporary] = useState("");
    const [isCheckedTemporary, setIsCheckedTemporary] = useState(false);
    const [isCheckedAdditionalLimit, setIsCheckedAdditionalLimit] = useState(false);
    const [isCheckedKasambahay, setIsCheckedKasambahay] = useState(false);
    const [selectedCoverageKasambahayProperty, setSelectedCoverageKasambahayProperty] = useState(null);
    const [selectedCoverageAdditionalLimit, setSelectedCoverageAdditionalLimit] = useState(null);
    const [selectedCoverageKasambahayAccident, setSelectedCoverageKasambahayAccident] = useState(null);
    
    const handleNext = () => {
      setHasSubmitted(true);
    //   setIsNextDisabled(true); 
    
    const newErrors = {};

    if (!formData.addPerils || (formData.addPerils !== "Yes" && formData.addPerils !== "No")) {
      newErrors.addPerils = "Please select Yes or No";
    }
    if (!formData.addBenefits || (formData.addBenefits !== "Yes" && formData.addBenefits !== "No")) {
      newErrors.addBenefits = "Please select Yes or No";
    }
     if (formData.addBenefits === "Yes") {
    const selectedBenefits = [];
    if (isCheckedHousehold) selectedBenefits.push("Household Contents");
    if (isCheckedGroceries) selectedBenefits.push("Groceries and Foodstuff");
    if (isCheckedParking) selectedBenefits.push("Parking Slot");
    if (isCheckedWorks) selectedBenefits.push("Works of Art, Paintings, and Antiques");
    if (isCheckedFixed) selectedBenefits.push("Fixed Glass Accidental Damage");

     if (selectedBenefits.length > 0) {
      delete newErrors.optionalBenefits;
    } else {
      newErrors.optionalBenefits = "Please select at least one optional benefit.";
    }
  } else {
    delete newErrors.optionalBenefits;
  }
    if (!formData.withExtensionCover || (formData.withExtensionCover !== "Yes" && formData.withExtensionCover !== "No")) {
      newErrors.withExtensionCover = "Please select Yes or No";
    }
    if (formData.withExtensionCover === "Yes") {
    const selectedExtensionCover = [];
    if (isCheckedFamily) selectedExtensionCover.push("Family Personal Accident");
    if (isCheckedEmergency) selectedExtensionCover.push("Emergency Expense, Alternative Accommodations and/or Rental Income");
    if (isCheckedSpecial) selectedExtensionCover.push("Special Loss Assessment");
    if (isCheckedPersonalGeneral) selectedExtensionCover.push("Personal General Liability");
    if (isCheckedHomeAssistance) selectedExtensionCover.push("Home Assistance Services");
    if (isCheckedAutomatic) selectedExtensionCover.push("Automatic Inclusion Clause");
    if (isCheckedDebris) selectedExtensionCover.push("Debris Removal Clause");
    if (isCheckedFire) selectedExtensionCover.push("Fire-Fighting Expenses");
    if (isCheckedFireBrigade) selectedExtensionCover.push("Fire Brigade Charges");
    if (isCheckedProfessional) selectedExtensionCover.push("Professional Fees");
    if (isCheckedTemporary) selectedExtensionCover.push("Temporary Removal");
    if (isCheckedAdditionalLimit) selectedExtensionCover.push("Additional Limit");
    if (isCheckedKasambahay) selectedExtensionCover.push("Kasambahay Cover");

     if (selectedExtensionCover.length > 0) {
      delete newErrors.extensionCover;
    } else {
      newErrors.extensionCover = "Please select at least one extension cover.";
    }
  } else {
    delete newErrors.extensionCover;
  }
     if (!formData.hasAgent || (formData.hasAgent !== "Yes" && formData.hasAgent !== "No")) {
      newErrors.hasAgent = "Please select Yes or No";
    }
      if (formData.hasAgent === "Yes") {
        if (!formData.agentName.trim()) {
          newErrors.agentName = "Agent Name is required";
        }
    }
    
      setErrors(newErrors);
    
      const hasErrors = Object.keys(newErrors).length > 0;
      setIsNextDisabled(hasErrors);
      
      if (hasErrors) {
        setTimeout(() => {
          const scrollToFirstError = () => {
            if (newErrors.addPerils && perilsRef?.current)
              perilsRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
            else if (newErrors.addBenefits && benefitsRef?.current)
              benefitsRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
            else if (newErrors.optionalBenefits && addbenefitsRef?.current)
            addbenefitsRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
            else if (newErrors.withExtensionCover && coverRef?.current)
              coverRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
            else if (newErrors.extensionCover && extcoverRef?.current)
              extcoverRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
            else if (newErrors.hasAgent && agentRef?.current)
              agentRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
             else if (newErrors.hasAgent && agentnameRef?.current)
              agentnameRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
             else window.scrollTo({ top: 0, behavior: "smooth" });
          };
          scrollToFirstError();
        }, 100);
    
        return;
      }
      //console.log("All valid! Proceeding to next step...");
      nextStep();
      setIsNextDisabled(false); // enable again if valid
    };
    useEffect(() => {
      const hasErrors = Object.values(errors).some(Boolean); 
    console.log("errors object:", errors, "hasErrors:", hasErrors);
      if (!hasErrors) {
        setIsNextDisabled(false);
      }
    }, [errors]);

useEffect(() => {
  if (!hasSubmitted) return;

  const newErrors = { ...errors };

  /** ------------------------
   * ✅ Optional Benefits Section
   * ------------------------ */
  if (formData.addBenefits === "No") {
    // Clear both optional benefit errors if user selects No
    delete newErrors.addBenefits;
    delete newErrors.optionalBenefits;
  } else if (formData.addBenefits === "Yes") {
    const selectedBenefits = [];
    if (isCheckedHousehold) selectedBenefits.push("Household Contents");
    if (isCheckedGroceries) selectedBenefits.push("Groceries and Foodstuff");
    if (isCheckedParking) selectedBenefits.push("Parking Slot");
    if (isCheckedWorks) selectedBenefits.push("Works of Art, Paintings, and Antiques");
    if (isCheckedFixed) selectedBenefits.push("Fixed Glass Accidental Damage");

    if (selectedBenefits.length === 0) {
      newErrors.optionalBenefits = "Please select at least one optional benefit.";
    } else {
      delete newErrors.optionalBenefits;
    }
  }

  if (formData.withExtensionCover === "No") {
    delete newErrors.withExtensionCover;
    delete newErrors.extensionCover;
  } else if (formData.withExtensionCover === "Yes") {
    const selectedExtensionCover = [];
    if (isCheckedFamily) selectedExtensionCover.push("Family Personal Accident");
    if (isCheckedEmergency) selectedExtensionCover.push("Emergency Expense");
    if (isCheckedSpecial) selectedExtensionCover.push("Special Loss Assessment");
    if (isCheckedPersonalGeneral) selectedExtensionCover.push("Personal General Liability");
    if (isCheckedHomeAssistance) selectedExtensionCover.push("Home Assistance Services");
    if (isCheckedAutomatic) selectedExtensionCover.push("Automatic Inclusion Clause");
    if (isCheckedDebris) selectedExtensionCover.push("Debris Removal Clause");
    if (isCheckedFire) selectedExtensionCover.push("Fire-Fighting Expenses");
    if (isCheckedFireBrigade) selectedExtensionCover.push("Fire Brigade Charges");
    if (isCheckedProfessional) selectedExtensionCover.push("Professional Fees");
    if (isCheckedTemporary) selectedExtensionCover.push("Temporary Removal");
    if (isCheckedAdditionalLimit) selectedExtensionCover.push("Additional Limit");
    if (isCheckedKasambahay) selectedExtensionCover.push("Kasambahay Cover");

    if (selectedExtensionCover.length === 0) {
      newErrors.extensionCover = "Please select at least one extension cover.";
    } else {
      delete newErrors.extensionCover;
    }
  }

  if (formData.hasAgent === "No") {
    delete newErrors.agentName;
    delete newErrors.hasAgent;
  } else if (formData.hasAgent === "Yes") {
    if (!formData.agentName.trim()) {
      newErrors.agentName = "Agent Name is required";
    } else {
      delete newErrors.agentName;
    }
  }

  setErrors(newErrors);
  setIsNextDisabled(Object.keys(newErrors).length > 0);
}, [
  hasSubmitted,
  formData.addBenefits,
  formData.withExtensionCover,
  formData.hasAgent,
  isCheckedHousehold,
  isCheckedGroceries,
  isCheckedParking,
  isCheckedWorks,
  isCheckedFixed,
  isCheckedFamily,
  isCheckedEmergency,
  isCheckedSpecial,
  isCheckedPersonalGeneral,
  isCheckedHomeAssistance,
  isCheckedAutomatic,
  isCheckedDebris,
  isCheckedFire,
  isCheckedFireBrigade,
  isCheckedProfessional,
  isCheckedTemporary,
  isCheckedAdditionalLimit,
  isCheckedKasambahay,
]);

  useEffect(() => {
  if (formData.addPerils === "Yes") {
    const declaredValue = parseFloat(formData.declaredValue || 0);
    const computedPerils = declaredValue > 0 ? declaredValue * 0.0005 : 1000;

    setFormData((prev) => {
      if (prev.perilsAmount !== computedPerils) {
        return { ...prev, perilsAmount: computedPerils };
      }
      return prev;
    });
  }
}, [formData.declaredValue, formData.addPerils]);

  useEffect(() => {
  const household = formData.optionalBenefits?.find(
    (b) => b.name === "Household Contents"
  );

  if (household) {
    setIsCheckedHousehold(household.selected);
    setSelectedCoverageHousehold(household.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const groceries = formData.optionalBenefits?.find(
    (b) => b.name === "Groceries and Foodstuff"
  );

  if (groceries) {
    setIsCheckedGroceries(groceries.selected);
    setSelectedCoverageGroceries(groceries.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const parking = formData.optionalBenefits?.find(
    (b) => b.name === "Parking Slot"
  );

  if (parking) {
    setIsCheckedParking(parking.selected);
    setSelectedCoverageParking(parking.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const works = formData.optionalBenefits?.find(
    (b) => b.name === "Works of Art, Paintings, and Antiques"
  );

  if (works) {
    setIsCheckedWorks(works.selected);
    setSelectedCoverageWorks(works.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const fixed = formData.optionalBenefits?.find(
    (b) => b.name === "Fixed Glass Accidental Damage"
  );

  if (fixed) {
    setIsCheckedFixed(fixed.selected);
    setSelectedCoverageFixed(fixed.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const family = formData.extensionCovers?.find(
    (c) => c.name === "Family Personal Accident"
  );

  if (family) {
    setIsCheckedFamily(family.selected);
    setSelectedCoverageFamily(family.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const emergency = formData.extensionCovers?.find(
    (c) =>
      c.name ===
      "Emergency Expense, Alternative Accommodations and/or Rental Income"
  );

  if (emergency) {
    setIsCheckedEmergency(emergency.selected);
    setSelectedCoverageEmergency(emergency.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const special = formData.extensionCovers?.find(
    (c) => c.name === "Special Loss Assessment"
  );

  if (special) {
    setIsCheckedSpecial(special.selected);
    setSelectedCoverageSpecial(special.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const personal = formData.extensionCovers?.find(
    (c) => c.name === "Personal General Liability"
  );

  if (personal) {
    setIsCheckedPersonalGeneral(personal.selected);
    setSelectedCoveragePersonalGeneral(personal.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const home = formData.extensionCovers?.find(
    (c) => c.name === "Home Assistance Services"
  );

  if (home) {
    setIsCheckedHomeAssistance(home.selected);
    setSelectedCoverageHomeAssistance(home.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const auto = formData.extensionCovers?.find(
    (c) => c.name === "Automatic Inclusion Clause"
  );

  if (auto) {
    setIsCheckedAutomatic(auto.selected);
    setSelectedCoverageAutomatic(auto.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const debris = formData.extensionCovers?.find(
    (c) => c.name === "Debris Removal Clause"
  );

  if (debris) {
    setIsCheckedDebris(debris.selected);
    setSelectedCoverageDebris(debris.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const fire = formData.extensionCovers?.find(
    (c) => c.name === "Fire-Fighting Expenses"
  );

  if (fire) {
    setIsCheckedFire(fire.selected);
    setSelectedCoverageFire(fire.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const fireBrigade = formData.extensionCovers?.find(
    (c) => c.name === "Fire Brigade Charges"
  );

  if (fireBrigade) {
    setIsCheckedFireBrigade(fireBrigade.selected);
    setSelectedCoverageFireBrigade(fireBrigade.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const professional = formData.extensionCovers?.find(
    (c) => c.name === "Professional Fees"
  );

  if (professional) {
    setIsCheckedProfessional(professional.selected);
    setSelectedCoverageProfessional(professional.coverage || "");
  }
}, [formData]);
useEffect(() => {
  const temp = formData.extensionCovers?.find(
    (c) => c.name === "Temporary Removal"
  );

  if (temp) {
    setIsCheckedTemporary(temp.selected);
    setSelectedCoverageTemporary(temp.coverage || "");
  }
}, [formData]);

useEffect(() => {
  const additionalLimit = formData.extensionCovers?.find(
    (c) => c.name === "Additional Limit"
  );

  if (additionalLimit) {
    setIsCheckedAdditionalLimit(additionalLimit.selected);
    setSelectedCoverageAdditionalLimit(additionalLimit.coverage || "");
  }
}, [formData]);

useEffect(() => {
  const kasambahay = formData.extensionCovers?.find(
    (c) => c.name === "Kasambahay Cover"
  );

  if (kasambahay) {
    setIsCheckedKasambahay(kasambahay.selected);
    setSelectedCoverageKasambahayProperty(kasambahay.propertyCoverage || "");
    setSelectedCoverageKasambahayAccident(kasambahay.accidentCoverage || "");
  }
}, [formData]);
  return (
         <div className="bg-[#F7FCFF] flex flex-col items-center justify-center w-full px-8">
     <div className="flex flex-col items-center justify-center w-full md:py-4 md:gap-8 gap-4">
     <div className="flex items-center justify-center w-full py-4 ">
                <div className="flex items-start">
                <h2 className="flex items-center justify-center md:gap-5 gap-3 text-[#2D2727] text-[18px] md:text-[27px] font-medium md:font-bold">
                    Additional Perils
                     <span>
                            {(formData.addPerils === "No" || (
                            formData.addPerils === "Yes"
                        )) ? (
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && !formData.addPerils ==="Yes" ? (
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
                                  <div className="md:w-[740px] w-[320px] mb-5">
                <div className="flex flex-col bg-[#F5F5F5] border-l-4 border-[#003592] py-4 px-3 md:px-4 rounded-md">
                     <div className="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className='flex shrink-0 md:w-[24px] md:h-[24px] w-[15px] h-[15px] mt-1'>
                    <path d="M21.6744 9.63937C21.3209 9.27 20.9553 8.88938 20.8175 8.55469C20.69 8.24813 20.6825 7.74 20.675 7.24781C20.6609 6.33281 20.6459 5.29594 19.925 4.575C19.2041 3.85406 18.1672 3.83906 17.2522 3.825C16.76 3.8175 16.2519 3.81 15.9453 3.6825C15.6116 3.54469 15.23 3.17906 14.8606 2.82562C14.2137 2.20406 13.4788 1.5 12.5 1.5C11.5212 1.5 10.7872 2.20406 10.1394 2.82562C9.77 3.17906 9.38938 3.54469 9.05469 3.6825C8.75 3.81 8.24 3.8175 7.74781 3.825C6.83281 3.83906 5.79594 3.85406 5.075 4.575C4.35406 5.29594 4.34375 6.33281 4.325 7.24781C4.3175 7.74 4.31 8.24813 4.1825 8.55469C4.04469 8.88844 3.67906 9.27 3.32562 9.63937C2.70406 10.2863 2 11.0212 2 12C2 12.9788 2.70406 13.7128 3.32562 14.3606C3.67906 14.73 4.04469 15.1106 4.1825 15.4453C4.31 15.7519 4.3175 16.26 4.325 16.7522C4.33906 17.6672 4.35406 18.7041 5.075 19.425C5.79594 20.1459 6.83281 20.1609 7.74781 20.175C8.24 20.1825 8.74813 20.19 9.05469 20.3175C9.38844 20.4553 9.77 20.8209 10.1394 21.1744C10.7863 21.7959 11.5212 22.5 12.5 22.5C13.4788 22.5 14.2128 21.7959 14.8606 21.1744C15.23 20.8209 15.6106 20.4553 15.9453 20.3175C16.2519 20.19 16.76 20.1825 17.2522 20.175C18.1672 20.1609 19.2041 20.1459 19.925 19.425C20.6459 18.7041 20.6609 17.6672 20.675 16.7522C20.6825 16.26 20.69 15.7519 20.8175 15.4453C20.9553 15.1116 21.3209 14.73 21.6744 14.3606C22.2959 13.7137 23 12.9788 23 12C23 11.0212 22.2959 10.2872 21.6744 9.63937ZM20.5916 13.3228C20.1425 13.7916 19.6775 14.2763 19.4309 14.8716C19.1947 15.4434 19.1844 16.0969 19.175 16.7297C19.1656 17.3859 19.1553 18.0731 18.8638 18.3638C18.5722 18.6544 17.8897 18.6656 17.2297 18.675C16.5969 18.6844 15.9434 18.6947 15.3716 18.9309C14.7763 19.1775 14.2916 19.6425 13.8228 20.0916C13.3541 20.5406 12.875 21 12.5 21C12.125 21 11.6422 20.5387 11.1772 20.0916C10.7122 19.6444 10.2238 19.1775 9.62844 18.9309C9.05656 18.6947 8.40313 18.6844 7.77031 18.675C7.11406 18.6656 6.42688 18.6553 6.13625 18.3638C5.84562 18.0722 5.83437 17.3897 5.825 16.7297C5.81562 16.0969 5.80531 15.4434 5.56906 14.8716C5.3225 14.2763 4.8575 13.7916 4.40844 13.3228C3.95937 12.8541 3.5 12.375 3.5 12C3.5 11.625 3.96125 11.1422 4.40844 10.6772C4.85562 10.2122 5.3225 9.72375 5.56906 9.12844C5.80531 8.55656 5.81562 7.90313 5.825 7.27031C5.83437 6.61406 5.84469 5.92688 6.13625 5.63625C6.42781 5.34562 7.11031 5.33437 7.77031 5.325C8.40313 5.31562 9.05656 5.30531 9.62844 5.06906C10.2238 4.8225 10.7084 4.3575 11.1772 3.90844C11.6459 3.45937 12.125 3 12.5 3C12.875 3 13.3578 3.46125 13.8228 3.90844C14.2878 4.35562 14.7763 4.8225 15.3716 5.06906C15.9434 5.30531 16.5969 5.31562 17.2297 5.325C17.8859 5.33437 18.5731 5.34469 18.8638 5.63625C19.1544 5.92781 19.1656 6.61031 19.175 7.27031C19.1844 7.90313 19.1947 8.55656 19.4309 9.12844C19.6775 9.72375 20.1425 10.2084 20.5916 10.6772C21.0406 11.1459 21.5 11.625 21.5 12C21.5 12.375 21.0387 12.8578 20.5916 13.3228ZM16.7806 9.21937C16.8504 9.28903 16.9057 9.37175 16.9434 9.46279C16.9812 9.55384 17.0006 9.65144 17.0006 9.75C17.0006 9.84856 16.9812 9.94616 16.9434 10.0372C16.9057 10.1283 16.8504 10.211 16.7806 10.2806L11.5306 15.5306C11.461 15.6004 11.3783 15.6557 11.2872 15.6934C11.1962 15.7312 11.0986 15.7506 11 15.7506C10.9014 15.7506 10.8038 15.7312 10.7128 15.6934C10.6217 15.6557 10.539 15.6004 10.4694 15.5306L8.21937 13.2806C8.07864 13.1399 7.99958 12.949 7.99958 12.75C7.99958 12.551 8.07864 12.3601 8.21937 12.2194C8.36011 12.0786 8.55098 11.9996 8.75 11.9996C8.94902 11.9996 9.13989 12.0786 9.28063 12.2194L11 13.9397L15.7194 9.21937C15.789 9.14964 15.8717 9.09432 15.9628 9.05658C16.0538 9.01884 16.1514 8.99941 16.25 8.99941C16.3486 8.99941 16.4462 9.01884 16.5372 9.05658C16.6283 9.09432 16.711 9.14964 16.7806 9.21937Z" fill="#003592"/>
                    </svg>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                    <p className="text-[#2D2727] text-sm font-bold mb-1">
                        Additional Perils
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        Additional Perils pays for loss or damage to properties insured against natural catastrophic perils.
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Covered Items include
                    </p>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className=' ml-6'>All properties declared and insured.</li>
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Limit of Liability
                    </p>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className=' ml-6'>Php 2,000,000 first loss for Condominium Unit, and Ps. 500,000 first loss for Condominium Unit Improvements</li>
                        <li className='md:ml-6 ml-4'>Premium: Php1,000</li>
                    </p>
                    </p>
                    </div>
                </div>
            </div>
                   <div className="flex flex-col items-center justify-center w-full gap-4 md:gap-8 mb-5">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium" ref={perilsRef}>
                    Do you want to include Additional Perils in your plan?
                </h3>
                </div>
            <div className="flex flex-col items-center justify-center w-full gap-7 md:mb-5 mb-4">
                <div className="flex justify-center items-center w-full md:gap-9 gap-4">
                    {/* Yes Button */}
                    <button
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.addPerils === "Yes"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    const declaredValue = parseFloat(formData.declaredValue || 0);
                    const computedPerils = declaredValue > 0 ? declaredValue * 0.0005 : 1000;

                    // console.log("Declared Value:", declaredValue);
                    // console.log("Computed Perils Amount:", computedPerils);

                    setFormData((prev) => ({
                    ...prev,
                    addPerils: "Yes",
                    perilsAmount: computedPerils,
                    }));

                    setErrors((prev) => {
                    const newErrors = { ...prev };
                    delete newErrors.addPerils;
                    return newErrors;
                    });
                    setHasSubmitted(false);
                }}
                >
                    {formData.addPerils === "Yes" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.addPerils === "No"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                         addPerils: "No",
                        perilsAmount: 0,
                        }));
                        setErrors((prev) => {
                        const newErrors = { ...prev };
                        delete newErrors.addPerils;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    }}
                    >
                    {formData.addPerils === "No" && (
                        <span>
                       <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
                </div>
                 <div className="text-center items-center">
                 {formData.addPerils === "Yes" && parseFloat(formData.declaredValue || 0) > 0 && (
                <div className="flex flex-col items-center justify-center w-full">
                    <p className="text-[#121212] md:text-[23px] text-lg font-medium mb-2 text-center">
                    Value of the property
                    </p>
                    <div className="flex flex-col md:w-[300px] w-[200px] bg-[#F5F5F5] rounded-md shadow-sm px-4 py-3">
                    <label className="text-[10px] text-[#848A90] font-normal mb-1">
                        Value of the property in PHP
                        <span className="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        value={Number(formData.declaredValue || 0).toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                        })}
                        disabled
                        className="bg-transparent border-0 border-b border-[#006666] focus:ring-0 focus:outline-none text-[#1E1F21] text-sm font-normal py-1"
                    />
                    </div>

                    <div className="flex-col w-full md:w-[500px] mt-5 bg-[#FAFAFA] rounded-md shadow-sm px-4 py-3 hidden">
                    <label className="text-[10px] text-[#848A90] font-normal mb-1">
                        Perils Amount (0.05% of Declared Value)
                    </label>
                    <input
                        type="text"
                        value={`₱ ${Number(formData.perilsAmount || 0).toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                        })}`}
                        readOnly
                        className="bg-transparent border-0 border-b border-[#006666] focus:ring-0 focus:outline-none text-[#121212] text-base font-normal py-1"
                    />
                    </div>
                    <div className="flex justify-center">
            <div className="flex items-start gap-3 max-w-[300px] md:max-w-none mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none" className=' flex-shrink-0 md:w-[21px] w-[12px] md:h-[20px] h-[12px] md:mt-0 mt-2'>
                            <path d="M10.5 0.25C8.57164 0.25 6.68657 0.821828 5.08319 1.89317C3.47982 2.96451 2.23013 4.48726 1.49218 6.26884C0.754225 8.05042 0.561142 10.0108 0.937348 11.9021C1.31355 13.7934 2.24215 15.5307 3.60571 16.8943C4.96928 18.2579 6.70656 19.1865 8.59787 19.5627C10.4892 19.9389 12.4496 19.7458 14.2312 19.0078C16.0127 18.2699 17.5355 17.0202 18.6068 15.4168C19.6782 13.8134 20.25 11.9284 20.25 10C20.2473 7.41498 19.2192 4.93661 17.3913 3.10872C15.5634 1.28084 13.085 0.25273 10.5 0.25ZM10.5 18.25C8.86831 18.25 7.27326 17.7661 5.91655 16.8596C4.55984 15.9531 3.50242 14.6646 2.878 13.1571C2.25358 11.6496 2.0902 9.99085 2.40853 8.3905C2.72685 6.79016 3.51259 5.32015 4.66637 4.16637C5.82016 3.01259 7.29017 2.22685 8.89051 1.90852C10.4909 1.59019 12.1497 1.75357 13.6571 2.37799C15.1646 3.00242 16.4531 4.05984 17.3596 5.41655C18.2661 6.77325 18.75 8.3683 18.75 10C18.7475 12.1873 17.8775 14.2843 16.3309 15.8309C14.7843 17.3775 12.6873 18.2475 10.5 18.25ZM12 14.5C12 14.6989 11.921 14.8897 11.7803 15.0303C11.6397 15.171 11.4489 15.25 11.25 15.25C10.8522 15.25 10.4706 15.092 10.1893 14.8107C9.90804 14.5294 9.75 14.1478 9.75 13.75V10C9.55109 10 9.36033 9.92098 9.21967 9.78033C9.07902 9.63968 9 9.44891 9 9.25C9 9.05109 9.07902 8.86032 9.21967 8.71967C9.36033 8.57902 9.55109 8.5 9.75 8.5C10.1478 8.5 10.5294 8.65804 10.8107 8.93934C11.092 9.22064 11.25 9.60218 11.25 10V13.75C11.4489 13.75 11.6397 13.829 11.7803 13.9697C11.921 14.1103 12 14.3011 12 14.5ZM9 5.875C9 5.6525 9.06598 5.43499 9.1896 5.24998C9.31322 5.06498 9.48892 4.92078 9.69449 4.83564C9.90005 4.75049 10.1263 4.72821 10.3445 4.77162C10.5627 4.81502 10.7632 4.92217 10.9205 5.0795C11.0778 5.23684 11.185 5.43729 11.2284 5.65552C11.2718 5.87375 11.2495 6.09995 11.1644 6.30552C11.0792 6.51109 10.935 6.68679 10.75 6.8104C10.565 6.93402 10.3475 7 10.125 7C9.82664 7 9.54049 6.88147 9.32951 6.6705C9.11853 6.45952 9 6.17337 9 5.875Z" fill="#848A90"/>
                            </svg>
                <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-4"><span className='font-bold'>OPEN VALUE:</span> Value computation is based from the value of the property declared.</p>
            </div>
            </div>
                </div>
                
                )}

                 </div>
            <div className="flex flex-col items-center justify-center w-full md:py-4 md:gap-8 gap-4">
                 <div className="flex items-center justify-center w-full py-4 md:py-9">
                <div className="flex items-start">
                <h2 className="flex items-center justify-center md:gap-5 gap-3 text-[#2D2727] text-[18px] md:text-[27px] font-medium md:font-bold" ref={benefitsRef}>
                    Optional Benefits
                     <span>
                            {(formData.addBenefits === "No" || (
                            formData.addBenefits === "Yes"
                        )) ? (
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && !formData.addBenefits ==="Yes" ? (
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
            <div className="flex flex-col items-center justify-center w-full gap-4 md:gap-8 mb-5">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium">
                    Do you want to add Benefits?
                </h3>
                </div>
            <div className="flex flex-col items-center justify-center w-full gap-7 md:mb-5 mb-4">
                <div className="flex justify-center items-center w-full md:gap-9 gap-4">
                    {/* Yes Button */}
                    <button
                     type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.addBenefits === "Yes"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        addBenefits: "Yes",
                    }));
                    setErrors((prev) => {
                        const newErrors = { ...prev };
                        delete newErrors.addBenefits;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    }}
                    >
                    {formData.addBenefits === "Yes" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.addBenefits === "No"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                     onClick={() => {
                    setFormData((prev) => ({ ...prev, addBenefits: "No", optionalBenefits: [], 
                    }));

                    setIsCheckedHousehold(false);
                    setIsCheckedGroceries(false);
                    setIsCheckedParking(false);
                    setIsCheckedWorks(false);
                    setIsCheckedFixed(false);

                    setErrors((prev) => {
                        const newErrors = { ...prev };
                         delete newErrors.addBenefits;
                         delete newErrors.addBenefits;
                         delete newErrors.optionalBenefits;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    }}
                    >
                    {formData.addBenefits === "No" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
            <div className="flex justify-center">
            <div className="flex items-start gap-3 max-w-[300px] md:max-w-none">

            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none" className=' flex-shrink-0 md:w-[21px] w-[12px] md:h-[20px] h-[12px] md:mt-0 mt-2'>
                            <path d="M10.5 0.25C8.57164 0.25 6.68657 0.821828 5.08319 1.89317C3.47982 2.96451 2.23013 4.48726 1.49218 6.26884C0.754225 8.05042 0.561142 10.0108 0.937348 11.9021C1.31355 13.7934 2.24215 15.5307 3.60571 16.8943C4.96928 18.2579 6.70656 19.1865 8.59787 19.5627C10.4892 19.9389 12.4496 19.7458 14.2312 19.0078C16.0127 18.2699 17.5355 17.0202 18.6068 15.4168C19.6782 13.8134 20.25 11.9284 20.25 10C20.2473 7.41498 19.2192 4.93661 17.3913 3.10872C15.5634 1.28084 13.085 0.25273 10.5 0.25ZM10.5 18.25C8.86831 18.25 7.27326 17.7661 5.91655 16.8596C4.55984 15.9531 3.50242 14.6646 2.878 13.1571C2.25358 11.6496 2.0902 9.99085 2.40853 8.3905C2.72685 6.79016 3.51259 5.32015 4.66637 4.16637C5.82016 3.01259 7.29017 2.22685 8.89051 1.90852C10.4909 1.59019 12.1497 1.75357 13.6571 2.37799C15.1646 3.00242 16.4531 4.05984 17.3596 5.41655C18.2661 6.77325 18.75 8.3683 18.75 10C18.7475 12.1873 17.8775 14.2843 16.3309 15.8309C14.7843 17.3775 12.6873 18.2475 10.5 18.25ZM12 14.5C12 14.6989 11.921 14.8897 11.7803 15.0303C11.6397 15.171 11.4489 15.25 11.25 15.25C10.8522 15.25 10.4706 15.092 10.1893 14.8107C9.90804 14.5294 9.75 14.1478 9.75 13.75V10C9.55109 10 9.36033 9.92098 9.21967 9.78033C9.07902 9.63968 9 9.44891 9 9.25C9 9.05109 9.07902 8.86032 9.21967 8.71967C9.36033 8.57902 9.55109 8.5 9.75 8.5C10.1478 8.5 10.5294 8.65804 10.8107 8.93934C11.092 9.22064 11.25 9.60218 11.25 10V13.75C11.4489 13.75 11.6397 13.829 11.7803 13.9697C11.921 14.1103 12 14.3011 12 14.5ZM9 5.875C9 5.6525 9.06598 5.43499 9.1896 5.24998C9.31322 5.06498 9.48892 4.92078 9.69449 4.83564C9.90005 4.75049 10.1263 4.72821 10.3445 4.77162C10.5627 4.81502 10.7632 4.92217 10.9205 5.0795C11.0778 5.23684 11.185 5.43729 11.2284 5.65552C11.2718 5.87375 11.2495 6.09995 11.1644 6.30552C11.0792 6.51109 10.935 6.68679 10.75 6.8104C10.565 6.93402 10.3475 7 10.125 7C9.82664 7 9.54049 6.88147 9.32951 6.6705C9.11853 6.45952 9 6.17337 9 5.875Z" fill="#848A90"/>
                            </svg>
                <p className="text-[#848A90] md:text-base text-xs font-medium mb-4">Build your own special coverage with our flexible insurance benefits with <a href="https://www.cocogen.com/condo-excel-plus-insurance" rel='noopener noreferrer' target="_blank" className='text-[#008080]'>Condo Excel Plus</a>.</p>
            </div>
            </div>
            {formData.addBenefits === "Yes" && (
                <div className="md:w-[740px] w-[320px]">
                <div className="flex flex-col bg-[#F5F5F5] border-l-4 border-[#003592] py-4 px-3 md:px-5 rounded-md mb-5">
                     <div className="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className='flex shrink-0 md:w-[25px] w-[15px] md:h-[24px] h-[15px]'>
                    <path d="M21.6744 9.63937C21.3209 9.27 20.9553 8.88938 20.8175 8.55469C20.69 8.24813 20.6825 7.74 20.675 7.24781C20.6609 6.33281 20.6459 5.29594 19.925 4.575C19.2041 3.85406 18.1672 3.83906 17.2522 3.825C16.76 3.8175 16.2519 3.81 15.9453 3.6825C15.6116 3.54469 15.23 3.17906 14.8606 2.82562C14.2137 2.20406 13.4788 1.5 12.5 1.5C11.5212 1.5 10.7872 2.20406 10.1394 2.82562C9.77 3.17906 9.38938 3.54469 9.05469 3.6825C8.75 3.81 8.24 3.8175 7.74781 3.825C6.83281 3.83906 5.79594 3.85406 5.075 4.575C4.35406 5.29594 4.34375 6.33281 4.325 7.24781C4.3175 7.74 4.31 8.24813 4.1825 8.55469C4.04469 8.88844 3.67906 9.27 3.32562 9.63937C2.70406 10.2863 2 11.0212 2 12C2 12.9788 2.70406 13.7128 3.32562 14.3606C3.67906 14.73 4.04469 15.1106 4.1825 15.4453C4.31 15.7519 4.3175 16.26 4.325 16.7522C4.33906 17.6672 4.35406 18.7041 5.075 19.425C5.79594 20.1459 6.83281 20.1609 7.74781 20.175C8.24 20.1825 8.74813 20.19 9.05469 20.3175C9.38844 20.4553 9.77 20.8209 10.1394 21.1744C10.7863 21.7959 11.5212 22.5 12.5 22.5C13.4788 22.5 14.2128 21.7959 14.8606 21.1744C15.23 20.8209 15.6106 20.4553 15.9453 20.3175C16.2519 20.19 16.76 20.1825 17.2522 20.175C18.1672 20.1609 19.2041 20.1459 19.925 19.425C20.6459 18.7041 20.6609 17.6672 20.675 16.7522C20.6825 16.26 20.69 15.7519 20.8175 15.4453C20.9553 15.1116 21.3209 14.73 21.6744 14.3606C22.2959 13.7137 23 12.9788 23 12C23 11.0212 22.2959 10.2872 21.6744 9.63937ZM20.5916 13.3228C20.1425 13.7916 19.6775 14.2763 19.4309 14.8716C19.1947 15.4434 19.1844 16.0969 19.175 16.7297C19.1656 17.3859 19.1553 18.0731 18.8638 18.3638C18.5722 18.6544 17.8897 18.6656 17.2297 18.675C16.5969 18.6844 15.9434 18.6947 15.3716 18.9309C14.7763 19.1775 14.2916 19.6425 13.8228 20.0916C13.3541 20.5406 12.875 21 12.5 21C12.125 21 11.6422 20.5387 11.1772 20.0916C10.7122 19.6444 10.2238 19.1775 9.62844 18.9309C9.05656 18.6947 8.40313 18.6844 7.77031 18.675C7.11406 18.6656 6.42688 18.6553 6.13625 18.3638C5.84562 18.0722 5.83437 17.3897 5.825 16.7297C5.81562 16.0969 5.80531 15.4434 5.56906 14.8716C5.3225 14.2763 4.8575 13.7916 4.40844 13.3228C3.95937 12.8541 3.5 12.375 3.5 12C3.5 11.625 3.96125 11.1422 4.40844 10.6772C4.85562 10.2122 5.3225 9.72375 5.56906 9.12844C5.80531 8.55656 5.81562 7.90313 5.825 7.27031C5.83437 6.61406 5.84469 5.92688 6.13625 5.63625C6.42781 5.34562 7.11031 5.33437 7.77031 5.325C8.40313 5.31562 9.05656 5.30531 9.62844 5.06906C10.2238 4.8225 10.7084 4.3575 11.1772 3.90844C11.6459 3.45937 12.125 3 12.5 3C12.875 3 13.3578 3.46125 13.8228 3.90844C14.2878 4.35562 14.7763 4.8225 15.3716 5.06906C15.9434 5.30531 16.5969 5.31562 17.2297 5.325C17.8859 5.33437 18.5731 5.34469 18.8638 5.63625C19.1544 5.92781 19.1656 6.61031 19.175 7.27031C19.1844 7.90313 19.1947 8.55656 19.4309 9.12844C19.6775 9.72375 20.1425 10.2084 20.5916 10.6772C21.0406 11.1459 21.5 11.625 21.5 12C21.5 12.375 21.0387 12.8578 20.5916 13.3228ZM16.7806 9.21937C16.8504 9.28903 16.9057 9.37175 16.9434 9.46279C16.9812 9.55384 17.0006 9.65144 17.0006 9.75C17.0006 9.84856 16.9812 9.94616 16.9434 10.0372C16.9057 10.1283 16.8504 10.211 16.7806 10.2806L11.5306 15.5306C11.461 15.6004 11.3783 15.6557 11.2872 15.6934C11.1962 15.7312 11.0986 15.7506 11 15.7506C10.9014 15.7506 10.8038 15.7312 10.7128 15.6934C10.6217 15.6557 10.539 15.6004 10.4694 15.5306L8.21937 13.2806C8.07864 13.1399 7.99958 12.949 7.99958 12.75C7.99958 12.551 8.07864 12.3601 8.21937 12.2194C8.36011 12.0786 8.55098 11.9996 8.75 11.9996C8.94902 11.9996 9.13989 12.0786 9.28063 12.2194L11 13.9397L15.7194 9.21937C15.789 9.14964 15.8717 9.09432 15.9628 9.05658C16.0538 9.01884 16.1514 8.99941 16.25 8.99941C16.3486 8.99941 16.4462 9.01884 16.5372 9.05658C16.6283 9.09432 16.711 9.14964 16.7806 9.21937Z" fill="#003592"/>
                    </svg>

                    {showFullText ? (
                        <>
                <p className="text-[#2D2727] text-sm font-bold mb-1">
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        What are Additional Benefits?
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        Additional Benefits include Household <br className='md:hidden block'/>Contents, Groceries and Foodstuff, Parking<br className='md:hidden block'/> Slot, Works of Art, Paintings, and Antiques,<br className='md:hidden block'/> Fixed Glass Accidental Damage. This coverage<br className='md:hidden block'/> is optional. 
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Why include Additional Benefits in your Condo Excel Premium?
                    </p>
                     <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        When you include Additional Benefits in your premium plan, it adds coverage, pays for loss<br className='md:hidden block'/> or damage to the items in your unit. This is an<br className='md:hidden block'/> added protection to important items in your<br className='md:hidden block'/> unit in case of burglary, fire and other natural<br className='md:hidden block'/> catastrophic events.
                    </p>
                     <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Benefits’ Limit of Liability and Items Covered
                    </p>
                    <li className="text-[#2D2727] md:text-sm text-xs font-bold mb-1 md:ml-0 ml-4">
                        Household Contents
                    </li>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='md:ml-4 ml-9'>Limit of Liability: Php 200,000 first loss <br className='md:hidden block'/>any one occurrence and annual<br className='md:hidden block'/> aggregate</li>
                        <li className='md:ml-4 ml-9'>Household Contents include furniture, fixtures and fittings, clothing, appliances, computers,<span className='md:pl-8 ml-0'> personal </span> belongings and<br className='md:hidden block'/> other household items. </li>
                        <li className='md:ml-4 ml-9'>Premium: <strong>Php250.00</strong> </li>
                    </p>
                    <li className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Groceries and Foodstuff
                    </li>
                    
                     <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-4'>Limit of Liability: Php 20,000 first loss<br className='md:hidden block'/> any one occurrence and annual aggregate.</li>
                        <li className='ml-4'>Pays for loss or damage to groceries and foodstuff in refrigerator, freezer, or<br className='md:hidden block'/> storage</li>
                        <li className='ml-4'>Premium: <strong>Php50.00</strong> </li>
                    </p>
                    <li className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Parking Slot
                    </li>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-4'>Limit of Liability: Php 20,000 first loss<br className='md:hidden block'/> any one occurrence and annual<br className='md:hidden block'/> aggregate.</li>
                        <li className='ml-4'>Pays for loss or damage to the parking<br className='md:hidden block'/> slot.</li>
                        <li className='ml-4'>Premium: <strong>Php100.00</strong> </li>
                    </p>
                    <li className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Works of Art, Paintings and Antiques
                    </li>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-4'>Limit of Liability: Php 100,000 first loss<br className='md:hidden block'/> any one occurrence and annual<br className='md:hidden block'/> aggregate.</li>
                        <li className='ml-4'>Pays for loss or damage to the Works of<br className='md:hidden block'/> Art, Paintings and Antiques within the condominium unit.</li>
                        <li className='ml-4'>Premium: <strong>Php200.00</strong> </li>
                    </p>
                    <li className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Fixed Glass Accidental Damage
                    </li>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-4'>Limit of Liability: Php20,000 first loss<br className='md:hidden block'/> any one occurrence and annual<br className='md:hidden block'/> aggregate.</li>
                        <li className='ml-4'>Pays for loss or damage to the Works of<br className='md:hidden block'/> Art, Paintings and Antiques within the condominium unit</li>
                        <li className='ml-4'>Premium: <strong>Php50.00</strong> </li>
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        You can double or triple the coverage on each Benefit
                    </p>
                     <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        If you wish to double or triple the protection of <br className='md:hidden block'/>a specific Benefit, you may do so. <br></br>
                    </p>
                    <button
                    onClick={() => setShowFullText(false)}
                    className="text-[#008080] font-bold"
                    >
                    See less
                    </button>
                    </p>
                        
                        </>
                    ) : (
                        <>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        What are Additional Benefits?
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        Additional Benefits include Household Contents, Groceries and Foodstuff, Parking Slot, Works of Art, Paintings, and Antiques, Fixed Glass Accidental Damage. This coverage is optional. 
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Why include Additional Benefits in your Condo Excel Premium?
                    </p>
                     <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        When you include Additional Benefits in your premium plan, it adds coverage, pays for loss or damage to the items in your unit. This is an added protection to important items in your unit in case of burglary, fire and other natural catastrophic events.
                    </p>
                    <button onClick={() => setShowFullText(true)}
                            className="text-[#008080] font-bold"
                        >
                            See more
                        </button>
                        </p>{" "}
                        
                        </>
                    )}
                    </div>
                </div>
                <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedHousehold ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedHousehold ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    ref={addbenefitsRef}>
                    {errors.optionalBenefits && (
                    <p className="text-red-600 text-sm mt-5 mb-5">{errors.optionalBenefits}</p>
                    )}

                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedHousehold}
                        onChange={() => {
                            const newValue = !isCheckedHousehold;
                            setIsCheckedHousehold(newValue);

                            if (newValue) {
                            const defaultCoverage = "200,000";
                            const defaultValue = 250;

                            setSelectedCoverageHousehold(defaultCoverage);
                                                    setFormData((prev) => {

                                const updatedBenefits = [...(prev.optionalBenefits || [])];
                                const index = updatedBenefits.findIndex(
                                (b) => b.name === "Household Contents"
                                );

                                const benefitData = {
                                name: "Household Contents",
                                coverage: defaultCoverage,
                                value: defaultValue,
                                selected: true,
                                };

                                if (index !== -1) {
                                updatedBenefits[index] = benefitData;
                                } else {
                                updatedBenefits.push(benefitData);
                                }

                                return { ...prev, optionalBenefits: updatedBenefits };
                            });
                            } else {
                            setSelectedCoverageHousehold("");
                            setFormData((prev) => {
                                const updatedBenefits = [...(prev.optionalBenefits || [])];
                                const index = updatedBenefits.findIndex(
                                (b) => b.name === "Household Contents"
                                );

                                if (index !== -1) {
                                updatedBenefits[index] = {
                                    ...updatedBenefits[index],
                                    selected: false,
                                    coverage: "",
                                    value: 0,
                                };
                                }

                                return { ...prev, optionalBenefits: updatedBenefits };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Household Contents
                        </span>
                    </label>

                    {isCheckedHousehold && (
                    <div className="flex flex-col w-full">                      
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                        Php200,000
                        </div>
                    </div>
                        <div className="flex items-start md:gap-4 gap-2 mt-5 md:mb-5 mb-0">
                        {["200,000", "400,000", "600,000"].map((amount, index) => (
                            <button
                            key={amount}
                             onClick={() => {
                            setSelectedCoverageHousehold(amount);

                            const multiplier = index + 1; 
                            const computedValue = 250 * multiplier;

                            setFormData((prev) => {
                            const updatedBenefits = [...(prev.optionalBenefits || [])];
                            const idx = updatedBenefits.findIndex(
                            (b) => b.name === "Household Contents"
                            );

                            const benefitData = {
                            name: "Household Contents",
                            coverage: amount,
                            value: computedValue,
                            selected: true,
                            };

                            if (idx !== -1) {
                            updatedBenefits[idx] = benefitData;
                            } else {
                            updatedBenefits.push(benefitData);
                            }

                            return { ...prev, optionalBenefits: updatedBenefits };
                        });
                        }}

                            // console.log(
                            // `Selected: ₱${amount}, Computed value: ₱${computedValue}`
                            // );
                            className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                selectedCoverageHousehold === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                            {amount}
                            </button>
                        ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedGroceries ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedGroceries ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedGroceries}
                        onChange={() => {
                            const newValue = !isCheckedGroceries;
                            setIsCheckedGroceries(newValue);

                            if (newValue) {
                            setSelectedCoverageGroceries("20,000");

                            setFormData((prev) => {
                                const updated = prev.optionalBenefits?.filter(
                                (b) => b.name !== "Groceries and Foodstuff"
                                ) || [];

                                return {
                                ...prev,
                                optionalBenefits: [
                                    ...updated,
                                    {
                                    name: "Groceries and Foodstuff",
                                    coverage: "20,000",
                                    value: 50,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageGroceries("");

                            setFormData((prev) => {
                                const updated = prev.optionalBenefits?.filter(
                                (b) => b.name !== "Groceries and Foodstuff"
                                ) || [];
                                return { ...prev, optionalBenefits: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Groceries and Foodstuff
                        </span>
                    </label>

                    {isCheckedGroceries && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php20,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["20,000", "40,000", "60,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageGroceries(amount);
                                const multiplier = index + 1;
                                const computedValue = 50 * multiplier;

                                setFormData((prev) => {
                                    const updated = prev.optionalBenefits?.filter(
                                    (b) => b.name !== "Groceries and Foodstuff"
                                    ) || [];
                                    return {
                                    ...prev,
                                    optionalBenefits: [
                                        ...updated,
                                        {
                                        name: "Groceries and Foodstuff",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageGroceries === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedParking ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedParking ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedParking}
                        onChange={() => {
                            const newValue = !isCheckedParking;
                            setIsCheckedParking(newValue);

                            if (newValue) {
                            setSelectedCoverageParking("100,000");

                            setFormData((prev) => {
                                const updated = prev.optionalBenefits?.filter(
                                (b) => b.name !== "Parking Slot"
                                ) || [];

                                return {
                                ...prev,
                                optionalBenefits: [
                                    ...updated,
                                    {
                                    name: "Parking Slot",
                                    coverage: "100,000",
                                    value: 100,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageParking("");
                            setFormData((prev) => {
                                const updated = prev.optionalBenefits?.filter(
                                (b) => b.name !== "Parking Slot"
                                ) || [];
                                return { ...prev, optionalBenefits: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">Parking Slot</span>
                    </label>

                    {isCheckedParking && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php100,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["100,000", "200,000", "300,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageParking(amount);
                                const multiplier = index + 1;
                                const computedValue = 100 * multiplier;

                                setFormData((prev) => {
                                    const updated = prev.optionalBenefits?.filter(
                                    (b) => b.name !== "Parking Slot"
                                    ) || [];

                                    return {
                                    ...prev,
                                    optionalBenefits: [
                                        ...updated,
                                        {
                                        name: "Parking Slot",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageParking === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedWorks ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedWorks ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedWorks}
                        onChange={() => {
                            const newValue = !isCheckedWorks;
                            setIsCheckedWorks(newValue);

                            if (newValue) {
                            setSelectedCoverageWorks("50,000");

                            setFormData((prev) => {
                                const updated = prev.optionalBenefits?.filter(
                                (b) => b.name !== "Works of Art, Paintings, and Antiques"
                                ) || [];

                                return {
                                ...prev,
                                optionalBenefits: [
                                    ...updated,
                                    {
                                    name: "Works of Art, Paintings, and Antiques",
                                    coverage: "50,000",
                                    value: 200,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageWorks("");
                            setFormData((prev) => {
                                const updated = prev.optionalBenefits?.filter(
                                (b) => b.name !== "Works of Art, Paintings, and Antiques"
                                ) || [];
                                return { ...prev, optionalBenefits: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Works of Art, Paintings, and Antiques
                        </span>
                    </label>

                    {isCheckedWorks && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php50,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["50,000", "100,000", "150,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageWorks(amount);
                                const multiplier = index + 1;
                                const computedValue = 200 * multiplier;

                                setFormData((prev) => {
                                    const updated = prev.optionalBenefits?.filter(
                                    (b) => b.name !== "Works of Art, Paintings, and Antiques"
                                    ) || [];

                                    return {
                                    ...prev,
                                    optionalBenefits: [
                                        ...updated,
                                        {
                                        name: "Works of Art, Paintings, and Antiques",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageWorks === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedFixed ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedFixed ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedFixed}
                        onChange={() => {
                            const newValue = !isCheckedFixed;
                            setIsCheckedFixed(newValue);

                            if (newValue) {
                            setSelectedCoverageFixed("20,000");

                            setFormData((prev) => {
                                const updated =
                                prev.optionalBenefits?.filter(
                                    (b) => b.name !== "Fixed Glass Accidental Damage"
                                ) || [];

                                return {
                                ...prev,
                                optionalBenefits: [
                                    ...updated,
                                    {
                                    name: "Fixed Glass Accidental Damage",
                                    coverage: "20,000",
                                    value: 50,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageFixed("");
                            setFormData((prev) => {
                                const updated =
                                prev.optionalBenefits?.filter(
                                    (b) => b.name !== "Fixed Glass Accidental Damage"
                                ) || [];
                                return { ...prev, optionalBenefits: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Fixed Glass Accidental Damage
                        </span>
                    </label>

                    {isCheckedFixed && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php20,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["20,000", "40,000", "60,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageFixed(amount);
                                const multiplier = index + 1;
                                const computedValue = 50 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.optionalBenefits?.filter(
                                        (b) => b.name !== "Fixed Glass Accidental Damage"
                                    ) || [];

                                    return {
                                    ...prev,
                                    optionalBenefits: [
                                        ...updated,
                                        {
                                        name: "Fixed Glass Accidental Damage",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageFixed === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
            </div>
            )}

            </div>
            <div className="flex flex-col items-center justify-center w-full md:py-4 gap-1">
                <div className="flex items-center justify-center w-full py-4 md:py-9">
                <div className="flex items-start">
                <h2 className="flex items-center justify-center md:gap-5 gap-3 text-[#2D2727] text-[18px] md:text-[27px] font-medium md:font-bold" ref={coverRef}>
                    Add Extensions of Cover
                     <span>
                            {(formData.withExtensionCover === "No" || (
                            formData.withExtensionCover === "Yes"
                        )) ? (
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && !formData.withExtensionCover === "Yes" ? (
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
            <div className="flex flex-col items-center justify-center w-full gap-7 md:mb-5 mb-4">
                <div className="flex justify-center items-center w-full md:gap-9 gap-4">
                    {/* Yes Button */}
                    <button
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.withExtensionCover === "Yes"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        withExtensionCover: "Yes",
                    }));
                    setErrors((prev) => {
                        const newErrors = { ...prev };
                         delete newErrors.withExtensionCover;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    }}
                    >
                    {formData.withExtensionCover === "Yes" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
                    type='button'
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.withExtensionCover === "No"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                     onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        withExtensionCover: "No",
                     extensionCovers: [], 
                        }));

                        setIsCheckedFamily(false);
                        setIsCheckedEmergency(false);
                        setIsCheckedSpecial(false);
                        setIsCheckedPersonalGeneral(false);
                        setIsCheckedHomeAssistance(false);
                        setIsCheckedAutomatic(false);
                        setIsCheckedDebris(false);
                        setIsCheckedFire(false);
                        setIsCheckedFireBrigade(false);
                        setIsCheckedProfessional(false);
                        setIsCheckedTemporary(false);
                        setIsCheckedAdditionalLimit(false);
                        setIsCheckedKasambahay(false);

                    setErrors((prev) => {
                        const newErrors = { ...prev };
                         delete newErrors.withExtensionCover;
                         delete newErrors.withExtensionCover;
                         delete newErrors.extensionCover;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    setIsNextDisabled(false); 
                    }}
                    >
                    {formData.withExtensionCover === "No" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
            {formData.withExtensionCover === "Yes" && (
                <div className="md:w-[740px] w-[320px]">
                <div className="flex flex-col bg-[#F5F5F5] border-l-4 border-[#003592] py-4 px-3 md:px-5 rounded-md mb-5">
                     <div className="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className='flex shrink-0 md:w-[25px] w-[15px] md:h-[24px] h-[15px]'>
                    <path d="M21.6744 9.63937C21.3209 9.27 20.9553 8.88938 20.8175 8.55469C20.69 8.24813 20.6825 7.74 20.675 7.24781C20.6609 6.33281 20.6459 5.29594 19.925 4.575C19.2041 3.85406 18.1672 3.83906 17.2522 3.825C16.76 3.8175 16.2519 3.81 15.9453 3.6825C15.6116 3.54469 15.23 3.17906 14.8606 2.82562C14.2137 2.20406 13.4788 1.5 12.5 1.5C11.5212 1.5 10.7872 2.20406 10.1394 2.82562C9.77 3.17906 9.38938 3.54469 9.05469 3.6825C8.75 3.81 8.24 3.8175 7.74781 3.825C6.83281 3.83906 5.79594 3.85406 5.075 4.575C4.35406 5.29594 4.34375 6.33281 4.325 7.24781C4.3175 7.74 4.31 8.24813 4.1825 8.55469C4.04469 8.88844 3.67906 9.27 3.32562 9.63937C2.70406 10.2863 2 11.0212 2 12C2 12.9788 2.70406 13.7128 3.32562 14.3606C3.67906 14.73 4.04469 15.1106 4.1825 15.4453C4.31 15.7519 4.3175 16.26 4.325 16.7522C4.33906 17.6672 4.35406 18.7041 5.075 19.425C5.79594 20.1459 6.83281 20.1609 7.74781 20.175C8.24 20.1825 8.74813 20.19 9.05469 20.3175C9.38844 20.4553 9.77 20.8209 10.1394 21.1744C10.7863 21.7959 11.5212 22.5 12.5 22.5C13.4788 22.5 14.2128 21.7959 14.8606 21.1744C15.23 20.8209 15.6106 20.4553 15.9453 20.3175C16.2519 20.19 16.76 20.1825 17.2522 20.175C18.1672 20.1609 19.2041 20.1459 19.925 19.425C20.6459 18.7041 20.6609 17.6672 20.675 16.7522C20.6825 16.26 20.69 15.7519 20.8175 15.4453C20.9553 15.1116 21.3209 14.73 21.6744 14.3606C22.2959 13.7137 23 12.9788 23 12C23 11.0212 22.2959 10.2872 21.6744 9.63937ZM20.5916 13.3228C20.1425 13.7916 19.6775 14.2763 19.4309 14.8716C19.1947 15.4434 19.1844 16.0969 19.175 16.7297C19.1656 17.3859 19.1553 18.0731 18.8638 18.3638C18.5722 18.6544 17.8897 18.6656 17.2297 18.675C16.5969 18.6844 15.9434 18.6947 15.3716 18.9309C14.7763 19.1775 14.2916 19.6425 13.8228 20.0916C13.3541 20.5406 12.875 21 12.5 21C12.125 21 11.6422 20.5387 11.1772 20.0916C10.7122 19.6444 10.2238 19.1775 9.62844 18.9309C9.05656 18.6947 8.40313 18.6844 7.77031 18.675C7.11406 18.6656 6.42688 18.6553 6.13625 18.3638C5.84562 18.0722 5.83437 17.3897 5.825 16.7297C5.81562 16.0969 5.80531 15.4434 5.56906 14.8716C5.3225 14.2763 4.8575 13.7916 4.40844 13.3228C3.95937 12.8541 3.5 12.375 3.5 12C3.5 11.625 3.96125 11.1422 4.40844 10.6772C4.85562 10.2122 5.3225 9.72375 5.56906 9.12844C5.80531 8.55656 5.81562 7.90313 5.825 7.27031C5.83437 6.61406 5.84469 5.92688 6.13625 5.63625C6.42781 5.34562 7.11031 5.33437 7.77031 5.325C8.40313 5.31562 9.05656 5.30531 9.62844 5.06906C10.2238 4.8225 10.7084 4.3575 11.1772 3.90844C11.6459 3.45937 12.125 3 12.5 3C12.875 3 13.3578 3.46125 13.8228 3.90844C14.2878 4.35562 14.7763 4.8225 15.3716 5.06906C15.9434 5.30531 16.5969 5.31562 17.2297 5.325C17.8859 5.33437 18.5731 5.34469 18.8638 5.63625C19.1544 5.92781 19.1656 6.61031 19.175 7.27031C19.1844 7.90313 19.1947 8.55656 19.4309 9.12844C19.6775 9.72375 20.1425 10.2084 20.5916 10.6772C21.0406 11.1459 21.5 11.625 21.5 12C21.5 12.375 21.0387 12.8578 20.5916 13.3228ZM16.7806 9.21937C16.8504 9.28903 16.9057 9.37175 16.9434 9.46279C16.9812 9.55384 17.0006 9.65144 17.0006 9.75C17.0006 9.84856 16.9812 9.94616 16.9434 10.0372C16.9057 10.1283 16.8504 10.211 16.7806 10.2806L11.5306 15.5306C11.461 15.6004 11.3783 15.6557 11.2872 15.6934C11.1962 15.7312 11.0986 15.7506 11 15.7506C10.9014 15.7506 10.8038 15.7312 10.7128 15.6934C10.6217 15.6557 10.539 15.6004 10.4694 15.5306L8.21937 13.2806C8.07864 13.1399 7.99958 12.949 7.99958 12.75C7.99958 12.551 8.07864 12.3601 8.21937 12.2194C8.36011 12.0786 8.55098 11.9996 8.75 11.9996C8.94902 11.9996 9.13989 12.0786 9.28063 12.2194L11 13.9397L15.7194 9.21937C15.789 9.14964 15.8717 9.09432 15.9628 9.05658C16.0538 9.01884 16.1514 8.99941 16.25 8.99941C16.3486 8.99941 16.4462 9.01884 16.5372 9.05658C16.6283 9.09432 16.711 9.14964 16.7806 9.21937Z" fill="#003592"/>
                    </svg>

                    {showFullText ? (
                        <>
                <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                    <p className="text-[#2D2727] text-sm font-bold mb-1">
                        Extensions of Cover
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        Extensions of Cover is an optional coverage feature in Condo Excel Plus Premium plan.
                    </p>
                     <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Extensions
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        1. Family Personal Accident
                    </p>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-4'>Pays for bodily injury, accidental death and other expenses related to the covered accident for family members.</li>
                        <li className='ml-4'>Limit of Liability: Schedule of Benefits</li>
                    </p>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1 ml-6">
                        a. Php 100,000 as Capital Sum and for <br/>
                        b. Accidental Death & Permanent Total Disablement % shown in the Table of Compensation for Permanent Partial Disablement.<br/>
                        c. Php 100,000 for Unprovoked Murder & Assault. <br/>
                        d. Php 10,000 for Accidental Medical Expenses. <br/>
                    </p>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-4'>Php 10,000 Accidental Burial Expenses</li>
                        <li className='ml-4'>Insured Persons and Limits per person as % <br className='md:hidden block'/> of Schedule of Benefits <br/>Principal Insured: 100% <br/> Spouse: 50%</li>
                        <li className='ml-4'>Children/Parents: 25% (subject to <br className='md:hidden block'/> maximum sum of Php 100,000 annual aggregate).</li>
                        <li className='ml-4'>Note: Unless otherwise specified in the Schedule, the Principal Insured shall<br className='md:hidden block'/>  mean the Male Spouse</li>
                    </p>
                    <button
                    onClick={() => setShowFullText(false)}
                    className="text-[#008080] font-bold"
                    >
                    See less
                    </button>
                    </p>
                        
                        </>
                    ) : (
                        <>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Extensions of Cover
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        Extensions of Cover is an optional coverage feature in Condo Excel Plus Premium plan. It covers 
                    </p>
                    <button onClick={() => setShowFullText(true)}
                            className="text-[#008080] font-bold"
                        >
                            See more
                        </button>
                        </p>{" "}
                        
                        </>
                    )}
                    </div>
                </div>
                <div
                className={`flex flex-col md:justify-center md:items-start ${
                    isCheckedFamily ? "py-7" : "py-2"
                } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                    isCheckedFamily ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                }`}
                ref={extcoverRef}
                >
                {errors.extensionCover && (
                    <p className="text-red-600 text-sm mt-5 mb-5">{errors.extensionCover}</p>
                )}

                <label className="flex items-center gap-3 cursor-pointer mb-4">
                    <input
                    type="checkbox"
                    checked={isCheckedFamily}
                    onChange={() => {
                        const newValue = !isCheckedFamily;
                        setIsCheckedFamily(newValue);

                        if (newValue) {
                        setSelectedCoverageFamily("Standard Protection");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Family Personal Accident"
                            ) || [];

                            return {
                            ...prev,
                            extensionCovers: [
                                ...updated,
                                {
                                name: "Family Personal Accident",
                                coverage: "Standard Protection",
                                value: 200,
                                selected: true,
                                },
                            ],
                            };
                        });
                        } else {
                        setSelectedCoverageFamily("");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Family Personal Accident"
                            ) || [];
                            return { ...prev, extensionCovers: updated };
                        });
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                    />
                    <span className="text-[#1E1F21] text-base font-medium">
                    Family Personal Accident
                    </span>
                </label>

                {isCheckedFamily && (
                    <div className="flex flex-col w-full">
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm italic font-medium leading-6">
                        Indicated above
                        </div>
                    </div>

                    <div className="flex md:items-start gap-4 mt-5 md:mb-5 mb-0">
                        {["Standard Protection", "Double Protection", "Triple Protection"].map(
                        (amount, index) => (
                            <button
                            key={amount}
                            onClick={() => {
                                setSelectedCoverageFamily(amount);
                                const multiplier = index + 1;
                                const computedValue = 200 * multiplier;

                                setFormData((prev) => {
                                const updated =
                                    prev.extensionCovers?.filter(
                                    (c) => c.name !== "Family Personal Accident"
                                    ) || [];

                                return {
                                    ...prev,
                                    extensionCovers: [
                                    ...updated,
                                    {
                                        name: "Family Personal Accident",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                    },
                                    ],
                                };
                                });
                            }}
                            className={`flex justify-center items-center gap-3 md:px-7 md:py-2 px-5 py-3 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                selectedCoverageFamily === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                            {amount}
                            </button>
                        )
                        )}
                    </div>
                    </div>
                )}
                </div>
                <div
                className={`flex flex-col md:justify-center md:items-start ${
                    isCheckedEmergency ? "py-7" : "py-2"
                } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                    isCheckedEmergency ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                }`}
                >
                <label className="flex items-center gap-3 cursor-pointer mb-4">
                    <input
                    type="checkbox"
                    checked={isCheckedEmergency}
                    onChange={() => {
                        const newValue = !isCheckedEmergency;
                        setIsCheckedEmergency(newValue);

                        if (newValue) {
                        setSelectedCoverageEmergency("15,000");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) =>
                                c.name !==
                                "Emergency Expense, Alternative Accommodations and/or Rental Income"
                            ) || [];

                            return {
                            ...prev,
                            extensionCovers: [
                                ...updated,
                                {
                                name: "Emergency Expense, Alternative Accommodations and/or Rental Income",
                                coverage: "15,000",
                                value: 500,
                                selected: true,
                                },
                            ],
                            };
                        });
                        } else {
                        setSelectedCoverageEmergency("");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) =>
                                c.name !==
                                "Emergency Expense, Alternative Accommodations and/or Rental Income"
                            ) || [];
                            return { ...prev, extensionCovers: updated };
                        });
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                    />
                    <span className="text-[#1E1F21] text-base font-medium">
                    Emergency Expense, Alternative Accommodations and/or Rental Income
                    </span>
                </label>

                {isCheckedEmergency && (
                    <div className="flex flex-col w-full">
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                        Php15,000
                        </div>
                    </div>

                    <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                        {["15,000", "30,000", "45,000"].map((amount, index) => (
                        <button
                            key={amount}
                            onClick={() => {
                            setSelectedCoverageEmergency(amount);
                            const multiplier = index + 1;
                            const computedValue = 500 * multiplier;

                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) =>
                                    c.name !==
                                    "Emergency Expense, Alternative Accommodations and/or Rental Income"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Emergency Expense, Alternative Accommodations and/or Rental Income",
                                    coverage: amount,
                                    value: computedValue,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            }}
                            className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                            ${
                                selectedCoverageEmergency === amount
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A]"
                            }`}
                        >
                            {amount}
                        </button>
                        ))}
                    </div>
                    </div>
                )}
                </div>
                <div
                className={`flex flex-col md:justify-center md:items-start ${
                    isCheckedSpecial ? "py-7" : "py-2"
                } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                    isCheckedSpecial ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                }`}
                >
                <label className="flex items-center gap-3 cursor-pointer mb-4">
                    <input
                    type="checkbox"
                    checked={isCheckedSpecial}
                    onChange={() => {
                        const newValue = !isCheckedSpecial;
                        setIsCheckedSpecial(newValue);

                        if (newValue) {
                        setSelectedCoverageSpecial("200,000");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Special Loss Assessment"
                            ) || [];

                            return {
                            ...prev,
                            extensionCovers: [
                                ...updated,
                                {
                                name: "Special Loss Assessment",
                                coverage: "200,000",
                                value: 400,
                                selected: true,
                                },
                            ],
                            };
                        });
                        } else {
                        setSelectedCoverageSpecial("");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Special Loss Assessment"
                            ) || [];
                            return { ...prev, extensionCovers: updated };
                        });
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                    />
                    <span className="text-[#1E1F21] text-base font-medium">
                    Special Loss Assessment
                    </span>
                </label>

                {isCheckedSpecial && (
                    <div className="flex flex-col w-full">
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                        Php200,000
                        </div>
                    </div>

                    <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                        {["200,000", "400,000", "600,000"].map((amount, index) => (
                        <button
                            key={amount}
                            onClick={() => {
                            setSelectedCoverageSpecial(amount);
                            const multiplier = index + 1;
                            const computedValue = 400 * multiplier;

                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Special Loss Assessment"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Special Loss Assessment",
                                    coverage: amount,
                                    value: computedValue,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            }}
                            className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                            ${
                                selectedCoverageSpecial === amount
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A]"
                            }`}
                        >
                            {amount}
                        </button>
                        ))}
                    </div>
                    </div>
                )}
                </div>
                <div
                className={`flex flex-col md:justify-center md:items-start ${
                    isCheckedPersonalGeneral ? "py-7" : "py-2"
                } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                    isCheckedPersonalGeneral ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                }`}
                >
                <label className="flex items-center gap-3 cursor-pointer mb-4">
                    <input
                    type="checkbox"
                    checked={isCheckedPersonalGeneral}
                    onChange={() => {
                        const newValue = !isCheckedPersonalGeneral;
                        setIsCheckedPersonalGeneral(newValue);

                        if (newValue) {
                        setSelectedCoveragePersonalGeneral("200,000");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Personal General Liability"
                            ) || [];

                            return {
                            ...prev,
                            extensionCovers: [
                                ...updated,
                                {
                                name: "Personal General Liability",
                                coverage: "200,000",
                                value: 500,
                                selected: true,
                                },
                            ],
                            };
                        });
                        } else {
                        setSelectedCoveragePersonalGeneral("");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Personal General Liability"
                            ) || [];
                            return { ...prev, extensionCovers: updated };
                        });
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                    />
                    <span className="text-[#1E1F21] text-base font-medium">
                    Personal General Liability
                    </span>
                </label>

                {isCheckedPersonalGeneral && (
                    <div className="flex flex-col w-full">
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                        Php200,000
                        </div>
                    </div>

                    <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                        {["200,000", "400,000", "600,000"].map((amount, index) => (
                        <button
                            key={amount}
                            onClick={() => {
                            setSelectedCoveragePersonalGeneral(amount);
                            const multiplier = index + 1;
                            const computedValue = 500 * multiplier;

                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Personal General Liability"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Personal General Liability",
                                    coverage: amount,
                                    value: computedValue,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            }}
                            className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                            ${
                                selectedCoveragePersonalGeneral === amount
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A]"
                            }`}
                        >
                            {amount}
                        </button>
                        ))}
                    </div>
                    </div>
                )}
                </div>
                <div
                className={`flex flex-col md:justify-center md:items-start ${
                    isCheckedHomeAssistance ? "py-7" : "py-2"
                } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                    isCheckedHomeAssistance ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                }`}
                >
                <label className="flex items-center gap-3 cursor-pointer mb-4">
                    <input
                    type="checkbox"
                    checked={isCheckedHomeAssistance}
                    onChange={() => {
                        const newValue = !isCheckedHomeAssistance;
                        setIsCheckedHomeAssistance(newValue);

                        if (newValue) {
                        setSelectedCoverageHomeAssistance("5,000");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Home Assistance Services"
                            ) || [];

                            return {
                            ...prev,
                            extensionCovers: [
                                ...updated,
                                {
                                name: "Home Assistance Services",
                                coverage: "5,000",
                                value: 100,
                                selected: true,
                                },
                            ],
                            };
                        });
                        } else {
                        setSelectedCoverageHomeAssistance("");

                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Home Assistance Services"
                            ) || [];
                            return { ...prev, extensionCovers: updated };
                        });
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                    />
                    <span className="text-[#1E1F21] text-base font-medium">
                    Home Assistance Services
                    </span>
                </label>

                {isCheckedHomeAssistance && (
                    <div className="flex flex-col w-full">
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                        Php5,000
                        </div>
                    </div>

                    <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                        {["5,000", "10,000", "15,000"].map((amount, index) => (
                        <button
                            key={amount}
                            onClick={() => {
                            setSelectedCoverageHomeAssistance(amount);
                            const multiplier = index + 1;
                            const computedValue = 100 * multiplier;

                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Home Assistance Services"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Home Assistance Services",
                                    coverage: amount,
                                    value: computedValue,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            }}
                            className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                            ${
                                selectedCoverageHomeAssistance === amount
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A]"
                            }`}
                        >
                            {amount}
                        </button>
                        ))}
                    </div>
                    </div>
                )}
                </div>
                <div
                className={`flex flex-col md:justify-center md:items-start ${
                    isCheckedAutomatic ? "py-7" : "py-2"
                } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                    isCheckedAutomatic ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                }`}
                >
                <label className="flex items-center gap-3 cursor-pointer mb-4">
                    <input
                    type="checkbox"
                    checked={isCheckedAutomatic}
                    onChange={() => {
                        const newValue = !isCheckedAutomatic;
                        setIsCheckedAutomatic(newValue);

                        if (newValue) {
                        setSelectedCoverageAutomatic("Existing Policy Limit");
                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Automatic Inclusion Clause"
                            ) || [];

                            return {
                            ...prev,
                            extensionCovers: [
                                ...updated,
                                {
                                name: "Automatic Inclusion Clause",
                                coverage: "Existing Policy Limit",
                                value: 25,
                                selected: true,
                                },
                            ],
                            };
                        });
                        } else {
                        setSelectedCoverageAutomatic("");
                        setFormData((prev) => {
                            const updated =
                            prev.extensionCovers?.filter(
                                (c) => c.name !== "Automatic Inclusion Clause"
                            ) || [];
                            return { ...prev, extensionCovers: updated };
                        });
                        }
                    }}
                    className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                    />
                    <span className="text-[#1E1F21] text-base font-medium">
                    Automatic Inclusion Clause
                    </span>
                </label>

                {isCheckedAutomatic && (
                    <div className="flex flex-col w-full">
                    <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                        <div className="text-[#1D1D1D] text-sm font-medium">
                        Standard Limit of Liability:
                        </div>
                        <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                        Existing Policy Limit
                        </div>
                    </div>

                    <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                        <button
                        onClick={() => {
                            setSelectedCoverageAutomatic("Existing Policy Limit");
                            setFormData((prev) => {
                            const updated =
                                prev.extensionCovers?.filter(
                                (c) => c.name !== "Automatic Inclusion Clause"
                                ) || [];

                            return {
                                ...prev,
                                extensionCovers: [
                                ...updated,
                                {
                                    name: "Automatic Inclusion Clause",
                                    coverage: "Existing Policy Limit",
                                    value: 25,
                                    selected: true,
                                },
                                ],
                            };
                            });
                        }}
                        className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                            ${
                            selectedCoverageAutomatic === "Existing Policy Limit"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A]"
                            }`}
                        >
                        Existing Policy Limit
                        </button>
                    </div>
                    </div>
                )}
                </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedDebris ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedDebris ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedDebris}
                        onChange={() => {
                            const newValue = !isCheckedDebris;
                            setIsCheckedDebris(newValue);

                            if (newValue) {
                            setSelectedCoverageDebris("25,000");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Debris Removal Clause"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Debris Removal Clause",
                                    coverage: "25,000",
                                    value: 25,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageDebris("");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Debris Removal Clause"
                                ) || [];
                                return { ...prev, extensionCovers: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Debris Removal Clause
                        </span>
                    </label>

                    {isCheckedDebris && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php25,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["25,000", "50,000", "75,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageDebris(amount);
                                const multiplier = index + 1;
                                const computedValue = 25 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Debris Removal Clause"
                                    ) || [];

                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        name: "Debris Removal Clause",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageDebris === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedFire ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedFire ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedFire}
                        onChange={() => {
                            const newValue = !isCheckedFire;
                            setIsCheckedFire(newValue);

                            if (newValue) {
                            setSelectedCoverageFire("25,000");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Fire-Fighting Expenses"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Fire-Fighting Expenses",
                                    coverage: "25,000",
                                    value: 25,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageFire("");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Fire-Fighting Expenses"
                                ) || [];
                                return { ...prev, extensionCovers: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Fire-Fighting Expenses
                        </span>
                    </label>

                    {isCheckedFire && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php25,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["25,000", "50,000", "75,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageFire(amount);
                                const multiplier = index + 1;
                                const computedValue = 25 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Fire-Fighting Expenses"
                                    ) || [];
                                    
                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        name: "Fire-Fighting Expenses",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageFire === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedFireBrigade ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedFireBrigade ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedFireBrigade}
                        onChange={() => {
                            const newValue = !isCheckedFireBrigade;
                            setIsCheckedFireBrigade(newValue);

                            if (newValue) {
                            setSelectedCoverageFireBrigade("25,000");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Fire Brigade Charges"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Fire Brigade Charges",
                                    coverage: "25,000",
                                    value: 25,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageFireBrigade("");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Fire Brigade Charges"
                                ) || [];
                                return { ...prev, extensionCovers: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Fire Brigade Charges
                        </span>
                    </label>

                    {isCheckedFireBrigade && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php25,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["25,000", "50,000", "75,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageFireBrigade(amount);
                                const multiplier = index + 1;
                                const computedValue = 25 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Fire Brigade Charges"
                                    ) || [];

                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        name: "Fire Brigade Charges",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageFireBrigade === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedProfessional ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedProfessional ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label
                        className={`flex items-center gap-3 cursor-pointer ${
                        isCheckedProfessional ? "mb-4" : "mb-4"
                        }`}
                    >
                        <input
                        type="checkbox"
                        checked={isCheckedProfessional}
                        onChange={() => {
                            const newValue = !isCheckedProfessional;
                            setIsCheckedProfessional(newValue);

                            if (newValue) {
                            setSelectedCoverageProfessional("10,000");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Professional Fees"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Professional Fees",
                                    coverage: "10,000",
                                    value: 25,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageProfessional("");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Professional Fees"
                                ) || [];
                                return { ...prev, extensionCovers: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Professional Fees
                        </span>
                    </label>

                    {isCheckedProfessional && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php10,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["10,000", "20,000", "30,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageProfessional(amount);
                                const multiplier = index + 1;
                                const computedValue = 25 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Professional Fees"
                                    ) || [];

                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        name: "Professional Fees",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageProfessional === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>

                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedTemporary ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedTemporary ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedTemporary}
                        onChange={() => {
                            const newValue = !isCheckedTemporary;
                            setIsCheckedTemporary(newValue);

                            if (newValue) {
                            setSelectedCoverageTemporary("10,000");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Temporary Removal"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Temporary Removal",
                                    coverage: "10,000",
                                    value: 25,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageTemporary("");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Temporary Removal"
                                ) || [];
                                return { ...prev, extensionCovers: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Temporary Removal
                        </span>
                    </label>

                    {isCheckedTemporary && (
                        <div className="flex flex-col w-full">
                        <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium">
                            Standard Limit of Liability:
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                            Php10,000
                            </div>
                        </div>

                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["10,000", "20,000", "30,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageTemporary(amount);
                                const multiplier = index + 1;
                                const computedValue = 25 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Temporary Removal"
                                    ) || [];

                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        name: "Temporary Removal",
                                        coverage: amount,
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageTemporary === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>

                    <div
                    className={`flex flex-col md:justify-center md:items-start ${
                        isCheckedKasambahay ? "py-7" : "py-2"
                    } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                        isCheckedKasambahay ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                    }`}
                    >
                    <label className="flex items-center gap-3 cursor-pointer mb-4">
                        <input
                        type="checkbox"
                        checked={isCheckedKasambahay}
                        onChange={() => {
                            const newValue = !isCheckedKasambahay;
                            setIsCheckedKasambahay(newValue);

                            if (newValue) {
                            setSelectedCoverageKasambahayProperty("20,000");
                            setSelectedCoverageKasambahayAccident("40,000");

                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Kasambahay Cover"
                                ) || [];

                                return {
                                ...prev,
                                extensionCovers: [
                                    ...updated,
                                    {
                                    name: "Kasambahay Cover",
                                    propertyCoverage: "20,000",
                                    propertyValue: 100,
                                    accidentCoverage: "40,000",
                                    accidentValue: 100,
                                    selected: true,
                                    },
                                ],
                                };
                            });
                            } else {
                            setSelectedCoverageKasambahayProperty("");
                            setSelectedCoverageKasambahayAccident("");
                            setFormData((prev) => {
                                const updated =
                                prev.extensionCovers?.filter(
                                    (c) => c.name !== "Kasambahay Cover"
                                ) || [];
                                return { ...prev, extensionCovers: updated };
                            });
                            }
                        }}
                        className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                        />
                        <span className="text-[#1E1F21] text-base font-medium">
                        Kasambahay Cover
                        </span>
                    </label>

                    {isCheckedKasambahay && (
                        <div className="flex flex-col w-full">
                        <div className="items-center gap-3 py-2 md:px-5 px-0">
                            <div className="text-[#1D1D1D] text-sm font-medium mb-2">
                            Standard Limit of Liability
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium mb-2">
                            Properties: <strong>Php20,000</strong>
                            </div>
                            <div className="text-[#1D1D1D] text-sm font-medium mb-2">
                            Personal Accident: <strong>Php40,000</strong>
                            </div>
                        </div>

                        {/* PROPERTY SECTION */}
                        <div className="text-[#1D1D1D] text-sm font-medium mt-5">Properties</div>
                        <div className="flex items-start gap-4 mt-5 mb-5">
                            {["20,000", "40,000", "60,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageKasambahayProperty(amount);
                                const multiplier = index + 1;
                                const computedValue = 50 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Kasambahay Cover"
                                    ) || [];

                                    const existing =
                                    prev.extensionCovers?.find(
                                        (c) => c.name === "Kasambahay Cover"
                                    ) || {};

                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        ...existing,
                                        name: "Kasambahay Cover",
                                        propertyCoverage: amount,
                                        propertyValue: computedValue,
                                        accidentCoverage:
                                            existing.accidentCoverage || "40,000",
                                        accidentValue: existing.accidentValue || 100,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageKasambahayProperty === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>

                        {/* PERSONAL ACCIDENT SECTION */}
                        <div className="text-[#1D1D1D] text-sm font-medium">
                            Personal Accident
                        </div>
                        <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                            {["40,000", "80,000", "120,000"].map((amount, index) => (
                            <button
                                key={amount}
                                onClick={() => {
                                setSelectedCoverageKasambahayAccident(amount);
                                const multiplier = index + 1;
                                const computedValue = 50 * multiplier;

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Kasambahay Cover"
                                    ) || [];

                                    const existing =
                                    prev.extensionCovers?.find(
                                        (c) => c.name === "Kasambahay Cover"
                                    ) || {};

                                    return {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                        ...existing,
                                        name: "Kasambahay Cover",
                                        propertyCoverage:
                                            existing.propertyCoverage || "20,000",
                                        propertyValue: existing.propertyValue || 100,
                                        accidentCoverage: amount,
                                        accidentValue: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };
                                });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors
                                ${
                                    selectedCoverageKasambahayAccident === amount
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                            >
                                {amount}
                            </button>
                            ))}
                        </div>
                        </div>
                    )}
                    </div>
                                          <div
                        className={`flex flex-col md:justify-center md:items-start ${
                            isCheckedAdditionalLimit ? "py-7" : "py-2"
                        } px-0 md:px-6 w-full md:w-[722px] rounded-sm transition-all md:ml-10 ${
                            isCheckedAdditionalLimit ? "border-b-2 border-b-[#C0E6E6]" : "border-none"
                        }`}
                        >
                        <label className="flex items-center gap-3 cursor-pointer mb-4">
                            <input
                            type="checkbox"
                            checked={isCheckedAdditionalLimit}
                            onChange={() => {
                                const newValue = !isCheckedAdditionalLimit;
                                setIsCheckedAdditionalLimit(newValue);

                                const coveredAmount = parseFloat(formData.coveredAmount || 0);
                                const standardLimit = 7500000;
                                const computedValue = coveredAmount > 0 ? coveredAmount * 3 : 5250;

                                if (newValue) {
                                setSelectedCoverageAdditionalLimit(standardLimit.toLocaleString());

                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Additional Limit"
                                    ) || [];

                                    const newData = {
                                    ...prev,
                                    extensionCovers: [
                                        ...updated,
                                        {
                                         name: "Additional Limit",
                                        coverage: standardLimit.toLocaleString(),
                                        value: computedValue,
                                        selected: true,
                                        },
                                    ],
                                    };

                                    return newData;
                                });
                                } else {
                                setSelectedCoverageAdditionalLimit("");
                                setFormData((prev) => {
                                    const updated =
                                    prev.extensionCovers?.filter(
                                        (c) => c.name !== "Additional Limit"
                                    ) || [];
                                    return { ...prev, extensionCovers: updated };
                                });
                                }
                            }}
                            className="md:w-[20px] md:h-[20px] w-[14px] h-[14px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
                            />
                            <span className="text-[#1E1F21] text-base font-medium">
                            Additional Limit
                            </span>
                        </label>

                        {isCheckedAdditionalLimit && (
                            <div className="flex flex-col w-full">
                            <div className="flex items-center gap-3 py-2 md:px-5 px-0">
                                <div className="text-[#1D1D1D] text-sm font-medium">
                                Standard Limit of Liability:
                                </div>
                                <div className="text-[#1D1D1D] text-sm font-medium leading-6">
                                Php 7,500,000
                                </div>
                            </div>

                            <input
                                type="hidden"
                                name="additional_limit_value"
                                value={parseFloat(formData.declaredValue || 0) > 0
                                ? (parseFloat(formData.declaredValue) * 3)
                                : 5250}
                            />

                            <div className="flex items-start gap-4 mt-5 md:mb-5 mb-0">
                                <button
                                onClick={() => {
                                    setSelectedCoverageAdditionalLimit("7,500,000");
                                    setFormData((prev) => {
                                    const updated =
                                        prev.extensionCovers?.filter(
                                        (c) => c.name !== "Additional Limit"
                                        ) || [];

                                    const newData = {
                                        ...prev,
                                        extensionCovers: [
                                        ...updated,
                                        {
                                            name: "Additional Limit",
                                            coverage: "7,500,000",
                                            value:
                                            parseFloat(prev.coveredAmount || 0) > 0
                                                ? parseFloat(prev.coveredAmount) * 3
                                                : 5250,
                                            selected: true,
                                        },
                                        ],
                                    };
                                    // console.log("🧾 New extension cover data:", newData);
                                    return newData;
                                    });
                                }}
                                className={`flex justify-center items-center gap-3 px-7 py-2 rounded-full border border-[#E4509A] md:text-base text-sm md:font-medium font-normal transition-colors ${
                                    selectedCoverageAdditionalLimit === "7,500,000"
                                    ? "bg-[#E4509A] text-white"
                                    : "text-[#E4509A]"
                                }`}
                                >
                                7,500,000
                                </button>
                            </div>
                            </div>
                        )}
                        </div>
            </div>
            )}
                </div>
            <div className="flex flex-col items-center justify-center w-full md:py-4 gap-1">
                <div className="flex items-center justify-center w-full py-4 md:py-9">
                <div className="flex items-start">
                <h2 className="flex items-center justify-center md:gap-5 gap-3 text-[#2D2727] text-[18px] md:text-[27px] font-medium md:font-bold" ref={agentRef}>
                    Do you have an Agent?
                     <span>
                            {(formData.hasAgent === "No" || (
                            formData.hasAgent === "Yes"
                        )) ? (
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && !formData.hasAgent==="Yes" && (
                                            (!formData.agentName.trim())) ? (
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
            <div className="flex flex-col items-center justify-center w-full gap-7 mb-5">
                <div className="flex justify-center items-center w-full md:gap-9 gap-4">
                    {/* Yes Button */}
                    <button
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            formData.hasAgent === "Yes"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        hasAgent: "Yes",
                    }));
                    setErrors((prev) => {
                        const newErrors = { ...prev };
                         delete newErrors.hasAgent;
                        delete newErrors.agentName;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    }}
                    >
                    {formData.hasAgent === "Yes" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.hasAgent === "No"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        hasAgent: "No",
                        agentName: "",
                    }));
                    setErrors((prev) => {
                        const newErrors = { ...prev };
                         delete newErrors.hasAgent;
                         delete newErrors.agentName;
                        return newErrors;
                    });

                    setHasSubmitted(false);
                    }}
                    >
                    {formData.hasAgent === "No" && (
                        <span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                            className='md:w-[24px] w-[14px] md:h-[24px] h-[14px]'
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
                </div>
                 <div className="text-center items-center mt-5">
                 {formData.hasAgent === "Yes" && (
                    <label className="flex flex-col w-full items-center" ref={agentnameRef}>
                        <span
                            class={` after:text-red-500 block text-[10px] text-[#848A90] w-[280px] md:w-[600px] px-3 text-left ${
                                hasSubmitted && errors.agentName
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Agent Name
                        </span>
                         <input
                            value={formData.agentName || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                            setFormData((prev) => ({
                            ...prev,
                            agentName: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, agentName: "" }));
                        }}
                className={`mt-1 md:mb-0 mb-5 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.agentNamme ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />
                    </label>
                )}
                 </div>
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full md:py-20 gap-5 md:mb-0 mb-6">
                <button className="text-[#008080] md:px-5 px-3 py-3 md:text-[23px] text-base font-medium w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded" onClick={prevStep}
                >
                    <span>Back</span>
                </button>
                <button
                disabled={isNextDisabled}
                className="text-white bg-[#008080] md:text-[23px] text-base font-medium md:px-5 px-3 py-3 rounded w-full md:w-auto flex justify-center gap-2 group disabled:opacity-50"
                onClick={handleNext}
                >
                <span>Continue</span>
                </button>

            </div>
                 </div>
  )
}

export default OptionalBenefits