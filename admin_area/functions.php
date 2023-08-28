<?php 

define("AUTHOR", 'YUSUF OLORORO');
define("STREET", '2, AJAOKUTA ROAD ADEWOLE HOUSING ESTATE');
define("AREA_STATE", 'ADEWOLE, ILORIN, KWARA STATE');
define("COUNTRY", 'NIGERIA');
define("PHONE", '07034667778');
define("EMAIL", ' rushdullah@gmail.com');
// session_start();

class Blog
{
	public $dest = "../assets/img/news/";
	private $db = null; 
	private $randFileName= null;
	private $randFileName2= null;
	private $randFileName3= null;
	private $randGalleryName = null;
	function __construct()
	{
		date_default_timezone_set('Africa/Lagos');
		$this->db = mysqli_connect("localhost", "root", "", "rushdullah");
		$this->randFileName = "blog_image".rand(0, 999);
		$this->randFileName2 = "blog_image".rand(0, 999);
		$this->randFileName3 = "blog_image".rand(0, 999);
		$this->randGalleryName = "gallery".rand(0, 999);

	}


	public function clean_input($input){
		if($input!=''){
			return strip_tags($this->db->real_escape_string(trim($input)));
		}
	}


		/*comment*/

		// public function post_comment($news_id, $comment)
		// {
		// 	$sql = "INSERT INTO `comment` (`news_id`, `comment`) VALUES ('$news_id', '$comment');";
		// 	$result = mysqli_query($this->db, $sql);
		// 	return $result;
		// }



	public function post_blog($file, $file2, $file3, $cat){
		echo $news_title = $this->clean_input($_POST['news_title']); echo "<br>";
		echo $news_article = $this->clean_input($_POST['news_article']);echo "<br>";
		echo $image = $this->clean_input($this->getRandImageName($file));echo "<br>";
		echo $image2 = $this->clean_input($this->getRandImageName2($file2));echo "<br>";
		echo $image3 = $this->clean_input($this->getRandImageName3($file3));echo "<br>";


		$sql = "INSERT INTO `news` (`news_title`, `news_article`, `news_image`, `news_image2`, `news_image3`, `category_id`) VALUES ('$news_title', '$news_article', '$image', '$image2', '$image3', $cat);";
		$result = mysqli_query($this->db, $sql);echo "<br>";
		return $result;
	}


	public function update_blog($id, $file=null,  $file2=null,  $file3=null,  $title = null, $article = null, $cat = null){

		echo $news_title = $this->clean_input($_POST['news_title']); echo "<br>";
		echo $news_article = $this->clean_input($_POST['news_article']);echo "<br>";
		echo $image = $this->clean_input($this->getRandImageName($file));echo "<br>";

		echo $image2 = $this->clean_input($this->getRandImageName2($file2));echo "<br>";
		echo $image3 = $this->clean_input($this->getRandImageName3($file3));echo "<br>";


		$sql = "UPDATE `news` SET ";

		if($title != null){
			$sql.="`news_title` = '$news_title' ";
		}

		if($article != null){
			$sql.=", `news_article` = '$news_article' ";
		}

		if($file != null){
			$sql.=", `news_image` = '$image' ";
		}

		if($file2 != null){
			$sql.=", `news_image2` = '$image2' ";
		}

		if($file3 != null){
			$sql.=", `news_image3` = '$image3' ";
		}

		if($cat != null){
			$sql.=", `category_id` = '$cat' ";
		}		

		$sql.="WHERE `news`.`id` = $id";

		echo "the sql syntax is this: <br>".$sql;
		// $result = mysqli_query($this->db, $sql);echo "<br>";
		// return $result;

		return $this->db->query($sql);
	}

	public function delete_blog($id){

		$sql = "DELETE FROM `news` WHERE `news`.`id` = $id";

		return $this->db->query($sql);
	}
	

