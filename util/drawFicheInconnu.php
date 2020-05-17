<?php
// On charge l'image du visage inconnu
echo '<image width="150" height="125" x="50" y="20" xlink:href="../public/medias/images/NR.png"/>';

// On intègre le cadre (cercle stylisé) des photos
echo '<image width="250" height="175" xlink:href="../public/medias/images/baseArbre.png" />';
// On ajoute le nom et prénom (ici ??? pour la personne inconnue)
echo '<text x="130" y="83%" font-size=' . 15 / $wt . ' text-anchor="middle" alignment-baseline="central">???</text>';
