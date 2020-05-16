<form class="form-horizontal" method="get">
    <div class="container">
        <fieldset>
            <h1 class="text-primary h3 text-center text-bold">Modifier les droits sur vos arbres / fiches</h1>
            <div class="divider bg-primary"></div>
            <div class="row mt-3">
                <?php if (!isset($err) || $err === []) { // CAS AUCUNE ERREUR DE SAISIE ?>
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-1 bg-primary rounded-pill h5 text-center">Type d'objet</h2>
                        <div class="form-group">
                            <select class="form-control w-100 my-2" id="type" name="type">
                                <option value="fiche">Fiche <span class="fa fa-bookmark mx-2"></span></option>
                                <option value="arbre">Arbre <span class="fa fa-tree mx-2"></span></option>
                            </select>
                        </div>
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">ID de l'objet</h2>
                        <input class="form-control w-100" type="text" name="id_objet" id="id_objet">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-1 bg-primary rounded-pill h5 text-center">Niveau de droit</h2>
                        <div class="form-group">
                            <select class="form-control w-100 my-2" id="niveau" name="niveau">
                                <option value="visiteur">Visiteur <span class="fa fa-camera-retro mx-2"></span></option>
                                <option value="modificateur">Modificateur <span class="fa fa-pencil-square-o mx-2"></span></option>
                                <option value="administrateur">Administrateur <span class="fa fa-code-fork mx-2"></span></option>
                                <option value="super-administrateur">Super administrateur <span class="fa fa-dashboard mx-2"></span></option>
                            </select>
                        </div>
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">ID de l'utilisateur</h2>
                        <input class="form-control w-100" type="text" name="id_user" id="id_user">
                    </div>
                </div>
                <?php } else { ?>
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-1 bg-primary rounded-pill h5 text-center">Type d'objet</h2>
                        <div class="form-group">
                            <?php if (isset($err["type"])) { ?>
                            <select class="form-control w-100 my-2 is-invalid" id="type" name="type">
                                <option value="fiche">Fiche <span class="fa fa-bookmark mx-2"></span></option>
                                <option value="arbre">Arbre <span class="fa fa-tree mx-2"></span></option>
                            </select>
                            <div class="invalid-feedback"><?= $err["type"];?></div>
                            <?php } else { ?>
                            <select class="form-control w-100 my-2 is-valid" id="type" name="type">
                                <option value="fiche">Fiche <span class="fa fa-bookmark mx-2"></span></option>
                                <option value="arbre">Arbre <span class="fa fa-tree mx-2"></span></option>
                            </select>
                            <?php } ?>
                        </div>
                            <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">ID de l'objet</h2>
                            <?php if (isset($err["id_objet"])) { ?>
                                <input class="form-control w-100 is-invalid" type="text" name="id_objet" id="id_objet">
                                <div class="invalid-feedback"><?= $err["id_objet"];?></div>
                            <?php } else { ?>
                                <input class="form-control w-100 is-valid" type="text" name="id_objet" id="id_objet">
                            <?php } ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-1 bg-primary rounded-pill h5 text-center">Niveau de droit</h2>
                        <div class="form-group">
                            <?php if (isset($err["niveau"])) { ?>
                                <select class="form-control w-100 my-2 is-invalid" id="niveau" name="niveau">
                                    <option value="visiteur">Visiteur <span class="fa fa-camera-retro mx-2"></span></option>
                                    <option value="modificateur">Modificateur <span class="fa fa-pencil-square-o mx-2"></span></option>
                                    <option value="administrateur">Administrateur <span class="fa fa-code-fork mx-2"></span></option>
                                    <option value="super-administrateur">Super administrateur <span class="fa fa-dashboard mx-2"></span></option>
                                </select>
                                <div class="invalid-feedback"><?= $err["niveau"];?></div>
                            <?php } else { ?>
                                <select class="form-control w-100 my-2 is-valid" id="niveau" name="niveau">
                                    <option value="visiteur">Visiteur <span class="fa fa-camera-retro mx-2"></span></option>
                                    <option value="modificateur">Modificateur <span class="fa fa-pencil-square-o mx-2"></span></option>
                                    <option value="administrateur">Administrateur <span class="fa fa-code-fork mx-2"></span></option>
                                    <option value="super-administrateur">Super administrateur <span class="fa fa-dashboard mx-2"></span></option>
                                </select>
                            <?php } ?>
                        </div>
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">ID de l'utilisateur</h2>
                        <?php if (isset($err["id_user"])) { ?>
                            <input class="form-control w-100 is-invalid" type="text" name="id_user" id="id_user">
                            <div class="invalid-feedback"><?= $err["id_user"];?></div>
                        <?php } else { ?>
                            <input class="form-control w-100 is-valid" type="text" name="id_user" id="id_user">
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-block btn-primary my-3">Créer la fiche</button>
    </div>
</form>