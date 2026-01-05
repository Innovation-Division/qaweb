
   
    <div class="col-md-2">
        <div class="form-group">
            <p class="text-start text-label-default"> Date of Birth<span class="text-danger">*</span></p>
            <input  id="date-of-birth" name="date-of-birth" autocomplete="off" onkeydown="return false" type="text" placeholder="Date of Birth" class="birdthday cp-spacing-input">
            <svg class="icon-bday icon-bday-default" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Zm0 3H1V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2Z"/>
            </svg>
            <svg class="icon-bday-checked" style="display: none" xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="none" viewBox="0 0 12 13">
                <path fill="#309999" d="M11 1H9.5V.5a.5.5 0 0 0-1 0V1h-5V.5a.5.5 0 0 0-1 0V1H1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1ZM8.604 7.354l-3 3a.502.502 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L5.25 9.293l2.646-2.647a.5.5 0 1 1 .708.708ZM1 4V2h1.5v.5a.5.5 0 1 0 1 0V2h5v.5a.5.5 0 1 0 1 0V2H11v2H1Z"/>
            </svg>
        </div>
    </div>


    <div id="date-picker-bday" class="date-picker-bday" style="z-index:2">
        <div class="header">
            <select id="monthbday" class="calendar-date-option"></select>
            <select id="yearbday" class="calendar-date-option"></select>
        </div>
        <div class="daysbday">
            <div class="day-name">Sun</div>
            <div class="day-name">Mon</div>
            <div class="day-name">Tue</div>
            <div class="day-name">Wed</div>
            <div class="day-name">Thu</div>
            <div class="day-name">Fri</div>
            <div class="day-name">Sat</div>
        </div>
        <div id="daysbday" class="daysbday"></div>
        <div class="buttons">
            <button id="closebday" type="button" class="calendar-close">Close</button>
            <button id="applybday" type="button" class="calendar-apply btn" >Apply</button>
        </div>
    </div>
  
    <style>
        .icon-bday {
            position: absolute;
            right: 1.3rem;
            transform: translateY(-50%);
            pointer-events: none;
            margin-top: 1.65rem;
            height: 18px;
            width: 18px;
        }

       


        .icon-bday-checked {
    position: absolute;
    right: 1.3rem;
    top: 39%;  /* Adjust based on your layout */
    transform: translateY(-50%);
    pointer-events: none;
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

        .date-picker-bday {
            display: none;
            position: absolute;
            border: 1px solid #ccc;
            background: white;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .daybday {
            cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s;
            display: inline-block;
            margin: 2px;
            width: 29px;
            height: 28px;
            padding: 6px 4px 10px 6px;
            color: #1d1f23;
            font-family: "Inter-Regular", sans-serif;
            font-size: 12px;
            line-height: 16px;
            font-weight: 400;
            text-align: center;
        }

        .daybday:hover {
            background-color: #008080;
            color: #fff;
        }

        .daybday.selected {
            background-color: #e4509a;
            color: white;
        }

        .daybday.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .daysbday {
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
        const yearSelectbday = document.getElementById('yearbday');
        const monthSelectbday = document.getElementById('monthbday');
        const daysContainerbday = document.getElementById('daysbday');
        const selectedDateInputsbday = document.querySelectorAll('.birdthday'); // Select by class
        const datePickerbday = document.getElementById('date-picker-bday');
        let dateselectedbday = null;
        let dateOldBday = "";
        let activeInputbday = null;

        const currentDate = new Date();
        const minAge = 18; // Minimum age
        const maxAge = 60; // Maximum age

        const minDate = new Date(currentDate.getFullYear() - maxAge, currentDate.getMonth(), currentDate.getDate());
        const maxDate = new Date(currentDate.getFullYear() - minAge, currentDate.getMonth(), currentDate.getDate());

        function populateYearbday() {
            
            for (let year = minDate.getFullYear(); year <= maxDate.getFullYear(); year++) {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelectbday.appendChild(option);
            }
            yearSelectbday.value = maxDate.getFullYear();
        }

        function populateMonthbday() {
            const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            monthNames.forEach((month, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = month;
                monthSelectbday.appendChild(option);
            });
            monthSelectbday.value = maxDate.getMonth();
        }

        function isDateDisabled(date) {
            return date < minDate || date > maxDate;
        }

        function updateDaysbday() {
            $('#applybday').prop('disabled', true);
            const year = parseInt(yearSelectbday.value);
            const month = parseInt(monthSelectbday.value);
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDay = new Date(year, month, 1).getDay();
        

            daysContainerbday.innerHTML = '';
            // Fill in empty spaces for the first week
            for (let i = 0; i < firstDay; i++) {
                const emptyDiv = document.createElement('div');
                daysContainerbday.appendChild(emptyDiv);
            }
            // Create day elements
            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = document.createElement('div');
                const date = new Date(year, month, day);
                const dateString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                dayDiv.textContent = day;
                dayDiv.classList.add('daybday');

                // Disable dates outside the age range
                if (isDateDisabled(date)) {
                    dayDiv.classList.add('disabled');
                    dayDiv.onclick = () => {};
                } else {
                    dayDiv.onclick = () => {
                        $('#applybday').prop('disabled', false);
                        const selectedDays = document.querySelectorAll('.daybday.selected');
                        selectedDays.forEach(selectedDay => selectedDay.classList.remove('selected'));
                        dayDiv.classList.add('selected');

                        if (activeInputbday) {
                            // activeInputbday.value = dateString;
                            dateselectedbday = dateString;
                        }
                    };
                }

                daysContainerbday.appendChild(dayDiv);
            }
        }

        monthSelectbday.onchange = updateDaysbday;
        yearSelectbday.onchange = updateDaysbday;

        

        document.getElementById('closebday').onclick = () => {
                if(dateOldBday){
                    activeInputbday.value =dateOldBday;
                }else{
                    activeInputbday.value ="";
                }
            datePickerbday.style.display = 'none';
        };

        selectedDateInputsbday.forEach(input => {
            input.onfocus = () => {
                activeInputbday = input;
                const rect = input.getBoundingClientRect();
                datePickerbday.style.display = 'block';
                // datePickerbday.style.top = `${rect.bottom + window.scrollY-600}px`;
                datePickerbday.style.top = `${57}px`;

                datePickerbday.style.left = `${rect.left}px`;
                updateDaysbday();
            };

            input.onblur = () => {
                setTimeout(() => {
                    // datePickerbday.style.display = 'none';
                }, 100);
            };

            // Prevent pasting into the textbox
            input.onpaste = (e) => {
                e.preventDefault();
            };
        });

        populateYearbday();
        populateMonthbday();
        updateDaysbday();
 
    </script>

