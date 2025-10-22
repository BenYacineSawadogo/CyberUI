<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1><i class="fas fa-exclamation-triangle"></i> Déclarer un Incident de Sécurité</h1>
        <p>Signalez rapidement un incident de cybersécurité</p>
    </div>
</section>

<!-- Incident Form Section -->
<section class="section form-section">
    <div class="container">
        <div class="form-container">
            <div class="form-intro">
                <h2>Informations Importantes</h2>
                <ul>
                    <li><i class="fas fa-check"></i> Toutes les informations sont traitées de manière confidentielle</li>
                    <li><i class="fas fa-check"></i> Vous recevrez une confirmation par email</li>
                    <li><i class="fas fa-check"></i> Notre équipe vous contactera dans les plus brefs délais</li>
                    <li><i class="fas fa-check"></i> En cas d'urgence, contactez-nous par téléphone au +33 1 23 45 67 89</li>
                </ul>
            </div>

            <form method="POST" action="?page=incident-form" class="incident-form">
                <!-- Step 1: Organization Information -->
                <div class="form-step">
                    <h3 class="step-title">
                        <span class="step-number">1</span> Informations sur l'Organisation
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="organization">Nom de l'organisation <span class="required">*</span></label>
                            <input type="text" id="organization" name="organization" required>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Contact Information -->
                <div class="form-step">
                    <h3 class="step-title">
                        <span class="step-number">2</span> Informations de Contact
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_name">Nom du contact <span class="required">*</span></label>
                            <input type="text" id="contact_name" name="contact_name" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_email">Email <span class="required">*</span></label>
                            <input type="email" id="contact_email" name="contact_email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_phone">Téléphone <span class="required">*</span></label>
                            <input type="tel" id="contact_phone" name="contact_phone" required>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Incident Details -->
                <div class="form-step">
                    <h3 class="step-title">
                        <span class="step-number">3</span> Détails de l'Incident
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="incident_type">Type d'incident <span class="required">*</span></label>
                            <select id="incident_type" name="incident_type" required>
                                <option value="">Sélectionnez un type</option>
                                <option value="malware">Malware / Virus</option>
                                <option value="phishing">Phishing / Hameçonnage</option>
                                <option value="ransomware">Ransomware</option>
                                <option value="data_breach">Fuite de données</option>
                                <option value="ddos">Attaque DDoS</option>
                                <option value="unauthorized_access">Accès non autorisé</option>
                                <option value="vulnerability">Vulnérabilité découverte</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="incident_date">Date de l'incident <span class="required">*</span></label>
                            <input type="datetime-local" id="incident_date" name="incident_date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="severity">Gravité de l'incident <span class="required">*</span></label>
                            <select id="severity" name="severity" required>
                                <option value="">Sélectionnez la gravité</option>
                                <option value="low">Faible</option>
                                <option value="medium">Moyenne</option>
                                <option value="high">Élevée</option>
                                <option value="critical">Critique</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="description">Description détaillée de l'incident <span class="required">*</span></label>
                            <textarea id="description" name="description" rows="6" required placeholder="Décrivez l'incident de manière détaillée..."></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="affected_systems">Systèmes affectés</label>
                            <textarea id="affected_systems" name="affected_systems" rows="3" placeholder="Listez les systèmes, applications ou services affectés..."></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="actions_taken">Actions déjà entreprises</label>
                            <textarea id="actions_taken" name="actions_taken" rows="3" placeholder="Décrivez les mesures que vous avez déjà prises..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane"></i> Soumettre la déclaration
                    </button>
                    <a href="?page=home" class="btn btn-outline">
                        <i class="fas fa-times"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
