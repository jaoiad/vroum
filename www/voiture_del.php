<?php
require "../_include/inc_config.php";
if (extract($_GET)){
$sql = "delete from voiture where vo_id=$id"; 
$result=$link->query($sql);


}else{ 

    header("location:voiture_index.php");
}