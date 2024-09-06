@extends('layouts.user_layout_u')
@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/top.css') }}">
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">


    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <form action="{{ route('post_action') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <textarea name="content" id="post-content" cols="30" rows="10" placeholder="今何してます？"></textarea>
                <img id="preview" class="img_datareg" width="auto" height="200px">
                <label>
                    <span class="filelabel" title="ファイルを選択">
                        <img class="imgicon" src="{{ asset('storage/images/imgpost.png') }}" width="40" height="40" alt="＋画像">
                    </span>
                    <input type="file" id="hidn" name="img" onchange="previewFile(this);">
                </label>
                <button type="submit" class="postbutton2">投稿</button>
            </form>
        </div>
    </div>


    <div class="main-content">
        <div class="timeline">
            @if(isset($user) && count($user) > 0)
            @foreach($user as $u)
            <div class="post">
                <div class="user-info">
                    <div>
                        <img src="{{ asset('/storage/images/'.$u->userInfo->icon) }}" alt="アイコン" class="community-icon">
                        <a href="{{ route('other_profile', ['id' => $u->id]) }}" class="username">{{ $u->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach

            @elseif(isset($posts) && count($posts) > 0)
            @foreach($posts as $p)
            <div class="post">
                <div class="user-info">
                    <div>
                        <img src="{{ asset('/storage/images/'.$p->userInfo->icon) }}" alt="アイコン" class="community-icon">
                        <span class="username"><a href="{{ route('other_profile', ['id' => $p->user->id]) }}">{{ $p->user->name }}</a></span>
                        <div class="post-content">
                            <p class="username">{{ $p->content }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @elseif(isset($community) && count($community) > 0)
            @foreach($community as $c)
            <div class="post">
                <div class="user-info">
                    <div>
                        <img src="{{ asset('/storage/images/'.$c->icon) }}" alt="アイコン" class="community-icon">
                        <span class="username"><a href="{{ url('join_community' ,['id' => $c->id]) }}">{{ $c->community_name }}</a></span>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <p>検索結果はありません</p>
            @endif
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <!-- 同様のポストが続く -->
        </div>
    </div>
</div>

<span id="openModalBtn" class="plus-button icon"><span class="text"><img src="{{ asset('storage/images/post.png') }}" alt="投稿する" height="100px" width="100px"></span></span>
<script src="{{ asset('/js/image.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/post.js') }}"></script>