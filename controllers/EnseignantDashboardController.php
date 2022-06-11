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
	
	public function selectALLenseignant($idU)
	{
		$query=$this->LoginMenseignant->selectAllenseignant($idU);
		return $query;
	}
	public function selectenseignantmodule($idU)
	{
		$query=$this->LoginMenseignant->selectModule($idU);
		// if($query)
		// 	echo"<br>lae7<br>";
		// else
		// 	echo "<br>ah7<br>";
		return $query;
	}
	public function selectseances($idU)
	{
		$query=$this->LoginMenseignant->selectSeance($idU);
		if($query)
			echo"hamdulillah";
		else
			echo"autre fois inchaallah";
		return $query;
	}
	public function selectoneseance($idU,$idM)
	{
		$query=$this->LoginMenseignant->selectOneseance($idU,$idM);
		if($query)
			echo"hamdulillah";
		else
			echo"autre fois inchaallah";
		return $query;
	}
	
	
}
$tst= new EnseignantAccueil();
$r1=$tst->selectALLenseignant($_SESSION['idenseignant']);
$_SESSION['infoenseignant']=$r1; // id d'enseignant
$r2=$tst->selectenseignantmodule($_SESSION['idenseignant']);
$_SESSION['moduleenseignant']=$r2;


// foreach ($r3 as $key ) {
	
// echo "<br>enseignant:".$key['nomEn']. " ".$key['prenomEn']." salle ".$key ['idsalle']."module".$key ['nomM']."<br>";
// }
if(isset($_GET['m']))
{
	
	$r3=$tst->selectoneseance($_SESSION['idenseignant'],$_POST['module']);
$_SESSION['seancesenseignant']=$r3;
	header("Location:../views/enseignantDashboardView.php?access=");

}
if(isset($_GET['enseig']))
{
	$r3=$tst->selectseances($_SESSION['idenseignant']);
$_SESSION['seancesenseignant']=$r3;
	header("Location:../views/enseignantDashboardView.php?access=");
}
if(isset($_GET['pdf']))
{
	header("location:../views/Pdf.php");
	
}
if(isset($_GET['word']))
{
	header("location:../views/Word.php");
	
}

?>