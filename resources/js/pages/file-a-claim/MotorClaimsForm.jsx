import React, { useState, useEffect, useRef } from 'react';
import DropdownSingleNative from "../../components/DropdownSingleNativeStyle";
import claimsFormBanner from "../../assets/images/Motor-Claims-Form-Banner.png";
import Accordion from "./Accordion.jsx";
import UploadSection from './UploadSection.jsx';
import Datepicker from "../../components/DatePickerV2.jsx";
import { useNavigate } from 'react-router-dom';
import { useLocation } from "react-router-dom";


function MotorClaimsForm() {

  useEffect(() => {
  window.scrollTo(0, 0);
}, []);

    const [address, setAddress] = useState("");
    const [fullName, setFullName] = useState("");
    const [bday, setBday] = useState("");
    const [email, setEmail] = useState("");
    const [mobile, setMobile] = useState("");
    const [model, setModel] = useState("");
    const [plateNo, setPlateNo] = useState("");
    const [vehicleType, setVehicleType] = useState("");
    const [year, setYear] = useState("");
    const [poa, setPOA] = useState("");
    const [doa, setDOA] = useState("");
    const [driver, setDriver] = useState("");
    const [licenseNo, setLicenseNo] = useState("");
    const [expiry, setExpiry] = useState("");
    const [classification, setClassification] = useState("");
    const [restrictionCode, setRestrictionCode] = useState("");
    const [agentName, setAgentName] = useState("");
    const [agentMobile, setAgentMobile] = useState("");
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [isChecklistOpen, setIsChecklistOpen] = useState(false);
    const [isOpen, setIsOpen] = useState(true);
    const [policyNumber, setPolicyNumber] = useState("");
    const [product, setProduct] = useState(""); 
    const [isDisabled, setIsDisabled] = useState(true);
    const uploadRef = useRef();
    const motorClaimsRef = useRef(null);
    const vehiclePhotosRef = useRef(null);
    const identificationRef = useRef(null);
    const [documents, setDocuments] = useState([]);
    const [canSubmit, setCanSubmit] = useState(true);
    const navigate = useNavigate();
    const [hasSubmitted, setHasSubmitted] = useState(false);

    const damageTypeRef = useRef(null);
    const addressRef = useRef(null);
    const emailRef = useRef(null);
    const mobileRef = useRef(null);
    const poaRef = useRef(null);
    const doaRef = useRef(null);
    const driverRef = useRef(null);
    const licenseNoRef = useRef(null);
    const expiryRef = useRef(null);
    const agreementRef = useRef(null);

    const fieldRefs = {
    damageType: damageTypeRef,
    address: addressRef,
    email: emailRef,
    mobile: mobileRef,
    poa: poaRef,
    doa: doaRef,
    driver: driverRef,
    licenseNo: licenseNoRef,
    expiry: expiryRef,
    isAgreed: agreementRef,
  };

    const [selectedTypes, setSelectedTypes] = useState({
    ownDamage: true,
    propertyDamage: false,
    bodilyInjury: false,
  });
  const damageTypeLabels = {
  ownDamage: "Own Damage",
  propertyDamage: "Property Damage",
  bodilyInjury: "Bodily Injury",
};
  const classificationOptions = [
  { id: 1, name: "Class", default: true },
  { id: 2, name: "Student" },
  { id: 3, name: "Non-Professional" },
  { id: 4, name: "Professional" },
];
const defaultClassification = classificationOptions.find(item => item.default);

  const restrictionOptions = [
  { id: 1, name: "Code", default: true },
  { id: 2, name: "A (Motorbikes), A2 (Tricycles and microcars)" },
  { id: 3, name: "B, B1, B2 (Cars and light trucks)" },
  { id: 4, name: "C (Large trucks)" },
  { id: 5, name: "D (Buses)" },
  { id: 6, name: "BE (Articulated car; cars with trailers)" },
  { id: 7, name: "CE (Articulated truck; trucks with trailers)" },
];
const defaultRestriction = restrictionOptions.find(item => item.default);

  const relationshipOptions = [
  { id: 1, name: "I am the Insured", default: true, color: "#1D1D1D" },
  { id: 2, name: "Sibling" },
  { id: 3, name: "Parent" },
];

const defaultrelationshipOptions = relationshipOptions.find(item => item.default);
const [reltoInsured, setreltoInsured] = useState(defaultrelationshipOptions);
const [errors, setErrors] = useState({}); 

    const [isAgreed, setIsAgreed] = useState(false);
    const [showTerms, setShowTerms] = useState(false);
    const [showPrivacy, setShowPrivacy] = useState(false);

    <style
                    dangerouslySetInnerHTML={{
                        __html: `
                    input[type="checkbox"] { 
        outline: none !important;
        box-shadow: none !important;
      }
    
      input[type="checkbox"]:focus,
      input[type="checkbox"]:active,
      input[type="checkbox"]:focus-visible {
        outline: none !important;
        box-shadow: none !important;
      }
              `,
                    }}
                />
  function formatDateToYMD(date) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, '0');
  const day = String(date.getDate()).padStart(2, '0');
  return `${year}-${month}-${day}`;
}

const handleSubmitClaim = async () => {
  try {
    const formData = new FormData();

    formData.append("policy_no", policyNumber);
    formData.append("product", product);
    formData.append(
  "damage_type",
  Object.entries(selectedTypes)
    .filter(([_, value]) => value)
    .map(([key]) => damageTypeLabels[key]) 
    .join(", ")
);
    formData.append("fullname", fullName);
    formData.append("address", address);
    formData.append("birthdate", bday);
    formData.append("email_address", email);
    formData.append("mobile", mobile);
    formData.append("plate_no", plateNo);
    formData.append("model", model);
    formData.append("vehicle_type", vehicleType);
    formData.append("year", year);
    formData.append("place_of_accident", poa);
    formData.append("date_of_accident", formatDateToYMD(doa));
    formData.append("fullname_driver", driver);
    formData.append("rel_to_insured", reltoInsured?.id);

    // for (const [key, value] of formData.entries()) {
    //   console.log(`${key}:`, value);
    // }
    formData.append("license_no", licenseNo);
    formData.append("expiry_date", formatDateToYMD(expiry));
    formData.append("classification", classification);
    formData.append("restriction_code", restrictionCode);
    formData.append("agent_name", agentName);
    formData.append("agent_mobile", agentMobile);

 const uploads = uploadRef.current.getAllUploads();

    Object.entries(uploads.motorClaims).forEach(([ref, file]) => {
      formData.append(`uploads[motor_claims_uploads][${ref}][]`, file);
    });

    uploads.vehiclePhotos.forEach((file) => {
      formData.append("uploads[vehicle_photos][]", file);
    });

    if (uploads.identification) {
      formData.append("uploads[identification][]", uploads.identification);
    }

    if (uploads.policeReport) {
      formData.append("uploads[police_report_or_affidavit][]", uploads.policeReport);
    }

    uploads.additionalDocs.forEach((file) => {
      formData.append("uploads[additional_documents][]", file);
    });

    // console.log("docsssss:", documents);

    await axios.post("/api/save-claim-motor", formData, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });
    
    localStorage.setItem("policy_no", policyNumber);
    navigate("/success-page");
  } catch (error) {
    // console.error("Submit error:", error);
    // alert("failed!!!");
  }
};

  const handleOpenModal = () => {
  
  setHasSubmitted(true);
  const newErrors = {};

   const isDamageTypeSelected =
    selectedTypes.ownDamage || selectedTypes.propertyDamage || selectedTypes.bodilyInjury;

  if (!isDamageTypeSelected) {
    newErrors.damageType = "Select at least one type of damage";
  }
  if (!address.trim()) {
    newErrors.address = "Address is required";
  }
    if (!email.trim()) {
    newErrors.email = "Email Address is required";
  }
  if (!mobile.trim()) {
    newErrors.mobile = "Mobile number is required";
  }
  if (!email.trim()) {
  newErrors.email = "Email Address is required";
} else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
  newErrors.email = "Please enter a valid email address";
}

if (!mobile.trim()) {
  newErrors.mobile = "Mobile number is required";
} else if (!/^09\d{9}$/.test(mobile.replace(/\D/g, ""))) {
  newErrors.mobile = "Please enter a valid 11-digit mobile number";
}
  if (!poa.trim()) {
    newErrors.poa = "Place of Accident is required";
  }
if (!doa) {
  newErrors.doa = "Date of Accident is required";
}
  if (!driver.trim()) {
    newErrors.driver = "Driver name is required";
  }
  if (!licenseNo.trim()) {
    newErrors.licenseNo = "License number is required";
  }
  if (!expiry) {
    newErrors.expiry = "Date of Expiry is required";
  }
  if (!isAgreed) {
    newErrors.isAgreed = "You must agree to the terms and conditions";
  }
{errors.isAgreed && (
                        <p style={{ color: '#DD0707' }}>{errors.isAgreed}</p>
                      )}
  const isUploadValid = uploadRef.current?.validateUploads?.();
  const hasFormErrors = Object.keys(newErrors).length > 0;

