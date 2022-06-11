<?php
session_start();
 class modelEtudiant
 {
 	protected $db ;
    public function __construct()
     {
		define('user',"root");
		define('pass',"");
		$this->db  = new PDO('mysql:host=localhost;dbname=test',user,pass);
	}
	
	 public function selectEtudiant($username,$passwordEtudiant)
	 {
	 	$query=$this->db->prepare("SELECT * FROM etudiant AS e , utilisateur AS u WHERE e.idU=u.idU AND u.username=? and u.mdp=?");
	 	$query->execute(array($username,$passwordEtudiant));
	 	return $query->fetch(); 
	 }
	 public function consultAbsence($username)
	 { 
	 	$query=$this->db->prepare("SELECT * FROM abscence a,etudiant e, utilisateur u ,seance s, module m,salle sal,enseignant em where u.idU=e.idU and e.apogee=a.apogee and a.idM=m.idM and em.idEn=sal.idEn and /*s.idM=m.idM and a.idM=s.idM and s.idsalle=sal.idsalle and */em.idEn=a.idEn and s.idM=a.idM and  u.username=?  group by e.apogee " );
	 	$query->execute(array($username));
	 	// if($query)
	 	// 	echo "succès";
	 	// else
	 	// 	echo "echèc";
	 	return $query->fetchAll();
	 }
	 public function insert1($n1,$n2,$n3,$n4,$n5)
	 {
	 	
	 $r=$this->db->prepare("insert into justification (apogee,date,lienPdf,idM,commentaire) values (?,?,?,?,?)");
	   $r->execute(array($n1,$n2,$n3,$n4,$n5));
       if($r)
       	echo "yes";
        else 
        	echo "nop";
        return $r;
	 	// $query->execute(array($n1,$n2,$n3,$n4,$n5));
	 	 

	 }
	 public function selecthh($n)
	 {
	 	$r=$this->db->prepare("select * from justification where idJ=? ");
	 	$r->execute(array($n));
	 	return $r->fetch();
	 

	 // public function selectEtudiant($username,$passwordEtudiant)
	 // {
	 // 	$query=$this->db->prepare("SELECT * FROM utilisateur  WHERE username=? and mdp=?");
	 // 	$query->execute(array($username,$passwordEtudiant));
	 // 	return $query->fetch(); 
	 // }
 }
 
}
// $tst=new modelEtudiant();
// $r2=$tst->selecthh(32);
// echo "<img src='../images/".$r2['lienPdf']."'>";
// $r1=$tst->insert1(18031513,'2000-01-12','ss',3,'ua mikrxii');

// if($r2)
// echo"succes";
// else
// echo "echec";
// $result=$tst->consultAbsence(18031513);
// foreach ($result as $r) {
// 	echo"nom prenom ".$r['nomEt'].' '.$r['apogee'].' '.$r['idM'].' '.$r['nomEn'].' '.$r['nomM']."<br>";
// }
// // $r=$m->selectEtudiant($_SESSION['userEtudiant'],md5($_SESSION['passwordEtudiant']));
// echo 'uaa'.$r['typeUser'];
 
	// foreach ($result as $key ) 
	// {
	// 	echo $key['apogee'].' '.$key['salle'].' module ='.$key['nomM'].'<br>';
	// }


?>
