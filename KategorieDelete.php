<?php 
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$kId=$_POST['kids'];

$connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    $sql ="DELETE FROM Kategorie WHERE id=".$kId; 
    $result = mysqli_query($connection,$sql);

 
    header("Location: https://martin-usta-md.me/Kategorie.php", true, 301);
?>