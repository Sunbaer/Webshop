<?php 
$servername="db";
$username="root";
$password="example";
$dbname = "Webshop";
$name="";
echo "<p></p>";
$connection = mysqli_connect($servername,$username,$password,$dbname);
if(!$connection){
    die("connection failed: ".mysqli_connect_error());
}
    //Selcting data from produkt
if ($Ki == NULL){
    $sql = "Select * FROM Produkt"; 
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {   
            // selecting from product id name and preis in variables
            $id = $row["id"];
            $name =$row["name"];
            $preis =$row["preis"];
            
            echo "<div  class='card col-2'style='border:2px solid #227bd4; width:17.3rem;'>";
            echo "<br>";
            $i =0;
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
                $i++;
                // using the variables for the cards
                }
               echo "  <img src=".$resources." class='card-img-top'>";
                echo "  <div class='card-body'>";
                echo "  <h5 class='card-title'>".$name."</h5>";
                echo "  <p class='card-text'>";
                echo "  <p>Price: <strong id='price'>".$preis."€</strong></p>";
            }   
            //changing the variable with Kid because Kid for kategorieId
            $sqlKid = "Select kategorieId FROM Produkt WHERE id=".$id; 
            $resultKid = mysqli_query($connection,$sqlKid);
            if(mysqli_num_rows($resultKid)>0){
                while($row = mysqli_fetch_assoc($resultKid))
                { 
                    //saveing the current card the kategorieId
                    $Kid = $row["kategorieId"];
                    $kid= explode(",",$Kid);
                    
                } 
            }
            //
            $i=1;
            foreach($kid as $Kn){
              //serching the kategorieId in kategorie
                $sqlK = "Select * FROM Kategorie Where id=".$Kn; 
                $resultK = mysqli_query($connection,$sqlK);
                if(mysqli_num_rows($resultK)>0)
                {
                    
                    while($row = mysqli_fetch_assoc($resultK))
                    { 
                     if ($i==1)
                     {
                        $ame .=$row["name"];
                     }
                     else
                     {
                        $ame .=", ".$row["name"];
                     }
                     $i++;
                    }
                }   

            } echo "<p>Kategorie:<strong id='kategorie'>".$ame."</strong></p>";  
              $ame="";  
            echo "<form action='details.php' method='post'>";
            echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
            echo "<input value='Jetz genauere Details' class='btn btn-primary' type='Submit'>";
            echo "</form>";
            echo"</div>" ;
            echo "</div>";
        }    
         
    }
}
else{
    $sql = "Select * FROM Produkt"; 
    $result = mysqli_query($connection,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {   
            // selecting from product id name and preis in variables
            $id = $row["id"];
            $name =$row["name"];
            $preis =$row["preis"];
            $kategorieId=$row['kategorieId'];
           
            $i =0;
            //changing the variable with B because B for Bilder
            
            // Test if string contains the word 
            if(strpos($kategorieId, $Ki) !== false){
                echo "<div  class='card  col-2'style='width:17.3rem;'>";
                echo "<br>";
             $sqlB = "Select * FROM Bilder WHERE produktId=".$id; 
            $resultB = mysqli_query($connection,$sqlB);
            if(mysqli_num_rows($resultB)>0){
                while($row = mysqli_fetch_assoc($resultB))
                { 
                // saving the first Picture as view Picture
                if ($i==0){
                    $resources = $row["bildSource"];
                }
                $i++;
                // using the variables for the cards
                }
               echo "  <img src=".$resources." class='card-img-top'>";
                echo "  <div class='card-body'>";
                echo "  <h5 class='card-title'>".$name."</h5>";
                echo "  <p class='card-text'>";
                echo "  <p>Price: <strong id='price'>".$preis."€</strong></p>";
            }   
            //changing the variable with Kid because Kid for kategorieId
            $sqlKid = "Select kategorieId FROM Produkt WHERE id=".$id; 
            $resultKid = mysqli_query($connection,$sqlKid);
            if(mysqli_num_rows($resultKid)>0){
                while($row = mysqli_fetch_assoc($resultKid))
                { 
                    //saveing the current card the kategorieId
                    $Kid = $row["kategorieId"];
                    $kid= explode(",",$Kid);
                    
                } 
            }
            //
            $i=1;
            foreach($kid as $Kn){
              //serching the kategorieId in kategorie
                $sqlK = "Select * FROM Kategorie Where id=".$Kn; 
                $resultK = mysqli_query($connection,$sqlK);
                if(mysqli_num_rows($resultK)>0)
                {
                    
                    while($row = mysqli_fetch_assoc($resultK))
                    { 
                     if ($i==1)
                     {
                        $ame .=$row["name"];
                     }
                     else
                     {
                        $ame .=", ".$row["name"];
                     }
                     $i++;
                    }
                }   

            } echo "<p>Kategorie:<strong id='kategorie'>".$ame."</strong></p>";  
              $ame="";  
            echo "<form action='details.php' method='post'>";
            echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
            echo "<input value='Jetz genauere Details' class='btn btn-primary' type='Submit'>";
            echo "</form>";
            echo"</div>" ;
            echo "</div>";
            
            } 
           
        }    
        
         
    }
}
    
?>




