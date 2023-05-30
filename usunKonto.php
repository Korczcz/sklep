<?php
session_start();

require_once "database.php";
$kwerenda = $db->prepare(
    'DELETE FROM `klient` WHERE `klientID` = :vID');
$kwerenda->bindValue(':vID', $_SESSION['zalogowane_id'], PDO::PARAM_STR);
$kwerenda->execute();
header("Location:zaloguj.php");

?>