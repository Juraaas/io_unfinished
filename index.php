<!DOCTYPE html>
<html lang="pl">
<head>
<metahttp-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lombard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="simple.css">
    <script src="js/daltonizm.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<section class="header">
<div class="hi">
    <form method="POST" name="background">
        <input  class="myButton" type="button" value="Daltonizm" ONCLICK="changeBackground('#3342F9')" />
        <input  class="myButton" type="button" value="Oryginal" ONCLICK="changeBackground('#ADD8E6')" />
    </form>
</div>
    <nav>
        <div class="search-container">
            <form action="">
              <input id="szukajka" type="text" placeholder="Szukaj" name="search">
              <button type="submit"><i style="font-size:22px;"class="fa fa-search"></i></button>
            </form>
          </div>
        <div class="nav-links">
            <ul>
                <li><a href="index.php"><i style="font-size:24px" class="fa">&#xf015;</i>Strona główna</a></li>
                <li><a href="about.html"><i style="font-size:24px" class="fa fa-info-circle"></i> O nas</a></li>
                <li><a href="stacjonarnie.html"><i style="font-size:24px" class="fa fa-money"></i> Sklep</a></li>
                <li><a href="kontakt.html"><i style="font-size:24px" class="fa fa-address-book"></i>  Kontakt</a></li>
                <li><a href="login.php"><i style="font-size:24px" class="fa fa-user"></i> Zaloguj się</a></li>
                <li><a href="koszyk_test2.php"><i style="font-size:24px" class="fa">&#xf07a;</i> Koszyk</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="text-box">
    <a id="filtr-btn" class="filter-btn" href="filtry.php"><i class="fa fa-filter" aria-hidden="true"></i>Filtry</a>
    <?php
require("cfg.php");
$query = 'SELECT * FROM produkty';
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result))
{
    echo '<table class="produkty">';
    echo '<tr>';
    echo '<form name="koszyk" method="post" action="koszyk_test.php">';
    echo '<td> <img class="shop-photo" src="'.$row['zdjęcie'].'"/>';
    echo '<td>'.$row['id'].'</td>';
    echo '<input type="hidden" name="id" value="'.$row['id'].'">';
    echo '<td>'.$row['tytuł'].'</td>';
    echo '<input type="hidden" name="tytuł" value="'.$row['tytuł'].'">';
    echo '<td class="opis">'.$row['opis'].'</td>';
    echo '<td>'.$row['cena'].' zł'.'</td>';
    echo '<input type="hidden" name="cena" value="'.$row['cena'].'">';
    echo '<td><a class="reserve-btn" href="rezerwacja.php">Zarezerwuj</a>';
    echo '<input class="btn" type="submit" name="dodanie" value="Dodaj do koszyka">';   //wyświetlenie tabeli produktów z bazy danych, a poleceniem select uzyskujemy dostęp do wartości pol z bazy danych. dla kazdego produktu iteracja wszystkich pol
    echo '</form>';
    echo '</tr>';
}           
echo '</table>';
?>
</div>
</section>
<section class="ankieta">
    <h1>Wypełnij krótką ankietę, żeby pomóc nam usprawniać naszą stronę!</h1>
    <a href="https://www.opinionstage.com/juras1/jak-oceniasz-intuicyjno%C5%9B%C4%87-strony" class="ankieta-btn">Ankieta</a>
</section>
<!------ footer ------>
<section class="footer">
    <h4>Firma Lombard</h4>
    <p>Wszelkie prawa zastrzeżone<br>2023</p>
</section>

</body>
</html>