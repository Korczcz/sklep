<?php
    session_start();


    if (isset($_POST['log'])|isset($_POST['pass'])) {
        $login=filter_input(INPUT_POST, 'log');
        $password=filter_input(INPUT_POST, 'pass');


        #echo $login."    ".$password;
        require_once"database.php";
        $klinetKwerenda=$db->prepare(
            'SELECT `ID`, `Haslo` FROM `klient` WHERE `Login`= :login');
        $klinetKwerenda->bindValue('login', $login, PDO::PARAM_STR);
        $klinetKwerenda->execute();
        #echo $klinetKwerenda->rowCount();
        $klient = $klinetKwerenda->fetch();
        #echo $klient['ID']."  ".$klient['Haslo'];
        if ($klient && password_verify($password,$klient['Haslo'])) {
           
        } else {
            $_SESSION['bledne_haslo']=true;
            echo 'Błędne hasło wprowadź poprawne';
            header("Location:index.php");
            exit();
        }
       
    }else {
        header('Location:index.php');
        exit();
    }
    $daneTowarowKwerenda = $db->query('SELECT * FROM towary');
    $daneTowarow = $daneTowarowKwerenda->fetchAll();
    print_r($daneTowarow);
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
    Liczba towarów: <?= $daneTowarowKwerenda ?>
    <table>
        <tbody>
            <?php
                foreach ($daneTowarow as $towar){
                    echo '<tr>'. '<td>' . $towar['ID']. '/td'
                    . '<td>' . $towar['Nazwa'] . '</td>'
                    . '<td>' . $towar['Cena'] . '</td>'
                    . '<td>' . $towar['Jednostka_miary']. '</td>'
                    . '<td>' . $towar['Mail_producenta']. '</td>'
                    . '</tr>'; 
                }
            ?>
        </tbody>
    </table>
</body>
</html>