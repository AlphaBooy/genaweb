<div class="btn-group dropright">
    <button type="button" class="btn button_green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Info
    </button>
    <div class="dropdown-menu bg-transparent border-0">
        <table class="dropdown_table">
            <tr>
                <td>Administrateur</td>
                <td><?=getUserByID($arbre["ID"], getPDO())["mail"];?></td>
            </tr>
            <tr>
                <td>Créateur de l'arbre</td>
                <td><?=getUserByID($arbre["userCrea"], getPDO())['mail'];?></td>
                <td><?=dateFromDBtoDisplay($arbre["dateCrea"]);?></td>
            </tr>
            <tr>
                <td>Dernière modification</td>
                <td><?=getUserByID($arbre["userDerniereModif"], getPDO())['mail'];?></td>
                <td><?=dateFromDBtoDisplay($arbre["dateDerniereModif"]);?></td>
            </tr>
        </table>
    </div>
</div>

