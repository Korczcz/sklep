<?php
session_start();
if (!isset($_SESSION['zalogowane_id'])){
    header("Location:zaloguj.php");
    close();
  }
  require_once("database.php");

  $zamowienieKwerenta=$db->prepare(
    'SELECT `zamowienieklienta`.`zamID`,`towary`.`towarNazwa`, `zamowienieklienta`.`zamIlosc`, `towary`.`towarCena`*`zamowienieklienta`.`zamIlosc` AS Suma FROM `zamowienieklienta` JOIN `towary` ON `zamowienieklienta`.`zamTowarID` = `towary`.`towarID` WHERE `zamowienieklienta`.`zamKlientID` = :vid');
    $zamowienieKwerenta->bindValue('vid', $_SESSION['zalogowane_id'], PDO::PARAM_STR);
    $zamowienieKwerenta->execute();
    $zamowienie = $zamowienieKwerenta->fetchAll();
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
    <table>
        <tr>
            <th>ID zamówienia</th>
            <th>Nazwa towaru</th>
            <th>Zamówiona ilość</th>
            <th>Łączna suma</th>
</tr>
<tbody>
    <?php
    foreach ($zamowienie as $towar) {
        echo '<tr>'
        . '<td>' . $towar['zamID'] . '</td>'
        . '<td>' . $towar['towarNazwa'] . '</td>'
        . '<td>' . $towar['zamIlosc'] . '</td>'
        . '<td>' . $towar['Suma'] . '</td>'
        . '</tr>';
    }
    echo '</table>';
    ?><br>
</body>
</html>