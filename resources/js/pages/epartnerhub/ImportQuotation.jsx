import { useState } from "react";

const ImportQuotation = () => {
    const [showGuidelines, setShowGuidelines] = useState(true);
    return (
        <div className="flex flex-col md:px-5 py-5 gap-4">
            <div className="flex flex-col justify-center items-center bg-white py-8 gap-2 rounded-lg border border-[#F2F2F2]">
                <p className="font-medium text-[#585858]">You are uploading</p>
                <p className="text-[#303030] font-medium text-[23px]">
                    Batch Quotation
                </p>
            </div>
            <div className="flex flex-col bg-white p-10 rounded-lg border border-[#F2F2F2] gap-5">
                <div className="flex justify-between w-full items-center">
                    <p className="font-medium text-[23px] text-[#2D2727]">
                        Guidelines
                    </p>
                    <button onClick={() => setShowGuidelines(!showGuidelines)}>
                        <svg
                            width="10"
                            height="17"
                            viewBox="0 0 10 17"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            className={`${
                                showGuidelines ? "-rotate-90" : ""
                            } transition-transform duration-300`}
                        >
                            <path
                                fill="#848A90"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M0.326172 14.9078L6.31591 8.54901L0.327854 2.07446L2.57684 0.41629L9.33875 7.72757C9.78702 8.21226 9.78348 8.91368 9.33034 9.39475L2.55833 16.584L0.326172 14.9078Z"
                            />
                        </svg>
                    </button>
                </div>
                {showGuidelines && (
                    <div className="flex flex-col gap-3">
                        <div className="flex gap-1">
                            <div className="flex-shrink-0 w-9 h-8 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] mr-3">
                                1
                            </div>
                            <div className="flex flex-col gap-2">
                                <p className="text-[#2D2727] font-medium">
                                    Download one template
                                </p>
                                <p className="text-[#585858] text-sm font-medium">
                                    Download template{" "}
                                    <button className="text-[#008080]">
                                        here
                                    </button>
                                </p>
                            </div>
                        </div>
                        <div className="flex gap-1">
                            <div className="flex-shrink-0 w-9 h-8 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] mr-3">
                                2
                            </div>
                            <div className="flex flex-col gap-2">
                                <p className="text-[#2D2727] font-medium">
                                    Upload completed template
                                </p>
                                <p className="text-[#585858] text-sm font-medium">
                                    Make sure you have completed the required
                                    fields before uploading it in the system.
                                </p>
                            </div>
                        </div>
                        <div className="flex gap-1">
                            <div className="flex-shrink-0 w-9 h-8 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] mr-3">
                                3
                            </div>
                            <div className="flex flex-col gap-2">
                                <p className="text-[#2D2727] font-medium">
                                    View, share or print
                                </p>
                                <p className="text-[#585858] text-sm font-medium">
                                    Once file is uploaded in the system, you may
                                    view the file, share with your client or
                                    print a <br />
                                    hardcopy
                                </p>
                            </div>
                        </div>
                    </div>
                )}
            </div>
            <div className="flex flex-col justify-center bg-white py-12 px-8 md:px-40 rounded-lg border border-[#F2F2F2] gap-5">
                <p className="text-[#626161] font-medium text-sm">
                    Upload Completed Template{" "}
                    <span className="text-red-600">*</span>
                </p>
                <div class="flex items-center justify-center w-full">
                    <label
                        for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 "
                    >
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg
                                width="60"
                                height="60"
                                viewBox="0 0 60 60"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    x="5"
                                    y="5"
                                    width="50"
                                    height="50"
                                    rx="10"
                                    fill="#FFE0E6"
                                />

                                <path
                                    d="M22 20H36C36.5304 20 37.0391 20.2107 37.4142 20.5858C37.7893 20.9609 38 21.4696 38 22V38C38 38.5304 37.7893 39.0391 37.4142 39.4142C37.0391 39.7893 36.5304 40 36 40H22C21.4696 40 20.9609 39.7893 20.5858 39.4142C20.2107 39.0391 20 38.5304 20 38V22C20 21.4696 20.2107 20.9609 20.5858 20.5858C20.9609 20.2107 21.4696 20 22 20Z"
                                    stroke="#E91E63"
                                    stroke-width="2"
                                />

                                <path
                                    d="M37.5 21.5L33.5 21.5L37.5 25.5V21.5Z"
                                    fill="#E91E63"
                                />
                            </svg>
                            <p class="mb-2 text-sm text-[#505558] font-medium">
                                Drag and drop csv file, or{" "}
                                <button className="text-[#008080]">
                                    browse
                                </button>{" "}
                                files
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                <div className="bg-[#FFF4DA] flex items-center gap-2 p-3">
                    <svg
                        width="12"
                        height="12"
                        viewBox="0 0 12 12"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M6 0C4.81331 0 3.65328 0.351894 2.66658 1.01118C1.67989 1.67047 0.910851 2.60754 0.456725 3.7039C0.00259971 4.80025 -0.11622 6.00666 0.115291 7.17054C0.346802 8.33443 0.918247 9.40352 1.75736 10.2426C2.59648 11.0818 3.66557 11.6532 4.82946 11.8847C5.99335 12.1162 7.19975 11.9974 8.2961 11.5433C9.39246 11.0891 10.3295 10.3201 10.9888 9.33342C11.6481 8.34672 12 7.18669 12 6C11.9983 4.40922 11.3656 2.88407 10.2408 1.75921C9.11593 0.63436 7.59078 0.0016799 6 0ZM6 11.0769C4.99588 11.0769 4.01431 10.7792 3.17941 10.2213C2.34452 9.66345 1.6938 8.87054 1.30954 7.94285C0.925277 7.01517 0.824737 5.99437 1.02063 5.00954C1.21653 4.02471 1.70006 3.12009 2.41008 2.41007C3.1201 1.70005 4.02472 1.21652 5.00954 1.02063C5.99437 0.824734 7.01517 0.925274 7.94286 1.30953C8.87054 1.69379 9.66345 2.34452 10.2213 3.17941C10.7792 4.01431 11.0769 4.99588 11.0769 6C11.0754 7.34601 10.54 8.63646 9.58824 9.58824C8.63646 10.54 7.34602 11.0754 6 11.0769ZM6.92308 8.76923C6.92308 8.89164 6.87445 9.00903 6.7879 9.09559C6.70134 9.18214 6.58395 9.23077 6.46154 9.23077C6.21672 9.23077 5.98194 9.13351 5.80883 8.9604C5.63572 8.78729 5.53846 8.55251 5.53846 8.30769V6C5.41606 6 5.29866 5.95137 5.21211 5.86482C5.12555 5.77826 5.07692 5.66087 5.07692 5.53846C5.07692 5.41605 5.12555 5.29866 5.21211 5.2121C5.29866 5.12555 5.41606 5.07692 5.53846 5.07692C5.78328 5.07692 6.01807 5.17417 6.19118 5.34729C6.36429 5.5204 6.46154 5.75518 6.46154 6V8.30769C6.58395 8.30769 6.70134 8.35632 6.7879 8.44287C6.87445 8.52943 6.92308 8.64682 6.92308 8.76923ZM5.07692 3.46154C5.07692 3.32461 5.11753 3.19076 5.1936 3.07691C5.26967 2.96306 5.3778 2.87433 5.5043 2.82193C5.6308 2.76953 5.77 2.75582 5.90429 2.78253C6.03859 2.80925 6.16195 2.87518 6.25877 2.972C6.35559 3.06882 6.42152 3.19218 6.44824 3.32648C6.47495 3.46077 6.46124 3.59997 6.40884 3.72647C6.35644 3.85298 6.26771 3.9611 6.15386 4.03717C6.04001 4.11324 5.90616 4.15385 5.76923 4.15385C5.58562 4.15385 5.40953 4.08091 5.2797 3.95107C5.14986 3.82124 5.07692 3.64515 5.07692 3.46154Z"
                            fill="#F5BC16"
                        />
                    </svg>
                    <p className="text-[#3B3939] font-medium text-sm ">
                        Upload one template at a time. Uploading multiple
                        templates is not accepted.
                    </p>
                </div>
                <p className="text-[#626161] font-medium text-sm">
                    Additional Notes
                </p>
                <textarea
                    className="rounded-md border border-[#ABB1BA] p-6"
                    placeholder="Type message"
                ></textarea>
                <div className="flex flex-col-reverse md:flex-row w-full gap-4 md:gap-8">
                    <button className="border border-[#013353] text-[#013353] bg-white rounded-md px-4 py-2 w-full">
                        Cancel
                    </button>
                    <button className="px-4 py-2 w-full bg-[#013353] text-white rounded-md">
                        Next
                    </button>
                </div>
            </div>
        </div>
    );
};

export default ImportQuotation;
