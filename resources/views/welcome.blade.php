<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocena Filmów</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 50px;
            background: #333;
            color: white;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }
        .buttons a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }
        .buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Oceniarka Filmów</h1>
        <p>Twój portal do odkrywania i oceniania najlepszych filmów!</p>
    </header>
    <div class="container">
        @auth
            <h2>Witaj, {{ auth()->user()->name }}!</h2>
            <p>Przejdź do sekcji filmów, aby rozpocząć ocenianie.</p>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Przejdź do aplikacji</a>
        @else
            <h2>Dołącz do nas!</h2>
            <p>Zaloguj się lub zarejestruj, aby zacząć przygodę z ocenianiem filmów.</p>
            <div class="buttons">
                <a href="{{ route('login') }}">Zaloguj się</a>
                <a href="{{ route('register') }}">Zarejestruj się</a>
            </div>
        @endauth
    </div>
</body>
</html>
