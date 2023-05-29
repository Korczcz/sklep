<?php
    session_start();
    unset($_SESSION['zalogowane_id']);
    header('Location:index.php');
?>