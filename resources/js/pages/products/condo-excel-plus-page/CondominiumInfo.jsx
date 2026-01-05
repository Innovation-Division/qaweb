
import { React, useRef, useState, useEffect } from "react";
import DropdownSingle from "../../../components/CondoExcelPlus/DropdownSingle";
import CondoAddress from "../../../components/CondoExcelPlus/CondoAddress.jsx";
import building from "../../../assets/images/building.svg";
import getFileIcon from "../../../components/FileIcon";
import toast from "../../../components/ToastV2.jsx";

const unitTypeOptions = [
    {id: 1, name: "Select Unit Type", default: true },
    {id: 2, name: "Studio Unit"},
    {id: 3, name: "Bedroom Unit (1BR, 2BR, 3BR, etc.)" },
    {id: 4, name:"Loft Unit"},
    {id: 5, name:"Bi-Level Unit"},
    {id: 6, name:"Penthouse Unit"}
]
const roofOptions = [
    {id: 1, name: "Select Roof Type", default: true },
    {id: 2, name: "Type I"},
    {id: 3, name: "Type II" },
    {id: 4, name:"Type III"},
    {id: 5, name:"Type IV"},
    {id: 6, name:"Type V"}
]
const wallOptions = [
    {id: 1, name: "Select Wall Type", default: true },
    {id: 2, name: "Class A"},
    {id: 3, name: "Class B" },
]

const mortgageeOptions = [
    {id: 1, name: "Select Mortgagee Type", default: true },
    {id: 2, name: "Bank"},
    {id: 3, name: "Non-Bank" },
    {id: 4, name: "Others" },
]

const CondominiumInfo = ({
    formData,
    setFormData,
    prevStep,
    nextStep,
    regions,
    provinces,
    cities,
    barangays,
    region,
    province,
    provinceAddress,
    provincesAddress,
    city,
    barangay,
    firstName,
    lastName,
    suffix,
    mobile,
    handlePersonalMobileChange,
    email,
    houseNo,
    street,
    zip,
    emergencyFullName,
    emergencyRelationship,
    handleSelectEmergencyRelationship,
    emergencyMobile,
    handleEmergencyMobileChange,
    isHaveAgent,
    agentName,
    idType,
    idNumber,
    idImage,
    previewIdImage,
    beneficiaries,
    handleRegionChange,
    handleProvinceChange,
    handleCityChange,
}) => {
    const [hasSubmitted, setHasSubmitted] = useState(false);
    const [isNextDisabled, setIsNextDisabled] = useState(false);
    const condoAddressRef = useRef(null);
    const unitTypeRef = useRef(null);
    const unitNumberRef = useRef(null);
    const frontRef = useRef(null);
    const leftRef = useRef(null);
    const rightRef = useRef(null);
    const rearRef = useRef(null);
    const roofRef = useRef(null);
    const wallRef = useRef(null);
    const storeyRef = useRef(null);
    const mortgageeRef = useRef(null);
    const bankRef = useRef(null);
    const branchRef = useRef(null);
    const coveredAmountRef = useRef(null);
    const [errors, setErrors] = useState({});
    const [addSpecs, setAddSpecs] = useState("");
    const [unitUploadOpen, setUnitUploadOpen] = useState(true);
    const [previewFileURL, setPreviewFileURL] = useState(null); 
    const [previewFileType, setPreviewFileType] = useState(null);
    const [isModalOpenRight, setIsModalOpenRight] = useState(false);
    const [isModalOpenLeft, setIsModalOpenLeft] = useState(false);
    const [isModalOpenFront, setIsModalOpenFront] = useState(false);
    const [isModalOpenRear, setIsModalOpenRear] = useState(false);
    const [isModalOpenRoof, setIsModalOpenRoof] = useState(false);
    const [isModalOpenWall, setIsModalOpenWall] = useState(false);
    const [isOpenCondoBuilding, setIsOpenCondoBuilding] = useState(false);
    const modalRef = useRef(null);


const handleNext = () => {
  setHasSubmitted(true);
  setIsNextDisabled(true); 

  const isCondoValid = condoAddressRef.current?.validateAndScroll();
  const newErrors = {};

    if (!formData.unitType || formData.unitType.id === 1) {
    newErrors.unitType = "Unit type is required";
  }

  if (!formData.unitNumber || !formData.unitNumber.trim()) {
    newErrors.unitNumber = "Unit floor and number is required";
  }
   if (!formData.front?.trim()) {
    newErrors.front = "Front is required";
  }

  if (!formData.left.trim()) {
    newErrors.left = "Left is required";
  }

  if (!formData.right.trim()) {
    newErrors.right = "Right is required";
  }

  if (!formData.rear.trim()) {
    newErrors.rear = "Rear is required";
  }
 if (!formData.roof || !formData.roof.id === 1) {
    newErrors.roof = "Roof Type is required";
  }

  if (!formData.wall || !formData.wall.id === 1) {
    newErrors.wall = "Wall Type is required";
  }

  if (!formData.storey.trim()) {
    newErrors.storey = "Number of Storey is required";
  }

if (!formData.hasMortgage || (formData.hasMortgage !== "Yes" && formData.hasMortgage !== "No")) {
  newErrors.hasMortgage = "Please select Yes or No";
}

if (formData.selected) {
  if (
    !formData.coveredAmount ||
    formData.coveredAmount === "" ||
    formData.coveredAmount === null
  ) {
    newErrors.coveredAmount = "Covered Amount is required";
  }
} else {
  setFormData((prev) => ({ ...prev, coveredAmount: "" }));
  setErrors((prev) => {
    const newErrors = { ...prev };
    delete newErrors.coveredAmount;
    return newErrors;
  });
}

  if (formData.hasMortgage === "Yes") {
    if (!formData.mortgagee) {
      newErrors.mortgagee = "Mortgage selection is required";
    }
    if (!formData.bank || formData.bank.id === 1) {
        newErrors.bank = "Bank selection is required";
    }
}

  setErrors((prev) => ({
    ...prev,
    ...newErrors,
  }));

  const hasErrors = Object.keys(newErrors).length > 0;
if (newErrors.coveredAmount && coveredAmountRef.current) {
  setTimeout(() => {
    const elementTop =
      coveredAmountRef.current.getBoundingClientRect().top + window.scrollY;
    const offset = 350; 
    window.scrollTo({
      top: elementTop - offset,
      behavior: "smooth",
    });
  }, 150);

  return;
}

   if (!isCondoValid) {
    if (condoAddressRef.current?.scrollIntoView) {
      condoAddressRef.current.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
    } else {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }

    return;
  }

  if (hasErrors) {
    setTimeout(() => {
      const scrollToFirstError = () => {
        if (newErrors.coveredAmount && coveredAmountRef?.current)
          coveredAmountRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.unitType && unitTypeRef.current)
        unitTypeRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.unitNumber && unitNumberRef.current)
        unitNumberRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.front && frontRef.current)
        frontRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.left && leftRef.current)
        leftRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.right && rightRef.current)
        rightRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.rear && rearRef.current)
        rearRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.roof && roofRef.current)
        roofRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.wall && wallRef.current)
        wallRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
      else if (newErrors.storey && storeyRef.current)
        storeyRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
     else if (newErrors.mortgagee && mortgageeRef.current)
        mortgageeRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
     else if (newErrors.bank && bankRef.current)
        bankRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
     else if (newErrors.branch && branchRef.current)
        branchRef.current.scrollIntoView({ behavior: "smooth", block: "center" });
     else window.scrollTo({ top: 0, behavior: "smooth" });
      };
      scrollToFirstError();
    }, 100);

    return;
  }
  nextStep();
  setIsNextDisabled(false); // enable again if valid
};
useEffect(() => {
  const hasErrors = Object.values(errors).some(Boolean); 
  //console.log("errors object:", errors, "hasErrors:", hasErrors);
  if (!hasErrors) {
    setIsNextDisabled(false);
  }
}, [errors]);

