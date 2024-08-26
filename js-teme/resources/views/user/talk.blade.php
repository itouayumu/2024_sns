@extends('layouts.user_layout_tork')

@section('title', 'Index')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/tork.css') }}">
@endsection

@section('content')
    <div class="container">
        <!-- 参加しているコミュニティ -->
        <div class="hed">
            @if($items->isEmpty())
            <p>参加中のコミュニティはありません</p>
            @else
            @foreach($items as $item)
            {{ $item->community->id }}
            <p><a href="#" class="community-link" data-community-id="{{ $item->community->id }}">{{ $item->community->community_name }}</a>
            <img src="{{ asset('/storage/images/' .$item->community->icon) }}" alt="ユーザー画像" class="user_icon" width="32" height="26"></p>
            @endforeach
            @endif
            <div class="menu">
                <span class="icon"><a href="/talk">💬</a></span>
                <span class="icon">👤</span>
                <span class="icon">🔔</span>
            </div>
        </div>
        <div class="back"></div>
        <!-- 会話 -->
        <div class="tork">
            <!-- ここに会話内容を表示 -->
        </div>
        <div class="text">
            <form>
                @csrf
                <textarea name="content"></textarea>
                <input type="hidden" name="community_id" id="community_id">
                <button type="submit">送信</button>
            </form>
        </div>
    </div>
    </div>

    <script>
    // Bladeテンプレートから現在のユーザーIDを文字列として取得
    const currentUserId = "{{ auth()->user()->id }}";
    </script>

    <script src="{{ asset('js/chat.js') }}" defer></script>
@endsection
