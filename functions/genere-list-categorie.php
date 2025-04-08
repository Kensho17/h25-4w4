<?php
/**
 * Génère une liste de sous-catégories.
 *
 * @param string $parent_slug Le slug de la catégorie parente.
 */
function categories_liste($parent_slug) {
    // Récupérer la catégorie parente à partir de son slug.
    $parent_category = get_category_by_slug($parent_slug);
    
    // Vérifier si la catégorie parente existe.
    if ($parent_category) {
        $parent_id = $parent_category->term_id;
        // Récupérer les sous-catégories du parent.
        $sous_categories = get_categories(array(
            'parent'     => $parent_id,
            'hide_empty' => true,
        ));
        
        // Si on a des sous-catégories, générer la liste.
        if (!empty($sous_categories)) {
            echo '<ul class="categorie__ul">';
            foreach ($sous_categories as $categorie) {
                // Afficher le nom de chaque sous-catégorie avec l'attribut data-id.
                echo '<li data-id="' . esc_attr($categorie->term_id) . '" class="categorie__ul__li">'
                    . esc_html($categorie->name) .
                    '</li>';
            }
            echo '</ul>';
        }
    }
}
?>