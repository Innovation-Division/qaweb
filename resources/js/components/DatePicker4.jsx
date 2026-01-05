import { useState, useRef, useEffect } from "react";

const DatepickerWithOptionalMinMax = ({
    onDateSelect,
    minDate = null,
    maxDate = null,
    defaultValue = null,
    value = null,
    resetValue = false,
    errors = null,
}) => {
    const [isOpen, setIsOpen] = useState(false);
    const [selectedDate, setSelectedDate] = useState(null); // The date confirmed by "Apply"
    const [inputValue, setInputValue] = useState("");
    const [tempSelectedDate, setTempSelectedDate] = useState(null); // The date temporarily selected in the calendar
    const [currentMonth, setCurrentMonth] = useState(new Date().getMonth());
    const [currentYear, setCurrentYear] = useState(new Date().getFullYear());
    const datepickerRef = useRef(null);
    const inputRef = useRef(null);

    useEffect(() => {
        if (resetValue) {
            setSelectedDate(null);
            setInputValue("");
            setTempSelectedDate(null);
            setCurrentMonth(new Date().getMonth());
            setCurrentYear(new Date().getFullYear());
        }
    }, [resetValue]);

    useEffect(() => {
        if (maxDate) {
            setCurrentMonth(maxDate.getMonth());
            setCurrentYear(maxDate.getFullYear());
        }
    }, [maxDate]);

    useEffect(() => {
    if (value) {
        const parsed = new Date(value);
        if (!isNaN(parsed.getTime())) {
        setSelectedDate(parsed);
        setInputValue(formatDate(parsed));
        }
    } else {
        setSelectedDate(null);
        setInputValue("");
    }
    }, [value]);

    const normalizedMinDate = minDate
        ? new Date(minDate.getFullYear(), minDate.getMonth(), minDate.getDate())
        : null;
    const normalizedMaxDate = maxDate
        ? new Date(maxDate.getFullYear(), maxDate.getMonth(), maxDate.getDate())
        : null;

    const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    const getDaysInMonth = (month, year) =>
        new Date(year, month + 1, 0).getDate();
    const getFirstDayOfMonth = (month, year) =>
        new Date(year, month, 1).getDay();

    const getDisplayedDaysInfo = (month, year) => {
        const daysInMonth = getDaysInMonth(month, year);
        const firstDayOfMonth = getFirstDayOfMonth(month, year);
        const prevMonthDaysCount = getDaysInMonth(
            month === 0 ? 11 : month - 1,
            month === 0 ? year - 1 : year
        );

        const leadingDays = Array.from({ length: firstDayOfMonth }, (_, i) => ({
            day: prevMonthDaysCount - firstDayOfMonth + 1 + i,
            month: month === 0 ? 11 : month - 1,
            year: month === 0 ? year - 1 : year,
            isCurrentMonth: false,
        }));

        const currentMonthDays = Array.from(
            { length: daysInMonth },
            (_, i) => ({
                day: i + 1,
                month: month,
                year: year,
                isCurrentMonth: true,
            })
        );

        const totalDaysDisplayedSoFar =
            leadingDays.length + currentMonthDays.length;
        const trailingDaysNeeded =
            totalDaysDisplayedSoFar % 7 === 0
                ? 0
                : 7 - (totalDaysDisplayedSoFar % 7);

        const nextMonthDays = Array.from(
            { length: trailingDaysNeeded },
            (_, i) => ({
                day: i + 1,
                month: month === 11 ? 0 : month + 1,
                year: month === 11 ? year + 1 : year,
                isCurrentMonth: false,
            })
        );

        return [...leadingDays, ...currentMonthDays, ...nextMonthDays];
    };

    const displayedDays = getDisplayedDaysInfo(currentMonth, currentYear);

    const handleDateClick = (dayInfo) => {
        const clickedDate = new Date(dayInfo.year, dayInfo.month, dayInfo.day);
        const isWithinMin =
            !normalizedMinDate || clickedDate >= normalizedMinDate;
        const isWithinMax =
            !normalizedMaxDate || clickedDate <= normalizedMaxDate;

        if (dayInfo.isCurrentMonth && isWithinMin && isWithinMax) {
            setSelectedDate(clickedDate);
            onDateSelect(clickedDate);
            setInputValue(formatDate(clickedDate));

            // Use setTimeout with a 0ms delay to close the calendar after state updates
            setTimeout(() => {
                setIsOpen(false);
            }, 0);
        }
    };

    const handleInputChange = (event) => {
        setInputValue(event.target.value);
    };

    const handleInputFocus = () => {
        setIsOpen(true);
        if (selectedDate) {
            setCurrentMonth(selectedDate.getMonth());
            setCurrentYear(selectedDate.getFullYear());
        } else if (normalizedMaxDate) {
            setCurrentMonth(normalizedMaxDate.getMonth());
            setCurrentYear(normalizedMaxDate.getFullYear());
        } else {
            setCurrentMonth(new Date().getMonth());
            setCurrentYear(new Date().getFullYear());
        }
    };

    const isDateDisabled = (day, month, year) => {
        const dateToCheck = new Date(year, month, day);
        if (normalizedMinDate && dateToCheck < normalizedMinDate) {
            return true;
        }
        if (normalizedMaxDate && dateToCheck > normalizedMaxDate) {
            return true;
        }
        return false;
    };

    const formatDate = (date) => {
        if (!date) return "";
        const options = { year: "numeric", month: "numeric", day: "numeric" };
        return date.toLocaleDateString(undefined, options);
    };

    const goToPreviousMonth = () => {
        setCurrentMonth((prevMonth) => (prevMonth === 0 ? 11 : prevMonth - 1));
        setCurrentYear((prevYear) =>
            currentMonth === 0 ? prevYear - 1 : prevYear
        );
    };

    const goToNextMonth = () => {
        setCurrentMonth((prevMonth) => (prevMonth === 11 ? 0 : prevMonth + 1));
        setCurrentYear((prevYear) =>
            currentMonth === 11 ? prevYear + 1 : prevYear
        );
    };

    const getDynamicYearOptions = () => {
        let startYear = normalizedMinDate
            ? normalizedMinDate.getFullYear()
            : 1900; // default earliest year
        let endYear = normalizedMaxDate
            ? normalizedMaxDate.getFullYear()
            : new Date().getFullYear(); // default latest year

        const years = [];
        for (let year = startYear; year <= endYear; year++) {
            years.push(year);
        }
        return years;
    };

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (
                datepickerRef.current &&
                !datepickerRef.current.contains(event.target) &&
                inputRef.current !== event.target
            ) {
                setIsOpen(false);
            }
        };
        document.addEventListener("mousedown", handleClickOutside);
        return () =>
            document.removeEventListener("mousedown", handleClickOutside);
    }, [datepickerRef, inputRef]);

    useEffect(() => {
        if (defaultValue) {
            const parsedDate = new Date(defaultValue);
            if (!isNaN(parsedDate.getTime())) {
                setSelectedDate(parsedDate);
                setInputValue(formatDate(parsedDate));
                setTempSelectedDate(parsedDate);
            } else {
                console.error("Invalid defaultValue provided to DatePicker");
            }
        }
    }, [defaultValue]);

    return (
        <div className="relative w-full">
            <div className="relative shadow-sm">
                <input
                    ref={inputRef}
                    type="text"
                    id="datepickerInput"
                    className={`cursor-pointer mt-1 px-3 py-2 bg-transparent border-t-0 border-l-0 border-r-0 border-b ${
                        errors
                            ? "border-[#DD0707] placeholder-[#DD0707] text-[#DD0707]"
                            : "border-[#006666] placeholder-slate-400"
                    }    block w-full sm:text-sm focus:ring-0 focus:border-[#006666] focus:outline-none`}
                    placeholder="Select Date"
                    value={inputValue}
                    onChange={handleInputChange}
                    onFocus={handleInputFocus}
                    onClick={handleInputFocus}
                    autoComplete="off"
                    readOnly
                />
                <div className="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    {!errors && selectedDate ? (
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            fill="currentColor"
                            className="bi bi-calendar2-check-fill"
                            viewBox="0 0 16 16"
                        >
                            <path
                                fill="#309999"
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"
                            />
                        </svg>
                    ) : (
                        !errors && (
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="18"
                                height="18"
                                fill="currentColor"
                                className="bi bi-calendar-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill="#309999"
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5"
                                />
                            </svg>
                        )
                    )}
                    {errors && (
                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 12 13"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M11 1H9.5V0.5C9.5 0.367392 9.44732 0.240215 9.35355 0.146447C9.25979 0.0526784 9.13261 0 9 0C8.86739 0 8.74021 0.0526784 8.64645 0.146447C8.55268 0.240215 8.5 0.367392 8.5 0.5V1H3.5V0.5C3.5 0.367392 3.44732 0.240215 3.35355 0.146447C3.25979 0.0526784 3.13261 0 3 0C2.86739 0 2.74021 0.0526784 2.64645 0.146447C2.55268 0.240215 2.5 0.367392 2.5 0.5V1H1C0.734784 1 0.48043 1.10536 0.292893 1.29289C0.105357 1.48043 0 1.73478 0 2V12C0 12.2652 0.105357 12.5196 0.292893 12.7071C0.48043 12.8946 0.734784 13 1 13H11C11.2652 13 11.5196 12.8946 11.7071 12.7071C11.8946 12.5196 12 12.2652 12 12V2C12 1.73478 11.8946 1.48043 11.7071 1.29289C11.5196 1.10536 11.2652 1 11 1ZM7.85375 9.64625C7.90021 9.69271 7.93706 9.74786 7.9622 9.80855C7.98734 9.86925 8.00028 9.9343 8.00028 10C8.00028 10.0657 7.98734 10.1308 7.9622 10.1914C7.93706 10.2521 7.90021 10.3073 7.85375 10.3538C7.8073 10.4002 7.75214 10.4371 7.69145 10.4622C7.63075 10.4873 7.5657 10.5003 7.5 10.5003C7.4343 10.5003 7.36925 10.4873 7.30855 10.4622C7.24786 10.4371 7.1927 10.4002 7.14625 10.3538L6 9.20687L4.85375 10.3538C4.8073 10.4002 4.75214 10.4371 4.69145 10.4622C4.63075 10.4873 4.5657 10.5003 4.5 10.5003C4.4343 10.5003 4.36925 10.4873 4.30855 10.4622C4.24786 10.4371 4.1927 10.4002 4.14625 10.3538C4.09979 10.3073 4.06294 10.2521 4.0378 10.1914C4.01266 10.1308 3.99972 10.0657 3.99972 10C3.99972 9.9343 4.01266 9.86925 4.0378 9.80855C4.06294 9.74786 4.09979 9.69271 4.14625 9.64625L5.29313 8.5L4.14625 7.35375C4.05243 7.25993 3.99972 7.13268 3.99972 7C3.99972 6.86732 4.05243 6.74007 4.14625 6.64625C4.24007 6.55243 4.36732 6.49972 4.5 6.49972C4.63268 6.49972 4.75993 6.55243 4.85375 6.64625L6 7.79313L7.14625 6.64625C7.1927 6.59979 7.24786 6.56294 7.30855 6.5378C7.36925 6.51266 7.4343 6.49972 7.5 6.49972C7.5657 6.49972 7.63075 6.51266 7.69145 6.5378C7.75214 6.56294 7.8073 6.59979 7.85375 6.64625C7.90021 6.6927 7.93706 6.74786 7.9622 6.80855C7.98734 6.86925 8.00028 6.9343 8.00028 7C8.00028 7.0657 7.98734 7.13075 7.9622 7.19145C7.93706 7.25214 7.90021 7.3073 7.85375 7.35375L6.70687 8.5L7.85375 9.64625ZM11 4H1V2H2.5V2.5C2.5 2.63261 2.55268 2.75979 2.64645 2.85355C2.74021 2.94732 2.86739 3 3 3C3.13261 3 3.25979 2.94732 3.35355 2.85355C3.44732 2.75979 3.5 2.63261 3.5 2.5V2H8.5V2.5C8.5 2.63261 8.55268 2.75979 8.64645 2.85355C8.74021 2.94732 8.86739 3 9 3C9.13261 3 9.25979 2.94732 9.35355 2.85355C9.44732 2.75979 9.5 2.63261 9.5 2.5V2H11V4Z"
                                fill="#FFAFAF"
                            />
                        </svg>
                    )}
                </div>

                {isOpen && (
                    <div
                        ref={datepickerRef}
                        className="absolute top-11 left-0 z-20 bg-white rounded-md border border-[#F2F2F2] w-full md:min-w-80"
                    >
                        <div className="flex justify-center gap-3 items-center py-2 px-3">
                            <select
                                className="block appearance-none w-auto bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:border-teal-500"
                                value={months[currentMonth]}
                                onChange={(e) =>
                                    setCurrentMonth(
                                        months.indexOf(e.target.value)
                                    )
                                }
                            >
                                {months.map((month) => (
                                    <option key={month} value={month}>
                                        {month}
                                    </option>
                                ))}
                            </select>
                            <div className="relative">
                                <select
                                    className="block appearance-none w-32 bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:border-teal-500"
                                    value={currentYear}
                                    onChange={(e) =>
                                        setCurrentYear(parseInt(e.target.value))
                                    }
                                >
                                    {getDynamicYearOptions().map((year) => (
                                        <option key={year} value={year}>
                                            {year}
                                        </option>
                                    ))}
                                </select>
                            </div>
                        </div>
                        <div className="grid grid-cols-7 text-center text-xs text-[#7A7F89] p-5 pt-2 pb-0 font-medium">
                            {daysOfWeek.map((day) => (
                                <div key={day}>{day}</div>
                            ))}
                        </div>
                        <div className="grid grid-cols-7 gap-2 p-6 pt-2">
                            {displayedDays.map((dayInfo, index) => {
                                const isSelected =
                                    selectedDate?.getDate() === dayInfo.day &&
                                    selectedDate?.getMonth() ===
                                        dayInfo.month &&
                                    selectedDate?.getFullYear() ===
                                        dayInfo.year &&
                                    dayInfo.isCurrentMonth;
                                const isDisabled = isDateDisabled(
                                    dayInfo.day,
                                    dayInfo.month,
                                    dayInfo.year
                                );

                                const dayClass = `flex items-center justify-center w-7 h-7 rounded-full cursor-pointer text-center text-sm outline-none focus:outline-none ${
                                    dayInfo.isCurrentMonth && !isDisabled
                                        ? "text-gray-900"
                                        : "text-gray-300 cursor-default"
                                } ${
                                    isSelected
                                        ? "bg-[#008080] text-white font-semibold"
                                        : ""
                                } ${
                                    isDisabled
                                        ? "cursor-not-allowed text-gray-400"
                                        : ""
                                }`;

                                return (
                                    <button
                                        key={index}
                                        onClick={() => {
                                            !isDisabled &&
                                                dayInfo.isCurrentMonth &&
                                                handleDateClick(dayInfo);
                                            setIsOpen(false);
                                        }}
                                        className={dayClass}
                                        disabled={
                                            !dayInfo.isCurrentMonth ||
                                            isDisabled
                                        }
                                    >
                                        {dayInfo.day}
                                    </button>
                                );
                            })}
                        </div>
                        {/* <div className="flex justify-center items-center py-3 px-3 text-sm border-t w-full gap-2">
                            <button
                                onClick={handleCancelClick}
                                className="w-full px-4 py-3 rounded-md text-[#008080] font-medium hover:bg-gray-100 focus:outline-none focus:ring-0"
                            >
                                Close
                            </button>
                            <button
                                onClick={handleApplyClick}
                                disabled={
                                    !tempSelectedDate ||
                                    isDateDisabled(
                                        tempSelectedDate.getDate(),
                                        tempSelectedDate.getMonth(),
                                        tempSelectedDate.getFullYear()
                                    )
                                }
                                className={`w-full px-4 py-3 rounded text-white focus:outline-none focus:ring-0  ${
                                    tempSelectedDate &&
                                    !isDateDisabled(
                                        tempSelectedDate.getDate(),
                                        tempSelectedDate.getMonth(),
                                        tempSelectedDate.getFullYear()
                                    )
                                        ? "bg-[#008080] hover:bg-teal-600"
                                        : "bg-gray-400 cursor-not-allowed"
                                }`}
                            >
                                Apply
                            </button>
                        </div> */}
                    </div>
                )}
            </div>
        </div>
    );
};

export default DatepickerWithOptionalMinMax;
