<?php

session_start();

if(isset($_POST['mail'])){
    $email = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
    if(empty($email)){
        //echo $_POST['mail'] . '<br>' . $email;
        $_SESSION['wprowadzony_mail']=$_POST['mail'];
        header("Location:dodajTowar.php");
    }else{
        require_once "database.php";
        //echo $_POST['mail'] . '<br>' . $email;
        $kwerenda = $db->prepare(
            'INSERT INTO `towary`(`Nazwa`, `Cena`, `Jednostka_miary`, `Mail_producenta`) VALUES ( :vNazwa, :vCena, :vJM, :vMail)');
        $kwerenda->bindValue(':vNazwa', $_POST['nazwaP'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vCena', $_POST['kwota'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vJM', $_POST['jm'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vMail', $email, PDO::PARAM_STR);
        $kwerenda->execute();
        echo 'Dane zostały dodane do bazy danych';
    }
} else{
    header("Location:dodajTowar.php");
    exit();
}
?>