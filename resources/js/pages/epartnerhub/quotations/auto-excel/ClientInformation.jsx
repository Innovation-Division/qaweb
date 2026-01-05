import React, { useRef, useState } from "react";
import DropdownSingle from "../../../../components/DropdownSingle";
import DatePicker from "../../../../components/DatePicker";
import sampleId from "../../../../assets/images/sample-id.png";

const brands = [
    { id: 1, name: "Toyota" },
    { id: 2, name: "Honda" },
    { id: 3, name: "Ford" },
    { id: 4, name: "Chevrolet" },
    { id: 5, name: "Nissan" },
    { id: 6, name: "BMW" },
    { id: 7, name: "Mercedes-Benz" },
    { id: 8, name: "Volkswagen" },
    { id: 9, name: "Hyundai" },
    { id: 10, name: "Kia" },
];

const models = [
    { id: 1, name: "Model A" },
    { id: 2, name: "Model B" },
    { id: 3, name: "Model C" },
    { id: 4, name: "Model D" },
    { id: 5, name: "Model E" },
    { id: 6, name: "Model F" },
    { id: 7, name: "Model G" },
    { id: 8, name: "Model H" },
    { id: 9, name: "Model I" },
    { id: 10, name: "Model J" },
];

const years = [
    { id: 1, name: "2025" },
    { id: 2, name: "2024" },
    { id: 3, name: "2023" },
    { id: 4, name: "2022" },
    { id: 5, name: "2021" },
    { id: 6, name: "2020" },
    { id: 7, name: "2019" },
    { id: 8, name: "2018" },
    { id: 9, name: "2017" },
    { id: 10, name: "2016" },
];

const mortgagee = [
    { id: 1, name: "Yes" },
    { id: 2, name: "No" },
];

const bodyTypes = [
    { id: 1, name: "Sedan" },
    { id: 2, name: "SUV" },
    { id: 3, name: "Truck" },
    { id: 4, name: "Coupe" },
    { id: 5, name: "Convertible" },
    { id: 6, name: "Hatchback" },
    { id: 7, name: "Minivan" },
    { id: 8, name: "Wagon" },
    { id: 9, name: "Crossover" },
    { id: 10, name: "Pickup" },
];

const idTypes = [
    { id: 2, name: "Passport" },
    { id: 3, name: "Driver's License" },
    { id: 4, name: "SSS/GSIS UMID Card" },
    { id: 5, name: "Philhealth ID" },
    { id: 6, name: "Postal ID" },
    { id: 7, name: "TIN Card" },
    { id: 8, name: "Voter's ID" },
    { id: 9, name: "PRC ID" },
    { id: 10, name: "Senior Citizen ID" },
    { id: 11, name: "OFW ID" },
    { id: 12, name: "National ID" },
];

const MAX_FILE_SIZE_BYTES = 5 * 1024 * 1024;

