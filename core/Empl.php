<?php

class Empl {
	
	public $pdo;
	
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function seyHello()
	{
		//$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$sql = "SELECT * FROM empl LIMIT 100";
		
		$sth = $this->pdo->prepare($sql);
		
		$sth->execute();
		
		return $sth->fetchAll(PDO::FETCH_CLASS);
	}
}