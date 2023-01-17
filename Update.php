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
$bild1=$_POST['bild1'];
$bild2=$_POST['bild2'];
$bild3=$_POST['bild3'];
$bild4=$_POST['bild4'];
$bild5=$_POST['bild5'];
$i=0;
$bId=array();
if ( $status=="admin"){
if(!$pId==NULL){
   $connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
    }
    //Selcting data from produkt
    $sql = "UPDATE Produkt SET name="."'".$name."'".", preis="."'".$preis."'"." , kategorieId="."'".$kategorieId."'".", beschreibung="."'".$beschreibung."'"." Where id="."'".$pId."'"; 
    $result = mysqli_query($connection,$sql);

    $sqlB = "Select * FROM Bilder WHERE produktId=".$pId; 
    $resultB = mysqli_query($connection,$sqlB);
    if(mysqli_num_rows($resultB)>0){
        while($row = mysqli_fetch_assoc($resultB))
        { 
            $bId[$i]=$row['id'];
            $i++;
        }
        $sql = "UPDATE Bilder SET bildSource="  ."'". $bild1."'". "Where produktId=" ."'".$pId."' AND id="."'".$bId[0]."'";
        $result = mysqli_query($connection,$sql); 
        $sql = "UPDATE Bilder SET bildSource="."'".$bild2."'"." Where produktId="."'".$pId."' AND id="."'".$bId[1]."'";
        $result = mysqli_query($connection,$sql); 
        $sql = "UPDATE Bilder SET bildSource="."'".$bild3."'"." Where produktId="."'".$pId."' AND id="."'".$bId[2]."'";
        $result = mysqli_query($connection,$sql); 
        $sql = "UPDATE Bilder SET bildSource="."'".$bild4."'"." Where produktId="."'".$pId."' AND id="."'".$bId[3]."'";
        $result = mysqli_query($connection,$sql); 
        $sql = "UPDATE Bilder SET bildSource="."'".$bild5."'"." Where produktId="."'".$pId."' AND id="."'".$bId[4]."'";
        $result = mysqli_query($connection,$sql);
    }   
    header("Location: https://martin-usta-md.me/Produkt.php", true, 301);
}
else{ 
            if (!$name==NULL){
            //changing the variable with B because B for Bilder
            
           
            $connection = mysqli_connect($servername,$username,$password,$dbname);
            $sqlB = "INSERT INTO Produkt (name,preis,kategorieId,beschreibung) VALUES  ("."'".$name."'".","."'".$preis."'".","."'".$kategorieId."'".","."'".$beschreibung."'".") ";
            $resultB = mysqli_query($connection,$sqlB); 
            $sqlB = "Select * FROM Produkt";
            $resultB = mysqli_query($connection,$sqlB);
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                { 
                 $idA =$row['id']; 
                }
           
                
                
                $sqlB = "INSERT  INTO Bilder (produktId,bildSource) VALUES("."'".$idA."' ,'".$bild1."')"; 
                $resultB = mysqli_query($connection,$sqlB);
                $sqlB = "INSERT  INTO Bilder (produktId,bildSource) VALUES("."'".$idA."' ,'".$bild2."')"; 
                $resultB = mysqli_query($connection,$sqlB);
                $sqlB = "INSERT  INTO Bilder (produktId,bildSource) VALUES("."'".$idA."' ,'".$bild3."')"; 
                $resultB = mysqli_query($connection,$sqlB);
                $sqlB = "INSERT  INTO Bilder (produktId,bildSource) VALUES("."'".$idA."' ,'".$bild4."')"; 
                $resultB = mysqli_query($connection,$sqlB);
                $sqlB = "INSERT  INTO Bilder (produktId,bildSource) VALUES("."'".$idA."' ,'".$bild5."')"; 
                $resultB = mysqli_query($connection,$sqlB); 
                }
                header("Location: https://martin-usta-md.me/Produkt.php", true, 301);
            }
       
}
}
else {

    echo "<iframe width='942' height='530' src='https://www.youtube.com/embed/O91DT1pR1ew?autoplay=1&mute=0' title='get rickrolled lol' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";
 }
      
           
?>