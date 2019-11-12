<?php
require "../_include/inc_config.php";
$sql="select * from lecon, moniteur, voiture";
$result=$link->query($sql);
$data=$result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <?php require "../_include/inc_head.php" ?>
</head>

<body>
    <header>
        <?php require "../_include/inc_entete.php" ?>
    </header>
    <nav>
        <?php require "../_include/inc_menu.php"; ?>
    </nav>
    <div id="contenu">
        <h1>Bienvenu sur Mon Auto école</h1>
        <table>
            <caption>
            <a href="lecon_edit.php?id=0">Créer un lecon</a>
            </caption>
            <tr>
                <th>id</th>
                <th>moniteur</th>
                <th>voiture</th>
                <th>heure de debut</th>
                <th>heure de fin</th>
                <th>date</th>
                <td>editer</td>
                <td>supprimer</td>
            </tr>
            <?php
            foreach($data as $row) {
                $row=array_map("cb_htmlentities",$row);
                extract($row);
                echo "<tr>";
                echo "<td>$le_id</td>";
                echo "<td>$mo_nom</td>";
                echo "<td>$vo_nom</td>";
                echo "<td>$le_heure_debut</td>";
                echo "<td>$le_heure_fin</td>";
                echo "<td>$le_date</td>";
                echo "<td><a href='lecon_edit.php?id=$le_id'>Editer</a></td>";
                echo "<td><a href='lecon_del.php?id=$le_id'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <hr>
    <footer>
        <?php require "../_include/inc_pied.php"; ?>
    </footer>
</body>

</html>