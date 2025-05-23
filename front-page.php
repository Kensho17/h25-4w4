<?php 

/**
 * modèle front-page.php permet d'afficher la pae d'acceuil
 * 
 */
?>

<?php get_header() ?>
 <!-- SECTION HERO -->
<?php get_template_part('gabarit/hero'); ?>
 <!-- SECTION FORMULAIRE -->
<?php get_template_part('gabarit/formulaire'); ?>
 <!-- SECTION POPULAIRE -->
    <section class="populaire">
        <div class="boiteflex global">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
            if(in_category('galerie')){
                the_content();
            } else { ?>
            <?php get_template_part("gabarit/carte"); ?>
            <?php } ?>
            <?php endwhile; endif; ?>
        </div>
    </section>
    <!-- //////////////////////////// DESTINATION REST-API -->
     <?php categories_liste("destination"); ?>
    <section class="destination">
        <h2 class="destination__titre">Articles de la catégorie</h2>
        <div class="destination__list"></div>
    </section>
   <?php get_footer(); ?>
</body>
</html>