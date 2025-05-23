<?php
/**
 * Génère un SVG en forme de vague.
 *
 * @param string $couleur Couleur de remplissage au format hexadécimal (ex. "#2C3E50").
 */
function vague( $couleur ) {
    // On s’assure que la couleur est correctement échappée
    $couleur = esc_attr( $couleur );
    ?>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="vague"
         style="top:10px;"
         viewBox="0 0 1440 320">
      <path
        fill="<?php echo $couleur; ?>"
        fill-opacity="1"
        d="M0,160L48,138.7C96,117,192,75,288,85.3C384,96,480,160,576,165.3C672,171,768,117,864,112C960,107,1056,149,1152,165.3C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
      </path>
    </svg>
    <?php
}
