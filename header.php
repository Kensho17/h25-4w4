<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
    <div class="entete global">
        <figure class="entete__logo">
            <?php
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
            ?>
        </figure>

        <label for="chk__burger" class="burger">
            <img src="https://s2.svgbox.net/hero-solid.svg?ic=menu&color=000" width="32" height="32" alt="Menu">
        </label>
        <input type="checkbox" id="chk__burger" class="chk__burger">

        <nav class="entete__nav">
            <?php
            wp_nav_menu( array(
  'theme_location' => 'principal',
  'container'      => false,
  'menu_class'     => 'menu menu-principal',
) );
            ?>

            <div class="entete__recherche">
                <?php get_search_form(); ?>
            </div>
        </nav>
    </div>
</header>
