<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberUI - Cybersécurité</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container nav-container">
            <div class="nav-logo">
                <a href="?page=home">
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
                    <a href="?page=home" class="nav-link <?php echo ($currentPage === 'home') ? 'active' : ''; ?>">
                        Accueil
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle">
                        Publications <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=alertes">Alertes</a></li>
                        <li><a href="?page=rapports">Rapports</a></li>
                        <li><a href="?page=bulletins">Bulletins</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="?page=documentation" class="nav-link <?php echo ($currentPage === 'documentation') ? 'active' : ''; ?>">
                        Documentation
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=contact" class="nav-link <?php echo ($currentPage === 'contact') ? 'active' : ''; ?>">
                        Contact
                    </a>
                </li>
                <li class="nav-item nav-cta">
                    <a href="?page=incident-form" class="btn btn-primary">
                        <i class="fas fa-exclamation-triangle"></i> Déclarer un incident
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <div class="container">
                    <i class="fas fa-check-circle"></i>
                    <?php echo $success; ?>
                </div>
            </div>
        <?php endif; ?>
