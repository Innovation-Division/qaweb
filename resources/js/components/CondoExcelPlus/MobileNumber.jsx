import { useEffect, useState } from "react";

const MobileNumber = ({
    labelName = "Mobile",
    setMobile,
    setIsMobileValid,
    defaultValue = null,
    isError = false,
}) => {
    const [mobileNumber, setMobileNumber] = useState(defaultValue || "");
    const [error, setError] = useState("");

    const handleInputChange = (e) => {
        const { value } = e.target;

        if (value === "e") return;

        if (value.length > 11) {
            return;
        }

        const sanitizedValue = value.replace(/[^0-9\s]/g, "");

        setMobileNumber(sanitizedValue);

        // Validation logic
        if (!/^\d*$/.test(sanitizedValue)) {
            setError("Mobile number must contain only numbers.");
            setIsMobileValid(false);
        } else if (!sanitizedValue.startsWith("09")) {
            setError('Mobile number must start with "09".');
            setIsMobileValid(false);
        } else if (sanitizedValue.length !== 11) {
            setError("Mobile number must be 11 digits long.");
            setIsMobileValid(false);
        } else {
            setError("");
            setIsMobileValid(true);
        }

        setMobile(sanitizedValue);
    };

    useEffect(() => {
        if (mobileNumber) {
            if (!/^\d*$/.test(mobileNumber)) {
                setError("Mobile number must contain only numbers.");
                setIsMobileValid(false);
            } else if (!mobileNumber.startsWith("09")) {
                setError('Mobile number must start with "09".');
                setIsMobileValid(false);
            } else if (mobileNumber.length !== 11) {
                setError("Mobile number must be 11 digits long.");
                setIsMobileValid(false);
            } else {
                setError("");
                setIsMobileValid(true);
            }
        }
    }, [mobileNumber]);

    useEffect(() => {
        if (isError) {
            setError("Mobile number is required.");
            setIsMobileValid(false);
        } else {
            setError("");
            setIsMobileValid(true);
        }
    }, [isError]);

    useEffect(() => {
        if (defaultValue) {
            setMobileNumber(defaultValue);
            setMobile(defaultValue);
        }
    }, [defaultValue]);

    return (
        <label className="flex flex-col w-full">
            <span
                className={`after:content-['*'] after:ml-0.5 after:text-red-500 block text-[10px] ${
                    error ? "text-[#DD0707]" : "text-[#848A90]"
                }  px-3`}
            >
                {labelName}
            </span>
           <input
            type="text" 
            inputMode="numeric" 
            pattern="[0-9]*"
            onKeyDown={(evt) => {
                if (["e", "E", "+", "-", "."].includes(evt.key)) {
                    evt.preventDefault(); 
                }
            }}
            value={mobileNumber}
            onChange={handleInputChange}
            maxLength={11}
            className={`mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                error
                    ? "border-[#DD0707] focus:border-[#DD0707] placeholder-[#DD0707]"
                    : "border-[#006666] focus:border-[#006666] placeholder-slate-400 "
            } block w-full sm:text-sm focus:ring-0`}
            placeholder="09123456789"
        />
        </label>
    );
};

export default MobileNumber;
