<?php
/**
 * options.php
 *
 * Ce fichier gère les fonctionnalités du thème, l'enqueue des styles/scripts
 * et la modification de la requête principale.
 */

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

function theme_tp_enqueue_styles() {
    // Enfile le style normalize.css (ici dans /css/)
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), null);
    
    // Enfile le style principal (style.css)
    wp_enqueue_style('main-style', get_stylesheet_uri());
    
    // Enfile le script destination.js, versionné par la date de dernière modification
    wp_enqueue_script(
        'destination_restapi',
        get_template_directory_uri() . '/js/destination.js',
        array(),
        filemtime(get_template_directory() . '/js/destination.js'),
        true
    );
    
    // Localise le script pour passer la base URL correcte au JavaScript
    $localize_array = array(
        'baseUrl' => home_url() // Cette valeur inclut le sous-dossier si nécessaire
    );
    wp_localize_script('destination_restapi', 'myTheme', $localize_array);
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

/**
 * Modifie la requête principale de WordPress pour la page d'accueil.
 *
 * @param WP_Query $query La requête principale.
 */
function modifie_requete_principal($query) {
    if ($query->is_home() && $query->is_main_query() && !is_admin()) {
        // Filtre les articles pour afficher uniquement ceux de la catégorie "populaire"
        $query->set('category_name', 'populaire');
        
        // Ordonne les articles par titre en ordre croissant
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'modifie_requete_principal');
?>
