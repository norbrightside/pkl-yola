<!-- add_raw_material.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Add Raw Material Data</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Add Raw Material Data</h2>
		<form method="post" action="save_raw_material.php">
			<div class="form-group">
				<label for="raw_material_id">Raw Material ID:</label>
				<input type="text" class="form-control" id="material_id" name="material_id" required>
			</div>
			<div class="form-group">
				<label for="raw_material_name">Raw Material Name:</label>
				<input type="text" class="form-control" id="material_name" name="material_name" required>
			</div>
			<div class="form-group">
				<label for="unit">Unit:</label>
				<input type="text" class="form-control" id="material_unit" name="material_unit" required>
			</div>
            <div class="form-group">
				<label for="harga">Harga:</label>
				<input type="text" class="form-control" id="harga" name="harga" required>
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
			<a href="dashboard.php" class="btn btn-default">Cancel</a>
		</form>
	</div>
 </body>
</html>