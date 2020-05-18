<?php
if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
    /* Taille maximum de l'image, on ne veux pas surchager le serveur (= 2MO) */
    $tailleMax = 2097152;
    /* Types (mime) possible d'images que l'utilisateur peut envoyer */
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    /* Vérifie la taille de l'image */
    if ($_FILES['image']['size'] <= $tailleMax) {
        /* Traite la partie extension du fichier pour le rendre homogène */
        $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
        /* Vérifie si l'extension appartient aux extensions valides pour les images */
        if (in_array($extensionUpload, $extensionsValides)) {
            /* Créer le chemin relatif du serveur, enregistrable en base de données */
            $chemin = "../public/medias/images/personnes/" . $datas["idPersonne"] . "." . $extensionUpload;
            /* Télécharge l'image sur le serveur */
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
            /* Si le téléchargement est bien exécuté */
            if ($resultat) {
                /* Modifie le chemin de l'image en base de données */
                UpdatePhoto($chemin, $datas["idPersonne"]);
            } else {
                $err['photo'] = "Erreur durant l'importation de votre photo de profil";
            }
        } else {
            $err['photo'] = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    } else {
        $err['photo'] = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}