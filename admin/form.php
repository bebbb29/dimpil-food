<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Produk</title>
</head>
<body>
    <div>
        <h1>FORMULIR PRODUK</h1>
        <form action="proses_form.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="id_prd">Kode Menu:</label>
                <input type="number" name="id_menu" id="id_menu" required>
            </div>
            <div>
                <label for="image_prd">Image : </label>
                <input type="file" name="image_menu" id = "image_prd" accept=".jpg, .jpeg, .png" value="" required>
            </div>
            <div>
                <label for="nama_prd">Nama Menu:</label>
                <input type="text" name="nama_menu" id="nama_prd" required>
            </div>      
            <div>
                <label for="kategori_menu">Kategori Menu:</label>
                <input type="text" name="kategori_menu" id="kategori_menu" required>
            </div>    
            <div>
                <label for="harga_menu">harga Menu:</label>
                <input type="text" name="harga_menu" id="harga_menu" required>
            </div>   
            <button type="submit">Bayar</button>
        </form>
    </div>
</body>
</html>