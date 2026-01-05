import React from "react";

export default function modal({ show, onClose }) {
  const citizenship = [
    { id: 1, name: "Filipino Citizenship" },
    {
      id: 2,
      name: "Foreign Permanent Resident in the Philippines with Alien Certificate of Registration",
    },
  ];

  if (!show) return null;

  return (
     <div
                class={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                    !showModal && "hidden"
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
                        class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-[350px] sm:max-w-3xl sm:py-8 px-5 md:px-12 sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="flex items-center justify-center px-4 pt-3 mb-5">
                            <img
                                src={logo}
                                alt=""
                                className="w-[350px] h-auto"
                            />
                        </div>
                        <div class="bg-white flex flex-col items-center justify-between px-2 md:px-10 gap-7 md:gap-8 my-5">
                            <p className="font-medium text-base leading-6 text-black text-center">
                                Condo Excel Plus only quotes clients who own the unit.
                                Before we proceed, please provide and confirm the following 
                            </p>
                            <div className="flex w-full md:px-4">
                                <div className="flex w-full items-center justify-center gap-4">
                                    <div className="flex flex-col w-full">
                                        <span className="after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333]">
                                            Citizenship
                                        </span>
                                        <DropdownSingle
                                            data={citizenship}
                                            defaultValue={[
                                                {
                                                    id: 1,
                                                    name: "Select",
                                                    default: true,
                                                },
                                            ]}
                                            handleDropdownChange={
                                                handleSelectChange
                                            }
                                            hideSearch={true}
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="flex items-center justify-center w-full gap-5">
                                <input
                                    onChange={(e) =>
                                        setIsCertify(e.target.checked)
                                    }
                                    type="checkbox"
                                    className="appearance-none checked:!bg-[#E4509A] rounded w-5 h-5 border-[#939393] p-0 focus:ring-0 shadow-none"
                                />
                                <p className="text-sm md:leading-6 text-[#585858]">
                                    I hereby certify that I am the owner of the condominium unit.
                                </p>
                            </div>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                <button
                                    className="text-[#008080] font-medium text-xs leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                    onClick={() => {
                                        setShowModal(false);
                                        window.location.href =
                                            "/get-quote/ecommerce/cancelled/Domestic Travel Plus";
                                    }}
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
                                    <span>Cancel</span>
                                </button>
                                <button
                                    disabled={!isCertify || !citizenshipValue}
                                    type="button"
                                    className="bg-[#008080] text-white font-medium text-xs leading-5 py-3 px-6 rounded w-full md:w-auto disabled:opacity-40 flex justify-center gap-2 group"
                                    onClick={() => setShowModal(false)}
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        className={`bi bi-arrow-right-short hidden ${
                                            !isCertify || !citizenshipValue
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
                                    <span>Confirm</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  );
}
