<?php
	// < Seguraca para metodos nao permitidos
	$badwords = array(" union ", " insert ", " update ", " drop ", " select ");
	
	/*
	foreach(@$_POST as $value)
		foreach($badwords as $word)
			if(is_array($value))
			{
				foreach($value as $value2)
					if(@substr_count($value2, $word) > 0) die ("<br><center>Simbolo nao permitido, remova-o e tente novamente. ($word)");
			}
			else
				if(@substr_count($value, $word) > 0) die ("<br><center>Simbolo nao permitido, remova-o e tente novamente. ($word)");
	
	foreach(@$_GET as $value)
		foreach($badwords as $word)
			if(is_array($value))
			{
				foreach($value as $value2)
					if(@substr_count($value2, $word) > 0) die ("<br><center>Simbolo nao permitido, remova-o e tente novamente. ($word)");
			}
			else
				if(@substr_count($value, $word) > 0) die ("<br><center>Simbolo nao permitido, remova-o e tente novamente. ($word)");
	*/
	// > Seguraca para metodos nao permitidos

	/* Nova conexão PDO */ 

	class Conexao{
    
		private static $pdo;
		
		private function __construct(){
			//
		}
		
		public static function getInstance(){
			if(!isset(self::$pdo)){
				try {  
					$opcoes = array(PDO::ATTR_PERSISTENT => TRUE);  
					self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . ";port=".PORTA."; charset=utf8mb4", USER, PASSWORD, $opcoes);  
				} catch (PDOException $e) {  
					print "Erro: " . $e->getMessage();  
				}
			}
			return self::$pdo;
		}
	}


?>