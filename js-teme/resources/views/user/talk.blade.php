<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <!-- 参加しているコミュニティ -->
        <div class="hed">
            @if($items->isEmpty())
            <p>参加中のコミュニティはありません</p>
            @else
            @foreach($items as $item)
            {{ $item->community->id }}
            <a href="#" class="community-link" data-community-id="{{ $item->community->id }}">{{ $item->community->community_name }}</a>
            <img src="{{ asset('/storage/images/' .$item->community->icon) }}" alt="ユーザー画像" class="user_icon" width="32" height="26">
            @endforeach
            @endif
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
    <script src="{{ asset('js/chat.js') }}" defer></script>

</body>