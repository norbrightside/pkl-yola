<?php
include 'db.php';

// Fetch data from tickets table with joins
$sql = "SELECT 
           t.notiket, 
           p.nama AS penumpang, 
           ps.tujuan, 
           ps.asal, 
           t.jmlh, 
           t.harga, 
           t.bayar 
        FROM Tiket t
        JOIN Penumpang p ON t.idpenumpang = p.idpenumpang
        JOIN Pesawat ps ON t.nopesawat = ps.nopesawat";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laporan Tiket</title>
   <style>
       table {
           width: 100%;
           border-collapse: collapse;
       }
       table, th, td {
           border: 1px solid black;
       }
       th, td {
           padding: 8px;
           text-align: left;
       }
   </style>
</head>
<body>
   <h2>Laporan Tiket</h2>
   <table>
       <thead>
           <tr>
               <th>No Tiket</th>
               <th>Nama Penumpang</th>
               <th>Tujuan</th>
               <th>Asal</th>
               <th>Jumlah</th>
               <th>Harga</th>
               <th>Bayar</th>
           </tr>
       </thead>
       <tbody>
           <?php
           if ($result->num_rows > 0) {
               // Output data of each row
               while($row = $result->fetch_assoc()) {
                   echo "<tr>
                           <td>"  .$row["notiket"]. "</td>
                           <td>" . $row["penumpang"]. "</td>
                           <td>" . $row["tujuan"]. "</td>
                           <td>" . $row["asal"]. "</td>
                           <td>" . $row["jmlh"]. "</td>
                           <td>" . $row["harga"]. "</td>
                           <td>" . $row["bayar"]. "</td>
<td><a href='hapus_tiket.php?notiket=" . $row["notiket"] . "'>Hapus</a></td>
                          </tr>";
                         </tr>";
               }
           } else {
               echo "<tr><td colspan='7'>No records found</td></tr>";
           }
           $conn->close();
           ?>
       </tbody>
   </table>
</body>
</html>