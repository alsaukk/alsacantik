<?php
require 'connect/connect.php';

$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->registration($_POST["username"], $_POST['password'], $_POST['email'], $_POST['nama_lengkap'], $_POST['alamat']);

  if($result == 1){
    echo
    "<script> alert('Registration Successful') </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Email dan password sudah ada'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
<style>
 {
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: 'Poppins', Sans-serif;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #000;
        }
        .wrapper{
            position: relative;
            width: 400px;
            height: 500px;
            background: #000;
            box-shadow: 0 0 50px #0ef;
            border-radius:20px;
            padding: 40px
        }
        .form-wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
            width:100%;
            height: 100%;
        }

        .wrapper p{
            color: white;
            text-align:center;
            margin-top: 5px;
        }

        .wrapper a{
            color: #0ef;
        }

        h2{
            font-size: 30px;
            color: #fff;
            text-align:center;

        }

        .input-group{
            position: relative;
            margin: 30px 0;
            border-bottom: 2px solid #fff;

        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            font-size:16px;
            color: #fff;
            pointer-events:none;
            transition: .5s;

        }

        .input-group input{
            width: 320px;
            height: 40px;
            font-size: 16px;
            color: #fff;
            padding: 0 5px;
            background: transparent;
            border:none;
            outline:none;

        }

        .input-group input:focus~label,
        .input-group input:valid~label {
            top: -5px;

        }

        .remember{
            margin: -5px 0 15px 5px;
        }

        .remember label{
            color:#fff;
            font-size: 14px;
        }

        .remember label input{
            accent-color: #0ef;
        }

        button{
            position: relative;
            width: 100%;
            height: 40px;
            background: #0ef;
            box-shadow: 0 0 10px #0ef;
            font-size:16px;
            color: #000;
            font-weight: 500;
            cursor:pointer;
            border-radius: 30px;
            border: none;
            outline: none;
        }

        .wrapper button:hover{
            background-color: #fff;
        }

        .signUp-link{
            font-size: 14px;
            text-align: center;
            margin: 15px 0;
        }
        .signUp-link p{
            color: #fff;
        }
        .signUp-link p a {
            color: #0ef;
            text-decoration: none;
            font-weight: 500;
        }

        .signUp-link p a:hover{
           text-decoration: underline;
        }
</style>
</head>
    
<body>
<div class="wrapper">
  <h2>Registration</h2>
  <form class="" action="" method="post" autocomplete="off">
    <div class="input-group">
    <input type="text" name="username" required value=""><br>
    <label for="">Username</label>
    </div>
    <div class="input-group">
    <input type="password" name="password" required value=""><br>
    <label for="">Password</label>
    </div>
    <div class="input-group">
    <input type="email" name="email" required value=""><br>
    <label for="">Email</label>
    </div>
    <div class="input-group">
    <input type="text" name="nama_lengkap" required value=""><br>
    <label for="">Nama Lengkap</label>
    </div>
    <div class="input-group">
    <input type="text" name="alamat" required value=""><br>
    <label for="">Alamat</label>
    </div>
    <center><button type="submit" name="submit">Register</button></center>
    <p class= "login-register-text"> Kembali ke Halaman<a href= "login.php">Login</a></p>
    </div>
</form>
</body>
</html>
