<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
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
                <label for="name">Ваше имя</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="message">Ваш отзыв</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

        <div class="mt-5">
            <h2>Отзывы</h2>
            <ul class="list-group">
                @foreach($messages as $message)
                    <li class="list-group-item">
                        <h5>{{ $message->name }}</h5>
                        <p>{{ $message->message }}</p>
                        <small>{{ $message->created_at->format('d.m.Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>
