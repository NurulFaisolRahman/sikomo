<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SIKOMO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/css/orgchart.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">SIKOMO</a></h1>
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero"><b>Home</b></a></li>
          <li><a href="#Komoditas"><b>Komoditas</b></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Sistem Informasi Komoditas</h1>
          <h2>Produk Turunan Dari Berbagai Jenis Komoditas</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#Komoditas" class="btn-get-started">Komoditas</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/Komoditas.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Our komoditas Section ======= -->
    <section id="Komoditas" class="komoditas section-bg">
      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="section-title">
          <h2>komoditas</h2>
        </div>
        <div class="row">
          <?php foreach ($Komoditas as $key) { ?>
          <div class="col-lg-3 col-md-3 komoditas-item filter-app">
            <div class="komoditas-wrap">
              <img src="Komoditas/<?=$key['Foto']?>" class="img-fluid" alt="">
              <div class="komoditas-info">
                <h4><?=$key['Nama']?></h4>
                <div class="komoditas-links">
                  <a href="Komoditas/<?=$key['Foto']?>" data-gall="komoditasGallery" class="venobox" title="Foto <?=$key['Nama']?>"><i class="icofont-eye"></i></a>
                  <a Komoditas="<?=$key['Id']?>" class="Komoditas" title="Detail Turunan"><i class="icofont-external-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- End Our komoditas Section -->

    <div class="modal fade" id="ModalKomoditas" tabindex="-1" role="dialog" aria-labelledby="ModalKomoditasTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold text-primary text-center" id="JudulKomoditas">Pohon Industri Komoditas</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body overflow-auto" style="height: 80vh;">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div id="PohonIndustri" style="text-align: center;"></div>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </main>  

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script> 
  <script src="assets/js/orgchart.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script type="text/javascript">
    var BaseURL = '<?=base_url()?>'
    $(function() {

      $(document).on("click",".Komoditas",function(){
        $.post(BaseURL+"Sikomo/GetKomoditas/"+$(this).attr('Komoditas')).done(function(Respon) {
          var Data = JSON.parse(Respon)
          $("#JudulKomoditas").html("Produk Turunan Komoditas "+Data.Nama)
          var datascource = JSON.parse(Data.Turunan)
          $('#PohonIndustri').empty();
          $('#PohonIndustri').orgchart({
            'visibleLevel': 2,
            'data' : datascource,
            'createNode': function($node, data) {
              $node.on('click', function(event) {
                if (!$(event.target).is('.edge, .toggleBtn')) {
                  var $this = $(this);
                  var $chart = $this.closest('.orgchart');
                  var newX = window.parseInt(($chart.outerWidth(true)/2) - ($this.offset().left - $chart.offset().left) - ($this.outerWidth(true)/2));
                  var newY = window.parseInt(($chart.outerHeight(true)/2) - ($this.offset().top - $chart.offset().top) - ($this.outerHeight(true)/2));
                  $chart.css('transform', 'matrix(1, 0, 0, 1, ' + newX + ', ' + newY + ')');
                }
              });
            }
          });
          $("#ModalKomoditas").modal('show')
        })
      })

      $(document).on('click', 'a[href^="#"]', function(e) {
        // target element id
        var id = $(this).attr('href');
        // target element
        var $id = $(id);
        if ($id.length === 0) {return;}
        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();
        // top position relative to the document
        var pos = $id.offset().top;
        // animated top scrolling
        $('body, html').animate({scrollTop: pos});
      });

    });
  </script>
</body>
</html>