<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/favico.png" type="image/x-icon">
    <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=BRL&intent=capture"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src="/js/script.js"></script>
</head>

<body>
    @if (session('msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span>{{ session('msg') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid justify-content-evenly">
            <a class="navbar-brand" href="{{ route('home') }}"><img id="logo" src="/images/logo.png" alt="logo"></a>
            <article class="text-white fs-3 fw-bold">@yield('subtitle')</article>

            @if (isset($search_courses))
                <form class="d-flex" role="search" action="{{ route('courses.index') }}" method="get">
                    <input class="form-control me-2" name="search" type="search" placeholder="Pesquise algum curso..."
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            @endif
            
            <form action="{{ route('logout') }}" method="POST">@csrf<a class="text-light fs-4 fw-bold"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
            </form>
        </div>
    </nav>
    <div class="container mt-4 mb-4">
        @yield('content')
    </div>
    <footer class="pb-2 pt-2">
        <p class="mt-3 fs-5">&copy; 2024 André Augusto</p>
    </footer>
</body>

</html>
