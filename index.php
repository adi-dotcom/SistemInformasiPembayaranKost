<?php
  session_start();

  if(!isset($_SESSION['user'])) {
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPK</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="pigura.ico">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="http://localhost/SIPK/" class="logo">
      <span class="logo-mini"><b>SP</b>IK</span>
      <span class="logo-lg"><b>SI</b>PK</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
  <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <li class="active"><a href="/SIPK"><i class="fa fa-link"></i> <span>Dasboard</span></a></li>
        <li><a href="transaksi.php"><i class="fa fa-link"></i> <span>Transaksi</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Kost</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="datakost.php">Data Kost</a></li>
            <li><a href="datakamar.php">Data Kamar</a></li>
            <li><a href="datapelanggan.php">Data Pelanggan</a></li>
          </ul>
        </li>
        <li><a href="proses/logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?php
          require_once "proses/connect.php";
          $email = $_SESSION['user'];
          $check = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
          $row = mysqli_fetch_assoc($check);
        ?>
        Dashboard, Halo <?php echo $row['fullname']; ?>
      </h1>
    </section>
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                require_once "proses/connect.php";
                $getAllUser = mysqli_query($connect, "SELECT * FROM tb_kamar");
                $getRow = mysqli_num_rows($getAllUser);
              ?>
              <h3><?php echo $getRow; ?></h3>
              <p>Data Kamar</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="tablekamar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                require_once "proses/connect.php";
                $getAllUser = mysqli_query($connect, "SELECT * FROM transaksi");
                $getRow = mysqli_num_rows($getAllUser);
              ?>
              <h3><?php echo $getRow; ?></h3>
              <p>Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="tabletransaksi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                require_once "proses/connect.php";
                $getAllUser = mysqli_query($connect, "SELECT * FROM tb_pelanggan");
                $getRow = mysqli_num_rows($getAllUser);
              ?>
              <h3><?php echo $getRow; ?></h3>
              <p>Data Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="tablepelanggan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
