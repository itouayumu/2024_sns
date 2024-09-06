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

    <p class="point">下記の入力欄にどのような実績があるか入力してください</p>
    <p class="point2">画像は大会の結果のランキングや公式サイトの画像等を貼り付けてください</p>
    <form class="achieve" action="{{ route('achieve_action') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="content" id="" method></textarea>
        
        <img id="preview" class="img_datareg" width="auto" height="200px">
        <label>
            <span class="filelabel" title="ファイルを選択">
                <img class="imgicon" src="{{ asset('storage/images/imgpost.png') }}" width="32" height="26" alt="＋画像">
            </span>
            <input type="file" id="hidn" name="img" onchange="previewFile(this);">
        </label>
        <button type="submit">送信</button>
    </form>
    
    <script src="{{ asset('/js/image.js') }}"></script>
</div>
    @endsection