<?php

  require_once "connect.php";

  $nama_kost      = mysqli_escape_string($connect, $_POST['nama_kost']);
  $jumlah_kamar   = mysqli_escape_string($connect, $_POST['jumlah_kamar']);
  $alamat_kost    = mysqli_escape_string($connect, $_POST['alamat_kost']);
  $jenis_kost     = mysqli_escape_string($connect, $_POST['jenis_kost']);
  $keterangan     = mysqli_escape_string($connect, $_POST['keterangan']);

  if (!$nama_kost || !$jumlah_kamar || !$alamat_kost || !$jenis_kost || !$keterangan) {
    header("Location:http://localhost/SIPK/datakost.php?alert=nonefields");
  } else {
    $inserting_data = mysqli_query($connect, "INSERT INTO tb_kost VALUES('','$nama_kost','$jumlah_kamar','$alamat_kost','$jenis_kost','$keterangan')");
    if ($inserting_data) {
      header("Location:http://localhost/SIPK/datakost.php?alert=success");
    } else {
      header("Location:http://localhost/SIPK/datakost.php?alert=danger");
    }
  }

?>
