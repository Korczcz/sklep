<?php
session_start();
if (!isset($_SESSION['zalogowane_id'])){
    header("Location:zaloguj.php");
    close();
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
    <?php 
        require_once("database.php");
        $daneTowarowKwerenda = $db->query('SELECT * FROM towary WHERE towarIloscNaStanie > 0');
        $daneTowarow = $daneTowarowKwerenda->fetchAll();
    ?>
    <header>
    <nav>
      <ul>
        <li><a href="zaloguj.php">Wszystkie towary</a></li>
        <li><a href="index.php">Zaloguj/Zarejestruj się</a></li>
        <li><a href="dodajTowar.php">Dodaj Towar</a></li>
        <li><a href="zlozZamowienie.php">Złóż Zamowienie</a></li>
        <li><a href="zamowienie.php">Zamowienie</a></li>
        <li><a href="konto.php">Ustawienia konta</a></li>
        <li><a href="wyloguj.php">Wyloguj się</a></li>
      </ul>
    </nav>
    </header>
<h1>Złóż zamówienie</h1>
    <form action="wybierzIlosc.php" method="post">
        <label for="towar"> Wybierz towar:</label>
        <select name="towar">
            <?php
                foreach ($daneTowarow as $towar) {
                    echo '<option value=' . $towar['towarID'] . '>' . $towar['towarNazwa'] . '</option>';
                }
            ?>
        </select><br><br>

        <input type="submit" value="Złóż zamówienie">
    </form>
</body>
</html>