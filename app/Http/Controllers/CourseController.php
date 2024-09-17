<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // Method to list all courses (index)
    public function index()
    {
        $courses = Course::cursorPaginate(6); // Adjust the number (6) to control how many courses per page
        return view('index', compact('courses'));
    }
    
    public function show($id)
    {
        
        $course = Course::with(['teacher', 'reviews.student'])->findOrFail($id);
        // Pass teacher's ID to the view
        $teacherId = $course->teacher->user_id;  
        $reviews = DB::table('reviews')
        ->join('users', 'reviews.user_id', '=', 'users.user_id')
        ->where('course_id', $id)
        ->select('reviews.*', 'users.name as username')
        ->get();
        return view('course-details', compact('course', 'teacherId', 'reviews'));
    }

    public function createCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'standard' => 'required|string',
            'subject' => 'required|string',
            'price' => 'required|numeric',
            'intro_video' => 'required|file|mimes:mp4,avi,mkv',
            'course_video' => 'required|file|mimes:mp4,avi,mkv',
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png|max:5120', // 5MB max
        ]);
    
        // Handle video uploads
        $introVideoPath = $request->file('intro_video')->store('videos', 'public');
        $courseVideoPath = $request->file('course_video')->store('videos', 'public');
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        // Set default teacher_id
        $teacherId = Auth::id(); // Default teacher ID
    
        // Create a new course with the default teacher_id and video paths
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'standard' => $request->standard,
            'subject' => $request->subject,
            'price' => $request->price,
            'teacher_id' => $teacherId,
            'intro_video' => $introVideoPath,
            'course_video' => $courseVideoPath,
            'thumbnail' => $thumbnailPath,
        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Course created successfully');
    }

    // Method to update a course
    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return response()->json(['message' => 'Course updated successfully']);
    }

    // Method to delete a course
    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully']);
    }

    public function findCourse(Request $request)
    {

        $query = Course::query();
        if ($request->has('standard')) {
            $query->where('standard', $request->input('standard'));
        }
        if ($request->has('subject')) {
            $query->where('subject', $request->input('subject'));
        }
        $courses = $query->cursorPaginate(6);
        return view('index', compact('courses'));
    }

    public function dashboardTeachers()
    {
        $teacherId = Auth::id();
        $courses = Course::where('teacher_id', $teacherId)->get();
        $teacher = User::find($teacherId); // Fetch teacher details
    
        return view('dashboard-teachers', compact('courses', 'teacher'));
    }
    public function dashboardStudents()
    {
        $studentId = Auth::id();
        // Fetch courses for the given student ID
        $courses = Course::join('enrollments', 'courses.course_id', '=', 'enrollments.course_id')
                        ->where('enrollments.student_id', $studentId)
                        ->select('courses.*')
                        ->get();

        return view('dashboard-students', compact('courses'));
    }
}
