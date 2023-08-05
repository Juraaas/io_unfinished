<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'stronka_io';
global $link; 
$link= new mysqli($dbhost, $dbuser, $dbpass, $baza, 3307);

if($link->connect_errno != 0){
    throw new Exception(mysqli_connect_errno()); // blad wyswietlajacy sie po nieudanym polaczeniu z baza danych
}

?>