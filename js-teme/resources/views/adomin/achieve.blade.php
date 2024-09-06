<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gamers!!</title>
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/back.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/admin_achive.css') }}">
    @yield('css')
</head>

<body>
    <div class="layout">

        <header class="header">
            <img src="{{ asset('/storage/images/logo.png')}}" alt="logo" class="logo" width="150px" height="auto">
            <div class="headertext">
            </div>
        </header>
    </div>
<main>
    @if($items->isEmpty())
    <p>現在申請は来ていません</p>
    @else
    <table>
        <tr>
            <td>申請者名</td>
            <td>申請内容</td>
            <td></td>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->username }}</td>
            <td>{{ $item->content }}</td>
            <td><a href="{{ route('aplication', ['id' => $item->id]) }}" >詳細</a></td>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</main>
</body>

</html>