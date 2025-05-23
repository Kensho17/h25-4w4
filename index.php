<?php
/**
 * index.php
 * Modèle par défaut du thème — affiche la page d’accueil ou les archives.
 */

get_header();
?>

<div id="primary" class="content-area global">
  <main id="main" class="site-main">

    <?php if ( is_front_page() ) : ?>
      <!-- SECTION HERO -->
      <?php get_template_part( 'gabarit/hero' ); ?>

      <!-- SECTION FORMULAIRE -->
      <?php get_template_part( 'gabarit/formulaire' ); ?>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
      <!-- SECTION POPULAIRE -->
      <section class="populaire">
        <div class="boiteflex global">
          <?php while ( have_posts() ) : the_post(); ?>

            <?php if ( has_category( 'galerie' ) ) : ?>
              <div class="article-contenu">
                <?php the_content(); ?>
              </div>
            <?php else : ?>
              <?php get_template_part( 'gabarit/carte' ); ?>
            <?php endif; ?>

          <?php endwhile; ?>
        </div>
      </section>
    <?php endif; ?>

    <?php if ( is_front_page() ) : ?>
      <!-- SECTION DESTINATION (REST API) -->
      <?php categories_liste( 'destination' ); ?>
      <section class="destination">
        <h2 class="destination__titre">Articles de la catégorie</h2>
        <div class="destination__list"></div>
      </section>
    <?php endif; ?>

  </main>
</div>

<?php
get_footer();
?>
