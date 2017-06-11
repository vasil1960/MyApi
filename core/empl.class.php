<?php

class Empl {
	
	public function __constuct($pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function seyHello()
	{
		echo 'Helloooo';
	}
}