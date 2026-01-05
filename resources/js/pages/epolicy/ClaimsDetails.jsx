import { useEffect, useState } from "react";
import { useParams, useNavigate } from "react-router-dom";
import axiosClient from "../../axiosClient";

const ClaimDetails = () => {
  const { id } = useParams();
  const [claim, setClaim] = useState({});
    const [files, setFiles] = useState({});
    const navigate = useNavigate();
    
useEffect(() => {
  const fetchClaim = async () => {
    try {
      const res = await axiosClient.get(`/api/get-claim-info/${id}`);
      setClaim(res.data.claim);
      setFiles(res.data.files || {});
    } catch (error) {
      console.error("Error fetching claim details", error);
    }
  };
  fetchClaim();
}, [id]);

const FILE_LABELS = {
  // Motor Claims Uploads
  incident: "Claimant's Incident Report",
  damage: "Pictures of Damage",
  regcert: "Registration Certificate and OR",
  stencil: "Stencils of Motor and Serial No.",
  policy: "Copy of Insurance Policy",
  prempayment: "Copy of OR/ Proof Premium Payment",
  medreceipts: "Original Medical Receipts",
  medcert: "Medical Certificate",
  quotation: "Quotation of Repair Estimate",
  ctpl: "Certificate of No Claim or CTPL",
  identification: "Driver's License",
  vehicle_photos: "Vehicle Photo",
};
const getFileLabel = (fileType, index) => {
  const baseLabel = FILE_LABELS[fileType] || "Document";
  const isMulti = ["damage", "vehicle_photos"].includes(fileType);
  return isMulti ? `${baseLabel} ${index + 1}` : baseLabel;
};

const FILE_SECTION_MAP = {
  "Motor Claims Uploads": [
    "incident", "damage", "regcert", "stencil",
    "policy", "prempayment", "quotation", "ctpl", "medreceipts", "medcert"
  ],
  "Photos of the Vehicle": ["vehicle_photos"],
  "Identification": ["identification"],
};

const groupFilesBySection = (files) => {
  const sections = {};

  Object.entries(FILE_SECTION_MAP).forEach(([sectionTitle, types]) => {
    const entries = [];

    types.forEach((type) => {
      if (files[type]) {
        files[type].forEach((file, i) => {
          entries.push({
            label: getFileLabel(type, i),
            url: `/storage/${file.fileLocation}`,
          });
        });
      }
    });

    if (entries.length > 0) {
      sections[sectionTitle] = entries;
    }
  });

  return sections;
};

  return (
<div className="flex flex-col gap-6 w-full px-0 sm:px-6 md:px-12 lg:px-16 py-6 md:py-8">
  <div className="relative px-8 bg-white py-4 md:py-8 border max-xl border-[#F2F2F2]">
    <button onClick={() => navigate(-1)} className="flex items-center gap-2">
            <svg className="hidden md:inline"
              width="26"
              height="25"
              viewBox="0 0 26 25"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M15.5718 20.8652L7.75933 13.0527C7.68669 12.9801 7.62907 12.894 7.58975 12.7991C7.55044 12.7043 7.5302 12.6026 7.5302 12.4999C7.5302 12.3973 7.55044 12.2956 7.58975 12.2008C7.62907 12.1059 7.68669 12.0198 7.75933 11.9472L15.5718 4.13471C15.7184 3.98812 15.9173 3.90576 16.1246 3.90576C16.3319 3.90576 16.5307 3.98812 16.6773 4.13471C16.8239 4.28131 16.9062 4.48013 16.9062 4.68745C16.9062 4.89476 16.8239 5.09359 16.6773 5.24018L9.41656 12.4999L16.6773 19.7597C16.7499 19.8323 16.8075 19.9185 16.8467 20.0133C16.886 20.1081 16.9062 20.2098 16.9062 20.3124C16.9062 20.4151 16.886 20.5167 16.8467 20.6116C16.8075 20.7064 16.7499 20.7926 16.6773 20.8652C16.6047 20.9378 16.5185 20.9953 16.4237 21.0346C16.3289 21.0739 16.2272 21.0941 16.1246 21.0941C16.0219 21.0941 15.9203 21.0739 15.8254 21.0346C15.7306 20.9953 15.6444 20.9378 15.5718 20.8652Z"
                fill="#217B7E"
              />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none" className="inline md:hidden">
            <path d="M9.0431 13.0192L4.3556 8.33166C4.31202 8.28812 4.27744 8.23643 4.25385 8.17952C4.23026 8.12261 4.21812 8.06162 4.21812 8.00002C4.21812 7.93842 4.23026 7.87742 4.25385 7.82051C4.27744 7.76361 4.31202 7.71191 4.3556 7.66838L9.0431 2.98088C9.13106 2.89292 9.25035 2.84351 9.37474 2.84351C9.49913 2.84351 9.61842 2.89292 9.70638 2.98088C9.79434 3.06883 9.84375 3.18813 9.84375 3.31252C9.84375 3.43691 9.79434 3.5562 9.70638 3.64416L5.34994 8.00002L9.70638 12.3559C9.74993 12.3994 9.78448 12.4511 9.80805 12.508C9.83162 12.5649 9.84375 12.6259 9.84375 12.6875C9.84375 12.7491 9.83162 12.8101 9.80805 12.867C9.78448 12.9239 9.74993 12.9756 9.70638 13.0192C9.66283 13.0627 9.61113 13.0973 9.55422 13.1208C9.49732 13.1444 9.43633 13.1565 9.37474 13.1565C9.31315 13.1565 9.25216 13.1444 9.19526 13.1208C9.13835 13.0973 9.08665 13.0627 9.0431 13.0192Z" fill="#217B7E"/>
            </svg>
           <span className="font-medium text-base text-[#008080] hidden md:inline">Back</span>
            <span className="font-medium text-base text-[#001425] md:hidden">Claims</span>
          </button>

          <h2 className="md:text-[30px] text-xl text-[#303030] font-medium absolute left-1/2 transform -translate-x-1/2 ">
            Motor Claim
          </h2>
      
        <div className="w-full sm:max-w-xl md:max-w-2xl lg:max-w-3xl mx-auto bg-white rounded-lg shadow-none p-4 sm:p-6 md:p-8 border-none">
        <div className="grid grid-cols-2 gap-x-4 gap-y-1  mt-5 border-l-4 rounded-lg overflow-hidden text-left border-l-[#E6E3DD] bg-[#FBF7F7]
                    md:grid-cols-3">
        <div className="px-4 pt-4 pb-1 col-span-1 md:ml-8 ml-0 flex flex-col-reverse md:flex-col">
            <p className="text-[#1D1D1D] text-base font-medium">
            {claim.product_line || "Auto Excel Plus"}
            </p>
            <p className="text-xs uppercase text-[#808080] font-medium">Product</p>
        </div>
        <div className="md:px-4 px-1 md:pt-4 pt-0 pb-1 col-span-1 flex flex-col-reverse md:flex-col ml-0 md:ml-4">
            <p className="text-[#1D1D1D] text-base font-medium">
            {claim.created_at
                ? new Date(claim.created_at.replace(" ", "T")).toLocaleDateString("en-US")
                : "MM/DD/YYYY"}
            </p>
            <p className="text-xs uppercase text-[#808080] font-medium">Date of Submission</p>
        </div>
        <div className="px-4 md:pt-4 pt-0 pb-4 col-span-2 md:col-span-1 flex flex-col-reverse md:flex-col">
            <p className="text-[#1D1D1D] text-base font-medium flex items-center gap-1">
            {claim.status || "Submitted"} 
            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.5 0.90625C5.29477 0.90625 4.11661 1.26364 3.1145 1.93323C2.11238 2.60282 1.33133 3.55454 0.870112 4.66802C0.40889 5.78151 0.288214 7.00676 0.523342 8.18883C0.758471 9.3709 1.33884 10.4567 2.19107 11.3089C3.0433 12.1612 4.1291 12.7415 5.31117 12.9767C6.49324 13.2118 7.71849 13.0911 8.83198 12.6299C9.94547 12.1687 10.8972 11.3876 11.5668 10.3855C12.2364 9.38339 12.5938 8.20523 12.5938 7C12.592 5.38436 11.9495 3.83538 10.807 2.69295C9.66462 1.55052 8.11564 0.907956 6.5 0.90625ZM6.5 10.75C6.36094 10.75 6.225 10.7088 6.10937 10.6315C5.99374 10.5542 5.90362 10.4444 5.8504 10.3159C5.79718 10.1875 5.78326 10.0461 5.81039 9.9097C5.83752 9.77331 5.90448 9.64802 6.00282 9.54969C6.10115 9.45136 6.22644 9.38439 6.36283 9.35726C6.49922 9.33013 6.6406 9.34406 6.76908 9.39727C6.89756 9.45049 7.00737 9.54061 7.08463 9.65624C7.16189 9.77187 7.20313 9.90781 7.20313 10.0469C7.20313 10.2334 7.12905 10.4122 6.99719 10.5441C6.86533 10.6759 6.68648 10.75 6.5 10.75ZM6.96875 7.89531V7.9375C6.96875 8.06182 6.91937 8.18105 6.83146 8.26896C6.74355 8.35686 6.62432 8.40625 6.5 8.40625C6.37568 8.40625 6.25645 8.35686 6.16855 8.26896C6.08064 8.18105 6.03125 8.06182 6.03125 7.9375V7.46875C6.03125 7.34443 6.08064 7.2252 6.16855 7.13729C6.25645 7.04939 6.37568 7 6.5 7C7.2752 7 7.90625 6.47266 7.90625 5.82812C7.90625 5.18359 7.2752 4.65625 6.5 4.65625C5.72481 4.65625 5.09375 5.18359 5.09375 5.82812V6.0625C5.09375 6.18682 5.04437 6.30605 4.95646 6.39396C4.86855 6.48186 4.74932 6.53125 4.625 6.53125C4.50068 6.53125 4.38145 6.48186 4.29355 6.39396C4.20564 6.30605 4.15625 6.18682 4.15625 6.0625V5.82812C4.15625 4.66504 5.20742 3.71875 6.5 3.71875C7.79258 3.71875 8.84375 4.66504 8.84375 5.82812C8.84375 6.84648 8.0375 7.69902 6.96875 7.89531Z" fill="#217B7E"/>
            </svg>
            </p>
            <p className="text-xs uppercase text-[#808080] font-medium">Status</p>
        </div>
        </div>

        <div className="mt-6 space-y-6">
          {/* Insurance Policy Info */}
          <Section title="Insurance Policy Information" data={[
            ["Policy Number", claim.policy_no],
            ["Product", claim.product_line || "Motor"],
            ["Damage", claim.damage_type]
          ]} />

          {/* Insured Info */}
          <Section title="Insured Information" data={[
            ["Full Name of the Insured", claim.fullname],
            ["Complete Address of the Insured", claim.address],
            ["Date of Birth", claim.birthdate 
            ? new Date(claim.birthdate.replace(" ", "T")).toLocaleDateString("en-US") 
            : "MM/DD/YYYY"
            ],
            ["Email Address", claim.email_address],
            ["Mobile", claim.mobile]
          ]} />

          {/* Vehicle Info */}
          <Section title="Insured Vehicle Information" data={[
            ["Plate Number", claim.plate_no],
            ["Model", claim.model],
            ["Vehicle Type", claim.vehicle_type],
            ["Year", claim.year]
          ]} />

          {/* Accident Details */}
          <Section title="Details of the Accident" data={[
            ["Place of the Accident", claim.place_of_accident],
            ["Date of the Accident", claim.date_of_accident 
            ? new Date(claim.date_of_accident.replace(" ", "T")).toLocaleDateString("en-US") 
            : "MM/DD/YYYY"
            ],
            ["Full Name of the Driver", claim.fullname_driver],
            ["License Number", claim.license_no],
            ["Date of Expiry", claim.expiry_date 
            ? new Date(claim.expiry_date.replace(" ", "T")).toLocaleDateString("en-US") 
            : "MM/DD/YYYY"
            ],
            ["Classification", claim.classification || "N/A"],
            ["Restriction Code", claim.restriction_code || "N/A"]
          ]} />
          <Section title="Claims Requirements">
        {Object.entries(groupFilesBySection(files)).map(([sectionTitle, entries]) => (
            <FileSection key={sectionTitle} title={sectionTitle} entries={entries} />
        ))}
        </Section>

        {/* Agenr Info */}
          <Section title="Agent Information" data={[
            ["Agent Name", claim.agent_name || "N/A"],
            ["Mobile", claim.agent_mobile || "N/A"]
          ]} />
            <div>
        <div className="bg-[#013353] text-[#FFF] font-medium text-base md:m-0 m-4 px-4 py-2 rounded-md text-center cursor-pointer" onClick={() => navigate(-1)}>Back</div>
        </div>
        </div>
      </div>
    </div>
  </div>
  );
};

