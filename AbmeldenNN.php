<?php 
setcookie("account","user",time()-(86400*30),"/PhpProject");
setcookie("account","admin",time()-(86400*30),"/PhpProject");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D-shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>model-viewer {width: 100px; height: 100px; margin:0,auto;}</style>
    <script>
      function GetData()
      {
      
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange =function()
              {
                  if(this.readyState == 4 && this.status == 200)
                  {
                      document.getElementById("txtHint").innerHTML=this.responseText;
                  }
                  else
                  {
                      document.getElementById("txtHint").innerHTML=this.statusText;
                  }
              };
              xmlhttp.open("GET", "gethint.php?q="+str, true);
              xmlhttp.send();
      }
       
  </script>
</head>
<body> 
  <?php include 'header.php'?>
    <main>
      <div class="row container-fluid" >
        <?php include 'cards.php';?>
    </div>

     <!-- </div>
          <model-viewer alt="Neil Armstrong's Spacesuit from the Smithsonian Digitization Programs Office and National Air and Space Museum" src="glados.glb" camera-controls touch-action="pan-y"></model-viewer>
      </div> 
    -->
    </main> 
  
    <footer>

    </footer>
</body>
</html>