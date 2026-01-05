
<!DOCTYPE html>
<html>
<head>
    <title>Request OTP</title>
</head>
<body>
    @if(session('message'))
        <p style="color:green">{{ session('message') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('request-otp') }}" enctype="multipart/form-data" method="post">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Request OTP</button>
    </form>

    <form action="{{ route('verify-otp') }}" method="post">
        @csrf
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>OTP:</label>
        <input type="text" name="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
