@extends('layouts.app')

@section('title', 'Alertes - CyberUI')

@section('content')
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
            <form method="GET" action="{{ route('alertes.index') }}" class="filters-form">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Rechercher une alerte..." value="{{ $search }}">
                </div>

                <div class="filter-group">
                    <select name="gravity" onchange="this.form.submit()">
                        <option value="">Toutes les gravités</option>
                        <option value="critique" {{ $gravity === 'critique' ? 'selected' : '' }}>Critique</option>
                        <option value="élevée" {{ $gravity === 'élevée' ? 'selected' : '' }}>Élevée</option>
                        <option value="moyenne" {{ $gravity === 'moyenne' ? 'selected' : '' }}>Moyenne</option>
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
            @if(count($alertes) > 0)
                <div class="items-grid">
                    @foreach($alertes as $alerte)
                    <div class="item-card">
                        <div class="item-header">
                            <span class="item-badge badge-{{ $alerte['gravity'] }}">
                                @if($alerte['gravity'] === 'critique')
                                    <i class="fas fa-exclamation-circle"></i> Critique
                                @elseif($alerte['gravity'] === 'élevée')
                                    <i class="fas fa-exclamation-triangle"></i> Élevée
                                @else
                                    <i class="fas fa-info-circle"></i> Moyenne
                                @endif
                            </span>
                            <span class="item-date">{{ date('d/m/Y', strtotime($alerte['date'])) }}</span>
                        </div>

                        <h3 class="item-title">{{ $alerte['title'] }}</h3>
                        <p class="item-reference">Référence: {{ $alerte['reference'] }}</p>
                        <p class="item-summary">{{ $alerte['summary'] }}</p>

                        <div class="item-meta">
                            <div class="status-info">
                                <span class="status-label">Statut:</span>
                                <span class="status-value">{{ $alerte['status'] }}</span>
                            </div>

                            <div class="progress-info">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ $alerte['progress'] }}%"></div>
                                </div>
                                <span class="progress-text">{{ $alerte['progress'] }}%</span>
                            </div>
                        </div>

                        <a href="{{ route('alertes.show', $alerte['id']) }}" class="btn btn-outline">
                            Voir les détails <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($pagination['last_page'] > 1)
                <div class="pagination">
                    @if($pagination['current_page'] > 1)
                        <a href="?page={{ $pagination['current_page'] - 1 }}&search={{ $search }}&gravity={{ $gravity }}" class="pagination-btn">
                            <i class="fas fa-chevron-left"></i> Précédent
                        </a>
                    @endif

                    <span class="pagination-info">
                        Page {{ $pagination['current_page'] }} sur {{ $pagination['last_page'] }}
                    </span>

                    @if($pagination['current_page'] < $pagination['last_page'])
                        <a href="?page={{ $pagination['current_page'] + 1 }}&search={{ $search }}&gravity={{ $gravity }}" class="pagination-btn">
                            Suivant <i class="fas fa-chevron-right"></i>
                        </a>
                    @endif
                </div>
                @endif
            @else
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <p>Aucune alerte ne correspond à vos critères de recherche.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
