
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
  <header>
    <?php include 'header.php'?>
  </header>
      
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