<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gamers!!</title>
    <link rel="stylesheet" href="{{ asset('/css/header.css') }}">

    @yield('css')
</head>

<body>
    <div class="layout">

        <header class="header">
            <img src="{{ asset('storage/img/SNS_rogo.png') }}" alt="logo" class="logo" width="150px" height="auto">
            <div class="headertext">
            </div>
        </header>
    </div>
    <div class="main">
        <h2>Create a New Genre</h2>

        <!-- Display success message -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('genre.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Genre Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Genre</button>
        </form>
    </div>
</body>

</html>