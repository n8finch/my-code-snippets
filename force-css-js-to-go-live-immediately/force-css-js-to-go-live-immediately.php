<?php
// Version CSS file in a theme
wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
// Version JS file in a theme
wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), filemtime( get_stylesheet_directory() . '/js/scripts.js' ) );
// Version CSS file in a plugin
wp_enqueue_style( 'plugin-styles', plugin_dir_url( __FILE__ ) .  'assets/css/plugin-styles.css', array(), filemtime( plugin_dir_path( __FILE__ ) .  'assets/css/plugin-styles.css' ) );
// Version JS file in a plugin
wp_enqueue_script( 'plugin-scripts', plugin_dir_url( __FILE__ ) .  'assets/js/plugin-scripts.js', array(), filemtime( plugin_dir_path( __FILE__ ) .  'assets/js/plugin-scripts.js' ) );