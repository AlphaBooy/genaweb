<svg width="500" height="350">
    <image width="500" height="350" xlink:href="../public/medias/images/baseArbre.png" />
    <?php
    // Ajout de l'image représentant le sexe de la personne
    if (getAllDatas(1)[0]["sexe"] === 'h') {
        $vb = "50 0 100 50";
        echo '<svg viewBox="' . $vb . '" width="100px" height="50px" x="225" y="215"><image xlink:href="../public/medias/images/genders.png" width="100px" height="50px"/></svg></svg>';
    } else {
        $vb = "0 0 50 50";
        echo '<svg viewBox="' . $vb . '" width="50px" height="50px" x="225" y="215"><image xlink:href="../public/medias/images/genders.png" width="100px" height="50px"/></svg></svg>';
    }