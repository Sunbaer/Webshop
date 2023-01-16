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
    $sql ="DELETE FROM Produkt WHERE id=".$pId; 
    $result = mysqli_query($connection,$sql);

    $sqlB = "Select * FROM Produkt";
            $connection = mysqli_connect($servername,$username,$password,$dbname);
            $resultB = mysqli_query($connection,$sqlB);
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                { 
                 $idA =$row['id']; 
                }
                $idA++;
            }

    $sql ="DELETE FROM Bilder WHERE produktId=".$idA; 
    $result = mysqli_query($connection,$sql);
    header("Location: https://martin-usta-md.me/Produkt.phpS", true, 301);
?>