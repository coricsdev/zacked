<?php
class Gutenberg_Blocks {
    function __construct() {
        add_action('init', array($this, 'register_gutenberg_blocks'));
    }

    public function register_gutenberg_blocks() {
        // Register each block here
        // Example for registering a simple block
        wp_register_script(
            'custom-block',
            get_template_directory_uri() . '/blocks/custom-block.js',
            array('wp-blocks', 'wp-element', 'wp-editor')
        );

        register_block_type('zacked/custom-block', array(
            'editor_script' => 'custom-block',
        ));
    }
}
