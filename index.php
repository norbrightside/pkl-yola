<?php
session_start();
   include("koneksi.php"); // Memanggil koneksi ke database
   if(isset($_POST['login'])) { // Jika tombol login ditekan
      $username = $_POST['username']; // Ambil input username
      $password = $_POST['password']; // Ambil input password
      $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'"); // Cek data pada tabel users
      $result = mysqli_num_rows($query); // Hitung jumlah baris pada hasil query
      if($result == 1) { // Jika data ditemukan
         $_SESSION['username'] = $username; // Set session username
         header("Location: dashboard.php"); // Arahkan ke halaman dashboard
      } else {
         echo "<script>alert('Username atau Password salah.')</script>"; // Tampilkan pesan kesalahan jika data tidak ditemukan
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Login</title>
   </head>
   <body>
      <h2>Sistem SCM Login</h2>
      <form method="post" action="">
         <table>
            <tr>
               <td>Username</td>
               <td><input type="text" name="username" placeholder="Masukkan Username"></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type="password" name="password" placeholder="Masukkan Password"></td>
            </tr>
            <tr>
               <td></td>
               <td><input type="submit" name="login" value="Login"></td>
            </tr>
         </table>
      </form>
   </body>
</html>