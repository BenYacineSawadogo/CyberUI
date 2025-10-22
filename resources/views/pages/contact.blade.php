@extends('layouts.app')

@section('title', 'Contact - CyberUI')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1><i class="fas fa-envelope"></i> Contactez-nous</h1>
            <p>Nous sommes à votre disposition pour répondre à vos questions</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section contact-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Informations de Contact</h2>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <p><a href="mailto:{{ $contactInfo['email'] }}">{{ $contactInfo['email'] }}</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Téléphone</h3>
                            <p><a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] }}</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Site Web</h3>
                            <p><a href="{{ $contactInfo['website'] }}" target="_blank">{{ $contactInfo['website'] }}</a></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Adresse</h3>
                            <p>{{ $contactInfo['address'] }}</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Horaires</h3>
                            <p>{{ $contactInfo['hours'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="contact-cta">
                    <div class="cta-card">
                        <i class="fas fa-exclamation-triangle"></i>
                        <h3>Incident de Sécurité ?</h3>
                        <p>Si vous êtes victime d'un incident de sécurité, déclarez-le rapidement via notre formulaire dédié.</p>
                        <a href="{{ route('incident.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-exclamation-triangle"></i> Déclarer un incident
                        </a>
                    </div>

                    <div class="cta-card">
                        <i class="fas fa-bell"></i>
                        <h3>Restez Informé</h3>
                        <p>Consultez régulièrement nos alertes et bulletins pour rester à jour sur les menaces de cybersécurité.</p>
                        <a href="{{ route('alertes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-bell"></i> Voir les alertes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
