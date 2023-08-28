<?php 

session_start(); 

if (!isset($_SESSION['username']))           
{
  echo "<br><br><br><br><br><br><br>";
  // unset($_SESSION['username']);
  echo $_SESSION['username'];
  // echo 
  // "<script>
  //   window.location.href='signin.php'
  // </script>";
}
include('functions.php'); 

if(isset($_POST['submit_news'])){

   

    $news_article = $_POST['news_article'];
    $news_title = $_POST['news_title'];
    $file = $_FILES['news_pix1'];
    $file2 = $_FILES['news_pix2'];
    $file3 = $_FILES['news_pix3'];

    $news->uploadFile($file);
    $news->uploadFile2($file2);
    $news->uploadFile3($file3);

   $insert = $news->post_blog($file, $file2, $file3, 2);

   if($insert)
   {
      $_SESSION['insert'] = "<h3 class='text-success'>News Insert Successfully</h3>";
     echo "<script>
    window.location.href = 'index.php';
   </script>";

   }
   else
   {
     $_SESSION['insert_failed'] = "<h3 class='text-danger'>News Failed To Insert</h3>";
      echo "<script>
    window.location.href = 'index.php';
   </script>";
   }
  
    
}       


?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - Insert News</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php"><span>Rushdullah </span>Assolihiyyah</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php">Home</a></li>

          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.php">About Us</a></li>
              <li><a href="team.php">Team</a></li>
            </ul>
          </li>

          <li><a href="services.php">Services</a></li>
          <li><a href="portfolio.php">Portfolio</a></li>
          <li><a href="pricing.php" class="active">Pricing</a></li>
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

  <br>

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Insert News</h2>
        </div>



        <style>

            .faq-list form div.form-control{
                border: none !important;
                padding: 10px;

            }
        </style>

         
        <div class="faq-list">
            <form action="" method="post" enctype="multipart/form-data">
                <legend>    
                    
                        <div class="form-control">
                            <label class="text-success h4">Title </label>
                            <input type="text" name="news_title" placeholder="Enter News Title" id="" class="form-control">
                        </div>                                   
                                        
                        <div class="form-control">
                            <label class="text-success h4">Article </label>
                            <textarea name="news_article" class="form-control" id="editor1"></textarea>
                        </div>                                      

                    
                        <div class="form-control">
                            <label class="text-success h4">News Pix 1 </label>
                            <input type="file" name="news_pix1" class="form-control">
                        </div>     

                        <div class="form-control">
                            <label class="text-success h4">News Pix 2 </label>
                            <input type="file" name="news_pix2" class="form-control">
                        </div>     

                        <div class="form-control">
                            <label class="text-success h4">News Pix 3 </label>
                            <input type="file" name="news_pix3" class="form-control">
                        </div>     


                      
                    
                        <div class="form-control">
                            
                            <button type="submit" name="submit_news" class="btn btn-success">Add News</button>
                        </div>                                   

                    
                </legend>
                
            </form>
        </div>






      </div>
    </section><!-- End Frequently Asked Questions Section -->


  <table id="table" class="w-100 border table table-striped" border>
                          <?php 

                            for ($i=0; $i < 80 ; $i++) { 

                              ?>

                              <tr>
                                <td>row <?= $i ?></td>
                                <td>row2 <?= $i ?></td>
                                <td>row3 <?= $i ?></td>
                              </tr>
                              <?php
                             
                            }
                          ?>
                        </table>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Rushdullah Assolihiyyah</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Rushdullah Assolihiyyah</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">Yusuf</a>
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
  <script src="../assets/vendor/jquery.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
   
   <script src="../assets/vendor/ckeditor/ckeditor.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

   <script type="text/javascript">

      CKEDITOR.replace('editor1');
    </script>

</body>

</html>