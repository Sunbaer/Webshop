<?php 

$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";

echo"<!DOCTYPE html>";
        echo"<html lang='en'>";
        echo"<head>";
        echo"<meta charset='UTF-8'>";
        echo"<meta http-equiv='X-UA-Compatible' content='IE=edge'>";
        echo"<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo"<title>Document</title>";
        echo"<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>";
        echo"<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>";
        echo"<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css'>";
        echo"<script type='module' src='https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js'></script>";
        echo"<script nomodule src='https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js'></script>";
        echo "</head>";

 echo"<body>";
 echo"<header>";   
 include 'header.php';
 echo"</header>";
 echo"<main>";
 if($status=="user"){
  $connection = mysqli_connect($servername,$username,"example",$dbname);
if(!$connection)
{
    die("connection failed: ".mysqli_connect_error());
}
  
    $sql = "Select * FROM User Where username="."'".$usern."'"; 
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {
         $id =$row['id'];
         $vname=$row['vorname'];
         $nname=$row['nachname'];
        }

        $sql = "Select * FROM Bestellung Where userId="."'".$id."'"; 
        $result = mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
            {
            $adresse=$row['lieferAddresse'];
            $preis=$row['preis'];
            $zahlung=$row['zahlungsart'];
            $produkte=$row['Produkte'];
            echo "<br>";
            echo"<div class='container'>";
                echo"<div class='row'>";
                echo"<div class='col-lg-2' style='border: 1px solid red;'>";       
                echo"<label><strong>Vorname</strong></label>";
                    echo"<p>".$vname."</p>"; 
                    echo"</div>";
                    echo"<div class='col-lg-2' style='border: 1px solid red;'>";
                    echo"<label><strong>Vorname</strong></label>";       
                    echo"<p>".$nname."</p>"; 
                    echo"</div>";
                    echo"<div class='col-lg-2' style='border: 1px solid red;'>";
                    echo"<label><strong>Vorname</strong></label>";       
                    echo"<p>".$adresse."</p>"; 
                    echo"</div>";
                    echo"<div class='col-lg-2' style='border: 1px solid red;'>";
                    echo"<label><strong>Vorname</strong></label>";       
                    echo"<p>".$preis."</p>"; 
                    echo"</div>";
                    echo"<div class='col-lg-2' style='border: 1px solid red;'>"; 
                    echo"<label><strong>Vorname</strong></label>";     
                    echo"<p>".$zahlung."</p>"; 
                    echo"</div>";
                echo"<p></p>";
            }
        } echo"</div>";
    }  
 echo"</main>";
 echo"<footer>";

 echo"</footer>"; 
 echo"</body>";
 echo"</html>";   
 }
 if($status=="admin")
 {
    $connection = mysqli_connect($servername,$username,"example",$dbname);
    if(!$connection)
    {
        die("connection failed: ".mysqli_connect_error());
    }
      
      
                $sqlB = "Select * FROM Bestellung";
                $resultB = mysqli_query($connection,$sqlB);
                if(mysqli_num_rows($resultB)>0)
                {
                    while($row = mysqli_fetch_assoc($resultB))
                    {
                    $id =$row['userId'];
                    $adresse=$row['lieferAddresse'];
                    $preis=$row['preis'];
                    $zahlung=$row['zahlungsart'];
                    $produkte=$row['Produkte'];

                    $produkt = explode(",", $produkte);

                    $sql = "Select * FROM User WHERE id='".$id."'"; 
                    $result = mysqli_query($connection,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $vname=$row['vorname'];
                            $nname=$row['nachname'];
                        }


                    echo "<br>";
                    echo"<div class='container'>";
                        echo"<div class='row'>";
                        echo"<div class='col-lg-2' style='border: 1px solid red;'>";       
                        echo"<label><strong>UserID</strong></label>";
                            echo"<p>".$id."</p>"; 
                            echo"</div>";
                        echo"<div class='col-lg-2' style='border: 1px solid red;'>";       
                        echo"<label><strong>Vorname</strong></label>";
                            echo"<p>".$vname."</p>"; 
                            echo"</div>";
                            echo"<div class='col-lg-2' style='border: 1px solid red;'>";
                            echo"<label><strong>Nachname</strong></label>";       
                            echo"<p>".$nname."</p>"; 
                            echo"</div>";
                            echo"<div class='col-lg-2' style='border: 1px solid red;'>";
                            echo"<label><strong>Lieferaddresse</strong></label>";       
                            echo"<p>".$adresse."</p>"; 
                            echo"</div>";
                            echo"<div class='col-lg-2' style='border: 1px solid red;'>";
                            echo"<label><strong>Gesamtpreis</strong></label>";       
                            echo"<p>".$preis."€</p>"; 
                            echo"</div>";
                            echo"<div class='col-lg-2' style='border: 1px solid red;'>"; 
                            echo"<label><strong>Zahlungsart</strong></label>";     
                            echo"<p>".$zahlung."</p>"; 
                            echo"</div>";
                            echo"<div class='col-lg-4' style='border: 1px solid red;'>"; 
                            echo"<label><strong>Gekaufte Produkte</strong></label>";
                            echo "<p>"; 
                            foreach($produkt as $p){
                                
                            $sqlp = "Select * FROM Produkt WHERE id='".$p."'"; 
                            $result = mysqli_query($connection,$sqlp);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $produktpreis=$row['preis'];
                                $produktname=$row['name'];
                                echo $produktname." ".$produktpreis."€ ,";  
                            }
                             
                           
                            }
                            echo "</p>";
                            
                            echo"</div>";
                        echo"<p></p>";
                    }
                }
                
             echo"</div>";
        }  
     echo"</main>";
     echo"<footer>";
    
     echo"</footer>"; 
     echo"</body>";
     echo"</html>";   
 }

?>