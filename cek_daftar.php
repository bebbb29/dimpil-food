<?php

require_once ("koneksi.php");

if(isset($_POST['submit'])){
  $username =$_POST["username"];
  $password = $_POST["password"];
  $confirmpass = $_POST["confirmpass"];
  $duplicate = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' ");
  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('username siap digunakan');</script>";
  } else {
    if($password == $confirmpass){
       $query = "INSERT INTO user (username, password) VALUES ('$username','$password')";
      mysqli_query($koneksi,$query);
      echo
      "<script>
      alert('registrasi succesfull');
      window.location='index.php';
       </script>";
  } else {
    echo "<script> alert('password tidak ditemukan');</script>";
  }
}
}

?>