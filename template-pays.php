<?php
/**
 * Template Name: Pays
 * Affiche la page “Les plus beaux pays” avec galerie et REST-API.
 */
get_header();

// Couleurs de vagues du Customizer
$couleur_haut = get_theme_mod( 'pays_vague_haut_color', '#A0D8EF' );
$couleur_bas  = get_theme_mod( 'pays_vague_bas_color',  '#B3ECB3' );
?>

<section class="pays-intro global">
  <h1 class="pays__titre">
    <?php esc_html_e( 'Les plus beaux pays', '4w4-weiqiang' ); ?>
  </h1>
  <p class="pays__intro">
    <?php esc_html_e(
      'Plongez au cœur de l’aventure et laissez-vous emporter par l’appel du large ! Notre planète regorge de destinations incroyables, chacune promettant une expérience unique et mémorable. Que vous rêviez de plages idylliques baignées de soleil, de sommets majestueux invitant à la randonnée, de villes vibrantes d’histoire et de modernité, ou de rencontres culturelles authentiques, il y a un pays fait pour vous.',
      '4w4-weiqiang'
    ); ?>
  </p>

  <div class="pays__gallery">
    <img src="<?php echo esc_url( get_template_directory_uri() . "/images/Australie.jpg" ); ?>" alt="">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/canada.jpg' ); ?>" alt="">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/chine.jpg' ); ?>" alt="">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/espagne.jpg' ); ?>" alt="">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/japon.jpg' ); ?>" alt="">
  </div>
</section>

<?php
// Vague séparatrice
if ( function_exists( 'creer_vague' ) ) {
    creer_vague( $couleur_haut, $couleur_bas, false );
}
?>

<section class="pays-rest global">
  <!-- Ici on place le conteneur vide avec l’ID attendu par le JS -->
  <div id="menu-pays" class="pays__nav"></div>

  <div class="destination">
    <h2 class="destination__titre">
      <?php esc_html_e( 'Destinations sélectionnées', '4w4-weiqiang' ); ?>
    </h2>
    <div class="destination__list"></div>
  </div>
</section>

<?php

get_footer();
