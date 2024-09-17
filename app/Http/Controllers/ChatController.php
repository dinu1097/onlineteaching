<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class ChatController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $authUser = Auth::user();
    
        // Fetch the last 10 unique receivers with the latest chat for each
        $recentChats = DB::table('chats')
            ->select('users.user_id', 'users.name', 'users.role')
            ->join('users', 'chats.receiver_id', '=', 'users.user_id') // Join with users table
            ->join(DB::raw('(SELECT receiver_id, MAX(created_at) as latest_chat 
                             FROM chats 
                             WHERE sender_id = '.$authUser->user_id.' 
                             GROUP BY receiver_id) as latest_chats'), 
                   'chats.receiver_id', '=', 'latest_chats.receiver_id')
            ->where('chats.created_at', '=', DB::raw('latest_chats.latest_chat'))
            ->where('chats.sender_id', $authUser->user_id)
            ->distinct('chats.receiver_id') // Ensure distinct receiver IDs
            ->orderBy('latest_chats.latest_chat', 'desc') // Order by the latest chat's created_at
            ->limit(10)
            ->get();
    
        // Get the selected user if any
        $selectedUser = null;
        $chats = [];
    
        if (session()->has('selected_user')) {
            $selectedUser = User::find(session('selected_user'));
            $chats = Chat::where(function($query) use ($selectedUser) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $selectedUser->user_id);
            })->orWhere(function($query) use ($selectedUser) {
                $query->where('sender_id', $selectedUser->user_id)
                      ->where('receiver_id', Auth::id());
            })->get();
        }
    
        return view('chat', [
            'recentChats' => $recentChats,
            'selectedUser' => $selectedUser,
            'chats' => $chats
        ]);
    }
    
    

    public function selectUser(Request $request)
    {
        $request->validate([
            'selected_user' => 'required|exists:users,user_id',
        ]);

        session(['selected_user' => $request->selected_user]);

        return redirect()->route('chat.index');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,user_id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index');
    }
}
