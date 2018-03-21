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
      <?php if (isset($_GET['option']) && isset($_GET['id_pelanggan'])): ?>
        <?php
          if ($_GET['option'] == 'delete') {
            require_once "proses/connect.php";
            $id_pelanggan = $_GET['id_pelanggan'];
            $checkPelanggan = mysqli_query($connect, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
            if (mysqli_num_rows($checkPelanggan) > 0) {
              $deleteUser = mysqli_query($connect, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
              if ($deleteUser) {
                echo 'Data Berhasil dihapus <a href="http://localhost/SIPK/tablepelanggan.php">Lihat Semua Data</a>';
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
          Update Data Pelanggan
        </h1>
        <small><a href="http://localhost/SIPK/tablepelanggan.php">Lihat Semua Data</a></small>
      </section>
      <section class="content container-fluid">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php
              require_once "proses/connect.php";
              $getIDPelanggan = mysqli_escape_string($connect, $_GET['id_pelanggan']);
              $getAllDataUser = mysqli_query($connect, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$getIDPelanggan'");
              if (mysqli_num_rows($getAllDataUser) > 0) {
                $row = mysqli_fetch_assoc($getAllDataUser);
                $id_pelanggan = $row['id_pelanggan'];
                $nama_pelanggan = $row['nama_pelanggan'];
                $tempat_lahir = $row['tempat_lahir'];
                $tanggal_lahir = $row['tanggal_lahir'];
                $status = $row['status'];
                $no_identitas = $row['no_identitas'];
                $asal = $row['asal'];
              }
            ?>
            <form role="form" action="proses/updatedatapelanggan.php" method="post">
              <?php if (isset($_GET['alert'])): ?>
                <?php if ($_GET['alert'] == "success"): ?>
                  <div class="alert alert-success">
                    Data Berhasil Dirubah
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
                  <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                  <div class="form-group">
                    <label for="NamaPelanggan">Nama Pelanggan</label>
                    <input class="form-control" id="NamaPelanggan" name="nama_pelanggan" type="text" value="<?php echo $nama_pelanggan; ?>">
                  </div>
                  <div class="form-group">
                    <label for="TempatLahir">Tempat Lahir</label>
                    <input class="form-control" id="TempatLahir" name="tempat_lahir" type="text" value="<?php echo $tempat_lahir; ?>">
                  </div>
                  <div class="form-group">
                    <label for="TanggalLahir">Tanggal Lahir</label>
                    <input class="form-control" id="TanggalLahir" name="tanggal_lahir" type="text" data-provide="datepicker" value="<?php echo $tanggal_lahir; ?>">
                  </div>
                  <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control" id="Status" name="status">
                      <option value="">Pilih</option>
                      <option value="Nikah" <?php if($status == 'Nikah'){echo "selected";} ?>>Nikah</option>
                      <option value="Belum Nikah" <?php if($status == 'Belum Nikah'){echo 'selected="selected"';} ?>>Belum Nikah</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="NoIdentitas">No Identitas</label>
                    <input class="form-control" id="NoIdentitas" name="no_identitas" type="text" value="<?php echo $no_identitas; ?>">
                  </div>
                  <div class="form-group">
                    <label for="Asal">Asal</label>
                    <input class="form-control" id="Asal" name="asal" type="text" value="<?php echo $asal; ?>">
                  </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
            List Data Pelanggan
          </h1>
          <small><a href="http://localhost/SIPK/tablepelanggan.php">Tampilkan Semua Data</a></small>
        </section>
        <section class="content container-fluid">
          <?php if (isset($_GET['q'])): ?>
            <?php
              require_once "proses/connect.php";
              $query_search = mysqli_escape_string($connect, $_GET['q']);
              $getAllData = mysqli_query($connect, "SELECT * FROM tb_pelanggan WHERE nama_pelanggan LIKE '%$query_search%'");
              if (mysqli_num_rows($getAllData) > 0) {
              ?>
              <table class="table table-striped">
                <tr>
                  <td>No</td>
                  <td>Nama Pelanggan</td>
                  <td>Tempat Lahir</td>
                  <td>Tanggal Lahir</td>
                  <td>Status</td>
                  <td>No Identitas</td>
                  <td>Asal</td>
                </tr>
              <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($getAllData)) {
                  $nama_pelanggan = $row['nama_pelanggan'];
                  $tempat_lahir = $row['tempat_lahir'];
                  $tanggal_lahir = $row['tanggal_lahir'];
                  $status = $row['status'];
                  $no_identitas = $row['no_identitas'];
                  $asal = $row['asal'];
              ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $nama_pelanggan; ?></td>
                <td><?php echo $tempat_lahir; ?></td>
                <td><?php echo $tanggal_lahir; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $no_identitas; ?></td>
                <td><?php echo $asal; ?></td>
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
                $getAllData = mysqli_query($connect, "SELECT * FROM tb_pelanggan ORDER BY id_pelanggan DESC");
                if (mysqli_num_rows($getAllData) > 0) {
                ?>
                <table class="table table-striped">
                  <tr>
                    <td>No</td>
                    <td>Nama Pelanggan</td>
                    <td>Tempat Lahir</td>
                    <td>Tanggal Lahir</td>
                    <td>Status</td>
                    <td>No Identitas</td>
                    <td>Asal</td>
                    <td>Option</td>
                  </tr>
                <?php
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($getAllData)) {
                    $id_pelanggan = $row['id_pelanggan'];
                    $nama_pelanggan = $row['nama_pelanggan'];
                    $tempat_lahir = $row['tempat_lahir'];
                    $tanggal_lahir = $row['tanggal_lahir'];
                    $status = $row['status'];
                    $no_identitas = $row['no_identitas'];
                    $asal = $row['asal'];
                ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $nama_pelanggan; ?></td>
                  <td><?php echo $tempat_lahir; ?></td>
                  <td><?php echo $tanggal_lahir; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $no_identitas; ?></td>
                  <td><?php echo $asal; ?></td>
                  <td><a href="?option=edit&amp;id_pelanggan=<?php echo $id_pelanggan; ?>">Edit</a> &middot; <a href="#" class="link-delete" data-id="<?php echo $id_pelanggan;?>">Delete</a></td>
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
  $('.TanggalLahir').datepicker();
</script>
<script type="text/javascript">
  $(".link-delete").click(function(){
    var r = confirm("Apakah anda yakin ingin Menghapus?");
    var GetAttr = $(this).attr("data-id");
    if (r == true) {
        window.location = "http://localhost/SIPK/tablepelanggan.php?option=delete&id_pelanggan="+GetAttr;
    } else {
        return false;
    }
  });
  $(document).ready(function(){
    $("#search_form").submit(function(e){
      e.preventDefault();
      var q = $("#query_search").val();
      window.location = "http://localhost/SIPK/tablepelanggan.php?q=" + q;
    });
  });
</script>
</body>
</html>
