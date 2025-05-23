<?php
/**
 * search.php est le modèle pour afficher les résultats de recherche
 */
get_header(); ?>

<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php printf('Résultats de recherche pour : "%s"', get_search_query()); ?>
                </h1>
                <p><?php printf( '%d résultat(s) trouvé(s)', $wp_query->found_posts ); ?></p>
            </header>
            <?php while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <h2 class="populaire__titre"><?php the_title(); ?></h2>
                    <div class="populaire__contenu">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>Aucun résultat trouvé pour votre recherche.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>