<?php

use kcfinder\session;

session_start();
include("../koneksi/koneksi.php") ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include("includes/header.php") ?>

    <?php include("includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-plus"></i> Tambah Blog</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="blog.php">Data Blog</a></li>
                <li class="breadcrumb-item active">Tambah Blog</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Blog</h3>
            <div class="card-tools">
              <a href="blog.php" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          </br></br>
          <div class="col-sm-10">
            <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
            <?php if($_GET['notif']=="tambahkosong"){?>
            <div class="alert alert-danger" role="alert">Maaf data
              <?php echo $_GET['jenis'];?> wajib di isi</div>
            <?php }?>
            <?php }?>
          </div>
          <form class="form-horizontal" method="POST" action="konfirmasitambahblog.php">
            <div class="card-body">
              <div class="form-group row">
                <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
                <div class="col-sm-7">
                  <select class="form-control" name="kategori_blog" id="kategori">
                    <option value="0">- Pilih Kategori -</option>
                    <?php
                     $sql_datakategoriblog = "SELECT `id_kategori_blog`, `kategori_blog` from `kategori_blog` ORDER BY `kategori_blog`";
                       $query_datakategoriblog = mysqli_query($koneksi,$sql_datakategoriblog);
                       while($data_kategoriblog = mysqli_fetch_row($query_datakategoriblog)){
                         $id_kategori_blog = $data_kategoriblog[0];
                         $kategori_blog = $data_kategoriblog[1];
                ?>
                    <option value="<?php echo $id_kategori_blog ?>"><?php echo $kategori_blog ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="judul" id="judul" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="isi" id="editor1" rows="12"></textarea>
                </div>
              </div>

            </div>
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
      </div>
    </div>
    <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php") ?>

  </div>
  <!-- ./wrapper -->

  <?php include("includes/script.php") ?>
</body>

</html>