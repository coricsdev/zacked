<?php
class Gutenberg_Blocks {
    function __construct() {
        add_action('init', array($this, 'register_gutenberg_blocks'));
    }

    public function register_gutenberg_blocks() {
        // Register each block
        wp_register_script(
            'custom-block',
            get_template_directory_uri() . '/blocks/custom-block.js',
            array('wp-blocks', 'wp-editor', 'wp-element'), // Ensure you include all necessary dependencies.
            filemtime(get_template_directory() . '/blocks/custom-block.js') // This helps with cache busting.
        );
        
        register_block_type('zacked/custom-block', array(
            'editor_script' => 'custom-block',
        ));
        
    }
}
