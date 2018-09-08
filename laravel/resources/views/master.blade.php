<!DOCTYPE html>
<html lang="fa">
<head>
    <!-- Main -->
    <meta charset="UTF-8">
    <title>{{"فروشگاه آنلاین"}} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(App::isLocal())
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.min.css') }}">
    @else
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    @yield('head')
    <!-- SEO -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="author" href="https://plus.google.com/106945145782595448252">
    <link rel="publisher" href="https://google.com/+GooglePlusPage">
</head>
<body>

<section class="container">
    <main class="col-md-9 container-fluid main">
        @yield('main')
    </main>
    <main class="col-md-3 container-fluid main">
        @yield('sidebar')
    </main>
</section>

<footer class="footer navbar-fixed-bottom">
    <div class="container">
        <div class="col-md-6 center-xs center-sm">
        </div>
        <hr class="hidden-md hidden-lg">
        <div class="col-md-6 text-left center-xs center-sm">
            <a href="/" class="hidden-xs">خانه</a>
            <span class="hidden-xs">|</span>
            <a href="/guide">راهنما</a>
            <span>|</span>
            <a href="/publicity">تبلیغات</a>
            <span>|</span>
            <a href="/rules">قوانین</a>
            <span>|</span>
            <a href="/about">درباره</a>
            <span>|</span>
            <a href="{{url('/relevance')}}">ارتباط</a>
        </div>
    </div>
</footer>
<!-- The End -->