<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get(); // Получение всех сообщений
        return view('guestbook.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->only('name', 'message'));

        return redirect()->route('home')->with('success', 'Ваше сообщение добавлено!');
    }
}

