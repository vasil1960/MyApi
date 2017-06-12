<?php 

class Connection {

	public static function make()
	{
		try {
			return new PDO('mysql:host=172.16.4.34;dbname=nugEmpl;charset=utf8','cotaivo','taniami');
			 
		} catch (PDOException $e) {
			die($e->getMessage());	
		} 	
	}	
}
