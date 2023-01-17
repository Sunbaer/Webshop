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
$kId=$_POST['kids'];
if ( $status=="admin"){
$connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    $sql ="DELETE FROM Kategorie WHERE id=".$kId; 
    $result = mysqli_query($connection,$sql);

 
    header("Location: https://martin-usta-md.me/Kategorie.php", true, 301);
}
else {

    echo "<iframe width='942' height='530' src='https://www.youtube.com/embed/O91DT1pR1ew?autoplay=1&mute=0' title='get rickrolled lol' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
 }
?>