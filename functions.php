<?php
require get_template_directory() . '/inc/class-theme-setup.php';
require get_template_directory() . '/inc/class-gutenberg-blocks.php';

function zacked_theme_setup() {
    $theme_setup = new Theme_Setup();
    $gutenberg_blocks = new Gutenberg_Blocks();
}
add_action('after_setup_theme', 'zacked_theme_setup');

function zacked_enqueue_admin_scripts() {
    global $pagenow;
    if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
        wp_enqueue_script(
            'zacked-admin-scripts',
            get_template_directory_uri() . '/build/custom-block.js?ver=' . time(),
            array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
            null, // Remove filemtime to ensure time() is used
            true // Load in the footer
        );
    }
}
add_action('admin_enqueue_scripts', 'zacked_enqueue_admin_scripts');

function zacked_enqueue_block_editor_assets() {
    // Enqueues for admin functionalities like custom categories
    wp_enqueue_script(
        'zacked-admin-scripts',
        get_template_directory_uri() . '/assets/js/admin-scripts.js',
        array('wp-blocks', 'wp-edit-post', 'wp-element', 'wp-editor', 'wp-components', 'wp-hooks')
    );

    // Enqueues for custom blocks, transpiled
    wp_enqueue_script(
        'zacked-custom-block',
        get_template_directory_uri() . '/build/custom-block.js',
        array('wp-blocks', 'wp-element', 'wp-editor'), // dependencies 
        filemtime(get_template_directory() . '/build/custom-block.js'), // Versioning by file modification
        true // Load in the footer
    );
}
add_action('enqueue_block_editor_assets', 'zacked_enqueue_block_editor_assets');

function zacked_enqueue_styles() {
    // Correct the path by adding a slash before 'assets'
    wp_enqueue_style('zacked-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('zacked-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'zacked_enqueue_styles');


function zacked_register_custom_category($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'custom-category',
                'title' => 'Theme Custom Block',
                'icon'  => 'star-filled'
            ),
        )
    );
}
add_filter('block_categories_all', 'zacked_register_custom_category', 10, 2);

function zacked_register_menus() {
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'zacked'), // 'primary' is the location and 'Primary Menu' is the description.
            'footer'  => __('Footer Menu', 'zacked')  // Additional menu example for footer.
        )
    );
}
add_action('after_setup_theme', 'zacked_register_menus');






