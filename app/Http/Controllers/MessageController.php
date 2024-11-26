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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    Message::create([
        'name' => $request->name,
        'message' => $request->message,
        'image' => $imagePath,
    ]);

    return redirect()->route('guestbook')->with('success', 'Ваш отзыв добавлен.');
}

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages')->with('success', 'Сообщение удалено.');
    }
    public function adminIndex()
{
    $messages = Message::latest()->get();

    return view('admin.messages.index', compact('messages'));
}
}

