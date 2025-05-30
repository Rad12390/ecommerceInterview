<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Failed - {{ $order['order_number'] ?? 'N/A' }}</title>
</head>
<body style="font-family: Arial, sans-serif; background: #fff8f8; padding: 20px;">

    <div style="background: #ffffff; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto;">
        <h2 style="color: #dc3545;"> Payment Failed</h2>
        <p>Hi <strong>{{ $order['customer']['fullName'] ?? 'Customer' }}</strong>,</p>

        <p>Unfortunately, your payment could not be processed.</p>

        <hr>
        <h3>Transaction Details</h3>
        @isset($order['order_number'])
            <p><strong>Order Number:</strong> {{ $order['order_number'] }}</p>
        @endisset
        @isset($order['product']['variant'])
            <p><strong>Product:</strong> {{ $order['product']['variant'] }}</p>
        @endisset

        <hr>

        <p>Please try again or contact our support team if you continue experiencing issues.</p>

        <p style="margin-top: 30px;">
            <a href="mailto:support@example.com">Contact Support</a>
        </p>

        <p>Thank you,<br>
        <strong>The Store Team</strong></p>
    </div>

</body>
</html>
