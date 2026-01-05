import React, { useState, useEffect } from "react";
import Chart from "react-apexcharts";
import "../../assets/css/dashboardStyle.css";

const initialChartData = [
    {
        value: 24,
        label: "Product Lines",
        amount: 200000,
        count: 142,
        color: "#55A630",
    }, // Green
    {
        value: 11,
        label: "Excel Plus Packages",
        amount: 450000,
        count: 210,
        color: "#E9B824",
    }, // Yellow
    {
        value: 39,
        label: "Microinsurance",
        amount: 750000,
        count: 340,
        color: "#2A9D8F",
    }, // Teal-green
    {
        value: 26,
        label: "Miscellaneous Packages",
        amount: 2750000,
        count: 298,
        color: "#087F8F",
    }, // Dark Teal
];

const Dashboard = () => {
    const [series] = useState(initialChartData.map((item) => item.value));
    const [labels] = useState(initialChartData.map((item) => item.label));

    // --- 3. Define Chart Options ---
    const getChartOptions = () => {
        return {
            series: series,
            labels: labels, // Ensures legend names are correct
            colors: initialChartData.map((item) => item.color), // Use colors from initialChartData
            chart: {
                height: 350,
                type: "donut",
            },
            // --- Data Labels (Percentages on slices) ---
            dataLabels: {
                enabled: true, // Show labels on the donut slices
                formatter: function (val) {
                    return `${val.toFixed(0)}%`; // Format as integer percentage
                },
                style: {
                    fontSize: "14px",
                    colors: ["#fff"], // White text for better contrast
                    fontFamily: "Inter, sans-serif",
                },
                dropShadow: {
                    enabled: true,
                    color: "#000",
                    opacity: 0.25,
                },
            },
            // --- Legend Configuration (Right side with custom content) ---
            legend: {
                show: true, // Display the legend
                position: "right", // Place it on the right side of the chart
                horizontalAlign: "left", // Align text to the left
                itemMargin: {
                    horizontal: 10,
                    vertical: 5,
                },
                markers: {
                    // Style for the color squares next to each legend item
                    width: 12,
                    height: 12,
                    radius: 6,
                },
                // --- CUSTOM LEGEND FORMATTER with Tailwind Classes ---
                formatter: function (seriesName, opts) {
                    const dataItem = initialChartData.find(
                        (item) => item.label === seriesName
                    );
                    const amount = dataItem ? dataItem.amount : 0;
                    const count = dataItem ? dataItem.count : 0;

                    return `
            <div class="flex justify-between items-start w-full text-gray-800 text-sm gap-3">
              <div class="flex items-start gap-2">
                <div class="flex flex-col">
                  <span class="text-gray-700 whitespace-nowrap text-xs md:text-base">${seriesName}</span>
                  <span class="text-[10px] md:text-xs font-medium text-gray-600 whitespace-nowrap">₱${amount.toLocaleString(
                      undefined,
                      { minimumFractionDigits: 2, maximumFractionDigits: 2 }
                  )}</span>
                </div>
              </div>
              <span class="font-medium md:font-bold text-gray-900 ml-auto flex-shrink-0 text-sm md:text-base">${count}</span>
            </div>
          `;
                },
                textAnchor: "start",
                labels: {
                    useSeriesColors: false,
                },
                fontSize: "12px",
                fontFamily: "Inter, sans-serif",
                fontWeight: 400,
                onItemClick: {
                    toggleDataSeries: true,
                },
                onItemHover: {
                    highlightDataSeries: true,
                },
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "65%", // Size of the donut hole
                        labels: {
                            show: false, // Hide the default labels inside the donut hole
                        },
                    },
                },
            },
            stroke: {
                width: 0, // No border between donut slices
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return `${val}%`; // Display as percentage in tooltip
                    },
                },
            },
        };
    };
    ///BAR CHART
    const options = {
        series: [
            {
                name: "Current Year",
                color: "#2FA3A7",
                data: ["1420", "1620", "1820", "1420", "1650", "2120"],
            },
            {
                name: "Past Year",
                data: ["788", "810", "866", "788", "1100", "1200"],
                color: "#0A4E75",
            },
        ],
        chart: {
            stacked: true,
            sparkline: {
                enabled: false,
            },
            type: "bar",
            width: "100%",
            height: 400,
            toolbar: {
                show: false,
            },
        },
        fill: {
            opacity: 1,
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: "100%",
                borderRadiusApplication: "end",
                borderRadius: 6,
                dataLabels: {
                    position: "top",
                },
            },
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: "left",
            fontSize: "14px",
            fontFamily: "Inter, sans-serif",
            fontWeight: 500,
            labels: {
                colors: "#303030",
            },
            markers: {
                width: 12,
                height: 12,
                radius: 6,
            },
            itemMargin: {
                horizontal: 10,
                vertical: 5,
            },
            onItemClick: {
                toggleDataSeries: true,
            },
            onItemHover: {
                highlightDataSeries: true,
            },
        },
        dataLabels: {
            enabled: false,
        },
        tooltip: {
            shared: true,
            intersect: false,
            formatter: function (value) {
                return "₱" + value;
            },
        },
        xaxis: {
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass:
                        "text-xs font-normal fill-gray-500 dark:fill-gray-400",
                },
                formatter: function (value) {
                    return "₱" + value;
                },
            },
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass:
                        "text-xs font-normal fill-gray-500 dark:fill-gray-400",
                },
            },
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -20,
            },
            xaxis: {
                lines: {
                    show: true,
                },
            },
            yaxis: {
                lines: {
                    show: false,
                },
            },
        },
    };
    return (
        <div className="flex flex-col md:gap-6 w-full md:px-5 py-5">
            <div className="bg-white p-6 w-full flex flex-col gap-2 shadow-sm">
                <p className="text-[#303030] font-medium text-[23px]">
                    Hello, John Doe
                </p>
                <p className="text-[#3B3939] font-medium text-lg">
                    Here's your latest updates
                </p>
            </div>
            <div className="grid grid-cols-3 md:grid-cols-5 gap-2 md:gap-10 bg-white mb-5 px-5 md:px-0 md:bg-transparent pb-4 md:pb-0">
                <div className="bg-white py-3 md:py-6 px-4 md:px-8 flex flex-col border border-[#F2F2F2]">
                    <p className="text-[#2D2727] font-medium text-[20px] md:text-[30px]">
                        35
                    </p>
                    <p className="text-[#585858] font-medium text-xs md:text-sm">
                        Active Clients
                    </p>
                </div>
                <div className="bg-white py-3 md:py-6 px-4 md:px-8 flex flex-col border border-[#F2F2F2]">
                    <p className="text-[#2D2727] font-medium text-[20px] md:text-[30px]">
                        54
                    </p>
                    <p className="text-[#585858] font-medium text-xs md:text-sm">
                        Active Policies
                    </p>
                </div>
                <div className="bg-white py-3 md:py-6 px-4 md:px-8 flex flex-col border border-[#F2F2F2]">
                    <p className="text-[#2D2727] font-medium text-[20px] md:text-[30px]">
                        20
                    </p>
                    <p className="text-[#585858] font-medium text-xs md:text-sm">
                        Quotations
                    </p>
                </div>
                <div className="bg-white py-3 md:py-6 px-4 md:px-8 flex flex-col border border-[#F2F2F2]">
                    <p className="text-[#2D2727] font-medium text-[20px] md:text-[30px]">
                        90
                    </p>
                    <p className="text-[#585858] font-medium text-xs md:text-sm">
                        Claims
                    </p>
                </div>
                <div className="bg-white py-3 md:py-6 px-4 md:px-8 flex flex-col border border-[#F2F2F2]">
                    <p className="text-[#2D2727] font-medium text-[20px] md:text-[30px]">
                        56
                    </p>
                    <p className="text-[#585858] font-medium text-xs md:text-sm">
                        Reports
                    </p>
                </div>
            </div>
            <div className="flex flex-col md:flex-row justify-between items-center gap-8 mb-5 md:mb-0">
                <div className="flex flex-col bg-white px-5 py-6 gap-4 shadow-sm w-full">
                    <p className="text-[23px] font-medium text-[#2D2727]">
                        Total Earnings
                    </p>
                    <div className="border rounded-lg flex flex-col items-center justify-between py-20 gap-4">
                        <p className="text-[#111111] font-medium text-[30px]">
                            ₱205,750.00
                        </p>
                        <p className="flex items-center gap-3 text-[#585858] font-medium text-sm">
                            <svg
                                width="17"
                                height="18"
                                viewBox="0 0 17 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M8.5 0.875C6.89303 0.875 5.32214 1.35152 3.986 2.24431C2.64985 3.1371 1.60844 4.40605 0.993482 5.8907C0.37852 7.37535 0.217618 9.00901 0.531123 10.5851C0.844628 12.1612 1.61846 13.6089 2.75476 14.7452C3.89106 15.8815 5.3388 16.6554 6.9149 16.9689C8.49099 17.2824 10.1247 17.1215 11.6093 16.5065C13.094 15.8916 14.3629 14.8502 15.2557 13.514C16.1485 12.1779 16.625 10.607 16.625 9C16.6227 6.84581 15.766 4.78051 14.2427 3.25727C12.7195 1.73403 10.6542 0.877275 8.5 0.875ZM4.2875 14.4297C4.73964 13.7226 5.36251 13.1406 6.09869 12.7375C6.83488 12.3345 7.66069 12.1232 8.5 12.1232C9.33932 12.1232 10.1651 12.3345 10.9013 12.7375C11.6375 13.1406 12.2604 13.7226 12.7125 14.4297C11.5081 15.3664 10.0258 15.8749 8.5 15.8749C6.9742 15.8749 5.49193 15.3664 4.2875 14.4297ZM6 8.375C6 7.88055 6.14663 7.3972 6.42133 6.98607C6.69603 6.57495 7.08648 6.25452 7.54329 6.0653C8.00011 5.87608 8.50278 5.82657 8.98773 5.92304C9.47268 6.0195 9.91814 6.2576 10.2678 6.60723C10.6174 6.95686 10.8555 7.40232 10.952 7.88727C11.0484 8.37223 10.9989 8.87489 10.8097 9.33171C10.6205 9.78852 10.3001 10.179 9.88893 10.4537C9.47781 10.7284 8.99446 10.875 8.5 10.875C7.83696 10.875 7.20108 10.6116 6.73224 10.1428C6.2634 9.67393 6 9.03804 6 8.375ZM13.6375 13.5633C12.9404 12.5532 11.9603 11.7717 10.8203 11.3172C11.4327 10.8349 11.8795 10.1737 12.0987 9.4257C12.3179 8.67766 12.2985 7.87992 12.0433 7.1434C11.7881 6.40687 11.3097 5.76819 10.6746 5.31616C10.0396 4.86414 9.27949 4.62123 8.5 4.62123C7.72052 4.62123 6.9604 4.86414 6.32536 5.31616C5.69033 5.76819 5.21193 6.40687 4.95671 7.1434C4.70149 7.87992 4.68212 8.67766 4.90131 9.4257C5.12049 10.1737 5.56734 10.8349 6.17969 11.3172C5.0397 11.7717 4.05956 12.5532 3.3625 13.5633C2.4817 12.5728 1.906 11.3488 1.70473 10.0387C1.50346 8.72856 1.6852 7.3882 2.22806 6.17898C2.77093 4.96977 3.65178 3.94326 4.76454 3.22308C5.8773 2.50289 7.17452 2.11972 8.5 2.11972C9.82549 2.11972 11.1227 2.50289 12.2355 3.22308C13.3482 3.94326 14.2291 4.96977 14.7719 6.17898C15.3148 7.3882 15.4966 8.72856 15.2953 10.0387C15.094 11.3488 14.5183 12.5728 13.6375 13.5633Z"
                                    fill="#60B3B3"
                                />
                            </svg>
                            Agent since May 2022
                        </p>
                    </div>
                    <div className="flex items-center justify-center gap-10">
                        <div className="flex gap-2">
                            <svg
                                width="15"
                                height="14"
                                viewBox="0 0 15 14"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M13.7393 6.70196L11.0967 9.00821L11.8883 12.4418C11.9302 12.6213 11.9182 12.8092 11.8539 12.9819C11.7896 13.1546 11.6758 13.3046 11.5268 13.413C11.3777 13.5214 11.2 13.5835 11.0158 13.5915C10.8317 13.5995 10.6493 13.553 10.4914 13.4578L7.49669 11.6414L4.50841 13.4578C4.35054 13.553 4.16813 13.5995 3.98398 13.5915C3.79983 13.5835 3.62212 13.5214 3.47306 13.413C3.324 13.3046 3.2102 13.1546 3.1459 12.9819C3.0816 12.8092 3.06965 12.6213 3.11154 12.4418L3.90197 9.01172L1.2588 6.70196C1.119 6.58139 1.01791 6.42222 0.96821 6.24443C0.918507 6.06663 0.922403 5.87812 0.979411 5.70253C1.03642 5.52694 1.144 5.37209 1.28866 5.2574C1.43332 5.1427 1.60863 5.07328 1.79259 5.05782L5.27658 4.75606L6.63654 1.51231C6.70756 1.3421 6.82735 1.19672 6.98083 1.09445C7.1343 0.992189 7.31461 0.937622 7.49904 0.937622C7.68346 0.937622 7.86377 0.992189 8.01725 1.09445C8.17073 1.19672 8.29052 1.3421 8.36154 1.51231L9.7256 4.75606L13.2084 5.05782C13.3924 5.07328 13.5677 5.1427 13.7123 5.2574C13.857 5.37209 13.9646 5.52694 14.0216 5.70253C14.0786 5.87812 14.0825 6.06663 14.0328 6.24443C13.9831 6.42222 13.882 6.58139 13.7422 6.70196H13.7393Z"
                                    fill="#F5BC16"
                                />
                            </svg>
                            <div className="flex flex-col gap-2">
                                <p className="text-[#585858] text-xs font-medium">
                                    Top Selling
                                </p>
                                <p className="text-[#2D2727] text-xs font-medium">
                                    Motor, Bonds
                                </p>
                            </div>
                        </div>
                        <div className="flex gap-2">
                            <svg
                                width="13"
                                height="13"
                                viewBox="0 0 13 13"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M12.5 11.8431C12.5524 11.9128 12.5843 11.9956 12.5923 12.0824C12.6002 12.1692 12.5837 12.2565 12.5448 12.3345C12.5058 12.4124 12.4459 12.478 12.3718 12.5238C12.2976 12.5696 12.2122 12.5938 12.125 12.5937H0.875C0.787948 12.5937 0.702615 12.5695 0.628564 12.5237C0.554513 12.4779 0.494668 12.4125 0.455737 12.3346C0.416806 12.2567 0.400326 12.1696 0.408144 12.0829C0.415962 11.9962 0.447769 11.9133 0.5 11.8437C0.915069 11.2872 1.46857 10.8491 2.10547 10.5728C1.75635 10.2542 1.51174 9.83744 1.40372 9.37728C1.29571 8.91713 1.32934 8.43507 1.50021 7.99438C1.67109 7.55369 1.97121 7.17496 2.36119 6.90789C2.75117 6.64083 3.21279 6.49792 3.68545 6.49792C4.15811 6.49792 4.61972 6.64083 5.00971 6.90789C5.39969 7.17496 5.69981 7.55369 5.87069 7.99438C6.04156 8.43507 6.07519 8.91713 5.96718 9.37728C5.85916 9.83744 5.61454 10.2542 5.26543 10.5728C5.72493 10.7714 6.1425 11.0556 6.4959 11.4101C6.8493 11.0556 7.26686 10.7714 7.72637 10.5728C7.37725 10.2542 7.13263 9.83744 7.02462 9.37728C6.9166 8.91713 6.95024 8.43507 7.12111 7.99438C7.29198 7.55369 7.59211 7.17496 7.98209 6.90789C8.37207 6.64083 8.83369 6.49792 9.30635 6.49792C9.77901 6.49792 10.2406 6.64083 10.6306 6.90789C11.0206 7.17496 11.3207 7.55369 11.4916 7.99438C11.6625 8.43507 11.6961 8.91713 11.5881 9.37728C11.4801 9.83744 11.2354 10.2542 10.8863 10.5728C11.5262 10.8476 12.0826 11.2857 12.5 11.8431ZM0.59375 6.40621C0.642996 6.44314 0.699034 6.47001 0.758665 6.48529C0.818297 6.50057 0.880353 6.50395 0.941291 6.49525C1.00223 6.48654 1.06086 6.46592 1.11383 6.43456C1.16679 6.40319 1.21307 6.3617 1.25 6.31246C1.53381 5.93405 1.90182 5.62691 2.3249 5.41537C2.74797 5.20384 3.21449 5.09371 3.6875 5.09371C4.16051 5.09371 4.62703 5.20384 5.0501 5.41537C5.47318 5.62691 5.84119 5.93405 6.125 6.31246C6.16866 6.37067 6.22528 6.41793 6.29037 6.45047C6.35546 6.48301 6.42723 6.49996 6.5 6.49996C6.57277 6.49996 6.64454 6.48301 6.70963 6.45047C6.77472 6.41793 6.83134 6.37067 6.875 6.31246C7.15881 5.93405 7.52682 5.62691 7.9499 5.41537C8.37297 5.20384 8.83949 5.09371 9.3125 5.09371C9.78551 5.09371 10.252 5.20384 10.6751 5.41537C11.0982 5.62691 11.4662 5.93405 11.75 6.31246C11.787 6.3617 11.8333 6.40318 11.8863 6.43453C11.9393 6.46588 11.998 6.48648 12.0589 6.49516C12.1199 6.50384 12.182 6.50042 12.2416 6.48511C12.3013 6.4698 12.3573 6.44289 12.4065 6.40591C12.4558 6.36894 12.4973 6.32263 12.5286 6.26963C12.56 6.21662 12.5806 6.15796 12.5892 6.097C12.5979 6.03603 12.5945 5.97396 12.5792 5.91431C12.5639 5.85466 12.537 5.79862 12.5 5.74937C12.0849 5.19304 11.5314 4.75508 10.8945 4.47906C11.2436 4.16043 11.4883 3.74369 11.5963 3.28353C11.7043 2.82338 11.6707 2.34132 11.4998 1.90063C11.3289 1.45994 11.0288 1.08121 10.6388 0.814145C10.2488 0.547084 9.78721 0.404175 9.31455 0.404175C8.84189 0.404175 8.38028 0.547084 7.99029 0.814145C7.60031 1.08121 7.30019 1.45994 7.12931 1.90063C6.95844 2.34132 6.92481 2.82338 7.03282 3.28353C7.14084 3.74369 7.38546 4.16043 7.73457 4.47906C7.27507 4.67768 6.8575 4.96182 6.5041 5.31636C6.1507 4.96182 5.73314 4.67768 5.27363 4.47906C5.62275 4.16043 5.86737 3.74369 5.97538 3.28353C6.0834 2.82338 6.04976 2.34132 5.87889 1.90063C5.70802 1.45994 5.40789 1.08121 5.01791 0.814145C4.62793 0.547084 4.16631 0.404175 3.69365 0.404175C3.22099 0.404175 2.75938 0.547084 2.3694 0.814145C1.97941 1.08121 1.67929 1.45994 1.50842 1.90063C1.33754 2.34132 1.30391 2.82338 1.41192 3.28353C1.51994 3.74369 1.76456 4.16043 2.11367 4.47906C1.47378 4.7541 0.917336 5.19234 0.5 5.74996C0.463066 5.7992 0.436193 5.85524 0.420916 5.91487C0.405638 5.9745 0.402256 6.03656 0.410961 6.0975C0.419667 6.15844 0.44029 6.21706 0.471653 6.27003C0.503016 6.323 0.544505 6.36927 0.59375 6.40621Z"
                                    fill="#003592"
                                />
                            </svg>

                            <div className="flex flex-col gap-2">
                                <p className="text-[#585858] text-xs font-medium">
                                    Client Demographics
                                </p>
                                <p className="text-[#2D2727] text-xs font-medium">
                                    NCR, REG 3, 5
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="flex flex-col bg-white px-5 py-6 gap-4 shadow-sm w-full">
                    <p className="text-[23px] font-medium text-[#2D2727]">
                        Your sales in 2024
                    </p>
                    <div className="border rounded-lg flex flex-col items-center justify-between py-7 gap-4">
                        <div className="flex items-center gap-4">
                            <p className="text-[#111111] font-medium text-[30px]">
                                April
                            </p>
                            <p className="text-[#585858] font-medium py-1 px-4 rounded-full bg-[#F2F2F2]">
                                ₱86,050.00
                            </p>
                        </div>

                        <p className="flex items-center gap-3 text-[#585858] font-medium text-sm">
                            <svg
                                width="20"
                                height="12"
                                viewBox="0 0 20 12"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M10 2.875C9.38193 2.875 8.77775 3.05828 8.26384 3.40166C7.74994 3.74504 7.3494 4.2331 7.11288 4.80411C6.87635 5.37513 6.81447 6.00347 6.93505 6.60966C7.05562 7.21585 7.35325 7.77267 7.79029 8.20971C8.22733 8.64675 8.78415 8.94438 9.39034 9.06495C9.99653 9.18553 10.6249 9.12365 11.1959 8.88712C11.7669 8.6506 12.255 8.25006 12.5983 7.73616C12.9417 7.22225 13.125 6.61807 13.125 6C13.125 5.1712 12.7958 4.37634 12.2097 3.79029C11.6237 3.20424 10.8288 2.875 10 2.875ZM10 7.875C9.62916 7.875 9.26665 7.76503 8.95831 7.55901C8.64996 7.35298 8.40964 7.06014 8.26773 6.71753C8.12581 6.37492 8.08868 5.99792 8.16103 5.63421C8.23337 5.27049 8.41195 4.9364 8.67417 4.67417C8.9364 4.41195 9.27049 4.23337 9.63421 4.16103C9.99792 4.08868 10.3749 4.12581 10.7175 4.26773C11.0601 4.40964 11.353 4.64996 11.559 4.95831C11.765 5.26665 11.875 5.62916 11.875 6C11.875 6.49728 11.6775 6.97419 11.3258 7.32583C10.9742 7.67746 10.4973 7.875 10 7.875ZM18.75 0.375H1.25C1.08424 0.375 0.925268 0.440848 0.808058 0.558058C0.690848 0.675269 0.625 0.83424 0.625 1V11C0.625 11.1658 0.690848 11.3247 0.808058 11.4419C0.925268 11.5592 1.08424 11.625 1.25 11.625H18.75C18.9158 11.625 19.0747 11.5592 19.1919 11.4419C19.3092 11.3247 19.375 11.1658 19.375 11V1C19.375 0.83424 19.3092 0.675269 19.1919 0.558058C19.0747 0.440848 18.9158 0.375 18.75 0.375ZM15.1289 10.375H4.87109C4.66125 9.66531 4.27719 9.01941 3.75389 8.49611C3.23059 7.97281 2.58468 7.58875 1.875 7.37891V4.62109C2.58468 4.41125 3.23059 4.02719 3.75389 3.50389C4.27719 2.98059 4.66125 2.33468 4.87109 1.625H15.1289C15.3387 2.33468 15.7228 2.98059 16.2461 3.50389C16.7694 4.02719 17.4153 4.41125 18.125 4.62109V7.37891C17.4153 7.58875 16.7694 7.97281 16.2461 8.49611C15.7228 9.01941 15.3387 9.66531 15.1289 10.375ZM18.125 3.29453C17.3753 2.97218 16.7778 2.37466 16.4555 1.625H18.125V3.29453ZM3.54453 1.625C3.22218 2.37466 2.62466 2.97218 1.875 3.29453V1.625H3.54453ZM1.875 8.70547C2.62466 9.02782 3.22218 9.62534 3.54453 10.375H1.875V8.70547ZM16.4555 10.375C16.7778 9.62534 17.3753 9.02782 18.125 8.70547V10.375H16.4555Z"
                                    fill="#60B3B3"
                                />
                            </svg>
                            Highest Earning Month
                        </p>
                    </div>
                    <div className="border rounded-lg flex flex-col items-center justify-between py-7 gap-4">
                        <div className="flex items-center gap-4">
                            <p className="text-[#111111] font-medium text-[30px]">
                                Motor
                            </p>
                            <p className="text-[#585858] font-medium py-1 px-4 rounded-full bg-[#F2F2F2]">
                                45
                            </p>
                        </div>
                        <p className="flex items-center gap-3 text-[#585858] font-medium text-sm">
                            <svg
                                width="19"
                                height="16"
                                viewBox="0 0 19 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M18.2405 14.4781L17.1264 5.10313C17.0903 4.79767 16.9428 4.51626 16.7122 4.31274C16.4815 4.10922 16.184 3.99787 15.8764 4H13.249C13.249 3.00544 12.854 2.05161 12.1507 1.34835C11.4474 0.645088 10.4936 0.25 9.49905 0.25C8.50449 0.25 7.55066 0.645088 6.8474 1.34835C6.14414 2.05161 5.74905 3.00544 5.74905 4H3.11858C2.811 3.99787 2.51344 4.10922 2.28282 4.31274C2.0522 4.51626 1.90471 4.79767 1.86858 5.10313L0.754517 14.4781C0.734101 14.6531 0.7509 14.8304 0.803813 14.9984C0.856726 15.1665 0.944557 15.3214 1.06155 15.4531C1.17938 15.5854 1.32378 15.6913 1.48532 15.764C1.64686 15.8367 1.82191 15.8745 1.99905 15.875H16.9928C17.171 15.8754 17.3472 15.838 17.5099 15.7653C17.6726 15.6926 17.818 15.5862 17.9365 15.4531C18.053 15.3212 18.1402 15.1661 18.1926 14.9981C18.245 14.8301 18.2613 14.6529 18.2405 14.4781ZM9.49905 1.5C10.1621 1.5 10.798 1.76339 11.2668 2.23223C11.7357 2.70107 11.999 3.33696 11.999 4H6.99905C6.99905 3.33696 7.26244 2.70107 7.73128 2.23223C8.20012 1.76339 8.83601 1.5 9.49905 1.5ZM1.99905 14.625L3.11858 5.25H15.8858L16.9928 14.625H1.99905Z"
                                    fill="#60B3B3"
                                />
                            </svg>
                            Most Purchased Product
                        </p>
                    </div>
                </div>
            </div>
            <div className="flex flex-col md:flex-row justify-between gap-8 mb-5 md:mb-0">
                <div class="w-full bg-white rounded-lg shadow-sm p-4">
                    <div class="flex justify-between mb-3 w-full">
                        <h5 class="text-[23px] font-medium text-[#2D2727]">
                            Monthly Activity
                        </h5>
                        <span className="text-sm font-medium text-gray-500">
                            December
                        </span>
                    </div>

                    <div className="flex items-center justify-center w-full h-auto">
                        <div id="donut-chart" className="w-full">
                            <Chart
                                options={getChartOptions()}
                                series={series}
                                type="donut"
                                height={350}
                            />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col w-full bg-white rounded-lg shadow-sm p-4 md:p-6">
                    <div class="flex justify-between mb-3 w-full">
                        <h5 class="text-[23px] font-medium text-[#2D2727]">
                            Monthly Sales
                        </h5>
                        <span className="text-sm font-medium text-gray-500">
                            Showing bi-annual report
                        </span>
                    </div>

                    <div id="bar-chart" className="w-full">
                        <Chart
                            options={options}
                            series={options.series}
                            type="bar"
                            height={400}
                            width="100%"
                        />
                    </div>
                </div>
            </div>
            <div className="flex flex-col md:flex-row justify-between items-center gap-8">
                <div className="flex flex-col bg-white w-full p-6 gap-4">
                    <div className="flex justify-between items-center">
                        <p className="font-medium text-[#21272A]">
                            Latest Client
                        </p>
                        <p className="flex items-center gap-2 text-[#848A90] text-xs font-medium">
                            March 15 - April 15{" "}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-down"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </p>
                    </div>
                    <div className="flex justify-between w-full px-12 border-b">
                        <div className="flex flex-col gap-2 py-2">
                            <p className="text-[#2D2727] text-sm font-medium">
                                First Name Last Name
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                +917 309 4778
                            </p>
                        </div>
                        <div className="flex flex-col gap-2 py-2">
                            <p className="text-[#2D2727] text-sm font-medium">
                                Insurance Purchased
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                Date From - Until
                            </p>
                        </div>
                    </div>
                    <div className="flex justify-between w-full px-12 border-b">
                        <div className="flex flex-col gap-2 py-2">
                            <p className="text-[#2D2727] text-sm font-medium">
                                First Name Last Name
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                +917 309 4778
                            </p>
                        </div>
                        <div className="flex flex-col gap-2 py-2">
                            <p className="text-[#2D2727] text-sm font-medium">
                                Insurance Purchased
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                Date From - Until
                            </p>
                        </div>
                    </div>
                    <div className="flex justify-between w-full px-12 border-b">
                        <div className="flex flex-col gap-2 py-2">
                            <p className="text-[#2D2727] text-sm font-medium">
                                First Name Last Name
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                +917 309 4778
                            </p>
                        </div>
                        <div className="flex flex-col gap-2 py-2">
                            <p className="text-[#2D2727] text-sm font-medium">
                                Insurance Purchased
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                Date From - Until
                            </p>
                        </div>
                    </div>
                </div>
                <div className="flex flex-col bg-white w-full p-6 gap-4">
                    <div className="flex justify-between items-center">
                        <p className="font-medium text-[#21272A]">Drafts</p>
                        <p className="flex items-center gap-2 text-[#848A90] text-xs font-medium">
                            Yesterday{" "}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-down"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"
                                />
                            </svg>
                        </p>
                    </div>
                    <div className="flex justify-between w-full px-12 border-b">
                        <div className="flex flex-col gap-2 py-2">
                            <div className="flex gap-2">
                                <p className="w-32">Auto Excel Plus</p>{" "}
                                <span class="bg-[#CEE0FF] text-[#003592] text-xs font-medium me-2 px-2.5 py-1.5 rounded-full">
                                    Quotation
                                </span>
                            </div>
                            <p className="text-[10px] text-[#585858] font-medium">
                                For Client Name
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                Created on 05 January 10:12AM
                            </p>
                        </div>
                        <button className="text-[#008080] font-bold text-[10px]">
                            Continue
                        </button>
                    </div>
                    <div className="flex justify-between w-full px-12 border-b">
                        <div className="flex flex-col gap-2 py-2">
                            <div className="flex gap-2">
                                <p className="w-32">Report Title</p>{" "}
                                <span class="bg-[#FFF4DA] text-[#F5BC16] text-xs font-medium me-2 px-2.5 py-1.5 rounded-full">
                                    Report
                                </span>
                            </div>
                            <p className="text-[10px] text-[#585858] font-medium">
                                For Client Name
                            </p>
                            <p className="text-[10px] text-[#585858] font-medium">
                                Created on 05 January 10:12AM
                            </p>
                        </div>
                        <button className="text-[#008080] font-bold text-[10px]">
                            Continue
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Dashboard;
