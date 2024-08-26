<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gamers!!</title>
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/back.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin_achive.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin_achive_d.css') }}">
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
            <p>申請者名:{{ $item->username }}</p>
            <p>申請内容:{{ $item->content }}</p>
            @if($item->img)
                <p>申請画像:</p>
                <img src="{{ asset('storage/' . $item->image_path) }}" alt="申請画像" width="300px" height="auto">
            @endif
            <form action="achive_result_true"method="post">
                @csrf
                <span>実績名：</span><input type="text"name="name"></input>
                <span>ゲーム名：</span><input type="text"name="game_name"></input>
                <span>詳細：</span><input type="text"name="detels"></input>
                <input type="hidden"name="username" value='{{$item->username}}'></input>
                <input type="hidden" name="apid" value="{{ $id }}">


                <button type=submit >許可する</a>
            </form>
            <form action="achive_result_false"method="post">
                @csrf
                <input type="hidden" name="apid" value="{{ $id }}">
                <button href="achive_result_false">許可しない</button>
            </form>


</main>
</body>

</html>