<?php
const MODE_PROD=false;
session_start();
const DB_SERVER = "localhost";
const DB_NAME = "basevoiture";
const DB_USER = "root";
const DB_PWD="";
$link = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER,DB_PWD);
$link->exec("SET CHARACTER SET UTF8");
$nomApplication = "Mon Auto école";
$menu=array(
    ["moniteur_index.php","Moniteur"],
    ["client_index.php", "Client"],
    ["voiture_index.php", "Voiture"],
    ["lecon_index.php", "lecon"],
    ["plannifier_index.php", "plannifier"],   
    ["creerdatabase.php","RAZ BDD"],
    ["dataset.php","jeu de données"]
);

require "inc_fonction.php";
?>