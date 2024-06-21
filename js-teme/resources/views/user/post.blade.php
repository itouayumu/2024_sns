@extends('layouts.user_layout')

@section('title','Index')
@section('css')

@section('content')
<p>toppage</p>
<a href="/index">top</a>
{{$user_id}}
<form action="/post_action" method="post">
    @csrf
    <input type="text" name="content">
    <input type="file" name="img">
    <input type="submit" value="投稿">
</form>
@endsection