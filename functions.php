<?php
require get_template_directory() . '/inc/class-theme-setup.php';
require get_template_directory() . '/inc/class-gutenberg-blocks.php';

function zacked_theme_setup() {
    $theme_setup = new Theme_Setup();
    $gutenberg_blocks = new Gutenberg_Blocks();
}

add_action('after_setup_theme', 'zacked_theme_setup');
