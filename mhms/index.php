<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">
  <head>
    <title>Maid Hiring Management System || Home Page</title>

    <link rel="manifest" href="site.webmanifest" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <link rel="stylesheet" href="assets/css/price_rangs.css" />
    <link rel="stylesheet" href="assets/css/slicknav.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      .carousel-caption-custom {
        position: absolute;
        bottom: 20px;
        left: 20px;
        text-align: left;
      }
      .carousel-caption-custom h1 {
        color: darkblue;
        font-size: 2.5rem;
      }
      .carousel-caption-custom p {
        color: skyblue;
        font-size: 1.2rem;
      }
    </style>
  </head>

  <body>
    <?php include_once('includes/header.php'); ?>

    <main>
      <!-- Slider Area Start -->
      <div class="slider-area">
        <div id="heroCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/img/hero/h1_hero1.jpg" class="d-block w-100" alt="Hero Image 1" />
              <div class="carousel-caption-custom">
                <h1>Looking to hire a maid</h1>
                <p>You have arrived to the right place</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/img/hero/h1_hero2.jpg" class="d-block w-100" alt="Hero Image 2" />
              <div class="carousel-caption-custom">
                <h1>Looking to hire a maid</h1>
                <p>You have arrived to the right place</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/img/hero/h1_hero3.jpg" class="d-block w-100" alt="Hero Image 3" />
              <div class="carousel-caption-custom">
                <h1>Looking to hire a maid</h1>
                <p>You have arrived to the right place</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Slider Area End -->
    </main>

    <?php include_once('includes/footer.php'); ?>

    <!-- JS -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.slicknav.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/price_rangs.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
  </body>
</html>
