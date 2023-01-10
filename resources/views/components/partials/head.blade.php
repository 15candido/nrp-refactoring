<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&family=Roboto:wght@100&display=swap" rel="stylesheet">

<!-- Styles -->
@stack('stylesheet')
<!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<title>
    {{ isset($title) ? config('app.name', 'NRP-2') . ' | ' . $title : ''}}
</title>

<!-- scripts -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<livewire:styles>