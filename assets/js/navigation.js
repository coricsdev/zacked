document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.primary-menu-class');

    function toggleMenu() {
        const expanded = menuButton.getAttribute('aria-expanded') === 'true' || false;
        menuButton.setAttribute('aria-expanded', !expanded);
        menu.classList.toggle('is-active');
        menuButton.classList.toggle('is-active'); // Toggle the 'is-active' class on the menu button as well
    }

    menuButton.addEventListener('click', toggleMenu);
});
