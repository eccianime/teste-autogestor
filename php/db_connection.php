<?php

class PDO_database{
	public $pdo;
	public function __construct(){
		$engine = 'mysql';		
		$host = 'localhost'; 		
		$port = '3306';
		$database =  'test-client-category'; 	
		$user = 'root';   		
		$pass = '';				
		$dns = $engine.':dbname='.$database.";charset=utf8;host=".$host;

		try{
			$pdo = new PDO( $dns, $user, $pass );
			$this->pdo = $pdo;
		}catch( PDOException $e ){
			echo 'Erro na coneção'. $e->getMessage();
			exit;
		}
	}

	public function query_base( $sql ){
		$r = $this->pdo->query($sql);
		if( $r != NULL){
	  		$result = $r->fetchALL(PDO::FETCH_ASSOC);
			return $result;
		}else{
			$error = $this->pdo->errorInfo();
			return $error;
		}
	}

	public function exex_base( $sql ){
		$r = $this->pdo->exec($sql);
		if ( !$r ){
			$error = $this->pdo->errorInfo();
			return $error;
		}else{
			return $r;
		}
	}
}

?>