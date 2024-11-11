<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('guestbook.index', compact('messages'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);


        Message::create([
            'name' => $request->name,
            'message' => $request->message,
        ]);


        return redirect()->route('guestbook')->with('success', 'Ваш отзыв добавлен.');
    }
        public function adminIndex()
    {
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Сообщение удалено.');
    }
}

