<?php
    @include '../koneksi.php';
    if(isset($_POST['add_to_cart'])){

        $menu_name = $_POST['menu_name'];
        $menu_price = $_POST['menu_price'];
        $menu_img = $_POST['menu_img'];
        $menu_quantity = 1;
     
        $select_cart = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE name = '$menu_name'");
     
        if(mysqli_num_rows($select_cart) > 0){
           $message[] = 'product already added to cart';
           header('location:pesan.php');
        }else{
           $insert_menu = mysqli_query($koneksi, "INSERT INTO `cart`(name, price, img, quantity) VALUES('$menu_name', '$menu_price', '$menu_img', '$menu_quantity')");
           $message[] = 'product added to cart succesfully';
           header('location:pesan.php');
        }
     
     }
     
     ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pembayaran</title>
    <!-- font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;1,200&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!-- icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<?php
      $select_rows = mysqli_query($koneksi, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

    ?>
    
    <?php include '../admin/header-admin.php'; ?>

    <!-- fungsi pesan -->
    <?php
		if(isset($message)){
			foreach($message as $message){
				echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = none;"> </i></div>';
			};
		};
	?>

    <div class="container">
        <section class="products">
            <h1 class="heading">Menu Kami</h1>
            <div class="box-container">
                <?php
                    $select_menu = mysqli_query($koneksi, "SELECT * FROM `menu`");
                    if(mysqli_num_rows($select_menu) > 0){
                       while($fetch_menu = mysqli_fetch_assoc($select_menu)){
                
                ?>
                    <form action="" method="post">
         <div class="box">
            <img src="../admin/uploaded_img/<?php echo $fetch_menu['img']; ?>" height="200" width="300" alt="">
            <h3><?php echo $fetch_menu['name']; ?></h3>
            <div class="price">Rp <?php echo $fetch_menu['price']; ?></div>
            <input type="hidden" name="menu_name" value="<?php echo $fetch_menu['name']; ?>">
            <input type="hidden" name="menu_price" value="<?php echo $fetch_menu['price']; ?>">
            <input type="hidden" name="menu_img" value="<?php echo $fetch_menu['img']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>


                <?php
                   };
                };
                ?>
            </div>
        </section>
    </div>





    <script>
      feather.replace();
    </script>
    <script src="../js/script.js">

</script>
</body>
</html>