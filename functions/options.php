<?php 


/**
 * Pour l'ajout d'options à note thème
 */
function mon_theme_supports() {

    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
      'height'        => 150,
      'width'         => 150,
      'flex-height'   => true,
      'flex-width'    => true,
  
    ));
  
  }
  add_action( 'after_setup_theme', 'mon_theme_supports' );
  
  
  function theme_tp_enqueue_styles() { 
  wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css'); 
  wp_enqueue_style('main-style', get_stylesheet_uri());
  
  wp_enqueue_script(
        'destination_restapi',
        get_template_directory_uri() . '/js/destination.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/destination.js'),
        true
    );
    wp_enqueue_script(
      'carrousel.js',
      get_template_directory_uri() . '/js/carrousel.js',
      array(),
      filemtime(get_template_directory() . 
      '/js/carrousel.js'),
      true
  );

  } 
  add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');
  
  /**
 * Enregistre les emplacements de menu.
 */
function theme_t_p_register_menus() {
    register_nav_menus( array(
        'principal' => __( 'Menu Principal', '4w4-weiqiang' ),
        '404_menu'  => __( 'Menu 404',       '4w4-weiqiang' ),
        'externe'   => __( 'Menu Partenaires','4w4-weiqiang' ),
    ) );
}
add_action( 'after_setup_theme', 'theme_t_p_register_menus' );
  
  /** 
  * Modifie la requete principale de WordPress avant qu'elle soit exécuté
   * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
   * Dépendant de la condition initiale on peut filtrer un type particulier de requête
   * Dans ce cas ci nous filtrons la requête de la page d'accueil
   * @param WP_query  $query la requête principal de WP
   */
  function modifie_requete_principal( $query ) {
  if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'category_name', 'populaire' );
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
    }
   }
   add_action('pre_get_posts', 'modifie_requete_principal');

   function seul_posts_dans_recherche( $query ) {
    if ( $query->is_search() && ! is_admin() && $query->is_main_query() ) {
        // Ne retourner que les articles (post_type = 'post')
        $query->set( 'post_type', array( 'post' ) );
    }
}
add_action( 'pre_get_posts', 'seul_posts_dans_recherche' );
   



?>
