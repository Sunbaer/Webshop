<?php 
if(isset($_COOKIE["account"])){
    $pieces = explode(",", $_COOKIE["account"]);
    $status = $pieces[0];
    $usern = $pieces[1];
} 

$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$pId=$_POST['ids'];
if ( $status=="admin"){
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
               
            }

    $sql ="DELETE FROM Bilder WHERE produktId=".$pId; 
    $result = mysqli_query($connection,$sql);
    header("Location: https://martin-usta-md.me/Produkt.php", true, 301);
    }
    else {

        echo "<iframe width='942' height='530' src='https://www.youtube.com/embed/O91DT1pR1ew?autoplay=1&mute=0' title='get rickrolled lol' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
    }
?>