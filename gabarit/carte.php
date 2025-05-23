<?php 
/*
gabarit permettant d'afficher une carte
*/

?>
<article class="carte carte--grande">
                    
                    <div class="carte__contenu">
                        <?php
                        if(has_post_thumbnail()){
                            //Permet d'affichr la petite image associé à l'article (image mise en avant)
                            the_post_thumbnail('thumbnail'); }
                        ?>
                    <h2 class="carte__titre"><?php the_title(); ?> </h2>
                    <?php 
                        $categories = get_the_category();
                        $filtered_categories = array_filter($categories, function($cat) {
                            return strtolower($cat->name) !== 'populaire';
                        });
                        // Si des catégories filtrées restent, on les affiche
                        if (!empty($filtered_categories)) {
                            echo '<div class="carte__categorie">';
                            foreach ($filtered_categories as $cat) {
                                // Affiche chaque catégorie comme lien
                                echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
                            }
                            echo '</div>';
                        }
                        ?>
                    
                    <!-- Affiche la température minimale via un champ personnalisé (ACF) -->
                    <p>Température minimum <?php  echo the_field('temperature_minimum'); ?>&#8451; </p>
                    <!-- Affiche la température maximale via un champ personnalisé (ACF) -->
                    <p>Température maximum <?php echo the_field('temperature_maximum'); ?>&#8451; </p>
                    <!-- Affiche un extrait de l'article, limité à 20 mots -->
                    <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, "..."); ?></p>
                     <!-- Lien vers l'article complet -->
                    <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink() ?>">Suite...</a>
                    
                </div>
</article>