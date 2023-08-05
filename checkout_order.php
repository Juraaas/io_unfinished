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
<div class="row">
    <div class="about-col">
        <h3>Wprowadz dane do zamówienia i wybierz metodę płatności</h3>
        <div class="contact-box">
            <form class="formu3" method="post">
                <input type="text" name="imie" placeholder="Imię"/>
                <input type="text" name="nazwisko" placeholder="Nazwisko"/>
                <input type="text" name="adres" placeholder="Adres"/>
                <input type="text" name="miasto" placeholder="Miasto"/>
                <input type="text" name="kod-pocztowy" placeholder="Kod pocztowy"/>
                <input type="text" name="e-mail" placeholder="E-mail:"/>
                <input class="view-btn" type="submit" name="dane_z" value="Zapisz dane do zamówienia"/>
            </form>
        </div>
    </div>
    <div class="about-col">
        <h3>Metoda płatności</h3>
        <div class="checkout-method">
        <button class="order-btn"><a id="checkout_anchor" href="obsluga-karty"><i style="font-size:24px" class="fa fa-credit-card"></i> Karta</a></button>
        <button class="order-btn"><a id="checkout_anchor" href=""><i style="font-size:24px" class="fa fa-money"></i> Gotówka</a></button>
        <button class="order-btn"><a id="checkout_anchor" href="obsluga-przelewow-provider"><i style="font-size:24px" class="fa fa-bank"></i> Przelew bankowy</a></button>
        </div>
    </div>
</div>
<nav class="powrot">
    <a href="koszyk_test2.php">Powrót</a>
</nav>
</section>

<?php
    function zapiszDane(){
        include('cfg.php');
        if(isset($_POST['imie'], $_POST['nazwisko'], $_POST['adres'], $_POST['miasto'], $_POST['kod-pocztowy'], $_POST['e-mail'])){
            $user_id = $_SESSION['login'];
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $adres = $_POST['adres'];
            $miasto = $_POST['miasto'];
            $kod = $_POST['kod-pocztowy'];
            $mail = $_POST['e-mail'];
            if(isset($_POST['dane_z'])){
                $query_2 = "INSERT INTO dane_do_zamowienia(użytkownik_rejestrujący, imie, nazwisko, adres, miasto, kod_pocztowy, email)
                VALUES('$user_id', '$imie', '$nazwisko', '$adres', '$miasto', '$kod', '$mail')";
                mysqli_query($link, $query_2); // funkcja wykorzystujaca zapytanie sql ktore po wypelnieniu formularza doda stronę do listy stron w bazie
            }
        }
    }
?>
<?php
    zapiszDane();
?>