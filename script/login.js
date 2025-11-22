// Basculer visibilité mot de passe
const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

if(togglePassword && password) {
    togglePassword.addEventListener('click', function() {
        if (password.type === 'password') {
            password.type = 'text';
            togglePassword.innerHTML = '<i class="far fa-eye-slash"></i>';
        } else {
            password.type = 'password';
            togglePassword.innerHTML = '<i class="far fa-eye"></i>';
        }
    });
}

// Pour confirm password (register.php)
const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
const confirmPassword = document.getElementById('confirm-password');

if(toggleConfirmPassword && confirmPassword) {
    toggleConfirmPassword.addEventListener('click', function() {
        if (confirmPassword.type === 'password') {
            confirmPassword.type = 'text';
            toggleConfirmPassword.innerHTML = '<i class="far fa-eye-slash"></i>';
        } else {
            confirmPassword.type = 'password';
            toggleConfirmPassword.innerHTML = '<i class="far fa-eye"></i>';
        }
    });
}

// Menu mobile
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

if(mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
}