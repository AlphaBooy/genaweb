<div class="navbar navbar-dark navbar-expand bg-dark" id="myNavbar" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../index.php">
        <img id="logo"  alt="logo de GenaWeb" src="../public/medias/images/Google_Earth_icon.svg">
        GenaWEB
    </a>
    <ul class="nav ml-auto">
        <?php
        if (isset($_SESSION['id'])) { ?>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><span class="fa fa-search" </a>
                <div class="dropdown-menu navbar_dropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="arbres.php">Voir tous mes arbres</a>
                    <a class="dropdown-item" href="fiches.php">Voir toutes mes fiches</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><span class="fa fa-plus-circle" </a>
                <div class="dropdown-menu navbar_dropdown" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="newFiche.php">Créer une nouvelle </br> fiche</a>
                    <a class="dropdown-item" href="newArbre.php">Créer un nouvel arbre </br> généalogique</a>
                    <a class="dropdown-item" href="droits.php">Gérer les autorisations</a>
                </div>
            </li>
            <li class="nav-item align-content-right">
                <a href="deco.php" class="nav-link">Se déconnecter</a>
            </li>
        <?php } else { ?>
            <li class="nav-item text-right">
                <a href="connexion.php" class="nav-link">Se connecter</a>
            </li>
            <li class="nav-item text-right">
                <a href="inscription.php" class="nav-link">S'inscrire</a>
            </li>
        <?php } ?>
    </ul>
</div>