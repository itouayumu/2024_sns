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
</head>

<body>
    <div class="layout">
        <header class="header">
            <div class="header-left">

                <a href="/">
                    <img src="http://127.0.0.1:8000/storage/images/logo.png" alt="logo" class="logo" width="150px" height="auto">
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

    <div class="sidebar">
        <div class="recommended-communities">
            <h2>おすすめのコミュニティ</h2>
            @if($recommendation_community->isEmpty())
            <p>コミュニティがありません。作成してみましょう</p>
            @else
            @foreach($recommendation_community as $recommendation_communitys)
            <p class="chat">
                <a href="{{ url('join_community', ['id' => $recommendation_communitys->id]) }}">
                    <img src="{{ asset('/storage/images/'.$recommendation_communitys->icon) }}" alt="アイコン" class="community-icon">
                    <span style="color: #000;">
                        {{ $recommendation_communitys->community_name }}
                    </span>
                    <span class="members-count">{{ $recommendation_communitys->participants_count }}人参加中</span>
                </a>
            </p>
            @endforeach
            @endif

        </div>
        <div class="menu-icons">
            <span class="icon">💬</span>
            <span class="icon">👤</span>
            <span class="icon">🔔</span>
        </div>
    </div>
    <div id="easyModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modalClose">&times;</span>
            </div>
            <div class="modal-body">
                <h1 class="header-title"><span style="color: #FF69B4;">G</span><span style="color: #00FFFF;">A</span><span style="color: #FFD700;">M</span><span style="color: #FF69B4;">E</span><span style="color: #00FFFF;">R</span><span style="color: #FFD700;">S</span><span style="color: #FF69B4;">!!</span></h1>


            </div>
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