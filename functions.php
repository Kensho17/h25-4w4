<?php
// Inclusion des fichiers de configuration du thème
include "functions/customizer.php";
include "functions/options.php";

function clubvoyage_register_menus() {
    register_nav_menus(array(
        '404_menu' => __('Menu 404', 'clubvoyage'),
    ));
}
add_action('init', 'clubvoyage_register_menus');