@extends('layouts.user_layout')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/top.css') }}">
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
                <li>
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span>pso2(ship3)コミュニティ</span>
                    <span class="members-count">20人参加中</span>
                </li>
                <li>
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span>pso2(ship3)コミュニティ</span>
                    <span class="members-count">20人参加中</span>
                </li>
                <li>
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span>pso2(ship3)コミュニティ</span>
                    <span class="members-count">20人参加中</span>
                </li>
                <li>
                    <img src="path/to/icon.png" alt="アイコン" class="community-icon">
                    <span>pso2(ship3)コミュニティ</span>
                    <span class="members-count">20人参加中</span>
                </li>
            </ul>
        </div>
        <div class="menu-icons">
            <span class="icon">💬</span>
            <span class="icon">👤</span>
            <span class="icon">🔔</span>
            <span class="icon">➕</span>
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
        </div>
    </div>
</div>


<p>post</p>
<a href="/login">ログイン</a>
<a href="/register">登録</a>
<a href="post">投稿</a>
<a href="/community">コミュニティ作成</a>
@endsection