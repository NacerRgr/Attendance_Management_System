<?php 
require '../models/EtudiantModel.php';

class justCetudiant
{
	private $username;
	private $password;
	private $LoginMetudiant;
	public function __construct(){

		$this->LoginMetudiant = new modelEtudiant();
	}
	public function insertJusfication($n1,$n2,$n3,$n4,$n5)
	{
		//apogee,date,lienPdf,idM,commentaire
		$query=$this->LoginMetudiant->insert1($n1,$n2,$n3,$n4,$n5);
		// if($query)
		// 	echo"succes";
		// else
		// 	echo "echèc";
		return $query;
	}
}

$tst=new justCetudiant();
//$_FILES['fich']['name']
//file_get_contents()
if(isset($_GET['typeseance']  ) && isset( $_GET['date'])&& isset($_GET['module'] ) && isset($_POST['sub']) )
{
	$msg="";
	$target="../upload/photos/".basename($_FILES['fich']['name']);
$r=$tst->insertJusfication($_SESSION['apogee'],$_GET['date'],$_FILES["fich"]["name"], $_GET['module'],$_POST['n5']);
if(move_uploaded_file($_FILES['fich']['tmp_name'], $target))
{
	echo "image uploading successfully";
}else
{
	echo "There was a problem uploading image";
}
header("location:../views/justification.php?date=&typeseance=".$_SESSION['gettypeseance']."&module=&jus=");
if($r)
	echo "succes";
else 
	echo "echèc";
}else{
	echo "nop";
}
// $_SESSION['justi']=$r;
// header("location:../views/justification.php?date=&typeseance=&module=");
?>