if (!isUploadValid && uploadRef.current?.validationErrors) {
  const { motorClaims, vehiclePhotos, identification } = uploadRef.current.validationErrors;

  if (motorClaims?.length > 0 && motorClaimsRef.current) {
    motorClaimsRef.current.scrollIntoView({ behavior: 'smooth', block: 'center' });
    return;
  }

  if (vehiclePhotos && vehiclePhotosRef.current) {
    vehiclePhotosRef.current.scrollIntoView({ behavior: 'smooth', block: 'center' });
    return;
  }

  if (identification && identificationRef.current) {
    identificationRef.current.scrollIntoView({ behavior: 'smooth', block: 'center' });
    return;
  }
}

  setErrors(newErrors);

  if (hasFormErrors || !isUploadValid) {
  const firstErrorKey = Object.keys(newErrors)[0];
  const firstErrorRef = fieldRefs[firstErrorKey];

  if (firstErrorRef?.current) {
    firstErrorRef.current.scrollIntoView({ behavior: 'smooth', block: 'center' });
    firstErrorRef.current.focus?.();
  }
  return;
}
if (newErrors.doa && doaRef.current) {
  doaRef.current.scrollIntoView({ behavior: 'smooth', block: 'center' });
  doaRef.current.focus?.();
  return;
}
if (newErrors.expiry && doaRef.current) {
  expiryRef.current.scrollIntoView({ behavior: 'smooth', block: 'center' });
  expiryRef.current.focus?.();
  return;
}

  setCanSubmit(true);
  setIsModalOpen(true);
};

useEffect(() => {
  if (!hasSubmitted) return; 

  const isDamageTypeSelected =
    selectedTypes.ownDamage || selectedTypes.propertyDamage || selectedTypes.bodilyInjury;

  const allValid =
    isDamageTypeSelected &&
    address.trim() &&
    email.trim() &&
    mobile.trim() &&
    poa.trim() &&
    !!doa &&
    driver.trim() &&
    licenseNo.trim() &&
    !!expiry &&
    isAgreed;

  setCanSubmit(Boolean(allValid));
}, [selectedTypes, address, mobile, poa, doa, driver, licenseNo, expiry,email, isAgreed, hasSubmitted]);

useEffect(() => {
  if (!hasSubmitted) return;

  if (!isAgreed) {
    setErrors((prev) => ({ ...prev, isAgreed: "You must agree to the terms and conditions" }));
  } else {
    setErrors((prev) => ({ ...prev, isAgreed: null }));
  }
}, [isAgreed, hasSubmitted]);

      const handleCloseModal = () => {
        setIsModalOpen(false);
      };
      const handleOpenChecklist = () => {
        setActiveSection("insured");
        
        setActiveButton("loss");
        setActiveKey("loss");

        setIsChecklistOpen(true);
      };

      const handleCloseChecklist = () => {
        setIsChecklistOpen(false);
      };
const [activeSection, setActiveSection] = useState("insured");
const [activeButton, setActiveButton] = useState("loss");
const [activeKey, setActiveKey] = useState("partial");

const insuredButtons = [
  { label: "Partial/Total Loss", key: "loss" },
  { label: "Carnap", key: "carnap" },
  { label: "Bodily Injury", key: "injury" },
];

const thirdPartyButtons = [
  { label: "Vehicle", key: "vehicle" },
  { label: "Property Damage", key: "property" },
  { label: "Bodily Injury", key: "tp-injury" },
];

const currentButtons =
  activeSection === "insured" ? insuredButtons : thirdPartyButtons;

