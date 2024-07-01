@extends('layouts.user_layout')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/top.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="sidebar">
        <div class="recommended-communities">
            <h2>おすすめのコミュニティ</h2>
            <ul>
                <li>
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span>pso2(ship3)コミュニティ</span>
                    <span class="members-count">20人参加中</span>
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
    
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="" method="post">
                <textarea name="post-content" id="post-content" cols="30" rows="10" placeholder="今何してます？"></textarea>
                <img id="preview" class="img_datareg"width="200px" height="200px">
                <label>
                    <!-- ▽見せる部分 -->
                    <span class="filelabel" title="ファイルを選択">
                        <img class="imgicon"src="{{ asset('storage/img/img.svg') }}" width="32" height="26" alt="＋画像">
                    </span>
                    <!-- ▽本来の選択フォームは隠す -->
                    <input type="file" id="hidn" name="img" onchange="previewFile(this);">
                </label>
                <a class="postbutton2">投稿</button>
        </div>
    </div>
    

    <div class="main-content">
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
    </div>
</div>

<span id="openModalBtn" class="plus-button icon"><span class="text">➕</span></span>
<script src="{{ asset('/js/image.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection

