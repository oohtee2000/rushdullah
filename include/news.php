<?php 

require_once('db.php');

class news extends Database {
	private $title;
	private $article;	
	private $image_destination = "../assets/img/blog/";
	private $image1 = [];
    private $image2 = [];
    private $image3 = [];
    public $img_name1;
    public $img_name2;
    public $img_name3;
	public $keyword;
	
	public function __construct($title="", $article=""){
		$this->title = $title;		
		$this->article = $article;
		$this->connect();	
	}



	public function ImgName1(){
		return $this->img_name1;
	}

	public function setImgName1($name){
		$this->img_name1 = $name;
	}

	public function ImgName2(){
		return $this->img_name2;
	}

	public function setImgName2($name){
		$this->img_name2 = $name;
	}

	public function ImgName3(){
		return $this->img_name3;
	}
	public function setImgName3($name){
		$this->img_name3 = $name;
	}

	// public function set_destination($dest){
	// 	$this->image_destination = $dest;
	// }


		public function totalNewsRowCount(){
			$sql = "SELECT * FROM  news";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$t_rows = $stmt->rowCount();
			return $t_rows;
		}

	// keyword
	public function setNewsArticle($keyword){
		$this->article = $keyword;
	}

	public function getNewsArticle(){
		return $this->article;
	}

	// name
	public function setNewsTitle($keyword){
		$this->title = $keyword;
	}

	public function getNewsTitle(){
		return $this->title;
	}

	

	

	// image1
	public function setImage1($image1){
		$this->image1 = $image1;
	}

	public function getImage1Name(){
		return $this->image1['name'];
	}

	public function getImage1TmpName(){
		return $this->image1['tmp_name'];
	}

	public function getImage1Size(){
		return $this->image1['size'];
	}

	public function getImage1Type(){
		return $this->image1['type'];
	}


	public function getImage1Extension(){

		if(!count($this->image1) === 0)
		{
			$img_name = $this->image1['name'];
			$split = explode(".", $img_name);
			return (end($split));
		}
		
	}

public function getImage1Extension2(){



		
			$img_name = $this->image1['name'];
			$split = explode(".", $img_name);
			return (end($split));
	}



	public function getFinalImage1Name(){
		$image_name =  "news_image".rand(0, 999);
		$this->img_name1 = $image_name;
	}


    // image2
	public function setImage2($image2){
		$this->image2 = $image2;
	}

	public function getImage2Name(){
		return $this->image2['name'];
	}

	public function getImage2TmpName(){
		return $this->image2['tmp_name'];
	}

	public function getImage2Size(){
		return $this->image2['size'];
	}

	public function getImage2Type(){
		return $this->image2['type'];
	}


	public function getImage2Extension(){

		if(!count($this->image2) === 0)
		{
			$img_name = $this->image2['name'];
			$split = explode(".", $img_name);
			return (end($split));
		}
	}


public function getImage2Extension2(){

		
			$img_name = $this->image2['name'];
			$split = explode(".", $img_name);
			return (end($split));
	}

	public function getFinalImage2Name(){
		$image_name =  "news_image".rand(0, 999);
		$this->img_name2 = $image_name;
	}


    // image3
	public function setImage3($image3){
		$this->image3 = $image3;
	}

	public function getImage3Name(){
		return $this->image3['name'];
	}

	public function getImage3TmpName(){
		return $this->image3['tmp_name'];
	}

	public function getImage3Size(){
		return $this->image3['size'];
	}

	public function getImage3Type(){
		return $this->image3['type'];
	}


	public function getImage3Extension(){

		if(!count($this->image3) === 0)
		{
			$img_name = $this->image3['name'];
			$split = explode(".", $img_name);
			return (end($split));
		}
	}

	public function getImage3Extension2(){

			$img_name = $this->image3['name'];
			$split = explode(".", $img_name);
			return (end($split));
	}


	public function getFinalImage3Name(){
		$image_name =  "news_image".rand(0, 999);
		$this->img_name3 = $image_name;
	}






	public function insertNews(){


		// echo $this->getImage1Extension2();
		try{
			$sql = "INSERT INTO news (news_title, news_article, news_image, news_image2, news_image3) VALUES(:title, :article, :image1, :image2, :image3)";
    		
			$stmt= $this->conn->prepare($sql);
			$ins = $stmt->execute([
				'title'=>$this->title, 
				'article'=>$this->article,				
				'image1'=>$this->img_name1.'.'.$this->getImage1Extension2(),
                'image2'=>$this->img_name2.'.'.$this->getImage2Extension2(),
                'image3'=>$this->img_name3.'.'.$this->getImage3Extension2()
			]);

			if($ans){
				echo "<script> alert('News Uploaded successfully'); </script>";
			}

			
			else{
				echo "<script> alert('News Failed to Upload'); </script>";
			}
			

			return true;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}


	public function updateNews($id){

	$article = $this->article;
	$title = $this->title;
	$image1 = $this->img_name1.'.'.$this->getImage1Extension();
	$image2 = $this->img_name2.'.'.$this->getImage2Extension();
	$image3 = $this->img_name3.'.'.$this->getImage3Extension();

		// echo "Update news successfully";

		try{
			 $sql = "UPDATE news SET `news_title` = '$title', `news_article` = '$article', `news_image` = '$image1', `news_image2` = '$image2', `news_image3`= '$image3' WHERE `id` = '$id' ;" ; 
    		
			$stmt= $this->conn->prepare($sql);
			$stmt->execute();
			echo "<script> alert('News Uploaded successfully'); </script>";

			return true;
		}
		catch(Exception $e){
			return $e->getMessage();
		}

}

	public function uploadImage1(){
		$upload = move_uploaded_file($this->getImage1TmpName(), $this->image_destination.$this->img_name1.'.'.$this->getImage1Extension2());

		if(!$upload){
			echo "<script> alert('Image 1 Upload Failed')</script>";
			exit();
		}
		// echo "<script> alert('Image1 upload successfully');</script>";
	}

	public function uploadImage3(){
		$upload = move_uploaded_file($this->getImage3TmpName(), $this->image_destination.$this->img_name3.'.'.$this->getImage3Extension2());

		if(!$upload){
			echo "<script> alert('Image 3 Upload Failed')</script>";
			exit();
		}
		// echo "<script> alert('Image3 uploaded successfully');</script>";
	}

	public function uploadImage2(){
		$upload = move_uploaded_file($this->getImage2TmpName(), $this->image_destination.$this->img_name2.'.'.$this->getImage2Extension2());
		// echo $image_name;
		if(!$upload){
			echo "<script> alert('Image 2 Upload Failed')</script>";
			exit();
		}
		// echo "<script> alert('Image2 upload successfully');</script>";
	}



	public function deleteImage1($imageName){
		$delete = unlink($this->image_destination.$imageName);
		// if(!$delete){
		// 	echo "<script> alert('Image Fail to Delete')</script>";
		// 	exit();
		// }

	}

	public function deleteImage3($imageName){
		$delete = unlink($this->image_destination.$imageName);
		// if(!$delete){
		// 	echo "<script> alert('Image Fail to Delete')</script>";
		// 	exit();
		// }

		
	}

	public function deleteImage2($imageName){
			$delete = unlink($this->image_destination.$imageName);
		// if(!$delete){
		// 	echo "<script> alert('Image Fail to Delete')</script>";
		// 	exit();
		// }
	}



	

}	
