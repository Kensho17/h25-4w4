<?php
// Inclusion des fichiers de configuration du thème
include "functions/customizer.php";
include "functions/options.php";
include_once get_template_directory() . '/functions/genere-list-categorie.php';

function clubvoyage_register_menus() {
    register_nav_menus(array(
        '404_menu' => __('Menu 404', 'clubvoyage'),
    ));
}
add_action('init', 'clubvoyage_register_menus');

function theme_tp_enqueu_styles(){
wp_enqueu_style('normalize', get_template_directory_uri() .'/normalize.css');
wp_enqueu_style('main-style', get_stylesheet_uri());

wp_enqueue_script(
    'destination_restapi',
    get_template_directory_uri() . '/js/destination.js',
    array(),
    filemtime(get_template_directory() . 
    '/js/destination.js'),
    true
);
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');