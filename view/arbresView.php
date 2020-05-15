<div class="container">
    <table id="arbresView" class="display mt-5 w-100">
        <thead class="bg-primary">
        <tr class="text-center fiches_tab_header">
            <th>ID</th>
            <th>Créée par</th>
            <th>Créée le</th>
            <th>Dernière modification par</th>
            <th>Dernière modification le</th>
            <th>Votre rôle</th>
        </tr>
        </thead>
        <?php
        foreach ($allarbres as $arbre) {
            echo '<tr class="trclicable" onclick="window.location.assign(\'../controller/arbre.php?id=' . $arbre['ID'] . '\');">';
            echo '<td class="text-center">' . $arbre['ID'] . '</td>';
            echo '<td class="text-center">' . getUserByID($arbre['userCrea'], getPDO())["mail"] . '</td>';
            echo '<td class="text-center">' . dateFromDBtoDisplay($arbre['dateCrea']) . '</td>';
            echo '<td class="text-center">' . getUserByID($arbre['userDerniereModif'], getPDO())["mail"] . '</td>';
            echo '<td class="text-center">' . dateFromDBtoDisplay($arbre['dateDerniereModif']) . '</td>';
            echo '<td class="text-center">' . $arbre['niveau'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>