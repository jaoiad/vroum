<?php
require "../_include/inc_config.php";
if (extract($_GET)){
$sql = "delete from lecon where le_id=$id"; 
$result=$link->query($sql);


}else{ 

    header("location:lecon_index.php");
}