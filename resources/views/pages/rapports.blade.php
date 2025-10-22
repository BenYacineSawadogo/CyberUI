@extends('layouts.app')

@section('title', 'Rapports - CyberUI')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-file-alt"></i> Rapports de Cybersécurité</h1>
            <p>Accédez à nos analyses détaillées et rapports thématiques</p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="section filters-section">
        <div class="container">
            <form method="GET" action="{{ route('rapports.index') }}" class="filters-form">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Rechercher un rapport..." value="{{ $search }}">
                </div>

                <div class="filter-group">
                    <select name="category" onchange="this.form.submit()">
                        <option value="">Toutes les catégories</option>
                        <option value="Annuel" {{ $category === 'Annuel' ? 'selected' : '' }}>Annuel</option>
                        <option value="Trimestriel" {{ $category === 'Trimestriel' ? 'selected' : '' }}>Trimestriel</option>
                        <option value="Mensuel" {{ $category === 'Mensuel' ? 'selected' : '' }}>Mensuel</option>
                        <option value="Thématique" {{ $category === 'Thématique' ? 'selected' : '' }}>Thématique</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filtrer
                </button>
            </form>
        </div>
    </section>

    <!-- Reports List -->
    <section class="section content-section">
        <div class="container">
            @if(count($rapports) > 0)
                <div class="items-grid">
                    @foreach($rapports as $rapport)
                    <div class="item-card">
                        <div class="item-header">
                            <span class="item-badge badge-category">
                                <i class="fas fa-tag"></i> {{ $rapport['category'] }}
                            </span>
                            <span class="item-date">{{ date('d/m/Y', strtotime($rapport['date'])) }}</span>
                        </div>

                        <h3 class="item-title">{{ $rapport['title'] }}</h3>
                        <p class="item-reference">Référence: {{ $rapport['reference'] }}</p>
                        <p class="item-summary">{{ $rapport['summary'] }}</p>

                        <div class="item-actions">
                            <a href="{{ route('rapports.show', $rapport['id']) }}" class="btn btn-outline">
                                <i class="fas fa-eye"></i> Consulter
                            </a>
                            <a href="#" class="btn btn-outline">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($pagination['last_page'] > 1)
                <div class="pagination">
                    @if($pagination['current_page'] > 1)
                        <a href="?page={{ $pagination['current_page'] - 1 }}&search={{ $search }}&category={{ $category }}" class="pagination-btn">
                            <i class="fas fa-chevron-left"></i> Précédent
                        </a>
                    @endif

                    <span class="pagination-info">
                        Page {{ $pagination['current_page'] }} sur {{ $pagination['last_page'] }}
                    </span>

                    @if($pagination['current_page'] < $pagination['last_page'])
                        <a href="?page={{ $pagination['current_page'] + 1 }}&search={{ $search }}&category={{ $category }}" class="pagination-btn">
                            Suivant <i class="fas fa-chevron-right"></i>
                        </a>
                    @endif
                </div>
                @endif
            @else
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <p>Aucun rapport ne correspond à vos critères de recherche.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
