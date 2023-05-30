<?php
    session_start();
    if (!isset($_SESSION['zalogowane_id'])){
        header("Location:zaloguj.php");
        close();
    }
    require_once("database.php");

    $klinetKwerenta=$db->prepare(
        'INSERT INTO `zamowienieklienta`(`zamKlientID`, `zamTowarID`, `zamIlosc`) VALUES(:vKlientID, :vTowarID, :vIlosc)');
    $klinetKwerenta->bindValue(':vKlientID', $_SESSION['zalogowane_id'], PDO::PARAM_STR);
    $klinetKwerenta->bindValue(':vTowarID', $_POST['towar'], PDO::PARAM_STR);
    $klinetKwerenta->bindValue(':vIlosc', $_POST['ilosc'], PDO::PARAM_STR);
    $klinetKwerenta->execute();

    $klinetKwerenta=$db->prepare('UPDATE `towary` SET `towarIloscNaStanie`=`towarIloscNaStanie`-:vIlosc WHERE `towarID` = :vTowarID');  
    $klinetKwerenta->bindValue(':vTowarID', $_POST['towar'], PDO::PARAM_STR);
    $klinetKwerenta->bindValue(':vIlosc', $_POST['ilosc'], PDO::PARAM_STR);  
    $klinetKwerenta->execute();
    header("Location:zamowienie.php");
?>
