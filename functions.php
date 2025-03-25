<?php
// Inclusion des fichiers de configuration du thème
include "functions/customizer.php";
include "functions/options.php";

// Enregistrement des emplacements de menu
function votre_theme_register_menus() {
    register_nav_menus( array(
        'menu_404' => __( 'Menu 404', 'votre-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'votre_theme_register_menus' );
?>