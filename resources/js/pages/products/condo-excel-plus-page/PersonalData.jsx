import {React, useState, useEffect, useRef} from 'react'
import Personal from "../../../components/CondoExcelPlus/Personal";
import BirthInformation from "../../../components/CondoExcelPlus/BirthInformation";
import Identification from "../../../components/CondoExcelPlus/Identification";
import EmergencyContact from "../../../components/CondoExcelPlus/EmergencyContact";

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

const PersonalData = ({
  prevStep,
  nextStep,
  formData,
  setFormData, 
}) => {
    const personalRef = useRef(null);
    const birthInformationRef = useRef(null);
    const presentAddressRef = useRef(null);
    const emergencyRef = useRef(null);
    const identificationRef = useRef(null);              
    const [errors, setErrors] = useState({});
    const [isEmailValid, setIsEmailValid] = useState("");
    const [isMobileValid, setIsMobileValid] = useState("");
    const [isEmergencyMobileValid, setIsEmergencyMobileValid] = useState("");
const [selectedImage, setSelectedImage] = useState(
  formData.personal_data?.id_image || null
);
const [previewImage, setPreviewImage] = useState(
  formData.personal_data?.preview_id_image || null
);

    const [uploading, setUploading] = useState(false);
    const [uploadProgress, setUploadProgress] = useState(0);
    const fileInputRef = useRef(null);
    const [showViewModal, setShowViewModal] = useState(false);
    const [showDeleteModal, setShowDeleteModal] = useState(false);
    const MAX_FILE_SIZE_MB = 5;
    const MAX_FILE_SIZE_BYTES = MAX_FILE_SIZE_MB * 1024 * 1024;
    const [fileSizeError, setFileSizeError] = useState("");
    const [regions, setRegions] = useState([]);
    const [provinces, setProvinces] = useState([]);
    const [provincesAddress, setProvincesAddress] = useState([]);
    const [cities, setCities] = useState([]);
    const [barangays, setBarangays] = useState([]);

  // Handle Region Change
  const handleRegionChange = async (region) => {
    setFormData((prev) => ({
      ...prev,
      personal_data: {
        ...prev.personal_data,
        region,
        province: "",
        city: "",
        barangay: "",
      },
    }));

    setProvincesAddress([]);
    setCities([]);
    setBarangays([]);

    if (region) {
      await fetchProvinces(region);
    }
  };

   const handleProvinceChange = async (province) => {
  setFormData((prev) => ({
    ...prev,
    personal_data: { ...prev.personal_data, province, city: "", barangay: "" },
  }));

  setCities([]);
  setBarangays([]);

  if (province) {
    const res = await axios.get("/api/cities", {
      params: { province },
    });

    const citiesData = res.data.map((item) => ({
      ...item,
      name: item.city,
    }));

    setCities(citiesData);
  }
};

  const handleCityChange = async (city) => {
    setFormData((prev) => ({
      ...prev,
      personal_data: {
        ...prev.personal_data,
        city,
        barangay: "",
      },
    }));

    setBarangays([]);

    if (city) {
      try {
        const res = await axios.get("/api/barangays", { params: { city } });
        const barangaysData = res.data.map((item) => ({
          ...item,
          name: item.barangay,
        }));
        setBarangays(barangaysData);
      } catch (error) {
        console.error("Failed to fetch barangays", error);
      }
    }
  };

  const fetchProvince = async () => {
        const res = await axios.get("/api/province/get");

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["province"];
            delete _item["province"];
            return _item;
        });

        setProvinces(modifiedData);
    };
    const fetchRegions = async () => {
        const res = await axios.get("/api/regions");

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["region"];
            delete _item["region"];
            return _item;
        });

        setRegions(modifiedData);
    };

