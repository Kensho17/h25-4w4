<?php
function theme_31w_customize_register($wp_customize) {
    // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
  $wp_customize->add_section('hero_section', array(
    'title' => __('Hero Section', 'theme_31w'),
    'priority' => 30,
  ));
  /**Titre principal */
  $wp_customize->add_setting('hero_auteur', array(
    'default' => __('Weiqiang Chen', 'theme_31w'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  
  $wp_customize->add_control('hero_auteur', array(
    'label' => __('Auteur', 'theme_31w'),
    'section' => 'hero_section',
    'type' => 'text',
  ));
    /**Courriel */
    $wp_customize->add_setting('hero_courriel', array(
        'default' => __('Weiqiang Chen', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field'
      ));
      
      $wp_customize->add_control('hero_courriel', array(
        'label' => __('Courriel', 'theme_31w'),
        'section' => 'hero_section',
        'type' => 'text',
      ));
      
  
  /**Image d’arrière-plan */
for ($k=0; $k <3; $k++)
{
  $wp_customize->add_setting('hero_background_' . $k, array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_' . $k, array(
    'label' => __('Image en background' . ($k+1), 'theme_31w'),
    'section' => 'hero_section',
  )));
}
  /**Nouvelle section footer */
  $wp_customize->add_section('footer_section', array(
    'title' => __('Section pied de page', 'theme_31w'),
    'priority' => 30,
  ));
  /**Champ mission */
  $wp_customize->add_setting('footer_mission', array(
    'default' => __('Mission du club de voyage', 'theme_31w'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  
  $wp_customize->add_control('footer_mission', array(
    'label' => __('Mission', 'theme_31w'),
    'section' => 'footer_section',
    'type' => 'text',
  ));
   /**Champ adresse */
   $wp_customize->add_setting('footer_adresse', array(
    'default' => __('Adresse', 'theme_31w'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  
  $wp_customize->add_control('footer_adresse', array(
    'label' => __('Adresse', 'theme_31w'),
    'section' => 'footer_section',
    'type' => 'text',
  ));
    /**Champ telephone */
    $wp_customize->add_setting('footer_telephone', array(
        'default' => __('Telephone', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field'
      ));
      
      $wp_customize->add_control('footer_telephone', array(
        'label' => __('Telephone', 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'text',
      ));

   // Image de destination dans le footer
  $wp_customize->add_setting('footer_destination_image', array(
    'default'           => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_destination_image', array(
    'label'    => __('Image de destination (Footer)', 'theme_4w4'),
    'section'  => 'footer_social_section',
    'settings' => 'footer_destination_image',
  )));

      

  /**Couleur du texte de la zone hero */
  $wp_customize->add_setting('hero_icone', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_icone', array(
    'label' => __('Couleur du texte', 'theme_31w'),
    'section' => 'hero_section',
  )));
  /**Couleur du texte  */
  $wp_customize->add_setting('hero_texte', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_texte', array(
    'label' => __('Couleur du texte', 'theme_31w'),
    'section' => 'hero_section',
  )));

$wp_customize->add_section('section_404', array(
  'title' => __('Erreur Section', 'theme_31w'),
  'priority' => 30,
));
/**Titre principal */
$wp_customize->add_setting('erreur_titre', array(
  'default' => __('OOPS, vous avez échoué sur l\'île 404! ', 'theme_31w'),
  'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('erreur_titre', array(
  'label' => __('Auteur', 'theme_31w'),
  'section' => 'section_404',
  'type' => 'text',
));

/**Titre principal */
$wp_customize->add_setting('erreur_message', array(
  'default' => __('message ', 'theme_31w'),
  'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('erreur_message', array(
  'label' => __('Message d\'erreur', 'theme_31w'),
  'section' => 'section_404',
  'type' => 'text',
));
 
/**Image d’arrière-plan */

$wp_customize->add_setting('erreur_background', array(
  'default' => '',
  'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'erreur_background', array(
  'label' => __('Image en background', 'theme_31w'),
  'section' => 'section_404',
)));


  /**Couleur du texte  */
  $wp_customize->add_setting('erreur_texte', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'erreur_texte', array(
    'label' => __('Couleur du texte', 'theme_31w'),
    'section' => 'section_404',
  )));


  }
  
  
  add_action('customize_register', 'theme_31w_customize_register');
  
// Enregistrer les options personnalisées dans le Customizer
function mon_theme_customizer_register($wp_customize) {

    //  Image de destination dans le footer
    $wp_customize->add_setting('footer_destination_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_destination_image', array(
        'label' => 'Image de destination (footer)',
        'section' => 'title_tagline',
        'settings' => 'footer_destination_image',
    )));

    //  Icônes sociales : URL + image
    $socials = ['facebook', 'linkedin', 'paypal', 'github'];

    foreach ($socials as $social) {
        // URL du réseau social
        $wp_customize->add_setting("social_{$social}_url", [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ]);
        $wp_customize->add_control("social_{$social}_url", [
            'label' => ucfirst($social) . ' URL',
            'section' => 'title_tagline',
            'type' => 'url',
        ]);

        // Icône du réseau social (image)
        $wp_customize->add_setting("social_{$social}_icon", [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "social_{$social}_icon", [
            'label' => "Icône pour " . ucfirst($social),
            'section' => 'title_tagline',
            'settings' => "social_{$social}_icon",
        ]));
    }
}
add_action('customize_register', 'mon_theme_customizer_register');


//Affichage des icônes sociales dans le footer
function afficher_icones_sociaux() {
    $socials = ['facebook', 'linkedin', 'paypal', 'github'];

    echo '<div class="icones-sociaux">';
    foreach ($socials as $social) {
        $url = get_theme_mod("social_{$social}_url");
        $icon = get_theme_mod("social_{$social}_icon");

        if ($url && $icon) {
            echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer">';
            echo '<img src="' . esc_url($icon) . '" alt="' . esc_attr($social) . '" width="24" height="24">';
            echo '</a>';
        }
    }
    echo '</div>';
}


?>
