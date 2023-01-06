<?php
session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_blog'])){
$id_blog = $_SESSION['id_blog'];
$id_kategori_blog = $_POST['kategori_blog'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
if(empty($id_kategori_blog)){
  header("Location:editblog.php?data=$id_blog&notif=editkosong&jenis=kategoriblog");
  } else if(empty($judul)){
    header("Location:editblog.php?data=$id_blog&notif=editkosong&jenis=judul");
  } else if(empty($isi)){
    header("Location:editblog.php?data=$id_blog&notif=editkosong&jenis=isi");
  } else{
  $sql_blog = "UPDATE `blog` SET `id_kategori_blog` = $id_kategori_blog,
  `judul` = '$judul', 
  `isi` = '$isi'
  WHERE `id_blog` = $id_blog";
  mysqli_query($koneksi, $sql_blog);
  header("Location:blog.php?notif=editberhasil");
  }
}
?>