import { useState, useRef, useEffect } from "react";
import { forwardRef, useImperativeHandle } from "react";
import getFileIcon from "../../components/FileIcon";
import toast from "../../components/ToastV2.jsx";


const UploadSection = forwardRef(({ documents, refs }, ref) => {
  const [validationErrors, setValidationErrors] = useState({
    motorClaims: [],
    vehiclePhotos: false,
    identification: false,
  });
const [hasValidated, setHasValidated] = useState(false);

const validateUploads = (triggerUI = true) => {
  if (triggerUI) setHasValidated(true);

  const motorClaimsMissing = documents
    .filter((doc) => !uploadedFiles[doc.ref])
    .map((doc) => doc.label);

  const vehiclePhotosMissing = vehicleFiles.length === 0;
  const identificationMissing = !identificationFile;

  setValidationErrors({
    motorClaims: motorClaimsMissing,
    vehiclePhotos: vehiclePhotosMissing,
    identification: identificationMissing,
  });

  return (
    motorClaimsMissing.length === 0 &&
    !vehiclePhotosMissing &&
    !identificationMissing
  );
};

useEffect(() => {
  setUploadedFiles((prev) => {
    const newRefs = documents.map((doc) => doc.ref);
    const filtered = {};
    for (const key in prev) {
      if (newRefs.includes(key)) {
        filtered[key] = prev[key];
      }
    }
    return filtered;
  });

  if (hasValidated) {
    validateUploads();
  }
}, [documents]);

useImperativeHandle(ref, () => ({
  validateUploads,
  validationErrors,
  getAllUploads: () => ({
    motorClaims: uploadedFiles, 
    vehiclePhotos: vehicleFiles, 
    identification: identificationFile, 
    policeReport: policeReportFile, 
    additionalDocs: additionalDocsFile, 
  }),
}));


const [motorUploadOpen, setMotorUploadOpen] = useState(true);
const [vehicleUploadOpen, setVehicleUploadOpen] = useState(true);
const [uploadIdentificationOpen, setUploadIdentificationOpen] = useState(true);
const [uploadPoliceOpen, setUploadPoliceOpen] = useState(true);
const [uploadAdditionalOpen, setUploadAdditionalOpen] = useState(true);
const [uploadedFiles, setUploadedFiles] = useState({});
const [previewFileURL, setPreviewFileURL] = useState(null);
const [previewFileType, setPreviewFileType] = useState(null); 


const handleUploadClick = (ref) => {
  fileInputs[ref]?.current?.click();
};
const handleRemoveFile = (ref) => {
  setUploadedFiles((prev) => {
    const { [ref]: _, ...updated } = prev;
    return updated;
  });

  fileInputs[ref]?.current && (fileInputs[ref].current.value = null);
};

const handleFileChange = (ref, event) => {
  let file = event.target.files[0];
  const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
  const maxSize = 5 * 1024 * 1024; // 5MB

  if (file) {
    if (!allowedTypes.includes(file.type)) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              Invalid file format. Only JPG, JPEG, PNG, and PDF are allowed.</span>
        );
      return;
    }

    if (file.size > maxSize) {
       toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              File size exceeds 5MB limit.</span>
        );
      return;
    }
  const renameMap = {
    stencil: "Stencils_of_Motor_and_Serial_No",
    incident: "Claimants_Incident_Report",
    damage: "Pictures_of_Damage",
    regcert: "Registration_Certificate_and_OR",
    policy: "Copy_of_Insurance_Policy",
    prempayment: "Copy_of_OR_Proof_Premium_Payment",
    medreceipts: "Original_Medical_Receipts",
    medcert: "Medical_Certificate",
    quotation: "Quotation_of_Repair_Estimate",
    ctpl: "Certificate_of_No_Claim_or_CTPL",
    identification: "Drivers_License",
    policeReport: "Police_Report_or_Drivers_Affidavit"
  };

  const getExtensionFromType = (type) => {
    switch (type) {
      case 'image/jpeg':
      case 'image/jpg':
        return '.jpg';
      case 'image/png':
        return '.png';
      case 'application/pdf':
        return '.pdf';
      default:
        return '';
    }
  };

  if (file && renameMap[ref]) {
    const extension = getExtensionFromType(file.type);
    const newName = renameMap[ref] + extension;
    file = new File([file], newName, { type: file.type });
  }

    setUploadedFiles((prev) => ({
      ...prev,
      [ref]: file,
    }));
        setValidationErrors((prev) => ({
      ...prev,
      motorClaims: prev.motorClaims.filter(label => label !== documents.find(d => d.ref === ref)?.label)
    }));
  }
};

const fileInputs = {
  incident: useRef(),
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
const vehicleUploadInput = useRef();
const [vehicleFiles, setVehicleFiles] = useState([]);

// const handleVehicleFileChange = (event) => {
//   const newFiles = Array.from(event.target.files);
//   setVehicleFiles((prev) => [...prev, ...newFiles]);
// };
const handleVehicleFileChange = (event) => {
  const newFiles = Array.from(event.target.files);
  const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
  const maxSize = 5 * 1024 * 1024; // 5MB

  const getExtensionFromType = (type) => {
  switch (type) {
    case 'image/jpeg':
    case 'image/jpg':
      return '.jpg';
    case 'image/png':
      return '.png';
    case 'application/pdf':
      return '.pdf';
    default:
      return '';
  }
};

  const validFiles = newFiles.filter(file => {
    if (!allowedTypes.includes(file.type)) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              Invalid file format. Only JPG, JPEG, PNG, and PDF are allowed.</span>
        );
      return false;
    }
    if (file.size > maxSize) {
       toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              File size exceeds 5MB limit.</span>
        );
      return false;
    }
    return true;
  })
  
  .map((file, index) => {
      const extension = getExtensionFromType(file.type);
      const count = vehicleFiles.length + index + 1;
      return new File([file], `Vehicle_Photo${count}${extension}`, { type: file.type });
    });

 if (vehicleUploadInput.current) {
    vehicleUploadInput.current.value = null;
  }
  setVehicleFiles((prev) => [...prev, ...validFiles]);
  setValidationErrors((prev) => ({
      ...prev,
      vehiclePhotos: false
    }));
};

const handleRemoveVehicleFile = (index) => {
  setVehicleFiles((prev) => {
    const newFiles = prev.filter((_, i) => i !== index);
    if (vehicleUploadInput.current) {
      vehicleUploadInput.current.value = null; 
    }
    return newFiles;
  });
  setValidationErrors((prev) => ({
    ...prev,
    vehiclePhotos: vehicleFiles.length <= 1, 
  }));
};

const identificationUploadInput = useRef();
const [identificationFile, setIdentificationFile] = useState(null);

const handleIdentificationFileChange = (event) => {
  let file = event.target.files[0];
  const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
  const maxSize = 5 * 1024 * 1024; 
  const getExtensionFromType = (type) => {
  switch (type) {
    case 'image/jpeg':
    case 'image/jpg':
      return '.jpg';
    case 'image/png':
      return '.png';
    case 'application/pdf':
      return '.pdf';
    default:
      return '';
  }
};

  if (file) {
    if (!allowedTypes.includes(file.type)) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              Invalid file format. Only JPG, JPEG, PNG, and PDF are allowed.</span>
        );
      return;
    }

    if (file.size > maxSize) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              File size exceeds 5MB limit.</span>
        );
      return;
    }
  const extension = getExtensionFromType(file.type);
  file = new File([file], `Drivers_License${extension}`, { type: file.type });
    setIdentificationFile(file);
     setValidationErrors((prev) => ({
      ...prev,
      identification: false
    }));
  }
};
  
const handleRemoveIdentificationFile = () => {
  setIdentificationFile(null);
  if (identificationUploadInput.current) {
    identificationUploadInput.current.value = null;
  }
  setValidationErrors((prev) => ({
    ...prev,
    identification: true, 
  }));
};

const policeReportUploadInput = useRef();
const [policeReportFile, setPoliceReportFile] = useState(null);

