<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Raw Material Data</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Raw Material Data</h2>
		<p><a href="add_raw_material.php" class="btn btn-success">Add Data</a></p>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Raw Material ID</th>
					<th>Raw Material Name</th>
					<th>Unit</th>
                    <th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'koneksi.php';
					$sql = "SELECT * FROM raw_materials";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>";
							echo "<td>" . $row['material_id'] . "</td>";
							echo "<td>" . $row['material_name'] . "</td>";
							echo "<td>" . $row['material_unit'] . "</td>";
                            echo "<td>" . $row['material_unit_price'] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='3'>No data available</td></tr>";
					}
				?>
			</tbody>
		</table>
	</div>
 </body>
</html>
