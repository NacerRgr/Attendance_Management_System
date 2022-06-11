<?php

require_once "../models/adminModel.php";
// include "../imports/PHPExcel/IOFactory.php";


class AdminDashboardController{


	public $choix;
	private $adminM;

	public function __construct($choix=""){
		$this->choix = $choix;
		$this->adminM = new adminModel();
	}



			/*methode du controlleur qui fait l'affichage*/
	public function selectAll(){ 
		return $this->adminM->selectAll($this->choix);
	}


	public function selectfromSalle(){
		return $this->adminM->selectAll('salle');
	}


	public function getOne($id,$table){
		return $this->adminM->selectOne($id,$table);
	}


	public function getIdU($username){
		return	$this->adminM->select($username);
	}


	public function getIdM($nomM){
		return	$this->adminM->select($nomM,"module");
	}


	public function insertInUser($array){
		$this->adminM->insertInUser($array);
	}
	public function insertInstudentss($array){
		$this->adminM->insertInstudents($array);
	}

	public function insertInEns($array){
		$this->adminM->insertInEnseignants($array);
	}

	public function insertInMod($array){
		$this->adminM->insertInModule($array);
	}


	public function insertInAff($array){
		return $this->adminM->insertInAffecter($array);
	}



	public function insertInSeancee($array){
		$this->adminM->insertInSeance($array);

	}


	public function insertInetudier($array){
		return $this->adminM->insertInetude($array);

	}

	public function insertInsalle($array){
		$this->adminM->insertInSalle($array);
	}

	public function selectValidModule($table){
		
	


	return $this->adminM->customizeSelect($table);
		
	
	}



	public function selectListeStd($array){
		return $this->adminM->selectList($array);
	}

	public function deleteFrom($id,$table){
		$this->adminM->delete($id,$table);
	}


	public function updateFrom($data,$table){
		$this->adminM->updateOne($data,$table);
	}
	

	public function selectAbsc($idSeance){
		return $this->adminM->selectAbsence($idSeance);
	}
	public function getSalle($idM){
		return $this->adminM->getSalle($idM);

	}

	public function justif($idSeance){
		return $this->adminM->selectJustif($idSeance);

	}

}



// $tst = new AdminDashboardController('etudiant');
// $rest = $tst->selectAll();
// foreach ($rest as $key) {
// 	echo $key['idU'];
// }


if(isset($_GET['submit'])){
$ctr = new AdminDashboardController($_GET['choix']);
session_start();

$_SESSION['choix1'] = $_GET['choix'];
$_SESSION['asmahan'] = $ctr->selectAll();
// print_r($_SESSION['asmahan']);
header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_SESSION['choix1']);
}
// }













