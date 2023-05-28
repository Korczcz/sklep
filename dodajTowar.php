<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj towar</title>
    <style>
        input{
            display: inline;
            width: 120px;
        }
    </style>
</head>
<body>
    <h2>Dodaj towar do bazy danych</h2>
    <form action="zapiszTowar.php" method="post">
        <p>
            <label for="nazwaP">Nazwa produktu</label>
            <input type="text" name="nazwaP" required>
        </p>
        <p>
            <label for="jm">Jednostka miary</label>
            <input type="text" name="jm" required>
        </p>
        <p>
            <label for="kwota">Cena za jedną jednostkę</label>
            <input type="text" name="kwota" required>
        </p>
        <p>
            <label for="mail">E-mail do producenta</label>
            <input type="text" name="mail" required
                <?= (isset($_SESSION['wprowadzony_mail']))?'value="' .$_SESSION['wprowadzony_mail'].'"' : '';?>
            >
        </p>
        <input type="submit" value="Dodaj towar">
        <?php
        if (isset($_SESSION['wprowadzony_mail'])){
            echo '<br> Wprowadzono niepoprawny adres email!';
            ubset($_SESSION['wprowadzony_mail']);
        }
        ?>
</body>
</html>