<div class="btn-group dropright">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Info
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item">Administrateur de l'arbre : <?=getUserByID($arbre["ID"], getPDO())["mail"];?></a>
        <table>
            <tr>
                <td><?=getUserByID($arbre["userCrea"], getPDO())['mail'];?></td>
                <td><?=dateFromDBtoDisplay($arbre["dateCrea"]);?></td>
            </tr>
            <tr>
                <td><?=getUserByID($arbre["userDerniereModif"], getPDO())['mail'];?></td>
                <td><?=dateFromDBtoDisplay($arbre["dateDerniereModif"]);?></td>
            </tr>
        </table>
    </div>
</div>

