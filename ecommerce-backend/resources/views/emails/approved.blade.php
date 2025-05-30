<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation - {{ $order['order_number'] }}</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px;">

    <div style="background: #ffffff; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto;">
        <h2 style="color: #28a745;"> Your Order Has Been Confirmed!</h2>
        <p>Hi <strong>{{ $order['customer']['fullName'] }}</strong>,</p>

        <p>Thank you for your purchase. We're preparing your order now.</p>

        <hr>
        <h3>Order Summary</h3>
        <p><strong>Order Number:</strong> {{ $order['order_number'] }}</p>
        <p><strong>Product:</strong> {{ $order['product']['variant'] }}</p>
        <p><strong>Quantity:</strong> {{ $order['product']['quantity'] }}</p>
        <p><strong>Total:</strong> ₹{{ $order['product']['total'] }}</p>
        <hr>

        <h3> Customer Details</h3>
        <p><strong>Name:</strong> {{ $order['customer']['fullName'] }}</p>
        <p><strong>Email:</strong> {{ $order['customer']['email'] }}</p>
        <p><strong>Phone:</strong> {{ $order['customer']['phone'] }}</p>
        <p><strong>Address:</strong> {{ $order['customer']['address'] }}, 
            {{ $order['customer']['city'] }}, 
            {{ $order['customer']['state'] }} - 
            {{ $order['customer']['zip'] }}</p>

        <p style="margin-top: 30px;">You’ll receive another email once your order ships.</p>

        <p>Thanks,<br>
        <strong>The Store Team</strong></p>
    </div>

</body>
</html>
