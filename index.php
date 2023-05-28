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
        <li><a href="zaloguj.php">Strona główna</a></li>
        <li><a href="index.php">Zaloguj się</a></li>
        <li><a href="dodajTowar.php">Dodaj Towar</a></li>
      </ul>
    </nav>
    </header>
    <h1>Zaloguj się</h1>
    <form action="zaloguj.php" method="post">
    <p> 
        <label for="log"> Login:</label>
        <input type="text" name="log">
    </p>
    <p>
        <label for="pass"> Hasło:</label>
        <input type="password" name="pass">
    </p>
    <br>
        <input type="submit" value="Zaloguj">
</form>


       
</body>
</html>