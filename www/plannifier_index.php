<?php
require "../_include/inc_config.php";
$sql="select * from plannifier";
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
            <a href="plannifier_edit.php?id=0">Créer une inscription</a>
            </caption>
            <tr>
                <th>id</th>
                <th>Leçon</th>
                <th>Client</th>
                <td>editer</td>
                <td>supprimer</td>
            </tr>
            <?php
            foreach($data as $row) {
                $row=array_map("cb_htmlentities",$row);
                extract($row);
                echo "<tr>";
                echo "<td>$pl_id</td>";
                echo "<td>$pl_lecon</td>";
                echo "<td>$pl_client</td>";
    
                echo "<td><a href='plannifier_edit.php?id=$pl_id '>Editer</a></td>";
                echo "<td><a href='plannifier_del.php?id=$pl_id'>Supprimer</a></td>";
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