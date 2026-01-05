import { useEffect, useReducer, useState } from "react";
import CarInformation from "./CarInformation";
import Plan from "./Plan";
import ReviewQuotation from "./ReviewQuotation";
import ClientInformation from "./ClientInformation";
import Summary from "./Summary";
import QuotationStep from "../../../../components/QuotationStep";
import { Link } from "react-router-dom";
import PlanDetails from "./PlanDetails";

const initialState = {
    steps: [
        { id: 1, name: "Car Information" },
        { id: 2, name: "Plan" },
        { id: 3, name: "Review Quotation" },
        { id: 4, name: "Client Information" },
        { id: 5, name: "Summary" },
    ],
    step: 1,
    formData: {
        brand: "",
        model: "",
        year: "",
        valueOfCar: "",
        mvFileNumber: "",
        plateNumber: "",
        engineNumber: "",
        chassisNumber: "",
        bodyType: "",
        color: "",
        seatingCapacity: "",
        mortgagee: "",
        policyInceptionDate: "",
        bodilyInjury: "",
        propertyDamage: "",
        nonStandard: [],
        selectedPlan: "",
        firstName: "",
        lastName: "",
        mobile: "",
        email: "",
        gender: "",
        birthDate: "",
        placeOfBirth: "",
        nationality: "",
        country: "",
        region: "",
        province: "",
        city: "",
        brgy: "",
        houseNo: "",
        streetName: "",
        zipCode: "",
        idType: "",
        idNumber: "",
        idFile: null,
        emergencyContactFullName: "",
        emergencyContactMobile: "",
        emergencyContactRelationship: "",
        sample: "",
    },
    errors: {
        brand: "",
        model: "",
        year: "",
        valueOfCar: "",
        mvFileNumber: "",
        plateNumber: "",
        engineNumber: "",
        chassisNumber: "",
        bodyType: "",
        color: "",
        seatingCapacity: "",
        mortgagee: "",
        policyInceptionDate: "",
        bodilyInjury: "",
        propertyDamage: "",
        nonStandard: "",
        selectedPlan: "",
        firstName: "",
        lastName: "",
        mobile: "",
        email: "",
        gender: "",
        birthDate: "",
        placeOfBirth: "",
        nationality: "",
        country: "",
        region: "",
        province: "",
        city: "",
        brgy: "",
        houseNo: "",
        streetName: "",
        zipCode: "",
        idType: "",
        idNumber: "",
        idFile: null,
        emergencyContactFullName: "",
        emergencyContactMobile: "",
        emergencyContactRelationship: "",
    },
};

const reducer = (state, action) => {
    switch (action.type) {
        case "NEXT_STEP":
            if (state.step === 5) return state;
            return { ...state, step: state.step + 1 };
        case "PREVIOUS_STEP":
            if (state.step === 1) return state;
            return { ...state, step: state.step - 1 };
        case "VIEW_PLAN":
            return { ...state, step: 6 };
        case "UPDATE_FIELD":
            return {
                ...state,
                formData: {
                    ...state.formData,
                    [action.field]: action.value,
                },

                errors: {
                    ...state.errors,
                    [action.field]: "",
                },
            };
        case "GET_BRANDS":
            return {
                ...state,
                brands: action.brands.data.map((item) => {
                    let _item = Object.assign(item, {});
                    _item["name"] = item["brand"];
                    delete _item["brand"];
                    return _item;
                }),
            };
        default:
            break;
    }
};

const AutoExcel = () => {
    const [state, dispatch] = useReducer(reducer, initialState);
    const { steps, step, formData, errors } = state;

    const renderStep = () => {
        switch (step) {
            case 1:
                return (
                    <CarInformation
                        formData={formData}
                        dispatch={dispatch}
                        errors={errors}
                    />
                );
            case 2:
                return <Plan dispatch={dispatch} />;
            case 3:
                return <ReviewQuotation dispatch={dispatch} />;
            case 4:
                return <ClientInformation dispatch={dispatch} />;
            case 5:
                return <Summary dispatch={dispatch} />;
            case 6:
                return <PlanDetails dispatch={dispatch} />;
            default:
                return <CarInformation dispatch={dispatch} />;
        }
    };

    return (
        <div className="flex flex-col mt-4 md:mt-0 md:p-10 gap-4 w-full">
            <style
                dangerouslySetInnerHTML={{
                    __html: `
                        .no-scrollbar {
                            overflow: auto;
                        }
                    `,
                }}
            />
            <div className="hidden md:flex items-center gap-4 px-8">
                <Link
                    to="/epartnerhub/dashboard"
                    className="hover:underline text-xs font-medium text-[#585858]"
                >
                    Home
                </Link>
                <span>
                    <svg
                        width="5"
                        height="11"
                        viewBox="0 0 5 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M-0.00390629 9.34438L3.20488 5.52911L-0.00300533 1.64438L1.20181 0.649481L4.82426 5.03625C5.06441 5.32706 5.06251 5.74792 4.81975 6.03656L1.1919 10.3501L-0.00390629 9.34438Z"
                            fill="#848A90"
                        />
                    </svg>
                </span>
                <Link
                    to="/epartnerhub/quotations"
                    className="hover:underline text-xs font-medium text-[#585858]"
                >
                    Quotation
                </Link>
                <span>
                    <svg
                        width="5"
                        height="11"
                        viewBox="0 0 5 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M-0.00390629 9.34438L3.20488 5.52911L-0.00300533 1.64438L1.20181 0.649481L4.82426 5.03625C5.06441 5.32706 5.06251 5.74792 4.81975 6.03656L1.1919 10.3501L-0.00390629 9.34438Z"
                            fill="#848A90"
                        />
                    </svg>
                </span>
                <p className="text-xs font-medium text-[#2D2727]">Create</p>
            </div>
            <div className="flex flex-col justify-center items-center w-full bg-white rounded-md border px-14 py-8 gap-4">
                <p className="text-[#585858] text-sm font-medium">
                    You are creating
                </p>
                <p className="text-[#303030] text-[30px] font-medium">
                    Auto Excel Plus
                </p>
                <QuotationStep steps={steps} step={step} />
                {renderStep()}
                {/* <div className="flex justify-between w-full">
                        <button
                            className="w-full p-4"
                            onClick={() => dispatch({ type: "PREVIOUS_STEP" })}
                        >
                            Back
                        </button>
                        <button
                            className="w-full p-4"
                            onClick={() => dispatch({ type: "NEXT_STEP" })}
                        >
                            Next
                        </button>
                    </div> */}
            </div>
        </div>
    );
};

export default AutoExcel;
