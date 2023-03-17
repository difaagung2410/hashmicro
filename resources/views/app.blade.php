{{-- <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', $title)</title>
</head>

<body>
    <div class="container">
        <h1>@yield('title', $title)</h1>
        @yield('content')
    </div>
</body>

</html> --}}

<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', $title)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">Difa Agung</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto mr-md-3">
                        <li class="nav-item home"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        @auth
                            <li class="nav-item feature-one"><a href="{{ route('feature.one') }}" class="nav-link">Fitur 1</a></li>
                            <li class="nav-item feature-two"><a href="{{ route('feature.two') }}" class="nav-link">Fitur 2</a></li>
                            <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                        @endauth
                        @guest
                            <li class="nav-item login"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->
        @yield('content')
    </section>
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('script')
</body>

</html>
