<?php
/**
 * category.php
 * Modèle pour afficher les archives de catégories,
 * avec filtre des catégories, hors la catégorie courante.
 */

get_header();

// 1) On récupère le slug de la catégorie en cours
$current_slug = get_query_var( 'category_name' );
?>

<section class="populaire">
    <div class="boiteflex global">

        <!-- Titre de la catégorie -->
        <h1 class="categorie__titre"><?php single_cat_title(); ?></h1>

        <!-- 2) Liste des catégories, dont on exclut la catégorie courante -->
        <?php
        if ( function_exists( 'categorie_par_destination' ) ) {
            categorie_par_destination( $current_slug );
        }
        ?>

        <!-- Description de la catégorie (si existante) -->
        <?php if ( category_description() ) : ?>
            <p class="categorie__description">
                <?php echo category_description(); ?>
            </p>
        <?php endif; ?>

        <!-- 3) La boucle habituelle -->
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'gabarit/carte' ); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'Aucun article trouvé dans cette catégorie.', '4w4-weiqiang' ); ?></p>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();
?>
