<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ $title  ??  config('app.name') }}</title>

    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body class="bg-body-tertiary min-vh-100 m-0 d-flex flex-column">
<x-navbar/>

<div class="flex-grow-1">
    {{  $slot  }}
</div>

<x-footer/>

@stack('scripts')
</body>
</html>