<?php

$server ="localhost";
$username ="root";
$password ="";
$nama_db ="14_mywebsite_XIIRPL2";

$koneksi = mysqli_connect($server,$username,$password,$nama_db);

if(!$koneksi){
    die("koneksi Gagal".mysqli_connect_error());
//}else{
   // echo"Koneksi Berhasil";

}

?>
