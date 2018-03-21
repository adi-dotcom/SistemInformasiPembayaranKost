<?php

  $connect = mysqli_connect("localhost", "root", "", "kost_db");
  if ($connect == FALSE) {
    echo "Gagal koneksi ke database";
  }
?>
