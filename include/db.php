<?php 

	class Database{
		private $dsn = "mysql:host=localhost;dbname=rushdullah";
		private $user= "root";
		private $pass = "";
		public $conn;

		public function connect(){
			try{
				$this->conn = new PDO($this->dsn,$this->user,$this->pass);
			}
			catch(PDOException $e){
				echo $e->getMessage();

			}
		}

		
	}

	$ob = new Database();
	$ob->connect();

	

?>