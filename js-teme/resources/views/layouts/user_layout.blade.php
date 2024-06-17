<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="{{ asset('/css/header.css') }}">
</head>
<body>
    <header class="header">
    <img src="{{ asset('storage/img/SNS_rogo.png') }}" alt="logo" class="logo" width="150px" height="auto">
    <button type="buttton">検索</button>
        <p class="title"><a href="top"></a></p>

        <div class=menu>
            
        </div>


    </header>
@section('content')
    
            @yield('content')


</body>
</html>