<?php
if(isset($_COOKIE["account"])){
    $pieces = explode(",", $_COOKIE["account"]);
    $status = $pieces[0];
    $usern = $pieces[1];
} 
if (!isset($_COOKIE["account"]))
{
echo "<header>";
echo "<nav class='navbar navbar-expand-sm navbar-dark' style='background-color: blue;'>";
echo "<div class='container-fluid'>";
echo "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#BurgerOpen' aria-controls='BurgerOpen' aria-expanded='false' aria-label='Toggle navigation'>";
echo "<span class='navbar-toggler-icon '></span>";
echo "</button>";
echo " <a class='navbar-brand' href='index.php'>3D-shop</a>";   
echo "<div class='collapse navbar-collapse'>";  
echo "<ul class='navbar-nav me-auto '>";    
echo "<li class='nav-item'>";      
echo "<a class='nav-link active' aria-current='page' href='#'> Mein Warenkorb<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
echo "</li>";      
echo "<li class='nav-item'>";        
echo "<a class='nav-link active' aria-current='page' href='login.php'> Anmelden<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
echo "</li>";      
echo "</ul>";    
echo "</div>";    
echo "</div>";
echo "</nav>";
echo "<div class='collapse navbar-collapse ' style='background-color:rgb(68, 4, 128); width: 10rem; border-radius: 2px;' id='BurgerOpen'>";
echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
echo "<li class='nav-item'>";  
echo " <a class='nav-link active ' style='color: white;' aria-current='page' href='#'> Mein Warenkorb<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: rgb(14, 3, 65);' ></i></a>";   
echo "</li>";  
echo "</ul>";
echo "</div>";
echo "</header>";
}

if ( $status == "user")
{
    echo "<header>";
    echo "<nav class='navbar navbar-expand-sm navbar-dark' style='background-color: blue;'>";
    echo "<div class='container-fluid'>";
    echo "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#BurgerOpen' aria-controls='BurgerOpen' aria-expanded='false' aria-label='Toggle navigation'>";
    echo "<span class='navbar-toggler-icon '></span>";
    echo "</button>";
    echo " <a class='navbar-brand' href='index.php'>3D-shop</a>";   
    echo "<div class='collapse navbar-collapse'>";  
    echo "<ul class='navbar-nav me-auto '>";    
    echo "<li class='nav-item'>";      
    echo "<a class='nav-link active' aria-current='page' href='#'> Mein Warenkorb<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>";      
    echo "<li class='nav-item'>";        
    echo "<a class='nav-link active' aria-current='page' href='AbmeldenNN.php'> Abmelden<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>"; 
    echo "<li class='nav-item'>";        
    echo "<a class='nav-link active' aria-current='page' href='Bestellung.php'>Meine Bestellungen<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>";     
    echo "</ul>";    
    echo "</div>";    
    echo "</div>";
    echo "</nav>";
    echo "<div class='collapse navbar-collapse ' style='background-color:rgb(68, 4, 128); width: 10rem; border-radius: 2px;' id='BurgerOpen'>";
    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
    echo "<li class='nav-item'>";  
    echo " <a class='nav-link active ' style='color: white;' aria-current='page' href='#'> Mein Warenkorb<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: rgb(14, 3, 65);' ></i></a>";   
    echo "</li>";  
    echo "</ul>";
    echo "</div>";
    echo "</header>";

}

if ( $status == "admin")
{
    echo "<header>";
    echo "<nav class='navbar navbar-expand-sm navbar-dark' style='background-color: blue;'>";
    echo "<div class='container-fluid'>";
    echo "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#BurgerOpen' aria-controls='BurgerOpen' aria-expanded='false' aria-label='Toggle navigation'>";
    echo "<span class='navbar-toggler-icon '></span>";
    echo "</button>";
    echo " <a class='navbar-brand' href='index.php'>3D-shop</a>";   
    echo "<div class='collapse navbar-collapse'>";  
    echo "<ul class='navbar-nav me-auto '>";    
    echo "<li class='nav-item'>";      
    echo "<a class='nav-link active' aria-current='page' href='#'> Mein Warenkorb<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>";      
    echo "<li class='nav-item'>";        
    echo "<a class='nav-link active' aria-current='page' href='AbmeldenNN.php'> Abmelden<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>";
    echo "<li class='nav-item'>";        
    echo "<a class='nav-link active' aria-current='page' href='Bestellung.php'>Einkäufe<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>";
    echo "<li class='nav-item'>";        
    echo "<a class='nav-link active' aria-current='page' href='Produkt.php'>Produkte<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: blueviolet;' ></i></a>";        
    echo "</li>";     
    echo "</ul>";    
    echo "</div>";    
    echo "</div>";
    echo "</nav>";
    echo "<div class='collapse navbar-collapse ' style='background-color:rgb(68, 4, 128); width: 10rem; border-radius: 2px;' id='BurgerOpen'>";
    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
    echo "<li class='nav-item'>";  
    echo " <a class='nav-link active ' style='color: white;' aria-current='page' href='#'> Mein Warenkorb<i class='bi bi-bag-check-fill' style='font-size: 1rem; color: rgb(14, 3, 65);' ></i></a>";   
    echo "</li>";  
    echo "</ul>";
    echo "</div>";
    echo "</header>";

}
?>
