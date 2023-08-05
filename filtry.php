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
<h2 id="order_h2">Znajdź produkt</h2>
<div id="product-filter">
    <form method="POST">
      <table>
        <tr>
          <th>Szukaj:</th>
          <td><input type="text" id="search" name="search"></td>
        </tr>
        <tr>
          <th>Kategoria:</th>
          <td>
            <select id="category" name="category">
              <option value="all">Wszystkie</option>
              <option value="category1">Telewizory</option>
              <option value="category2">Konsole</option>
              <option value="category3">Gry</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Marka:</th>
          <td>
            <select id="type" name="type">
              <option value="all">Wszystkie</option>
              <option value="type1">Sony</option>
              <option value="type2">Xbox</option>
              <option value="type3">LG</option>
              <option value="type4">Samsung</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Cena od 0 do 5000zł:</th>
          <td>
            <input type="range" id="price-range" name="price-range" min="0" max="5000" step="100">
            <span id="price-range-output">Suwak</span>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input class="view-btn" type="submit" name="filtrowanie" value="Filtruj">
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
<style>
<?php include 'style.css'; ?>
</style>
<?php
function Filtruj(){
  include('cfg.php');
  if(isset($_POST['filtrowanie'])){
    $search = $_POST['search'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $price = $_POST['price-range'];
    $query = "SELECT * FROM produkty WHERE 1=1";
    if($search!='')
    {
      $query .= " AND tytuł LIKE '%$search%'";
    }
    if($category!='all')
    {
      $query .= " AND kategoria = '$category'";
    }
    if($type!='all')
    {
      $query .= " AND marka = '$type'";
    }
    if($price!='all')
    {
      $query .= " AND cena <= '$price'";
    }
    $result = $link->query($query);
    if ($result->num_rows > 0) {
      echo "<table id='order-table'>";
      echo "<tr><th>Nazwa Produktu</th><th>Kategoria</th><th>Marka</th><th>Cena</th><th></th></tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["tytuł"] . "</td>";
          echo "<td>" . $row["kategoria"] . "</td>";
          echo "<td>" . $row["marka"] . "</td>";
          echo "<td>" . $row["cena"] . "</td>";
          echo "<td> <a class='view-btn'>Dodaj do koszyka<a/></td>";
          echo "</tr>";
      }
      echo "</table>";
  }
  else {
      echo "Nie znaleziono produktów w ustalonych ramach.";
  }
  }
}
?>
<?php
  if(isset($_POST['filtrowanie'])){
    Filtruj();
}
?>