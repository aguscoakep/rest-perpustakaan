<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Info Buku</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>info/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="<?php echo base_url()?>info/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>info/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>info/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>info/css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo base_url()?>info/img/profile.jpg" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Peminjaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests">Penerbit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards">Pengarang</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?php echo site_url('login/logout'); ?>">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Info
            <span class="text-primary">Perpustakaan</span>
          </h1>
          <div class="subheading mb-5">Data buku
          </div>
        
           <table class="table">
                  <tr><th>ID</th>
                    <th>JUDUL</th>
                    <th>KATEGORI</th>
                    <th>PENERBIT</th>
                    <th>PENGARANG</th>
                    <th>STATUS</th>
                  </tr>
                  <?php
                  foreach ($databuku as $drink){
                      echo "<tr>
                            <td>$drink->id_buku</td>
                            <td>$drink->judul</td>
                            <td>$drink->id_kategori</td>
                            <td>$drink->id_penerbit</td>
                            <td>$drink->id_pengarang</td>
                            <td>$drink->status</td>
                            </tr>";
                  }
                  ?>
              </table>
          
          <ul class="list-inline list-social-icons mb-0">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h2 class="mb-5">Data Peminjaman</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
             
                <table class="table">
                      <tr><th>ID PEMINJAMAN</th>
                        <th>TANGGAL PEMINJAMAN</th>
                        <th>USER</th>
                        <th>BUKU</th>
                        <th>BATAS KEMBALI</th>
                        <th>STATUS</th>
                      </tr>
                      <?php
                      foreach ($datapeminjaman as $drink){
                          echo "<tr>
                                <td>$drink->id_peminjaman</td>
                                <td>$drink->tanggal_peminjaman</td>
                                <td>$drink->id_user</td>
                                <td>$drink->id_buku</td>
                                <td>$drink->batas_kembali</td>
                                <td>$drink->status</td>
                                
                                </tr>";
                      }
                      ?>
                  </table>
             
            </div>
          </div>
        </div>

      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
          <h2 class="mb-5">Kategori</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
               <table class="table">
                    <tr><th>ID KATEGORI</th>
                      <th>NAMA KATEGORI</th>
                    </tr>
                    <?php
                    foreach ($datakategori as $drink){
                    echo "<tr>
                         <td>$drink->id_kategori</td>
                         <td>$drink->nama_kategori</td>
                          </tr>";
                    }
                    ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

    

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
          <h2 class="mb-5">PENERBIT</h2>
          <p><table class="table">
              <tr><th>Id penerbit</th>
                <th>Nama penerbit</th>
                </tr>
              <?php
              foreach ($datapenerbit as $drink){
                  echo "<tr>
                        <td>$drink->id_penerbit</td>
                        <td>$drink->nama_penerbit</td>
                        </tr>";
              }
              ?>
          </table>
        </p>
          <p class="mb-0">

          </p>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
          <h2 class="mb-5">PENGARANG</h2>
          <p>     
            <table class="table">
                  <tr>
                    <th>Id pengarang</th>
                    <th>Nama pengarang</th>
                  </tr>
                  <?php
                  foreach ($datapengarang as $drink){
                      echo "<tr>
                            <td>$drink->id_pengarang</td>
                            <td>$drink->nama_pengarang</td>
                            
                            </tr>";
                  }
                  ?>
              </table>
          </p>
        </div>
      </section>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()?>info/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>info/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url()?>info/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url()?>info/js/resume.min.js"></script>

  </body>

</html>