const handlePoliceReportFileChange = (event) => {
   let file = event.target.files[0];
  const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
  const maxSize = 5 * 1024 * 1024; 
  const getExtensionFromType = (type) => {
  switch (type) {
    case 'image/jpeg':
    case 'image/jpg':
      return '.jpg';
    case 'image/png':
      return '.png';
    case 'application/pdf':
      return '.pdf';
    default:
      return '';
  }
};

  if (file) {
    if (!allowedTypes.includes(file.type)) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              Invalid file format. Only JPG, JPEG, PNG, and PDF are allowed.</span>
        );
      return;
    }

    if (file.size > maxSize) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              File size exceeds 5MB limit.</span>
        );
      return;
    }
    const extension = getExtensionFromType(file.type);
    file = new File([file], `Police_Report_or_Drivers_Affidavit${extension}`, { type: file.type });

    setPoliceReportFile(file); 
  }
};
const handleRemovePoliceReportFile = () => {
  setPoliceReportFile(null);
   if (policeReportUploadInput.current) {
    policeReportUploadInput.current.value = null;
  }
};
const additionalDocsUploadInput = useRef();
const [additionalDocsFile, setAdditionalDocsFile] = useState([]);

const handleAdditionalDocsFileChange = (event) => {
  const newFiles = Array.from(event.target.files);
  const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
  const maxSize = 5 * 1024 * 1024; // 5MB
  const getExtensionFromType = (type) => {
  switch (type) {
    case 'image/jpeg':
    case 'image/jpg':
      return '.jpg';
    case 'image/png':
      return '.png';
    case 'application/pdf':
      return '.pdf';
    default:
      return '';
  }
};

  const validFiles = newFiles.filter(file => {
    if (!allowedTypes.includes(file.type)) {
      toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              Invalid file format. Only JPG, JPEG, PNG, and PDF are allowed.</span>
        );
      return false;
    }
    if (file.size > maxSize) {
       toast(<span style={{ color: "#40444D", fontSize: "16px", fontWeight:"400" }}>
              File size exceeds 5MB limit.</span>
        );
      return false;
    }
    return true;
  })
    .map((file, index) => {
      const extension = getExtensionFromType(file.type);
      const count = additionalDocsFile.length + index + 1;
      return new File([file], `Additional_Docs${count}${extension}`, { type: file.type });
    });

    setAdditionalDocsFile((prev) => [...prev, ...validFiles]);

    if (additionalDocsUploadInput.current) {
    additionalDocsUploadInput.current.value = null;
  }
};

const handleRemoveAdditionalDocsFile = (index) => {
  setAdditionalDocsFile((prev) => {
    const newFiles = prev.filter((_, i) => i !== index);
    if (additionalDocsUploadInput.current) {
      additionalDocsUploadInput.current.value = null; 
    }
    return newFiles;
  });
};
const shortenFileName = (name, maxLength = 20) => {
  return name.length > maxLength
    ? name.slice(0, maxLength - 3) + '...'
    : name;
};
const shortenFileNameUpload = (name, maxLength = 60) => {
  return name.length > maxLength
    ? name.slice(0, maxLength - 3) + '...'
    : name;
};

