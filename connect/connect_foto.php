<?php
session_start();
include 'connect.php';

    $connection = new connection();

if(isset($_POST['tambahfoto'])) {
    $JudulFoto = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['DeskripsiFoto'];
    $TanggalUnggah = date('Y-m-d');
    $AlbumID = $_POST['AlbumID'];
    $UserID = $_SESSION['UserID'];
    $Foto = $_FILES['LokasiFile']['name'];
    $tmp = $_FILES['LokasiFile']['tmp_name'];
    $lokasi = '../img/';
    $NamaFoto = rand().'-'.$Foto;

    move_uploaded_file($tmp, '../img/'.$NamaFoto);

    $sql = mysqli_query($connection->conn, "INSERT INTO foto VALUES('','$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$NamaFoto','$AlbumID','$UserID')");
    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/foto.php';
    </script>";
}

if(isset($_POST['edit'])){
  $FotoID = $_POST['FotoID'];
  $JudulFoto = $_POST['JudulFoto'];
  $DeskripsiFoto = $_POST['DeskripsiFoto'];
  $TanggalUnggah = date('Y-m-d');
  $AlbumID = $_POST['AlbumID'];
  $UserID = $_SESSION['UserID'];
  $Foto = $_FILES['LokasiFile']['name'];
  $tmp = $_FILES['LokasiFile']['tmp_name'];
  $lokasi = '../img/';
  $NamaFoto = rand().'-'.$Foto;


    if ($Foto == null) {
        $sql = mysqli_query($connection->conn, "UPDATE foto SET judulfoto='$JudulFoto', deskripsifoto='$DeskripsiFoto', tanggalunggah='$TanggalUnggah', AlbumID='$AlbumID' WHERE FotoID='$FotoID'");
    }else{
        $query = mysqli_query($connection->conn, "SELECT * FROM foto WHERE FotoID ='$FotoID'");
        $data = mysqli_fetch_array($query);
          if(is_file('../img/'.$data['LokasiFile'])) {
            unlink('../img'.$data['LokasiFile']);
          }
          move_uploaded_file($tmp, $lokasi.$NamaFoto);
          $sql = mysqli_query($connection->conn, "UPDATE foto SET JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', TanggalUnggah='$TanggalUnggah', LokasiFile='$NamaFoto', AlbumID='$AlbumID' WHERE FotoID='$FotoID'");
    }
    echo "<script>
    alert('Data berhasil Di Update!');
    location.href='../admin/foto.php';
    </script>";
}

if(isset($_POST['hapus'])){
    $FotoID = $_POST['FotoID'];
    $query = mysqli_query($connection->conn, "SELECT * FROM foto WHERE FotoID='$FotoID'");
        $data = mysqli_fetch_array($query);
          if(is_file('../img/'.$data['lokasifile'])) {
            unlink('../img'.$data['lokasifile']);
          }

          $sql = mysqli_query($connection->conn, "DELETE FROM foto WHERE FotoID ='$FotoID'");

          echo "<script>
    alert('Data berhasil Di hapus!');
    location.href='../admin/foto.php';
    </script>";
}
