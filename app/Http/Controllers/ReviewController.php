<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'destination_id' => 'required|exists:destinations,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string',
    ]);

    Reviews::create([
        'user_id' => auth()->guard('web')->id(),
        'destination_id' => $request->destination_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return back()->with('success', 'Ulasan berhasil dikirim!');
}

    public function destroy($id)
    {
        $review = Reviews::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
