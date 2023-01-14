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

    <script>
        function GetData()
        {
            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange =function()
                    {
                        if(this.readyState == 4 && this.status == 200)
                        {
                            document.getElementById("error").innerHTML=this.responseText;
                        }
                    
                    };
            xmlhttp.open("GET", "checkData.php", true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            
                <form method="post" action="checkData.php" >
            
            <div class="form-outline mb-4" >
                <label id="error"></label>
             
              </div>
            <div class="form-outline mb-4" >
                <label id="error"></label>
                <label class="form-label" >Username</label>
                <input type="text" name="un" id="un"  class="form-control form-control-lg" style="border: 2px solid rgb(21, 89, 167);" /> 
              </div>
             <div class="form-outline mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="pw" id="pw" class="form-control form-control-lg" style="border: 2px solid rgb(21, 89, 167);"  />
                
            </div>
            <button class="btn btn-primary btn-lg btn-block" onclick="GetData()" type="submit">Login</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>