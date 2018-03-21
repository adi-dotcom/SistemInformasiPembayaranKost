<?php

  require_once "connect.php";  
  $id_pelanggan = mysqli_escape_string($connect, $_POST['id_pelanggan']);
  $nama_pelanggan = mysqli_escape_string($connect, $_POST['nama_pelanggan']);
  $tempat_lahir   = mysqli_escape_string($connect, $_POST['tempat_lahir']);
  $tanggal_lahir  = mysqli_escape_string($connect, $_POST['tanggal_lahir']);
  $status         = mysqli_escape_string($connect, $_POST['status']);
  $no_identitas   = mysqli_escape_string($connect, $_POST['no_identitas']);
  $asal           = mysqli_escape_string($connect, $_POST['asal']);

  if (!$nama_pelanggan || !$tempat_lahir || !$tanggal_lahir || !$status || !$no_identitas || !$asal) {
    header("Location:http://localhost/SIPK/tablepelanggan.php?option=edit&id_pelanggan=".$id_pelanggan."&alert=nonefields");
  } else {
    $inserting_data = mysqli_query($connect, "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',status='$status',no_identitas='$no_identitas',asal='$asal' WHERE id_pelanggan='$id_pelanggan'");
    if ($inserting_data) {
      header("Location:http://localhost/SIPK/tablepelanggan.php?option=edit&id_pelanggan=".$id_pelanggan."&alert=success");
    } else {
      header("Location:http://localhost/SIPK/tablepelanggan.php?option=edit&id_pelanggan=".$id_pelanggan."&alert=danger");
    }
}
?>
