<?php 
class enseignantModel
{
	protected $db;
	public function __construct()
	{
		define('user',"root");
		define('pass',"");
		$this->db  = new PDO('mysql:host=localhost;dbname=test',user,pass);
	}
	public function selectAllenseignant($idU)
	{
		$query=$this->db->prepare("SELECT * FROM enseignant En,utilisateur u WHERE u.idU=En.idU and En.idU=?");
		$query->execute(array($idU));
		return $query->fetch();
	}
	public function selectModule($idU)
	{

	  $query=$this->db->prepare("SELECT * FROM enseignant En, module m, utilisateur u , affecter a where En.idU=u.idU and En.idEn=a.idEn and m.idM=a.idM and u.idU=?");
	  $query->execute(array($idU));
	 //  if($query)
		// 	echo"<br>lae7<br>";
		// else
		// 	echo "<br>ah7<br>";
	  return $query->fetchAll();
	}

	public function st($idM,$daate,$iden)
  {
  	$query=$this->db->prepare("SELECT * FROM abscence ab , enseignant en , etudiant e , module m WHERE ab.idEn=en.idEn and e.apogee=ab.apogee and m.idM=ab.idM and ab.idM=? and ab.DateA=? and en.idEn=? ");
  	
  	$query->execute(array($idM,$daate,$iden)); 
  	// if($query)
  	// 	echo"oui";
  	// else 
  	// 	echo "non";
  	return $query->fetchAll();
  }


	// public function selectSeance($idU)
	// {
	// 	$query=$this->db->prepare("SELECT * FROM utilisateur u,enseignant en ,salle sal ,seance s WHERE u.idU=en.idEn AND en.idEn=sal.idEn and sal.idsalle=s.idsalle and u.idU=?");
	// 	// $query=$this->db->prepare("select * from utilisateur u,enseignant en,salle sal,seance s where u.idU=en.idEn and en.idEn=sal.idEn and sal.idsalle=s.idsalle AND u.idU=?");
	// 	 if($query)
	// 		echo"<br>ah7<br>";
	// 	else
	// 		echo "<br>lae7<br>";
	// 	$query->execute(array($idU));
	// 		return $query-> fetchAll();
	
	// }

	 public function selectSeance($idU)
  {
  	$query=$this->db->prepare("select * from enseignant en ,seance s ,salle sal,module m where en.idEn=sal.idEn and s.idsalle=sal.idsalle and s.idM=m.idM and idU=?");
  	$query->execute(array($idU));
  	return $query->fetchAll();
  }
   public function selectOneseance($idU,$idM)
  {
  	$query=$this->db->prepare("select * from enseignant en ,seance s ,salle sal,module m where en.idEn=sal.idEn and s.idsalle=sal.idsalle and s.idM=m.idM and idU=? and nomM=?");
  	$query->execute(array($idU,$idM));
  	return $query->fetchAll();
  }
  public function s($idM,$dte,$hd,$hf)
  {
  	$query=$this->db->prepare("SELECT * FROM etudiant e , etudier et , seance s , module m WHERE e.apogee=et.apogee and et.idM=m.idM and s.idM=m.idM AND et.idM=? and s.daate=? and s.heure_debut=? and s.heure_fin=?");
  	
  	$query->execute(array($idM,$dte,$hd,$hf));
  	// if($query)
  	// 	echo"oui";
  	// else 
  	// 	echo "non";
  	return $query->fetchAll();
  }
  
  public function insertetudiant($a1,$a2,$a3,$a4)
  {
  	$query=$this->db->prepare("INSERT INTO abscence (idEn,apogee,idM,dateA) values (?,?,?,?)");
  	$query->execute(array($a1,$a2,$a3,$a4));
  	if($query)
  		echo "succès";
  	else
  		echo "echèc";
  	return $query;
  }

}
// $tst =new enseignantModel();
// $r3=$tst->selectSeance(3);
// foreach ($r3 as $m) {
// 	echo "huh".$m['idM']." ".$m['idEn']."<br>";
// }

?>