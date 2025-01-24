
  
    <div class="col-md-12_ break-two"> <br> </div>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-2 offset-md-4">
                <p class="text-start text-label-default" style="margin-left:0.188rem !important;"> From <span class="text-danger">*</span></p>
                <input id="destination_from" name="destination_from" type="text" autocomplete="off"  class="date1 cp-spacing-input date_calendar section-3-validation" placeholder="Select Date" readonly onchange="DateFromChange()" />
            
                <svg class="icon-from icon-from-default" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                    <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z"/>
                </svg>

                <svg class="icon-from-checked" style="display: none" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
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
                <div class="form-group input-container-calendar-to">
                    <p class="text-start destination-to-label" > Until <span class="text-danger">*</span></p>
                    <input id="destination_to" type="text" name="destination_to" autocomplete="off"  class="date2 cp-spacing-input date_calendar section-3-validation" placeholder="Select Date" onkeydown="return false">
                    <svg class="icon-to icon-to-default" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                        <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z"/>
                    </svg>

                    <svg class="icon-to-checked" style="display:none" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                        <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1ZM8.604 7.354l-3 3a.502.502 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L5.25 9.293l2.646-2.647a.5.5 0 1 1 .708.708ZM1 4V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2H1Z"/>
                    </svg>
                    <div  id="error-message-calendar-until" style="display:none" >
                        <div class="error-message-calendar-to d-flex align-items-center" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 12 12">
                            <path fill="#dd0707" d="M6 1.125a4.875 4.875 0 1 0 0 9.75 4.875 4.875 0 0 0 0-9.75Zm0 9a4.125 4.125 0 1 1 0-8.25 4.125 4.125 0 0 1 0 8.25Zm.75-1.875a.375.375 0 0 1-.375.375.75.75 0 0 1-.75-.75V6a.375.375 0 0 1 0-.75.75.75 0 0 1 .75.75v1.875a.375.375 0 0 1 .375.375Zm-1.5-4.313a.562.562 0 1 1 1.125 0 .562.562 0 0 1-1.125 0Z"/>
                        </svg>

                            <label class="error-calendar-messages-label mb-0 ms-2">
                                Travel duration should not exceed 180 days
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    
</style>
    <div id="date-picker" class="date-picker">
        <div class="header">
            <select id="month" class="calendar-date-option"></select>
            <select id="year" class="calendar-date-option"></select>
        </div>
        <div class="days">
            <div class="day-name">Sun</div>
            <div class="day-name">Mon</div>
            <div class="day-name">Tue</div>
            <div class="day-name">Wed</div>
            <div class="day-name">Thu</div>
            <div class="day-name">Fri</div>
            <div class="day-name">Sat</div>
        </div>
        <div id="days" class="days"></div>
        <hr style="opacity: 0.1; ">
        <div class="buttons">
            <button id="close" type="button" class="calendar-close">Close</button>
            <button id="apply" type="button" class="calendar-apply btn" >Apply</button>
        </div>
    </div>
    @if (Agent::isMobile())
    <style>
        .icon-to {
            position: absolute;
            right: 0.375rem !important;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.65rem;
            height: 18px;
            width: 18px;
        }

        .icon-to-checked { 
            transform: translateY(-50%) !important;
            pointer-events: none !important;
            height: 18px !important;
            width: 18px !important;
            position: inherit !important;
            left: -2% !important;
            top: -47px !important;
            margin-top: 0px !important;
            /* position: absolute;
            right: 0.375rem !important;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: -2.7rem !important;
            height: 18px;
            width: 18px; */
        }
        .error-message-calendar-to {
            width: 100% !important;
            margin-left: 0rem !important;
        }
        .modal-covid-title{
            color:  #2d2727 !important;
            text-align: center !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            position: relative !important;
            align-self: stretch !important;
        }
        .date-picker-bday,
        .date-picker_cruise,
        .date-picker{
            margin-top: 34px;
        }
        .icon-from-checked {
            transform: translateY(-50%) !important;
            pointer-events: none !important;
            height: 18px !important;
            width: 18px !important;
            position: relative !important;
            left: 92.5% !important;
            top: -48px !important;
            margin-top: 0px !important;
        /* position: absolute;
        right: 1.3rem !important;
        transform: translateY(-50%);
        pointer-events: none;
        margin-top: -2.7rem !important;
        height: 18px;
        width: 18px; */
        }
        
    </style>
    @else
    <style>
        .date_calendar{
            width: 90% !important;
        }
        .icon-from {
            right: 3.2rem !important;
        }
        .destination-to-label{
            padding-left: 38px !important;
        }
    </style>
     
    @endif
    <style>
        .error-calendar-messages-label{
        color: #dd0707;
        text-align: left;
        font-family:  "Inter-Medium", sans-serif;
        font-size: 12px;
        line-height:  12px;
        font-weight: 500;
    }
     .error-message-calendar-to {
        background: #f5f5f5;
        font-size: 0.875rem;
        color: #dc3545;
        position: absolute;
        bottom: -20px;
        left: 0;
        width: 91%;
        text-align: left;
        margin-left: 1.6rem;
        top: 3.7rem;
        padding-left: .5rem;
        
    }
    .input-container-calendar-to {
      position: relative; /* Ensure the error message can be positioned relative to the input */
    }
        .destination-to-label{
            margin: 0 !important;
            background-color: transparent;
            height: 12px;
            font-size: 10px;
            color: #848a90;
            padding-left: 11px !important;
        }
        .icon-from {
            position: absolute;
            right: 1.3rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.65rem;
            height: 18px;
            width: 18px;
        }

        .icon-from-checked {
            position: absolute;
            right: 3.3rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.67rem;
            height: 18px;
            width: 18px;
        }
        .icon-to {
            position: absolute;
            right: 1.375rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.65rem;
            height: 18px;
            width: 18px;
        }

        .icon-to-checked {
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
        .date1, .date2 {
            width: 150px;
            cursor: pointer;
        }

        .date-picker {
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

        .day {
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

        .day:hover {
            background-color: #008080;
            color: #fff;
        }

        .day.selected {
            background-color: #e4509a;
            color: white;
        }

        .day.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .day-name {
            text-align: center;
            color: #7a7f89;
            font-family: "Inter-Medium", sans-serif;
            font-size:  12px;
            line-height: 16px;
            font-weight: 500;
            position: relative;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
    <script>
        const yearSelect = document.getElementById('year');
        const monthSelect = document.getElementById('month');
        const daysContainer = document.getElementById('days');
        const date1Input = document.querySelector('.date1');
        const date2Input = document.querySelector('.date2');
        const datePicker = document.getElementById('date-picker');
        let date1InputOldVale = "";
        let date2InputOldVale = "";
        let activeInput = null;
        let activeCalendar = null;
        let date1Selected = null;
        let date2Selected = null;
        let dateselected1 = null;
        let dateselected2 = null;

        function populateYear() {
            const currentYear = new Date().getFullYear();
            for (let year = currentYear - 0; year <= currentYear + 10; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelect.appendChild(option);
            }
            yearSelect.value = currentYear; // Default to current year
        }

        function populateMonth() {
            const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            monthNames.forEach((month, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = month;
                monthSelect.appendChild(option);
            });
            monthSelect.value = new Date().getMonth(); // Default to current month
        }

        function updateDays() {
            $('#apply').prop('disabled', true);
            const year = parseInt(yearSelect.value);
            const month = parseInt(monthSelect.value);
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDay = new Date(year, month, 1).getDay();
            daysContainer.innerHTML = '';
            // Fill in empty spaces for the first week
            for (let i = 0; i < firstDay; i++) {
                const emptyDiv = document.createElement('div');
                daysContainer.appendChild(emptyDiv);
            }

            const today = new Date();
            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = document.createElement('div');
                const date = new Date(year, month, day);
                const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                // alert(dateString);
                dayDiv.textContent = day;
                dayDiv.classList.add('day');

                if (activeInput === date1Input) {
                    activeCalendar = 1;
                    // Date 1: Disable past dates
                    if (date <= today.setHours(0, 0, 0, 0)) {
                        dayDiv.classList.add('disabled');
                        dayDiv.onclick = (e) => e.stopPropagation(); // Prevent selection
                    } else {
                        dayDiv.onclick = () => {
                            $('#apply').prop('disabled', false);
                            // Clear previously selected day for Date 1
                            const selectedDays = document.querySelectorAll('.day.selected');
                            selectedDays.forEach(selectedDay => selectedDay.classList.remove('selected'));


                            dayDiv.classList.add('selected'); // Mark the selected day
                            dateselected1 = dateString;
                            //  // Update the input value
                            date1Selected = date; // Store the selected date

                        };
                    }
                } else if (activeInput === date2Input) {
                    activeCalendar = 2;
                    // Date 2: Disable dates before Date 1's selection
                        // alert(date1Selected);
                        // alert(date);
                        // alert(date1InputOldVale);
                        date1Selected=date1InputOldVale;
                        if(date1InputOldVale){
                            const year = date1InputOldVale.getFullYear();          // Gets the full year (e.g., 2024)
                            const month = date1InputOldVale.getMonth();        // Gets the month (0-11, so add 1 for 1-12)
                            const day = date1InputOldVale.getDate(); 
                            const date1StringOld = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                            date1Input.value=date1StringOld;
                        }
                    if (!date1Selected || date < date1Selected) {
                        // alert(dayDiv);
                        
                        dayDiv.classList.add('disabled');
                        dayDiv.onclick = (e) => e.stopPropagation(); // Prevent selection
                    } else {
                        dayDiv.onclick = () => {
                            $('#apply').prop('disabled', false);
                            const selectedDays = document.querySelectorAll('.day.selected');
                            selectedDays.forEach(selectedDay => selectedDay.classList.remove('selected'));
                            dayDiv.classList.add('selected'); // Mark the selected day
                            dateselected2 = dateString;
                            date2Selected = date; // Store the selected date

                        };
                    }
                }

                daysContainer.appendChild(dayDiv);
            }
        }

       

        document.getElementById('close').onclick = () => {
            if(activeCalendar ==1){
                if(date1InputOldVale){
                    const year = date1InputOldVale.getFullYear();          // Gets the full year (e.g., 2024)
                    const month = date1InputOldVale.getMonth();        // Gets the month (0-11, so add 1 for 1-12)
                    const day = date1InputOldVale.getDate(); 
                    const date1StringOld = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    date1Input.value=date1StringOld;
                }else{
                    date1Input.value="";
                }
            }else{
                if(date2InputOldVale){
                    const year = date2InputOldVale.getFullYear();          // Gets the full year (e.g., 2024)
                    const month = date2InputOldVale.getMonth();        // Gets the month (0-11, so add 1 for 1-12)
                    const day = date2InputOldVale.getDate(); 
                    const date2StringOld = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    date2Input.value =date2StringOld;
                }else{
                    date2Input.value ="";
                }
            }
            datePicker.style.display = 'none';
        };

        monthSelect.onchange = updateDays;
        yearSelect.onchange = updateDays;

        

        

        date1Input.onfocus = () => {
            datePicker_cruise.style.display = 'none';
            activeInput = date1Input;
            const rect = date1Input.getBoundingClientRect();
            datePicker.style.display = 'block';
            datePicker.style.top = `${rect.bottom + window.scrollY-100}px`;
            datePicker.style.left = `${rect.left}px`;
            $('.icon-to-default').css('display', '');
            $('.icon-to-checked').css('display', 'none');
            updateDays();
        };

        date2Input.onfocus = () => {
            datePicker_cruise.style.display = 'none';
            activeInput = date2Input;
            const rect = date2Input.getBoundingClientRect();
            datePicker.style.display = 'block';
            datePicker.style.top = `${rect.bottom + window.scrollY-100}px`;
            datePicker.style.left = `${rect.left}px`;
            updateDays();
        };

        date1Input.onblur = date2Input.onblur = () => {
            setTimeout(() => {
                // datePicker.style.display = 'none'; // Hide date picker on blur
            }, 100);
        };

        // Prevent pasting into the textbox
        date1Input.onpaste = (e) => e.preventDefault();
        date2Input.onpaste = (e) => e.preventDefault();

        populateYear();
        populateMonth();
        updateDays();
    </script>

