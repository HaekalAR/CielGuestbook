<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ciel's Guestbook</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="CSS/style.css">
    {{-- Font: Pixelify Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Lounge</h1>
            <p class="ph-1">A calm space to share your thoughts and leave yor mark</p>
            <p class="ph-2">Welcome to Lounge, a minimalist guestbook where visitors can leave moments, messages, and
                memories in a
                serene digital space.</p>
            <div class="header-button">
                <button>Leave a Mark</button>
            </div>
        </div>

        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif

        <div class="body">

            {{-- Message form --}}
            <div class="form">
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <div class="input-name">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required maxlength="50">
                    </div>
                    <div class="input-message">
                        <label for="message">Message</label>
                        <textarea type="text" id="message" name="message" required maxlength="512"></textarea>
                    </div>
                    <div class="input-submit">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>

            {{-- Guestbook messages --}}
            <div class="guestbook-messages">
                <div class="msg-header">
                    <p>Your Digital Footprints</p>
                </div>
                <div class="message-list">
                    @forelse ($messages as $msg)
                        <div class="message-item">
                            <p class="g-name">{{ $msg->name }}</p> 
                            <p class="g-message">{{ $msg->message }}</p>
                            <small class="muted-text">{{ $msg->created_at->diffForHumans() }}</small>
                        </div>
                    @empty
                        <div>
                            <p>There is no any message right now, come back later?</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Made by Zaychik
        </div>
    </div>
</body>

</html>
