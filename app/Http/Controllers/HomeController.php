<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Destination;
use App\Models\Package;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(6)->get();
        $destinations = Destination::latest()->take(6)->get();
        $packages = Package::latest()->take(6)->get();

        return view('index', compact('events', 'destinations', 'packages'));
    }
}
