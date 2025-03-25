<?php
// Récupération des options du customizer
$page404_background = get_theme_mod('404_background', 'Default Title');
get_header(); ?>

<main id="content" class="site-main">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Erreur 404 Page non trouvée!', 'votre-theme' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p><?php esc_html_e( 'Désolé, la page que vous recherchez n\'existe pas. Essayez de revenir à la page d\'accueil ou utilisez le menu ci-dessous.', 'votre-theme' ); ?></p>
            <?php
            // Affichage du menu spécifique à la page 404
            wp_nav_menu( array(
                'theme_location' => 'menu_404',
                'menu_id'        => 'menu-404',
            ) );
            ?>
            
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