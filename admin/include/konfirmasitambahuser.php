<?php
include("../koneksi/koneksi.php");
$nama = $_POST['nama'];
$email = $_POST['email'];
$user = $_POST['username'];   
$pass = $_POST['password'];   
$level = $_POST['level']; 
$username = mysqli_real_escape_string($koneksi, $user);
$password = mysqli_real_escape_string($koneksi, MD5($pass));
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $_FILES['foto']['name'];
$direktori = 'foto/'.$nama_file; 

if(empty($nama)){	   
  header("Location:tambahuser.php?notif=tambahkosong&jenis=nama");
}else if(empty($email)){
header("Location:tambahuser.php?notif=tambahkosong&jenis=email");
}else if(empty($username)){
header("Location:tambahuser.php?notif=tambahkosong&jenis=username");
}else if(empty($password)){
header("Location:tambahuser.php?notif=tambahkosong&jenis=password");
}else if(empty($level)){	   
  header("Location:tambahuser.php?notif=tambahkosong&jenis=level");
}else if(!move_uploaded_file($lokasi_file,$direktori)){
  header("Location:tambahuser.php?notif=tambahkosong&jenis=foto");
}else{
$sql_user = "INSERT INTO `user` 
(`nama`, `email`,`username`,`password`,`level`,`foto`)
VALUES ('$nama','$email','$username','$password','$level','$nama_file')";
mysqli_query($koneksi,$sql_user);
$id_user = mysqli_insert_id($koneksi);
header("Location:user.php?notif=tambahberhasil");	
}

?>