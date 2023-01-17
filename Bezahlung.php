
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>

</head>
<body>
    <header>
    <?php include 'header.php'?>
</header>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            

          <?php 
          $servername="db";
          $username="root";
          $password="example";
          $dbname = "Webshop";
          $preis =$_POST['preis'];
          $wareAll =$_POST['wareAll'];
          
          $connection = mysqli_connect($servername,$username,"example",$dbname);
          if(!$connection)
          {
              die("connection failed: ".mysqli_connect_error());
          }
            
              $sql = "Select * FROM User Where username="."'".$usern."'"; 
              $result = mysqli_query($connection,$sql);
              if(mysqli_num_rows($result)>0){
                  while($row = mysqli_fetch_assoc($result))
                  {
                      $id=$row['id'];
                      $vn=$row['vorname'];
                      $nn=$row['nachname'];
                      $adresse=$row['adresse'];
                      $plz=$row['plz'];
                      $produkte=$row['produkte'];
                  }
                }          
                echo "<form method='post' class='container' action='BestellungAdd.php' >";
                echo "<div class='form-outline mb-4' >";
                echo "<label id='error'></label>";
                echo "</div>";
                echo "<div class='form-outline mb-4' >";
                echo "<label>Vorname</label><br>";
                echo "<input style='border: rgb(21, 89, 167) 2px solid;' type='text' id='vn' name='vn' value='".$vn."'><br>";
                echo "<label>Nachname</label><br>";
                echo "<input style='border: rgb(21, 89, 167) 2px solid;' type='text' id='nn' name='nn' value='".$nn."'><br>";
                echo "<label>Lieferaddresse</label><br>";
                echo "<input style='border: rgb(21, 89, 167) 2px solid;' type='text' id='adress' name='adress' value='".$adresse."'><br>";
                echo "<label>Plz</label><br>";
                echo "<input style='border: rgb(21, 89, 167) 2px solid;' type='text' id='plz' name='plz' value='".$plz."'><br>";
                echo "<label>Preis in €</label><br>";
                echo "<input style='border: rgb(21, 89, 167) 2px solid;' type='text' id='preis' readonly='readonly' name='preis' value='".$preis."'><br>";
                echo "<label>Zahlungsart</label><br>";
                echo "<input style='border: rgb(21, 89, 167) 2px solid;' type='text' id='zahlung' name='zahlung' value='".$zahlung."'><br>";
                echo "<input value='".$wareAll."' class='btn btn-primary' name='wareAll' type='hidden'>";
                echo "<input value='".$preis."' class='btn btn-primary' name='preis' type='hidden'>";
                echo "<input value='".$usern."' class='btn btn-primary' name='user' type='hidden'>";
                
          ?>
           
              </div>
             <div class="form-outline mb-4">
                <?php 
                $id=$_POST['id'];
                $name=$_POST['name'];
                 echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
                 echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
                ?>
                
            </div>
            <input class="btn btn-primary btn-lg btn-block"  value='Bezahlen' type="submit">
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>