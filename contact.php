<?php
$pageTitle = "Contact - MAUDITS";
$currentPage = "contact";
$customCSS = "css/contact.css";
$customJS = "script/contact.js";
include 'includes/header.php';
?>

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">CONTACTEZ-NOUS</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto">Nous sommes à votre écoute pour toute question, suggestion ou demande particulière</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="contact-container">
                <!-- Informations de contact -->
                <div class="contact-info">
                    <h2 class="text-2xl font-bold mb-6">Informations de contact</h2>
                    
                    <?php
                    $contactInfo = [
                        [
                            'icon' => 'fa-map-marker-alt',
                            'titre' => 'Notre boutique',
                            'texte' => '123 Rue de la Mode<br>75000 Libreville, Gabon'
                        ],
                        [
                            'icon' => 'fa-phone',
                            'titre' => 'Téléphone',
                            'texte' => '+241 (0) 77 00 00 00<br>+241 (0) 66 00 00 00'
                        ],
                        [
                            'icon' => 'fa-envelope',
                            'titre' => 'Email',
                            'texte' => 'contact@maudits.com<br>support@maudits.com'
                        ]
                    ];
                    
                    foreach($contactInfo as $info): ?>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas <?php echo $info['icon']; ?>"></i>
                            </div>
                            <div class="info-content">
                                <h3><?php echo $info['titre']; ?></h3>
                                <p><?php echo $info['texte']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="business-hours">
                        <h3 class="hours-title">Heures d'ouverture</h3>
                        <?php
                        $horaires = [
                            ['jour' => 'Lundi - Vendredi', 'heures' => '9h - 19h'],
                            ['jour' => 'Samedi', 'heures' => '10h - 20h'],
                            ['jour' => 'Dimanche', 'heures' => '11h - 18h']
                        ];
                        
                        foreach($horaires as $horaire): ?>
                            <div class="hours-item">
                                <span class="hours-day"><?php echo $horaire['jour']; ?></span>
                                <span class="hours-time"><?php echo $horaire['heures']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="social-links">
                        <?php
                        $socials = [
                            ['url' => 'https://www.facebook.com/people/Authentique-Club/61567378367105/', 'icon' => 'fa-facebook-f'],
                            ['url' => 'https://www.instagram.com/maudit.orn/', 'icon' => 'fa-instagram'],
                            ['url' => 'https://www.tiktok.com/@maudit.orn', 'icon' => 'fa-tiktok']
                        ];
                        
                        foreach($socials as $social): ?>
                            <a href="<?php echo $social['url']; ?>" class="social-link" target="_blank">
                                <i class="fab <?php echo $social['icon']; ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Formulaire de contact -->
                <div class="contact-form">
                    <h2 class="text-2xl font-bold mb-6">Envoyez-nous un message</h2>
                    
                    <form id="contactForm" method="POST" action="process_contact.php">
                        <div class="form-group">
                            <label for="name" class="form-label">Nom complet</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Votre nom" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Votre email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label">Sujet</label>
                            <input type="text" id="subject" name="subject" class="form-input" placeholder="Objet de votre message" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" class="form-textarea" placeholder="Votre message..." required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">Envoyer le message</button>
                    </form>
                </div>
            </div>
            
            <!-- Carte -->
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8161032.554160053!2d8.619457474706886!3d-0.8034003896018885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x107f9d3c31e2fb49%3A0x4e8582b463e4b839!2sLibreville%2C%20Gabon!5e0!3m2!1sfr!2sfr!4v1684838953786!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            
            <!-- FAQ Section -->
            <div class="faq-section">
                <h2 class="faq-title">Questions fréquentes</h2>
                
                <?php
                $faqs = [
                    [
                        'question' => 'Quels sont les délais de livraison ?',
                        'reponse' => 'Les délais de livraison standard sont de 3 à 5 jours ouvrés au Gabon et de 7 à 14 jours pour les livraisons internationales. Les commandes passées avant 14h sont expédiées le jour même.'
                    ],
                    [
                        'question' => 'Quelle est votre politique de retour ?',
                        'reponse' => 'Nous acceptons les retours sous 30 jours après réception de votre commande. Les articles doivent être dans leur état d\'origine, non portés et avec leurs étiquettes. Les frais de retour sont à la charge du client, sauf en cas d\'erreur de notre part.'
                    ],
                    [
                        'question' => 'Proposez-vous la personnalisation de produits ?',
                        'reponse' => 'Oui, nous proposons un service de personnalisation pour certains articles. Contactez-nous directement pour discuter de votre projet et obtenir un devis personnalisé.'
                    ],
                    [
                        'question' => 'Comment puis-je suivre ma commande ?',
                        'reponse' => 'Une fois votre commande expédiée, vous recevrez un email de confirmation avec un numéro de suivi. Vous pouvez également suivre votre commande depuis votre compte client sur notre site.'
                    ]
                ];
                
                foreach($faqs as $faq): ?>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span><?php echo $faq['question']; ?></span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo $faq['reponse']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>