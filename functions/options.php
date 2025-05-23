<?php
/**
 * Pour l'ajout d'options et assets à votre thème
 */

/**
 * Active divers supports de thème.
 */
function mon_theme_supports() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 150,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
}
add_action( 'after_setup_theme', 'mon_theme_supports' );


/**
 * Enqueue styles et scripts, et expose la base REST API à JS.
 */
function theme_tp_enqueue_assets() {
    // Styles
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/normalize.css' );
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

    // Scripts
    wp_enqueue_script(
        'destination_restapi',
        get_template_directory_uri() . '/js/destination.js',
        array(),
        filemtime( get_template_directory() . '/js/destination.js' ),
        true
    );

    wp_enqueue_script(
        'carrousel.js',
        get_template_directory_uri() . '/js/carrousel.js',
        array(),
        filemtime( get_template_directory() . '/js/carrousel.js' ),
        true
    );

    // Expose l’URL de base du REST API et un nonce éventuel
    wp_localize_script(
        'destination_restapi',
        'tpApi',
        array(
            // ex. "https://monsite.local/h25-4w4/wp-json/"
            'root'  => esc_url_raw( rest_url() ),
            // nonce pour méthode POST si besoin
            'nonce' => wp_create_nonce( 'wp_rest' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_tp_enqueue_assets' );


/**
 * Enregistre les emplacements de menu.
 */
function theme_t_p_register_menus() {
    register_nav_menus( array(
        'principal' => __( 'Menu Principal',       '4w4-weiqiang' ),
        '404_menu'  => __( 'Menu 404',             '4w4-weiqiang' ),
        'externe'   => __( 'Menu Partenaires',     '4w4-weiqiang' ),
        'pays'      => __( 'Menu Pays',            '4w4-weiqiang' ),
    ) );
}
add_action( 'after_setup_theme', 'theme_t_p_register_menus' );


/**
 * Filtre la requête principale sur la page d'accueil.
 */
function modifie_requete_principal( $query ) {
    if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
        $query->set( 'category_name', 'populaire' );
        $query->set( 'orderby',       'title' );
        $query->set( 'order',         'ASC' );
    }
}
add_action( 'pre_get_posts', 'modifie_requete_principal' );


/**
 * Limite la recherche aux posts (exclut les pages).
 */
function seul_posts_dans_recherche( $query ) {
    if ( $query->is_search() && ! is_admin() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post' ) );
    }
}
add_action( 'pre_get_posts', 'seul_posts_dans_recherche' );


/**
 * Réglages Customizer pour la page “Pays” (vagues haut et bas).
 */
function theme_tp_customizer_pays( $wp_customize ) {
    $wp_customize->add_section( 'pays_vagues', array(
        'title'    => __( 'Vagues – Page Pays', '4w4-weiqiang' ),
        'priority' => 35,
    ) );

    // Couleur vague haute
    $wp_customize->add_setting( 'pays_vague_haut_color', array(
        'default'           => '#A0D8EF',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pays_vague_haut_color', array(
        'label'    => __( 'Couleur vague haut', '4w4-weiqiang' ),
        'section'  => 'pays_vagues',
        'settings' => 'pays_vague_haut_color',
    ) ) );

    // Couleur vague basse
    $wp_customize->add_setting( 'pays_vague_bas_color', array(
        'default'           => '#B3ECB3',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pays_vague_bas_color', array(
        'label'    => __( 'Couleur vague bas', '4w4-weiqiang' ),
        'section'  => 'pays_vagues',
        'settings' => 'pays_vague_bas_color',
    ) ) );
}
add_action( 'customize_register', 'theme_tp_customizer_pays' );
