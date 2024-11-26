<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .btn-press:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Guestbook</h1>
        @if(session('success'))
            <div class="mt-4 bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2 text-lg">Your Name</label>
                <input type="text" id="name" name="name"
                       class="w-full h-12 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-lg px-4"
                       placeholder="Enter your name" required>
            </div>

            <div class="mb-6">
                <label for="message" class="block text-gray-700 font-medium mb-2 text-lg">Your Review</label>
                <textarea id="message" name="message" rows="5"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 focus:outline-none text-lg px-4 py-3"
                          placeholder="Write your message here..." required></textarea>
            </div>

            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-medium mb-2 text-lg">Attach Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                       class="w-full text-gray-600 file:mr-4 file:py-3 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-100 file:text-blue-500 hover:file:bg-blue-200">
            </div>

            <button type="submit"
                    class="btn-press w-full bg-blue-600 text-white py-3 text-lg rounded-lg shadow-lg hover:bg-blue-700 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-offset-2 active:scale-95 transition-transform duration-150">
                Send
            </button>
        </form>
    </div>

    <div class="mt-12 max-w-2xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Reviews</h2>
        <ul class="space-y-6">
            @foreach($messages as $message)
                <li class="bg-white p-6 rounded-lg shadow-md">
                    <h5 class="text-xl font-bold text-gray-800">{{ $message->name }}</h5>
                    <p class="text-gray-600 mt-2">{{ $message->message }}</p>
                    @if($message->image)
                        <img src="{{ asset('storage/' . $message->image) }}" alt="Image"
                             class="mt-4 rounded-lg shadow-md">
                    @endif
                    <small class="text-gray-500 mt-2 block">{{ $message->created_at->format('d.m.Y H:i') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    <p class="text-center text-gray-600 mt-12">
        Are you an admin? <a href="/admin/messages" class="text-blue-500 underline hover:text-blue-600">Go to
            messages</a>
    </p>
</div>

</body>
</html>
