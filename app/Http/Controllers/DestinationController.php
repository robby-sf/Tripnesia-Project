<?php

namespace App\Http\Controllers;
use App\Models\Destination;
use Illuminate\Support\Str;

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

    public function data(){
    $destinations = Destination::all();
    return view('AdminDestination', [
        'title' => 'Data Destination',
        'destinations' => $destinations
    ]);
    }

    public function create(){
        return view('createDestination');
    }


    public function store(Request $request) {

        $validated = $request -> validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image',
            'maps' => ' nullable|string',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        $slug = Str::slug($validated['nama']);

        $originalSlug = $slug;
        $counter = 1;
        while (Destination::where('slug',$slug)->exists()){
            $slug = $originalSlug . '1' .$counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        if($request -> hasFile('gambar')) {
            $validated['gambar'] = $request -> file('gambar') -> store('Asset','public');
        }

        Destination::create($validated);

        return redirect()-> route('Destinations')->with('success','destination berhasil ditambahkan');

    }

    public function edit($id){
        $destination = Destination::findOrFail($id);
        return view('editDestination',['destination' => $destination]);
        dd('masuk edit');
    }

    public function update(Request $request, $id) {

        $validated = $request -> validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image',
            'maps' => ' nullable|string',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
        ]);

        $destination = Destination::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('Asset', 'public');
        } else {
            unset($validated['gambar']);
        }

        if ($validated['nama'] !== $destination->nama) {
            $newSlug = Str::slug($validated['nama']);
            $originalSlug = $newSlug;
            $counter = 1;
            while (Destination::where('slug', $newSlug)->where('id', '!=', $destination->id)->exists()) {
                $newSlug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $newSlug;
        } else {
            $validated['slug'] = $destination->slug;
        }


        if($request -> hasFile('gambar')) {
            $validated['gambar'] = $request -> file('gambar') -> store('Asset','public');
        }

        $destination->update($validated);

        return redirect()-> route('Destinations')->with('success','destination berhasil ditambahkan');

    }

    public function delete($id) {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return redirect()->back()->with('Success', 'Destination berhasil dihapus');
    }



}
