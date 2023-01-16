<?php 
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
include 'header.php';
echo "<br>";
$kId=$_POST['kids'];
$connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    //Selcting data from produkt
    $sql = "Select * FROM Kategorie Where id="."'".$pId."'"; 
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {   
            // selecting from product id name and preis in variables
            $id = $row ['id'];
            $name=$row['name'];
            $beschreibung=$row['beschreibung'];
            //changing the variable with B because B for Bilder
        
            
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
             
                     
            echo"<div class='container'>";
            echo"<div class='row text-white bg-primary'>";              
                echo"<div class='col-lg-1' style='border: 1px solid white;'>";
                    echo "<form action='KategorieUpdate.php' method='post'>";                  
                    echo "<label>Produkt ID</label>";
                    echo"<input type='number' size='5' style=' width:4em; border:1px solid white;' readonly='readonly' value='".$id."' id='ids' name='ids'></input>";
                echo"</div>";
                 echo"<div class='col-lg-4' style='border: 1px solid white;'>";
                 echo "<label>Produkt Name</label>";
                 echo "</br>";
                 echo"<input type='text'size='20'style='border:white 2px solid;'  value='".$name."' id='name' name='name'></input>";
                 echo "<input type='submit' value='bestätigen'>";
                echo "<input type='submit' formaction='Kategorie.php' value='Zurück'>";
                echo"</div>";
                echo"</div>"; echo"<div class='row'>";
                     echo"<div class='col-lg-2 text-white bg-primary' style='border: 1px solid white;'>";
                     echo "<label>Produkt Beschreibung</label>";
                     echo "</br>";
                     echo"<textarea style='border: 1px solid white;' id='beschreibung' name='beschreibung' >".$beschreibung."</textarea>";
                     echo "<p></p>";
                     echo"</div>"; 
                 
                    echo "</form>";
                      
                            echo "</form>";
                       
                    echo"</div>";
                echo"</div>";
           echo "<br>";

        $sqlB = "Select * FROM Kategorie"; 
        $resultB = mysqli_query($connection,$sqlB);
           
           
        } echo "<div class='container'>";
            echo "<div class='row'>";
            echo "<div class='col-lg-2' style='border: 1px solid purple;'> ";
            echo "Exestierende Kategorien";
            echo "</div>";
            echo "</div>";
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                {
                
                echo "<div class='row'>";
                echo "<div class='col-lg-1 ' style='border: 1px solid purple;'> ";
                echo $row['id'];
                echo "</div>";
                echo "<div class='col-lg-1' style='border: 1px solid purple;'> ";
                echo $row['name'];
                echo "</div>";
                echo "<br>";
                echo "</div>";
                }
            echo "</div>";   
      }     
            
    }
    else{
        //wenn ein neues Item hinzugefügt wird
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
         
                 
        echo"<div class='container'>";
        echo"<div class='row text-white bg-primary'>";              
            echo"<div class='col-lg-1' style='border: 1px solid white;'>";
                echo "<form action='KategorieUpdate.php' method='post'>";                  
                echo "<label>Produkt ID</label>";
                echo"<input type='number' size='5' style=' width:4em; border:1px solid white;' readonly='readonly' value='".$kId."' id='ids' name='ids'></input>";
            echo"</div>";
             echo"<div class='col-lg-4' style='border: 1px solid white;'>";
             echo "<label>Produkt Name</label>";
             echo "</br>";
             echo"<input type='text'size='20'style='border:white 2px solid;'  id='name' name='name'></input>";
             echo "<input type='submit' value='bestätigen'>";
            echo "<input type='submit' formaction='Kategorie.php' value='Zurück'>";
            echo"</div>";
            echo"</div>"; echo"<div class='row text-white bg-primary'>";
                 echo"<div class='col-lg-2' style='border: 1px solid white;'>";
                 echo "<label>Produkt Beschreibung</label>";
                 echo "</br>";
                 echo"<textarea style='border: 1px solid white;' id='beschreibung' name='beschreibung'>".$beschreibung."</textarea>";
                  echo "<p></p>";
                 echo"</div>"; 
                 
                echo "</form>";
                  
                        echo "</form>";
                   
                echo"</div>";
            echo"</div>";
       echo "<br>";
       $sqlB = "Select * FROM Kategorie"; 
        $resultB = mysqli_query($connection,$sqlB);
       
       
     echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-lg-2' style='border: 1px solid purple;'> ";
        echo "Exestierende Kategorien";
        echo "</div>";
        echo "</div>";  
     if(mysqli_num_rows($resultB)>0){
            while($row = mysqli_fetch_assoc($resultB))
            {
            
            echo "<div class='row'>";
            echo "<div class='col-lg-1' style='border: 1px solid purple;'> ";
            echo $row['id'];
            echo "</div>";
            echo "<div class='col-lg-1' style='border: 1px solid purple;'> ";
            echo $row['name'];
            echo "</div>";
            echo "<br>";
            echo "</div>";
            }
        echo "</div>";
    }
}
?>




