<?php
/**
 * Template Name: Pays
 * Affiche la page “Les plus beaux pays” avec galerie et REST-API.
 */
get_header();

// Couleurs de vagues du Customizer
$couleur_haut = get_theme_mod( 'pays_vague_haut_color', '#A0D8EF' );
$couleur_bas  = get_theme_mod( 'pays_vague_bas_color',  '#B3ECB3' );

// Liste des pays pour le menu JavaScript
$pays = array(
  'France','États-Unis','Canada','Argentine','Chili',
  'Belgique','Maroc','Mexique','Japon','Italie',
  'Islande','Chine','Grèce','Suisse'
);
?>

<section class="pays-intro global">
  <h1 class="pays__titre"><?php esc_html_e( 'Les plus beaux pays', '4w4-weiqiang' ); ?></h1>
  <p class="pays__intro">
    <?php esc_html_e(
      'Plongez au cœur de l’aventure et laissez-vous emporter par l’appel du large ! Notre planète regorge de destinations incroyables, chacune promettant une expérience unique et mémorable. Que vous rêviez de plages idylliques baignées de soleil, de sommets majestueux invitant à la randonnée, de villes vibrantes d’histoire et de modernité, ou de rencontres culturelles authentiques, il y a un pays fait pour vous.',
      '4w4-weiqiang'
    ); ?>
  </p>

  <div class="pays__gallery">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/pays1.jpg' ); ?>" alt="">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/pays2.jpg' ); ?>" alt="">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/pays3.jpg' ); ?>" alt="">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/pays4.jpg' ); ?>" alt="">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/images/pays5.jpg' ); ?>" alt="">
</div>
</section>

<?php
// 1ère vague (non inversée) entre intro/galerie et REST-API
if ( function_exists( 'creer_vague' ) ) {
    creer_vague( $couleur_haut, $couleur_bas, false );
}
?>

<section class="pays-rest global">
  <div class="pays__nav">
    <?php foreach ( $pays as $nom_pays ) : ?>
      <button
        class="pays__button"
        data-type="search"
        data-query="<?php echo esc_attr( $nom_pays ); ?>">
        <?php echo esc_html( $nom_pays ); ?>
      </button>
    <?php endforeach; ?>
  </div>

  <div class="destination">
    <h2 class="destination__titre"><?php esc_html_e( 'Destinations sélectionnées', '4w4-weiqiang' ); ?></h2>
    <div class="destination__list"></div>
  </div>
</section>

<?php get_footer(); ?>
