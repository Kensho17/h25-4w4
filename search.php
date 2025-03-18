<?php 
/**
 *  search.php est le modèle pour afficher les résultats de recherche
 */
?>

<?php get_header(); ?>

<h1>Résultats de recherche pour : <?php echo get_search_query(); ?></h1>

<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <h2 class="populaire__titre">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="populaire__contenu">
                        <?php echo wp_trim_words(get_the_excerpt(), 50, "..."); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>Aucun résultat trouvé. Essayez une autre recherche.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>