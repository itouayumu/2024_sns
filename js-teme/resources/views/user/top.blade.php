@extends('layouts.user_layout_u')

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
                    @if($community->isEmpty())
                    <p>コミュニティがありません。作成してみましょう</p>
                    @else
                    @foreach($community as $communitys)
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span>{{$communitys->community_name}}</span>
                    <span class="members-count">20人参加中</span>
                    @endforeach
                    @endif
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
            <span class="close">×</span>
            <form action="{{ route('post_action') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <textarea name="content" id="post-content" cols="30" rows="10" placeholder="今何してます？"></textarea>
                <img id="preview" class="img_datareg" width="200px" height="200px">
                <label>
                    <span class="filelabel" title="ファイルを選択">
                        <img class="imgicon" src="{{ asset('storage/img/img.svg') }}" width="32" height="26" alt="＋画像">
                    </span>
                    <input type="file" id="hidn" name="img" onchange="previewFile(this);">
                </label>
                <button type="submit" class="postbutton2">投稿</button>
            </form>
        </div>
    </div>


    <div class="main-content">
        <div class="timeline">
            @if($posts->isEmpty())
            <p>ポストがありません投稿してみましょう</p>
            @else
            @foreach($posts as $post)
            <div class="post">
                <div class="user-info">
                    <img src="path/to/user-icon.png" alt="ユーザーアイコン" class="user-icon">
                    <div>
                        <span class="username">{{ $post->user->name }}</span>
                        <span class="user-id">ユーザーID</span>

                    </div>
                    <span class="post-date">{{ $post->created_at }}</span>
                </div>
                <div class="post-content">
                    <p>{{ $post->content }}</p>
                </div>
            </div>

            @endforeach
            @endif
            <a href="/community">コミュニティ作成</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            <!-- 同様のポストが続く -->
        </div>
    </div>
</div>

<span id="openModalBtn" class="plus-button icon"><span class="text">➕</span></span>
<script src="{{ asset('/js/image.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection