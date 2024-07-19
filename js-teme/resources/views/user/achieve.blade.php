@extends('layouts.user_layout_u')

@section('title', 'Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('/css/community.css') }}">
<link rel="stylesheet" href="{{ asset('/css/achieve.css') }}">

<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@endsection

@section('content')
<div>

    <form class="achieve">
        <input type="text" name="gamename">
        
        <img id="preview" class="img_datareg" width="auto" height="200px">
        <label>
            <span class="filelabel" title="ファイルを選択">
                <img class="imgicon" src="{{ asset('storage/img/img.svg') }}" width="32" height="26" alt="＋画像">
            </span>
            <input type="file" id="hidn" name="img" onchange="previewFile(this);">
        </label>
    </form>
    
    <script src="{{ asset('/js/image.js') }}"></script>
</div>
    @endsection