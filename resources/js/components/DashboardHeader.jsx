import epartnerHubLogo from "../assets/images/epartnerhub-logo.png";
import epolicyLogo from "../assets/images/epolicy-logo.png";
import dummy from "../assets/images/dummy.jpg";
import { useState } from "react";
import { Link, NavLink } from "react-router-dom";

const DashboardHeader = () => {
    const [userType, setUserType] = useState("A");
    const [isVisible, setIsVisible] = useState(false);
    return (
        <div className="flex justify-between items-center px-6 md:px-10 h-24 shadow-lg bg-white">
            <button
                onClick={() => setIsVisible((prevIsActive) => !prevIsActive)}
                className="block lg:hidden"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-list"
                    viewBox="0 0 16 16"
                >
                    <path
                        fill={`${isVisible && "#0679BB"}`}
                        fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
                    />
                </svg>
            </button>
            <div
                className={`fixed top-[77px] right-0 bottom-0 overflow-hidden bg-white transition-all z-[999] lg:hidden ${
                    isVisible ? "w-full max-h-screen" : "w-0"
                }`}
            >
                {userType === "A" ? (
                    <ul className="flex flex-col  font-medium text-[#3B3939]">
                        <li>
                            <NavLink
                                to="/epartnerhub/dashboard"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Home
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/policies"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Policy
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/quotations"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Quotation
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/import-quotation"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Import Quotation
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/claims"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Claims
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/referrals"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Referral
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/reports"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Report
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/trainings"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Training
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epartnerhub/settings"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Settings
                            </NavLink>
                        </li>
                        <li>
                            <button
                                className="w-full py-4 text-[#008080]"
                                onClick={() => setIsVisible(false)}
                            >
                                Close
                            </button>
                        </li>
                    </ul>
                ) : (
                    <ul className="flex flex-col  font-medium text-[#3B3939]">
                        <li>
                            <NavLink
                                to="/epolicy/dashboard"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Dashboard
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epolicy/policies"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                My Policy
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epolicy/claims"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Claims
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epolicy/referrals"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Referral
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epolicy/payments"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Payments
                            </NavLink>
                        </li>
                        <li>
                            <NavLink
                                to="/epolicy/accounts"
                                className={({ isActive }) =>
                                    `flex items-center gap-3 w-full px-8 py-4 group ${
                                        isActive && "bg-[#ebf3ff]"
                                    }`
                                }
                            >
                                Account
                            </NavLink>
                        </li>
                        <li>
                            <button
                                className="w-full py-4 text-[#008080]"
                                onClick={() => setIsVisible(false)}
                            >
                                Close
                            </button>
                        </li>
                    </ul>
                )}
            </div>
            {userType === "A" ? (
                <img
                    src={epartnerHubLogo}
                    alt="epartnerhub logo"
                    className="w-36"
                />
            ) : (
                <img
                    src={epolicyLogo}
                    alt="epartnerhub logo"
                    className="w-36"
                />
            )}
            <div className="flex items-center justify-center gap-7">
                <svg
                    width="20"
                    height="21"
                    viewBox="0 0 20 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    className="hidden lg:block"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M3.60593 2.11739C4.9402 1.22585 6.50888 0.75 8.1136 0.75C10.2654 0.750137 12.3291 1.605 13.8506 3.12655C15.3722 4.64811 16.2271 6.71174 16.2272 8.86355C16.2272 10.4683 15.7513 12.037 14.8598 13.3713C13.9683 14.7055 12.7011 15.7455 11.2185 16.3596C9.73597 16.9737 8.1046 17.1344 6.53071 16.8213C4.95683 16.5082 3.51113 15.7355 2.37642 14.6008C1.24171 13.4661 0.468969 12.0204 0.155904 10.4465C-0.157161 8.87259 0.00351542 7.24122 0.617614 5.75866C1.23171 4.27609 2.27165 3.00892 3.60593 2.11739ZM8.11355 2.25C6.80552 2.25001 5.52687 2.63789 4.43928 3.36459C3.35168 4.0913 2.504 5.1242 2.00343 6.33268C1.50287 7.54116 1.3719 8.87093 1.62708 10.1538C1.88227 11.4368 2.51215 12.6152 3.43708 13.5401C4.36201 14.465 5.54044 15.0949 6.82335 15.3501C8.10626 15.6053 9.43603 15.4743 10.6445 14.9738C11.853 14.4732 12.8859 13.6255 13.6126 12.5379C14.3393 11.4503 14.7272 10.1717 14.7272 8.86364M8.11355 2.25C9.86754 2.25012 11.5497 2.94695 12.79 4.18721C14.0302 5.42748 14.7271 7.10965 14.7272 8.86364"
                        fill="#585858"
                    />
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M13.077 13.827C13.3699 13.5341 13.8448 13.5341 14.1377 13.827L19.2803 18.9697C19.5732 19.2626 19.5732 19.7374 19.2803 20.0303C18.9874 20.3232 18.5126 20.3232 18.2197 20.0303L13.077 14.8877C12.7841 14.5948 12.7841 14.1199 13.077 13.827Z"
                        fill="#585858"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="21"
                    fill="currentColor"
                    class="bi bi-bell"
                    viewBox="0 0 16 16"
                >
                    <path
                        fill="#585858"
                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"
                    />
                </svg>
                <div className="flex items-center justify-center gap-2">
                    <img src={dummy} alt="" className="w-7 h-7 rounded-full" />
                    <div className="hidden md:flex flex-col items-start justify-center ml-2">
                        <h1 className="text-sm font-semibold text-[#2F313D]">
                            Juan
                        </h1>
                        <p className="text-xs text-[#585858]">Agent</p>
                    </div>
                    <svg
                        width="11"
                        height="7"
                        viewBox="0 0 11 7"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        className="hidden md:flex"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M0.23013 0.71967C0.536971 0.426777 1.03446 0.426777 1.3413 0.71967L5.5 4.68934L9.6587 0.71967C9.96554 0.426777 10.463 0.426777 10.7699 0.71967C11.0767 1.01256 11.0767 1.48744 10.7699 1.78033L6.05558 6.28033C5.74874 6.57322 5.25126 6.57322 4.94442 6.28033L0.23013 1.78033C-0.0767101 1.48744 -0.0767101 1.01256 0.23013 0.71967Z"
                            fill="#2D2727"
                        />
                    </svg>
                </div>
            </div>
        </div>
    );
};

export default DashboardHeader;
