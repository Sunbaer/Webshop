<?php
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";

$usern=$_POST["un"];
$passw=$_POST["pw"];

$connection = mysqli_connect($servername,$username,"example",$dbname);
if(!$connection)
{
    die("connection failed: ".mysqli_connect_error());
}
  
    $sql = "Select passwort,admin FROM User Where username="."'".$usern."'"; 
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {
            $pw = $row["passwort"];
            $isAdmin = $row["admin"];
        }
    }   
   if($passw == $pw){
        if($isAdmin==1){
            setcookie("account","admin".",".$usern,time()+(86400*30));  
        header("Location: https://martin-usta-md.me", true, 301);
        }
        else{
            setcookie("account","user".",".$usern,time()+(86400*30));  
        header("Location: https://martin-usta-md.me", true, 301);
        }
    exit();
    }
    else
    {

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
        echo "<section class=vh-100 style=background-color:#508bfc;>";
        echo"<div class='container py-5 h-100'>";
        echo"<div class='row d-flex justify-content-center align-items-center h-100'>";
        echo"<div class='col-12 col-md-8 col-lg-6 col-xl-5'>";
        echo"<div class='card shadow-2-strong' style='border-radius: 1rem;'>";
        echo"<div class='card-body p-5 text-center'>";                
        echo"<form method='post' action='checkData.php'>";                
        echo"<div class='form-outline mb-4' >";
        echo"<label id='error' style='color:red;'>Username oder Passwort ist falsch</label>";     
        echo"</div>"; 
        echo"<div class='form-outline mb-4'>";
        echo"<label class='form-label' >Username</label>";
        echo"<input type='text' name='un' id='un'  class='form-control form-control-lg' style='border: 2px solid rgb(21, 89, 167);' /> ";
        echo"</div>";
        echo"<div class='form-outline mb-4'>";
        echo"<label class='form-label'>Password</label>";
        echo"<input type='password' name='pw' id='pw' class='form-control form-control-lg' style='border: 2px solid rgb(21, 89, 167)' />";                   
        echo"</div>";
        echo"<button class='btn btn-primary btn-lg btn-block' onclick='GetData()' type='submit'>Login</button>"; 
        echo"</form>";
        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</div>";
        echo"</section>";
    }
?>

