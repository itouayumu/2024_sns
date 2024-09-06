<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gamers!!</title>
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/back.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    @yield('css')
</head>

<body>
    <div class="layout">

        <header class="header">
        <img src="{{ asset('/storage/images/logo.png') }}" alt="logo" class="logo" width="150px" height="auto">

            <div class="headertext">
                <a href="/login" class="header_link">ログイン</a>
                <a href="/register" class="header_link">新規登録</a>
            </div>
        </header>
    </div>
    <div class="main">    
        @yield('content')
    </div>
    
    
    <canvas id="particleCanvas"></canvas>


    <script src="{{ asset('/js/back.js') }}"></script>
</body>

</html>