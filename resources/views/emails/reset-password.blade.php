<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <p>Click the link below to reset your password:</p>
    <a href="{{ url('/Auth/reset-password/'.$token) }}">Reset Password</a>
</body>
</html>
