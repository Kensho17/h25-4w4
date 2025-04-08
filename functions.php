<?php
// Inclusion des fichiers de configuration du thème
require_once get_template_directory() . '/functions/customizer.php';
require_once get_template_directory() . '/functions/options.php';
require_once get_template_directory() . '/functions/genere-list-categorie.php';

/**
 * Enregistre les menus du thème.
 */
function clubvoyage_register_menus() {
    register_nav_menus(array(
        '404_menu' => __('Menu 404', 'clubvoyage'),
    ));
}
add_action('init', 'clubvoyage_register_menus');

/**
 * Enfile les fichiers CSS et JS du thème.
 */
function theme_tp_enqueue_styles(){
    // Enfile le style normalize.css (dans la racine du thème)
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css', array(), null);

    // Enfile le style principal généré (style.css)
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Enfile le script destination.js avec son numéro de version basé sur la dernière modification du fichier
    wp_enqueue_script(
        'destination_restapi',
        get_template_directory_uri() . '/js/destination.js',
        array(),
        filemtime(get_template_directory() . '/js/destination.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');