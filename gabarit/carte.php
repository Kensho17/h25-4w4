<?php
/*
 * Gabarit permettant d'afficher une carte
 */
?>

<article class="carte carte--grande">
    <div class="carte__contenu">
        
        <?php
        // Vérifie si l'article a une image mise en avant (thumbnail)
        if (has_post_thumbnail()) :
            // Affiche l'image mise en avant de l'article avec la taille 'thumbnail'
            the_post_thumbnail('thumbnail');
        endif;
        ?>

        <!-- Titre de l'article -->
        <h2 class="carte__titre"><?php the_title(); ?></h2>
        
        <!-- Catégories associées à l'article -->
        <p class="carte__categorie"><?php the_category(', '); ?></p>
        
        <!-- Température minimum -->
        <p>Température minimum : <?php echo esc_html(the_field('temperature_minimum')); ?>&#8451;</p>
        
        <!-- Température maximum -->
        <p>Température maximum : <?php echo esc_html(the_field('temperature_maximum')); ?>&#8451;</p>
        
        <!-- Température moyenne -->
        <p>Température moyenne : <?php echo esc_html(the_field('temperature_moyenne')); ?>&#8451;</p>

        <!-- Extrait de l'article -->
        <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, "..."); ?></p>
        
        <!-- Lien vers l'article complet -->
        <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">Suite...</a>
        
    </div>
</article>