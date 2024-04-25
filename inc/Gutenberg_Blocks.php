<?php
namespace Zacked;

class Gutenberg_Blocks {
    function __construct() {
        add_action('init', array($this, 'register_gutenberg_blocks'));
    }

    public function register_gutenberg_blocks() {
        // Only register the script and block if it hasn't already been registered
        if (!\WP_Block_Type_Registry::get_instance()->is_registered('zacked/custom-block')) {
            wp_register_script(
                'custom-block-script', // Changed handle to avoid potential conflicts
                get_template_directory_uri() . '/blocks/custom-block.js',
                array('wp-blocks', 'wp-editor', 'wp-element'), // Dependencies
                filemtime(get_template_directory() . '/blocks/custom-block.js') // Cache busting
            );

            register_block_type('zacked/custom-block', array(
                'editor_script' => 'custom-block-script',
            ));
        }
    }
}
