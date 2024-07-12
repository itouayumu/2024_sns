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
                    <img src="http://127.0.0.1:8000/storage/img/SNS_rogo.png" alt="logo" class="logo" width="150px" height="auto" >
                </a>            </div>

            <div class="header-right">
            <form>
                    <select>
                        <option value="1">ユーザー</option>
                        <option value="2">投稿</option>
                        <option value="3">コミュニティ</option>
                    </select>
                    <input type="text" name="search2" class="search">
                    <button  class="button">検索</button>
                </form>
                <img class="icon" src="http://127.0.0.1:8000/storage/img/test_icon.jpg" alt="ユーザーアイコン">
            </div>
        </header>
    </div>

    <div class="sidebar">
        <div class="recommended-communities">
            <h2>おすすめのコミュニティ</h2>
            @if($community->isEmpty())
                    <p>コミュニティがありません。作成してみましょう</p>
                    @else
                    @foreach($community as $communitys)
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span><a href="{{ url('join_community' ,['id' => $communitys->id]) }}">{{$communitys->community_name}}</a></span>
                    <span class="members-count">20人参加中</span>
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
                <form>
                    <input type="text" placeholder="Search..." class="search">
                    <select>
                        <option value="1">ユーザー</option>
                        <option value="2">投稿</option>
                        <option value="3">コミュニティ</option>
                    </select>
                </form>

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