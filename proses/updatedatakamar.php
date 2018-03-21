<?php

  require_once "connect.php";
  $id_kamar = mysqli_escape_string($connect, $_POST['id_kamar']);
  $nama_kamar = mysqli_escape_string($connect, $_POST['nama_kamar']);
  $biaya_kamar   = mysqli_escape_string($connect, $_POST['biaya_kamar']);
  $jenis_pembayaran  = mysqli_escape_string($connect, $_POST['JenisPembayaran']);
  $keterangan         = mysqli_escape_string($connect, $_POST['keterangan']);

  if (!$id_kamar || !$nama_kamar || !$biaya_kamar || !$jenis_pembayaran || !$keterangan) {
    header("Location:http://localhost/SIPK/tablekamar.php?option=edit&id_kamar=".$id_kamar."&alert=nonefields");
  } else {
    $inserting_data = mysqli_query($connect, "UPDATE tb_kamar SET nama_kamar='$nama_kamar',biaya_kamar='$biaya_kamar',jenis_pembayaran='$jenis_pembayaran',keterangan='$keterangan' WHERE id_kamar='$id_kamar'");
    if ($inserting_data) {
      header("Location:http://localhost/SIPK/tablekamar.php?option=edit&id_kamar=".$id_kamar."&alert=success");
    } else {
      header("Location:http://localhost/SIPK/tablekamar.php?option=edit&id_kamar=".$id_kamar."&alert=danger");
    }
}
?>
