<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gamers!!</title>
    <!-- 各種CSSファイルの読み込み -->
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/back.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin_achive.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin_achive_d.css') }}">
    @yield('css')
</head>

<body>
    <div class="layout">
        <!-- ヘッダー部分 -->
        <header class="header">
            <img src="{{ asset('/storage/images/logo.png')}}" alt="logo" class="logo" width="150px" height="auto">
            <div class="headertext">
                <!-- 任意で追加可能なテキスト等 -->
            </div>
        </header>
    </div>

    <main>
        <p>申請者名: {{ $item->username }}</p>
        <p>申請内容: {{ $item->content }}</p>

        @if($item->img)
            <p>申請画像:</p>
            <img src="{{ asset('storage/images/' . $item->img) }}" alt="申請画像" width="300px" height="auto">
        @endif

        <!-- 許可フォーム -->
        <form action="achive_result_true" method="post">
            @csrf
            <div>
                <label for="name">実績名：</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="game_name">ゲーム名：</label>
                <input type="text" name="game_name" id="game_name">
            </div>
            <div>
                <label for="detels">詳細：</label>
                <input type="text" name="detels" id="detels">
            </div>
            <input type="hidden" name="username" value="{{ $item->username }}">
            <input type="hidden" name="apid" value="{{ $id }}">
            <button type="submit">許可する</button>
        </form>

        <!-- 不許可フォーム -->
        <form action="achive_result_false" method="post">
            @csrf
            <input type="hidden" name="apid" value="{{ $id }}">
            <button type="submit">許可しない</button>
        </form>
    </main>
</body>

</html>
