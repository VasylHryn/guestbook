<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .guestbook-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .message-item {
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .message-item h5 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <p class="text-center">Are you an admin? <a href="/admin/messages">Go to messages</a></p>

        <div class="guestbook-header">
            <h1>Guestbook</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="form-container">
            <form action="{{ route('message.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="message">Your feedback</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>

        <div class="mt-5">
            <h2>Reviews</h2>
            <ul class="list-group">
                @foreach($messages as $message)
                    <li class="list-group-item message-item">
                        <h5>{{ $message->name }}</h5>
                        <p>{{ $message->message }}</p>
                        <small class="text-muted">{{ $message->created_at->format('d.m.Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
