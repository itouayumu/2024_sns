<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>三角形のパーティクルアニメーション</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/back.css') }}">
    @yield('css')
</head>

<body>
    <div class="layout">
        <header class="header">
            <div class="header-left">
                <img src="http://127.0.0.1:8000/storage/img/SNS_rogo.png" alt="logo" class="logo" width="150px" height="auto">
            </div>

            <div class="header-right">
                <button id="modalOpen" class="button">Click Me</button>
                <a href="/user_profile"><img class="icon" src="http://127.0.0.1:8000/storage/img/test_icon.jpg" alt="ユーザーアイコン"></a>
            </div>
        </header>
    </div>

    <div class="sidebar">
        <div class="recommended-communities">
            <h2>おすすめのユーザー</h2>
            <ul>
                <li class="topic">
                    <img src="http://127.0.0.1:8000/storage/img/test_icon.jpg" alt="アイコン" class="community-icon">
                    <span>名無しさん</span>
                </li>
                <!-- 同様のリストアイテムが続く -->
            </ul>
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
                <button id="modalOpenInner" class="button">Click Me</button>
            </div>
        </div>
    </div>

    @yield('content')
    </div>


    <canvas id="particleCanvas"></canvas>

    <script src="{{ asset('/js/header.js') }}"></script>
    <!-- <script src="{{ asset('/js/back.js') }}"></script> -->
</body>

</html>