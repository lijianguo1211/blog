<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @yield('css')
    <title>LiYi Home</title>
</head>
<body>
@include('flash::message')
@include('home.basics.header')

    @yield('content')
@include('home.basics.footer')
</body>
<script src="{{ mix("js/app.js") }}"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('#flash-overlay-modal').modal();
</script>
</html>
