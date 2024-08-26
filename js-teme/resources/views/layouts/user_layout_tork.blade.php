<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gamers!!</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/back.css') }}">
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="layout">
        <header class="header">
            <div class="header-left">
                <a href="/">

                    <img src="{{ asset('/storage/images/') }}" alt="logo" class="logo" width="150px" height="auto">
                </a>
            </div>

            <div class="header-right">
                <form action="{{ route('search_result') }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf
                    <select name="kinds">
                        <option value="user">ユーザー</option>
                        <option value="post">投稿</option>
                        <option value="community">コミュニティ</option>
                    </select>
                    <input type="text" name="search" class="search2">
                    <button type="submit" id="modalOpen" class="button">検索</button>
                </form>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">ログアウト</button>
                </form>
                <a href="/user_profile"><img class="icon" src="{{asset('/storage/images/'.$userInfo->icon)}}" alt="ユーザーアイコン"></a>
            </div>
        </header>
    </div>

   

    </div>


    @yield('content')
    </div>


    <canvas id="particleCanvas"></canvas>

    <script src="{{ asset('/js/header.js') }}"></script>
    <script src="{{ asset('/js/back.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>