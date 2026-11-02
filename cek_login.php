<?php
include "koneksi.php";
  if(isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' && password ='$password' ");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("location: user/home.php");
      }
      else{
        echo "<script>alert('password salah');</script>";
      }
    }
    else{
      echo
      "<script>alert('akun tidak terdaftar');</script>";
      echo "<script>window.location='index.php';</script>";

    }

  }


?>
