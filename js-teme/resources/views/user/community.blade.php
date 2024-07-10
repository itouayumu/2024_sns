@extends('layouts.user_layout')

@section('title', 'Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('/css/community.css') }}">

<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('create_community') }}" method="POST" enctype="multipart/form-data" class="com_form">
            @csrf
            <div class="form-group">
                <label class="com">コミュニティ名</label>
                <input type="text" name="community_name">
            </div>
            <div class="form-group">
                <label class="game">ゲーム名</label>
                <input type="text" name="game">
            </div>
            <div class="form-group">
                <label class="open">オープン</label>
                <div class="radio-group">
                    <input type="radio" name="public_flag" value="1" checked>
                    <label class="pr">プライベート</label>
                    <input type="radio" name="public_flag" value="0">
                </div>
            </div>
            <div class="form-group">
                <label class="dete">コミュニティ説明</label>
                <textarea name="comu_explanation"></textarea>
            </div>
            <div class="form-group">
                <label class="jya">ジャンル</label>
                <select name="genre">
                    @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>アイコン</label>
                <img id="preview" class="img_datareg" width="150px" height="150px">
                <label>
                    <span class="filelabel" title="ファイルを選択">
                    </span>
                    <input type="file" id="hidn" name="icon" onchange="previewFile(this);">
                    <img class="imgicon" src="{{ asset('storage/img/img.svg') }}" width="32" height="26" alt="＋画像">
                </label>
            </div>
            <input type="submit" value="投稿">
        </form>
    </div>
</div>
<script src="{{ asset('/js/image.js') }}"></script>
@endsection