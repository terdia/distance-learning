<?php 
	class data extends PDO{
		
		public function __construct(){
			try{	
		parent::__construct('mysql:host=127.0.0.1;dbname=distancelearningdb', 'root', '');
				
			}catch(PDOException $e){
				echo "Failed to connect to data source";
			}
		}		
	}


