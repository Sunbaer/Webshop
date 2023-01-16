<?php
$warenkorb="";
$id = $_POST['id'];
if(isset($_COOKIE["warenkorb"])){
    $ware = $_COOKIE["warenkorb"];
    
  
    if (strpos($_COOKIE["warenkorb"],$id) == false) 
    {
        $warenkorb=$ware." ".$id." ";
    }
    else{
        $warenkorb = $ware;
    }
    setcookie("warenkorb",$warenkorb,time()+(86400*30)); 
}
else 
{
    setcookie("warenkorb"," ".$id." ",time()+(86400*30)); 
}

header("Location: https://martin-usta-md.me", true, 301);
?>