<?php
session_start();
include'connect.php';

$connection = new Connection();

$FotoID = $_POST['FotoID'];
$UserID = $_SESSION['UserID'];
$IsiKomentar = $_POST['IsiKomentar'];
$TanggalKomentar = date('y-m-d');

$query= mysqli_query($connection->conn, "INSERT INTO komentarfoto VALUES('','$FotoID','$UserID','$IsiKomentar','$TanggalKomentar')");

echo"<script>
location.href='../admin/index.php';
</script>";

?>