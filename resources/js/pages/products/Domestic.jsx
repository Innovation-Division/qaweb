import { useEffect, useState } from "react";
import dtpCover from "../../assets/images/dtp-cover.png";
import Steps from "../../components/Domestic/Steps";
import FirstPage from "./domestic-page/FirstPage";
import SecondPage from "./domestic-page/SecondPage";
import ThirdPage from "./domestic-page/ThirdPage";
import LastPage from "./domestic-page/LastPage";
import FirstPageTwo from "./domestic-page/FirstPageTwo";
import Plan from "./domestic-page/Plan";
import logo from "../../assets/images/logo.png";
import DropdownSingle from "../../components/DropdownSingle";
import axios from "axios";
import { useSearchParams } from "react-router-dom";

const citizenship = [
    { id: 2, name: "Filipino Citizenship" },
    {
        id: 3,
        name: "Foreign Permanent Resident in the Philippines with Alien Certificate of Registration",
    },
];

export default function Domestic() {
    const [searchParams, setSearchParams] = useSearchParams();
    const [step, setStep] = useState(1);
    const [formData, setFormData] = useState({
        request_info: {},
        quotation: {},
        personal_data: {
            beneficiaries: [
                {
                    id: 1,
                    fullName: "",
                    relationship: "",
                    mobile: "",
                    mobileError: "",
                    fullNameError: "",
                    relationshipError: "",
                    setEmergencyContact: false,
                },
            ],
        },
    });
    const [provinces, setProvinces] = useState([]);
    const [showModal, setShowModal] = useState(true);
    const [isCertify, setIsCertify] = useState(false);
    const [citizenshipValue, setCitizenshipValue] = useState("");
    const [plan, setPlan] = useState("");
    const [planPremiums, setPlanPremiums] = useState([]);
    const [promoData, setPromoData] = useState({});
    const [regions, setRegions] = useState([]);
    const [provincesAddress, setProvincesAddress] = useState(
        formData.personal_data.provinces || []
    );
    const [cities, setCities] = useState(formData.personal_data.cities || []);
    const [barangays, setBarangays] = useState(
        formData.personal_data.barangays || []
    );

    const nextStep = () => {
        setStep(step + 1);
        window.scrollTo(0, 0);
    };

    const prevStep = () => {
        setStep(step - 1);
        window.scrollTo(0, 0);
    };

    const handlePlanPage = () => {
        setStep(6);
        window.scrollTo(0, 0);
    };

    const handleBacktoFirstPageTwo = () => {
        setStep(2);
        window.scrollTo(0, 0);
    };

    const handleContinuetoSecondPage = () => {
        setStep(3);
        window.scrollTo(0, 0);
    };

    const handleSelectChange = (value) => {
        setCitizenshipValue(value);
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                citizenship: value,
            },
        });
    };

    const renderStep = () => {
        switch (step) {
            case 1:
                return (
                    <FirstPage
                        formData={formData}
                        setFormData={setFormData}
                        nextStep={nextStep}
                        provinces={provinces}
                        promoData={promoData}
                        setPromoData={setPromoData}
                    />
                );
            case 2:
                return (
                    <FirstPageTwo
                        formData={formData}
                        setFormData={setFormData}
                        prevStep={prevStep}
                        nextStep={nextStep}
                        handlePlanPage={handlePlanPage}
                        plan={plan}
                        setPlan={setPlan}
                        promoData={promoData}
                        setPromoData={setPromoData}
                        planPremiums={planPremiums}
                        setPlanPremiums={setPlanPremiums}
                    />
                );
            case 3:
                return (
                    <SecondPage
                        formData={formData}
                        setFormData={setFormData}
                        promoData={promoData}
                        prevStep={prevStep}
                        nextStep={nextStep}
                    />
                );
            case 4:
                return (
                    <ThirdPage
                        formData={formData}
                        setFormData={setFormData}
                        prevStep={prevStep}
                        nextStep={nextStep}
                        regions={regions}
                        provinces={provincesAddress}
                        cities={cities}
                        barangays={barangays}
                        region={formData.personal_data.region || ""}
                        province={formData.personal_data.province || ""}
                        city={formData.personal_data.city || ""}
                        barangay={formData.personal_data.barangay || ""}
                        firstName={formData.personal_data.first_name || ""}
                        lastName={formData.personal_data.last_name || ""}
                        suffix={formData.personal_data.suffix || ""}
                        mobile={formData.personal_data.mobile || ""}
                        handlePersonalMobileChange={handlePersonalMobileChange}
                        email={formData.personal_data.email || ""}
                        houseNo={formData.personal_data.house_no || ""}
                        street={formData.personal_data.street || ""}
                        zip={formData.personal_data.zip || ""}
                        emergencyFullName={
                            formData.personal_data.emergency_full_name || ""
                        }
                        emergencyRelationship={
                            formData.personal_data.emergency_relationship || ""
                        }
                        handleSelectEmergencyRelationship={
                            handleSelectEmergencyRelationship
                        }
                        emergencyMobile={
                            formData.personal_data.emergency_mobile || ""
                        }
                        handleEmergencyMobileChange={
                            handleEmergencyMobileChange
                        }
                        isHaveAgent={formData.personal_data.is_have_agent || ""}
                        agentName={formData.personal_data.agent_name || ""}
                        idType={formData.personal_data.id_type || ""}
                        idNumber={formData.personal_data.id_number || ""}
                        idImage={formData.personal_data.id_image || ""}
                        previewIdImage={
                            formData.personal_data.preview_id_image || ""
                        }
                        beneficiaries={formData.personal_data.beneficiaries}
                        birthDate={formData.personal_data.birth_date || null}
                    />
                );
            case 5:
                return (
                    <LastPage
                        formData={formData}
                        setFormData={setFormData}
                        promoData={promoData}
                        prevStep={prevStep}
                        onSave={handleSubmit}
                    />
                );
            case 6:
                return (
                    <Plan
                        formData={formData}
                        setFormData={setFormData}
                        handleBacktoFirstPageTwo={handleBacktoFirstPageTwo}
                        plan={plan}
                        setPlan={setPlan}
                        handleContinuetoSecondPage={handleContinuetoSecondPage}
                        planPremiums={planPremiums}
                    />
                );
            default:
                return <div>Something went wrong!</div>;
        }
    };

    const fetchProvince = async () => {
        const res = await axios.get("/api/province/get");

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["province"];
            delete _item["province"];
            return _item;
        });

        setProvinces(modifiedData);
    };

    const handlePersonalMobileChange = (value) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                mobile: value,
            },
        });
    };

    const handleSelectEmergencyRelationship = (value) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                emergency_relationship: value,
            },
        });
    };

    const handleEmergencyMobileChange = (value) => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                emergency_mobile: value,
            },
        });
    };

    const fetchRegions = async () => {
        const res = await axios.get("/api/regions");

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["region"];
            delete _item["region"];
            return _item;
        });

        setRegions(modifiedData);
    };

    const fetchProvinces = async () => {
        const res = await axios.get("/api/provinces", {
            params: {
                region: formData.personal_data.region,
            },
        });

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["province"];
            _item["default"] = false;
            delete _item["province"];
            return _item;
        });

        setProvincesAddress(modifiedData);
    };

    const fetchCities = async () => {
        const res = await axios.get("/api/cities", {
            params: {
                province: formData.personal_data.province,
            },
        });

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["city"];
            delete _item["city"];
            return _item;
        });

        setCities(modifiedData);
    };

    const fetchBarangays = async () => {
        const res = await axios.get("/api/barangays", {
            params: {
                city: formData.personal_data.city,
            },
        });

        const modifiedData = res.data.map((item) => {
            let _item = Object.assign(item, {});
            _item["name"] = item["barangay"];
            delete _item["barangay"];
            return _item;
        });

        setBarangays(modifiedData);
    };

    useEffect(() => {
        fetchProvince();
        fetchRegions();
    }, []);

    useEffect(() => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                province: "",
                city: "",
                barangay: "",
            },
        });

        setProvincesAddress([]);
        setCities([]);
        setBarangays([]);
        fetchProvinces();
    }, [formData.personal_data.region]);

    useEffect(() => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                city: "",
                barangay: "",
            },
        });

        setCities([]);
        setBarangays([]);
        fetchCities();
    }, [formData.personal_data.province]);

    useEffect(() => {
        setFormData({
            ...formData,
            personal_data: {
                ...formData.personal_data,
                barangay: "",
            },
        });

        setBarangays([]);
        fetchBarangays();
    }, [formData.personal_data.city]);

    const [scrolled, setScrolled] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            const scrollThreshold = 50;
            if (window.scrollY > scrollThreshold) {
                setScrolled(true);
            } else {
                setScrolled(false);
            }
        };

        window.addEventListener("scroll", handleScroll);
        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, []);

    const handleSubmit = async () => {
        const submitFormData = new FormData();

        for (const key in formData.request_info) {
            const value = formData.request_info[key];

            if (key === "destination" && Array.isArray(value)) {
                value.forEach((item, index) => {
                    for (const prop in item) {
                        submitFormData.append(
                            `request_info[destination][${index}][${prop}]`,
                            item[prop]
                        );
                    }
                });
            } else {
                submitFormData.append(`request_info[${key}]`, value);
            }
        }

        for (const key in formData.quotation) {
            if (
                key === "package" &&
                typeof formData.quotation[key] === "object" &&
                formData.quotation[key] !== null
            ) {
                for (const subKey in formData.quotation[key]) {
                    submitFormData.append(
                        `quotation[${key}][${subKey}]`,
                        formData.quotation[key][subKey]
                    );
                }
            } else {
                const value =
                    typeof formData.quotation[key] === "boolean"
                        ? formData.quotation[key]
                            ? "1"
                            : "0"
                        : formData.quotation[key];
                submitFormData.append(`quotation[${key}]`, value);
            }
        }

        for (const key in formData.personal_data) {
            const value = formData.personal_data[key];

            if (key === "beneficiaries" && Array.isArray(value)) {
                value.forEach((beneficiary, index) => {
                    for (const prop in beneficiary) {
                        submitFormData.append(
                            `personal_data[beneficiaries][${index}][${prop}]`,
                            beneficiary[prop]
                        );
                    }
                });
            } else if (key === "id_image" && value instanceof File) {
                submitFormData.append(`personal_data[${key}]`, value);
            } else if (key === "preview_id_image") {
                continue;
            } else {
                submitFormData.append(`personal_data[${key}]`, value);
            }
        }

        const res = await axios
            .post("/api/save-domestic", submitFormData)
            .then((response) => {
                window.location.href = response.data;
            });
    };

    useEffect(() => {
        if (searchParams.size > 0) {
            setFormData({
                ...formData,
                personal_data: {
                    ...formData.personal_data,
                    utm_source: searchParams.get("utm_source"),
                    utm_medium: searchParams.get("utm_medium"),
                },
            });
        }
    }, []);

    return (
        <div className="flex flex-col w-full min-h-screen">
            <div className="w-full relative hidden md:block">
                <img
                    src={dtpCover}
                    className="w-full h-[200px] bg-cover bg-no-repeat bg-center"
                    alt=""
                />
                <div className="absolute top-20 text-center w-full h-full">
                    <div className="flex items-center justify-center gap-4 text-white text-center text-sm">
                        <a href="/get-quote" className="hover:underline">
                            Get a Quote
                        </a>
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
                        <span>Domestic Travel Plus</span>
                    </div>
                    <p className="font-medium text-[40px] text-white">
                        Domestic Travel Plus
                    </p>
                </div>
            </div>
            <div
                className={`sticky top-[65px] md:top-12 lg:top-24 flex justify-center items-center w-full py-6 md:py-8 z-50 rounded-bl-lg rounded-br-lg md:rounded-none ${
                    scrolled
                        ? "custom-gradient"
                        : "md:bg-[linear-gradient(#ffffff)]"
                }`}
            >
                <Steps step={step} scrolled={scrolled} />
            </div>
            {renderStep()}
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
                                Travel Excel Plus only quotes clients who are 18
                                to 60 years old. Before we proceed, please
                                provide and confirm the following
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
                                    I hereby certify that this trip will be for
                                    leisure purposes only, and I am over 18
                                    years of age but not more than 60 years of
                                    age.
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
        </div>
    );
}
