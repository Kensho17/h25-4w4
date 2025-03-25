<?php
/**
 * Template pour la page 404
 */
get_header(); ?>

<main id="content" class="site-main">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Page non trouvée', 'votre-theme' ); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e( 'Désolé, la page que vous recherchez n\'existe pas. Essayez de revenir à la page d\'accueil ou utilisez le menu ci-dessus.', 'votre-theme' ); ?></p>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu_404',
                'menu_id'        => 'menu-404',
            ) );
            ?>
        </div>
    </section>
</main>

<?php
get_footer();