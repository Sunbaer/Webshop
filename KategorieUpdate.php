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
$name =$_POST['name'];
$preis =$_POST['preis'];
$kategorieId =$_POST['kategorieId'];
$bewertungAnzahl=$_POST['bewertungAnzahl'];
$bewertung=$_POST['bewertung'];
$beschreibung=$_POST['beschreibung'];
$bId=array();
if ( $status=="admin"){
  if(!$pId==NULL){
   $connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    //Selcting data from produkt
    $sql = "UPDATE Kategorie SET name="."'".$name."'".", beschreibung="."'".$beschreibung."'"." Where id="."'".$pId."'"; 
    $result = mysqli_query($connection,$sql);

  
    header("Location: https://martin-usta-md.me/Kategorie.php", true, 301);
}
else{ 
            
            //changing the variable with B because B for Bilder
            $sqlB = "Select * FROM Kategorie";
            $connection = mysqli_connect($servername,$username,$password,$dbname);
            $resultB = mysqli_query($connection,$sqlB);
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                { 
                 $idA =$row['id']; 
                }
                $idA++;
                if (!$name==NULL){
                       $sqlB = "INSERT INTO Kategorie (name,beschreibung) VALUES  ("."'".$name."'".","."'".$beschreibung."'".") ";
                       $resultB = mysqli_query($connection,$sqlB);
                }
                
            }
       header("Location: https://martin-usta-md.me/Kategorie.php", true, 301);
}

        
}
else {

   echo "<iframe width='942' height='530' src='https://www.youtube.com/embed/O91DT1pR1ew  autoplay=1&mute=1' title='get rickrolled lol' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
}
     
?>