<?php 
session_start();
echo $_SESSION['infoenseignant']['idEn'];
echo "ss".$_SESSION['idmodule'];
echo "<br>".$_SESSION['daatee'];
echo "<br>".$_SESSION['h_d'];
echo "<br>".$_SESSION['h_f'];
require '../models/EnseignantModel.php'; 



class LoginController 
{
	private  $LoginM;
	private $LoginMenseignant;

	public function __construct()
	{
		$this->LoginMenseignant = new enseignantModel();
	}
	public function insertintoabsence($a1,$a2,$a3,$a4)
	{
	$query= $this->LoginMenseignant->insertetudiant($a1,$a2,$a3,$a4);
	if($query)
		echo "<br>alhamdulillah";
	else
		echo "<br>autres fois inchaallah";
	return $query;
	}
}
// idEn,apogee,idM,dateA
$tst=new LoginController();
if(isset($_GET['etata']))
{
	$_SESSION['apoogeee']=$_GET['apogee'];
	$r1=$tst->insertintoabsence($_SESSION['infoenseignant']['idEn'],$_GET['apogee'],$_SESSION['idmodule'],$_SESSION['daatee']);
		header("location:../views/enseignantAmarquer.php?ok=ok&apogee=".$_SESSION['apoogeee']);

}
	?>