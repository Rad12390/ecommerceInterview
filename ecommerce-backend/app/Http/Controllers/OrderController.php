<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $data = $request->all();
        $product = $data['product'];
        $customer = $data;
        unset($customer['product']);

        // Simulate payment outcome based on card number
        $status = match ($data['cardNumber']) {
            '1' => 'approved',
            '2' => 'declined',
            '3' => 'gateway_error',
            default => 'approved',
        };

        $orderNumber = 'ORD' . strtoupper(Str::random(6));

        $order = Order::create([
            'order_number' => $orderNumber,
            'product' => $product,
            'customer' => $customer,
            'status' => $status,
            'total' => $product['total'],
        ]);

        // Send Email
        $this->sendEmail($order);

        return response()->json([
            'message' => 'Order processed',
            'orderId' => $order->_id,
            'status' => $status
        ]);
    }

    public function getOrder($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }

    private function sendEmail($order)
    {
        $email = $order['customer']['email'];
        $view = match ($order['status']) {
            'approved' => 'emails.approved',
            default => 'emails.failed',
        };

        Mail::send($view, ['order' => $order], function ($message) use ($email, $order) {
            $message->to($email)
                ->subject("Order " . strtoupper($order['status']) . ": " . $order['order_number']);
        });
    }
}
