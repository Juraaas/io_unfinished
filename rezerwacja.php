<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
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
    <div class="reservation-box">
        <form class="formu3" method="post">
        <h3 id="checkout_sum">Panel Rezerwacji</h3>
        <input type="text" name="e-mail" placeholder="E-mail"/>
        <input type="text" name="telefon" placeholder="Numer Telefonu"/>
        <h3 id="order_h2">Wybierz produkt</h3>
        <select name="wybierz_produkt">
        <option value="Konsola PlayStation 5">Konsola PlayStation 5</option>
        <option value="Konsola Xbox One S">Konsola Xbox One S</option>
        </select>
        <h3 id="order_h2">Od kiedy rezerwować produkt</h3>
        <input type="datetime-local" name="początek_rezerwacji"/>
        <h3 id="order_h2">Do kiedy rezerwować produkt</h3>
        <input type="datetime-local" name="koniec_rezerwacji"/>
        <input type="submit" class="form-btn" name="rezerwacja" value="Zarezerwuj"/>
        </form>
    </div>
<nav class="powrot">
    <a href="index.php">Powrót</a>
</nav>
</body>

<?php
    include('cfg.php');
    if(isset($_POST['e-mail'], $_POST['telefon'], $_POST['początek_rezerwacji'], $_POST['koniec_rezerwacji'], $_POST['wybierz_produkt'])){
        $email = $_POST['e-mail'];
        $telefon = $_POST['telefon'];
        $start_time = $_POST['początek_rezerwacji'];
        $end_time = $_POST['koniec_rezerwacji'];
        $zarezerwowany_produkt = $_POST['wybierz_produkt'];
        $user_id = $_SESSION['login'];
        if(isset($_POST['rezerwacja'])){
            $query = "INSERT INTO rezerwacje (użytkownik_rejestrujący, login, telefon, początek_rezerwacji, koniec_rezerwacji, zarezerwowany_produkt) 
            VALUES ('$user_id', '$email', '$telefon', '$start_time', '$end_time', '$zarezerwowany_produkt')";
            mysqli_query($link, $query);
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);