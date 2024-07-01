@extends('layouts.user_layout_u')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/top.css') }}">
@endsection

@section('content')
    

 
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <form action="" method="post">
                <textarea name="post-content" id="post-content" cols="30" rows="10" placeholder="今何してます？"></textarea>
                <img id="preview" class="img_datareg" width="200px" height="200px">
                <label>
                    <span class="filelabel" title="ファイルを選択">
                        <img class="imgicon" src="{{ asset('storage/img/img.svg') }}" width="32" height="26" alt="＋画像">
                    </span>
                    <input type="file" id="hidn" name="img" onchange="previewFile(this);">
                </label>
                <button class="postbutton2">投稿</button>
            </form>
        </div>
    </div>
 
    <div class="timeline">
        <div class="post">
            <div class="user-info">
                <img src="path/to/user-icon.png" alt="ユーザーアイコン" class="user-icon">
                <div>
                    <span class="username">ユーザー名</span>
                    <span class="user-id">ユーザーID</span>
                </div>
                <span class="post-date">投稿日</span>
            </div>
            <div class="post-content">
                <p>フリーテキストや長めのコンテンツが入るため、適度なサイズのエリアを確保しています。</p>
            </div>
        </div>
        <!-- 同様のポストが続く -->
    </div>

    <span id="openModalBtn" class="plus-button icon"><span class="text">➕</span></span>
    <script src="http://127.0.0.1:8000/js/image.js"></script>
    <script src="http://127.0.0.1:8000/js/app.js"></script>
    <canvas id="particleCanvas"></canvas>
    <script src="http://127.0.0.1:8000/js/header.js"></script>
@endsection
