<?php
include('admin_area/functions.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Al-Rasul Al-Salihiyah Foundation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>


  <!-- Rushdullah Assolihiyyah -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php"><span>Rushdullah</span><span class="text-black">-</span> AsSolihiyyah</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>

          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.php">About Us</a></li>
              <li><a href="team.php">Team</a></li>
            </ul>
          </li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="news.php">News</a></li>
          <li><a href="contact.php">Contact</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <div class="row">
    <div class="col-md-8 col-sm-12">
      <section id="hero" style="background-color: rgba(255, 255, 255, 0.8) !important;">
        <!-- <div id="heroCarousel" data-bs-interval="3000" class="carousel slide carousel-fade" data-bs-ride="carousel"> -->

        <div class="bg-white" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active ms-5" style="background-image: url(assets/img/rushdullah1.jpg);">
            <div class="carousel-container" style="border-radius: 100% !important;">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <h1 class="myGreen">Assallamul <span>Alaykun</span></h1>
                <h2>Welcome to <span>Rushdullah Assolihiyyah</span></h2>
                <p class="fw-light">A platform dedicated to sharing knowledge and promoting understanding of the Islamic faith. Our goal is to provide a support and resources for Muslims and non-Muslims alike to learn about Islam, its beliefs, practices, and history.</p>
              </div>
            </div>
          </div>

        </div>
      </section><!-- End Hero -->
    </div>

    <!-- style -->
    <style>
      .myGreen {
        color: #1bbd36;
      }

      #sidebar aside {
        margin-bottom: 12%;
        border: 1px solid #000;
        padding: 15px;
        border-radius: 3px;
      }

      #sidebar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        font-size: 16px;
      }

      .posts.posts__list {
        list-style: none;
        padding-left: 0;
      }

      .posts,
      .posts li {
        list-style: none;
        margin: 0;
      }

      #sidebar ul li {
        margin: 0 0 15px;
        font-size: 17px;
      }

      .posts li:not(:last-child) {
        border-bottom: 1px dashed rgba(0, 0, 0, 0.2);
      }

      .posts {
        clear: both;
      }

      .posts li {
        padding: 0.25em 0;

      }

      .posts,
      .posts li {
        list-style: none;
        margin: 0;
      }

      #sidebar ul li a {
        color: #5b5b5b;
      }

      #sidebar h3 {
        margin: -40px 0 20px;
        padding: 15px;
        font-weight: bold;
        font-size: 20px;
        background: #1bbd36;
        color: white;
        text-transform: none;
        text-align: center;
      }
    </style>

    <div class="col-md-4 col-sm-12">
      <br><br><br>
      <div class="sidebar" id="sidebar">


        <aside id="" class="posts">
          <ul class="">

            <?php

            $rows = $news->get_post(null, 4, null);

            foreach ($rows as $row) {
            ?>
              <li>
                <div class="row" style="border-radius: 10px;">


                  <img src="assets/img/news/<?= $row['news_image'] ?>" style="width: 5px !important;" class="col">

                  <a class="col-9" href="news-single.php?id=<?= $row['id'] ?>" class="title"><?= $row['news_title'] ?></a>
                  <!-- <a href='news-single.php?id=".$row['id']."'>".$row['news_title']."</a> -->
                </div>

              </li>

            <?php
            }
            ?>
          </ul>
        </aside>

        <aside id="" class="myGreen">
          <h3 class="">Upcomings </h3>
          <div class="posts" id="">
            <div class="" id="">
              <ul>
                <li>
                  <a href="#">The Upcomming Events 1</a>
                </li>

                <li>
                  <a href="#">The Upcomming Events 2</a>
                </li>
              </ul>
              <!-- No event found!  -->
            </div>
          </div>
        </aside>


      </div>
    </div>
  </div>


  <main id="main">

    <!--  -->
    <style>
      .section-title {
        text-align: center;
        padding-bottom: 30px;
      }

      .section-title h2 {
        font-size: 32px;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
        padding-bottom: 20px;
        position: relative;
      }

      .section-title p {
        margin-bottom: 0;
      }

      .about .content ul {
        list-style: none;
        padding: 0;
      }

      .about .content ul li {
        padding-left: 28px;
        position: relative;
      }

      .about .content .btn-learn-more {
        font-family: "Raleway", sans-serif;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 12px 32px;
        border-radius: 5px;
        transition: 0.3s;
        line-height: 1;
        color: #006fbe;
        -webkit-animation-delay: 0.8s;
        animation-delay: 0.8s;
        margin-top: 6px;
        border: 2px solid #006fbe;
      }

      .ri-check-double-line {
        color: blue !important;
      }
    </style>




    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Rushdullah</h2>
          <p>At Rushdullah Assolihiyyah, we believe in the importance of providing sustainable solutions that empower individuals and communities to improve their lives. Our programs focus on education, healthcare, and livelihoods, and are designed to help people build a better future for themselves and their families.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <img src="assets/img/rushdullah2.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              The function of Rushdullah Assolihiyyah foundation is the following:
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> A society which respects the rights of children and youth: a society which promotes positive and enabling environment for children and youth to grow and develop into responsible adults; a sanitized society.</li>
              <li><i class="ri-check-double-line"></i> A society which respects the rights of children and youth: a society which promotes positive and enabling environment for children and youth to grow and develop into responsible adults; a sanitized society.</li>
              <li><i class="ri-check-double-line"></i>A society which respects the rights of children and youth: a society which promotes positive and enabling environment for children and youth to grow and develop into responsible adults; a sanitized society.</li>
            </ul>

          </div>
        </div>

      </div>
    </section><!-- End My & Family Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 col-md-6 footer-contact">
            <h3>RUSHDULLAH ASSOLIHIYYAH</h3>
            <p>
              <?= STREET ?><br>
              <?= AREA_STATE ?><br>
              <?= COUNTRY ?> <br><br>
              <strong>Phone:</strong> <?= PHONE ?><br>
              <strong>Email:</strong><?= EMAIL ?><br>
            </p>
          </div>

          <div class="col-lg-5 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>



        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>RUSHDULLAH ASSOLIHIYYAH</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




<?php


echo md5("oluwatosin2000");

?>