<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Specialist;
use App\Models\Package1;

class RazorpayController extends Controller
{
    // Show checkout page
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $packageIds = collect($cart)->pluck('id');
        $packages = Package1::whereIn('id', $packageIds)->get();
        $serviceIds = $packages->pluck('service_id')->unique();
        $specialists = Specialist::whereIn('service_id', $serviceIds)->with('service')->get();

        // Pass Razorpay Key (from config)
        $razorpayKey = config('services.razorpay.key');

        return view('checkout', compact('packages', 'specialists', 'razorpayKey', 'cart'));
    }

    // Create Razorpay order
    public function payment(Request $request)
    {
        try {
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            $amount = $request->input('amount');

            if (!$amount || $amount <= 0) {
                return response()->json(['error' => 'Invalid amount'], 400);
            }

            $order = $api->order->create([
                'receipt' => 'order_rcptid_' . time(),
                'amount' => $amount * 100, // convert to paise
                'currency' => 'INR',
                'payment_capture' => 1
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $order['id'],
                'amount' => $order['amount']
            ]);

        } catch (\Exception $e) {
            \Log::error('Razorpay Payment Error', ['message' => $e->getMessage()]);
            return response()->json([
                'error' => 'Payment processing failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
