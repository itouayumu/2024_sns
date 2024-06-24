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
            <img src="{{ asset('storage/img/SNS_rogo.png') }}" alt="logo" class="logo" width="150px" height="auto">
            <div class="header-right">
                <button id="modalOpen" class="button">Click Me</button>
                <img class="icon" src="{{ asset('storage/img/test_icon.jpg') }}" alt="ユーザーアイコン">
            </div>
            <div id="easyModal" class="modal">
                <span class="modalClose"></span>
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="header-left">
                            <h1 class="header-title"><span style="color: #FF69B4;">G</span><span style="color: #00FFFF;">A</span><span style="color: #FFD700;">M</span><span style="color: #FF69B4;">E</span><span style="color: #00FFFF;">R</span><span style="color: #FFD700;">S</span><span style="color: #FF69B4;">!!</span></h1>
                        </div>
                        <div class="header-center">
                            <form>
                                <input type="text" placeholder="Search...">
                                <select>
                                    <option value="1">ユーザー</option>
                                    <option value="2">投稿</option>
                                    <option value="3">コミュニティ</option>
                                </select>
                            </form>
                        </div>
                        <div class="header-right">
                            <button id="modalOpenInner" class="button">Click Me</button>
                        </div>
                    </div>
                </div>
            </div>

        </header>
    </div>
    @yield('content')
    
    
    <canvas id="particleCanvas"></canvas>

    <script src="{{ asset('/js/header.js') }}"></script>
    <script src="{{ asset('/js/back.js') }}"></script>
</body>

</html>