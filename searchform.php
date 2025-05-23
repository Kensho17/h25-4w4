<?php
/**
* gabarit servant à la création d'un formulaire de recherche
*/
?>
<form class="recherche">
    <input class="recherche__input" type="search" placeholder="Rechercher..." value="<?php echo get_search_query(); ?>" name="s" />
    <button class="recherche__bouton" type="submit">
    <img class="recherche__img" src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000" width="20" height="20">
    </button>
</form>