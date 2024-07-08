@extends('layouts.user_layout')

@section('title','Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/tork.css') }}">
@endsection

@section('content')
<div class="container">
    <dix class="hed">
        <img alt="icon">
        <p>コミュニティ名
        </p>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </dix>
    <div class="back"></div>
<div class="tork">

</div>
<div class="text">
    <form>
        <textarea name="tork"></textarea>
        <button type="submit">送信</button>
    </form>
</div>
</div>


@endsection