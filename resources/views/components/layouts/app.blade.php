<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $title  ??  config('app.name') }}</title>

    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body class="bg-body-tertiary">
<x-navbar/>

<div>
    {{  $slot  }}
</div>

<x-footer/>
</body>
</html>