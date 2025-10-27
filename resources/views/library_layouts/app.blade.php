<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            {{-- Brand redirects based on role --}}
            <a class="navbar-brand" 
               href="{{ session('is_admin') ? route('dashboard') : route('user.books.index') }}">
                Library System
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    {{-- Home --}}
                    <li class="nav-item">
                        <a class="nav-link 
                            {{ session('is_admin') 
                                ? (request()->routeIs('dashboard') ? 'active' : '') 
                                : (request()->routeIs('user.books.index') ? 'active' : '') }}" 
                           href="{{ session('is_admin') ? route('dashboard') : route('user.books.index') }}">
                            Home
                        </a>
                    </li>

                    {{-- Categories (Admins only) --}}
                    @if(session('is_admin'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" 
                               href="{{ route('categories.index') }}">
                                Categories
                            </a>
                        </li>
                    @endif

                    {{-- Books (Admins only) --}}
                    @if(session('is_admin'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" 
                               href="{{ route('books.index') }}">
                                Books
                            </a>
                        </li>
                    @endif

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="display:inline; cursor:pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>
    
    <style>
        /* Chrome, Safari, Edge, Opera */
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
