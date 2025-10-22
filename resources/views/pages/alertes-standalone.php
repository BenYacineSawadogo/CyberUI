<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1><i class="fas fa-exclamation-triangle"></i> Alertes de Sécurité</h1>
        <p>Consultez les alertes de sécurité les plus récentes et leur statut</p>
    </div>
</section>

<!-- Filters Section -->
<section class="section filters-section">
    <div class="container">
        <form method="GET" action="?" class="filters-form">
            <input type="hidden" name="page" value="alertes">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" name="search" placeholder="Rechercher une alerte..." value="<?php echo htmlspecialchars($search); ?>">
            </div>

            <div class="filter-group">
                <select name="gravity" onchange="this.form.submit()">
                    <option value="">Toutes les gravités</option>
                    <option value="critique" <?php echo $gravity === 'critique' ? 'selected' : ''; ?>>Critique</option>
                    <option value="élevée" <?php echo $gravity === 'élevée' ? 'selected' : ''; ?>>Élevée</option>
                    <option value="moyenne" <?php echo $gravity === 'moyenne' ? 'selected' : ''; ?>>Moyenne</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-filter"></i> Filtrer
            </button>
        </form>
    </div>
</section>

<!-- Alerts List -->
<section class="section content-section">
    <div class="container">
        <?php if(count($alertes) > 0): ?>
            <div class="items-grid">
                <?php foreach($alertes as $alerte): ?>
                <div class="item-card">
                    <div class="item-header">
                        <span class="item-badge badge-<?php echo $alerte['gravity']; ?>">
                            <?php if($alerte['gravity'] === 'critique'): ?>
                                <i class="fas fa-exclamation-circle"></i> Critique
                            <?php elseif($alerte['gravity'] === 'élevée'): ?>
                                <i class="fas fa-exclamation-triangle"></i> Élevée
                            <?php else: ?>
                                <i class="fas fa-info-circle"></i> Moyenne
                            <?php endif; ?>
                        </span>
                        <span class="item-date"><?php echo date('d/m/Y', strtotime($alerte['date'])); ?></span>
                    </div>

                    <h3 class="item-title"><?php echo $alerte['title']; ?></h3>
                    <p class="item-reference">Référence: <?php echo $alerte['reference']; ?></p>
                    <p class="item-summary"><?php echo $alerte['summary']; ?></p>

                    <div class="item-meta">
                        <div class="status-info">
                            <span class="status-label">Statut:</span>
                            <span class="status-value"><?php echo $alerte['status']; ?></span>
                        </div>

                        <div class="progress-info">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?php echo $alerte['progress']; ?>%"></div>
                            </div>
                            <span class="progress-text"><?php echo $alerte['progress']; ?>%</span>
                        </div>
                    </div>

                    <a href="?page=alerte-detail&id=<?php echo $alerte['id']; ?>" class="btn btn-outline">
                        Voir les détails <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <?php if($pagination['last_page'] > 1): ?>
            <div class="pagination">
                <?php if($pagination['current_page'] > 1): ?>
                    <a href="?page=alertes&pagenum=<?php echo $pagination['current_page'] - 1; ?>&search=<?php echo urlencode($search); ?>&gravity=<?php echo urlencode($gravity); ?>" class="pagination-btn">
                        <i class="fas fa-chevron-left"></i> Précédent
                    </a>
                <?php endif; ?>

                <span class="pagination-info">
                    Page <?php echo $pagination['current_page']; ?> sur <?php echo $pagination['last_page']; ?>
                </span>

                <?php if($pagination['current_page'] < $pagination['last_page']): ?>
                    <a href="?page=alertes&pagenum=<?php echo $pagination['current_page'] + 1; ?>&search=<?php echo urlencode($search); ?>&gravity=<?php echo urlencode($gravity); ?>" class="pagination-btn">
                        Suivant <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="no-results">
                <i class="fas fa-search"></i>
                <p>Aucune alerte ne correspond à vos critères de recherche.</p>
            </div>
        <?php endif; ?>
    </div>
</section>
