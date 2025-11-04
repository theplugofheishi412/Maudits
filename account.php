<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$pageTitle = "Mon Compte - MAUDITS";
$currentPage = "account";
$customCSS = "connexion.css";
include 'includes/header.php';

// Récupérer les informations de l'utilisateur
$user_prenom = isset($_SESSION['user_prenom']) ? $_SESSION['user_prenom'] : '';
$user_nom = isset($_SESSION['user_nom']) ? $_SESSION['user_nom'] : '';
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

// Simuler quelques commandes (à remplacer par des données de base de données)
$commandes = [
    [
        'numero' => 'CMD-2025-001',
        'date' => '01/11/2025',
        'statut' => 'Livrée',
        'total' => 50000,
        'articles' => 3
    ],
    [
        'numero' => 'CMD-2025-002',
        'date' => '28/10/2025',
        'statut' => 'En cours',
        'total' => 35000,
        'articles' => 2
    ],
    [
        'numero' => 'CMD-2025-003',
        'date' => '15/10/2025',
        'statut' => 'Livrée',
        'total' => 20000,
        'articles' => 1
    ]
];
?>

<!-- Hero Section -->
<section class="py-16 bg-black text-white">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">MON ESPACE</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto">Bienvenue <?php echo htmlspecialchars($user_prenom); ?></p>
    </div>
</section>

<!-- Section Compte -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-black text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                            <?php echo strtoupper(substr($user_prenom, 0, 1) . substr($user_nom, 0, 1)); ?>
                        </div>
                        <h3 class="text-xl font-bold"><?php echo htmlspecialchars($user_prenom . ' ' . $user_nom); ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($user_email); ?></p>
                    </div>
                    
                    <nav class="space-y-2">
                        <a href="#profil" class="account-nav-link active">
                            <i class="fas fa-user mr-3"></i> Mon profil
                        </a>
                        <a href="#commandes" class="account-nav-link">
                            <i class="fas fa-shopping-bag mr-3"></i> Mes commandes
                        </a>
                        <a href="#adresses" class="account-nav-link">
                            <i class="fas fa-map-marker-alt mr-3"></i> Mes adresses
                        </a>
                        <a href="#wishlist" class="account-nav-link">
                            <i class="fas fa-heart mr-3"></i> Ma wishlist
                        </a>
                        <a href="#parametres" class="account-nav-link">
                            <i class="fas fa-cog mr-3"></i> Paramètres
                        </a>
                        <a href="logout.php" class="account-nav-link text-red-600 hover:bg-red-50">
                            <i class="fas fa-sign-out-alt mr-3"></i> Déconnexion
                        </a>
                    </nav>
                </div>
            </div>
            
            <!-- Contenu principal -->
            <div class="lg:col-span-3">
                <!-- Section Profil -->
                <div id="profil" class="account-section">
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-8 fade-in">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Informations personnelles</h2>
                            <button class="btn-edit" onclick="toggleEdit('profil-form')">
                                <i class="fas fa-edit mr-2"></i> Modifier
                            </button>
                        </div>
                        
                        <form id="profil-form" method="POST" action="update_profile.php">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="form-label">Prénom</label>
                                    <input type="text" name="prenom" class="form-input" value="<?php echo htmlspecialchars($user_prenom); ?>" disabled>
                                </div>
                                <div>
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-input" value="<?php echo htmlspecialchars($user_nom); ?>" disabled>
                                </div>
                                <div>
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-input" value="<?php echo htmlspecialchars($user_email); ?>" disabled>
                                </div>
                                <div>
                                    <label class="form-label">Téléphone</label>
                                    <input type="tel" name="telephone" class="form-input" value="+241 77 00 00 00" disabled>
                                </div>
                            </div>
                            
                            <div class="mt-6 hidden" id="profil-form-actions">
                                <button type="submit" class="btn-primary mr-4">Enregistrer</button>
                                <button type="button" class="btn-secondary" onclick="toggleEdit('profil-form')">Annuler</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Statistiques -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                            <div class="text-4xl font-bold text-black mb-2"><?php echo count($commandes); ?></div>
                            <div class="text-gray-600">Commandes</div>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                            <div class="text-4xl font-bold text-black mb-2">5</div>
                            <div class="text-gray-600">Favoris</div>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg p-6 text-center fade-in">
                            <div class="text-4xl font-bold text-black mb-2">105.000</div>
                            <div class="text-gray-600">FCFA dépensés</div>
                        </div>
                    </div>
                </div>
                
                <!-- Section Commandes -->
                <div id="commandes" class="account-section hidden">
                    <div class="bg-white rounded-xl shadow-lg p-8 fade-in">
                        <h2 class="text-2xl font-bold mb-6">Mes commandes</h2>
                        
                        <div class="space-y-4">
                            <?php foreach($commandes as $commande): ?>
                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                                        <div>
                                            <h3 class="font-bold text-lg mb-1">Commande #<?php echo $commande['numero']; ?></h3>
                                            <p class="text-gray-600 text-sm">Passée le <?php echo $commande['date']; ?></p>
                                        </div>
                                        <span class="status-badge status-<?php echo strtolower($commande['statut']); ?> mt-2 md:mt-0">
                                            <?php echo $commande['statut']; ?>
                                        </span>
                                    </div>
                                    
                                    <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                                        <div>
                                            <span class="text-gray-600"><?php echo $commande['articles']; ?> article<?php echo $commande['articles'] > 1 ? 's' : ''; ?></span>
                                            <span class="mx-2">•</span>
                                            <span class="font-bold"><?php echo number_format($commande['total'], 0, ',', '.'); ?> FCFA</span>
                                        </div>
                                        <button class="text-black font-semibold hover:underline">Voir détails</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Section Adresses -->
                <div id="adresses" class="account-section hidden">
                    <div class="bg-white rounded-xl shadow-lg p-8 fade-in">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold">Mes adresses</h2>
                            <button class="btn-primary">
                                <i class="fas fa-plus mr-2"></i> Ajouter une adresse
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Adresse principale -->
                            <div class="border-2 border-black rounded-lg p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="bg-black text-white px-3 py-1 text-xs font-bold rounded">PRINCIPALE</span>
                                    <button class="text-gray-500 hover:text-black">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <h3 class="font-bold mb-2"><?php echo htmlspecialchars($user_prenom . ' ' . $user_nom); ?></h3>
                                <p class="text-gray-600 text-sm">
                                    123 Rue de la Mode<br>
                                    75000 Libreville<br>
                                    Gabon<br>
                                    Tél: +241 77 00 00 00
                                </p>
                            </div>
                            
                            <!-- Ajouter une adresse -->
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 flex items-center justify-center cursor-pointer hover:border-black transition">
                                <div class="text-center">
                                    <i class="fas fa-plus text-4xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-600 font-semibold">Ajouter une nouvelle adresse</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section Wishlist -->
                <div id="wishlist" class="account-section hidden">
                    <div class="bg-white rounded-xl shadow-lg p-8 fade-in">
                        <h2 class="text-2xl font-bold mb-6">Ma wishlist</h2>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Produit wishlist -->
                            <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                                <div class="relative">
                                    <img src="img/Maudit SD.jpg" alt="Produit" class="w-full h-48 object-cover">
                                    <button class="absolute top-2 right-2 bg-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-500 hover:text-white transition">
                                        <i class="fas fa-heart text-red-500"></i>
                                    </button>
                                </div>
                                <div class="p-4">
                                    <h3 class="font-bold mb-1">T-shirt Maudit</h3>
                                    <p class="text-gray-600 text-sm mb-2">Collection Sois Different</p>
                                    <div class="flex justify-between items-center">
                                        <span class="font-bold">10.000 FCFA</span>
                                        <button class="bg-black text-white px-3 py-1 text-sm rounded hover:bg-gray-800 transition">
                                            Ajouter au panier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section Paramètres -->
                <div id="parametres" class="account-section hidden">
                    <div class="bg-white rounded-xl shadow-lg p-8 fade-in">
                        <h2 class="text-2xl font-bold mb-6">Paramètres du compte</h2>
                        
                        <!-- Changer le mot de passe -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold mb-4">Changer mon mot de passe</h3>
                            <form method="POST" action="update_password.php" class="space-y-4">
                                <div>
                                    <label class="form-label">Mot de passe actuel</label>
                                    <input type="password" name="current_password" class="form-input" required>
                                </div>
                                <div>
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <input type="password" name="new_password" class="form-input" required>
                                </div>
                                <div>
                                    <label class="form-label">Confirmer le nouveau mot de passe</label>
                                    <input type="password" name="confirm_password" class="form-input" required>
                                </div>
                                <button type="submit" class="btn-primary">Mettre à jour</button>
                            </form>
                        </div>
                        
                        <!-- Préférences -->
                        <div class="mb-8 border-t pt-8">
                            <h3 class="text-xl font-bold mb-4">Notifications</h3>
                            <div class="space-y-3">
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox mr-3" checked>
                                    <span>Recevoir les newsletters et offres exclusives</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox mr-3" checked>
                                    <span>Notifications de nouvelles collections</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="form-checkbox mr-3">
                                    <span>Rappels de panier abandonné</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Supprimer le compte -->
                        <div class="border-t pt-8">
                            <h3 class="text-xl font-bold mb-4 text-red-600">Zone de danger</h3>
                            <p class="text-gray-600 mb-4">La suppression de votre compte est irréversible. Toutes vos données seront perdues.</p>
                            <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
                                Supprimer mon compte
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.account-nav-link {
    display: flex;
    align-items: center;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    transition: all 0.3s;
    color: #374151;
    font-weight: 500;
}

