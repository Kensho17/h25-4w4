<?php
/**
 * Fonction pour enregistrer les personnalisations du thème.
 *
 * @param WP_Customize_Manager $wp_customize L'objet du personnalisateur WordPress.
 */
function theme_30w_customize_register($wp_customize) {

    // ====== Section Hero ======
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'theme_30w'),
        'priority' => 30,
    ));

    // Titre principal
    $wp_customize->add_setting('hero_auteur', array(
        'default'           => __('Weiqiang Chen', 'theme_30w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_auteur', array(
        'label'   => __('Auteur', 'theme_30w'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Courriel
    $wp_customize->add_setting('hero_courriel', array(
        'default'           => __('Weiqiang Chen', 'theme_30w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_courriel', array(
        'label'   => __('Courriel', 'theme_30w'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Image d’arrière-plan
    $wp_customize->add_setting('hero_background', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label'   => __('Image en background', 'theme_30w'),
        'section' => 'hero_section',
    )));

    // ====== Section Footer ======
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Section pied de page', 'theme_30w'),
        'priority' => 30,
    ));

    // Mission
    $wp_customize->add_setting('footer_mission', array(
        'default'           => __('Mission du club de voyage', 'theme_30w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_mission', array(
        'label'   => __('Mission', 'theme_30w'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Adresse
    $wp_customize->add_setting('footer_adresse', array(
        'default'           => __('Adresse', 'theme_30w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_adresse', array(
        'label'   => __('Adresse', 'theme_30w'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Téléphone
    $wp_customize->add_setting('footer_telephone', array(
        'default'           => __('Telephone', 'theme_30w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_telephone', array(
        'label'   => __('Telephone', 'theme_30w'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // ====== Section Hero: Couleur du texte ======
    $wp_customize->add_setting('hero_icone', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_icone', array(
        'label'   => __('Couleur du texte', 'theme_30w'),
        'section' => 'hero_section',
    )));

    // ====== Section Hero: Couleur du texte (secondaire) ======
    $wp_customize->add_setting('hero_texte', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_texte', array(
        'label'   => __('Couleur du texte', 'theme_30w'),
        'section' => 'hero_section',
    )));

     // ====== Page 404 ======
     $wp_customize->add_setting('page404_background', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'page404_background', array(
        'label'   => __('Image en background', 'theme_30w'),
        'section' => 'error-404 not-found',
    )));

}

add_action('customize_register', 'theme_30w_customize_register');
?>