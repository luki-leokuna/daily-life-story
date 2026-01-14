<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daily Life Stories')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #d15a7c; /* Muted Pink/Rose */
            --bg-body: #fdfbf7;      /* Warm Off-White/Paper Color */
            --text-main: #2d2d2d;
            --text-muted: #6b7280;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, .navbar-brand {
            font-family: 'Playfair Display', serif;
        }

        /* NAVBAR STYLING */
        .navbar {
            background: rgba(253, 251, 247, 0.9);
            backdrop-filter: blur(10px);
            padding: 1.5rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -1px;
            color: var(--text-main) !important;
        }

        .nav-link {
            font-weight: 400;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1.2px;
            color: var(--text-muted) !important;
            margin-left: 1.5rem;
            transition: 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary-color) !important;
        }

        /* CARD & ELEMENT GLOBAL */
        .category-badge {
            background: transparent;
            border: 1px solid currentColor;
            padding: 0.2rem 0.8rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-read-more {
            border-bottom: 2px solid var(--primary-color);
            color: var(--text-main);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-read-more:hover {
            padding-left: 10px;
            color: var(--primary-color);
        }

        /* FOOTER */
        footer {
            background: white;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding: 5rem 0 2rem 0;
            margin-top: 5rem;
        }

        .tracking-widest { letter-spacing: 0.2em; }
        
        /* Transition untuk Image Hover */
        .overflow-hidden img {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .overflow-hidden:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                daily life<span style="color: var(--primary-color)">.</span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>

                    {{-- AUTHENTICATION LOGIC --}}
                    @guest
                        <li class="nav-item ms-lg-4">
                            <a class="nav-link btn btn-outline-dark px-3 py-2 rounded-pill text-dark" 
                               href="{{ route('login') }}" style="font-size: 0.7rem;">Sign In</a>
                        </li>
                    @else
                        <li class="nav-item dropdown ms-lg-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-3">
                                <li><a class="dropdown-item small" href="{{ route('admin.stories.index') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider opacity-50"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item small text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main style="min-height: 70vh;">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center">
        <div class="container">
            <h3 class="mb-3">daily life stories.</h3>
            <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">
                Mendokumentasikan momen-momen kecil yang memberikan warna dalam perjalanan keseharian kita.
            </p>
            
            <div class="d-flex justify-content-center gap-4 mb-5">
                <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-dark"><i class="bi bi-pinterest"></i></a>
                <a href="#" class="text-dark"><i class="bi bi-whatsapp"></i></a>
            </div>

            <div class="pt-4 border-top">
                <p class="mb-0 small text-muted opacity-50 tracking-widest text-uppercase">
                    &copy; 2026 Crafted with Love. 
                    @guest
                        <a href="{{ route('login') }}" class="text-decoration-none text-muted ms-2">• Admin</a>
                    @endguest
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Custom Script Section (Jika butuh JS tambahan di halaman tertentu) --}}
    @yield('scripts')
</body>
</html>