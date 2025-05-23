    <?php
    $footer_mission = get_theme_mod('footer_mission', 'Default Title');
    $footer_adresse = get_theme_mod('footer_adresse', 'Default Title');
    $footer_telephone = get_theme_mod('footer_telephone', 'Default Title');
    $footer_destination_image = get_theme_mod('footer_destination_image');
    

    ?>
<!-- SVG vague en haut du footer -->
<svg xmlns="http://www.w3.org/2000/svg"
class = "vague"
style = "top:10px;" 
viewBox="0 0 1440 320">
<path 
    fill="#2C3E50" 
    fill-opacity="1"
    d="M0,160L48,138.7C96,117,192,75,288,85.3C384,96,480,160,576,165.3C672,171,768,117,864,112C960,107,1056,149,1152,165.3C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
</svg>
<!-- Balise footer avec couleur de fond personnalisée -->
<footer style="background-color: <?= esc_attr($footer_couleur); ?>; position: relative;">
    <div class="piedpage global">
            <?php
                // Affichage de l’image si elle est définie
                $image_footer = get_theme_mod('footer_destination_image');
                    if ($image_footer) {
                    echo '<div class="footer__imageBackground">';
                    echo '<img src="' . esc_url($image_footer) . '" alt="Image de fond du footer">';
                    echo '</div>';
                }
            ?>
        <section class="piedpage__s1">
        <div class="piedpage__s1__externe">
        <h2>Nos partenaires</h2>
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav",
                    "container_class" => "piedpage__s1__externe"
                )); ?>
            </div>
            <!-- Bloc adresse + formulaire de recherche -->
            <div class="piedpage__s1__adresse">
                <h2>Adresse et recherche</h2>
                <p><?php echo $footer_adresse; ?></p>
                <p><?php echo $footer_telephone; ?></p>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form();   ?>
                </div>
            </div>
             <!-- Bloc mission -->
            <div class="piedpage__s1__description">
                <h2>Mission du club</h2>
                <?php echo $footer_mission; ?>
            </div>
        </section>
        <section class="piedpage__s2">
                 <?php afficher_icones_sociaux(); ?>
        </section>
      
        <section class="piedpage__s3">
        <?php wp_nav_menu(array(
                    "menu" => "principal",
                    "container" => "nav",
                    "container_class" => ""
                )); ?>
        </section>
    </div>
</footer>
<?php wp_footer() ?>