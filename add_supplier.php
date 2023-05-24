<!-- add_supplier.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Supplier</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2>Tambah Data Supplier</h2>
		<form method="post" action="save_supplier.php">
			<div class="form-group">
				<label for="id_supplier">ID Supplier:</label>
				<input type="text" class="form-control" id="id_supplier" name="id_supplier" required>
			</div>
			<div class="form-group">
				<label for="nama_supplier">Nama Supplier:</label>
				<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
			</div>
			<div class="form-group">
				<label for="alamat">Alamat:</label>
				<input type="text" class="form-control" id="alamat" name="alamat" required>
			</div>
			<div class="form-group">
				<label for="telpon">Telpon:</label>
				<input type="text" class="form-control" id="telpon" name="telpon" required>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a href="supplier.php" class="btn btn-default">Batal</a>
		</form>
	</div>
 </body>
</html>