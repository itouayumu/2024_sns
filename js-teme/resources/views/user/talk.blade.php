<div class="container">
    <dix class="hed">
        <img alt="icon">
        @if($items->isEmpty())
        <p>参加中のコミュニティはありません</p>
        @else
        @foreach($items as $item)
        {{ $item->community->community_name }}
        @endforeach
        @endif

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