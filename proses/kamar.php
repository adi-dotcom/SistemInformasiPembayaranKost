<?php

  require_once "connect.php";

  $nama_kamar      = mysqli_escape_string($connect, $_POST['nama_kamar']);
  $ukuran_kamar    = mysqli_escape_string($connect, $_POST['ukuran_kamar']);
  $biaya_kamar     = mysqli_escape_string($connect, $_POST['biaya_kamar']);
  $idKost          = mysqli_escape_string($connect, $_POST['idKost']);
  $jenispembayaran = mysqli_escape_string($connect, $_POST['jenis_pembayaran']);
  $keterangan      = mysqli_escape_string($connect, $_POST['keterangan']);

  if (!$nama_kamar || !$ukuran_kamar || !$biaya_kamar || !$jenispembayaran || !$keterangan) {
    header("Location:http://localhost/SIPK/datakamar.php?alert=nonefields");
  } else {    
    $inserting_data = mysqli_query($connect, "INSERT INTO tb_kamar VALUES('','$idKost','$nama_kamar','$ukuran_kamar','$biaya_kamar','$jenispembayaran','$keterangan')");
    if ($inserting_data) {
      header("Location:http://localhost/SIPK/datakamar.php?alert=success");
    } else {
      header("Location:http://localhost/SIPK/datakamar.php?alert=danger");
    }
  }

?>
