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
        $services = Package1::find($id);
        $title = "Edit Package";
        $btn = "Update Package";
        
        if (is_null($services)) {
            return redirect('/addserviceshow');
        } else {
            $url = url('userupdate1') . "/" . $id;
            $data = compact('services', 'url', 'title', 'btn'); // 'services' passed instead of 'user'
            return view('/addnewservice')->with($data);
        }
    }
    

    public function update($id, Request $request)
    {
        $services = Package1::find($id);
        if ($services) {
            $services->service_name = $request->input('service_name');
            $services->images = $request->input('images');
            $services->description = $request->input('description');
            $services->price = $request->input('price'); // Price field added
            $services->save();
            
            return redirect()->back()->with('success', 'Package updated successfully.');
        }
    
        return redirect()->back()->with('error', 'Package not found.');
    }
    

}