const fetchProvinces = async (region) => {
    //console.log("Fetching provinces for region:", region);
  const res = await axios.get("/api/provinces", { params: { region } });
 // console.log("Received provinces:", res.data);

    const modifiedData = res.data.map((item) => {
        let _item = Object.assign(item, {});
        _item["name"] = item["province"];
        _item["default"] = false;
        delete _item["province"];
        return _item;
    });

    setProvincesAddress(modifiedData);
};


  const fetchCities = async () => {
    try {
      const res = await axios.get("/api/cities", {
        params: { province: formData.personal_data.province },
      });
      const modifiedData = res.data.map((item) => {
        let _item = { ...item };
        _item.name = item.city;
        delete _item.city;
        return _item;
      });
      setCities(modifiedData);
    } catch (error) {
      console.error("Failed to fetch cities", error);
    }
  };

  const fetchBarangays = async () => {
    try {
      const res = await axios.get("/api/barangays", {
        params: { city: formData.personal_data.city },
      });
      const modifiedData = res.data.map((item) => {
        let _item = { ...item };
        _item.name = item.barangay;
        delete _item.barangay;
        return _item;
      });
      setBarangays(modifiedData);
    } catch (error) {
      console.error("Failed to fetch barangays", error);
    }
  };

     useEffect(() => {
        fetchProvince();
        fetchRegions();
    }, []);


    useEffect(() => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                city: "",
                barangay: "",
            },
        });

        setCities([]);
        setBarangays([]);
        fetchCities();
    }, [formData.personal_data.province]);

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
                event.target.value = "";
                return;
            }
            setFileSizeError("");
            setSelectedImage(img);
            const file = event.target.files[0];
            if (file) {
                setFormData((prev) => ({
                ...prev,
                personal_data: {
                    ...prev.personal_data,
                    id_image: file,
                },
                }));
            }
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
        if (fileInputRef.current) {
            fileInputRef.current.value = ""; 
        }

        setFileSizeError("");
    };

