 // Script pour gérer la connexion
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Ici, vous ajouteriez normalement le code pour envoyer les données au serveur
            alert('Connexion réussie!');
            // Redirection vers la page d'accueil
            window.location.href = 'index.html';
        });
        
        // Script pour le menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Script pour basculer la visibilité du mot de passe
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            if (password.type === 'password') {
                password.type = 'text';
                togglePassword.innerHTML = '<i class="far fa-eye-slash"></i>';
            } else {
                password.type = 'password';
                togglePassword.innerHTML = '<i class="far fa-eye"></i>';
            }
        });


        // inscription 
           document.getElementById('register-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas.');
                return;
            }

            // Ici, vous ajouteriez normalement le code pour envoyer les données au serveur
            alert('Votre compte a été créé avec succès!');
            // Redirection vers la page d'accueil ou de connexion
            window.location.href = 'index.html';
        });

        // Script pour le menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Script pour basculer la visibilité du mot de passe
        function setupPasswordToggle(toggleId, inputId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);

            toggle.addEventListener('click', function () {
                if (input.type === 'password') {
                    input.type = 'text';
                    toggle.innerHTML = '<i class="far fa-eye-slash"></i>';
                } else {
                    input.type = 'password';
                    toggle.innerHTML = '<i class="far fa-eye"></i>';
                }
            });
        }

        setupPasswordToggle('togglePassword', 'password');
        setupPasswordToggle('toggleConfirmPassword', 'confirm-password');