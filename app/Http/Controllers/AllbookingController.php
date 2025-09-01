<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllBooking;
use App\Models\Package1;
use App\Models\Specialist;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AllbookingController extends Controller
{
    // Show the booking form
    public function allbooking($id)
    {
        $package = Package1::findOrFail($id);

        // Fetch specialists related to the service of the selected package
        $specialists = Specialist::where('service_id', $package->service_id)
                                ->where('status', 1) // Only available specialists
                                ->pluck('name', 'id'); // Ensure correct order

        return view('allbooking', compact('package', 'specialists'));
    }

    // Generate Razorpay order
    public function generateOrder(Request $request)
    {
        $package = Package1::findOrFail($request->input('package_id'));

        // Razorpay order generation
        $amount = $package->price * 100; // Convert to paise
        $orderData = [
            'receipt'         => uniqid(),
            'amount'          => $amount,
            'currency'        => 'INR',
            'payment_capture' => 1, // Automatic payment capture
        ];

        // Create the Razorpay order
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $razorpayOrder = $api->order->create($orderData);

        // Return the order ID and other data
        return response()->json([
            'id'            => $razorpayOrder->id,
            'amount'        => $amount,
            'booking_data'  => $request->all() // Send the booking data to be saved after payment
        ]);
    }


    public function store7(Request $request)
{
    try {
        // Get cart (from request if session empty)
        $cart = $request->session()->get('cart', []);
        if (empty($cart) && $request->has('cart')) {
            $cart = json_decode($request->input('cart'), true);
        }

        if (empty($cart)) {
            return response()->json([
                'error' => true,
                'message' => 'Cart is empty. Cannot save booking.'
            ], 400);
        }

        // Extract package IDs
        $packageIds = collect($cart)->pluck('id')->toArray();
        $packagestr = implode(',', $packageIds);

        // Collect user inputs
        $name = $request->input('name');
        $email = $request->input('email');
        $phonenumber = $request->input('phonenumber');
        $gender = $request->input('gender');
        $time = $request->input('time');
        $date = $request->input('date');
        $message = $request->input('message');
        $payment_id = $request->input('payment_id');

        // Specialists (can be multiple)
        $specialists = $request->input('specialist_checkbox', []);
        $specialistStr = is_array($specialists) ? implode(',', $specialists) : '';

        // Save booking
        $booking = new AllBooking();
        $booking->package_id = $packagestr;
        $booking->name = $name;
        $booking->email = $email;
        $booking->phonenumber = $phonenumber;
        $booking->gender = $gender;
        $booking->time = $time;
        $booking->date = $date;
        $booking->message = $message;
        $booking->specialist = $specialistStr;
        $booking->status = 'Pending';
        $booking->payment_id = $payment_id;
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking saved successfully',
            'booking_id' => $booking->id,
        ]);

    } catch (\Exception $e) {
        \Log::error('Booking Save Error', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'error' => true,
            'message' => 'Failed to save booking',
            'details' => $e->getMessage()
        ], 500);
    }
}

    
    

    // Update the payment status after successful payment
    public function updatePaymentStatus(Request $request)
    {
        // Validate input data
        $request->validate([
            'booking_id' => 'required|exists:all_bookings,id',
            'payment_id' => 'required|string',
            'payment_status' => 'required|string', // 'Confirmed' or 'Pending'
        ]);
    
        // Find the booking and update the payment status
        $booking = AllBooking::findOrFail($request->booking_id);
    
        $booking->payment_id = $request->payment_id;  // Store Razorpay payment ID
        $booking->status = 'Confirmed'; // Update status to 'Confirmed' after successful payment
        $booking->save(); // Save updated data to database
    
        return response()->json([
            'message' => 'Payment status updated successfully',
            'booking_id' => $booking->id,
        ]);
    }

    // Other methods remain the same
   public function allserviceshow()
{
    $allPackages = AllBooking::with(['package', 'specialist'])
        ->orderByRaw("FIELD(status, 'Pending', 'Approved', 'Done', 'Cancelled')") // New first
        ->orderBy('created_at', 'desc') // Recent first inside each status
        ->paginate(10);

    return view('allserviceshow', compact('allPackages'));
}



    public function show($id)
    {
        $booking = AllBooking::with('specialist')->findOrFail($id);
        return view('admin1pages.show', compact('booking'));
    }

    public function destroy($id)
    {
        $booking = AllBooking::findOrFail($id);
        $booking->delete();

        return redirect()->route('\dashboard1')->with('success', 'Booking deleted!');
    }

public function approve($id)
{
    $booking = AllBooking::find($id);
    if ($booking) {
        $booking->status = 'Approved'; // ✅ Wrap in quotes
        $booking->save();
    }

    return redirect()->back()->with('success', 'Booking Approved');
}

public function updateStatus2(Request $request, $id)
{
    $booking = AllBooking::findOrFail($id);
    $booking->status = $request->status; // Approved, Done, Cancelled
    $booking->save();

    return redirect()->back()->with('success', 'Status updated successfully!');
}

    
    
public function done($id)
{
    $booking = AllBooking::find($id);
    if ($booking) {
        $booking->status = 'Done';
        $booking->save();
    }

    return redirect()->back()->with('success', 'Booking marked as Done');
}

public function cancel($id)
{
    $booking = AllBooking::find($id);
    if ($booking) {
        $booking->status = 'Cancelled';
        $booking->save();
    }

    return redirect()->back()->with('success', 'Booking Cancelled');
}

    
    public function trash($id) {
        $booking = AllBooking::findOrFail($id);
        $booking->delete();
        return back()->with('success', 'Booking moved to trash.');
    }
    
    public function showTrash() {
        $trashed = AllBooking::onlyTrashed()->paginate(10);
        return view('admin1.trash', compact('trashed'));
    }
    
    public function edit($id) {
        $booking = AllBooking::findOrFail($id);
        return view('edit', compact('booking'));
    }

    public function update(Request $request, $id)
{
    $booking = AllBooking::findOrFail($id);

    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phonenumber' => 'required|string|max:20',
        'gender' => 'required|string',
        'time' => 'required|string',
        'date' => 'required|date',
        'message' => 'nullable|string',
        'specialist_checkbox' => 'nullable|array',
    ]);

    // Update fields
    $booking->name = $request->name;
    $booking->email = $request->email;
    $booking->phonenumber = $request->phonenumber;
    $booking->gender = $request->gender;
    $booking->time = $request->time;
    $booking->date = $request->date;
    $booking->message = $request->message;

    // Specialists
    $specialists = $request->input('specialist_checkbox', []);
    $booking->specialist = is_array($specialists) ? implode(',', $specialists) : '';

    $booking->save();

    // Redirect back with success message
    return redirect()->route('allserviceshow')->with('success', 'Booking updated successfully!');
}


    public function complatedservices()
{
    $allPackages = AllBooking::where('status', 'Done')->with(['package', 'specialist'])->paginate(10);
    return view('complatedservices', compact('allPackages'));
}

public function cancelledservices()
{
    $allPackages = AllBooking::where('status', 'Cancelled')->paginate(10);
    return view('cancelledservices', compact('allPackages'));
}

    
}