	public function get_post($post_id = null, $limit = null, $search = null){
		$sql = "SELECT * FROM `news`";
		if($post_id != null){
			$sql.="WHERE id = '$post_id' ";
		}

		if($search != null){
			$sql.=" WHERE news_title LIKE '%$search%' OR news_article LIKE '%$search%' ";
		}
		$sql.="ORDER BY `date_added` DESC ";

		if($limit != null){
			$sql.="LIMIT $limit";
		}

		// var_dump($sql);

		
		return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);	
	}

	public function get_category(){
		$sql = "SELECT * FROM `categories`";
		return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);	
	}

	public function post_count_by_category_id(int $cat_id){
		$sql = "SELECT count(*) as total FROM `news` WHERE category_id = '$cat_id'";
		return $this->db->query($sql)->fetch_assoc()['total'];	

	}

	public function generate_image_name(){
	
	$date = date('Y-m-d');
	$image_name = explode("-", $date);

	$array_lenght = count($image_name);
	$last_name = "image_name";
	$final_name = [];
	echo $array_lenght;

	for($i=0; $i< $array_lenght; $i++) { 
		
	$last_name .= "_".$image_name[$i];		
	}

	echo $last_name;

	var_dump($final_name);

}

	public function post_comment($post_id = NULL, $comment =NULL, $name =NULL , $email=NULL)
	{
		$comment = $this->clean_input($comment);
		$name = $this->clean_input($name);
		$email = $this->clean_input($email);

		


		echo $created_on = date('Y-m-d');

		$arr = explode("-", $created_on);
		var_dump($arr);


		$sql = "INSERT INTO `comment` (`name`, `email`, `news_id`, `comment`, `created_on`) VALUES ('$name', '$email', '$post_id', '$comment', '$created_on');";
		$result = mysqli_query($this->db, $sql);
		return $result;
	}

	public function post_comment_count_by_post_id($post_id){
		$sql = "SELECT count(*) as total FROM `comment` WHERE `news_id` = '$post_id'";
		return $this->db->query($sql)->fetch_assoc()['total'];	

	}

	// public function comment_get_by_post(int $post_id){
	// 	$sql = "SELECT count(*) as total FROM `comment` WHERE post_id = '$post_id'";
	// 	return $this->db->query($sql)->fetch_assoc()['total'];
	// }

	public function get_comment($post_id){
		$sql = "SELECT * FROM `comment` WHERE `news_id` = '$post_id' ";

		return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);	
	}

	

	/*for files*/

	public function getRandImageName($file){
		return $this->randFileName.".".end($this->getFileExt($file));
	}

	public function getRandImageName2($file){
		return $this->randFileName2.".".end($this->getFileExt($file));
	}

	public function getRandImageName3($file){
		return $this->randFileName3.".".end($this->getFileExt($file));
	}

	public function getRandGalleryName($file){
		return $this->randGalleryName.".".end($this->getFileExt($file));
	}

	public function uploadFile($file){
		
			return move_uploaded_file($file['tmp_name'], $this->dest.$this->getRandImageName($file));
	}

	public function uploadFile2($file){
		
			return move_uploaded_file($file['tmp_name'], $this->dest.$this->getRandImageName2($file));
	}

	public function uploadFile3($file){
		
			return move_uploaded_file($file['tmp_name'], $this->dest.$this->getRandImageName3($file));
	}

	public function uploadGallery($file, $dest = null){

			return move_uploaded_file($file['tmp_name'], $dest.$this->getRandGalleryName($file));
	}

	public function deleteFile($file){
		unlink($this->dest.$file);
	}

	public function getFileName($file){
		return $file['name'];
	}

	public function getTmpName($file){
		return $file['tmp_name'];
	}

	public function getFileExt($file){
		return explode('.', $file['name']);
	}

	// public function rando?

	/*for gallery*/


	public function insert_gallery($file, $title){
		
		echo $image = $this->clean_input($this->getRandGalleryName($file));

		$sql = "INSERT INTO `gallery` (`image`, `image_title`) VALUES ('$image', '$title');";
		$result = mysqli_query($this->db, $sql);echo "<br>";
		return $result;

	}


public function get_image($post_id = null, $limit = null){
		$sql = "SELECT * FROM `gallery`";
		if($post_id != null){
			$sql.="WHERE id = '$post_id' ";
		}

		$sql.="ORDER BY `date_added` DESC ";

		if($limit != null){
			$sql.="LIMIT $limit";
		}

		return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);	
	}

}

 $news = new Blog();


// $news_id, comment

// $post = $news->post_comment( '9', 'oluooo','oluwatosin is using cap');

// var_dump($post);
// if($post){
// 	echo "post is successfull";

// }

// else{
// 	echo "post not successful";
// }

 // $postcomment = $news->post_comment();
 // if($postcomment == true){
 // 	echo "comment posted successfully";
 // }

 // else{
 // 	echo "comment posted unsuccessfully";
 // }

//  $news->generate_image_name();

//  echo $post_comment_by_id = $news->post_comment_count_by_post_id();

//  if($post_comment_by_id == true){
//  	echo "post true";
//  }
//  else{
//  	echo "post false";
//  }

 // $comment = $news->get_comment(53);
 // var_dump($comment);


?>