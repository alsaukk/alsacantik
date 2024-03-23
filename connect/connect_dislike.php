<?php  
session_start();
include 'connect.php';
$FotoID = $_GET['FotoID'];
$UserID = $_SESSION['UserID'];

$connection = new Connection();

$Dislike = mysqli_query($connection->conn,"SELECT * FROM dislikefoto WHERE FotoID='$FotoID' AND UserID='$UserID'");

if (mysqli_num_rows($Dislike) == 1){
    while($row = mysqli_fetch_array($Dislike)){
        $DislikeID = $row['DislikeID'];
        $query = mysqli_query($connection->conn, "DELETE FROM dislikefoto WHERE DislikeID='$DislikeID'");

        echo "<script>
        location.href ='../admin/index.php';
        </script>";
    }
} else{
    $TanggalDislike = date('Y-m-d');
    $query = mysqli_query($connection->conn, "INSERT INTO dislikefoto VALUES('','$FotoID','$UserID','$TanggalDislike')");

    echo"<script>
    location.href = '../admin/index.php';
    </script>";
}

?>