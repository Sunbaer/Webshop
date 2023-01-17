

<?php

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
echo"<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>";
echo"<script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>";
echo"<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>";


echo "</head>";
 include 'header.php';
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$Bilder=array();
$id=0;
$i=0;
$name = $_POST["name"];
$connection = mysqli_connect($servername,$username,"example",$dbname);
if(!$connection)
{
    die("connection failed: ".mysqli_connect_error());
}      
      $sql = "Select * FROM Produkt Where name="."'".$name."'"; 
      $result = mysqli_query($connection,$sql);
      if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result))
          {
           $id =$row['id'];
           $beschreibung=$row['beschreibung'];
           $preis=$row['preis'];
           
          }

        }
        $sql = "Select * FROM Bilder Where produktId="."'".$id."'"; 
        $result = mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            {
             $Bilder[$i]=$row['bildSource'];
             $i++;
            }
          }
          $i = 0;
          $sql = "Select * FROM Kommentare Where produktId="."'".$id."'"; 
          $result = mysqli_query($connection,$sql);
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result))
              { 
                $bewertung=$row['bewertung'];
                $gesbewertung+=$bewertung;
                $i++;
              }
            }
  if(!$i==0){
    $scnhittBewertung=$gesbewertung/$i;
  }
  
  echo "<body>";
  echo "<div class ='container'>";
  echo "<div class ='row justify-content-md-center'>";
  echo " <div class ='col-lg-1' '> ";
  if(!$Bilder[0]==NULL | $Bilder[0]==" " ){
echo " <div class ='row' >";
  echo " <img src='".$Bilder[0]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'>";
  echo "</div>";
  }
  
  if(!$Bilder[1]==NULL | $Bilder[1]==" "){
    echo "<div class ='row'>";
  echo "<img src='".$Bilder[1]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo " </div>";
  }
  
  if(!$Bilder[2]==NULL | $Bilder[2]==" "){
     echo "  <div class ='row'>";  
  echo "<img src='".$Bilder[2]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo "</div>";
  }
 
  if(!$Bilder[3]==NULL | $Bilder[3]==" "){
     echo " <div class ='row'>";
  echo "<img src='".$Bilder[3]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo "</div>";
  }
 
  if(!$Bilder[4]==NULL | $Bilder[4]==" "){
   echo "<div class ='row'>";
  echo " <img src='".$Bilder[4]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo "</div>"; 
  }
  

  echo "</div>";
  if(!$Bilder[0]==NULL | $Bilder[0]==" "){
    echo " <div class ='col-lg-5' '>";
  echo "<img src='".$Bilder[0]."' style='height: 750px; width:500px; padding-top: 20px; padding-bottom: 20px;' >";
  echo "</div>";
  }

  echo "<div class ='col-sm-4 text-white bg-primary''>";
  echo "<p><strong >Beschreibung</strong><br>".$beschreibung."</p>";
  echo "<p><strong>Preis:</strong>".$preis."€</p>";
  echo "<p><strong>Durchschnittliche Bewertung</strong><br>".number_format($scnhittBewertung,1,'.','')."</p>";
  echo "<p><strong>Rezeptionen</strong><br>".$i."</p>";
  echo "<form class ='row justify-content-md-center'  action='WarenkorbCock.php' method='post'>";
  echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
  echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
  echo "<input value='In den Warenkorb' class=' btn btn-success' type='Submit'>";
  echo "</form>";
  echo "</div>"; 
  echo "</div>";
  echo "<br>";
  echo "<div class ='row justify-content-md-center'>";
  echo "<div class ='col-sm-9''>";
  echo " <p>
          <strong>Kommentarbereich</strong>
        
          
          <br>
</p>";
        if ($status =="user" | $status =="admin"){
        echo "<form action='Kommentar.php' method='post'>";
        echo "<p>Kommentar Hinterlegen";
        echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
        echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
        echo "<input value='Hinzufügen' class='btn btn-primary' type='Submit'>";
        echo "</form>";
        echo "<form action='sortKommends.php' method='post'>";
        echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
        
        echo " Filter nach: <input value='Datum aufsteigend' name='datum' class='btn btn-primary' type='Submit'></input> 
        <input value='Bewertung aufsteigend' name='bewertung' class='btn btn-primary' type='Submit'></p>";
        echo "</form><br>";
        
        }
        else{
          echo "<p style='color:red;'>Sie müssen sich anmelden um ein Kommentar zu erstellen</p>";
        }
        $sql = "Select * FROM Kommentare Where produktId="."'".$id."'"; 
        $result = mysqli_query($connection,$sql); 
        
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result))
            {echo "<div class ='row text-primary' style='border:2px solid #227bd4; --bs-text-opacity: .5; '>"; 
              $kommentar=$row['kommentar'];
              $writtenBy=$row['userName'];
              $gekauft=$row['gekauft']; 
              $likes=$row['hilfreich'];          
              $datum=$row['datum'];
              $bewertung=$row['bewertung'];

              echo "<p>geschrieben von <strong>".$writtenBy."</strong> am <strong>".$datum."</strong> : <br>";
              echo $kommentar."</p>";
              echo "<p>Bewertung: <strong style='color:blue'>".$bewertung." Sterne</strong>  </p>";
              if($gekauft == 1){
              echo "<p style='color:green;'> das Produkt wurde von dem Kommentarschreiber gekauft<p>";
              echo "<p>Bewertung: <strong style='color:blue'>".$bewertung." Sterne</strong>  </p>";
              }
              else{
                echo "<p style='color:red;'> das Produkt wurde nicht von dem Kommentarschreiber gekauft<p>";
            }
            echo "<form action='details.php' method='post'>";
            echo "<p style='color:green;'>Likes ".$likes."  ";
            echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
            echo "<input value='Liken' class='btn btn-primary' type='Submit'> </p>";
            echo "</form><br>";
            echo "</div>";
             
            }  echo " </div>";
          }
  echo "<br>";
  echo "</div>";
  echo " </div>";
  echo "</div>";
  echo "</body>";  
  echo "</html>";

 ?>
      
    
    
      
    
    
  
  
      
       
      

 