const formatNumber = (value) => {
  if (!value) return "";
  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

const unformatNumber = (value) => value.replace(/,/g, "");
  useEffect(() => {
    function handleClickOutside(event) {
      if (modalRef.current && !modalRef.current.contains(event.target)) {
        setIsModalOpenFront(false), setIsModalOpenRight(false), setIsModalOpenLeft(false), setIsModalOpenRear(false), setIsModalOpenRoof(false), setIsModalOpenWall(false);
      }
    }

    if (isModalOpenFront || isModalOpenRight || isModalOpenLeft || isModalOpenRear || isModalOpenRoof  || isModalOpenWall) {
      document.addEventListener("mousedown", handleClickOutside);
    } else {
      document.removeEventListener("mousedown", handleClickOutside);
    }

    return () => {
      document.removeEventListener("mousedown", handleClickOutside);
    };
  }, [isModalOpenFront, isModalOpenRight, isModalOpenLeft, isModalOpenRear , isModalOpenRoof, isModalOpenWall]);

    const unitPhotosRef = useRef(null);
    const unitUploadInput = useRef(null);

    const handleUnitFileChange = (e) => {
    const input = e.target;
    const newFiles = Array.from(input.files);
    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
    const maxSize = 5 * 1024 * 1024; // 5MB

    const validFiles = newFiles.filter(file => {
        if (!allowedTypes.includes(file.type)) {
        toast(
            <span style={{ color: "#40444D", fontSize: "16px", fontWeight: "400" }}>
            Invalid file format. Only JPG, JPEG, PNG, and PDF are allowed.
            </span>
        );
        return false;
        }
        if (file.size > maxSize) {
        toast(
            <span style={{ color: "#40444D", fontSize: "16px", fontWeight: "400" }}>
            File size exceeds 5MB limit.
            </span>
        );
        return false;
        }
        return true;
        });

    if (validFiles.length > 0) {
        setFormData((prev) => ({
        ...prev,
        unitFiles: [...(prev.unitFiles || []), ...validFiles],
        }));
    }

    input.value = "";
    };
            const handleRemoveUnitFile = (index) => {
                setFormData((prev) => ({
                    ...prev,
                    unitFiles: prev.unitFiles.filter((_, i) => i !== index),
                }));
            };

            const shortenFileNameUpload = (name, maxLength = 30) => {
                if (name.length <= maxLength) return name;
                const ext = name.split(".").pop();
                return name.substring(0, maxLength - ext.length - 3) + "... ." + ext;
            };

            const [bankOptions, setBankOptions] = useState([
            { id: 1, name: " ", default: true },
            ]);

           const handleMortgageeChange = async (mortgagee) => {
                const isNonBank = ["Non-Bank", "Others"].includes(mortgagee.name);

                setFormData((prev) => ({
                    ...prev,
                    mortgagee,
                    bank: { id: 1, name: isNonBank ? "Select Mortgagee" : "Select Bank", default: true },
                }));

                setBankOptions([{ id: 1, name: isNonBank ? "Select Mortgagee" : "Select Bank", default: true }]);

                if (mortgagee.id === 1) {
                    setErrors((prev) => ({ ...prev, mortgagee: "Mortgagee is required" }));
                    return;
                } else {
                    setErrors((prev) => ({ ...prev, mortgagee: "" }));
                }

                if (mortgagee && mortgagee.name) {
                    try {
                    const res = await fetch(`/api/get-bank?category=${encodeURIComponent(mortgagee.name)}`);
                    const data = await res.json();

                    const options = [
                        { id: 1, name: isNonBank ? "Select Mortgagee" : "Select Bank", default: true },
                        ...data.map((item, index) => ({
                        id: index + 2,
                        name: item.name,
                        })),
                    ];

                    setBankOptions(options);
                    } catch (error) {
                    console.error("Error fetching banks:", error);
                    }
                }
                };


  return (
     <div className="bg-[#F7FCFF] flex flex-col items-center justify-center w-full px-8">
     <div className="flex items-center justify-center w-full md:py-9 ">
        <div className="flex items-start">
                <h2 className="flex items-center justify-center md:mb-5 mb-3 gap-5 text-[#2D2727] text-lg md:text-[27px] font-medium md:font-bold">
                    Condominium Details
                     <span>
            {!hasSubmitted ? null : (
                <>
                {!isNextDisabled && (
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                    )}

                                                {isNextDisabled && (
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
      )}
    </>
  )}
</span>
                </h2>
                </div>
                 </div>
            <div className="md:flex flex-col items-center justify-center w-full gap-8 mb-5 hidden">
                <h3 className=" text-[#2D2727] text-base md:text-[23px] font-medium">
                    Basic Cover
                </h3>
                </div>
                 <div className="md:w-[780px] w-[320px] mb-5">
                <div className="flex flex-col bg-[#F5F5F5] border-l-4 border-[#003592] py-4 px-3 md:px-8 rounded-md">
                     <div className="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className='flex shrink-0'>
                    <path d="M21.6744 9.63937C21.3209 9.27 20.9553 8.88938 20.8175 8.55469C20.69 8.24813 20.6825 7.74 20.675 7.24781C20.6609 6.33281 20.6459 5.29594 19.925 4.575C19.2041 3.85406 18.1672 3.83906 17.2522 3.825C16.76 3.8175 16.2519 3.81 15.9453 3.6825C15.6116 3.54469 15.23 3.17906 14.8606 2.82562C14.2137 2.20406 13.4788 1.5 12.5 1.5C11.5212 1.5 10.7872 2.20406 10.1394 2.82562C9.77 3.17906 9.38938 3.54469 9.05469 3.6825C8.75 3.81 8.24 3.8175 7.74781 3.825C6.83281 3.83906 5.79594 3.85406 5.075 4.575C4.35406 5.29594 4.34375 6.33281 4.325 7.24781C4.3175 7.74 4.31 8.24813 4.1825 8.55469C4.04469 8.88844 3.67906 9.27 3.32562 9.63937C2.70406 10.2863 2 11.0212 2 12C2 12.9788 2.70406 13.7128 3.32562 14.3606C3.67906 14.73 4.04469 15.1106 4.1825 15.4453C4.31 15.7519 4.3175 16.26 4.325 16.7522C4.33906 17.6672 4.35406 18.7041 5.075 19.425C5.79594 20.1459 6.83281 20.1609 7.74781 20.175C8.24 20.1825 8.74813 20.19 9.05469 20.3175C9.38844 20.4553 9.77 20.8209 10.1394 21.1744C10.7863 21.7959 11.5212 22.5 12.5 22.5C13.4788 22.5 14.2128 21.7959 14.8606 21.1744C15.23 20.8209 15.6106 20.4553 15.9453 20.3175C16.2519 20.19 16.76 20.1825 17.2522 20.175C18.1672 20.1609 19.2041 20.1459 19.925 19.425C20.6459 18.7041 20.6609 17.6672 20.675 16.7522C20.6825 16.26 20.69 15.7519 20.8175 15.4453C20.9553 15.1116 21.3209 14.73 21.6744 14.3606C22.2959 13.7137 23 12.9788 23 12C23 11.0212 22.2959 10.2872 21.6744 9.63937ZM20.5916 13.3228C20.1425 13.7916 19.6775 14.2763 19.4309 14.8716C19.1947 15.4434 19.1844 16.0969 19.175 16.7297C19.1656 17.3859 19.1553 18.0731 18.8638 18.3638C18.5722 18.6544 17.8897 18.6656 17.2297 18.675C16.5969 18.6844 15.9434 18.6947 15.3716 18.9309C14.7763 19.1775 14.2916 19.6425 13.8228 20.0916C13.3541 20.5406 12.875 21 12.5 21C12.125 21 11.6422 20.5387 11.1772 20.0916C10.7122 19.6444 10.2238 19.1775 9.62844 18.9309C9.05656 18.6947 8.40313 18.6844 7.77031 18.675C7.11406 18.6656 6.42688 18.6553 6.13625 18.3638C5.84562 18.0722 5.83437 17.3897 5.825 16.7297C5.81562 16.0969 5.80531 15.4434 5.56906 14.8716C5.3225 14.2763 4.8575 13.7916 4.40844 13.3228C3.95937 12.8541 3.5 12.375 3.5 12C3.5 11.625 3.96125 11.1422 4.40844 10.6772C4.85562 10.2122 5.3225 9.72375 5.56906 9.12844C5.80531 8.55656 5.81562 7.90313 5.825 7.27031C5.83437 6.61406 5.84469 5.92688 6.13625 5.63625C6.42781 5.34562 7.11031 5.33437 7.77031 5.325C8.40313 5.31562 9.05656 5.30531 9.62844 5.06906C10.2238 4.8225 10.7084 4.3575 11.1772 3.90844C11.6459 3.45937 12.125 3 12.5 3C12.875 3 13.3578 3.46125 13.8228 3.90844C14.2878 4.35562 14.7763 4.8225 15.3716 5.06906C15.9434 5.30531 16.5969 5.31562 17.2297 5.325C17.8859 5.33437 18.5731 5.34469 18.8638 5.63625C19.1544 5.92781 19.1656 6.61031 19.175 7.27031C19.1844 7.90313 19.1947 8.55656 19.4309 9.12844C19.6775 9.72375 20.1425 10.2084 20.5916 10.6772C21.0406 11.1459 21.5 11.625 21.5 12C21.5 12.375 21.0387 12.8578 20.5916 13.3228ZM16.7806 9.21937C16.8504 9.28903 16.9057 9.37175 16.9434 9.46279C16.9812 9.55384 17.0006 9.65144 17.0006 9.75C17.0006 9.84856 16.9812 9.94616 16.9434 10.0372C16.9057 10.1283 16.8504 10.211 16.7806 10.2806L11.5306 15.5306C11.461 15.6004 11.3783 15.6557 11.2872 15.6934C11.1962 15.7312 11.0986 15.7506 11 15.7506C10.9014 15.7506 10.8038 15.7312 10.7128 15.6934C10.6217 15.6557 10.539 15.6004 10.4694 15.5306L8.21937 13.2806C8.07864 13.1399 7.99958 12.949 7.99958 12.75C7.99958 12.551 8.07864 12.3601 8.21937 12.2194C8.36011 12.0786 8.55098 11.9996 8.75 11.9996C8.94902 11.9996 9.13989 12.0786 9.28063 12.2194L11 13.9397L15.7194 9.21937C15.789 9.14964 15.8717 9.09432 15.9628 9.05658C16.0538 9.01884 16.1514 8.99941 16.25 8.99941C16.3486 8.99941 16.4462 9.01884 16.5372 9.05658C16.6283 9.09432 16.711 9.14964 16.7806 9.21937Z" fill="#003592"/>
                    </svg>
                    <div className="text-[#2D2727] text-sm font-bold mb-1">
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        Basic Cover
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        Basic Cover is automatically applied to Condo Excel Plus Premium plan. It covers Items: A) Condominium Unit, and B) Condominium Unit Improvements.
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        A. Condominium Unit
                    </p>
                    <p className=" text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                        <li className='ml-2'>Limit of liability: Php 2,000,000 first loss any one occurrence and annual aggregate.</li>
                        <li className='ml-2 '>Pays for loss or damage to the condominium or damage to the condominium residential unit improvements.</li>
                        
                    </p>
                    <ul className="text-[#2D2727] md:text-sm text-xs font-bold mb-1">
                        B. Condominium Unit Improvements
                    </ul>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mb-1">
                       <li className='ml-2'>Limit of liability: Php 500,000 first loss any one occurrence and annual aggregate.</li>
                        <li className='ml-2'>Pays for loss or damage to the <br className="block md:hidden" />condominium residential unit improvements.</li>
                    </p>
                    <p className="text-[#2D2727] md:text-sm text-xs font-normal mt-4 hidden md:block">
                       However, if you want to declare open value, select <strong>Declare Open Value</strong>. Computation of the plan is the equivalent with the amount. 
                    </p>
                    </div>
                    </div>
                </div>
            </div>
            <div className="flex flex-col items-start gap-3 m-5">
            <button
                className={`flex items-center gap-2 md:px-14 px-5 py-2 md:py-6 rounded-full font-medium transition ${
                formData.selected
                    ? "bg-[#E4509A] text-white border border-[#E4509A]"
                    : "bg-white text-[#E4509A] border border-[#E4509A]"
                }`}
                onClick={() => {
                    setFormData((prev) => {
                    const newSelected = !prev.selected;

                    return {
                        ...prev,
                        selected: newSelected,
                        declaredValue: newSelected ? prev.declaredValue : "",
                        coveredAmount: newSelected ? prev.coveredAmount : "",
                    };
                    });

                    setErrors((prev) => {
                    const newErrors = { ...prev };
                    if (!formData.selected) {
                        delete newErrors.coveredAmount;
                    } else {
                        delete newErrors.coveredAmount;
                    }
                    return newErrors;
                    });
                }}
                >
                {formData.selected && (
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" className="md:w-[20px] md:h-[20px] w-[15px] h-[15px]">
                    <path d="M10 0.5C8.12108 0.5 6.28435 1.05717 4.72209 2.10104C3.15982 3.14491 1.94218 4.62861 1.22315 6.36451C0.504116 8.1004 0.315985 10.0105 0.682544 11.8534C1.0491 13.6962 1.95389 15.3889 3.28249 16.7175C4.61109 18.0461 6.30383 18.9509 8.14665 19.3175C9.98946 19.684 11.8996 19.4959 13.6355 18.7769C15.3714 18.0578 16.8551 16.8402 17.899 15.2779C18.9428 13.7156 19.5 11.8789 19.5 10C19.4973 7.48126 18.4956 5.06644 16.7146 3.28542C14.9336 1.5044 12.5187 0.50266 10 0.5ZM14.1709 8.32471L9.05548 13.4401C8.98761 13.508 8.90702 13.5619 8.81831 13.5987C8.72959 13.6355 8.6345 13.6544 8.53846 13.6544C8.44243 13.6544 8.34734 13.6355 8.25862 13.5987C8.16991 13.5619 8.08931 13.508 8.02144 13.4401L5.82914 11.2478C5.69202 11.1107 5.61498 10.9247 5.61498 10.7308C5.61498 10.5368 5.69202 10.3509 5.82914 10.2137C5.96626 10.0766 6.15224 9.99959 6.34616 9.99959C6.54008 9.99959 6.72605 10.0766 6.86318 10.2137L8.53846 11.8899L13.1368 7.29067C13.2047 7.22278 13.2853 7.16892 13.374 7.13217C13.4627 7.09543 13.5578 7.07652 13.6538 7.07652C13.7499 7.07652 13.8449 7.09543 13.9337 7.13217C14.0224 7.16892 14.103 7.22278 14.1709 7.29067C14.2388 7.35857 14.2926 7.43917 14.3294 7.52788C14.3661 7.61659 14.385 7.71167 14.385 7.80769C14.385 7.90371 14.3661 7.99879 14.3294 8.0875C14.2926 8.17621 14.2388 8.25681 14.1709 8.32471Z" fill="white"/>
                    </svg>
                </span>
                )}
                <span className="flex items-center justify-center gap-1 md:text-base text-sm md:font-medium font-normal">Declare Open Value</span>
            </button>
                </div>
                <div className="text-center items-center mt-5 mb-5">
                 {formData.selected && (
                    <label className="flex flex-col w-full w-full items-start md:items-center" ref={coveredAmountRef}>
                        <p className="md:text-base text-sm md:font-medium font-normal text-[#2D2727] text-left mb-4 w-[280px] md:w-[600px]">Covered Amount</p>
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] w-[280px] md:w-[600px] px-3 text-left ${
                                errors.coveredAmount
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Covered Amount
                        </span>
                        <input
                        value={formatNumber(formData.declaredValue || "")}
                        onChange={(e) => {
                            const rawValue = unformatNumber(e.target.value);
                            if (!/^\d*$/.test(rawValue)) return;

                            const numericValue = Number(rawValue);

                            if (numericValue > 400000000) return;

                            setFormData((prev) => ({
                            ...prev,
                            declaredValue: rawValue,
                            }));

                            const computedCoveredAmount = Math.round(rawValue * 0.0007);

                            setFormData((prev) => ({
                            ...prev,
                            coveredAmount: computedCoveredAmount,
                            }));

                            if (rawValue.trim() !== "") {
                            setErrors((prev) => {
                                const newErrors = { ...prev };
                                delete newErrors.declaredValue;
                                delete newErrors.coveredAmount;
                                return newErrors;
                            });
                            }
                        }}
                        placeholder="Enter declared value"
                        className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                            placeholder:text-sm placeholder:font-normal
                            ${
                            errors.coveredAmount
                                ? "border-b-[#DD0707] placeholder-[#DD0707]"
                                : "border-[#006666] placeholder-[#848A90]"
                            }
                            focus:border-[#006666]`}
                        />
                        <input type="hidden" value={formData.coveredAmount || ""} />

                    </label>
                )}
               
                <div className="flex items-start text-left gap-3 md:mt-8 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none" className="md:w-[21px] md:h-[20px] w-[12px] h-[12px] flex shrink-0">
                <path d="M10.5 0.25C8.57164 0.25 6.68657 0.821828 5.08319 1.89317C3.47982 2.96451 2.23013 4.48726 1.49218 6.26884C0.754225 8.05042 0.561142 10.0108 0.937348 11.9021C1.31355 13.7934 2.24215 15.5307 3.60571 16.8943C4.96928 18.2579 6.70656 19.1865 8.59787 19.5627C10.4892 19.9389 12.4496 19.7458 14.2312 19.0078C16.0127 18.2699 17.5355 17.0202 18.6068 15.4168C19.6782 13.8134 20.25 11.9284 20.25 10C20.2473 7.41498 19.2192 4.93661 17.3913 3.10872C15.5634 1.28084 13.085 0.25273 10.5 0.25ZM10.5 18.25C8.86831 18.25 7.27326 17.7661 5.91655 16.8596C4.55984 15.9531 3.50242 14.6646 2.878 13.1571C2.25358 11.6496 2.0902 9.99085 2.40853 8.3905C2.72685 6.79016 3.51259 5.32015 4.66637 4.16637C5.82016 3.01259 7.29017 2.22685 8.89051 1.90852C10.4909 1.59019 12.1497 1.75357 13.6571 2.37799C15.1646 3.00242 16.4531 4.05984 17.3596 5.41655C18.2661 6.77325 18.75 8.3683 18.75 10C18.7475 12.1873 17.8775 14.2843 16.3309 15.8309C14.7843 17.3775 12.6873 18.2475 10.5 18.25ZM12 14.5C12 14.6989 11.921 14.8897 11.7803 15.0303C11.6397 15.171 11.4489 15.25 11.25 15.25C10.8522 15.25 10.4706 15.092 10.1893 14.8107C9.90804 14.5294 9.75 14.1478 9.75 13.75V10C9.55109 10 9.36033 9.92098 9.21967 9.78033C9.07902 9.63968 9 9.44891 9 9.25C9 9.05109 9.07902 8.86032 9.21967 8.71967C9.36033 8.57902 9.55109 8.5 9.75 8.5C10.1478 8.5 10.5294 8.65804 10.8107 8.93934C11.092 9.22064 11.25 9.60218 11.25 10V13.75C11.4489 13.75 11.6397 13.829 11.7803 13.9697C11.921 14.1103 12 14.3011 12 14.5ZM9 5.875C9 5.6525 9.06598 5.43499 9.1896 5.24998C9.31322 5.06498 9.48892 4.92078 9.69449 4.83564C9.90005 4.75049 10.1263 4.72821 10.3445 4.77162C10.5627 4.81502 10.7632 4.92217 10.9205 5.0795C11.0778 5.23684 11.185 5.43729 11.2284 5.65552C11.2718 5.87375 11.2495 6.09995 11.1644 6.30552C11.0792 6.51109 10.935 6.68679 10.75 6.8104C10.565 6.93402 10.3475 7 10.125 7C9.82664 7 9.54049 6.88147 9.32951 6.6705C9.11853 6.45952 9 6.17337 9 5.875Z" fill="#848A90"/>
                </svg>
                <p className="text-[#2D2727] md:text-sm text-xs font-normal md:mb-4 mb-0"><strong>OPEN VALUE</strong>: Client inputs the covered amount of the Property.</p>
                </div>
                 </div>
                <div className="flex flex-col items-center justify-center w-full py-6 md:py-8 md:gap-8 gap-0">
            
                <CondoAddress
                hasSubmitted={hasSubmitted}
                ref={condoAddressRef}
                formData={formData}
                setFormData={setFormData}
                regions={regions}
                provinces={provinces}
                cities={cities}
                barangays={barangays}
                region={formData.region}
                provincesAddress={provincesAddress} 
                city={formData.city}
                barangay={formData.barangay}
                street={formData.street}
                zip={formData.zip}
                building={formData.building}
                errors={errors}
                setErrors={setErrors}
                handleRegionChange={handleRegionChange}
                handleProvinceChange={handleProvinceChange}
                handleCityChange={handleCityChange}
                />
                </div>
                <div className="flex flex-col items-center justify-center w-full py-6 md:py-8 gap-8">
                <div className="flex items-center gap-5 md:mb-8 mb-2">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium">
                    Details of the Unit / Property
                    </h3>
                    <span>
                        {formData.unitType && formData.unitType.id !== 1 && formData.unitNumber?.trim() ? (

                         <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && (errors.unitType || 
                                            errors.unitFloor) ? (
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
               
            <div className="flex flex-col md:flex-row gap-10 w-full max-w-[600px] m-6">
                <label className="flex flex-col w-full">
                <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                hasSubmitted && errors.unitType
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                    Unit Type
                </span>
                 <DropdownSingle
                    ref={unitTypeRef}
                    data={unitTypeOptions}
                    defaultValue={[
                        formData.unitType && formData.unitType.id
                        ? unitTypeOptions.find((item) => item.id === formData.unitType.id)
                        : unitTypeOptions[0],
                    ]}
                    handleDropdownChange={(selectedOption) => {
                        const selectedUnitType =
                            unitTypeOptions.find((item) => item.id === selectedOption.id) ||
                            unitTypeOptions[0];

                        setFormData((prev) => ({
                            ...prev,
                            unitType: selectedUnitType,
                        }));

                        if (selectedUnitType.id === 1) {
                            setErrors((prev) => ({ ...prev, unitType: "Unit type is required" }));
                        } else {
                            setErrors((prev) => ({ ...prev, unitType: "" }));
                        }
                        }}
                        error={hasSubmitted && !!errors.unitType}
                        
                         />
                </label>

                <label className="flex flex-col w-full">
                <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.unitNumber
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                    Unit Floor and Number
                </span>
               <input
                ref={unitNumberRef}
                type="text"
                placeholder={errors.unitNumber ? "Enter Unit Number" : "10F 25J"}
                value={formData?.unitNumber ?? ""}
                maxLength={100}
                onChange={(e) => {
                    let rawValue = e.target.value;

                    let cleaned = rawValue.replace(/[^a-zA-Z0-9\s#,.-]/g, "");
                    cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                    cleaned = cleaned.slice(0, 100);

                    setFormData((prev) => ({
                    ...prev,
                    unitNumber: cleaned,
                    }));

                    setErrors((prev) => ({ ...prev, unitNumber: "" }));
                }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.unitNumber ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />

                </label>
            </div>
             </div>
               <div className="flex flex-col items-center justify-center w-full py-6 md:py-8 gap-2">
                 <div className="flex items-center gap-5 mb-2">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium">
                    Condominium Specifics
                    </h3>
                     <span>
                        {formData.front?.trim() &&
                        formData.right?.trim() &&
                        formData.left?.trim() &&
                        formData.rear?.trim() &&
                        formData.roof && formData.roof.id !== 1 &&
                        formData.wall && formData.wall.id !== 1 &&
                        formData.storey?.trim() ? (

                         <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && (errors.front || 
                                            errors.left ||
                                            errors.right ||
                                            errors.rear ||
                                            errors.roof ||
                                            errors.wall ||
                                            errors.storey) ? (
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
                
                <div className="md:bg-[#F0F6FA] bg-[#F7FCFF] px-14 py-9 mt-10 rounded-sm hidden sm:block">
                    <div className="flex items-center justify-center mb-5">
                <p className="md:text-base text-sm font-medium text-[#2D2727] ">Condo Building Boundaries</p> 
                </div>
                <div className="relative flex items-center justify-center">
                <svg width="257" height="94" viewBox="0 0 257 94" fill="none" xmlns="http://www.w3.org/2000/svg" className="w-[257px] h-[94px]">
                <rect width="256" height="94" transform="translate(0.500488)" fill="#E0E4E6"/>
                <path d="M103 14.5C101.517 14.5 100.067 14.9399 98.8337 15.764C97.6003 16.5881 96.6391 17.7594 96.0714 19.1299C95.5037 20.5003 95.3552 22.0083 95.6446 23.4632C95.934 24.918 96.6483 26.2544 97.6972 27.3033C98.7461 28.3522 100.082 29.0665 101.537 29.3559C102.992 29.6453 104.5 29.4968 105.871 28.9291C107.241 28.3614 108.412 27.4001 109.237 26.1668C110.061 24.9334 110.5 23.4834 110.5 22C110.498 20.0115 109.708 18.1051 108.301 16.699C106.895 15.293 104.989 14.5021 103 14.5ZM106.293 20." fill="#E0E4E6" stroke-width= "1px"
                stroke= "#B6CEDE"/>
                <path d="M121.779 28V16.3636H128.995V17.875H123.535V21.4205H128.478V22.9261H123.535V28H121.779ZM130.908 28V19.2727H132.55V20.6591H132.641C132.8 20.1894 133.081 19.8201 133.482 19.5511C133.887 19.2784 134.346 19.142 134.857 19.142C134.963 19.142 135.088 19.1458 135.232 19.1534C135.38 19.161 135.495 19.1705 135.579 19.1818V20.8068C135.51 20.7879 135.389 20.767 135.215 20.7443C135.041 20.7178 134.866 20.7045 134.692 20.7045C134.291 20.7045 133.933 20.7898 133.618 20.9602C133.308 21.1269 133.062 21.3598 132.88 21.6591C132.698 21.9545 132.607 22.2917 132.607 22.6705V28H130.908ZM140.412 28.1761C139.594 28.1761 138.88 27.9886 138.27 27.6136C137.661 27.2386 137.187 26.714 136.85 26.0398C136.513 25.3655 136.344 24.5777 136.344 23.6761C136.344 22.7708 136.513 21.9792 136.85 21.3011C137.187 20.6231 137.661 20.0966 138.27 19.7216C138.88 19.3466 139.594 19.1591 140.412 19.1591C141.231 19.1591 141.945 19.3466 142.554 19.7216C143.164 20.0966 143.638 20.6231 143.975 21.3011C144.312 21.9792 144.481 22.7708 144.481 23.6761C144.481 24.5777 144.312 25.3655 143.975 26.0398C143.638 26.714 143.164 27.2386 142.554 27.6136C141.945 27.9886 141.231 28.1761 140.412 28.1761ZM140.418 26.75C140.948 26.75 141.388 26.6098 141.736 26.3295C142.085 26.0492 142.342 25.6761 142.509 25.2102C142.679 24.7443 142.765 24.2311 142.765 23.6705C142.765 23.1136 142.679 22.6023 142.509 22.1364C142.342 21.6667 142.085 21.2898 141.736 21.0057C141.388 20.7216 140.948 20.5795 140.418 20.5795C139.884 20.5795 139.441 20.7216 139.089 21.0057C138.74 21.2898 138.481 21.6667 138.31 22.1364C138.143 22.6023 138.06 23.1136 138.06 23.6705C138.06 24.2311 138.143 24.7443 138.31 25.2102C138.481 25.6761 138.74 26.0492 139.089 26.3295C139.441 26.6098 139.884 26.75 140.418 26.75ZM148.076 22.8182V28H146.377V19.2727H148.008V20.6932H148.116C148.316 20.2311 148.631 19.8598 149.059 19.5795C149.491 19.2992 150.034 19.1591 150.689 19.1591C151.284 19.1591 151.805 19.2841 152.252 19.5341C152.699 19.7803 153.045 20.1477 153.292 20.6364C153.538 21.125 153.661 21.7292 153.661 22.4489V28H151.962V22.6534C151.962 22.0208 151.797 21.5265 151.468 21.1705C151.138 20.8106 150.686 20.6307 150.11 20.6307C149.716 20.6307 149.366 20.7159 149.059 20.8864C148.756 21.0568 148.515 21.3068 148.337 21.6364C148.163 21.9621 148.076 22.3561 148.076 22.8182ZM160.013 19.2727V20.6364H155.246V19.2727H160.013ZM156.525 17.1818H158.223V25.4375C158.223 25.767 158.273 26.0152 158.371 26.1818C158.47 26.3447 158.597 26.4564 158.752 26.517C158.911 26.5739 159.083 26.6023 159.269 26.6023C159.405 26.6023 159.525 26.5928 159.627 26.5739C159.729 26.5549 159.809 26.5398 159.866 26.5284L160.172 27.9318C160.074 27.9697 159.934 28.0076 159.752 28.0455C159.57 28.0871 159.343 28.1098 159.07 28.1136C158.623 28.1212 158.206 28.0417 157.82 27.875C157.434 27.7083 157.121 27.4508 156.883 27.1023C156.644 26.7538 156.525 26.3163 156.525 25.7898V17.1818Z" fill="#2D2727"/>
                <path d="M25.2913 58V49.2727H30.7033V50.4062H26.6081V53.0653H30.3155V54.1946H26.6081V58H25.2913ZM32.1383 58V51.4545H33.3698V52.4943H33.438C33.5573 52.142 33.7675 51.8651 34.0687 51.6634C34.3726 51.4588 34.7164 51.3565 35.0999 51.3565C35.1795 51.3565 35.2732 51.3594 35.3812 51.3651C35.492 51.3707 35.5786 51.3778 35.6411 51.3864V52.6051C35.59 52.5909 35.4991 52.5753 35.3684 52.5582C35.2377 52.5384 35.107 52.5284 34.9763 52.5284C34.6752 52.5284 34.4067 52.5923 34.1709 52.7202C33.938 52.8452 33.7533 53.0199 33.617 53.2443C33.4806 53.4659 33.4124 53.7187 33.4124 54.0028V58H32.1383ZM39.2665 58.1321C38.6528 58.1321 38.1173 57.9915 37.6599 57.7102C37.2025 57.429 36.8474 57.0355 36.5946 56.5298C36.3418 56.0241 36.2153 55.4332 36.2153 54.7571C36.2153 54.0781 36.3418 53.4844 36.5946 52.9759C36.8474 52.4673 37.2025 52.0724 37.6599 51.7912C38.1173 51.5099 38.6528 51.3693 39.2665 51.3693C39.8801 51.3693 40.4156 51.5099 40.873 51.7912C41.3304 52.0724 41.6855 52.4673 41.9383 52.9759C42.1912 53.4844 42.3176 54.0781 42.3176 54.7571C42.3176 55.4332 42.1912 56.0241 41.9383 56.5298C41.6855 57.0355 41.3304 57.429 40.873 57.7102C40.4156 57.9915 39.8801 58.1321 39.2665 58.1321ZM39.2707 57.0625C39.6685 57.0625 39.998 56.9574 40.2594 56.7472C40.5207 56.5369 40.7139 56.2571 40.8389 55.9077C40.9668 55.5582 41.0307 55.1733 41.0307 54.7528C41.0307 54.3352 40.9668 53.9517 40.8389 53.6023C40.7139 53.25 40.5207 52.9673 40.2594 52.7543C39.998 52.5412 39.6685 52.4347 39.2707 52.4347C38.8702 52.4347 38.5378 52.5412 38.2736 52.7543C38.0122 52.9673 37.8176 53.25 37.6898 53.6023C37.5648 53.9517 37.5023 54.3352 37.5023 54.7528C37.5023 55.1733 37.5648 55.5582 37.6898 55.9077C37.8176 56.2571 38.0122 56.5369 38.2736 56.7472C38.5378 56.9574 38.8702 57.0625 39.2707 57.0625ZM45.014 54.1136V58H43.7398V51.4545H44.9628V52.5199H45.0438C45.1944 52.1733 45.4302 51.8949 45.7512 51.6847C46.0751 51.4744 46.4827 51.3693 46.9742 51.3693C47.4202 51.3693 47.8109 51.4631 48.1461 51.6506C48.4813 51.8352 48.7413 52.1108 48.9259 52.4773C49.1106 52.8437 49.2029 53.2969 49.2029 53.8366V58H47.9288V53.9901C47.9288 53.5156 47.8052 53.1449 47.558 52.8778C47.3109 52.608 46.9714 52.473 46.5396 52.473C46.2441 52.473 45.9813 52.5369 45.7512 52.6648C45.5239 52.7926 45.3435 52.9801 45.21 53.2273C45.0793 53.4716 45.014 53.767 45.014 54.1136ZM53.9671 51.4545V52.4773H50.3918V51.4545H53.9671ZM51.3506 49.8864H52.6248V56.0781C52.6248 56.3253 52.6617 56.5114 52.7356 56.6364C52.8094 56.7585 52.9046 56.8423 53.0211 56.8878C53.1404 56.9304 53.2697 56.9517 53.4089 56.9517C53.5111 56.9517 53.6006 56.9446 53.6773 56.9304C53.754 56.9162 53.8137 56.9048 53.8563 56.8963L54.0864 57.9489C54.0126 57.9773 53.9074 58.0057 53.7711 58.0341C53.6347 58.0653 53.4643 58.0824 53.2597 58.0852C52.9245 58.0909 52.612 58.0312 52.3222 57.9062C52.0324 57.7812 51.7981 57.5881 51.6191 57.3267C51.4401 57.0653 51.3506 56.7372 51.3506 56.3423V49.8864ZM63.4572 53.0526L62.3023 53.2571C62.254 53.1094 62.1773 52.9687 62.0722 52.8352C61.9699 52.7017 61.8307 52.5923 61.6546 52.5071C61.4785 52.4219 61.2583 52.3793 60.9941 52.3793C60.6333 52.3793 60.3322 52.4602 60.0907 52.6222C59.8492 52.7812 59.7285 52.9872 59.7285 53.2401C59.7285 53.4588 59.8094 53.6349 59.9714 53.7685C60.1333 53.902 60.3947 54.0114 60.7555 54.0966L61.7952 54.3352C62.3975 54.4744 62.8464 54.6889 63.1418 54.9787C63.4373 55.2685 63.585 55.6449 63.585 56.108C63.585 56.5 63.4714 56.8494 63.2441 57.1562C63.0197 57.4602 62.7057 57.6989 62.3023 57.8722C61.9018 58.0455 61.4373 58.1321 60.9089 58.1321C60.1759 58.1321 59.5779 57.9759 59.1148 57.6634C58.6518 57.348 58.3677 56.9006 58.2626 56.321L59.4941 56.1335C59.5708 56.4545 59.7285 56.6974 59.9671 56.8622C60.2057 57.0241 60.5168 57.1051 60.9003 57.1051C61.318 57.1051 61.6518 57.0185 61.9018 56.8452C62.1518 56.669 62.2768 56.4545 62.2768 56.2017C62.2768 55.9972 62.2001 55.8253 62.0467 55.6861C61.8961 55.5469 61.6646 55.4418 61.3521 55.3707L60.2441 55.1278C59.6333 54.9886 59.1816 54.767 58.889 54.4631C58.5992 54.1591 58.4543 53.7741 58.4543 53.3082C58.4543 52.9219 58.5623 52.5838 58.7782 52.294C58.9941 52.0043 59.2924 51.7784 59.6731 51.6165C60.0538 51.4517 60.4898 51.3693 60.9813 51.3693C61.6887 51.3693 62.2455 51.5227 62.6518 51.8295C63.058 52.1335 63.3265 52.5412 63.4572 53.0526ZM64.9859 58V51.4545H66.2601V58H64.9859ZM65.6294 50.4446C65.4078 50.4446 65.2175 50.3707 65.0584 50.223C64.9021 50.0724 64.824 49.8935 64.824 49.6861C64.824 49.4759 64.9021 49.2969 65.0584 49.1491C65.2175 48.9986 65.4078 48.9233 65.6294 48.9233C65.851 48.9233 66.0399 48.9986 66.1962 49.1491C66.3552 49.2969 66.4348 49.4759 66.4348 49.6861C66.4348 49.8935 66.3552 50.0724 66.1962 50.223C66.0399 50.3707 65.851 50.4446 65.6294 50.4446ZM70.4245 58.1278C69.8961 58.1278 69.4245 57.9929 69.0097 57.723C68.5978 57.4503 68.2739 57.0625 68.0381 56.5597C67.8052 56.054 67.6887 55.4474 67.6887 54.7401C67.6887 54.0327 67.8066 53.4276 68.0424 52.9247C68.281 52.4219 68.6077 52.0369 69.0225 51.7699C69.4373 51.5028 69.9074 51.3693 70.433 51.3693C70.8393 51.3693 71.166 51.4375 71.4131 51.5739C71.6631 51.7074 71.8563 51.8636 71.9927 52.0426C72.1319 52.2216 72.2398 52.3793 72.3165 52.5156H72.3932V49.2727H73.6674V58H72.4231V56.9815H72.3165C72.2398 57.1207 72.129 57.2798 71.9842 57.4588C71.8421 57.6378 71.6461 57.794 71.3961 57.9276C71.1461 58.0611 70.8222 58.1278 70.4245 58.1278ZM70.7057 57.0412C71.0722 57.0412 71.3819 56.9446 71.6347 56.7514C71.8904 56.5554 72.0836 56.2841 72.2143 55.9375C72.3478 55.5909 72.4146 55.1875 72.4146 54.7273C72.4146 54.2727 72.3492 53.875 72.2185 53.5341C72.0878 53.1932 71.8961 52.9276 71.6432 52.7372C71.3904 52.5469 71.0779 52.4517 70.7057 52.4517C70.3222 52.4517 70.0026 52.5511 69.7469 52.75C69.4913 52.9489 69.2981 53.2202 69.1674 53.5639C69.0396 53.9077 68.9756 54.2955 68.9756 54.7273C68.9756 55.1648 69.041 55.5582 69.1717 55.9077C69.3023 56.2571 69.4955 56.5341 69.7512 56.7386C70.0097 56.9403 70.3279 57.0412 70.7057 57.0412ZM78.307 58.1321C77.6621 58.1321 77.1067 57.9943 76.6408 57.7188C76.1777 57.4403 75.8197 57.0497 75.5669 56.5469C75.3169 56.0412 75.1919 55.4489 75.1919 54.7699C75.1919 54.0994 75.3169 53.5085 75.5669 52.9972C75.8197 52.4858 76.172 52.0866 76.6237 51.7997C77.0783 51.5128 77.6095 51.3693 78.2175 51.3693C78.5868 51.3693 78.9447 51.4304 79.2913 51.5526C79.6379 51.6747 79.949 51.8665 80.2246 52.1278C80.5001 52.3892 80.7175 52.7287 80.8766 53.1463C81.0356 53.5611 81.1152 54.0653 81.1152 54.6591V55.1108H75.9121V54.1562H79.8666C79.8666 53.821 79.7984 53.5241 79.6621 53.2656C79.5257 53.0043 79.3339 52.7983 79.0868 52.6477C78.8425 52.4972 78.5555 52.4219 78.226 52.4219C77.868 52.4219 77.5555 52.5099 77.2885 52.6861C77.0243 52.8594 76.8197 53.0866 76.6748 53.3679C76.5328 53.6463 76.4618 53.9489 76.4618 54.2756V55.0213C76.4618 55.4588 76.5385 55.831 76.6919 56.1378C76.8481 56.4446 77.0655 56.679 77.3439 56.8409C77.6223 57 77.9476 57.0795 78.3197 57.0795C78.5612 57.0795 78.7814 57.0455 78.9802 56.9773C79.1791 56.9062 79.351 56.8011 79.4959 56.6619C79.6408 56.5227 79.7516 56.3509 79.8283 56.1463L81.0342 56.3636C80.9376 56.7187 80.7643 57.0298 80.5143 57.2969C80.2672 57.5611 79.9561 57.767 79.5811 57.9148C79.2089 58.0597 78.7842 58.1321 78.307 58.1321ZM90.6095 53.0526L89.4547 53.2571C89.4064 53.1094 89.3297 52.9687 89.2246 52.8352C89.1223 52.7017 88.9831 52.5923 88.807 52.5071C88.6308 52.4219 88.4106 52.3793 88.1464 52.3793C87.7856 52.3793 87.4845 52.4602 87.243 52.6222C87.0016 52.7812 86.8808 52.9872 86.8808 53.2401C86.8808 53.4588 86.9618 53.6349 87.1237 53.7685C87.2856 53.902 87.547 54.0114 87.9078 54.0966L88.9476 54.3352C89.5498 54.4744 89.9987 54.6889 90.2942 54.9787C90.5896 55.2685 90.7373 55.6449 90.7373 56.108C90.7373 56.5 90.6237 56.8494 90.3964 57.1562C90.172 57.4602 89.8581 57.6989 89.4547 57.8722C89.0541 58.0455 88.5896 58.1321 88.0612 58.1321C87.3283 58.1321 86.7302 57.9759 86.2672 57.6634C85.8041 57.348 85.52 56.9006 85.4149 56.321L86.6464 56.1335C86.7231 56.4545 86.8808 56.6974 87.1195 56.8622C87.3581 57.0241 87.6692 57.1051 88.0527 57.1051C88.4703 57.1051 88.8041 57.0185 89.0541 56.8452C89.3041 56.669 89.4291 56.4545 89.4291 56.2017C89.4291 55.9972 89.3524 55.8253 89.199 55.6861C89.0484 55.5469 88.8169 55.4418 88.5044 55.3707L87.3964 55.1278C86.7856 54.9886 86.3339 54.767 86.0413 54.4631C85.7516 54.1591 85.6067 53.7741 85.6067 53.3082C85.6067 52.9219 85.7146 52.5838 85.9305 52.294C86.1464 52.0043 86.4447 51.7784 86.8254 51.6165C87.2061 51.4517 87.6422 51.3693 88.1337 51.3693C88.841 51.3693 89.3979 51.5227 89.8041 51.8295C90.2104 52.1335 90.4788 52.5412 90.6095 53.0526ZM93.4124 54.1136V58H92.1383V49.2727H93.3954V52.5199H93.4763C93.6297 52.1676 93.8641 51.8878 94.1795 51.6804C94.4948 51.473 94.9067 51.3693 95.4153 51.3693C95.8641 51.3693 96.2562 51.4616 96.5914 51.6463C96.9295 51.831 97.1908 52.1065 97.3755 52.473C97.563 52.8366 97.6567 53.2912 97.6567 53.8366V58H96.3826V53.9901C96.3826 53.5099 96.259 53.1378 96.0119 52.8736C95.7647 52.6065 95.4209 52.473 94.9806 52.473C94.6795 52.473 94.4096 52.5369 94.1709 52.6648C93.9351 52.7926 93.7491 52.9801 93.6127 53.2273C93.4792 53.4716 93.4124 53.767 93.4124 54.1136ZM102.114 58.1321C101.5 58.1321 100.965 57.9915 100.508 57.7102C100.05 57.429 99.6951 57.0355 99.4422 56.5298C99.1894 56.0241 99.063 55.4332 99.063 54.7571C99.063 54.0781 99.1894 53.4844 99.4422 52.9759C99.6951 52.4673 100.05 52.0724 100.508 51.7912C100.965 51.5099 101.5 51.3693 102.114 51.3693C102.728 51.3693 103.263 51.5099 103.721 51.7912C104.178 52.0724 104.533 52.4673 104.786 52.9759C105.039 53.4844 105.165 54.0781 105.165 54.7571C105.165 55.4332 105.039 56.0241 104.786 56.5298C104.533 57.0355 104.178 57.429 103.721 57.7102C103.263 57.9915 102.728 58.1321 102.114 58.1321ZM102.118 57.0625C102.516 57.0625 102.846 56.9574 103.107 56.7472C103.368 56.5369 103.562 56.2571 103.687 55.9077C103.814 55.5582 103.878 55.1733 103.878 54.7528C103.878 54.3352 103.814 53.9517 103.687 53.6023C103.562 53.25 103.368 52.9673 103.107 52.7543C102.846 52.5412 102.516 52.4347 102.118 52.4347C101.718 52.4347 101.385 52.5412 101.121 52.7543C100.86 52.9673 100.665 53.25 100.537 53.6023C100.412 53.9517 100.35 54.3352 100.35 54.7528C100.35 55.1733 100.412 55.5582 100.537 55.9077C100.665 56.2571 100.86 56.5369 101.121 56.7472C101.385 56.9574 101.718 57.0625 102.118 57.0625ZM110.734 55.2855V51.4545H112.012V58H110.759V56.8665H110.691C110.541 57.2159 110.299 57.5071 109.967 57.7401C109.637 57.9702 109.227 58.0852 108.735 58.0852C108.315 58.0852 107.943 57.9929 107.619 57.8082C107.298 57.6207 107.045 57.3438 106.86 56.9773C106.678 56.6108 106.587 56.1577 106.587 55.6179V51.4545H107.862V55.4645C107.862 55.9105 107.985 56.2656 108.232 56.5298C108.48 56.794 108.801 56.9261 109.195 56.9261C109.434 56.9261 109.671 56.8665 109.907 56.7472C110.146 56.6278 110.343 56.4474 110.499 56.206C110.659 55.9645 110.737 55.6577 110.734 55.2855ZM114.998 49.2727V58H113.724V49.2727H114.998ZM119.163 58.1278C118.634 58.1278 118.163 57.9929 117.748 57.723C117.336 57.4503 117.012 57.0625 116.776 56.5597C116.543 56.054 116.427 55.4474 116.427 54.7401C116.427 54.0327 116.545 53.4276 116.781 52.9247C117.019 52.4219 117.346 52.0369 117.761 51.7699C118.176 51.5028 118.646 51.3693 119.171 51.3693C119.578 51.3693 119.904 51.4375 120.151 51.5739C120.401 51.7074 120.595 51.8636 120.731 52.0426C120.87 52.2216 120.978 52.3793 121.055 52.5156H121.132V49.2727H122.406V58H121.161V56.9815H121.055C120.978 57.1207 120.867 57.2798 120.722 57.4588C120.58 57.6378 120.384 57.794 120.134 57.9276C119.884 58.0611 119.561 58.1278 119.163 58.1278ZM119.444 57.0412C119.811 57.0412 120.12 56.9446 120.373 56.7514C120.629 56.5554 120.822 56.2841 120.953 55.9375C121.086 55.5909 121.153 55.1875 121.153 54.7273C121.153 54.2727 121.087 53.875 120.957 53.5341C120.826 53.1932 120.634 52.9276 120.382 52.7372C120.129 52.5469 119.816 52.4517 119.444 52.4517C119.061 52.4517 118.741 52.5511 118.485 52.75C118.23 52.9489 118.036 53.2202 117.906 53.5639C117.778 53.9077 117.714 54.2955 117.714 54.7273C117.714 55.1648 117.779 55.5582 117.91 55.9077C118.041 56.2571 118.234 56.5341 118.489 56.7386C118.748 56.9403 119.066 57.0412 119.444 57.0412ZM127.502 58V49.2727H128.776V52.5156H128.853C128.927 52.3793 129.034 52.2216 129.173 52.0426C129.312 51.8636 129.505 51.7074 129.752 51.5739C129.999 51.4375 130.326 51.3693 130.732 51.3693C131.261 51.3693 131.732 51.5028 132.147 51.7699C132.562 52.0369 132.887 52.4219 133.123 52.9247C133.362 53.4276 133.481 54.0327 133.481 54.7401C133.481 55.4474 133.363 56.054 133.127 56.5597C132.891 57.0625 132.568 57.4503 132.156 57.723C131.744 57.9929 131.274 58.1278 130.745 58.1278C130.347 58.1278 130.022 58.0611 129.769 57.9276C129.519 57.794 129.323 57.6378 129.181 57.4588C129.039 57.2798 128.93 57.1207 128.853 56.9815H128.747V58H127.502ZM128.751 54.7273C128.751 55.1875 128.818 55.5909 128.951 55.9375C129.085 56.2841 129.278 56.5554 129.531 56.7514C129.784 56.9446 130.093 57.0412 130.46 57.0412C130.84 57.0412 131.159 56.9403 131.414 56.7386C131.67 56.5341 131.863 56.2571 131.994 55.9077C132.127 55.5582 132.194 55.1648 132.194 54.7273C132.194 54.2955 132.129 53.9077 131.998 53.5639C131.87 53.2202 131.677 52.9489 131.418 52.75C131.163 52.5511 130.843 52.4517 130.46 52.4517C130.09 52.4517 129.778 52.5469 129.522 52.7372C129.269 52.9276 129.078 53.1932 128.947 53.5341C128.816 53.875 128.751 54.2727 128.751 54.7273ZM137.733 58.1321C137.088 58.1321 136.532 57.9943 136.067 57.7188C135.603 57.4403 135.246 57.0497 134.993 56.5469C134.743 56.0412 134.618 55.4489 134.618 54.7699C134.618 54.0994 134.743 53.5085 134.993 52.9972C135.246 52.4858 135.598 52.0866 136.049 51.7997C136.504 51.5128 137.035 51.3693 137.643 51.3693C138.013 51.3693 138.371 51.4304 138.717 51.5526C139.064 51.6747 139.375 51.8665 139.65 52.1278C139.926 52.3892 140.143 52.7287 140.302 53.1463C140.461 53.5611 140.541 54.0653 140.541 54.6591V55.1108H135.338V54.1562H139.292C139.292 53.821 139.224 53.5241 139.088 53.2656C138.951 53.0043 138.76 52.7983 138.513 52.6477C138.268 52.4972 137.981 52.4219 137.652 52.4219C137.294 52.4219 136.981 52.5099 136.714 52.6861C136.45 52.8594 136.246 53.0866 136.101 53.3679C135.959 53.6463 135.888 53.9489 135.888 54.2756V55.0213C135.888 55.4588 135.964 55.831 136.118 56.1378C136.274 56.4446 136.491 56.679 136.77 56.8409C137.048 57 137.373 57.0795 137.746 57.0795C137.987 57.0795 138.207 57.0455 138.406 56.9773C138.605 56.9062 138.777 56.8011 138.922 56.6619C139.067 56.5227 139.177 56.3509 139.254 56.1463L140.46 56.3636C140.363 56.7187 140.19 57.0298 139.94 57.2969C139.693 57.5611 139.382 57.767 139.007 57.9148C138.635 58.0597 138.21 58.1321 137.733 58.1321ZM146.549 58L144.623 51.4545H145.94L147.223 56.2614H147.287L148.574 51.4545H149.89L151.169 56.2401H151.233L152.507 51.4545H153.824L151.902 58H150.602L149.273 53.2741H149.174L147.845 58H146.549ZM156.307 54.1136V58H155.033V49.2727H156.29V52.5199H156.371C156.524 52.1676 156.759 51.8878 157.074 51.6804C157.389 51.473 157.801 51.3693 158.31 51.3693C158.759 51.3693 159.151 51.4616 159.486 51.6463C159.824 51.831 160.085 52.1065 160.27 52.473C160.458 52.8366 160.551 53.2912 160.551 53.8366V58H159.277V53.9901C159.277 53.5099 159.154 53.1378 158.906 52.8736C158.659 52.6065 158.315 52.473 157.875 52.473C157.574 52.473 157.304 52.5369 157.065 52.6648C156.83 52.7926 156.644 52.9801 156.507 53.2273C156.374 53.4716 156.307 53.767 156.307 54.1136ZM165.073 58.1321C164.428 58.1321 163.872 57.9943 163.406 57.7188C162.943 57.4403 162.585 57.0497 162.333 56.5469C162.083 56.0412 161.958 55.4489 161.958 54.7699C161.958 54.0994 162.083 53.5085 162.333 52.9972C162.585 52.4858 162.938 52.0866 163.389 51.7997C163.844 51.5128 164.375 51.3693 164.983 51.3693C165.352 51.3693 165.71 51.4304 166.057 51.5526C166.404 51.6747 166.715 51.8665 166.99 52.1278C167.266 52.3892 167.483 52.7287 167.642 53.1463C167.801 53.5611 167.881 54.0653 167.881 54.6591V55.1108H162.678V54.1562H166.632C166.632 53.821 166.564 53.5241 166.428 53.2656C166.291 53.0043 166.1 52.7983 165.852 52.6477C165.608 52.4972 165.321 52.4219 164.992 52.4219C164.634 52.4219 164.321 52.5099 164.054 52.6861C163.79 52.8594 163.585 53.0866 163.44 53.3679C163.298 53.6463 163.227 53.9489 163.227 54.2756V55.0213C163.227 55.4588 163.304 55.831 163.458 56.1378C163.614 56.4446 163.831 56.679 164.11 56.8409C164.388 57 164.713 57.0795 165.085 57.0795C165.327 57.0795 165.547 57.0455 165.746 56.9773C165.945 56.9062 166.117 56.8011 166.261 56.6619C166.406 56.5227 166.517 56.3509 166.594 56.1463L167.8 56.3636C167.703 56.7187 167.53 57.0298 167.28 57.2969C167.033 57.5611 166.722 57.767 166.347 57.9148C165.975 58.0597 165.55 58.1321 165.073 58.1321ZM169.295 58V51.4545H170.526V52.4943H170.594C170.714 52.142 170.924 51.8651 171.225 51.6634C171.529 51.4588 171.873 51.3565 172.256 51.3565C172.336 51.3565 172.429 51.3594 172.537 51.3651C172.648 51.3707 172.735 51.3778 172.797 51.3864V52.6051C172.746 52.5909 172.655 52.5753 172.525 52.5582C172.394 52.5384 172.263 52.5284 172.133 52.5284C171.831 52.5284 171.563 52.5923 171.327 52.7202C171.094 52.8452 170.91 53.0199 170.773 53.2443C170.637 53.4659 170.569 53.7187 170.569 54.0028V58H169.295ZM176.487 58.1321C175.842 58.1321 175.286 57.9943 174.82 57.7188C174.357 57.4403 173.999 57.0497 173.747 56.5469C173.497 56.0412 173.372 55.4489 173.372 54.7699C173.372 54.0994 173.497 53.5085 173.747 52.9972C173.999 52.4858 174.352 52.0866 174.803 51.7997C175.258 51.5128 175.789 51.3693 176.397 51.3693C176.766 51.3693 177.124 51.4304 177.471 51.5526C177.818 51.6747 178.129 51.8665 178.404 52.1278C178.68 52.3892 178.897 52.7287 179.056 53.1463C179.215 53.5611 179.295 54.0653 179.295 54.6591V55.1108H174.092V54.1562H178.046C178.046 53.821 177.978 53.5241 177.842 53.2656C177.705 53.0043 177.514 52.7983 177.266 52.6477C177.022 52.4972 176.735 52.4219 176.406 52.4219C176.048 52.4219 175.735 52.5099 175.468 52.6861C175.204 52.8594 174.999 53.0866 174.855 53.3679C174.712 53.6463 174.641 53.9489 174.641 54.2756V55.0213C174.641 55.4588 174.718 55.831 174.872 56.1378C175.028 56.4446 175.245 56.679 175.524 56.8409C175.802 57 176.127 57.0795 176.499 57.0795C176.741 57.0795 176.961 57.0455 177.16 56.9773C177.359 56.9062 177.531 56.8011 177.676 56.6619C177.82 56.5227 177.931 56.3509 178.008 56.1463L179.214 56.3636C179.117 56.7187 178.944 57.0298 178.694 57.2969C178.447 57.5611 178.136 57.767 177.761 57.9148C177.389 58.0597 176.964 58.1321 176.487 58.1321ZM186.94 51.4545V52.4773H183.364V51.4545H186.94ZM184.323 49.8864H185.597V56.0781C185.597 56.3253 185.634 56.5114 185.708 56.6364C185.782 56.7585 185.877 56.8423 185.994 56.8878C186.113 56.9304 186.242 56.9517 186.382 56.9517C186.484 56.9517 186.573 56.9446 186.65 56.9304C186.727 56.9162 186.786 56.9048 186.829 56.8963L187.059 57.9489C186.985 57.9773 186.88 58.0057 186.744 58.0341C186.607 58.0653 186.437 58.0824 186.232 58.0852C185.897 58.0909 185.585 58.0312 185.295 57.9062C185.005 57.7812 184.771 57.5881 184.592 57.3267C184.413 57.0653 184.323 56.7372 184.323 56.3423V49.8864ZM189.764 54.1136V58H188.49V49.2727H189.747V52.5199H189.828C189.981 52.1676 190.216 51.8878 190.531 51.6804C190.846 51.473 191.258 51.3693 191.767 51.3693C192.216 51.3693 192.608 51.4616 192.943 51.6463C193.281 51.831 193.542 52.1065 193.727 52.473C193.915 52.8366 194.008 53.2912 194.008 53.8366V58H192.734V53.9901C192.734 53.5099 192.611 53.1378 192.363 52.8736C192.116 52.6065 191.773 52.473 191.332 52.473C191.031 52.473 190.761 52.5369 190.523 52.6648C190.287 52.7926 190.101 52.9801 189.964 53.2273C189.831 53.4716 189.764 53.767 189.764 54.1136ZM198.53 58.1321C197.885 58.1321 197.329 57.9943 196.863 57.7188C196.4 57.4403 196.042 57.0497 195.79 56.5469C195.54 56.0412 195.415 55.4489 195.415 54.7699C195.415 54.0994 195.54 53.5085 195.79 52.9972C196.042 52.4858 196.395 52.0866 196.846 51.7997C197.301 51.5128 197.832 51.3693 198.44 51.3693C198.809 51.3693 199.167 51.4304 199.514 51.5526C199.861 51.6747 200.172 51.8665 200.447 52.1278C200.723 52.3892 200.94 52.7287 201.099 53.1463C201.258 53.5611 201.338 54.0653 201.338 54.6591V55.1108H196.135V54.1562H200.089C200.089 53.821 200.021 53.5241 199.885 53.2656C199.748 53.0043 199.557 52.7983 199.309 52.6477C199.065 52.4972 198.778 52.4219 198.449 52.4219C198.091 52.4219 197.778 52.5099 197.511 52.6861C197.247 52.8594 197.042 53.0866 196.898 53.3679C196.755 53.6463 196.684 53.9489 196.684 54.2756V55.0213C196.684 55.4588 196.761 55.831 196.915 56.1378C197.071 56.4446 197.288 56.679 197.567 56.8409C197.845 57 198.17 57.0795 198.542 57.0795C198.784 57.0795 199.004 57.0455 199.203 56.9773C199.402 56.9062 199.574 56.8011 199.719 56.6619C199.863 56.5227 199.974 56.3509 200.051 56.1463L201.257 56.3636C201.16 56.7187 200.987 57.0298 200.737 57.2969C200.49 57.5611 200.179 57.767 199.804 57.9148C199.432 58.0597 199.007 58.1321 198.53 58.1321ZM205.927 58V51.4545H207.15V52.5199H207.231C207.368 52.1591 207.591 51.8778 207.9 51.6761C208.21 51.4716 208.581 51.3693 209.013 51.3693C209.45 51.3693 209.817 51.4716 210.112 51.6761C210.41 51.8807 210.63 52.1619 210.773 52.5199H210.841C210.997 52.1705 211.246 51.892 211.586 51.6847C211.927 51.4744 212.334 51.3693 212.805 51.3693C213.399 51.3693 213.883 51.5554 214.258 51.9276C214.636 52.2997 214.825 52.8608 214.825 53.6108V58H213.551V53.7301C213.551 53.2869 213.43 52.9659 213.189 52.767C212.947 52.5682 212.659 52.4688 212.324 52.4688C211.909 52.4688 211.586 52.5966 211.356 52.8523C211.126 53.1051 211.011 53.4304 211.011 53.8281V58H209.741V53.6491C209.741 53.294 209.63 53.0085 209.409 52.7926C209.187 52.5767 208.899 52.4688 208.544 52.4688C208.302 52.4688 208.079 52.5327 207.875 52.6605C207.673 52.7855 207.51 52.9602 207.385 53.1847C207.263 53.4091 207.201 53.669 207.201 53.9645V58H205.927ZM218.438 58.1449C218.023 58.1449 217.648 58.0682 217.313 57.9148C216.977 57.7585 216.712 57.5327 216.516 57.2372C216.323 56.9418 216.226 56.5795 216.226 56.1506C216.226 55.7812 216.297 55.4773 216.439 55.2386C216.581 55 216.773 54.8111 217.014 54.6719C217.256 54.5327 217.526 54.4276 217.824 54.3565C218.122 54.2855 218.426 54.2315 218.736 54.1946C219.128 54.1491 219.446 54.1122 219.69 54.0838C219.935 54.0526 220.112 54.0028 220.223 53.9347C220.334 53.8665 220.389 53.7557 220.389 53.6023V53.5724C220.389 53.2003 220.284 52.9119 220.074 52.7074C219.867 52.5028 219.557 52.4006 219.145 52.4006C218.716 52.4006 218.378 52.4957 218.131 52.6861C217.886 52.8736 217.717 53.0824 217.624 53.3125L216.426 53.0398C216.568 52.642 216.776 52.321 217.048 52.0767C217.324 51.8295 217.641 51.6506 217.999 51.5398C218.357 51.4261 218.733 51.3693 219.128 51.3693C219.389 51.3693 219.666 51.4006 219.959 51.4631C220.254 51.5227 220.53 51.6335 220.786 51.7955C221.044 51.9574 221.256 52.1889 221.421 52.4901C221.585 52.7884 221.668 53.1761 221.668 53.6534V58H220.423V57.1051H220.372C220.29 57.2699 220.166 57.4318 220.002 57.5909C219.837 57.75 219.625 57.8821 219.367 57.9872C219.108 58.0923 218.798 58.1449 218.438 58.1449ZM218.715 57.1222C219.067 57.1222 219.368 57.0526 219.618 56.9134C219.871 56.7741 220.063 56.5923 220.193 56.3679C220.327 56.1406 220.394 55.8977 220.394 55.6392V54.7955C220.348 54.8409 220.26 54.8835 220.129 54.9233C220.002 54.9602 219.855 54.9929 219.69 55.0213C219.526 55.0469 219.365 55.071 219.209 55.0938C219.053 55.1136 218.922 55.1307 218.817 55.1449C218.57 55.1761 218.344 55.2287 218.139 55.3026C217.938 55.3764 217.776 55.483 217.654 55.6222C217.534 55.7585 217.475 55.9403 217.475 56.1676C217.475 56.483 217.591 56.7216 217.824 56.8835C218.057 57.0426 218.354 57.1222 218.715 57.1222ZM223.365 58V51.4545H224.639V58H223.365ZM224.008 50.4446C223.787 50.4446 223.596 50.3707 223.437 50.223C223.281 50.0724 223.203 49.8935 223.203 49.6861C223.203 49.4759 223.281 49.2969 223.437 49.1491C223.596 48.9986 223.787 48.9233 224.008 48.9233C224.23 48.9233 224.419 48.9986 224.575 49.1491C224.734 49.2969 224.814 49.4759 224.814 49.6861C224.814 49.8935 224.734 50.0724 224.575 50.223C224.419 50.3707 224.23 50.4446 224.008 50.4446ZM227.627 54.1136V58H226.353V51.4545H227.576V52.5199H227.657C227.808 52.1733 228.043 51.8949 228.364 51.6847C228.688 51.4744 229.096 51.3693 229.587 51.3693C230.034 51.3693 230.424 51.4631 230.759 51.6506C231.095 51.8352 231.355 52.1108 231.539 52.4773C231.724 52.8437 231.816 53.2969 231.816 53.8366V58H230.542V53.9901C230.542 53.5156 230.418 53.1449 230.171 52.8778C229.924 52.608 229.585 52.473 229.153 52.473C228.857 52.473 228.595 52.5369 228.364 52.6648C228.137 52.7926 227.957 52.9801 227.823 53.2273C227.693 53.4716 227.627 53.767 227.627 54.1136ZM75.6468 78.1321C75.0019 78.1321 74.4465 77.9943 73.9806 77.7188C73.5175 77.4403 73.1596 77.0497 72.9067 76.5469C72.6567 76.0412 72.5317 75.4489 72.5317 74.7699C72.5317 74.0994 72.6567 73.5085 72.9067 72.9972C73.1596 72.4858 73.5119 72.0866 73.9636 71.7997C74.4181 71.5128 74.9494 71.3693 75.5573 71.3693C75.9266 71.3693 76.2846 71.4304 76.6312 71.5526C76.9778 71.6747 77.2888 71.8665 77.5644 72.1278C77.84 72.3892 78.0573 72.7287 78.2164 73.1463C78.3755 73.5611 78.455 74.0653 78.455 74.6591V75.1108H73.2519V74.1562H77.2065C77.2065 73.821 77.1383 73.5241 77.0019 73.2656C76.8655 73.0043 76.6738 72.7983 76.4266 72.6477C76.1823 72.4972 75.8954 72.4219 75.5658 72.4219C75.2079 72.4219 74.8954 72.5099 74.6283 72.6861C74.3641 72.8594 74.1596 73.0866 74.0147 73.3679C73.8726 73.6463 73.8016 73.9489 73.8016 74.2756V75.0213C73.8016 75.4588 73.8783 75.831 74.0317 76.1378C74.188 76.4446 74.4053 76.679 74.6837 76.8409C74.9621 77 75.2874 77.0795 75.6596 77.0795C75.9011 77.0795 76.1212 77.0455 76.3201 76.9773C76.519 76.9062 76.6908 76.8011 76.8357 76.6619C76.9806 76.5227 77.0914 76.3509 77.1681 76.1463L78.3741 76.3636C78.2775 76.7187 78.1042 77.0298 77.8542 77.2969C77.607 77.5611 77.2959 77.767 76.9209 77.9148C76.5488 78.0597 76.1241 78.1321 75.6468 78.1321ZM81.1429 74.1136V78H79.8687V71.4545H81.0918V72.5199H81.1727C81.3233 72.1733 81.5591 71.8949 81.8801 71.6847C82.204 71.4744 82.6116 71.3693 83.1031 71.3693C83.5491 71.3693 83.9398 71.4631 84.275 71.6506C84.6102 71.8352 84.8702 72.1108 85.0548 72.4773C85.2395 72.8437 85.3318 73.2969 85.3318 73.8366V78H84.0577V73.9901C84.0577 73.5156 83.9341 73.1449 83.6869 72.8778C83.4398 72.608 83.1003 72.473 82.6685 72.473C82.373 72.473 82.1102 72.5369 81.8801 72.6648C81.6528 72.7926 81.4724 72.9801 81.3389 73.2273C81.2082 73.4716 81.1429 73.767 81.1429 74.1136ZM90.096 71.4545V72.4773H86.5207V71.4545H90.096ZM87.4795 69.8864H88.7537V76.0781C88.7537 76.3253 88.7906 76.5114 88.8645 76.6364C88.9383 76.7585 89.0335 76.8423 89.15 76.8878C89.2693 76.9304 89.3986 76.9517 89.5378 76.9517C89.64 76.9517 89.7295 76.9446 89.8062 76.9304C89.8829 76.9162 89.9426 76.9048 89.9852 76.8963L90.2153 77.9489C90.1415 77.9773 90.0364 78.0057 89.9 78.0341C89.7636 78.0653 89.5932 78.0824 89.3886 78.0852C89.0534 78.0909 88.7409 78.0312 88.4511 77.9062C88.1614 77.7812 87.927 77.5881 87.748 77.3267C87.569 77.0653 87.4795 76.7372 87.4795 76.3423V69.8864ZM91.5055 78V71.4545H92.737V72.4943H92.8052C92.9245 72.142 93.1347 71.8651 93.4359 71.6634C93.7398 71.4588 94.0836 71.3565 94.4671 71.3565C94.5467 71.3565 94.6404 71.3594 94.7484 71.3651C94.8592 71.3707 94.9458 71.3778 95.0083 71.3864V72.6051C94.9572 72.5909 94.8663 72.5753 94.7356 72.5582C94.6049 72.5384 94.4742 72.5284 94.3435 72.5284C94.0424 72.5284 93.7739 72.5923 93.5381 72.7202C93.3052 72.8452 93.1205 73.0199 92.9842 73.2443C92.8478 73.4659 92.7796 73.7187 92.7796 74.0028V78H91.5055ZM97.9572 78.1449C97.5424 78.1449 97.1674 78.0682 96.8322 77.9148C96.4969 77.7585 96.2313 77.5327 96.0353 77.2372C95.8421 76.9418 95.7455 76.5795 95.7455 76.1506C95.7455 75.7812 95.8165 75.4773 95.9586 75.2386C96.1006 75 96.2924 74.8111 96.5339 74.6719C96.7753 74.5327 97.0452 74.4276 97.3435 74.3565C97.6418 74.2855 97.9458 74.2315 98.2555 74.1946C98.6475 74.1491 98.9657 74.1122 99.21 74.0838C99.4543 74.0526 99.6319 74.0028 99.7427 73.9347C99.8535 73.8665 99.9089 73.7557 99.9089 73.6023V73.5724C99.9089 73.2003 99.8038 72.9119 99.5935 72.7074C99.3861 72.5028 99.0765 72.4006 98.6646 72.4006C98.2356 72.4006 97.8975 72.4957 97.6503 72.6861C97.406 72.8736 97.237 73.0824 97.1432 73.3125L95.9458 73.0398C96.0878 72.642 96.2952 72.321 96.568 72.0767C96.8435 71.8295 97.1603 71.6506 97.5182 71.5398C97.8762 71.4261 98.2526 71.3693 98.6475 71.3693C98.9089 71.3693 99.1859 71.4006 99.4785 71.4631C99.7739 71.5227 100.049 71.6335 100.305 71.7955C100.564 71.9574 100.775 72.1889 100.94 72.4901C101.105 72.7884 101.187 73.1761 101.187 73.6534V78H99.943V77.1051H99.8918C99.8094 77.2699 99.6859 77.4318 99.5211 77.5909C99.3563 77.75 99.1447 77.8821 98.8861 77.9872C98.6276 78.0923 98.318 78.1449 97.9572 78.1449ZM98.2342 77.1222C98.5864 77.1222 98.8876 77.0526 99.1376 76.9134C99.3904 76.7741 99.5822 76.5923 99.7128 76.3679C99.8464 76.1406 99.9131 75.8977 99.9131 75.6392V74.7955C99.8677 74.8409 99.7796 74.8835 99.6489 74.9233C99.5211 74.9602 99.3748 74.9929 99.21 75.0213C99.0452 75.0469 98.8847 75.071 98.7285 75.0938C98.5722 75.1136 98.4415 75.1307 98.3364 75.1449C98.0893 75.1761 97.8634 75.2287 97.6589 75.3026C97.4572 75.3764 97.2952 75.483 97.1731 75.6222C97.0538 75.7585 96.9941 75.9403 96.9941 76.1676C96.9941 76.483 97.1106 76.7216 97.3435 76.8835C97.5765 77.0426 97.8734 77.1222 98.2342 77.1222ZM104.159 74.1136V78H102.884V71.4545H104.107V72.5199H104.188C104.339 72.1733 104.575 71.8949 104.896 71.6847C105.22 71.4744 105.627 71.3693 106.119 71.3693C106.565 71.3693 106.955 71.4631 107.291 71.6506C107.626 71.8352 107.886 72.1108 108.07 72.4773C108.255 72.8437 108.347 73.2969 108.347 73.8366V78H107.073V73.9901C107.073 73.5156 106.95 73.1449 106.703 72.8778C106.455 72.608 106.116 72.473 105.684 72.473C105.389 72.473 105.126 72.5369 104.896 72.6648C104.668 72.7926 104.488 72.9801 104.355 73.2273C104.224 73.4716 104.159 73.767 104.159 74.1136ZM112.813 78.1321C112.18 78.1321 111.634 77.9886 111.177 77.7017C110.722 77.4119 110.373 77.0128 110.129 76.5043C109.884 75.9957 109.762 75.4134 109.762 74.7571C109.762 74.0923 109.887 73.5057 110.137 72.9972C110.387 72.4858 110.739 72.0866 111.194 71.7997C111.649 71.5128 112.184 71.3693 112.801 71.3693C113.298 71.3693 113.741 71.4616 114.13 71.6463C114.519 71.8281 114.833 72.0838 115.072 72.4134C115.313 72.7429 115.457 73.1278 115.502 73.5682H114.262C114.194 73.2614 114.038 72.9972 113.793 72.7756C113.552 72.554 113.228 72.4432 112.822 72.4432C112.467 72.4432 112.156 72.5369 111.889 72.7244C111.624 72.9091 111.418 73.1733 111.271 73.517C111.123 73.858 111.049 74.2614 111.049 74.7273C111.049 75.2045 111.122 75.6165 111.266 75.9631C111.411 76.3097 111.616 76.5781 111.88 76.7685C112.147 76.9588 112.461 77.054 112.822 77.054C113.063 77.054 113.282 77.0099 113.478 76.9219C113.677 76.831 113.843 76.7017 113.977 76.5341C114.113 76.3665 114.208 76.1648 114.262 75.929H115.502C115.457 76.3523 115.319 76.7301 115.089 77.0625C114.859 77.3949 114.551 77.6562 114.164 77.8466C113.781 78.0369 113.33 78.1321 112.813 78.1321ZM119.686 78.1321C119.041 78.1321 118.486 77.9943 118.02 77.7188C117.557 77.4403 117.199 77.0497 116.946 76.5469C116.696 76.0412 116.571 75.4489 116.571 74.7699C116.571 74.0994 116.696 73.5085 116.946 72.9972C117.199 72.4858 117.551 72.0866 118.003 71.7997C118.457 71.5128 118.988 71.3693 119.596 71.3693C119.966 71.3693 120.324 71.4304 120.67 71.5526C121.017 71.6747 121.328 71.8665 121.603 72.1278C121.879 72.3892 122.096 72.7287 122.255 73.1463C122.415 73.5611 122.494 74.0653 122.494 74.6591V75.1108H117.291V74.1562H121.246C121.246 73.821 121.177 73.5241 121.041 73.2656C120.905 73.0043 120.713 72.7983 120.466 72.6477C120.221 72.4972 119.934 72.4219 119.605 72.4219C119.247 72.4219 118.934 72.5099 118.667 72.6861C118.403 72.8594 118.199 73.0866 118.054 73.3679C117.912 73.6463 117.841 73.9489 117.841 74.2756V75.0213C117.841 75.4588 117.917 75.831 118.071 76.1378C118.227 76.4446 118.444 76.679 118.723 76.8409C119.001 77 119.326 77.0795 119.699 77.0795C119.94 77.0795 120.16 77.0455 120.359 76.9773C120.558 76.9062 120.73 76.8011 120.875 76.6619C121.02 76.5227 121.13 76.3509 121.207 76.1463L122.413 76.3636C122.317 76.7187 122.143 77.0298 121.893 77.2969C121.646 77.5611 121.335 77.767 120.96 77.9148C120.588 78.0597 120.163 78.1321 119.686 78.1321ZM127.084 78V71.4545H128.358V78H127.084ZM127.727 70.4446C127.505 70.4446 127.315 70.3707 127.156 70.223C127 70.0724 126.922 69.8935 126.922 69.6861C126.922 69.4759 127 69.2969 127.156 69.1491C127.315 68.9986 127.505 68.9233 127.727 68.9233C127.949 68.9233 128.138 68.9986 128.294 69.1491C128.453 69.2969 128.532 69.4759 128.532 69.6861C128.532 69.8935 128.453 70.0724 128.294 70.223C128.138 70.3707 127.949 70.4446 127.727 70.4446ZM134.977 73.0526L133.822 73.2571C133.774 73.1094 133.697 72.9687 133.592 72.8352C133.489 72.7017 133.35 72.5923 133.174 72.5071C132.998 72.4219 132.778 72.3793 132.514 72.3793C132.153 72.3793 131.852 72.4602 131.61 72.6222C131.369 72.7812 131.248 72.9872 131.248 73.2401C131.248 73.4588 131.329 73.6349 131.491 73.7685C131.653 73.902 131.914 74.0114 132.275 74.0966L133.315 74.3352C133.917 74.4744 134.366 74.6889 134.661 74.9787C134.957 75.2685 135.105 75.6449 135.105 76.108C135.105 76.5 134.991 76.8494 134.764 77.1562C134.539 77.4602 134.225 77.6989 133.822 77.8722C133.421 78.0455 132.957 78.1321 132.428 78.1321C131.695 78.1321 131.097 77.9759 130.634 77.6634C130.171 77.348 129.887 76.9006 129.782 76.321L131.014 76.1335C131.09 76.4545 131.248 76.6974 131.487 76.8622C131.725 77.0241 132.036 77.1051 132.42 77.1051C132.837 77.1051 133.171 77.0185 133.421 76.8452C133.671 76.669 133.796 76.4545 133.796 76.2017C133.796 75.9972 133.72 75.8253 133.566 75.6861C133.416 75.5469 133.184 75.4418 132.872 75.3707L131.764 75.1278C131.153 74.9886 130.701 74.767 130.409 74.4631C130.119 74.1591 129.974 73.7741 129.974 73.3082C129.974 72.9219 130.082 72.5838 130.298 72.294C130.514 72.0043 130.812 71.7784 131.193 71.6165C131.573 71.4517 132.009 71.3693 132.501 71.3693C133.208 71.3693 133.765 71.5227 134.171 71.8295C134.578 72.1335 134.846 72.5412 134.977 73.0526ZM140.955 69.2727V78H139.681V69.2727H140.955ZM145.427 78.1321C144.813 78.1321 144.277 77.9915 143.82 77.7102C143.363 77.429 143.008 77.0355 142.755 76.5298C142.502 76.0241 142.375 75.4332 142.375 74.7571C142.375 74.0781 142.502 73.4844 142.755 72.9759C143.008 72.4673 143.363 72.0724 143.82 71.7912C144.277 71.5099 144.813 71.3693 145.427 71.3693C146.04 71.3693 146.576 71.5099 147.033 71.7912C147.491 72.0724 147.846 72.4673 148.098 72.9759C148.351 73.4844 148.478 74.0781 148.478 74.7571C148.478 75.4332 148.351 76.0241 148.098 76.5298C147.846 77.0355 147.491 77.429 147.033 77.7102C146.576 77.9915 146.04 78.1321 145.427 78.1321ZM145.431 77.0625C145.829 77.0625 146.158 76.9574 146.42 76.7472C146.681 76.5369 146.874 76.2571 146.999 75.9077C147.127 75.5582 147.191 75.1733 147.191 74.7528C147.191 74.3352 147.127 73.9517 146.999 73.6023C146.874 73.25 146.681 72.9673 146.42 72.7543C146.158 72.5412 145.829 72.4347 145.431 72.4347C145.03 72.4347 144.698 72.5412 144.434 72.7543C144.172 72.9673 143.978 73.25 143.85 73.6023C143.725 73.9517 143.662 74.3352 143.662 74.7528C143.662 75.1733 143.725 75.5582 143.85 75.9077C143.978 76.2571 144.172 76.5369 144.434 76.7472C144.698 76.9574 145.03 77.0625 145.431 77.0625ZM152.657 78.1321C152.024 78.1321 151.478 77.9886 151.021 77.7017C150.566 77.4119 150.217 77.0128 149.972 76.5043C149.728 75.9957 149.606 75.4134 149.606 74.7571C149.606 74.0923 149.731 73.5057 149.981 72.9972C150.231 72.4858 150.583 72.0866 151.038 71.7997C151.492 71.5128 152.028 71.3693 152.644 71.3693C153.141 71.3693 153.585 71.4616 153.974 71.6463C154.363 71.8281 154.677 72.0838 154.916 72.4134C155.157 72.7429 155.301 73.1278 155.346 73.5682H154.106C154.038 73.2614 153.882 72.9972 153.637 72.7756C153.396 72.554 153.072 72.4432 152.666 72.4432C152.311 72.4432 151.999 72.5369 151.732 72.7244C151.468 72.9091 151.262 73.1733 151.114 73.517C150.967 73.858 150.893 74.2614 150.893 74.7273C150.893 75.2045 150.965 75.6165 151.11 75.9631C151.255 76.3097 151.46 76.5781 151.724 76.7685C151.991 76.9588 152.305 77.054 152.666 77.054C152.907 77.054 153.126 77.0099 153.322 76.9219C153.521 76.831 153.687 76.7017 153.82 76.5341C153.957 76.3665 154.052 76.1648 154.106 75.929H155.346C155.301 76.3523 155.163 76.7301 154.933 77.0625C154.703 77.3949 154.394 77.6562 154.008 77.8466C153.624 78.0369 153.174 78.1321 152.657 78.1321ZM158.613 78.1449C158.199 78.1449 157.824 78.0682 157.488 77.9148C157.153 77.7585 156.888 77.5327 156.692 77.2372C156.498 76.9418 156.402 76.5795 156.402 76.1506C156.402 75.7812 156.473 75.4773 156.615 75.2386C156.757 75 156.949 74.8111 157.19 74.6719C157.432 74.5327 157.701 74.4276 158 74.3565C158.298 74.2855 158.602 74.2315 158.912 74.1946C159.304 74.1491 159.622 74.1122 159.866 74.0838C160.111 74.0526 160.288 74.0028 160.399 73.9347C160.51 73.8665 160.565 73.7557 160.565 73.6023V73.5724C160.565 73.2003 160.46 72.9119 160.25 72.7074C160.042 72.5028 159.733 72.4006 159.321 72.4006C158.892 72.4006 158.554 72.4957 158.307 72.6861C158.062 72.8736 157.893 73.0824 157.799 73.3125L156.602 73.0398C156.744 72.642 156.951 72.321 157.224 72.0767C157.5 71.8295 157.817 71.6506 158.174 71.5398C158.532 71.4261 158.909 71.3693 159.304 71.3693C159.565 71.3693 159.842 71.4006 160.135 71.4631C160.43 71.5227 160.706 71.6335 160.961 71.7955C161.22 71.9574 161.432 72.1889 161.596 72.4901C161.761 72.7884 161.844 73.1761 161.844 73.6534V78H160.599V77.1051H160.548C160.466 77.2699 160.342 77.4318 160.177 77.5909C160.013 77.75 159.801 77.8821 159.542 77.9872C159.284 78.0923 158.974 78.1449 158.613 78.1449ZM158.89 77.1222C159.243 77.1222 159.544 77.0526 159.794 76.9134C160.047 76.7741 160.238 76.5923 160.369 76.3679C160.503 76.1406 160.569 75.8977 160.569 75.6392V74.7955C160.524 74.8409 160.436 74.8835 160.305 74.9233C160.177 74.9602 160.031 74.9929 159.866 75.0213C159.701 75.0469 159.541 75.071 159.385 75.0938C159.228 75.1136 159.098 75.1307 158.993 75.1449C158.746 75.1761 158.52 75.2287 158.315 75.3026C158.113 75.3764 157.951 75.483 157.829 75.6222C157.71 75.7585 157.65 75.9403 157.65 76.1676C157.65 76.483 157.767 76.7216 158 76.8835C158.233 77.0426 158.53 77.1222 158.89 77.1222ZM166.596 71.4545V72.4773H163.021V71.4545H166.596ZM163.98 69.8864H165.254V76.0781C165.254 76.3253 165.291 76.5114 165.364 76.6364C165.438 76.7585 165.534 76.8423 165.65 76.8878C165.769 76.9304 165.899 76.9517 166.038 76.9517C166.14 76.9517 166.23 76.9446 166.306 76.9304C166.383 76.9162 166.443 76.9048 166.485 76.8963L166.715 77.9489C166.641 77.9773 166.536 78.0057 166.4 78.0341C166.264 78.0653 166.093 78.0824 165.889 78.0852C165.553 78.0909 165.241 78.0312 164.951 77.9062C164.661 77.7812 164.427 77.5881 164.248 77.3267C164.069 77.0653 163.98 76.7372 163.98 76.3423V69.8864ZM170.756 78.1321C170.111 78.1321 169.556 77.9943 169.09 77.7188C168.627 77.4403 168.269 77.0497 168.016 76.5469C167.766 76.0412 167.641 75.4489 167.641 74.7699C167.641 74.0994 167.766 73.5085 168.016 72.9972C168.269 72.4858 168.621 72.0866 169.073 71.7997C169.527 71.5128 170.059 71.3693 170.667 71.3693C171.036 71.3693 171.394 71.4304 171.741 71.5526C172.087 71.6747 172.398 71.8665 172.674 72.1278C172.949 72.3892 173.167 72.7287 173.326 73.1463C173.485 73.5611 173.564 74.0653 173.564 74.6591V75.1108H168.361V74.1562H172.316C172.316 73.821 172.248 73.5241 172.111 73.2656C171.975 73.0043 171.783 72.7983 171.536 72.6477C171.292 72.4972 171.005 72.4219 170.675 72.4219C170.317 72.4219 170.005 72.5099 169.738 72.6861C169.473 72.8594 169.269 73.0866 169.124 73.3679C168.982 73.6463 168.911 73.9489 168.911 74.2756V75.0213C168.911 75.4588 168.988 75.831 169.141 76.1378C169.297 76.4446 169.515 76.679 169.793 76.8409C170.072 77 170.397 77.0795 170.769 77.0795C171.01 77.0795 171.231 77.0455 171.429 76.9773C171.628 76.9062 171.8 76.8011 171.945 76.6619C172.09 76.5227 172.201 76.3509 172.277 76.1463L173.483 76.3636C173.387 76.7187 173.214 77.0298 172.964 77.2969C172.716 77.5611 172.405 77.767 172.03 77.9148C171.658 78.0597 171.233 78.1321 170.756 78.1321ZM177.428 78.1278C176.9 78.1278 176.428 77.9929 176.014 77.723C175.602 77.4503 175.278 77.0625 175.042 76.5597C174.809 76.054 174.693 75.4474 174.693 74.7401C174.693 74.0327 174.811 73.4276 175.046 72.9247C175.285 72.4219 175.612 72.0369 176.026 71.7699C176.441 71.5028 176.911 71.3693 177.437 71.3693C177.843 71.3693 178.17 71.4375 178.417 71.5739C178.667 71.7074 178.86 71.8636 178.997 72.0426C179.136 72.2216 179.244 72.3793 179.32 72.5156H179.397V69.2727H180.671V78H179.427V76.9815H179.32C179.244 77.1207 179.133 77.2798 178.988 77.4588C178.846 77.6378 178.65 77.794 178.4 77.9276C178.15 78.0611 177.826 78.1278 177.428 78.1278ZM177.71 77.0412C178.076 77.0412 178.386 76.9446 178.639 76.7514C178.894 76.5554 179.087 76.2841 179.218 75.9375C179.352 75.5909 179.418 75.1875 179.418 74.7273C179.418 74.2727 179.353 73.875 179.222 73.5341C179.092 73.1932 178.9 72.9276 178.647 72.7372C178.394 72.5469 178.082 72.4517 177.71 72.4517C177.326 72.4517 177.007 72.5511 176.751 72.75C176.495 72.9489 176.302 73.2202 176.171 73.5639C176.043 73.9077 175.98 74.2955 175.98 74.7273C175.98 75.1648 176.045 75.5582 176.176 75.9077C176.306 76.2571 176.499 76.5341 176.755 76.7386C177.014 76.9403 177.332 77.0412 177.71 77.0412ZM183.329 78.081C183.096 78.081 182.896 77.9986 182.728 77.8338C182.561 77.6662 182.477 77.4645 182.477 77.2287C182.477 76.9957 182.561 76.7969 182.728 76.6321C182.896 76.4645 183.096 76.3807 183.329 76.3807C183.562 76.3807 183.763 76.4645 183.93 76.6321C184.098 76.7969 184.182 76.9957 184.182 77.2287C184.182 77.3849 184.142 77.5284 184.062 77.6591C183.986 77.7869 183.883 77.8892 183.755 77.9659C183.628 78.0426 183.486 78.081 183.329 78.081Z" fill="#848A90"/>

            {/* Default circle */}
            {!formData.front && (
            <circle cx="22.5" cy="121" r="7" fill="#E0E4E6" stroke="#B6CEDE" />
            )}

            {/* Checked circle */}
            {formData.front && (
            <>
                <circle cx="103" cy="22" r="7" fill="#039855" />
                <polyline
                points="100,22 102,24 106,20"
                fill="none"
                stroke="white"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                />
            </>
            )}

        </svg>
    </div>
        <div className="flex items-center justify-center gap-8 m-8">
        <svg width="45" height="192" viewBox="0 0 45 192" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="path-1-inside-1_23672_37526" fill="white">
        <path d="M0.5 0H44.5V192H0.5V0Z"/>
        </mask>
        <path d="M0.5 0H44.5V192H0.5V0Z" fill="#E0E4E6"/>
        <path d="M44.5 0H45.5V-1H44.5V0ZM44.5 192V193H45.5V192H44.5ZM0.5 0V1H44.5V0V-1H0.5V0ZM44.5 0H43.5V192H44.5H45.5V0H44.5ZM44.5 192V191H0.5V192V193H44.5V192Z" fill="#CCE5F6" mask="url(#path-1-inside-1_23672_37526)"/>
        <path d="M28.5 102.222H16.8636V100.466H26.9886V95.1932H28.5V102.222ZM28.6761 89.5653C28.6761 90.4252 28.4924 91.1657 28.125 91.7869C27.7538 92.4044 27.233 92.8816 26.5625 93.2188C25.8883 93.5521 25.0985 93.7188 24.1932 93.7188C23.2992 93.7188 22.5114 93.5521 21.8295 93.2188C21.1477 92.8816 20.6155 92.4119 20.233 91.8097C19.8504 91.2036 19.6591 90.4953 19.6591 89.6847C19.6591 89.1922 19.7405 88.715 19.9034 88.2528C20.0663 87.7907 20.322 87.3759 20.6705 87.0085C21.0189 86.6411 21.4716 86.3513 22.0284 86.1392C22.5814 85.9271 23.2538 85.821 24.0455 85.821H24.6477V92.7585H23.375V87.4858C22.928 87.4858 22.5322 87.5767 22.1875 87.7585C21.839 87.9403 21.5644 88.196 21.3636 88.5256C21.1629 88.8513 21.0625 89.2339 21.0625 89.6733C21.0625 90.1506 21.1799 90.5672 21.4148 90.9233C21.6458 91.2756 21.9489 91.5483 22.3239 91.7415C22.6951 91.9309 23.0985 92.0256 23.5341 92.0256H24.5284C25.1117 92.0256 25.608 91.9233 26.017 91.7188C26.4261 91.5104 26.7386 91.2206 26.9545 90.8494C27.1667 90.4782 27.2727 90.0445 27.2727 89.5483C27.2727 89.2263 27.2273 88.9328 27.1364 88.6676C27.0417 88.4025 26.9015 88.1733 26.7159 87.9801C26.5303 87.7869 26.3011 87.6392 26.0284 87.5369L26.3182 85.929C26.7917 86.0578 27.2064 86.2888 27.5625 86.6222C27.9148 86.9517 28.1894 87.3665 28.3864 87.8665C28.5795 88.3627 28.6761 88.929 28.6761 89.5653ZM19.7727 79.7827H21.1364V84.7145H19.7727V79.7827ZM28.5 83.3622H18.7614C18.2159 83.3622 17.7633 83.2429 17.4034 83.0043C17.0398 82.7656 16.7689 82.4493 16.5909 82.0554C16.4091 81.6615 16.3182 81.2334 16.3182 80.7713C16.3182 80.4304 16.3466 80.1387 16.4034 79.8963C16.4564 79.6539 16.5057 79.474 16.5511 79.3565L17.9261 79.7543C17.9034 79.8338 17.8769 79.9361 17.8466 80.0611C17.8125 80.1861 17.7955 80.3376 17.7955 80.5156C17.7955 80.9285 17.8977 81.224 18.1023 81.402C18.3068 81.5762 18.6023 81.6634 18.9886 81.6634H28.5V83.3622ZM19.7727 73.956H21.1364V78.723H19.7727V73.956ZM17.6818 77.4446V75.7457H25.9375C26.267 75.7457 26.5152 75.6965 26.6818 75.598C26.8447 75.4995 26.9564 75.3726 27.017 75.2173C27.0739 75.0582 27.1023 74.8859 27.1023 74.7003C27.1023 74.5639 27.0928 74.4446 27.0739 74.3423C27.0549 74.2401 27.0398 74.1605 27.0284 74.1037L28.4318 73.7969C28.4697 73.8954 28.5076 74.0355 28.5455 74.2173C28.5871 74.3991 28.6098 74.6264 28.6136 74.8991C28.6212 75.3461 28.5417 75.7628 28.375 76.1491C28.2083 76.5355 27.9508 76.848 27.6023 77.0866C27.2538 77.3253 26.8163 77.4446 26.2898 77.4446H17.6818Z" fill="#2D2727"/>

        {/* Default circle */}
        {!formData.left && (
            <circle cx="22.5" cy="121" r="7" fill="#E0E4E6" stroke="#B6CEDE" />
        )}

        {/* Checked circle */}
        {formData.left && (
            <>
            <circle cx="22.5" cy="121" r="7" fill="#039855" />
            <path
                d="M19.5 121L21.5 123L25.5 119"
                stroke="white"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                transform="rotate(270 22.5 121)"
            />
            </>
        )}
        </svg>
                <img
                    src={building}
                    alt="building"
                    className="w-45 m-2"
                />
                <svg width="45" height="192" viewBox="0 0 45 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="path-1-inside-1_23672_37522" fill="white">
                <path d="M0.5 0H44.5V192H0.5V0Z"/>
                </mask>
                <path d="M0.5 0H44.5V192H0.5V0Z" fill="#E0E4E6"/>
                <path d="M44.5 0H45.5V-1H44.5V0ZM44.5 192V193H45.5V192H44.5ZM0.5 0V1H44.5V0V-1H0.5V0ZM44.5 0H43.5V192H44.5H45.5V0H44.5ZM44.5 192V191H0.5V192V193H44.5V192Z" fill="#CCE5F6" mask="url(#path-1-inside-1_23672_37522)"/>
                <path d="M28.5 102.222H16.8636V98.0739C16.8636 97.1723 17.0189 96.4242 17.3295 95.8295C17.6402 95.2311 18.0701 94.7841 18.6193 94.4886C19.1648 94.1932 19.7955 94.0455 20.5114 94.0455C21.2235 94.0455 21.8504 94.1951 22.392 94.4943C22.9299 94.7898 23.3485 95.2367 23.6477 95.8352C23.947 96.4299 24.0966 97.178 24.0966 98.0795V101.222H22.5852V98.2386C22.5852 97.6705 22.5038 97.2083 22.3409 96.8523C22.178 96.4924 21.9413 96.2292 21.6307 96.0625C21.3201 95.8958 20.947 95.8125 20.5114 95.8125C20.072 95.8125 19.6913 95.8977 19.3693 96.0682C19.0473 96.2348 18.8011 96.4981 18.6307 96.858C18.4564 97.214 18.3693 97.6818 18.3693 98.2614V100.466H28.5V102.222ZM23.25 96.4773L28.5 93.6023V95.6023L23.25 98.4205V96.4773ZM28.5 92.0455H19.7727V90.3466H28.5V92.0455ZM18.4261 91.1875C18.4261 91.483 18.3277 91.7367 18.1307 91.9489C17.9299 92.1572 17.6913 92.2614 17.4148 92.2614C17.1345 92.2614 16.8958 92.1572 16.6989 91.9489C16.4981 91.7367 16.3977 91.483 16.3977 91.1875C16.3977 90.892 16.4981 90.6402 16.6989 90.4318C16.8958 90.2197 17.1345 90.1136 17.4148 90.1136C17.6913 90.1136 17.9299 90.2197 18.1307 90.4318C18.3277 90.6402 18.4261 90.892 18.4261 91.1875ZM31.9545 84.402C31.9545 85.0952 31.8636 85.6918 31.6818 86.1918C31.5 86.688 31.2595 87.0933 30.9602 87.4077C30.661 87.7221 30.3333 87.9569 29.9773 88.1122L29.375 86.652C29.5417 86.5497 29.7178 86.4134 29.9034 86.2429C30.0928 86.0687 30.2538 85.8338 30.3864 85.5384C30.5189 85.2391 30.5852 84.8546 30.5852 84.3849C30.5852 83.741 30.428 83.2088 30.1136 82.7884C29.803 82.3679 29.3068 82.1577 28.625 82.1577H26.9091V82.2656C27.0947 82.3679 27.3011 82.5156 27.5284 82.7088C27.7557 82.8982 27.9527 83.1596 28.1193 83.4929C28.286 83.8262 28.3693 84.2599 28.3693 84.794C28.3693 85.4834 28.2083 86.1046 27.8864 86.6577C27.5606 87.2069 27.0814 87.6425 26.4489 87.9645C25.8125 88.2827 25.0303 88.4418 24.1023 88.4418C23.1742 88.4418 22.3788 88.2846 21.7159 87.9702C21.053 87.652 20.5455 87.2164 20.1932 86.6634C19.8371 86.1103 19.6591 85.4834 19.6591 84.7827C19.6591 84.241 19.75 83.8035 19.9318 83.4702C20.1098 83.1368 20.3182 82.8774 20.5568 82.6918C20.7955 82.5024 21.0057 82.3565 21.1875 82.2543V82.1293H19.7727V80.4645H28.6932C29.4432 80.4645 30.0587 80.6387 30.5398 80.9872C31.0208 81.3357 31.3769 81.8073 31.608 82.402C31.839 82.9929 31.9545 83.6596 31.9545 84.402ZM26.9602 84.419C26.9602 83.9304 26.8466 83.5175 26.6193 83.1804C26.3883 82.8395 26.0587 82.5819 25.6307 82.4077C25.1989 82.2296 24.6818 82.1406 24.0795 82.1406C23.4924 82.1406 22.9754 82.2277 22.5284 82.402C22.0814 82.5762 21.733 82.8319 21.483 83.169C21.2292 83.5062 21.1023 83.9228 21.1023 84.419C21.1023 84.9304 21.2348 85.3565 21.5 85.6974C21.7614 86.0384 22.1174 86.2959 22.5682 86.4702C23.0189 86.6406 23.5227 86.7259 24.0795 86.7259C24.6515 86.7259 25.1534 86.6387 25.5852 86.4645C26.017 86.2902 26.3542 86.0327 26.5966 85.6918C26.839 85.3471 26.9602 84.9228 26.9602 84.419ZM23.3182 76.4872H28.5V78.1861H16.8636V76.5099H21.1932V76.402C20.7235 76.1974 20.3504 75.8849 20.0739 75.4645C19.7973 75.044 19.6591 74.4948 19.6591 73.8168C19.6591 73.2183 19.7822 72.6955 20.0284 72.2486C20.2746 71.7978 20.642 71.4493 21.1307 71.2031C21.6155 70.9531 22.2216 70.8281 22.9489 70.8281H28.5V72.527H23.1534C22.5133 72.527 22.017 72.6918 21.6648 73.0213C21.3087 73.3509 21.1307 73.8092 21.1307 74.3963C21.1307 74.7978 21.2159 75.1577 21.3864 75.4759C21.5568 75.7902 21.8068 76.0384 22.1364 76.2202C22.4621 76.3982 22.8561 76.4872 23.3182 76.4872ZM19.7727 64.4872H21.1364V69.2543H19.7727V64.4872ZM17.6818 67.9759L17.6818 66.277H25.9375C26.267 66.277 26.5152 66.2277 26.6818 66.1293C26.8447 66.0308 26.9564 65.9039 27.017 65.7486C27.0739 65.5895 27.1023 65.4171 27.1023 65.2315C27.1023 65.0952 27.0928 64.9759 27.0739 64.8736C27.0549 64.7713 27.0398 64.6918 27.0284 64.6349L28.4318 64.3281C28.4697 64.4266 28.5076 64.5668 28.5455 64.7486C28.5871 64.9304 28.6098 65.1577 28.6136 65.4304C28.6212 65.8774 28.5417 66.294 28.375 66.6804C28.2083 67.0668 27.9508 67.3793 27.6023 67.6179C27.2538 67.8565 26.8163 67.9759 26.2898 67.9759H17.6818Z" fill="#2D2727"/>
                <circle cx="22.5" cy="121" r="7" fill="#E0E4E6" stroke="#B6CEDE"/>
                {/* Default circle */}
        {!formData.right && (
            <circle cx="22.5" cy="121" r="7" fill="#E0E4E6" stroke="#B6CEDE" />
        )}

        {/* Checked circle */}
        {formData.right && (
            <>
            <circle cx="22.5" cy="121" r="7" fill="#039855" />
            <path
                d="M19.5 121L21.5 123L25.5 119"
                stroke="white"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
                transform="rotate(270 22.5 121)"
            />
            </>
        )}
        </svg>

        </div>
        <div className="relative flex items-center justify-center">
                        <svg width="194" height="44" viewBox="0 0 194 44" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="path-1-inside-1_23672_37518" fill="white">
        <path d="M193.5 0V44L0.5 44V0L193.5 0Z"/>
        </mask>
        <path d="M193.5 0V44L0.5 44V0L193.5 0Z" fill="#E0E4E6"/>
        <path d="M193.5 44V45H194.5V44H193.5ZM0.5 44H-0.5V45H0.5V44ZM193.5 0L192.5 0V44H193.5H194.5V0L193.5 0ZM193.5 44V43L0.5 43V44V45L193.5 45V44ZM0.5 44H1.5V0L0.5 0L-0.5 0V44H0.5Z" fill="#CCE5F6" mask="url(#path-1-inside-1_23672_37518)"/>
        <path d="M90.7784 28V16.3636H94.9261C95.8277 16.3636 96.5758 16.5189 97.1705 16.8295C97.7689 17.1402 98.2159 17.5701 98.5114 18.1193C98.8068 18.6648 98.9545 19.2955 98.9545 20.0114C98.9545 20.7235 98.8049 21.3504 98.5057 21.892C98.2102 22.4299 97.7633 22.8485 97.1648 23.1477C96.5701 23.447 95.822 23.5966 94.9205 23.5966H91.7784V22.0852H94.7614C95.3295 22.0852 95.7917 22.0038 96.1477 21.8409C96.5076 21.678 96.7708 21.4413 96.9375 21.1307C97.1042 20.8201 97.1875 20.447 97.1875 20.0114C97.1875 19.572 97.1023 19.1913 96.9318 18.8693C96.7652 18.5473 96.5019 18.3011 96.142 18.1307C95.786 17.9564 95.3182 17.8693 94.7386 17.8693H92.5341V28H90.7784ZM96.5227 22.75L99.3977 28H97.3977L94.5795 22.75H96.5227ZM104.607 28.1761C103.747 28.1761 103.006 27.9924 102.385 27.625C101.768 27.2538 101.29 26.733 100.953 26.0625C100.62 25.3883 100.453 24.5985 100.453 23.6932C100.453 22.7992 100.62 22.0114 100.953 21.3295C101.29 20.6477 101.76 20.1155 102.362 19.733C102.968 19.3504 103.677 19.1591 104.487 19.1591C104.98 19.1591 105.457 19.2405 105.919 19.4034C106.381 19.5663 106.796 19.822 107.163 20.1705C107.531 20.5189 107.821 20.9716 108.033 21.5284C108.245 22.0814 108.351 22.7538 108.351 23.5455V24.1477H101.413V22.875H106.686C106.686 22.428 106.595 22.0322 106.413 21.6875C106.232 21.339 105.976 21.0644 105.646 20.8636C105.321 20.6629 104.938 20.5625 104.499 20.5625C104.021 20.5625 103.605 20.6799 103.249 20.9148C102.896 21.1458 102.624 21.4489 102.43 21.8239C102.241 22.1951 102.146 22.5985 102.146 23.0341V24.0284C102.146 24.6117 102.249 25.108 102.453 25.517C102.661 25.9261 102.951 26.2386 103.322 26.4545C103.694 26.6667 104.127 26.7727 104.624 26.7727C104.946 26.7727 105.239 26.7273 105.504 26.6364C105.769 26.5417 105.999 26.4015 106.192 26.2159C106.385 26.0303 106.533 25.8011 106.635 25.5284L108.243 25.8182C108.114 26.2917 107.883 26.7064 107.55 27.0625C107.22 27.4148 106.805 27.6894 106.305 27.8864C105.809 28.0795 105.243 28.1761 104.607 28.1761ZM112.776 28.1932C112.223 28.1932 111.723 28.0909 111.276 27.8864C110.829 27.678 110.474 27.3769 110.213 26.983C109.955 26.589 109.827 26.1061 109.827 25.5341C109.827 25.0417 109.921 24.6364 110.111 24.3182C110.3 24 110.556 23.7481 110.878 23.5625C111.2 23.3769 111.56 23.2367 111.957 23.142C112.355 23.0473 112.76 22.9754 113.173 22.9261C113.696 22.8655 114.12 22.8163 114.446 22.7784C114.772 22.7367 115.009 22.6705 115.156 22.5795C115.304 22.4886 115.378 22.3409 115.378 22.1364V22.0966C115.378 21.6004 115.238 21.2159 114.957 20.9432C114.681 20.6705 114.268 20.5341 113.719 20.5341C113.147 20.5341 112.696 20.661 112.366 20.9148C112.041 21.1648 111.815 21.4432 111.69 21.75L110.094 21.3864C110.283 20.8561 110.56 20.428 110.923 20.1023C111.291 19.7727 111.713 19.5341 112.19 19.3864C112.668 19.2348 113.17 19.1591 113.696 19.1591C114.045 19.1591 114.414 19.2008 114.804 19.2841C115.198 19.3636 115.565 19.5114 115.906 19.7273C116.251 19.9432 116.533 20.2519 116.753 20.6534C116.973 21.0511 117.082 21.5682 117.082 22.2045V28H115.423V26.8068H115.355C115.245 27.0265 115.08 27.2424 114.861 27.4545C114.641 27.6667 114.359 27.8428 114.014 27.983C113.67 28.1231 113.257 28.1932 112.776 28.1932ZM113.145 26.8295C113.615 26.8295 114.016 26.7367 114.349 26.5511C114.687 26.3655 114.942 26.1231 115.116 25.8239C115.295 25.5208 115.384 25.197 115.384 24.8523V23.7273C115.323 23.7879 115.205 23.8447 115.031 23.8977C114.861 23.947 114.666 23.9905 114.446 24.0284C114.226 24.0625 114.012 24.0947 113.804 24.125C113.596 24.1515 113.421 24.1742 113.281 24.1932C112.952 24.2348 112.651 24.3049 112.378 24.4034C112.109 24.5019 111.893 24.6439 111.73 24.8295C111.571 25.0114 111.491 25.2538 111.491 25.5568C111.491 25.9773 111.647 26.2955 111.957 26.5114C112.268 26.7235 112.664 26.8295 113.145 26.8295ZM119.345 28V19.2727H120.987V20.6591H121.078C121.237 20.1894 121.518 19.8201 121.919 19.5511C122.324 19.2784 122.783 19.142 123.294 19.142C123.4 19.142 123.525 19.1458 123.669 19.1534C123.817 19.161 123.932 19.1705 124.016 19.1818V20.8068C123.947 20.7879 123.826 20.767 123.652 20.7443C123.478 20.7178 123.304 20.7045 123.129 20.7045C122.728 20.7045 122.37 20.7898 122.055 20.9602C121.745 21.1269 121.499 21.3598 121.317 21.6591C121.135 21.9545 121.044 22.2917 121.044 22.6705V28H119.345Z" fill="#2D2727"/>
        <circle cx="72" cy="22" r="7" transform="rotate(90 72 22)" fill="#E0E4E6" stroke="#B6CEDE"/>
        {/* Default circle */}
        {!formData.rear && (
            <circle cx="72" cy="22" r="7" fill="#E0E4E6" stroke="#B6CEDE" />
        )}

        {/* Checked circle */}
        {formData.rear && (
            <>
            <circle cx="72" cy="22" r="7" fill="#039855" />
            <path
                d="M69 22L71 24L75 20"
                stroke="white"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
            />
            </>
        )}
        </svg>
        </div>

                </div>
                </div>
<div className="sm:hidden w-full max-w-[700px] mt-4 grid grid-cols-[auto_min-content_auto] justify-center items-center gap-x-0">

            <div
            onClick={() => setSelected('front')}
            className="col-start-2 w-[200px] mx-auto max-w-sm p-2 mb-5 bg-[#E0E4E6] border rounded-none text-center cursor-pointer"
  >
            <div className="flex items-center justify-center gap-2">
                <div className="w-[16px] h-[16px] flex items-center justify-center rounded-full border border-[#B6CEDE] bg-[#E0E4E6]">
                {formData.front && (
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M8 0.5C6.51664 0.5 5.06659 0.939867 3.83323 1.76398C2.59986 2.58809 1.63856 3.75943 1.07091 5.12987C0.50325 6.50032 0.354725 8.00832 0.644114 9.46318C0.933503 10.918 1.64781 12.2544 2.6967 13.3033C3.7456 14.3522 5.08197 15.0665 6.53682 15.3559C7.99168 15.6453 9.49968 15.4968 10.8701 14.9291C12.2406 14.3614 13.4119 13.4001 14.236 12.1668C15.0601 10.9334 15.5 9.48336 15.5 8C15.4979 6.01152 14.7071 4.10509 13.301 2.69902C11.8949 1.29295 9.98848 0.5021 8 0.5ZM11.2928 6.6774L7.25433 10.7159C7.20075 10.7695 7.13712 10.8121 7.06708 10.8411C6.99705 10.8701 6.92197 10.8851 6.84616 10.8851C6.77034 10.8851 6.69527 10.8701 6.62523 10.8411C6.55519 10.8121 6.49156 10.7695 6.43798 10.7159L4.70721 8.9851C4.59896 8.87684 4.53814 8.73002 4.53814 8.57692C4.53814 8.42383 4.59896 8.277 4.70721 8.16875C4.81547 8.06049 4.96229 7.99968 5.11539 7.99968C5.26848 7.99968 5.41531 8.06049 5.52356 8.16875L6.84616 9.49207L10.4764 5.86106C10.53 5.80745 10.5937 5.76494 10.6637 5.73593C10.7337 5.70692 10.8088 5.69199 10.8846 5.69199C10.9604 5.69199 11.0355 5.70692 11.1055 5.73593C11.1756 5.76494 11.2392 5.80745 11.2928 5.86106C11.3464 5.91466 11.3889 5.97829 11.4179 6.04833C11.4469 6.11836 11.4619 6.19342 11.4619 6.26923C11.4619 6.34503 11.4469 6.4201 11.4179 6.49013C11.3889 6.56017 11.3464 6.6238 11.2928 6.6774Z" fill="#039855"/>
            </svg>
                )}
                </div>

                <span className="text-base font-bold text-[#2D2727]">Front</span>
            </div>

            <p className="mt-1 text-sm text-[#848A90] font-normal leading-snug">
                Front side should be where<br/> the main entrance is located.
            </p>
            </div>
            {/* Left */}
            <div
            onClick={() => setSelected('left')}
            className="row-start-2 col-start-1 w-[120px] p-2 mx-auto bg-[#E0E4E6] border rounded-none text-center cursor-pointer -mr-12"
            style={{ transform: 'rotate(-90deg)' }}
            >
            <div className="flex items-center justify-center gap-2">
                <div className="w-[16px] h-[16px] flex items-center justify-center rounded-full border border-[#B6CEDE] bg-[#E0E4E6]">
                {formData.left && (
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M8 0.5C6.51664 0.5 5.06659 0.939867 3.83323 1.76398C2.59986 2.58809 1.63856 3.75943 1.07091 5.12987C0.50325 6.50032 0.354725 8.00832 0.644114 9.46318C0.933503 10.918 1.64781 12.2544 2.6967 13.3033C3.7456 14.3522 5.08197 15.0665 6.53682 15.3559C7.99168 15.6453 9.49968 15.4968 10.8701 14.9291C12.2406 14.3614 13.4119 13.4001 14.236 12.1668C15.0601 10.9334 15.5 9.48336 15.5 8C15.4979 6.01152 14.7071 4.10509 13.301 2.69902C11.8949 1.29295 9.98848 0.5021 8 0.5ZM11.2928 6.6774L7.25433 10.7159C7.20075 10.7695 7.13712 10.8121 7.06708 10.8411C6.99705 10.8701 6.92197 10.8851 6.84616 10.8851C6.77034 10.8851 6.69527 10.8701 6.62523 10.8411C6.55519 10.8121 6.49156 10.7695 6.43798 10.7159L4.70721 8.9851C4.59896 8.87684 4.53814 8.73002 4.53814 8.57692C4.53814 8.42383 4.59896 8.277 4.70721 8.16875C4.81547 8.06049 4.96229 7.99968 5.11539 7.99968C5.26848 7.99968 5.41531 8.06049 5.52356 8.16875L6.84616 9.49207L10.4764 5.86106C10.53 5.80745 10.5937 5.76494 10.6637 5.73593C10.7337 5.70692 10.8088 5.69199 10.8846 5.69199C10.9604 5.69199 11.0355 5.70692 11.1055 5.73593C11.1756 5.76494 11.2392 5.80745 11.2928 5.86106C11.3464 5.91466 11.3889 5.97829 11.4179 6.04833C11.4469 6.11836 11.4619 6.19342 11.4619 6.26923C11.4619 6.34503 11.4469 6.4201 11.4179 6.49013C11.3889 6.56017 11.3464 6.6238 11.2928 6.6774Z" fill="#039855"/>
            </svg>
                )}
                </div>
                <span className="text-base font-bold text-[#2D2727]">Left</span>
            </div>
            </div>
            <div className="row-start-2 col-start-2 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="140" height="143" viewBox="0 0 140 143" fill="none">
            <rect x="0.5" y="3.48779" width="139" height="139" rx="8" fill="#D3E0E9"/>
            <rect x="23.916" width="6.4767" height="12.4552" fill="#B8CDDB"/>
            <rect x="30.3926" width="79.215" height="4.48387" fill="#B8CDDB"/>
            <rect x="109.607" width="6.4767" height="12.4552" fill="#B8CDDB"/>
            <path d="M26.9062 12.2065V67.2585C51.4845 67.5907 103.232 57.0453 113.594 12.2065" stroke="#B8CDDB" stroke-width="5"/>
            </svg>
            </div>
            {/* Right */}
            <div
            onClick={() => setSelected('right')}
             className="row-start-2 col-start-3 w-[120px] p-2 mx-auto bg-[#E0E4E6] border rounded-none text-center cursor-pointer -ml-12"
                style={{ transform: 'rotate(270deg)' }}
            >
            <div className="flex items-center justify-center gap-2">
                <div className="w-[16px] h-[16px] flex items-center justify-center rounded-full border border-[#B6CEDE] bg-[#E0E4E6]">
                {formData.right && (
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M8 0.5C6.51664 0.5 5.06659 0.939867 3.83323 1.76398C2.59986 2.58809 1.63856 3.75943 1.07091 5.12987C0.50325 6.50032 0.354725 8.00832 0.644114 9.46318C0.933503 10.918 1.64781 12.2544 2.6967 13.3033C3.7456 14.3522 5.08197 15.0665 6.53682 15.3559C7.99168 15.6453 9.49968 15.4968 10.8701 14.9291C12.2406 14.3614 13.4119 13.4001 14.236 12.1668C15.0601 10.9334 15.5 9.48336 15.5 8C15.4979 6.01152 14.7071 4.10509 13.301 2.69902C11.8949 1.29295 9.98848 0.5021 8 0.5ZM11.2928 6.6774L7.25433 10.7159C7.20075 10.7695 7.13712 10.8121 7.06708 10.8411C6.99705 10.8701 6.92197 10.8851 6.84616 10.8851C6.77034 10.8851 6.69527 10.8701 6.62523 10.8411C6.55519 10.8121 6.49156 10.7695 6.43798 10.7159L4.70721 8.9851C4.59896 8.87684 4.53814 8.73002 4.53814 8.57692C4.53814 8.42383 4.59896 8.277 4.70721 8.16875C4.81547 8.06049 4.96229 7.99968 5.11539 7.99968C5.26848 7.99968 5.41531 8.06049 5.52356 8.16875L6.84616 9.49207L10.4764 5.86106C10.53 5.80745 10.5937 5.76494 10.6637 5.73593C10.7337 5.70692 10.8088 5.69199 10.8846 5.69199C10.9604 5.69199 11.0355 5.70692 11.1055 5.73593C11.1756 5.76494 11.2392 5.80745 11.2928 5.86106C11.3464 5.91466 11.3889 5.97829 11.4179 6.04833C11.4469 6.11836 11.4619 6.19342 11.4619 6.26923C11.4619 6.34503 11.4469 6.4201 11.4179 6.49013C11.3889 6.56017 11.3464 6.6238 11.2928 6.6774Z" fill="#039855"/>
            </svg>
                )}
                </div>

                <span className="text-base font-bold text-[#2D2727]">Right</span>
            </div>
            </div>
            {/* Rear */}
            <div
            onClick={() => setSelected('rear')}
            className="row-start-3 col-start-2 w-[120px] mt-5 p-2 mx-auto bg-[#E0E4E6] border rounded-none text-center cursor-pointer">
            <div className="flex items-center justify-center gap-2">
                <div className="w-[16px] h-[16px] flex items-center justify-center rounded-full border border-[#B6CEDE] bg-[#E0E4E6]">
                {formData.rear && (
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M8 0.5C6.51664 0.5 5.06659 0.939867 3.83323 1.76398C2.59986 2.58809 1.63856 3.75943 1.07091 5.12987C0.50325 6.50032 0.354725 8.00832 0.644114 9.46318C0.933503 10.918 1.64781 12.2544 2.6967 13.3033C3.7456 14.3522 5.08197 15.0665 6.53682 15.3559C7.99168 15.6453 9.49968 15.4968 10.8701 14.9291C12.2406 14.3614 13.4119 13.4001 14.236 12.1668C15.0601 10.9334 15.5 9.48336 15.5 8C15.4979 6.01152 14.7071 4.10509 13.301 2.69902C11.8949 1.29295 9.98848 0.5021 8 0.5ZM11.2928 6.6774L7.25433 10.7159C7.20075 10.7695 7.13712 10.8121 7.06708 10.8411C6.99705 10.8701 6.92197 10.8851 6.84616 10.8851C6.77034 10.8851 6.69527 10.8701 6.62523 10.8411C6.55519 10.8121 6.49156 10.7695 6.43798 10.7159L4.70721 8.9851C4.59896 8.87684 4.53814 8.73002 4.53814 8.57692C4.53814 8.42383 4.59896 8.277 4.70721 8.16875C4.81547 8.06049 4.96229 7.99968 5.11539 7.99968C5.26848 7.99968 5.41531 8.06049 5.52356 8.16875L6.84616 9.49207L10.4764 5.86106C10.53 5.80745 10.5937 5.76494 10.6637 5.73593C10.7337 5.70692 10.8088 5.69199 10.8846 5.69199C10.9604 5.69199 11.0355 5.70692 11.1055 5.73593C11.1756 5.76494 11.2392 5.80745 11.2928 5.86106C11.3464 5.91466 11.3889 5.97829 11.4179 6.04833C11.4469 6.11836 11.4619 6.19342 11.4619 6.26923C11.4619 6.34503 11.4469 6.4201 11.4179 6.49013C11.3889 6.56017 11.3464 6.6238 11.2928 6.6774Z" fill="#039855"/>
            </svg>
                )}
                </div>
                <span className="text-base font-bold text-[#2D2727]">Rear</span>
            </div>
            </div>
            </div>
             <div className="flex flex-col items-center justify-center py-6 md:py-6 md:max-w-[780px] w-full">
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
                    <label className="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.front
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Front
                        </span>
                        <div className="relative w-full">
                         <input
                            type="text"
                            placeholder={errors.front ? "Enter Front Details" : "Highway"}
                            ref={frontRef}
                            value={formData.front || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                           setFormData((prev) => ({
                            ...prev,
                            front: cleaned,
    }));

                            setErrors((prev) => ({ ...prev, front: "" }));
                        }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.front ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />

                        <div className={`${isModalOpenFront ? "opacity-30" : "opacity-100"} transition-opacity`}>
                         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666]">
                        <path d="M8.625 0.875C7.01803 0.875 5.44714 1.35152 4.111 2.24431C2.77485 3.1371 1.73344 4.40605 1.11848 5.8907C0.50352 7.37535 0.342618 9.00901 0.656123 10.5851C0.969628 12.1612 1.74346 13.6089 2.87976 14.7452C4.01606 15.8815 5.4638 16.6554 7.0399 16.9689C8.61599 17.2824 10.2497 17.1215 11.7343 16.5065C13.219 15.8916 14.4879 14.8502 15.3807 13.514C16.2735 12.1779 16.75 10.607 16.75 9C16.7477 6.84581 15.891 4.78051 14.3677 3.25727C12.8445 1.73403 10.7792 0.877275 8.625 0.875ZM8.625 15.875C7.26526 15.875 5.93605 15.4718 4.80546 14.7164C3.67487 13.9609 2.79368 12.8872 2.27333 11.6309C1.75298 10.3747 1.61683 8.99237 1.8821 7.65875C2.14738 6.32513 2.80216 5.10013 3.76364 4.13864C4.72513 3.17716 5.95014 2.52237 7.28376 2.2571C8.61738 1.99183 9.99971 2.12798 11.256 2.64833C12.5122 3.16868 13.5859 4.04987 14.3414 5.18045C15.0968 6.31104 15.5 7.64025 15.5 9C15.4979 10.8227 14.7729 12.5702 13.4841 13.8591C12.1952 15.1479 10.4477 15.8729 8.625 15.875ZM9.875 12.75C9.875 12.9158 9.80916 13.0747 9.69195 13.1919C9.57474 13.3092 9.41576 13.375 9.25 13.375C8.91848 13.375 8.60054 13.2433 8.36612 13.0089C8.1317 12.7745 8 12.4565 8 12.125V9C7.83424 9 7.67527 8.93415 7.55806 8.81694C7.44085 8.69973 7.375 8.54076 7.375 8.375C7.375 8.20924 7.44085 8.05027 7.55806 7.93306C7.67527 7.81585 7.83424 7.75 8 7.75C8.33152 7.75 8.64947 7.8817 8.88389 8.11612C9.11831 8.35054 9.25 8.66848 9.25 9V12.125C9.41576 12.125 9.57474 12.1908 9.69195 12.3081C9.80916 12.4253 9.875 12.5842 9.875 12.75ZM7.375 5.5625C7.375 5.37708 7.42999 5.19582 7.533 5.04165C7.63601 4.88748 7.78243 4.76732 7.95374 4.69636C8.12504 4.62541 8.31354 4.60684 8.4954 4.64301C8.67726 4.67919 8.8443 4.76848 8.97542 4.89959C9.10653 5.0307 9.19582 5.19775 9.23199 5.3796C9.26816 5.56146 9.2496 5.74996 9.17864 5.92127C9.10768 6.09257 8.98752 6.23899 8.83335 6.342C8.67918 6.44502 8.49792 6.5 8.3125 6.5C8.06386 6.5 7.82541 6.40123 7.64959 6.22541C7.47378 6.0496 7.375 5.81114 7.375 5.5625Z" fill={errors.front ? "#DD0707" : "#008080"} />
                        </svg>
                        </div>
                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                        onClick={() => setIsModalOpenFront(true)}
                        className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666] cursor-pointer"
                        />
                    {isModalOpenFront && (
                        <div className="absolute left-0 md:w-[430px] w-[330px] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-40"
                        ref={modalRef}>
                        <div className="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="flex-shrink-0">
                        <path d="M8.125 0.875C6.51803 0.875 4.94714 1.35152 3.611 2.24431C2.27485 3.1371 1.23344 4.40605 0.618482 5.8907C0.00352044 7.37535 -0.157382 9.00901 0.156123 10.5851C0.469628 12.1612 1.24346 13.6089 2.37976 14.7452C3.51606 15.8815 4.9638 16.6554 6.5399 16.9689C8.11599 17.2824 9.74966 17.1215 11.2343 16.5065C12.719 15.8916 13.9879 14.8502 14.8807 13.514C15.7735 12.1779 16.25 10.607 16.25 9C16.2477 6.84581 15.391 4.78051 13.8677 3.25727C12.3445 1.73403 10.2792 0.877275 8.125 0.875ZM8.125 15.875C6.76526 15.875 5.43605 15.4718 4.30546 14.7164C3.17487 13.9609 2.29368 12.8872 1.77333 11.6309C1.25298 10.3747 1.11683 8.99237 1.3821 7.65875C1.64738 6.32513 2.30216 5.10013 3.26364 4.13864C4.22513 3.17716 5.45014 2.52237 6.78376 2.2571C8.11738 1.99183 9.49971 2.12798 10.756 2.64833C12.0122 3.16868 13.0859 4.04987 13.8414 5.18045C14.5968 6.31104 15 7.64025 15 9C14.9979 10.8227 14.2729 12.5702 12.9841 13.8591C11.6952 15.1479 9.94773 15.8729 8.125 15.875ZM9.375 12.75C9.375 12.9158 9.30916 13.0747 9.19195 13.1919C9.07474 13.3092 8.91576 13.375 8.75 13.375C8.41848 13.375 8.10054 13.2433 7.86612 13.0089C7.6317 12.7745 7.5 12.4565 7.5 12.125V9C7.33424 9 7.17527 8.93415 7.05806 8.81694C6.94085 8.69973 6.875 8.54076 6.875 8.375C6.875 8.20924 6.94085 8.05027 7.05806 7.93306C7.17527 7.81585 7.33424 7.75 7.5 7.75C7.83152 7.75 8.14947 7.8817 8.38389 8.11612C8.61831 8.35054 8.75 8.66848 8.75 9V12.125C8.91576 12.125 9.07474 12.1908 9.19195 12.3081C9.30916 12.4253 9.375 12.5842 9.375 12.75ZM6.875 5.5625C6.875 5.37708 6.92999 5.19582 7.033 5.04165C7.13601 4.88748 7.28243 4.76732 7.45374 4.69636C7.62504 4.62541 7.81354 4.60684 7.9954 4.64301C8.17726 4.67919 8.3443 4.76848 8.47542 4.89959C8.60653 5.0307 8.69582 5.19775 8.73199 5.3796C8.76816 5.56146 8.7496 5.74996 8.67864 5.92127C8.60768 6.09257 8.48752 6.23899 8.33335 6.342C8.17918 6.44502 7.99792 6.5 7.8125 6.5C7.56386 6.5 7.32541 6.40123 7.14959 6.22541C6.97378 6.0496 6.875 5.81114 6.875 5.5625Z" fill="#008080"/>
                        </svg>
                        <p className="text-sm text-[#2D2727] font-medium">
                            The <strong>front boundary</strong> is typically where the main entrance of the building is located, often facing a street or main road. 
                        </p>
                        </div>
                        </div>
                    )}
                    </div>
                    </label>
                   <label className="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.left
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Left
                        </span>
                         <div className="relative w-full">
                         <input
                            type="text"
                            placeholder={errors.left ? "Enter Left Details" : "Condo Unit"}
                            ref={leftRef}
                            value={formData.left || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                            setFormData((prev) => ({
                            ...prev,
                            left: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, left: "" }));
                        }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.left ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />
                         <div className={`${isModalOpenLeft ? "opacity-30" : "opacity-100"} transition-opacity`}>
                         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666]">
                        <path d="M8.625 0.875C7.01803 0.875 5.44714 1.35152 4.111 2.24431C2.77485 3.1371 1.73344 4.40605 1.11848 5.8907C0.50352 7.37535 0.342618 9.00901 0.656123 10.5851C0.969628 12.1612 1.74346 13.6089 2.87976 14.7452C4.01606 15.8815 5.4638 16.6554 7.0399 16.9689C8.61599 17.2824 10.2497 17.1215 11.7343 16.5065C13.219 15.8916 14.4879 14.8502 15.3807 13.514C16.2735 12.1779 16.75 10.607 16.75 9C16.7477 6.84581 15.891 4.78051 14.3677 3.25727C12.8445 1.73403 10.7792 0.877275 8.625 0.875ZM8.625 15.875C7.26526 15.875 5.93605 15.4718 4.80546 14.7164C3.67487 13.9609 2.79368 12.8872 2.27333 11.6309C1.75298 10.3747 1.61683 8.99237 1.8821 7.65875C2.14738 6.32513 2.80216 5.10013 3.76364 4.13864C4.72513 3.17716 5.95014 2.52237 7.28376 2.2571C8.61738 1.99183 9.99971 2.12798 11.256 2.64833C12.5122 3.16868 13.5859 4.04987 14.3414 5.18045C15.0968 6.31104 15.5 7.64025 15.5 9C15.4979 10.8227 14.7729 12.5702 13.4841 13.8591C12.1952 15.1479 10.4477 15.8729 8.625 15.875ZM9.875 12.75C9.875 12.9158 9.80916 13.0747 9.69195 13.1919C9.57474 13.3092 9.41576 13.375 9.25 13.375C8.91848 13.375 8.60054 13.2433 8.36612 13.0089C8.1317 12.7745 8 12.4565 8 12.125V9C7.83424 9 7.67527 8.93415 7.55806 8.81694C7.44085 8.69973 7.375 8.54076 7.375 8.375C7.375 8.20924 7.44085 8.05027 7.55806 7.93306C7.67527 7.81585 7.83424 7.75 8 7.75C8.33152 7.75 8.64947 7.8817 8.88389 8.11612C9.11831 8.35054 9.25 8.66848 9.25 9V12.125C9.41576 12.125 9.57474 12.1908 9.69195 12.3081C9.80916 12.4253 9.875 12.5842 9.875 12.75ZM7.375 5.5625C7.375 5.37708 7.42999 5.19582 7.533 5.04165C7.63601 4.88748 7.78243 4.76732 7.95374 4.69636C8.12504 4.62541 8.31354 4.60684 8.4954 4.64301C8.67726 4.67919 8.8443 4.76848 8.97542 4.89959C9.10653 5.0307 9.19582 5.19775 9.23199 5.3796C9.26816 5.56146 9.2496 5.74996 9.17864 5.92127C9.10768 6.09257 8.98752 6.23899 8.83335 6.342C8.67918 6.44502 8.49792 6.5 8.3125 6.5C8.06386 6.5 7.82541 6.40123 7.64959 6.22541C7.47378 6.0496 7.375 5.81114 7.375 5.5625Z" fill={errors.left ? "#DD0707" : "#008080"} />
                        </svg>
                        </div>
                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                        onClick={() => setIsModalOpenLeft(true)}
                        className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666] cursor-pointer"
                        />
                        
                        {isModalOpenLeft && (
                        <div className="absolute left-0 md:w-[430px] w-[330px] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-40"
                        ref={modalRef}>
                        <div className="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="flex-shrink-0">
                        <path d="M8.125 0.875C6.51803 0.875 4.94714 1.35152 3.611 2.24431C2.27485 3.1371 1.23344 4.40605 0.618482 5.8907C0.00352044 7.37535 -0.157382 9.00901 0.156123 10.5851C0.469628 12.1612 1.24346 13.6089 2.37976 14.7452C3.51606 15.8815 4.9638 16.6554 6.5399 16.9689C8.11599 17.2824 9.74966 17.1215 11.2343 16.5065C12.719 15.8916 13.9879 14.8502 14.8807 13.514C15.7735 12.1779 16.25 10.607 16.25 9C16.2477 6.84581 15.391 4.78051 13.8677 3.25727C12.3445 1.73403 10.2792 0.877275 8.125 0.875ZM8.125 15.875C6.76526 15.875 5.43605 15.4718 4.30546 14.7164C3.17487 13.9609 2.29368 12.8872 1.77333 11.6309C1.25298 10.3747 1.11683 8.99237 1.3821 7.65875C1.64738 6.32513 2.30216 5.10013 3.26364 4.13864C4.22513 3.17716 5.45014 2.52237 6.78376 2.2571C8.11738 1.99183 9.49971 2.12798 10.756 2.64833C12.0122 3.16868 13.0859 4.04987 13.8414 5.18045C14.5968 6.31104 15 7.64025 15 9C14.9979 10.8227 14.2729 12.5702 12.9841 13.8591C11.6952 15.1479 9.94773 15.8729 8.125 15.875ZM9.375 12.75C9.375 12.9158 9.30916 13.0747 9.19195 13.1919C9.07474 13.3092 8.91576 13.375 8.75 13.375C8.41848 13.375 8.10054 13.2433 7.86612 13.0089C7.6317 12.7745 7.5 12.4565 7.5 12.125V9C7.33424 9 7.17527 8.93415 7.05806 8.81694C6.94085 8.69973 6.875 8.54076 6.875 8.375C6.875 8.20924 6.94085 8.05027 7.05806 7.93306C7.17527 7.81585 7.33424 7.75 7.5 7.75C7.83152 7.75 8.14947 7.8817 8.38389 8.11612C8.61831 8.35054 8.75 8.66848 8.75 9V12.125C8.91576 12.125 9.07474 12.1908 9.19195 12.3081C9.30916 12.4253 9.375 12.5842 9.375 12.75ZM6.875 5.5625C6.875 5.37708 6.92999 5.19582 7.033 5.04165C7.13601 4.88748 7.28243 4.76732 7.45374 4.69636C7.62504 4.62541 7.81354 4.60684 7.9954 4.64301C8.17726 4.67919 8.3443 4.76848 8.47542 4.89959C8.60653 5.0307 8.69582 5.19775 8.73199 5.3796C8.76816 5.56146 8.7496 5.74996 8.67864 5.92127C8.60768 6.09257 8.48752 6.23899 8.33335 6.342C8.17918 6.44502 7.99792 6.5 7.8125 6.5C7.56386 6.5 7.32541 6.40123 7.14959 6.22541C6.97378 6.0496 6.875 5.81114 6.875 5.5625Z" fill="#008080"/>
                        </svg>
                        <p className="text-sm text-[#2D2727] font-medium">
                            The <strong>left boundary</strong> is the side to your left when facing the building from the front entrance. Describe the adjacent property. 
                        </p>
                        </div>
                        </div>
                    )}
                    </div>
                    </label>

                    <label className="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.right
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Right
                        </span>
                       <div className="relative w-full">
                         <input
                            type="text"
                            placeholder={errors.right ? "Enter Right Details" : "Condo Unit"}
                            ref={rightRef}
                            value={formData.right || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                             setFormData((prev) => ({
                            ...prev,
                            right: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, right: "" }));
                        }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.right ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />
                        <div className={`${isModalOpenRight ? "opacity-30" : "opacity-100"} transition-opacity`}>
                         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666]">
                        <path d="M8.625 0.875C7.01803 0.875 5.44714 1.35152 4.111 2.24431C2.77485 3.1371 1.73344 4.40605 1.11848 5.8907C0.50352 7.37535 0.342618 9.00901 0.656123 10.5851C0.969628 12.1612 1.74346 13.6089 2.87976 14.7452C4.01606 15.8815 5.4638 16.6554 7.0399 16.9689C8.61599 17.2824 10.2497 17.1215 11.7343 16.5065C13.219 15.8916 14.4879 14.8502 15.3807 13.514C16.2735 12.1779 16.75 10.607 16.75 9C16.7477 6.84581 15.891 4.78051 14.3677 3.25727C12.8445 1.73403 10.7792 0.877275 8.625 0.875ZM8.625 15.875C7.26526 15.875 5.93605 15.4718 4.80546 14.7164C3.67487 13.9609 2.79368 12.8872 2.27333 11.6309C1.75298 10.3747 1.61683 8.99237 1.8821 7.65875C2.14738 6.32513 2.80216 5.10013 3.76364 4.13864C4.72513 3.17716 5.95014 2.52237 7.28376 2.2571C8.61738 1.99183 9.99971 2.12798 11.256 2.64833C12.5122 3.16868 13.5859 4.04987 14.3414 5.18045C15.0968 6.31104 15.5 7.64025 15.5 9C15.4979 10.8227 14.7729 12.5702 13.4841 13.8591C12.1952 15.1479 10.4477 15.8729 8.625 15.875ZM9.875 12.75C9.875 12.9158 9.80916 13.0747 9.69195 13.1919C9.57474 13.3092 9.41576 13.375 9.25 13.375C8.91848 13.375 8.60054 13.2433 8.36612 13.0089C8.1317 12.7745 8 12.4565 8 12.125V9C7.83424 9 7.67527 8.93415 7.55806 8.81694C7.44085 8.69973 7.375 8.54076 7.375 8.375C7.375 8.20924 7.44085 8.05027 7.55806 7.93306C7.67527 7.81585 7.83424 7.75 8 7.75C8.33152 7.75 8.64947 7.8817 8.88389 8.11612C9.11831 8.35054 9.25 8.66848 9.25 9V12.125C9.41576 12.125 9.57474 12.1908 9.69195 12.3081C9.80916 12.4253 9.875 12.5842 9.875 12.75ZM7.375 5.5625C7.375 5.37708 7.42999 5.19582 7.533 5.04165C7.63601 4.88748 7.78243 4.76732 7.95374 4.69636C8.12504 4.62541 8.31354 4.60684 8.4954 4.64301C8.67726 4.67919 8.8443 4.76848 8.97542 4.89959C9.10653 5.0307 9.19582 5.19775 9.23199 5.3796C9.26816 5.56146 9.2496 5.74996 9.17864 5.92127C9.10768 6.09257 8.98752 6.23899 8.83335 6.342C8.67918 6.44502 8.49792 6.5 8.3125 6.5C8.06386 6.5 7.82541 6.40123 7.64959 6.22541C7.47378 6.0496 7.375 5.81114 7.375 5.5625Z" fill={errors.right ? "#DD0707" : "#008080"} />
                        </svg>
                        </div>
                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                        onClick={() => setIsModalOpenRight(true)}
                        className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666] cursor-pointer"
                        />
                        {isModalOpenRight && (
                        <div className="absolute left-0 md:w-[430px] w-[330px] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-40"
                        ref={modalRef}>
                        <div className="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="flex-shrink-0">
                        <path d="M8.125 0.875C6.51803 0.875 4.94714 1.35152 3.611 2.24431C2.27485 3.1371 1.23344 4.40605 0.618482 5.8907C0.00352044 7.37535 -0.157382 9.00901 0.156123 10.5851C0.469628 12.1612 1.24346 13.6089 2.37976 14.7452C3.51606 15.8815 4.9638 16.6554 6.5399 16.9689C8.11599 17.2824 9.74966 17.1215 11.2343 16.5065C12.719 15.8916 13.9879 14.8502 14.8807 13.514C15.7735 12.1779 16.25 10.607 16.25 9C16.2477 6.84581 15.391 4.78051 13.8677 3.25727C12.3445 1.73403 10.2792 0.877275 8.125 0.875ZM8.125 15.875C6.76526 15.875 5.43605 15.4718 4.30546 14.7164C3.17487 13.9609 2.29368 12.8872 1.77333 11.6309C1.25298 10.3747 1.11683 8.99237 1.3821 7.65875C1.64738 6.32513 2.30216 5.10013 3.26364 4.13864C4.22513 3.17716 5.45014 2.52237 6.78376 2.2571C8.11738 1.99183 9.49971 2.12798 10.756 2.64833C12.0122 3.16868 13.0859 4.04987 13.8414 5.18045C14.5968 6.31104 15 7.64025 15 9C14.9979 10.8227 14.2729 12.5702 12.9841 13.8591C11.6952 15.1479 9.94773 15.8729 8.125 15.875ZM9.375 12.75C9.375 12.9158 9.30916 13.0747 9.19195 13.1919C9.07474 13.3092 8.91576 13.375 8.75 13.375C8.41848 13.375 8.10054 13.2433 7.86612 13.0089C7.6317 12.7745 7.5 12.4565 7.5 12.125V9C7.33424 9 7.17527 8.93415 7.05806 8.81694C6.94085 8.69973 6.875 8.54076 6.875 8.375C6.875 8.20924 6.94085 8.05027 7.05806 7.93306C7.17527 7.81585 7.33424 7.75 7.5 7.75C7.83152 7.75 8.14947 7.8817 8.38389 8.11612C8.61831 8.35054 8.75 8.66848 8.75 9V12.125C8.91576 12.125 9.07474 12.1908 9.19195 12.3081C9.30916 12.4253 9.375 12.5842 9.375 12.75ZM6.875 5.5625C6.875 5.37708 6.92999 5.19582 7.033 5.04165C7.13601 4.88748 7.28243 4.76732 7.45374 4.69636C7.62504 4.62541 7.81354 4.60684 7.9954 4.64301C8.17726 4.67919 8.3443 4.76848 8.47542 4.89959C8.60653 5.0307 8.69582 5.19775 8.73199 5.3796C8.76816 5.56146 8.7496 5.74996 8.67864 5.92127C8.60768 6.09257 8.48752 6.23899 8.33335 6.342C8.17918 6.44502 7.99792 6.5 7.8125 6.5C7.56386 6.5 7.32541 6.40123 7.14959 6.22541C6.97378 6.0496 6.875 5.81114 6.875 5.5625Z" fill="#008080"/>
                        </svg>
                        <p className="text-sm text-[#2D2727] font-medium">
                            The <strong>right boundary</strong> is the side to your right when facing the building from the front entrance. Describe the adjacent property.
                        </p>
                        </div>
                        </div>
                    )}
                        </div>
                    </label>
                </div>
                   <div className="flex flex-col md:flex-row gap-7 md:gap-10 w-full mb-9 z-1">
                    <label className="flex flex-col w-full md:w-[233px]">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                errors.rear
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Rear
                        </span>
                       <div className="relative w-full ">
                         <input
                            type="text"
                            placeholder={errors.rear ? "Enter Rear Details" : "Condo Unit"}
                            ref={rearRef}
                            value={formData.rear || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                            setFormData((prev) => ({
                            ...prev,
                            rear: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, rear: "" }));
                        }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.rear ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />
                        <div className={`${isModalOpenRear ? "opacity-30" : "opacity-100"} transition-opacity`}>
                         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666]">
                        <path d="M8.625 0.875C7.01803 0.875 5.44714 1.35152 4.111 2.24431C2.77485 3.1371 1.73344 4.40605 1.11848 5.8907C0.50352 7.37535 0.342618 9.00901 0.656123 10.5851C0.969628 12.1612 1.74346 13.6089 2.87976 14.7452C4.01606 15.8815 5.4638 16.6554 7.0399 16.9689C8.61599 17.2824 10.2497 17.1215 11.7343 16.5065C13.219 15.8916 14.4879 14.8502 15.3807 13.514C16.2735 12.1779 16.75 10.607 16.75 9C16.7477 6.84581 15.891 4.78051 14.3677 3.25727C12.8445 1.73403 10.7792 0.877275 8.625 0.875ZM8.625 15.875C7.26526 15.875 5.93605 15.4718 4.80546 14.7164C3.67487 13.9609 2.79368 12.8872 2.27333 11.6309C1.75298 10.3747 1.61683 8.99237 1.8821 7.65875C2.14738 6.32513 2.80216 5.10013 3.76364 4.13864C4.72513 3.17716 5.95014 2.52237 7.28376 2.2571C8.61738 1.99183 9.99971 2.12798 11.256 2.64833C12.5122 3.16868 13.5859 4.04987 14.3414 5.18045C15.0968 6.31104 15.5 7.64025 15.5 9C15.4979 10.8227 14.7729 12.5702 13.4841 13.8591C12.1952 15.1479 10.4477 15.8729 8.625 15.875ZM9.875 12.75C9.875 12.9158 9.80916 13.0747 9.69195 13.1919C9.57474 13.3092 9.41576 13.375 9.25 13.375C8.91848 13.375 8.60054 13.2433 8.36612 13.0089C8.1317 12.7745 8 12.4565 8 12.125V9C7.83424 9 7.67527 8.93415 7.55806 8.81694C7.44085 8.69973 7.375 8.54076 7.375 8.375C7.375 8.20924 7.44085 8.05027 7.55806 7.93306C7.67527 7.81585 7.83424 7.75 8 7.75C8.33152 7.75 8.64947 7.8817 8.88389 8.11612C9.11831 8.35054 9.25 8.66848 9.25 9V12.125C9.41576 12.125 9.57474 12.1908 9.69195 12.3081C9.80916 12.4253 9.875 12.5842 9.875 12.75ZM7.375 5.5625C7.375 5.37708 7.42999 5.19582 7.533 5.04165C7.63601 4.88748 7.78243 4.76732 7.95374 4.69636C8.12504 4.62541 8.31354 4.60684 8.4954 4.64301C8.67726 4.67919 8.8443 4.76848 8.97542 4.89959C9.10653 5.0307 9.19582 5.19775 9.23199 5.3796C9.26816 5.56146 9.2496 5.74996 9.17864 5.92127C9.10768 6.09257 8.98752 6.23899 8.83335 6.342C8.67918 6.44502 8.49792 6.5 8.3125 6.5C8.06386 6.5 7.82541 6.40123 7.64959 6.22541C7.47378 6.0496 7.375 5.81114 7.375 5.5625Z" fill={errors.rear ? "#DD0707" : "#008080"} />
                        </svg>
                        </div>
                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                        onClick={() => setIsModalOpenRear(true)}
                        className="absolute right-2 top-1/2 transform -translate-y-1/2 h-5 w-5 text-[#006666] cursor-pointer"
                        />
                        {isModalOpenRear && (
                        <div className="absolute left-0 md:w-[430px] w-[330px] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-40"
                        ref={modalRef}>
                        <div className="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none" className="flex-shrink-0">
                        <path d="M8.125 0.875C6.51803 0.875 4.94714 1.35152 3.611 2.24431C2.27485 3.1371 1.23344 4.40605 0.618482 5.8907C0.00352044 7.37535 -0.157382 9.00901 0.156123 10.5851C0.469628 12.1612 1.24346 13.6089 2.37976 14.7452C3.51606 15.8815 4.9638 16.6554 6.5399 16.9689C8.11599 17.2824 9.74966 17.1215 11.2343 16.5065C12.719 15.8916 13.9879 14.8502 14.8807 13.514C15.7735 12.1779 16.25 10.607 16.25 9C16.2477 6.84581 15.391 4.78051 13.8677 3.25727C12.3445 1.73403 10.2792 0.877275 8.125 0.875ZM8.125 15.875C6.76526 15.875 5.43605 15.4718 4.30546 14.7164C3.17487 13.9609 2.29368 12.8872 1.77333 11.6309C1.25298 10.3747 1.11683 8.99237 1.3821 7.65875C1.64738 6.32513 2.30216 5.10013 3.26364 4.13864C4.22513 3.17716 5.45014 2.52237 6.78376 2.2571C8.11738 1.99183 9.49971 2.12798 10.756 2.64833C12.0122 3.16868 13.0859 4.04987 13.8414 5.18045C14.5968 6.31104 15 7.64025 15 9C14.9979 10.8227 14.2729 12.5702 12.9841 13.8591C11.6952 15.1479 9.94773 15.8729 8.125 15.875ZM9.375 12.75C9.375 12.9158 9.30916 13.0747 9.19195 13.1919C9.07474 13.3092 8.91576 13.375 8.75 13.375C8.41848 13.375 8.10054 13.2433 7.86612 13.0089C7.6317 12.7745 7.5 12.4565 7.5 12.125V9C7.33424 9 7.17527 8.93415 7.05806 8.81694C6.94085 8.69973 6.875 8.54076 6.875 8.375C6.875 8.20924 6.94085 8.05027 7.05806 7.93306C7.17527 7.81585 7.33424 7.75 7.5 7.75C7.83152 7.75 8.14947 7.8817 8.38389 8.11612C8.61831 8.35054 8.75 8.66848 8.75 9V12.125C8.91576 12.125 9.07474 12.1908 9.19195 12.3081C9.30916 12.4253 9.375 12.5842 9.375 12.75ZM6.875 5.5625C6.875 5.37708 6.92999 5.19582 7.033 5.04165C7.13601 4.88748 7.28243 4.76732 7.45374 4.69636C7.62504 4.62541 7.81354 4.60684 7.9954 4.64301C8.17726 4.67919 8.3443 4.76848 8.47542 4.89959C8.60653 5.0307 8.69582 5.19775 8.73199 5.3796C8.76816 5.56146 8.7496 5.74996 8.67864 5.92127C8.60768 6.09257 8.48752 6.23899 8.33335 6.342C8.17918 6.44502 7.99792 6.5 7.8125 6.5C7.56386 6.5 7.32541 6.40123 7.14959 6.22541C6.97378 6.0496 6.875 5.81114 6.875 5.5625Z" fill="#008080"/>
                        </svg>
                        <p className="text-sm text-[#2D2727] font-medium">
                            The <strong>rear boundary</strong> is at the back of the building, opposite the main entrance. It may face another property or open space. 
                        </p>
                        </div>
                        </div>
                    )}
                        </div>
                    </label>
                </div>
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 w-full">
                    <label className="flex flex-col w-full md:max-w-full">
                       <span className="block text-[10px] font-normal text-[#848A90] px-3">
                            Additional Specifications
                        </span>
                         <input
                            value={formData.addSpecs || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z0-9\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                            setFormData((prev) => ({ ...prev, addSpecs: cleaned }));
                            setErrors((prev) => ({ ...prev, addSpecs: "" }));
                        }}
                            type="text"
                            className="mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b 
                            border-[#848A90] focus:border-[#006666] placeholder-slate-400 
                            block w-full text-sm font-normal focus:ring-0 pr-10"/>
                    </label>
                </div>
                </div>
            <div className="relative flex flex-col md:flex-row gap-10 w-full max-w-[600px] m-6">
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-5 w-full">
                    <label className="flex flex-col w-full">
                       <span
                                className={`md:text-[10px] text-xs font-normal flex items-center px-3 ${
                                hasSubmitted && errors.roof ? "text-[#DD0707]" : "text-[#848A90]"
                                }`}
  >
                                Roof Construction <span className="text-red-500"> *</span>
                                 <div className={`${isModalOpenRoof ? "opacity-30" : "opacity-100"} transition-opacity`}>
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" className="ml-2 ">
                                <path d="M5.5 0.125C4.53582 0.125 3.59329 0.410914 2.7916 0.946586C1.98991 1.48226 1.36507 2.24363 0.996089 3.13442C0.627112 4.02521 0.530571 5.00541 0.718674 5.95107C0.906777 6.89672 1.37108 7.76536 2.05286 8.44715C2.73464 9.12893 3.60328 9.59323 4.54894 9.78133C5.49459 9.96943 6.47479 9.87289 7.36558 9.50391C8.25637 9.13494 9.01775 8.51009 9.55342 7.7084C10.0891 6.90671 10.375 5.96418 10.375 5C10.3736 3.70749 9.85958 2.46831 8.94564 1.55436C8.0317 0.640418 6.79251 0.126365 5.5 0.125ZM5.5 8C5.38875 8 5.28 7.96701 5.18749 7.9052C5.09499 7.84339 5.02289 7.75554 4.98032 7.65276C4.93775 7.54998 4.92661 7.43688 4.94831 7.32776C4.97001 7.21865 5.02359 7.11842 5.10225 7.03975C5.18092 6.96109 5.28115 6.90751 5.39026 6.88581C5.49938 6.8641 5.61248 6.87524 5.71526 6.91782C5.81804 6.96039 5.9059 7.03249 5.9677 7.12499C6.02951 7.21749 6.0625 7.32625 6.0625 7.4375C6.0625 7.58668 6.00324 7.72976 5.89775 7.83525C5.79226 7.94074 5.64919 8 5.5 8ZM5.875 5.71625V5.75C5.875 5.84946 5.83549 5.94484 5.76517 6.01517C5.69484 6.08549 5.59946 6.125 5.5 6.125C5.40055 6.125 5.30516 6.08549 5.23484 6.01517C5.16451 5.94484 5.125 5.84946 5.125 5.75V5.375C5.125 5.27554 5.16451 5.18016 5.23484 5.10983C5.30516 5.03951 5.40055 5 5.5 5C6.12016 5 6.625 4.57812 6.625 4.0625C6.625 3.54688 6.12016 3.125 5.5 3.125C4.87985 3.125 4.375 3.54688 4.375 4.0625V4.25C4.375 4.34946 4.33549 4.44484 4.26517 4.51516C4.19484 4.58549 4.09946 4.625 4 4.625C3.90055 4.625 3.80516 4.58549 3.73484 4.51516C3.66451 4.44484 3.625 4.34946 3.625 4.25V4.0625C3.625 3.13203 4.46594 2.375 5.5 2.375C6.53406 2.375 7.375 3.13203 7.375 4.0625C7.375 4.87719 6.73 5.55922 5.875 5.71625Z" fill="#217B7E" onClick={() => setIsModalOpenRoof(true)} className="cursor-pointer"/>
                                </svg>
                                </div>

                        </span>
                        <div className="relative w-full">
                            <DropdownSingle
                            ref={roofRef}
                            data={roofOptions}
                            defaultValue={[
                        formData.roof && formData.roof.name
                            ? formData.roof
                            : roofOptions[0],
                        ]}
                        handleDropdownChange={(selectedOption) => {
                        const selectedRoofType =
                            roofOptions.find((item) => item.id === selectedOption.id) ||
                            roofOptions[0];

                        setFormData((prev) => ({
                            ...prev,
                            roof: selectedRoofType,
                        }));

                        if (selectedRoofType.id === 1) {
                            setErrors((prev) => ({ ...prev, roof: "Roof type is required" }));
                        } else {
                            setErrors((prev) => ({ ...prev, roof: "" }));
                        }
                        }}
                        error={hasSubmitted && !!errors.roof}
                         />
                        {isModalOpenRoof && (
                        <div
                            ref={modalRef}
                            className="absolute bottom-full left-0 mb-4 md:w-[430px] w-[350px] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-1"
                        >
                              <div className="flex items-center gap-3 md:gap-8">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" className="flex-shrink-0">
                            <path d="M6 1.125C5.03582 1.125 4.09329 1.41091 3.2916 1.94659C2.48991 2.48226 1.86507 3.24363 1.49609 4.13442C1.12711 5.02521 1.03057 6.00541 1.21867 6.95107C1.40678 7.89672 1.87108 8.76536 2.55286 9.44715C3.23464 10.1289 4.10328 10.5932 5.04894 10.7813C5.99459 10.9694 6.97479 10.8729 7.86558 10.5039C8.75637 10.1349 9.51775 9.51009 10.0534 8.7084C10.5891 7.90671 10.875 6.96418 10.875 6C10.8736 4.70749 10.3596 3.46831 9.44564 2.55436C8.5317 1.64042 7.29251 1.12636 6 1.125ZM6 9C5.88875 9 5.78 8.96701 5.68749 8.9052C5.59499 8.84339 5.52289 8.75554 5.48032 8.65276C5.43775 8.54998 5.42661 8.43688 5.44831 8.32776C5.47001 8.21865 5.52359 8.11842 5.60225 8.03975C5.68092 7.96109 5.78115 7.90751 5.89026 7.88581C5.99938 7.8641 6.11248 7.87524 6.21526 7.91782C6.31804 7.96039 6.4059 8.03249 6.4677 8.12499C6.52951 8.21749 6.5625 8.32625 6.5625 8.4375C6.5625 8.58668 6.50324 8.72976 6.39775 8.83525C6.29226 8.94074 6.14919 9 6 9ZM6.375 6.71625V6.75C6.375 6.84946 6.33549 6.94484 6.26517 7.01517C6.19484 7.08549 6.09946 7.125 6 7.125C5.90055 7.125 5.80516 7.08549 5.73484 7.01517C5.66451 6.94484 5.625 6.84946 5.625 6.75V6.375C5.625 6.27554 5.66451 6.18016 5.73484 6.10983C5.80516 6.03951 5.90055 6 6 6C6.62016 6 7.125 5.57812 7.125 5.0625C7.125 4.54688 6.62016 4.125 6 4.125C5.37985 4.125 4.875 4.54688 4.875 5.0625V5.25C4.875 5.34946 4.83549 5.44484 4.76517 5.51516C4.69484 5.58549 4.59946 5.625 4.5 5.625C4.40055 5.625 4.30516 5.58549 4.23484 5.51516C4.16451 5.44484 4.125 5.34946 4.125 5.25V5.0625C4.125 4.13203 4.96594 3.375 6 3.375C7.03406 3.375 7.875 4.13203 7.875 5.0625C7.875 5.87719 7.23 6.55922 6.375 6.71625Z" fill="#217B7E"/>
                            </svg>

                            <p className="md:text-sm text-xs text-[#2D2727] font-medium">
                                <li><span className="font-bold">Type I</span>: Purely made of light materials.</li>
                                <li><span className="font-bold">Type II</span>: Combination of Class B and Light Materials.</li>
                                <li><span className="font-bold">Type III</span>: Primarily Wood/Timber (Over 50%).</li>
                                <li><span className="font-bold">Type IV</span>: Concrete/Steel Majority (50% - 80%).</li>
                                <li><span className="font-bold">Type V</span>: Mostly Concrete/Steel (80% - 100%)</li>
                            </p>
                            </div>
                        </div>
                        )}
                        </div>
                    </label>

                   <label className="flex flex-col w-full relative">
                       <span
                                className={`md:text-[10px] text-xs font-normal flex items-center px-3 ${
                                hasSubmitted && errors.wall ? "text-[#DD0707]" : "text-[#848A90]"
                                }`}
  >
                                Wall Construction <span className="text-red-500"> *</span>
                                <div className={`${isModalOpenWall ? "opacity-30" : "opacity-100"} transition-opacity`}>
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg" className="ml-2 ">
                                <path d="M5.5 0.125C4.53582 0.125 3.59329 0.410914 2.7916 0.946586C1.98991 1.48226 1.36507 2.24363 0.996089 3.13442C0.627112 4.02521 0.530571 5.00541 0.718674 5.95107C0.906777 6.89672 1.37108 7.76536 2.05286 8.44715C2.73464 9.12893 3.60328 9.59323 4.54894 9.78133C5.49459 9.96943 6.47479 9.87289 7.36558 9.50391C8.25637 9.13494 9.01775 8.51009 9.55342 7.7084C10.0891 6.90671 10.375 5.96418 10.375 5C10.3736 3.70749 9.85958 2.46831 8.94564 1.55436C8.0317 0.640418 6.79251 0.126365 5.5 0.125ZM5.5 8C5.38875 8 5.28 7.96701 5.18749 7.9052C5.09499 7.84339 5.02289 7.75554 4.98032 7.65276C4.93775 7.54998 4.92661 7.43688 4.94831 7.32776C4.97001 7.21865 5.02359 7.11842 5.10225 7.03975C5.18092 6.96109 5.28115 6.90751 5.39026 6.88581C5.49938 6.8641 5.61248 6.87524 5.71526 6.91782C5.81804 6.96039 5.9059 7.03249 5.9677 7.12499C6.02951 7.21749 6.0625 7.32625 6.0625 7.4375C6.0625 7.58668 6.00324 7.72976 5.89775 7.83525C5.79226 7.94074 5.64919 8 5.5 8ZM5.875 5.71625V5.75C5.875 5.84946 5.83549 5.94484 5.76517 6.01517C5.69484 6.08549 5.59946 6.125 5.5 6.125C5.40055 6.125 5.30516 6.08549 5.23484 6.01517C5.16451 5.94484 5.125 5.84946 5.125 5.75V5.375C5.125 5.27554 5.16451 5.18016 5.23484 5.10983C5.30516 5.03951 5.40055 5 5.5 5C6.12016 5 6.625 4.57812 6.625 4.0625C6.625 3.54688 6.12016 3.125 5.5 3.125C4.87985 3.125 4.375 3.54688 4.375 4.0625V4.25C4.375 4.34946 4.33549 4.44484 4.26517 4.51516C4.19484 4.58549 4.09946 4.625 4 4.625C3.90055 4.625 3.80516 4.58549 3.73484 4.51516C3.66451 4.44484 3.625 4.34946 3.625 4.25V4.0625C3.625 3.13203 4.46594 2.375 5.5 2.375C6.53406 2.375 7.375 3.13203 7.375 4.0625C7.375 4.87719 6.73 5.55922 5.875 5.71625Z" fill="#217B7E" onClick={() => setIsModalOpenWall(true)} className="cursor-pointer"/>
                                </svg>
                                </div>
                        </span>
                         <div className="relative w-full">
                         <DropdownSingle
                         ref={wallRef}
                        data={wallOptions}
                        defaultValue={[
                        formData.wall && formData.wall.name
                            ? formData.wall
                            : wallOptions[0],
                        ]}
                         handleDropdownChange={(selectedOption) => {
                        const selectedWallType =
                            wallOptions.find((item) => item.id === selectedOption.id) ||
                            wallOptions[0];

                        setFormData((prev) => ({
                            ...prev,
                            wall: selectedWallType,
                        }));

                        if (selectedWallType?.id === 1) {
                            setErrors((prev) => ({ ...prev, wall: "Wall type is required" }));
                        } else {
                            setErrors((prev) => ({ ...prev, wall: "" }));
                        }
                        }}
                        error={hasSubmitted && !!errors.wall}                   
                         />
                        </div>
            {isModalOpenWall && (
                <div ref={modalRef}
                className="absolute bottom-full left-0 md:w-[780px] w-[90vw] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-40 block md:hidden"
  >
                            <div className="flex items-center gap-3 md:gap-8">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" className="flex-shrink-0">
                            <path d="M6 1.125C5.03582 1.125 4.09329 1.41091 3.2916 1.94659C2.48991 2.48226 1.86507 3.24363 1.49609 4.13442C1.12711 5.02521 1.03057 6.00541 1.21867 6.95107C1.40678 7.89672 1.87108 8.76536 2.55286 9.44715C3.23464 10.1289 4.10328 10.5932 5.04894 10.7813C5.99459 10.9694 6.97479 10.8729 7.86558 10.5039C8.75637 10.1349 9.51775 9.51009 10.0534 8.7084C10.5891 7.90671 10.875 6.96418 10.875 6C10.8736 4.70749 10.3596 3.46831 9.44564 2.55436C8.5317 1.64042 7.29251 1.12636 6 1.125ZM6 9C5.88875 9 5.78 8.96701 5.68749 8.9052C5.59499 8.84339 5.52289 8.75554 5.48032 8.65276C5.43775 8.54998 5.42661 8.43688 5.44831 8.32776C5.47001 8.21865 5.52359 8.11842 5.60225 8.03975C5.68092 7.96109 5.78115 7.90751 5.89026 7.88581C5.99938 7.8641 6.11248 7.87524 6.21526 7.91782C6.31804 7.96039 6.4059 8.03249 6.4677 8.12499C6.52951 8.21749 6.5625 8.32625 6.5625 8.4375C6.5625 8.58668 6.50324 8.72976 6.39775 8.83525C6.29226 8.94074 6.14919 9 6 9ZM6.375 6.71625V6.75C6.375 6.84946 6.33549 6.94484 6.26517 7.01517C6.19484 7.08549 6.09946 7.125 6 7.125C5.90055 7.125 5.80516 7.08549 5.73484 7.01517C5.66451 6.94484 5.625 6.84946 5.625 6.75V6.375C5.625 6.27554 5.66451 6.18016 5.73484 6.10983C5.80516 6.03951 5.90055 6 6 6C6.62016 6 7.125 5.57812 7.125 5.0625C7.125 4.54688 6.62016 4.125 6 4.125C5.37985 4.125 4.875 4.54688 4.875 5.0625V5.25C4.875 5.34946 4.83549 5.44484 4.76517 5.51516C4.69484 5.58549 4.59946 5.625 4.5 5.625C4.40055 5.625 4.30516 5.58549 4.23484 5.51516C4.16451 5.44484 4.125 5.34946 4.125 5.25V5.0625C4.125 4.13203 4.96594 3.375 6 3.375C7.03406 3.375 7.875 4.13203 7.875 5.0625C7.875 5.87719 7.23 6.55922 6.375 6.71625Z" fill="#217B7E"/>
                            </svg>

                            <p className="md:text-sm text-xs text-[#2D2727] font-medium">
                                <li><span className="font-bold">CLASS A</span>: Building with exterior walls and roof, constructed of reinforced concrete, concrete hollow blocks, brick, stone, sheets of galvanized iron, steel, asbestos, aluminum or other forms of sheet rated as fire resistant without any element of timber and light material as part of the construction. Open-sided structures with solid or hard roof with posts other than timber and light material.</li>
                                <li><span className="font-bold">CLASS B</span>: All other types of construction except Light Materials.</li>
                            </p>
                            </div>
                        </div>
                        )}
                    </label>

                    <label className="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                hasSubmitted && errors.storey
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Number of Storeys
                        </span>
                       <div className="relative w-full">
                         <input
                            type="text"
                            placeholder={errors.storey ? "Enter Number" : " "}
                            ref={storeyRef}
                            value={formData.storey || ""}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^0-9]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 3);

                            setFormData((prev) => ({
                            ...prev,
                            storey: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, storey: "" }));
                        }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.storey ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />
                        </div>
                    </label>
                </div>
                 {isModalOpenWall && (
                <div ref={modalRef}
                className="absolute bottom-full left-0 md:w-[780px] w-[90vw] bg-white p-3 rounded-md shadow-lg border border-gray-200 z-40 hidden md:block"
  >
                            <div className="flex items-center gap-3 md:gap-8">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" className="flex-shrink-0">
                            <path d="M6 1.125C5.03582 1.125 4.09329 1.41091 3.2916 1.94659C2.48991 2.48226 1.86507 3.24363 1.49609 4.13442C1.12711 5.02521 1.03057 6.00541 1.21867 6.95107C1.40678 7.89672 1.87108 8.76536 2.55286 9.44715C3.23464 10.1289 4.10328 10.5932 5.04894 10.7813C5.99459 10.9694 6.97479 10.8729 7.86558 10.5039C8.75637 10.1349 9.51775 9.51009 10.0534 8.7084C10.5891 7.90671 10.875 6.96418 10.875 6C10.8736 4.70749 10.3596 3.46831 9.44564 2.55436C8.5317 1.64042 7.29251 1.12636 6 1.125ZM6 9C5.88875 9 5.78 8.96701 5.68749 8.9052C5.59499 8.84339 5.52289 8.75554 5.48032 8.65276C5.43775 8.54998 5.42661 8.43688 5.44831 8.32776C5.47001 8.21865 5.52359 8.11842 5.60225 8.03975C5.68092 7.96109 5.78115 7.90751 5.89026 7.88581C5.99938 7.8641 6.11248 7.87524 6.21526 7.91782C6.31804 7.96039 6.4059 8.03249 6.4677 8.12499C6.52951 8.21749 6.5625 8.32625 6.5625 8.4375C6.5625 8.58668 6.50324 8.72976 6.39775 8.83525C6.29226 8.94074 6.14919 9 6 9ZM6.375 6.71625V6.75C6.375 6.84946 6.33549 6.94484 6.26517 7.01517C6.19484 7.08549 6.09946 7.125 6 7.125C5.90055 7.125 5.80516 7.08549 5.73484 7.01517C5.66451 6.94484 5.625 6.84946 5.625 6.75V6.375C5.625 6.27554 5.66451 6.18016 5.73484 6.10983C5.80516 6.03951 5.90055 6 6 6C6.62016 6 7.125 5.57812 7.125 5.0625C7.125 4.54688 6.62016 4.125 6 4.125C5.37985 4.125 4.875 4.54688 4.875 5.0625V5.25C4.875 5.34946 4.83549 5.44484 4.76517 5.51516C4.69484 5.58549 4.59946 5.625 4.5 5.625C4.40055 5.625 4.30516 5.58549 4.23484 5.51516C4.16451 5.44484 4.125 5.34946 4.125 5.25V5.0625C4.125 4.13203 4.96594 3.375 6 3.375C7.03406 3.375 7.875 4.13203 7.875 5.0625C7.875 5.87719 7.23 6.55922 6.375 6.71625Z" fill="#217B7E"/>
                            </svg>

                            <p className="md:text-sm text-xs text-[#2D2727] font-medium">
                                <li><span className="font-bold">CLASS A</span>: Building with exterior walls and roof, constructed of reinforced concrete, concrete hollow blocks, brick, stone, sheets of galvanized iron, steel, asbestos, aluminum or other forms of sheet rated as fire resistant without any element of timber and light material as part of the construction. Open-sided structures with solid or hard roof with posts other than timber and light material.</li>
                                <li><span className="font-bold">CLASS B</span>: All other types of construction except Light Materials.</li>
                            </p>
                            </div>
                        </div>
                        )}
                </div>
            <div ref={unitPhotosRef}> 
            <div className="space-y-0">
                  <div className="flex flex-col items-center justify-center w-full py-6 md:py-12 gap-4">
                    <h3 className="text-[#2D2727] md:text-base text-sm font-medium md:block hidden">
                    Photo(s) of the Unit
                </h3>
                <h3 className="text-[#2D2727] md:text-base text-sm font-medium md:hidden block">
                    Other Specifications
                </h3>
            <div className="md:w-[780px] w-[340px] mb-5">
                <div className="flex flex-col bg-[#F5F5F5] border-l-4 border-[#003592] py-4 px-3 md:px-4 rounded-md">
                     <div className="flex items-start md:gap-4 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className='flex shrink-0 md:mt-0 mt-4 md:w-[25px] md:h-[24px] w-[15px] h-[15px]'>
                    <path d="M21.6744 9.63937C21.3209 9.27 20.9553 8.88938 20.8175 8.55469C20.69 8.24813 20.6825 7.74 20.675 7.24781C20.6609 6.33281 20.6459 5.29594 19.925 4.575C19.2041 3.85406 18.1672 3.83906 17.2522 3.825C16.76 3.8175 16.2519 3.81 15.9453 3.6825C15.6116 3.54469 15.23 3.17906 14.8606 2.82562C14.2137 2.20406 13.4788 1.5 12.5 1.5C11.5212 1.5 10.7872 2.20406 10.1394 2.82562C9.77 3.17906 9.38938 3.54469 9.05469 3.6825C8.75 3.81 8.24 3.8175 7.74781 3.825C6.83281 3.83906 5.79594 3.85406 5.075 4.575C4.35406 5.29594 4.34375 6.33281 4.325 7.24781C4.3175 7.74 4.31 8.24813 4.1825 8.55469C4.04469 8.88844 3.67906 9.27 3.32562 9.63937C2.70406 10.2863 2 11.0212 2 12C2 12.9788 2.70406 13.7128 3.32562 14.3606C3.67906 14.73 4.04469 15.1106 4.1825 15.4453C4.31 15.7519 4.3175 16.26 4.325 16.7522C4.33906 17.6672 4.35406 18.7041 5.075 19.425C5.79594 20.1459 6.83281 20.1609 7.74781 20.175C8.24 20.1825 8.74813 20.19 9.05469 20.3175C9.38844 20.4553 9.77 20.8209 10.1394 21.1744C10.7863 21.7959 11.5212 22.5 12.5 22.5C13.4788 22.5 14.2128 21.7959 14.8606 21.1744C15.23 20.8209 15.6106 20.4553 15.9453 20.3175C16.2519 20.19 16.76 20.1825 17.2522 20.175C18.1672 20.1609 19.2041 20.1459 19.925 19.425C20.6459 18.7041 20.6609 17.6672 20.675 16.7522C20.6825 16.26 20.69 15.7519 20.8175 15.4453C20.9553 15.1116 21.3209 14.73 21.6744 14.3606C22.2959 13.7137 23 12.9788 23 12C23 11.0212 22.2959 10.2872 21.6744 9.63937ZM20.5916 13.3228C20.1425 13.7916 19.6775 14.2763 19.4309 14.8716C19.1947 15.4434 19.1844 16.0969 19.175 16.7297C19.1656 17.3859 19.1553 18.0731 18.8638 18.3638C18.5722 18.6544 17.8897 18.6656 17.2297 18.675C16.5969 18.6844 15.9434 18.6947 15.3716 18.9309C14.7763 19.1775 14.2916 19.6425 13.8228 20.0916C13.3541 20.5406 12.875 21 12.5 21C12.125 21 11.6422 20.5387 11.1772 20.0916C10.7122 19.6444 10.2238 19.1775 9.62844 18.9309C9.05656 18.6947 8.40313 18.6844 7.77031 18.675C7.11406 18.6656 6.42688 18.6553 6.13625 18.3638C5.84562 18.0722 5.83437 17.3897 5.825 16.7297C5.81562 16.0969 5.80531 15.4434 5.56906 14.8716C5.3225 14.2763 4.8575 13.7916 4.40844 13.3228C3.95937 12.8541 3.5 12.375 3.5 12C3.5 11.625 3.96125 11.1422 4.40844 10.6772C4.85562 10.2122 5.3225 9.72375 5.56906 9.12844C5.80531 8.55656 5.81562 7.90313 5.825 7.27031C5.83437 6.61406 5.84469 5.92688 6.13625 5.63625C6.42781 5.34562 7.11031 5.33437 7.77031 5.325C8.40313 5.31562 9.05656 5.30531 9.62844 5.06906C10.2238 4.8225 10.7084 4.3575 11.1772 3.90844C11.6459 3.45937 12.125 3 12.5 3C12.875 3 13.3578 3.46125 13.8228 3.90844C14.2878 4.35562 14.7763 4.8225 15.3716 5.06906C15.9434 5.30531 16.5969 5.31562 17.2297 5.325C17.8859 5.33437 18.5731 5.34469 18.8638 5.63625C19.1544 5.92781 19.1656 6.61031 19.175 7.27031C19.1844 7.90313 19.1947 8.55656 19.4309 9.12844C19.6775 9.72375 20.1425 10.2084 20.5916 10.6772C21.0406 11.1459 21.5 11.625 21.5 12C21.5 12.375 21.0387 12.8578 20.5916 13.3228ZM16.7806 9.21937C16.8504 9.28903 16.9057 9.37175 16.9434 9.46279C16.9812 9.55384 17.0006 9.65144 17.0006 9.75C17.0006 9.84856 16.9812 9.94616 16.9434 10.0372C16.9057 10.1283 16.8504 10.211 16.7806 10.2806L11.5306 15.5306C11.461 15.6004 11.3783 15.6557 11.2872 15.6934C11.1962 15.7312 11.0986 15.7506 11 15.7506C10.9014 15.7506 10.8038 15.7312 10.7128 15.6934C10.6217 15.6557 10.539 15.6004 10.4694 15.5306L8.21937 13.2806C8.07864 13.1399 7.99958 12.949 7.99958 12.75C7.99958 12.551 8.07864 12.3601 8.21937 12.2194C8.36011 12.0786 8.55098 11.9996 8.75 11.9996C8.94902 11.9996 9.13989 12.0786 9.28063 12.2194L11 13.9397L15.7194 9.21937C15.789 9.14964 15.8717 9.09432 15.9628 9.05658C16.0538 9.01884 16.1514 8.99941 16.25 8.99941C16.3486 8.99941 16.4462 9.01884 16.5372 9.05658C16.6283 9.09432 16.711 9.14964 16.7806 9.21937Z" fill="#003592"/>
                    </svg>
                    <p className="text-[#2D2727] text-xs font-normal mb-1">
                    Uploading photos of the unit is <strong>optional</strong>. However, doing so will speed up the evaluation and creation of your request.
                    </p>
                    </div>
                </div>
            </div>

            {/* Photos Upload */}
            {unitUploadOpen && (
            <div>
                {(formData.unitFiles || []).length === 0 && (
                <div
                    onClick={() => unitUploadInput.current?.click()}
                    className="flex flex-col items-center justify-center cursor-pointer hover:bg-teal-50 transition space-y-2"
                >
                    <button
                        className="flex items-center gap-2 px-4 py-3 md:py-4 rounded font-medium transition bg-[#E4509A] text-white border border-[#E4509A]"
                        onClick={() => setSelected(!selected)}
                    >
                        <div className="flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className="md:w-[24px] md:h-[24px] w-[20px] h-[20px] flex shrink-0">
                        <path d="M21.5 14.2496V19.4996C21.5 19.8974 21.342 20.279 21.0607 20.5603C20.7794 20.8416 20.3978 20.9996 20 20.9996H5C4.60218 20.9996 4.22064 20.8416 3.93934 20.5603C3.65804 20.279 3.5 19.8974 3.5 19.4996V14.2496C3.5 14.0507 3.57902 13.8599 3.71967 13.7193C3.86032 13.5786 4.05109 13.4996 4.25 13.4996C4.44891 13.4996 4.63968 13.5786 4.78033 13.7193C4.92098 13.8599 5 14.0507 5 14.2496V19.4996H20V14.2496C20 14.0507 20.079 13.8599 20.2197 13.7193C20.3603 13.5786 20.5511 13.4996 20.75 13.4996C20.9489 13.4996 21.1397 13.5786 21.2803 13.7193C21.421 13.8599 21.5 14.0507 21.5 14.2496ZM9.28063 8.03024L11.75 5.55993V14.2496C11.75 14.4485 11.829 14.6393 11.9697 14.7799C12.1103 14.9206 12.3011 14.9996 12.5 14.9996C12.6989 14.9996 12.8897 14.9206 13.0303 14.7799C13.171 14.6393 13.25 14.4485 13.25 14.2496V5.55993L15.7194 8.03024C15.8601 8.17097 16.051 8.25003 16.25 8.25003C16.449 8.25003 16.6399 8.17097 16.7806 8.03024C16.9214 7.88951 17.0004 7.69864 17.0004 7.49961C17.0004 7.30059 16.9214 7.10972 16.7806 6.96899L13.0306 3.21899C12.961 3.14926 12.8783 3.09394 12.7872 3.05619C12.6962 3.01845 12.5986 2.99902 12.5 2.99902C12.4014 2.99902 12.3038 3.01845 12.2128 3.05619C12.1217 3.09394 12.039 3.14926 11.9694 3.21899L8.21937 6.96899C8.07864 7.10972 7.99958 7.30059 7.99958 7.49961C7.99958 7.69864 8.07864 7.88951 8.21937 8.03024C8.36011 8.17097 8.55098 8.25003 8.75 8.25003C8.94902 8.25003 9.13989 8.17097 9.28063 8.03024Z" fill="white"/>
                        </svg>
                        <span className="flex items-center justify-center gap-1 md:text-base text-sm font-normal">Upload Photo</span>
                        </div>
                    </button>
                </div>
                )}

                {formData.unitFiles && formData.unitFiles.length > 0 && (
                <div className="space-y-3 flex flex-col gap-3 items-center justify-center cursor-pointer">
                    {(formData.unitFiles || []).map((file, index) => (
                    <div key={index} className="md:w-[780px] w-[340px] flex flex-wrap items-center justify-between border border-dashed border-[#90CCCC] bg-white md:p-6 p-2 rounded-md">
                        <div className="flex items-center space-x-3">
                        {getFileIcon(file)}
                        <button
                            onClick={() => {
                            const url = URL.createObjectURL(file);
                            if (file.type.startsWith('image/')) {
                                setPreviewFileURL(url);
                                setPreviewFileType('image');
                            } else if (file.type === 'application/pdf') {
                                window.open(url, '_blank');
                            }
                            }}
                            className="text-sm text-[#2D2727] font-normal md:max-w-[620px] max-w-[180px] truncate"
                        >
                            {shortenFileNameUpload(file.name)}
                        </button>
                        </div>
                        <button
                        onClick={() => handleRemoveUnitFile(index)}
                        className="bg-[#DD0707] text-white text-xs py-1 px-4 rounded-full"
                        >
                        Remove
                        </button>
                    </div>
                    ))}
                
                    <button
                        className="flex items-center gap-2 px-4 py-3 md:py-4 rounded font-medium transition bg-[#E4509A] text-white border border-[#E4509A]"
                        onClick={() => unitUploadInput.current?.click()}
                    >
                        <div className="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none" className="md:w-[24px] md:h-[24px] w-[20px] h-[20px] flex shrink-0">
                        <path d="M21.5 14.2496V19.4996C21.5 19.8974 21.342 20.279 21.0607 20.5603C20.7794 20.8416 20.3978 20.9996 20 20.9996H5C4.60218 20.9996 4.22064 20.8416 3.93934 20.5603C3.65804 20.279 3.5 19.8974 3.5 19.4996V14.2496C3.5 14.0507 3.57902 13.8599 3.71967 13.7193C3.86032 13.5786 4.05109 13.4996 4.25 13.4996C4.44891 13.4996 4.63968 13.5786 4.78033 13.7193C4.92098 13.8599 5 14.0507 5 14.2496V19.4996H20V14.2496C20 14.0507 20.079 13.8599 20.2197 13.7193C20.3603 13.5786 20.5511 13.4996 20.75 13.4996C20.9489 13.4996 21.1397 13.5786 21.2803 13.7193C21.421 13.8599 21.5 14.0507 21.5 14.2496ZM9.28063 8.03024L11.75 5.55993V14.2496C11.75 14.4485 11.829 14.6393 11.9697 14.7799C12.1103 14.9206 12.3011 14.9996 12.5 14.9996C12.6989 14.9996 12.8897 14.9206 13.0303 14.7799C13.171 14.6393 13.25 14.4485 13.25 14.2496V5.55993L15.7194 8.03024C15.8601 8.17097 16.051 8.25003 16.25 8.25003C16.449 8.25003 16.6399 8.17097 16.7806 8.03024C16.9214 7.88951 17.0004 7.69864 17.0004 7.49961C17.0004 7.30059 16.9214 7.10972 16.7806 6.96899L13.0306 3.21899C12.961 3.14926 12.8783 3.09394 12.7872 3.05619C12.6962 3.01845 12.5986 2.99902 12.5 2.99902C12.4014 2.99902 12.3038 3.01845 12.2128 3.05619C12.1217 3.09394 12.039 3.14926 11.9694 3.21899L8.21937 6.96899C8.07864 7.10972 7.99958 7.30059 7.99958 7.49961C7.99958 7.69864 8.07864 7.88951 8.21937 8.03024C8.36011 8.17097 8.55098 8.25003 8.75 8.25003C8.94902 8.25003 9.13989 8.17097 9.28063 8.03024Z" fill="white"/>
                        </svg>
                        <span className="flex items-center justify-center gap-1 md:text-base text-sm font-normal">Upload another photo</span>
                        </div>
                    </button>
                </div>
                )}

                <input
                type="file"
                name="uploads[unit_photos][]"
                ref={unitUploadInput}
                className="hidden"
                multiple
                accept=".jpg,.jpeg,.png,.pdf"
                onChange={handleUnitFileChange}
                />
            </div>
            )}
        </div>
        </div>
        </div>
                 <div className="flex flex-col items-center justify-center w-full py-6 md:py-12 md:gap-8 gap-4">
                 <div className="flex items-center md:gap-9 gap-2 md:mb-5">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium">
                    Does the property have mortgage?
                    </h3>
                    <span>
                            {(formData.hasMortgage === "No" || (
                            formData.hasMortgage === "Yes" &&
                            formData.mortgagee?.id !== 1 &&
                            formData.bank?.id !== 1 &&
                           formData.branch?.trim()
                        )) ? (
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[22px] md:h-[23px] w-[15px] h-[15px]">
                    <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.28049 0.83733 7.29048C0.00476613 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8165 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9969 8.58356 20.837 5.78746 18.7748 3.72523C16.7125 1.66299 13.9164 0.50308 11 0.5ZM15.8294 9.56019L9.90635 15.4833C9.82776 15.5619 9.73444 15.6244 9.63172 15.6669C9.529 15.7095 9.41889 15.7314 9.3077 15.7314C9.1965 15.7314 9.08639 15.7095 8.98367 15.6669C8.88095 15.6244 8.78763 15.5619 8.70904 15.4833L6.17058 12.9448C6.01181 12.786 5.92261 12.5707 5.92261 12.3462C5.92261 12.1216 6.01181 11.9063 6.17058 11.7475C6.32935 11.5887 6.5447 11.4995 6.76923 11.4995C6.99377 11.4995 7.20912 11.5887 7.36789 11.7475L9.3077 13.6884L14.6321 8.36288C14.7107 8.28427 14.8041 8.2219 14.9068 8.17936C15.0095 8.13681 15.1196 8.11491 15.2308 8.11491C15.342 8.11491 15.452 8.13681 15.5548 8.17936C15.6575 8.2219 15.7508 8.28427 15.8294 8.36288C15.908 8.4415 15.9704 8.53483 16.0129 8.63755C16.0555 8.74026 16.0774 8.85036 16.0774 8.96154C16.0774 9.07272 16.0555 9.18281 16.0129 9.28553C15.9704 9.38824 15.908 9.48158 15.8294 9.56019Z" fill="#039855"/>
                    </svg>
                                            ) : (
                                                ""
                                            )}
                                            {hasSubmitted && formData.hasMortgage === "Yes" && (
                                            (!formData.mortgagee || formData.mortgagee.id === 1 ||
                                            !formData.bank || formData.bank.id === 1 ||
                                            !formData.branch.trim())) ? (
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
            <div className="flex flex-col items-center justify-center w-full gap-7 md:mb-5 mb-4">
                <div className="flex justify-center items-center w-full md:gap-9 gap-4">
                    {/* Yes Button */}
                    <button
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.hasMortgage === "Yes"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        hasMortgage: "Yes",
                    }));

                    setErrors((prev) => {
                        const newErrors = { ...prev };
                        delete newErrors.hasMortgage;
                        delete newErrors.mortgagee;
                        delete newErrors.bank;
                        delete newErrors.branch;
                        return newErrors;
                    });
                    setHasSubmitted(false);
                    }}
                    >
                    {formData.hasMortgage === "Yes" && (
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
                    type="button"
                    className={`flex items-center gap-2 md:px-9 px-5 py-2 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                        formData.hasMortgage === "No"
                        ? "bg-[#E4509A] text-white"
                        : "text-[#E4509A] border border-[#E4509A]"
                    }`}
                    onClick={() => {
                    setFormData((prev) => ({
                        ...prev,
                        hasMortgage: "No",
                        mortgagee: { id: 1, name: "Select Mortgagee Type", default: true },
                        bank: { id: 1, name: "Select Bank", default: true },
                        branch: "",
                    }));
                    setErrors({});
                    }}
                    >
                    {formData.hasMortgage === "No" && (
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
                </div>
            {formData.hasMortgage === "Yes" && (
                <div className="flex flex-col items-center justify-center py-6 md:py-6 md:max-w-[600px] w-full md:mb-0 mb-5">
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 mb-9 w-full">
                <label className="flex flex-col w-full">
                <span
                            class={` after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                hasSubmitted && errors.mortgagee
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                    Select Mortgagee Type
                </span>
                  <DropdownSingle
                    ref={mortgageeRef}
                    data={mortgageeOptions}
                    defaultValue={[
                        formData.mortgagee
                        ? mortgageeOptions.find(
                            (item) => item.id === formData.mortgagee?.id
                            ) || mortgageeOptions[0]
                        : mortgageeOptions[0],
                    ]}
                    handleDropdownChange={handleMortgageeChange}
                    error={hasSubmitted && !!errors.mortgagee}
                    />

                </label>

                <label className="flex flex-col w-full"> 
            <span
                className={`after:text-red-500 block md:text-[10px] text-xs font-normal px-3 ${
                hasSubmitted && errors.bank ? "text-[#DD0707]" : "text-[#848A90]"
                }`}
            >
                {["Non-Bank", "Others"].includes(formData?.mortgagee?.name)
                ? "Enter Mortgagee"
                : "Enter Bank"}
            </span>

            <DropdownSingle
                ref={bankRef}
                key={formData?.mortgagee?.name}
                data={bankOptions}
                defaultValue={[
                formData.bank && formData.bank.name
                    ? formData.bank
                    : {
                        id: 1,
                        name: ["Non-Bank", "Others"].includes(formData?.mortgagee?.name)
                        ? "Select Mortgagee"
                        : "Select Bank",
                        default: true,
                    },
                ]}
                handleDropdownChange={(value) => {
                setFormData((prev) => ({ ...prev, bank: value }));
                setErrors((prev) => ({ ...prev, bank: "" }));
                }}
                error={!!errors.bank}
            />
            </label>

            </div>
                <div className="flex flex-col md:flex-row gap-7 md:gap-10 w-full">
                    <label className="flex flex-col w-full md:max-w-full">
                        <span
                            class={` after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90] px-3 ${
                                hasSubmitted && errors.branch
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Enter Mortgagee Location (if applicable)
                        </span>
                         <input
                            value={formData.branch || ""}
                            ref={branchRef}
                            maxLength={100}
                            onChange={(e) => {
                            let rawValue = e.target.value;

                            let cleaned = rawValue.replace(/[^a-zA-Z\s#,.-]/g, "");
                            cleaned = cleaned.replace(/\s+/g, " ").trimStart();
                            cleaned = cleaned.slice(0, 100);

                            setFormData((prev) => ({
                            ...prev,
                            branch: cleaned,
                            }));

                            setErrors((prev) => ({ ...prev, branch: "" }));
                        }}
                className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 block w-full text-sm font-normal focus:ring-0
                    placeholder:text-sm placeholder:font-normal
                    ${errors.branch ? "border-b-[#DD0707] placeholder-[#DD0707]" : "border-[#006666] placeholder-[#848A90]"}
                    focus:border-[#006666]`}
                />

                    </label>
                </div>
                </div>
                 )}
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full md:py-20 gap-5 md:mb-0 mb-6">
                <a className="text-[#008080] md:px-5 px-3 py-3 md:text-[23px] text-base font-medium w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded" href="https://www.cocogen.com/get-quote">
                    <span>Cancel</span>
                </a>
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

export default CondominiumInfo