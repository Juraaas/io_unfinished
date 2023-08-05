<?php
session_start();

if (isset($_POST['dodanie'])) {
    $id = $_POST['id'];
    $title = $_POST['tytuł'];
    $price = $_POST['cena'];
    $already_in_cart = false;

    foreach ($_SESSION['koszyk'] as &$item) {
        if ($item['id'] == $id) {
            $item['cena'] += (int)$price;
            $already_in_cart = true;
            break;
        }
    }

    if (!$already_in_cart) {
        $_SESSION['koszyk'][] = array(
            'id' => $id,
            'tytuł' => $title,
            'cena' => (int)$price,
        );
    }
    header("location:index.php");   // sprawdza, czy został przesłany formularz. Jeśli tak, pobiera dane z formularza i przypisuje je do zmiennych. Następnie sprawdza, czy produkt już znajduje się w koszyku i jeśli tak, zwiększa ilość i cenę produktu w koszyku. Jeśli produktu nie ma jeszcze w koszyku, dodaje go.
    
}

if (isset($_POST['oczysc_koszyk'])) {
    $deleted = false;
    foreach ($_SESSION['koszyk'] as $key => $value) {
        if ($value['id'] === $_POST['id_val'] && !$deleted) {
            unset($_SESSION['koszyk'][$key]);
            $_SESSION['koszyk'] = array_values($_SESSION['koszyk']);
            $deleted = true;
            header('location:koszyk_test2.php');
        } else {
            echo "Błąd";
        }
    }  //Jeśli zostanie przesłane zapytanie o nazwie "oczysc_koszyk", sprawdzane jest czy produkt znajduje się w koszyku i usuwanie go, a następnie przekierowuje użytkownika do panelu koszyka
}
?>
<?php
function dodajZamowienie(){
if (isset($_POST['potwierdzenie'])){
    include('cfg.php');
    $user_id = $_SESSION['login'];
    $id = $_POST['id_val'];
    $tytuł = $_POST['tytul_val'];
    $cena = $_POST['cena_val'];
    $query = "INSERT INTO zamowienia (użytkownik_rejestrujący, id_produktu, tytuł, cena_zamowienia) 
            VALUES ('$user_id', '$id', '$tytuł', '$cena')";
            mysqli_query($link, $query);
    
}
}
?>
<style>
<?php include 'style.css'; ?>
</style>
<?php
    dodajZamowienie();
?>
<button class="btn"><a href="checkout_order.php">Przejdz do panelu kompletowania Zamowienia</a></button>