if(isset($_GET['in']) && $_GET['in'] == 'ok'){
session_start();

switch($_SESSION['insert']){

	case 'okEtu' : 
	$ctr = new AdminDashboardController();

	if(isset($_GET['file']) && $_GET['file']=='no'){
	$arr1 = array("",$_POST['apogee'],md5($_POST['mdp']),$_POST['typeuser']);
	


	$ctr->insertInUser($arr1);
	
	$filename = $_FILES["lienPhoto"]["name"];

    $tempname = $_FILES["lienPhoto"]["tmp_name"];  

    $folder = "../uploads/photos/".$filename;   

	move_uploaded_file($tempname, $folder);

	$arr2 = array($_POST['apogee'],$ctr->getIdU($_POST['apogee'])['idU'],$_POST['nomEt'],$_POST['preEt'],$filename,$_POST['email']);
	
	
	$ctr->insertInstudentss($arr2);
	}

	if(isset($_GET['in']) &&  $_GET['file']=='ok'){
		$fileName = $_FILES["nomM"]["name"];//vue= name of input 
		$fileExtension = explode('.', $fileName);
		$fileExtension = strtolower(end($fileExtension));
		$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

		$targetDirectory = "../uploads/" . $newFileName;
		move_uploaded_file($_FILES['nomM']['tmp_name'], $targetDirectory);

		error_reporting(0);
		ini_set('display_errors', 0);

		require '../imports/excelReader/excel_reader2.php';
		require '../imports/excelReader/SpreadsheetReader.php';
		$c = 0 ;
		$reader = new SpreadsheetReader($targetDirectory);
		foreach($reader as $key => $row){
		
			if($c>0){
			

			
			$password = $row[1];
			$type_user = "etudiant";

			$ctr->insertInUser(array("", $row[2],md5($password),$type_user));

			$idU = $ctr->getIdU($row[2]);

			$apogee = $row[2];
			$nomEt = $row[3];
			$preEt  = $row[4];
			$photo  = $row[6];
			$email = $row[5];

			// echo $apogee;
			// echo $nomEt;
			// echo $preEt;
			// echo $photo;
			// echo $email;


			$ctr->insertInstudentss(array($apogee,$idU['idU'],$nomEt,$preEt,$photo,$email));

			}

			$c++;
		// echo "sds";


		}
	}

	break;

	
	case 'okEns' : 
		$ctr = new AdminDashboardController();


		if(isset($_GET['file']) && $_GET['file']=='no'){

		$arr1 = array("",$_POST['username'],md5($_POST['mdp']),$_POST['typeuser']);
		
		$ctr->insertInUser($arr1);
		
		$filename = $_FILES["photo"]["name"];
		echo $filename;
	

		$tempname = $_FILES["photo"]["tmp_name"];  
	
		$folder = "../uploads/photos/".$filename;   
	
		move_uploaded_file($tempname, $folder);

		$arr2 = array("",$ctr->getIdU($_POST['username'])['idU'],$_POST['nomEns'],$_POST['preEns'],$_POST['email'],$filename);
			
		
		$ctr->insertInEns($arr2);
	
		}

		if(isset($_GET['file']) && $_GET['file']=='ok'){
		$fileName = $_FILES["nomM"]["name"];//vue= name of input 
		$fileExtension = explode('.', $fileName);
		$fileExtension = strtolower(end($fileExtension));
		$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

		$targetDirectory = "../uploads/" . $newFileName;
		move_uploaded_file($_FILES['nomM']['tmp_name'], $targetDirectory);

		error_reporting(0);
		ini_set('display_errors', 0);

	
		require '../imports/excelReader/excel_reader2.php';
		require '../imports/excelReader/SpreadsheetReader.php';

		$reader = new SpreadsheetReader($targetDirectory);
		$c = 0 ;
		foreach($reader as $key => $row){
			
			
			if($c>0){
			$name = $row[0];
			$password = $row[1];
			$type_user = "enseignant";

			$ctr->insertInUser(array("",$name,md5($password),$type_user));

			$idU = $ctr->getIdU($name);

			$nomEns = $row[2];
			$preEns = $row[3];
			$email  = $row[4];
			$photo  = $row[5];


			$ctr->insertInEns(array("",$idU['idU'],$nomEns,$preEns,$email,$photo));
			}
			$c++;
		}
		
		
		}



		break;
	
	case 'okMod' :
		$ctr = new AdminDashboardController();
		
		if(isset($_GET['file']) && $_GET['file']=='no'){
		$arr2 = array("",$_POST['nomM']);
		$ctr->insertInMod($arr2);
	
		}

		if(isset($_GET['file']) && $_GET['file']=='ok'){
		$fileName = $_FILES["nomM"]["name"];//vue= name of input 
		$fileExtension = explode('.', $fileName);
		$fileExtension = strtolower(end($fileExtension));
		$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

		$targetDirectory = "../uploads/" . $newFileName;
		move_uploaded_file($_FILES['nomM']['tmp_name'], $targetDirectory);

		error_reporting(0);
		ini_set('display_errors', 0);

	
		require '../imports/excelReader/excel_reader2.php';
		require '../imports/excelReader/SpreadsheetReader.php';

		$reader = new SpreadsheetReader($targetDirectory);
		$c=0;
		foreach($reader as $key => $row){
			if($c>0){

			$name = $row[0];

			$ctr->insertInMod(array("",$name));
			}
			$c++;
		}
		}
		break;
	
	
	case 'okSalle' : 
		$ctr = new AdminDashboardController();

		$arr = array($_POST['numEns'],$_POST['numSalle']);

		try{
		$ctr->insertInsalle($arr);
		}
		catch(PDOException $e){
		$_SESSION['ERROR'] = "vous avez deja affecter a cette salle a cet enseignant";

			throw 
			header("Location: ../views/error.php");
		}


		break;



	case 'okSeance' : 
		
		$ctr = new AdminDashboardController();
		
		$c = $ctr->getSalle($_POST['moduleSelectForSeance']);
		// echo $_POST['moduleSelectForSeance'];
		print_r($c);

		// echo $c['idsalle'];
		$arr2 = array("",$_POST['moduleSelectForSeance'],$c['idsalle'],$_POST['dateSeance'],$_POST['typeSeance'],$_POST['heureD'],$_POST['heureF']);
		
		$ctr->insertInSeancee($arr2);

		
		break;


	// case 'okSalle':
	// 	$ctr = new AdminDashboardController();
			
	// 	$arr2 = array("",$_POST['nomM']);
		
		
	// 	$ctr->insertInSalle($arr2);
	
	// 	break;





}


					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=".$_SESSION['choix1']);




}
// if($v)
// 	echo "true";




