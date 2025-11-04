<?php
$pageTitle = "Nouveautés - MAUDITS";
$currentPage = "nouveaute";
$customCSS = "css/new.css";
$customJS = "script/new.js";
include 'includes/header.php';
?>

    <!-- Bannière de collection -->
    <div class="collection-banner" style="background-image: url('img/image0 (1).jpeg');">
        <div class="collection-overlay"></div>
        <div class="collection-content">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">NOUVEAUTÉS MAUDITS</h1>
            <p class="text-xl">Découvrez les dernières pièces exclusives</p>
        </div>
    </div>

    <!-- Section Compte à Rebours -->
    <section class="py-8 md:py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="countdown-container">
                <div class="countdown-title">NOUVELLE COLLECTION DISPONIBLE DANS</div>
                <div class="countdown">
                    <div class="countdown-item">
                        <div class="countdown-value" id="days">00</div>
                        <div class="countdown-label">Jours</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-value" id="hours">00</div>
                        <div class="countdown-label">Heures</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-value" id="minutes">00</div>
                        <div class="countdown-label">Minutes</div>
                    </div>
                    <div class="countdown-item">
                        <div class="countdown-value" id="seconds">00</div>
                        <div class="countdown-label">Secondes</div>
                    </div>
                </div>
            </div>
            
            <h2 class="section-title text-center">NOUVELLES PIÈCES</h2>
            <p class="section-subtitle">Découvrez les dernières arrivées de la collection</p>
            
            <!-- Filtres -->
            <div class="tabs">
                <div class="tab active" data-filter="all">Tous</div>
                <div class="tab" data-filter="menace">Collection MENACE</div>
                <div class="tab" data-filter="sois-different">Collection Sois Different</div>
                <div class="tab" data-filter="fast">Collection Fast</div>
            </div>
            
            <!-- Grille de produits -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $nouveautes = [
                    [
                        'id' => 1,
                        'image' => 'img/Enssemble MENACE noir .jpg',
                        'nom' => 'Ensemble Noir',
                        'collection' => 'Collection MENACE - Édition Limitée',
                        'prix' => '35.000 FCFA',
                        'note' => 4.5,
                        'category' => 'menace'
                    ],
                    [
                        'id' => 2,
                        'image' => 'img/MA3 3.jpg',
                        'nom' => 'T-shirt',
                        'collection' => 'Collection Sois Different',
                        'prix' => '18.000 FCFA',
                        'note' => 5,
                        'category' => 'menace'
                    ],
                    [
                        'id' => 3,
                        'image' => 'img/Maudit SD.jpg',
                        'nom' => 'T-shirt',
                        'collection' => 'Édition Limitée',
                        'prix' => '15.000 FCFA',
                        'note' => 4,
                        'category' => 'sois-different'
                    ],
                    [
                        'id' => 4,
                        'image' => 'img/T Noir maudit fast.jpg',
                        'nom' => 'Fast Noir',
                        'collection' => 'Collection Fast',
                        'prix' => '15.000 FCFA',
                        'note' => 3.5,
                        'category' => 'fast'
                    ],
                    [
                        'id' => 5,
                        'image' => 'img/Maudit aeron v2.jpg',
                        'nom' => 'PullOver',
                        'collection' => 'Collection Sois Different',
                        'prix' => '12.000 FCFA',
                        'note' => 4.5,
                        'category' => 'sois-different'
                    ],
                    [
                        'id' => 6,
                        'image' => 'img/Maudit PC SD belge .jpg',
                        'nom' => 'PullOver Belge',
                        'collection' => 'Édition Limitée',
                        'prix' => '22.000 FCFA',
                        'note' => 4,
                        'category' => 'sois-different'
                    ]
                ];
                
                foreach($nouveautes as $produit): ?>
                    <div class="product-card bg-white rounded-lg overflow-hidden shadow-md" data-category="<?php echo $produit['category']; ?>">
                        <div class="product-image">
                            <span class="new-badge">Nouveau</span>
                            <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['nom']; ?>" class="w-full h-64 object-cover">
                            <div class="product-overlay">
                                <div class="product-actions">
                                    <button class="add-to-cart" onclick="addToCart(<?php echo $produit['id']; ?>)">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-1"><?php echo $produit['nom']; ?></h3>
                            <p class="text-gray-600 mb-2"><?php echo $produit['collection']; ?></p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold"><?php echo $produit['prix']; ?></span>
                                <div class="flex">
                                    <?php
                                    $note = $produit['note'];
                                    for($i = 1; $i <= 5; $i++):
                                        if($i <= floor($note)): ?>
                                            <span class="text-yellow-400"><i class="fas fa-star"></i></span>
                                        <?php elseif($i == ceil($note) && $note - floor($note) >= 0.5): ?>
                                            <span class="text-yellow-400"><i class="fas fa-star-half-alt"></i></span>
                                        <?php else: ?>
                                            <span class="text-yellow-400"><i class="far fa-star"></i></span>
                                        <?php endif;
                                    endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>