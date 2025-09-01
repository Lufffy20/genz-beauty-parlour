<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllBooking;
use App\Models\Services1;
use App\Models\Package1;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard1()
    {
        // Total Bookings
        $totalBookings = AllBooking::count();

        // Total Services
        $totalServices = Services1::count();

        // Total Payments
        $totalPayments = DB::table('all_bookings')
            ->join('package1s', 'all_bookings.package_id', '=', 'package1s.id')
            ->sum('package1s.price');

        // Pending Bookings
        $pendingBookings = AllBooking::where('status', 'pending')->count();

        // Top 5 Booked Services
        $top5Services = DB::table('package1s')
            ->select('package1s.package_name', DB::raw('COUNT(all_bookings.id) as booking_count'))
            ->join('all_bookings', 'package1s.id', '=', 'all_bookings.package_id')
            ->groupBy('package1s.package_name')
            ->orderByDesc('booking_count')
            ->limit(5)
            ->get();

        $top5ServicesNames = $top5Services->pluck('package_name');
        $top5ServicesData = $top5Services->pluck('booking_count');

        // Monthly Bookings
        $monthlyBookings = AllBooking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(id) as count')
        )->groupBy('month')->pluck('count', 'month')->toArray();

        $monthlyBookingsData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyBookingsData[] = $monthlyBookings[$i] ?? 0;
        }

        return view('admin1pages.admindashboard1', compact(
            'totalBookings',
            'totalServices',
            'totalPayments',
            'pendingBookings',
            'top5ServicesNames',
            'top5ServicesData',
            'monthlyBookingsData'
        ));
    }
}
