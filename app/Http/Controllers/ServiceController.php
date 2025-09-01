<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services1;
use App\Models\FacialPackage;
use App\Models\HaircutPackage;
use App\Models\Package1;
use App\Models\Service;
use App\Models\Specialist;


class ServiceController extends Controller
{
    public function index($id){
        $services = Services1::findorFail($id);
        $packages = Package1::where('service_id',$id)->get();
        $specialists = Specialist::where('service_id',$id)->get();

        return view('facialpackage',compact('services','packages','specialists'));
    }


    public function destroy($id)
    {
        $package = Package1::find($id);
    
        if ($package) {
            // Delete all related records in all_bookings before deleting the package
            \DB::table('all_bookings')->where('package_id', $id)->delete();
    
            // Now delete the package
            $package->delete();
        }
    
        return redirect()->back()->with('success', 'Package deleted successfully.');
    }
    

public function edit($id)
{
    $package = Package1::find($id);

    if (!$package) {
        return redirect('/addserviceshow');
    }

    $services = Services1::all(); // must pass for dropdown
    $title = "Edit Package";
    $btn = "Update Package";
    $url = route('update.package', ['id' => $id]);

    return view('addnewservice', compact('package', 'services', 'title', 'btn', 'url'));
}



public function update($id, Request $request)
{
    $package = Package1::find($id);
    
    if (!$package) {
        return redirect()->route('all.packages')->with('error', 'Package not found.');
    }

    // Validation
    $request->validate([
        'package_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'images' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Update fields
    $package->package_name = $request->package_name;
    $package->description = $request->description;
    $package->price = $request->price;

    // Handle image upload
    if ($request->hasFile('images')) {
        $imageName = time() . '.' . $request->images->extension();
        $request->images->move(public_path('images'), $imageName);
        $package->images = $imageName;
    }

    $package->save();

    // Redirect to packages listing page after update
    return redirect()->route('addservicesshow.page')->with('success', 'Package updated successfully.');
}


}
