@extends('layouts.user_layout')

@section('title', 'Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('/css/community.css') }}">
<link rel="stylesheet" href="{{ asset('/css/join.css') }}">

<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@endsection


@section('content')
<div class="main">

    <h1>{{ $community->community_name }}</h1>
    <img src="{{ asset('/storage/images/' .$community->icon) }}" alt="コミュニティ画像" class="community-image">

    @if(!$join_flag)
    <form action="{{ route('join_function', ['community_id' => $community->id]) }}" method="post">
        @csrf
        <button type="submit">参加する</button>
    </form>
    @else
    <p>参加中です<a href="/talk"><button>参加中のコミュニティへ</button></a></p>
    @endif
</div>