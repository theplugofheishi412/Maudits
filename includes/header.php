<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'MAUDITS - Boutique en ligne'; ?></title>
    <link rel="shortcut icon" href="img/image0__2_-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php if(isset($customCSS)): ?>
        <link rel="stylesheet" href="<?php echo $customCSS; ?>">
    <?php endif; ?>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-black text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
               <a href="index.php"><img src="img/image0__2_-removebg-preview.png" alt="Logo MAUDITS" class="h-11 w-auto"></a>
            </div>
            
            <!-- Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="index.php" class="nav-link hover:text-gray-300 transition <?php echo ($currentPage == 'index') ? 'font-bold' : ''; ?>">Accueil</a>
                <a href="boutique.php" class="nav-link hover:text-gray-300 transition <?php echo ($currentPage == 'boutique') ? 'font-bold' : ''; ?>">Boutique</a>
                <a href="nouveaute.php" class="nav-link hover:text-gray-300 transition <?php echo ($currentPage == 'nouveaute') ? 'font-bold' : ''; ?>">Nouveautés</a>
                <a href="collections.php" class="nav-link hover:text-gray-300 transition <?php echo ($currentPage == 'collections') ? 'font-bold' : ''; ?>">Collections</a>
                <a href="contact.php" class="nav-link hover:text-gray-300 transition <?php echo ($currentPage == 'contact') ? 'font-bold' : ''; ?>">Contact</a>
            </nav>
            
            <!-- Icons -->
            <div class="flex items-center space-x-4">
                <a href="#" id="search-toggle" class="hover:text-gray-300 transition"><i class="fas fa-search"></i></a>
                <form id="search-form" class="hidden absolute right-16 top-1/2 transform -translate-y-1/2 bg-white rounded shadow px-4 py-2 flex items-center">
                    <input type="text" placeholder="Rechercher..." class="border-none outline-none px-2 py-1 text-black bg-transparent" />
                    <button type="submit" class="ml-2 text-black"><i class="fas fa-arrow-right"></i></button>
                </form>
                <a href="register.php" class="hover:text-gray-300 transition"><i class="fas fa-user"></i></a>
                <a href="panier.php" class="hover:text-gray-300 transition relative">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="absolute -top-2 -right-2 bg-white text-black rounded-full w-5 h-5 flex items-center justify-center text-xs">0</span>
                </a>
                <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-black py-4 px-4">
            <a href="index.php" class="block py-2 hover:text-gray-300 transition">Accueil</a>
            <a href="boutique.php" class="block py-2 hover:text-gray-300 transition">Boutique</a>
            <a href="nouveaute.php" class="block py-2 hover:text-gray-300 transition">Nouveautés</a>
            <a href="collections.php" class="block py-2 hover:text-gray-300 transition">Collections</a>
            <a href="contact.php" class="block py-2 hover:text-gray-300 transition">Contact</a>
        </div>
    </header>