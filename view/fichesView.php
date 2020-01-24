<div class="container">
    <table id="fichesView" class="display mt-5 w-100">
        <thead class="bg-primary">
        <tr class="text-center">
            <th>ID</th>
            <th>IDPersonne</th>
            <th>Créée par</th>
            <th>Créée le</th>
            <th>Dernière modification par</th>
            <th>Dernière modification le</th>
            <th>Votre rôle</th>
        </tr>
        </thead>
        <?php
        foreach ($allfiches as $fiche) {
            echo '<tr>';
            echo '<td class="text-center">' . $fiche['ID'] . '</td>';
            echo '<td class="text-center">' . $fiche['idPersonne'] . '</td>';
            echo '<td class="text-center">' . getUserByID($fiche['userCrea'], getPDO())["mail"] . '</td>';
            echo '<td class="text-center">' . dateFromDBtoDisplay($fiche['dateCrea']) . '</td>';
            echo '<td class="text-center">' . getUserByID($fiche['userDerniereModif'], getPDO())["mail"] . '</td>';
            echo '<td class="text-center">' . dateFromDBtoDisplay($fiche['dateDerniereModif']) . '</td>';
            echo '<td class="text-center">' . $fiche['niveau'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>