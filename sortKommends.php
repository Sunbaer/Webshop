
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


echo "</head>";
 include 'header.php';
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$Bilder=array();
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
          $i=0;
          $sql = "Select * FROM Kommentare Where produktId="."'".$id."'";
          $result = mysqli_query($connection,$sql);
          if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result))
              {
                $bewertung=$row['bewertung'];
                $bewertungen+=$bewertung;
                $i++;
              }
            }
$gesamtBewertung=$bewertungen/$i;
  echo "<body>";
  echo "<div class ='container'>";
  echo "<div class ='row justify-content-md-center'>";
  echo " <div class ='col-lg-1' style='border: 1px solid red;'> ";
  echo " <div class ='row'>";
  echo " <img src='".$Bilder[0]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'>";
  echo "</div>";
  echo "<div class ='row'>";
  echo "<img src='".$Bilder[1]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo " </div>";
  echo "  <div class ='row'>";  
  echo "<img src='".$Bilder[2]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo "</div>";
  echo " <div class ='row'>";
  echo "<img src='".$Bilder[3]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo "</div>";
  echo "<div class ='row'>";
  echo " <img src='".$Bilder[4]."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'> ";
  echo "</div>";
  echo "</div>";
  echo " <div class ='col-lg-5' style='border: 1px solid red;'>";
  echo "<img src='".$Bilder[0]."' style='height: 750px; width:500px; padding-top: 20px; padding-bottom: 20px;' >";
  echo "</div>";
  echo "<div class ='col-sm-3' style='border: 1px solid red;'>";
  echo "<p><strong>Beschreibung</strong><br>".$beschreibung."</p>";
  echo "<p><strong>Preis</strong>: ".$preis."€</p>";
  echo "<p><strong>Repzeptionen</strong>: ".$i."</p>";
  echo "<p><strong>Gesamt Bewertung</strong>: ".$gesamtBewertung."</p>";
  echo "</div>";
  echo "</div>";
  echo "<br>";
  echo "<div class ='row justify-content-md-center'>";
  echo "<div class ='col-sm-9' style='border: 1px solid red;'>";
  echo " <p>
          <strong>Kommentarbereich</strong>
          <br>
        </p>";

       
        if ($_POST['bewertung']) {
             if ($status =="user" | $status =="admin"){
            echo "<form action='Kommentar.php' method='post'>";
         echo "<p>Kommentar Hinterlegen   ";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='Hinzufügen' class='btn btn-primary' type='Submit'>";
         echo "</form>";
         echo "<form action='sortKommends.php' method='post'>";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
         echo " Filter nach: <input value='Datum aufsteigend  ' name='datum' class='btn btn-primary' type='Submit'></input> 
         <input value='Bewertung absteigend' name='bewertung1' class='btn btn-primary' type='Submit'></p>";
         echo "</form><br>";
         
         }
         else{
           echo "<p style='color:red;'>Sie müssen sich anmelden um ein Kommentar zu erstellen</p>";
         }
         $sql = "Select * FROM Kommentare Where produktId="."'".$id."' ORDER BY bewertung"; 
         $result = mysqli_query($connection,$sql); 
        }
        elseif ($_POST['bewertung1']) {
            

             if ($status =="user" | $status =="admin"){
            echo "<form action='Kommentar.php' method='post'>";
         echo "<p>Kommentar Hinterlegen   ";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='Hinzufügen' class='btn btn-primary' type='Submit'>";
         echo "</form>";
         echo "<form action='sortKommends.php' method='post'>";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
         echo " Filter nach: <input value='Datum aufsteigend  ' name='datum' class='btn btn-primary' type='Submit'></input> 
         <input value='Bewertung aufsteigend' name='bewertung' class='btn btn-primary' type='Submit'></p>";
         echo "</form><br>";
         
         }
         else{
           echo "<p style='color:red;'>Sie müssen sich anmelden um ein Kommentar zu erstellen</p>";
         }
         $sql = "Select * FROM Kommentare Where produktId="."'".$id."'ORDER BY bewertung Desc"; 
         $result = mysqli_query($connection,$sql); 
        }


        elseif ($_POST['datum']) {
             if ($status =="user" | $status =="admin"){
            echo "<form action='Kommentar.php' method='post'>";
         echo "<p>Kommentar Hinterlegen   ";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='Hinzufügen' class='btn btn-primary' type='Submit'>";
         echo "</form>";
         echo "<form action='sortKommends.php' method='post'>";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
         echo " Filter nach: <input value='Datum absteigend' name='datum1' class='btn btn-primary' type='Submit'></input> 
         <input value='Bewertung aufsteigend' name='bewertung' class='btn btn-primary' type='Submit'></p>";
         echo "</form><br>";
         
         }
         else{
           echo "<p style='color:red;'>Sie müssen sich anmelden um ein Kommentar zu erstellen</p>";
         }
         $sql = "Select * FROM Kommentare Where produktId="."'".$id."'ORDER BY datum "; 
         $result = mysqli_query($connection,$sql); 
        }


        elseif ($_POST['datum1']) {
           

             if ($status =="user" | $status =="admin"){
            echo "<form action='Kommentar.php' method='post'>";
         echo "<p>Kommentar Hinterlegen   ";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='Hinzufügen' class='btn btn-primary' type='Submit'>";
         echo "</form>";
         echo "<form action='sortKommends.php' method='post'>";
         echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
         echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
         echo " Filter nach: <input value='Datum aufsteigend' name='datum' class='btn btn-primary' type='Submit'></input> 
         <input value='Bewertung aufsteigend' name='bewertung' class='btn btn-primary' type='Submit'></p>";
         echo "</form><br>";
         
         }
         else{
           echo "<p style='color:red;'>Sie müssen sich anmelden um ein Kommentar zu erstellen</p>";
         }
         $sql = "Select * FROM Kommentare Where produktId="."'".$id."'ORDER BY datum Desc" ; 
         $result = mysqli_query($connection,$sql); 
        }
        
        
        $result = mysqli_query($connection,$sql);
         if(mysqli_num_rows($result)>0){
             while($row = mysqli_fetch_assoc($result))
             {echo "<div class ='row' style='border: 1px solid red;'>"; 
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
      
    
    
      
    
    
  
  
      
       
      

 



