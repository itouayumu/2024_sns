<h1>{{ $community->community_name }}</h1>
<img src="{{ asset('/storage/images/' .$community->icon) }}" alt="コミュニティ画像" class="community-image">
{{ $community->user->name }}
{{ $community->genre->name }}
{{ $community->comu_explanation}}
{{ $community->id }}
<form action="{{ route('join_function', ['community_id' => $community->id]) }}" method="post">
    @csrf
    <button type="submit">参加する</button>