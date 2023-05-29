<?php

session_start();

if(isset($_POST['mail'])){
    $email = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
    if(empty($email)){
        //echo $_POST['mail'] . '<br>' . $email;
        $_SESSION['wprowadzony_mail']=$_POST['mail'];
        header("Location:zaloguj.php");
    }else{
        require_once "database.php";
        $kwerenda = $db->prepare(
            'INSERT INTO `klient`(`klientNick`, `klientImie`, `klientNazwisko`, `klientMail`, `klientHaslo`) VALUES ( :vNick, :vImie, :vNazwisko, :vMail, :vHaslo)');
        $kwerenda->bindValue(':vNick', $_POST['log'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vImie', $_POST['name'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vNazwisko', $_POST['surname'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vMail', $email, PDO::PARAM_STR);
        $kwerenda->bindValue(':vHaslo', password_hash($_POST['pass'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $kwerenda->execute();
        header("Location:zaloguj.php");
    }
} else{
    header("Location:zaloguj.php");
    exit();
}
?>