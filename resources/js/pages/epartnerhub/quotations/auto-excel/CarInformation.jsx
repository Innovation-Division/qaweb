import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import DatePicker from "../../../../components/DatePicker";
import DropdownSingle from "../../../../components/DropdownSingle";

const mortgagee = [
    { id: 1, name: "Yes" },
    { id: 2, name: "No" },
];

const bodyTypes = [
    { id: 0, name: "Select Body Type", default: true },
    { id: 1, name: "Convertible" },
    { id: 2, name: "Coupe" },
    { id: 3, name: "Hatchback" },
    { id: 4, name: "MPV or Minivan" },
    { id: 5, name: "Pick-up" },
    { id: 6, name: "Sedan" },
    { id: 7, name: "Sport Utility Vehicle (SUV)" },
    { id: 8, name: "Station Wagon" },
    { id: 9, name: "Van" },
];

const CarInformation = ({ formData, dispatch, errors }) => {
    const navigate = useNavigate();
    const [brands, setBrands] = useState([
        { id: 0, name: "Select Brand", default: true },
        { id: 1, name: "Brand A" },
        { id: 2, name: "Brand B" },
        { id: 3, name: "Brand C" },
        { id: 4, name: "Brand D" },
    ]);
    const [models, setModels] = useState([
        { id: 0, name: "Select Model", default: true },
    ]);

    const [years, setYears] = useState([
        { id: 0, name: "Select Year", default: true },
    ]);

    const [accessories, setAccessories] = useState([
        { id: 0, name: "Select Accessory", default: true },
    ]);

    const [bipds, setBipds] = useState([
        { id: 0, name: "Select Bodily Injury", default: true },
    ]);

    const currencyFormat = (num) => {
        num = parseFloat(num);
        return "₱" + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
    };

    const getAccessories = async () => {
        const res = await axios.get("/api/get-accessories");

        setAccessories(res.data);
    };

    const getBIPDs = async () => {
        const res = await axios.get("/api/get-bipds");

        const modifiedData = res.data.map((item, index) => {
            let _item = Object.assign(item, {});
            _item["id"] = index + 1;
            _item["name"] = currencyFormat(item["amount"]);
            _item["default"] = false;
            delete _item["amount"];
            return _item;
        });

        setBipds(modifiedData);
    };

    const getBrands = async () => {
        const res = await axios.get("/api/get-brands");

        const modifiedData = res.data.map((item, index) => {
            let _item = Object.assign(item, {});
            _item["id"] = index + 1;
            _item["name"] = item["brand"];
            _item["default"] = false;
            delete _item["brand"];
            return _item;
        });

        setBrands(modifiedData);
    };

    const getModels = async () => {
        const res = await axios.get("/api/get-models", {
            params: {
                brand: formData.brand,
            },
        });

        const modifiedData = res.data.map((item, index) => {
            let _item = Object.assign(item, {});
            _item["id"] = index + 1;
            _item["name"] = item["model"];
            _item["default"] = false;
            delete _item["model"];
            return _item;
        });

        setModels(modifiedData);
    };

    const getYears = async () => {
        const res = await axios.get("/api/get-years", {
            params: {
                brand: formData.brand,
                model: formData.model,
            },
        });

        const modifiedData = res.data.map((item, index) => {
            let _item = Object.assign(item, {});
            _item["id"] = index + 1;
            _item["name"] = item["year"];
            _item["default"] = false;
            delete _item["year"];
            return _item;
        });

        setYears(modifiedData);
    };

    useEffect(() => {
        getAccessories();
        getBIPDs();
        getBrands();
    }, []);

    useEffect(() => {
        if (formData.brand !== "") {
            setModels([{ id: 0, name: "Select Model", default: true }]);
            setYears([{ id: 0, name: "Select Year", default: true }]);
            dispatch({ type: "UPDATE_FIELD", field: "model", value: "" });
            dispatch({ type: "UPDATE_FIELD", field: "year", value: "" });
            getModels();
        }
    }, [formData.brand]);

    useEffect(() => {
        if (formData.model !== "") {
            setYears([{ id: 0, name: "Select Year", default: true }]);
            dispatch({ type: "UPDATE_FIELD", field: "year", value: "" });
            getYears();
        }
    }, [formData.model]);

    // const validateStep = () => {
    //     let isValid = true;
    //     if (!formData.firstName.trim()) {
    //         dispatch({
    //             type: "SET_ERROR",
    //             field: "firstName",
    //             message: "First Name is required.",
    //         });
    //         isValid = false;
    //     }
    //     if (!formData.lastName.trim()) {
    //         dispatch({
    //             type: "SET_ERROR",
    //             field: "lastName",
    //             message: "Last Name is required.",
    //         });
    //         isValid = false;
    //     }
    //     if (!formData.email.trim()) {
    //         dispatch({
    //             type: "SET_ERROR",
    //             field: "email",
    //             message: "Email is required.",
    //         });
    //         isValid = false;
    //     } else if (!/\S+@\S+\.\S+/.test(formData.email)) {
    //         dispatch({
    //             type: "SET_ERROR",
    //             field: "email",
    //             message: "Email address is invalid.",
    //         });
    //         isValid = false;
    //     }
    //     return isValid;
    // };

    const handleNext = () => {
        // if (validateStep()) {
        dispatch({ type: "NEXT_STEP" });
        // }
    };

    return (
        <div className="flex flex-col w-full max-w-4xl gap-12">
            <div className="flex flex-col w-full gap-6">
                <p className="text-[#626161] text-sm font-medium">
                    Car Details <span className="text-red-500">*</span>
                </p>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full max-w-full md:max-w-[390px] lg:max-w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Brand
                        </span>
                        <DropdownSingle
                            data={brands}
                            defaultValue={[
                                formData.brand
                                    ? brands.find(
                                          (item) => item.name === formData.brand
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Brand",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "brand",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.brand ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full max-w-full md:max-w-[390px] lg:max-w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Model
                        </span>
                        <DropdownSingle
                            data={models}
                            defaultValue={[
                                formData.model
                                    ? models.find(
                                          (item) => item.name === formData.model
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Model",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "model",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.model ? true : false}
                            isReset={formData.model === "" ? true : false}
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full max-w-full md:max-w-[390px] lg:max-w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Year
                        </span>
                        <DropdownSingle
                            data={years}
                            defaultValue={[
                                formData.year
                                    ? years.find(
                                          (item) => item.name === formData.year
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Year",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "year",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.year ? true : false}
                            isReset={formData.year === "" ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full max-w-full md:max-w-[390px] lg:max-w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Value of Car
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0`}
                            value={formData.valueOfCar}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "valueOfCar",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3`}
                        >
                            MV File Number
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0 focus:border-black focus:outline-none placeholder:text-[#848A90]`}
                            placeholder="Enter MV File Number"
                            value={formData.mvFileNumber}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "mvFileNumber",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Plate Number
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0 focus:border-black focus:outline-none placeholder:text-[#848A90]`}
                            placeholder="Enter Plate Number"
                            value={formData.plateNumber}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "plateNumber",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Engine Number
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0 focus:border-black focus:outline-none placeholder:text-[#848A90]`}
                            placeholder="Enter Engine Number"
                            value={formData.engineNumber}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "engineNumber",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Body Type
                        </span>
                        <DropdownSingle
                            data={bodyTypes}
                            defaultValue={[
                                formData.bodyType
                                    ? bodyTypes.find(
                                          (item) =>
                                              item.name === formData.bodyType
                                      )
                                    : bodyTypes[0],
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "bodyType",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.bodyType ? true : false}
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Color
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0 focus:outline-none placeholder:text-[#848A90]`}
                            placeholder="Enter Color"
                            value={formData.color}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "color",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#003333] px-3 `}
                        >
                            Chassis Number
                        </span>
                        <input
                            type="text"
                            class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0 focus:border-black focus:outline-none placeholder:text-[#848A90]`}
                            placeholder="Enter Chassis Number"
                            value={formData.chassisNumber}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "chassisNumber",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full bg-[#F5F5F5]">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Authorized Seating Capacity
                        </span>
                        <input
                            type="text"
                            class="mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0"
                            disabled
                            value={5}
                            onChange={(e) =>
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "seatingCapacity",
                                    value: e.target.value,
                                })
                            }
                        />
                    </label>
                </div>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Mortgagee
                        </span>
                        <DropdownSingle
                            data={mortgagee}
                            defaultValue={[
                                formData.mortgagee
                                    ? mortgagee.find(
                                          (item) =>
                                              item.name === formData.mortgagee
                                      )
                                    : mortgagee[0],
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "mortgagee",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.mortgagee ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                                errors.dateTo
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            } `}
                        >
                            Policy Inception Date{" "}
                            <span className="text-red-500">*</span>
                        </span>
                        <DatePicker
                            onDateSelect={(date) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "policyInceptionDate",
                                    value: date,
                                });
                            }}
                            errors={errors.policyInceptionDate}
                        />
                    </label>
                </div>
            </div>
            <div className="flex flex-col w-full">
                <p className="text-[#626161] text-sm font-medium mb-4">
                    Insurance Coverage <span className="text-red-500">*</span>
                </p>
                <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Bodily Injury
                        </span>
                        <DropdownSingle
                            data={bipds}
                            defaultValue={[
                                formData.brand
                                    ? bipds.find(
                                          (item) =>
                                              item.name ===
                                              formData.bodilyInjury
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Bodily Injury",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "bodilyInjury",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.brand ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Property Damage
                        </span>
                        <DropdownSingle
                            data={bipds}
                            defaultValue={[
                                formData.propertyDamage
                                    ? bipds.find(
                                          (item) =>
                                              item.name ===
                                              formData.propertyDamage
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Property Damage",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "propertyDamage",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.model ? true : false}
                        />
                    </label>
                </div>
            </div>

            <div className="flex flex-col w-full">
                <p className="text-[#626161] text-sm font-medium mb-4">
                    Standard Accessories <span className="text-red-500">*</span>
                </p>
                <div className="flex flex-col md:flex-row gap-8 w-full">
                    <div className="flex gap-3 bg-[#eeeeee] text-[#2D2727] rounded-full px-4 py-3 items-center justify-center md:justify-start text-sm w-full">
                        <svg
                            width="21"
                            height="20"
                            viewBox="0 0 21 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 0C8.52219 0 6.58879 0.58649 4.9443 1.6853C3.29981 2.78412 2.01809 4.3459 1.26121 6.17316C0.504333 8.00042 0.3063 10.0111 0.692152 11.9509C1.078 13.8907 2.03041 15.6725 3.42894 17.0711C4.82746 18.4696 6.60929 19.422 8.5491 19.8078C10.4889 20.1937 12.4996 19.9957 14.3268 19.2388C16.1541 18.4819 17.7159 17.2002 18.8147 15.5557C19.9135 13.9112 20.5 11.9778 20.5 10C20.4972 7.34869 19.4427 4.80678 17.568 2.93202C15.6932 1.05727 13.1513 0.00279983 10.5 0ZM14.8904 8.23654L9.50577 13.6212C9.43433 13.6927 9.34949 13.7494 9.25611 13.7881C9.16273 13.8268 9.06263 13.8468 8.96154 13.8468C8.86045 13.8468 8.76035 13.8268 8.66697 13.7881C8.57359 13.7494 8.48875 13.6927 8.41731 13.6212L6.10962 11.3135C5.96528 11.1691 5.88419 10.9734 5.88419 10.7692C5.88419 10.5651 5.96528 10.3693 6.10962 10.225C6.25396 10.0807 6.44972 9.99957 6.65385 9.99957C6.85798 9.99957 7.05374 10.0807 7.19808 10.225L8.96154 11.9894L13.8019 7.14808C13.8734 7.07661 13.9582 7.01991 14.0516 6.98123C14.145 6.94256 14.2451 6.92265 14.3462 6.92265C14.4472 6.92265 14.5473 6.94256 14.6407 6.98123C14.7341 7.01991 14.8189 7.07661 14.8904 7.14808C14.9619 7.21954 15.0185 7.30439 15.0572 7.39777C15.0959 7.49115 15.1158 7.59123 15.1158 7.69231C15.1158 7.79338 15.0959 7.89346 15.0572 7.98684C15.0185 8.08022 14.9619 8.16507 14.8904 8.23654Z"
                                fill="#505558"
                            />
                        </svg>
                        Built-in stereo
                    </div>
                    <div className="flex gap-3 bg-[#eeeeee] text-[#2D2727] rounded-full px-4 py-3 items-center justify-center md:justify-start text-sm w-full">
                        <svg
                            width="21"
                            height="20"
                            viewBox="0 0 21 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 0C8.52219 0 6.58879 0.58649 4.9443 1.6853C3.29981 2.78412 2.01809 4.3459 1.26121 6.17316C0.504333 8.00042 0.3063 10.0111 0.692152 11.9509C1.078 13.8907 2.03041 15.6725 3.42894 17.0711C4.82746 18.4696 6.60929 19.422 8.5491 19.8078C10.4889 20.1937 12.4996 19.9957 14.3268 19.2388C16.1541 18.4819 17.7159 17.2002 18.8147 15.5557C19.9135 13.9112 20.5 11.9778 20.5 10C20.4972 7.34869 19.4427 4.80678 17.568 2.93202C15.6932 1.05727 13.1513 0.00279983 10.5 0ZM14.8904 8.23654L9.50577 13.6212C9.43433 13.6927 9.34949 13.7494 9.25611 13.7881C9.16273 13.8268 9.06263 13.8468 8.96154 13.8468C8.86045 13.8468 8.76035 13.8268 8.66697 13.7881C8.57359 13.7494 8.48875 13.6927 8.41731 13.6212L6.10962 11.3135C5.96528 11.1691 5.88419 10.9734 5.88419 10.7692C5.88419 10.5651 5.96528 10.3693 6.10962 10.225C6.25396 10.0807 6.44972 9.99957 6.65385 9.99957C6.85798 9.99957 7.05374 10.0807 7.19808 10.225L8.96154 11.9894L13.8019 7.14808C13.8734 7.07661 13.9582 7.01991 14.0516 6.98123C14.145 6.94256 14.2451 6.92265 14.3462 6.92265C14.4472 6.92265 14.5473 6.94256 14.6407 6.98123C14.7341 7.01991 14.8189 7.07661 14.8904 7.14808C14.9619 7.21954 15.0185 7.30439 15.0572 7.39777C15.0959 7.49115 15.1158 7.59123 15.1158 7.69231C15.1158 7.79338 15.0959 7.89346 15.0572 7.98684C15.0185 8.08022 14.9619 8.16507 14.8904 8.23654Z"
                                fill="#505558"
                            />
                        </svg>
                        Built-in aircon
                    </div>
                    <div className="flex gap-3 bg-[#eeeeee] text-[#2D2727] rounded-full px-4 py-3 items-center justify-center md:justify-start text-sm w-full">
                        <svg
                            width="21"
                            height="20"
                            viewBox="0 0 21 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 0C8.52219 0 6.58879 0.58649 4.9443 1.6853C3.29981 2.78412 2.01809 4.3459 1.26121 6.17316C0.504333 8.00042 0.3063 10.0111 0.692152 11.9509C1.078 13.8907 2.03041 15.6725 3.42894 17.0711C4.82746 18.4696 6.60929 19.422 8.5491 19.8078C10.4889 20.1937 12.4996 19.9957 14.3268 19.2388C16.1541 18.4819 17.7159 17.2002 18.8147 15.5557C19.9135 13.9112 20.5 11.9778 20.5 10C20.4972 7.34869 19.4427 4.80678 17.568 2.93202C15.6932 1.05727 13.1513 0.00279983 10.5 0ZM14.8904 8.23654L9.50577 13.6212C9.43433 13.6927 9.34949 13.7494 9.25611 13.7881C9.16273 13.8268 9.06263 13.8468 8.96154 13.8468C8.86045 13.8468 8.76035 13.8268 8.66697 13.7881C8.57359 13.7494 8.48875 13.6927 8.41731 13.6212L6.10962 11.3135C5.96528 11.1691 5.88419 10.9734 5.88419 10.7692C5.88419 10.5651 5.96528 10.3693 6.10962 10.225C6.25396 10.0807 6.44972 9.99957 6.65385 9.99957C6.85798 9.99957 7.05374 10.0807 7.19808 10.225L8.96154 11.9894L13.8019 7.14808C13.8734 7.07661 13.9582 7.01991 14.0516 6.98123C14.145 6.94256 14.2451 6.92265 14.3462 6.92265C14.4472 6.92265 14.5473 6.94256 14.6407 6.98123C14.7341 7.01991 14.8189 7.07661 14.8904 7.14808C14.9619 7.21954 15.0185 7.30439 15.0572 7.39777C15.0959 7.49115 15.1158 7.59123 15.1158 7.69231C15.1158 7.79338 15.0959 7.89346 15.0572 7.98684C15.0185 8.08022 14.9619 8.16507 14.8904 8.23654Z"
                                fill="#505558"
                            />
                        </svg>
                        5 Magwheels
                    </div>
                    <div className="flex gap-3 bg-[#eeeeee] text-[#2D2727] rounded-full px-4 py-3 items-center justify-center md:justify-start text-sm w-full">
                        <svg
                            width="21"
                            height="20"
                            viewBox="0 0 21 20"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 0C8.52219 0 6.58879 0.58649 4.9443 1.6853C3.29981 2.78412 2.01809 4.3459 1.26121 6.17316C0.504333 8.00042 0.3063 10.0111 0.692152 11.9509C1.078 13.8907 2.03041 15.6725 3.42894 17.0711C4.82746 18.4696 6.60929 19.422 8.5491 19.8078C10.4889 20.1937 12.4996 19.9957 14.3268 19.2388C16.1541 18.4819 17.7159 17.2002 18.8147 15.5557C19.9135 13.9112 20.5 11.9778 20.5 10C20.4972 7.34869 19.4427 4.80678 17.568 2.93202C15.6932 1.05727 13.1513 0.00279983 10.5 0ZM14.8904 8.23654L9.50577 13.6212C9.43433 13.6927 9.34949 13.7494 9.25611 13.7881C9.16273 13.8268 9.06263 13.8468 8.96154 13.8468C8.86045 13.8468 8.76035 13.8268 8.66697 13.7881C8.57359 13.7494 8.48875 13.6927 8.41731 13.6212L6.10962 11.3135C5.96528 11.1691 5.88419 10.9734 5.88419 10.7692C5.88419 10.5651 5.96528 10.3693 6.10962 10.225C6.25396 10.0807 6.44972 9.99957 6.65385 9.99957C6.85798 9.99957 7.05374 10.0807 7.19808 10.225L8.96154 11.9894L13.8019 7.14808C13.8734 7.07661 13.9582 7.01991 14.0516 6.98123C14.145 6.94256 14.2451 6.92265 14.3462 6.92265C14.4472 6.92265 14.5473 6.94256 14.6407 6.98123C14.7341 7.01991 14.8189 7.07661 14.8904 7.14808C14.9619 7.21954 15.0185 7.30439 15.0572 7.39777C15.0959 7.49115 15.1158 7.59123 15.1158 7.69231C15.1158 7.79338 15.0959 7.89346 15.0572 7.98684C15.0185 8.08022 14.9619 8.16507 14.8904 8.23654Z"
                                fill="#505558"
                            />
                        </svg>
                        Built-in speaker
                    </div>
                </div>
            </div>

            <div className="flex flex-col w-full gap-5">
                <p className="text-[#626161] text-sm font-medium">
                    Non-Standard Accessories{" "}
                    <span className="text-red-500">*</span>
                </p>
                <div className="flex flex-col md:flex-row justify-between items-center gap-10">
                    <label class="flex flex-col w-full basis-3/4">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Select Accessories
                        </span>
                        <DropdownSingle
                            data={accessories}
                            defaultValue={[
                                formData.brand
                                    ? accessories.find(
                                          (item) =>
                                              item.name === formData.sample
                                      )
                                    : {
                                          id: 0,
                                          name: "Select Accessories",
                                          default: true,
                                      },
                            ]}
                            handleDropdownChange={(value) => {
                                dispatch({
                                    type: "UPDATE_FIELD",
                                    field: "sample",
                                    value,
                                });
                            }}
                            hideSearch={false}
                            error={errors.brand ? true : false}
                        />
                    </label>
                    <label class="flex flex-col w-full basis-3/4">
                        <span
                            class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] text-[#848A90] px-3 ${
                                errors.suffix
                                    ? "text-[#DD0707]"
                                    : "text-[#848A90]"
                            }`}
                        >
                            Amount
                        </span>
                        <input
                            type="text"
                            class="mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b block w-full sm:text-sm focus:ring-0"
                        />
                    </label>
                    <div className="hidden md:flex items-center gap-6 basis-1/4">
                        <button>
                            <svg
                                width="30"
                                height="31"
                                viewBox="0 0 30 31"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M27.1875 0.875H2.8125C2.16603 0.875 1.54605 1.13181 1.08893 1.58893C0.631807 2.04605 0.375 2.66603 0.375 3.3125V27.6875C0.375 28.334 0.631807 28.954 1.08893 29.4111C1.54605 29.8682 2.16603 30.125 2.8125 30.125H27.1875C27.834 30.125 28.454 29.8682 28.9111 29.4111C29.3682 28.954 29.625 28.334 29.625 27.6875V3.3125C29.625 2.66603 29.3682 2.04605 28.9111 1.58893C28.454 1.13181 27.834 0.875 27.1875 0.875ZM27.1875 27.6875H2.8125V3.3125H27.1875V27.6875ZM20.7373 11.4873L16.723 15.5L20.7373 19.5127C20.8505 19.626 20.9403 19.7604 21.0016 19.9083C21.0629 20.0563 21.0944 20.2149 21.0944 20.375C21.0944 20.5351 21.0629 20.6937 21.0016 20.8417C20.9403 20.9896 20.8505 21.124 20.7373 21.2373C20.624 21.3505 20.4896 21.4403 20.3417 21.5016C20.1937 21.5629 20.0351 21.5944 19.875 21.5944C19.7149 21.5944 19.5563 21.5629 19.4083 21.5016C19.2604 21.4403 19.126 21.3505 19.0127 21.2373L15 17.223L10.9873 21.2373C10.874 21.3505 10.7396 21.4403 10.5917 21.5016C10.4437 21.5629 10.2851 21.5944 10.125 21.5944C9.96486 21.5944 9.80629 21.5629 9.65835 21.5016C9.5104 21.4403 9.37597 21.3505 9.26273 21.2373C9.1495 21.124 9.05968 20.9896 8.99839 20.8417C8.93711 20.6937 8.90557 20.5351 8.90557 20.375C8.90557 20.2149 8.93711 20.0563 8.99839 19.9083C9.05968 19.7604 9.1495 19.626 9.26273 19.5127L13.277 15.5L9.26273 11.4873C9.03405 11.2586 8.90557 10.9484 8.90557 10.625C8.90557 10.3016 9.03405 9.99142 9.26273 9.76273C9.49142 9.53405 9.80159 9.40557 10.125 9.40557C10.4484 9.40557 10.7586 9.53405 10.9873 9.76273L15 13.777L19.0127 9.76273C19.126 9.6495 19.2604 9.55968 19.4083 9.49839C19.5563 9.43711 19.7149 9.40557 19.875 9.40557C20.0351 9.40557 20.1937 9.43711 20.3417 9.49839C20.4896 9.55968 20.624 9.6495 20.7373 9.76273C20.8505 9.87597 20.9403 10.0104 21.0016 10.1583C21.0629 10.3063 21.0944 10.4649 21.0944 10.625C21.0944 10.7851 21.0629 10.9437 21.0016 11.0917C20.9403 11.2396 20.8505 11.374 20.7373 11.4873Z"
                                    fill="#DD0707"
                                />
                            </svg>
                        </button>
                        <button>
                            <svg
                                width="30"
                                height="31"
                                viewBox="0 0 30 31"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M27.1875 0.875H2.8125C2.16603 0.875 1.54605 1.13181 1.08893 1.58893C0.631807 2.04605 0.375 2.66603 0.375 3.3125V27.6875C0.375 28.334 0.631807 28.954 1.08893 29.4111C1.54605 29.8682 2.16603 30.125 2.8125 30.125H27.1875C27.834 30.125 28.454 29.8682 28.9111 29.4111C29.3682 28.954 29.625 28.334 29.625 27.6875V3.3125C29.625 2.66603 29.3682 2.04605 28.9111 1.58893C28.454 1.13181 27.834 0.875 27.1875 0.875ZM27.1875 27.6875H2.8125V3.3125H27.1875V27.6875ZM22.3125 15.5C22.3125 15.8232 22.1841 16.1332 21.9555 16.3618C21.727 16.5903 21.417 16.7188 21.0938 16.7188H16.2188V21.5938C16.2188 21.917 16.0903 22.227 15.8618 22.4555C15.6332 22.6841 15.3232 22.8125 15 22.8125C14.6768 22.8125 14.3668 22.6841 14.1382 22.4555C13.9097 22.227 13.7812 21.917 13.7812 21.5938V16.7188H8.90625C8.58302 16.7188 8.27302 16.5903 8.04446 16.3618C7.8159 16.1332 7.6875 15.8232 7.6875 15.5C7.6875 15.1768 7.8159 14.8668 8.04446 14.6382C8.27302 14.4097 8.58302 14.2812 8.90625 14.2812H13.7812V9.40625C13.7812 9.08302 13.9097 8.77302 14.1382 8.54446C14.3668 8.3159 14.6768 8.1875 15 8.1875C15.3232 8.1875 15.6332 8.3159 15.8618 8.54446C16.0903 8.77302 16.2188 9.08302 16.2188 9.40625V14.2812H21.0938C21.417 14.2812 21.727 14.4097 21.9555 14.6382C22.1841 14.8668 22.3125 15.1768 22.3125 15.5Z"
                                    fill="#008080"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div className="flex flex-col-reverse md:flex-row w-full justify-between gap-4">
                <button
                    className="text-[#013353] border border-[#013353] rounded-md px-4 py-2 w-full"
                    onClick={() => navigate("/epartnerhub/quotations")}
                >
                    Cancel
                </button>
                <button
                    className="bg-[#013353] text-white rounded-md px-4 py-2 w-full"
                    onClick={handleNext}
                >
                    Continue
                </button>
            </div>
        </div>
    );
};

export default CarInformation;
