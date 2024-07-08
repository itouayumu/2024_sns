@extends('layouts.user_layout_u')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/top.css') }}">
@endsection

@section('content')

<p>ユーザー名{{ $items->name }}</p>
<p>ユーザーid</p>
<p>フォロワー数</p>
<p>フォロワー</p>
<p>タイムライン</p>
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

@endsection