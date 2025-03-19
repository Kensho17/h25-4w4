<?php 
/**
 *  index.php est le modèle par défaut
 *  si aucun modèle peut satisfaire la requête http dans ce cas c'est index.php qui affichera le contenu de la page 
 * 
 */
?>

<?php get_header() ?>
    <section class="hero">
        <div class="hero__contenu global">
            <h1 class="hero__titre">
                Club de voyage
            </h1>
            <p class="hero__description">
                Découvrez des destinations uniques et inoubliables avec Mondo Voyages. Nous vous offrons des authentique, des paysages à couper le souffle et des aventures sur mesure. Partez à la découverte du monde avec nous et créez des souvenirs impérissables.
            </p>
            <p class="hero__courriel">
                info@cmaisonneuve.qc.ca
            </p>
            <p class="hero__addresse">
                3800, rue Sherbrooke, Montreal
            </p>
            <p class="hero__numero">
                514-254-7131
            </p>
            <button class="hero__bouton">
                s'inscrire
            </button>
            <div class="hero__icone-app">
                <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=000000" width="20" height="20">
            </div>
        </div>
    </section>
    
    <section class="form__formulaire">
        <div class="formulaire">
            <form>
                <div class="form__reponse">
                    <label for="nom">Nom:</label><br>
                    <input type="text" class="formulaire__input" name="nom" placeholder="Écrivez votre nom"><br>
                </div>
                <div class="form__reponse">
                    <label for="prenom">Prénom:</label><br>
                    <input type="text" class="formulaire__input" name="prenom"placeholder="Écrivez votre prénom"><br>
                </div>
                <div class="form__reponse">
                    <label for="courriel">Courriel:</label><br>
                    <input type="text" class="formulaire__input" name="courriel" placeholder="Écrivez votre courriel"><br>
                </div>
                <div class="form__reponse">
                    <label for="telephone">Téléphone:</label><br>
                    <input type="text" class="formulaire__input" name="telephone"placeholder="Écrivez votre téléphone" ><br>
                </div>
                    <button class="formulaire__button">S'inscrire</button>                
            </form>
        </div>
    </section>
    <section class="galerie">
        <h2>Nos destinations favorites</h2>
        <div class="galerie__destinations">
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/Australie.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/canada.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/chine.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/espagne.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/japon.jpg' ?>"class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/scotland.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/tanzania.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/uk.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/usa.jpg' ?>" class="galerie__img">
            </figure>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/vietnam.jpg' ?>"class="galerie__img">
            </figure>
        </div>   
    </section>
    <section class="populaire">
        <div class="global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <?php
                    if (has_post_thumbnail())
                     the_post_thumbnail(); ?>
                    <h2 class="populaire__titre"><?php the_title(); ?></h2>
                    <div class="pouplaire__contenu"><?php the_content(); ?></div>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </section>
   <?php get_footer(); ?>
</body>
</html>