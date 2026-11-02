<!-- <?php
  if(isset($_POST["password"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' ");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("location: admin/admin.php");
      }
      else{
        echo "<script>alert('password salah');</script>";
      }
    }
    else{
      echo
      "<script>alert('akun tidak terdaftar');</script>";
    }

  }


?> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>kasir</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <?php 
	?>
    <div class="center">
      <h1>Login</h1>
      <form action="cek_login.php" method="POST">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">lupa Password?</div>
        <input type="submit" value="Login" >
        <div class="signup_link">
          belum punya akun? <a href="daftar.php">Daftar</a>
        </div>
      </form>
    </div>

  </body>
</html>
