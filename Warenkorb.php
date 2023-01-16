<?php
if(isset($_COOKIE["warenkorb"])){
    $ware =explode(" ",$_COOKIE["warenkorb"]);
}
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$Bilder=array();
$e=0;
$i=0;
$tests = "1 2 3";
$test=explode(" ",$tests);
$name = $_POST["name"];

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
echo "<header>";
include 'header.php';
echo "</header>";
$connection = mysqli_connect($servername,$username,"example",$dbname);
if(!$connection)
{
    die("connection failed: ".mysqli_connect_error());
}
if(isset($_COOKIE["warenkorb"])){
    $ware =explode(" ",$_COOKIE["warenkorb"]);
   
 foreach($ware as $w){
      $sql = "Select * FROM Produkt Where id="."'".$w."'"; 
      $result = mysqli_query($connection,$sql);
      if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result))
          {
           $name=$row['name'];
           $preis=$row['preis'];
          }

          $sql = "Select * FROM Bilder Where produktId="."'".$w."'"; 
          $result = mysqli_query($connection,$sql);
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result))
              {
                if ($i==0){
                    $resources = $row["bildSource"];
                }
                $i++;
              }
              $i=0;
            } 
            
            $wareAll .=$w.",";  
            
            
            echo "<main>";
            echo "<br>";
            echo "<div class ='container' >";
            echo "<div class ='row  justify-content-md-center'>";
            echo " <div class ='col-lg-2' style='border: #227bd4 solid 1px;'> ";
            echo " <div class ='row justify-content-md-center'>";
            echo " <img src='".$resources."' style='height: 350px; width:250px; padding-top: 20px; padding-bottom: 20px;'>";
            echo "</div>";
            echo "<div>";
            echo "Name: <strong>".$name."</strong><br>";
            echo "Preis: <strong>".$preis."€</strong><br>";
            echo "</div>";
            echo "<p></p>";
            echo "<form class ='row justify-content-md-center'  action='WarenkorbCockD.php' method='post'>";
            echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
            echo "<input value='".$w."' class='btn btn-primary' name='id' type='hidden'>";
            echo "<input value='entfernen' class=' btn btn-primary' type='Submit'>";
            echo "</form>";
            echo "</div>";
            $gesamtPreis += floatval($preis);
            $e++;
        }
       

 } 
}   
echo "<p><p>";
            echo "<div class ='container'>";
            echo "<div class ='row justify-content-md-center'>";
            echo " <div class ='col-lg-2' > ";
            echo "gesamt Summe: ".$gesamtPreis."€";
            echo "<form class ='row justify-content-md-center'  action='Bezahlung.php' method='post'>";
            echo "<input value='".$wareAll."' class='btn btn-primary' name='wareAll' type='hidden'>";
            echo "<input value='".$gesamtPreis."' class='btn btn-primary' name='preis' type='hidden'>";
            echo "<p></p>";
            echo "<input value='Bezahlen' class=' btn btn-primary' type='Submit'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<br>";
     
echo "</main>";
echo "<footer>"; 
echo "</footer>";
   