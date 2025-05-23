<?php
/**
 * Génère un SVG en forme de vague, dégradée entre deux couleurs,
 * et optionnellement inversée verticalement.
 *
 * @param string  $couleur_haut Couleur haute au format "#rrggbb".
 * @param string  $couleur_bas  Couleur basse au format "#rrggbb".
 * @param boolean $inverse      Si true, applique transform:scaleY(-1).
 */
function creer_vague( $couleur_haut, $couleur_bas, $inverse = false ) {
    $haut  = esc_attr( $couleur_haut );
    $bas   = esc_attr( $couleur_bas );
    $extra = $inverse ? 'transform: scaleY(-1);' : '';
    ?>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="vague vague--double"
         preserveAspectRatio="none"
         viewBox="0 0 1440 320"
         style="<?php echo $extra; ?>">
      <defs>
        <linearGradient id="gradient-vague" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="<?php echo $haut; ?>"/>
          <stop offset="100%" stop-color="<?php echo $bas; ?>"/>
        </linearGradient>
      </defs>
      <path fill="url(#gradient-vague)" fill-opacity="1"
        d="M0,160L48,138.7C96,117,192,75,288,85.3C384,96,480,160,576,165.3C672,171,768,117,864,112
           C960,107,1056,149,1152,165.3C1248,181,1344,171,1392,165.3L1440,160L1440,0L1392,0C1344,0,1248,0,
           1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
      </path>
    </svg>
    <?php
}
