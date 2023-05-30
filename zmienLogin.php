<?php

session_start();

require_once "database.php";
$kwerenda = $db->prepare(
    'UPDATE `klient` SET `klientNick`=:vNick,`klientHaslo`=:vHaslo WHERE `klientID` = :vID');
$kwerenda->bindValue(':vNick', $_POST['log'], PDO::PARAM_STR);
$kwerenda->bindValue(':vHaslo', password_hash($_POST['pass'], PASSWORD_DEFAULT), PDO::PARAM_STR);
$kwerenda->bindValue(':vID', $_SESSION['zalogowane_id'], PDO::PARAM_STR);
$kwerenda->execute();
header("Location:wyloguj.php");

?>