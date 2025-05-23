<?php
// Récupération des réglages du Customizer
$footer_mission            = get_theme_mod( 'footer_mission', 'Default Title' );
$footer_adresse            = get_theme_mod( 'footer_adresse', 'Default Title' );
$footer_telephone          = get_theme_mod( 'footer_telephone', 'Default Title' );
$footer_destination_image  = get_theme_mod( 'footer_destination_image' );
$footer_vague_color        = get_theme_mod( 'footer_vague_color', '#2C3E50' );
?>

<?php
$haut = get_theme_mod('pays_vague_haut_color', '#A0D8EF');
$bas  = get_theme_mod('pays_vague_bas_color',  '#B3ECB3');
if ( function_exists('creer_vague') ) {
    // Vague au-dessus du footer
    creer_vague( $haut, $bas );
}
?>

<footer>
    <div class="piedpage global">
        <?php
        // Image de fond du footer si définie
        if ( $footer_destination_image ) :
        ?>
            <div class="footer__imageBackground">
                <img src="<?php echo esc_url( $footer_destination_image ); ?>"
                     alt="<?php esc_attr_e( 'Image de fond du footer', 'theme-textdomain' ); ?>">
            </div>
        <?php endif; ?>

        <section class="piedpage__s1">
            <div class="piedpage__s1__externe">
                <h2><?php esc_html_e( 'Nos partenaires', 'theme-textdomain' ); ?></h2>
                <?php
                wp_nav_menu( array(
                    'menu'            => 'externe',
                    'container'       => false,
                    'menu_class'      => 'menu',
                ) );
                ?>
            </div>

            <div class="piedpage__s1__adresse">
                <h2><?php esc_html_e( 'Adresse et recherche', 'theme-textdomain' ); ?></h2>
                <p><?php echo esc_html( $footer_adresse ); ?></p>
                <p><?php echo esc_html( $footer_telephone ); ?></p>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form(); ?>
                </div>
            </div>

            <div class="piedpage__s1__description">
                <h2><?php esc_html_e( 'Mission du club', 'theme-textdomain' ); ?></h2>
                <p><?php echo esc_html( $footer_mission ); ?></p>
            </div>
        </section>

        <section class="piedpage__s2">
            <?php afficher_icones_sociaux(); ?>
        </section>

        <section class="piedpage__s3">
            <?php
            wp_nav_menu( array(
                'menu'            => 'principal',
                'container'       => 'nav',
                'container_class' => '',
            ) );
            ?>
        </section>
    </div>
</footer>

<?php wp_footer(); ?>
