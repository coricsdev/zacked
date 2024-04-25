document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.primary-menu-class');

    menuButton.addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        menu.classList.toggle('is-active');
    });
});
