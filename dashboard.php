<?php
session_start(); // Mulai session
    include("koneksi.php"); // Sertakan koneksi ke database
    if(!isset($_SESSION['username'])) { // Jika session username tidak ada
        header("Location: index.php"); // Arahkan kembali ke halaman login
    }
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="assets/style.css">
   <head>
      <title>Dashboard</title>
   </head>
   <body>
   <ul id="menu">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="sales.php">Penjualan</a></li>
      <li><a href="production.php">Produksi</a></li>
      <li><a href="raw_materials.php">Bahan Baku</a></li>
      <li><a href="products.php">Barang Setelah Produksi</a></li>
      <li><a href="index.php">Logout</a></li>
   </ul>
      <h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
      <h3>Stok Bahan Baku</h3>
      <table>
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
               $stock_query = mysqli_query($koneksi, "SELECT * FROM stock WHERE material_id = '$material_id'"); // Ambil data stok pada tabel stock
               $stock = mysqli_fetch_array($stock_query);
            
            ?>
            
            <td><?php echo $stock['stock_qty']; ?></td>
            <td>Rp <?php echo number_format($row['material_unit_price'], 2, ',', '.'); ?></td>
         </tr>
         <?php
            }
         ?>
      </table>
      <h3>Stok Barang Setelah Produksi</h3>
      <table>
         <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Sisa Stok</th>
            <th>Harga per Unit</th>
         </tr>
         <?php
            $product_query = mysqli_query($koneksi, "SELECT * FROM raw_materials"); // Ambil data dari tabel bahan baku
            while($product_row = mysqli_fetch_array($product_query)) { // Ambil setiap baris data bahan baku
               $product_id = $product_row['material_id'];
               $production_query = mysqli_query($koneksi, "SELECT SUM(production_qty) as total_production FROM productions WHERE material_id = '$product_id'"); // Hitung total produksi
               $production = mysqli_fetch_array($production_query);
               $sale_query = mysqli_query($koneksi, "SELECT SUM(sale_qty) as total_sale FROM sales WHERE material_id = '$product_id'"); // Hitung total penjualan
               $sale = mysqli_fetch_array($sale_query);
               $stock_query = mysqli_query($koneksi, "SELECT * FROM stock WHERE material_id = '$product_id'"); // Ambil data stok pada tabel stock
               $stock = mysqli_fetch_array($stock_query);
         ?>
         <tr>
            <td><?php echo $product_row['material_id']; ?></td>
            <td><?php echo $product_row['material_name']; ?></td>
            <td><?php echo $stock['stock_qty'] + $production['total_production'] - $sale['total_sale'] ?></td>
            <td>Rp <?php echo number_format($product_row['material_unit_price'], 2, ',', '.'); ?></td>
         </tr>
         <?php
            }
         ?>
      </table>
      <br>
      <a href="logout.php">Logout</a>
   </body>
</html>