<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function fetchMessage()
    {
        return Message::with('user')->get();

    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create(['message' => $request->message]);

//        broadcast(new MessageSent(auth()->user(), $request->message))->toOthers();
        $broadcast = broadcast(new MessageSent(auth()->user(), $message->load('user')))->toOthers();
        return response(['status' => 'Message sent successfully', 'broadcast' => $broadcast]);
    }
}
