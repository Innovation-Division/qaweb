import { useState } from "react";
import { useNavigate } from "react-router-dom";
import HeaderButton from "../../components/HeaderButton";

const Quotation = () => {
    const [createQuotationModal, setCreateQuotationModal] = useState(false);
    const [preSelectedQuotations, setPreSelectedQuotations] = useState("");
    const navigate = useNavigate();

    const handleCreateProduct = () => {
        if (preSelectedQuotations === "Motor") {
            setCreateQuotationModal(false);
            navigate("/epartnerhub/quotations/auto-excel");
        }
    };

    return (
        <div className="flex flex-col gap-6 w-full px-5 py-5">
            <div className="flex justify-between items-center w-full bg-white p-6 rounded-md shadow-sm">
                <p className="text-[23px] font-medium text-[#303030]">
                    Quotation
                </p>
                <HeaderButton
                    title={"Create Quotation"}
                    onHandleClick={() => {
                        setCreateQuotationModal(true);
                        setPreSelectedQuotations("");
                    }}
                />
            </div>
            <div className="flex flex-col justify-center items-center bg-white w-full gap-4 shadow-sm">
                <div className="flex justify-between items-center w-full px-6 mt-4">
                    <p className="text-[#2D2727] font-bold leading-6">
                        All Quotations
                    </p>
                    <div className="relative w-full max-w-[450px]">
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
                <div className="flex items-center w-full px-6 gap-5">
                    <button className="py-1 px-10 bg-[#E0F5F5] text-[#2D2727] rounded-full font-medium text-sm">
                        All (20)
                    </button>
                    <button className="py-1 px-10 text-[#585858] rounded-full font-medium text-sm">
                        Drafts
                    </button>
                </div>
                <div class="relative overflow-x-auto sm:rounded-lg bg-white w-full">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-[#585858] uppercase font-medium">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-all-search"
                                            type="checkbox"
                                            class="w-5 h-5 text-blue-600 border-gray-300 rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-all-search"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs text-[#585858] uppercase font-medium"
                                >
                                    QUOTATION NO.
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
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-5 h-5 text-[] border-[#D7DEE3] rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </td>
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
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-5 h-5 text-[] border-[#D7DEE3] rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </td>
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
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-5 h-5 text-[] border-[#D7DEE3] rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </td>
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
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-5 h-5 text-[] border-[#D7DEE3] rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </td>
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
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-5 h-5 text-[] border-[#D7DEE3] rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </td>
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
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input
                                            id="checkbox-table-search-1"
                                            type="checkbox"
                                            class="w-5 h-5 text-[] border-[#D7DEE3] rounded-sm focus:ring-0"
                                        />
                                        <label
                                            for="checkbox-table-search-1"
                                            class="sr-only"
                                        >
                                            checkbox
                                        </label>
                                    </div>
                                </td>
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
            <div
                class={`fixed z-50 overflow-y-auto top-10 w-full left-0 h-full ${
                    !createQuotationModal && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center justify-center min-h-screen pt-4 px-2 pb-20 text-center sm:p-0 overflow-hidden">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25" />
                    </div>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-[400px] sm:max-w-2xl sm:py-4 px-5 md:px-8 sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white flex flex-col justify-between px-2 gap-2 md:gap-4 my-5 overflow-auto text-sm">
                            <p className="text-[23px] text-[#21272A] font-medium">
                                Select Quotation
                            </p>
                            <ul className="flex flex-col">
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations("Motor")
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations === "Motor" &&
                                        "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="25"
                                        height="15"
                                        viewBox="0 0 25 15"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M23.4375 4.93751H20.6357L16.4062 0.708016C16.2617 0.562293 16.0896 0.44676 15.9 0.368132C15.7104 0.289505 15.507 0.249352 15.3018 0.250008H4.32422C4.06757 0.250483 3.81499 0.31417 3.58881 0.435439C3.36262 0.556709 3.16978 0.731828 3.02734 0.945321L0.130859 5.28516C0.0457538 5.41378 0.000254744 5.56454 0 5.71876L0 10.4063C0 10.8207 0.16462 11.2181 0.457646 11.5111C0.750671 11.8041 1.1481 11.9688 1.5625 11.9688H3.22266C3.39477 12.641 3.7857 13.2368 4.33384 13.6622C4.88197 14.0877 5.55612 14.3186 6.25 14.3186C6.94388 14.3186 7.61803 14.0877 8.16616 13.6622C8.7143 13.2368 9.10523 12.641 9.27734 11.9688H15.7227C15.8948 12.641 16.2857 13.2368 16.8338 13.6622C17.382 14.0877 18.0561 14.3186 18.75 14.3186C19.4439 14.3186 20.118 14.0877 20.6662 13.6622C21.2143 13.2368 21.6052 12.641 21.7773 11.9688H23.4375C23.8519 11.9688 24.2493 11.8041 24.5424 11.5111C24.8354 11.2181 25 10.8207 25 10.4063V6.50001C25 6.08561 24.8354 5.68818 24.5424 5.39515C24.2493 5.10213 23.8519 4.93751 23.4375 4.93751ZM4.32422 1.81251H15.3018L18.4268 4.93751H2.24609L4.32422 1.81251ZM6.25 12.75C5.94097 12.75 5.63887 12.6584 5.38192 12.4867C5.12497 12.315 4.9247 12.071 4.80644 11.7855C4.68818 11.4999 4.65723 11.1858 4.71752 10.8827C4.77781 10.5796 4.92663 10.3012 5.14515 10.0827C5.36367 9.86413 5.64208 9.71532 5.94517 9.65503C6.24827 9.59474 6.56243 9.62568 6.84794 9.74395C7.13345 9.86221 7.37748 10.0625 7.54917 10.3194C7.72086 10.5764 7.8125 10.8785 7.8125 11.1875C7.8125 11.6019 7.64788 11.9993 7.35485 12.2924C7.06183 12.5854 6.6644 12.75 6.25 12.75ZM18.75 12.75C18.441 12.75 18.1389 12.6584 17.8819 12.4867C17.625 12.315 17.4247 12.071 17.3064 11.7855C17.1882 11.4999 17.1572 11.1858 17.2175 10.8827C17.2778 10.5796 17.4266 10.3012 17.6451 10.0827C17.8637 9.86413 18.1421 9.71532 18.4452 9.65503C18.7483 9.59474 19.0624 9.62568 19.3479 9.74395C19.6335 9.86221 19.8775 10.0625 20.0492 10.3194C20.2209 10.5764 20.3125 10.8785 20.3125 11.1875C20.3125 11.6019 20.1479 11.9993 19.8549 12.2924C19.5618 12.5854 19.1644 12.75 18.75 12.75ZM23.4375 10.4063H21.7773C21.6052 9.73406 21.2143 9.13826 20.6662 8.71279C20.118 8.28732 19.4439 8.05638 18.75 8.05638C18.0561 8.05638 17.382 8.28732 16.8338 8.71279C16.2857 9.13826 15.8948 9.73406 15.7227 10.4063H9.27734C9.10523 9.73406 8.7143 9.13826 8.16616 8.71279C7.61803 8.28732 6.94388 8.05638 6.25 8.05638C5.55612 8.05638 4.88197 8.28732 4.33384 8.71279C3.7857 9.13826 3.39477 9.73406 3.22266 10.4063H1.5625V6.50001H23.4375V10.4063Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    Motor
                                </li>
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations(
                                            "International"
                                        )
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations ===
                                            "International" && "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M16.0986 8.15331L18.9443 5.47558L18.9609 5.45898C19.5471 4.87286 19.8763 4.07791 19.8763 3.24901C19.8763 2.42012 19.5471 1.62517 18.9609 1.03905C18.3748 0.452935 17.5799 0.123657 16.751 0.123657C15.9221 0.123657 15.1271 0.452935 14.541 1.03905C14.541 1.04491 14.5303 1.0498 14.5244 1.05565L11.8467 3.90136L3.74122 0.952139C3.60152 0.901328 3.45022 0.891429 3.30509 0.923603C3.15996 0.955777 3.02702 1.02869 2.92188 1.13378L0.578132 3.47753C0.496461 3.55927 0.433937 3.6581 0.395066 3.76691C0.356194 3.87572 0.341943 3.9918 0.353338 4.10679C0.364734 4.22177 0.401492 4.33279 0.460966 4.43186C0.52044 4.53092 0.601147 4.61556 0.697273 4.67968L6.93653 8.83886L5.48926 10.2812H3.46876C3.26183 10.2813 3.0634 10.3635 2.917 10.5098L0.573249 12.8535C0.481845 12.9447 0.414462 13.0571 0.377128 13.1807C0.339793 13.3043 0.33367 13.4352 0.359307 13.5617C0.384943 13.6883 0.441539 13.8065 0.524034 13.9058C0.60653 14.0051 0.712352 14.0824 0.832038 14.1308L4.42774 15.5693L5.86329 19.1582L5.86915 19.1738C5.91881 19.294 5.9977 19.3999 6.09866 19.4819C6.19962 19.5639 6.31946 19.6194 6.4473 19.6434C6.57514 19.6674 6.70694 19.659 6.83075 19.6191C6.95455 19.5793 7.06644 19.5091 7.15626 19.415L9.48731 17.083C9.56025 17.0107 9.61824 16.9248 9.65795 16.8302C9.69766 16.7355 9.71833 16.6339 9.71876 16.5312V14.5107L11.1602 13.0693L15.3193 19.3086C15.3835 19.4047 15.4681 19.4854 15.5672 19.5449C15.6662 19.6044 15.7773 19.6411 15.8922 19.6525C16.0072 19.6639 16.1233 19.6497 16.2321 19.6108C16.3409 19.5719 16.4398 19.5094 16.5215 19.4277L18.8652 17.084C18.9703 16.9788 19.0432 16.8459 19.0754 16.7008C19.1076 16.5556 19.0977 16.4043 19.0469 16.2646L16.0986 8.15331ZM16.0918 17.6484L11.9326 11.4101C11.8689 11.3133 11.7843 11.2318 11.6852 11.1717C11.586 11.1116 11.4747 11.0743 11.3594 11.0625C11.333 11.0625 11.3076 11.0625 11.2822 11.0625C11.1795 11.0625 11.0779 11.0828 10.983 11.1222C10.8882 11.1616 10.802 11.2193 10.7295 11.292L8.38575 13.6357C8.23916 13.782 8.15661 13.9804 8.15626 14.1875V16.208L6.87989 17.4844L5.75684 14.6758C5.71755 14.5783 5.65898 14.4897 5.58464 14.4154C5.51031 14.341 5.42173 14.2824 5.32423 14.2432L2.51759 13.1201L3.79298 11.8437H5.81251C5.91513 11.8438 6.01677 11.8237 6.11161 11.7845C6.20645 11.7453 6.29263 11.6878 6.36524 11.6152L8.70899 9.27148C8.79084 9.18973 8.85352 9.09084 8.8925 8.98193C8.93147 8.87302 8.94578 8.75681 8.93438 8.64169C8.92298 8.52658 8.88616 8.41544 8.82658 8.31628C8.767 8.21713 8.68614 8.13245 8.58985 8.06835L2.35157 3.90819L3.66993 2.59081L11.7969 5.54589C11.9401 5.5985 12.0955 5.60804 12.2441 5.57334C12.3926 5.53863 12.5278 5.46119 12.6328 5.35058L15.6543 2.13671C15.9488 1.85082 16.344 1.69229 16.7544 1.69538C17.1648 1.69847 17.5576 1.86293 17.8477 2.15322C18.1379 2.44352 18.3022 2.83632 18.3051 3.24676C18.308 3.6572 18.1493 4.05229 17.8633 4.34667L14.6533 7.36718C14.5427 7.47223 14.4653 7.60737 14.4306 7.75592C14.3959 7.90447 14.4054 8.05993 14.458 8.20312L17.4131 16.3301L16.0918 17.6484Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    International Travel Plus
                                </li>
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations("Domestic")
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations === "Domestic" &&
                                        "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="21"
                                        height="21"
                                        viewBox="0 0 21 21"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M10.5 0.34375C8.49129 0.34375 6.52768 0.939404 4.85749 2.05539C3.18731 3.17137 1.88556 4.75756 1.11685 6.61337C0.348151 8.46918 0.147023 10.5113 0.538904 12.4814C0.930785 14.4515 1.89807 16.2612 3.31845 17.6816C4.73883 19.1019 6.5485 20.0692 8.51862 20.4611C10.4887 20.853 12.5308 20.6519 14.3866 19.8832C16.2424 19.1144 17.8286 17.8127 18.9446 16.1425C20.0606 14.4723 20.6563 12.5087 20.6563 10.5C20.6534 7.80727 19.5825 5.22564 17.6784 3.32159C15.7744 1.41754 13.1927 0.346594 10.5 0.34375ZM10.5 19.0938C8.80032 19.0938 7.13881 18.5897 5.72557 17.6454C4.31234 16.7011 3.21086 15.359 2.56041 13.7887C1.90997 12.2184 1.73979 10.4905 2.07138 8.82344C2.40297 7.15642 3.22145 5.62516 4.42331 4.4233C5.62516 3.22144 7.15642 2.40297 8.82345 2.07138C10.4905 1.73978 12.2184 1.90997 13.7887 2.56041C15.359 3.21085 16.7012 4.31233 17.6454 5.72557C18.5897 7.1388 19.0938 8.80032 19.0938 10.5C19.0912 12.7784 18.1849 14.9628 16.5738 16.5738C14.9628 18.1849 12.7784 19.0912 10.5 19.0938ZM14.8379 5.11328L8.58789 8.23828C8.43679 8.31418 8.31419 8.43679 8.23829 8.58789L5.11329 14.8379C5.05366 14.957 5.0255 15.0895 5.03148 15.2226C5.03746 15.3557 5.07739 15.485 5.14746 15.5984C5.21753 15.7117 5.31541 15.8052 5.43182 15.87C5.54822 15.9349 5.67927 15.9688 5.8125 15.9688C5.93379 15.9686 6.05341 15.9405 6.16211 15.8867L12.4121 12.7617C12.5632 12.6858 12.6858 12.5632 12.7617 12.4121L15.8867 6.16211C15.9605 6.01536 15.9861 5.84911 15.9599 5.68698C15.9338 5.52485 15.8572 5.37508 15.7411 5.25895C15.6249 5.14282 15.4752 5.06625 15.313 5.0401C15.1509 5.01395 14.9846 5.03955 14.8379 5.11328ZM11.4766 11.4766L7.55957 13.4404L9.52344 9.52344L13.4443 7.56348L11.4766 11.4766Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    Domestic Travel Plus
                                </li>
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations("Pet Furtect")
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations ===
                                            "Pet Furtect" && "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="23"
                                        height="20"
                                        viewBox="0 0 23 20"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M22.4086 10.207L20.8051 1.61323C20.7659 1.40376 20.6843 1.20451 20.5653 1.02775C20.4462 0.850981 20.2923 0.700435 20.1129 0.585366C19.9336 0.470296 19.7325 0.393136 19.5222 0.358631C19.3119 0.324125 19.0968 0.333003 18.8901 0.384718L18.8598 0.393508L13.7309 1.9062H9.268L4.13909 0.39839L4.10882 0.389601C3.90208 0.337885 3.68695 0.329008 3.47665 0.363513C3.26636 0.398019 3.06534 0.475179 2.88597 0.590249C2.70659 0.705318 2.55266 0.855864 2.43362 1.03263C2.31458 1.20939 2.23296 1.40864 2.19378 1.61812L0.590267 10.207C0.521696 10.551 0.572595 10.908 0.734546 11.2192C0.896497 11.5303 1.1598 11.7768 1.48089 11.9179C1.68653 12.0122 1.90994 12.0615 2.13616 12.0625C2.40694 12.0623 2.67271 11.9895 2.9057 11.8515V15.9687C2.9057 17.0047 3.31725 17.9983 4.04981 18.7308C4.78237 19.4634 5.77594 19.875 6.81195 19.875H16.1869C17.2229 19.875 18.2165 19.4634 18.9491 18.7308C19.6816 17.9983 20.0932 17.0047 20.0932 15.9687V11.8525C20.3259 11.9902 20.5913 12.063 20.8617 12.0634C21.0882 12.0628 21.3119 12.0138 21.518 11.9199C21.8395 11.7787 22.1031 11.5318 22.265 11.2203C22.427 10.9088 22.4777 10.5513 22.4086 10.207ZM2.12445 10.5L3.72894 1.9062L7.83734 3.11421L2.12445 10.5ZM16.1869 18.3125H12.2807V17.0732L13.6147 15.7402C13.7613 15.5936 13.8436 15.3948 13.8436 15.1875C13.8436 14.9801 13.7613 14.7813 13.6147 14.6347C13.4681 14.4881 13.2693 14.4058 13.0619 14.4058C12.8546 14.4058 12.6558 14.4881 12.5092 14.6347L11.4994 15.6455L10.4897 14.6347C10.3431 14.4881 10.1443 14.4058 9.93695 14.4058C9.72963 14.4058 9.53081 14.4881 9.38421 14.6347C9.23762 14.7813 9.15526 14.9801 9.15526 15.1875C9.15526 15.3948 9.23762 15.5936 9.38421 15.7402L10.7182 17.0732V18.3125H6.81195C6.19034 18.3125 5.5942 18.0655 5.15466 17.626C4.71513 17.1864 4.4682 16.5903 4.4682 15.9687V10.0224L9.53851 3.4687H13.4594L18.5307 10.0224V15.9687C18.5307 16.5903 18.2838 17.1864 17.8442 17.626C17.4047 18.0655 16.8085 18.3125 16.1869 18.3125ZM20.8744 10.5L15.1616 3.11421L19.27 1.9062L20.8744 10.5ZM9.1557 11.6718C9.1557 11.9036 9.08697 12.1302 8.9582 12.3229C8.82943 12.5156 8.64641 12.6658 8.43228 12.7545C8.21815 12.8432 7.98252 12.8664 7.7552 12.8212C7.52788 12.776 7.31907 12.6644 7.15518 12.5005C6.99129 12.3366 6.87968 12.1278 6.83446 11.9004C6.78925 11.6731 6.81245 11.4375 6.90115 11.2234C6.98985 11.0092 7.14005 10.8262 7.33276 10.6975C7.52548 10.5687 7.75205 10.5 7.98382 10.5C8.29462 10.5 8.59269 10.6234 8.81246 10.8432C9.03223 11.063 9.1557 11.361 9.1557 11.6718ZM16.1869 11.6718C16.1869 11.9036 16.1182 12.1302 15.9894 12.3229C15.8607 12.5156 15.6777 12.6658 15.4635 12.7545C15.2494 12.8432 15.0138 12.8664 14.7865 12.8212C14.5591 12.776 14.3503 12.6644 14.1864 12.5005C14.0225 12.3366 13.9109 12.1278 13.8657 11.9004C13.8205 11.6731 13.8437 11.4375 13.9324 11.2234C14.0211 11.0092 14.1713 10.8262 14.364 10.6975C14.5567 10.5687 14.7833 10.5 15.0151 10.5C15.3259 10.5 15.6239 10.6234 15.8437 10.8432C16.0635 11.063 16.1869 11.361 16.1869 11.6718Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    Pet Furtect
                                </li>
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations("Hackguard")
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations === "Hackguard" &&
                                        "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="23"
                                        height="18"
                                        viewBox="0 0 23 18"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M21.6562 12.4062H20.875V3.03125C20.875 2.40965 20.6281 1.81351 20.1885 1.37397C19.749 0.93443 19.1529 0.6875 18.5312 0.6875H4.46875C3.84715 0.6875 3.25101 0.93443 2.81147 1.37397C2.37193 1.81351 2.125 2.40965 2.125 3.03125V12.4062H1.34375C1.13655 12.4062 0.937836 12.4886 0.791323 12.6351C0.64481 12.7816 0.5625 12.9803 0.5625 13.1875V14.75C0.5625 15.3716 0.80943 15.9677 1.24897 16.4073C1.68851 16.8468 2.28465 17.0938 2.90625 17.0938H20.0938C20.7154 17.0938 21.3115 16.8468 21.751 16.4073C22.1906 15.9677 22.4375 15.3716 22.4375 14.75V13.1875C22.4375 12.9803 22.3552 12.7816 22.2087 12.6351C22.0622 12.4886 21.8635 12.4062 21.6562 12.4062ZM3.6875 3.03125C3.6875 2.82405 3.76981 2.62534 3.91632 2.47882C4.06284 2.33231 4.26155 2.25 4.46875 2.25H18.5312C18.7385 2.25 18.9372 2.33231 19.0837 2.47882C19.2302 2.62534 19.3125 2.82405 19.3125 3.03125V12.4062H3.6875V3.03125ZM20.875 14.75C20.875 14.9572 20.7927 15.1559 20.6462 15.3024C20.4997 15.4489 20.301 15.5312 20.0938 15.5312H2.90625C2.69905 15.5312 2.50034 15.4489 2.35382 15.3024C2.20731 15.1559 2.125 14.9572 2.125 14.75V13.9688H20.875V14.75ZM13.8438 4.59375C13.8438 4.80095 13.7614 4.99966 13.6149 5.14618C13.4684 5.29269 13.2697 5.375 13.0625 5.375H9.9375C9.7303 5.375 9.53159 5.29269 9.38507 5.14618C9.23856 4.99966 9.15625 4.80095 9.15625 4.59375C9.15625 4.38655 9.23856 4.18784 9.38507 4.04132C9.53159 3.89481 9.7303 3.8125 9.9375 3.8125H13.0625C13.2697 3.8125 13.4684 3.89481 13.6149 4.04132C13.7614 4.18784 13.8438 4.38655 13.8438 4.59375Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    Hackguard
                                </li>
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations("Protech")
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations === "Protech" &&
                                        "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="19"
                                        height="21"
                                        viewBox="0 0 19 21"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M17.3125 0.90625H1.6875C1.2731 0.90625 0.875671 1.07087 0.582646 1.3639C0.28962 1.65692 0.125 2.05435 0.125 2.46875V8.20801C0.125 16.96 7.5293 19.8623 9.01172 20.3545C9.32823 20.4628 9.67177 20.4628 9.98828 20.3545C11.4727 19.8613 18.875 16.959 18.875 8.20703V2.46875C18.875 2.05435 18.7104 1.65692 18.4174 1.3639C18.1243 1.07087 17.7269 0.90625 17.3125 0.90625ZM17.3125 8.20996C17.3125 15.8682 10.834 18.4268 9.5 18.8721C8.17871 18.4326 1.6875 15.876 1.6875 8.20996V2.46875H17.3125V8.20996ZM5.59375 9.5C5.59375 9.2928 5.67606 9.09409 5.82257 8.94757C5.96909 8.80106 6.1678 8.71875 6.375 8.71875H8.71875V6.375C8.71875 6.1678 8.80106 5.96909 8.94757 5.82257C9.09409 5.67606 9.2928 5.59375 9.5 5.59375C9.7072 5.59375 9.90592 5.67606 10.0524 5.82257C10.1989 5.96909 10.2812 6.1678 10.2812 6.375V8.71875H12.625C12.8322 8.71875 13.0309 8.80106 13.1774 8.94757C13.3239 9.09409 13.4062 9.2928 13.4062 9.5C13.4062 9.7072 13.3239 9.90592 13.1774 10.0524C13.0309 10.1989 12.8322 10.2812 12.625 10.2812H10.2812V12.625C10.2812 12.8322 10.1989 13.0309 10.0524 13.1774C9.90592 13.3239 9.7072 13.4062 9.5 13.4062C9.2928 13.4062 9.09409 13.3239 8.94757 13.1774C8.80106 13.0309 8.71875 12.8322 8.71875 12.625V10.2812H6.375C6.1678 10.2812 5.96909 10.1989 5.82257 10.0524C5.67606 9.90592 5.59375 9.7072 5.59375 9.5Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    Protech
                                </li>
                                <li
                                    onClick={() =>
                                        setPreSelectedQuotations("Condo Excel")
                                    }
                                    className={`flex gap-3 items-center py-4 text-[#2D2727] font-medium border-b px-4 cursor-pointer ${
                                        preSelectedQuotations ===
                                            "Condo Excel" && "bg-[#D8E8FF]"
                                    } `}
                                >
                                    <svg
                                        width="25"
                                        height="21"
                                        viewBox="0 0 25 21"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M23.4375 19.3125H21.875V8.37504C21.875 7.96064 21.7104 7.56321 21.4174 7.27018C21.1243 6.97716 20.7269 6.81254 20.3125 6.81254H14.0625V2.12504C14.0627 1.84209 13.986 1.56441 13.8407 1.32162C13.6954 1.07883 13.4869 0.88006 13.2375 0.746514C12.988 0.612968 12.707 0.549662 12.4244 0.563354C12.1418 0.577047 11.8682 0.667223 11.6328 0.824258L3.82031 6.03129C3.606 6.17428 3.43036 6.36804 3.30905 6.59533C3.18774 6.82262 3.12451 7.07639 3.125 7.33402V19.3125H1.5625C1.3553 19.3125 1.15659 19.3948 1.01007 19.5414C0.86356 19.6879 0.78125 19.8866 0.78125 20.0938C0.78125 20.301 0.86356 20.4997 1.01007 20.6462C1.15659 20.7927 1.3553 20.875 1.5625 20.875H23.4375C23.6447 20.875 23.8434 20.7927 23.9899 20.6462C24.1364 20.4997 24.2188 20.301 24.2188 20.0938C24.2188 19.8866 24.1364 19.6879 23.9899 19.5414C23.8434 19.3948 23.6447 19.3125 23.4375 19.3125ZM20.3125 8.37504V19.3125H14.0625V8.37504H20.3125ZM4.6875 7.33402L12.5 2.12504V19.3125H4.6875V7.33402ZM10.9375 9.93754V11.5C10.9375 11.7072 10.8552 11.906 10.7087 12.0525C10.5622 12.199 10.3635 12.2813 10.1562 12.2813C9.94905 12.2813 9.75034 12.199 9.60382 12.0525C9.45731 11.906 9.375 11.7072 9.375 11.5V9.93754C9.375 9.73034 9.45731 9.53162 9.60382 9.38511C9.75034 9.2386 9.94905 9.15629 10.1562 9.15629C10.3635 9.15629 10.5622 9.2386 10.7087 9.38511C10.8552 9.53162 10.9375 9.73034 10.9375 9.93754ZM7.8125 9.93754V11.5C7.8125 11.7072 7.73019 11.906 7.58368 12.0525C7.43716 12.199 7.23845 12.2813 7.03125 12.2813C6.82405 12.2813 6.62534 12.199 6.47882 12.0525C6.33231 11.906 6.25 11.7072 6.25 11.5V9.93754C6.25 9.73034 6.33231 9.53162 6.47882 9.38511C6.62534 9.2386 6.82405 9.15629 7.03125 9.15629C7.23845 9.15629 7.43716 9.2386 7.58368 9.38511C7.73019 9.53162 7.8125 9.73034 7.8125 9.93754ZM7.8125 15.4063V16.9688C7.8125 17.176 7.73019 17.3747 7.58368 17.5212C7.43716 17.6677 7.23845 17.75 7.03125 17.75C6.82405 17.75 6.62534 17.6677 6.47882 17.5212C6.33231 17.3747 6.25 17.176 6.25 16.9688V15.4063C6.25 15.1991 6.33231 15.0004 6.47882 14.8539C6.62534 14.7073 6.82405 14.625 7.03125 14.625C7.23845 14.625 7.43716 14.7073 7.58368 14.8539C7.73019 15.0004 7.8125 15.1991 7.8125 15.4063ZM10.9375 15.4063V16.9688C10.9375 17.176 10.8552 17.3747 10.7087 17.5212C10.5622 17.6677 10.3635 17.75 10.1562 17.75C9.94905 17.75 9.75034 17.6677 9.60382 17.5212C9.45731 17.3747 9.375 17.176 9.375 16.9688V15.4063C9.375 15.1991 9.45731 15.0004 9.60382 14.8539C9.75034 14.7073 9.94905 14.625 10.1562 14.625C10.3635 14.625 10.5622 14.7073 10.7087 14.8539C10.8552 15.0004 10.9375 15.1991 10.9375 15.4063Z"
                                            fill="#0A9FF4"
                                        />
                                    </svg>
                                    Condo Excel
                                </li>
                            </ul>
                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-8 w-full">
                                <button
                                    className="text-[#013353] border border-[#013353] py-4 w-full rounded"
                                    onClick={() =>
                                        setCreateQuotationModal(false)
                                    }
                                >
                                    Cancel
                                </button>
                                <button
                                    disabled={!preSelectedQuotations}
                                    className="text-white bg-[#013353] py-4 w-full rounded disabled:opacity-50"
                                    onClick={() => {
                                        handleCreateProduct();
                                    }}
                                >
                                    Start Quotation
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Quotation;
