<?php
session_start();
require '../models/EnseignantModel.php'; 
class EnseignantAccueil
{
	private $username;
	private $password;
	private $LoginMenseignant;
	public function __construct()
	{
		$this->LoginMenseignant = new enseignantModel();
	}
	public function selectalletudiant($idM,$dte,$hd,$hf)
	{
		$query=$this->LoginMenseignant->s($idM,$dte,$hd,$hf);
		// if($query)
		// 	echo"Alhamdulillah";
		// else
		// 	echo "Autre fois inchaallah";
		return $query;
	}
	public function selectEtudiantAbsent($idM,$daate,$iden)
	{
		$query=$this->LoginMenseignant->st($idM,$daate,$iden);
		if($query)
			echo "<br>Alhamdulillah";
		else
			echo "<br>mara yakhra inchaallah";
		return $query;
	}
}
$tst= new EnseignantAccueil();
if(isset($_GET['idM'])&& isset($_GET['datee'])&& isset($_GET['h_d'])&& isset($_GET['h_f']) && !isset($_GET['m']))
{
	$_SESSION['idmodule']=$_GET['idM'];
	$_SESSION['daatee']=$_GET['datee'];
	$_SESSION['h_d']=$_GET['h_d'];
	$_SESSION['h_f']=$_GET['h_f'];

$r1=$tst->selectalletudiant($_GET['idM'],$_GET['datee'],$_GET['h_d'],$_GET['h_f']);
$_SESSION['etudiantabs']=$r1;
header("location:../views/enseignantAmarquer.php");
// foreach ($r1 as $key ) {
//   echo $key['nomEt']." ".$key['preEt']." ".$key['apogee']." ". $key['idM']." ". $key['heure_debut']." ". $key['heure_fin']."<br>";
// }
// $r1=$tst->selectalletudiant($_GET['idM'],$_GET['datee'],$_GET['h_d'],$_GET['h_f']);
}
if(isset($_GET['idM'])&& isset($_GET['datee'])&& isset($_GET['h_d'])&& isset($_GET['h_f']) && isset($_GET['m']))
{
	echo  $_SESSION['infoenseignant']['idEn'];
	$_SESSION['idmodule']=$_GET['idM'];
	$_SESSION['daatee']=$_GET['datee'];
	$_SESSION['h_d']=$_GET['h_d'];
	$_SESSION['h_f']=$_GET['h_f'];
	$_SESSION['mmodule']=$_GET['module'];
	// $r1=$tst->selectEtudiantAbsent($_GET['idM'],$_GET['datee'],$_SESSION['infoenseignant']['idEn']);
	$r1=$tst->selectEtudiantAbsent($_GET['idM'],$_GET['datee'],$_SESSION['infoenseignant']['idEn']);
	// var_dump($r1);
$_SESSION['etudiantss']=$r1;
   header("location:../views/absences.php");
	// header("location:../views/wordpdf.php");
}