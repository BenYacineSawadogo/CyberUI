@extends('layouts.app')

@section('title', 'Documentation - CyberUI')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-book"></i> Documentation</h1>
            <p>Accédez à toutes nos ressources : vidéos, articles, textes légaux et documents PDF</p>
        </div>
    </section>

    <!-- Videos Section -->
    <section class="section documentation-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-video"></i> Vidéos</h2>
            <div class="doc-grid">
                @foreach($videos as $video)
                <div class="doc-card video-card">
                    <div class="doc-thumbnail">
                        <i class="fas fa-play-circle"></i>
                        <span class="duration">{{ $video['duration'] }}</span>
                    </div>
                    <div class="doc-content">
                        <span class="doc-category">{{ $video['category'] }}</span>
                        <h3 class="doc-title">{{ $video['title'] }}</h3>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-play"></i> Regarder
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="section documentation-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-newspaper"></i> Articles</h2>
            <div class="doc-list">
                @foreach($articles as $article)
                <div class="doc-list-item">
                    <div class="doc-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="doc-info">
                        <h3 class="doc-title">{{ $article['title'] }}</h3>
                        <div class="doc-meta">
                            <span class="doc-category">{{ $article['category'] }}</span>
                            <span class="doc-date">{{ date('d/m/Y', strtotime($article['date'])) }}</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline btn-sm">
                        <i class="fas fa-eye"></i> Lire
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Legal Texts Section -->
    <section class="section documentation-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-gavel"></i> Textes Légaux</h2>
            <div class="doc-list">
                @foreach($legal as $item)
                <div class="doc-list-item">
                    <div class="doc-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="doc-info">
                        <h3 class="doc-title">{{ $item['title'] }}</h3>
                        <div class="doc-meta">
                            <span class="doc-category">{{ $item['type'] }}</span>
                            <span class="doc-date">{{ date('d/m/Y', strtotime($item['date'])) }}</span>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline btn-sm">
                        <i class="fas fa-eye"></i> Consulter
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PDF Documents Section -->
    <section class="section documentation-section">
        <div class="container">
            <h2 class="section-title"><i class="fas fa-file-pdf"></i> Documents PDF</h2>
            <div class="doc-grid">
                @foreach($pdfs as $pdf)
                <div class="doc-card pdf-card">
                    <div class="pdf-icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="doc-content">
                        <h3 class="doc-title">{{ $pdf['title'] }}</h3>
                        <div class="doc-meta">
                            <span><i class="fas fa-file"></i> {{ $pdf['pages'] }} pages</span>
                            <span><i class="fas fa-weight"></i> {{ $pdf['size'] }}</span>
                            <span><i class="far fa-calendar"></i> {{ date('d/m/Y', strtotime($pdf['date'])) }}</span>
                        </div>
                        <div class="doc-actions">
                            <a href="#" class="btn btn-outline btn-sm">
                                <i class="fas fa-eye"></i> Aperçu
                            </a>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Télécharger
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
