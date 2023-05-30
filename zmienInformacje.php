<?php

session_start();

if(isset($_POST['mail'])){
    $email = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
    if(empty($email)){
        //echo $_POST['mail'] . '<br>' . $email;
        $_SESSION['wprowadzony_mail']=$_POST['mail'];
        header("Location:konto.php");
        exit();
    }else{
        require_once "database.php";
        $kwerenda = $db->prepare(
            'UPDATE `klient` SET `klientImie`=:vImie,`klientNazwisko`=:vNazwisko,`klientMail`=:vMail WHERE `klientID` = :vID');
        $kwerenda->bindValue(':vImie', $_POST['name'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vNazwisko', $_POST['surname'], PDO::PARAM_STR);
        $kwerenda->bindValue(':vMail', $email, PDO::PARAM_STR);
        $kwerenda->bindValue(':vID', $_SESSION['zalogowane_id'], PDO::PARAM_STR);
        $kwerenda->execute();
        header("Location:konto.php");
    }
} else{
    header("Location:konto.php");
    exit();
}
?>