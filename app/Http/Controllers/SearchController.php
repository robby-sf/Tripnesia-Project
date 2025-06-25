<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Event;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
        $term = $request->get('term');

        $destinations = Destination::where('nama', 'like', "%$term%")
            ->limit(5)
            ->pluck('nama');

        $events = Event::where('title', 'like', "%$term%")
            ->limit(5)
            ->pluck('title');

        $results = $destinations->merge($events)->unique()->values();

        return response()->json($results);
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $destinations = Destination::where('nama', 'like', "%$query%")
        ->take(10)
        ->get();
        $events = Event::where('title', 'like', "%$query%")
        ->take(10)
        ->get();

        return view('Search.Result', compact('query', 'destinations', 'events'));
    }
}
