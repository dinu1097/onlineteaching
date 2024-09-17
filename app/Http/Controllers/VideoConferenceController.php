<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoConference;

class VideoConferenceController extends Controller
{
    // Method to start a video conference
    public function startConference(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,user_id',
            'student_id' => 'required|exists:users,user_id',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $conference = VideoConference::create([
            'teacher_id' => $request->teacher_id,
            'student_id' => $request->student_id,
            'start_time' => $request->start_time,
            'status' => 'scheduled',
        ]);

        return response()->json(['message' => 'Conference started successfully'], 201);
    }

    // Method to end a video conference
    public function endConference(Request $request, $id)
    {
        $conference = VideoConference::findOrFail($id);
        $conference->end_time = $request->end_time;
        $conference->status = 'completed';
        $conference->save();

        return response()->json(['message' => 'Conference ended']);
    }
}
