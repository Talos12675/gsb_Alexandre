<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB - Gestion des visites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --background-color: #f8f9fa;
            --text-color: #2c3e50;
            --card-shadow: 0 0 20px rgba(0,0,0,0.1);
            --hover-transition: all 0.3s ease;
            --navbar-height: 60px;
            --sidebar-width: 250px;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            position: relative;
            color: var(--text-color);
            padding-top: var(--navbar-height);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1001;
            height: var(--navbar-height);
            display: flex;
            align-items: center;
            padding-left: 0 !important;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5em;
            letter-spacing: 1px;
            margin-left: 8px;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 40px;
            margin-left: 0;
            margin-top: 0;
            margin-bottom: 0;
            margin-right: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            transition: var(--hover-transition);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9 0%, var(--secondary-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--accent-color) 0%, #c0392b 100%);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            transition: var(--hover-transition);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #c0392b 0%, var(--accent-color) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        /* Styles pour la sidebar et le contenu principal */
        .sidebar {
            position: fixed;
            left: 0;
            top: var(--navbar-height);
            height: calc(100% - var(--navbar-height));
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color) 0%, #34495e 100%);
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
            padding: 0;
            margin: 0;
        }

        .sidebar .nav {
            padding: 10px 0;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 12px 20px;
            transition: var(--hover-transition);
            display: flex;
            align-items: center;
            white-space: nowrap;
            border-left: 3px solid transparent;
            margin: 2px 0;
            font-size: 0.95em;
        }

        .sidebar .nav-link i {
            margin-right: 12px;
            width: 18px;
            text-align: center;
            font-size: 1.1em;
            transition: var(--hover-transition);
        }

        .sidebar .nav-link:hover {
            background-color: rgba(52, 152, 219, 0.1);
            border-left: 3px solid var(--secondary-color);
            color: #ffffff !important;
            padding-left: 25px;
        }

        .sidebar .nav-link:hover i {
            transform: translateX(3px);
            color: var(--secondary-color);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, var(--secondary-color) 0%, rgba(52, 152, 219, 0.8) 100%);
            border-left: none;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            color: #ffffff !important;
            padding-left: 20px;
            margin-left: 0;
            width: 100%;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--navbar-height));
            transition: var(--hover-transition);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            padding-bottom: 60px;
        }

        /* Pagination styling */
        .pagination {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 8px !important;
            margin-top: 30px !important;
            margin-bottom: 0 !important;
            flex-wrap: wrap !important;
            list-style: none !important;
            padding: 0 !important;
        }

        .page-item {
            display: inline-block !important;
            margin: 0 !important;
        }

        .page-link {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 38px !important;
            height: 38px !important;
            padding: 0 !important;
            min-width: 38px !important;
            border: 1px solid #ddd !important;
            border-radius: 8px !important;
            background-color: #ffffff !important;
            color: #3498db !important;
            font-size: 0.9rem !important;
            font-weight: 600 !important;
            text-decoration: none !important;
            transition: all 0.25s cubic-bezier(0.23, 1, 0.32, 1) !important;
            cursor: pointer !important;
            position: relative !important;
        }

        .page-link:hover {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
            border-color: #3498db !important;
            color: #ffffff !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3) !important;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%) !important;
            border-color: #3498db !important;
            color: #ffffff !important;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4) !important;
        }

        .page-item.disabled .page-link,
        .page-item.disabled .page-link:hover {
            background-color: #f8f9fa !important;
            border-color: #e9ecef !important;
            color: #ccc !important;
            cursor: not-allowed !important;
            transform: none !important;
            opacity: 0.6 !important;
        }

        .main-content.animated {
            animation: fadeInUp 0.7s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: none;
            }
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        /* Styles pour les cartes */
        .card {
            border: none;
            box-shadow: var(--card-shadow);
            border-radius: 15px;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.95);
            transition: var(--hover-transition);
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-bottom: none;
            padding: 20px 25px;
            border-radius: 15px 15px 0 0 !important;
        }

        .card-header h2 {
            color: #ffffff;
            font-size: 1.5em;
            margin: 0;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        /* Styles pour les tableaux */
        .table {
            margin: 0;
        }

        .table thead th {
            border-top: none;
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            color: var(--primary-color);
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .table-hover tbody tr {
            transition: var(--hover-transition);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        /* Styles pour les formulaires */
        .form-control {
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            padding: 12px;
            margin-bottom: 15px;
            transition: var(--hover-transition);
            background-color: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.15);
            background-color: #ffffff;
        }

        .form-group label {
            color: var(--text-color);
            font-weight: 500;
            margin-bottom: 8px;
        }

        /* Styles pour les inputs de recherche */
        .input-group {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .input-group .form-control {
            border: none;
            margin-bottom: 0;
        }

        .input-group .btn {
            border-radius: 0 10px 10px 0;
            padding: 12px 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
            .main-content.active {
                margin-left: var(--sidebar-width);
            }
            .card {
                margin-top: 15px;
            }
            .container {
                padding: 0 15px;
            }
            .navbar {
                padding: 0 15px;
            }
            .btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                GSB - Gestion des visites
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(session('loggedin'))
                        <li class="nav-item me-3">
                            <a class="btn btn-primary" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user me-2"></i>
                                Bienvenue {{ session('prenom') }} {{ session('nom') }}
                            </a>
                        </li>
                        <li class="nav-item" style="margin-right:20px;">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Se déconnecter
                                </button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Barre latérale -->
    <div class="sidebar">
        <nav class="nav flex-column p-3">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> Accueil
            </a>
            <a class="nav-link {{ request()->routeIs('rapports.*') ? 'active' : '' }}" href="{{ route('rapports.index') }}">
                <i class="fas fa-file-alt"></i> Comptes Rendus
            </a>
            <a class="nav-link {{ request()->routeIs('praticiens.*') ? 'active' : '' }}" href="{{ route('praticiens.index') }}">
                <i class="fas fa-user-md"></i> Praticiens
            </a>
            <a class="nav-link {{ request()->routeIs('medicaments.*') ? 'active' : '' }}" href="{{ route('medicaments.index') }}">
                <i class="fas fa-pills"></i> Médicaments
            </a>
            <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                <i class="fas fa-user"></i> Mon Profil
            </a>
        </nav>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <script>
    // Animation d'apparition sur la page
    document.addEventListener('DOMContentLoaded', function() {
        var mainContent = document.querySelector('.main-content');
        if(mainContent) {
            mainContent.classList.remove('animated');
            void mainContent.offsetWidth; // Force reflow
            mainContent.classList.add('animated');
        }
    });
    </script>
</body>
</html>