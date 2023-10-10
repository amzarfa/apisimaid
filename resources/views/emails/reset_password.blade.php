<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body>
    <h2>Reset Password</h2>
    <p>Hello,</p>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>Click the button below to reset your password:</p>
    <p>Email : {{ $email }}</p>
    <p>Token : {{ $token }}</p>
    <a href="{{ 'https://simaid.amzar.id/reset-password&email=' . $email . '&token=' . $token }}"
        style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none;">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Thank you!</p>
</body>

</html>
