<?php

class LoginModel{
	protected $db ;

	public function __construct(){
		define('user',"root");
		define('pass',"");
		$this->db  = new PDO('mysql:host=localhost;dbname=test',user,pass);
	}

	// public function selectData(){
	// 	$query = $this->db->prepare("SELECT * FROM users");
	// 	return $query;
	// }


	public function checkLogin(string $username,string $password){
		$query = $this->db->prepare("SELECT * FROM utilisateur WHERE username = ? and mdp= ?" );
		$query->execute(array($username,$password));
		return $query;
		}
  //   public function checkLoginEtudiant($username,$password)
  //   {
  //   	$query=$this->db->prepare("SELECT * from utilisateur where username=? and mdp=? ");
  //   	$query->execute(array($username,$password));
		// return $query;
  //   }


	// public function getRole(string $username,string $password){
	// 	$query = $this->db->prepare("SELECT role FROM users WHERE username = ? and password = ?");
	// 	$query->execute(array($username,$password));
	// 	$result = $query->fetchAll();
	// 	return $result['role'];
	// }


}





// $tst = new LoginModel();
// $result = $tst->checkLoginEtudiant();


// foreach ($result as $name) {
// 	echo "nom est ".$name['apogee']." ".$name['preEt'];
// }






