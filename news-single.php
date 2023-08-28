
<?php

session_start(); 




include('admin_area/functions.php');
$comment_count = $news->post_comment_count_by_post_id($_GET['id']);

  if(!isset($_GET['id'])){
    header("Location: news.php");
  }

  // echo $id = $_GET['id'];


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>News Single - Rushdullah Assolihiyyah Foundation</title>
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
          <h2>News Single</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="news.php">News</a></li>
            <li>News Single</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->





<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <?php 
            $row = $news->get_post($_GET['id'], 1, null);

            foreach ($row as $key) {
             $key['news_title'];

             ?>

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="assets/img/news/<?=$key['news_image'] ?>" class="img-fluid" alt="">

              </div>

              <h2 class="entry-title">
                <a href="blog-single.html"><?=$key['news_title'] ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <?=$key['news_article'] ?>


              <div class="entry-content">
               
                 
                
               

                 <p>
                  Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                  Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                  Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                </p>



                
                 <img src="assets/img/news/<?=$key['news_image2'] ?>" class="img-fluid" alt="">

              </div>

            </article><!-- End blog entry -->

             <?php

              }

             ?>

            
            <div class="blog-comments">

              <h4 class="comments-count">

                <?php 

                // echo $comment_count;
                if($comment_count == 0){          

                
                   echo "No Comment";
                 
                }

                else{

                  // $comment_count+=1;

                  echo $comment_count. " Comments";
                 
                }

                ?>


              </h4>
              <h2></h2>


              <?php
                $comments = $news->get_comment($_GET['id']);

                foreach($comments as $comment){

                  ?>



              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><span class="h2"><i class="bi-person-circle"></i></span></div>
                  <div>
                    <h5><a href=""><?=$comment['name'] ?></a></h5>
                    <time datetime="2020-01-01">01 Jan, 2020</time>
                    <p>
                      <?=$comment['comment'] ?>
                    </p>
                  </div>
                </div>
              </div><!-- End comment #1 -->

               <?php
                }

                // var_dump($comment);
              ?>
             

             
              <div class="reply-form">

                <?php
                // if(isset($_SESSION['post_comment'])){
                  // echo $_SESSION['post_comment'];

                  // unset($_SESSION['post_comment']);
                // }
                ?>
                <h4>Leave a Reply</h4>
                <p>Your email address will not be published. Required fields are marked * </p>
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Your Name*" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" class="form-control" placeholder="Your Email*" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="Your Comment*" required></textarea>
                    </div>
                  </div>

                  <!-- <input type="hidden" name="post_id"> -->
                  <button name="submit_comment" type="submit" class="btn btn-primary">Post Comment</button>

                </form>
               

              </div>

            </div><!-- End blog comments -->






          



 <?php
                  if(isset($_POST['submit_comment']))
                  {
                   $name = $_POST['name'];
                   $post_id = $_GET['id'];

                    $email = $_POST['email'];
                    $comment = $_POST['comment'];

                    $post = $news->post_comment( $post_id, $comment, $name, $email);

                    if($post == true)
                    {
                      $_SESSION['post_comment'] = "<h3 class='text-success'>Comment Posted Successfully </h3>";

                    }

                    else
                    {
                      $_SESSION['post_comment'] = "<h3 class='text-danger'>Comment Post Failed </h3>";
                    }
                  }

                ?>

                <h3>
                  

                  <?php 
                    // if(isset($_SESSION['post_comment'])){
                    //   echo $_SESSION['post_comment'];

                    //   unset($_SESSION['post_comment']);
                    // }
                  ?>
                </h3>

          </div><!-- End blog entries list -->

          <div class="col-lg-4" >

            <div class="sidebar">                          

              <h3 class="sidebar-title p-3">Recent Posts</h3>

               <?php
              $recents = $news->get_post(null, 4, null);

              foreach ($recents as $recent) {
                // echo $recent['title'];


                ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="assets/img/news/<?=$recent['news_image'] ?>" alt="">
                  <h4><a href="news-single.php?id=<?=$recent['id']?>"><?=$recent['news_title'] ?></a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>


                <?php 
              }

                ?>

               
               
              </div><!-- End sidebar recent posts-->
             
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section>


</main>

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

         <!--  <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>
 -->
          <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div> -->

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