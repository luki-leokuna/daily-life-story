<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daily Life Stories')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            /* Warna diubah ke arah yang lebih "earthy" dan elegan */
            --primary-color: #d15a7c; /* Pink yang lebih kalem (muted) */
            --bg-body: #fdfbf7;      /* Warna kertas/off-white agar mata tidak cepat lelah */
            --text-main: #2d2d2d;
            --text-muted: #6b7280;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
        }

        h1, h2, h3, .navbar-brand {
            font-family: 'Playfair Display', serif;
        }

        /* NAVBAR: Dibuat lebih tinggi & minimalis */
        .navbar {
            background: rgba(253, 251, 247, 0.8);
            backdrop-filter: blur(10px); /* Efek kaca modern */
            padding: 2rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-size: 1.8rem;
            letter-spacing: -1px;
            color: var(--text-main) !important;
            transition: 0.3s;
        }

        .navbar-brand:hover {
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 400;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1.5px;
            color: var(--text-muted) !important;
            margin-left: 1.5rem;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* Badge Kategori: Dibuat lebih halus, tidak terlalu mencolok */
        .category-badge {
            background: transparent !important;
            border: 1px solid currentColor;
            color: var(--primary-color);
            padding: 0.2rem 0.8rem;
            border-radius: 4px; /* Kotak sedikit tumpul lebih modern dari pill */
            font-size: 0.7rem;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        /* CARD: Menghilangkan border dan bayangan berat */
        .card {
            background: transparent;
            border: none;
            margin-bottom: 3rem;
        }

        .card-img-top {
            border-radius: 12px; /* Lebih rounded */
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.02); /* Efek zoom halus */
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-top: 1.2rem;
            line-height: 1.3;
        }

        /* Tombol Custom */
        .btn-read-more {
            border-bottom: 2px solid var(--primary-color);
            color: var(--text-main);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            margin-top: 10px;
            transition: 0.3s;
        }

        .btn-read-more:hover {
            color: var(--primary-color);
            padding-left: 10px;
        }

        footer {
            background: white;
            border-top: 1px solid rgba(0,0,0,0.05);
            padding: 4rem 0;
            margin-top: 5rem;
            font-size: 0.9rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">daily life<span style="color: var(--primary-color)">.</span></a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Journal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item ms-lg-4">
                        <a class="btn btn-outline-dark btn-sm px-3 rounded-pill" href="{{ route('admin.stories.index') }}">Admin Space</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <h3 class="mb-4">daily life stories.</h3>
            <p class="mb-4">Mendokumentasikan momen-momen kecil yang bermakna.</p>
            <div class="mb-4">
                <small class="text-uppercase tracking-widest">Instagram &bull; Pinterest &bull; Twitter</small>
            </div>
            <p class="mb-0 opacity-50">&copy; 2026 Crafted with love.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>