if(isset($_GET['action'])){
	
		if($_GET['action'] == 'delete'){
		
		switch($_GET['entity']){
			case 'etudiant':
				$ctr = new AdminDashboardController();
				$ctr->deleteFrom($_GET['apg'],'etudiant');
				$ctr->deleteFrom($_GET['idu'],'utilisateur');

				header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=etudiant");

				
				break;
			
			case 'enseignant':

					$ctr = new AdminDashboardController();
					$ctr->deleteFrom($_GET['ide'],'enseignant');
					$ctr->deleteFrom($_GET['idu'],'utilisateur');
		
					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=enseignant");
		
				break;



			case 'module' :
				
				$ctr = new AdminDashboardController();
				$ctr->deleteFrom($_GET['idm'],'module');

				header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=module");

			break;

			

			case 'salle' :
				
				$ctr = new AdminDashboardController();
				$ctr->deleteFrom($_GET['id'],'salle');

				header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=salle");

			break;

			case 'seance' : 
				$ctr = new AdminDashboardController();
				$ctr->deleteFrom($_GET['id'],'seance');

				header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=seance");
				break;


		}
	}
	if($_GET['action'] == 'update'){
		
		switch($_GET['entity']){
			case 'etudiant':
				
				session_start();
				$ctr = new AdminDashboardController();
				$_SESSION['one']  = $ctr->getOne($_GET['apg'],'etudiant');

				header("Location: ../views/updateFormview.php?action=update&entity=etudiant");

				// session_start();

				// 	header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_GET['choix']);

				
				break;
			
			case 'enseignant':

					
				session_start();
				$ctr = new AdminDashboardController();
				$_SESSION['one']  = $ctr->getOne($_GET['ide'],'enseignant');

				header("Location: ../views/updateFormview.php?action=update&entity=enseignant");

				


					// session_start();
		
					// 	header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_GET['choix']);
		
				break;



			case 'module' :


					
				session_start();
				$ctr = new AdminDashboardController();
				$_SESSION['one']  = $ctr->getOne($_GET['idm'],'module');

				header("Location: ../views/updateFormview.php?action=update&entity=module");


				// session_start();

				// 	header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_GET['choix']);

			break;

			

			case 'salle' :


				session_start();
				$ctr = new AdminDashboardController("salle");
				$_SESSION['one']  = $ctr->getOne($_GET['id'],'salle');
				$_SESSION['salleEns'] = $ctr->selectAll();

				header("Location: ../views/updateFormview.php?action=update&entity=salle");



				// session_start();

				// 	header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_GET['choix']);

			break;


			case 'seance' : 
				session_start();
				$ctr = new AdminDashboardController("module");
				$_SESSION['module'] = $ctr->selectAll();

				$_SESSION['one']  =$ctr->getOne($_GET['id'],'seance');
				$_SESSION['idseance'] = $_GET['id'];

				



				header("Location: ../views/updateFormview.php?action=update&entity=seance");

				break;

		}

	
}

			if($_GET['action']=='realUpdate'){
			switch($_GET['entity']){
				case 'etudiant':
					
					session_start();

					$ctr = new AdminDashboardController();
					$ctr->updateFrom(array($_POST['nomEt'],$_POST['preEt'],$_POST['lienPh'],$_POST['email'], $_SESSION['one']['apogee']),'etudiant');




					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=etudiant");

					break;
				
				case 'enseignant':

						
					session_start();
					$ctr = new AdminDashboardController();
					$ctr->updateFrom(array($_POST['nomEn'],$_POST['preEn'],$_POST['email'],$_POST['photo'],$_SESSION['one']['idEn']),'enseignant');

					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=enseignant");


					break;



				case 'module' :


					session_start();
					$ctr = new AdminDashboardController();
					$ctr->updateFrom(array($_POST['nomM'],$_POST['idM']),'module');
					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=module");

					// $ctr = new AdminDashboardController();
					// session_start();
					// $_SESSION['one']  = $ctr->getOne($_GET['idm'],'module');
					// header("Location: ../views/updateFormview.php?action=update&entity=module");


					// session_start();

					// 	header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_GET['choix']);

				break;

				

				case 'salle' :

					$ctr = new AdminDashboardController();
					session_start();



					try{
					$ctr->updateFrom(array($_POST['numEns'],$_POST['numSalle']),'salle');
					}
					catch(PDOException $e){
						$_SESSION['ERROR'] = "Erreur une salle par enseignant  ";

						throw 
						header("Location: ../views/error.php");
					}
				
					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=salle");

					// $ctr = new AdminDashboardController();
					// $_SESSION['one']  = $ctr->getOne($_GET['id'],'salle');

					// header("Location: ../views/updateFormview.php?action=update&entity=salle");



					// session_start();

					// 	header("Location: ../views/adminDashboardView.php?access=".$_SESSION['access'].'&'.'choix='.$_GET['choix']);

				break;


				case 'seance':
					session_start();

					$ctr = new AdminDashboardController();
					$ctr->updateFrom(array($_POST['moduleSelectForSeance'],$_POST['date'],$_POST['idsalle'],$_POST['heureD'],$_POST['heureF'],$_POST['typeSeance'],$_SESSION['idseance']),'seance');


					header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=seance");

					
					break;
		}
}
		if($_GET['action']=='toAffect'){
		

			if($_GET['entity'] =='enseignant'){
			$ctr = new AdminDashboardController("module");
			session_start();
			$_SESSION['module'] = $ctr->selectAll();
			$_SESSION['ens'] = $_GET['id'];

			// foreach($_SESSION['module'] as $s){
			// 	echo $s['nomM'];
			// }

			header("Location: ../views/affecter.php?entity=enseignant");
			}
			if($_GET['entity']=='etudiant'){
				$ctr = new AdminDashboardController("module");
				session_start();
				$_SESSION['module'] = $ctr->selectAll();
				$_SESSION['etudiant'] = $_GET['id'];
				header("Location: ../views/affecter.php?entity=etudiant");

			}
		
		}

		if($_GET['action']=='nowAffect'){
		
			$ctr = new AdminDashboardController();
		

			if(isset($_GET['entity'])&& $_GET['entity']=='enseignant' && $_GET['file']=='no'){
			session_start();
			try{
			$ctr->insertInAff(array($_SESSION['ens'],$_POST['moduleSelect']));
			}
			catch(PDOException $e){
				$_SESSION['ERROR'] = "vous avez deja affecter a cet enseignant ce module";

				throw 
				header("Location: ../views/error.php");
			}
			header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=enseignant");
			}




			
			if(isset($_GET['entity'])&& $_GET['entity']=='etudiant' && $_GET['file']=='no'){
			
				session_start();

				try{
				$ctr->insertInetudier(array($_POST['moduleSelect'],$_SESSION['etudiant']));
				}
				catch(PDOException $e){
					$_SESSION['ERROR'] = "vous avez déja affecter a cet etudiant ce module";

				throw 
				header("Location: ../views/error.php");
				}

				// if($arr==true){
				
				header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=etudiant");

				// }else{
				
				// $_SESSION['ERROR'] = "vous avez deja affecter a cet etudiant ce module";
				// echo $arr;
				// }


			}

			if(isset($_GET['entity'])&& $_GET['entity']=='etudiant' && $_GET['file']=='ok'){
			

				$fileName = $_FILES["affect"]["name"];//vue= name of input 
				$fileExtension = explode('.', $fileName);
				$fileExtension = strtolower(end($fileExtension));
				$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
		
				$targetDirectory = "../uploads/" . $newFileName;
				move_uploaded_file($_FILES['affect']['tmp_name'], $targetDirectory);
		
				error_reporting(0);
				ini_set('display_errors', 0);
		
				require '../imports/excelReader/excel_reader2.php';
				require '../imports/excelReader/SpreadsheetReader.php';

				$reader = new SpreadsheetReader($targetDirectory);
				$c=0;
				foreach($reader as $key => $row){
					
					if($c>0){
				
				
				
					$apogee = $row[0];
					$nomM	= $row[1];
			
			
			
				try{
					$ctr->insertInetudier(array($ctr->getIdM($nomM)['idM'],$apogee));
				}
				catch(PDOException $e){
					session_start();
					$_SESSION['ERROR'] = "vous avez déja affecter le meme etudiant a ".$nomM;

					throw 
					header("Location: ../views/error.php");
				}

					}
					$c++;
				}


				header("Location: ../controllers/AdminDashboardController.php?submit=submit&choix=etudiant");





			}


		}



	

}


