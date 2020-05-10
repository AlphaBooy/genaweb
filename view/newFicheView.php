<form class="form-horizontal" target="newFiche.php" method="get">
    <div class="container">
        <fieldset>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="h4 mt-3 text-center">Créer un individu</h1>
                </div>
            </div>
            <div class="divider bg-primary"></div>
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
        </fieldset>
        <div class="row mt-5">
            <p class="text-danger">(*) Données obligatoires</p>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Créer la fiche</button>
    </div>
</form>
