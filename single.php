<?php
get_header();
?>

<section class="populaire">
    <div class="global">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'large' );
                    }
                    ?>
                    <h2 class="populaire__titre"><?php the_title(); ?></h2>
                    <div class="populaire__contenu">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
