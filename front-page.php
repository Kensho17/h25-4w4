<?php
/**
 * front-page.php
 * Modèle pour afficher la page d'accueil
 */
?>

<?php get_header(); ?>

<!-- SECTION HERO -->
<?php get_template_part( 'gabarit/hero' ); ?>

<!-- SECTION FORMULAIRE -->
<?php get_template_part( 'gabarit/formulaire' ); ?>

<!-- SECTION POPULAIRE -->
<section class="populaire">
    <div class="boiteflex global">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if ( has_category( 'galerie' ) ) : ?>
                    <div class="article-contenu">
                        <?php the_content(); ?>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 'gabarit/carte' ); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<!-- SECTION DESTINATION (REST API) -->
<?php categories_liste( 'destination' ); ?>

<section class="destination">
    <h2 class="destination__titre">Articles de la catégorie</h2>
    <div class="destination__list"></div>
</section>

<?php get_footer(); ?>