const ClientInformation = ({ dispatch }) => {
    const [selectedFile, setSelectedFile] = useState(null);
    const [previewUrl, setPreviewUrl] = useState(null);
    const [uploadMessage, setUploadMessage] = useState("");
    const fileInputRef = useRef(null);

    const [formData, setFormData] = useState({
        brand: "",
        model: "",
        year: "",
        policyInceptionDate: "",
        bodyType: "",
        idType: "",
    });

    const [errors, setErrors] = useState({
        brand: false,
        model: false,
        year: false,
        policyInceptionDate: false,
        bodyType: false,
        idType: false,
    });

    const handleFileChange = (event) => {
        const file = event.target.files[0];

        if (file) {
            if (!file.type.startsWith("image/")) {
                setUploadMessage(
                    "Please upload an image file (e.g., JPEG, PNG)."
                );
                setSelectedFile(null);
                setPreviewUrl(null);
                return;
            }

            if (file.size > MAX_FILE_SIZE_BYTES) {
                setUploadMessage(
                    `File size exceeds the limit of 5MB. Please choose a smaller file.`
                );
                setSelectedFile(null);
                setPreviewUrl(null);
                if (fileInputRef.current) {
                    fileInputRef.current.value = "";
                }
                return;
            }

            setSelectedFile(file);

            const reader = new FileReader();
            reader.onloadend = () => {
                setPreviewUrl(reader.result);
                setUploadMessage("");
            };
            reader.readAsDataURL(file);
        } else {
            setSelectedFile(null);
            setPreviewUrl(null);
            setUploadMessage("No file selected.");
        }
    };

    const handleButtonClick = () => {
        fileInputRef.current.click();
    };

    const handleNext = () => {
        dispatch({ type: "NEXT_STEP" });
    };
    const handlePrev = () => {
        dispatch({ type: "PREVIOUS_STEP" });
    };
    return (
        <div className="flex flex-col w-full max-w-4xl gap-12">
            <div className="flex flex-col w-full gap-6">
                <p className="text-[#626161] text-sm font-medium">
                    Client Information <span className="text-red-500">*</span>
                </p>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            First Name
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Last Name
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Mobile
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Email Address
                        </span>
                        <input
                            type="email"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Gender
                        </span>
                        <DropdownSingle
                            data={bodyTypes}
                            defaultValue={[
                                formData.bodyType
                                    ? bodyTypes.find(
                                          (item) =>
                                              item.name === formData.bodyType
                                      )
                                    : bodyTypes[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    bodyType: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.bodyType ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Date of Birth
                        </span>
                        <DatePicker
                            onDateSelect={(date) => {
                                setFormData({
                                    ...formData,
                                    policyInceptionDate: date,
                                });
                            }}
                            errors={errors.policyInceptionDate}
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Place Of Birth
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Nationality
                        </span>
                        <DropdownSingle
                            data={bodyTypes}
                            defaultValue={[
                                formData.bodyType
                                    ? bodyTypes.find(
                                          (item) =>
                                              item.name === formData.bodyType
                                      )
                                    : bodyTypes[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    bodyType: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.bodyType ? true : false}
                        />
                    </label>
                </div>
            </div>
            <div className="flex flex-col w-full gap-6">
                <p className="text-[#626161] text-sm font-medium">
                    Client Address <span className="text-red-500">*</span>
                </p>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Country
                        </span>
                        <DropdownSingle
                            data={brands}
                            defaultValue={[
                                formData.brand
                                    ? brands.find(
                                          (item) => item.name === formData.brand
                                      )
                                    : brands[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    brand: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.brand ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Region
                        </span>
                        <DropdownSingle
                            data={models}
                            defaultValue={[
                                formData.model
                                    ? models.find(
                                          (item) => item.name === formData.model
                                      )
                                    : models[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    model: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.model ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Province
                        </span>
                        <DropdownSingle
                            data={models}
                            defaultValue={[
                                formData.model
                                    ? models.find(
                                          (item) => item.name === formData.model
                                      )
                                    : models[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    model: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.model ? true : false}
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            City
                        </span>
                        <DropdownSingle
                            data={years}
                            defaultValue={[
                                formData.year
                                    ? years.find(
                                          (item) => item.name === formData.year
                                      )
                                    : years[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    year: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.year ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Barangay
                        </span>
                        <DropdownSingle
                            data={years}
                            defaultValue={[
                                formData.year
                                    ? years.find(
                                          (item) => item.name === formData.year
                                      )
                                    : years[0],
                            ]}
                            handleDropdownChange={(value) => {
                                setFormData({
                                    ...formData,
                                    year: value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.year ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            House/Unit No.*
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Street Name
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            ZIP
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John"
                        />
                    </label>
                    <label class="flex flex-col w-full"></label>
                </div>
            </div>
            <div className="flex flex-col w-full gap-6">
                <p className="text-[#626161] text-sm font-medium">
                    Client Identification
                    <span className="text-red-500">*</span>
                </p>
                <input
                    type="file"
                    accept="image/*"
                    onChange={handleFileChange}
                    ref={fileInputRef}
                    style={{ display: "none" }} // Hide the default input
                />
                {!selectedFile ? (
                    <div className="flex items-center">
                        <button
                            className="flex items-center gap-2 py-3 px-4 bg-[#013353] text-white leading-6 rounded"
                            onClick={handleButtonClick}
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-upload"
                                viewBox="0 0 16 16"
                            >
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                            </svg>
                            Upload ID
                        </button>
                    </div>
                ) : (
                    <>
                        <div className="flex flex-col items-center justify-center bg-[#F7F9FA] py-5 gap-6">
                            <img
                                src={previewUrl}
                                alt=""
                                className="w-[300px]"
                            />
                            <button
                                className="text-[#008089] text-xs font-medium"
                                onClick={() => {
                                    handleButtonClick();
                                }}
                            >
                                Replace
                            </button>
                        </div>
                        <div className="flex items-center gap-4">
                            <svg
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9.75 0.5C7.82164 0.5 5.93657 1.07183 4.33319 2.14317C2.72982 3.21451 1.48013 4.73726 0.742179 6.51884C0.00422452 8.30042 -0.188858 10.2608 0.187348 12.1521C0.563554 14.0434 1.49215 15.7807 2.85571 17.1443C4.21928 18.5079 5.95656 19.4365 7.84787 19.8127C9.73919 20.1889 11.6996 19.9958 13.4812 19.2578C15.2627 18.5199 16.7855 17.2702 17.8568 15.6668C18.9282 14.0634 19.5 12.1784 19.5 10.25C19.4973 7.66498 18.4692 5.18661 16.6413 3.35872C14.8134 1.53084 12.335 0.50273 9.75 0.5ZM9.75 18.5C8.11831 18.5 6.52326 18.0161 5.16655 17.1096C3.80984 16.2031 2.75242 14.9146 2.128 13.4071C1.50358 11.8996 1.3402 10.2408 1.65853 8.6405C1.97685 7.04016 2.76259 5.57015 3.91637 4.41637C5.07016 3.26259 6.54017 2.47685 8.14051 2.15852C9.74085 1.84019 11.3997 2.00357 12.9071 2.62799C14.4146 3.25242 15.7031 4.30984 16.6096 5.66655C17.5161 7.02325 18 8.6183 18 10.25C17.9975 12.4373 17.1275 14.5343 15.5809 16.0809C14.0343 17.6275 11.9373 18.4975 9.75 18.5ZM11.25 14.75C11.25 14.9489 11.171 15.1397 11.0303 15.2803C10.8897 15.421 10.6989 15.5 10.5 15.5C10.1022 15.5 9.72065 15.342 9.43934 15.0607C9.15804 14.7794 9 14.3978 9 14V10.25C8.80109 10.25 8.61033 10.171 8.46967 10.0303C8.32902 9.88968 8.25 9.69891 8.25 9.5C8.25 9.30109 8.32902 9.11032 8.46967 8.96967C8.61033 8.82902 8.80109 8.75 9 8.75C9.39783 8.75 9.77936 8.90804 10.0607 9.18934C10.342 9.47064 10.5 9.85218 10.5 10.25V14C10.6989 14 10.8897 14.079 11.0303 14.2197C11.171 14.3603 11.25 14.5511 11.25 14.75ZM8.25 6.125C8.25 5.9025 8.31598 5.68499 8.4396 5.49998C8.56322 5.31498 8.73892 5.17078 8.94449 5.08564C9.15005 5.00049 9.37625 4.97821 9.59448 5.02162C9.81271 5.06502 10.0132 5.17217 10.1705 5.3295C10.3278 5.48684 10.435 5.68729 10.4784 5.90552C10.5218 6.12375 10.4995 6.34995 10.4144 6.55552C10.3292 6.76109 10.185 6.93679 10 7.0604C9.81501 7.18402 9.59751 7.25 9.375 7.25C9.07664 7.25 8.79049 7.13147 8.57951 6.9205C8.36853 6.70952 8.25 6.42337 8.25 6.125Z"
                                    fill="#848A90"
                                />
                            </svg>
                            <p>
                                File must be in JPG or PDF format. Must not be
                                more than 5MB, not less than 15KB
                            </p>
                        </div>
                        <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                            <label class="flex flex-col w-full">
                                <span
                                    class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                        errors.suffix
                                            ? "text-[#DD0707]"
                                            : "text-[#848A90]"
                                    }`}
                                >
                                    Select ID Type
                                </span>
                                <DropdownSingle
                                    data={idTypes}
                                    defaultValue={[
                                        formData.idType
                                            ? idTypes.find(
                                                  (item) =>
                                                      item.name ===
                                                      formData.idType
                                              )
                                            : idTypes[0],
                                    ]}
                                    handleDropdownChange={(value) => {
                                        setFormData({
                                            ...formData,
                                            idType: value,
                                        });
                                    }}
                                    hideSearch={false}
                                    error={errors.idType ? true : false}
                                />
                            </label>
                            <label class="flex flex-col w-full">
                                <span
                                    class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                        errors.suffix
                                            ? "text-[#DD0707]"
                                            : "text-[#848A90]"
                                    }`}
                                >
                                    ID Number
                                </span>
                                <input
                                    type="text"
                                    class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                                    placeholder="09123456789"
                                />
                            </label>
                        </div>
                    </>
                )}
            </div>
            <div className="flex flex-col w-full gap-5">
                <p className="text-[#626161] text-sm font-medium">
                    Emergency Contact<span className="text-red-500">*</span>
                </p>
                <div className="flex  justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Full Name
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="John Doe"
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Mobile Number
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="09123456789"
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Email Address
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            placeholder="johndoe@example.com"
                        />
                    </label>
                </div>
            </div>

            <div className="flex flex-col-reverse md:flex-row w-full justify-between gap-4">
                <button
                    className="text-[#013353] border border-[#013353] rounded-md px-4 py-2 w-full"
                    onClick={handlePrev}
                >
                    Back
                </button>
                <button
                    className="bg-[#013353] text-white rounded-md px-4 py-2 w-full"
                    onClick={handleNext}
                >
                    Continue
                </button>
            </div>
        </div>
    );
};

export default ClientInformation;
