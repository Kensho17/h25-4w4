<?php

/**
 * Ajout de fonctionnalités au thème
 */
function mon_theme_supports() {
    // Support du titre du site
    add_theme_support('title-tag');
    
    // Support des menus
    add_theme_support('menus');
    
    // Support des images à la une
    add_theme_support('post-thumbnails');
    
    // Support du logo personnalisé
    add_theme_support('custom-logo', array(
        'height'        => 150,
        'width'         => 150,
        'flex-height'   => true,
        'flex-width'    => true,
    ));
}
add_action('after_setup_theme', 'mon_theme_supports');

/**
 * Enqueue les styles du thème
 */
function theme_tp_enqueue_styles() {
    // Ajout du style normalize.css
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css');
    
    // Ajout du style principal
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

/**
 * Modifie la requête principale de WordPress
 *
 * @param WP_Query $query La requête principale
 */
function modifie_requete_principal($query) {
    if ($query->is_home() && $query->is_main_query() && !is_admin()) {
        // Filtrage par la catégorie "populaire"
        $query->set('category_name', 'populaire');
        
        // Ordre des articles par titre croissant
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'modifie_requete_principal');

?>