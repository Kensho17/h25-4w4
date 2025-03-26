<?php
$error_background = get_theme_mod('error_404_background', '');
get_header(); ?>

<main id="content" class="site-main">
    <section class="error-404 not-found" style="background-image: url('<?php echo esc_url($error_background); ?>');">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Erreur 404 - Page non trouvée!', 'votre-theme' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e( 'Désolé, la page que vous recherchez n\'existe pas. Essayez de revenir à la page d\'accueil en cliquant sur le bouton ci-dessous.', 'votre-theme' ); ?></p>
            
            <!-- Bouton Menu spécifique pour la page 404 -->
            <div class="menu-404-button">
                <button type="button" onclick="window.location.href='<?php echo esc_url( home_url('/') ); ?>';">
                    Retour à l'accueil
                </button>
            </div>
            
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20" alt="Facebook">
                </a>
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://s2.svgbox.net/social.svg?ic=twitter&color=000000" width="20" height="20" alt="Twitter">
                </a>
                <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer">
                    <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20" alt="LinkedIn">
                </a>
            </div>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->
</main><!-- #content -->

<?php get_footer(); ?>