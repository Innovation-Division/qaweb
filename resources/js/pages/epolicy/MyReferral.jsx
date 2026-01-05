import { useState } from "react";

const MyReferral = () => {
    const [showReferral, setShowReferral] = useState(false);
    return (
        <div className="flex flex-col gap-6 w-full px-5 py-5">
            <div className="flex flex-col justify-between items-center w-full bg-white p-6 rounded-md shadow-sm gap-4">
                <div className="flex justify-between items-center w-full">
                    <p className="text-[23px] font-medium text-[#303030]">
                        Referrals
                    </p>
                    <button className="bg-[#013353] text-white py-3 px-10 md:px-20 rounded-md flex gap-4">
                        <svg
                            width="25"
                            height="26"
                            viewBox="0 0 25 26"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            className="hidden md:block"
                        >
                            <path
                                d="M14.0625 18.4688C14.2697 18.4688 14.4684 18.3864 14.6149 18.2399C14.7614 18.0934 14.8438 17.8947 14.8438 17.6875V14.5625C14.8438 14.3553 14.7614 14.1566 14.6149 14.0101C14.4684 13.8636 14.2697 13.7812 14.0625 13.7812C13.8553 13.7812 13.6566 13.8636 13.5101 14.0101C13.3636 14.1566 13.2812 14.3553 13.2812 14.5625V17.6875C13.2812 17.8947 13.3636 18.0934 13.5101 18.2399C13.6566 18.3864 13.8553 18.4688 14.0625 18.4688Z"
                                fill="white"
                            />
                            <path
                                d="M20.3125 15.3438H17.9688V14.5625C17.9688 14.3553 17.8864 14.1566 17.7399 14.0101C17.5934 13.8636 17.3947 13.7812 17.1875 13.7812C16.9803 13.7812 16.7816 13.8636 16.6351 14.0101C16.4886 14.1566 16.4062 14.3553 16.4062 14.5625V20.0312H14.0625C13.8553 20.0312 13.6566 20.1136 13.5101 20.2601C13.3636 20.4066 13.2812 20.6053 13.2812 20.8125C13.2812 21.0197 13.3636 21.2184 13.5101 21.3649C13.6566 21.5114 13.8553 21.5938 14.0625 21.5938H17.1875C17.3947 21.5938 17.5934 21.5114 17.7399 21.3649C17.8864 21.2184 17.9688 21.0197 17.9688 20.8125V16.9062H20.3125C20.5197 16.9062 20.7184 16.8239 20.8649 16.6774C21.0114 16.5309 21.0938 16.3322 21.0938 16.125C21.0938 15.9178 21.0114 15.7191 20.8649 15.5726C20.7184 15.4261 20.5197 15.3438 20.3125 15.3438Z"
                                fill="white"
                            />
                            <path
                                d="M20.3125 18.4688C20.1053 18.4688 19.9066 18.5511 19.7601 18.6976C19.6136 18.8441 19.5312 19.0428 19.5312 19.25V20.8125C19.5312 21.0197 19.6136 21.2184 19.7601 21.3649C19.9066 21.5114 20.1053 21.5938 20.3125 21.5938C20.5197 21.5938 20.7184 21.5114 20.8649 21.3649C21.0114 21.2184 21.0938 21.0197 21.0938 20.8125V19.25C21.0938 19.0428 21.0114 18.8441 20.8649 18.6976C20.7184 18.5511 20.5197 18.4688 20.3125 18.4688Z"
                                fill="white"
                            />
                            <path
                                d="M10.1562 13.7812H5.46875C4.60581 13.7812 3.90625 14.4808 3.90625 15.3438V20.0312C3.90625 20.8942 4.60581 21.5938 5.46875 21.5938H10.1562C11.0192 21.5938 11.7188 20.8942 11.7188 20.0312V15.3438C11.7188 14.4808 11.0192 13.7812 10.1562 13.7812Z"
                                fill="white"
                            />
                            <path
                                d="M19.5312 4.40625H14.8438C13.9808 4.40625 13.2812 5.10581 13.2812 5.96875V10.6562C13.2812 11.5192 13.9808 12.2188 14.8438 12.2188H19.5312C20.3942 12.2188 21.0938 11.5192 21.0938 10.6562V5.96875C21.0938 5.10581 20.3942 4.40625 19.5312 4.40625Z"
                                fill="white"
                            />
                            <path
                                d="M10.1562 4.40625H5.46875C4.60581 4.40625 3.90625 5.10581 3.90625 5.96875V10.6562C3.90625 11.5192 4.60581 12.2188 5.46875 12.2188H10.1562C11.0192 12.2188 11.7188 11.5192 11.7188 10.6562V5.96875C11.7188 5.10581 11.0192 4.40625 10.1562 4.40625Z"
                                fill="white"
                            />
                        </svg>
                        Generate Code
                    </button>
                </div>
                <div className="flex justify-between items-center w-full">
                    <p className="text-[#008080] font-medium text-lg">
                        Read up on how referral works
                    </p>
                    <button onClick={() => setShowReferral(!showReferral)}>
                        {showReferral ? (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-up"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"
                                />
                            </svg>
                        ) : (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-right"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        )}
                    </button>
                </div>
            </div>
            <div className="flex flex-col justify-center items-center bg-white w-full gap-5 shadow-sm">
                <div className="flex justify-between items-center w-full px-6 mt-4">
                    <p className="text-[#2D2727] font-bold leading-6">
                        All Referrals
                    </p>
                    <div className="relative w-full max-w-[450px] hidden md:block">
                        <input
                            type="text"
                            placeholder="Search for quotation, file name, policy, insured"
                            className="w-full rounded-md py-3 px-4 border-none bg-[#F5FAFA] text-black placeholder:text-[#848A90] font-medium text-sm"
                        />
                        <div className="absolute inset-y-0 right-3 pr-4 flex items-center pointer-events-none">
                            <svg
                                width="14"
                                height="18"
                                viewBox="0 0 14 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M13.6922 5.43281L9.31719 1.05781C9.2591 0.999791 9.19015 0.953782 9.11428 0.922415C9.03841 0.891047 8.9571 0.874936 8.875 0.875H1.375C1.04348 0.875 0.725537 1.0067 0.491116 1.24112C0.256696 1.47554 0.125 1.79348 0.125 2.125V15.875C0.125 16.2065 0.256696 16.5245 0.491116 16.7589C0.725537 16.9933 1.04348 17.125 1.375 17.125H12.625C12.9565 17.125 13.2745 16.9933 13.5089 16.7589C13.7433 16.5245 13.875 16.2065 13.875 15.875V5.875C13.8751 5.7929 13.859 5.71159 13.8276 5.63572C13.7962 5.55985 13.7502 5.4909 13.6922 5.43281ZM9.5 3.00859L11.7414 5.25H9.5V3.00859ZM12.625 15.875H1.375V2.125H8.25V5.875C8.25 6.04076 8.31585 6.19973 8.43306 6.31694C8.55027 6.43415 8.70924 6.5 8.875 6.5H12.625V15.875ZM9.06719 12.0586C9.43604 11.4725 9.57602 10.771 9.46037 10.0882C9.34473 9.4054 8.98157 8.78914 8.44028 8.35717C7.89899 7.9252 7.21753 7.7078 6.52609 7.74651C5.83464 7.78522 5.1817 8.07732 4.69201 8.56701C4.20232 9.0567 3.91022 9.70964 3.87151 10.4011C3.8328 11.0925 4.0502 11.774 4.48217 12.3153C4.91414 12.8566 5.5304 13.2197 6.2132 13.3354C6.896 13.451 7.59747 13.311 8.18359 12.9422L9.05781 13.8172C9.11588 13.8753 9.18482 13.9213 9.26069 13.9527C9.33656 13.9842 9.41788 14.0003 9.5 14.0003C9.58212 14.0003 9.66344 13.9842 9.73931 13.9527C9.81518 13.9213 9.88412 13.8753 9.94219 13.8172C10.0003 13.7591 10.0463 13.6902 10.0777 13.6143C10.1092 13.5384 10.1253 13.4571 10.1253 13.375C10.1253 13.2929 10.1092 13.2116 10.0777 13.1357C10.0463 13.0598 10.0003 12.9909 9.94219 12.9328L9.06719 12.0586ZM5.125 10.5625C5.125 10.2535 5.21664 9.95137 5.38833 9.69442C5.56002 9.43747 5.80405 9.2372 6.08956 9.11894C6.37507 9.00068 6.68923 8.96973 6.99233 9.03002C7.29542 9.09031 7.57383 9.23913 7.79235 9.45765C8.01087 9.67617 8.15969 9.95458 8.21998 10.2577C8.28027 10.5608 8.24932 10.8749 8.13106 11.1604C8.0128 11.446 7.81253 11.69 7.55558 11.8617C7.29863 12.0334 6.99653 12.125 6.6875 12.125C6.2731 12.125 5.87567 11.9604 5.58265 11.6674C5.28962 11.3743 5.125 10.9769 5.125 10.5625Z"
                                    fill="#008080"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
                <div className="md:flex items-center justify-between w-full px-6 gap-5 hidden">
                    <div className="flex items-center gap-5">
                        <button className="py-1 px-10 bg-[#E0F5F5] text-[#2D2727] rounded-full font-medium text-sm">
                            All (18)
                        </button>
                        <button className="py-1 px-10 text-[#585858] rounded-full font-medium text-sm">
                            Success(15)
                        </button>
                        <button className="py-1 px-10 text-[#585858] rounded-full font-medium text-sm">
                            Pending(3)
                        </button>
                        <button className="py-1 px-10 text-[#585858] rounded-full font-medium text-sm">
                            Failed(1)
                        </button>
                    </div>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg bg-white w-full">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-[#585858] uppercase font-medium">
                            <tr>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    POLICY NO.
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    PRODUCT
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    TITLE
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    DATE OF CREATION
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    STATUS
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white hover:bg-gray-50 odd:bg-[#F5FAFA] even:bg-white">
                                <th
                                    scope="row"
                                    class="px-6 py-4 text-[#2D2727] font-medium text-sm"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Silver
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600  hover:underline"
                                    >
                                        <svg
                                            width="16"
                                            height="17"
                                            viewBox="0 0 16 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M15.4422 3.55782L12.9422 1.05782C12.8841 0.999706 12.8152 0.953606 12.7393 0.922153C12.6635 0.890701 12.5821 0.874512 12.5 0.874512C12.4179 0.874512 12.3365 0.890701 12.2607 0.922153C12.1848 0.953606 12.1159 0.999706 12.0578 1.05782L4.55781 8.55782C4.49979 8.6159 4.45378 8.68485 4.42241 8.76072C4.39105 8.83659 4.37494 8.9179 4.375 9V11.5C4.375 11.6658 4.44085 11.8247 4.55806 11.9419C4.67527 12.0592 4.83424 12.125 5 12.125H7.5C7.5821 12.1251 7.66341 12.109 7.73928 12.0776C7.81515 12.0462 7.8841 12.0002 7.94219 11.9422L15.4422 4.44219C15.5003 4.38415 15.5464 4.31521 15.5779 4.23934C15.6093 4.16347 15.6255 4.08214 15.6255 4C15.6255 3.91787 15.6093 3.83654 15.5779 3.76067C15.5464 3.68479 15.5003 3.61586 15.4422 3.55782ZM7.24141 10.875H5.625V9.2586L10.625 4.2586L12.2414 5.875L7.24141 10.875ZM13.125 4.99141L11.5086 3.375L12.5 2.3836L14.1164 4L13.125 4.99141ZM15 8.375V15.25C15 15.5815 14.8683 15.8995 14.6339 16.1339C14.3995 16.3683 14.0815 16.5 13.75 16.5H1.25C0.918479 16.5 0.600537 16.3683 0.366116 16.1339C0.131696 15.8995 0 15.5815 0 15.25V2.75C0 2.41848 0.131696 2.10054 0.366116 1.86612C0.600537 1.6317 0.918479 1.5 1.25 1.5H8.125C8.29076 1.5 8.44973 1.56585 8.56694 1.68306C8.68415 1.80027 8.75 1.95924 8.75 2.125C8.75 2.29076 8.68415 2.44973 8.56694 2.56694C8.44973 2.68416 8.29076 2.75 8.125 2.75H1.25V15.25H13.75V8.375C13.75 8.20924 13.8158 8.05027 13.9331 7.93306C14.0503 7.81585 14.2092 7.75 14.375 7.75C14.5408 7.75 14.6997 7.81585 14.8169 7.93306C14.9342 8.05027 15 8.20924 15 8.375Z"
                                                fill="#008080"
                                            />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50 odd:bg-[#F5FAFA] even:bg-white">
                                <th
                                    scope="row"
                                    class="px-6 py-4 text-[#2D2727] font-medium text-sm"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Silver
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600  hover:underline"
                                    >
                                        <svg
                                            width="16"
                                            height="17"
                                            viewBox="0 0 16 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M15.4422 3.55782L12.9422 1.05782C12.8841 0.999706 12.8152 0.953606 12.7393 0.922153C12.6635 0.890701 12.5821 0.874512 12.5 0.874512C12.4179 0.874512 12.3365 0.890701 12.2607 0.922153C12.1848 0.953606 12.1159 0.999706 12.0578 1.05782L4.55781 8.55782C4.49979 8.6159 4.45378 8.68485 4.42241 8.76072C4.39105 8.83659 4.37494 8.9179 4.375 9V11.5C4.375 11.6658 4.44085 11.8247 4.55806 11.9419C4.67527 12.0592 4.83424 12.125 5 12.125H7.5C7.5821 12.1251 7.66341 12.109 7.73928 12.0776C7.81515 12.0462 7.8841 12.0002 7.94219 11.9422L15.4422 4.44219C15.5003 4.38415 15.5464 4.31521 15.5779 4.23934C15.6093 4.16347 15.6255 4.08214 15.6255 4C15.6255 3.91787 15.6093 3.83654 15.5779 3.76067C15.5464 3.68479 15.5003 3.61586 15.4422 3.55782ZM7.24141 10.875H5.625V9.2586L10.625 4.2586L12.2414 5.875L7.24141 10.875ZM13.125 4.99141L11.5086 3.375L12.5 2.3836L14.1164 4L13.125 4.99141ZM15 8.375V15.25C15 15.5815 14.8683 15.8995 14.6339 16.1339C14.3995 16.3683 14.0815 16.5 13.75 16.5H1.25C0.918479 16.5 0.600537 16.3683 0.366116 16.1339C0.131696 15.8995 0 15.5815 0 15.25V2.75C0 2.41848 0.131696 2.10054 0.366116 1.86612C0.600537 1.6317 0.918479 1.5 1.25 1.5H8.125C8.29076 1.5 8.44973 1.56585 8.56694 1.68306C8.68415 1.80027 8.75 1.95924 8.75 2.125C8.75 2.29076 8.68415 2.44973 8.56694 2.56694C8.44973 2.68416 8.29076 2.75 8.125 2.75H1.25V15.25H13.75V8.375C13.75 8.20924 13.8158 8.05027 13.9331 7.93306C14.0503 7.81585 14.2092 7.75 14.375 7.75C14.5408 7.75 14.6997 7.81585 14.8169 7.93306C14.9342 8.05027 15 8.20924 15 8.375Z"
                                                fill="#008080"
                                            />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50 odd:bg-[#F5FAFA] even:bg-white">
                                <th
                                    scope="row"
                                    class="px-6 py-4 text-[#2D2727] font-medium text-sm"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Silver
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600  hover:underline"
                                    >
                                        <svg
                                            width="16"
                                            height="17"
                                            viewBox="0 0 16 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M15.4422 3.55782L12.9422 1.05782C12.8841 0.999706 12.8152 0.953606 12.7393 0.922153C12.6635 0.890701 12.5821 0.874512 12.5 0.874512C12.4179 0.874512 12.3365 0.890701 12.2607 0.922153C12.1848 0.953606 12.1159 0.999706 12.0578 1.05782L4.55781 8.55782C4.49979 8.6159 4.45378 8.68485 4.42241 8.76072C4.39105 8.83659 4.37494 8.9179 4.375 9V11.5C4.375 11.6658 4.44085 11.8247 4.55806 11.9419C4.67527 12.0592 4.83424 12.125 5 12.125H7.5C7.5821 12.1251 7.66341 12.109 7.73928 12.0776C7.81515 12.0462 7.8841 12.0002 7.94219 11.9422L15.4422 4.44219C15.5003 4.38415 15.5464 4.31521 15.5779 4.23934C15.6093 4.16347 15.6255 4.08214 15.6255 4C15.6255 3.91787 15.6093 3.83654 15.5779 3.76067C15.5464 3.68479 15.5003 3.61586 15.4422 3.55782ZM7.24141 10.875H5.625V9.2586L10.625 4.2586L12.2414 5.875L7.24141 10.875ZM13.125 4.99141L11.5086 3.375L12.5 2.3836L14.1164 4L13.125 4.99141ZM15 8.375V15.25C15 15.5815 14.8683 15.8995 14.6339 16.1339C14.3995 16.3683 14.0815 16.5 13.75 16.5H1.25C0.918479 16.5 0.600537 16.3683 0.366116 16.1339C0.131696 15.8995 0 15.5815 0 15.25V2.75C0 2.41848 0.131696 2.10054 0.366116 1.86612C0.600537 1.6317 0.918479 1.5 1.25 1.5H8.125C8.29076 1.5 8.44973 1.56585 8.56694 1.68306C8.68415 1.80027 8.75 1.95924 8.75 2.125C8.75 2.29076 8.68415 2.44973 8.56694 2.56694C8.44973 2.68416 8.29076 2.75 8.125 2.75H1.25V15.25H13.75V8.375C13.75 8.20924 13.8158 8.05027 13.9331 7.93306C14.0503 7.81585 14.2092 7.75 14.375 7.75C14.5408 7.75 14.6997 7.81585 14.8169 7.93306C14.9342 8.05027 15 8.20924 15 8.375Z"
                                                fill="#008080"
                                            />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50 odd:bg-[#F5FAFA] even:bg-white">
                                <th
                                    scope="row"
                                    class="px-6 py-4 text-[#2D2727] font-medium text-sm"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Silver
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600  hover:underline"
                                    >
                                        <svg
                                            width="16"
                                            height="17"
                                            viewBox="0 0 16 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M15.4422 3.55782L12.9422 1.05782C12.8841 0.999706 12.8152 0.953606 12.7393 0.922153C12.6635 0.890701 12.5821 0.874512 12.5 0.874512C12.4179 0.874512 12.3365 0.890701 12.2607 0.922153C12.1848 0.953606 12.1159 0.999706 12.0578 1.05782L4.55781 8.55782C4.49979 8.6159 4.45378 8.68485 4.42241 8.76072C4.39105 8.83659 4.37494 8.9179 4.375 9V11.5C4.375 11.6658 4.44085 11.8247 4.55806 11.9419C4.67527 12.0592 4.83424 12.125 5 12.125H7.5C7.5821 12.1251 7.66341 12.109 7.73928 12.0776C7.81515 12.0462 7.8841 12.0002 7.94219 11.9422L15.4422 4.44219C15.5003 4.38415 15.5464 4.31521 15.5779 4.23934C15.6093 4.16347 15.6255 4.08214 15.6255 4C15.6255 3.91787 15.6093 3.83654 15.5779 3.76067C15.5464 3.68479 15.5003 3.61586 15.4422 3.55782ZM7.24141 10.875H5.625V9.2586L10.625 4.2586L12.2414 5.875L7.24141 10.875ZM13.125 4.99141L11.5086 3.375L12.5 2.3836L14.1164 4L13.125 4.99141ZM15 8.375V15.25C15 15.5815 14.8683 15.8995 14.6339 16.1339C14.3995 16.3683 14.0815 16.5 13.75 16.5H1.25C0.918479 16.5 0.600537 16.3683 0.366116 16.1339C0.131696 15.8995 0 15.5815 0 15.25V2.75C0 2.41848 0.131696 2.10054 0.366116 1.86612C0.600537 1.6317 0.918479 1.5 1.25 1.5H8.125C8.29076 1.5 8.44973 1.56585 8.56694 1.68306C8.68415 1.80027 8.75 1.95924 8.75 2.125C8.75 2.29076 8.68415 2.44973 8.56694 2.56694C8.44973 2.68416 8.29076 2.75 8.125 2.75H1.25V15.25H13.75V8.375C13.75 8.20924 13.8158 8.05027 13.9331 7.93306C14.0503 7.81585 14.2092 7.75 14.375 7.75C14.5408 7.75 14.6997 7.81585 14.8169 7.93306C14.9342 8.05027 15 8.20924 15 8.375Z"
                                                fill="#008080"
                                            />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50 odd:bg-[#F5FAFA] even:bg-white">
                                <th
                                    scope="row"
                                    class="px-6 py-4 text-[#2D2727] font-medium text-sm"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Silver
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600  hover:underline"
                                    >
                                        <svg
                                            width="16"
                                            height="17"
                                            viewBox="0 0 16 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M15.4422 3.55782L12.9422 1.05782C12.8841 0.999706 12.8152 0.953606 12.7393 0.922153C12.6635 0.890701 12.5821 0.874512 12.5 0.874512C12.4179 0.874512 12.3365 0.890701 12.2607 0.922153C12.1848 0.953606 12.1159 0.999706 12.0578 1.05782L4.55781 8.55782C4.49979 8.6159 4.45378 8.68485 4.42241 8.76072C4.39105 8.83659 4.37494 8.9179 4.375 9V11.5C4.375 11.6658 4.44085 11.8247 4.55806 11.9419C4.67527 12.0592 4.83424 12.125 5 12.125H7.5C7.5821 12.1251 7.66341 12.109 7.73928 12.0776C7.81515 12.0462 7.8841 12.0002 7.94219 11.9422L15.4422 4.44219C15.5003 4.38415 15.5464 4.31521 15.5779 4.23934C15.6093 4.16347 15.6255 4.08214 15.6255 4C15.6255 3.91787 15.6093 3.83654 15.5779 3.76067C15.5464 3.68479 15.5003 3.61586 15.4422 3.55782ZM7.24141 10.875H5.625V9.2586L10.625 4.2586L12.2414 5.875L7.24141 10.875ZM13.125 4.99141L11.5086 3.375L12.5 2.3836L14.1164 4L13.125 4.99141ZM15 8.375V15.25C15 15.5815 14.8683 15.8995 14.6339 16.1339C14.3995 16.3683 14.0815 16.5 13.75 16.5H1.25C0.918479 16.5 0.600537 16.3683 0.366116 16.1339C0.131696 15.8995 0 15.5815 0 15.25V2.75C0 2.41848 0.131696 2.10054 0.366116 1.86612C0.600537 1.6317 0.918479 1.5 1.25 1.5H8.125C8.29076 1.5 8.44973 1.56585 8.56694 1.68306C8.68415 1.80027 8.75 1.95924 8.75 2.125C8.75 2.29076 8.68415 2.44973 8.56694 2.56694C8.44973 2.68416 8.29076 2.75 8.125 2.75H1.25V15.25H13.75V8.375C13.75 8.20924 13.8158 8.05027 13.9331 7.93306C14.0503 7.81585 14.2092 7.75 14.375 7.75C14.5408 7.75 14.6997 7.81585 14.8169 7.93306C14.9342 8.05027 15 8.20924 15 8.375Z"
                                                fill="#008080"
                                            />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50 odd:bg-[#F5FAFA] even:bg-white">
                                <th
                                    scope="row"
                                    class="px-6 py-4 text-[#2D2727] font-medium text-sm"
                                >
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Silver
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Laptop
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="px-6 py-4 text-[#2D2727] font-medium text-sm">
                                    Yes
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a
                                        href="#"
                                        class="font-medium text-blue-600  hover:underline"
                                    >
                                        <svg
                                            width="16"
                                            height="17"
                                            viewBox="0 0 16 17"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M15.4422 3.55782L12.9422 1.05782C12.8841 0.999706 12.8152 0.953606 12.7393 0.922153C12.6635 0.890701 12.5821 0.874512 12.5 0.874512C12.4179 0.874512 12.3365 0.890701 12.2607 0.922153C12.1848 0.953606 12.1159 0.999706 12.0578 1.05782L4.55781 8.55782C4.49979 8.6159 4.45378 8.68485 4.42241 8.76072C4.39105 8.83659 4.37494 8.9179 4.375 9V11.5C4.375 11.6658 4.44085 11.8247 4.55806 11.9419C4.67527 12.0592 4.83424 12.125 5 12.125H7.5C7.5821 12.1251 7.66341 12.109 7.73928 12.0776C7.81515 12.0462 7.8841 12.0002 7.94219 11.9422L15.4422 4.44219C15.5003 4.38415 15.5464 4.31521 15.5779 4.23934C15.6093 4.16347 15.6255 4.08214 15.6255 4C15.6255 3.91787 15.6093 3.83654 15.5779 3.76067C15.5464 3.68479 15.5003 3.61586 15.4422 3.55782ZM7.24141 10.875H5.625V9.2586L10.625 4.2586L12.2414 5.875L7.24141 10.875ZM13.125 4.99141L11.5086 3.375L12.5 2.3836L14.1164 4L13.125 4.99141ZM15 8.375V15.25C15 15.5815 14.8683 15.8995 14.6339 16.1339C14.3995 16.3683 14.0815 16.5 13.75 16.5H1.25C0.918479 16.5 0.600537 16.3683 0.366116 16.1339C0.131696 15.8995 0 15.5815 0 15.25V2.75C0 2.41848 0.131696 2.10054 0.366116 1.86612C0.600537 1.6317 0.918479 1.5 1.25 1.5H8.125C8.29076 1.5 8.44973 1.56585 8.56694 1.68306C8.68415 1.80027 8.75 1.95924 8.75 2.125C8.75 2.29076 8.68415 2.44973 8.56694 2.56694C8.44973 2.68416 8.29076 2.75 8.125 2.75H1.25V15.25H13.75V8.375C13.75 8.20924 13.8158 8.05027 13.9331 7.93306C14.0503 7.81585 14.2092 7.75 14.375 7.75C14.5408 7.75 14.6997 7.81585 14.8169 7.93306C14.9342 8.05027 15 8.20924 15 8.375Z"
                                                fill="#008080"
                                            />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div className="flex justify-center items-center gap-4 py-4">
                    <button>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-arrow-left-circle-fill"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill="#008080"
                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"
                            />
                        </svg>
                    </button>
                    <p>1 of 12</p>
                    <button>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-arrow-right-circle-fill"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill="#008080"
                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            {showReferral && (
                <div
                    className="fixed inset-0 bg-gray-600 bg-opacity-50 z-40"
                    onClick={() => setShowReferral(false)}
                ></div>
            )}
            <div
                className={`fixed top-0 right-0 h-full w-full max-w-4xl bg-white shadow-lg z-50 transform transition-transform duration-300 ease-in-out rounded-l-xl
           ${showReferral ? "translate-x-0" : "translate-x-full"}`}
            >
                <div className="flex items-center p-6 gap-6 pb-2">
                    <button
                        className="text-gray-500 hover:text-[#2D2727] focus:outline-none"
                        aria-label="Close"
                        onClick={() => setShowReferral(false)}
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke="#008080"
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="2"
                                d="M15 19l-7-7 7-7"
                            />
                        </svg>
                    </button>
                    <h2 className="text-[30px] font-medium text-[#013353]">
                        How does Referral work?
                    </h2>
                    <div className="w-6"></div>
                </div>
                <div className="p-6 pt-0 space-y-5 h-[calc(100vh-64px)] overflow-y-auto custom-scrollbar">
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            1
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            The program is open to all existing and active
                            Cocogen retail policyholders, including Cocogen
                            employees.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            2
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Customers must sign up or log in as a policyholder
                            through the e-Policy Hub to access their unique
                            referral code and link in the 'My Account' tab.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            3
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Policyholders can refer as many new customers as
                            they want by sharing their referral code or referral
                            link with friends, family, or colleagues.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            4
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Each enrollee is entitled to a 5% discount on their
                            Auto Excel Plus purchase.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            5
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            The referred customer must purchase the policy via
                            the Cocogen E-commerce platform through:
                            <br />
                            <span>
                                1. The referral link (which auto-applies the 5%
                                discount)
                            </span>
                            <br />
                            <span>
                                2. The website and manually entering the
                                referral code
                            </span>
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            6
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Referrers will earn 10% of the referee's gross
                            premium for each successful referral.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            7
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Only new business (new Auto Excel Plus policies)
                            will be accepted under this program.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            8
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Self-referral is strictly not allowed - users cannot
                            use their own referral code.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            9
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Agents and producers are not eligible for this
                            program.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            10
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            No promo code, no reward - only referrals with the
                            correct referral code or link will be recognized for
                            incentives, regardless of the affiliation of the
                            referrer to the new customer.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            11
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Referrers can view their referrals and earnings in
                            the 'Referrer Dashboard' tab of their Cocogen
                            policyholder account.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            12
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Incentives will be credited to the referrer's
                            registered e-wallet or bank account within seven (7)
                            working days after the end of each month, along with
                            the receipt as proof of transaction sent to their
                            registered email address. If the payout date falls
                            on a weekend or holiday, disbursement will be
                            processed on the preceding business day.
                        </p>
                    </div>
                    <div className="flex items-center">
                        <div className="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-[#C0E6E6] text-[#008080] text-sm font-bold mr-3">
                            13
                        </div>
                        <p className="text-[#2D2727] text-sm font-medium">
                            Disbursements will cover all successful referrals
                            made from the 1st to the 27th of each month.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default MyReferral;
