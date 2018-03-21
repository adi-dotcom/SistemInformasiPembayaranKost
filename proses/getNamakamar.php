<?php
  require_once "connect.php";
  $idKost = $_POST['id_kost'];
  $selectNamaKamar = mysqli_query($connect, "SELECT * FROM tb_kamar WHERE id_kost='$idKost'");

  if (mysqli_num_rows($selectNamaKamar) > 0) {
    while ($row = mysqli_fetch_assoc($selectNamaKamar)) {
      echo '<option value="'.$row['nama_kamar'].'">'.$row['nama_kamar'].'</option>';
    }
  }

?>
