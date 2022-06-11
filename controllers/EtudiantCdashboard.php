<?php
require '../models/EtudiantModel.php';
class EtudiantAccueil
{
	private $username;
	private $password;
	private $LoginMetudiant;
	public function __construct(){
// $this->username=$username;
// $this->password=$password;
// $_SESSION['userEtudiant'],$_SESSION['passwordEtudiant'])
		$this->LoginMetudiant = new modelEtudiant();
	}
	public function selectionEtud($username,$password)
	{
		$result=$this->LoginMetudiant->selectEtudiant($username,$password);
		return $result;
	}
	public function consultCAbsence($username)
	{ 
		$result=$this->LoginMetudiant->consultAbsence($username);
		if($result)
	 		echo "succès";
	 	else
	 		echo "echèc";
		return $result;

	}
}

$tst = new EtudiantAccueil();
if(isset($_GET['dashetu']))
{
$_SESSION['nacer']=$tst->selectionEtud($_SESSION['userEtudiant'],md5($_SESSION['passwordEtudiant']));
var_dump($_SESSION['nacer']);
header("location:../views/etudiantDashboardview.php?dashetu=ok");


}
if(isset($_GET['max']))
{
// $absence=$tst->consultCAbsence('18031513');
$absence=$tst->consultCAbsence($_SESSION['userEtudiant']);

// echo "<br><br><br>";

$_SESSION['consulEtudiant']=$absence;
// echo $_SESSION['apogee'];
// echo $_SESSION['consulEtudiant']['apogee'];
// foreach ($_SESSION['consulEtudiant'] as $key) {
	

// 		echo $key['apogee']."  ".$key['nomEt']." ".$key['nomM']." ".$key['heure_debut']." ".$key['heure_fin']."<br>";


// }
// header("location:../models/EtudiantModel.php");

header("location:../views/consulterAetudiant.php?max");


}

// foreach ($s as $key) {
	

// 		echo $key['apogee']."  ".$key['nomEt']." ".$key['nomM']." ".$key['heure_debut']." ".$key['heure_fin']."<br>";


// }

// echo "<br><br><br>";
// 
// echo$_SESSION['userEtudiant'] 
// $_SESSION['adminetudiant']=$r;
// 	echo "<br>nom".$m['typeUser']." " .$m['nomEt'];
// header("location:../views/adminDashboardView.php?access= choix=".$_SESSION['adminetudiant']['apogee']);

?>