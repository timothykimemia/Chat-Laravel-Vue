<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        return Inertia::render('Chat/Index');

    }

    public function rooms()
    {
        return ChatRoom::all();
    }

    public function messages($roomId)
    {
        return ChatMessage::where('chat_room_id', $roomId)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function newMessage(Request $request, $roomId)
    {
        $new_message = new ChatMessage();
        $new_message->user_id = auth()->id();
        $new_message->chat_room_id = $roomId;
        $new_message->message = $request->message;
        $new_message->save();

        broadcast( new NewChatMessage($new_message) )->toOthers();

        return $new_message;
    }
}
