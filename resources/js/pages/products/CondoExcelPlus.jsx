import { useEffect, useState } from "react";
import cepCover from "../../assets/images/cep-cover.png";
import Steps from "../../components/CondoExcelPlus/Steps";
import CondominiumInfo from "./condo-excel-plus-page/CondominiumInfo";
import OptionalBenefits from "./condo-excel-plus-page/OptionalBenefits";
import PersonalData from "./condo-excel-plus-page/PersonalData";
import Confirmation from "./condo-excel-plus-page/Confirmation";
import QuotationSubmitted from "./condo-excel-plus-page/QuotationSubmitted";
import Guidelines from "./condo-excel-plus-page/Guidelines";
import logo from "../../assets/images/logo.png";
import DropdownSingle from "../../components/CondoExcelPlus/DropdownSingle";

const citizenshipList = [
  { id: 1, name: "Filipino" },
  {
    id: 2,
    name: "Foreign Permanent Resident in the Philippines with Alien Certificate of Registration",
  },
];
export default function CondoExcelPlus() {
    const [step, setStep] = useState(1);
    const [formData, setFormData] = useState({
         region: "",
        province: "",
        city: "",
        barangay: "",
        street: "",
        zip: "",
        building: { id: 1, name: "Select Building Type", default: true },
        
        // --- Condo Info fields ---
        unitType: { id: 1, name: "Select Unit Type", default: true },
        unitNumber: "",
        front: "",
        left: "",
        right: "",
        rear: "",
        addSpecs: "",
        roof: { id: 1, name: "Select Roof Type", default: true },
        wall: { id: 1, name: "Select Wall Type", default: true },
        storey: "",
        hasMortgage: "",
        mortgagee: { id: 1, name: "Select Mortgagee Type", default: true },
        bank: "",
        branch: "",
        unitFiles: [],
        selected: false,
        coveredAmount: "",
        declaredValue: "",
        // Step 2 fields
        addPerils: "",
        perilsAmount: "",
        addBenefits: "",
        withExtensionCover: "",
        hasAgent: "No",
        agentName: "",
        optionalBenefits: [],
        extensionCovers: [],
         personal_data: {
            first_name: "",
            last_name: "",
            suffix: "",
            mobile: "",
            email: "",
            birth_date: "",
            place_of_birth: "",
            country_of_birth: { id: 1, name: "Philippines" },
           citizenship: { id: 1, name: "Filipino" },
            id_type: "",
            id_number: "",
            id_image: null,
            preview_id_image: null,
            emergency_full_name: "",
            emergencyMobile: "",
            emergency_relationship: "",
        },
        hasIncurredLosses: "",
        declaredIncurredLosses: "",
        descriptionLosses: "",

    });
    const [provinces, setProvinces] = useState([]);
    const [regions, setRegions] = useState([]);
    const [provincesAddress, setProvincesAddress] = useState([]);
    const [cities, setCities] = useState([]);
    const [barangays, setBarangays] = useState([]);
    const [citizenshipDefault] = useState([formData.personal_data.citizenship]);

     const [showModal, setShowModal] = useState(true);
     const [isCertify, setIsCertify] = useState(false);
     const [isProvide, setIsProvide] = useState(false);
     const [OpenOnePropertyLimit, setOpenOnePropertyLimit] = useState(false);

    const [scrolled, setScrolled] = useState(false);

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

    // ✅ Step Rendering Logic
    const renderStep = () => {
        switch (step) {
            case 1:
                return (
                    <CondominiumInfo
                            formData={formData}
                            setFormData={setFormData}
                            regions={regions}
                            provinces={provinces}
                            provincesAddress={provincesAddress}
                            cities={cities}
                            barangays={barangays}
                             handleRegionChange={handleRegionChange}
                             handleProvinceChange={handleProvinceChange}
                            handleCityChange={handleCityChange}
                            nextStep={nextStep}
                            />
                );
            case 2:
                return (
                    <OptionalBenefits
                                formData={formData}
                                setFormData={setFormData}
                                nextStep={nextStep}
                                prevStep={prevStep}
                                />
                );
             case 3:
                return (
                    <PersonalData
                    formData={formData}
                    setFormData={setFormData}
                    nextStep={nextStep}
                    prevStep={prevStep}
                    />
                );
                case 4:
                return (
                    <Confirmation
                    formData={formData}
                    setFormData={setFormData}
                    nextStep={nextStep}
                    prevStep={prevStep}
                                />
                );
                case 5:
                return (
                    <QuotationSubmitted
                    setFormData={setFormData}
                    nextStep={nextStep}
                    prevStep={prevStep}
                              />  
                );
                case 6:
                return (
                    <Guidelines
                                />  
                );
            default:
                return <div>Step not found</div>;
        }
    };

            const handleConfirm = () => {
            setShowModal(false);               
            setOpenOnePropertyLimit(true);     
            };

            const handleCloseModal = () => {
                setOpenOnePropertyLimit(false);    
            };

            useEffect(() => {
                const handleScroll = () => {
                    const scrollThreshold = 200;
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
                 const handleSelectChange = (value) => {
                    setCitizenshipValue(value);
                    setFormData((prev) => ({
                    ...prev,
                    personal_data: {
                        ...prev.personal_data,
                        citizenship: value, 
                    },
                    }));
                };

            const handleRegionChange = async (region) => {
            setFormData((prev) => ({
                ...prev,
                personal_data: { ...prev.personal_data, region, province: "", city: "", barangay: "" },
            }));
            setProvincesAddress([]);
            setCities([]);
            setBarangays([]);

            if (region) {
                await fetchProvinces(region);
            }
            };

            const handleProvinceChange = async (province) => {
        setFormData((prev) => ({
            ...prev,
            personal_data: { ...prev.personal_data, province, city: "", barangay: "" },
        }));

        setCities([]);
        setBarangays([]);

        if (province) {
            const res = await axios.get("/api/cities", {
            params: { province },
            });

            const citiesData = res.data.map((item) => ({
            ...item,
            name: item.city,
            }));

            setCities(citiesData);
        }
        };

            const handleCityChange = async (city) => {
        setFormData((prev) => ({
            ...prev,
            personal_data: { ...prev.personal_data, city, barangay: "" },
        }));

        setBarangays([]);

        if (city) {
            const res = await axios.get("/api/barangays", {
            params: { city },
            });

            const barangaysData = res.data.map((item) => ({
            ...item,
            name: item.barangay,
            }));

            setBarangays(barangaysData);
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

        const fetchProvinces = async (region) => {
           // console.log("Fetching provinces for region:", region);
        const res = await axios.get("/api/provinces", { params: { region } });
        //console.log("Received provinces:", res.data);

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
        return (
                            <div
                            className={`flex flex-col w-full min-h-screen ${
                            step === 5 || step === 6 ? "bg-white" : "bg-[#F7FCFF]"
                            }`}
                        >
                           <div className="w-full relative hidden md:block">
      <img
        src={cepCover}
        className="w-full h-[200px] bg-cover bg-no-repeat bg-center"
        alt="Condo Excel Plus Cover"
      />

      <div className="absolute top-20 text-center w-full h-full">
        <div className="flex items-center justify-center gap-4 text-white text-center text-sm">
          <a href="https://www.cocogen.com/get-quote" className="hover:underline">
            Get a Quote
          </a>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            className="bi bi-chevron-right"
            viewBox="0 0 16 16"
          >
            <path
              fillRule="evenodd"
              d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"
            />
          </svg>
          <span>Condo Excel Plus</span>
        </div>
        <p className="font-medium text-[40px] text-white">Condo Excel Plus</p>
      </div>
                            </div>

                            {(step === 5 || step === 6) && (
                            <div className="block md:hidden w-full bg-white">
                                <img
                                src={cepCover}
                                className="w-full h-auto object-contain bg-white"
                                alt="Condo Excel Plus Cover"
                                />
                            </div>
                            )}

                            <div
                            className={`sticky ${
                                scrolled ? "top-[60px]" : "top-[50px]"
                            } md:top-12 lg:top-24 flex justify-center items-center ml-1 w-full py-6 md:py-8 z-50 rounded-bl-lg rounded-br-lg md:rounded-none ${
                                step === 5 || step === 6
                                ? "bg-white" 
                                : scrolled
                                ? "custom-gradient"
                                : "md:bg-[linear-gradient(#F7FCFF)]"
                            }`}
                            >
                            {step < 5 && <Steps step={step} scrolled={scrolled} />}
                            </div>

                            {renderStep()}
                           
                            <div
                                className={`fixed z-50 overflow-hidden top-0 w-full left-0 h-full ${
                                    !showModal && "hidden"
                                }`}
                                id="modal"
                            >
                                <div className="flex items-center justify-center min-h-screen pt-4 px-4 md:pb-20 text-center sm:p-0">
                                    <div className="fixed inset-0 transition-opacity">
                                        <div className="absolute inset-0 bg-gray-900 opacity-25" />
                                    </div>
                                    <span className="hidden sm:inline-block sm:align-middle sm:h-screen">
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
                                                className="md:w-[350px] w-[197px] h-auto"
                                            />
                                        </div>
                                         <div class="bg-white flex flex-col items-center justify-between px-2 md:px-10 gap-7 md:gap-8 my-5">
                                            <p className="font-medium text-base leading-6 text-black text-center">
                                                Condo Excel Plus only quotes <span className="md:hidden inline"><br/></span> clients who own the unit.
                                                <span className="md:inline hidden"><br/></span> Before you proceed, please provide and <span className="md:hidden inline"><br/></span>confirm the following.
                                            </p>
                                            <div className="flex w-full md:px-4">
                                                <label className="flex w-full items-center justify-center gap-4">
                                                    <div className="flex flex-col w-full">
                                                        <span className="after:content-['*'] after:ml-0.5 after:text-red-500 block md:text-[10px] text-xs font-normal text-[#848A90]">
                                                            Citizenship
                                                        </span>
                                                        <DropdownSingle
  data={citizenshipList}
  defaultValue={citizenshipDefault}   // ✅ use value, not defaultValue
  handleDropdownChange={(selectedName) => {
    const selectedObj = citizenshipList.find((item) => item.name === selectedName);
    if (selectedObj) {
      setFormData((prev) => ({
        ...prev,
        personal_data: {
          ...prev.personal_data,
          citizenship: selectedObj,
        },
      }));
    }
  }}
  hideSearch={true}
/>


                                                    </div>
                                                </label>
                                            </div>
                                            <div className="flex items-left justify-left w-full gap-5">
                                                <input
                                                    onChange={(e) =>
                                                        setIsCertify(e.target.checked)
                                                    }
                                                    type="checkbox"
                                                    className="appearance-none checked:!bg-[#E4509A] rounded w-5 h-5 border-[#939393] p-0 focus:ring-0 shadow-none"
                                                />
                                                <p className="md:text-sm text-xs md:font-medium font-normal md:leading-6 text-[#2D2727]">
                                                    I hereby certify that I am the owner of the condominium unit.
                                                </p>
                                            </div>
                                              <div className="flex items-left justify-left w-full gap-5">
                                                <input
                                                    onChange={(e) =>
                                                        setIsProvide(e.target.checked)
                                                    }
                                                    type="checkbox"
                                                    className="appearance-none checked:!bg-[#E4509A] rounded w-5 h-5 border-[#939393] p-0 focus:ring-0 shadow-none"
                                                />
                                                <p className="md:text-sm text-xs md:font-medium font-normal md:leading-6 text-[#2D2727]">
                                                    I hereby certify the information I will be providing in this quotation is true and accurate to the best of my knowledge.
                                                </p>
                                            </div>
                                            <div className="flex flex-col-reverse md:flex-row items-center justify-center gap-4 w-full">
                                            <a
                                                className="text-[#008080] font-medium text-xs leading-5 py-3 px-6 rounded w-full md:w-auto flex gap-2 group hover:border-[#008080] hover:border items-center justify-center"
                                                    onClick={() => setShowModal(false)} href="https://www.cocogen.com/get-quote"
                                                >
                                                    <span>Cancel</span>
                                                </a>
                                                <button
                                                    disabled={!isCertify || !isProvide || !formData.personal_data.citizenship ||
                                                    !formData.personal_data.citizenship.name}
                                                    type="button"
                                                    className="bg-[#008080] text-white font-medium text-xs leading-5 py-3 px-6 rounded w-full md:w-auto disabled:opacity-40 flex gap-2 group items-center justify-center "
                                                    onClick={() => {
                                                    setShowModal(false);          
                                                    setOpenOnePropertyLimit(true);
                                                }}
                                                >
                                                    <span>Confirm</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    {OpenOnePropertyLimit && (
                   <div className="fixed inset-0 z-50 w-full p-4 overflow-x-hidden max-h-full bg-black bg-opacity-40 
                flex items-start md:items-center justify-center">
                        <div className="relative w-full max-w-xl max-h-full mt-40 md:mt-0">
                            <div className="relative bg-white rounded-md shadow-md md:m-0 m-4 p-5 md:p-7">
                            <div className="flex flex-col md:flex-row md:gap-6 gap-4 mb-4 text-center md:text-left md:mt-0 mt-4">
                            <div className="flex justify-center md:justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 75 75" fill="none"  className=" flex-shrink-0 md:w-[75px] md:h-[75px] w-[50px] h-[50px]">
                                <path d="M37.5 7.03125C31.4739 7.03125 25.583 8.81821 20.5725 12.1662C15.5619 15.5141 11.6567 20.2727 9.35056 25.8401C7.04445 31.4075 6.44107 37.5338 7.61671 43.4442C8.79236 49.3545 11.6942 54.7835 15.9554 59.0447C20.2165 63.3058 25.6455 66.2077 31.5559 67.3833C37.4662 68.5589 43.5925 67.9556 49.1599 65.6495C54.7273 63.3433 59.4859 59.4381 62.8339 54.4275C66.1818 49.417 67.9688 43.5261 67.9688 37.5C67.9602 29.4218 64.7474 21.6769 59.0353 15.9648C53.3231 10.2526 45.5782 7.03978 37.5 7.03125ZM37.5 63.2812C32.401 63.2812 27.4164 61.7692 23.1767 58.9363C18.937 56.1034 15.6326 52.077 13.6812 47.3661C11.7299 42.6552 11.2194 37.4714 12.2141 32.4703C13.2089 27.4693 15.6643 22.8755 19.2699 19.2699C22.8755 15.6643 27.4693 13.2089 32.4703 12.2141C37.4714 11.2194 42.6552 11.7299 47.3661 13.6812C52.077 15.6326 56.1035 18.937 58.9363 23.1767C61.7692 27.4164 63.2813 32.4009 63.2813 37.5C63.2735 44.3352 60.5548 50.8883 55.7215 55.7215C50.8883 60.5548 44.3352 63.2735 37.5 63.2812ZM35.1563 39.8438V23.4375C35.1563 22.8159 35.4032 22.2198 35.8427 21.7802C36.2823 21.3407 36.8784 21.0938 37.5 21.0938C38.1216 21.0938 38.7178 21.3407 39.1573 21.7802C39.5968 22.2198 39.8438 22.8159 39.8438 23.4375V39.8438C39.8438 40.4654 39.5968 41.0615 39.1573 41.501C38.7178 41.9406 38.1216 42.1875 37.5 42.1875C36.8784 42.1875 36.2823 41.9406 35.8427 41.501C35.4032 41.0615 35.1563 40.4654 35.1563 39.8438ZM41.0156 50.3906C41.0156 51.0859 40.8094 51.7657 40.4231 52.3438C40.0368 52.9219 39.4878 53.3725 38.8454 53.6386C38.203 53.9047 37.4961 53.9743 36.8141 53.8387C36.1322 53.703 35.5058 53.3682 35.0141 52.8765C34.5224 52.3849 34.1876 51.7585 34.0519 51.0765C33.9163 50.3945 33.9859 49.6877 34.252 49.0453C34.5181 48.4029 34.9687 47.8538 35.5468 47.4675C36.125 47.0812 36.8047 46.875 37.5 46.875C38.4324 46.875 39.3266 47.2454 39.9859 47.9047C40.6452 48.564 41.0156 49.4582 41.0156 50.3906Z" fill="#217B7E"/>
                                </svg>
                            </div>
                            <div className="flex flex-col">
                                <p className="text-lg md:text-[27px] font-bold text-[#2D2727] mb-4">
                                One Property Limit
                                </p>
                                <p className="md:text-base text-sm md:font-medium font-normal text-[#3B3939] mb-8">
                                Please be advised that this insurance <span className="inline md:hidden"><br/></span>policy covers only one (1) unit or property.<span className="inline md:hidden"><br/></span>  For 
                                multiple units of property, a separate <span className="inline md:hidden"><br/> request</span> must be submitted for each.
                                </p>

                                <div className="flex flex-col-reverse md:flex-row gap-4 justify-center items-center">
                                <a
                                    href="https://www.cocogen.com/get-quote"
                                    className="w-[270px] md:w-1/2 text-[#008080] hover:border-[#008080] hover:border py-3 rounded md:font-medium md:text-base text-xs font-normal hover:bg-[#fff] transition text-center"
                                >
                                    Cancel Transaction
                                </a>
                                <button
                                    onClick={handleCloseModal}
                                    className="w-[270px] md:w-1/2 bg-[#008080] text-white py-3 rounded md:font-medium md:text-base text-xs font-normal hover:bg-[#008080] transition"
                                >
                                    I agree
                                </button>
                                </div>
                            </div>
                            </div>

                        </div>
                        </div>
                    </div>
                    )}


                </div>
  )
}

