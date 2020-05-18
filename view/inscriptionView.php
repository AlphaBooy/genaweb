<div class="container">
    <div class="row mt-3">
        <div class="col-12 w-100 bg-primary rounded-pill pt-1 mb-5">
            <h1 class="h4 text-center text-dark">S'inscrire</h1>
        </div>
        <div class="col-3"></div>
        <form class="form-group input-group col-6">
            <input type="text" name="mail" id="mail" class="form-control w-100 col-12 my-2 rounded-pill" placeholder="Adresse mail" tabindex="1" required />
            <small id="passwordHelpBlock" class="form-text text-muted">
                <span class="fa fa-question-circle"></span> Doit être une adresse mail valide et qui ne soit liée à aucun compte déjà existant.
            </small>

            <input type="password" name="pass" id="pass" class="form-control w-100 col-12 my-2 rounded-pill" placeholder="Mot de passe " tabindex="2" required/>

            <button type="button" id="show_password" name="show_password" class="col-4 btn btn-outline-primary btn-block mt-1">Voir mot de passe</button>
            <br />
            <input type="submit" class="btn btn-outline-primary btn-block mt-2" value="S'inscrire">
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#show_password').on('click', function(){
            var passwordField = $('#pass');
            var passwordFieldType = passwordField.attr('type');
            if(passwordFieldType == 'password')
            {
                passwordField.attr('type', 'text');
                $(this).text('Cacher mot de passe');
            }
            else
            {
                passwordField.attr('type', 'password');
                $(this).text('Voir mot de passe');
            }
        });
    });
</script>