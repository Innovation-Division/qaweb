import DropdownSingle from "@/components/DropdownSingle";
import { useEffect, useRef, useState } from "react";
import MobileNumber from "@/components/MobileNumber";
import BeneficiariesForm from "../../../components/BeneficiariesForm";
import Agent from "../../../components/Domestic/Agent";
import PresentAddress from "../../../components/Domestic/PresentAddress";
import Personal from "../../../components/Domestic/Personal";
import Identification from "../../../components/Domestic/Identification";
import EmergencyContact from "../../../components/Domestic/EmergencyContact";

const relationships = [
    { id: 1, name: "Select Relationship", default: true },
    { id: 2, name: "Father" },
    { id: 3, name: "Mother" },
    { id: 4, name: "Brother" },
    { id: 5, name: "Sister" },
    { id: 6, name: "Son" },
    { id: 7, name: "Daughter" },
    { id: 8, name: "Nephew" },
    { id: 9, name: "Niece" },
    { id: 10, name: "Siblings" },
    { id: 11, name: "Husband" },
    { id: 12, name: "Wife" },
];

const ThirdPage = ({
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
    birthDate,
}) => {
    const [errors, setErrors] = useState({});
    const [isEmailValid, setIsEmailValid] = useState("");
    const [isMobileValid, setIsMobileValid] = useState("");
    const [isEmergencyMobileValid, setIsEmergencyMobileValid] = useState("");
    const [selectedImage, setSelectedImage] = useState(idImage || null);
    const [previewImage, setPreviewImage] = useState(previewIdImage || null);
    const [uploading, setUploading] = useState(false);
    const [uploadProgress, setUploadProgress] = useState(0);
    const fileInputRef = useRef(null);
    const [showViewModal, setShowViewModal] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const MAX_FILE_SIZE_MB = 5;
    const MAX_FILE_SIZE_BYTES = MAX_FILE_SIZE_MB * 1024 * 1024;
    const [fileSizeError, setFileSizeError] = useState("");
    const [isBeneficiaryValid, setIsBeneficiaryValid] = useState("");
    const [selectedBeneficiary, setSelectedBeneficiary] = useState(null);

    const handleButtonClick = () => {
        fileInputRef.current.click();
    };

    const handleImageChange = (event) => {
        if (event.target.files && event.target.files[0]) {
            const img = event.target.files[0];

            if (img.size > MAX_FILE_SIZE_BYTES) {
                setFileSizeError(
                    `File size exceeds the limit of ${MAX_FILE_SIZE_MB}MB. Please select a smaller image.`
                );
                setSelectedImage(null);
                setPreviewImage(null);
                // Optionally clear the file input
                event.target.value = "";
                return;
            }

            if (!img.type.startsWith("image/")) {
                setFileSizeError(
                    `Invalid file type. Please select an image file.`
                );
                setSelectedImage(null);
                setPreviewImage(null);
                // Optionally clear the file input
                event.target.value = "";
                return;
            }
            setFileSizeError("");
            setSelectedImage(img);
            setFormData({
                ...formData,
                personal_data: {
                    ...formData.personal_data,
                    id_image: img,
                    preview_id_image: URL.createObjectURL(img),
                },
            });
            setPreviewImage(URL.createObjectURL(img));
            // Start the simulated progress immediately after image selection
            setUploading(true);
            setUploadProgress(0);
            startProgressSimulation();
            setErrors({
                ...errors,
                idImage: "",
            });
        } else {
            // Reset progress if no image is selected
            setUploading(false);
            setUploadProgress(0);
        }
    };

    const startProgressSimulation = () => {
        const interval = setInterval(() => {
            setUploadProgress((prevProgress) => {
                const newProgress = prevProgress + 100 / 3; // Increment to reach 100% in 3 steps
                if (newProgress >= 100) {
                    clearInterval(interval);
                    setTimeout(() => {
                        setUploading(false);
                        setUploadProgress(0);
                    }, 500);
                    return 100;
                }
                return newProgress;
            });
        }, 1000); // Update progress every 1 second
    };

    const handleDeleteImage = () => {
        setSelectedImage(null);
        setPreviewImage(null);
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                id_image: null,
                preview_id_image: null,
                id_type: "",
                id_number: "",
            },
        });
        setErrors({
            ...errors,
            idImage: "",
            idType: "",
            idNumber: "",
        });
        // Optionally, you might want to reset the file input as well
        if (fileInputRef.current) {
            fileInputRef.current.value = ""; // This clears the selected file
        }

        setFileSizeError("");
    };

    const validateEmail = (input) => {
        var emailReg = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,3}$/i;
        return emailReg.test(input);
    };

    const handleEmailChange = (value) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                email: value,
            },
        });
    };

    const handleSelectRelationship = (value, id) => {
        handleInputChange(id, "relationship", value);
    };

    const handleInputChange = (id, name, value) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                beneficiaries: beneficiaries.map((beneficiary) =>
                    beneficiary.id === id
                        ? { ...beneficiary, [name]: value }
                        : beneficiary
                ),
            },
        });

        if (
            beneficiaries.some(
                (beneficiary) =>
                    beneficiary.fullName !== "" &&
                    beneficiary.mobile !== "" &&
                    beneficiary.relationship !== ""
            )
        ) {
            setErrors((prevErrors) => ({
                ...prevErrors,
                beneficiary: "",
                beneficiaryFullName: "",
                beneficiaryMobile: "",
                beneficiaryRelationship: "",
            }));
            setIsBeneficiaryValid(true);
        } else {
            setIsBeneficiaryValid("");
        }
    };

    const handleMobileChange = (id, value) => {
        let error = "";
        if (!/^\d*$/.test(value)) {
            error = "Mobile number must contain only numbers.";
        } else if (!value.startsWith("09")) {
            error = 'Mobile number must start with "09".';
        } else if (value.length !== 11) {
            error = "Mobile number must be 11 digits long.";
        }

        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                beneficiaries: beneficiaries.map((beneficiary) =>
                    beneficiary.id === id
                        ? { ...beneficiary, mobile: value, mobileError: error }
                        : beneficiary
                ),
            },
        });

        if (error === "") {
            if (
                beneficiaries.some(
                    (beneficiary) =>
                        beneficiary.fullName !== "" &&
                        beneficiary.mobile !== "" &&
                        beneficiary.relationship !== ""
                )
            ) {
                setErrors((prevErrors) => ({
                    ...prevErrors,
                    beneficiary: "",
                    beneficiaryFullName: "",
                    beneficiaryMobile: "",
                    beneficiaryRelationship: "",
                }));
                setIsBeneficiaryValid(true);
            }
        } else {
            setIsBeneficiaryValid("");
        }
    };

    const handleAddBeneficiary = () => {
        const maxId = beneficiaries.reduce(
            (max, beneficiary) => Math.max(max, beneficiary.id),
            0
        );

        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                beneficiaries: [
                    ...beneficiaries,
                    {
                        id: maxId + 1,
                        fullName: "",
                        relationship: "",
                        mobile: "",
                        mobileError: "",
                        fullNameError: "",
                        relationshipError: "",
                        setEmergencyContact: false,
                    },
                ],
            },
        });
    };

    const handleRemoveBeneficiary = (id) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                beneficiaries: beneficiaries.filter(
                    (beneficiary) => beneficiary.id !== id
                ),
            },
        });
    };

    const handleSetEmergencyContact = (id) => {
        const selectedBeneficiary = beneficiaries.find(
            (beneficiary) => beneficiary.id === id
        );

        if (
            selectedBeneficiary.fullName === "" ||
            selectedBeneficiary.mobile === "" ||
            selectedBeneficiary.relationship === "" ||
            checkMobileNumber(selectedBeneficiary.mobile) === false
        ) {
            return;
        }

        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                emergency_full_name: selectedBeneficiary.fullName,
                emergency_relationship: selectedBeneficiary.relationship,
                emergency_mobile: selectedBeneficiary.mobile,
                beneficiaries: beneficiaries.map((beneficiary) =>
                    beneficiary.id === id
                        ? {
                              ...beneficiary,
                              setEmergencyContact: true,
                          }
                        : { ...beneficiary, setEmergencyContact: false }
                ),
            },
        });

        setSelectedBeneficiary(id);

        setErrors({
            ...errors,
            emergencyFullName: "",
            emergencyMobile: "",
            emergencyRelationship: "",
        });
    };

    const handleNext = async () => {
        if (validate()) {
            const finalBeneficiaries = beneficiaries.filter(
                (beneficiary) =>
                    beneficiary.fullName !== "" &&
                    beneficiary.mobile !== "" &&
                    beneficiary.relationship !== "" &&
                    checkMobileNumber(beneficiary.mobile) === true
            );

            setFormData({
                ...formData,
                personal_data: {
                    ...formData.personal_data,
                    beneficiaries: finalBeneficiaries,
                },
            });

            nextStep();
        }
    };

    const validate = () => {
        let isValid = true;
        const newErrors = {};

        if (
            beneficiaries.length === 0 ||
            !beneficiaries.some(
                (beneficiary) =>
                    beneficiary.fullName !== "" &&
                    beneficiary.mobile !== "" &&
                    beneficiary.relationship !== "" &&
                    checkMobileNumber(beneficiary.mobile) === true
            )
        ) {
            newErrors.beneficiary = "Please add at least one beneficiary";
            isValid = false;

            newErrors.beneficiaryFullName = "Full Name is required";
            newErrors.beneficiaryMobile = "Mobile number is required";
            newErrors.beneficiaryRelationship = "Relationship is required";
        }

        if (!firstName) {
            newErrors.firstName = "First Name is required";
            isValid = false;
        }

        if (!lastName) {
            newErrors.lastName = "Last Name is required";
            isValid = false;
        }

        if (!suffix) {
            newErrors.suffix = "Suffix is required";
            isValid = false;
        }

        if (!email) {
            newErrors.email = "Email is required";
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            newErrors.email = "Invalid email format";
            isValid = false;
        }

        if (!mobile) {
            newErrors.mobile = "Mobile number is required";
            isValid = false;
        } else if (checkMobileNumber(mobile) === false) {
            newErrors.mobile = "Mobile number must be 11 digits";
            isValid = false;
        }

        if (!birthDate) {
            newErrors.birthDate = "Birth Date is required";
            isValid = false;
        }

        if (!region) {
            newErrors.region = "Region is required";
            isValid = false;
        }

        if (!province) {
            newErrors.province = "Province is required";
            isValid = false;
        }

        if (!city) {
            newErrors.city = "City is required";
            isValid = false;
        }

        if (!barangay) {
            newErrors.barangay = "Barangay is required";
            isValid = false;
        }

        if (!houseNo) {
            newErrors.houseNo = "House/Unit No. is required";
            isValid = false;
        }

        if (!street) {
            newErrors.street = "Street is required";
            isValid = false;
        }

        if (!zip) {
            newErrors.zip = "ZIP is required";
            isValid = false;
        }

        if (selectedImage === null) {
            newErrors.idImage = "ID Image is required";
            isValid = false;
        }

        if (!idType) {
            newErrors.idType = "ID Type is required";
            isValid = false;
        }

        if (!idNumber) {
            newErrors.idNumber = "ID Number is required";
            isValid = false;
        }

        if (!emergencyFullName) {
            newErrors.emergencyFullName = "Emergency Contact Name is required";
            isValid = false;
        }

        if (!emergencyMobile) {
            newErrors.emergencyMobile = "Emergency Contact Mobile is required";
            isValid = false;
        } else if (!/^\d{11}$/.test(emergencyMobile)) {
            newErrors.emergencyMobile =
                "Emergency Contact Mobile number must be 11 digits";
            isValid = false;
        }

        if (!emergencyRelationship) {
            newErrors.emergencyRelationship =
                "Emergency Contact Relationship is required";
            isValid = false;
        }

        if (!isHaveAgent) {
            newErrors.isHaveAgent = "Select if you have an agent or not";
            isValid = false;
        } else {
            if (isHaveAgent === "yes") {
                if (!agentName) {
                    newErrors.isHaveAgent =
                        "Agent Name is required if you have an agent";
                    newErrors.agentName = "Agent Name is required";

                    isValid = false;
                }
            }
        }

        setErrors(newErrors);

        return isValid;
    };

    const checkMobileNumber = (value) => {
        let error = false;
        if (!/^\d*$/.test(value)) {
            error = false;
        } else if (!value.startsWith("09")) {
            error = false;
        } else if (value.length !== 11) {
            error = false;
        } else {
            error = true;
        }

        return error;
    };

    useEffect(() => {
        if (email) {
            const newErrors = {};
            if (!validateEmail(email)) {
                newErrors.email = "Invalid email format";
                setErrors(newErrors);

                setIsEmailValid(false);
            } else {
                setErrors((prevErrors) => {
                    const { email, ...rest } = prevErrors;
                    return rest;
                });

                setIsEmailValid(true);
            }
        }
    }, [email]);

    return (
        <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full px-8">
            <Personal
                firstName={firstName}
                lastName={lastName}
                suffix={suffix}
                mobile={mobile}
                isMobileValid={isMobileValid}
                setIsMobileValid={setIsMobileValid}
                email={email}
                isEmailValid={isEmailValid}
                birthDate={birthDate}
                errors={errors}
                setErrors={setErrors}
                formData={formData}
                setFormData={setFormData}
                handlePersonalMobileChange={handlePersonalMobileChange}
                handleEmailChange={handleEmailChange}
            />

            <PresentAddress
                formData={formData}
                setFormData={setFormData}
                regions={regions}
                provinces={provinces}
                cities={cities}
                barangays={barangays}
                region={region}
                province={province}
                city={city}
                barangay={barangay}
                houseNo={houseNo}
                street={street}
                zip={zip}
                errors={errors}
                setErrors={setErrors}
            />

            <Identification
                formData={formData}
                setFormData={setFormData}
                selectedImage={selectedImage}
                idNumber={idNumber}
                idType={idType}
                fileSizeError={fileSizeError}
                errors={errors}
                uploading={uploading}
                uploadProgress={uploadProgress}
                handleButtonClick={handleButtonClick}
                handleImageChange={handleImageChange}
                fileInputRef={fileInputRef}
                setShowViewModal={setShowViewModal}
                setShowDeleteModal={setShowDeleteModal}
                setErrors={setErrors}
            />

            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Beneficiary
                    {isBeneficiaryValid === true && (
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        </span>
                    )}
                    {errors.beneficiary ? (
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
                </h2>
            </div>
            <div className="flex flex-col items-center justify-center py-6 md:py-6 md:max-w-[1000px] w-full">
                <div className="flex gap-4 mb-10 w-full border-l-4 md:border-l-2 border-[#003592] pl-2 md:pl-6 py-3 md:py-6 rounded-md bg-[#F5F5F5]">
                    <span>
                        <svg
                            width="22"
                            height="22"
                            viewBox="0 0 22 22"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            className="w-4 h-4 md:w-6 md:h-6"
                        >
                            <path
                                d="M20.1744 8.63937C19.8209 8.27 19.4553 7.88938 19.3175 7.55469C19.19 7.24813 19.1825 6.74 19.175 6.24781C19.1609 5.33281 19.1459 4.29594 18.425 3.575C17.7041 2.85406 16.6672 2.83906 15.7522 2.825C15.26 2.8175 14.7519 2.81 14.4453 2.6825C14.1116 2.54469 13.73 2.17906 13.3606 1.82562C12.7137 1.20406 11.9788 0.5 11 0.5C10.0212 0.5 9.28719 1.20406 8.63937 1.82562C8.27 2.17906 7.88938 2.54469 7.55469 2.6825C7.25 2.81 6.74 2.8175 6.24781 2.825C5.33281 2.83906 4.29594 2.85406 3.575 3.575C2.85406 4.29594 2.84375 5.33281 2.825 6.24781C2.8175 6.74 2.81 7.24813 2.6825 7.55469C2.54469 7.88844 2.17906 8.27 1.82562 8.63937C1.20406 9.28625 0.5 10.0212 0.5 11C0.5 11.9788 1.20406 12.7128 1.82562 13.3606C2.17906 13.73 2.54469 14.1106 2.6825 14.4453C2.81 14.7519 2.8175 15.26 2.825 15.7522C2.83906 16.6672 2.85406 17.7041 3.575 18.425C4.29594 19.1459 5.33281 19.1609 6.24781 19.175C6.74 19.1825 7.24813 19.19 7.55469 19.3175C7.88844 19.4553 8.27 19.8209 8.63937 20.1744C9.28625 20.7959 10.0212 21.5 11 21.5C11.9788 21.5 12.7128 20.7959 13.3606 20.1744C13.73 19.8209 14.1106 19.4553 14.4453 19.3175C14.7519 19.19 15.26 19.1825 15.7522 19.175C16.6672 19.1609 17.7041 19.1459 18.425 18.425C19.1459 17.7041 19.1609 16.6672 19.175 15.7522C19.1825 15.26 19.19 14.7519 19.3175 14.4453C19.4553 14.1116 19.8209 13.73 20.1744 13.3606C20.7959 12.7137 21.5 11.9788 21.5 11C21.5 10.0212 20.7959 9.28719 20.1744 8.63937ZM19.0916 12.3228C18.6425 12.7916 18.1775 13.2763 17.9309 13.8716C17.6947 14.4434 17.6844 15.0969 17.675 15.7297C17.6656 16.3859 17.6553 17.0731 17.3638 17.3638C17.0722 17.6544 16.3897 17.6656 15.7297 17.675C15.0969 17.6844 14.4434 17.6947 13.8716 17.9309C13.2763 18.1775 12.7916 18.6425 12.3228 19.0916C11.8541 19.5406 11.375 20 11 20C10.625 20 10.1422 19.5387 9.67719 19.0916C9.21219 18.6444 8.72375 18.1775 8.12844 17.9309C7.55656 17.6947 6.90313 17.6844 6.27031 17.675C5.61406 17.6656 4.92688 17.6553 4.63625 17.3638C4.34562 17.0722 4.33437 16.3897 4.325 15.7297C4.31562 15.0969 4.30531 14.4434 4.06906 13.8716C3.8225 13.2763 3.3575 12.7916 2.90844 12.3228C2.45937 11.8541 2 11.375 2 11C2 10.625 2.46125 10.1422 2.90844 9.67719C3.35562 9.21219 3.8225 8.72375 4.06906 8.12844C4.30531 7.55656 4.31562 6.90313 4.325 6.27031C4.33437 5.61406 4.34469 4.92688 4.63625 4.63625C4.92781 4.34562 5.61031 4.33437 6.27031 4.325C6.90313 4.31562 7.55656 4.30531 8.12844 4.06906C8.72375 3.8225 9.20844 3.3575 9.67719 2.90844C10.1459 2.45937 10.625 2 11 2C11.375 2 11.8578 2.46125 12.3228 2.90844C12.7878 3.35562 13.2763 3.8225 13.8716 4.06906C14.4434 4.30531 15.0969 4.31562 15.7297 4.325C16.3859 4.33437 17.0731 4.34469 17.3638 4.63625C17.6544 4.92781 17.6656 5.61031 17.675 6.27031C17.6844 6.90313 17.6947 7.55656 17.9309 8.12844C18.1775 8.72375 18.6425 9.20844 19.0916 9.67719C19.5406 10.1459 20 10.625 20 11C20 11.375 19.5387 11.8578 19.0916 12.3228ZM15.2806 8.21937C15.3504 8.28903 15.4057 8.37175 15.4434 8.46279C15.4812 8.55384 15.5006 8.65144 15.5006 8.75C15.5006 8.84856 15.4812 8.94616 15.4434 9.0372C15.4057 9.12825 15.3504 9.21097 15.2806 9.28063L10.0306 14.5306C9.96097 14.6004 9.87825 14.6557 9.7872 14.6934C9.69616 14.7312 9.59856 14.7506 9.5 14.7506C9.40144 14.7506 9.30384 14.7312 9.2128 14.6934C9.12175 14.6557 9.03903 14.6004 8.96937 14.5306L6.71937 12.2806C6.57864 12.1399 6.49958 11.949 6.49958 11.75C6.49958 11.551 6.57864 11.3601 6.71937 11.2194C6.86011 11.0786 7.05098 10.9996 7.25 10.9996C7.44902 10.9996 7.63989 11.0786 7.78063 11.2194L9.5 12.9397L14.2194 8.21937C14.289 8.14964 14.3717 8.09432 14.4628 8.05658C14.5538 8.01884 14.6514 7.99941 14.75 7.99941C14.8486 7.99941 14.9462 8.01884 15.0372 8.05658C15.1283 8.09432 15.211 8.14964 15.2806 8.21937Z"
                                fill="#003592"
                            />
                        </svg>
                    </span>
                    <p className="text-[#2D2727] text-xs md:text-sm md:leading-6">
                        You may add Beneficiaries up to three (3) only.
                    </p>
                </div>
                {beneficiaries.map((beneficiary, index) => (
                    <BeneficiariesForm
                        key={beneficiary.id}
                        index={index}
                        beneficiaries={beneficiaries}
                        beneficiary={beneficiary}
                        relationships={relationships}
                        handleAddBeneficiary={handleAddBeneficiary}
                        handleRemoveBeneficiary={handleRemoveBeneficiary}
                        handleSetEmergencyContact={handleSetEmergencyContact}
                        handleInputChange={handleInputChange}
                        handleMobileChange={handleMobileChange}
                        handleSelectRelationship={handleSelectRelationship}
                        errors={errors}
                        setErrors={setErrors}
                        selectedBeneficiary={selectedBeneficiary}
                    />
                ))}
            </div>
            <EmergencyContact
                formData={formData}
                setFormData={setFormData}
                errors={errors}
                setErrors={setErrors}
                handleSelectEmergencyRelationship={
                    handleSelectEmergencyRelationship
                }
                handleEmergencyMobileChange={handleEmergencyMobileChange}
                emergencyFullName={emergencyFullName}
                emergencyMobile={emergencyMobile}
                emergencyRelationship={emergencyRelationship}
                setIsEmergencyMobileValid={setIsEmergencyMobileValid}
                isEmergencyMobileValid={isEmergencyMobileValid}
                relationships={relationships}
            />
            <Agent
                isHaveAgent={isHaveAgent}
                agentName={agentName}
                errors={errors}
                setFormData={setFormData}
                formData={formData}
                setErrors={setErrors}
            />
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-20 gap-8">
                <button
                    className="text-[#008080] px-5 py-[10px] w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded"
                    onClick={prevStep}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        class="bi bi-arrow-left-short hidden group-hover:block"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"
                        />
                    </svg>
                    <span>Back</span>
                </button>
                <button
                    disabled={
                        errors.firstName ||
                        errors.lastName ||
                        errors.suffix ||
                        errors.mobile ||
                        errors.email ||
                        errors.region ||
                        errors.province ||
                        errors.city ||
                        errors.barangay ||
                        errors.houseNo ||
                        errors.street ||
                        errors.zip ||
                        errors.emergencyFullName ||
                        errors.emergencyMobile ||
                        errors.emergencyRelationship ||
                        errors.isHaveAgent ||
                        errors.agentName ||
                        errors.beneficiaryFullName ||
                        errors.beneficiaryMobile ||
                        errors.beneficiaryRelationship ||
                        errors.beneficiary
                    }
                    className="text-white bg-[#008080] px-5 py-[10px] rounded w-full md:w-auto flex justify-center gap-2 group disabled:opacity-50"
                    onClick={handleNext}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        className={`bi bi-arrow-right-short hidden  ${
                            errors.firstName ||
                            errors.lastName ||
                            errors.suffix ||
                            errors.mobile ||
                            errors.email ||
                            errors.region ||
                            errors.province ||
                            errors.city ||
                            errors.barangay ||
                            errors.houseNo ||
                            errors.street ||
                            errors.zip ||
                            errors.emergencyFullName ||
                            errors.emergencyMobile ||
                            errors.emergencyRelationship ||
                            errors.isHaveAgent ||
                            errors.agentName ||
                            errors.beneficiaryFullName ||
                            errors.beneficiaryMobile ||
                            errors.beneficiaryRelationship ||
                            errors.beneficiary
                                ? ""
                                : "group-hover:block"
                        }`}
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                        />
                    </svg>
                    <span>Continue</span>
                </button>
            </div>
            <div
                class={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                    !showViewModal && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
                        &#8203;
                    </span>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[450px] md:max-w-xl sm:py-8 px-5 md:px-12 sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white flex flex-col items-center justify-between gap-7 md:gap-8 my-5">
                            <img
                                src={previewImage}
                                alt=""
                                className="w-[350px] h-auto"
                            />
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium text-base leading-6 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => setShowViewModal(false)}
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        class="bi bi-arrow-left-short hidden group-hover:block"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"
                                        />
                                    </svg>
                                    <span>Close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                    !showDeleteModal && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
                        &#8203;
                    </span>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[350px] sm:max-w-lg sm:py-8 px-5 md:px-12 sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="flex items-center justify-center px-4 pt-3 mb-10">
                            <svg
                                width="109"
                                height="109"
                                viewBox="0 0 109 109"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    x="4"
                                    y="4"
                                    width="101"
                                    height="101"
                                    rx="12"
                                    fill="#FDE1E1"
                                />
                                <rect
                                    x="4"
                                    y="4"
                                    width="101"
                                    height="101"
                                    rx="12"
                                    stroke="#FEF3F2"
                                    stroke-width="8"
                                />
                                <path
                                    d="M55 32.25C50.5005 32.25 46.102 33.5843 42.3608 36.0841C38.6196 38.5839 35.7036 42.1369 33.9818 46.294C32.2599 50.451 31.8093 55.0252 32.6871 59.4383C33.565 63.8514 35.7317 67.905 38.9133 71.0867C42.095 74.2683 46.1486 76.4351 50.5617 77.3129C54.9748 78.1907 59.549 77.7402 63.7061 76.0183C67.8631 74.2964 71.4161 71.3804 73.9159 67.6392C76.4157 63.898 77.75 59.4995 77.75 55C77.7436 48.9683 75.3447 43.1854 71.0797 38.9204C66.8146 34.6553 61.0317 32.2564 55 32.25ZM55 74.25C51.1927 74.25 47.4709 73.121 44.3053 71.0058C41.1396 68.8906 38.6723 65.8841 37.2153 62.3667C35.7583 58.8492 35.3771 54.9786 36.1199 51.2445C36.8627 47.5104 38.696 44.0804 41.3882 41.3882C44.0804 38.696 47.5104 36.8626 51.2445 36.1199C54.9787 35.3771 58.8492 35.7583 62.3667 37.2153C65.8841 38.6723 68.8906 41.1396 71.0058 44.3053C73.121 47.4709 74.25 51.1927 74.25 55C74.2442 60.1036 72.2142 64.9966 68.6054 68.6054C64.9966 72.2142 60.1037 74.2442 55 74.25ZM53.25 56.75V44.5C53.25 44.0359 53.4344 43.5908 53.7626 43.2626C54.0908 42.9344 54.5359 42.75 55 42.75C55.4641 42.75 55.9093 42.9344 56.2374 43.2626C56.5656 43.5908 56.75 44.0359 56.75 44.5V56.75C56.75 57.2141 56.5656 57.6593 56.2374 57.9874C55.9093 58.3156 55.4641 58.5 55 58.5C54.5359 58.5 54.0908 58.3156 53.7626 57.9874C53.4344 57.6593 53.25 57.2141 53.25 56.75ZM57.625 64.625C57.625 65.1442 57.4711 65.6517 57.1826 66.0834C56.8942 66.515 56.4842 66.8515 56.0046 67.0502C55.5249 67.2489 54.9971 67.3008 54.4879 67.1996C53.9787 67.0983 53.511 66.8483 53.1439 66.4812C52.7767 66.114 52.5267 65.6463 52.4254 65.1371C52.3242 64.6279 52.3761 64.1001 52.5748 63.6205C52.7735 63.1408 53.11 62.7308 53.5416 62.4424C53.9733 62.154 54.4808 62 55 62C55.6962 62 56.3639 62.2766 56.8562 62.7688C57.3484 63.2611 57.625 63.9288 57.625 64.625Z"
                                    fill="#BB251A"
                                />
                            </svg>
                        </div>
                        <div class="bg-white flex flex-col items-center justify-between px-4 gap-5 my-5">
                            <p className="font-bold md:text-[27px] leading-6 text-[#2D2727] text-center">
                                Delete Photo
                            </p>
                            <p className="font-medium text-base leading-6 text-[#3B3939] text-center mb-5">
                                Do you really want to delete the uploaded photo?
                                This process cannot be undone.
                            </p>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="border border-[#DD0707] text-[#DD0707] rounded py-2 px-4 flex gap-2 group"
                                    onClick={() => {
                                        handleDeleteImage();
                                        setShowDeleteModal(false);
                                    }}
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        className="bi bi-arrow-right-short hidden group-hover:block"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill="#DD0707"
                                            fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                                        />
                                    </svg>
                                    <span>Delete</span>
                                </button>
                                <button
                                    className="bg-[#008080] text-white rounded py-2 px-4 flex gap-2 group"
                                    onClick={() => setShowDeleteModal(false)}
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        className="bi bi-arrow-right-short hidden group-hover:block"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                                        />
                                    </svg>
                                    <span>Cancel</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ThirdPage;
