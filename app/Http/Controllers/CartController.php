<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package1;
use App\Models\Specialist;
use App\Models\Booking; // Assuming you have a Booking model
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add to Cart
    public function addToCart($id)
    {
        $package = Package1::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $package->id,
                'name' => $package->package_name,
                'price' => $package->price,
                'quantity' => 1,
                'image' => $package->images,
                'service_name' => $package->service->service_name ?? 'N/A'
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Package added to cart successfully!');
    }

    // Show Cart Page
    public function showCart()
    {
        $cart = session()->get('cart', []);
    
        if (empty($cart)) {
            $packages = collect();
            $staffs = [];
        } else {
            $packages = Package1::whereIn('id', array_keys($cart))->get();
            $staffs = [];
    
            foreach ($packages as $package) {
                $serviceId = $package->service_id;
                $staffs[$package->id] = Specialist::where('service_id', $serviceId)
                ->where('Status', 1)
                ->get(['id', 'name']); // ← Replace 'name' with the actual column name in your DB
            
            }
        }
    
        return view('cart', compact('cart', 'packages', 'staffs'));
    }
    

    

    // Remove Item
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    // Clear Entire Cart
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared.');
    }

    // Checkout Page (with Razorpay)
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    // Place Order (after payment success)
    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (!$cart || empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Cart is empty!');
        }

        foreach ($cart as $item) {
            Booking::create([
                'package_id' => $item['id'],
                'user_name' => $request->input('name'),
                'email' => $request->input('email'),
                'phonenumber' => $request->input('phonenumber'),
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'booking_date' => now(), // Or you can add field for custom date
            ]);
        }

        session()->forget('cart');
        return redirect()->route('cart.show')->with('success', 'Booking placed successfully!');
    }
}