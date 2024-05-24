<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">
                    <img src="https://amandemy.co.id/images/amandemy-logo.png" alt="Logo" class="img-fluid" style="height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            @if (Auth::user()->roles->isNotEmpty() && Auth::user()->roles[0]->name == 'superadmin')
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('products.index') }}"> Product</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('dashboard.products') }}">Manage Product</a>
                                </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('home.index') }}">Home</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('products.index') }}"> Product</a>
                                </li>
                            @endif
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: green; color: white; padding: 10px; border-radius: 5px; display: flex; align-items: center;">
                                    <!-- Emotikon orang -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-3 3a5 5 0 0 1 10 0v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1zm10-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v1a4 4 0 0 0 8 0v-1z"/>
                                    </svg>
                                    <span class="ms-2">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                                </ul>
                            </li>

                        @else
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('home.index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('products.index') }}">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
