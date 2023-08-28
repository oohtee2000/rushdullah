<?php 
include('admin_area/functions.php');

// echo "<br><br><br><br><br><br><br><br>";

// var_dump($news);
$rows = $news->get_post(null, null, null);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>News - Rushdullah Assolihiyyah Foundation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="assets/vendor/DataTables/datatables.css">

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

 <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet"/>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>

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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>News</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>News</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


   <!-- ======= Search Post ======= -->
    <section class="container" id="search">
      <div class="row">
        <div class="col">
          <div class="sidebar-item search-form">
            <form action="" method="post">
              <input type="text" name="search_text">
              <button type="submit" name="search"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End sidebar search formn-->
        </div>
      </div>
           
    </section><!-- End Search Post -->

    

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <?php

            if(!isset($_POST['search']))
            {    

              $rows = $news->get_post(null, null, null);
            }

           else
           {

            if($_POST['search_text']=="")
            {

              $rows = $news->get_post(null, null, null); 
            }

            else
            {

              $rows = $news->get_post(null, null, $_POST['search_text']);
            }
          }

          ?>            

          <?php 

          // var_dump($rows);

          // echo $rows[0]['news_image'];
          // $row_count = count($rows);

          // $display = 5;

          // $section = $row_count
          // echo $row_count;


          foreach ($rows as $row) 
          {

              echo "<br><br><br><br>";




            echo " 


                  <article class='entry'>                

                      <div class='row'>

                            <div class='entry-img col-4'>
                              <img src='assets/img/news/".$row['news_image']."' alt='' style='border-radius: 10px; margin-right: 5px;' class='img-fluid'>
                            </div>

                            <div class='body col-8 ms-5'>



                            <h2 class='entry-title'>
                              <a href='news-single.php?id=".$row['id']."'>".$row['news_title']."</a>
                            </h2>

                            <div class='entry-meta'>
                              <ul>
                               <!--  <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='news-single.php'>John Doe</a></li> -->
                                <li class='d-flex align-items-center'><i class='bi bi-clock'></i> <a href='news-single.php?id=".$row['id']."'><time datetime='2020-01-01'>Jan 1, 2020</time></a></li>
                               <!--  <li class='d-flex align-items-center'><i class='bi bi-chat-dots'></i> <a href='news-single.php?id=".$row['id']."'>12 Comments</a></li> -->
                              </ul>
                            </div>

                            <div class='entry-content'>
                              
                              ".
                                
                                 substr($row['news_article'], 0, 150).

                              "
                              <div class='read-more'>
                                <a href='news-single.php?id=".$row['id']."'>Read More</a>
                              </div>
                            </div>
                            </div>
                            </div>
                            </td>

                           
                          </article><!-- End blog entry -->

                  " ;

          }

?> 


           

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
              
            </div>

          <!-- </div> -->
          <!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




