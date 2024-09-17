<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $request->validate([
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'course_id' => $courseId,
            'user_id' => Auth::id(),
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }

    /**
     * Display the specified course's reviews.
     */
public function show($courseId)
{
    // Perform a join to get the reviews along with the user's name
    $course = Course::findOrFail($courseId);

    $reviews = DB::table('reviews')
                ->join('users', 'reviews.user_id', '=', 'users.user_id')
                ->where('course_id', $courseId)
                ->select('reviews.*', 'users.name as username')
                ->get();

    return view('courses.show', compact('course', 'reviews'));
}
}
