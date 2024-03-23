<?php
include '../connect/connect_album.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        .login{
            margin-left:10px;
        }

        .card{
            margin-top: 15px;
            padding-left:18px;
        }

        .card-body{
          background-color:;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:#6DA4AA;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: white">Website Galery Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a href="home.php "class="nav-link" style="color: white">Home</a>
        </li>
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
        <a href="../logout.php" class="btn btn-outline-light" type="submit">Keluar</a>
     </div>
      </div>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
           <div class="card mt-2">
            <div class="card-header">Tambah Album</div>
            <div class="card-body">
                <form action="../connect/connect_album.php" method="POST">
                    <label class="form-label">Nama Album</label>
                    <input type="text" name="NamaAlbum" class="form-control" required>
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="Deskripsi" required></textarea>
                    <button type="submit" class="btn btn-primary mt-2" name="tambahdata"> Tambah Data</button>
                </form>
            </div>
           </div>
        </div>

        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">
                    Data Album
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Album</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          $UserID = $_SESSION['UserID'];
                          $sql = mysqli_query($connection->conn, "SELECT * FROM album WHERE UserID ='$UserID'");
                          while($data = mysqli_fetch_array($sql)){
                          ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['NamaAlbum'] ?></td>
                                <td><?php echo $data['Deskripsi'] ?></td>
                                <td><?php echo $data['TanggalDibuat'] ?></td>
                                <td>
                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['AlbumID'] ?>">
                                     Edit
                                   </button>

                          <div class="modal fade" id="edit<?php echo $data['AlbumID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                            <div class="modal-content">
                             <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          <div class="modal-body">
                            <form action="../connect/connect_album.php" method="POST">
                              <input type="hidden" name="albumid" value="<?php echo $data['AlbumID'] ?>">
                              <label class="form-label">Nama Album</label>
                              <input type="text" name="namaalbum" value="<?php echo $data['NamaAlbum'] ?>" class="form-control" required>
                              <label class="form-label">Deskripsi</label>
                              <textarea class="form-control" name="deskripsi" required>
                               <?php echo $data['Deskripsi'] ?>
                              </textarea>
  
                          </div>
                           <div class="modal-footer">
                            <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                            </form>
                          </div>
                         </div>
                       </div>
                     </div>
                     <script>
                        var myModal = new bootstrap.Modal(document.getElementById('edit<?php echo $data['AlbumID']?>'));
                    </script>

                     <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['AlbumID'] ?>">Hapus</button>

                          <div class="modal fade" id="hapus<?php echo $data['AlbumID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                            <div class="modal-content">
                             <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          <div class="modal-body">
                            <form action="../connect/connect_album.php" method="POST">
                              <input type="hidden" name="albumid" value="<?php echo $data['AlbumID'] ?>">
                              Apakah Anda Yakin Akan Menghapus Album Tersebut <strong><?php  echo $data['NamaAlbum'] ?></strong> ?
  
                          </div>
                           <div class="modal-footer">
                            <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                            </form>
                          </div>
                         </div>
                       </div>
                     </div>
                            </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom" style="background-color:#6DA4AA">
    <p>&copy; Tugas UKK | Al Anisa Maharani</p>
</footer>

<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>