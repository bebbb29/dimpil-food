<?php
require_once(".php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST["id_menu"];
    $nama_produk = $_POST["nama_menu"];
    $gambar_produk = $_FILES["image_menu"]["name"];
    $gambarTmp = $_FILES["image_menu"]["tmp_name"];
    $kategori_produk = $_POST["kategori_menu"];
    $harga_produk = $_POST["harga_menu"];

    // Mendapatkan ekstensi file gambar yang diunggah
    $extension = pathinfo($gambar_menu, PATHINFO_EXTENSION);

    // Membuat nama file baru dengan menggabungkan nama produk dan ekstensi file gambar
    $newFileName = $nama_menu . "." . $extension;

    // Menyimpan file gambar dengan nama baru
    $targetDir = "uploads/";
    $targetPath = $targetDir . $newFileName;
    move_uploaded_file($gambarTmp, $targetPath);

    $sql = "INSERT INTO produk (id_prd, nama_prd, image_prd, deskripsi_prd, kategori_prd, harga_prd) VALUES ('$id_produk', '$nama_produk', '$newFileName', '$deskripsi_produk', '$kategori_produk', '$harga_produk')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: test.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Tutup koneksi ke database
$koneksi->close();
?>