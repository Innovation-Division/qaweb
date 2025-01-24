
  
    <div class="col-md-12_ break-two"> <br> </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-2 offset-md-4">
                <p class="text-start text-label-default" style="margin-left:0.188rem !important;"> From <span class="text-danger">*</span></p>
                <input id="destination_from_cruise" name="destination_from_cruise" type="text" autocomplete="off"  class="date1_cruise cp-spacing-input date_calendar" placeholder="Select Date" readonly onchange="DateFromChange()" />
            
                <svg class="icon-from_cruise icon-from-default_cruise" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                    <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z"/>
                </svg>

                <svg class="icon-from-checked_cruise" style="display: none" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                    <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1ZM8.604 7.354l-3 3a.502.502 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L5.25 9.293l2.646-2.647a.5.5 0 1 1 .708.708ZM1 4V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2H1Z"/>
                </svg>

            </div>
            @if (Agent::isMobile())
        @else
            <div style="position: absolute;float: center;left: 49.5%;top: 29%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" fill="none" viewBox="0 0 24 22">
                    <path stroke="#BBC1C7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.833 1.5 23 11m0 0-9.167 9.5M23 11H1"/>
                </svg>                
            </div>
        @endif
            <div class="col-md-2 text-end">
                <div class="form-group">
                    <p class="text-start destination-to-label" > Until <span class="text-danger">*</span></p>
                    <input id="destination_to_cruise" type="text" name="destination_to_cruise" autocomplete="off"  class="date2_cruise cp-spacing-input date_calendar" placeholder="Select Date" onkeydown="return false">
                    <svg class="icon-to_cruise icon-to-default_cruise" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                        <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z"/>
                    </svg>

                    <svg class="icon-to-checked_cruise" style="display:none" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                        <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1ZM8.604 7.354l-3 3a.502.502 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L5.25 9.293l2.646-2.647a.5.5 0 1 1 .708.708ZM1 4V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2H1Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>


    <div id="date-picker_cruise" class="date-picker_cruise">
        <div class="header">
            <select id="month_cruise" class="calendar-date-option"></select>
            <select id="year_cruise" class="calendar-date-option"></select>
        </div>
        <div class="days_cruise">
            <div class="day-name_cruise">Sun</div>
            <div class="day-name_cruise">Mon</div>
            <div class="day-name_cruise">Tue</div>
            <div class="day-name_cruise">Wed</div>
            <div class="day-name_cruise">Thu</div>
            <div class="day-name_cruise">Fri</div>
            <div class="day-name_cruise">Sat</div>
        </div>
        <div id="days_cruise" class="days_cruise"></div>
        <hr style="opacity: 0.1; ">
        <div class="buttons">
            <button id="close_cruise" type="button" class="calendar-close">Close</button>
            <button id="apply_cruise" type="button" class="calendar-apply btn" >Apply</button>
        </div>
    </div>
    @if (Agent::isMobile())
    <style>
        /* .icon-from-checked {
        position: absolute;
        right: 1.3rem !important;
        transform: translateY(-50%);
        pointer-events: none;
        margin-top: -2.7rem !important;
        height: 18px;
        width: 18px;
        } */

        .icon-from-checked_cruise {
            /* position: absolute;
            right: 1.3rem !important;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: -2.73rem !important;
            height: 18px;
            width: 18px; */
            transform: translateY(-50%) !important;
            pointer-events: none !important;
            height: 18px !important;
            width: 18px !important;
            position: relative !important;
            left: 92.5% !important;
            top: -48px !important;
            margin-top: 0px !important;
        }

        .icon-to-checked_cruise {
            /* position: absolute;
            right: 1.375rem !important;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: -2.667rem !important;
            height: 18px;
            width: 18px; */
            transform: translateY(-50%) !important;
            pointer-events: none !important;
            height: 18px !important;
            width: 18px !important;
            position: relative !important;
            left: -2% !important;
            top: -47px !important;
            margin-top: 0px !important;
        }
        /* .icon-to-checked {
            position: absolute;
            right: 1.3rem !important;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: -2.7rem !important;
            height: 18px;
            width: 18px;
        } */
    </style>
    @else
    <style>
        .date_calendar{
            width: 90% !important;
        }
        .icon-from_cruise {
            right: 3.2rem !important;
        }
        .destination-to-label{
            padding-left: 38px !important;
        }
    </style>
     
    @endif
    <style>
        .destination-to-label{
            margin: 0 !important;
            background-color: transparent;
            height: 12px;
            font-size: 10px;
            color: #848a90;
            padding-left: 11px !important;
        }
        .icon-from_cruise {
            position: absolute;
            right: 1.3rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.65rem;
            height: 18px;
            width: 18px;
        }

        .icon-from-checked_cruise {
            position: absolute;
            right: 3.3rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.67rem;
            height: 18px;
            width: 18px;
        }
        .icon-to_cruise {
            position: absolute;
            right: 1.375rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.65rem;
            height: 18px;
            width: 18px;
        }

        .icon-to-checked_cruise {
            position: absolute;
            right: 1.375rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.61rem;
            height: 18px;
            width: 18px;
        }
        .calendar-date-option{
            font-size: 14px;
            line-height: 24px;
            font-weight: 400;
            background: #ffffff !important;
            border-radius: 4px !important;
            border-style: solid !important;
            border-color: #eff2f4 !important;
            border-width: 1px !important;
            padding: 0rem 0px 0px 1rem !important;
            align-items: center !important;
            justify-content: flex-start !important;
            width: 120px !important;
            height: 32px !important;
            margin-left: 16px !important;
            font-family: "Inter-Medium", sans-serif;
        }
        .calendar-apply{
            background: #008080;
            border-radius: 3px;
            padding: 10px 20px 10px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 120px;
            position: relative;
            color: #ffffff;
            text-align: left;
            font-family: "Inter-Medium", sans-serif;
            font-size: 12px;
            line-height: 20px;
            font-weight: 500;
            position: relative;
            height: 40px;
        }

        .calendar-apply:hover{
            background: #fff;
            color:#008080;
            border:1px solid #008080;
        }

        .calendar-close{
            background: #fff;
            color:#008080;
            border:0px;
            border-radius: 3px;
            padding: 10px 20px 10px 20px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 120px;
            position: relative;
            text-align: left;
            font-family: "Inter-Medium", sans-serif;
            font-size: 12px;
            line-height: 20px;
            font-weight: 500;
            position: relative;
            height: 40px;
        }
        .date1_cruise, .date2_cruise {
            width: 150px;
            cursor: pointer;
        }

        .date-picker_cruise {
            display: none;
            position: absolute;
            border: 1px solid #ccc;
            background: white;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .day_cruise {
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s;
            display: inline-block;
            margin: 2px;
            width: 29px;
            height: 28px;
            padding: 6px 4px 10px 7px;
            color: #1d1f23;
            font-family: "Inter-Regular", sans-serif;
            font-size: 12px;
            line-height: 16px;
            font-weight: 400;
        }

        .day_cruise:hover {
            background-color: #008080;
            color: #fff;
        }

        .day_cruise.selected {
            background-color: #e4509a;
            color: white;
        }

        .day_cruise.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .days_cruise {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .day-name_cruise {
            text-align: center;
            color: #7a7f89;
            font-family: "Inter-Medium", sans-serif;
            font-size:  12px;
            line-height: 16px;
            font-weight: 500;
            position: relative;
        }

        .buttons_cruise {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
    <script>
        const yearSelect_cruise = document.getElementById('year_cruise');
        const monthSelect_cruise = document.getElementById('month_cruise');
        const daysContainer_cruise = document.getElementById('days_cruise');
        const date1Input_cruise = document.querySelector('.date1_cruise');
        const date2Input_cruise = document.querySelector('.date2_cruise');
        const datePicker_cruise = document.getElementById('date-picker_cruise');
        let date1InputOldVale_cruise = "";
        let date2InputOldVale_cruise = "";
        let activeInput_cruise = null;
        let activeCalendar_cruise = null;
        let date1Selected_cruise = null;
        let date2Selected_cruise = null;
        let dateselected1_cruise = null;
        let dateselected2_cruise = null;

        function populateYear_cruise() {
            const currentYear = new Date().getFullYear();
            for (let year = currentYear - 0; year <= currentYear + 10; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelect_cruise.appendChild(option);
            }
            yearSelect_cruise.value = currentYear; // Default to current year
        }

        function populateMonth_cruise() {
            const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            monthNames.forEach((month, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = month;
                monthSelect_cruise.appendChild(option);
            });
            monthSelect_cruise.value = new Date().getMonth(); // Default to current month
        }

        function updateDays_cruise() {
            $('#apply_cruise').prop('disabled', true);
            const year_cruise = parseInt(yearSelect_cruise.value);
            const month_cruise = parseInt(monthSelect_cruise.value);
            const daysInMonth_cruise = new Date(year_cruise, month_cruise + 1, 0).getDate();
            const firstDay_cruise = new Date(year_cruise, month_cruise, 1).getDay();
            daysContainer_cruise.innerHTML = '';
            // Fill in empty spaces for the first week
            for (let i = 0; i < firstDay_cruise; i++) {
                const emptyDiv_cruise = document.createElement('div');
                daysContainer_cruise.appendChild(emptyDiv_cruise);
            }

            const today = new Date();

            for (let day = 1; day <= daysInMonth_cruise; day++) {

                const dayDiv = document.createElement('div');
                const date = new Date(year_cruise, month_cruise, day);
                const dateString = `${year_cruise}-${String(month_cruise + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                dayDiv.textContent = day;
                dayDiv.classList.add('day_cruise');
              
                if (activeInput_cruise === date1Input_cruise) {
                    activeCalendar_cruise = 1;
                    // Date 1: Disable past dates

                    if (!date1Selected || !date2Selected || date < date1Selected || date > date2Selected) {
                        dayDiv.classList.add('disabled');
                        dayDiv.onclick = (e) => e.stopPropagation(); // Prevent selection
                    } else {
                        dayDiv.onclick = () => {
                            $('#apply_cruise').prop('disabled', false);
                            // Clear previously selected day for Date 1
                            const selectedDays = document.querySelectorAll('.day_cruise.selected');
                            selectedDays.forEach(selectedDay => selectedDay.classList.remove('selected'));

                            dayDiv.classList.add('selected'); // Mark the selected day
                            dateselected1_cruise = dateString;
                            // date1Input_cruise.value = dateString; // Update the input value
                            date1Selected_cruise = date; // Store the selected date

                        };
                    }
                } else if (activeInput_cruise === date2Input_cruise) {
                    activeCalendar_cruise = 2;
                        date1Selected_cruise=date1InputOldVale_cruise;
                        // if(date1InputOldVale_cruise){
                        //     const year = date1InputOldVale_cruise.getFullYear();          // Gets the full year (e.g., 2024)
                        //     const month = date1InputOldVale_cruise.getMonth();        // Gets the month (0-11, so add 1 for 1-12)
                        //     const day = date1InputOldVale_cruise.getDate(); 
                        //     const date1StringOld_cruise = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                        //     activeInput_cruise.value=date1StringOld_cruise;
                        // }
                    // if (!date1Selected_cruise || date < date1Selected_cruise) {
                        // if (!date1Selected_cruise || date < date1Selected_cruise) {
                    if (!date1Selected || !date2Selected || !date1Selected_cruise || date < date1Selected_cruise || date > date2Selected) {
                        dayDiv.classList.add('disabled');
                        dayDiv.onclick = (e) => e.stopPropagation(); // Prevent selection
                    } else {
                        dayDiv.onclick = () => {
                            $('#apply_cruise').prop('disabled', false);
                            const selectedDays = document.querySelectorAll('.day.selected');
                            selectedDays.forEach(selectedDay => selectedDay.classList.remove('selected'));
                            dayDiv.classList.add('selected'); // Mark the selected day
                            // date2Input_cruise.value = dateString; // Update the input value
                            date2Selected_cruise = date; // Store the selected date
                            dateselected2_cruise = dateString;

                            // date2Input_cruise.value = "";
                        };
                    }
                }

                daysContainer_cruise.appendChild(dayDiv);
            }
        }

       

        document.getElementById('close_cruise').onclick = () => {
            if(activeCalendar_cruise ==1){
                if(date1InputOldVale_cruise){
                    const year = date1InputOldVale_cruise.getFullYear();          // Gets the full year (e.g., 2024)
                    const month = date1InputOldVale_cruise.getMonth();        // Gets the month (0-11, so add 1 for 1-12)
                    const day = date1InputOldVale_cruise.getDate(); 
                    const date1StringOld = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    date1Input_cruise.value=date1StringOld;
                }else{
                    date1Input_cruise.value="";
                }
            }else{
                if(date2InputOldVale_cruise){
                    const year = date2InputOldVale_cruise.getFullYear();          // Gets the full year (e.g., 2024)
                    const month = date2InputOldVale_cruise.getMonth();        // Gets the month (0-11, so add 1 for 1-12)
                    const day = date2InputOldVale_cruise.getDate(); 
                    const date2StringOld = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    date2Input_cruise.value =date2StringOld;
                }else{
                    date2Input_cruise.value ="";
                }
            }
            datePicker_cruise.style.display = 'none';
        };

        monthSelect_cruise.onchange = updateDays_cruise;
        yearSelect_cruise.onchange = updateDays_cruise;

        

        

        date1Input_cruise.onfocus = () => {
            datePicker.style.display = 'none';
            activeInput_cruise = date1Input_cruise;
            const rect = date1Input_cruise.getBoundingClientRect();
            datePicker_cruise.style.display = 'block';
            datePicker_cruise.style.top = `${rect.bottom + window.scrollY-100}px`;
            datePicker_cruise.style.left = `${rect.left}px`;
            $('.icon-to-default_cruise').css('display', '');
            $('.icon-to-checked_cruise').css('display', 'none');
            updateDays_cruise();
        };

        date2Input_cruise.onfocus = () => {
            datePicker.style.display = 'none';
            activeInput_cruise = date2Input_cruise;
            const rect = date2Input_cruise.getBoundingClientRect();
            datePicker_cruise.style.display = 'block';
            datePicker_cruise.style.top = `${rect.bottom + window.scrollY-100}px`;
            datePicker_cruise.style.left = `${rect.left}px`;
            updateDays_cruise();
        };

        date1Input_cruise.onblur = date2Input_cruise.onblur = () => {
            setTimeout(() => {
                // datePicker.style.display = 'none'; // Hide date picker on blur
            }, 100);
        };

        // Prevent pasting into the textbox
        date1Input_cruise.onpaste = (e) => e.preventDefault();
        date2Input_cruise.onpaste = (e) => e.preventDefault();

        populateYear_cruise();
        populateMonth_cruise();
        updateDays_cruise();
    </script>

