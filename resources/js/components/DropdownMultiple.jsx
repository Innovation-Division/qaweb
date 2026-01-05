import React, { useEffect, useRef, useState } from "react";
import {
    Listbox,
    ListboxButton,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/react";

function DropdownMultiple({
    data,
    defaultValue,
    handleDropdownChange,
    itemId = null,
    hideSearch = false,
    resetValue = false,
    errors = "",
}) {
    const [selectedOption, setSelectedOption] = useState(defaultValue[0]);
    const [isOpen, setIsOpen] = useState(false);
    const [searchTerm, setSearchTerm] = useState("");
    const selectRef = useRef(null);

    const filteredOptions = data.filter((option) =>
        option.name.toLowerCase().includes(searchTerm.toLowerCase())
    );

    useEffect(() => {
        if (!selectedOption.default) {
            handleDropdownChange(selectedOption.name, itemId);
        }
        setIsOpen(false);
    }, [selectedOption]);

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (
                selectRef.current &&
                !selectRef.current.contains(event.target)
            ) {
                setIsOpen(false);
            }
        };
        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, [selectRef]);

    useEffect(() => {
        if (resetValue) {
            setSelectedOption(defaultValue[0]);
            setSearchTerm("");
            setIsOpen(false);
        }
    }, [resetValue]);

    return (
        <div className="relative">
            <Listbox value={selectedOption} onChange={setSelectedOption}>
                <div className="relative">
                    <ListboxButton
                        className={`relative text-start cursor-pointer mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                            errors
                                ? "border-[#DD0707] placeholder-[#DD0707]"
                                : "border-[#006666] placeholder-slate-400"
                        } w-full  sm:text-sm focus:ring-0 focus:outline-none`}
                        onClick={(e) => {
                            e.stopPropagation();
                            setIsOpen(!isOpen);
                            setSearchTerm("");
                        }}
                    >
                        <span
                            className={`block truncate ${
                                selectedOption?.default && "text-[#848A90]"
                            }`}
                        >
                            {selectedOption?.name}
                        </span>
                        <span className="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                            {isOpen ? (
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-chevron-up"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#D7DEE3"
                                        fillRule="evenodd"
                                        d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"
                                    />
                                </svg>
                            ) : (
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-chevron-down"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill={`${errors ? "#DD0707" : ""} `}
                                        fillRule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                    />
                                </svg>
                            )}
                        </span>
                    </ListboxButton>

                    <ListboxOptions
                        ref={selectRef}
                        className={`absolute mt-2 z-40 max-h-60 w-full overflow-auto no-scrollbar rounded-md bg-white text-base focus:outline-none border shadow-lg ${
                            isOpen ? "block" : "hidden"
                        }`}
                        // onClick={() => setIsOpen(false)}
                    >
                        {hideSearch === false && (
                            <div className="sticky top-0 z-40 bg-white px-4 py-3">
                                <div className="relative rounded-md">
                                    <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg
                                            width="16"
                                            height="16"
                                            viewBox="0 0 12 14"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fillRule="evenodd"
                                                clipRule="evenodd"
                                                d="M10.3589 2.5372C11.0164 3.27395 11.4408 4.18914 11.5782 5.16705C11.7624 6.47836 11.4182 7.80917 10.6213 8.86672C9.82436 9.92426 8.64001 10.6219 7.32872 10.8063C6.35081 10.9438 5.35408 10.7881 4.46462 10.3591C3.57517 9.93008 2.83291 9.24694 2.3317 8.39607C1.8305 7.54519 1.59287 6.5648 1.64885 5.57887C1.70484 4.59294 2.05193 3.64575 2.64623 2.85709C3.24053 2.06842 4.05536 1.47369 4.98766 1.14812C5.91997 0.822543 6.92788 0.780739 7.88394 1.02799C8.84001 1.27525 9.70128 1.80046 10.3589 2.5372ZM10.6641 5.29549C10.5521 4.49838 10.2062 3.75239 9.67018 3.15186C9.13418 2.55132 8.43213 2.12321 7.65282 1.92167C6.87351 1.72012 6.05194 1.7542 5.29199 2.01958C4.53205 2.28497 3.86786 2.76974 3.38343 3.41261C2.899 4.05547 2.61608 4.82755 2.57044 5.6312C2.52481 6.43486 2.71851 7.234 3.12705 7.92757C3.5356 8.62114 4.14063 9.17798 4.86565 9.52769C5.59066 9.87739 6.40308 10.0043 7.20019 9.89223M10.6641 5.29549C10.8142 6.36437 10.5337 7.44916 9.88407 8.31119C9.23449 9.17323 8.26906 9.74194 7.20019 9.89223"
                                                fill="#585858"
                                            />
                                            <path
                                                fillRule="evenodd"
                                                clipRule="evenodd"
                                                d="M4.03421 9.31171C4.23778 9.46512 4.27845 9.7545 4.12505 9.95808L1.43158 13.5324C1.27817 13.736 0.988788 13.7767 0.785216 13.6233C0.581642 13.4699 0.540972 13.1805 0.694375 12.9769L3.38784 9.40256C3.54125 9.19898 3.83063 9.15831 4.03421 9.31171Z"
                                                fill="#585858"
                                            />
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        className="searchDropdown block w-full rounded-md border-[#F7F7F7] pl-10 pr-3 py-2 bg-[#FAFAFA] focus:border-none focus:bg-[#F7FFFF] focus:ring-0 sm:text-sm"
                                        placeholder="Type here to search"
                                        onChange={(e) =>
                                            setSearchTerm(e.target.value)
                                        }
                                    />
                                </div>
                            </div>
                        )}

                        {filteredOptions.length > 0 ? (
                            filteredOptions.map((option) => (
                                <ListboxOption
                                    key={option.id}
                                    className={({ active }) =>
                                        `relative cursor-default select-none py-2 pl-5 pr-4 text-[#1D1F23] ${
                                            active && "bg-[#E0F5F5]"
                                        }`
                                    }
                                    value={option}
                                >
                                    {({ selected }) => (
                                        <>
                                            <span
                                                className={`block truncate text-[#1D1F23] text-sm  ${
                                                    selected
                                                        ? "font-medium "
                                                        : "font-normal"
                                                }`}
                                            >
                                                {option.name}
                                            </span>
                                        </>
                                    )}
                                </ListboxOption>
                            ))
                        ) : (
                            <div className="px-4 py-2 text-gray-500">
                                No options found.
                            </div>
                        )}
                    </ListboxOptions>
                </div>
            </Listbox>
        </div>
    );
}

export default DropdownMultiple;