const handleEmailChange = (value) => {
    setFormData((prevFormData) => ({
        ...prevFormData,
        personal_data: {
            ...prevFormData.personal_data,
            email: value,
        },
    }));

    if (!/\S+@\S+\.\S+/.test(value)) {
        setErrors((prevErrors) => ({
            ...prevErrors,
            email: "Invalid email format",
        }));
        setIsEmailValid(false);
    } else {
        setErrors((prevErrors) => {
            const { email, ...rest } = prevErrors;
            return rest;
        });
        setIsEmailValid(true);
    }
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

   const handleSetEmergencyContact = (id) => {

    setFormData({
        ...formData,
        personal_data: {
            ...formData.personal_data,
            emergency_full_name: selectedBeneficiary.fullName,
            emergency_relationship: selectedBeneficiary.relationship,
            emergencMobile: selectedBeneficiary.mobile
        },
    });

    setErrors({
        ...errors,
        emergencyFullName: "",
        emergencyMobile: "",
        emergencyRelationship: "",
    });
};

        const handleNext = async () => {
        const isPersonalValid = personalRef.current?.validateAndScroll(false);
        const isBirthInfoValid = birthInformationRef.current?.validateAndScroll(false); 
        const isIdentificationValid = identificationRef.current?.validateAndScroll(false);
        const isEmergencyValid = emergencyRef.current?.validateAndScroll(false);

        if (!isPersonalValid) {
            personalRef.current?.scrollToFirstError();
            return;
        }

       if (!isBirthInfoValid) {
            birthInformationRef.current?.validateAndScroll();
            return;
        
        }

        if (!isIdentificationValid) {
            setTimeout(() => {
            identificationRef.current?.scrollToFirstError();
            }, 150);
            return;
        }

        if (!isEmergencyValid) {
            setTimeout(() => {
            emergencyRef.current?.scrollToFirstError();
            }, 150);
            return;
        }

        const updatedFormData = {
            ...formData,
            personal_data: {
            ...formData.personal_data,
            },
        };

        setFormData(updatedFormData);
        nextStep();
        };


const handlePersonalMobileChange = (value) => {
        setFormData((prevFormData) => ({
        ...prevFormData,
        personal_data: {
            ...prevFormData.personal_data,
            mobile: value,
        },
    }));
    };
const handleEmergencyMobileChange = (value) => {
    setFormData((prevFormData) => ({
        ...prevFormData,
        personal_data: {
            ...prevFormData.personal_data,
            emergencyMobile: value,
        },
    }));
};

    const validate = () => {
        let isValid = true;
        const newErrors = {};

        if (!formData.personal_data.firstName) {
            newErrors.firstName = "First Name is required";
            isValid = false;
        }

        if (!formData.personal_data.lastName) {
            newErrors.lastName = "Last Name is required";
            isValid = false;
        }

        if (!formData.personal_data.suffix) {
            newErrors.suffix = "Suffix is required";
            isValid = false;
        }

        if (!formData.personal_data.email) {
            newErrors.email = "Email is required";
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(formData.personal_data.email)) {
            newErrors.email = "Invalid email format";
            isValid = false;
        }

         if (!formData?.personal_data.mobile) {
        newErrors.mobile = "Mobile number is required";
        isValid = false;
    } else if (checkMobileNumber(formData?.personal_data.mobile) === false) {
        newErrors.mobile = "Mobile number must be 11 digits and start with 09";
        isValid = false;
    }

        
       if (!formData?.personal_data?.birth_date) {
  newErrors.birth_date = "Birthdate is required";
}

    if (!formData?.personal_data?.place_of_birth?.trim()) {
        newErrors.place_of_birth = "Place of Birth is required";
    }
        if (!formData?.personal_data?.region) {
            newErrors.region = "Region is required";
            isValid = false;
        }

        if (!formData.personal_data.province) {
            newErrors.province = "Province is required";
            isValid = false;
        }

        if (!formData.personal_data.city) {
            newErrors.city = "City is required";
            isValid = false;
        }

        if (!formData.personal_data.barangay) {
            newErrors.barangay = "Barangay is required";
            isValid = false;
        }

        if (!formData.personal_data.house_no) {
            newErrors.houseNo = "House/Unit No. is required";
            isValid = false;
        }

        if (!formData.personal_data.street) {
            newErrors.street = "Street is required";
            isValid = false;
        }

        if (!formData.personal_data.zip) {
            newErrors.zip = "ZIP is required";
            isValid = false;
        }

        if (selectedImage === null) {
            newErrors.idImage = "ID Image is required";
            isValid = false;
        }

        if (!formData.personal_data.idType) {
            newErrors.idType = "ID Type is required";
            isValid = false;
        }

        if (!formData.personal_data.idNumber) {
            newErrors.idNumber = "ID Number is required";
            isValid = false;
        }

        if (!formData.personal_data.emergencyFullName) {
            newErrors.emergencyFullName = "Emergency Contact Name is required";
            isValid = false;
        }

        if (!formData.personal_data.emergencyMobile) {
        newErrors.emergencyMobile = "Emergency Contact Mobile is required";
        isValid = false;
        } else if (!/^\d{11}$/.test(formData.personal_data.emergencyMobile)) {
            newErrors.emergencyMobile = "Emergency Contact Mobile number must be 11 digits";
            isValid = false;
        }

        if (!formData.personal_data.emergencyRelationship) {
            newErrors.emergencyRelationship =
                "Emergency Contact Relationship is required";
            isValid = false;
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
        if (formData.personal_data.email) {
            const newErrors = {};
            if (!/\S+@\S+\.\S+/.test(formData.personal_data.email)) {
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
    }, [formData.personal_data.email]);

    return (
        <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full px-8">
           <Personal
            ref={personalRef}
            firstName={formData.personal_data.first_name}
            lastName={formData.personal_data.last_name}
            suffix={formData.personal_data.suffix}
            mobile={formData.personal_data?.mobile}
            email={formData.personal_data.email}
            birth_date={formData.personal_data.birth_date}
            place_of_birth={formData.personal_data.place_of_birth}
            isMobileValid={isMobileValid}
            isEmailValid={isEmailValid}
            setIsMobileValid={setIsMobileValid}
            handlePersonalMobileChange={handlePersonalMobileChange}
            handleEmailChange={handleEmailChange}
            errors={errors}
            setErrors={setErrors}
            formData={formData}
            setFormData={setFormData}
            />
            <BirthInformation
             ref={birthInformationRef}
            formData={formData}
            setFormData={setFormData}
            errors={errors}
            setErrors={setErrors}
            />

            {/* <PresentAddress
            formData={formData}
            setFormData={setFormData}
            ref={presentAddressRef}
            regions={regions}
            provincesAddress={provincesAddress}
            cities={cities}
            barangays={barangays}
            errors={errors}
            houseNo={formData.personal_data.houseNo}
            region={formData.personal_data.region}
            province={formData.personal_data.province}
            city={formData.personal_data.city}
            barangay={formData.personal_data.barangay}
            street={formData.personal_data.street}
            zip={formData.personal_data.zip}
            setErrors={setErrors}
            handleRegionChange={handleRegionChange}
            handleProvinceChange={handleProvinceChange}
            handleCityChange={handleCityChange}
            /> */}
            <Identification
                ref={identificationRef}
                formData={formData}
                setFormData={setFormData}
                selectedImage={selectedImage}
                idNumber={formData?.personal_data?.idNumber}
                idType={formData?.personal_data?.idType}
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
            <EmergencyContact
                ref={emergencyRef}
                formData={formData}
                setFormData={setFormData}
                errors={errors}
                setErrors={setErrors}
                handleSetEmergencyContact={
                    handleSetEmergencyContact
                }
                handleEmergencyMobileChange={handleEmergencyMobileChange}
                emergencyFullName={formData?.personal_data?.emergency_full_name}
                emergencyMobile={formData?.personal_data?.emergencyMobile}
                emergencyRelationship={formData?.personal_data?.emergency_relationship}
                setIsEmergencyMobileValid={setIsEmergencyMobileValid}
                isEmergencyMobileValid={isEmergencyMobileValid}
                relationships={relationships}
            />
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-20 gap-5">
               <button className="text-[#008080] md:px-5 px-3 py-3 md:text-[23px] text-base font-medium w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded"  onClick={prevStep}>
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
                        errors.emergencyRelationship
                    }
                   
                    className="text-white bg-[#008080] md:text-[23px] text-base font-medium md:px-5 px-3 py-3 rounded w-full md:w-auto flex justify-center gap-2 group disabled:opacity-50"
                    onClick={handleNext}
                >
                    <span>Continue</span>
                </button>
            </div>
            <div
                className={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                    !showViewModal && "hidden"
                }`}
                id="modal"
            >
                <div className="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                    <div className="fixed inset-0 transition-opacity">
                        <div className="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <span className="hidden sm:inline-block sm:align-middle sm:h-screen">
                        &#8203;
                    </span>
                    <div
                        className="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[450px] md:max-w-xl sm:py-8 px-5 md:px-12 sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="bg-white flex flex-col items-center justify-between gap-7 md:gap-8 my-5">
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
                                        className="hidden"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fillRule="evenodd"
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
                className={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                    !showDeleteModal && "hidden"
                }`}
                id="modal"
            >
                <div className="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                    <div className="fixed inset-0 transition-opacity">
                        <div className="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <span className="hidden sm:inline-block sm:align-middle sm:h-screen">
                        &#8203;
                    </span>
                    <div
                        className="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[350px] sm:max-w-lg sm:py-8 px-5 md:px-12 sm:w-full"
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
                                    strokeWidth="8"
                                />
                                <path
                                    d="M55 32.25C50.5005 32.25 46.102 33.5843 42.3608 36.0841C38.6196 38.5839 35.7036 42.1369 33.9818 46.294C32.2599 50.451 31.8093 55.0252 32.6871 59.4383C33.565 63.8514 35.7317 67.905 38.9133 71.0867C42.095 74.2683 46.1486 76.4351 50.5617 77.3129C54.9748 78.1907 59.549 77.7402 63.7061 76.0183C67.8631 74.2964 71.4161 71.3804 73.9159 67.6392C76.4157 63.898 77.75 59.4995 77.75 55C77.7436 48.9683 75.3447 43.1854 71.0797 38.9204C66.8146 34.6553 61.0317 32.2564 55 32.25ZM55 74.25C51.1927 74.25 47.4709 73.121 44.3053 71.0058C41.1396 68.8906 38.6723 65.8841 37.2153 62.3667C35.7583 58.8492 35.3771 54.9786 36.1199 51.2445C36.8627 47.5104 38.696 44.0804 41.3882 41.3882C44.0804 38.696 47.5104 36.8626 51.2445 36.1199C54.9787 35.3771 58.8492 35.7583 62.3667 37.2153C65.8841 38.6723 68.8906 41.1396 71.0058 44.3053C73.121 47.4709 74.25 51.1927 74.25 55C74.2442 60.1036 72.2142 64.9966 68.6054 68.6054C64.9966 72.2142 60.1037 74.2442 55 74.25ZM53.25 56.75V44.5C53.25 44.0359 53.4344 43.5908 53.7626 43.2626C54.0908 42.9344 54.5359 42.75 55 42.75C55.4641 42.75 55.9093 42.9344 56.2374 43.2626C56.5656 43.5908 56.75 44.0359 56.75 44.5V56.75C56.75 57.2141 56.5656 57.6593 56.2374 57.9874C55.9093 58.3156 55.4641 58.5 55 58.5C54.5359 58.5 54.0908 58.3156 53.7626 57.9874C53.4344 57.6593 53.25 57.2141 53.25 56.75ZM57.625 64.625C57.625 65.1442 57.4711 65.6517 57.1826 66.0834C56.8942 66.515 56.4842 66.8515 56.0046 67.0502C55.5249 67.2489 54.9971 67.3008 54.4879 67.1996C53.9787 67.0983 53.511 66.8483 53.1439 66.4812C52.7767 66.114 52.5267 65.6463 52.4254 65.1371C52.3242 64.6279 52.3761 64.1001 52.5748 63.6205C52.7735 63.1408 53.11 62.7308 53.5416 62.4424C53.9733 62.154 54.4808 62 55 62C55.6962 62 56.3639 62.2766 56.8562 62.7688C57.3484 63.2611 57.625 63.9288 57.625 64.625Z"
                                    fill="#BB251A"
                                />
                            </svg>
                        </div>
                        <div className="bg-white flex flex-col items-center justify-between px-4 gap-5 my-5">
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
                                        className="hidden"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill="#DD0707"
                                            fillRule="evenodd"
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
                                        className="hidden"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fillRule="evenodd"
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

export default PersonalData