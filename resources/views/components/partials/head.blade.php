<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">


<!--  -->
<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<meta name="description" content="Simple landind page" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
<!--Replace with your tailwind.css once created-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
<!-- Define your gradient here - use online tools to find a gradient matching your branding-->


<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Styles -->
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<!-- Scripts -->
<script src="{{ asset('js/main.js')}}" defer></script>
<script src="{{ asset('js/drop-down.js')}}" defer></script>
<script src="{{ asset('js/app.js')}}" defer></script>

<title>@yield('title','Nagoya Meshi')</title>

<livewire:styles>