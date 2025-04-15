<?php 
    // Récupération des options du customizer
    $hero_auteur = get_theme_mod('hero_auteur', 'Default Title'); 
    $hero_background = get_theme_mod('hero_background', 'Default Title');
    $couleur = substr(get_theme_mod('hero_icone', '#fff'), 1);  // Supprime le '#' de la couleur hexadécimale
    $couleur_texte = get_theme_mod('hero_texte', '#fff');
?>

<style>
    .hero { 
        color: <?php echo esc_html($couleur_texte); ?>;
    }
</style>

<section class="hero" style="background-image: url('<?php echo esc_url($hero_background); ?>'); background-repeat: no-repeat;">
    
     <!--////////////////////////////////////////////////////////////////////////////////////hero__carrousel-->

    <div class= "hero__carrousel" style="background-image: url(<?php echo $hero_background[0]?>);"></div>
    <div class= "hero__carrousel" style="background-image: url(<?php echo $hero_background[1]?>);"></div>
    <div class= "hero__carrousel" style="background-image: url(<?php echo $hero_background[2]?>);"></div>
    <div class="hero_radio">
        <input class="hero_radio_input" type="radio" name="carrousel" data-id_carrousel="0" checked="checked">
        <input class="hero_radio_input" type="radio" name="carrousel" data-id_carrousel="1">
        <input class="hero_radio_input" type="radio" name="carrousel" data-id_carrousel="2">
    </div>
    <!--////////////////////////////////////////////////////////////////////////////////////hero__contenu-->

    <div class="hero__contenu global">
        <!-- Titre principal -->
        <h1 class="hero__titre hero__couleur">
            <?php bloginfo('name'); ?>
        </h1>

        <!-- Description -->
        <p class="hero__description hero__couleur">
            <?php bloginfo('description'); ?>
        </p>

        <!-- Adresse -->
        <p class="hero__addresse">
            3800, rue Sherbrooke, Montreal
        </p>

        <!-- Numéro de téléphone -->
        <p class="hero__numero">
            514-254-7131
        </p>

        <!-- Icônes sociales -->
        <div class="hero__icone-app">
            <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?php echo esc_attr($couleur); ?>" width="20" height="20" alt="Facebook">
            <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=<?php echo esc_attr($couleur); ?>" width="20" height="20" alt="LinkedIn">
            <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=<?php echo esc_attr($couleur); ?>" width="20" height="20" alt="PayPal">
            <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=<?php echo esc_attr($couleur); ?>" width="20" height="20" alt="Stack Overflow">
        </div>

        <!-- Bouton d'inscription -->
        <button class="hero__bouton">
            S'inscrire
        </button>

        <!-- Auteur -->
        <p class="hero__auteur">Auteur: Weiqiang Chen</p>
    </div>
</section>