<?php 
include('../koneksi/koneksi.php');
session_start();
$id_user = $_SESSION['id_user'];
$id_kategori_blog = $_POST['kategori_blog'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
if(empty($id_kategori_blog)){
	header("Location:tambahblog.php?notif=tambahkosong&jenis=kategoriblog");
}else if(empty($judul)){
	header("Location:tambahblog.php?notif=tambahkosong&jenis=judul");
}else if(empty($isi)){
	header("Location:tambahblog.php?notif=tambahkosong&jenis=isi");
}else{

	$sql_blog = "insert into `blog` (`id_kategori_blog`,`id_user`,`judul`,`isi`) 
	values ('$id_kategori_blog','$id_user','$judul','$isi')";
	mysqli_query($koneksi,$sql_blog);
header("Location:blog.php?notif=tambahberhasil");	
}
?>