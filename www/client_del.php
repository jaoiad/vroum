<?php
require "../_include/inc_config.php";
if (extract($_GET)){
$sql = "delete from client where cl_id=$id"; 
$result=$link->query($sql);


if($_GET)

    header("location:client_index.php");
}