<?php 
if(isset($_COOKIE["warenkorb"])){
    $last =$_COOKIE["warenkorb"];
}
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$preis =$_POST['preis'];
$wareAll =$_POST['wareAll'];
$user =$_POST['user'];
$vn =$_POST['vn'];
$nn =$_POST['nn'];
$adress =$_POST['adress'];
$plz =$_POST['plz'];
$preis =$_POST['preis'];
$zahlung =$_POST['zahlung'];

            
        

            $sqlB = "Select * FROM User WHERE username='".$user."' ";
            $connection = mysqli_connect($servername,$username,$password,$dbname);
            $resultB = mysqli_query($connection,$sqlB);
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                {
                    $id = $row['id'];
                }
                
            }

            $sql = "INSERT INTO Bestellung (userId,name,lieferAddresse,preis,zahlungsart,Produkte) VALUES  ("."'".$id."'".","."'".$vn." ".$nn."'".","."'".$adress." ".$plz."'".","."'".$preis."'".","."'".$zahlung."'".","."'".$wareAll."') ";
            $result = mysqli_query($connection,$sql);
            header("Location: https://martin-usta-md.me", true, 301);
           
            setcookie("warenkorb",$last,time()-(86400*30),"/");          
?>