useEffect(() => {
  const html = document.querySelector('html');

  const shouldDisableScroll = isModalOpen || showTerms || showPrivacy || isChecklistOpen;

  if (shouldDisableScroll) {
    html.classList.add('overflow-hidden');
  } else {
    html.classList.remove('overflow-hidden');
  }

  return () => {
    html.classList.remove('overflow-hidden');
  };
}, [isModalOpen, showTerms, showPrivacy, isChecklistOpen]);

 const fileInputs = {
    incident: useRef(),
    police: useRef(),
    damage: useRef(),
    regcert: useRef(),
    orcr: useRef(),
    stencil: useRef(),
    policy: useRef(),
    prempayment: useRef(),
    nonrecovery: useRef(),
    alarm: useRef(),
    complaint: useRef(),
    quotation: useRef(),
    ctpl: useRef(),
    medreceipts: useRef(),
    medcert: useRef(),
    photos: useRef(),
  };

  const handleCheckboxChange = (type) => {
    setSelectedTypes((prev) => ({
      ...prev,
      [type]: !prev[type],
    }));
    const updatedTypes = {
    ...selectedTypes,
    [type]: !selectedTypes[type],
  };

  setSelectedTypes(updatedTypes);

  const isAnySelected = Object.values(updatedTypes).some(Boolean);

  setErrors((prev) => ({
    ...prev,
    damageType: isAnySelected ? "" : "Please select at least one type of damage",
  }));
  };

  const getDocuments = () => {
    const docs = [];

    if (selectedTypes.ownDamage) {
      docs.push(
        { label: "Claimant's Incident Report", ref: "incident" },
        { label: "Pictures of Damage", ref: "damage" },
        { label: "Registration Certificate and OR", ref: "regcert" },
        { label: "Stencils of Motor and Serial No.", ref: "stencil" },
        { label: "Copy of Insurance Policy", ref: "policy" },
        { label: "Copy of OR/ Proof Premium Payment", ref: "prempayment" },
      );
    }

    if (selectedTypes.bodilyInjury) {
      docs.push(
        { label: "Original Medical Receipts", ref: "medreceipts" },
        { label: "Medical Certificate", ref: "medcert" },
        { label: "Registration Certificate and OR", ref: "regcert" }
      );
    }

    if (selectedTypes.propertyDamage) {
      docs.push(
        { label: "Registration Certificate and OR", ref: "regcert" },
        { label: "Quotation of Repair Estimate", ref: "quotation" },
        { label: "Pictures of Damage", ref: "damage" },
        { label: "Certificate of No Claim or CTPL", ref: "ctpl" },
        { label: "Copy of Insurance Policy", ref: "policy" },
      );
    }

      const uniqueDocs = [];
      const seenRefs = new Set();

      for (const doc of docs) {
        if (!seenRefs.has(doc.ref)) {
          uniqueDocs.push(doc);
          seenRefs.add(doc.ref);
        }
      }

      return uniqueDocs;
    };
    useEffect(() => {
      const newDocs = getDocuments();
      setDocuments(newDocs);
    }, [selectedTypes]);

    const location = useLocation();

      useEffect(() => {
        if (location.state?.product) {
          setProduct(location.state.product);
        }
      }, [location.state]);

    useEffect(() => {
      const policyData = location.state?.policyData;

      // console.log("data:", policyData);

      setPolicyNumber(policyData.policy_number || "");
      setFullName(policyData.full_name || "");
      setBday(policyData.bday || "");
      setEmail(policyData.email || "");

      setPlateNo(policyData.plate_no || "");
      setModel(policyData.model || "");
      setVehicleType(policyData.vehicle_type || "");
      setYear(policyData.year || "");
    }, [location.state]);

  return (
    <div className="px-2 md:px-0">
    <div className="max-w-7xl mx-auto mb-28 mt-10 rounded-lg shadow-lg">
                        <div className="w-full relative" >
                            <img
          src={claimsFormBanner}
          alt="Banner"
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 flex items-center justify-center">
          <p className="text-white md:text-3xl text-xl font-medium">Motor Claims Form</p>
        </div>
      </div>
        <div className="max-w-6xl mx-auto mt-0 px-8">
         <Accordion title="Insurance Policy Information">
      {isOpen && (
        <div className="space-y-6">
      <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
              <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
                Policy Number<span className="text-red-500">*</span>
              </label>
              <input
                type="text"
                className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm" readOnly
                value={policyNumber}
                onChange={(e) => setPolicyNumber(e.target.value)}
              />
            </div>
            <div>
               <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
               Product<span className="text-red-500">*</span>
              </label>
              <input
                type="text"
                className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm" readOnly
                value={product}
              onChange={(e) => setProduct(e.target.value)}
              />
            </div>
          </div>
  <div ref={damageTypeRef}>
     <label className="md:text-[23px] text-base text-[#2D2727] font-medium block mb-2">
              Select Type of Damage<span className="text-red-500">*</span>
            </label>
       <div className="flex flex-col md:flex-row gap-6 items-start md:items-center mt-8">
        <label className="flex items-center gap-2 md:mx-5 mx-0">
          <input
            type="checkbox"
            checked={selectedTypes.ownDamage}
            onChange={() => handleCheckboxChange("ownDamage")}
            className="w-[25px] h-[25px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
          />
          <span className="md:text-base text-sm text-[#1E1F21] font-normal">Own Damage</span>
        </label>
        <label className="flex items-center gap-2">
          <input
            type="checkbox"
            checked={selectedTypes.propertyDamage}
            onChange={() => handleCheckboxChange("propertyDamage")}
            className="w-[25px] h-[25px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
          />
          <span className="md:text-base text-sm text-[#1E1F21] font-normal">Property Damage</span>
        </label>
        <label className="flex items-center gap-2">
          <input
            type="checkbox"
            checked={selectedTypes.bodilyInjury}
            onChange={() => handleCheckboxChange("bodilyInjury")}
            className="w-[25px] h-[25px] appearance-none checked:!bg-[#217B7E] border-[#90CCCC] bg-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2"
          />
          <span className="md:text-base text-sm text-[#1E1F21] font-normal">Bodily Injury</span>
        </label>
      </div>
      {errors.damageType && (
  <p className="text-red-500 text-sm mt-2">{errors.damageType}</p>
)}
    </div>

          <div className="bg-[#FFF9EC] text-[#303030] md:text-base text-xs rounded-md md:p-7 p-4 flex items-start gap-2 ">
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" className='md:w-[25px] md:h-[24px] w-[20px] h-[20px] -mt-1 md:mt-0 md:mr-4 mr-2'>
<path d="M17.0001 21.75C17.0001 21.9489 16.9211 22.1396 16.7805 22.2803C16.6398 22.4209 16.449 22.5 16.2501 22.5H8.75012C8.55121 22.5 8.36045 22.4209 8.21979 22.2803C8.07914 22.1396 8.00012 21.9489 8.00012 21.75C8.00012 21.551 8.07914 21.3603 8.21979 21.2196C8.36045 21.079 8.55121 21 8.75012 21H16.2501C16.449 21 16.6398 21.079 16.7805 21.2196C16.9211 21.3603 17.0001 21.551 17.0001 21.75ZM20.7501 9.74995C20.7534 11.0002 20.4709 12.2347 19.9243 13.3592C19.3778 14.4837 18.5815 15.4685 17.5964 16.2384C17.4122 16.3796 17.2627 16.561 17.1593 16.7688C17.056 16.9767 17.0015 17.2054 17.0001 17.4375V18C17.0001 18.3978 16.8421 18.7793 16.5608 19.0606C16.2795 19.3419 15.8979 19.5 15.5001 19.5H9.50012C9.1023 19.5 8.72077 19.3419 8.43946 19.0606C8.15816 18.7793 8.00012 18.3978 8.00012 18V17.4375C7.99997 17.2081 7.94724 16.9819 7.84599 16.7762C7.74474 16.5704 7.59766 16.3906 7.41606 16.2506C6.43337 15.4852 5.63767 14.5064 5.08916 13.3881C4.54066 12.2698 4.25374 11.0414 4.25012 9.79589C4.22575 5.32777 7.837 1.60683 12.3014 1.49995C13.4014 1.47345 14.4956 1.66725 15.5196 2.06997C16.5436 2.47269 17.4767 3.07617 18.2639 3.84491C19.0512 4.61365 19.6767 5.53211 20.1037 6.54622C20.5306 7.56034 20.7504 8.64962 20.7501 9.74995ZM17.7398 8.87433C17.5453 7.78804 17.0227 6.78742 16.2423 6.00717C15.4619 5.22692 14.4611 4.70451 13.3748 4.51027C13.2777 4.49389 13.1783 4.49681 13.0823 4.51886C12.9862 4.5409 12.8955 4.58164 12.8153 4.63875C12.735 4.69586 12.6668 4.76821 12.6145 4.85169C12.5622 4.93517 12.5268 5.02813 12.5104 5.12527C12.4941 5.2224 12.497 5.32181 12.519 5.41782C12.5411 5.51383 12.5818 5.60456 12.6389 5.68482C12.696 5.76509 12.7684 5.83332 12.8519 5.88562C12.9353 5.93792 13.0283 5.97327 13.1254 5.98964C14.6789 6.2512 15.997 7.56933 16.2604 9.12558C16.2901 9.30026 16.3807 9.45879 16.5161 9.57307C16.6515 9.68736 16.8229 9.75002 17.0001 9.74995C17.0425 9.7497 17.0848 9.74625 17.1267 9.73964C17.3227 9.70617 17.4974 9.59621 17.6124 9.43394C17.7274 9.27167 17.7732 9.07038 17.7398 8.87433Z" fill="#F5BC16"/>
</svg>
            <p>You can select multiple types</p>
          </div>
        </div>
        
      )}

    </Accordion>
    </div>
    <div className="max-w-6xl mx-auto px-8">
<Accordion title="Insured Information">
     <div className="bg-white space-y-6">
    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Full Name of the Insured<span className="text-red-500">*</span>
      </label>
      <input
        type="text"
        className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm font-normal"
        readOnly
        value={fullName}
        onChange={(e) => setFullName(e.target.value)}
      />
    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Complete Address of the Insured<span className="text-red-500">*</span>
      </label>
     <input
  type="text"
  className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
    ${errors.address ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
    value={address}
    ref={addressRef}
    placeholder="Enter complete address"
    onChange={(e) => {
    const rawValue = e.target.value;

            if (/[^a-zA-Z0-9\s#,-.]/g.test(rawValue)) {
              setErrors((prev) => ({
                ...prev,
                // address: "Please enter a valid name.",
              }));
            } else {
              let cleaned = rawValue.replace(/\s+/g, " ").trimStart();
          setAddress(cleaned);

          setErrors((prev) => ({
            ...prev,
            address: cleaned.trim() ? "" : "Address is required.",
          }));
        }
        }}
      />


{errors.address && <p className="text-red-500 text-sm mt-1">{errors.address}</p>}


    </div>

    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
<div>
  <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
    Date of Birth<span className="text-red-500">*</span>
  </label>

  <div className="relative">
    <input
      type="date"
      className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 pl-3 pr-10 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm font-normal"
      readOnly
      value={bday}
      onChange={(e) => setBday(e.target.value)}
    />

    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="currentColor"
      className="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none"
      viewBox="0 0 16 16"
    >
      <path
        fill="#309999"
        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"
      />
    </svg>
  </div>
</div>

      <div>
        <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
          Email Address<span className="text-red-500">*</span>
        </label>
        <input
          type="email"
          className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
    ${errors.email ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
          value={email}
          ref={emailRef}
          onChange={(e) => {
            const rawValue = e.target.value;

            if (/[^a-zA-Z0-9\s-.+_@]/.test(rawValue)) {
              setErrors((prev) => ({
                ...prev,
               // email: "Invalid character in email address",
              }));
              return;
            }

            let cleaned = rawValue.replace(/\s+/g, " ").trimStart();
            setEmail(cleaned);

            let error = "";
            if (!cleaned.trim()) {
              error = "Email Address is required.";
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(cleaned)) {
              error = "Please enter a valid email address.";
            }

            setErrors((prev) => ({
              ...prev,
              email: error,
            }));
          }}
        />
  {errors.email && <p className="text-red-500 text-sm mt-1">{errors.email}</p>}
</div>

      <div>
        <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
          Mobile<span className="text-red-500">*</span>
        </label>
        <input
          type="tel"
          className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
          ${errors.mobile ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
          value={mobile}
          ref={mobileRef}
          placeholder="0999-999-9999"
          maxLength={13}
      onChange={(e) => {
      const raw = e.target.value.replace(/\D/g, ""); 
      const limited = raw.slice(0, 11);

      let formatted = limited;
      if (limited.length > 4 && limited.length <= 7) {
        formatted = `${limited.slice(0, 4)}-${limited.slice(4)}`;
      } else if (limited.length > 7) {
        formatted = `${limited.slice(0, 4)}-${limited.slice(4, 7)}-${limited.slice(7)}`;
      }

      setMobile(formatted);

      let error = "";
      if (!limited) {
        error = "Mobile number is required";
      } else if (!/^09\d{9}$/.test(limited)) {
        error = "Please enter a valid mobile number";
      }

          setErrors((prev) => ({
            ...prev,
            mobile: error,
          }));
        }}

/>
{errors.mobile && <p className="text-red-500 text-sm mt-1">{errors.mobile}</p>}
      </div>
    </div>
 </div>
      </Accordion>
      </div>
      <div className="max-w-6xl mx-auto px-8">
      <Accordion title="Insured Vehicle Information">
         <div className="bg-white space-y-6">
         <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Plate Number<span className="text-red-500">*</span>
      </label>
      <input
        type="text"
        className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm font-normal"readOnly
        value={plateNo}
        onChange={(e) => setPlateNo(e.target.value)}
      />
    </div>


    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div>
        <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
          Model<span className="text-red-500">*</span>
        </label>
        <input
          type="text"
          className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm font-normal" readOnly
          value={model}
          onChange={(e) => setModel(e.target.value)}
          placeholder="Model"
        />
      </div>

      <div>
        <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
          Vehicle Type<span className="text-red-500">*</span>
        </label>
        <input
          type="text"
          className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm font-normal"readOnly
          value={vehicleType}
          onChange={(e) => setVehicleType(e.target.value)}
          placeholder="Type"
        />
      </div>

      <div>
        <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
          Year<span className="text-red-500">*</span>
        </label>
        <input
          type="text"
          className="w-full bg-[#F5F5F5] border border-[#848A90] md:py-4 py-3 px-3 text-left focus:outline-none focus:ring-0 focus:border-[#848A90] rounded text-[#2D2727] md:text-base text-sm font-normal"readOnly
          value={year}
          placeholder="Year"
          onChange={(e) => setYear(e.target.value)}
        />
      </div>
    </div>
 </div>
      </Accordion>
      </div>
      <div className="max-w-6xl mx-auto px-8">
      <Accordion title="Details of the Accident">
        <div className="bg-white space-y-6">

  <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Place of Accident<span className="text-red-500">*</span>
      </label>
      <input className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
    ${errors.poa ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
        type="text"
        maxLength={100}
        value={poa}
        ref={poaRef}
        onChange={(e) => {
        const rawValue = e.target.value;

            if (/[^a-zA-Z0-9\s-.#,]/.test(rawValue)) {
              setErrors((prev) => ({
                ...prev,
                // poa: "Only letters, numbers, spaces, commas, dashes, and periods are allowed.",
              }));
            } else {
              let cleaned = rawValue.replace(/\s+/g, " ").trimStart();

                  setPOA(cleaned);
                  setErrors((prev) => ({
                    ...prev,
                    poa: cleaned.trim() ? "" : "Place of Accident is required.",
                  }));
                  }
                }}
              />

{errors.poa && <p className="text-red-500 text-sm mt-1">{errors.poa}</p>}
    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Date of Accident<span className="text-red-500">*</span>
      </label>
      <div className="relative">
        <Datepicker
        ref={doaRef}
          defaultValue={doa ? new Date(doa) : null}
        onDateSelect={(date) => {
      setDOA(date);

      setErrors((prev) => ({
        ...prev,
        doa: date ? "" : "Date of Accident is required"
      }));
    }}

       errors={!!errors?.doa}
      />
    </div>
    {errors?.doa && (
      <p className="text-red-500 text-sm mt-1">{errors.doa}</p>
    )}
  </div>

    </div>

  <p className="md:text-[23px] text-lg font-medium text-[#2D2727]">Details of the Driver<span className="text-red-500">*</span></p>

  <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Full Name of the Driver<span className="text-red-500">*</span>
      </label>
      <input
        type="text"
        maxLength={50}
        className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
          ${errors.driver ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
        value={driver}
        ref={driverRef}
        onChange={(e) => {
            const rawValue = e.target.value;

            if (/[^a-zA-Z\s-.]/.test(rawValue)) {
              setErrors((prev) => ({
                ...prev,
                // driver: "Please enter a valid name.",
              }));
            } else {
              let cleaned = rawValue.replace(/\s+/g, " ").trimStart();
          setDriver(cleaned);

          setErrors((prev) => ({
            ...prev,
            driver: cleaned.trim() ? "" : "Driver name is required.",
          }));
        }
        }}
      />

{errors.driver && <p className="text-red-500 text-sm mt-1">{errors.driver}</p>}

    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Relationship to the Insured<span className="text-red-500">*</span>
      </label>
      <DropdownSingleNative
      data={relationshipOptions}
      defaultValue={[defaultrelationshipOptions]}
      handleDropdownChange={(name) => {
      const selected = relationshipOptions.find(item => item.name === name);
      setreltoInsured(selected);
    }}
      error={errors?.reltoInsured}
      hideSearch={true}
          
/>
{errors?.reltoInsured && (
    <p className="text-red-500 text-sm mt-1">{errors.reltoInsured}</p>
  )}
    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        License Number<span className="text-red-500">*</span>
      </label>
      <input  className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
    ${errors.licenseNo ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
      type="text"
      inputMode="numeric"
      maxLength={20}
      ref={licenseNoRef}
      value={licenseNo}
      onChange={(e) => {
        const raw = e.target.value;
        const cleaned = raw.replace(/[^a-zA-Z0-9\-]/g, "");

        setLicenseNo(cleaned);

        let error = "";
        if (!cleaned.trim()) {
          error = "License number is required";
        } else if (/[^a-zA-Z0-9\-]/.test(raw)) {
          // error = "Please enter a valid license number.";
        }

        setErrors((prev) => ({
          ...prev,
          licenseNo: error,
        }));
      }}
    />

{errors.licenseNo && <p className="text-red-500 text-sm mt-1">{errors.licenseNo}</p>}

    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Date of Expiry<span className="text-red-500">*</span>
      </label>
  <div className="relative">
    <Datepicker
      defaultValue={expiry ? new Date(expiry) : null}
      ref={expiryRef}
      onDateSelect={(date) => {
      setExpiry(date);

      setErrors((prev) => ({
        ...prev,
        expiry: date ? "" : "Date of Expiry is required"
      }));
    }}
       errors={!!errors?.expiry}
      disableFutureDates={false}
    />
  </div>
  {errors?.expiry && (
    <p className="text-red-500 text-sm mt-1">{errors.expiry}</p>
  )}
    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Classification
      </label>
       <DropdownSingleNative
      data={classificationOptions}
      defaultValue={[defaultClassification]}
      handleDropdownChange={(val) => setClassification(val)}
      error={errors?.classification}
      hideSearch={true}
/>
    </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Restriction Code
      </label>
      <DropdownSingleNative
      data={restrictionOptions}
      defaultValue={[defaultRestriction]}
      handleDropdownChange={(val) => setRestrictionCode(val)}
      error={errors?.restrictionCode}
      hideSearch={true}
    />
    </div>
  </div>
</div>

      </Accordion>
      </div>
      <div className="max-w-6xl mx-auto px-8">
      <Accordion title="Claims Requirements">
        <div className='items-center justify-center text-center'>
            <p className='text-sm font-medium mb-6 md:px-0 md:text-center text-left px-4'>Please upload required documents to complete claim process. View this <span className='text-[#008080] cursor-pointer' onClick={handleOpenChecklist}>checklist.</span></p>
        </div>
        <UploadSection
        ref={uploadRef}
        documents={getDocuments()}
        fileInputs={fileInputs}
        refs={{
        motorClaimsRef,
        vehiclePhotosRef,
        identificationRef,
      }}
      />
      </Accordion>
      </div>
      <div className="max-w-6xl mx-auto px-8">
      <Accordion title="Agent Information">
         <div className="bg-white space-y-6">
  <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
  <div>
    <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
      Agent Name
    </label>
    <input
      type="text"
      className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
        ${errors.agentName ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
        value={agentName}
        maxLength={100}
        onChange={(e) => {
         const rawValue = e.target.value;

            if (/[^a-zA-Z\s-.]/.test(rawValue)) {
            } else {
              let cleaned = rawValue.replace(/\s+/g, " ").trimStart();
          setAgentName(cleaned);

        }
        }}
    />
    {errors.agentName && (
      <p className="text-red-500 text-sm mt-1">{errors.agentName}</p>
    )}
  </div>

    <div>
      <label className="md:text-sm text-xs text-[#848A90] font-normal block mb-1">
        Mobile
      </label>
      <div className="relative">
        <input
        type="tel"
        inputMode="numeric"
        maxLength={13}
        className={`w-full bg-white border md:py-4 py-3 px-3 md:text-base text-sm font-normal focus:outline-none focus:ring-0 rounded text-[#2D2727] 
          ${errors.agentMobile ? "border-red-500 focus:border-red-500" : "border-[#90CCCC] focus:border-[#217B7E]"}`}
        value={agentMobile}
        placeholder="0999-999-9999"
        onChange={(e) => {
        const rawInput = e.target.value;
        const raw = rawInput.replace(/\D/g, ""); 

        const limited = raw.slice(0, 13);

        let formatted = limited;
        if (limited.length > 4 && limited.length <= 7) {
          formatted = `${limited.slice(0, 4)}-${limited.slice(4)}`;
        } else if (limited.length > 7) {
          formatted = `${limited.slice(0, 4)}-${limited.slice(4, 7)}-${limited.slice(7)}`;
        }

          setAgentMobile(formatted);

          let error = "";
          if (/\D\-/.test(rawInput)) {
            // error = "Only numbers are allowed";
          } 
        }}
      />       
      </div>
    </div>
  </div>
  </div>
      </Accordion>
      </div>
                  <div
                className={`fixed inset-0 z-50 top-20 overflow-y-auto w-full h-full bg-black bg-opacity-50 ${
                    !showTerms && "hidden"
                }`}
                id="modal"
            >
                <div className="min-h-full w-full flex items-center justify-center px-4">

                    <div className="fixed inset-0 transition-opacity">
                        <div className="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <div
                        className="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full border-t-4 border-[#E4509A]"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="bg-white flex flex-col justify-between px-2 gap-7 md:gap-8 my-5 overflow-auto text-sm">
                            <p className="font-bold text-[23px] leading-6 text-black text-center">
                                Terms & Conditions
                            </p>
                            <p>
                                The Cocogen Insurance, Inc. website, e-mail
                                newsletters, and mobile services, and any and
                                all materials contained therein, are information
                                services provided by Cocogen, the use of which
                                shall be subject to the following terms and
                                conditions.
                            </p>
                            <p>
                                By accessing the Cocogen information services
                                and their content, you acknowledge and agree
                                that you have read and understood the following
                                terms and conditions and agree to be bound by
                                them.
                            </p>
                            <p>
                                As used below, the terms “we”, “us”, and “our”
                                refer to Cocogen.
                            </p>
                            <ol className="list-decimal flex flex-col px-4 gap-3">
                                <li>
                                    <p className="font-bold">Content</p>
                                    <p>
                                        Cocogen information services are
                                        available for information purposes only.
                                        The publication and posting of any
                                        content and access to any of the Cocogen
                                        information services do not constitute,
                                        either explicitly or implicitly, any
                                        provision of services or products by us.
                                        Information concerning Cocogen products
                                        or services is only available from the
                                        relevant Cocogen companies
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">NO OFFER</p>
                                    <p>
                                        No information contained in this website
                                        or in any of Cocogen information
                                        services should be construed as an offer
                                        or a solicitation for an offer, as a
                                        statement of law, or as counsel on
                                        investment, legal, tax, or other
                                        matters. In case of any ambiguity or
                                        doubts in the information in Cocogen’s
                                        website, you are advised to verify or
                                        check with us or seek appropriate
                                        professional or legal advice.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        NO DUTY TO UPDATE
                                    </p>
                                    <p>
                                        We reserve the right to update, modify,
                                        revise and change all the contents of
                                        our website and other Cocogen
                                        information services. We are not obliged
                                        to notify you of any changes made on our
                                        Terms and Conditions. However, we will
                                        endeavor to regularly update the
                                        contents of the website and other
                                        Cocogen information services.
                                        <br />
                                        <br />
                                        Your continuous access to website
                                        following any change in the website
                                        signifies that you agree to be bound by
                                        the Terms and Conditions, as revised.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        COPYRIGHT AND TRADEMARKS
                                    </p>
                                    <p>
                                        All information, photographs, service
                                        marks, logos, artworks and all other
                                        contents of the website and other
                                        Cocogen information services are owned,
                                        controlled or licensed by or to Cocogen
                                        or its third party licensors, and are
                                        protected by intellectual property laws.
                                        <br />
                                        <br />
                                        The limited use, copying and
                                        distribution without alteration of any
                                        of the materials and information
                                        contained in the Cocogen website and
                                        other Cocogen information services and
                                        the use of said materials and
                                        information shall be allowed for
                                        non-commercial purposes only: provided
                                        that all copyright and other proprietary
                                        notices shall appear in all copies of
                                        the materials and the information in the
                                        same manner as the original. The use of
                                        the materials for all other purposes is
                                        prohibited.
                                        <br />
                                        <br />
                                        You shall not use any portion of this
                                        website, or any other intellectual
                                        property of Cocogen, including but not
                                        limited to its service marks, on any
                                        other website, in the source code of any
                                        other website, or in any other printed
                                        or electronic materials without the
                                        prior written consent of Cocogen. You
                                        shall not modify, publish, reproduce,
                                        republish, create derivative works,
                                        copy, upload, post, transmit,
                                        distribute, or otherwise use any of the
                                        Cocogen information services’ contents
                                        or frame the Cocogen website within any
                                        other website without prior written
                                        consent of Cocogen. Systematic retrieval
                                        of data from this website to create or
                                        compile, directly or indirectly, a
                                        collection, compilation, database or
                                        directory, without prior written consent
                                        from Cocogen, is prohibited. Linking
                                        from another website to any page in this
                                        website is strictly prohibited without
                                        prior written consent of Cocogen.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">NO WARRANTY</p>
                                    <p>
                                        All contents on any and all Cocogen
                                        information services, including, but not
                                        limited to, graphics, text, and
                                        hyperlinks or references to other sites,
                                        are subject to change without prior
                                        notice and without warranty of any kind,
                                        express or implied, including, but not
                                        limited to, sustainability for a
                                        particular purpose, non-infringement and
                                        freedom of rights of third parties.
                                        <br />
                                        <br />
                                        We do not guarantee the adequacy,
                                        accuracy, reliability or completeness of
                                        any information provided by the Cocogen
                                        information services and expressly
                                        disavow any liability for errors or
                                        omissions therein. The user is
                                        responsible for the assessment of the
                                        information’s adequacy, accuracy,
                                        reliability, and completeness.
                                        <br />
                                        <br />
                                        We do not guarantee that the functions
                                        of the Cocogen information services will
                                        be uninterrupted and/or error-free, and
                                        that the defects and errors will be
                                        corrected or that the Cocogen
                                        information services or the servers that
                                        make them available are free from
                                        computer viruses or other harmful
                                        components.
                                        <br />
                                        <br />
                                        Should your machine which includes but
                                        is not limited to your desktop, laptop,
                                        or smartphone, be infected by such
                                        viruses while using Cocogen information
                                        services, you shall assume the entire
                                        cost of all necessary servicing,
                                        repairs, or corrections.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        HYPERLINKED AND REFERENCED WEBSITES
                                    </p>
                                    <p>
                                        Certain hyperlinks or referenced
                                        websites in the Cocogen information
                                        services may take you to third-party
                                        websites and we do not guarantee the
                                        adequacy, accuracy, reliability, or
                                        completeness of any information on
                                        hyperlinked or referenced websites. We
                                        disclaim any liability for any and all
                                        of the contents of said hyperlinked or
                                        reference websites.
                                        <br />
                                        <br />
                                        The hyperlinks to other websites are
                                        offered for your convenience only. Their
                                        presence in our website does not imply
                                        that we endorse such websites or that
                                        products or services that are described
                                        therein are our own. We likewise do not
                                        guarantee the correctness and accuracy
                                        of the information in said hyperlinked
                                        websites.
                                        <br />
                                        <br />
                                        We remind you that different terms and
                                        conditions will apply for your use of
                                        such websites and that your access to
                                        third-party websites is entirely at your
                                        risk.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        CONFIDENTIALITY OF INFORMATION
                                    </p>
                                    <p>
                                        By using the Cocogen information
                                        services, you agree, understand, and
                                        confirm that the any and all
                                        information, including your credit or
                                        debit card details, you provide to
                                        access Cocogen information services or
                                        to availing of our any of the services
                                        in said services are owned by you or
                                        that you have lawful authority to use
                                        said information.
                                        <br />
                                        <br />
                                        We commit that we will not disclose,
                                        utilize, and share the said information
                                        to any third parties unless required by
                                        law, regulation or court order.
                                        <br />
                                        <br />
                                        We, as a merchant, shall be under no
                                        liability whatsoever in respect of any
                                        loss or damage resulting directly or
                                        indirectly from the decline of
                                        authorization by the card issuer for any
                                        transaction on account of the cardholder
                                        having exceeded the limit mutuallyagreed
                                        by us with our acquiring bank from time
                                        to time.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        REFUND AND CANCELLATIONS
                                    </p>
                                    <p>
                                        For concerns regarding refunds and
                                        cancellation of policies, please free to
                                        contact our Client Services Center via
                                        phone at 8830-6000 or via email at
                                        client_services@cocogen.com. Please be
                                        informed that cancellations will be
                                        subject to the specific terms and
                                        conditions of the policy sought to be
                                        canceled.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        LOCAL LEGAL RESTRICTIONS
                                    </p>
                                    <p>
                                        Any information appearing on this
                                        website is provided in accordance with
                                        and subject to the laws of the Republic
                                        of the Philippines.
                                        <br />
                                        <br />
                                        Cocogen information services are not
                                        intended for any person in any
                                        jurisdiction where (by virtue of that
                                        person’s nationality, residence or
                                        otherwise) the publication or
                                        availability of Cocogen information
                                        services is prohibited. Persons to whom
                                        such prohibition applies may not access
                                        the Cocogen information services.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        RESERVATION OF RIGHTS
                                    </p>
                                    <p>
                                        We reserve the right to change, modify,
                                        add to, or remove sections of these
                                        terms of use at any time.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        GOVERNING LAW AND DISPUTE RESOLUTION
                                    </p>
                                    <p>
                                        You agree that all matters relating to
                                        your use and access of all Cocogen
                                        information services shall be governed
                                        by the laws of the Republic of the
                                        Philippines. Any dispute, controversy or
                                        claim arising out of or relating to this
                                        Terms and Conditions, or the breach,
                                        termination or invalidity thereof shall
                                        be settled by arbitration in accordance
                                        with the PDRCI Arbitration Rules as at
                                        present in force.
                                    </p>
                                </li>
                                <li>
                                    <p className="font-bold">
                                        ENTIRE AGREEMENT
                                    </p>
                                    <p>
                                        This Agreement constitutes the entire
                                        agreement between you and Cocogen with
                                        respect to your access and/or use of
                                        this website.
                                    </p>
                                </li>
                            </ol>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => setShowTerms(false)}
                                >
                                    <span>Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <div
                className={`fixed inset-0 z-50 top-20 overflow-y-auto w-full h-full bg-black bg-opacity-50 ${
                    !showPrivacy && "hidden"
                }`}
                id="modal"
            >
                <div className="min-h-full w-full flex justify-center px-4">
                    <div className="fixed inset-0 transition-opacity">
                        <div className="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <div
                        className="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full border-t-4 border-[#E4509A]"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="bg-white flex flex-col justify-between px-2 gap-2 md:gap-4 my-5 overflow-auto text-sm">
                            <p className="font-bold text-[23px] leading-6 text-black text-center">
                                Privacy Policy
                            </p>
                            <p className="text-xl text-[#008080] font-bold">
                                Declaration and Consent
                            </p>
                            <p>
                                I hereby apply for insurance as set out in the
                                above application form and declare, to the best
                                of my knowledge and belief, that the foregoing
                                statements and particulars are true and
                                complete. I hereby agree to notify Cocogen of
                                any material change in the information as stated
                                above.
                            </p>
                            <p>
                                I hereby certify that I voluntarily and
                                expressly consent to the collection, processing,
                                sharing, storing of my personal and/or sensitive
                                information by Cocogen for the purpose/s
                                necessary in processing my insurance policy and
                                in any related transactions and/or in other
                                purposes as stated in the Data Privacy Statement
                                of Cocogen or in www.cocogen.com/data-privacy. I
                                hereby certify that I carefully understood the
                                terms above before giving my consent.
                            </p>
                            <p className="text-xl text-[#008080] font-bold">
                                Privacy Policy
                            </p>
                            <p>
                                We, Cocogen, upholds an individual’s data
                                privacy rights and assures that all your
                                personal data, sensitive personal data and
                                privileged information (collectively, “Personal
                                Data”), collected and to be collected, are
                                processed in compliance to the Data Privacy Act
                                of 2012 (RA No. 10173 and its Implementing Rules
                                and Regulations (IRR)).
                            </p>
                            <p>
                                This Privacy Policy provides information on how
                                we collect, use, manage and secure your personal
                                data necessary to serve you better. Any
                                information you provide to us indicates your
                                express consent to the content of our Privacy
                                Policy.
                            </p>
                            <p>
                                Collection of Personal Data: We collect the
                                following personal data from you when you apply
                                for our insurance products and services such as
                                your:
                            </p>
                            <ul className="flex flex-col px-6 gap-2 list-disc">
                                <li>
                                    Name, birth date, place of birth, sex,
                                    nationality;
                                </li>
                                <li>
                                    Address (permanent and present addresses);
                                </li>
                                <li>
                                    Contract number or information (email
                                    address, telephone number and mobile
                                    number);
                                </li>
                                <li>
                                    PhilID or Government ID information
                                    (Passport, SSS or GSIS ID, driver’s license,
                                    postal ID); and
                                </li>
                                <li>
                                    Source of funds or property and occupation.
                                </li>
                            </ul>
                            <p>
                                When you provide information other than yours,
                                you undertake that you properly obtained their
                                consent. You also certify that all personal data
                                you submit is accurate, complete and up-to-date.
                            </p>
                            <p>
                                We may collect this information when you submit
                                your application personally or through our
                                distribution partners, insurance agents and
                                brokers or when you call us, visit our websites
                                and social media advertisements, submit to us as
                                part your application and claims requirements;
                                and, information that we gather from
                                third-parties such as but not limited to
                                subsidiaries, reinsurers, business partners.
                            </p>
                            <p>
                                <span className="font-semibold">Use:</span> The
                                collected personal data shall be used to process
                                your transactions (e.g. insurance quotations and
                                applications, policy issuance, claims servicing,
                                premium payments); communicate and respond to
                                your request; send your statements billings and
                                notices for your insurance coverage; serve as a
                                reference for promotional information regarding
                                our products; conduct surveys and inform through
                                phone, mail, email, SMS or other communication
                                facility in order to help us take better care of
                                your insurance needs and allow us improve our
                                products and services for you; comply with the
                                directives issued by regulatory bodies; assist
                                the Company in risk management, identity and
                                claim verification and prevent and detect fraud;
                                and, perform any other actions as may be
                                necessary to implement the terms and conditions
                                of our contract.
                            </p>
                            <p>
                                We may disclose and share your personal data to
                                the following:
                            </p>
                            <ul className="flex flex-col px-6 gap-2 list-disc">
                                <li>
                                    Our employee handling your account and
                                    requests;
                                </li>
                                <li>
                                    Our subsidiaries, affiliates and third-party
                                    service providers performing
                                    financial,administrative technical and other
                                    ancillary services;
                                </li>
                                <li>
                                    Banks for bancassurance transactions,
                                    reinsurance partners and professional
                                    advisers performing due diligence checks;
                                </li>
                                <li>
                                    Marketing intermediaries, agents, brokers
                                    and distributors;
                                </li>
                                <li>
                                    Government institution and other competent
                                    authorities which by law, rules or
                                    regulations requires us to disclose.
                                </li>
                                <li>
                                    Claim investigation companies, loss
                                    adjusters, assessors/claims investigators,
                                    suppliers, repairers;
                                </li>
                                <li>
                                    Person or entity that we contractually
                                    entered with that ensures the
                                    confidentiality standard we implement and
                                    adhere to the DPA.
                                </li>
                                <li>
                                    Any person that fall within matters of
                                    public concern, in order to carry out
                                    functions of public authority only to the
                                    extent of collection andfurther processing
                                    consistent with a constitutionally or
                                    statutorily mandated function pertaining to
                                    law enforcement, taxation and other
                                    regulatory function.
                                </li>
                            </ul>
                            <p>
                                Thus, as a rule, Cocogen is not allowed to share
                                your personal data to third party. However, by
                                giving your consent, you authorize Cocogen to
                                disclose your personal data to the
                                aforementioned individuals and entities that is
                                necessary for the proper execution of processes
                                related to the declared purposes in this Privacy
                                Policy and Consent and may not use it for any
                                other purpose.
                            </p>
                            <p>
                                <span className="font-semibold">
                                    Protection Measures:
                                </span>{" "}
                                To maintain the integrity and confidentiality of
                                your personal data, we have implemented measures
                                to secure and protect it from theft, loss,
                                penetration or breach. We put in place
                                organizational, physical and technical security
                                measures necessary to protect your personal
                                data. We will retain your personal data for as
                                long as necessary to fulfill the purposes of
                                your transactions with the Company, unless a
                                longer period is allowed or required by law.
                                After which physical records shall be disposed
                                of through shredding while digital files shall
                                be anonymized.
                            </p>
                            <p>
                                <span className="font-semibold">
                                    Contact Us:
                                </span>{" "}
                                To exercise your rights under the DPA which
                                include right to erase, block, modify and object
                                to processing your personal data or should you
                                have any inquiries or concerns on this Privacy
                                Policy and Consent and/or complaints, you may
                                contact our Data Protection Officer at:
                            </p>
                            <p className="font-semibold">
                                Cocogen Data Protection Officer
                            </p>
                            <p>
                                <span className="font-semibold">Address:</span>{" "}
                                22F One Corporate Center, Doña Julia <br />
                                Vargas Avenue corner Meralco Avenue, Ortigas{" "}
                                <br />
                                Center, Pasig City
                            </p>
                            <p>
                                <span className="font-semibold">Email:</span>{" "}
                                dpo@cocogen.com
                            </p>
                            <p>
                                Kindly browse through our Privacy Policy at{" "}
                                <a
                                    href="/"
                                    className="text-[#008080] hover:underline"
                                >
                                    www.cocogen.com
                                </a>{" "}
                                to know more on how we protect your personal
                                data.
                            </p>
                            <p className="text-xl text-[#008080] font-bold">
                                Data Privacy Consent
                            </p>
                            <p>
                                I hereby certify that I explicitly and
                                unambiguously consent to the collection,
                                processing, sharing, storing of my/our personal
                                data by Cocogen for the purposes/s described in
                                this Privacy Policy. I hereby certify that I
                                carefully understood and comprehend the terms
                                above before giving our consent. I further
                                acknowledge that I have acquired the consent
                                from all parties relevant to this consent and
                                hold free and harmless Cocogen from any
                                complaint, suit or damages which any party may
                                file or claim in relation to my consent.
                            </p>
                            <p className="text-semibold">
                                Important: Section 251 of the Insurance Code, as
                                amended, imposes a fine not exceeding twice the
                                amount claimed and/or imprisonment of 2 years,
                                or both, at the discretion of the court, to any
                                person who presents or causes to be presented
                                any fraudulent claim for the payment of a loss
                                under a contract of insurance, and who
                                fraudulently prepares, makes or subscribes any
                                writing with intent to present or use the same,
                                or to allow it to be presented in support of any
                                claim.
                            </p>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => setShowPrivacy(false)}
                                >      
                                    <span>Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div className="bg-[#FFF4DA] text-[#303030] flex text-sm font-medium rounded-md md:p-7 p-4 items-center gap-3 mb-4 md:mx-12 mx-2">
                   <div className="flex items-start md:items-center gap-3 flex-wrap">
              <input
                        checked={isAgreed}
                        
                         onChange={(e) => {
                          const checked = e.target.checked;
                          setIsAgreed(checked);

                          if (!checked && hasSubmitted) {
                            setErrors((prev) => ({ ...prev, isAgreed: "You must agree to the terms and conditions" }));
                          } else {
                            setErrors((prev) => ({ ...prev, isAgreed: null }));
                          }
                        }}
                        
                        className="w-[20px] h-[20px] appearance-none checked:!bg-[#1E1F21] focus:outline-none focus:ring-0 focus:ring-offset-0 rounded p-2 ml-4 mr-2"
                        type="checkbox"
                    />
                    
              <p className="flex-1">
                I have read and fully aware of Cocogen Insurance’s{" "}  <button
                        onClick={() => setShowTerms(true)}
                        href="javascript:void(0)"
                        className="font-medium underline underline-offset-4"
                    >
                        Terms and Conditions
                    </button>
                    {" "} and{" "}
                    <button
                        onClick={() => setShowPrivacy(true)}
                        href="javascript:void(0)"
                        className="font-medium underline"
                    >
                        Data Privacy
                    </button>, and authorize Cocogen Insurance <br className="hidden md:block" />to process my data for this claim request.
              </p>
            </div>
            </div>
              {errors.isAgreed && (
              <div className="text-red-600 text-sm md:mx-12 mx-4 mb-4">
                {errors.isAgreed}
              </div>
            )}
            <div className="items-center justify-center text-center m-8">
<button
  className={`bg-[#E4509A] text-white rounded-full p-4 md:py-4 md:px-6 w-full md:w-auto text-center mb-7 transition
    ${!canSubmit ? "opacity-50 cursor-not-allowed" : "hover:bg-[#d0408c] cursor-pointer"}`}
  onClick={handleOpenModal}
  disabled={!canSubmit}
>
  Submit Claim
</button>



      {isModalOpen && (
 <div className="fixed inset-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden  max-h-full bg-black bg-opacity-40 flex items-center justify-center">
  <div className="relative w-full max-w-md max-h-full">
    <div className="relative bg-white rounded-2xl shadow-md text-center m-7 md:m-0 p-7 md:p-9">

      <div className="flex justify-center mb-4">
       <svg width="58" height="51" viewBox="0 0 58 51" fill="none" xmlns="http://www.w3.org/2000/svg" className='md:w-[58px] md:h-[51px] w-[35px] h-[35px]'>
<path d="M56.6258 41.7571L34.4217 3.19641C33.8668 2.25169 33.0747 1.46837 32.1238 0.9241C31.173 0.379831 30.0964 0.0935059 29.0008 0.0935059C27.9052 0.0935059 26.8286 0.379831 25.8777 0.9241C24.9268 1.46837 24.1347 2.25169 23.5799 3.19641L1.37577 41.7571C0.841897 42.6709 0.560547 43.7102 0.560547 44.7685C0.560547 45.8268 0.841897 46.866 1.37577 47.7798C1.92352 48.7302 2.71429 49.5178 3.66692 50.0617C4.61956 50.6057 5.69975 50.8863 6.79667 50.8749H51.2049C52.3009 50.8854 53.3801 50.6043 54.3317 50.0604C55.2834 49.5166 56.0734 48.7295 56.6207 47.7798C57.1553 46.8665 57.4376 45.8275 57.4385 44.7692C57.4394 43.7109 57.1589 42.6714 56.6258 41.7571ZM53.1041 45.746C52.9105 46.0762 52.6326 46.349 52.2989 46.5364C51.9651 46.7238 51.5876 46.819 51.2049 46.8124H6.79667C6.41397 46.819 6.0364 46.7238 5.70266 46.5364C5.36892 46.349 5.09102 46.0762 4.89745 45.746C4.72211 45.4492 4.62962 45.1107 4.62962 44.7659C4.62962 44.4212 4.72211 44.0827 4.89745 43.7859L27.1016 5.22512C27.299 4.89649 27.5782 4.62457 27.9119 4.43578C28.2456 4.247 28.6225 4.14778 29.0058 4.14778C29.3892 4.14778 29.7661 4.247 30.0998 4.43578C30.4335 4.62457 30.7127 4.89649 30.9101 5.22512L53.1142 43.7859C53.288 44.0836 53.3788 44.4226 53.377 44.7673C53.3752 45.1121 53.281 45.4501 53.1041 45.746ZM26.9695 30.5624V20.4062C26.9695 19.8675 27.1835 19.3508 27.5645 18.9699C27.9454 18.5889 28.462 18.3749 29.0008 18.3749C29.5395 18.3749 30.0561 18.5889 30.4371 18.9699C30.818 19.3508 31.032 19.8675 31.032 20.4062V30.5624C31.032 31.1011 30.818 31.6178 30.4371 31.9987C30.0561 32.3797 29.5395 32.5937 29.0008 32.5937C28.462 32.5937 27.9454 32.3797 27.5645 31.9987C27.1835 31.6178 26.9695 31.1011 26.9695 30.5624ZM32.0476 39.703C32.0476 40.3057 31.8689 40.8947 31.5342 41.3958C31.1994 41.8969 30.7235 42.2874 30.1668 42.518C29.61 42.7486 28.9974 42.8089 28.4064 42.6914C27.8153 42.5738 27.2724 42.2836 26.8463 41.8575C26.4202 41.4314 26.13 40.8885 26.0124 40.2975C25.8949 39.7064 25.9552 39.0938 26.1858 38.5371C26.4164 37.9803 26.807 37.5045 27.308 37.1697C27.8091 36.8349 28.3982 36.6562 29.0008 36.6562C29.8089 36.6562 30.5838 36.9772 31.1552 37.5486C31.7266 38.12 32.0476 38.895 32.0476 39.703Z" fill="#DC6803"/>
</svg>

      </div>

      <p className="md:text-[27px] text-lg font-bold text-[#2D2727] m-2 mb-4 md:m-8">Submit Claim</p>
      <p className="md:text-base text-sm font-medium text-[#585858]">
        <span className="block md:inline">By submitting this claim, you </span>
        <span className="block md:inline"> acknowledge that you have reviewed</span>
        <span className="block md:inline"> the information in the claim form.</span>
      </p>

      <div className="mt-8 flex flex-col gap-4 justify-center text-center">
        <button
          onClick={handleSubmitClaim} 
          className="w-full bg-[#E4509A] text-white py-3 rounded-full font-bold md:text-base text-sm hover:bg-[#d4438e] transition"
        >
          Submit Claim
        </button>
        <button
          onClick={handleCloseModal}
          className="w-full text-[#E4509A] border border-[#E4509A] py-3 rounded-full font-bold md:text-base text-sm hover:bg-pink-50 transition"
        >
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>

      )}
            {isChecklistOpen && (
<div onClick={() => setIsChecklistOpen(false)} className="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 mt-10">
  <div className="bg-white rounded-xl shadow-xl w-full max-w-2xl p-6 md:mt-9 mt-10 relative"onClick={(e) => e.stopPropagation()}>
    <p className="text-base md:text-3xl font-medium text-center text-[#1D1D1D] mt-5 mb-6">Motor Checklist</p>
 <div className="flex justify-center text-center text-[#89B4B6] mb-4 relative">
    <button
      onClick={() => {
        setActiveSection("insured");
        setActiveButton("loss");
        setActiveKey("loss");
      }}
      className={`w-1/2 pb-2 md:text-xl text-lg font-medium focus:outline-none ${
        activeSection === "insured"
          ? "text-[#217B7E] border-b-2 border-[#217B7E]"
          : "text-[#90CCCC] border-b border-[#90CCCC]"
      }`}
    >
      Insured
    </button>
    <button
      onClick={() => {
        setActiveSection("thirdParty");
        setActiveButton("vehicle");
        setActiveKey("vehicle");
      }}
      className={`w-1/2 pb-2 md:text-xl text-lg font-medium focus:outline-none ${
        activeSection === "thirdParty"
          ? "text-[#217B7E] border-b-2 border-[#217B7E]"
          : "text-[#90CCCC] border-b border-[#90CCCC]"
      }`}
    >
      Third Party
    </button>
  </div>

<div className="flex justify-center md:space-x-4 space-x-2 mb-6 mt-4">
  {currentButtons.map((btn) => (
    <button
      key={btn.key}
      onClick={() => {
        setActiveButton(btn.key);
        setActiveKey(btn.key);
      }}
      className={`md:px-11 md:py-2 px-5 py-0.3 rounded-full md:text-lg text-base font-medium transition ${
        activeButton === btn.key
          ? "bg-[#217B7E] text-white"
          : "text-[#90CCCC] border border-[#90CCCC] bg-white"
      }`}
    >
      {btn.label}
    </button>
  ))}
</div>


<div id="loss" className={activeKey === "loss" ? "block" : "hidden"}>
    <ul className="space-y-3 text-gray-700 mt-6">
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Claimant’s Incident Report (Cocogen form to be accomplished by the Insured)</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Police Report and/or Driver’s</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Affidavit</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
       <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's License and OR</span>
      </li>
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Stencils of Motor and Serial Number</span>
      </li>
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Copy of Insurance Policy</span>
      </li>
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Copy of OR or Proof of Premium Payment</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Pictures of Damage</span>
      </li>
    </ul>
</div>
<div id="carnap" className={activeKey === "carnap" ? "block" : "hidden"}>
    <ul class="space-y-3 text-gray-700 mt-6">
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Certificate of Non-Recovery</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Alarm Sheet</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Complaint Sheet</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Police Report</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's License and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Copy of Policy</span>
      </li>
            <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Copy of OR of Premium Payment</span>
      </li>
    </ul>
</div>
<div id="injury" className={activeKey === "injury" ? "block" : "hidden"}>
        <ul className="space-y-3 text-gray-700 mt-6">
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Claimant’s Incident Report (Cocogen form to be accomplished by the Insured)</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Police Report and/or Driver’s</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Affidavit</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
       <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's License and OR</span>
      </li>
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Stencils of Motor and Serial Number</span>
      </li>
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Copy of Insurance Policy</span>
      </li>
      <li class="flex items-start">
        <span class="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Copy of OR or Proof of Premium Payment</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Pictures of Damage</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Original Medical Receipts /OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Medical Certificate</span>
      </li>
    </ul>
</div>
<div id="vehicle" className={activeKey === "vehicle" ? "block" : "hidden"}>
    <ul className="space-y-3 text-gray-700 mt-6">
      <p className='text-base underline italic text-left font-medium text-[#1D1D1D]'>TP Claimant</p>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Pictures of Damage</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Police Report and/or Driver's</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Affidavit</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
      <p className='text-base underline italic text-left font-medium text-[#1D1D1D]'>Insured</p>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's License and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's Affidavit</span>
      </li>
    </ul>
</div>
<div id="property" className={activeKey === "property" ? "block" : "hidden"}>
    <ul className="space-y-3 text-gray-700 mt-6">
      <p className='text-base underline italic text-left font-medium text-[#1D1D1D]'>TP Claimant</p>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Quotation of Repair Estimate</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Pictures of Damage</span>
      </li>
      <p className='text-base underline italic text-left font-medium text-[#1D1D1D]'>Insured</p>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's License and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='md:text-base text-sm font-medium text-[#1D1D1D]'>Driver's Affidavit</span>
      </li>
    </ul>
</div>
<div id="tp-injury" className={activeKey === "tp-injury" ? "block" : "hidden"}>
    <ul className="space-y-3 text-gray-700 mt-6">
      <p className='text-base underline italic text-left font-medium text-[#1D1D1D]'>TP Claimant</p>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='text-base font-medium text-[#1D1D1D]'>Original Medical Receipts /OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='text-base font-medium text-[#1D1D1D]'>Medical Certificate</span>
      </li>
      <p className='text-base underline italic text-left font-medium text-[#1D1D1D]'>Insured</p>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='text-base font-medium text-[#1D1D1D]'>Registration Certificate and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='text-base font-medium text-[#1D1D1D]'>Driver's License and OR</span>
      </li>
      <li className="flex items-start">
        <span className="mr-2 mt-1"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="25" height="25" rx="12.5" fill="#FFFEFE"/>
<path d="M15.7928 10.3611C15.8464 10.4146 15.889 10.4783 15.918 10.5483C15.9471 10.6183 15.962 10.6934 15.962 10.7692C15.962 10.845 15.9471 10.9201 15.918 10.9902C15.889 11.0602 15.8464 11.1238 15.7928 11.1774L11.7543 15.2159C11.7007 15.2695 11.6371 15.3121 11.5671 15.3411C11.497 15.3701 11.422 15.3851 11.3462 15.3851C11.2703 15.3851 11.1953 15.3701 11.1252 15.3411C11.0552 15.3121 10.9916 15.2695 10.938 15.2159L9.20721 13.4851C9.09896 13.3768 9.03814 13.23 9.03814 13.0769C9.03814 12.9238 9.09896 12.777 9.20721 12.6687C9.31547 12.5605 9.46229 12.4997 9.61539 12.4997C9.76848 12.4997 9.91531 12.5605 10.0236 12.6687L11.3462 13.9921L14.9764 10.3611C15.03 10.3074 15.0937 10.2649 15.1637 10.2358C15.2337 10.2068 15.3088 10.1919 15.3846 10.1919C15.4604 10.1919 15.5355 10.2068 15.6055 10.2358C15.6756 10.2649 15.7392 10.3074 15.7928 10.3611ZM20 12.5C20 13.9834 19.5601 15.4334 18.736 16.6668C17.9119 17.9001 16.7406 18.8614 15.3701 19.4291C13.9997 19.9967 12.4917 20.1453 11.0368 19.8559C9.58197 19.5665 8.2456 18.8522 7.1967 17.8033C6.14781 16.7544 5.4335 15.418 5.14411 13.9632C4.85472 12.5083 5.00325 11.0003 5.57091 9.62987C6.13856 8.25943 7.09986 7.08809 8.33323 6.26398C9.56659 5.43987 11.0166 5 12.5 5C14.4885 5.0021 16.3949 5.79295 17.801 7.19902C19.207 8.60509 19.9979 10.5115 20 12.5ZM18.8462 12.5C18.8462 11.2448 18.474 10.0179 17.7766 8.97426C17.0793 7.93065 16.0882 7.11724 14.9286 6.63692C13.769 6.15659 12.493 6.03092 11.2619 6.27579C10.0309 6.52065 8.90012 7.12507 8.01259 8.01259C7.12507 8.90012 6.52066 10.0309 6.27579 11.2619C6.03092 12.493 6.1566 13.769 6.63692 14.9286C7.11725 16.0882 7.93065 17.0793 8.97427 17.7766C10.0179 18.474 11.2449 18.8462 12.5 18.8462C14.1825 18.8442 15.7956 18.175 16.9853 16.9853C18.175 15.7956 18.8442 14.1825 18.8462 12.5Z" fill="#217B7E"/>
</svg>
</span>
        <span className='text-base font-medium text-[#1D1D1D]'>Driver's Affidavit</span>
      </li>
    </ul>
</div>
    <div className="text-center md:mt-6 mt-10">
      <button className="bg-[#E4509A] hover:bg-pink-600 text-[#FFFEFE] md:text-base text-sm font-bold md:py-4 md:px-7 py-4  md:w-[140px] w-full rounded-full" onClick={handleCloseChecklist}>
        OK, got it
      </button>
    </div>
  </div>
</div>


      )}
    </div>
            
     </div>
     
     </div>

  );
}

export default MotorClaimsForm;
