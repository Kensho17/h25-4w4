<?php 
/**
 *  index.php est le modèle par défaut
 *  si aucun modèle peut satisfaire la requête http dans ce cas c'est index.php qui affichera le contenu de la page 
 * 
 */
?>
<?php get_header() ?>


<!--En-tête catégorie -->
<h1 class ="categorie__titre"><?php single_cat_title();?></h1>
<div class ="categorie__description" ><?php echo category_description()?></div>

<!-- Articles catégorie --> 
<section class="populaire">
    <div class="boiteflex global">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
                 <?php get_template_part("gabarit/carte",); ?>
        <?php endwhile; endif; ?>
        </div>


    </section>
   <?php get_footer(); ?>
</body>
</html>