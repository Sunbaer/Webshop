<?php 
if(isset($_COOKIE["account"])){
    $pieces = explode(",", $_COOKIE["account"]);
    $status = $pieces[0];
    $usern = $pieces[1];
}

$i=0;
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$connection = mysqli_connect($servername,$username,$password,$dbname);
$kommentar =$_POST['km'];
$selected_radio=$_POST['stars'];
$id=$_POST['id'];

$sqlB = "Select * FROM User WHERE username='".$usern."'"; 

$resultB = mysqli_query($connection,$sqlB);
if(mysqli_num_rows($resultB)>0){
    while($row = mysqli_fetch_assoc($resultB))
    { 
    // saving the first Picture as view Picture
        $gkP=$row['produkte'];
        
    }
    $kp=explode(",",$gkP);

    
    foreach($kp as $p){
        if ($p==$id){
            $i=1;
        }
    }
}

        
           
        if(($gkP ==$str)){
            echo "jope";
    }

   

if ($selected_radio ==1) 
{
    $sqlB = "INSERT INTO Kommentare (produktId,kommentar,userName,gekauft,datum,bewertung) VALUES  ("."'".$id."'".","."'".$kommentar."'".","."'".$usern."'".","."'".$i."'".","."'".date('Y-m-d')."'".","."'".$selected_radio."'".")";
    $resultB = mysqli_query($connection,$sqlB);
    header("Location: https://martin-usta-md.me", true, 301);
}

elseif ($selected_radio ==2) 
{
    
    $sqlB = "INSERT INTO Kommentare (produktId,kommentar,userName,gekauft,datum,bewertung) VALUES  ("."'".$id."'".","."'".$kommentar."'".","."'".$usern."'".","."'".$i."'".","."'".date('Y-m-d')."'".","."'".$selected_radio."'".")";
    $resultB = mysqli_query($connection,$sqlB);
    header("Location: https://martin-usta-md.me", true, 301);
}
elseif ($selected_radio ==3) 
{
    $sqlB = "INSERT INTO Kommentare (produktId,kommentar,userName,gekauft,datum,bewertung) VALUES  ("."'".$id."'".","."'".$kommentar."'".","."'".$usern."'".","."'".$i."'".","."'".date('Y-m-d')."'".","."'".$selected_radio."'".")";
    $resultB = mysqli_query($connection,$sqlB);
    header("Location: https://martin-usta-md.me", true, 301);
}
elseif ($selected_radio ==4) 
{
    $sqlB = "INSERT INTO Kommentare (produktId,kommentar,userName,gekauft,datum,bewertung) VALUES  ("."'".$id."'".","."'".$kommentar."'".","."'".$usern."'".","."'".$i."'".","."'".date('Y-m-d')."'".","."'".$selected_radio."'".")";
    $resultB = mysqli_query($connection,$sqlB);
    header("Location: https://martin-usta-md.me", true, 301);
}
elseif ($selected_radio ==5) 
{
    $sqlB = "INSERT INTO Kommentare (produktId,kommentar,userName,gekauft,datum,bewertung) VALUES  ("."'".$id."'".","."'".$kommentar."'".","."'".$usern."'".","."'".$i."'".","."'".date('Y-m-d')."'".","."'".$selected_radio."'".")";
    $resultB = mysqli_query($connection,$sqlB);
    header("Location: https://martin-usta-md.me", true, 301);
}


                        //changing the variable with B because B for Bilder
                  
?>