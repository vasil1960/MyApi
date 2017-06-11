<?php 

class IagSession {

	public $pdo;
	public $sid;

	public function __construct($pdo, $sid ) 
	{
		$this->pdo = $pdo;
		$this->sid = $sid;
	}

	public function setIagSession()
	{
		$sth = $this->pdo->prepare("SELECT * FROM sessions INNER JOIN users ON sessions.userId = users.ID WHERE sessions.ID = :ID");

		$sth->execute([':ID' => $this->sid ]);

		$ur =  $sth->fetchAll(PDO::FETCH_CLASS);

		$_SESSION['ID']       = $ur[0]->ID;
		$_SESSION['username'] = $ur[0]->username;
		$_SESSION['Name']     = $ur[0]->Name;
		$_SESSION['Familia']  = $ur[0]->Familia;
		$_SESSION['Email']    = $ur[0]->Email;

		 // var_dump($_SESSION);
	}

	public function userRuls()
	{
		$sth = $this->pdo->prepare("SELECT * FROM sessions WHERE ID = :ID");

		$sth->execute([':ID' => $this->sid ]);

		$ur =  $sth->fetchAll(PDO::FETCH_CLASS);

		if ($ur[0]->ActiveSession > 0)
		{
			if($ur[0]->Access112 == 1)
			{
				return "user";
			}

			if($ur[0]->Access112 == 2)
			{
				return "editor";
			}

			if($ur[0]->Access112 == 3)
			{
				return "user112";
			}
		}

		if($ur[0]->ActiveSession == 0)
		{
			return "nouser";
		}
	}
}