<!DOCTYPE html>
<html>
<head>
	<title>Supplier Data</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Data Supplier</h2>
		<p><a href="add_supplier.php" class="btn btn-success">Tambah Data</a></p>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID Supplier</th>
					<th>Nama Supplier</th>
					<th>Alamat</th>
					<th>Telpon</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'koneksi.php';
					$sql = "SELECT * FROM suppliers";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row['supplier_id'] . "</td>";
							echo "<td>" . $row['supplier_name'] . "</td>";
							echo "<td>" . $row['supplier_address'] . "</td>";
							echo "<td>" . $row['supplier_contact'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
					}
				?>
			</tbody>
		</table>
	</div>
 </body>
</html>