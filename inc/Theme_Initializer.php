<?php
namespace Zacked;

class Theme_Initializer {
    
    public function __construct() {
        // Initialize theme setup
        $theme_setup = new Theme_Setup();

        // Initialize Gutenberg blocks
        $gutenberg_blocks = new Gutenberg_Blocks();

        // Add other initializations here
        $this->register_hooks();
    }

    private function register_hooks() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('enqueue_block_editor_assets', array($this, 'enqueue_block_editor_assets'));
        add_filter('block_categories_all', array($this, 'register_custom_category'), 10, 2);
        add_action('after_setup_theme', array($this, 'register_menus'));
    }

    public function enqueue_styles() {
        wp_enqueue_style('zacked-style', get_template_directory_uri() . '/assets/css/style.css');
        wp_enqueue_script('zacked-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), null, true);
    }

    public function enqueue_admin_scripts() {
        global $pagenow;
        if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
            wp_enqueue_script(
                'zacked-admin-scripts',
                get_template_directory_uri() . '/build/custom-block.js?ver=' . time(),
                array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
                null,
                true
            );
        }
    }

    public function enqueue_block_editor_assets() {
        wp_enqueue_script(
            'zacked-admin-scripts',
            get_template_directory_uri() . '/assets/js/admin-scripts.js',
            array('wp-blocks', 'wp-edit-post', 'wp-element', 'wp-editor', 'wp-components', 'wp-hooks')
        );

        wp_enqueue_script(
            'zacked-custom-block',
            get_template_directory_uri() . '/build/custom-block.js',
            array('wp-blocks', 'wp-element', 'wp-editor'),
            filemtime(get_template_directory() . '/build/custom-block.js'),
            true
        );
    }

    public function register_custom_category($categories, $post) {
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

    public function register_menus() {
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'zacked'),
                'footer'  => __('Footer Menu', 'zacked')
            )
        );
    }
}

// Instantiate the Theme_Initializer to kick off all setup.
new Theme_Initializer();
