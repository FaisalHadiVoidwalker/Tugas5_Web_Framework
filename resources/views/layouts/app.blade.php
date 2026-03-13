<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Tugas Mahasiswa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --app-navy: #0b1f3a;
            --app-primary: #1e73ff;
            --app-primary-hover: #155bd6;
            --app-background: #f4f8ff;
            --app-border: #dbe3f0;
            --app-text: #17304f;
            --app-card-shadow: 0 10px 30px rgba(11, 31, 58, 0.08);
        }

        body {
            background-color: var(--app-background);
            min-height: 100vh;
            color: var(--app-text);
            display: flex;
            flex-direction: column;
        }

        .bg-navy {
            background-color: var(--app-navy);
        }

        .page-shell {
            padding-top: 2rem;
            padding-bottom: 3rem;
            flex: 1 0 auto;
        }

        .page-hero {
            background-color: #ffffff;
            border: 1px solid var(--app-border);
            border-radius: 1rem;
            box-shadow: var(--app-card-shadow);
        }

        .soft-card {
            background-color: #ffffff;
            border: 1px solid var(--app-border);
            border-radius: 1rem;
            box-shadow: var(--app-card-shadow);
            overflow: hidden;
        }

        .navbar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #ffffff;
        }

        .navbar .nav-link.active::after {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 0.35rem;
            background-color: #ffffff;
            border-radius: 999px;
        }

        .btn-primary {
            background-color: var(--app-primary);
            border-color: var(--app-primary);
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: var(--app-primary-hover);
            border-color: var(--app-primary-hover);
        }

        .btn-outline-primary {
            color: var(--app-primary);
            border-color: var(--app-primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--app-primary-hover);
            border-color: var(--app-primary-hover);
        }

        .badge-soft-primary {
            background-color: #d9e8ff;
            color: var(--app-primary);
        }

        .card,
        .table,
        .table-responsive {
            background-color: #ffffff;
        }

        .table thead th {
            color: #48607c;
            font-size: 0.875rem;
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }

        .table tbody tr:last-child td {
            border-bottom-width: 0;
        }

        .alert-success {
            border: 1px solid #b7e4c7;
        }

        .app-footer {
            background-color: var(--app-navy);
            color: #ffffff;
            margin-top: auto;
        }

        .app-footer-title {
            font-weight: 600;
            letter-spacing: 0.01em;
        }

        .app-footer-muted {
            color: rgba(255, 255, 255, 0.78);
        }

        .app-footer-small {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navy shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="{{ url('/') }}">Sistem Manajemen Tugas Mahasiswa</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link @if (!request()->routeIs('tugas.*')) active @endif" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('tugas.*')) active @endif" href="{{ route('tugas.index') }}">
                            Daftar Tugas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container page-shell">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')
    </div>

    <footer class="app-footer py-3 py-lg-3">
        <div class="container">
            <div class="row g-4 align-items-end">
                <div class="col-lg-8">
                    <h2 class="h5 app-footer-title mb-2">Sistem Manajemen Tugas Mahasiswa</h2>
                    <p class="app-footer-muted mb-0">
                        Aplikasi web sederhana untuk membantu mahasiswa mengelola tugas perkuliahan secara terstruktur.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <p class="mb-1">&copy; 2026 Sistem Manajemen Tugas Mahasiswa</p>
                    <small class="app-footer-small">Built with Laravel &amp; Bootstrap</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
