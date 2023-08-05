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

<?php
    function dodajUzytkownika(){
        include('cfg.php');
        if(isset($_POST['e-mail'], $_POST['haslo'])){
            $login = $_POST['e-mail'];
            $haslo = $_POST['haslo'];
            if(isset($_POST['rejestracja'])){
                $query_2 = "INSERT INTO użytkownicy(login, haslo)
                VALUES('$login', '$haslo')";
                mysqli_query($link, $query_2); // funkcja wykorzystujaca zapytanie sql ktore po wypelnieniu formularza doda stronę do listy stron w bazie
            }
        }
    }
?>
<?php
    dodajUzytkownika();
?>
<div class="contact-box">
    <form class="formu" method="post">
        <h3>Zarejestruj się</h3> 
        <input type="text" name="e-mail" placeholder="E-mail"/>
        <input type="password" name="haslo" placeholder="Hasło"/>
        <input type="password" name="haslo" placeholder="Powtórz Hasło"/>
        <input class="form-btn" name="rejestracja" type="submit" value="Zarejestruj"/>
    </form>
    <p>
    <input type="checkbox"><a href="regulamin.html">Akceptuję regulamin strony</a>
    </p>
<nav class="powrot">
    <a href="index.html">Strona Główna</a>
</nav>
</div>
