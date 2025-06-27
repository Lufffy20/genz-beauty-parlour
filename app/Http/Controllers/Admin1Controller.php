<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;    
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Hash;

class Admin1Controller extends Controller
{

    

    public function index1()
    {
        return view('admin1.sidebar');
    }

    public function dashboard1()
    {
        return view('admin1pages.admindashboard1');
    }

    public function newappointments()
    {
        return view('admin1pages.newappointments');
    }

    public function addnewservice()
    {
        return view('admin1pages.addnewservice');
    }

    
    public function addnewservices()
    {
        return view('admin1pages.addnewservices');
    }

    public function Appointmentview1(Request $request)
    {
        $search = $request->input('search');
    
        $query = Appointment::query();
    
        if (!empty($search)) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
        }
    
        $appointments = Appointment::orderBy('created_at', 'desc')->paginate(10);
    
        return view('appointmentview1', compact('appointments', 'search'));
    }
    

public function upcomingappointments1(Request $request)
{
$filterDate = $request->input('filter_date');

$query = Appointment::whereNotIn('status', ['Done', 'Approved']); // "Done" aur "Approved" remove kiya

if (!empty($filterDate)) {
    $query->whereDate('date', '>=', $filterDate);
}

$appointments = $query->paginate(5);

return view('upcomingappointments1', compact('appointments', 'filterDate'));
}

    // Approve Appointment
public function approveAppointment1($id) {
    $appointment = Appointment::findOrFail($id);
    $appointment->status = 'Approved';
    $appointment->save();

    return redirect()->back()->with('success', 'Appointment Approved');
}
    


public function complatedappointments1()
{
$appointments = Appointment::where('status', 'Done')
->orderBy('updated_at', 'desc')
->paginate(10);

return view('complatedappointments1', compact('appointments'));
}

public function cancellationsappointments1(Request $request)
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

return view('cancellationsappointments1', compact('appointments', 'search'));
}


}
