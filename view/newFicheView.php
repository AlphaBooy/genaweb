<form class="form-horizontal" method="get">
    <div class="container">
        <fieldset>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="h4 mt-3 text-center">Créer un individu</h1>
                    <?php
                        //var_dump($matches)
                    ?>
                </div>
            </div>
            <div class="divider bg-primary"></div>
             <?php if (!isset($err) || $err === []) { // CAS AUCUNE ERREUR DE SAISIE ?>
            <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Prénoms</h2>
                        <input class="form-control w-100" type="text" name="prenom" id="prenom" placeholder="Premier Prénom *" tabindex="1" required>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Noms</h2>
                        <input class="form-control w-100" type="text" name="nom" id="nom" placeholder="Nom de famille *" tabindex="4" required>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="prenom2" id="prenom2" placeholder="Deuxième Prénom" tabindex="2">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="nomnaiss" id="nomnaiss" placeholder="Nom de naissance / Nom de jeune fille *" tabindex="4" required>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="prenom3" id="prenom3" placeholder="Troisième Prénom" tabindex="3">
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
                                <input class="mx-2" type="radio" name="sexe" id="sexe-0" value="h" checked="checked">
                                Homme
                            </label>
                            <span class="fa fa-male mx-2"></span>
                            <label class="radio-inline" for="sexe-1">
                                <input class="mx-2" type="radio" name="sexe" id="sexe-1" value="f">
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
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="metier" id="metier" placeholder="Profession" tabindex="6">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="#" class="btn btn-outline-primary btn-block h-100 pt-2" id="plusProfession"><span class="fa fa-lg fa-plus"></span> Ajouter profession</a>
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
                                <input class="form-control w-100" type="text" name="rue" id="rue" placeholder="Adresse de ligne" tabindex="7">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <input class="form-control w-100" type="text" name="cp" id="cp" placeholder="Code postal" tabindex="8">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">
                                <input class="form-control w-100" type="text" name="ville" id="ville" placeholder="Ville" tabindex="9">
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
                                <input class="form-control w-100" type="text" name="datenaiss" id="datenaiss" placeholder="Date *" required tabindex="10">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="lieunaiss" id="lieunaiss" placeholder="Lieu *" required tabindex="11">
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
                                <input class="form-control w-100" type="text" name="datedeces" id="datedeces" placeholder="Date" tabindex="12">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="lieudeces" id="lieudeces" placeholder="Lieu" tabindex="13">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Prénoms</h2>
                        <?php if (isset($err["prenom"])) { ?>
                            <input class="form-control w-100 is-invalid" type="text" name="prenom" id="prenom" placeholder="Premier Prénom *" value=<?php echo "\"".$_GET['prenom']."\""?> tabindex="1" required>
                            <div class="invalid-feedback"><?= $err["prenom"];?></div>
                        <?php } else { ?>
                            <input class="form-control w-100" type="text" name="prenom" id="prenom" placeholder="Premier Prénom *" value=<?php echo "\"".$_GET['prenom']."\""?> tabindex="1" required>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">Noms</h2>
                        <?php if (isset($err["nom"])) { ?>
                            <input class="form-control w-100 is-invalid" type="text" name="nom" id="nom" placeholder="Nom de famille *" value=<?php echo "\"".$_GET['nom']."\""?> tabindex="4" required>
                            <div class="invalid-feedback"><?= $err["nom"];?></div>
                        <?php } else { ?>
                            <input class="form-control w-100" type="text" name="nom" id="nom" placeholder="Nom de famille *" value=<?php echo "\"".$_GET['nom']."\""?> tabindex="4" required>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="prenom2" id="prenom2" placeholder="Deuxième Prénom" <?php if ($_GET['prenom2']!='') {echo "value=\"".$_GET['prenom2']."\"";}?> tabindex="2">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        
                        <?php if (isset($err["nomnaiss"])) { ?>
                            <input class="form-control w-100 is-invalid" type="text" name="nomnaiss" id="nomnaiss" placeholder="Nom de naissance / Nom de jeune fille *" value=<?php echo "\"".$_GET['nomnaiss']."\""?> tabindex="4" required>
                            <div class="invalid-feedback"><?= $err["nomnaiss"];?></div>
                        <?php } else { ?>
                            <input class="form-control w-100" type="text" name="nomnaiss" id="nomnaiss" placeholder="Nom de naissance / Nom de jeune fille *" value=<?php echo "\"".$_GET['nomnaiss']."\""?> tabindex="4" required>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input class="form-control w-100" type="text" name="prenom3" id="prenom3" placeholder="Troisième Prénom" <?php if($_GET['prenom3']!=''){ echo "value=\"".$_GET['prenom3']."\"";}?> tabindex="3">
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
                                <input class="mx-2" type="radio" name="sexe" id="sexe-0" value="h" checked="checked">
                                Homme
                            </label>
                            <span class="fa fa-male mx-2"></span>
                            <label class="radio-inline" for="sexe-1">
                                <input class="mx-2" type="radio" name="sexe" id="sexe-1" value="f">
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
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="metier" id="metier" placeholder="Profession" <?php if($_GET['metier']!=''){ echo "value=\"".$_GET['metier']."\"";}?> tabindex="6">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <a href="#" class="btn btn-outline-primary btn-block h-100 pt-2" id="plusProfession"><span class="fa fa-lg fa-plus"></span> Ajouter profession</a>
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
                                <input class="form-control w-100" type="text" name="rue" id="rue" placeholder="Adresse de ligne" <?php if($_GET['rue']!=''){ echo "value=\"".$_GET['rue']."\"";}?> tabindex="7">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <input class="form-control w-100" type="text" name="cp" id="cp" placeholder="Code postal" <?php if($_GET['cp']!=''){ echo "value=\"".$_GET['cp']."\"";}?> tabindex="8">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-8">
                                <input class="form-control w-100" type="text" name="ville" id="ville" placeholder="Ville" <?php if($_GET['ville']!=''){ echo "value=\"".$_GET['ville']."\"";}?> tabindex="9">
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
                                <?php if (isset($err["datenaiss"])) { ?>
                                    <input class="form-control w-100 is-invalid" type="text" name="datenaiss" id="datenaiss" placeholder="Date *" value=<?php echo "\"".$_GET['datenaiss']."\""?> required tabindex="10">
                                    <div class="invalid-feedback"><?= $err["datenaiss"];?></div>
                                <?php } else { ?>
                                    <input class="form-control w-100" type="text" name="datenaiss" id="datenaiss" placeholder="Date *" value=<?php echo "\"".$_GET['datenaiss']."\""?> required tabindex="10">
                                <?php } ?>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                
                                 <?php if (isset($err["lieunaiss"])) { ?>
                                    <input class="form-control w-100 is-invalid" type="text" name="lieunaiss" id="lieunaiss" placeholder="Lieu *" value=<?php echo "\"".$_GET['lieunaiss']."\""?> required tabindex="11">
                                    <div class="invalid-feedback"><?= $err["lieunaiss"];?></div>
                                <?php } else { ?>
                                    <input class="form-control w-100" type="text" name="lieunaiss" id="lieunaiss" placeholder="Lieu *" value=<?php echo "\"".$_GET['lieunaiss']."\""?> required tabindex="11">
                                <?php } ?>
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
                                <input class="form-control w-100" type="text" name="datedeces" id="datedeces" placeholder="Date" <?php if($_GET['datedeces']!=''){ echo "value=\"".$_GET['datedeces']."\"";}?> tabindex="12">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <input class="form-control w-100" type="text" name="lieudeces" id="lieudeces" placeholder="Lieu" <?php if($_GET['lieudeces']!=''){ echo "value=\"".$_GET['lieudeces']."\"";}?> tabindex="13">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php } ?>

        </fieldset>
        <div class="row mt-5">
            <p class="text-danger">(*) Données obligatoires</p>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Créer la fiche</button>
    </div>
</form>
