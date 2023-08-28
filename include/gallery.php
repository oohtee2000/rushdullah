<?php 

require_once('db.php');

class gallery extends Database {	
	
    private $image = [];
	public $image_destination = "../assets/img/gallery/";
	public function __construct(){
		$this->connect();	

	}
	public function totalImageRowCount(){
		$sql = "SELECT * FROM  gallery";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$t_rows = $stmt->rowCount();
		return $t_rows;
	}

	

	// image
	public function setImage($image){
		$this->image = $image;
	}

	public function getImageName(){
		return $this->image['name'];
	}

	public function getImageTmpName(){
		return $this->image['tmp_name'];
	}

	public function getImageSize(){
		return $this->image['size'];
	}

	public function getImageType(){
		return $this->image['type'];
	}


	public function getImageExtension(){
		$img_name = $this->image['name'];
		$split = explode(".", $img_name);
		return (end($split));
	}


	public function getFinalImageName(){
		return "image".rand(0, 999);
	}  





	public function insertImage(){
		try{
			$sql = "INSERT INTO gallery (image) VALUES(:image)";    		
			$stmt= $this->conn->prepare($sql);
			$stmt->execute([			
				'image'=>$this->getFinalImageName().'.'.$this->getImageExtension()
			]);
			echo "<script> alert('Image Uploaded successfully'); </script>";

			return true;
		}
		catch(Exception $e){
			return $e->getMessage();
		}
	}

	public function uploadImage(){
		$upload = move_uploaded_file($this->getImageTmpName(), $this->image_destination.$this->getFinalImageName().'.'.$this->getImageExtension());

		if(!$upload){
			echo "<script> alert('Image Upload Failed')</script>";
			exit();
		}
		// echo "<script> alert('Image upload successfully');</script>";
	}

}
