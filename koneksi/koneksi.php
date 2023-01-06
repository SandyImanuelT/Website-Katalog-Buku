<?php
$koneksi = mysqli_connect("localhost", "root", "", "2katalog_buku");
if(!$koneksi){
die("Error koneksi: " .mysqli_connect_errno());
}
?>