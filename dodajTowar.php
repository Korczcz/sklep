<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj towar</title>
</head>
<body>
    <header>
    <nav>
      <ul>
        <li><a href="zaloguj.php">Strona główna</a></li>
        <li><a href="index.php">Zaloguj się</a></li>
        <li><a href="dodajTowar.php">Dodaj Towar</a></li>
      </ul>
    </nav>
    </header>

    <h1>Dodaj towar do bazy danych</h1>
    <form action="zapiszTowar.php" method="post">
        <label for="nazwaP">Nazwa produktu</label>
        <input type="text" name="nazwaP" required><br>

        <label for="jm">Jednostka miary</label>
        <input type="text" name="jm" required><br>

        <label for="kwota">Cena za jedną jednostkę</label>
        <input type="text" name="kwota" required><br>

        <label for="mail">E-mail do producenta</label>
        <input type="text" name="mail" required<?= (isset($_SESSION['wprowadzony_mail']))?'value="' .$_SESSION['wprowadzony_mail'].'"' : '';?>><br>
        
        <input type="submit" value="Dodaj towar">
    </form>
        <?php
        if (isset($_SESSION['wprowadzony_mail'])){
            echo '<br> Wprowadzono niepoprawny adres email!';
            ubset($_SESSION['wprowadzony_mail']);
        }
        ?>
    
</body>
</html>