$(document).ready(function() {
    $('#fichesView').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../../../model/ficheModelAjax.php"
    } );
} );