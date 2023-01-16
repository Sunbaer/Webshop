
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
            
            <form method="post" action="addKommentar.php" >
            
            <div class="form-outline mb-4" >
                <label id="error"></label>
             
              </div>
            <div class="form-outline mb-4" >
                <label>Wie viel Sterne würden Sie uns geben</label><br>
                <input type="radio" id="1" name="stars" value="1">
                <label >1</label>
                <input type="radio" id="2" name="stars" value="2">
                <label >2</label>
                <input type="radio" id="3" name="stars" value="3">
                <label >3</label>
                <input type="radio" id="4" name="stars" value="4">
                <label >4</label>
                <input type="radio" id="5" name="stars" value="5">
                <label >5</label>
              </div>
             <div class="form-outline mb-4">
                <?php 
                $id=$_POST['id'];
                $name=$_POST['name'];
                 echo "<input value='".$id."' class='btn btn-primary' name='id' type='hidden'>";
                 echo "<input value='".$name."' class='btn btn-primary' name='name' type='hidden'>";
                ?>
                <label class="form-label">Ihr Kommentar ist uns wichtig</label>
                <textarea name="km" id="km" class="form-control form-control-lg" style="border: 2px solid rgb(21, 89, 167);"></textarea>
            </div>
            <input class="btn btn-primary btn-lg btn-block"  value='Bestätigen' type="submit">
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>