<?php
include '../koneksi.php';

// Fetch order details from the database
$order_query = mysqli_query($koneksi, "SELECT * FROM `order` ORDER BY id DESC LIMIT 1");
if(mysqli_num_rows($order_query) > 0) {
    $order_details = mysqli_fetch_assoc($order_query);
    $customer_name = $order_details['name'];
    $payment_method = $order_details['method'];
    $total_products = $order_details['total_products'];
    $total_price = $order_details['total_price'];
} else {
    // Handle the case when no order is found
    echo "No order found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Invoice</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/invoice.css">

</head>
<body>

<?php include '../admin/header-admin.php'; ?>

<div class="container">

   <section class="invoice">

      <h1 class="heading">Invoice</h1>

      <div class="invoice-details">
         <div>
            <span>Customer Name: <?= $customer_name; ?></span><br>
            <span>Payment Method: <?= $payment_method; ?></span>
         </div>
         <div>
            <span>Order Date: <?= date('Y-m-d H:i:s'); ?></span>
         </div>
      </div>

      <div class="product-details">
         <h2>Ordered Products</h2>
         <?php
         $products = explode(', ', $total_products);
         foreach ($products as $product) {
            list($product_name, $quantity) = explode('(', str_replace(')', '', $product));
            echo "<div><span>$product_name</span><span> ($quantity)</span></div>";
         }
         ?>
      </div>

      <div class="total-details">
         <span>Total Price: Rp <?= $total_price; ?></span>
      </div>
        <a href="pesan.php">kembali ke menu</a>
   </section>
         
</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>
