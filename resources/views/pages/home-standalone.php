<!-- Hero Carousel -->
<section class="hero-carousel">
    <div class="carousel">
        <div class="carousel-container" id="carouselContainer">
            <?php foreach($carouselItems as $index => $item): ?>
            <div class="carousel-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="carousel-content">
                    <div class="container">
                        <h1 class="carousel-title"><?php echo $item['title']; ?></h1>
                        <p class="carousel-description"><?php echo $item['description']; ?></p>
                        <a href="?page=documentation" class="btn btn-light">En savoir plus</a>
                    </div>
                </div>
                <div class="carousel-overlay"></div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control prev" id="prevBtn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-control next" id="nextBtn">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php foreach($carouselItems as $index => $item): ?>
            <button class="indicator <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Recent Articles Section -->
<section class="section articles-section">
    <div class="container">
        <div class="section-header">
            <h2><i class="fas fa-newspaper"></i> Articles Récents</h2>
            <p>Restez informé des dernières actualités en cybersécurité</p>
        </div>

        <div class="scroll-container">
            <button class="scroll-btn scroll-left" id="articlesScrollLeft">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="articles-scroll" id="articlesScroll">
                <?php foreach($recentArticles as $article): ?>
                <div class="article-card">
                    <div class="article-image">
                        <div class="article-placeholder">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                    <div class="article-content">
                        <div class="article-date">
                            <i class="far fa-calendar"></i> <?php echo date('d/m/Y', strtotime($article['date'])); ?>
                        </div>
                        <h3 class="article-title"><?php echo $article['title']; ?></h3>
                        <p class="article-summary"><?php echo $article['summary']; ?></p>
                        <a href="#" class="article-link">Lire la suite <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <button class="scroll-btn scroll-right" id="articlesScrollRight">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Latest Alerts Section -->
<section class="section alerts-section">
    <div class="container">
        <div class="section-header">
            <h2><i class="fas fa-exclamation-triangle"></i> Dernières Alertes</h2>
            <p>Prenez connaissance des alertes de sécurité les plus récentes</p>
            <a href="?page=alertes" class="btn btn-secondary">Voir toutes les alertes</a>
        </div>

        <div class="scroll-container">
            <button class="scroll-btn scroll-left" id="alertesScrollLeft">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="alerts-scroll" id="alertesScroll">
                <?php foreach($latestAlertes as $alerte): ?>
                <div class="alert-card">
                    <div class="alert-header">
                        <span class="alert-badge alert-<?php echo $alerte['gravity']; ?>">
                            <?php if($alerte['gravity'] === 'critique'): ?>
                                <i class="fas fa-exclamation-circle"></i> Critique
                            <?php elseif($alerte['gravity'] === 'élevée'): ?>
                                <i class="fas fa-exclamation-triangle"></i> Élevée
                            <?php else: ?>
                                <i class="fas fa-info-circle"></i> Moyenne
                            <?php endif; ?>
                        </span>
                        <span class="alert-date"><?php echo date('d/m/Y', strtotime($alerte['date'])); ?></span>
                    </div>
                    <h3 class="alert-title"><?php echo $alerte['title']; ?></h3>

                    <div class="alert-status">
                        <span class="status-label">Statut:</span>
                        <span class="status-value"><?php echo $alerte['status']; ?></span>
                    </div>

                    <div class="alert-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?php echo $alerte['progress']; ?>%"></div>
                        </div>
                        <span class="progress-text"><?php echo $alerte['progress']; ?>%</span>
                    </div>

                    <a href="?page=alerte-detail&id=<?php echo $alerte['id']; ?>" class="btn btn-outline">
                        Voir les détails <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <button class="scroll-btn scroll-right" id="alertesScrollRight">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Quick Actions Section -->
<section class="section quick-actions-section">
    <div class="container">
        <div class="quick-actions-grid">
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3>Alertes en temps réel</h3>
                <p>Recevez les dernières alertes de sécurité</p>
                <a href="?page=alertes" class="action-link">Accéder <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Rapports détaillés</h3>
                <p>Consultez nos analyses approfondies</p>
                <a href="?page=rapports" class="action-link">Accéder <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3>Documentation</h3>
                <p>Guides, tutoriels et ressources</p>
                <a href="?page=documentation" class="action-link">Accéder <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="action-card action-card-highlight">
                <div class="action-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Déclarer un incident</h3>
                <p>Signalez rapidement un incident de sécurité</p>
                <a href="?page=incident-form" class="action-link">Déclarer <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
