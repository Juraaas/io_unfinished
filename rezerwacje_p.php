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
<h1 id="orders">Wszystkie rezerwacje</h1>
<?php
    include('cfg.php');
    $query = "SELECT * FROM rezerwacje";
    $result = $link->query($query);

    if ($result->num_rows > 0) {
        echo "<table id='order-table'>";
        echo "<tr>";
        echo "<th>Użytkownik</th>";
        echo "<th>ID rezerwacji</th>";
        echo "<th>Początek rezerwacji</th>";
        echo "<th>Koniec rezerwacji</th>";
        echo "<th>Zarezerwowany produkt</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["użytkownik_rejestrujący"] ."</td>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["początek_rezerwacji"] . "</td>";
            echo "<td>" . $row["koniec_rezerwacji"] . "</td>";
            echo "<td>" . $row["zarezerwowany_produkt"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

else {
    echo "Brak rezerwacji.";
}

?>
<nav class="powrot">
    <a href="panel_pracownika.php">Powrót</a>
</nav>
</body>