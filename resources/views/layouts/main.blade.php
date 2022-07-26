<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icons/line-awesome.min.css') }}">
    <link rel="icon" href="{{ asset('assets/img/animal_icon.png') }}">
</head>
<body>
    
    @include('includes/header')

    @yield('content')

    @include('includes/footer')

    


    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>