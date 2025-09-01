<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Hash;
use App\Models\Services1;
use App\Models\Location;
use App\Models\Package1;

class AppointmentController extends Controller
{
    // Store the appointment data after successful payment
   public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|string',
        'email'       => 'required|email',
        'phonenumber' => 'required|string',
        'gender'      => 'required|string',
        'select'      => 'required',
        'subservice'  => 'required',
        'time'        => 'required',
        'date'        => 'required|date',
        'message'     => 'nullable|string',
        'payment_id'  => 'required|string',
    ]);

    // ✅ Save appointment in DB
    Appointment::create([
        'name'         => $request->name,
        'email'        => $request->email,
        'phonenumber'  => $request->phonenumber,
        'gender'       => $request->gender,
        'select'       => $request->select,
        'subservice'   => $request->subservice,
        'time'         => $request->time,
        'date'         => $request->date,
        'message'      => $request->message ?? '',
        'payment_id'   => $request->payment_id,
        'price'        => $request->price,
    ]);

    // ✅ Send confirmation email to user
    Mail::to($request->email)->send(new AppointmentMail(
        $request->email,
        $request->message
    ));

    return redirect('/thank-you')->with('success', 'Appointment booked successfully and confirmation email sent!');
}

   

        public function Appointment()
        {
            $user=Auth::guard('vendor')->user();
            $services=new Services();
            $title ="Appointment Page";
            $url = url('/storedata3');
            $btn="Appointment";
            $user = new appointment();
            $data = compact('title','url','btn');
            return view('appointment')->with($data);
            
        }
    
        public function Appointmentview(Request $request)
        {
            $search = $request->input('search');
        
            $query = Appointment::query();
        
            if (!empty($search)) {
                $query->where('name', 'LIKE', "%$search%")
                      ->orWhere('email', 'LIKE', "%$search%");
            }
        
            $appointments = Appointment::orderBy('created_at', 'desc')->paginate(10);
        
            return view('appointmentview', compact('appointments', 'search'));
        }
        

    public function upcomingappointments(Request $request)
{
    $filterDate = $request->input('filter_date');

    $query = Appointment::whereNotIn('status', ['Done', 'Approved']); // "Done" aur "Approved" remove kiya

    if (!empty($filterDate)) {
        $query->whereDate('date', '>=', $filterDate);
    }

    $appointments = $query->paginate(5);

    return view('upcomingappointments', compact('appointments', 'filterDate'));
}

        // Approve Appointment
    public function approveAppointment($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Approved';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment Approved');
    }

    // Mark as Done
    public function doneAppointment($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Done';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment Marked as Done');
    }

    // Cancel Appointment
    public function cancelAppointment($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Cancelled';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment Cancelled');
    }
        


public function complatedappointments()
{
    $appointments = Appointment::where('status', 'Done')
    ->orderBy('updated_at', 'desc')
    ->paginate(10);

return view('complatedappointments', compact('appointments'));
}

public function cancellationsappointments(Request $request)
{
    $search = $request->input('search');

    $query = Appointment::where('status', 'Cancelled'); // Sirf "Cancelled" status wali appointments filter ki gayi hain

    if (!empty($search)) {
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

    $appointments = $query->paginate(5);

    return view('cancellationsappointments', compact('appointments', 'search'));
}


public function getAvailableSlots(Request $request)
{
    $date = $request->input('date');

    // All slots of the day
    $allSlots = [
        '09:00 AM','09:30 AM','10:00 AM','10:30 AM','11:00 AM','11:30 AM',
        '12:00 PM','12:30 PM','01:00 PM','01:30 PM','02:00 PM','02:30 PM',
        '03:00 PM','03:30 PM','04:00 PM','04:30 PM','05:00 PM'
    ];

    // Get already booked slots from DB
    $bookedSlots = Appointment::where('date', $date)->pluck('time')->toArray();

    // Filter available slots
    $availableSlots = array_values(array_diff($allSlots, $bookedSlots));

    return response()->json([
        'available_slots' => $availableSlots
    ]);
}
        
        
    
        public function trash(Request $request)
    {
        $appointments = Appointment::onlyTrashed()->get(); // Correct variable name
        $data = compact('appointments'); // Pass the correct variable name
        return view('appointmentview_trashed')->with($data);
    }
    
    
        public function destroy($id)
        {
    
            $user=Appointment::find($id);
    
            if(!is_null($user))
            {
                $user->delete();
            }
             return redirect()->back();
          
        }
    
        public function restore($id)
        {
    
            $user=Appointment::withTrashed()->find($id);
    
            if(!is_null($user))
            {
                $user->restore();
            }
             return redirect()->back();
          
        }
    
        public function forcedestroy($id)
        {
            // Find the user including soft deleted ones
            $user = Appointment::withTrashed()->find($id);
        
            // Check if the user exists before accessing properties
            if ($user) {
                $user->forceDelete();
                return redirect()->route('appointmentviewpage')->with('success', 'User permanently deleted.');
            }
        
            // If user not found, redirect with an error message
            return redirect()->route('appointmentviewpage')->with('error', 'User not found.');
        }
        
    
      public function edit($id)
{
    $appointment = Appointment::with(['serviceRelation', 'subserviceRelation'])->find($id);

    if (is_null($appointment)) {
        return redirect('/appointmentview')->with('error', 'Appointment not found');
    }

    $services = Services1::all(); // For service dropdown
    $locations = Location::all();
    
    // All subservices OR only subservices of the selected service
    $subservices = Package1::where('service_id', $appointment->select)->get();

    $title = "Edit Appointment";
    $btn = "Update Appointment";
    $url = url('userupdate') . "/" . $id;

    return view('appointment', compact('appointment', 'url', 'title', 'btn', 'services', 'locations', 'subservices'));
}


        
        public function update($id, Request $request)
        {
            $user = Appointment::find($id);
        
            if (!$user) {
                return redirect('appointmentview')->with('error', 'Appointment not found');
            }
        
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phonenumber' => 'required',
                'gender' => 'required',
                'select' => 'required',
                'subservice' => 'required',
                'time' => 'required',
                'date' => 'required|date',
                'message' => 'required',
            ]);
        
            $user->update($request->all());
        
            return redirect('appointmentview')->with('success', 'Appointment updated successfully!');
        }

        public function generateOrder(Request $request)
        {
            $request->validate([
                'amount' => 'required|numeric'
            ]);
    
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
    
            $order = $api->order->create([
                'receipt' => uniqid(),
                'amount' => $request->amount,
                'currency' => 'INR'
            ]);
    
            return response()->json([
                'order_id' => $order['id'],
                'amount' => $order['amount']
            ]);
        }
        
}
