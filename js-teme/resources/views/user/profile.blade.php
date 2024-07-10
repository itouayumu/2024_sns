@extends('layouts.user_layout_u')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')

<div class="profile">
    <div class="user-info">
        <img src="path/to/user-icon.png" alt="ユーザーアイコン" class="user-icon">
        <div class="user-details">
            <div class="details1">
                <p>ユーザー名: {{ $items->name }}</p>
                <p>ユーザーID: {{ $items->id }}</p>
            </div>
            <div class="details2">
                <p>フォロワー数: {{ $items->followers_count }}</p>
                <p>フォロー: {{ $items->following_count }}</p>
            </div>
        </div>
    </div>

    <h2 class="title">タイムライン</h2>
    <div class="timeline">

        @if($posts->isEmpty())
        <p class="no_post">ポストがありません投稿してみましょう</p>
        @else
        @foreach($posts as $post)
        <div class="post">
            <div class="post-user-info">
                <img src="path/to/user-icon.png" alt="ユーザーアイコン" class="post-user-icon">
                <div class="post-user-details">
                    <span class="post-username">{{ $post->user->name }}</span>
                    <span class="post-user-id">{{ $post->user->id }}</span>
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

@endsection
