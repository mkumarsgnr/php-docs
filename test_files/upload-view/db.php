<?php
	class connection{
		private $server = 'mysql:host=localhost;dbname=test';
		private $user;
		private $pass;
		private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
		private $con;
		function connect(){
			try{
				$this->con = new PDO($this->server,$this->user,$this->pass,$this->options);
				return $this->con;
			}
			catch(PDOException $e){
				echo $e->getMassage(); 
			}
		}
		function close(){
			$this->con =  null;
		}
	}
?>