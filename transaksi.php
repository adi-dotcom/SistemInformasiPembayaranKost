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
        <li class="active"><a href="http://localhost/SIPK/"><i class="fa fa-link"></i> <span>Dasboard</span></a></li>
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
        Transaksi
      </h1>
    </section>
    <section class="content container-fluid">
      <div class="panel panel-default">
      <div class="panel-body">
      <form role="form" method="POST" action="proses/inserttransaksi.php">
        <?php if (isset($_GET['alert'])): ?>
          <?php if ($_GET['alert'] == "success"): ?>
            <div class="alert alert-success">
              Data Berhasil Masuk
            </div>
          <?php endif; ?>
          <?php if ($_GET['alert'] == "failed"): ?>
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
              <input class="form-control" name="NamaPelanggan" id="NamaPelanggan" type="text">
            </div>
            <div class="form-group">
              <label for="NamaKost">Nama Kost</label>
              <select class="form-control" name="NamaKost" id="NamaKost">
                <option value="">Pilih Nama Kost</option>
                <?php
                  require_once "proses/connect.php";
                  $getData = mysqli_query($connect, "SELECT * FROM tb_kost");
                  if (mysqli_num_rows($getData) > 0) {
                    while ($row = mysqli_fetch_assoc($getData)) {
                      $id_kost = $row['id_kost'];
                      $nama_kost = $row['nama_kost'];

                      echo '<option value="'.$id_kost.'">'.$nama_kost.'</option>';
                    }
                  } else {
                    echo '<option value="">Tidak ada Data</option>';
                  }
                ?>
              </select>
            </div>
              <div class="form-group">
                <label for="NamaKamar">Nama Kamar</label>
                <select class="form-control" name="NamaKamar" id="NamaKamar">
                  <option value="">Pilih Nama Kamar</option>
                </select>
              </div>
            <div class="form-group">
              <label for="JenisPembayaran">Jenis Pembayaran</label>
              <select class="form-control" name="JenisPembayaran" id="JenisPembayaran">
                <option value="">Pilih</option>
                <option value="Per Hari">Per Hari</option>
                <option value="Per Bulan">Per Bulan</option>
                <option value="Per Tahun">Per Tahun</option>
              </select>
            </div>
            <div class="form-group">
              <label for="BiayaKamar">Biaya Kamar</label>
              <input class="form-control" name="BiayaKamar" id="BiayaKamar" type="text">
            </div>
            <div class="form-group">
              <label for="TanggalMasuk">Tanggal Masuk</label>
              <input class="form-control" name="TanggalMasuk" id="TanggalMasuk" type="text" data-provide="datepicker">
            </div>
            <div class="form-group">
              <label for="TanggalKeluar">Tanggal Keluar</label>
              <input class="form-control" name="TanggalKeluar" id="TanggalKeluar" type="text" data-provide="datepicker">
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
    $(document).ready(function(){
    // $('.TanggalMasuk').datepicker();
    // $('.TanggalKeluar').datepicker();

    $("#NamaKost").on('change', function(){
      var idKost = $("#NamaKost option:selected").val();

      $.ajax({
        url: "proses/getNamakamar.php",
        method: "POST",
        dataType: "html",
        data: {id_kost:idKost},
        success: function(msg) {
          if(msg == ''){
            $("select#NamaKamar").html('<option value="">--Pilih Nama Kamar--</option>');
          }else{
            $("select#NamaKamar").html(msg);
          }
        }
      });
    });
  });
</script>
</body>
</html>
