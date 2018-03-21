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
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
    </nav>
  </header>
  <aside class="main-sidebar">
  <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <li class="active"><a href="http://localhost/SIPK"><i class="fa fa-link"></i> <span>Dasboard</span></a></li>
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
        Data Pelanggan
      </h1>
    </section>
    <section class="content container-fluid">
      <div class="panel panel-default">
      <div class="panel-body">
      <form role="form" action="proses/pelanggan.php" method="post">
        <?php if (isset($_GET['alert'])): ?>
          <?php if ($_GET['alert'] == "success"): ?>
            <div class="alert alert-success">
              Data Berhasil Masuk
            </div>
          <?php endif; ?>
          <?php if ($_GET['alert'] == "danger"): ?>
            <div class="alert alert-danger">
              Data Gagal Masuk
            </div>
          <?php endif; ?>
          <?php if ($_GET['alert'] == "nonefields"): ?>
            <div class="alert alert-danger">
              Masih ada data yang kosong!
            </div>
          <?php endif; ?>
        <?php endif; ?>
          <div class="box-body">
            <div class="form-group">
              <label for="NamaPelanggan">Nama Pelanggan</label>
              <input class="form-control" id="NamaPelanggan" name="nama_pelanggan" type="text">
            </div>
            <div class="form-group">
              <label for="TempatLahir">Tempat Lahir</label>
              <input class="form-control" id="TempatLahir" name="tempat_lahir" type="text">
            </div>
            <div class="form-group">
              <label for="TanggalLahir">Tanggal Lahir</label>
              <input class="form-control" id="TanggalLahir" name="tanggal_lahir" type="text" data-provide="datepicker">
            </div>
            <div class="form-group">
              <label for="Status">Status</label>
              <select class="form-control" id="Status" name="status">
                <option value="">Pilih</option>
                <option value="Nikah">Nikah</option>
                <option value="Belum Nikah">Belum Nikah</option>
              </select>
            </div>
            <div class="form-group">
              <label for="NoIdentitas">No Identitas</label>
              <input class="form-control" id="NoIdentitas" name="no_identitas" type="text">
            </div>
            <div class="form-group">
              <label for="Asal">Asal</label>
              <input class="form-control" id="Asal" name="asal" type="text">
            </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
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
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $('.TanggalLahir').datepicker();
</script>
</body>
</html>
