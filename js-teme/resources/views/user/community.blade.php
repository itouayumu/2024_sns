@extends('layouts.user_layout')

@section('title','Index')
@section('css')

@section('content')
<p>create community</p>
<a href="/index">top</a>
<form action="{{ route('create_community') }}" method="POST" enctype="multipart/form-data">
    @csrf
    コミュニティ名<input type="text" name="community_name">
    ゲーム名<input type="text" name="game">
    オープン<input type="radio" name="public_flag" value="1" checked>
    プライベート<input type="radio" name="public_flag" value="0">
    コミュニティ説明<input type="textarea" name="comu_explanation">
    ジャンル<select name="genre">
        @foreach ($items as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    アイコン<input type="file" name="icon">
    <input type="submit" value="投稿">
</form>
@endsection