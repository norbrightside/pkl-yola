<!-- save_supplier.php -->
<?php
	include 'db_config.php';
	$id_supplier = $_POST['id_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	$sql = "INSERT INTO supplier (id_supplier, nama_supplier, alamat, telpon) VALUES ('$id_supplier', '$nama_supplier', '$alamat', '$telpon')";
	if (mysqli_query($con, $sql)) {
		echo "<script>alert('Data berhasil ditambahkan');</script>";
		header('Location: index.php');
	} else {
		echo "<script>alert('Terjadi kesalahan');</script>";
		header('Location: add_supplier.php');
	}
?>