<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;
use App\Models\Event;
use App\Models\Package;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totaluser = User::count();
        $totaldestinasi = Destination::count(); 
        $totalevent = Event::count(); 
        $totalpackage = Package::count();
        $totalsales = Transaction::count();
        $totalRevenue = Transaction::sum('total_amount');

            $today = Carbon::today();

            $events = Event::where('event_date', '>=', $today)
                        ->orderBy('event_date', 'asc')
                        ->take(4)
                        ->get();


        return view('Admin.admin',[
        'totaluser' => $totaluser,
        'totaldestinasi' => $totaldestinasi,
        'totalevent' => $totalevent,
        'totalpackage' => $totalpackage,
        'totalsales' => $totalsales,
        'totalrevenue' => $totalRevenue,
        ]);
    }
}
