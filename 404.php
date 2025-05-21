<?php
get_header();

// Récupération des réglages du Customizer pour la page 404
$bg_image    = get_theme_mod( 'clubvoyage_404_bg_image', get_template_directory_uri() . '/images/404_background.jpg' );
$btn_color   = get_theme_mod( 'clubvoyage_404_btn_color', '#ffcc00' );
$title_404   = get_theme_mod( 'clubvoyage_404_title', __( 'Oops, vous êtes perdu !', 'clubvoyage' ) );
$message_404 = get_theme_mod( 'clubvoyage_404_message', __( "La page que vous cherchez n’existe pas. Retournez à l’accueil ou utilisez la recherche pour trouver ce que vous cherchez.", 'clubvoyage' ) );
?>

<style>
  :root {
    --bg-404-image: url('<?php echo esc_url( $bg_image ); ?>');
    --btn-404-color: <?php echo esc_html( $btn_color ); ?>;
  }
  .page-404 {
    background-image: var(--bg-404-image);
    background-repeat: no-repeat;
    background-size: cover;
    color: #fff;
    text-align: center;
    padding: 10vh 5vw;
    min-height: 80vh;
  }
  .btn-404 {
    display: inline-block;
    margin: 2rem 0;
    padding: 0.75rem 1.5rem;
    background-color: var(--btn-404-color);
    color: #000;
    text-decoration: none;
    border-radius: 4px;
    transition: opacity 0.3s ease;
  }
  .btn-404:hover {
    opacity: 0.8;
  }
  .menu-404-list {
    list-style: none;
    padding: 0;
    margin: 2rem 0;
    display: flex;
    justify-content: center;
    gap: 1.5rem;
  }
  .search-404 {
    margin-top: 2rem;
  }
</style>

<div class="page-404">
  <h1 class="erreur__titre"><?php echo esc_html( $title_404 ); ?></h1>
  <p class="erreur__message"><?php echo nl2br( esc_html( $message_404 ) ); ?></p>

  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-404">
    <?php _e( 'Retour à l’accueil', 'clubvoyage' ); ?>
  </a>

  <nav class="menu-404" aria-label="<?php esc_attr_e( 'Menu 404', 'clubvoyage' ); ?>">
    <?php
    wp_nav_menu( array(
      'theme_location' => '404_menu',
      'menu_class'     => 'menu-404-list',
      'container'      => false,
    ) );
    ?>
  </nav>

  <div class="search-404">
    <?php get_search_form(); ?>
  </div>
</div>

<?php
get_footer();
