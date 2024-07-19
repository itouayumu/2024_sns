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
            <img src="{{ asset('storage/img/SNS_rogo.png')}}" alt="logo" class="logo" width="150px" height="auto">
            <div class="headertext">
            </div>
        </header>
    </div>
<main>
    <session></session>
</main>
</body>

</html>