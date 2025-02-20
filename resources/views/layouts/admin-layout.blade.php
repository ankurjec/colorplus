<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
        .chart-container {
            width: 300px;
            margin-right: 10px;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            left: -60px;
        }
        h1 {
            font-family: Satoshi, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    @yield('content')
    <script>
        // Add your custom scripts here
    </script>
</body>

</html>
