<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie do sklepu</title>
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
        <li><a href="konto.php">Ustawienia konta</a></li>
        <li><a href="wyloguj.php">Wyloguj się</a></li>
      </ul>
    </nav>
    </header>
    <h1>Zaloguj się</h1>
    <form action="zaloguj.php" method="post">
        <label for="log"> Login:</label>
        <input type="text" name="log" required><br>

        <label for="pass"> Hasło:</label>
        <input type="password" name="pass" required><br>

        <input type="submit" value="Zaloguj">
    </form>
    <h1>Zarejestruj się</h1>
    <form action="rejestracja.php" method="post">
        <label for="log"> Login:</label>
        <input type="text" name="log" required><br>

        <label for="pass"> Hasło:</label>
        <input type="password" name="pass" required><br>

        <label for="name"> Imie:</label>
        <input type="text" name="name" required><br>

        <label for="surname"> Nazwisko:</label>
        <input type="text" name="surname" required><br>

        <label for="mail"> Mail:</label>
        <input type="mail" name="mail" required <?= (isset($_SESSION['wprowadzony_mail']))?'value="' .$_SESSION['wprowadzony_mail'].'"' : '';?>><br>

        <input type="submit" value="Zarejestruj się">
    </form>
    <?php
        if (isset($_SESSION['wprowadzony_mail'])){
            echo '<br> Wprowadzono niepoprawny adres email!';
            unset($_SESSION['wprowadzony_mail']);
        }
        ?>

       
</body>
</html>