useEffect(() => {
  if (!hasValidated) return;              
  validateUploads(false);                
}, [uploadedFiles, vehicleFiles, identificationFile, documents, hasValidated]);


  return (
    <div className="space-y-6 bg-[#FFFEFE] text-[#333]">
      <div ref={refs.motorClaimsRef}>
      <div className="space-y-0">
  <div
    onClick={() => setMotorUploadOpen(!motorUploadOpen)}
    className="bg-[#F4F9FF] border border-none p-6 rounded-t-lg shadow-sm space-y-4 mb-0 cursor-pointer flex justify-between items-center"
  >
    <div className="flex-1">
      <div className="flex justify-between items-start w-full">
      <div className="md:text-lg text-base font-medium text-[#2D2727] mt-1">
        Motor Claims Uploads<span className="text-[#DD0707] font-medium">*</span>
              {hasValidated && validationErrors.motorClaims.length > 0 && (
  <div className="text-[#DD0707] text-sm font-medium mt-2">
    Please upload the following required file(s):
    <ul className="list-disc list-inside">
      {validationErrors.motorClaims.map((label, i) => (
        <li key={i}>{label}</li>
      ))}
    </ul>
  </div>
)}
      </div>

<span className="text-xl text-[#2D2727]">
      {motorUploadOpen ? (
  <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.28418 22.9097L18.1592 11.0347C18.2695 10.9243 18.4004 10.8367 18.5446 10.7769C18.6888 10.7172 18.8433 10.6864 18.9993 10.6864C19.1554 10.6864 19.3099 10.7172 19.4541 10.7769C19.5982 10.8367 19.7292 10.9243 19.8395 11.0347L31.7145 22.9097C31.9373 23.1325 32.0625 23.4347 32.0625 23.7498C32.0625 24.0649 31.9373 24.3672 31.7145 24.59C31.4917 24.8128 31.1895 24.938 30.8743 24.938C30.5592 24.938 30.257 24.8128 30.0342 24.59L18.9993 13.5537L7.96449 24.59C7.85416 24.7003 7.72318 24.7878 7.57903 24.8475C7.43487 24.9073 7.28037 24.938 7.12434 24.938C6.96831 24.938 6.8138 24.9073 6.66965 24.8475C6.5255 24.7878 6.39451 24.7003 6.28418 24.59C6.17385 24.4797 6.08633 24.3487 6.02662 24.2045C5.96691 24.0604 5.93618 23.9059 5.93618 23.7498C5.93618 23.5938 5.96691 23.4393 6.02662 23.2951C6.08633 23.151 6.17385 23.02 6.28418 22.9097Z" fill="#217B7E"/>
</svg>


) : (

<svg
  width="38"
  height="38"
  viewBox="0 0 38 38"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M31.7145 15.0903L19.8395 26.9653C19.7292 27.0757 19.5982 27.1633 19.4541 27.2231C19.3099 27.2828 19.1554 27.3136 18.9993 27.3136C18.8433 27.3136 18.6888 27.2828 18.5446 27.2231C18.4004 27.1633 18.2695 27.0757 18.1592 26.9653L6.28418 15.0903C6.06133 14.8675 5.93618 14.5653 5.93618 14.2502C5.93618 13.9351 6.06133 13.6328 6.28418 13.41C6.50703 13.1872 6.80923 13.062 7.12434 13.062C7.43945 13.062 7.74166 13.1872 7.96451 13.41L18.9993 24.4463L30.0342 13.41C30.1445 13.2997 30.2755 13.2122 30.4196 13.1525C30.5638 13.0927 30.7183 13.062 30.8743 13.062C31.0303 13.062 31.1848 13.0927 31.3289 13.1525C31.4731 13.2122 31.6041 13.2997 31.7145 13.41C31.8248 13.5203 31.9123 13.6513 31.972 13.7955C32.0317 13.9396 32.0625 14.0941 32.0625 14.2502C32.0625 14.4062 32.0317 14.5607 31.972 14.7049C31.9123 14.849 31.8248 14.98 31.7145 15.0903Z"
    fill="#217B7E"
  />
</svg>
)}

    </span>
    </div>
      <p className="text-sm text-[#848A90] font-medium mt-3">
        Please upload clear copy of the documents in the checklist and name your files according to the requirements. Each file must not be more than 5 MB. JPG, PDF, PNG files are accepted.
      </p>
    </div>

  </div>

  {motorUploadOpen && (
    <div className="grid grid-cols-1 md:grid-cols-5 place-items-center gap-6 border border-dashed border-[#90CCCC] p-4 md:text-base text-sm text-center font-medium rounded-lg">
          {documents.map((doc) => (
            <div
  key={doc.ref}
  onClick={() => !uploadedFiles[doc.ref] && handleUploadClick(doc.ref)}
  className={`h-[130px] w-full max-w-[190px] cursor-pointer flex flex-col items-center justify-center border border-dashed border-[#9ECBCB] rounded-lg p-6 ${
  uploadedFiles[doc.ref] ? 'bg-[#fff]' : 'bg-[#F4F4F4] hover:bg-teal-50'
} transition relative`}
>
{uploadedFiles[doc.ref] ? (
  <div className="flex flex-col items-center text-center text-[#008080] font-medium md:text-base text-sm">
   <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.5" width="32" height="32" rx="16" fill="#D6F3E9"/>
<path d="M20.0672 13.6828C20.1253 13.7409 20.1714 13.8098 20.2029 13.8857C20.2343 13.9615 20.2505 14.0429 20.2505 14.125C20.2505 14.2071 20.2343 14.2885 20.2029 14.3643C20.1714 14.4402 20.1253 14.5091 20.0672 14.5672L15.6922 18.9422C15.6341 19.0003 15.5652 19.0464 15.4893 19.0779C15.4135 19.1093 15.3321 19.1255 15.25 19.1255C15.1679 19.1255 15.0865 19.1093 15.0107 19.0779C14.9348 19.0464 14.8659 19.0003 14.8078 18.9422L12.9328 17.0672C12.8155 16.9499 12.7497 16.7909 12.7497 16.625C12.7497 16.4591 12.8155 16.3001 12.9328 16.1828C13.0501 16.0655 13.2092 15.9997 13.375 15.9997C13.5409 15.9997 13.6999 16.0655 13.8172 16.1828L15.25 17.6164L19.1828 13.6828C19.2409 13.6247 19.3098 13.5786 19.3857 13.5472C19.4615 13.5157 19.5429 13.4995 19.625 13.4995C19.7071 13.4995 19.7885 13.5157 19.8643 13.5472C19.9402 13.5786 20.0091 13.6247 20.0672 13.6828ZM24.625 16C24.625 17.607 24.1485 19.1779 23.2557 20.514C22.3629 21.8502 21.094 22.8916 19.6093 23.5065C18.1247 24.1215 16.491 24.2824 14.9149 23.9689C13.3388 23.6554 11.8911 22.8815 10.7548 21.7452C9.61846 20.6089 8.84463 19.1612 8.53112 17.5851C8.21762 16.009 8.37852 14.3753 8.99348 12.8907C9.60844 11.406 10.6498 10.1371 11.986 9.24431C13.3221 8.35152 14.893 7.875 16.5 7.875C18.6542 7.87727 20.7195 8.73403 22.2427 10.2573C23.766 11.7805 24.6227 13.8458 24.625 16ZM23.375 16C23.375 14.6403 22.9718 13.311 22.2164 12.1805C21.4609 11.0499 20.3872 10.1687 19.131 9.64833C17.8747 9.12798 16.4924 8.99183 15.1588 9.2571C13.8251 9.52237 12.6001 10.1772 11.6386 11.1386C10.6772 12.1001 10.0224 13.3251 9.7571 14.6588C9.49183 15.9924 9.62798 17.3747 10.1483 18.6309C10.6687 19.8872 11.5499 20.9609 12.6805 21.7164C13.811 22.4718 15.1403 22.875 16.5 22.875C18.3227 22.8729 20.0702 22.1479 21.3591 20.8591C22.6479 19.5702 23.3729 17.8227 23.375 16Z" fill="#039855"/>
</svg>

{uploadedFiles[doc.ref] ? (
<button
  onClick={() => {
    const file = uploadedFiles[doc.ref];
    if (!file) return;

    const url = URL.createObjectURL(file);

    if (file.type.startsWith('image/')) {
      setPreviewFileURL(url);
      setPreviewFileType('image');
    } else if (file.type === 'application/pdf') {
      window.open(url, '_blank');
    }
  }}
  className="mt-2"
  style={{
    whiteSpace: 'nowrap',
    overflow: 'hidden',
    textOverflow: 'ellipsis',
    maxWidth: '200px',
    display: 'inline-block',
    verticalAlign: 'middle',
    
  }}
>
  {shortenFileName(uploadedFiles[doc.ref].name)}
</button>

) : null}
  </div>
) : (
  <>
    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.625 20.7821V28.4384C30.625 29.0185 30.3945 29.5749 29.9843 29.9852C29.5741 30.3954 29.0177 30.6259 28.4375 30.6259H6.5625C5.98234 30.6259 5.42594 30.3954 5.0157 29.9852C4.60547 29.5749 4.375 29.0185 4.375 28.4384V20.7821C4.375 20.492 4.49023 20.2138 4.69535 20.0087C4.90047 19.8036 5.17867 19.6884 5.46875 19.6884C5.75883 19.6884 6.03703 19.8036 6.24215 20.0087C6.44727 20.2138 6.5625 20.492 6.5625 20.7821V28.4384H28.4375V20.7821C28.4375 20.492 28.5527 20.2138 28.7579 20.0087C28.963 19.8036 29.2412 19.6884 29.5312 19.6884C29.8213 19.6884 30.0995 19.8036 30.3046 20.0087C30.5098 20.2138 30.625 20.492 30.625 20.7821ZM12.8051 11.7122L16.4062 8.10965V20.7821C16.4062 21.0722 16.5215 21.3504 16.7266 21.5555C16.9317 21.7606 17.2099 21.8759 17.5 21.8759C17.7901 21.8759 18.0683 21.7606 18.2734 21.5555C18.4785 21.3504 18.5938 21.0722 18.5938 20.7821V8.10965L22.1949 11.7122C22.4002 11.9174 22.6785 12.0327 22.9688 12.0327C23.259 12.0327 23.5373 11.9174 23.7426 11.7122C23.9478 11.507 24.0631 11.2286 24.0631 10.9384C24.0631 10.6481 23.9478 10.3698 23.7426 10.1645L18.2738 4.69578C18.1722 4.59409 18.0516 4.51342 17.9188 4.45837C17.7861 4.40333 17.6437 4.375 17.5 4.375C17.3563 4.375 17.2139 4.40333 17.0812 4.45837C16.9484 4.51342 16.8278 4.59409 16.7262 4.69578L11.2574 10.1645C11.0522 10.3698 10.9369 10.6481 10.9369 10.9384C10.9369 11.2286 11.0522 11.507 11.2574 11.7122C11.4627 11.9174 11.741 12.0327 12.0312 12.0327C12.3215 12.0327 12.5998 11.9174 12.8051 11.7122Z" fill="#008080"/>
</svg>

    <p className="md:text-base text-sm font-medium text-[#008080]">{doc.label}</p>
  </>
)}

  {uploadedFiles[doc.ref] && (
    <button
      onClick={(e) => {
        e.stopPropagation();
        handleRemoveFile(doc.ref);
      }}
      className="bg-[#DD0707] text-[#FFF] text-xs mt-2 py-1  rounded-full w-full"
    >
      Remove
    </button>
  )}

  <input
    type="file"
    name="uploads[motor_claims_uploads][]"
    ref={fileInputs[doc.ref]}
    className="hidden"
    accept=".jpg,.jpeg,.png,.pdf"
    onChange={(e) => handleFileChange(doc.ref, e)}
  />
</div>
          ))}
        </div>
        )}
    </div>
    </div>
    <div ref={refs.vehiclePhotosRef}>
<div className="space-y-0">
  <div
    onClick={() => setVehicleUploadOpen(!vehicleUploadOpen)}
    className="bg-[#F4F9FF] border border-none p-6 rounded-t-lg shadow-sm space-y-4 mb-0 cursor-pointer flex justify-between items-center"
  >
      <div className="flex-1">
      <div className="flex justify-between items-start w-full">
      <div className="md:text-lg text-base font-medium text-[#2D2727] mt-1">
        Upload Photos of the Vehicle<span className="text-[#DD0707] font-medium">*</span>
         {hasValidated && validationErrors.vehiclePhotos && (
  <div className="text-[#DD0707] text-sm font-medium mt-2">
    Please upload photos of the vehicle.
  </div>
)}
      </div>
     
      <span className="text-xl text-[#2D2727]">
      {vehicleUploadOpen ? (
  <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.28418 22.9097L18.1592 11.0347C18.2695 10.9243 18.4004 10.8367 18.5446 10.7769C18.6888 10.7172 18.8433 10.6864 18.9993 10.6864C19.1554 10.6864 19.3099 10.7172 19.4541 10.7769C19.5982 10.8367 19.7292 10.9243 19.8395 11.0347L31.7145 22.9097C31.9373 23.1325 32.0625 23.4347 32.0625 23.7498C32.0625 24.0649 31.9373 24.3672 31.7145 24.59C31.4917 24.8128 31.1895 24.938 30.8743 24.938C30.5592 24.938 30.257 24.8128 30.0342 24.59L18.9993 13.5537L7.96449 24.59C7.85416 24.7003 7.72318 24.7878 7.57903 24.8475C7.43487 24.9073 7.28037 24.938 7.12434 24.938C6.96831 24.938 6.8138 24.9073 6.66965 24.8475C6.5255 24.7878 6.39451 24.7003 6.28418 24.59C6.17385 24.4797 6.08633 24.3487 6.02662 24.2045C5.96691 24.0604 5.93618 23.9059 5.93618 23.7498C5.93618 23.5938 5.96691 23.4393 6.02662 23.2951C6.08633 23.151 6.17385 23.02 6.28418 22.9097Z" fill="#217B7E"/>
</svg>


) : (

<svg
  width="38"
  height="38"
  viewBox="0 0 38 38"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M31.7145 15.0903L19.8395 26.9653C19.7292 27.0757 19.5982 27.1633 19.4541 27.2231C19.3099 27.2828 19.1554 27.3136 18.9993 27.3136C18.8433 27.3136 18.6888 27.2828 18.5446 27.2231C18.4004 27.1633 18.2695 27.0757 18.1592 26.9653L6.28418 15.0903C6.06133 14.8675 5.93618 14.5653 5.93618 14.2502C5.93618 13.9351 6.06133 13.6328 6.28418 13.41C6.50703 13.1872 6.80923 13.062 7.12434 13.062C7.43945 13.062 7.74166 13.1872 7.96451 13.41L18.9993 24.4463L30.0342 13.41C30.1445 13.2997 30.2755 13.2122 30.4196 13.1525C30.5638 13.0927 30.7183 13.062 30.8743 13.062C31.0303 13.062 31.1848 13.0927 31.3289 13.1525C31.4731 13.2122 31.6041 13.2997 31.7145 13.41C31.8248 13.5203 31.9123 13.6513 31.972 13.7955C32.0317 13.9396 32.0625 14.0941 32.0625 14.2502C32.0625 14.4062 32.0317 14.5607 31.972 14.7049C31.9123 14.849 31.8248 14.98 31.7145 15.0903Z"
    fill="#217B7E"
  />
</svg>

)}

    </span>
    </div>
      <p className="text-sm text-[#848A90] font-medium mt-3">
        Please upload the affected areas of the vehicle. File must be an image in JPG, JPEG, PNG or PDF format. Maximum size is 5MB.
      </p>
    </div>

    
  </div>

{vehicleUploadOpen && (
  <div className={`border border-dashed border-[#90CCCC] p-6 rounded-b-lg bg-[#FBFAFA] space-y-4 ${vehicleFiles.length === 0 ? 'hover:bg-teal-50' : ''}`}>
    {vehicleFiles.length === 0 && (
      <div
        onClick={() => vehicleUploadInput.current?.click()}
        className="flex flex-col items-center justify-center cursor-pointer hover:bg-teal-50 transition "
      >
        <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.125 20.7811V28.4374C31.125 29.0175 30.8945 29.5739 30.4843 29.9842C30.0741 30.3944 29.5177 30.6249 28.9375 30.6249H7.0625C6.48234 30.6249 5.92594 30.3944 5.5157 29.9842C5.10547 29.5739 4.875 29.0175 4.875 28.4374V20.7811C4.875 20.4911 4.99023 20.2129 5.19535 20.0077C5.40047 19.8026 5.67867 19.6874 5.96875 19.6874C6.25883 19.6874 6.53703 19.8026 6.74215 20.0077C6.94727 20.2129 7.0625 20.4911 7.0625 20.7811V28.4374H28.9375V20.7811C28.9375 20.4911 29.0527 20.2129 29.2579 20.0077C29.463 19.8026 29.7412 19.6874 30.0312 19.6874C30.3213 19.6874 30.5995 19.8026 30.8046 20.0077C31.0098 20.2129 31.125 20.4911 31.125 20.7811ZM13.3051 11.7112L16.9062 8.10867V20.7811C16.9062 21.0712 17.0215 21.3494 17.2266 21.5545C17.4317 21.7597 17.7099 21.8749 18 21.8749C18.2901 21.8749 18.5683 21.7597 18.7734 21.5545C18.9785 21.3494 19.0938 21.0712 19.0938 20.7811V8.10867L22.6949 11.7112C22.9002 11.9164 23.1785 12.0317 23.4688 12.0317C23.759 12.0317 24.0373 11.9164 24.2426 11.7112C24.4478 11.506 24.5631 11.2276 24.5631 10.9374C24.5631 10.6471 24.4478 10.3688 24.2426 10.1636L18.7738 4.69481C18.6722 4.59311 18.5516 4.51244 18.4188 4.4574C18.2861 4.40235 18.1437 4.37402 18 4.37402C17.8563 4.37402 17.7139 4.40235 17.5812 4.4574C17.4484 4.51244 17.3278 4.59311 17.2262 4.69481L11.7574 10.1636C11.5522 10.3688 11.4369 10.6471 11.4369 10.9374C11.4369 11.2276 11.5522 11.506 11.7574 11.7112C11.9627 11.9164 12.241 12.0317 12.5312 12.0317C12.8215 12.0317 13.0998 11.9164 13.3051 11.7112Z" fill="#008080"/>
</svg>

        <p className="text-[#008080] md:text-lg text-base font-bold">Upload Photos</p>
      </div>
    )}

    {vehicleFiles.length > 0 && (
      <div className="space-y-3">
        {vehicleFiles.map((file, index) => (
          <div
            key={index}
            className="flex flex-wrap items-center justify-between border border-dashed border-[#90CCCC] bg-white md:p-6 p-2 rounded-md"
          >
            <div className="flex items-center space-x-3">
  {getFileIcon(file)}
{file ? (
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

 className="md:text-base text-sm text-[#2D2727] font-medium md:max-w-[620px] max-w-[180px] truncate"
>
  {shortenFileNameUpload(file.name)}
</button>

) : null}
</div>

            <button
              onClick={() => handleRemoveVehicleFile(index)}
              className="bg-[#DD0707] text-[#FFF] text-xs py-1 px-4 rounded-full"
            >
              Remove
            </button>
          </div>
        ))}

        <button
        
          onClick={() => vehicleUploadInput.current?.click()}
          className="text-[#008080] border border-[#217B7E] hover:bg-[#E6F2F2] transition md:text-base text-sm font-medium p-3 rounded-md w-full ">
            <div className="flex items-center text-center justify-center gap-2">
          <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.625 20.7811V28.4374C30.625 29.0175 30.3945 29.5739 29.9843 29.9842C29.5741 30.3944 29.0177 30.6249 28.4375 30.6249H6.5625C5.98234 30.6249 5.42594 30.3944 5.0157 29.9842C4.60547 29.5739 4.375 29.0175 4.375 28.4374V20.7811C4.375 20.4911 4.49023 20.2129 4.69535 20.0077C4.90047 19.8026 5.17867 19.6874 5.46875 19.6874C5.75883 19.6874 6.03703 19.8026 6.24215 20.0077C6.44727 20.2129 6.5625 20.4911 6.5625 20.7811V28.4374H28.4375V20.7811C28.4375 20.4911 28.5527 20.2129 28.7579 20.0077C28.963 19.8026 29.2412 19.6874 29.5312 19.6874C29.8213 19.6874 30.0995 19.8026 30.3046 20.0077C30.5098 20.2129 30.625 20.4911 30.625 20.7811ZM12.8051 11.7112L16.4062 8.10867V20.7811C16.4062 21.0712 16.5215 21.3494 16.7266 21.5545C16.9317 21.7597 17.2099 21.8749 17.5 21.8749C17.7901 21.8749 18.0683 21.7597 18.2734 21.5545C18.4785 21.3494 18.5938 21.0712 18.5938 20.7811V8.10867L22.1949 11.7112C22.4002 11.9164 22.6785 12.0317 22.9688 12.0317C23.259 12.0317 23.5373 11.9164 23.7426 11.7112C23.9478 11.506 24.0631 11.2276 24.0631 10.9374C24.0631 10.6471 23.9478 10.3688 23.7426 10.1636L18.2738 4.69481C18.1722 4.59311 18.0516 4.51244 17.9188 4.4574C17.7861 4.40235 17.6437 4.37402 17.5 4.37402C17.3563 4.37402 17.2139 4.40235 17.0812 4.4574C16.9484 4.51244 16.8278 4.59311 16.7262 4.69481L11.2574 10.1636C11.0522 10.3688 10.9369 10.6471 10.9369 10.9374C10.9369 11.2276 11.0522 11.506 11.2574 11.7112C11.4627 11.9164 11.741 12.0317 12.0312 12.0317C12.3215 12.0317 12.5998 11.9164 12.8051 11.7112Z" fill="#008080"/>
</svg>

          Add Another Photo
          </div>
        </button>
      </div>
    )}

    <input
      type="file"
      name="uploads[vehicle_photos][]"
      ref={vehicleUploadInput}
      className="hidden"
      multiple
      accept=".jpg,.jpeg,.png,.pdf"
      onChange={handleVehicleFileChange}
    />
  </div>
)}


</div>
</div>
<div ref={refs.identificationRef}>
     <div className="space-y-0">
  <div
    onClick={() => setUploadIdentificationOpen(!uploadIdentificationOpen)}
    className="bg-[#F4F9FF] border border-none p-6 rounded-t-lg shadow-sm space-y-4 mb-0 cursor-pointer flex justify-between items-center"
  >
     <div className="flex-1">
      <div className="flex justify-between items-start w-full">
      <div className="md:text-lg text-base font-medium text-[#2D2727] mt-1">
        Upload Identification<span className="text-[#DD0707] font-medium">*</span>
              {hasValidated && validationErrors.identification && (
  <div className="text-[#DD0707] text-sm font-medium mt-2">
    Please upload your Driver’s License.
  </div>
)}
      </div>

               <span className="text-xl text-[#2D2727]">
      {uploadIdentificationOpen ? (
  <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.28418 22.9097L18.1592 11.0347C18.2695 10.9243 18.4004 10.8367 18.5446 10.7769C18.6888 10.7172 18.8433 10.6864 18.9993 10.6864C19.1554 10.6864 19.3099 10.7172 19.4541 10.7769C19.5982 10.8367 19.7292 10.9243 19.8395 11.0347L31.7145 22.9097C31.9373 23.1325 32.0625 23.4347 32.0625 23.7498C32.0625 24.0649 31.9373 24.3672 31.7145 24.59C31.4917 24.8128 31.1895 24.938 30.8743 24.938C30.5592 24.938 30.257 24.8128 30.0342 24.59L18.9993 13.5537L7.96449 24.59C7.85416 24.7003 7.72318 24.7878 7.57903 24.8475C7.43487 24.9073 7.28037 24.938 7.12434 24.938C6.96831 24.938 6.8138 24.9073 6.66965 24.8475C6.5255 24.7878 6.39451 24.7003 6.28418 24.59C6.17385 24.4797 6.08633 24.3487 6.02662 24.2045C5.96691 24.0604 5.93618 23.9059 5.93618 23.7498C5.93618 23.5938 5.96691 23.4393 6.02662 23.2951C6.08633 23.151 6.17385 23.02 6.28418 22.9097Z" fill="#217B7E"/>
</svg>


) : (

<svg
  width="38"
  height="38"
  viewBox="0 0 38 38"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M31.7145 15.0903L19.8395 26.9653C19.7292 27.0757 19.5982 27.1633 19.4541 27.2231C19.3099 27.2828 19.1554 27.3136 18.9993 27.3136C18.8433 27.3136 18.6888 27.2828 18.5446 27.2231C18.4004 27.1633 18.2695 27.0757 18.1592 26.9653L6.28418 15.0903C6.06133 14.8675 5.93618 14.5653 5.93618 14.2502C5.93618 13.9351 6.06133 13.6328 6.28418 13.41C6.50703 13.1872 6.80923 13.062 7.12434 13.062C7.43945 13.062 7.74166 13.1872 7.96451 13.41L18.9993 24.4463L30.0342 13.41C30.1445 13.2997 30.2755 13.2122 30.4196 13.1525C30.5638 13.0927 30.7183 13.062 30.8743 13.062C31.0303 13.062 31.1848 13.0927 31.3289 13.1525C31.4731 13.2122 31.6041 13.2997 31.7145 13.41C31.8248 13.5203 31.9123 13.6513 31.972 13.7955C32.0317 13.9396 32.0625 14.0941 32.0625 14.2502C32.0625 14.4062 32.0317 14.5607 31.972 14.7049C31.9123 14.849 31.8248 14.98 31.7145 15.0903Z"
    fill="#217B7E"
  />
</svg>

)}

    </span>
</div>
      <p className="text-sm text-[#848A90] font-medium mt-2">
        Please upload copy of your Driver’s License. 
      </p>
    </div>
</div>
{uploadIdentificationOpen && (
  <div className={`border border-dashed border-[#90CCCC] p-6 rounded-b-lg bg-[#FBFAFA] space-y-4 ${!identificationFile ? 'hover:bg-teal-50' : ''}`}>
{identificationFile ? (
  <div className="space-y-3">
    <div className="flex flex-wrap items-center justify-between border border-dashed border-[#90CCCC] bg-white md:p-6 p-2 rounded-md">
      <div className="flex items-center space-x-3">
        {getFileIcon(identificationFile)}
{identificationFile ? (
<button
  onClick={() => {
    const file = identificationFile;
    if (!file) return;

    const url = URL.createObjectURL(file);

    if (file.type.startsWith('image/')) {
      setPreviewFileURL(url);
      setPreviewFileType('image');
    } else if (file.type === 'application/pdf') {
      window.open(url, '_blank');
    }
  }}
  className="md:text-base text-sm text-[#2D2727] font-medium md:max-w-[620px] max-w-[180px] truncate"
>
  {shortenFileNameUpload(identificationFile.name)}
</button>

) : null}
      </div>

      <button
        onClick={handleRemoveIdentificationFile}
        className="bg-[#DD0707] text-[#FFF] text-xs py-1 px-4 rounded-full"
      >
        Remove
      </button>
    </div>

    <button
      onClick={() => identificationUploadInput.current?.click()}
       className="text-[#008080] border border-[#217B7E] hover:bg-[#E6F2F2] transition md:text-base text-sm font-medium p-3 rounded-md w-full ">
            <div className="flex items-center text-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
  <path d="M27.0238 25.4762C27.1255 25.5778 27.2062 25.6984 27.2612 25.8312C27.3163 25.9639 27.3446 26.1063 27.3446 26.25C27.3446 26.3937 27.3163 26.5361 27.2612 26.6688C27.2062 26.8016 27.1255 26.9222 27.0238 27.0238C26.8762 27.1701 23.3543 30.625 17.5 30.625C14.3062 30.625 11.1932 29.3809 8.43828 27.0143L6.24258 29.2113C6.08961 29.3645 5.89465 29.4688 5.68237 29.511C5.47009 29.5533 5.25004 29.5317 5.05007 29.4488C4.85011 29.366 4.67923 29.2256 4.55906 29.0456C4.43889 28.8656 4.37483 28.6539 4.375 28.4375V21.875C4.375 21.5849 4.49023 21.3067 4.69535 21.1016C4.90047 20.8965 5.17867 20.7812 5.46875 20.7812H12.0313C12.2477 20.7811 12.4593 20.8451 12.6394 20.9653C12.8194 21.0855 12.9597 21.2564 13.0426 21.4563C13.1254 21.6563 13.1471 21.8763 13.1048 22.0886C13.0625 22.3009 12.9582 22.4959 12.8051 22.6488L9.99141 25.4625C11.7688 26.9541 14.3322 28.4375 17.5 28.4375C22.4588 28.4375 25.4475 25.5063 25.4762 25.4762C25.5778 25.3745 25.6984 25.2938 25.8312 25.2388C25.9639 25.1837 26.1063 25.1554 26.25 25.1554C26.3937 25.1554 26.5361 25.1837 26.6688 25.2388C26.8016 25.2938 26.9222 25.3745 27.0238 25.4762ZM29.9496 5.55215C29.7498 5.46924 29.5298 5.44747 29.3176 5.48957C29.1054 5.53167 28.9105 5.63576 28.7574 5.78867L26.5617 7.98574C23.8068 5.61914 20.6938 4.375 17.5 4.375C11.6457 4.375 8.12383 7.82988 7.97617 7.97617C7.77094 8.1814 7.65564 8.45976 7.65564 8.75C7.65564 9.04024 7.77094 9.3186 7.97617 9.52383C8.1814 9.72906 8.45976 9.84436 8.75 9.84436C9.04024 9.84436 9.3186 9.72906 9.52383 9.52383C9.55254 9.49375 12.5412 6.5625 17.5 6.5625C20.6678 6.5625 23.2312 8.0459 25.0086 9.5375L22.1949 12.3512C22.0418 12.5041 21.9375 12.6991 21.8952 12.9114C21.8529 13.1237 21.8746 13.3437 21.9574 13.5437C22.0403 13.7436 22.1806 13.9145 22.3606 14.0347C22.5407 14.1549 22.7523 14.2189 22.9688 14.2188H29.5312C29.8213 14.2188 30.0995 14.1035 30.3046 13.8984C30.5098 13.6933 30.625 13.4151 30.625 13.125V6.5625C30.625 6.34618 30.5608 6.13473 30.4405 5.95489C30.3203 5.77504 30.1495 5.63489 29.9496 5.55215Z" fill="#217B7E"/>
</svg>

          Replace Photo
          </div>
        </button>
  </div>
) : (
  <div
        onClick={() => identificationUploadInput.current?.click()}
        className="flex flex-col items-center justify-center cursor-pointer hover:bg-teal-50 transition "
      >
        <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.125 20.7811V28.4374C31.125 29.0175 30.8945 29.5739 30.4843 29.9842C30.0741 30.3944 29.5177 30.6249 28.9375 30.6249H7.0625C6.48234 30.6249 5.92594 30.3944 5.5157 29.9842C5.10547 29.5739 4.875 29.0175 4.875 28.4374V20.7811C4.875 20.4911 4.99023 20.2129 5.19535 20.0077C5.40047 19.8026 5.67867 19.6874 5.96875 19.6874C6.25883 19.6874 6.53703 19.8026 6.74215 20.0077C6.94727 20.2129 7.0625 20.4911 7.0625 20.7811V28.4374H28.9375V20.7811C28.9375 20.4911 29.0527 20.2129 29.2579 20.0077C29.463 19.8026 29.7412 19.6874 30.0312 19.6874C30.3213 19.6874 30.5995 19.8026 30.8046 20.0077C31.0098 20.2129 31.125 20.4911 31.125 20.7811ZM13.3051 11.7112L16.9062 8.10867V20.7811C16.9062 21.0712 17.0215 21.3494 17.2266 21.5545C17.4317 21.7597 17.7099 21.8749 18 21.8749C18.2901 21.8749 18.5683 21.7597 18.7734 21.5545C18.9785 21.3494 19.0938 21.0712 19.0938 20.7811V8.10867L22.6949 11.7112C22.9002 11.9164 23.1785 12.0317 23.4688 12.0317C23.759 12.0317 24.0373 11.9164 24.2426 11.7112C24.4478 11.506 24.5631 11.2276 24.5631 10.9374C24.5631 10.6471 24.4478 10.3688 24.2426 10.1636L18.7738 4.69481C18.6722 4.59311 18.5516 4.51244 18.4188 4.4574C18.2861 4.40235 18.1437 4.37402 18 4.37402C17.8563 4.37402 17.7139 4.40235 17.5812 4.4574C17.4484 4.51244 17.3278 4.59311 17.2262 4.69481L11.7574 10.1636C11.5522 10.3688 11.4369 10.6471 11.4369 10.9374C11.4369 11.2276 11.5522 11.506 11.7574 11.7112C11.9627 11.9164 12.241 12.0317 12.5312 12.0317C12.8215 12.0317 13.0998 11.9164 13.3051 11.7112Z" fill="#008080"/>
</svg>

        <p className="text-[#008080] md:text-lg text-base font-bold">Upload Photos</p>
      </div>
)}


    <input
      type="file"
      name="uploads[identification][]"
      ref={identificationUploadInput}
      className="hidden"
      multiple
      accept=".jpg,.jpeg,.png,.pdf"
      onChange={handleIdentificationFileChange}
    />
  </div>
)}
      </div>
      </div>
       <div className="space-y-0">
  <div
    onClick={() => setUploadPoliceOpen(!uploadPoliceOpen)}
    className="bg-[#F4F9FF] border border-none p-6 rounded-t-lg shadow-sm space-y-4 mb-0 cursor-pointer flex justify-between items-center"
  >
    <div className="flex-1">
      <div className="flex justify-between items-start w-full">
      <div className="md:text-lg text-base font-medium text-[#2D2727] mt-1">
        Upload Police Report / Driver’s Affidavit (Optional)
      </div>
                     <span className="text-xl text-[#2D2727]">
      {uploadPoliceOpen ? (
 <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.28418 22.9097L18.1592 11.0347C18.2695 10.9243 18.4004 10.8367 18.5446 10.7769C18.6888 10.7172 18.8433 10.6864 18.9993 10.6864C19.1554 10.6864 19.3099 10.7172 19.4541 10.7769C19.5982 10.8367 19.7292 10.9243 19.8395 11.0347L31.7145 22.9097C31.9373 23.1325 32.0625 23.4347 32.0625 23.7498C32.0625 24.0649 31.9373 24.3672 31.7145 24.59C31.4917 24.8128 31.1895 24.938 30.8743 24.938C30.5592 24.938 30.257 24.8128 30.0342 24.59L18.9993 13.5537L7.96449 24.59C7.85416 24.7003 7.72318 24.7878 7.57903 24.8475C7.43487 24.9073 7.28037 24.938 7.12434 24.938C6.96831 24.938 6.8138 24.9073 6.66965 24.8475C6.5255 24.7878 6.39451 24.7003 6.28418 24.59C6.17385 24.4797 6.08633 24.3487 6.02662 24.2045C5.96691 24.0604 5.93618 23.9059 5.93618 23.7498C5.93618 23.5938 5.96691 23.4393 6.02662 23.2951C6.08633 23.151 6.17385 23.02 6.28418 22.9097Z" fill="#217B7E"/>
</svg>


) : (

<svg
  width="38"
  height="38"
  viewBox="0 0 38 38"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M31.7145 15.0903L19.8395 26.9653C19.7292 27.0757 19.5982 27.1633 19.4541 27.2231C19.3099 27.2828 19.1554 27.3136 18.9993 27.3136C18.8433 27.3136 18.6888 27.2828 18.5446 27.2231C18.4004 27.1633 18.2695 27.0757 18.1592 26.9653L6.28418 15.0903C6.06133 14.8675 5.93618 14.5653 5.93618 14.2502C5.93618 13.9351 6.06133 13.6328 6.28418 13.41C6.50703 13.1872 6.80923 13.062 7.12434 13.062C7.43945 13.062 7.74166 13.1872 7.96451 13.41L18.9993 24.4463L30.0342 13.41C30.1445 13.2997 30.2755 13.2122 30.4196 13.1525C30.5638 13.0927 30.7183 13.062 30.8743 13.062C31.0303 13.062 31.1848 13.0927 31.3289 13.1525C31.4731 13.2122 31.6041 13.2997 31.7145 13.41C31.8248 13.5203 31.9123 13.6513 31.972 13.7955C32.0317 13.9396 32.0625 14.0941 32.0625 14.2502C32.0625 14.4062 32.0317 14.5607 31.972 14.7049C31.9123 14.849 31.8248 14.98 31.7145 15.0903Z"
    fill="#217B7E"
  />
</svg>

)}

    </span>
</div>
      <p className="text-sm text-[#848A90] font-medium mt-3">
        Please upload a copy of Police Report or Driver’s Affidavit.
      </p>
    </div>
         
</div>
{uploadPoliceOpen && (
  <div className={`border border-dashed border-[#90CCCC] p-6 rounded-b-lg bg-[#FBFAFA] space-y-4 ${!policeReportFile ? 'hover:bg-teal-50' : ''}`}>
{policeReportFile ? (
  <div className="space-y-3">
    <div className="flex flex-wrap items-center justify-between border border-dashed border-[#90CCCC] bg-white md:p-6 p-2 rounded-md">
      <div className="flex items-center space-x-3">
        {getFileIcon(policeReportFile)}
{policeReportFile ? (
<button
  onClick={() => {
    const file = policeReportFile;
    if (!file) return;

    const url = URL.createObjectURL(file);

    if (file.type.startsWith('image/')) {
      setPreviewFileURL(url);
      setPreviewFileType('image');
    } else if (file.type === 'application/pdf') {
      window.open(url, '_blank');
    }
  }}
  className="md:text-base text-sm text-[#2D2727] font-medium md:max-w-[620px] max-w-[180px] truncate"
>
  {shortenFileNameUpload(policeReportFile.name)}
</button>

) : null}
      </div>

      <button
        onClick={handleRemovePoliceReportFile}
        className="bg-[#DD0707] text-[#FFF] text-xs py-1 px-4 rounded-full"
      >
        Remove
      </button>
    </div>

    <button
      onClick={() => policeReportUploadInput.current?.click()}
       className="text-[#008080] border border-[#217B7E] hover:bg-[#E6F2F2] transition md:text-base text-sm font-medium p-3 rounded-md w-full ">
            <div className="flex items-center text-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
  <path d="M27.0238 25.4762C27.1255 25.5778 27.2062 25.6984 27.2612 25.8312C27.3163 25.9639 27.3446 26.1063 27.3446 26.25C27.3446 26.3937 27.3163 26.5361 27.2612 26.6688C27.2062 26.8016 27.1255 26.9222 27.0238 27.0238C26.8762 27.1701 23.3543 30.625 17.5 30.625C14.3062 30.625 11.1932 29.3809 8.43828 27.0143L6.24258 29.2113C6.08961 29.3645 5.89465 29.4688 5.68237 29.511C5.47009 29.5533 5.25004 29.5317 5.05007 29.4488C4.85011 29.366 4.67923 29.2256 4.55906 29.0456C4.43889 28.8656 4.37483 28.6539 4.375 28.4375V21.875C4.375 21.5849 4.49023 21.3067 4.69535 21.1016C4.90047 20.8965 5.17867 20.7812 5.46875 20.7812H12.0313C12.2477 20.7811 12.4593 20.8451 12.6394 20.9653C12.8194 21.0855 12.9597 21.2564 13.0426 21.4563C13.1254 21.6563 13.1471 21.8763 13.1048 22.0886C13.0625 22.3009 12.9582 22.4959 12.8051 22.6488L9.99141 25.4625C11.7688 26.9541 14.3322 28.4375 17.5 28.4375C22.4588 28.4375 25.4475 25.5063 25.4762 25.4762C25.5778 25.3745 25.6984 25.2938 25.8312 25.2388C25.9639 25.1837 26.1063 25.1554 26.25 25.1554C26.3937 25.1554 26.5361 25.1837 26.6688 25.2388C26.8016 25.2938 26.9222 25.3745 27.0238 25.4762ZM29.9496 5.55215C29.7498 5.46924 29.5298 5.44747 29.3176 5.48957C29.1054 5.53167 28.9105 5.63576 28.7574 5.78867L26.5617 7.98574C23.8068 5.61914 20.6938 4.375 17.5 4.375C11.6457 4.375 8.12383 7.82988 7.97617 7.97617C7.77094 8.1814 7.65564 8.45976 7.65564 8.75C7.65564 9.04024 7.77094 9.3186 7.97617 9.52383C8.1814 9.72906 8.45976 9.84436 8.75 9.84436C9.04024 9.84436 9.3186 9.72906 9.52383 9.52383C9.55254 9.49375 12.5412 6.5625 17.5 6.5625C20.6678 6.5625 23.2312 8.0459 25.0086 9.5375L22.1949 12.3512C22.0418 12.5041 21.9375 12.6991 21.8952 12.9114C21.8529 13.1237 21.8746 13.3437 21.9574 13.5437C22.0403 13.7436 22.1806 13.9145 22.3606 14.0347C22.5407 14.1549 22.7523 14.2189 22.9688 14.2188H29.5312C29.8213 14.2188 30.0995 14.1035 30.3046 13.8984C30.5098 13.6933 30.625 13.4151 30.625 13.125V6.5625C30.625 6.34618 30.5608 6.13473 30.4405 5.95489C30.3203 5.77504 30.1495 5.63489 29.9496 5.55215Z" fill="#217B7E"/>
</svg>

          Replace Photo
          </div>
        </button>
  </div>
) : (
  <div
        onClick={() => policeReportUploadInput.current?.click()}
        className="flex flex-col items-center justify-center cursor-pointer hover:bg-teal-50 transition "
      >
        <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.125 20.7811V28.4374C31.125 29.0175 30.8945 29.5739 30.4843 29.9842C30.0741 30.3944 29.5177 30.6249 28.9375 30.6249H7.0625C6.48234 30.6249 5.92594 30.3944 5.5157 29.9842C5.10547 29.5739 4.875 29.0175 4.875 28.4374V20.7811C4.875 20.4911 4.99023 20.2129 5.19535 20.0077C5.40047 19.8026 5.67867 19.6874 5.96875 19.6874C6.25883 19.6874 6.53703 19.8026 6.74215 20.0077C6.94727 20.2129 7.0625 20.4911 7.0625 20.7811V28.4374H28.9375V20.7811C28.9375 20.4911 29.0527 20.2129 29.2579 20.0077C29.463 19.8026 29.7412 19.6874 30.0312 19.6874C30.3213 19.6874 30.5995 19.8026 30.8046 20.0077C31.0098 20.2129 31.125 20.4911 31.125 20.7811ZM13.3051 11.7112L16.9062 8.10867V20.7811C16.9062 21.0712 17.0215 21.3494 17.2266 21.5545C17.4317 21.7597 17.7099 21.8749 18 21.8749C18.2901 21.8749 18.5683 21.7597 18.7734 21.5545C18.9785 21.3494 19.0938 21.0712 19.0938 20.7811V8.10867L22.6949 11.7112C22.9002 11.9164 23.1785 12.0317 23.4688 12.0317C23.759 12.0317 24.0373 11.9164 24.2426 11.7112C24.4478 11.506 24.5631 11.2276 24.5631 10.9374C24.5631 10.6471 24.4478 10.3688 24.2426 10.1636L18.7738 4.69481C18.6722 4.59311 18.5516 4.51244 18.4188 4.4574C18.2861 4.40235 18.1437 4.37402 18 4.37402C17.8563 4.37402 17.7139 4.40235 17.5812 4.4574C17.4484 4.51244 17.3278 4.59311 17.2262 4.69481L11.7574 10.1636C11.5522 10.3688 11.4369 10.6471 11.4369 10.9374C11.4369 11.2276 11.5522 11.506 11.7574 11.7112C11.9627 11.9164 12.241 12.0317 12.5312 12.0317C12.8215 12.0317 13.0998 11.9164 13.3051 11.7112Z" fill="#008080"/>
</svg>

        <p className="text-[#008080] md:text-lg text-base font-bold">Upload Photos</p>
      </div>
)}


    <input
      type="file"
      name="uploads[police_report_or_affidavit][]"
      ref={policeReportUploadInput}
      className="hidden"
      accept=".jpg,.jpeg,.png,.pdf"
      onChange={handlePoliceReportFileChange}
    />
  </div>
)}
      </div>
       <div className="space-y-0">
  <div
    onClick={() => setUploadAdditionalOpen(!uploadAdditionalOpen)}
    className="bg-[#F4F9FF] border border-none p-6 rounded-t-lg shadow-sm space-y-4 mb-0 cursor-pointer flex justify-between items-center"
  >
      <div className="flex-1">
      <div className="flex justify-between items-start w-full">
      <div className="md:text-lg text-base font-medium text-[#2D2727] mt-1">
        Additional Documents (Optional)
      </div>
      <span className="text-xl text-[#2D2727]">
      {uploadAdditionalOpen ? (
  <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.28418 22.9097L18.1592 11.0347C18.2695 10.9243 18.4004 10.8367 18.5446 10.7769C18.6888 10.7172 18.8433 10.6864 18.9993 10.6864C19.1554 10.6864 19.3099 10.7172 19.4541 10.7769C19.5982 10.8367 19.7292 10.9243 19.8395 11.0347L31.7145 22.9097C31.9373 23.1325 32.0625 23.4347 32.0625 23.7498C32.0625 24.0649 31.9373 24.3672 31.7145 24.59C31.4917 24.8128 31.1895 24.938 30.8743 24.938C30.5592 24.938 30.257 24.8128 30.0342 24.59L18.9993 13.5537L7.96449 24.59C7.85416 24.7003 7.72318 24.7878 7.57903 24.8475C7.43487 24.9073 7.28037 24.938 7.12434 24.938C6.96831 24.938 6.8138 24.9073 6.66965 24.8475C6.5255 24.7878 6.39451 24.7003 6.28418 24.59C6.17385 24.4797 6.08633 24.3487 6.02662 24.2045C5.96691 24.0604 5.93618 23.9059 5.93618 23.7498C5.93618 23.5938 5.96691 23.4393 6.02662 23.2951C6.08633 23.151 6.17385 23.02 6.28418 22.9097Z" fill="#217B7E"/>
</svg>


) : (

<svg
  width="38"
  height="38"
  viewBox="0 0 38 38"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M31.7145 15.0903L19.8395 26.9653C19.7292 27.0757 19.5982 27.1633 19.4541 27.2231C19.3099 27.2828 19.1554 27.3136 18.9993 27.3136C18.8433 27.3136 18.6888 27.2828 18.5446 27.2231C18.4004 27.1633 18.2695 27.0757 18.1592 26.9653L6.28418 15.0903C6.06133 14.8675 5.93618 14.5653 5.93618 14.2502C5.93618 13.9351 6.06133 13.6328 6.28418 13.41C6.50703 13.1872 6.80923 13.062 7.12434 13.062C7.43945 13.062 7.74166 13.1872 7.96451 13.41L18.9993 24.4463L30.0342 13.41C30.1445 13.2997 30.2755 13.2122 30.4196 13.1525C30.5638 13.0927 30.7183 13.062 30.8743 13.062C31.0303 13.062 31.1848 13.0927 31.3289 13.1525C31.4731 13.2122 31.6041 13.2997 31.7145 13.41C31.8248 13.5203 31.9123 13.6513 31.972 13.7955C32.0317 13.9396 32.0625 14.0941 32.0625 14.2502C32.0625 14.4062 32.0317 14.5607 31.972 14.7049C31.9123 14.849 31.8248 14.98 31.7145 15.0903Z"
    fill="#217B7E"
  />
</svg>

)}

    </span>
    </div>
       <p className="text-sm text-[#848A90] font-medium mt-3">
        If you have supporting documents for your claim, upload it here. <span className="text-[#DD0707]">NOTE: If your car has been CARNAPPED, please upload supporting files/photos to support your claim here.
</span>
      </p>
      <p className="text-sm text-[#848A90] font-bold mt-3">Carnap files you need to upload are: Alarm Sheet, Complaint Sheet, Certificate of Non-Recovery, and other documents to support your claim.</p>
    </div>

    
  </div>

{uploadAdditionalOpen && (
  <div className={`border border-dashed border-[#90CCCC] p-6 rounded-b-lg bg-[#FBFAFA] space-y-4 ${additionalDocsFile.length === 0 ? 'hover:bg-teal-50' : ''}`}>
    {additionalDocsFile.length === 0 && (
      <div
        onClick={() => additionalDocsUploadInput.current?.click()}
        className="flex flex-col items-center justify-center cursor-pointer hover:bg-teal-50 transition "
      >
        <svg width="36" height="35" viewBox="0 0 36 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.125 20.7811V28.4374C31.125 29.0175 30.8945 29.5739 30.4843 29.9842C30.0741 30.3944 29.5177 30.6249 28.9375 30.6249H7.0625C6.48234 30.6249 5.92594 30.3944 5.5157 29.9842C5.10547 29.5739 4.875 29.0175 4.875 28.4374V20.7811C4.875 20.4911 4.99023 20.2129 5.19535 20.0077C5.40047 19.8026 5.67867 19.6874 5.96875 19.6874C6.25883 19.6874 6.53703 19.8026 6.74215 20.0077C6.94727 20.2129 7.0625 20.4911 7.0625 20.7811V28.4374H28.9375V20.7811C28.9375 20.4911 29.0527 20.2129 29.2579 20.0077C29.463 19.8026 29.7412 19.6874 30.0312 19.6874C30.3213 19.6874 30.5995 19.8026 30.8046 20.0077C31.0098 20.2129 31.125 20.4911 31.125 20.7811ZM13.3051 11.7112L16.9062 8.10867V20.7811C16.9062 21.0712 17.0215 21.3494 17.2266 21.5545C17.4317 21.7597 17.7099 21.8749 18 21.8749C18.2901 21.8749 18.5683 21.7597 18.7734 21.5545C18.9785 21.3494 19.0938 21.0712 19.0938 20.7811V8.10867L22.6949 11.7112C22.9002 11.9164 23.1785 12.0317 23.4688 12.0317C23.759 12.0317 24.0373 11.9164 24.2426 11.7112C24.4478 11.506 24.5631 11.2276 24.5631 10.9374C24.5631 10.6471 24.4478 10.3688 24.2426 10.1636L18.7738 4.69481C18.6722 4.59311 18.5516 4.51244 18.4188 4.4574C18.2861 4.40235 18.1437 4.37402 18 4.37402C17.8563 4.37402 17.7139 4.40235 17.5812 4.4574C17.4484 4.51244 17.3278 4.59311 17.2262 4.69481L11.7574 10.1636C11.5522 10.3688 11.4369 10.6471 11.4369 10.9374C11.4369 11.2276 11.5522 11.506 11.7574 11.7112C11.9627 11.9164 12.241 12.0317 12.5312 12.0317C12.8215 12.0317 13.0998 11.9164 13.3051 11.7112Z" fill="#008080"/>
</svg>

        <p className="text-[#008080] md:text-lg text-base font-bold">Upload Files</p>
      </div>
    )}

    {additionalDocsFile.length > 0 && (
      <div className="space-y-3">
        {additionalDocsFile.map((file, index) => (
          <div
            key={index}
            className="flex flex-wrap items-center justify-between border border-dashed border-[#90CCCC] bg-white md:p-6 p-2 rounded-md"
          >
            <div className="flex items-center space-x-3">
  {getFileIcon(file)}
{file ? (
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

 className="md:text-base text-sm text-[#2D2727] font-medium md:max-w-[620px] max-w-[180px] truncate"
>
  {shortenFileNameUpload(file.name)}
</button>

) : null}
</div>

            <button
              onClick={() => handleRemoveAdditionalDocsFile (index)}
              className="bg-[#DD0707] text-[#FFF] text-xs py-1 px-4 rounded-full"
            >
              Remove
            </button>
          </div>
        ))}

        <button
        
          onClick={() => additionalDocsUploadInput.current?.click()}
          className="text-[#008080] border border-[#217B7E] hover:bg-[#E6F2F2] transition md:text-base text-sm font-medium p-3 rounded-md w-full ">
            <div className="flex items-center text-center justify-center gap-2">
          <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.625 20.7811V28.4374C30.625 29.0175 30.3945 29.5739 29.9843 29.9842C29.5741 30.3944 29.0177 30.6249 28.4375 30.6249H6.5625C5.98234 30.6249 5.42594 30.3944 5.0157 29.9842C4.60547 29.5739 4.375 29.0175 4.375 28.4374V20.7811C4.375 20.4911 4.49023 20.2129 4.69535 20.0077C4.90047 19.8026 5.17867 19.6874 5.46875 19.6874C5.75883 19.6874 6.03703 19.8026 6.24215 20.0077C6.44727 20.2129 6.5625 20.4911 6.5625 20.7811V28.4374H28.4375V20.7811C28.4375 20.4911 28.5527 20.2129 28.7579 20.0077C28.963 19.8026 29.2412 19.6874 29.5312 19.6874C29.8213 19.6874 30.0995 19.8026 30.3046 20.0077C30.5098 20.2129 30.625 20.4911 30.625 20.7811ZM12.8051 11.7112L16.4062 8.10867V20.7811C16.4062 21.0712 16.5215 21.3494 16.7266 21.5545C16.9317 21.7597 17.2099 21.8749 17.5 21.8749C17.7901 21.8749 18.0683 21.7597 18.2734 21.5545C18.4785 21.3494 18.5938 21.0712 18.5938 20.7811V8.10867L22.1949 11.7112C22.4002 11.9164 22.6785 12.0317 22.9688 12.0317C23.259 12.0317 23.5373 11.9164 23.7426 11.7112C23.9478 11.506 24.0631 11.2276 24.0631 10.9374C24.0631 10.6471 23.9478 10.3688 23.7426 10.1636L18.2738 4.69481C18.1722 4.59311 18.0516 4.51244 17.9188 4.4574C17.7861 4.40235 17.6437 4.37402 17.5 4.37402C17.3563 4.37402 17.2139 4.40235 17.0812 4.4574C16.9484 4.51244 16.8278 4.59311 16.7262 4.69481L11.2574 10.1636C11.0522 10.3688 10.9369 10.6471 10.9369 10.9374C10.9369 11.2276 11.0522 11.506 11.2574 11.7112C11.4627 11.9164 11.741 12.0317 12.0312 12.0317C12.3215 12.0317 12.5998 11.9164 12.8051 11.7112Z" fill="#008080"/>
</svg>

          Add Another Photo
          </div>
        </button>
      </div>
    )}

    <input
      type="file"
      name="uploads[additional_documents][]"
      ref={additionalDocsUploadInput}
      className="hidden"
      multiple
      accept=".jpg,.jpeg,.png,.pdf"
      onChange={handleAdditionalDocsFileChange}
    />
  </div>
)}


</div>
{previewFileURL && previewFileType && (
  <div className="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
    <div className="relative bg-white p-4 rounded shadow-lg md:max-w-[40%] md:max-h-[80%] max-w-[100%] max-h-[100%] w-full">
      <button
        onClick={() => {
          URL.revokeObjectURL(previewFileURL);
          setPreviewFileURL(null);
          setPreviewFileType(null);
        }}
        className="absolute top-2 right-2 text-black text-lg font-bold bg-white px-3 py-1 rounded hover:bg-gray-200"
      >
        ×
      </button>

      {previewFileType === 'image' ? (
        <img
          src={previewFileURL}
          alt="Preview"
          className="w-full max-w-[600px] max-h-[75vh] object-contain mx-auto"


        />
      ) : previewFileType === 'pdf' ? (
        <iframe
          src={previewFileURL}
          title="PDF Preview"
          className="w-full h-[80vh]"
        />
      ) : null}
    </div>
  </div>
)}

    </div>
  );
  
});

export default UploadSection;
