<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    // Method to enroll a student in a course
    public function enrollCourse(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,user_id',
            'course_id' => 'required|exists:courses,course_id',
        ]);

        $enrollment = Enrollment::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'payment_status' => 'pending',
        ]);

        return response()->json(['message' => 'Enrollment successful'], 201);
    }

    // Method to cancel an enrollment
    public function cancelEnrollment($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return response()->json(['message' => 'Enrollment canceled']);
    }
}
