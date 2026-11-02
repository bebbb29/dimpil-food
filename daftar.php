
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>register</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="center">
      <h1>register</h1>
      <form action="cek_daftar.php" method="POST">
        <div class="txt_field">
          <input type="text" id="username" name="username" required>
          <span></span>
          <label for="username"  >Username</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required>
          <span></span>
          <label for="password">Password</label>
        </div>
        <div class="txt_field">
          <input type="password" id="confirmpass" name="confirmpass"required>
          <span></span>
          <label for="confirmpass">konfirmasi Password</label>
        </div>
        
        <input type="submit" name="submit" value="daftar">
        <div class="signup_link">
          sudah punya akun? <a href="index.php">login</a>
        </div>
      </form>
    </div>

  </body>
</html>
