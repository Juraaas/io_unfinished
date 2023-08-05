<?php
session_start();
include('cfg.php');
if (isset($_SESSION['logon']) && $_SESSION['logon'] == True){ //sprawdzenie czy uzytkownik jest zalogowany
    echo '<h1>Witaj, '.$_SESSION['login'].'</h1><br/><button><a href="logout.php">Wyloguj</a></button>'; //przycisk wylogowania po ktorego wcisnieciu wykonane jest przekierowanie do panelu logowania
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Lombard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="tytul"><h3>Panel Pracownika</h3></div>
    <div class="col">
        <a id="elem" href="zamowienia_p.php" class="panel-btn">Zamówienia</a>
        <a id="elem" href="rezerwacje_p.php" class="panel-btn">Rezerwacje</a>
        <a id="elem" href="reklamacje_p.php" class="panel-btn">Reklamacje</a>
    </div>
</div>
<a id="elem" href="index.html" class="order-btn">Wstecz</a>