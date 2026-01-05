import React, { useState, useRef, useEffect } from "react";

const DatePickerV3 = ({
     onDateSelect,
        minDate = null,
        maxDate = null,
        defaultValue = null,
        resetValue = false,
        errors = null,
    }) => {
        const [isOpen, setIsOpen] = useState(false);
        const [selectedDate, setSelectedDate] = useState(defaultValue);
        const [inputValue, setInputValue] = useState("");
        const [tempSelectedDate, setTempSelectedDate] = useState(defaultValue);
        const today = new Date();
        const latestValidDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
        const [currentMonth, setCurrentMonth] = useState(latestValidDate.getMonth());
        const [currentYear, setCurrentYear] = useState(latestValidDate.getFullYear());

        const datepickerRef = useRef(null);
        const inputRef = useRef(null);
    
        useEffect(() => {
            if (resetValue === true) {
                setSelectedDate(defaultValue);
                setTempSelectedDate(defaultValue);
                setInputValue(formatDate(defaultValue));
            }
        }, [resetValue]);
    
        const eighteenYearsAgo = new Date();
        eighteenYearsAgo.setFullYear(today.getFullYear() - 18);
        const latestEligibleYear = eighteenYearsAgo.getFullYear();
    
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
        const generateCalendarDays = (month, year) => {
            const daysInMonth = getDaysInMonth(month, year);
            const firstDayOfMonth = getFirstDayOfMonth(month, year);
            const prevMonthDays = getDaysInMonth(
                month === 0 ? 11 : month - 1,
                month === 0 ? year - 1 : year
            );
            const days = Array.from(
                { length: firstDayOfMonth },
                (_, i) => prevMonthDays - firstDayOfMonth + 1 + i
            );
            for (let i = 1; i <= daysInMonth; i++) days.push(i);
            const remainingDays = 42 - days.length;
            for (let i = 1; i <= remainingDays; i++) days.push(i);
            return days;
        };
    
const handleDateClick = (dayInfo) => {
    if (dayInfo.isCurrentMonth) {
        const selected = new Date(dayInfo.year, dayInfo.month, dayInfo.day);
        const isWithinMin = !minDate || selected >= minDate;
        const isWithinMax = selected <= today;
        if (isWithinMin && isWithinMax) {
            setSelectedDate(selected);
            setInputValue(formatDate(selected));
            onDateSelect(selected);
            setIsOpen(false); // Close the datepicker
        }
    }
};

    
        const handleInputChange = (event) => {
            return;
            // setInputValue(event.target.value);
            // Implement date parsing/validation if needed
        };
    
        const handleInputFocus = () => {
            setIsOpen(true);
        };
    
        useEffect(() => {
            const handleClickOutside = (event) => {
                if (
                    datepickerRef.current &&
                    !datepickerRef.current.contains(event.target) &&
                    inputRef.current !== event.target
                ) {
                    setIsOpen(false);
                    setTempSelectedDate(selectedDate);
                }
            };
            document.addEventListener("mousedown", handleClickOutside);
            return () =>
                document.removeEventListener("mousedown", handleClickOutside);
        }, [datepickerRef, inputRef, selectedDate]);
    
        const getDisplayedDaysInfo = (month, year) => {
            const daysInMonth = getDaysInMonth(month, year);
            const firstDayOfMonth = getFirstDayOfMonth(month, year);
            const prevMonthDays = getDaysInMonth(
                month === 0 ? 11 : month - 1,
                month === 0 ? year - 1 : year
            );
            const leadingDays = Array.from({ length: firstDayOfMonth }, (_, i) => ({
                day: prevMonthDays - firstDayOfMonth + 1 + i,
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
            const remainingDaysCount =
                42 - leadingDays.length - currentMonthDays.length;
            const nextMonthDays = Array.from(
                { length: remainingDaysCount },
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
    
        const isPastDate = (day, month, year) => {
            const currentDate = new Date(year, month, day);
            return currentDate < today;
        };
    
        const isBeforeMinDate = (day, month, year) => {
            return minDate && new Date(year, month, day) < minDate;
        };
    
        const isAfterMaxDate = (day, month, year) => {
            return maxDate && new Date(year, month, day) > maxDate;
        };
    
        const formatDate = (date) => {
            if (!date) return "";
            const options = { year: "numeric", month: "numeric", day: "numeric" };
            return date.toLocaleDateString(undefined, options);
        };
    
        useEffect(() => {
            if (selectedDate) {
                setInputValue(formatDate(selectedDate));
            }
        }, [selectedDate]);
    
        return (
            <div className="relative w-full">
                <div className="relative shadow-sm">
                    <input
                    type="text"
                    ref={inputRef}
                    value={inputValue}
                    onChange={handleInputChange}
                    onFocus={handleInputFocus}
                    onClick={handleInputFocus}
                    className="border-[#A8D9D9] text-[#2D2727] bg-[#FFFEFE] border w-full md:py-4 py-3 md:px-5 px-7 text-center focus:outline-none focus:ring-0 rounded focus:border-[#008080] md:text-xl text-base font-bold cursor-pointer"
                    placeholder="MM/DD/YYYY"
                    autoComplete="off"
                    />

                    <div className="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none mr-6">
                        {!errors && selectedDate ? (
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="currentColor"
                                className="bi bi-calendar2-check-fill md:w-[32px] w-[20px] md:h-[32px] h-[20px]">
  <path d="M26 4H23V3C23 2.73478 22.8946 2.48043 22.7071 2.29289C22.5196 2.10536 22.2652 2 22 2C21.7348 2 21.4804 2.10536 21.2929 2.29289C21.1054 2.48043 21 2.73478 21 3V4H11V3C11 2.73478 10.8946 2.48043 10.7071 2.29289C10.5196 2.10536 10.2652 2 10 2C9.73478 2 9.48043 2.10536 9.29289 2.29289C9.10536 2.48043 9 2.73478 9 3V4H6C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V26C4 26.5304 4.21071 27.0391 4.58579 27.4142C4.96086 27.7893 5.46957 28 6 28H26C26.5304 28 27.0391 27.7893 27.4142 27.4142C27.7893 27.0391 28 26.5304 28 26V6C28 5.46957 27.7893 4.96086 27.4142 4.58579C27.0391 4.21071 26.5304 4 26 4ZM9 6V7C9 7.26522 9.10536 7.51957 9.29289 7.70711C9.48043 7.89464 9.73478 8 10 8C10.2652 8 10.5196 7.89464 10.7071 7.70711C10.8946 7.51957 11 7.26522 11 7V6H21V7C21 7.26522 21.1054 7.51957 21.2929 7.70711C21.4804 7.89464 21.7348 8 22 8C22.2652 8 22.5196 7.89464 22.7071 7.70711C22.8946 7.51957 23 7.26522 23 7V6H26V10H6V6H9ZM26 26H6V12H26V26ZM21.2075 15.2925C21.3005 15.3854 21.3742 15.4957 21.4246 15.6171C21.4749 15.7385 21.5008 15.8686 21.5008 16C21.5008 16.1314 21.4749 16.2615 21.4246 16.3829C21.3742 16.5043 21.3005 16.6146 21.2075 16.7075L15.2075 22.7075C15.1146 22.8005 15.0043 22.8742 14.8829 22.9246C14.7615 22.9749 14.6314 23.0008 14.5 23.0008C14.3686 23.0008 14.2385 22.9749 14.1171 22.9246C13.9957 22.8742 13.8854 22.8005 13.7925 22.7075L10.7925 19.7075C10.6049 19.5199 10.4994 19.2654 10.4994 19C10.4994 18.7346 10.6049 18.4801 10.7925 18.2925C10.9801 18.1049 11.2346 17.9994 11.5 17.9994C11.7654 17.9994 12.0199 18.1049 12.2075 18.2925L14.5 20.5863L19.7925 15.2925C19.8854 15.1995 19.9957 15.1258 20.1171 15.0754C20.2385 15.0251 20.3686 14.9992 20.5 14.9992C20.6314 14.9992 20.7615 15.0251 20.8829 15.0754C21.0043 15.1258 21.1146 15.1995 21.2075 15.2925Z" fill="#217B7E"/>
</svg>
                        ) : (
                            !errors && (
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="32"
                                height="32"
                                viewBox="0 0 32 32"
                                fill="currentColor"
                                className="bi bi-calendar-fill md:w-[32px] w-[20px] md:h-[32px] h-[20px]"
                                >
                                <path d="M26 4H23V3C23 2.73 22.89 2.48 22.71 2.29C22.52 2.11 22.27 2 22 2C21.73 2 21.48 2.11 21.29 2.29C21.11 2.48 21 2.73 21 3V4H11V3C11 2.73 10.89 2.48 10.71 2.29C10.52 2.11 10.27 2 10 2C9.73 2 9.48 2.11 9.29 2.29C9.11 2.48 9 2.73 9 3V4H6C5.47 4 4.96 4.21 4.59 4.59C4.21 4.96 4 5.47 4 6V26C4 26.53 4.21 27.04 4.59 27.41C4.96 27.79 5.47 28 6 28H26C26.53 28 27.04 27.79 27.41 27.41C27.79 27.04 28 26.53 28 26V6C28 5.47 27.79 4.96 27.41 4.59C27.04 4.21 26.53 4 26 4ZM9 6V7C9 7.27 9.11 7.52 9.29 7.71C9.48 7.89 9.73 8 10 8C10.27 8 10.52 7.89 10.71 7.71C10.89 7.52 11 7.27 11 7V6H21V7C21 7.27 21.11 7.52 21.29 7.71C21.48 7.89 21.73 8 22 8C22.27 8 22.52 7.89 22.71 7.71C22.89 7.52 23 7.27 23 7V6H26V10H6V6H9ZM26 26H6V12H26V26Z" fill="#217B7E" />
                                </svg>

                            )
                        )}
                        {errors && (
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none" className="md:w-[32px] w-[20px] md:h-[32px] h-[20px]">
  <path d="M26 4H23V3C23 2.73478 22.8946 2.48043 22.7071 2.29289C22.5196 2.10536 22.2652 2 22 2C21.7348 2 21.4804 2.10536 21.2929 2.29289C21.1054 2.48043 21 2.73478 21 3V4H11V3C11 2.73478 10.8946 2.48043 10.7071 2.29289C10.5196 2.10536 10.2652 2 10 2C9.73478 2 9.48043 2.10536 9.29289 2.29289C9.10536 2.48043 9 2.73478 9 3V4H6C5.46957 4 4.96086 4.21071 4.58579 4.58579C4.21071 4.96086 4 5.46957 4 6V26C4 26.5304 4.21071 27.0391 4.58579 27.4142C4.96086 27.7893 5.46957 28 6 28H26C26.5304 28 27.0391 27.7893 27.4142 27.4142C27.7893 27.0391 28 26.5304 28 26V6C28 5.46957 27.7893 4.96086 27.4142 4.58579C27.0391 4.21071 26.5304 4 26 4ZM9 6V7C9 7.26522 9.10536 7.51957 9.29289 7.70711C9.48043 7.89464 9.73478 8 10 8C10.2652 8 10.5196 7.89464 10.7071 7.70711C10.8946 7.51957 11 7.26522 11 7V6H21V7C21 7.26522 21.1054 7.51957 21.2929 7.70711C21.4804 7.89464 21.7348 8 22 8C22.2652 8 22.5196 7.89464 22.7071 7.70711C22.8946 7.51957 23 7.26522 23 7V6H26V10H6V6H9ZM26 26H6V12H26V26ZM21.2075 15.2925C21.3005 15.3854 21.3742 15.4957 21.4246 15.6171C21.4749 15.7385 21.5008 15.8686 21.5008 16C21.5008 16.1314 21.4749 16.2615 21.4246 16.3829C21.3742 16.5043 21.3005 16.6146 21.2075 16.7075L15.2075 22.7075C15.1146 22.8005 15.0043 22.8742 14.8829 22.9246C14.7615 22.9749 14.6314 23.0008 14.5 23.0008C14.3686 23.0008 14.2385 22.9749 14.1171 22.9246C13.9957 22.8742 13.8854 22.8005 13.7925 22.7075L10.7925 19.7075C10.6049 19.5199 10.4994 19.2654 10.4994 19C10.4994 18.7346 10.6049 18.4801 10.7925 18.2925C10.9801 18.1049 11.2346 17.9994 11.5 17.9994C11.7654 17.9994 12.0199 18.1049 12.2075 18.2925L14.5 20.5863L19.7925 15.2925C19.8854 15.1995 19.9957 15.1258 20.1171 15.0754C20.2385 15.0251 20.3686 14.9992 20.5 14.9992C20.6314 14.9992 20.7615 15.0251 20.8829 15.0754C21.0043 15.1258 21.1146 15.1995 21.2075 15.2925Z" fill="#217B7E"/>
</svg>
                        )}
                    </div>
    
                    {isOpen && (
                        <div
                            ref={datepickerRef}
                            className="absolute top-13 left-0 z-20 bg-white rounded-md border border-[#F2F2F2] w-35 md:min-w-80"
                        >
                            <div className="flex justify-center gap-2 items-center py-1 px-2">
                                <select
                                    className="block appearance-none w-auto bg-white border border-gray-300 text-gray-700 py-1 px-2 text-sm pr-8 rounded leading-tight focus:outline-none focus:border-teal-500"
                                    value={months[currentMonth]}
                                    onChange={(e) =>
                                        setCurrentMonth(months.indexOf(e.target.value))
                                    }
                                >
                                    {months.map((month, index) => {
                                        const disableMonth =
                                            currentYear === latestEligibleYear &&
                                            index > today.getMonth();

                                        return (
                                            <option
                                                key={month}
                                                value={month}
                                                disabled={disableMonth}
                                                className={disableMonth ? "text-gray-400" : ""}
                                            >
                                                {month}
                                            </option>
                                        );
                                    })}
                                </select>

                                <div className="relative">
                                    <select
                                        className="block appearance-none w-32 bg-white border border-gray-300 text-gray-700 py-1 px-2 text-sm pr-8 rounded leading-tight focus:outline-none focus:border-teal-500"
                                        value={currentYear}
                                        onChange={(e) =>
                                            setCurrentYear(parseInt(e.target.value))
                                        }
                                    >
                                         {Array.from(
                                            { length: (today.getFullYear() - 18) - 1950 + 1 },
                                            (_, i) => 1950 + i
                                        ).map((year) => (
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
                            <div className="grid grid-cols-7 gap-1 p-5 pt-1 text-xs">

                                {displayedDays.map((dayInfo, index) => {
                                    const isSelected =
                                        tempSelectedDate?.getDate() ===
                                            dayInfo.day &&
                                        tempSelectedDate?.getMonth() ===
                                            dayInfo.month &&
                                        tempSelectedDate?.getFullYear() ===
                                            dayInfo.year &&
                                        dayInfo.isCurrentMonth;
                                    const isPast = isPastDate(
                                        dayInfo.day,
                                        dayInfo.month,
                                        dayInfo.year
                                    );
                                    const isBeforeMin = isBeforeMinDate(
                                        dayInfo.day,
                                        dayInfo.month,
                                        dayInfo.year
                                    );
                                    const isAfterMax = isAfterMaxDate(
                                        dayInfo.day,
                                        dayInfo.month,
                                        dayInfo.year
                                    );
                                    const dayDate = new Date(dayInfo.year, dayInfo.month, dayInfo.day);
                                const isFuture = dayDate > today;

                                const eighteenYearsAgo = new Date();
                                eighteenYearsAgo.setFullYear(today.getFullYear() - 18);
                                const isUnder18 = dayDate > eighteenYearsAgo;

                                const isDisabled =
                                    !dayInfo.isCurrentMonth ||
                                    isBeforeMinDate(dayInfo.day, dayInfo.month, dayInfo.year) ||
                                    isAfterMaxDate(dayInfo.day, dayInfo.month, dayInfo.year) ||
                                    isFuture ||
                                    isUnder18;

                                    const dayclassName = `flex items-center justify-center w-5 h-5 rounded-full cursor-pointer text-center text-xs outline-none focus:outline-none ${
                                        dayInfo.isCurrentMonth && !isDisabled
                                            ? "text-[#1D1F23] hover:text-[#008080]"
                                            : "text-gray-300 cursor-default"
                                    } ${
                                        isSelected
                                            ? "bg-pink-500 !text-white font-medium"
                                            : ""
                                    } ${
                                        isDisabled
                                            ? "cursor-not-allowed text-gray-400"
                                            : ""
                                    }`;
    
                                    return (
                                        <button
                                        key={index}
                                        onClick={() => handleDateClick(dayInfo)}
                                        disabled={isDisabled}
                                        className={`flex items-center justify-center w-7 h-7 rounded-full cursor-pointer text-center text-sm outline-none focus:outline-none
                                            ${isDisabled ? "text-gray-300 cursor-not-allowed" : "hover:text-white hover:bg-[#008080]"}
                                            ${isSelected ? "bg-teal-500 text-white" : ""}
                                        `}
                                        >
                                        {dayInfo.day}
                                        </button>

                                    );
                                })}
                            </div>
                        </div>
                    )}
                </div>
            </div>
        );
    };
export default DatePickerV3