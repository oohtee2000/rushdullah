<?php 
	include('..\..\include\news.php'); 

	if(isset($_POST['update_news'])){

		$news = new news();


	 $news->setNewsArticle($_POST['news_article']);
    $news->setNewsTitle($_POST['news_title']);
    $news->setImage1($_FILES['news_pix1']);
     $news->setImage2($_FILES['news_pix2']);
      $news->setImage3($_FILES['news_pix3']);


    $news->uploadImage1();
    $news->uploadImage2();
    $news->uploadImage3();
    echo $_POST['id'];

      // $news->update_news($_POST['id']);
      var_dump($news);

	}

	



 ?>