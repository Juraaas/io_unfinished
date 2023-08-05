<?php
session_start();

if(isset($_SESSION['logon']) && $_SESSION['logon'] == True){ // usuwanie zmiennych sesyjnych zalogowanego usera w celu wylogowania uzytkownika i przeniesienie do panelu logowania
    unset($_SESSION['logon']);
    unset($_SESSION['login']);
    $_SESSION['error'] = "Pomyslnie wylogowano";
    header('Location: login.php');
    exit();
}
else{
    $_SESSION['error'] = "Uzytkownik nie zalogowany"; // przekierowanie w momencie nie bycia zalogowanym do panelu logowania
    header('Location: login.php');
    exit();
}
?>