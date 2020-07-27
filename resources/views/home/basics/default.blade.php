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
<div id="app">
    @include('flash::message')
    @include('home.basics.header')

    @yield('content')
    <div id="toTop" title="Go to top">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-up-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 8.354a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 6.207V11a.5.5 0 0 1-1 0V6.207L5.354 8.354z"/>
        </svg>
    </div>
    @include('home.basics.footer')
</div>

</body>
<script src="{{ mix("js/app.js") }}"></script>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1277155952'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s23.cnzz.com/z_stat.php%3Fid%3D1277155952%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $('#flash-overlay-modal').modal();
</script>
</html>
