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

    $klinetKwerenta=$db->prepare(
      'SELECT `klientNick`, `klientImie`, `klientNazwisko`, `klientMail`, `klientHaslo` FROM `klient` WHERE `klientID` = :vid');
    $klinetKwerenta->bindValue('vid', $_SESSION['zalogowane_id'], PDO::PARAM_STR);
    $klinetKwerenta->execute();
    $dane = $klinetKwerenta->fetch();
  ?>
    <header>
    <nav>
      <ul>
        <li><a href="zaloguj.php">Wszystkie towary</a></li>
        <li><a href="index.php">Zaloguj/Zarejestruj się</a></li>
        <li><a href="dodajTowar.php">Towar</a></li>
        <li><a href="zlozZamowienie.php">Złóż Zamowienie</a></li>
        <li><a href="zamowienie.php">Zamowienie</a></li>
        <li><a href="konto.php">Ustawienia konta</a></li>
        <li><a href="wyloguj.php">Wyloguj się</a></li>
      </ul>
    </nav>
    </header>
    <h1>Zmień informacje</h1>
    <form action="zmienInformacje.php" method="post">
        <label for="name"> Imie:</label>
        <input type="text" name="name" value=<?php echo '"' .$dane['klientImie']. '"';?> required><br>

        <label for="surname"> Nazwisko:</label>
        <input type="text" name="surname" value=<?php echo '"' .$dane['klientNazwisko']. '"';?> required><br>

        <label for="mail"> Mail:</label>
        <input type="mail" name="mail" value=<?php echo '"' .$dane['klientMail']. '"';?> required <?= (isset($_SESSION['wprowadzony_mail']))?'value="' .$_SESSION['wprowadzony_mail'].'"' : '';?>><br>

        <input type="submit" value="Zmień dane">
    </form>
    <h1>Zmień login lub hasło</h1>
    <form action="zmienLogin.php" method="post">
        <label for="log"> Login:</label>
        <input type="text" name="log" value="<?php echo $dane['klientNick'];?>" required><br>

        <label for="pass"> Hasło:</label>
        <input type="password" name="pass" required><br>
        <input type="submit" value="Zmień dane">
    </form>
    <h1>Usuń konto</h1>
    <form action="usunKonto.php" method="post">
        <input type="submit" value="Usuń konto">
    </form>
    <?php
        if (isset($_SESSION['wprowadzony_mail'])){
            echo '<br> Wprowadzono niepoprawny adres email!';
            unset($_SESSION['wprowadzony_mail']);
        }
        ?>
</body>
</html>