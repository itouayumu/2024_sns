@extends('layouts.user_layout')

@section('title','Index')
@section('css')
<link rel="stylesheet" href="{{ asset('/css/post.css') }}">
@section('content')
<form action="{{ route('post_action') }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf
    <div class="form1">
        <textarea name="content"></textarea>
        <div class="img">
            <input type="file" name="img" onchange="previewFile(this);">
        </div>
        <button type="submit">投稿</button>
    </div>
    <div class="form2">
        <div class="img-bg">
            <img id="preview" class="img_datareg"alt="画像を添付してください" width="200px" height="200px">
        </div>
    </div>



                <script src="{{ asset('/js/image.js') }}"></script>

</form>
@endsection