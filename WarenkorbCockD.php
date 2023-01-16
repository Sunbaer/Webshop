<?php
$id=$_POST['id'];
if(isset($_COOKIE["warenkorb"])){
    $ware =explode(" ",$_COOKIE["warenkorb"]);
    
    $ware = \array_diff($ware, [$id]);
    foreach ($ware as $w ){
    $warenkorb .=" ".$w." ";
}

setcookie("warenkorb",$warenkorb,time()+(86400*30)); 
}
header("Location: http://localhost/PhpProject/index.php", true, 301);
?>