<?php 
    $hero_auteur = get_theme_mod('hero_auteur', 'Default Title'); 
    $hero_courriel = get_theme_mod('hero_courriel','Default Title');
    $hero_background = get_theme_mod('hero_background', 'Default Title');
    $couleur = substr(get_theme_mod('hero_icone', '#fff'),1);
    $couleur_texte = get_theme_mod('hero_texte', '#fff');
?>
<style>.hero{ 
    color: <?php echo $couleur_texte ?> ;
}
</style>
    <section class="hero" style="background-image: url('<?php echo $hero_background ?>'); Background-repeat: no-repeat" <?php echo $couleur_texte ?>>
        <div class="hero__contenu global">
            <h1 class="hero__titre hero__couleur">
                <?php echo bloginfo('name') ?>
            </h1>
            <p class="hero__description hero__couleur">
                <?php echo bloginfo('description') ?>
            </p>
            <p class="hero__courriel" ><?php echo $hero_courriel ?>
            </p>
            <p class="hero__addresse">
                3800, rue Sherbrooke, Montreal
            </p>
            <p class="hero__numero">
                514-254-7131
            </p>
            <div class="hero__icone-app">
                <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?php echo $couleur ?>" width="20" height="20" >
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=<?php echo $couleur ?>" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=<?php echo $couleur ?>" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=<?php echo $couleur?>" width="20" height="20">
            </div>
            
            <button class="hero__bouton">
                s'inscrire
            </button>
            <p class="hero__auteur"> Auteur: <?php echo $hero_auteur ?> </p>
        </div>
    </section>