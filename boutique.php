<?php
$pageTitle = "Boutique - MAUDITS";
$currentPage = "boutique";
$customCSS = "css/boutique.css";
$customJS = "script/shop.js";
include 'includes/header.php';
?>

    <!-- Bannière de collection -->
    <div class="collection-banner" style="background-image: url('img/image0 (1).jpeg');">
        <div class="collection-overlay"></div>
        <div class="collection-content">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">BOUTIQUE MAUDITS</h1>
            <p class="text-xl">Découvrez notre sélection de pièces uniques</p>
        </div>
    </div>

    <!-- Section Boutique -->
    <section class="py-8 md:py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar de filtres (mobile) -->
                <button class="mobile-filter-btn" onclick="toggleFilters()">
                    <i class="fas fa-filter mr-2"></i> Filtres
                </button>
                
                <!-- Sidebar de filtres -->
                <div class="filter-sidebar md:w-1/4 bg-white p-6 rounded-lg shadow-md h-fit md:sticky md:top-24">
                    <button class="close-filters md:hidden" onclick="toggleFilters()">
                        <i class="fas fa-times"></i>
                    </button>
                    
                    <h2 class="text-xl font-bold mb-6">FILTRES</h2>
                    
                    <div class="filter-group">
                        <div class="filter-title">Collections</div>
                        <div class="filter-options">
                            <?php
                            $collections = [
                                'menace' => 'Collection MENACE',
                                'sois-different' => 'Collection Sois Different',
                                'nouveaute' => 'Nouveautés'
                            ];
                            foreach($collections as $value => $label): ?>
                                <label class="filter-option">
                                    <input type="checkbox" name="collection" value="<?php echo $value; ?>"> <?php echo $label; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">Catégories</div>
                        <div class="filter-options">
                            <?php
                            $categories = [
                                'tshirt' => 'T-shirts',
                                'sweat' => 'Sweats & Hoodies',
                                'pantalon' => 'Pantalons',
                                'ensemble' => 'Ensembles',
                                'accessoire' => 'Accessoires'
                            ];
                            foreach($categories as $value => $label): ?>
                                <label class="filter-option">
                                    <input type="checkbox" name="category" value="<?php echo $value; ?>"> <?php echo $label; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">Prix</div>
                        <input type="range" min="0" max="100000" value="50000" class="price-range" id="priceRange">
                        <div class="price-values">
                            <span>0 FCFA</span>
                            <span>100.000 FCFA</span>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">Taille</div>
                        <div class="filter-options flex flex-wrap">
                            <?php
                            $tailles = ['s' => 'S', 'm' => 'M', 'l' => 'L', 'xl' => 'XL', 'xxl' => 'XXL'];
                            foreach($tailles as $value => $label): ?>
                                <label class="filter-option mr-4 mb-2">
                                    <input type="checkbox" name="size" value="<?php echo $value; ?>"> <?php echo $label; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">Couleur</div>
                        <div class="filter-options flex flex-wrap">
                            <?php
                            $couleurs = ['noir' => 'Noir', 'blanc' => 'Blanc', 'gris' => 'Gris', 'bleu' => 'Bleu'];
                            foreach($couleurs as $value => $label): ?>
                                <label class="filter-option mr-4 mb-2">
                                    <input type="checkbox" name="color" value="<?php echo $value; ?>"> <?php echo $label; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <button class="w-full bg-black text-white py-3 font-bold mt-4" onclick="applyFilters()">Appliquer les filtres</button>
                    <button class="w-full border border-black text-black py-3 font-bold mt-2" onclick="resetFilters()">Réinitialiser</button>
                </div>
                
                <!-- Contenu principal -->
                <div class="md:w-3/4">
                    <!-- Barre de tri et résultats -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                        <?php
                        $produits = [
                            [
                                'id' => 1,
                                'image' => 'img/Enssemble MENACE noir .jpg',
                                'nom' => 'Ensemble Noir',
                                'collection' => 'Collection MENACE',
                                'prix' => '20.000 FCFA',
                                'note' => 4.5
                            ],
                            [
                                'id' => 2,
                                'image' => 'img/MA3 2.jpg',
                                'nom' => 'T-shirt Maudit',
                                'collection' => 'Collection Sois Different',
                                'prix' => '10.000 FCFA',
                                'note' => 5
                            ],
                            [
                                'id' => 3,
                                'image' => 'img/MA3 3.jpg',
                                'nom' => 'Ensemble Blanc',
                                'collection' => 'Collection Sois Différent',
                                'prix' => '20.000 FCFA',
                                'note' => 4
                            ],
                            [
                                'id' => 4,
                                'image' => 'img/Maudit aeron pull V1 noir.jpg',
                                'nom' => 'Sweat à Capuche',
                                'collection' => 'Collection MENACE',
                                'prix' => '15.000 FCFA',
                                'note' => 3.5
                            ],
                            [
                                'id' => 5,
                                'image' => 'img/Maudit aeron v2.jpg',
                                'nom' => 'PullOver Noir',
                                'collection' => 'Collection MENACE',
                                'prix' => '15.000 FCFA',
                                'note' => 4.5
                            ],
                            [
                                'id' => 6,
                                'image' => 'img/Maudit pull SD blanc.jpg',
                                'nom' => 'Maudit',
                                'collection' => 'Collection sois-different',
                                'prix' => '15.000 FCFA',
                                'note' => 4
                            ]
                        ];
                        $totalProduits = count($produits);
                        ?>
                        <p class="text-gray-600 mb-4 md:mb-0"><?php echo $totalProduits; ?> produits</p>
                        
                        <div class="flex items-center">
                            <span class="mr-2">Trier par:</span>
                            <select class="sort-select" onchange="sortProducts(this.value)">
                                <option value="popularite">Popularité</option>
                                <option value="nouveaute">Nouveautés</option>
                                <option value="prix-croissant">Prix: croissant</option>
                                <option value="prix-decroissant">Prix: décroissant</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Grille de produits -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach($produits as $produit): ?>
                            <div class="product-card bg-white rounded-lg overflow-hidden shadow-md">
                                <div class="product-image">
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
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>