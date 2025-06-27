<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function showlocation()
    // {
    //     $locations = Location::all();
    //     return view('showlocation', compact('locations'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function addnewlocation() {
    //     return view('addnewlocation');
    // }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);

        // Delete the image if exists
        if ($location->image) {
            unlink(public_path('images/' . $location->image));
        }

        $location->delete();

        return redirect()->route('showlocation')->with('success', 'Location deleted successfully.');
    }
    

    public function showlocation()
    {
        $locations = Location::all(); // this defines $locations
        return view('showlocation', compact('locations')); // this passes it to the view
    }
    
}
