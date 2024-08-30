@extends('layouts.user_layout_u')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')

<div class="profile">
    <div class="user-info">
        @if ($other_flag)
        <img class="user-icon" src="{{asset('/storage/images/'.$search_info->icon)}}" alt="ユーザーアイコン">
        @else
        <img class="user-icon" src="{{asset('/storage/images/'.$userInfo->icon)}}" alt="ユーザーアイコン">
        @endif
        @if (!$other_flag)
        <a href="user_achieve">実績タグ申請</a>
        @endif
        <div class="user-details">
            <div class="details1">
                @if(session('achieve_tag'))
                あるよ
                else
                ないよ
                @endif
                <p>ユーザー名: {{ $items->name }}</p>
                <p>ユーザーID: {{ $userInfo->users_id }}</p>
                @if ($other_flag)
                @if($follow_flag)
                <form action="{{route('follow_function', ['id' => $items->id ])}}">
                    @csrf
                    <button type="submit">フォローする</button>
                </form>
                @else
                <form action="{{route('follow_cancellation', ['id' => $items->id ])}}">
                    @csrf
                    <button type="submit">フォローしています</button>
                    @endif
                    @endif
            </div>
            <div class="details2">
                <p>フォロワー数:{{ $follow_count }}</p>
                <p>フォロー: {{ $follower_count }}</p>
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