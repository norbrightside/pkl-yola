<?php
session_start(); // Mulai session
    include("koneksi.php"); // Sertakan koneksi ke database
    if(!isset($_SESSION['username'])) { // Jika session username tidak ada
        header("Location: index.php"); // Arahkan kembali ke halaman login
    }
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
<head>
   <nav class="navbar-fixed-top">
      <div class="container-fluid">
      <title>Dashboard</title>
      <ul class="nav navbar-nav" id="menu">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="sales.php">Penjualan</a></li>
      <li><a href="production.php">Produksi</a></li>
      <li><a href="raw_materials.php">Bahan Baku</a></li>
      <li><a href="products.php">Barang Setelah Produksi</a></li>
      <li><a href="index.php">Logout</a></li>
   </ul>
   </div>
   </head>
   <body>
   <div class="container">

      <h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
      <h3>Stok Bahan Baku</h3>
      <table class="table table-striped">
         <tr>
            <th>ID Bahan Baku</th>
            <th>Nama Bahan Baku</th>
            <th>Sisa Stok</th>
            <th>Harga per Unit</th>
         </tr>
         <?php
            $query = mysqli_query($koneksi, "SELECT * FROM raw_materials"); // Ambil data dari tabel bahan baku
            while($row = mysqli_fetch_array($query)) { // Ambil setiap baris data bahan baku
         ?>
         <tr>
            <td><?php echo $row['material_id']; ?></td>
            <td><?php echo $row['material_name']; ?></td>
            <?php
               $material_id = $row['material_id'];
               $stock_query = mysqli_query($koneksi, "SELECT * FROM raw_materials WHERE material_id = '$material_id'"); // Ambil data stok pada tabel stock
               $stock = mysqli_fetch_array($stock_query);
            
            ?>
            
            <td><?php echo $stock['material_unit']; ?></td>
            <td>Rp <?php echo number_format($row['material_unit_price'], 2, ',', '.'); ?></td>
         </tr>
         <?php
            }
         ?>
      </table>
   </div>
      <br>
      <a href="logout.php">Logout</a>
   </body>
</html>