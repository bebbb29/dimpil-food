<?php
@require '../koneksi.php';
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
    
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <!-- nav start -->
    <?php
      $select_rows = mysqli_query($koneksi, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

    ?>
    <nav class="navbar">
        <a href="#" class="navbar-logo"><span>DIMPIL</span>FOOD </a>
       
        <div class="navbar-nav">
            <!-- <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">kontak</a>
            <a href="../logout.php">Logout</a> -->
        </div>
    
        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i><span><?php echo $row_count; ?></span></a>
            <a href="#" id="burger-menu"><i data-feather="menu"></i></a>
        </div>
        <!-- searc start -->
            <div class="search-form">
                <input type="search"  id="search-box" placeholder="cari menu">
                <label for="search-box"><i data-feather="search"></i></label>
            </div>
        <!-- searc end-->


    </nav>
    <!-- nav end -->
    
    <!-- hero section start -->
    <section class="hero" id="home">
        <main class="content">
            <H1>Silahkan Bayar Pesanan Anda</H1>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, iusto.</p> -->
            <a href="pesan.php" class="cta">lihat menu</a>
        </main>
    </section>
    <!-- hero section end -->

    <!-- about section start -->
    <!-- <section class="about" id="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="../img/seafoodbg.jpg" alt="tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa memilih Resto Kami</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, aperiam.</p>
            </div>
        </div>
    </section> -->


    <!-- about secction end -->
    <!-- menu section start -->

    <!-- <section class="menu" id="menu">
        <h2><span>Menu</span>Kami</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, quod!</p>
        <div class="row">
            <div class="menu-card">
                <img src="../img/menu2.jpg" alt="menu">
                <h3 class="menu-card-title"> Menu</h3>
                <p class="menu-card-price">Rp.20 000</p>
            </div>
            <div class="menu-card">
                <img src="../img/menu2.jpg" alt="menu">
                <h3 class="menu-card-title"> Menu</h3>
                <p class="menu-card-price">Rp.20 000</p>
            </div>
            <div class="menu-card">
                <img src="../img/menu2.jpg" alt="menu">
                <h3 class="menu-card-title"> Menu</h3>
                <p class="menu-card-price">Rp.20 000</p>
            </div>
            <div class="menu-card">
                <img src="../img/menu2.jpg" alt="menu">
                <h3 class="menu-card-title"> Menu</h3>
                <p class="menu-card-price">Rp.20 000</p>
            </div>
        </div>
    </section> -->

    <!-- menu section end -->
    <!-- contact start -->
  
    
    <footer>
        <div class="social">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
        </div>
        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">kontak</a>
        </div>
        <div class="credit">
            <p> dibuat oleh<a href="#">kelompok kami</a></p>
        </div>
    </footer>

    <script>
      feather.replace();
    </script>

    <script src="../js/script.js">

    </script>
</body>
</html>