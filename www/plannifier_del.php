<?php
require "../_include/inc_config.php";
if (extract($_GET)) {
    $sql = "delete from plannifier where pl_id=$id";
    $result = $link->query($sql);
    if ($_GET)

        header("location:plannifier_index.php");
}
