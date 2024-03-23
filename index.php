<?php
session_start();
include 'connect/connect.php';

$connection = new Connection();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .login{
            margin-left:10px;
        }

        .card{
            margin-top: 15px;
            padding-left:18px;
        }
        
        .banner{
          height: 60vh;
          background:  url('bg/tmpp.png');
          background-size: cover;
          background-position: center;
        }

      
    </style>
</head>
<body>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #6DA4AA;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: white">Website Galery Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="album.php", style="color: white">Album</a>
        </li>
        <li class="nav-item">
          <a href="foto.php "class="nav-link" style="color: white">Foto</a>
        </li>
          </ul>
        </li>
      </ul>
      <div class="login">
        <a href="register.php" class="btn btn-outline-light" type="submit">Daftar</a>
     </div>
     <div class="login">
        <a href="login.php" class="btn btn-outline-light" type="submit">login</a>
     </div>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid banner">
  <div class="container banner-content col-ig-6">
    <div class="text-center">

    </div>
  </div>
</div>

<div class="container" >
  <div class="row">
    <?php 
      $query = mysqli_query($connection->conn, "SELECT * FROM foto");
      while($data = mysqli_fetch_array($query)){
     ?>
   
     <div class="col-md-4 mt-2 " >
        <div class="card">
          <img style="height:12rem; border-radius: 10px;" src="img/<?php echo $data['LokasiFile']?>" class="card-img-top" title="<?php echo $data['JudulFoto']?>">
          <div class="card-footer text-center">
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
</div>



    

</div>
<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom" style="background-color:#6DA4AA">
    <p>&copy; Tugas UKK | Al Anisa Maharani </p>
</footer>

<script type="text/javascript" src="bootstrap.bundle.min.js"></script>

</body>
</html>