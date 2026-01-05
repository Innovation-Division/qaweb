import { useState, useEffect } from "react";
import axiosClient from "../../axiosClient";
import {DocumentMagnifyingGlassIcon
} from "@heroicons/react/24/outline";
import { useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";

const MyPolicy = () => {
    const [referrals, setReferrals] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);
    const [total, setTotal] = useState(0);
    const [perPage, setPerPage] = useState(10);
    const [now, setNow] = useState(new Date());
    const [formatted, setFormatted] = useState("");
    const [selectedClaim, setSelectedClaim] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [open, setOpen] = useState(false); 
    const user = useSelector((state) => state.auth.user);
    const navigate = useNavigate();

    const handleFileAClaim = () => {
    // window.open("https://www.cocogen.com/file-a-claim", "_blank");
    window.open("http://qacms.cocogen.com.ph/file-a-claim", "_blank");
};
    const handleClose = () => {
        setOpen(false);
    };

    useEffect(() => {
        if (user && user.type !== 'C') {
            axiosClient.post('/logout')
                .then(() => {
                    localStorage.removeItem('token');
                    navigate('/login', { replace: true });
                })
                .catch(() => {
                    localStorage.removeItem('token');
                    navigate('/login', { replace: true });
                });
        }
    }, [user, navigate]);

    useEffect(() => {
        const token = localStorage.getItem("token");
        if (!token) {
            window.location.href = "/login";
        }
    }, []);

    useEffect(() => {
        const now = new Date();
        const formattedTime = now.toLocaleString("en-US", {
            month: "long",
            day: "numeric",
            year: "numeric",
        });

        setFormatted(formattedTime);
        setOpen(true);
    }, []);
    
const fetchClaims = async (page = 1) => {
    try {
        const res = await axiosClient.get(
            `/api/get-data/claims?page=${page}&per_page=${perPage}`
        );

        setReferrals(res.data.data);
        setCurrentPage(res.data.current_page);
        setLastPage(res.data.last_page);
        setTotal(res.data.total);
        setPerPage(res.data.per_page);

    } catch (error) {
        // console.error("Error fetching claims data", error);
    }
};

useEffect(() => {
    fetchClaims(currentPage);
}, [currentPage]);

const handleShowClaim = (id) => {
    navigate(`/epolicy/claim/${id}`);
};

    return (
        <div className="flex flex-col gap-6 w-full px-5 py-8">
            <div className="flex justify-between items-center px-8 bg-white py-4 md:py-8 border border-[#F2F2F2]">
                <p className="text-[#303030] text-xl md:text-[23px] font-medium">
                    Claims
                </p>
                <button className="bg-[#013353] text-white py-4 px-10 md:px-20 rounded-md md:text-base text-sm" onClick={handleFileAClaim}>
                    File <span className="hidden md:inline">a Claim</span>
                </button>
            </div>

            {open && (
                <div className="flex justify-between items-center px-8 bg-[#FFF9EC] md:py-8 py-4 rounded-md border border-[#C4A451]">
                    <div className="flex gap-4 items-center">
                        <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg" className="md:w-[18px] w-[18px] md:h-[22px] h-[20px]">
                            <path
                                d="M13.5 20.75a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1 0-1.5h7.5a.75.75 0 0 1 .75.75Zm3.75-12A8.49 8.49 0 0 1 13.66 15.77a2.247 2.247 0 0 0-.16.67V17a1.5 1.5 0 0 1-1.5 1.5H6a1.5 1.5 0 0 1-1.5-1.5v-.56c0-.24-.05-.47-.15-.69a2.23 2.23 0 0 0-.92-.78A8.495 8.495 0 0 1 .75 8.8 8.25 8.25 0 0 1 16.6 5.55a8.47 8.47 0 0 1 .65 3.2ZM14.24 7.87a5.624 5.624 0 0 0-4.37-4.36.75.75 0 0 0-.51 1.42 4.125 4.125 0 0 1 3.4 3.4.75.75 0 0 0 1.48-.46Z"
                                fill="#F5BC16"
                            />
                        </svg>

                        <p className="text-[#303030] font-medium md:text-sm text-[10px]">
                            Your records have been updated as of {formatted}
                        </p>
                    </div>

                    <button onClick={handleClose}>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.8242 10.9752C11.8799 11.031 11.9241 11.0971 11.9543 11.17C11.9845 11.2428 12 11.3209 12 11.3997C12 11.4785 11.9845 11.5566 11.9543 11.6294C11.9241 11.7023 11.8799 11.7684 11.8242 11.8242C11.7684 11.8799 11.7023 11.9241 11.6294 11.9543C11.5566 11.9845 11.4785 12 11.3997 12C11.3209 12 11.2428 11.9845 11.17 11.9543C11.0971 11.9241 11.031 11.8799 10.9752 11.8242L6 6.8482L1.02478 11.8242C0.912198 11.9368 0.75951 12 0.6003 12C0.441091 12 0.288402 11.9368 0.175824 11.8242C0.0632457 11.7116 0 11.5589 0 11.3997C0 11.2405 0.0632457 11.0878 0.175824 10.9752L5.1518 6L0.175824 1.02478C0.0632457 0.912198 0 0.75951 0 0.6003C0 0.441091 0.0632457 0.288402 0.175824 0.175824C0.288402 0.0632457 0.441091 0 0.6003 0C0.75951 0 0.912198 0.0632457 1.02478 0.175824L6 5.1518L10.9752 0.175824C11.0878 0.0632457 11.2405 0 11.3997 0C11.5589 0 11.7116 0.0632457 11.8242 0.175824C11.9368 0.288402 12 0.441091 12 0.6003C12 0.75951 11.9368 0.912198 11.8242 1.02478L6.8482 6L11.8242 10.9752Z"
                                fill="#848A90"
                            />
                        </svg>
                    </button>
                </div>
            )}
            {/* Filters and Table */}
            <div className="p-6 bg-white shadow-md rounded-md">
                <div className="flex justify-between items-center w-full  my-4">
                    <p className="text-[#2D2727] text-base font-medium leading-6 ">
                        All Submitted Claims
                    </p>
                </div>

                {/* Table */}
                <div className="relative overflow-x-auto sm:rounded-lg bg-white w-full">
                    <table className="w-full text-sm text-left">
                        <thead className="text-sm text-[#585858] uppercase font-medium border-b-[2px] border-[#D7DEE3]">
                            <tr>
                               
                                <th className="px-6 py-3 hidden md:table-cell">STATUS</th>
                                <th className="px-6 py-3 whitespace-nowrap overflow-x-auto">PRODUCT LINE</th>
                                <th className="px-6 py-3">POLICY NO.</th>
                                <th className="px-6 py-3">CLAIM REFERENCE ID</th>
                                 <th className="px-6 py-3 whitespace-nowrap overflow-x-auto">DATE SUBMITTED</th>
                                  <th className="px-6 py-3 md:hidden">STATUS</th>
                                <th className="px-6 py-3 text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
    {referrals.length > 0 ? (
        referrals.map((item, index) => (
            <tr
                key={index}
                className={`text- left hover:bg-gray-50 ${index % 2 === 0 ? "bg-[#F5FAFA]" : "bg-white"}`}
            >
               <td className="px-6 py-4 hidden md:table-cell">
                <span className="text-[#C4A451] font-medium md:text-[13px] text-base rounded-lg bg-[#FCEFDA] px-2 py-1 text-center inline-block">
                    {item.status || "-"}
                </span>
                </td>
                <td className="md:px-6 py-4 pl-6 text-[#2D2727] font-medium md:text-sm text-base">
                    {item.product_line || "-"}
                </td>
                <td className="md:px-6 py-4 pl-6 text-[#2D2727] font-medium md:text-sm text-base whitespace-nowrap overflow-x-auto">
                    {item.policy_no || "-"}
                </td>
               <td className="md:px-6 py-4 pl-6 text-[#2D2727] font-medium md:text-sm text-base whitespace-nowrap overflow-x-auto">
                    {item.claim_reference_id || "-"}
                </td>
                <td className="px-6 py-4 text-[#2D2727] font-medium md:text-sm text-base">
                    {item.created_at || "-"}
                </td>
                <td className="px-6 py-4 md:hidden">
              <span className="flex items-center gap-2 text-[#C4A451] font-medium text-base text-center ">
                <span className="w-2 h-2 rounded-full bg-[#C4A451]"></span>
                {item.status || "-"}
                </span>
                </td>
                 <td className="px-6 py-4 text-[#2D2727] font-medium md:text-sm text-base text-center">
                <div className="flex justify-center space-x-3">
                    <button
                        onClick={() => handleShowClaim(item.id)}
                        title="Show Motor Claim Details"
                    >
                        <DocumentMagnifyingGlassIcon className="w-5 h-5 stroke-[#217B7E] cursor-pointer" />
                    </button>
                </div>

                                        </td>
            </tr>
        ))
    ) : (
        <tr>
            <td colSpan="6" className="text-center py-4">
                No records found.
            </td>
        </tr>
    )}
</tbody>

                    </table>
                </div>

                {/* Pagination */}
                <div className="flex justify-center items-center gap-4 py-4">
                    <button
                        onClick={() =>
                            setCurrentPage((prev) => Math.max(1, prev - 1))
                        }
                        disabled={currentPage === 1}
                        className="disabled:opacity-50"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            fill="currentColor"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill="#008080"
                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"
                            />
                        </svg>
                    </button>
                    <p className="text-sm text-gray-700">
                        {currentPage} of {lastPage}
                    </p>
                    <button
                        onClick={() =>
                            setCurrentPage((prev) =>
                                Math.min(lastPage, prev + 1)
                            )
                        }
                        disabled={currentPage === lastPage}
                        className="disabled:opacity-50"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20"
                            height="20"
                            fill="currentColor"
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
        </div>
        
    );
};

export default MyPolicy;
