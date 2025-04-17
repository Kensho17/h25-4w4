<?php
// Récupération des options du customizer
$hero_auteur      = get_theme_mod('hero_auteur', 'Default Title');
$hero_courriel    = get_theme_mod('hero_courriel', '');
$couleur_texte    = get_theme_mod('hero_texte', '#ffffff');
$couleur_icon     = substr(get_theme_mod('hero_icone', '#ffffff'), 1);

// On charge les 3 images depuis le customizer
$hero_background = [];
for ($i = 0; $i < 3; $i++) {
    $hero_background[$i] = get_theme_mod("hero_background_{$i}", '');
}
?>
<style>
.hero {
  color: <?php echo esc_attr($couleur_texte); ?>;
}
</style>

<section class="hero">
  <!-- Slides dynamiques -->
  <?php foreach ($hero_background as $idx => $url) : 
    if (!$url) continue; // on skip si pas d'image
  ?>
    <div
      class="hero__carrousel<?php echo $idx === 0 ? ' hero__carrousel--active' : ''; ?>"
      style="background-image: url('<?php echo esc_url($url); ?>');"
    ></div>
  <?php endforeach; ?>

  <!-- Radios générées aussi dynamiquement -->
  <div class="hero__radio">
    <?php foreach ($hero_background as $idx => $url) : 
      if (!$url) continue;
    ?>
      <input
        class="hero__radio__input"
        type="radio"
        name="hero-carrousel"
        data-index="<?php echo esc_attr($idx); ?>"
        <?php checked($idx, 0); ?>
      >
    <?php endforeach; ?>
  </div>

  <!-- Contenu overlay -->
  <div class="hero__contenu global">
    <h1 class="hero__titre"><?php bloginfo('name'); ?></h1>
    <p class="hero__description"><?php bloginfo('description'); ?></p>
    <?php if ($hero_courriel): ?>
      <p class="hero__courriel">Courriel : <?php echo esc_html($hero_courriel); ?></p>
    <?php endif; ?>
    <p class="hero__addresse">3800, rue Sherbrooke, Montréal</p>
    <p class="hero__numero">514‑254‑7131</p>

    <div class="hero__icone-app">
      <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?php echo esc_attr($couleur_icon); ?>" width="20" height="20" alt="Facebook">
      <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=<?php echo esc_attr($couleur_icon); ?>" width="20" height="20" alt="LinkedIn">
      <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=<?php echo esc_attr($couleur_icon); ?>" width="20" height="20" alt="PayPal">
      <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=<?php echo esc_attr($couleur_icon); ?>" width="20" height="20" alt="Stack Overflow">
    </div>

    <button class="hero__bouton">S'inscrire</button>
    <p class="hero__auteur">Auteur : <?php echo esc_html($hero_auteur); ?></p>
  </div>
</section>
