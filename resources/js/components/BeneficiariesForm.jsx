import React, { useState } from "react";
import MobileNumber from "./MobileNumber";
import DropdownMultiple from "./DropdownMultiple";

const BeneficiariesForm = ({
    index,
    beneficiaries,
    beneficiary,
    relationships,
    handleAddBeneficiary,
    handleRemoveBeneficiary,
    handleSetEmergencyContact,
    handleInputChange,
    handleSelectRelationship,
    handleMobileChange,
    errors,
    selectedBeneficiary,
}) => {
    const [isDuplicate, setIsDuplicate] = useState(false);
    const [isDuplicateNumber, setIsDuplicateNumber] = useState(false);
    const handleSetMobile = (value) => {
        handleMobileChange(beneficiary.id, value);
    };

    const checkDuplicateName = (id, name) => {
        if (name.length === 0) {
            setIsDuplicate(false);
            return;
        }

        const duplicate = beneficiaries.some(
            (beneficiary) =>
                beneficiary.id !== id &&
                beneficiary.fullName.toLowerCase() === name.toLowerCase()
        );
        if (duplicate) {
            setIsDuplicate(true);
        } else {
            setIsDuplicate(false);
        }
    };

    const checkDuplicateNumber = (id, number) => {
        const duplicate = beneficiaries.some(
            (beneficiary) =>
                beneficiary.id !== id && beneficiary.mobile === number
        );
        if (duplicate) {
            setIsDuplicateNumber(true);
        } else {
            setIsDuplicateNumber(false);
        }
    };

    const [isMobileValid, setIsMobileValid] = useState("");

    return (
        <div className="flex flex-col w-full md:mb-12" index={beneficiary.id}>
            <div className="flex justify-between items-center mb-5">
                <p className="font-bold leading-6 text-[#2D2727]">
                    Beneficiary {index + 1}
                </p>
                <button
                    className="text-[#008080] font-medium text-xs hidden md:flex items-center gap-2"
                    onClick={() => handleSetEmergencyContact(beneficiary.id)}
                >
                    <span>Set as emergency contact</span>
                    {selectedBeneficiary === beneficiary.id && (
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 34 34"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M17 0C13.6377 0 10.3509 0.997032 7.55531 2.86502C4.75968 4.733 2.58074 7.38804 1.29406 10.4944C0.00736586 13.6007 -0.329291 17.0189 0.326658 20.3165C0.982606 23.6142 2.6017 26.6433 4.97919 29.0208C7.35668 31.3983 10.3858 33.0174 13.6835 33.6733C16.9811 34.3293 20.3993 33.9926 23.5056 32.7059C26.612 31.4193 29.267 29.2403 31.135 26.4447C33.003 23.649 34 20.3623 34 17C33.9952 12.4928 32.2026 8.17153 29.0156 4.98444C25.8285 1.79735 21.5072 0.0047597 17 0ZM24.4637 14.0021L15.3098 23.156C15.1884 23.2775 15.0441 23.374 14.8854 23.4398C14.7266 23.5056 14.5565 23.5395 14.3846 23.5395C14.2128 23.5395 14.0426 23.5056 13.8839 23.4398C13.7251 23.374 13.5809 23.2775 13.4594 23.156L9.53635 19.2329C9.29097 18.9875 9.15312 18.6547 9.15312 18.3077C9.15312 17.9607 9.29097 17.6279 9.53635 17.3825C9.78173 17.1371 10.1145 16.9993 10.4615 16.9993C10.8086 16.9993 11.1414 17.1371 11.3867 17.3825L14.3846 20.382L22.6133 12.1517C22.7348 12.0302 22.879 11.9339 23.0378 11.8681C23.1965 11.8023 23.3666 11.7685 23.5385 11.7685C23.7103 11.7685 23.8804 11.8023 24.0392 11.8681C24.1979 11.9339 24.3422 12.0302 24.4637 12.1517C24.5852 12.2732 24.6815 12.4175 24.7473 12.5762C24.813 12.735 24.8469 12.9051 24.8469 13.0769C24.8469 13.2487 24.813 13.4189 24.7473 13.5776C24.6815 13.7364 24.5852 13.8806 24.4637 14.0021Z"
                                fill="#54B947"
                            />
                        </svg>
                    )}
                </button>
                {beneficiaries.length > 1 && (
                    <button
                        onClick={() => handleRemoveBeneficiary(beneficiary.id)}
                        className="md:hidden"
                    >
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 31 31"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M27.6875 0.875H3.3125C2.66603 0.875 2.04605 1.13181 1.58893 1.58893C1.13181 2.04605 0.875 2.66603 0.875 3.3125V27.6875C0.875 28.334 1.13181 28.954 1.58893 29.4111C2.04605 29.8682 2.66603 30.125 3.3125 30.125H27.6875C28.334 30.125 28.954 29.8682 29.4111 29.4111C29.8682 28.954 30.125 28.334 30.125 27.6875V3.3125C30.125 2.66603 29.8682 2.04605 29.4111 1.58893C28.954 1.13181 28.334 0.875 27.6875 0.875ZM27.6875 27.6875H3.3125V3.3125H27.6875V27.6875ZM21.2373 11.4873L17.223 15.5L21.2373 19.5127C21.3505 19.626 21.4403 19.7604 21.5016 19.9083C21.5629 20.0563 21.5944 20.2149 21.5944 20.375C21.5944 20.5351 21.5629 20.6937 21.5016 20.8417C21.4403 20.9896 21.3505 21.124 21.2373 21.2373C21.124 21.3505 20.9896 21.4403 20.8417 21.5016C20.6937 21.5629 20.5351 21.5944 20.375 21.5944C20.2149 21.5944 20.0563 21.5629 19.9083 21.5016C19.7604 21.4403 19.626 21.3505 19.5127 21.2373L15.5 17.223L11.4873 21.2373C11.374 21.3505 11.2396 21.4403 11.0917 21.5016C10.9437 21.5629 10.7851 21.5944 10.625 21.5944C10.4649 21.5944 10.3063 21.5629 10.1583 21.5016C10.0104 21.4403 9.87597 21.3505 9.76273 21.2373C9.6495 21.124 9.55968 20.9896 9.49839 20.8417C9.43711 20.6937 9.40557 20.5351 9.40557 20.375C9.40557 20.2149 9.43711 20.0563 9.49839 19.9083C9.55968 19.7604 9.6495 19.626 9.76273 19.5127L13.777 15.5L9.76273 11.4873C9.53405 11.2586 9.40557 10.9484 9.40557 10.625C9.40557 10.3016 9.53405 9.99142 9.76273 9.76273C9.99142 9.53405 10.3016 9.40557 10.625 9.40557C10.9484 9.40557 11.2586 9.53405 11.4873 9.76273L15.5 13.777L19.5127 9.76273C19.626 9.6495 19.7604 9.55968 19.9083 9.49839C20.0563 9.43711 20.2149 9.40557 20.375 9.40557C20.5351 9.40557 20.6937 9.43711 20.8417 9.49839C20.9896 9.55968 21.124 9.6495 21.2373 9.76273C21.3505 9.87597 21.4403 10.0104 21.5016 10.1583C21.5629 10.3063 21.5944 10.4649 21.5944 10.625C21.5944 10.7851 21.5629 10.9437 21.5016 11.0917C21.4403 11.2396 21.3505 11.374 21.2373 11.4873Z"
                                fill="#DD0707"
                            />
                        </svg>
                    </button>
                )}
            </div>
            <div className="flex flex-col md:flex-row gap-8 mb-5 w-full">
                <label class="flex flex-col w-full">
                    <span
                        class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                            isDuplicate ||
                            isDuplicateNumber ||
                            errors.beneficiaryFullName
                                ? "text-[#DD0707]"
                                : "text-[#848A90]"
                        }`}
                    >
                        Full Name
                    </span>
                    <input
                        onChange={(e) => {
                            let value = e.target.value.slice(0, 50);
                            value = value.replace(/^[^a-zA-Z]+/, "");
                            value = value.replace(/[^a-zA-Z\s]/g, "");
                            handleInputChange(
                                beneficiary.id,
                                "fullName",
                                value
                            );
                            checkDuplicateName(beneficiary.id, value);
                        }}
                        value={beneficiary.fullName}
                        type="text"
                        class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                            isDuplicate ||
                            isDuplicateNumber ||
                            errors.beneficiaryFullName
                                ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707]"
                                : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
                        }  block w-full sm:text-sm focus:ring-0`}
                        placeholder="John Doe"
                    />
                </label>
                <div class="flex flex-col w-full">
                    <span
                        class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                            isDuplicate ||
                            isDuplicateNumber ||
                            errors.beneficiaryRelationship
                                ? "text-[#DD0707]"
                                : "text-[#848A90]"
                        }`}
                    >
                        Relationship
                    </span>
                    <DropdownMultiple
                        data={relationships}
                        defaultValue={
                            beneficiary.relationship
                                ? [
                                      relationships.find(
                                          (relationship) =>
                                              relationship.name ===
                                              beneficiary.relationship
                                      ),
                                  ]
                                : [relationships[0]]
                        }
                        handleDropdownChange={handleSelectRelationship}
                        hideSearch={true}
                        itemId={beneficiary.id}
                        errors={
                            isDuplicate ||
                            isDuplicateNumber ||
                            errors.beneficiaryRelationship
                                ? true
                                : false
                        }
                    />
                </div>
                <div className="flex w-full">
                    <MobileNumber
                        key={beneficiary.id}
                        setMobile={(value) => {
                            handleSetMobile(value);
                            checkDuplicateNumber(beneficiary.id, value);
                        }}
                        setIsMobileValid={setIsMobileValid}
                        defaultValue={beneficiary.mobile}
                        isError={
                            isDuplicate ||
                            isDuplicateNumber ||
                            errors.beneficiaryMobile
                                ? true
                                : false
                        }
                    />
                </div>
                <div className="w-full flex md:hidden items-center justify-center">
                    <button
                        className="text-[#008080] text-[10px] font-medium flex gap-2 items-center"
                        onClick={() =>
                            handleSetEmergencyContact(beneficiary.id)
                        }
                    >
                        <span>Set as emergency contact</span>
                        {selectedBeneficiary === beneficiary.id && (
                            <svg
                                width="14"
                                height="14"
                                viewBox="0 0 34 34"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M17 0C13.6377 0 10.3509 0.997032 7.55531 2.86502C4.75968 4.733 2.58074 7.38804 1.29406 10.4944C0.00736586 13.6007 -0.329291 17.0189 0.326658 20.3165C0.982606 23.6142 2.6017 26.6433 4.97919 29.0208C7.35668 31.3983 10.3858 33.0174 13.6835 33.6733C16.9811 34.3293 20.3993 33.9926 23.5056 32.7059C26.612 31.4193 29.267 29.2403 31.135 26.4447C33.003 23.649 34 20.3623 34 17C33.9952 12.4928 32.2026 8.17153 29.0156 4.98444C25.8285 1.79735 21.5072 0.0047597 17 0ZM24.4637 14.0021L15.3098 23.156C15.1884 23.2775 15.0441 23.374 14.8854 23.4398C14.7266 23.5056 14.5565 23.5395 14.3846 23.5395C14.2128 23.5395 14.0426 23.5056 13.8839 23.4398C13.7251 23.374 13.5809 23.2775 13.4594 23.156L9.53635 19.2329C9.29097 18.9875 9.15312 18.6547 9.15312 18.3077C9.15312 17.9607 9.29097 17.6279 9.53635 17.3825C9.78173 17.1371 10.1145 16.9993 10.4615 16.9993C10.8086 16.9993 11.1414 17.1371 11.3867 17.3825L14.3846 20.382L22.6133 12.1517C22.7348 12.0302 22.879 11.9339 23.0378 11.8681C23.1965 11.8023 23.3666 11.7685 23.5385 11.7685C23.7103 11.7685 23.8804 11.8023 24.0392 11.8681C24.1979 11.9339 24.3422 12.0302 24.4637 12.1517C24.5852 12.2732 24.6815 12.4175 24.7473 12.5762C24.813 12.735 24.8469 12.9051 24.8469 13.0769C24.8469 13.2487 24.813 13.4189 24.7473 13.5776C24.6815 13.7364 24.5852 13.8806 24.4637 14.0021Z"
                                    fill="#54B947"
                                />
                            </svg>
                        )}
                    </button>
                </div>

                <div className="hidden md:flex items-end gap-5 w-[284px]">
                    {beneficiaries.length > 1 && (
                        <button
                            onClick={() =>
                                handleRemoveBeneficiary(beneficiary.id)
                            }
                        >
                            <svg
                                width="31"
                                height="31"
                                viewBox="0 0 31 31"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M27.6875 0.875H3.3125C2.66603 0.875 2.04605 1.13181 1.58893 1.58893C1.13181 2.04605 0.875 2.66603 0.875 3.3125V27.6875C0.875 28.334 1.13181 28.954 1.58893 29.4111C2.04605 29.8682 2.66603 30.125 3.3125 30.125H27.6875C28.334 30.125 28.954 29.8682 29.4111 29.4111C29.8682 28.954 30.125 28.334 30.125 27.6875V3.3125C30.125 2.66603 29.8682 2.04605 29.4111 1.58893C28.954 1.13181 28.334 0.875 27.6875 0.875ZM27.6875 27.6875H3.3125V3.3125H27.6875V27.6875ZM21.2373 11.4873L17.223 15.5L21.2373 19.5127C21.3505 19.626 21.4403 19.7604 21.5016 19.9083C21.5629 20.0563 21.5944 20.2149 21.5944 20.375C21.5944 20.5351 21.5629 20.6937 21.5016 20.8417C21.4403 20.9896 21.3505 21.124 21.2373 21.2373C21.124 21.3505 20.9896 21.4403 20.8417 21.5016C20.6937 21.5629 20.5351 21.5944 20.375 21.5944C20.2149 21.5944 20.0563 21.5629 19.9083 21.5016C19.7604 21.4403 19.626 21.3505 19.5127 21.2373L15.5 17.223L11.4873 21.2373C11.374 21.3505 11.2396 21.4403 11.0917 21.5016C10.9437 21.5629 10.7851 21.5944 10.625 21.5944C10.4649 21.5944 10.3063 21.5629 10.1583 21.5016C10.0104 21.4403 9.87597 21.3505 9.76273 21.2373C9.6495 21.124 9.55968 20.9896 9.49839 20.8417C9.43711 20.6937 9.40557 20.5351 9.40557 20.375C9.40557 20.2149 9.43711 20.0563 9.49839 19.9083C9.55968 19.7604 9.6495 19.626 9.76273 19.5127L13.777 15.5L9.76273 11.4873C9.53405 11.2586 9.40557 10.9484 9.40557 10.625C9.40557 10.3016 9.53405 9.99142 9.76273 9.76273C9.99142 9.53405 10.3016 9.40557 10.625 9.40557C10.9484 9.40557 11.2586 9.53405 11.4873 9.76273L15.5 13.777L19.5127 9.76273C19.626 9.6495 19.7604 9.55968 19.9083 9.49839C20.0563 9.43711 20.2149 9.40557 20.375 9.40557C20.5351 9.40557 20.6937 9.43711 20.8417 9.49839C20.9896 9.55968 21.124 9.6495 21.2373 9.76273C21.3505 9.87597 21.4403 10.0104 21.5016 10.1583C21.5629 10.3063 21.5944 10.4649 21.5944 10.625C21.5944 10.7851 21.5629 10.9437 21.5016 11.0917C21.4403 11.2396 21.3505 11.374 21.2373 11.4873Z"
                                    fill="#DD0707"
                                />
                            </svg>
                        </button>
                    )}
                    {index === beneficiaries.length - 1 &&
                        beneficiaries.length < 3 && (
                            <button onClick={() => handleAddBeneficiary()}>
                                <svg
                                    width="31"
                                    height="31"
                                    viewBox="0 0 31 31"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M27.6875 0.875H3.3125C2.66603 0.875 2.04605 1.13181 1.58893 1.58893C1.13181 2.04605 0.875 2.66603 0.875 3.3125V27.6875C0.875 28.334 1.13181 28.954 1.58893 29.4111C2.04605 29.8682 2.66603 30.125 3.3125 30.125H27.6875C28.334 30.125 28.954 29.8682 29.4111 29.4111C29.8682 28.954 30.125 28.334 30.125 27.6875V3.3125C30.125 2.66603 29.8682 2.04605 29.4111 1.58893C28.954 1.13181 28.334 0.875 27.6875 0.875ZM27.6875 27.6875H3.3125V3.3125H27.6875V27.6875ZM22.8125 15.5C22.8125 15.8232 22.6841 16.1332 22.4555 16.3618C22.227 16.5903 21.917 16.7188 21.5938 16.7188H16.7188V21.5938C16.7188 21.917 16.5903 22.227 16.3618 22.4555C16.1332 22.6841 15.8232 22.8125 15.5 22.8125C15.1768 22.8125 14.8668 22.6841 14.6382 22.4555C14.4097 22.227 14.2812 21.917 14.2812 21.5938V16.7188H9.40625C9.08302 16.7188 8.77302 16.5903 8.54446 16.3618C8.3159 16.1332 8.1875 15.8232 8.1875 15.5C8.1875 15.1768 8.3159 14.8668 8.54446 14.6382C8.77302 14.4097 9.08302 14.2812 9.40625 14.2812H14.2812V9.40625C14.2812 9.08302 14.4097 8.77302 14.6382 8.54446C14.8668 8.3159 15.1768 8.1875 15.5 8.1875C15.8232 8.1875 16.1332 8.3159 16.3618 8.54446C16.5903 8.77302 16.7188 9.08302 16.7188 9.40625V14.2812H21.5938C21.917 14.2812 22.227 14.4097 22.4555 14.6382C22.6841 14.8668 22.8125 15.1768 22.8125 15.5Z"
                                        fill="#008080"
                                    />
                                </svg>
                            </button>
                        )}
                </div>
                <div className="flex md:hidden w-full items-center justify-between">
                    {index === beneficiaries.length - 1 &&
                        beneficiaries.length < 3 && (
                            <button
                                onClick={() => handleAddBeneficiary()}
                                className="bg-[#008080] text-white px-4 py-3 w-full text-[10px] font-medium"
                            >
                                Add Another Beneficiary
                            </button>
                        )}
                </div>
            </div>
            {isDuplicate || isDuplicateNumber ? (
                <div className="flex items-center bg-[#EFF2F4] py-3 w-full gap-3 px-4">
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

                    <p className="text-[#2D2727]">
                        Double entry of beneficiary name or phone number is not
                        allowed
                    </p>
                </div>
            ) : (
                ""
            )}
        </div>
    );
};

export default BeneficiariesForm;
