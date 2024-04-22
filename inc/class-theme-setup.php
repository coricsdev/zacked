<?php
class Theme_Setup {
    function __construct() {
        add_action('after_setup_theme', array($this, 'setup_theme'));
    }

    public function setup_theme() {
        load_theme_textdomain('zacked', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
        
        // Gutenberg theme support
        add_theme_support('wp-block-styles');
    }
}
