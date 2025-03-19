<?php
/**
 * Modèle index.php est le modèle par défaut.
 * Si aucun modèle ne peut satisfaire la requête HTTP, c'est index.php qui affichera le contenu de la page.
 */
?>

<?php get_header(); ?>

<!-- Section Hero -->
<section class="hero">
    <div class="hero__contenu global">
        <h1 class="hero__titre">Club de voyage</h1>
        <p class="hero__description">
            Découvrez des destinations uniques et inoubliables avec Mondo Voyages. Nous vous offrons des expériences authentiques, des paysages à couper le souffle et des aventures sur mesure. Partez à la découverte du monde avec nous et créez des souvenirs impérissables.
        </p>
        <p class="hero__courriel">info@cmaisonneuve.qc.ca</p>
        <p class="hero__addresse">3800, rue Sherbrooke, Montreal</p>
        <p class="hero__numero">514-254-7131</p>
        <button class="hero__bouton">S'inscrire</button>
        <div class="hero__icone-app">
            <a href="https://facebook.com" target="_blank"><img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20" alt="Facebook"></a>
            <a href="https://linkedin.com" target="_blank"><img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20" alt="LinkedIn"></a>
            <a href="https://paypal.com" target="_blank"><img src="https://s2.svgbox.net/social.svg?ic=paypal&color=000000" width="20" height="20" alt="PayPal"></a>
            <a href="https://stackoverflow.com" target="_blank"><img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=000000" width="20" height="20" alt="Stack Overflow"></a>
        </div>
    </div>
</section>

<!-- Section Formulaire -->
<section class="form__formulaire">
    <div class="formulaire">
        <form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <div class="form__reponse">
                <label for="nom">Nom:</label><br>
                <input type="text" class="formulaire__input" name="nom" placeholder="Écrivez votre nom" required><br>
            </div>
            <div class="form__reponse">
                <label for="prenom">Prénom:</label><br>
                <input type="text" class="formulaire__input" name="prenom" placeholder="Écrivez votre prénom" required><br>
            </div>
            <div class="form__reponse">
                <label for="courriel">Courriel:</label><br>
                <input type="email" class="formulaire__input" name="courriel" placeholder="Écrivez votre courriel" required><br>
            </div>
            <div class="form__reponse">
                <label for="telephone">Téléphone:</label><br>
                <input type="tel" class="formulaire__input" name="telephone" placeholder="Écrivez votre téléphone" required><br>
            </div>
            <button type="submit" class="formulaire__button">S'inscrire</button>
        </form>
    </div>
</section>

<!-- Section Galerie -->
<section class="galerie">
    <h2>Nos destinations favorites</h2>
    <div class="galerie__destinations">
        <?php
        $destinations = array('Australie', 'Canada', 'Chine', 'Espagne', 'Japon', 'Scotland', 'Tanzania', 'UK', 'USA', 'Vietnam');
        foreach ($destinations as $destination) :
        ?>
            <figure class="galerie__fig">
                <img src="<?php echo get_template_directory_uri() . '/images/' . strtolower($destination) . '.jpg'; ?>" class="galerie__img" alt="Destination: <?php echo $destination; ?>">
            </figure>
        <?php endforeach; ?>
    </div>   
</section>

<!-- Section Populaire -->
<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="populaire__article">
                <?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
                <h2 class="populaire__titre"><?php the_title(); ?></h2>
                <div class="populaire__contenu"><?php the_content(); ?></div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>

</body>
</html>