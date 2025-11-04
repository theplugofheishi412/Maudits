<?php
$pageTitle = "Collections Futures - MAUDITS";
$currentPage = "collections";
$customCSS = "css/collec.css";
$customJS = "script/collec.js";
include 'includes/header.php';
?>

    <!-- Hero Section -->
    <section class="py-16 bg-black text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">FUTURES COLLECTIONS</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto">Découvrez les prochaines collections MAUDITS qui redéfiniront les codes de la mode audacieuse</p>
        </div>
    </section>

    <!-- Section Collections Futures -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="section-title">À VENIR</h2>
            <p class="section-subtitle">Plongez dans l'univers des futures collections MAUDITS. Des pièces uniques qui repoussent les limites de la création.</p>
            
            <?php
            $futureCollections = [
                [
                    'image' => 'img/MA3 4.jpg',
                    'description' => 'Une collection inspirée par les profondeurs mystérieuses et la force primitive de la roche volcanique. Des textures riches et des couleurs profondes pour ceux qui ne craignent pas d\'embrasser l\'obscurité.',
                    'date' => '15 Septembre 2025',
                    'preview1' => 'img/Maudit PSC SD noir.jpg',
                    'preview2' => 'img/Maudit pull SD blanc.jpg'
                ],
                [
                    'image' => 'img/image0__1_-removebg-preview.png',
                    'description' => 'Une exploration cosmique où le style rencontre l\'infini. Des motifs galactiques, des textures iridescentes et des couleurs qui évoquent les mystères de l\'univers. Pour ceux qui regardent vers les étoiles.',
                    'date' => '10 Décembre 2025',
                    'preview1' => 'img/Maudit PSC SD noir.jpg',
                    'preview2' => 'img/Maudit SD.jpg'
                ],
                [
                    'image' => 'img/BAT p BLANC.jpg',
                    'description' => 'Une collection qui marie l\'héritage du passé avec l\'innovation du futur. Des coupes classiques réinterprétées avec des matériaux modernes et des détails avant-gardistes.',
                    'date' => '20 Février 2026',
                    'preview1' => 'img/Maudit aeron pull V1 noir.jpg',
                    'preview2' => 'img/Maudit SD.jpg'
                ]
            ];
            
            foreach($futureCollections as $collection): ?>
                <div class="future-collection">
                    <div class="collection-image" style="background-image: url('<?php echo $collection['image']; ?>');">
                        <div class="collection-overlay">
                            <div class="collection-content">
                                <p class="collection-description" style="text-align: justify;"><?php echo $collection['description']; ?></p>
                                <div class="collection-date">
                                    <i class="fas fa-calendar-alt date-icon"></i>
                                    Sortie prévue: <?php echo $collection['date']; ?>
                                </div>
                                
                                <div class="preview-grid">
                                    <div class="preview-item" style="background-image: url('<?php echo $collection['preview1']; ?>');"></div>
                                    <div class="preview-item" style="background-image: url('<?php echo $collection['preview2']; ?>');"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Timeline des Sorties -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="section-title">CALENDRIER DES SORTIES</h2>
            <p class="section-subtitle">Découvrez le planning de lancement de nos prochaines collections</p>
            
            <div class="timeline">
                <?php
                $timeline = [
                    [
                        'date' => '15 Septembre 2025',
                        'titre' => 'OBSIDIAN',
                        'description' => 'Collection inspirée par les forces primitives et les profondeurs mystérieuses.'
                    ],
                    [
                        'date' => '15 Octobre 2025',
                        'titre' => 'Collection Accessoires OBSIDIAN',
                        'description' => 'Accessoires complémentaires pour parfaire votre style OBSIDIAN.'
                    ],
                    [
                        'date' => '10 Décembre 2025',
                        'titre' => 'NÉBULEUSE',
                        'description' => 'Une exploration cosmique où le style rencontre l\'infini.'
                    ],
                    [
                        'date' => '20 Février 2026',
                        'titre' => 'RENAISSANCE',
                        'description' => 'L\'héritage du passé rencontre l\'innovation du futur.'
                    ]
                ];
                
                foreach($timeline as $event): ?>
                    <div class="timeline-item">
                        <div class="timeline-content">
                            <div class="timeline-date"><?php echo $event['date']; ?></div>
                            <h3><?php echo $event['titre']; ?></h3>
                            <p><?php echo $event['description']; ?></p>
                        </div>
                        <div class="date-circle"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>