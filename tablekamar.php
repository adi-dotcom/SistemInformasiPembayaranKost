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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
      <?php if (isset($_GET['option']) && isset($_GET['id_kamar'])): ?>
        <?php
          if ($_GET['option'] == 'delete') {
            require_once "proses/connect.php";
            $id_kamar = $_GET['id_kamar'];
            $checkKamar = mysqli_query($connect, "SELECT * FROM tb_kamar WHERE id_kamar='$id_kamar'");
            if (mysqli_num_rows($checkKamar) > 0) {
              $deleteUser = mysqli_query($connect, "DELETE FROM tb_kamar WHERE id_kamar='$id_kamar'");
              if ($deleteUser) {
                echo 'Data Berhasil dihapus <a href="http://localhost/SIPK/tablekamar.php">Lihat Semua Data</a>';
              } else {
                echo "Gagal Menghapus Data Pelanggan";
              }
            } else {
              echo "ID PELANGGAN TIDAK DITEMUKAN";
            }
          }
        ?>
        <?php if ($_GET['option'] == "edit"): ?>
        <h1>
          Update Data Kamar
        </h1>
        <small><a href="http://localhost/SIPK/tablekamar.php">Lihat Semua Data</a></small>
      </section>
      <section class="content container-fluid">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php
              require_once "proses/connect.php";
              $getIDKamar = mysqli_escape_string($connect, $_GET['id_kamar']);
              $getAllDataUser = mysqli_query($connect, "SELECT * FROM tb_kamar WHERE id_kamar='$getIDKamar'");
              if (mysqli_num_rows($getAllDataUser) > 0) {
                $row = mysqli_fetch_assoc($getAllDataUser);
                $id_kamar = $row['id_kamar'];
                $nama_kamar = $row['nama_kamar'];
                $ukuran_kamar = $row['ukuran_kamar'];
                $jenis_pembayaran = $row['jenis_pembayaran'];
                $biaya_kamar = $row['biaya_kamar'];
                $keterangan = $row['keterangan'];
              }
            ?>
            <form role="form" action="proses/kamar.php" method="post">
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
                    <label for="NamaKamar">Nama Kamar</label>
                    <input class="form-control" id="NamaKamar" name="nama_kamar"type="text" value="<?php echo $nama_kamar; ?>">
                  </div>
                  <div class="form-group">
                    <label for="UkuranKamar">Ukuran Kamar</label>
                    <input class="form-control" id="UkuranKamar" name="ukuran_kamar" type="number" value="<?php echo $ukuran_kamar; ?>">
                  </div>
                  <div class="form-group">
                    <label for="BiayaKamar">Biaya Kamar</label>
                    <input class="form-control" id="BiayaKamar" name="biaya_kamar" type="text" value="<?php echo $biaya_kamar; ?>">
                  </div>
                  <div class="form-group">
                    <label for="JenisPembayaran">Jenis Pembayaran</label>
                    <select class="form-control" name="JenisPembayaran" id="JenisPembayaran">
                      <option value="">Pilih</option>
                      <option value="Per Hari" <?php if($jenis_pembayaran == 'Hari'){echo "selected";} ?>>Per Hari</option>
                      <option value="Per Bulan" <?php if($jenis_pembayaran == 'Bulan'){echo "selected";} ?>>Per Bulan</option>
                      <option value="Per Tahun" <?php if($jenis_pembayaran == 'Tahun'){echo "selected";} ?>>Per Tahun</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Keterangan">Keterangan</label>
                    <input class="form-control" id="Keterangan" name="keterangan" type="text" value="<?php echo $keterangan; ?>">
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="sumbit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        <?php endif; ?>
        <?php else: ?>
          <div class="pull-right">
            <form method="post" action="#" id="search_form">
              <div class="input-group">
                <input type="text" class="form-control" id="query_search" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
              </div>
            </form>
          </div>
          <h1>
            List Data Kamar
          </h1>
          <small><a href="http://localhost/SIPK/tablekamar.php">Tampilkan Semua Data</a></small>
        </section>
        <section class="content container-fluid">
          <?php if (isset($_GET['q'])): ?>
            <?php
              require_once "proses/connect.php";
              $query_search = mysqli_escape_string($connect, $_GET['q']);
              $getAllData = mysqli_query($connect, "SELECT * FROM tb_kamar WHERE nama_kamar LIKE '%$query_search%'");
              if (mysqli_num_rows($getAllData) > 0) {
              ?>
              <table class="table table-striped">
                <tr>
                  <td>No</td>
                  <td>Nama Kamar</td>
                  <td>Ukuran Kamar</td>
                  <td>Biaya Kamar</td>
                  <td>Jenis Pembayaran</td>
                  <td>Keterangan</td>
                </tr>
              <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($getAllData)) {
                  $id_kamar = $row['id_kamar'];
                  $nama_kamar = $row['nama_kamar'];
                  $ukuran_kamar = $row['ukuran_kamar'];
                  $biaya_kamar = $row['biaya_kamar'];
                  $jenis_pembayaran = $row['jenis_pembayaran'];
                  $keterangan = $row['keterangan'];
              ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $nama_kamar; ?></td>
                <td><?php echo $ukuran_kamar; ?></td>
                <td><?php echo $biaya_kamar; ?></td>
                <td><?php echo $jenis_pembayaran; ?></td>
                <td><?php echo $keterangan; ?></td>
              </tr>
            <?php
                }
              } else {
                echo "Tidak ada DATA";
              }
            ?>
            <?php else: ?>
              <?php
                require_once "proses/connect.php";
                $getAllData = mysqli_query($connect, "SELECT * FROM tb_kamar ORDER BY id_kamar DESC");
                if (mysqli_num_rows($getAllData) > 0) {
                ?>
                <table class="table table-striped">
                  <tr>
                    <td>No</td>
                    <td>Nama Kamar</td>
                    <td>Ukuran Kamar</td>
                    <td>Biaya Kamar</td>
                    <td>Jenis Pembayaran</td>
                    <td>Keterangan</td>
                    <td>Option</td>
                  </tr>
                <?php
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($getAllData)) {
                    $id_kamar = $row['id_kamar'];
                    $nama_kamar = $row['nama_kamar'];
                    $ukuran_kamar = $row['ukuran_kamar'];
                    $biaya_kamar = $row['biaya_kamar'];
                    $jenis_pembayaran = $row['jenis_pembayaran'];
                    $keterangan = $row['keterangan'];
                ?>
                <tr>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $nama_kamar; ?></td>
                    <td><?php echo $ukuran_kamar; ?></td>
                    <td><?php echo $biaya_kamar; ?></td>
                    <td><?php echo $jenis_pembayaran; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td><a href="?option=edit&amp;id_kamar=<?php echo $id_kamar; ?>">Edit</a> &middot; <a href="#" class="link-delete" data-id="<?php echo $id_kamar;?>">Delete</a></td>
                </tr>
              <?php
                  }
                } else {
                  echo "Data Tidak Di Temukan";
                }
              ?>
          <?php endif; ?>
          </table>
      <?php endif; ?>
    </section>
</div>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    Anything you want
  </div>
  <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(".link-delete").click(function(){
    var r = confirm("Apakah anda yakin ingin Menghapus?");
    var GetAttr = $(this).attr("data-id");
    if (r == true) {
        window.location = "http://localhost/SIPK/tablekamar.php?option=delete&id_kamar="+GetAttr;
    } else {
        return false;
    }
  });
  $(document).ready(function(){
    $("#search_form").submit(function(e){
      e.preventDefault();
      var q = $("#query_search").val();
      window.location = "http://localhost/SIPK/tablekamar.php?q=" + q;
    });
  });
</script>
</body>
</html>
