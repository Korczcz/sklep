<?php

session_start();
if (!isset($_SESSION['zalogowane_id'])){
    header("Location:zaloguj.php");
    close();
  }

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
            'INSERT INTO `towary`(`towarNazwa`, `towarCena`, `towarJM`, `MailProducenta`, `towarIloscNaStanie`) VALUES ( :vNazwa, :vCena, :vJM, :vMail, :vIlosc)');
        $kwerenda->bindValue(':vNazwa', $_POST['nazwaP'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vCena', $_POST['kwota'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vJM', $_POST['jm'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vMail', $email, PDO::PARAM_STR);
        $kwerenda->bindValue(':vIlosc', $_POST['ilosc'], PDO::PARAM_STR);
        $kwerenda->execute();
        header("Location:dodajTowar.php");
    exit();
    }
} else{
    header("Location:dodajTowar.php");
    exit();
}
?>