<form class="form-horizontal" method="get">
    <input type="hidden" name="id" value=<?=$_GET["id"];?>>
    <div class="container">
        <fieldset>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="h4 mt-3 text-center">Modifier un individu</h1>
                </div>
            </div>
            <div class="divider bg-primary"></div>
            <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Prénoms</h2>
                        <input class="form-control w-100" type="text" name="prenom" id="prenom" placeholder="Premier Prénom *" tabindex="1" required value=<?=$datas['prenom'];?>>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Noms</h2>
                        <input class="form-control w-100" type="text" name="nom" id="nom" placeholder="Nom de famille *" tabindex="4" required value=<?=$datas['nom'];?>>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="prenom2" id="prenom2" placeholder="Deuxième Prénom" tabindex="2" value=<?=$datas['prenom2'];?>>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="nomnaiss" id="nomnaiss" placeholder="Nom de naissance / Nom de jeune fille *" tabindex="4" required value=<?=$datas['nomnaiss'];?>>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="prenom3" id="prenom3" placeholder="Troisième Prénom" tabindex="3" value=<?=$datas['prenom3'];?>>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="sexe">Sexe * : </label>
                            <label class="radio-inline" for="sexe-0">
                                <input class="mx-2" type="radio" name="sexe" id="sexe-0" value="h" <?= $datas['sexe'] === 'h' ? "checked" : null;?>>
                                Homme
                            </label>
                            <span class="fa fa-male mx-2"></span>
                            <label class="radio-inline" for="sexe-1">
                                <input class="mx-2" type="radio" name="sexe" id="sexe-1" value="f" <?= $datas['sexe'] === 'f' ? "checked" : null;?>>
                                Femme
                            </label>
                            <span class="fa fa-female mx-2"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                </div>
            </div>
            <div class="divider bg-primary"></div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Professions</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="metier" id="metier" placeholder="Profession" tabindex="6" value=<?=$datas['metier'];?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider bg-primary"></div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Adresse de résidence</h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="rue" id="rue" placeholder="Adresse de ligne" tabindex="7" value=<?=implode('&nbsp;',explode(' ', $datas['ligne']));?>>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <input class="form-control w-100" type="text" name="cp" id="cp" placeholder="Code postal" tabindex="8" value=<?=$datas['cp'];?>>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">
                                <input class="form-control w-100" type="text" name="ville" id="ville" placeholder="Ville" tabindex="9" value=<?=$datas['ville'];?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider bg-primary"></div>
            <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Naissance</h2>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="datenaiss" id="datenaiss" placeholder="Date *" required tabindex="10" value=<?=dateFromDBtoDisplay($datas['datenaiss']);?>>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="lieunaiss" id="lieunaiss" placeholder="Lieu *" required tabindex="11" value=<?=$datas['lieunaiss'];?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider bg-primary"></div>
            <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Décès</h2>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="datedeces" id="datedeces" placeholder="Date" tabindex="12" value=<?=isset($datas['datedeces']) ? dateFromDBtoDisplay($datas['datedeces']) : null;?>>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="lieudeces" id="lieudeces" placeholder="Lieu" tabindex="13" value=<?=$datas['lieudeces'];?>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="row mt-5">
            <p class="text-danger">(*) Données obligatoires</p>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Modifier la fiche</button>
    </div>
</form>
<form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row my-5">
            <div class="form-inline input-group">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Documents</h2>
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <h3 class="h5 text-primary text-center">Photo d'identité</h3>
                            <div class="custom-file" id="customFile" lang="es">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="exampleInputFile">
                                    Choisissez un fichier...
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php if (isset($datas['photo']) && $datas['photo'] !== '') { ?>
                                <!-- Une photo de cette personne existe en BD -->
                                <img class="img-thumbnail" src=<?=$datas['photo'];?> >
                            <?php } else { ?>
                                <!-- Aucune photo de cette personne n'existe en BD -->
                                <img class="img-thumbnail" src="../public/medias/images/nr.jpg">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="form-control btn btn-block btn-primary mt-1" value="Changer la photo de profil"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>