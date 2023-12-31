<?php
session_start();

if(isset($_SESSION['logon']) && $_SESSION['logon'] == True){ // sprawdzanie czy jestesmy zalogowani, jezeli tak to nie bedzie nam sie wyswietlal juz panel logowania, bo zostanie wykonane przekierowanie na panel po zalogowaniu
    if($_SESSION['login'] == 'pracownik@gmail.com'){
        header('Location: panel_pracownika.php');
    }
    else {
        header('Location: panel_użytkownika.php');
    }
}
?>
<style>
<?php include 'style.css'; ?>
</style>

<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Lombard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<div class="contact-box">
    <form class="formu" method="post" action="logowanie.php">
        <h3>Zaloguj się</h3> 
        <input type="text" name="e-mail" placeholder="E-mail"/>
        <input type="password" name="haslo" placeholder="Hasło"/>
        <input class="form-btn" type="submit" value="Zaloguj"/>
    </form>
    <p>
    <input type="checkbox"><a href="">Zapamiętaj mnie</a><br><br>
    <a href="rejestracja.php">Nie masz konta? Załóż je tutaj!</a><br><br>
    <a href="przypomnienie.html">Zapomniałeś hasła?</a>
    </p>
<nav class="powrot">
    <a href="index.html">Powrót</a>
</nav>
</div>
<?php
    if(isset($_SESSION['error'])){   // jesli istnieje zmienna sesyjna error, to wyswietla sie jej komunikat nastepnie usuwa ja zeby po odswiezeniu przegladarki blad zniknal
        echo '<span style="color: red; font-weight: bold">'.$_SESSION['error'].'</span>';
        unset($_SESSION['error']);
    }
?>

</body>
</html>