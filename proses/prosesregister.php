<?php
  require_once "connect.php";

  $fullname = $_POST['fullname'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $cpassword= $_POST['cpassword'];

  $selectUser = mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");

  if (!$fullname || !$email || !$password || !$cpassword) {
    echo "Masih ada data yang kosong!";
  } else {
    if ($password == $cpassword) {
        if (mysqli_num_rows($selectUser) > 0) {
          echo "Email yang anda masukan sudah terdaftar";
        } else {
          $password = password_hash($password, PASSWORD_DEFAULT);
          $insertData = mysqli_query($connect, "INSERT INTO users VALUES('','$fullname','$email','$password')");
          if ($insertData) {
            header("Location: ../index.php");
          }
        }
    } else {
      echo "password yang anda masukan tidak sama!";
    }
  }

?>
