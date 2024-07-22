<?php
include 'db.php';

if (isset($_GET['notiket'])) {
    $notiket = $_GET['notiket'];

    // Hapus data tiket dari database
    $sql = "DELETE FROM Tiket WHERE notiket = $notiket";

    if ($conn->query($sql) === TRUE) {
        echo "Tiket berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No tiket tidak disediakan.";
}

// Close the database connection
$conn->close();

// Redirect back to the list page
header("Location: list_tiket.php");
exit();
?>