<?php
    session_start();
    if(!isset($_SESSION['zalogowane_id'])){
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
            }
           
        } else {
            // nie wpisane hasło i/lub login
            header('Location:index.php');
            exit();
        }
        $daneTowarowKwerenda = $db->query('SELECT * FROM towary');
        $daneTowarow = $daneTowarowKwerenda->fetchAll();
      }else{
        require_once("database.php");

        $daneTowarowKwerenda = $db->query('SELECT * FROM towary');
        $daneTowarow = $daneTowarowKwerenda->fetchAll();
      }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <nav>
      <ul>
        <li><a href="zaloguj.php">Wszystkie towary</a></li>
        <li><a href="index.php">Zaloguj/Zarejestruj się</a></li>
        <li><a href="dodajTowar.php">Towar</a></li>
        <li><a href="zlozZamowienie.php">Złóż Zamowienie</a></li>
        <li><a href="zamowienie.php">Zamowienie</a></li>
        <li><a href="wyloguj.php">Wyloguj się</a></li>
      </ul>
    </nav>
    </header>
    <h1>Tabela z towarami</h1>
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
    echo '</table>';
    ?>
</body>
</html>
