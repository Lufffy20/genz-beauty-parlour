<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\Location; 
use App\Models\login;
use App\Models\signup;
use App\Models\Appointment;
use App\Models\Services1;
use App\Models\Package1;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentMail;




class Layoutcontroller extends Controller
{

    public function signup()
    {
        $title ="Signup Page";
        $url = url('/storedata1');
        $btn="Signup";
        $user = new signup();
        $data = compact('title','url','btn');
        return view('signup')->with($data);
    }

    public function userview(Request $request)
    {
        $search = $request->input('search'); // Get search input
    
        $query = Signup::query();
    
        if (!empty($search)) {
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
        }
    
        // Use paginate(5) instead of get()
        $signups = $query->paginate(5);
    
        $data = compact('signups', 'search'); // Pass search value to view
        return view('userview')->with($data);
    }
    

    public function trash()
{
    $signups = signup::onlyTrashed()->get(); // Correct variable name
    $data = compact('signups'); // Pass the correct variable name
    return view('userview_trashed')->with($data);
}


    public function destroy($id)
    {

        $user=signup::find($id);

        if(!is_null($user))
        {
            $user->delete();
        }
         return redirect()->back();
      
    }

    public function restore($id)
    {

        $user=signup::withTrashed()->find($id);

        if(!is_null($user))
        {
            $user->restore();
        }
         return redirect()->back();
      
    }

    public function forcedestroy($id)
    {
        // Find the user including soft deleted ones
        $user = Signup::withTrashed()->find($id);
    
        // Check if the user exists before accessing properties
        if ($user) {
            $user->forceDelete();
            return redirect()->route('userviewpage')->with('success', 'User permanently deleted.');
        }
    
        // If user not found, redirect with an error message
        return redirect()->route('userviewpage')->with('error', 'User not found.');
    }
    

    public function edit($id)
    {
        $user=signup::find($id);
        $title="Edit userview";
        $btn="Update User";
        if(is_null($user)){
            return redirect('/userview');
        }
        else
        {
            $url=url('userupdate')."/".$id;
            $data=compact('user','url','title','btn');
            return view('/signup')->with($data);
        }
    }

        public function update($id,Request $request)
        {
            $user=signup::find($id);
            $user->name=$request['name'];
            $user->email=$request['email'];
            $user->save();
            return redirect('userview');
        }


        
     
        


    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function product()
    {
        return view('product');
    }

    public function Service()
    {
        return view('Service');
    }

    public function packages()
    {
        return view('packages');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactemail()
    {
        return view('contactemail');
    }

    public function login()
    {
        return view('login');
    }

 // Make sure to import the model

    public function appointment()
    {
        $title = "Appointment Page";
        $url = url('/storedata3');
        $btn = "Appointment";
        $user = new Appointment();
    
        // Fetch all services
        $services = Services1::all();
    
        // Fetch all locations
        $locations = Location::all();
    
        $data = compact('title', 'url', 'btn', 'user', 'services', 'locations');
    
        return view('appointment')->with($data);
    }
    
    
    public function getSubServices($serviceId, Request $request)
    {
        $gender = $request->input('gender'); // Get selected gender
    
        $query = Package1::where('service_id', $serviceId);
    
        if ($gender) {
            $query->where('category', $gender);
        }
    
        // 👇 Only return necessary fields: id, package_name, price
        $subServices = $query->get(['id', 'package_name', 'price']);
    
        return response()->json($subServices);
    }


    public function showlocation()
    {
        // Fetch all locations
        $locations = Location::all();
    
        // Pass the locations variable to the view
        return view('showlocation', compact('locations')); 
    }
    
    
            public function addnewlocation() {
                return view('addnewlocation');
            }
    
            
            public function store10(Request $request) {
                $request->validate([
                    'branch_name' => 'required',
                    'parlour_name' => 'required',
                    'address' => 'required',
                    'phone' => 'required',
                    'latitude' => 'required',
                    'longitude' => 'required',
                    'image' => 'required|image'
                ]);
            
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            
                Location::create([
                    'branch_name' => $request->branch_name,
                    'parlour_name' => $request->parlour_name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'image' => $imageName,
                ]);
            
                return redirect()->route('showlocation')->with('success', 'Location added successfully!');
            }
    
            public function destroy1(string $id)
        {
            $location = Location::findOrFail($id);
    
            // Delete the image if exists
            if ($location->image) {
                unlink(public_path('images/' . $location->image));
            }
    
            $location->delete();
    
            return redirect()->route('showlocation')->with('success', 'Location deleted successfully.');
        }

        
    // Show the form for editing a location
    public function locationedit($id)
    {
        $location = Location::findOrFail($id);
        return view('locationedit', compact('location'));
    }

    // Update the location
    public function update1(Request $request, $id)
    {
        $request->validate([
            'branch_name' => 'required',
            'parlour_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $location = Location::findOrFail($id);
        $location->branch_name = $request->branch_name;
        $location->parlour_name = $request->parlour_name;
        $location->address = $request->address;
        $location->phone = $request->phone;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($location->image) {
                unlink(public_path('images/' . $location->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $location->image = $imageName;
        }

        $location->save();

        return redirect()->route('showlocation')->with('success', 'Location updated successfully.');
    }
    


    public function appointmentview()
    {
        return view('appointmentview');
    }
    
    public function haircuts()
    {
        return view('haircuts');
    }

    public function facials()
    {
        return view('facials');
    }

    public function makeup()
    {
        return view('makeup');
    }
    
    public function waxing()
    {
        return view('waxing');
    }

    public function manicure()
    {
        return view('manicure');
    }

    public function eyebrowlash()
    {
        return view('eyebrowlash');
    }

    public function henna()
    {
        return view('henna');
    }

    public function bridal()
    {
        return view('bridal');
    }

    public function haircut()
    {
        return view('haircutread.haircutread');
    }

    public function haircolour()
    {
        return view('haircutread.haircolour');
    }

    
    public function hairspa()
    {
        return view('haircutread.hairspa');
    }

    
    public function hairstyling()
    {
        return view('haircutread.hairstyling');
    }

    public function acnetreatment()
    {
        return view('facialread.acnetreatment');
    }
    public function antiagingtreatment()
    {
        return view('facialread.antiagingtreatment');
    }
    public function goldfacial()
    {
        return view('facialread.goldfacial');
    }
    public function herbalfacial()
    {
        return view('facialread.herbalfacial');
    }
    
    
}
