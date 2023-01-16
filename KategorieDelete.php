<?php 
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$pId=$_POST['ids'];

$connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    $sql ="DELETE FROM Kategorie WHERE id=".$pId; 
    $result = mysqli_query($connection,$sql);

 
    header("Location: http://localhost/PhpProject/Kategorie.php", true, 301);
?>