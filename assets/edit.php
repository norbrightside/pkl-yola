<?php
include 'db.php';

// Ambil data tiket berdasarkan ID
if (isset($_GET['notiket'])) {
    $notiket = $_GET['notiket'];
    $sql = "SELECT * FROM Tiket WHERE notiket = $notiket";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Tiket tidak ditemukan.";
        exit();
    }
} else {
    echo "No tiket tidak disediakan.";
    exit();
}

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

    $sql = "UPDATE Tiket SET jmlh='$jumlah', harga='$harga', bayar='$bayar', nopesawat='$nopesawat', idpenumpang='$idpenumpang' WHERE notiket=$notiket";

    if ($conn->query($sql) === TRUE) {
        echo "Pembelian berhasil diperbarui!";
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
    <title>Edit Penjualan</title>
</head>
<body>
    <h2>Form Edit Penjualan</h2>
    <form method="post" action="">
        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" value="<?php echo $row['jmlh']; ?>" required><br><br>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" step="0.01" value="<?php echo $row['harga']; ?>" required><br><br>

        <label for="bayar">Bayar:</label>
        <input type="number" id="bayar" name="bayar" step="0.01" value="<?php echo $row['bayar']; ?>" required><br><br>

        <label for="nopesawat">Nomor Pesawat:</label>
        <select id="nopesawat" name="nopesawat" required>
            <?php
            if ($pesawat_result->num_rows > 0) {
                while($pesawat = $pesawat_result->fetch_assoc()) {
                    $selected = ($pesawat['nopesawat'] == $row['nopesawat']) ? "selected" : "";
                    echo "<option value='" . $pesawat['nopesawat'] . "' $selected>" . $pesawat['nopesawat'] . " - " . $pesawat['tujuan'] . " (" . $pesawat['asal'] . ")</option>";
                }
            }
            ?>
        </select><br><br>

        <label for="idpenumpang">ID Penumpang:</label>
        <select id="idpenumpang" name="idpenumpang" required>
            <?php
            if ($penumpang_result->num_rows > 0) {
                while($penumpang = $penumpang_result->fetch_assoc()) {
                    $selected = ($penumpang['idpenumpang'] == $row['idpenumpang']) ? "selected" : "";
                    echo "<option value='" . $penumpang['idpenumpang'] . "' $selected>" . $penumpang['idpenumpang'] . " - " . $penumpang['nama'] . "</option>";
                }
            }
            ?>
        </select><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>