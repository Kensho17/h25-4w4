<?php
/**
 * Affiche les sous‐catégories d'une catégorie parente (slug).
 *
 * @param string $parent_slug Le slug de la catégorie parente.
 */
function categories_liste( $parent_slug ) {
    $parent = get_category_by_slug( $parent_slug );
    if ( ! $parent ) {
        return;
    }
    $subs = get_categories( array(
        'parent'     => $parent->term_id,
        'hide_empty' => true,
        'orderby'    => 'name',
        'order'      => 'ASC',
    ) );
    if ( empty( $subs ) ) {
        return;
    }
    echo '<ul class="categorie__ul">';
    foreach ( $subs as $cat ) {
        printf(
            '<li data-id="%1$d" class="categorie__ul__li">%2$s</li>',
            esc_attr( $cat->term_id ),
            esc_html( $cat->name )
        );
    }
    echo '</ul>';
}


/**
 * Génère une liste de catégories (boutons) en excluant une ou plusieurs catégories.
 *
 * @param string|array $slugs_to_exclude Un slug ou un tableau de slugs à exclure.
 */
function categorie_par_destination( $slugs_to_exclude ) {
    if ( ! is_array( $slugs_to_exclude ) ) {
        $slugs_to_exclude = array( $slugs_to_exclude );
    }
    $exclude_ids = array();
    foreach ( $slugs_to_exclude as $slug ) {
        $cat = get_category_by_slug( $slug );
        if ( $cat ) {
            $exclude_ids[] = $cat->term_id;
        }
    }

    $cats = get_categories( array(
        'hide_empty' => true,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'exclude'    => $exclude_ids,
    ) );

    if ( empty( $cats ) ) {
        return;
    }

    echo '<ul class="categorie__ul">';
    foreach ( $cats as $c ) {
        printf(
            '<li data-id="%1$d" class="categorie__ul__li">%2$s</li>',
            esc_attr( $c->term_id ),
            esc_html( $c->name )
        );
    }
    echo '</ul>';
}
