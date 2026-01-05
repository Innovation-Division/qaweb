<head>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: row;
            box-sizing: border-box;
        }

        .content-container {
            width: 756px;
            height: 600px;
            margin-top: 35px;
            margin-left: 388px;
            margin-right: 144px;
            margin-bottom: 0px;
            padding: 25px;
            padding-bottom: 0px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            position: relative;
        }

        .otp-page-container {
            display: flex;
            gap: 25px;
            flex-direction: column;
            width: 784px;
            height: 485 auto;
            height: 600px;
            /* margin-top: 65px;
            margin-left: 388px;
            margin-right: 144px;
            margin-bottom: 0px; */
            margin: auto;
        }

        .page-contents {
            display: flex;
            flex-direction: column;
            gap: 35px;
        }

        .otp-btns {
            display: flex;
            gap: 25px;
        }

        .main-otp-content {
            display: flex;
            gap: 25px;
            flex-direction: column;

        }
    </style>
</head>

<body>


    <div class="otp-page-container">
        <x-back-title title="Create account as Policyholder" />
        <div class="page-contents">
            <x-register.form-title title="Your identity" />
            <div class="main-otp-content">
                <x-reminders.dynamic-reminder icon="assets/icons/Icon-LockKey.svg" fontWeight="700"
                    message="An OTP has been sent to your registered email address." />
                <x-otp-input duration="60" />
            </div>

            <div class="otp-btns">
                <x-buttons.primary-button>Next</x-button.primary-button>
            </div>


        </div>


    </div>


</body>
