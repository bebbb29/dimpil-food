<?php
@include '../koneksi.php';
if(isset($_POST['add_menu'])){
	$p_name = $_POST['p_name'];
	$p_price = $_POST['p_price'];
	$p_img = $_FILES['p_img']['name'];
	$p_img_tmp_name = $_FILES['p_img']['tmp_name'];
	$p_img_folder = 'uploaded_img/'.$p_img;

	$insert_query = mysqli_query($koneksi, "INSERT INTO `menu`(name, price, img) VALUES
	('$p_name','$p_price','$p_img')") or die('query failed');

	if($insert_query){
		move_uploaded_file($p_img_tmp_name,$p_img_folder);
		$message[] = 'tambah menu berhasil';
		header('location:admin.php');
	}else{
		$message[] = 'tambah menu gagal';
		header('location:admin.php');
	}
};
if(isset($_GET['delete'])){
	$delete_id = $_GET['delete'];
	$delete_query = mysqli_query($koneksi, "DELETE FROM `menu` WHERE id = $delete_id ")or die('query failed');
	if($delete_query){
		$message[] = 'menu telah di hapus';
		header('location:admin.php');
	}else{
		$message[] = 'menu tidak bisa dihapus';
		header('location:admin.php');
	};
};
if(isset($_POST['update_menu'])){
	$update_p_id = $_POST['update_p_id'];
   	$update_p_name = $_POST['update_p_name'];
   	$update_p_price = $_POST['update_p_price'];
   	$update_p_img = $_FILES['update_p_img']['name'];
   	$update_p_img_tmp_name = $_FILES['update_p_img']['tmp_name'];
   	$update_p_img_folder = 'uploaded_img/'.$update_p_img;

	$update_query = mysqli_query($koneksi, "UPDATE `menu` SET name = '$update_p_name', price = '$update_p_price', img = '$update_p_img' WHERE id = '$update_p_id'");

	if($update_query){
	move_uploaded_file($update_p_img_tmp_name, $update_p_img_folder);
	  	$message[] = 'product updated succesfully';
			header('location:admin.php');
	}else{
		$message[] = 'product could not be updated';
		  header('location:admin.php');
	   }
	

}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;1,200&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

	<?php
		if(isset($message)){
			foreach($message as $message){
				echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = none;"> </i></div>';
			};
		};
	?>
	<!-- navbar -->
	<?php require "header-admin.php"  ?>
	<!-- tambah menu -->
	<div class="container">
		<section>
			<form action="" method="POST" class="add-menu-form" enctype="multipart/form-data">
				<h3>Tambah Menu</h3>
				<input type="text" name="p_name" placeholder="masukan nama menu" class="box" required>
				<input type="number" name="p_price" placeholder="masukan harga menu" class="box" required>
				<input type="file" name="p_img" accept="image/png, image/jpg, image/jpeg" class="box" required>
				<input type="submit" name="add_menu" value="tambahkan menu" class="btn" required>
			</form>
		</section>

		<!-- daftar menu -->
		<section class="display-product-table">
			<table>
				<thead>
					<th>gambar menu</th>
					<th>nama menu</th>
					<th>Harga Menu</th>
					<th>aksi</th>
				</thead>
				<tbody>
					<?php
						$select_menu = mysqli_query($koneksi, "SELECT * FROM `menu`");
						if(mysqli_num_rows($select_menu)> 0){
							while($row = mysqli_fetch_assoc($select_menu)){
					?>
					<tr>
						<td><img src="uploaded_img/<?php echo $row['img']; ?>" height="200" alt=""></td>
						<td><?php echo $row['name']; ?></td>
						<td>Rp <?php echo $row['price']; ?></td>
						<td>
						<a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> hapus </a>
               			<a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> edit </a>
						</td>
					</tr>

					<?php			
							};
						}else{
							echo "<div class='empty'>tidak Ada menu ditambahkan</div>";
						}
					
					?>
				</tbody>
			</table>
		</section>
		<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($koneksi, "SELECT * FROM `menu` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['img']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_img" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="edit menu" name="update_menu" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>


	</div>
	<script src="../js/script.js" >

	</script>
</body>
</html>