.account-nav-link:hover {
    background-color: #f3f4f6;
}

.account-nav-link.active {
    background-color: #000;
    color: #fff;
}

.btn-edit {
    padding: 0.5rem 1rem;
    border: 1px solid #000;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-edit:hover {
    background-color: #000;
    color: #fff;
}

.btn-secondary {
    padding: 0.75rem 1.5rem;
    border: 1px solid #000;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s;
}

.btn-secondary:hover {
    background-color: #f3f4f6;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.875rem;
    font-weight: 600;
}

.status-livrée {
    background-color: #d1fae5;
    color: #065f46;
}

.status-en.cours {
    background-color: #fef3c7;
    color: #92400e;
}

.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<script>
// Navigation entre les sections
document.querySelectorAll('.account-nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Retirer la classe active de tous les liens
        document.querySelectorAll('.account-nav-link').forEach(l => l.classList.remove('active'));
        
        // Ajouter la classe active au lien cliqué
        this.classList.add('active');
        
        // Cacher toutes les sections
        document.querySelectorAll('.account-section').forEach(section => section.classList.add('hidden'));
        
        // Afficher la section correspondante
        const targetId = this.getAttribute('href').substring(1);
        document.getElementById(targetId).classList.remove('hidden');
    });
});

// Fonction pour activer/désactiver l'édition du formulaire
function toggleEdit(formId) {
    const form = document.getElementById(formId);
    const inputs = form.querySelectorAll('input');
    const actions = document.getElementById(formId + '-actions');
    
    inputs.forEach(input => {
        input.disabled = !input.disabled;
    });
    
    actions.classList.toggle('hidden');
}
</script>

<?php include 'includes/footer.php'; ?>