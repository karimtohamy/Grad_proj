<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comments' => 'nullable|string',
            'rater_id' => 'required|integer',
            'rater_type' => 'required|string',
            'rated_id' => 'required|integer',
            'rated_type' => 'required|string',
        ]);

        $review = Review::create($validated);
        return response()->json($review->load(['rater', 'rated']), 201);

    }
}
