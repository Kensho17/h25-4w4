<footer>
    <?php
    $footer_mission = get_theme_mod('footer_mission', 'Default Title');
    $footer_adresse = get_theme_mod('footer_adresse', 'Default Title');
    $footer_telephone = get_theme_mod('footer_telephone', 'Default Title');

    ?>
    <div class="piedpage global">
        <section class="piedpage__s1">
        <div class="piedpage__s1__externe">
        <h2>Nos partenaires</h2>
                <?php wp_nav_menu(array(
                    "menu" => "externe",
                    "container" => "nav",
                    "container_class" => "piedpage__s1__externe"
                )); ?>
            </div>
            <div class="piedpage__s1__adresse">
                <h2>Adresse et recherche</h2>
                <p><?php echo $footer_adresse; ?></p>
                <p><?php echo $footer_telephone; ?></p>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form();   ?>
                </div>
            </div>
            <div class="piedpage__s1__description">
                <h2>Mission du club</h2>
                <?php echo $footer_mission; ?>
            </div>
        </section>
        <section class="piedpage__s2">
                <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=000000" width="20" height="20">
                <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=000000" width="20" height="20">
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