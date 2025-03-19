<?php
/**
 * Modèle front-page.php permettant d'afficher la page d'accueil
 */
?>

<?php get_header(); ?>
<?php get_template_part('gabarit/hero'); ?>
<?php get_template_part('gabarit/formulaire'); ?>

<section class="populaire">
    <div class="boiteflex global">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (has_category('galerie')) : ?>
                    <div class="article-contenu">
                        <?php the_content(); ?>
                    </div>
                <?php else : ?>
                    <?php get_template_part('gabarit/carte'); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>