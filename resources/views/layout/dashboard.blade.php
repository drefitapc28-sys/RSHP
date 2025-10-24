<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard RSHP Universitas Airlangga')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* ====== GLOBAL STYLING ====== */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #2b2d42, #3a0ca3);
        }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand {
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover {
            color: #ffd166 !important;
        }

        /* ====== CONTENT ====== */
        main {
            min-height: 80vh;
            padding-top: 20px;
        }

        /* ====== FOOTER ====== */
        footer {
            background-color: #2b2d42;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }
        footer span {
            color: #ffd166;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                🏥 RSHP Universitas Airlangga
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="container mt-4 mb-5">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer>
        <div class="container">
            © 2025 <span>RSHP Universitas Airlangga</span> | Fakultas Kedokteran Hewan
        </div>
    </footer>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
