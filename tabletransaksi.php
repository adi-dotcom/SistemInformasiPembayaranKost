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
      <?php if (isset($_GET['option']) && isset($_GET['id_transaksi'])): ?>
        <?php
          if ($_GET['option'] == 'delete') {
            require_once "proses/connect.php";
            $id_transaksi = $_GET['id_transaksi'];
            $checkTransaksi = mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
            if (mysqli_num_rows($checkTransaksi) > 0) {
              $deleteUser = mysqli_query($connect, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
              if ($deleteUser) {
                echo 'Data Berhasil dihapus <a href="http://localhost/SIPK/tabletransaksi.php">Lihat Semua Data</a>';
              } else {
                echo "Gagal Menghapus Data Transaksi";
              }
            } else {
              echo "TRANSAKSI TIDAK DITEMUKAN";
            }
          }
        ?>
        <?php if ($_GET['option'] == "edit"): ?>
        <h1>
          Update Transaksi
        </h1>
        <small><a href="http://localhost/SIPK/tabletransaksi.php">Lihat Semua Data</a></small>
      </section>
      <section class="content container-fluid">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php
              require_once "proses/connect.php";
              $getIDTransaksi = mysqli_escape_string($connect, $_GET['id_transaksi']);
              $getAllDataUser = mysqli_query($connect, "SELECT * FROM transaksi WHERE id_transaksi='$getIDTransaksi'");
              if (mysqli_num_rows($getAllDataUser) > 0) {
                $row = mysqli_fetch_assoc($getAllDataUser);
                $id_transaksi = $row['id_transaksi'];
                $nama_pelanggan = $row['nama_pelanggan'];
                $nama_kost = $row['nama_kost'];
                $nama_kamar = $row['nama_kamar'];
                $jenis_pembayaran = $row['jenis_pembayaran'];
                $biaya_kamar = $row['biaya_kamar'];
                $tanggal_masuk = $row['tanggal_masuk'];
                $tanggal_keluar = $row['tanggal_keluar'];
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
                    <label for="NamaPelanggan">Nama Pelanggan</label>
                    <input class="form-control" name="NamaPelanggan" id="NamaPelanggan" type="text" value="<?php echo $nama_pelanggan; ?>">
                  </div>
                  <div class="form-group">
                    <label for="NamaKost">Nama Kost</label>
                    <select class="form-control" name="NamaKost" id="NamaKost" value="<?php echo $nama_kost; ?>">
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
                      <select class="form-control" name="NamaKamar" id="NamaKamar" value="<?php echo $nama_kamar; ?>">
                        <option value="">Pilih Nama Kamar</option>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="JenisPembayaran">Jenis Pembayaran</label>
                    <select class="form-control" name="JenisPembayaran" id="JenisPembayaran" value="<?php echo $jenis_pembayaran; ?>">
                      <option value="">Pilih</option>
                      <option value="Per Hari">Per Hari</option>
                      <option value="Per Bulan">Per Bulan</option>
                      <option value="Per Tahun">Per Tahun</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="BiayaKamar">Biaya Kamar</label>
                    <input class="form-control" name="BiayaKamar" id="BiayaKamar" type="text" value="<?php echo $biaya_kamar; ?>">
                  </div>
                  <div class="form-group">
                    <label for="TanggalMasuk">Tanggal Masuk</label>
                    <input class="form-control" name="TanggalMasuk" id="TanggalMasuk" type="text" data-provide="datepicker" value="<?php echo $tanggal_masuk; ?>">
                  </div>
                  <div class="form-group">
                    <label for="TanggalKeluar">Tanggal Keluar</label>
                    <input class="form-control" name="TanggalKeluar" id="TanggalKeluar" type="text" data-provide="datepicker" value="<?php echo $tanggal_keluar; ?>">
                  </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </section>
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
            List Data Transaksi
          </h1>
          <small><a href="http://localhost/SIPK/tabletransaksi.php">Tampilkan Semua Data</a></small>
        </section>
        <section class="content container-fluid">
          <?php if (isset($_GET['q'])): ?>
            <?php
              require_once "proses/connect.php";
              $query_search = mysqli_escape_string($connect, $_GET['q']);
              $getAllData = mysqli_query($connect, "SELECT * FROM transaksi WHERE nama_pelanggan LIKE '%$query_search%'");
              if (mysqli_num_rows($getAllData) > 0) {
              ?>
              <table class="table table-striped">
                <tr>
                  <td>No</td>
                  <td>Nama Pelanggan</td>
                  <td>Nama Kost</td>
                  <td>Nama Kamar</td>
                  <td>Jenis Pembayaran</td>
                  <td>Biaya Kamar</td>
                  <td>Tanggal Masuk</td>
                  <td>Tanggal Keluar</td>
                </tr>
              <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($getAllData)) {
                  $NamaPelanggan = $row['NamaPelanggan'];
                  $NamaKost = $row['NamaKost'];
                  $NamaKamar = $row['NamaKamar'];
                  $JenisPembayaran = $row['JenisPembayaran'];
                  $BiayaKamar = $row['BiayaKamar'];
                  $TanggalMasuk = $row['TanggalMasuk'];
                  $TanggalKeluar = $row['TanggalKeluar'];
              ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $NamaPelanggan; ?></td>
                <td><?php echo $NamaKost; ?></td>
                <td><?php echo $nama_kamar; ?></td>
                <td><?php echo $JenisPembayaran; ?></td>
                <td><?php echo $BiayaKamar; ?></td>
                <td><?php echo $TanggalMasuk; ?></td>
                <td><?php echo $TanggalKeluar; ?></td>
              </tr>
            <?php
                }
              } else {
                echo "Tidak ada Data";
              }
            ?>
            <?php else: ?>
              <?php
                require_once "proses/connect.php";
                $getAllData = mysqli_query($connect, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");
                if (mysqli_num_rows($getAllData) > 0) {
                ?>
                <table class="table table-striped">
                  <tr>
                    <td>No</td>
                    <td>Nama Pelanggan</td>
                    <td>Nama Kost</td>
                    <td>Nama Kamar</td>
                    <td>Jenis Pembayaran</td>
                    <td>Biaya Kamar</td>
                    <td>Tanggal Masuk</td>
                    <td>Tanggal Keluar</td>
                    <td>Option</td>
                  </tr>
                <?php
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($getAllData)) {
                    $id_transaksi = $row['id_transaksi'];
                    $nama_pelanggan = $row['nama_pelanggan'];
                    $nama_kost = $row['nama_kost'];
                    $nama_kamar = $row['nama_kamar'];
                    $jenis_pembayaran = $row['jenis_pembayaran'];
                    $biaya_kamar = $row['biaya_kamar'];
                    $tanggal_masuk = $row['tanggal_masuk'];
                    $tanggal_keluar = $row['tanggal_keluar'];
                ?>
                <tr>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $nama_pelanggan; ?></td>
                    <td><?php echo $nama_kost; ?></td>
                    <td><?php echo $nama_kamar; ?></td>
                    <td><?php echo $jenis_pembayaran; ?></td>
                    <td><?php echo $biaya_kamar; ?></td>
                    <td><?php echo $tanggal_masuk; ?></td>
                    <td><?php echo $tanggal_keluar; ?></td>
                    <td><a href="?option=edit&amp;id_transaksi=<?php echo $id_transaksi; ?>">Edit</a> &middot; <a href="#" class="link-delete" data-id="<?php echo $id_transaksi;?>">Delete</a></td>
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
        window.location = "http://localhost/SIPK/tabletransaksi.php?option=delete&id_transaksi="+GetAttr;
    } else {
        return false;
    }
  });
  $(document).ready(function(){
    $("#search_form").submit(function(e){
      e.preventDefault();
      var q = $("#query_search").val();
      window.location = "http://localhost/SIPK/tabletransaksi.php?q=" + q;
    });
  });
</script>
</body>
</html>
