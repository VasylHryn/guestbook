<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Гостевая книга</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('message.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea name="message" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

        <hr>
        <h2>Сообщения:</h2>
        @foreach($messages as $message)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $message->name }}</h5>
                    <p class="card-text">{{ $message->message }}</p>
                    <p class="text-muted">{{ $message->created_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
