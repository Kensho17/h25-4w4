<?php
/*
Template Name: Événement
*/
?>
<?php get_header(); ?>

<section class="populaire">
        <div class="global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <?php
                    if (has_post_thumbnail())
                     the_post_thumbnail(); ?>
                    <h2 class="populaire__titre"><?php the_title(); ?></h2>
                    <div class="pouplaire__contenu"><?php the_content(); ?></div>

                    <p>Le conférencier: <?php the_field('conferencier_evenement');?> </p>
                    <p>Le conférencier: <?php the_field('conferencier_description');?> </p>
                    <p>Le lieu: <?php the_field('conferencier_lieu');?> </p>
                    <p>La date: <?php the_field('conferencier_date');?> </p>


                </article>
            <?php endwhile; endif; ?>
        </div>
    </section>
<?php get_footer(); ?>