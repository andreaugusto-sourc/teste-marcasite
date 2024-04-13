<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="/js/script.js"></script>
</head>

<body>
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">MarcaSite</a>
          <h1 class="text-white fs-2">@yield('subtitle')</h1>
          <form class="d-flex" role="search" action="{{route('courses.index')}}" method="get">
            <input class="form-control me-2" name="search" type="search" placeholder="Pesquise algum curso..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
        </div>
    </nav>
    <div class="container mt-3">
        @yield('content')
    </div>
</body>

</html>