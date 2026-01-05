import { toast } from "react-toastify";
import { showProPlanConfirmation } from "../PlanSelectedToast";

const PacketPlanCard = ({
    formData,
    setFormData,
    handlePlanPage,
    promoData,
    setPromoData,
    packetPremium,
}) => {
    const handlePlanSelection = (plan, price) => {
        showProPlanConfirmation(plan, price);
    };

    return (
        <div
            className={`border ${
                formData.quotation?.package?.package === "Packet"
                    ? "border-[#006666] bg-[#FBFAFA]"
                    : "border-[#D7DEE3] bg-[#FFFFFF]"
            } py-5 px-8 rounded-lg mt-10`}
        >
            <p className="text-[#303030] text-[23px] font-bold mb-5">Packet</p>
            <p className="text-[#303030] text-[30px] font-bold border-b border-[#D7DEE3] pb-2 mb-5">
                ₱{packetPremium?.due}
            </p>
            {Object.keys(promoData).length > 0 && (
                <div className="flex justify-between items-center mb-4 px-5 py-2 bg-[#F6F6F6]">
                    <p className="font-medium leading-6 text-sm">
                        <span className="text-[#2D2727]">Promo code</span>{" "}
                        <span className="text-[#585858]">
                            {promoData.promo}
                        </span>
                    </p>
                    <p className="text-[#DD0707] text-sm leading-6 font-medium">
                        -
                        {promoData.type === "A"
                            ? `₱${promoData.amount}`
                            : `${promoData.rate}%`}
                    </p>
                </div>
            )}
            <div className="flex items-center gap-4 mb-4 px-2">
                <span>
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M14.2806 7.21937C14.3504 7.28903 14.4057 7.37175 14.4434 7.46279C14.4812 7.55384 14.5006 7.65144 14.5006 7.75C14.5006 7.84856 14.4812 7.94616 14.4434 8.03721C14.4057 8.12825 14.3504 8.21097 14.2806 8.28063L9.03063 13.5306C8.96097 13.6004 8.87826 13.6557 8.78721 13.6934C8.69616 13.7312 8.59857 13.7506 8.5 13.7506C8.40144 13.7506 8.30385 13.7312 8.2128 13.6934C8.12175 13.6557 8.03903 13.6004 7.96938 13.5306L5.71938 11.2806C5.57865 11.1399 5.49959 10.949 5.49959 10.75C5.49959 10.551 5.57865 10.3601 5.71938 10.2194C5.86011 10.0786 6.05098 9.99958 6.25 9.99958C6.44903 9.99958 6.6399 10.0786 6.78063 10.2194L8.5 11.9397L13.2194 7.21937C13.289 7.14964 13.3718 7.09432 13.4628 7.05658C13.5538 7.01884 13.6514 6.99941 13.75 6.99941C13.8486 6.99941 13.9462 7.01884 14.0372 7.05658C14.1283 7.09432 14.211 7.14964 14.2806 7.21937ZM19.75 10C19.75 11.9284 19.1782 13.8134 18.1068 15.4168C17.0355 17.0202 15.5127 18.2699 13.7312 19.0078C11.9496 19.7458 9.98919 19.9389 8.09787 19.5627C6.20656 19.1865 4.46928 18.2579 3.10571 16.8943C1.74215 15.5307 0.813554 13.7934 0.437348 11.9021C0.061142 10.0108 0.254225 8.05042 0.992179 6.26884C1.73013 4.48726 2.97982 2.96451 4.58319 1.89317C6.18657 0.821828 8.07164 0.25 10 0.25C12.585 0.25273 15.0634 1.28084 16.8913 3.10872C18.7192 4.93661 19.7473 7.41498 19.75 10ZM18.25 10C18.25 8.3683 17.7661 6.77325 16.8596 5.41655C15.9531 4.05984 14.6646 3.00242 13.1571 2.37799C11.6497 1.75357 9.99085 1.59019 8.39051 1.90852C6.79017 2.22685 5.32016 3.01259 4.16637 4.16637C3.01259 5.32015 2.22685 6.79016 1.90853 8.3905C1.5902 9.99085 1.75358 11.6496 2.378 13.1571C3.00242 14.6646 4.05984 15.9531 5.41655 16.8596C6.77326 17.7661 8.36831 18.25 10 18.25C12.1873 18.2475 14.2843 17.3775 15.8309 15.8309C17.3775 14.2843 18.2475 12.1873 18.25 10Z"
                            fill="#E4509A"
                        />
                    </svg>
                </span>
                <div className="flex flex-col gap-2">
                    <p className="text-[#2D2727] text-sm leading-6 font-medium">
                        Accidental Death and Disablement
                    </p>
                    <p className="text-[#585858] text-sm">
                        Receive up to <b>₱250,000.00</b> as compensation if you
                        suffer accidental bodily injury during your trip that
                        results to death and disablement.
                    </p>
                </div>
            </div>
            <div className="flex items-center gap-4 mb-4 px-2">
                <span>
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M14.2806 7.21937C14.3504 7.28903 14.4057 7.37175 14.4434 7.46279C14.4812 7.55384 14.5006 7.65144 14.5006 7.75C14.5006 7.84856 14.4812 7.94616 14.4434 8.03721C14.4057 8.12825 14.3504 8.21097 14.2806 8.28063L9.03063 13.5306C8.96097 13.6004 8.87826 13.6557 8.78721 13.6934C8.69616 13.7312 8.59857 13.7506 8.5 13.7506C8.40144 13.7506 8.30385 13.7312 8.2128 13.6934C8.12175 13.6557 8.03903 13.6004 7.96938 13.5306L5.71938 11.2806C5.57865 11.1399 5.49959 10.949 5.49959 10.75C5.49959 10.551 5.57865 10.3601 5.71938 10.2194C5.86011 10.0786 6.05098 9.99958 6.25 9.99958C6.44903 9.99958 6.6399 10.0786 6.78063 10.2194L8.5 11.9397L13.2194 7.21937C13.289 7.14964 13.3718 7.09432 13.4628 7.05658C13.5538 7.01884 13.6514 6.99941 13.75 6.99941C13.8486 6.99941 13.9462 7.01884 14.0372 7.05658C14.1283 7.09432 14.211 7.14964 14.2806 7.21937ZM19.75 10C19.75 11.9284 19.1782 13.8134 18.1068 15.4168C17.0355 17.0202 15.5127 18.2699 13.7312 19.0078C11.9496 19.7458 9.98919 19.9389 8.09787 19.5627C6.20656 19.1865 4.46928 18.2579 3.10571 16.8943C1.74215 15.5307 0.813554 13.7934 0.437348 11.9021C0.061142 10.0108 0.254225 8.05042 0.992179 6.26884C1.73013 4.48726 2.97982 2.96451 4.58319 1.89317C6.18657 0.821828 8.07164 0.25 10 0.25C12.585 0.25273 15.0634 1.28084 16.8913 3.10872C18.7192 4.93661 19.7473 7.41498 19.75 10ZM18.25 10C18.25 8.3683 17.7661 6.77325 16.8596 5.41655C15.9531 4.05984 14.6646 3.00242 13.1571 2.37799C11.6497 1.75357 9.99085 1.59019 8.39051 1.90852C6.79017 2.22685 5.32016 3.01259 4.16637 4.16637C3.01259 5.32015 2.22685 6.79016 1.90853 8.3905C1.5902 9.99085 1.75358 11.6496 2.378 13.1571C3.00242 14.6646 4.05984 15.9531 5.41655 16.8596C6.77326 17.7661 8.36831 18.25 10 18.25C12.1873 18.2475 14.2843 17.3775 15.8309 15.8309C17.3775 14.2843 18.2475 12.1873 18.25 10Z"
                            fill="#E4509A"
                        />
                    </svg>
                </span>
                <div className="flex flex-col gap-2">
                    <p className="text-[#2D2727] text-sm leading-6 font-medium">
                        Accidental Medical Reimbursement
                    </p>
                    <p className="text-[#585858] text-sm">
                        Get <b>₱25,000.00</b> reimbursement for medical expenses
                        incurred due to an accidental injury during your trip.
                    </p>
                </div>
            </div>
            <div className="flex items-center gap-4 mb-10 px-2">
                <span>
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M14.2806 7.21937C14.3504 7.28903 14.4057 7.37175 14.4434 7.46279C14.4812 7.55384 14.5006 7.65144 14.5006 7.75C14.5006 7.84856 14.4812 7.94616 14.4434 8.03721C14.4057 8.12825 14.3504 8.21097 14.2806 8.28063L9.03063 13.5306C8.96097 13.6004 8.87826 13.6557 8.78721 13.6934C8.69616 13.7312 8.59857 13.7506 8.5 13.7506C8.40144 13.7506 8.30385 13.7312 8.2128 13.6934C8.12175 13.6557 8.03903 13.6004 7.96938 13.5306L5.71938 11.2806C5.57865 11.1399 5.49959 10.949 5.49959 10.75C5.49959 10.551 5.57865 10.3601 5.71938 10.2194C5.86011 10.0786 6.05098 9.99958 6.25 9.99958C6.44903 9.99958 6.6399 10.0786 6.78063 10.2194L8.5 11.9397L13.2194 7.21937C13.289 7.14964 13.3718 7.09432 13.4628 7.05658C13.5538 7.01884 13.6514 6.99941 13.75 6.99941C13.8486 6.99941 13.9462 7.01884 14.0372 7.05658C14.1283 7.09432 14.211 7.14964 14.2806 7.21937ZM19.75 10C19.75 11.9284 19.1782 13.8134 18.1068 15.4168C17.0355 17.0202 15.5127 18.2699 13.7312 19.0078C11.9496 19.7458 9.98919 19.9389 8.09787 19.5627C6.20656 19.1865 4.46928 18.2579 3.10571 16.8943C1.74215 15.5307 0.813554 13.7934 0.437348 11.9021C0.061142 10.0108 0.254225 8.05042 0.992179 6.26884C1.73013 4.48726 2.97982 2.96451 4.58319 1.89317C6.18657 0.821828 8.07164 0.25 10 0.25C12.585 0.25273 15.0634 1.28084 16.8913 3.10872C18.7192 4.93661 19.7473 7.41498 19.75 10ZM18.25 10C18.25 8.3683 17.7661 6.77325 16.8596 5.41655C15.9531 4.05984 14.6646 3.00242 13.1571 2.37799C11.6497 1.75357 9.99085 1.59019 8.39051 1.90852C6.79017 2.22685 5.32016 3.01259 4.16637 4.16637C3.01259 5.32015 2.22685 6.79016 1.90853 8.3905C1.5902 9.99085 1.75358 11.6496 2.378 13.1571C3.00242 14.6646 4.05984 15.9531 5.41655 16.8596C6.77326 17.7661 8.36831 18.25 10 18.25C12.1873 18.2475 14.2843 17.3775 15.8309 15.8309C17.3775 14.2843 18.2475 12.1873 18.25 10Z"
                            fill="#E4509A"
                        />
                    </svg>
                </span>
                <div className="flex flex-col gap-2">
                    <p className="text-[#2D2727] text-sm leading-6 font-medium">
                        Travel Assistance
                    </p>
                    <p className="text-[#585858] text-sm">
                        Access financial benefits or emergency services while
                        traveling within the Philippines.
                    </p>
                </div>
            </div>
            {formData.request_info.covid_coverage === "Yes" && (
                <div className="flex items-center gap-4 mb-5 px-3 py-3 border-l-[2.5px] border-[#09A12A] bg-[#F4F4F4] rounded-[5px]">
                    <div className="flex flex-col gap-2">
                        <p className="flex gap-3 text-[#2D2727] text-sm leading-6 font-bold">
                            <span>
                                <svg
                                    width="19"
                                    height="21"
                                    viewBox="0 0 19 21"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M17.3125 0.90625H1.6875C1.2731 0.90625 0.875671 1.07087 0.582646 1.3639C0.28962 1.65692 0.125 2.05435 0.125 2.46875V8.20898C0.125 16.96 7.5293 19.8633 9.01172 20.3564C9.32834 20.4641 9.67166 20.4641 9.98828 20.3564C11.4727 19.8633 18.875 16.96 18.875 8.20898V2.46875C18.875 2.05435 18.7104 1.65692 18.4174 1.3639C18.1243 1.07087 17.7269 0.90625 17.3125 0.90625ZM17.3125 8.20996C17.3125 15.8682 10.833 18.4268 9.5 18.8721C8.17871 18.4316 1.6875 15.875 1.6875 8.20996V2.46875H17.3125V8.20996ZM5.04102 10.834C4.89442 10.6874 4.81207 10.4886 4.81207 10.2812C4.81207 10.0739 4.89442 9.87511 5.04102 9.72851C5.18761 9.58192 5.38643 9.49957 5.59375 9.49957C5.80107 9.49957 5.99989 9.58192 6.14648 9.72851L7.9375 11.5195L12.8535 6.60351C12.9261 6.53093 13.0123 6.47335 13.1071 6.43407C13.202 6.39478 13.3036 6.37457 13.4062 6.37457C13.5089 6.37457 13.6105 6.39478 13.7054 6.43407C13.8002 6.47335 13.8864 6.53093 13.959 6.60351C14.0316 6.6761 14.0891 6.76227 14.1284 6.85711C14.1677 6.95195 14.1879 7.0536 14.1879 7.15625C14.1879 7.2589 14.1677 7.36055 14.1284 7.45539C14.0891 7.55023 14.0316 7.6364 13.959 7.70898L8.49023 13.1777C8.41768 13.2504 8.33151 13.308 8.23667 13.3473C8.14183 13.3866 8.04017 13.4069 7.9375 13.4069C7.83483 13.4069 7.73317 13.3866 7.63833 13.3473C7.54349 13.308 7.45732 13.2504 7.38477 13.1777L5.04102 10.834Z"
                                        fill="#09A12A"
                                    />
                                </svg>
                            </span>
                            <span>COVID-19 Assist+ Coverage</span>
                        </p>
                        <div className="text-[#585858] text-sm leading-6 gap-2">
                            COVID-19 Coverage compensates you for trip
                            cancellations and provides a daily cash benefit if
                            you are hospitalized or placed in isolation due to a
                            positive COVID-19 diagnosis during your trip.
                            <ul className="flex flex-col list-disc px-4">
                                <li>
                                    Receive <b>₱25,000.00</b> for trip
                                    cancellation due to COVID-19.
                                </li>
                                <li>
                                    Get <b>₱250.00</b> daily hospital benefits
                                    due to COVID-19 (Maximum of 15 days).
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            )}
            <div className="flex flex-col gap-2 mb-5">
                {formData.quotation?.package?.package === "Packet" ? (
                    <button className="bg-[#E4509A] text-white px-5 py-[10px] w-full">
                        Plan Selected
                    </button>
                ) : (
                    <button
                        disabled={Object.keys(packetPremium).length === 0}
                        className="text-[#008080] font-medium px-5 py-[10px] w-full flex group gap-2 justify-center hover:border-[#008080] hover:border"
                        onClick={async () => {
                            await setFormData({
                                ...formData,
                                quotation: {
                                    ...formData.quotation,
                                    package: packetPremium,
                                },
                            });
                            handlePlanSelection("packet", packetPremium.due);
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
                                fill-rule="evenodd"
                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                            />
                        </svg>
                        <span>Get Plan</span>
                    </button>
                )}

                <button
                    onClick={handlePlanPage}
                    className="text-[#008080] font-medium px-5 py-[10px] w-full flex group gap-2 justify-center hover:border-[#008080] hover:border"
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
                    <span>View All Benefits</span>
                </button>
            </div>
        </div>
    );
};

export default PacketPlanCard;
