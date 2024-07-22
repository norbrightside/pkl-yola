<?php
include 'db.php';

// Fetch data for dropdowns
$penumpang_result = $conn->query("SELECT idpenumpang, nama FROM Penumpang");
$pesawat_result = $conn->query("SELECT nopesawat, tujuan, asal FROM Pesawat");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $bayar = $_POST['bayar'];
    $nopesawat = $_POST['nopesawat'];
    $idpenumpang = $_POST['idpenumpang'];

    $sql = "INSERT INTO Tiket (jmlh, harga, bayar, nopesawat, idpenumpang)
            VALUES ('$jumlah', '$harga', '$bayar', '$nopesawat', '$idpenumpang')";

    if ($conn->query($sql) === TRUE) {
        echo "Pembelian berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pembelian</title>
    <script>
        function calculateTotal() {
            var jumlah = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;
            var bayar = jumlah * harga;
            document.getElementById('bayar').value = bayar;
        }
    </script>
</head>
<body>
    <h2>Form Input Pembelian</h2>
    <form method="post" action="">
        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" required oninput="calculateTotal()"><br><br>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" step="0.01" required oninput="calculateTotal()"><br><br>

        <label for="bayar">Bayar:</label>
        <input type="number" id="bayar" name="bayar" step="0.01" readonly required><br><br>

        <label for="nopesawat">Nomor Pesawat:</label>
        <select id="nopesawat" name="nopesawat" required>
            <?php
            if ($pesawat_result->num_rows > 0) {
                while($row = $pesawat_result->fetch_assoc()) {
                    echo "<option value='" . $row['nopesawat'] . "'>" . $row['nopesawat'] . " - " . $row['tujuan'] . " (" . $row['asal'] . ")</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="idpenumpang">ID Penumpang:</label>
        <select id="idpenumpang" name="idpenumpang" required>
            <?php
            if ($penumpang_result->num_rows > 0) {
                while($row = $penumpang_result->fetch_assoc()) {
                    echo "<option value='" . $row['idpenumpang'] . "'>" . $row['idpenumpang'] . " - " . $row['nama'] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
