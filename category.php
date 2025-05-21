<?php 
/**
 * index.php est le modèle par défaut.
 * Si aucun modèle ne peut satisfaire la requête HTTP,
 * c'est index.php qui affichera le contenu de la page.
 */
?>

<?php get_header(); ?>

<section class="populaire">
    <div class="boiteflex global">
        <h1 class="categorie__titre"><?php single_cat_title(); ?></h1>
        <p class="categorie__description"><?php echo category_description(); ?></p>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'gabarit/carte' ); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
