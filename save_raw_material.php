<!-- save_raw_material.php -->
<?php
	include 'koneksi.php';
	$material_id = $_POST['material_id'];
	$material_name = $_POST['material_name'];
	$material_unit = $_POST['material_unit'];
    $harga = $_POST['harga'];
	$sql = "INSERT INTO raw_materials (material_id, material_name, material_unit, material_unit_price) VALUES ('$material_id', '$material_name', '$material_unit', '$harga')";
	if (mysqli_query($koneksi, $sql)) {
		echo "<script>alert('Data added successfully');</script>";
		header('Location: dashboard.php');
	} else {
		echo "<script>alert('An error occurred');</script>";
		header('Location: add_raw_material.php');
	}
?>