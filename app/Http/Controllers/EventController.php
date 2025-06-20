<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }

    public function create()
{
    return view('Admin.events.eventCreate'); 
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:events,slug',
        'description' => 'required|string',
        'event_date' => 'required|date',
        'location' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('image') ? $request->file('image')->store('events', 'public') : null;

    Event::create([
        'title' => $validated['title'],
        'slug' => Str::slug($validated['slug']),
        'description' => $validated['description'],
        'event_date' => $validated['event_date'],
        'location' => $validated['location'],
        'image' => $path,
    ]);

    return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan!');
}

public function adminIndex()
{
    $events = Event::all();
    return view('Admin.events.eventIndex', compact('events'));
}

public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('Admin.events.eventEdit', compact('event'));
}

public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:events,slug,' . $id,
        'description' => 'required|string',
        'event_date' => 'required|date',
        'location' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('events', 'public');
        $validated['image'] = $path;
    } else {
        $validated['image'] = $event->image;
    }

    $validated['slug'] = Str::slug($validated['slug']);

    $event->update($validated);

    return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!');
}


public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('admin.event.index')->with('success', 'Event berhasil dihapus!');
}


}
