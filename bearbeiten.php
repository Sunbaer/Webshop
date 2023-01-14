<?php 
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
include 'header.php';
echo "<br>";
$pId=$_POST['ids'];
$connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    //Selcting data from produkt
    $sql = "Select * FROM Produkt Where id="."'".$pId."'"; 
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {   
            // selecting from product id name and preis in variables
            $id = $row["id"];
            $name =$row["name"];
            $preis =$row["preis"];
            $kategorieId=$row["kategorieId"];
            $bewertungAnzahl=$row["bewertungAnzahl"];
            $bewertung=$row["bewertung"];
            $beschreibung=$row["beschreibung"];
            $Bilder=array();
            $i=0;
            //changing the variable with B because B for Bilder
            $sqlB = "Select * FROM Bilder WHERE produktId=".$id; 
            $resultB = mysqli_query($connection,$sqlB);
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                { 
                // saving the first Picture as view Picture
                if ($i==0){
                    $resources = $row["bildSource"];
                }
                
                $Bilder[$i] =$row["bildSource"];
                $i++;
                }
            
            }   
            
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
                    echo"<div class='row '>";
                        echo"<div class='col-lg-1' style='border: 1px solid green;'>"; 
                            echo"<div class='row'>";
                                echo"<img src='".$resources."' style='height: 150px; width:150px; padding-top: 20px; padding-bottom: 20px;'>"; 
                            echo"</div>";
                        echo"</div>";
                        echo"<div class='col-lg-1' style='border: 1px solid red;'>";
    
                        echo "<form id='form' action='Update.php' method='post'>";
                        //size 5 
                        echo "<label>Produkt ID</label>";
                        echo"<input type='number' size='5' style=' width:4em; border:1px solid red;' readonly='readonly' value=".$id." id='ids' name='ids'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-3' style='border: 1px solid green;'>";
                     echo "<label>Produkt Name</label>";
                     echo "</br>";
                     echo"<input type='text'size='20'style='border:green 2px solid;'  value='".$name."' id='name' name='name'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid green;'>";
                     echo "<label>Produkt Preis</label>";
                     echo "</br>";
                     echo"<input type='text'size='5'style='border:green 2px solid;'  value='".$preis."' id='preis' name='preis'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid green;'>";
                     echo "<label>KategorieID/s</label>";
                     echo "</br>";
                     echo"<input type='text'size='5'style='border:green 2px solid; width:4em;'  value='".$kategorieId."' id='kategorieId' name='kategorieId'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid red;'>";
                     echo "<label>Wie viele Bewertungen</label>";
                     echo "</br>";
                     echo"<input type='number'size='5'style='border:red 2px solid; width:4em;' readonly='readonly'  value='".$bewertungAnzahl."' id='bewertungAnzahl' name='bewertungAnzahl'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid red;'>";
                     echo "<label>Gesamt Bewertung</label>";
                     echo "</br>";
                     echo"<input type=''size='5'style='border:red 2px solid; width:4em;' readonly='readonly'  value='".$bewertung."' id='bewertung' name='bewertung'></input>";
                    echo"</div>"; 
                      echo"<div class='col-lg-1' style='border: 1px solid green;'>";
                        echo "<input type='submit' value='bestätigen'>";
                        echo "<input type='submit' formaction='index.php' value='Löschen'>";
                    echo"</div>"; echo"<div class='row'>";
                    
                         echo"<div class='col-lg-2' style='border: 1px solid green;'>";
                         echo "<label>Produkt Beschreibung</label>";
                         echo "</br>";
                         echo"<textarea style='border: 1px solid green;' form='form' id='beschreibung'  name='beschreibung' >".$beschreibung."</textarea>";
                         echo"</div>"; 

                        echo "<div class='container' style='padding-top: 20px;'>";
                        echo "<div class='row'>";
                        echo "<div class='col-lg-8' style='border: 2px solid blue;'> ";
                        echo "Bilder";
                        echo "</div>";
                        echo "<div class='col-lg-4' style='border: 2px solid blue;'> ";
                        echo "3D-Ansicht/.glb";
                        echo "</div>";
                        echo "<div class='row'>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild1 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild1' name='bild1' size='10' value='".$Bilder[0]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild2 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild2' name='bild2' size='10' value='".$Bilder[1]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild3 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild3' name='bild3' size='10' value='".$Bilder[2]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild4 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild4' name='bild4' size='10' value='".$Bilder[3]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>3D-Modell </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild5' name='bild5' size='10' value='".$Bilder[4]."'>";
                        echo "<p></p>";
                        echo "</div>";
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
                    echo"<div class='row '>";
                        echo"<div class='col-lg-1' style='border: 1px solid red;'>";
    
                        echo "<form id='form' action='Update.php' method='post'>";
                        //size 5 
                        echo "<label>Produkt ID</label>";
                        echo"<input type='number' size='5' style=' width:4em; border:1px solid red;' readonly='readonly' value=".$id." id='ids' name='ids'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-3' style='border: 1px solid green;'>";
                     echo "<label>Produkt Name</label>";
                     echo "</br>";
                     echo"<input type='text'size='20'style='border:green 2px solid;'  value='".$name."' id='name' name='name'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid green;'>";
                     echo "<label>Produkt Preis</label>";
                     echo "</br>";
                     echo"<input type='text'size='5'style='border:green 2px solid;'  value='".$preis."' id='preis' name='preis'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid green;'>";
                     echo "<label>KategorieID/s</label>";
                     echo "</br>";
                     echo"<input type='text'size='5'style='border:green 2px solid; width:4em;'  value='".$kategorieId."' id='kategorieId' name='kategorieId'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid red;'>";
                     echo "<label>Wie viele Bewertungen</label>";
                     echo "</br>";
                     echo"<input type='number'size='5'style='border:red 2px solid; width:4em;' readonly='readonly'  value='".$bewertungAnzahl."' id='bewertungAnzahl' name='bewertungAnzahl'></input>";
                    echo"</div>";
                     echo"<div class='col-lg-1' style='border: 1px solid red;'>";
                     echo "<label>Gesamt Bewertung</label>";
                     echo "</br>";
                     echo"<input type=''size='5'style='border:red 2px solid; width:4em;' readonly='readonly'  value='".$bewertung."' id='bewertung' name='bewertung'></input>";
                    echo"</div>"; 
                      echo"<div class='col-lg-1' style='border: 1px solid green;'>";
                        echo "<input type='submit' value='bestätigen'>";
                        echo "<input type='submit' formaction='Delete.php' value='Löschen'>";
                    echo"</div>"; echo"<div class='row'>";
                    
                         echo"<div class='col-lg-2' style='border: 1px solid green;'>";
                         echo "<label>Produkt Beschreibung</label>";
                         echo "</br>";
                         echo"<textarea style='border: 1px solid green;' form='form' id='beschreibung' value='".$beschreibung."' name='beschreibung' ></textarea>";
                         echo"</div>"; 

                        echo "<div class='container' style='padding-top: 20px;'>";
                        echo "<div class='row'>";
                        echo "<div class='col-lg-8' style='border: 2px solid blue;'> ";
                        echo "Bilder";
                        echo "</div>";
                        echo "<div class='col-lg-4' style='border: 2px solid blue;'> ";
                        echo "3D-Ansicht/.glb";
                        echo "</div>";
                        echo "<div class='row'>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild1 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild1' name='bild1' size='10' value='".$Bilder[0]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild2 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild2' name='bild2' size='10' value='".$Bilder[1]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild3 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild3' name='bild3' size='10' value='".$Bilder[2]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>Bild4 </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild4' name='bild4' size='10' value='".$Bilder[3]."'>";
                        echo "<p></p>";
                        echo "</div>";
                        echo "<div class='col-lg-2' style='border: 2px solid blue;'> ";
                        echo "<label>3D-Modell </label>";
                        echo "<br>";
                        echo "<input type='text' id='bild5' name='bild5' size='10' value='".$Bilder[4]."'>";
                        echo "<p></p>";
                        echo "</div>";
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
            
            }   
            echo "</div>";
    }
?>




