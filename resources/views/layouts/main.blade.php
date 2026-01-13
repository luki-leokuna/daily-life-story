<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daily Life Stories')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #EC4899;
            --secondary-color: #FDF4F5;
        }
        
        body {
            font-family: 'Georgia', serif;
            color: #333;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 1.5rem 0;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color) !important;
            font-family: 'Georgia', serif;
        }

        .nav-link {
            color: #666 !important;
            font-size: 0.95rem;
            margin: 0 1rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .category-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: white;
        }

        .card {
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }

        footer {
            background: #f8f9fa;
            padding: 3rem 0;
            margin-top: 5rem;
        }
    </style>
</head>
<body>
    
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Daily Life Stories</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="{{ route('admin.stories.index') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer>
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 Daily Life Stories. Made with ❤️</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>