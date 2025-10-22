@extends('layouts.app')

@section('title', 'Bulletins - CyberUI')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-newspaper"></i> Bulletins de Sécurité</h1>
            <p>Consultez nos bulletins hebdomadaires de sécurité</p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="section filters-section">
        <div class="container">
            <form method="GET" action="{{ route('bulletins.index') }}" class="filters-form">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Rechercher un bulletin..." value="{{ $search }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            </form>
        </div>
    </section>

    <!-- Bulletins List -->
    <section class="section content-section">
        <div class="container">
            @if(count($bulletins) > 0)
                <div class="items-grid">
                    @foreach($bulletins as $bulletin)
                    <div class="item-card">
                        <div class="item-header">
                            <span class="item-badge badge-bulletin">
                                <i class="fas fa-newspaper"></i> Bulletin
                            </span>
                            <span class="item-date">{{ date('d/m/Y', strtotime($bulletin['date'])) }}</span>
                        </div>

                        <h3 class="item-title">{{ $bulletin['title'] }}</h3>
                        <p class="item-reference">Référence: {{ $bulletin['reference'] }}</p>
                        <p class="item-summary">{{ $bulletin['summary'] }}</p>

                        <div class="item-actions">
                            <a href="{{ route('bulletins.show', $bulletin['id']) }}" class="btn btn-outline">
                                <i class="fas fa-eye"></i> Consulter
                            </a>
                            <a href="#" class="btn btn-outline">
                                <i class="fas fa-download"></i> Télécharger PDF
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($pagination['last_page'] > 1)
                <div class="pagination">
                    @if($pagination['current_page'] > 1)
                        <a href="?page={{ $pagination['current_page'] - 1 }}&search={{ $search }}" class="pagination-btn">
                            <i class="fas fa-chevron-left"></i> Précédent
                        </a>
                    @endif

                    <span class="pagination-info">
                        Page {{ $pagination['current_page'] }} sur {{ $pagination['last_page'] }}
                    </span>

                    @if($pagination['current_page'] < $pagination['last_page'])
                        <a href="?page={{ $pagination['current_page'] + 1 }}&search={{ $search }}" class="pagination-btn">
                            Suivant <i class="fas fa-chevron-right"></i>
                        </a>
                    @endif
                </div>
                @endif
            @else
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <p>Aucun bulletin ne correspond à vos critères de recherche.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
