// resources/js/app.js

document.addEventListener('DOMContentLoaded', function () {
    const backgroundImageContainer = document.getElementById('backgroundImageContainer');

    if (backgroundImageContainer) {
        if (window.location.pathname === '/login' || window.location.pathname === '/register' || window.location.pathname === '/verify-email') {
            backgroundImageContainer.style.display = 'block';
        }
    }
});
