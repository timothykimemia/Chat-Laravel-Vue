<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function rooms(Request $request)
    {
        return ChatRoom::all();
    }

    public function messages(Request $request, $roomId)
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

        return $new_message;
    }
}
