<?php
$host = "localhost"; // hostname atau IP server MySQL
$user = "root"; // username MySQL
$password = ""; // password MySQL
$database_name = "scm"; // nama database
 $koneksi = mysqli_connect($host, $user, $password, $database_name);
 if(mysqli_connect_errno()){
    echo "Koneksi database gagal : ".mysqli_connect_error();
}
?>