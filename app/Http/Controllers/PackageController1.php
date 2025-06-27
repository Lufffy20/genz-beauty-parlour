<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services1;
use App\Models\Package1;
use App\Models\FacialPackage;
use App\Models\HaircutPackage;
use App\Models\Specialist;

class PackageController1 extends Controller
{
    // Show all packages in Admin Panel
    public function addservicesshow()
    {
        $packages = Package1::with('service')->get();
        return view('addservicesshow', compact('packages'));
    }

    // Show the package selection page
    public function create(Request $request)
    {
        $services = Services1::all();
        $selectedServiceId = $request->input('service_id');
        $packages = FacialPackage::where('service_id', $selectedServiceId)->get();

        return view('addnewservice', compact('services', 'packages', 'selectedServiceId'));
    }

    // Show Facial Packages
public function facialpackage()
{
    $packages = FacialPackage::with('service')->get();
    $specialists = Specialist::all(); // Fetch all specialists
    
    return view('facialpackage', compact('packages', 'specialists'));
}

    
    // Show specialists list
    public function addspecialistshow()
    {
        $specialists = Specialist::all();
        return view('addspecialistshow', compact('specialists'));
    }
    
    // Show add specialist form
    public function addSpecialist()
    {
        $specialists = Specialist::all();
        $services = Services1::all(); // Fetch all services
        return view('addSpecialist', compact('specialists', 'services'));
    }

    // Store new Specialist
    public function store6(Request $request)
    {
        // $request->validate([
        //     'name'           => 'required|string|max:255',
        //     'specialization' => 'required|string|max:255',
        //     'experience'     => 'required|integer|min:1',
        //     'service_id'     => 'required|exists:services1,id', // Ensure service exists
        //     'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif',
        //     'instagram'      => 'nullable|url',
        //     'whatsapp'       => 'nullable|url',
        //     'twitter'        => 'nullable|url',
        // ]);

        // Handle Image Upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Save Data
        Specialist::create([
            'name'           => $request->name,
            'specialization' => $request->specialization,
            'experience'     => $request->experience,
            'image'          => $imageName,
            'service_id'     => $request->service_id, // Store selected service
            'instagram'      => $request->instagram,
            'whatsapp'       => $request->whatsapp,
            'twitter'        => $request->twitter,
        ]);

        return redirect()->back()->with('success', 'Specialist Added Successfully!');
    }




     // Show edit form
     public function edit($id)
     {
         $specialist = Specialist::findOrFail($id);
         return view('specialists.edit', compact('specialist'));
     }
 
     // Update specialist
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'required',
             'specialization' => 'required',
             'experience' => 'required|integer',
         ]);
 
         $specialist = Specialist::findOrFail($id);
         $specialist->update($request->all());
 
         return redirect()->route('addSpecialist')->with('success', 'Specialist updated successfully.');
     }
 
     // Delete specialist
     public function destroy($id)
     {
         $specialist = Specialist::findOrFail($id);
         $specialist->delete();
 
         return redirect()->route('addspecialistshow.page')->with('success', 'Specialist deleted successfully.');
     }

    // Store new package
    public function store4(Request $request)
    {
        // Handle Image Upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_img.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Store in respective table
        Package1::create([
            'package_name' => $request->package_name,
            'images'       => $imageName,
            'description'  => $request->description,
            'price'        => $request->price,
            'service_id'   => $request->service_id,
            'category'     => $request->category,
        ]);

        return redirect('/addservicesshow')->with('success', 'Package added successfully');
    }

    public function staffavailability()
{
    $specialists = Specialist::all();
    $services = Services1::all(); // Fetch all services
    return view('staffavailability', compact('specialists', 'services'));
}

public function toggleStatus($id)
{
    $specialist = Specialist::findOrFail($id);
    $specialist->status = !$specialist->status; // Toggle status
    $specialist->save();

    return redirect()->back()->with('success', 'Specialist status updated successfully.');
}

}
