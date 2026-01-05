import { useEffect, useState } from "react";
import DatePicker from "../../../components/DatePicker";
import SelectDestination from "../../../components/Domestic/SelectDestination";
import { set } from "date-fns";

const FirstPage = ({
    formData,
    setFormData,
    nextStep,
    provinces,
    promoData,
    setPromoData,
}) => {
    const today = new Date();
    const [errors, setErrors] = useState({});
    const [destinationType, setDestinationType] = useState(
        formData.request_info.destination_type || ""
    );
    const [travelType, setTravelType] = useState(
        formData.request_info.travel_type || ""
    );
    const [covidCoverage, setCovidCoverage] = useState(
        formData.request_info.covid_coverage || ""
    );
    const [promoCodeType, setPromoCodeType] = useState(
        formData.request_info.promo_code_type || null
    );
    const [promoCode, setPromoCode] = useState(
        formData.request_info.promo_code || ""
    );
    const [counter, setCounter] = useState(
        formData.request_info.destination
            ? formData.request_info.destination.at(-1).id
            : 1
    );
    const [divData, setDivData] = useState(
        formData.request_info.destination || [
            { id: 1, name: "Select Destination", default: true },
        ]
    );
    const [selectedDateFrom, setSelectedDateFrom] = useState(
        formData.request_info.date_from
            ? new Date(formData.request_info.date_from)
            : null
    );
    const [selectedDateTo, setSelectedDateTo] = useState(
        formData.request_info.date_to
            ? new Date(formData.request_info.date_to)
            : null
    );
    const [dateFrom, setDateFrom] = useState(
        formData.request_info.date_from || null
    );
    const [dateTo, setDateTo] = useState(formData.request_info.date_to || null);
    const [maxDate, setMaxDate] = useState();
    const [minDate, setMinDate] = useState(
        new Date(today.getFullYear(), today.getMonth(), today.getDate() + 1)
    );
    const [isPromoValid, setIsPromoValid] = useState(
        formData.request_info.isPromoValid || null
    );
    const [resetValue, setResetValue] = useState(false);
    const [covidModal, setCovidModal] = useState(false);

    const handleDateFrom = (date) => {
        setResetValue(false);
        setSelectedDateFrom(date);
        setDateFrom(
            new Date(date).toLocaleDateString("en-PH", {
                minimumIntegerDigits: 2,
                useGrouping: false,
            })
        );
        setErrors({ ...errors, dateFrom: "" });
        setFormData({
            ...formData,
            quotation: {},
        });
    };

    const handleDateTo = (date) => {
        setResetValue(false);
        setSelectedDateTo(date);
        setDateTo(
            new Date(date).toLocaleDateString("en-PH", {
                minimumIntegerDigits: 2,
                useGrouping: false,
            })
        );
        setErrors({ ...errors, dateTo: "" });
        setFormData({
            ...formData,
            quotation: {},
        });
    };

    const handleAddDiv = (e) => {
        e.preventDefault();
        setCounter((prevCounter) => {
            const newCounter = prevCounter + 1;
            setDivData((prevDivData) => [
                ...prevDivData,
                { id: newCounter, name: "Select Destination", default: true },
            ]);
            return newCounter;
        });
    };

    const handleDeleteDiv = (idToDelete) => {
        setDivData((prevDivData) => {
            const newDivData = prevDivData.filter(
                (item) => item.id !== idToDelete
            );
            return newDivData;
        });
    };

    const handleSelectChange = (destination, id) => {
        setResetValue(false);
        setDivData((prevDivData) =>
            prevDivData.map((item) =>
                item.id === id
                    ? { ...item, name: destination, default: false }
                    : item
            )
        );
        setErrors({ ...errors, destination: "" });
    };

    // const handleChange = (e) => {
    //     setFormData({
    //         ...formData,
    //         request_info: {
    //             ...formData.request_info,
    //             [e.target.name]: e.target.value,
    //         },
    //     });

    //     setErrors({ ...errors, [e.target.name]: "" });
    // };

    const validate = () => {
        let isValid = true;
        const newErrors = {};

        if (
            divData.length === 0 ||
            !divData.some((item) => item.name !== "Select Destination")
        ) {
            newErrors.destination = "Please select at least one destination";
            isValid = false;
        }

        if (!travelType) {
            newErrors.travelType = "Travel Type is required";
            isValid = false;
        }

        if (!destinationType) {
            newErrors.destinationType = "Destination Type is required";
            isValid = false;
        }

        if (!dateFrom) {
            newErrors.dateFrom = "Date From is required";
            isValid = false;
        }

        if (!dateTo) {
            newErrors.dateTo = "Date To is required";
            isValid = false;
        }

        if (!covidCoverage) {
            newErrors.covidCoverage = "COVID-19 Coverage is required";
            isValid = false;
        }

        if (!promoCodeType) {
            newErrors.promoCodeType = "Promo Code Type is required";
            isValid = false;
        } else {
            if (promoCodeType === "yes") {
                if (!promoCode) {
                    newErrors.promoCode = "Promo Code is required";
                    isValid = false;
                } else {
                    if (!isPromoValid) {
                        newErrors.promoCode = "Promo Code is required";
                        isValid = false;
                    }
                }
            }
        }

        setErrors(newErrors);

        return isValid;
    };

    const handleNext = async () => {
        if (validate()) {
            if (promoCodeType === "yes") {
                if (isPromoValid === true) {
                    var promoValue = promoCode;
                }
            } else {
                var promoValue = "";
            }

            const finalDivData = divData.filter(
                (data) => data.name !== "Select Destination"
            );

            setFormData({
                ...formData,
                request_info: {
                    travel_type: travelType,
                    destination: finalDivData,
                    destination_type: destinationType,
                    covid_coverage: covidCoverage,
                    promo_code: promoValue,
                    promo_code_type: promoCodeType,
                    date_from: dateFrom,
                    date_to: dateTo,
                    isPromoValid: isPromoValid,
                },
            });
            nextStep();
        }
    };

    const addDays = (days) => {
        const newDate = new Date(selectedDateFrom);
        newDate.setDate(selectedDateFrom.getDate() + days);
        setMaxDate(newDate);
    };

    const subDays = (days) => {
        const todayDate = new Date(
            today.getFullYear(),
            today.getMonth(),
            today.getDate() + 1
        );

        const newDate = new Date(selectedDateTo);
        newDate.setDate(selectedDateTo.getDate() - days);
        if (newDate < todayDate) {
            setMinDate(todayDate);
            return;
        }

        setMinDate(newDate);
    };

    useEffect(() => {
        if (selectedDateFrom) {
            addDays(59);
        }
    }, [selectedDateFrom]);

    useEffect(() => {
        if (selectedDateTo) {
            subDays(59);
        }
    }, [selectedDateTo]);

    const checkPromoCode = async () => {
        const { data } = await axios.get(
            "/api/get-quote/domestic-insurance/promo",
            {
                params: {
                    promo: promoCode,
                },
            },
            {
                headers: {
                    "Content-Type": "application/json",
                },
            }
        );

        if (data.length !== 0) {
            setIsPromoValid(true);
            setPromoData(data[0]);
        } else {
            setIsPromoValid(false);
        }
    };

    useEffect(() => {
        if (promoCode) {
            setErrors({ ...errors, promoCode: "" });
            checkPromoCode();
        }
    }, [promoCode]);

    return (
        <div className="bg-[#F7FFFF] flex flex-col items-center justify-center w-full px-8">
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-medium md:font-bold">
                    Travel Details
                    <span>
                        {destinationType && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        )}
                        {errors.destinationType && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                className="mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#DD0707"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                />
                            </svg>
                        )}
                    </span>
                </h2>
            </div>
            <div className="flex flex-col items-center justify-center w-full gap-8 mb-5">
                <h3 className="text-[#2D2727] text-base md:text-[23px] font-medium">
                    Choose one type of destination
                </h3>
                <div className="flex justify-center items-center w-full gap-5">
                    <button
                        className={`flex items-center gap-2 px-6 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            destinationType === "single"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        } `}
                        onClick={() => {
                            setDestinationType("single");
                            setDateFrom(null);
                            setDateTo(null);
                            setSelectedDateFrom(null);
                            setSelectedDateTo(null);
                            setResetValue(true);
                            setDivData([
                                {
                                    id: 1,
                                    name: "Select Destination",
                                    default: true,
                                },
                            ]);
                            setErrors({
                                ...errors,
                                destinationType: "",
                            });
                        }}
                    >
                        {destinationType === "single" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex items-center justify-center gap-1">
                            Single
                            <span className="hidden md:block">Destination</span>
                        </span>
                    </button>
                    <button
                        className={`flex items-center gap-2 px-6 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            destinationType === "multiple"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            setDestinationType("multiple");
                            setDateFrom(null);
                            setDateTo(null);
                            setSelectedDateFrom(null);
                            setSelectedDateTo(null);
                            setResetValue(true);
                            setDivData([
                                {
                                    id: 1,
                                    name: "Select Destination",
                                    default: true,
                                },
                            ]);
                            setErrors({
                                ...errors,
                                destinationType: "",
                            });
                        }}
                    >
                        {destinationType === "multiple" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex">
                            Multiple
                            <span className="hidden md:block">
                                -Destination
                            </span>
                        </span>
                    </button>
                </div>
            </div>
            {destinationType && (
                <div className="flex items-center justify-center w-full py-6 md:py-12">
                    <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[16px] md:text-[27px] font-medium md:font-bold w-full">
                        Where in the Philippines are you going?
                        <span>
                            {dateFrom &&
                                dateTo &&
                                divData[0].name != "" &&
                                divData[0].name != "Select Destination" &&
                                (!errors.destination ||
                                !errors.dateFrom ||
                                !errors.dateTo ? (
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        fill="currentColor"
                                        class="bi bi-check-circle-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill="#09A12A"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                        />
                                    </svg>
                                ) : (
                                    ""
                                ))}
                            {errors.destination ||
                            errors.dateFrom ||
                            errors.dateTo ? (
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    className="mb-1"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#DD0707"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                    />
                                </svg>
                            ) : (
                                ""
                            )}
                        </span>
                    </h2>
                </div>
            )}
            {destinationType && (
                <div className="flex flex-col items-center justify-center w-full gap-8 mb-5 px-5 md:px-0">
                    <div className="flex flex-col w-full justify-center items-center gap-5">
                        {divData.map((item, index) => {
                            if (destinationType === "single") {
                                if (index === 0) {
                                    return (
                                        <SelectDestination
                                            key={index}
                                            divData={divData}
                                            handleDeleteDiv={handleDeleteDiv}
                                            handleAddDiv={handleAddDiv}
                                            index={index}
                                            item={item}
                                            provinces={provinces}
                                            handleSelectChange={
                                                handleSelectChange
                                            }
                                            destinationType={destinationType}
                                            resetValue={resetValue}
                                            errors={errors.destination}
                                        />
                                    );
                                }
                            } else {
                                return (
                                    <SelectDestination
                                        key={index}
                                        divData={divData}
                                        handleDeleteDiv={handleDeleteDiv}
                                        handleAddDiv={handleAddDiv}
                                        index={index}
                                        item={item}
                                        provinces={provinces}
                                        handleSelectChange={handleSelectChange}
                                        destinationType={destinationType}
                                        resetValue={resetValue}
                                        errors={errors.destination}
                                    />
                                );
                            }
                        })}
                    </div>

                    <div className="flex flex-col md:flex-row items-center justify-center w-full max-w-[325px] md:max-w-[450px] gap-5">
                        <label class="flex flex-col w-full">
                            <span
                                class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                                    errors.dateFrom
                                        ? "text-[#DD0707]"
                                        : "text-[#848A90]"
                                } `}
                            >
                                From
                            </span>
                            {/* <input
                            type="date"
                            name="email"
                            class="cursor-pointer mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b-2 border-[#848A90] placeholder-slate-400  block w-full sm:text-sm focus:ring-1"
                            placeholder="you@example.com"
                        /> */}
                            <DatePicker
                                onDateSelect={handleDateFrom}
                                minDate={minDate}
                                maxDate={selectedDateTo}
                                defaultValue={selectedDateFrom}
                                resetValue={resetValue}
                                errors={errors.dateFrom}
                            />
                        </label>
                        <span className=" items-center justify-center mt-5 hidden md:flex">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill="currentColor"
                                class="bi bi-arrow-right-short"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#E4509A"
                                    fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"
                                />
                            </svg>
                        </span>
                        <label class="flex flex-col w-full">
                            <span
                                class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3 ${
                                    errors.dateTo
                                        ? "text-[#DD0707]"
                                        : "text-[#848A90]"
                                } `}
                            >
                                Until
                            </span>
                            <DatePicker
                                onDateSelect={handleDateTo}
                                minDate={
                                    selectedDateFrom
                                        ? selectedDateFrom
                                        : minDate
                                }
                                maxDate={maxDate}
                                defaultValue={selectedDateTo}
                                resetValue={resetValue}
                                errors={errors.dateTo}
                            />
                        </label>
                    </div>
                    {destinationType === "multiple" && (
                        <button
                            className="block md:hidden text-white bg-[#008080]  py-3 text-xs w-full rounded"
                            onClick={handleAddDiv}
                        >
                            Add Another Destination
                        </button>
                    )}
                </div>
            )}
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[16px] md:text-[27px] font-medium md:font-bold">
                    Are you traveling via air or non-air?
                    <span>
                        {travelType && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        )}
                        {errors.travelType && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                className="mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#DD0707"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                />
                            </svg>
                        )}
                    </span>
                </h2>
            </div>
            <div className="flex flex-col items-center justify-center w-full gap-7 mb-5">
                <div className="flex justify-center items-center w-full gap-5">
                    <button
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            travelType === "Air Plan"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            setTravelType("Air Plan");
                            setErrors({ ...errors, travelType: "" });
                            setFormData({
                                ...formData,
                                quotation: {},
                            });
                        }}
                    >
                        {travelType === "Air Plan" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex items-center justify-center gap-1">
                            Air
                        </span>
                    </button>
                    <button
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            travelType === "Non-Air Plan"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            setTravelType("Non-Air Plan");
                            setErrors({ ...errors, travelType: "" });
                            setFormData({
                                ...formData,
                                quotation: {},
                            });
                        }}
                    >
                        {travelType === "Non-Air Plan" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex">Non-Air</span>
                    </button>
                </div>
                <div className="flex flex-col justify-center items-center w-full gap-3">
                    <div className="flex items-center justify-center w-full gap-3">
                        <span>
                            <svg
                                width="15"
                                height="14"
                                viewBox="0 0 15 14"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M14.5 7.5V9.5C14.5 9.63261 14.4473 9.75979 14.3536 9.85355C14.2598 9.94732 14.1326 10 14 10C13.967 10.0001 13.9341 9.99673 13.9019 9.99L9.25 9.0625V10.5456L10.3538 11.6488C10.4469 11.742 10.4994 11.8682 10.5 12V13.5C10.5001 13.5819 10.4801 13.6627 10.4418 13.7351C10.4034 13.8075 10.3478 13.8693 10.2799 13.9152C10.212 13.9611 10.1338 13.9895 10.0523 13.9981C9.97082 14.0067 9.88847 13.9951 9.8125 13.9644L7.5 13.0388L5.1875 13.9644C5.11153 13.9951 5.02918 14.0067 4.94768 13.9981C4.86618 13.9895 4.78804 13.9611 4.72013 13.9152C4.65223 13.8693 4.59663 13.8075 4.55825 13.7351C4.51986 13.6627 4.49986 13.5819 4.5 13.5V12C4.49995 11.9343 4.51284 11.8693 4.53793 11.8086C4.56303 11.7479 4.59983 11.6927 4.64625 11.6463L5.75 10.5431V9.0625L1.09813 9.99C1.06585 9.99673 1.03297 10.0001 1 10C0.867392 10 0.740215 9.94732 0.646447 9.85355C0.552679 9.75979 0.5 9.63261 0.5 9.5V7.5C0.499934 7.40711 0.525744 7.31604 0.574538 7.237C0.623333 7.15796 0.69318 7.09407 0.77625 7.0525L5.75 4.56625V1.75C5.75 1.28587 5.93437 0.840752 6.26256 0.512563C6.59075 0.184374 7.03587 0 7.5 0C7.96413 0 8.40925 0.184374 8.73744 0.512563C9.06563 0.840752 9.25 1.28587 9.25 1.75V4.56625L14.2238 7.0525C14.3068 7.09407 14.3767 7.15796 14.4255 7.237C14.4743 7.31604 14.5001 7.40711 14.5 7.5Z"
                                    fill="#848A90"
                                />
                            </svg>
                        </span>
                        <span className="text-[#848A90] leading-6 font-medium">
                            <span className="font-bold">AIR:</span> Travel via
                            plane.
                        </span>
                    </div>
                    <div className="flex items-center justify-center gap-3 max-w-[700px]">
                        <span>
                            <svg
                                width="13"
                                height="14"
                                viewBox="0 0 13 14"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M6.5 0.5C5.21442 0.5 3.95772 0.881218 2.8888 1.59545C1.81988 2.30968 0.986756 3.32484 0.494786 4.51256C0.00281635 5.70028 -0.125905 7.00721 0.124899 8.26809C0.375703 9.52896 0.994767 10.6872 1.90381 11.5962C2.81285 12.5052 3.97104 13.1243 5.23192 13.3751C6.49279 13.6259 7.79973 13.4972 8.98744 13.0052C10.1752 12.5132 11.1903 11.6801 11.9046 10.6112C12.6188 9.54229 13 8.28558 13 7C12.9982 5.27665 12.3128 3.62441 11.0942 2.40582C9.8756 1.18722 8.22335 0.50182 6.5 0.5ZM9.72375 4.11188L7.72375 8.11187C7.69927 8.16008 7.66009 8.19926 7.61188 8.22375L3.61188 10.2238C3.56492 10.2473 3.51172 10.2555 3.45984 10.2472C3.40795 10.2388 3.36003 10.2143 3.32287 10.1771C3.28571 10.14 3.2612 10.092 3.25283 10.0402C3.24447 9.98828 3.25266 9.93508 3.27625 9.88813L5.27625 5.88812C5.30074 5.83991 5.33992 5.80074 5.38813 5.77625L9.38813 3.77625C9.43509 3.75266 9.48829 3.74446 9.54017 3.75283C9.59205 3.7612 9.63998 3.7857 9.67714 3.82286C9.7143 3.86002 9.7388 3.90795 9.74717 3.95983C9.75554 4.01172 9.74735 4.06492 9.72375 4.11188Z"
                                    fill="#848A90"
                                />
                            </svg>
                        </span>
                        <span className="text-[#848A90] leading-6 font-medium">
                            <span className="font-bold">NON-AIR:</span> Travel
                            via land or sea.{" "}
                            <span className="font-bold">
                                Minimum of 125 KM.
                            </span>{" "}
                            away from usual place of residence. Verify distance
                            via Google Maps.
                        </span>
                    </div>
                </div>
            </div>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Add COVID-19 Coverage?
                    <span>
                        {covidCoverage && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        )}
                        {errors.covidCoverage && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                className="mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#DD0707"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                />
                            </svg>
                        )}
                    </span>
                </h2>
            </div>
            <div className="flex flex-col items-center justify-center w-full gap-7 mb-5">
                <div className="flex justify-center items-center w-full gap-5">
                    <button
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            covidCoverage === "No"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            setCovidCoverage("No");
                            setErrors({ ...errors, covidCoverage: "" });
                            setFormData({
                                ...formData,
                                quotation: {},
                            });
                        }}
                    >
                        {covidCoverage === "No" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex items-center justify-center gap-1">
                            No
                        </span>
                    </button>
                    <button
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            covidCoverage === "Yes"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            setCovidCoverage("Yes");
                            setErrors({ ...errors, covidCoverage: "" });
                            setFormData({
                                ...formData,
                                quotation: {},
                            });
                        }}
                    >
                        {covidCoverage === "Yes" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex">Yes</span>
                    </button>
                </div>
                <div className="flex flex-col justify-center items-center w-full gap-3">
                    <div className="flex items-center justify-center gap-3 max-w-[700px]">
                        <span>
                            <svg
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10.0039 0.25C8.07554 0.25 6.19048 0.821828 4.5871 1.89317C2.98372 2.96451 1.73404 4.48726 0.996085 6.26884C0.258131 8.05042 0.0650482 10.0108 0.441254 11.9021C0.81746 13.7934 1.74606 15.5307 3.10962 16.8943C4.47318 18.2579 6.21047 19.1865 8.10178 19.5627C9.9931 19.9389 11.9535 19.7458 13.7351 19.0078C15.5167 18.2699 17.0394 17.0202 18.1107 15.4168C19.1821 13.8134 19.7539 11.9284 19.7539 10C19.7512 7.41498 18.7231 4.93661 16.8952 3.10872C15.0673 1.28084 12.5889 0.25273 10.0039 0.25ZM10.0039 18.25C8.37221 18.25 6.77716 17.7661 5.42046 16.8596C4.06375 15.9531 3.00633 14.6646 2.3819 13.1571C1.75748 11.6496 1.5941 9.99085 1.91243 8.3905C2.23076 6.79016 3.0165 5.32015 4.17028 4.16637C5.32406 3.01259 6.79407 2.22685 8.39442 1.90852C9.99476 1.59019 11.6536 1.75357 13.161 2.37799C14.6685 3.00242 15.957 4.05984 16.8635 5.41655C17.7701 6.77325 18.2539 8.3683 18.2539 10C18.2514 12.1873 17.3814 14.2843 15.8348 15.8309C14.2882 17.3775 12.1912 18.2475 10.0039 18.25ZM11.5039 14.5C11.5039 14.6989 11.4249 14.8897 11.2842 15.0303C11.1436 15.171 10.9528 15.25 10.7539 15.25C10.3561 15.25 9.97456 15.092 9.69325 14.8107C9.41195 14.5294 9.25391 14.1478 9.25391 13.75V10C9.055 10 8.86423 9.92098 8.72358 9.78033C8.58293 9.63968 8.50391 9.44891 8.50391 9.25C8.50391 9.05109 8.58293 8.86032 8.72358 8.71967C8.86423 8.57902 9.055 8.5 9.25391 8.5C9.65174 8.5 10.0333 8.65804 10.3146 8.93934C10.5959 9.22064 10.7539 9.60218 10.7539 10V13.75C10.9528 13.75 11.1436 13.829 11.2842 13.9697C11.4249 14.1103 11.5039 14.3011 11.5039 14.5ZM8.50391 5.875C8.50391 5.6525 8.56989 5.43499 8.69351 5.24998C8.81712 5.06498 8.99282 4.92078 9.19839 4.83564C9.40396 4.75049 9.63016 4.72821 9.84839 4.77162C10.0666 4.81502 10.2671 4.92217 10.4244 5.0795C10.5817 5.23684 10.6889 5.43729 10.7323 5.65552C10.7757 5.87375 10.7534 6.09995 10.6683 6.30552C10.5831 6.51109 10.4389 6.68679 10.2539 6.8104C10.0689 6.93402 9.85141 7 9.62891 7C9.33054 7 9.04439 6.88147 8.83342 6.6705C8.62244 6.45952 8.50391 6.17337 8.50391 5.875Z"
                                    fill="#848A90"
                                />
                            </svg>
                        </span>
                        <span className="text-[#585858] text-[12px] md:text-base md:leading-6 md:font-medium">
                            <span
                                className="text-[#008080] cursor-pointer hover:underline"
                                onClick={() => setCovidModal(true)}
                            >
                                COVID-19 Assist+
                            </span>{" "}
                            provides coverage for medical expense and
                            hospitalization, and transport and repatriation in
                            case of illness for international trips.
                        </span>
                    </div>
                </div>
            </div>
            <div className="flex items-center justify-center w-full py-6 md:py-12">
                <h2 className="flex items-center justify-center gap-6 text-[#2D2727] text-[18px] md:text-[27px] font-bold">
                    Do you have promo code?
                    <span>
                        {promoCodeType === "no" && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        )}
                        {promoCodeType === "yes" && isPromoValid === true && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                class="bi bi-check-circle-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#09A12A"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                />
                            </svg>
                        )}
                        {errors.promoCodeType || errors.promoCode ? (
                            promoCodeType === "yes" && !promoCode ? (
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    className="mb-1"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#DD0707"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                    />
                                </svg>
                            ) : (
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    className="mb-1"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#DD0707"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                    />
                                </svg>
                            )
                        ) : (
                            ""
                        )}
                        {isPromoValid === false && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="currentColor"
                                className="mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#DD0707"
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"
                                />
                            </svg>
                        )}
                    </span>
                </h2>
            </div>
            <div className="flex flex-col items-center justify-center w-full gap-10 mb-5">
                <div className="flex justify-center items-center w-full gap-5">
                    <button
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            promoCodeType === "no"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            if (promoCodeType !== "no") {
                                setPromoCodeType("no");
                                setErrors({
                                    ...errors,
                                    promoCode: "",
                                    promoCodeType: "",
                                });
                                setPromoData({});
                                setIsPromoValid(null);
                                setPromoCode("");
                                setFormData({
                                    ...formData,
                                    quotation: {},
                                });
                            }
                        }}
                    >
                        {promoCodeType === "no" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex items-center justify-center gap-1">
                            No
                        </span>
                    </button>
                    <button
                        className={`flex items-center gap-2 px-10 py-3 md:py-6 rounded-full font-medium hover:bg-[#E4509A] hover:text-white ${
                            promoCodeType === "yes"
                                ? "bg-[#E4509A] text-white"
                                : "text-[#E4509A] border border-[#E4509A]"
                        }`}
                        onClick={() => {
                            if (promoCodeType !== "yes") {
                                setPromoCodeType("yes");
                                setErrors({
                                    ...errors,
                                    promoCode: "",
                                    promoCodeType: "",
                                });
                                setIsPromoValid(null);
                                setPromoData({});
                                setPromoCode("");
                                setFormData({
                                    ...formData,
                                    quotation: {},
                                });
                            }
                        }}
                    >
                        {promoCodeType === "yes" && (
                            <span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    class="bi bi-check-circle-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        fill="#ffffff"
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"
                                    />
                                </svg>
                            </span>
                        )}
                        <span className="flex">Yes</span>
                    </button>
                </div>
                {promoCodeType && promoCodeType === "yes" && (
                    <div className="flex flex-col justify-center items-center w-full gap-3">
                        <label class="flex flex-col w-full max-w-[325px] md:max-w-[400px]">
                            <span
                                class={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] px-3  ${
                                    errors.promoCode
                                        ? "text-[#DD0707]"
                                        : "text-[#848A90]"
                                } `}
                            >
                                Enter Promo Code
                            </span>
                            <input
                                value={promoCode}
                                onChange={(e) => {
                                    setPromoCode(e.target.value.slice(0, 50));
                                }}
                                type="text"
                                class={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b focus:ring-0 focus:outline-none border-[#006666] focus:border-[#006666] placeholder-slate-400 ${
                                    errors.promoCode &&
                                    "border-[#DD0707] placeholder-[#DD0707]"
                                }    block w-full sm:text-sm `}
                            />
                        </label>
                    </div>
                )}
                {promoCodeType === "yes" &&
                    isPromoValid === true &&
                    promoCode !== "" && (
                        <div className="flex items-center bg-[#F2F2F2] gap-4 py-6 px-8 max-w-[725px] w-full">
                            <div>
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M18 17.5C18 17.7967 17.912 18.0867 17.7472 18.3334C17.5824 18.58 17.3481 18.7723 17.074 18.8858C16.7999 18.9993 16.4983 19.0291 16.2074 18.9712C15.9164 18.9133 15.6491 18.7704 15.4393 18.5607C15.2296 18.3509 15.0867 18.0836 15.0288 17.7926C14.9709 17.5017 15.0007 17.2001 15.1142 16.926C15.2277 16.6519 15.42 16.4176 15.6666 16.2528C15.9133 16.088 16.2033 16 16.5 16C16.8978 16 17.2794 16.158 17.5607 16.4393C17.842 16.7206 18 17.1022 18 17.5ZM7.5 8C7.79667 8 8.08668 7.91203 8.33335 7.7472C8.58003 7.58238 8.77229 7.34811 8.88582 7.07403C8.99935 6.79994 9.02906 6.49834 8.97118 6.20736C8.9133 5.91639 8.77044 5.64912 8.56066 5.43934C8.35088 5.22956 8.08361 5.0867 7.79264 5.02882C7.50166 4.97094 7.20006 5.00065 6.92597 5.11418C6.65189 5.22771 6.41762 5.41997 6.2528 5.66665C6.08797 5.91332 6 6.20333 6 6.5C6 6.89782 6.15804 7.27936 6.43934 7.56066C6.72064 7.84196 7.10218 8 7.5 8ZM24 2V22C24 22.5304 23.7893 23.0391 23.4142 23.4142C23.0391 23.7893 22.5304 24 22 24H2C1.46957 24 0.960859 23.7893 0.585786 23.4142C0.210714 23.0391 0 22.5304 0 22V2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0H22C22.5304 0 23.0391 0.210714 23.4142 0.585786C23.7893 0.960859 24 1.46957 24 2ZM4 6.5C4 7.19223 4.20527 7.86892 4.58986 8.4445C4.97444 9.02007 5.52107 9.46867 6.16061 9.73358C6.80015 9.99849 7.50388 10.0678 8.18282 9.93275C8.86175 9.7977 9.48539 9.46436 9.97487 8.97487C10.4644 8.48539 10.7977 7.86175 10.9327 7.18282C11.0678 6.50388 10.9985 5.80015 10.7336 5.16061C10.4687 4.52107 10.0201 3.97444 9.4445 3.58986C8.86892 3.20527 8.19223 3 7.5 3C6.57174 3 5.6815 3.36875 5.02513 4.02513C4.36875 4.6815 4 5.57174 4 6.5ZM20 17.5C20 16.8078 19.7947 16.1311 19.4101 15.5555C19.0256 14.9799 18.4789 14.5313 17.8394 14.2664C17.1999 14.0015 16.4961 13.9322 15.8172 14.0673C15.1383 14.2023 14.5146 14.5356 14.0251 15.0251C13.5356 15.5146 13.2023 16.1383 13.0673 16.8172C12.9322 17.4961 13.0015 18.1999 13.2664 18.8394C13.5313 19.4789 13.9799 20.0256 14.5555 20.4101C15.1311 20.7947 15.8078 21 16.5 21C17.4283 21 18.3185 20.6313 18.9749 19.9749C19.6313 19.3185 20 18.4283 20 17.5ZM19.7075 4.2925C19.6146 4.19952 19.5043 4.12576 19.3829 4.07544C19.2615 4.02512 19.1314 3.99921 19 3.99921C18.8686 3.99921 18.7385 4.02512 18.6171 4.07544C18.4957 4.12576 18.3854 4.19952 18.2925 4.2925L4.2925 18.2925C4.10486 18.4801 3.99944 18.7346 3.99944 19C3.99944 19.2654 4.10486 19.5199 4.2925 19.7075C4.48014 19.8951 4.73464 20.0006 5 20.0006C5.26536 20.0006 5.51986 19.8951 5.7075 19.7075L19.7075 5.7075C19.8005 5.61463 19.8742 5.50434 19.9246 5.38294C19.9749 5.26154 20.0008 5.13142 20.0008 5C20.0008 4.86858 19.9749 4.73846 19.9246 4.61706C19.8742 4.49566 19.8005 4.38537 19.7075 4.2925Z"
                                        fill="#54B947"
                                    />
                                </svg>
                            </div>
                            <div>
                                Promo code applied. {""}
                                {promoData.type === "A"
                                    ? `₱${promoData.amount} `
                                    : `${promoData.rate}% `}
                                off will be deducted on package to be selected.
                            </div>
                        </div>
                    )}
                {isPromoValid === false && (
                    <div className="flex items-center bg-[#F2F2F2] gap-4 py-6 px-4 max-w-[750px] w-full">
                        <div>
                            <svg
                                width="26"
                                height="26"
                                viewBox="0 0 26 26"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    width="26"
                                    height="26"
                                    rx="13"
                                    fill="#DD0707"
                                />
                                <path
                                    d="M13 4.875C11.393 4.875 9.82214 5.35152 8.486 6.24431C7.14985 7.1371 6.10844 8.40605 5.49348 9.8907C4.87852 11.3753 4.71762 13.009 5.03112 14.5851C5.34463 16.1612 6.11846 17.6089 7.25476 18.7452C8.39106 19.8815 9.8388 20.6554 11.4149 20.9689C12.991 21.2824 14.6247 21.1215 16.1093 20.5065C17.594 19.8916 18.8629 18.8502 19.7557 17.514C20.6485 16.1779 21.125 14.607 21.125 13C21.1227 10.8458 20.266 8.78051 18.7427 7.25727C17.2195 5.73403 15.1542 4.87727 13 4.875ZM13 19.875C11.6403 19.875 10.311 19.4718 9.18046 18.7164C8.04987 17.9609 7.16868 16.8872 6.64833 15.6309C6.12798 14.3747 5.99183 12.9924 6.2571 11.6588C6.52238 10.3251 7.17716 9.10013 8.13864 8.13864C9.10013 7.17716 10.3251 6.52237 11.6588 6.2571C12.9924 5.99183 14.3747 6.12798 15.631 6.64833C16.8872 7.16868 17.9609 8.04987 18.7164 9.18045C19.4718 10.311 19.875 11.6403 19.875 13C19.8729 14.8227 19.1479 16.5702 17.8591 17.8591C16.5702 19.1479 14.8227 19.8729 13 19.875ZM12.375 13.625V9.25C12.375 9.08424 12.4409 8.92527 12.5581 8.80806C12.6753 8.69085 12.8342 8.625 13 8.625C13.1658 8.625 13.3247 8.69085 13.4419 8.80806C13.5592 8.92527 13.625 9.08424 13.625 9.25V13.625C13.625 13.7908 13.5592 13.9497 13.4419 14.0669C13.3247 14.1842 13.1658 14.25 13 14.25C12.8342 14.25 12.6753 14.1842 12.5581 14.0669C12.4409 13.9497 12.375 13.7908 12.375 13.625ZM13.9375 16.4375C13.9375 16.6229 13.8825 16.8042 13.7795 16.9583C13.6765 17.1125 13.5301 17.2327 13.3588 17.3036C13.1875 17.3746 12.999 17.3932 12.8171 17.357C12.6352 17.3208 12.4682 17.2315 12.3371 17.1004C12.206 16.9693 12.1167 16.8023 12.0805 16.6204C12.0443 16.4385 12.0629 16.25 12.1339 16.0787C12.2048 15.9074 12.325 15.761 12.4792 15.658C12.6333 15.555 12.8146 15.5 13 15.5C13.2486 15.5 13.4871 15.5988 13.6629 15.7746C13.8387 15.9504 13.9375 16.1889 13.9375 16.4375Z"
                                    fill="#EFF2F4"
                                />
                            </svg>
                        </div>
                        <div>
                            Invalid promo code. Kindly check if entered promo
                            code is incorrect or it has been used.
                        </div>
                    </div>
                )}
            </div>
            <div className="flex flex-col-reverse md:flex-row items-center justify-center w-full py-12 md:py-20 gap-5">
                <button
                    className="text-[#008080] px-5 py-[10px] w-full md:w-auto flex justify-center gap-2 group hover:border-[#008080] hover:border rounded"
                    onClick={() =>
                        (window.location.href =
                            "/get-quote/ecommerce/cancelled/Domestic Travel Plus")
                    }
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
                    disabled={
                        errors.destination ||
                        errors.travelType ||
                        errors.destinationType ||
                        errors.covidCoverage ||
                        errors.promoCodeType ||
                        errors.promoCode ||
                        errors.dateFrom ||
                        errors.dateTo
                    }
                    className="text-white bg-[#008080] px-5 py-[10px] rounded w-full md:w-auto flex justify-center gap-2 group disabled:opacity-50"
                    onClick={handleNext}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        className={`bi bi-arrow-right-short hidden  ${
                            errors.destination ||
                            errors.travelType ||
                            errors.destinationType ||
                            errors.covidCoverage ||
                            errors.promoCodeType ||
                            errors.promoCode ||
                            errors.dateFrom ||
                            errors.dateTo
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
                    <span>Continue</span>
                </button>
            </div>
            <div
                class={`fixed z-50 !overflow-hidden top-0 w-full left-0 h-full ${
                    !covidModal && "hidden"
                }`}
                id="modal"
            >
                <div class="flex items-center !overflow-hidden justify-center min-h-screen pt-4 pb-20 text-center sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-25"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
                        &#8203;
                    </span>
                    <div
                        class="inline-block align-center bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-4 sm:align-middle w-[375px] md:w-3/4 md:max-w-3xl sm:py-4 lg:w-full border-t-2 border-[#E4509A]"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div className="absolute -top-3 -right-3">
                            <button onClick={() => setCovidModal(false)}>
                                <svg
                                    width="39"
                                    height="39"
                                    viewBox="0 0 39 39"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <rect
                                        width="39"
                                        height="39"
                                        rx="19.5"
                                        fill="#ECECEC"
                                    />
                                    <path
                                        d="M26.7802 25.719C26.8499 25.7887 26.9052 25.8714 26.9429 25.9625C26.9806 26.0535 27 26.1511 27 26.2496C27 26.3482 26.9806 26.4457 26.9429 26.5368C26.9052 26.6278 26.8499 26.7105 26.7802 26.7802C26.7105 26.8499 26.6278 26.9052 26.5368 26.9429C26.4457 26.9806 26.3482 27 26.2496 27C26.1511 27 26.0535 26.9806 25.9625 26.9429C25.8714 26.9052 25.7887 26.8499 25.719 26.7802L19.5 20.5603L13.281 26.7802C13.1402 26.9209 12.9494 27 12.7504 27C12.5514 27 12.3605 26.9209 12.2198 26.7802C12.0791 26.6395 12 26.4486 12 26.2496C12 26.0506 12.0791 25.8598 12.2198 25.719L18.4397 19.5L12.2198 13.281C12.0791 13.1402 12 12.9494 12 12.7504C12 12.5514 12.0791 12.3605 12.2198 12.2198C12.3605 12.0791 12.5514 12 12.7504 12C12.9494 12 13.1402 12.0791 13.281 12.2198L19.5 18.4397L25.719 12.2198C25.8598 12.0791 26.0506 12 26.2496 12C26.4486 12 26.6395 12.0791 26.7802 12.2198C26.9209 12.3605 27 12.5514 27 12.7504C27 12.9494 26.9209 13.1402 26.7802 13.281L20.5603 19.5L26.7802 25.719Z"
                                        fill="#848A90"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="bg-white flex flex-col items-center justify-between w-full">
                            <div className="flex items-center justify-center w-full py-4 border-b mb-5">
                                <p className="font-medium text-[23px] leading-6 text-[#2D2727] text-center">
                                    Covid-19 Assist+
                                </p>
                            </div>
                            {/* <div className="flex items-start justify-center w-full py-5 md:pl-5 flex-1 border-t mb-5 gap-16">
                                <div className="flex flex-col items-start justify-center gap-3 basis-2/4">
                                    <p className="text-[#2D2727] font-bold text-[14px] mb-5">
                                        Standard Coverage
                                    </p>
                                    <p className="text-[#3B3939] font-medium">
                                        Trip cancellation due to COVID-19.
                                    </p>
                                    <p className="text-[#3B3939] font-medium">
                                        Daily hospital benefits due to COVID-19{" "}
                                        <br />
                                        (Maximum of 15 days).
                                    </p>
                                </div>
                                <div className="flex flex-col items-start justify-center gap-3 basis-1/4">
                                    <p className="text-[#2D2727] font-bold text-[14px] mb-5">
                                        Packet
                                    </p>
                                    <p className="text-[#3B3939] font-medium">
                                        ₱25,000.00
                                    </p>
                                    <p className="text-[#3B3939] font-medium">
                                        ₱250.00/day
                                    </p>
                                </div>
                                <div className="flex flex-col items-start justify-center gap-3 basis-1/4">
                                    <p className="text-[#2D2727] font-bold text-[14px] mb-5">
                                        Pro
                                    </p>
                                    <p className="text-[#3B3939] font-medium">
                                        ₱25,000.00
                                    </p>
                                    <p className="text-[#3B3939] font-medium">
                                        ₱500.00/day
                                    </p>
                                </div>
                            </div> */}
                            <div className="flex items-center justify-center w-full px-5 mb-10">
                                <table className="w-full">
                                    <thead>
                                        <tr>
                                            <th className="pb-3 text-[#2D2727] text-xs md:text-sm ">
                                                <span className="hidden md:block">
                                                    Standard Coverage
                                                </span>
                                            </th>
                                            <th className="pb-3 text-[#2D2727] text-xs md:text-sm">
                                                Packet
                                            </th>
                                            <th className="pb-3 text-[#2D2727] text-xs md:text-sm">
                                                Pro
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td className="pb-3 pr-5 text-[#3B3939] text-sm md:text-base">
                                                Trip cancellation due to
                                                COVID-19.
                                            </td>
                                            <td className="pb-3 pr-5 text-[#3B3939] text-sm md:text-base">
                                                ₱25,000.00
                                            </td>
                                            <td className="pb-3 text-[#3B3939] text-sm md:text-base">
                                                ₱25,000.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="pb-3 pr-5 text-[#3B3939] text-sm md:text-base">
                                                Daily hospital benefits due to
                                                COVID-19 <br /> (Maximum of 15
                                                days)
                                            </td>
                                            <td className="pb-3 pr-5 text-[#3B3939] text-sm md:text-base">
                                                ₱250.00/day
                                            </td>
                                            <td className="pb-3 text-[#3B3939] text-sm md:text-base">
                                                ₱500.00/day
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default FirstPage;
