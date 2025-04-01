<?php
get_header();

// Récupération des réglages du Customizer pour la page 404
$bg_image    = get_theme_mod('clubvoyage_404_bg_image', get_template_directory_uri() . '/images/404_background.jpg');
$btn_color   = get_theme_mod('clubvoyage_404_btn_color', '#ffcc00');
$title_404   = get_theme_mod('clubvoyage_404_title', __('Oops, ...', 'clubvoyage'));
$message_404 = get_theme_mod('clubvoyage_404_message', __('...', 'clubvoyage'));
?>

<style>
  :root {
    --btn-color: <?php echo esc_html($btn_color); ?>;
    --bg-image: url('<?php echo esc_url($bg_image); ?>');
  }
</style>

<div class="page-404">
    <!-- Titre et message personnalisés -->
    <h1><?php echo esc_html($title_404); ?></h1>
    <p><?php echo nl2br(esc_html($message_404)); ?></p>
    
    <!-- Bouton de retour à l'accueil -->
    <a class="btn-404" href="<?php echo esc_url(home_url('/')); ?>">
        <?php _e('Retour à l’accueil', 'clubvoyage'); ?>
    </a>
    
    <!-- Menu 404 (destinations) -->
    <nav class="menu-404" aria-label="404 Menu">
        <?php
        wp_nav_menu(array(
            'theme_location' => '404_menu',
            'menu_class'     => 'menu-404-list',
            'container'      => false,
        ));
        ?>
    </nav>
    
    <!-- Barre de recherche -->
    <div class="search-404">
        <?php
        get_search_form();
        ?>
    </div>
</div>

<?php get_footer(); ?>
