<?php

  require_once "connect.php";

  $nama_pelanggan = mysqli_escape_string($connect, $_POST['nama_pelanggan']);
  $tempat_lahir   = mysqli_escape_string($connect, $_POST['tempat_lahir']);
  $tanggal_lahir  = mysqli_escape_string($connect, $_POST['tanggal_lahir']);
  $status         = mysqli_escape_string($connect, $_POST['status']);
  $no_identitas   = mysqli_escape_string($connect, $_POST['no_identitas']);
  $asal           = mysqli_escape_string($connect, $_POST['asal']);

  if (!$nama_pelanggan || !$tempat_lahir || !$tanggal_lahir || !$status || !$no_identitas || !$asal) {
    header("Location:http://localhost/SIPK/datapelanggan.php?alert=nonefields");
  } else {
    $inserting_data = mysqli_query($connect, "INSERT INTO tb_pelanggan VALUES('','$nama_pelanggan','$tempat_lahir','$tanggal_lahir','$status','$no_identitas','$asal')");
    if ($inserting_data) {
      header("Location:http://localhost/SIPK/datapelanggan.php?alert=success");
    } else {
      header("Location:http://localhost/SIPK/datapelanggan.php?alert=danger");
    }
  }

?>
