<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeautyParlor;

class ParlorController extends Controller
{
      public function findNearestParlors(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
    
        if (!$latitude || !$longitude) {
            return response()->json(['error' => 'Location not provided'], 400);
        }
    
        // Debugging: Print incoming lat/lng
        \Log::info("User's Location: {$latitude}, {$longitude}");
    
        // Find nearby parlors within 10 km
        $parlors = BeautyParlor::selectRaw("*, 
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) 
            * cos(radians(longitude) - radians(?)) + sin(radians(?)) 
            * sin(radians(latitude)))) AS distance", 
            [$latitude, $longitude, $latitude])
            ->having('distance', '<', 10) // 10 km radius
            ->orderBy('distance')
            ->get();
    
        // Debugging: Log query result
        \Log::info("Nearby Parlors Found: ", $parlors->toArray());
    
        if ($parlors->isEmpty()) {
            return response()->json(['message' => 'No nearby parlors found.']);
        }
    
        return response()->json($parlors);
    }
}
