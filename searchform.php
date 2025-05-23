<?php
/**
 * Gabarit servant à la création d'un formulaire de recherche
 */
?>
<form class="recherche" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input
        class="recherche__input"
        type="search"
        placeholder="Rechercher..."
        value="<?php echo esc_attr(get_search_query()); ?>"
        name="s"
        aria-label="Champ de recherche"
    />
    <button class="recherche__bouton" type="submit" aria-label="Soumettre la recherche">
        <img
            class="recherche__img"
            src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000"
            width="20"
            height="20"
            alt="Icône de recherche"
        />
    </button>
</form>