if(isset($_GET['redirect'])){
	switch($_GET['redirect']){
		case 'insertForm' :
		session_start();
		$ctr = new AdminDashboardController("enseignant");
		$_SESSION['module'] = $ctr->selectValidModule('affecter');
		$_SESSION['enseignant'] = $ctr->selectAll();
		$_SESSION['salle'] = $ctr->selectfromSalle();
		
		header("Location: ../views/insertFormview.php?insert=ok");

			break;


		case 'statistic':
			header("Location: ../views/adminstats_view.php");
			break;

		case 'consulter':
			session_start();
			$ctr = new AdminDashboardController();
			$_SESSION['idSeance'] = $_GET['id'];

			if($_GET['choice']=='liste'){
			$_SESSION['liste'] = $ctr->selectListeStd($_GET['id']);
			print_r($ctr->selectAbsc($_SESSION['idSeance']));

			header("Location: ../views/AdminconsulterSeance.php?aff=liste");
			// var_dump($_SESSION['liste']);
			}
			if($_GET['choice']=='absence'){
	
				


				$_SESSION['liste'] = $ctr->selectAbsc($_GET['id']);


// print_r(	$_SESSION['liste'] );
				
				header("Location: ../views/AdminconsulterSeance.php?aff=absence");




			}
			break;


	}
}

if(isset($_GET['action']) && $_GET['action']=='justification'){
	session_start();
	$ctr = new AdminDashboardController();
	$_SESSION['justif'] = $ctr->justif(	$_SESSION['idSeance'] );
	header('Location:../views/AdminconsulterSeance.php?justif=')	;
}


