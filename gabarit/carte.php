<?php
/*
 * Gabarit permettant d'afficher une carte
 */
?>

<article class="carte carte--grande">
    <div class="carte__contenu">

        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'thumbnail', array(
                'alt' => esc_attr( get_the_title() )
            ) ); ?>
        <?php endif; ?>

        <h2 class="carte__titre"><?php the_title(); ?></h2>

        <?php
        // Récupération et filtrage des catégories (exclut “populaire”)
        $categories = get_the_category();
        $filtered = array_filter( $categories, function( $cat ) {
            return strtolower( $cat->name ) !== 'populaire';
        } );
        if ( ! empty( $filtered ) ) : ?>
            <div class="carte__categorie">
                <?php foreach ( $filtered as $cat ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php
        // Champs ACF
        $temp_min = get_field( 'temperature_minimum' );
        $temp_max = get_field( 'temperature_maximum' );
        $temp_moy = get_field( 'temperature_moyenne' );
        if ( $temp_min ) : ?>
            <p>Température minimum : <?php echo esc_html( $temp_min ); ?>&deg;C</p>
        <?php endif; ?>
        <?php if ( $temp_max ) : ?>
            <p>Température maximum : <?php echo esc_html( $temp_max ); ?>&deg;C</p>
        <?php endif; ?>
        <?php if ( $temp_moy ) : ?>
            <p>Température moyenne : <?php echo esc_html( $temp_moy ); ?>&deg;C</p>
        <?php endif; ?>

        <p class="carte__description">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '…' ) ); ?>
        </p>

        <a
            class="carte__bouton carte__bouton--actif"
            href="<?php echo esc_url( get_permalink() ); ?>"
        >
            Suite…
        </a>

    </div>
</article>
