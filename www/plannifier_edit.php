<?php
require "../_include/inc_config.php";
$sql="Select* from client where pl_lecon=$id pl_client=cl_id ";

if (isset($_POST["btsubmit"])) {
    //échappe les caractères spéciaux du SQL
    extract($_POST);
    if ($pl_id == 0) {
        $sql = "insert into plannifier values (null,:pl_lecon,:pl_client)";
        $statement = $link->prepare($sql);
        $statement->bindParam(":pl_lecon", $pl_lecon, PDO::PARAM_INT);
        $statement->bindParam(":pl_client", $pl_client, PDO::PARAM_INT);
        $statement->execute();
    } else {
        $sql = "update plannifier set pl_lecon=:pl_lecon, pl_client=:pl_client";
        $statement = $link->prepare($sql);
        $statement->bindParam(":pl_id", $pl_id, PDO::PARAM_INT);
        $statement->bindParam(":pl_lecon", $pl_lecon, PDO::PARAM_INT);
        $statement->bindParam(":pl_client", $pl_client, PDO::PARAM_INT);

        $statement->execute();
    }

    header("location:plannifier_index.php");
} else {
    extract($_GET);
    if ($id > 0) { //UPDATE
        $sql = "select * from plannifier where pl_id=:id";
        $statement = $link->prepare($sql);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } else { //INSERT
        $pl_id = 0;
        $pl_lecon = "";
        $pl_client = "";
    }
}

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
        <form method="post">
            <input type='hidden' name='pl_id' id='pl_id' value='<?= $pl_id ?>'>
            <table>
            <caption>
            <a href="plannifier_edit.php?id=0">Créer un plannifier</a>
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


            <input type="submit" name="btsubmit" value="Enregistrer">
        </form>
    </div>
    <hr>
    <footer>
        <?php require "../_include/inc_pied.php"; ?>
    </footer>
</body>

</html>