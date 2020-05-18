<div id="arbre">
    <?php
    $compteur = 1;
    // On affiche une ligne de plus que le membre le plus haut de notre arbre
    $nbAffichage = 1;
    while ($nbAffichage < intval(getMaxSosa($_GET['id'])['MAX(IDSOSA)']) * 2 + 1) {
        $nbAffichage = $nbAffichage * 2 + 1;
    }
    // Pourcentage de la taille d'affichage du premier élement
    $w = 1;
    $wt = $nbAffichage > 7 ? $nbAffichage > 15 ? $nbAffichage > 31 ? 4 : 3 : 2 : 1;
    echo '<svg width=' . 100 * $wt . '% height="175">'; // Une ligne
    echo '<g transform="scale(' . 1 / $wt . ')">';
    $x = 50;
    while ($compteur <= $nbAffichage) {
        if (newNiveau($compteur) && $compteur != 1) {
            echo '</g>';
            echo '</svg>'; // Fin de ligne
            $w = $w * 2;
            echo '<svg width=' . 100 * $wt . '% height="175">'; // Une nouvelle ligne
            echo '<g transform="scale(' . 1 / $wt . ')">';
            $x = (100 / $w) / 2;
        } else if (!newNiveau($compteur)) {
            $x += (100 / $w);
        }
        echo '<a href="link.php?sosa=' . $compteur . '&arbre=' . $_GET["id"] . '">';
        echo '<svg width=' . 100 / $w . '% x="' . $x . '%">';
        if (ficheExistAtSOSA($compteur, $_GET['id'])) {
            $data = $datas[$compteur];
            require "../util/drawFiche.php";
        } else {
            require "../util/drawFicheInconnu.php";
        }
        echo '</svg>';
        echo '</a>';
        ?>

</div>

<?php
$compteur ++;} ?>
