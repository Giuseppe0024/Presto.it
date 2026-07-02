<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Un utente ha chiesto di lavorare con noi.</h1>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Se vuoi renderl* revisor clicca qui: </p>
        <a href="{{ route('make.revisor', $user) }}">Rendi revisor</a>
        
    </div>
</body>
</html>