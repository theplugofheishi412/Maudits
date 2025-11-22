<?php
$pageTitle = "MAUDITS - Boutique en ligne";
$currentPage = "index";
$customCSS = "css/styles.css";
$customJS = "script/scripit.js";
include 'includes/header.php';
?>

    <!--  Section -->
    <section class="relative bg-black text-white h-screen flex items-center">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-4 z-10 fade-in">
            <h2 class="text-5xl md:text-7xl font-bold mb-6 tracking-wider">MAUDIT</h2>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl">L'élégance audacieuse. Des pièces uniques pour ceux qui osent.</p>
            <a href="collections.php" class="bg-white text-black px-8 py-3 font-bold hover:bg-gray-200 transition inline-block">Découvrir</a>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </section>

    <!-- = -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">NOUVELLES COLLECTIONS</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                // Tableau des produits
                $produits = [
                    [
                        'image' => 'img/Enssemble MENACE noir .jpg',
                        'nom' => 'Ensemble Noir',
                        'collection' => 'Collection MENACE',
                        'prix' => '20.000'
                    ],
                    [
                        'image' => 'img/Maudit SD.jpg',
                        'nom' => 'T-shirt Maudit',
                        'collection' => 'Collection Sois Different',
                        'prix' => '10.000'
                    ],
                    [
                        'image' => 'img/MA3 4.jpg',
                        'nom' => 'Ensemble Noir',
                        'collection' => 'Collection Menace',
                        'prix' => '12.000'
                    ],
                    [
                        'image' => 'img/BAT p BLANC.jpg',
                        'nom' => 'Ensemble blanc',
                        'collection' => 'Collection Sois Différent',
                        'prix' => '20.000'
                    ]
                ];

                foreach($produits as $produit): ?>
                    <div class="product-card bg-white border border-gray-200 rounded-lg overflow-hidden transition duration-300">
                        <div class="relative overflow-hidden">
                            <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['nom']; ?>" class="w-full h-80 object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition flex items-center justify-center">
                                <button class="bg-white text-black px-6 py-2 font-bold opacity-0 hover:opacity-100 transition">Voir détails</button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-1"><?php echo $produit['nom']; ?></h3>
                            <p class="text-gray-600 mb-2"><?php echo $produit['collection']; ?></p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold"><?php echo $produit['prix']; ?></span>
                                <button class="bg-black text-white px-4 py-1 hover:bg-gray-800 transition">Ajouter</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-12">
                <a href="collections.php" class="border-2 border-black px-8 py-3 font-bold hover:bg-black hover:text-white transition inline-block">Voir toute la collection</a>
            </div>
        </div>
    </section>

    <!--  -->
    <section class="py-20 bg-black text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">L'ÉLÉGANCE REBELLE</h2>
            <p class="text-xl max-w-3xl mx-auto mb-8">Maudits incarne l'audace et le raffinement. Chaque pièce est conçue pour ceux qui défient les conventions.</p>
        </div>
    </section>

    <!-- Collections -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">NOS COLLECTIONS</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php
                $collections = [
                    [
                        'image' => 'img/Maudit SD.jpg',
                        'titre' => 'Collection "MENACE"',
                        'lien' => '#'
                    ],
                    [
                        'image' => 'img/BAT p BLANC.jpg',
                        'titre' => 'Collection "SOIS DIFFERENT"',
                        'lien' => '#'
                    ]
                ];

                foreach($collections as $collection): ?>
                    <div class="relative h-96 overflow-hidden group">
                        <img src="<?php echo $collection['image']; ?>" alt="<?php echo $collection['titre']; ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center group-hover:bg-opacity-60 transition">
                            <div class="text-center p-6 transform group-hover:scale-105 transition">
                                <h3 class="text-3xl font-bold text-white mb-2"><?php echo $collection['titre']; ?></h3>
                                <a href="<?php echo $collection['lien']; ?>" class="inline-block border-2 border-white text-white px-6 py-2 font-bold hover:bg-white hover:text-black transition">Explorer</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>