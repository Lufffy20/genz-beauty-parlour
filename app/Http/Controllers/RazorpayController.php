<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\Specialist;
use App\Models\Package1;

class RazorpayController extends Controller
{
    
    public function checkout()
    {
        $cart = session()->get('cart', []);
    
        // Collect package IDs from cart
        $packageIds = collect($cart)->pluck('id');
    
        // Fetch packages with actual service_id from DB
        $packages = Package1::whereIn('id', $packageIds)->get();
    
        // Get all related service_ids from those packages
        $serviceIds = $packages->pluck('service_id')->unique();
    
        // Get specialists that belong to those services
        $specialists = Specialist::whereIn('service_id', $serviceIds)->with('service')->get();
    
        return view('checkout', compact('packages', 'specialists'));
    }
    
    
    
    
    public function payment(Request $request)
    {
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
            $amount = $request->input('amount'); // Get amount directly from request
    
            if (!$amount || $amount <= 0) {
                return response()->json(['error' => 'Invalid amount'], 400);
            }
    
            $order = $api->order->create([
                'amount' => $amount * 100, // Convert to paise
                'currency' => 'INR',
                'payment_capture' => 1
            ]);
    
            if (!isset($order['id'])) {
                return response()->json(['error' => 'Order ID not generated'], 500);
            }
    
            \Log::info('Razorpay Order Created', ['order_id' => $order['id']]);
    
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