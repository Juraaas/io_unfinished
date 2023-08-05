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
<body id="order">
<h1 id="orders">Twoje zamówienia</h1>
<?php
    include('cfg.php');
    $user_id = $_SESSION['login'];
    $query = "SELECT * FROM zamowienia WHERE użytkownik_rejestrujący = '$user_id'";
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        echo "<table id='order-table'>";
        echo "<tr>";
        echo "<th>ID zamówienia</th>";
        echo "<th>ID produktu</th>";
        echo "<th>Tytuł</th>";
        echo "<th>Cena zamówienia</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_zamowienia"] . "</td>";
            echo "<td>" . $row["id_produktu"] . "</td>";
            echo "<td>" . $row["tytuł"] . "</td>";
            echo "<td>" . $row["cena_zamowienia"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

else {
    echo "Brak zamówień.";
}

?>
<nav class="powrot">
    <a href="panel_użytkownika.php">Powrót</a>
</nav>
</body>