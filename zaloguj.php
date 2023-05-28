<?php
    session_start();

    if (isset($_POST['log'])|isset($_POST['pass'])) {
        $login = filter_input(INPUT_POST, 'log');
        $password = filter_input(INPUT_POST, 'pass');

        require_once("database.php");

        $klinetKwerenta=$db->prepare(
            'SELECT `klientID`, `klientHaslo` FROM `klient` WHERE `klientNick`= :login');
        $klinetKwerenta->bindValue('login', $login, PDO::PARAM_STR);
        $klinetKwerenta->execute();

        $klient = $klinetKwerenta->fetch();
        if ($klient && password_verify($password,$klient['klientHaslo']) ) {
            // logowanie przeszło pomyślnie
            $_SESSION['zalogowane_id']=$klient['klientID'];
            unset($_SESSION['bledne_haslo']);
        } else {
            // wpisane błędne hasło
            $_SESSION['bledne_haslo']=true;
            header("Location:index.php");
            exit();
        }
       
    } else {
        // nie wpisane hasło i/lub login
        header('Location:index.php');
        exit();
    }
    $daneTowarowKwerenda = $db->query('SELECT * FROM towary');
    $daneTowarow = $daneTowarowKwerenda->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Liczba towarów: <?= $daneTowarowKwerenda->rowCount() ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Jednostka</th>
            <th>Mail do producenta</th>
</tr>
<tbody>
    <?php
    foreach ($daneTowarow as $towar) {
        echo '<tr>'
        . '<td>' . $towar['towarID'] . '</td>'
        . '<td>' . $towar['towarNazwa'] . '</td>'
        . '<td>' . $towar['towarCena'] . '</td>'
        . '<td>' . $towar['towarJM'] . '</td>'
        . '<td>' . $towar['MailProducenta'] . '</td>'
        . '</tr>';
    }
    ?>
</body>
</html>
