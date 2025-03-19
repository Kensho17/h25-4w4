<?php 

/**
 * modèle front-page.php permet d'afficher la pae d'acceuil
 * 
 */
?>

<?php get_header() ?>
<?php get_template_part('gabarit/hero'); ?>
<?php get_template_part('gabarit/formulaire'); ?>


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
   <?php get_footer(); ?>
</body>
</html>