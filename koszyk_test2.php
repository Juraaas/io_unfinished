<?php
session_start();
?>

<style>
<?php include 'style.css'; ?>
</style>

<?php

$całkowita_cena = 0;
if(!isset($_SESSION['koszyk'])) {
    echo 'Koszyk jest pusty';
} else {
    $total = 0;
    echo '<h3 id="shop_title">Koszyk</h3>';
    echo '<table class="koszyk_t">';
    echo '<tr>';
    echo '<th>'.'ID Produktu'.'</td>';
    echo '<th>'.'Nazwa'.'</th>';
    echo '<th>'.'Cena'.'</th>';
    echo '<th>'.'Usunięcie z koszyka'.'</th>';
    echo '</tr>';
    foreach($_SESSION['koszyk'] as $id => $value)
    {
        if(!isset($value['cena'], $value['tytuł'], $value['id'])) {
            echo '';
        } else {
            $całkowita_cena = (int)$value['cena'] * 1;
            $total  += $całkowita_cena;
            echo '<form action="koszyk_test.php "method="post">';
            echo '<tr>';
            echo '<td>'.$value['id'].'</td>';
            echo '<input type="hidden" name="id_val" value='.$value['id'].'>';
            echo '<td>'.$value['tytuł'].'</td>';
            echo '<td>'.$całkowita_cena.' zł'.'</td>';
            echo '<input type="hidden" name="cena_val" value='.$value['cena'].'>';
            echo '<td>'.'<button name="oczysc_koszyk">Usuń z koszyka</button>'.'</td>';
            echo '<input type="hidden" name="tytul_val" value='.$value['tytuł'].'>';
            echo '</tr>';
        }
    }
    echo '<tr>';
    echo '<td colspan="4">';
    echo '<input class="btn" type="submit" name="potwierdzenie" value="Zamow">';
    echo '</form>';
    echo '</table>';
    echo '<p id="total_amount">Suma: '.$total.' zł</p>';
    echo '<a class="back-btn" href="index.php">Powrót do sklepu</a>';
}