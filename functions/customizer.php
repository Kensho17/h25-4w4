<?php
/**
 * Fonction pour enregistrer les personnalisations du thème.
 *
 * @param WP_Customize_Manager $wp_customize L'objet du personnalisateur WordPress.
 */
function theme_31w_customize_register( $wp_customize ) {

    // ====== Section Hero ======
    $wp_customize->add_section( 'hero_section', array(
        'title'    => __( 'Hero Section', 'theme_31w' ),
        'priority' => 31,
    ) );

    // Auteur
    $wp_customize->add_setting( 'hero_auteur', array(
        'default'           => __( 'Weiqiang Chen', 'theme_31w' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_auteur', array(
        'label'   => __( 'Auteur', 'theme_31w' ),
        'section' => 'hero_section',
        'type'    => 'text',
    ) );

    // Courriel
    $wp_customize->add_setting( 'hero_courriel', array(
        'default'           => __( 'Weiqiang Chen', 'theme_31w' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_courriel', array(
        'label'   => __( 'Courriel', 'theme_31w' ),
        'section' => 'hero_section',
        'type'    => 'text',
    ) );

    // Images de fond (3)
    for ( $k = 0; $k < 3; $k++ ) {
        $wp_customize->add_setting( 'hero_background_' . $k, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_background_' . $k, array(
            'label'   => __( 'Image en background ' . ( $k + 1 ), 'theme_31w' ),
            'section' => 'hero_section',
        ) ) );
    }

    // Couleur du texte (primaire)
    $wp_customize->add_setting( 'hero_icone', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_icone', array(
        'label'   => __( 'Couleur du texte (primaire)', 'theme_31w' ),
        'section' => 'hero_section',
    ) ) );

    // Couleur du texte (secondaire)
    $wp_customize->add_setting( 'hero_texte', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_texte', array(
        'label'   => __( 'Couleur du texte (secondaire)', 'theme_31w' ),
        'section' => 'hero_section',
    ) ) );

    // ====== Section Footer ======
    $wp_customize->add_section( 'footer_section', array(
        'title'    => __( 'Section pied de page', 'theme_31w' ),
        'priority' => 30,
    ) );

    // Mission
    $wp_customize->add_setting( 'footer_mission', array(
        'default'           => __( 'Mission du club de voyage', 'theme_31w' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_mission', array(
        'label'   => __( 'Mission', 'theme_31w' ),
        'section' => 'footer_section',
        'type'    => 'text',
    ) );

    // Adresse
    $wp_customize->add_setting( 'footer_adresse', array(
        'default'           => __( 'Adresse', 'theme_31w' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_adresse', array(
        'label'   => __( 'Adresse', 'theme_31w' ),
        'section' => 'footer_section',
        'type'    => 'text',
    ) );

    // Téléphone
    $wp_customize->add_setting( 'footer_telephone', array(
        'default'           => __( 'Telephone', 'theme_31w' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'footer_telephone', array(
        'label'   => __( 'Telephone', 'theme_31w' ),
        'section' => 'footer_section',
        'type'    => 'text',
    ) );

    // Image de destination (Footer)
    $wp_customize->add_setting( 'footer_destination_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_destination_image', array(
        'label'    => __( 'Image de destination (Footer)', 'theme_31w' ),
        'section'  => 'footer_section',
        'settings' => 'footer_destination_image',
    ) ) );

    // ====== Icônes sociales ======
    $socials = array( 'facebook', 'linkedin', 'paypal', 'github' );
    foreach ( $socials as $social ) {
        // URL
        $wp_customize->add_setting( "social_{$social}_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "social_{$social}_url", array(
            'label'   => ucfirst( $social ) . ' URL',
            'section' => 'footer_section',
            'type'    => 'url',
        ) );

        // Icône (image)
        $wp_customize->add_setting( "social_{$social}_icon", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "social_{$social}_icon", array(
            'label'    => __( 'Icône pour ' . ucfirst( $social ), 'theme_31w' ),
            'section'  => 'footer_section',
            'settings' => "social_{$social}_icon",
        ) ) );
    }
}
add_action( 'customize_register', 'theme_31w_customize_register' );

/**
 * Fonction pour enregistrer les personnalisations de la page 404.
 *
 * @param WP_Customize_Manager $wp_customize L'objet du personnalisateur WordPress.
 */
function clubvoyage_customize_register( $wp_customize ) {

    // Section Page 404
    $wp_customize->add_section( 'section_404', array(
        'title'    => __( 'Page 404', 'clubvoyage' ),
        'priority' => 30,
    ) );

    // Image d’arrière-plan
    $wp_customize->add_setting( 'clubvoyage_404_bg_image', array(
        'default'           => get_template_directory_uri() . '/images/404_background.jpg',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'clubvoyage_404_bg_image', array(
        'label'    => __( 'Image d’arrière-plan pour la 404', 'clubvoyage' ),
        'section'  => 'section_404',
        'settings' => 'clubvoyage_404_bg_image',
    ) ) );

    // Couleur des boutons et zone de recherche
    $wp_customize->add_setting( 'clubvoyage_404_btn_color', array(
        'default'           => '#ffcc00',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'clubvoyage_404_btn_color', array(
        'label'    => __( 'Couleur des boutons et zone de recherche', 'clubvoyage' ),
        'section'  => 'section_404',
        'settings' => 'clubvoyage_404_btn_color',
    ) ) );

    // Titre de la 404
    $wp_customize->add_setting( 'clubvoyage_404_title', array(
        'default'           => __( 'Oops, vous êtes perdu !', 'clubvoyage' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'clubvoyage_404_title', array(
        'label'   => __( 'Titre de la page 404', 'clubvoyage' ),
        'section' => 'section_404',
        'type'    => 'text',
    ) );

    // Message de la 404
    $wp_customize->add_setting( 'clubvoyage_404_message', array(
        'default'           => __( 'La page que vous cherchez n’existe pas. Retournez à l’accueil ou utilisez la recherche pour trouver ce que vous cherchez.', 'clubvoyage' ),
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'clubvoyage_404_message', array(
        'label'   => __( 'Message de la page 404', 'clubvoyage' ),
        'section' => 'section_404',
        'type'    => 'textarea',
    ) );
}
add_action( 'customize_register', 'clubvoyage_customize_register' );

/**
 * Affiche les icônes sociales dans le footer.
 */
function afficher_icones_sociaux() {
    $socials = array( 'facebook', 'linkedin', 'paypal', 'github' );

    echo '<div class="icones-sociaux">';
    foreach ( $socials as $social ) {
        $url  = get_theme_mod( "social_{$social}_url" );
        $icon = get_theme_mod( "social_{$social}_icon" );

        if ( $url && $icon ) {
            printf(
                '<a href="%1$s" target="_blank" rel="noopener noreferrer"><img src="%2$s" alt="%3$s" width="24" height="24"></a>',
                esc_url( $url ),
                esc_url( $icon ),
                esc_attr( ucfirst( $social ) )
            );
        }
    }
    echo '</div>';
}
?>
