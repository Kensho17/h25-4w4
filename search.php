<?php 
/**
 *  search.php est le modèle pour afficher les résultats de recherche
 */
?>

<?php get_header() ?>
    <h1>search.php</h1>
    <section class="populaire">
        <div class="global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <h2 class="populaire__titre"><?php the_title(); ?></h2>
                    <div class="pouplaire__contenu"><?php echo wp_trim_words(get_the_excerpt(), 50, "..."); ?></div>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </section>
   <?php get_footer(); ?>
</body>
</html>