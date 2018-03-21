<?php

  require_once "connect.php";

  $NamaPelanggan = $_POST['NamaPelanggan'];
  $NamaKost = $_POST['NamaKost'];
  $NamaKamar = $_POST['NamaKamar'];
  $JenisPembayaran = $_POST['JenisPembayaran'];
  $BiayaKamar = $_POST['BiayaKamar'];
  $Checkin = $_POST['TanggalMasuk'];
  $Checkout = $_POST['TanggalKeluar'];

  if (!$NamaPelanggan || !$NamaKost || !$NamaKamar || !$JenisPembayaran || !$BiayaKamar || !$Checkin || !$Checkout) {
    header("Location: ../transaksi.php?alert=nonefields");
  } else {
    $insertData = mysqli_query($connect, "INSERT INTO transaksi VALUES('','$NamaPelanggan','$NamaKost','$NamaKamar','$JenisPembayaran','$BiayaKamar','$Checkin','$Checkout')");
    if ($insertData) {
      header("Location: ../transaksi.php?alert=success");
    } else {
      header("Location: ../transaksi.php?alert=failed");
    }
  }

?>
