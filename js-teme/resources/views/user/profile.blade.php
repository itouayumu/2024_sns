@extends('layouts.user_layout_u')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')

<div class="profile">
    <div class="user-info">
        <img src="path/to/user-icon.png" alt="ユーザーアイコン" class="user-icon">
        <img class="user-icon" src="{{asset('/storage/images/'.$userInfo->icon)}}" alt="ユーザーアイコン">
        <a href="user_achieve">実績タグ申請</a>
        <div class="user-details">
            <div class="details1">
                <p>ユーザー名: {{ $items->name }}</p>
                <p>ユーザーID: {{ $userInfo->users_id }}</p>
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
        <p>ポストがありません投稿してみましょう</p>
        @else
        @foreach($posts as $post)
        <div class="post">
            <div class="user-info">

                <img src="{{ asset('/storage/images/' .$post->userInfo->icon) }}" alt="ユーザー画像" class="post-user-icon">

                <div>
                    <span class="username">{{ $post->user->name }}</span>
                    <span class="user_id">ユーザーID</span>

                </div>
                <span class="post-date">{{ $post->created_at }}</span>
            </div>
            <div class="post-content">
                <p>{{ $post->content }}</p>
                <img src="{{asset('/storage/images/'.$post->img)}}" width="auto" height="auto">
            </div>
        </div>

        @endforeach
        @endif
    </div>
</div>

@endsection