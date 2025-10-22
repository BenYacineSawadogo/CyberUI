<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CyberUI - Cybersécurité')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container nav-container">
            <div class="nav-logo">
                <a href="{{ route('home') }}">
                    <i class="fas fa-shield-alt"></i>
                    <span>CyberUI</span>
                </a>
            </div>

            <div class="nav-toggle" id="navToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Accueil
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle">
                        Publications <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('alertes.index') }}">Alertes</a></li>
                        <li><a href="{{ route('rapports.index') }}">Rapports</a></li>
                        <li><a href="{{ route('bulletins.index') }}">Bulletins</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documentation.index') }}" class="nav-link {{ request()->routeIs('documentation.*') ? 'active' : '' }}">
                        Documentation
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>
                <li class="nav-item nav-cta">
                    <a href="{{ route('incident.create') }}" class="btn btn-primary">
                        <i class="fas fa-exclamation-triangle"></i> Déclarer un incident
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div class="alert alert-success">
                <div class="container">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-section">
                <h4><i class="fas fa-shield-alt"></i> CyberUI</h4>
                <p>Votre partenaire en cybersécurité pour un monde numérique plus sûr.</p>
            </div>

            <div class="footer-section">
                <h4>Liens rapides</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('alertes.index') }}">Alertes</a></li>
                    <li><a href="{{ route('documentation.index') }}">Documentation</a></li>
                    <li><a href="{{ route('contact.index') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Publications</h4>
                <ul>
                    <li><a href="{{ route('rapports.index') }}">Rapports</a></li>
                    <li><a href="{{ route('bulletins.index') }}">Bulletins</a></li>
                    <li><a href="{{ route('incident.create') }}">Déclarer un incident</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Contact</h4>
                <p><i class="fas fa-envelope"></i> contact@cyberui.gov</p>
                <p><i class="fas fa-phone"></i> +33 1 23 45 67 89</p>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2025 CyberUI. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>
