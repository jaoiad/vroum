<?php
require "../_include/inc_config.php";
extract($_GET);
$sql = "insert into plannifier values(null, :le_id, :cl_id)";
$statement = $link->prepare($sql);
$statement->execute([":le_id" => $le_id, ":cl_id" => $cl_id]);
header("location:lecon_edit.php?id=$le_id");
