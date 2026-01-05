import React from "react";
import DropdownSingle from "../DropdownSingle";

const idTypes = [
    { id: 1, name: "Select ID Type", default: true },
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

const Identification = ({
    formData,
    setFormData,
    selectedImage,
    idNumber,
    idType,
    fileSizeError,
    errors,
    uploading,
    uploadProgress,
    handleButtonClick,
    handleImageChange,
    fileInputRef,
    setShowViewModal,
    setShowDeleteModal,
    setErrors,
}) => {
    return (
        <>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Identification
                    {selectedImage && idNumber && idType ? (
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
                    ) : (
                        ""
                    )}
                    {fileSizeError && (
                        <span>
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
                        </span>
                    )}
                    {errors.idImage || errors.idType || errors.idNumber ? (
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
                {!selectedImage && (
                    <div className="flex items-center md:items-start gap-4 mb-10 w-full border-l-4 md:border-l-2 border-[#003592] pl-2 md:pl-6 py-3 md:py-6 rounded-md bg-[#F5F5F5]">
                        <span>
                            <svg
                                width="22"
                                height="22"
                                viewBox="0 0 22 22"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M20.1744 8.63937C19.8209 8.27 19.4553 7.88938 19.3175 7.55469C19.19 7.24813 19.1825 6.74 19.175 6.24781C19.1609 5.33281 19.1459 4.29594 18.425 3.575C17.7041 2.85406 16.6672 2.83906 15.7522 2.825C15.26 2.8175 14.7519 2.81 14.4453 2.6825C14.1116 2.54469 13.73 2.17906 13.3606 1.82562C12.7137 1.20406 11.9788 0.5 11 0.5C10.0212 0.5 9.28719 1.20406 8.63937 1.82562C8.27 2.17906 7.88938 2.54469 7.55469 2.6825C7.25 2.81 6.74 2.8175 6.24781 2.825C5.33281 2.83906 4.29594 2.85406 3.575 3.575C2.85406 4.29594 2.84375 5.33281 2.825 6.24781C2.8175 6.74 2.81 7.24813 2.6825 7.55469C2.54469 7.88844 2.17906 8.27 1.82562 8.63937C1.20406 9.28625 0.5 10.0212 0.5 11C0.5 11.9788 1.20406 12.7128 1.82562 13.3606C2.17906 13.73 2.54469 14.1106 2.6825 14.4453C2.81 14.7519 2.8175 15.26 2.825 15.7522C2.83906 16.6672 2.85406 17.7041 3.575 18.425C4.29594 19.1459 5.33281 19.1609 6.24781 19.175C6.74 19.1825 7.24813 19.19 7.55469 19.3175C7.88844 19.4553 8.27 19.8209 8.63937 20.1744C9.28625 20.7959 10.0212 21.5 11 21.5C11.9788 21.5 12.7128 20.7959 13.3606 20.1744C13.73 19.8209 14.1106 19.4553 14.4453 19.3175C14.7519 19.19 15.26 19.1825 15.7522 19.175C16.6672 19.1609 17.7041 19.1459 18.425 18.425C19.1459 17.7041 19.1609 16.6672 19.175 15.7522C19.1825 15.26 19.19 14.7519 19.3175 14.4453C19.4553 14.1116 19.8209 13.73 20.1744 13.3606C20.7959 12.7137 21.5 11.9788 21.5 11C21.5 10.0212 20.7959 9.28719 20.1744 8.63937ZM19.0916 12.3228C18.6425 12.7916 18.1775 13.2763 17.9309 13.8716C17.6947 14.4434 17.6844 15.0969 17.675 15.7297C17.6656 16.3859 17.6553 17.0731 17.3638 17.3638C17.0722 17.6544 16.3897 17.6656 15.7297 17.675C15.0969 17.6844 14.4434 17.6947 13.8716 17.9309C13.2763 18.1775 12.7916 18.6425 12.3228 19.0916C11.8541 19.5406 11.375 20 11 20C10.625 20 10.1422 19.5387 9.67719 19.0916C9.21219 18.6444 8.72375 18.1775 8.12844 17.9309C7.55656 17.6947 6.90313 17.6844 6.27031 17.675C5.61406 17.6656 4.92688 17.6553 4.63625 17.3638C4.34562 17.0722 4.33437 16.3897 4.325 15.7297C4.31562 15.0969 4.30531 14.4434 4.06906 13.8716C3.8225 13.2763 3.3575 12.7916 2.90844 12.3228C2.45937 11.8541 2 11.375 2 11C2 10.625 2.46125 10.1422 2.90844 9.67719C3.35562 9.21219 3.8225 8.72375 4.06906 8.12844C4.30531 7.55656 4.31562 6.90313 4.325 6.27031C4.33437 5.61406 4.34469 4.92688 4.63625 4.63625C4.92781 4.34562 5.61031 4.33437 6.27031 4.325C6.90313 4.31562 7.55656 4.30531 8.12844 4.06906C8.72375 3.8225 9.20844 3.3575 9.67719 2.90844C10.1459 2.45937 10.625 2 11 2C11.375 2 11.8578 2.46125 12.3228 2.90844C12.7878 3.35562 13.2763 3.8225 13.8716 4.06906C14.4434 4.30531 15.0969 4.31562 15.7297 4.325C16.3859 4.33437 17.0731 4.34469 17.3638 4.63625C17.6544 4.92781 17.6656 5.61031 17.675 6.27031C17.6844 6.90313 17.6947 7.55656 17.9309 8.12844C18.1775 8.72375 18.6425 9.20844 19.0916 9.67719C19.5406 10.1459 20 10.625 20 11C20 11.375 19.5387 11.8578 19.0916 12.3228ZM15.2806 8.21937C15.3504 8.28903 15.4057 8.37175 15.4434 8.46279C15.4812 8.55384 15.5006 8.65144 15.5006 8.75C15.5006 8.84856 15.4812 8.94616 15.4434 9.0372C15.4057 9.12825 15.3504 9.21097 15.2806 9.28063L10.0306 14.5306C9.96097 14.6004 9.87825 14.6557 9.7872 14.6934C9.69616 14.7312 9.59856 14.7506 9.5 14.7506C9.40144 14.7506 9.30384 14.7312 9.2128 14.6934C9.12175 14.6557 9.03903 14.6004 8.96937 14.5306L6.71937 12.2806C6.57864 12.1399 6.49958 11.949 6.49958 11.75C6.49958 11.551 6.57864 11.3601 6.71937 11.2194C6.86011 11.0786 7.05098 10.9996 7.25 10.9996C7.44902 10.9996 7.63989 11.0786 7.78063 11.2194L9.5 12.9397L14.2194 8.21937C14.289 8.14964 14.3717 8.09432 14.4628 8.05658C14.5538 8.01884 14.6514 7.99941 14.75 7.99941C14.8486 7.99941 14.9462 8.01884 15.0372 8.05658C15.1283 8.09432 15.211 8.14964 15.2806 8.21937Z"
                                    fill="#003592"
                                />
                            </svg>
                        </span>
                        <p className="text-[#2D2727] text-xs md:text-sm md:leading-6">
                            File must be an image (JPG, PNG, GIF, BMP, WebP) and
                            must not exceed 5MB.
                        </p>
                    </div>
                )}
                <div className="flex justify-center items-center w-full">
                    {uploading && (
                        <div className="mb-8 w-full bg-[#EFEFEF] rounded-full h-1 overflow-hidden">
                            <div
                                className="bg-[#09A12A] h-1 rounded-full transition-all duration-500"
                                style={{ width: `${uploadProgress}%` }}
                            ></div>
                        </div>
                    )}
                    {!selectedImage && (
                        <button
                            className="flex justify-center items-center gap-2 py-4 px-4 bg-[#E4509A] text-white rounded focus:opacity-50"
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
                            <span>Upload ID</span>
                        </button>
                    )}
                    <input
                        type="file"
                        accept=".jpg, .jpeg, .png, .gif"
                        className="hidden" // Hide the input element
                        onChange={handleImageChange}
                        ref={fileInputRef} // Attach the ref to the input element
                    />
                </div>
                {selectedImage && (
                    <div className="flex flex-col md:flex-row gap-5 items-center justify-between mb-12 w-full">
                        <div className="flex items-center gap-6 md:basis-2/3">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                className="mt-1"
                            >
                                <path
                                    d="M22 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V22C0 22.5304 0.210714 23.0391 0.585786 23.4142C0.960859 23.7893 1.46957 24 2 24H22C22.5304 24 23.0391 23.7893 23.4142 23.4142C23.7893 23.0391 24 22.5304 24 22V2C24 1.46957 23.7893 0.960859 23.4142 0.585786C23.0391 0.210714 22.5304 0 22 0ZM2 2H22V11.6725L18.9137 8.585C18.5387 8.21021 18.0302 7.99968 17.5 7.99968C16.9698 7.99968 16.4613 8.21021 16.0863 8.585L2.67125 22H2V2ZM6 8C6 7.60444 6.1173 7.21776 6.33706 6.88886C6.55682 6.55996 6.86918 6.30362 7.23463 6.15224C7.60009 6.00087 8.00222 5.96126 8.39018 6.03843C8.77814 6.1156 9.13451 6.30608 9.41421 6.58579C9.69392 6.86549 9.8844 7.22186 9.96157 7.60982C10.0387 7.99778 9.99913 8.39991 9.84776 8.76537C9.69638 9.13082 9.44004 9.44318 9.11114 9.66294C8.78224 9.8827 8.39556 10 8 10C7.46957 10 6.96086 9.78929 6.58579 9.41421C6.21071 9.03914 6 8.53043 6 8Z"
                                    fill="#6A6F74"
                                />
                            </svg>
                            <div className="flex flex-col w-full">
                                <p className="text-[#2D2727] text-[23px] max-w-[300px] md:max-w-none break-all">
                                    {selectedImage?.name}
                                </p>
                                <p className="text-[#848A90] leading-6 text-base">
                                    {selectedImage?.size > 1024 * 1024
                                        ? `${(
                                              selectedImage.size /
                                              (1024 * 1024)
                                          ).toFixed(2)} MB`
                                        : selectedImage?.size > 1024
                                        ? `${(
                                              selectedImage.size / 1024
                                          ).toFixed(2)} KB`
                                        : `${selectedImage?.size} Bytes`}
                                </p>
                            </div>
                        </div>
                        <div className="flex justify-end md:basis-1/3 gap-2">
                            {!uploading && (
                                <button
                                    className="bg-[#008080] text-white rounded py-2 px-4 flex gap-2 group"
                                    onClick={() => setShowViewModal(true)}
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
                                    <span>View</span>
                                </button>
                            )}
                            {!uploading && (
                                <button
                                    className="border border-[#DD0707] text-[#DD0707] rounded py-2 px-4 flex gap-2 group"
                                    onClick={() => setShowDeleteModal(true)}
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
                            )}
                        </div>
                    </div>
                )}
                {selectedImage && !uploading && (
                    <div className="flex flex-col md:flex-row gap-10 mb-5 w-full">
                        <label class="flex flex-col w-full">
                            <span
                                class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                    errors.idType
                                        ? "text-[#DD0707]"
                                        : "text-[#848A90]"
                                }`}
                            >
                                ID Type
                            </span>
                            <DropdownSingle
                                data={idTypes}
                                defaultValue={[
                                    idType
                                        ? idTypes.find(
                                              (id) => id.name === idType
                                          )
                                        : idTypes[0],
                                ]}
                                handleDropdownChange={(value) => {
                                    setFormData({
                                        ...formData,
                                        personal_data: {
                                            ...formData.personal_data,
                                            id_type: value,
                                        },
                                    });
                                    setErrors({
                                        ...errors,
                                        idType: "",
                                    });
                                }}
                                error={errors.idType ? true : false}
                                hideSearch={true}
                            />
                        </label>
                        <label class="flex flex-col w-full">
                            <span
                                class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                    errors.idNumber
                                        ? "text-[#DD0707]"
                                        : "text-[#848A90]"
                                }`}
                            >
                                ID Number
                            </span>
                            <input
                                value={idNumber}
                                onChange={(e) => {
                                    setFormData({
                                        ...formData,
                                        personal_data: {
                                            ...formData.personal_data,
                                            id_number: e.target.value.slice(
                                                0,
                                                50
                                            ),
                                        },
                                    });
                                    setErrors({
                                        ...errors,
                                        idNumber: "",
                                    });
                                }}
                                type="text"
                                class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                                    errors.idNumber
                                        ? "border-[#DD0707] placeholder-[#DD0707]"
                                        : "border-[#006666] placeholder-slate-400"
                                }  block w-full sm:text-sm focus:ring-0 focus:border-[#006666]`}
                                placeholder="Enter your ID number"
                            />
                        </label>
                    </div>
                )}
                {fileSizeError && (
                    <div className="flex items-center bg-[#EFF2F4] py-3 w-full gap-3 px-4 mt-10">
                        <svg
                            width="26"
                            height="26"
                            viewBox="0 0 26 26"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <rect
                                x="-0.00146484"
                                width="26"
                                height="26"
                                rx="13"
                                fill="#DD0707"
                            />
                            <path
                                d="M12.9985 4.875C11.3916 4.875 9.82068 5.35152 8.48453 6.24431C7.14838 7.1371 6.10698 8.40605 5.49202 9.8907C4.87706 11.3753 4.71615 13.009 5.02966 14.5851C5.34316 16.1612 6.11699 17.6089 7.2533 18.7452C8.3896 19.8815 9.83733 20.6554 11.4134 20.9689C12.9895 21.2824 14.6232 21.1215 16.1078 20.5065C17.5925 19.8916 18.8614 18.8502 19.7542 17.514C20.647 16.1779 21.1235 14.607 21.1235 13C21.1213 10.8458 20.2645 8.78051 18.7413 7.25727C17.218 5.73403 15.1527 4.87727 12.9985 4.875ZM12.9985 19.875C11.6388 19.875 10.3096 19.4718 9.17899 18.7164C8.04841 17.9609 7.16722 16.8872 6.64687 15.6309C6.12651 14.3747 5.99037 12.9924 6.25564 11.6588C6.52091 10.3251 7.17569 9.10013 8.13718 8.13864C9.09867 7.17716 10.3237 6.52237 11.6573 6.2571C12.9909 5.99183 14.3732 6.12798 15.6295 6.64833C16.8857 7.16868 17.9595 8.04987 18.7149 9.18045C19.4703 10.311 19.8735 11.6403 19.8735 13C19.8715 14.8227 19.1465 16.5702 17.8576 17.8591C16.5687 19.1479 14.8213 19.8729 12.9985 19.875ZM12.3735 13.625V9.25C12.3735 9.08424 12.4394 8.92527 12.5566 8.80806C12.6738 8.69085 12.8328 8.625 12.9985 8.625C13.1643 8.625 13.3233 8.69085 13.4405 8.80806C13.5577 8.92527 13.6235 9.08424 13.6235 9.25V13.625C13.6235 13.7908 13.5577 13.9497 13.4405 14.0669C13.3233 14.1842 13.1643 14.25 12.9985 14.25C12.8328 14.25 12.6738 14.1842 12.5566 14.0669C12.4394 13.9497 12.3735 13.7908 12.3735 13.625ZM13.936 16.4375C13.936 16.6229 13.8811 16.8042 13.778 16.9583C13.675 17.1125 13.5286 17.2327 13.3573 17.3036C13.186 17.3746 12.9975 17.3932 12.8156 17.357C12.6338 17.3208 12.4667 17.2315 12.3356 17.1004C12.2045 16.9693 12.1152 16.8023 12.0791 16.6204C12.0429 16.4385 12.0614 16.25 12.1324 16.0787C12.2034 15.9074 12.3235 15.761 12.4777 15.658C12.6319 15.555 12.8131 15.5 12.9985 15.5C13.2472 15.5 13.4856 15.5988 13.6615 15.7746C13.8373 15.9504 13.936 16.1889 13.936 16.4375Z"
                                fill="#EFF2F4"
                            />
                        </svg>

                        <p className="text-[#2D2727]">{fileSizeError}</p>
                    </div>
                )}
            </div>
        </>
    );
};

export default Identification;
