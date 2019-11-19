<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Selamat Datang! </title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/css/components.css") ?>">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?= base_url() ?>" class="navbar-brand sidebar-gone-hide">ABC</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link">Universitas Orang Berdasi</a></li>
          </ul>
        </div>
      </nav>
      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Selamat Datang!</span></a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('landing/auth') ?>" class="nav-link"><i class="far fa-user"></i><span>Login</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pengumuman Daftar Ulang</h1>
          </div>
          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Upload Scan Berkas</h4>
              </div>
              <div class="card-body">
                  <?php
                    $i = 1;
                    foreach($berkas as $b){
                        echo "<h5>".$i.". ".$b->nama_berkas."</h5>";
                        $i++;
                    }
                  ?>
                  <br/>
                  Semua dalam bentuk scan dengan ekstensi .jpg
              </div>
              <div class="card-footer bg-whitesmoke">
                Batas Upload, 20 Agustus 2020
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Pengumpulan Berkas Fisik</h4>
              </div>
              <div class="card-body">
                <p>Berkas fisik dikumpulkan beserta surat pernyataan di Kemahasiswaan, gedung ABC Pembangunan</p>
              </div>
              <div class="card-footer bg-whitesmoke">
                Batas Pengumpulan Berkas Fisik, 5 September 2020
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Universitas ABC
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url("assets/js/stisla.js")?>"></script>

  <script src="<?= base_url("assets/js/scripts.js")?>"></script>
  <script src="<?= base_url("assets/js/custom.js")?>"></script>
</body>
</html>
