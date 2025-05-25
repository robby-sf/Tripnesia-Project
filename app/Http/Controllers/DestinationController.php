<?php

namespace App\Http\Controllers;
use App\Models\Destination;

use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index() {
        $destination = Destination::all();
        return view('destination',  ['destination' => $destination]); 
    }

    public function show($slug) {
    $destination = Destination::where('slug', $slug)->firstOrFail();
    return view('destination-page', ['destination' => $destination]);
    }
}
