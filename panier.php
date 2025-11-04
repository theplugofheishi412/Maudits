<?php
session_start();

$pageTitle = "Panier - MAUDITS";
$currentPage = "panier";
$customCSS = "css/order.css";
$customJS = "script/order.js";
include 'includes/header.php';

// Initialiser le panier s'il n'existe pas
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Calculer les totaux
$sousTotal = 0;
$fraisExpedition = 5000;
$remise = 0;

// Exemple de produits dans le panier (à remplacer par des données de session)
$panierProduits = [
    [
        'id' => 'item1',
        'image' => 'img/MA3 4.jpg',
        'nom' => 'Ensemble Noir',
        'collection' => 'Collection MENACE',
        'taille' => 'L',
        'prix' => 20000,
        'quantite' => 1
    ],
    [
        'id' => 'item2',
        'image' => 'img/Maudit SD.jpg',
        'nom' => 'T-shirt Maudit',
        'collection' => 'Collection Sois Different',
        'taille' => 'M',
        'prix' => 10000,
        'quantite' => 1
    ],
    [
        'id' => 'item3',
        'image' => 'img/BAT p BLANC.jpg',
        'nom' => 'Ensemble Blanc',
        'collection' => 'Collection Sois Différent',
        'taille' => 'XL',
        'prix' => 20000,
        'quantite' => 1
    ]
];

foreach($panierProduits as $produit) {
    $sousTotal += $produit['prix'] * $produit['quantite'];
}

$total = $sousTotal + $fraisExpedition - $remise;
?>

    <!-- Section Panier -->
    <section class="py-8 md:py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-8">VOTRE PANIER</h1>
            
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Articles du panier -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                        <?php if(empty($panierProduits)): ?>
                            <div class="text-center py-12">
                                <i class="fas fa-shopping-bag text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-2xl font-bold mb-2">Votre panier est vide</h3>
                                <p class="text-gray-600 mb-6">Découvrez nos collections et ajoutez des articles à votre panier</p>
                                <a href="boutique.php" class="bg-black text-white px-8 py-3 font-bold hover:bg-gray-800 transition inline-block">Découvrir la boutique</a>
                            </div>
                        <?php else: ?>
                            <?php foreach($panierProduits as $index => $produit): ?>
                                <div class="cart-item flex flex-col md:flex-row <?php echo ($index < count($panierProduits) - 1) ? 'border-b border-gray-200' : ''; ?> pb-6 mb-6 fade-in">
                                    <div class="md:w-1/4 mb-4 md:mb-0">
                                        <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['nom']; ?>" class="w-full h-48 object-cover rounded">
                                    </div>
                                    <div class="md:w-3/4 md:pl-6 flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between">
                                                <h3 class="text-xl font-bold"><?php echo $produit['nom']; ?></h3>
                                                <span class="text-lg font-bold"><?php echo number_format($produit['prix'], 0, ',', '.'); ?> FCFA</span>
                                            </div>
                                            <p class="text-gray-600 mb-2"><?php echo $produit['collection']; ?></p>
                                            <p class="text-sm text-gray-500">Taille: <?php echo $produit['taille']; ?></p>
                                        </div>
                                        <div class="flex justify-between items-center mt-4">
                                            <div class="flex items-center">
                                                <span class="quantity-btn" onclick="updateQuantity('<?php echo $produit['id']; ?>', -1)">-</span>
                                                <input type="text" class="quantity-input" value="<?php echo $produit['quantite']; ?>" id="quantity-<?php echo $produit['id']; ?>" readonly>
                                                <span class="quantity-btn" onclick="updateQuantity('<?php echo $produit['id']; ?>', 1)">+</span>
                                            </div>
                                            <button class="remove-btn" onclick="removeItem('<?php echo $produit['id']; ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Récapitulatif de commande -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24 mb-8">
                        <h3 class="text-xl font-bold mb-4">RÉCAPITULATIF DE LA COMMANDE</h3>
                        
                        <div class="flex justify-between mb-2">
                            <span>Sous-total</span>
                            <span><?php echo number_format($sousTotal, 0, ',', '.'); ?> FCFA</span>
                        </div>
                        
                        <div class="flex justify-between mb-2">
                            <span>Frais d'expédition</span>
                            <span><?php echo number_format($fraisExpedition, 0, ',', '.'); ?> FCFA</span>
                        </div>
                        
                        <div class="flex justify-between mb-4">
                            <span>Remise</span>
                            <span class="text-green-600">-<?php echo number_format($remise, 0, ',', '.'); ?> FCFA</span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4 mb-4">
                            <div class="flex justify-between font-bold text-lg">
                                <span>Total</span>
                                <span><?php echo number_format($total, 0, ',', '.'); ?> FCFA</span>
                            </div>
                        </div>
                        
                        <button class="checkout-btn" <?php echo empty($panierProduits) ? 'disabled' : ''; ?>>PROCÉDER AU PAIEMENT</button>
                        <a href="boutique.php" class="continue-btn">CONTINUER MES ACHATS</a>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-bold mb-4">AVANTAGES MAUDITS</h3>
                        <ul class="space-y-3">
                            <?php
                            $avantages = [
                                'Livraison gratuite à partir de 100.000 FCFA d\'achat',
                                'Retours gratuits sous 30 jours',
                                'Paiement sécurisé'
                            ];
                            
                            foreach($avantages as $avantage): ?>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-black mt-1 mr-3"></i>
                                    <span><?php echo $avantage; ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>