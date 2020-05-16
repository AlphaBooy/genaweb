<form class="form-horizontal" method="get">
    <div class="container">
        <fieldset>
            <div class="divider bg-primary"></div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="objet">Objet du droit : </label>
                            <label class="radio-inline" for="objet-0">
                                <input class="mx-2" type="radio" name="objet" id="objet-0" value="fiche" >
                                Fiche
                            </label>
                            <span class="fa fa-male mx-2"></span>
                            <label class="radio-inline" for="objet-1">
                                <input class="mx-2" type="radio" name="objet" id="objet-1" value="arbre">
                                Arbre
                            </label>
                            <span class="fa fa-female mx-2"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                </div>
            </div>
            <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">ID de l'objet</h2>
                        <input class="form-control w-100" type="number" name="id" id="id"  required>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="niveau">Niveau de droit : </label>
                            <label class="radio-inline" for="niveau-0">
                                <input class="mx-2" type="radio" name="niveau" id="niveau-0" value="visiteur" >
                                Visiteur
                            </label>
                            <span class="fa fa-male mx-2"></span>
                            <label class="radio-inline" for="niveau-1">
                                <input class="mx-2" type="radio" name="niveau" id="niveau-1" value="modificateur">
                                Modificateur
                            </label>
                            <span class="fa fa-female mx-2"></span>
                            <label class="radio-inline" for="niveau-2">
                                <input class="mx-2" type="radio" name="niveau" id="niveau-2" value="administrateur">
                                Administrateur
                            </label>
                            <span class="fa fa-female mx-2"></span>
                            <label class="radio-inline" for="niveau-3">
                                <input class="mx-2" type="radio" name="niveau" id="niveau-3" value="super_administrateur">
                                Super-administrateur
                            </label>
                            <span class="fa fa-female mx-2"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                </div>
            </div>
            <div class="row">
                <div class="form-inline input-group">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="text-white mb-2 bg-primary rounded-pill h5 text-center">ID de l'utilisateur</h2>
                        <input class="form-control w-100" type="number" name="id" id="id"  required>
                    </div>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-block btn-primary">Créer la fiche</button>
    </div>
</form>