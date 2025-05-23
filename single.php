<?php get_header(); ?>

<section class="destination">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article <?php post_class(); ?>>

                <!-- Image mise en avant ou image par défaut -->
                <div class="destination__image">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    } else {
                        // Assurez-vous d'avoir une image par défaut dans votre dossier thème /images/default.jpg
                        echo '<img src="' . get_template_directory_uri() . '/images/default.jpg" alt="Image par défaut">';
                    }
                    ?>
                </div>

                <!-- Titre de la destination -->
                <h1 class="destination__titre"><?php the_title(); ?></h1>

                <!-- Informations sur l'auteur, la date et les catégories -->
                <div class="destination__meta">
                    <p><strong>Auteur :</strong> <?php the_author(); ?></p>
                    <p><strong>Date de publication :</strong> <?php echo get_the_date(); ?></p>
                    <p><strong>Catégories :</strong> <?php the_category(', '); ?></p>
                </div>

                <!-- Description complète -->
                <div class="destination__contenu">
                    <?php the_content(); ?>
                </div>

                <!-- Températures (champs personnalisés) -->
                <div class="destination__temperatures">
                    <h2>Températures</h2>
                    <ul>
                        <li><strong>Minimum :</strong> <?php echo get_post_meta(get_the_ID(), 'temperature_min', true); ?>°C</li>
                        <li><strong>Maximum :</strong> <?php echo get_post_meta(get_the_ID(), 'temperature_max', true); ?>°C</li>
                        <li><strong>Moyenne :</strong> <?php echo get_post_meta(get_the_ID(), 'temperature_moyenne', true); ?>°C</li>
                    </ul>
                </div>

            </article>

        <?php endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>