<?php
include 'db_connect.php';


$query1 = "SELECT * FROM aspora_recognition";
$query2 = "SELECT * FROM sports_experience";
$query3 = "SELECT * FROM laces_laceless";
$query4 = "SELECT * FROM shoe_sizes";
$query5 = "SELECT * FROM shoe_prices";
$query6 = "SELECT * FROM product_interest";


$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);
$result5 = mysqli_query($conn, $query5);
$result6 = mysqli_query($conn, $query6);
?>