const Section = ({ title, data, children }) => (
  <div>
    <div className="bg-[#373A3D] text-[#FFF] font-medium text-base px-4 py-2 rounded-t-md text-center">{title}</div>
    <div className="border border-[#F5F5F5] border-t-0 rounded-b-md divide-y">
      {children
        ? children
        : data.map(([label, value], i) => (
           <div key={i} className="flex justify-between px-4 py-2 text-sm gap-x-4">
            <span className="text-[#585858] font-medium text-sm md:text-base whitespace-nowrap">
                {label}
            </span>
            <span className="font-medium text-sm md:text-base text-[#2D2727] break-words text-right max-w-[60%]">
                {value || "-"}
            </span>
            </div>

          ))}
    </div>
  </div>
);

const FileSection = ({ title, entries }) => (
 <div className="border-none mt-3">
    <div className="bg-[#F7F6F6] text-[#2D2727] font-medium text-base px-1 py-2 rounded-t-md text-left border-t-0 m-3">
      {title}
    </div>
    <div className="border-none border-b-0 rounded-b-md divide-y-0">
      {entries.map((entry, idx) => (
       <div key={idx} className="flex justify-between flex-wrap gap-2 px-4 py-2 text-sm border-none">
          <span className="text-[#585858] font-medium md:text-base text-sm break-words text-left max-w-[60%]">{entry.label}</span>
          <a
            href={entry.url}
            target="_blank"
            rel="noopener noreferrer"
            className="text-[#008080] font-medium md:text-base text-sm"
          >
            View Photo
          </a>
        </div>
      ))}
    </div>
  </div>
);



export default ClaimDetails;
