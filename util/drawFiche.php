<?php
//var_dump( '<image width="150" height="125" x="50" y="20" xlink:href="' . $data["photo"] . '"/>');
// Ajout de l'image représentant le sexe de la personne
// On analyse la lettre stockée en BD représentant le sexe de l'individu (h ou f)
if ($data["sexe"] === 'h') {  // Si le sexe stocké est 'h' => c'est un homme
    // On défini la ViewBox de l'image en fonction du sexe (pour afficher le sprite)
    $vb = "50 0 100 50";
    // On charge l'image du visage au format PNG (pour gérer la transparence)
    if (isset($data['photo']) && $data['photo'] !== '') {
        echo '<image width="150" height="125" x="50" y="20" xlink:href="' . $data["photo"] . '"/>';
    } else {
        echo '<image width="150" height="125" x="50" y="20" xlink:href="../public/medias/images/defaultImageHomme.png"/>';
    }
    // On affiche la ViewBox au format défini précedement puis on charge l'image réprésentant le sexe de l'individu sur le sprite
    echo '<svg viewBox="' . $vb . '" width="100px" height="50px" x="225" y="215"><image xlink:href="../public/medias/images/genders.png" width="100px" height="50px"/></svg>';
} else {  // Sinon c'est une femme :
    // On défini les dimensions du sprite
    $vb = "0 0 50 50";
    // On charge la photo par défaut pour les femmes (au format PNG)
    if (isset($data['photo']) && $data['photo'] !== '') {
        echo '<image width="150" height="125" x="50" y="20" xlink:href="' . $data["photo"] . '"/>';
    } else {
        echo '<image width="150" height="125" x="50" y="20" xlink:href="../public/medias/images/defaultImageFemme.png"/>';
    }
    // On charge l'image représentant le sexe de l'individu aux dimensions du sprite données
    echo '<svg viewBox="' . $vb . '" width="50px" height="50px" x="225" y="215"><image xlink:href="../public/medias/images/genders.png" width="100px" height="50px"/></svg>';
}
// On intègre le cadre (cercle stylisé) des photos
echo '<image width="250" height="175" xlink:href="../public/medias/images/baseArbre.png"/>';
// On ajoute le nom et prénom au format P. Nom (tronqué à 14 charactères pour éviter les problèmes de rendu)
echo '<text id="prenom" x="130" y="83%" font-size=' . 15 / $wt . ' font-size="20" text-anchor="middle" alignment-baseline="central">' . substr($data["prenom"],0, 1) . ". " . substr($data["nom"],0, 14) . '</text>';