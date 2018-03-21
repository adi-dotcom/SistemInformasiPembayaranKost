<?php
  require_once "connect.php";

  session_start();

  $email = $_POST['email'];
  $password  = $_POST['password'];

  $selectUser = mysqli_query($connect, "SELECT email,password FROM users WHERE email='$email'");

  if (!$email || !$password) {
    echo "masih ada yang kosong!";
  } else {
    if (mysqli_num_rows($selectUser) > 0) {
      $row = mysqli_fetch_assoc($selectUser);
      if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $email;
        header("Location: ../index.php");
      } else {
        echo "Password Salah";
      }
    } else {
      echo "Tidak Ditemukan!";
    }
  }

?>
